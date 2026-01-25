<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Facebook App Configuration
    |--------------------------------------------------------------------------
    */
    'app_id' => env('FACEBOOK_APP_ID'),
    'app_secret' => env('FACEBOOK_APP_SECRET'),
    'default_graph_version' => env('FACEBOOK_GRAPH_VERSION', 'v22.0'),
    
    /*
    |--------------------------------------------------------------------------
    | Facebook Page Configuration
    |--------------------------------------------------------------------------
    */
    'page_id' => env('FACEBOOK_PAGE_ID'),
    'access_token' => env('FACEBOOK_ACCESS_TOKEN'),
    
    /*
    |--------------------------------------------------------------------------
    | Sync Configuration
    |--------------------------------------------------------------------------
    */
    'posts_limit' => 10, // Nombre de posts à récupérer
    'cache_ttl' => 3600, // Cache TTL en secondes (1 heure)
    'sync_enabled' => env('FACEBOOK_SYNC_ENABLED', true),
];
