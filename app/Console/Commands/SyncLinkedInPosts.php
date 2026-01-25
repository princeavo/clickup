<?php

namespace App\Console\Commands;

use App\Services\LinkedInService;
use Illuminate\Console\Command;

class SyncLinkedInPosts extends Command
{
    protected $signature = 'linkedin:sync-posts 
                            {--test : Test the connection without syncing}
                            {--validate : Validate configuration only}';

    protected $description = 'Synchronize LinkedIn posts from the API';

    public function handle(LinkedInService $linkedInService): int
    {
        // Validate configuration
        if ($this->option('validate')) {
            return $this->validateConfiguration($linkedInService);
        }

        // Test connection
        if ($this->option('test')) {
            return $this->testConnection($linkedInService);
        }

        // Sync posts
        return $this->syncPosts($linkedInService);
    }

    protected function validateConfiguration(LinkedInService $linkedInService): int
    {
        $this->info('Validating LinkedIn configuration...');
        
        $errors = $linkedInService->validateConfiguration();

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

    protected function testConnection(LinkedInService $linkedInService): int
    {
        $this->info('Testing LinkedIn API connection...');

        if ($linkedInService->testConnection()) {
            $this->info('✓ Connection successful');
            return self::SUCCESS;
        }

        $this->error('✗ Connection failed. Check logs for details.');
        return self::FAILURE;
    }

    protected function syncPosts(LinkedInService $linkedInService): int
    {
        $this->info('Starting LinkedIn posts synchronization...');

        try {
            $count = $linkedInService->syncPosts();
            
            $this->info("✓ Successfully synced {$count} posts");
            return self::SUCCESS;
        } catch (\Exception $e) {
            $this->error('✗ Sync failed: ' . $e->getMessage());
            return self::FAILURE;
        }
    }
}
