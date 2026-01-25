<?php

namespace App\Services;

use App\Models\FacebookPost;
use JanuSoftware\Facebook\Facebook;
use JanuSoftware\Facebook\Exception\SDKException;
use JanuSoftware\Facebook\Exception\ResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class FacebookService
{
    protected Facebook $fb;
    protected string $pageId;
    protected string $accessToken;

    public function __construct()
    {
        $this->fb = new Facebook([
            'app_id' => config('facebook.app_id'),
            'app_secret' => config('facebook.app_secret'),
            'default_graph_version' => config('facebook.default_graph_version'),
        ]);

        $this->pageId = config('facebook.page_id');
        $this->accessToken = config('facebook.access_token');
    }

    /**
     * Récupère les posts depuis l'API Facebook
     */
    public function fetchPosts(int $limit = null): array
    {
        if (!config('facebook.sync_enabled')) {
            Log::info('Facebook sync is disabled');
            return [];
        }

        $limit = $limit ?? config('facebook.posts_limit', 10);

        try {
            $response = $this->fb->get(
                "/{$this->pageId}/posts?fields=id,message,created_time,full_picture,permalink_url,type,attachments,likes.summary(true),comments.summary(true),shares&limit={$limit}",
                $this->accessToken
            );

            $posts = $response->getGraphEdge()->asArray();
            
            Log::info('Facebook posts fetched successfully', ['count' => count($posts)]);
            
            return $posts;
        } catch (ResponseException $e) {
            Log::error('Facebook Graph API error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
            throw $e;
        } catch (SDKException $e) {
            Log::error('Facebook SDK error', [
                'message' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Synchronise les posts dans la base de données
     */
    public function syncPosts(): int
    {
        $posts = $this->fetchPosts();
        $syncedCount = 0;

        foreach ($posts as $postData) {
            try {
                $this->createOrUpdatePost($postData);
                $syncedCount++;
            } catch (\Exception $e) {
                Log::error('Error syncing Facebook post', [
                    'post_id' => $postData['id'] ?? 'unknown',
                    'error' => $e->getMessage(),
                ]);
            }
        }

        // Invalider le cache
        Cache::forget('facebook_posts');

        Log::info('Facebook posts synced', ['count' => $syncedCount]);

        return $syncedCount;
    }

    /**
     * Crée ou met à jour un post
     */
    protected function createOrUpdatePost(array $postData): FacebookPost
    {
        $data = [
            'facebook_id' => $postData['id'],
            'message' => $postData['message'] ?? null,
            'type' => $postData['type'] ?? 'status',
            'full_picture' => $postData['full_picture'] ?? null,
            'permalink_url' => $postData['permalink_url'] ?? null,
            'published_at' => isset($postData['created_time']) 
                ? Carbon::parse($postData['created_time']) 
                : now(),
            'attachments' => $postData['attachments'] ?? null,
            'likes_count' => $postData['likes']['summary']['total_count'] ?? 0,
            'comments_count' => $postData['comments']['summary']['total_count'] ?? 0,
            'shares_count' => $postData['shares']['count'] ?? 0,
            'is_published' => true,
        ];

        return FacebookPost::updateOrCreate(
            ['facebook_id' => $data['facebook_id']],
            $data
        );
    }

    /**
     * Récupère les posts depuis le cache ou la DB
     */
    public function getCachedPosts(int $limit = 10)
    {
        return Cache::remember('facebook_posts', config('facebook.cache_ttl'), function () use ($limit) {
            return FacebookPost::published()
                ->recent($limit)
                ->get();
        });
    }

    /**
     * Vérifie la validité de la configuration
     */
    public function validateConfiguration(): array
    {
        $errors = [];

        if (empty(config('facebook.app_id'))) {
            $errors[] = 'Facebook App ID is missing';
        }

        if (empty(config('facebook.app_secret'))) {
            $errors[] = 'Facebook App Secret is missing';
        }

        if (empty(config('facebook.page_id'))) {
            $errors[] = 'Facebook Page ID is missing';
        }

        if (empty(config('facebook.access_token'))) {
            $errors[] = 'Facebook Access Token is missing';
        }

        return $errors;
    }

    /**
     * Test de connexion à l'API
     */
    public function testConnection(): bool
    {
        try {
            $response = $this->fb->get("/{$this->pageId}?fields=id,name", $this->accessToken);
            $page = $response->getGraphNode();
            
            Log::info('Facebook connection test successful', [
                'page_id' => $page->getField('id'),
                'page_name' => $page->getField('name'),
            ]);
            
            return true;
        } catch (\Exception $e) {
            Log::error('Facebook connection test failed', [
                'error' => $e->getMessage(),
            ]);
            return false;
        }
    }
}
