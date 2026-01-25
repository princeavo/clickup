<?php

namespace App\Console\Commands;

use App\Services\FacebookService;
use Illuminate\Console\Command;

class SyncFacebookPosts extends Command
{
    protected $signature = 'facebook:sync-posts 
                            {--test : Test the connection without syncing}
                            {--validate : Validate configuration only}';

    protected $description = 'Synchronize Facebook posts from the Graph API';

    public function handle(FacebookService $facebookService): int
    {
        // Validate configuration
        if ($this->option('validate')) {
            return $this->validateConfiguration($facebookService);
        }

        // Test connection
        if ($this->option('test')) {
            return $this->testConnection($facebookService);
        }

        // Sync posts
        return $this->syncPosts($facebookService);
    }

    protected function validateConfiguration(FacebookService $facebookService): int
    {
        $this->info('Validating Facebook configuration...');
        
        $errors = $facebookService->validateConfiguration();

        if (empty($errors)) {
            $this->info('✓ Configuration is valid');
            return self::SUCCESS;
        }

        $this->error('Configuration errors found:');
        foreach ($errors as $error) {
            $this->line("  • {$error}");
        }

        return self::FAILURE;
    }

    protected function testConnection(FacebookService $facebookService): int
    {
        $this->info('Testing Facebook API connection...');

        if ($facebookService->testConnection()) {
            $this->info('✓ Connection successful');
            return self::SUCCESS;
        }

        $this->error('✗ Connection failed. Check logs for details.');
        return self::FAILURE;
    }

    protected function syncPosts(FacebookService $facebookService): int
    {
        $this->info('Starting Facebook posts synchronization...');

        try {
            $count = $facebookService->syncPosts();
            
            $this->info("✓ Successfully synced {$count} posts");
            return self::SUCCESS;
        } catch (\Exception $e) {
            $this->error('✗ Sync failed: ' . $e->getMessage());
            return self::FAILURE;
        }
    }
}
