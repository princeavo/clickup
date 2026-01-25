<?php

return [
    /*
    |--------------------------------------------------------------------------
    | LinkedIn App Configuration
    |--------------------------------------------------------------------------
    */
    'client_id' => env('LINKEDIN_CLIENT_ID'),
    'client_secret' => env('LINKEDIN_CLIENT_SECRET'),
    'redirect_uri' => env('LINKEDIN_REDIRECT_URI'),
    
    /*
    |--------------------------------------------------------------------------
    | LinkedIn Organization Configuration
    |--------------------------------------------------------------------------
    */
    'organization_id' => env('LINKEDIN_ORGANIZATION_ID'),
    'access_token' => env('LINKEDIN_ACCESS_TOKEN'),
    
    /*
    |--------------------------------------------------------------------------
    | API Configuration
    |--------------------------------------------------------------------------
    */
    'api_version' => '202401',
    'api_base_url' => 'https://api.linkedin.com/v2',
    
    /*
    |--------------------------------------------------------------------------
    | Sync Configuration
    |--------------------------------------------------------------------------
    */
    'posts_limit' => 10,
    'cache_ttl' => 3600, // 1 heure
    'sync_enabled' => env('LINKEDIN_SYNC_ENABLED', true),
];
