<?php

namespace App\Services;

use App\Models\LinkedInPost;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class LinkedInService
{
    protected Client $client;
    protected string $accessToken;
    protected string $organizationId;
    protected string $apiBaseUrl;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('linkedin.api_base_url'),
            'timeout' => 30,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        $this->accessToken = config('linkedin.access_token');
        $this->organizationId = config('linkedin.organization_id');
        $this->apiBaseUrl = config('linkedin.api_base_url');
    }

    /**
     * Récupère les posts depuis l'API LinkedIn
     */
    public function fetchPosts(int $limit = null): array
    {
        if (!config('linkedin.sync_enabled')) {
            Log::info('LinkedIn sync is disabled');
            return [];
        }

        $limit = $limit ?? config('linkedin.posts_limit', 10);

        try {
            // Récupérer les posts de l'organisation
            $response = $this->client->get('/ugcPosts', [
                'headers' => [
                    'Authorization' => "Bearer {$this->accessToken}",
                    'X-Restli-Protocol-Version' => '2.0.0',
                ],
                'query' => [
                    'q' => 'authors',
                    'authors' => "List(urn:li:organization:{$this->organizationId})",
                    'count' => $limit,
                    'sortBy' => 'LAST_MODIFIED',
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            $posts = $data['elements'] ?? [];

            Log::info('LinkedIn posts fetched successfully', ['count' => count($posts)]);

            return $posts;
        } catch (GuzzleException $e) {
            Log::error('LinkedIn API error', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
            throw $e;
        }
    }

    /**
     * Récupère les statistiques d'un post
     */
    protected function fetchPostStatistics(string $postUrn): array
    {
        try {
            $response = $this->client->get('/organizationalEntityShareStatistics', [
                'headers' => [
                    'Authorization' => "Bearer {$this->accessToken}",
                ],
                'query' => [
                    'q' => 'organizationalEntity',
                    'organizationalEntity' => "urn:li:organization:{$this->organizationId}",
                    'shares' => "List({$postUrn})",
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            $stats = $data['elements'][0] ?? [];

            return [
                'likes' => $stats['likeCount'] ?? 0,
                'comments' => $stats['commentCount'] ?? 0,
                'shares' => $stats['shareCount'] ?? 0,
                'impressions' => $stats['impressionCount'] ?? 0,
            ];
        } catch (GuzzleException $e) {
            Log::warning('Failed to fetch LinkedIn post statistics', [
                'post_urn' => $postUrn,
                'error' => $e->getMessage(),
            ]);
            return [
                'likes' => 0,
                'comments' => 0,
                'shares' => 0,
                'impressions' => 0,
            ];
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
                Log::error('Error syncing LinkedIn post', [
                    'post_id' => $postData['id'] ?? 'unknown',
                    'error' => $e->getMessage(),
                ]);
            }
        }

        // Invalider le cache
        Cache::forget('linkedin_posts');

        Log::info('LinkedIn posts synced', ['count' => $syncedCount]);

        return $syncedCount;
    }

    /**
     * Crée ou met à jour un post
     */
    protected function createOrUpdatePost(array $postData): LinkedInPost
    {
        $postId = $postData['id'] ?? null;
        
        if (!$postId) {
            throw new \Exception('Post ID is missing');
        }

        // Récupérer les statistiques
        $stats = $this->fetchPostStatistics($postId);

        // Extraire le texte
        $text = $postData['specificContent']['com.linkedin.ugc.ShareContent']['shareCommentary']['text'] ?? null;

        // Extraire les médias
        $media = [];
        if (isset($postData['specificContent']['com.linkedin.ugc.ShareContent']['media'])) {
            foreach ($postData['specificContent']['com.linkedin.ugc.ShareContent']['media'] as $mediaItem) {
                if (isset($mediaItem['thumbnails'][0]['url'])) {
                    $media[] = [
                        'url' => $mediaItem['thumbnails'][0]['url'],
                        'type' => 'image',
                    ];
                }
            }
        }

        // Construire l'URL de partage
        $shareUrl = "https://www.linkedin.com/feed/update/{$postId}";

        $data = [
            'linkedin_id' => $postId,
            'text' => $text,
            'author_name' => $postData['author'] ?? null,
            'share_url' => $shareUrl,
            'published_at' => isset($postData['created']['time']) 
                ? Carbon::createFromTimestampMs($postData['created']['time']) 
                : now(),
            'media' => !empty($media) ? $media : null,
            'likes_count' => $stats['likes'],
            'comments_count' => $stats['comments'],
            'shares_count' => $stats['shares'],
            'impressions_count' => $stats['impressions'],
            'is_published' => true,
        ];

        return LinkedInPost::updateOrCreate(
            ['linkedin_id' => $data['linkedin_id']],
            $data
        );
    }

    /**
     * Récupère les posts depuis le cache ou la DB
     */
    public function getCachedPosts(int $limit = 10)
    {
        return Cache::remember('linkedin_posts', config('linkedin.cache_ttl'), function () use ($limit) {
            return LinkedInPost::published()
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

        if (empty(config('linkedin.client_id'))) {
            $errors[] = 'LinkedIn Client ID is missing';
        }

        if (empty(config('linkedin.client_secret'))) {
            $errors[] = 'LinkedIn Client Secret is missing';
        }

        if (empty(config('linkedin.organization_id'))) {
            $errors[] = 'LinkedIn Organization ID is missing';
        }

        if (empty(config('linkedin.access_token'))) {
            $errors[] = 'LinkedIn Access Token is missing';
        }

        return $errors;
    }

    /**
     * Test de connexion à l'API
     */
    public function testConnection(): bool
    {
        try {
            $response = $this->client->get('/me', [
                'headers' => [
                    'Authorization' => "Bearer {$this->accessToken}",
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            Log::info('LinkedIn connection test successful', [
                'user_id' => $data['id'] ?? 'unknown',
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('LinkedIn connection test failed', [
                'error' => $e->getMessage(),
            ]);
            return false;
        }
    }
}
