<?php

namespace App\Http\Controllers;

use App\Services\FacebookService;
use App\Services\LinkedInService;
use Illuminate\Http\Request;

class SocialFeedController extends Controller
{
    public function __construct(
        protected FacebookService $facebookService,
        protected LinkedInService $linkedInService
    ) {}

    /**
     * Affiche le feed social (Facebook + LinkedIn)
     */
    public function index()
    {
        $facebookPosts = $this->facebookService->getCachedPosts(6);
        $linkedinPosts = $this->linkedInService->getCachedPosts(6);

        // Fusionner et trier par date
        $allPosts = $facebookPosts->concat($linkedinPosts)
            ->sortByDesc('published_at')
            ->take(12);

        return view('pages.social-feed', [
            'posts' => $allPosts,
            'facebookPosts' => $facebookPosts,
            'linkedinPosts' => $linkedinPosts,
        ]);
    }

    /**
     * API endpoint pour les posts Facebook
     */
    public function apiFacebook(Request $request)
    {
        $limit = $request->input('limit', 10);
        $posts = $this->facebookService->getCachedPosts($limit);

        return response()->json([
            'success' => true,
            'platform' => 'facebook',
            'data' => $posts,
            'count' => $posts->count(),
        ]);
    }

    /**
     * API endpoint pour les posts LinkedIn
     */
    public function apiLinkedIn(Request $request)
    {
        $limit = $request->input('limit', 10);
        $posts = $this->linkedInService->getCachedPosts($limit);

        return response()->json([
            'success' => true,
            'platform' => 'linkedin',
            'data' => $posts,
            'count' => $posts->count(),
        ]);
    }

    /**
     * API endpoint pour tous les posts
     */
    public function apiAll(Request $request)
    {
        $limit = $request->input('limit', 10);
        
        $facebookPosts = $this->facebookService->getCachedPosts($limit);
        $linkedinPosts = $this->linkedInService->getCachedPosts($limit);

        $allPosts = $facebookPosts->concat($linkedinPosts)
            ->sortByDesc('published_at')
            ->take($limit)
            ->values();

        return response()->json([
            'success' => true,
            'platform' => 'all',
            'data' => $allPosts,
            'count' => $allPosts->count(),
        ]);
    }
}
