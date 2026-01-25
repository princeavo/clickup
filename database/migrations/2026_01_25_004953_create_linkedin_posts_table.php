<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('linkedin_posts', function (Blueprint $table) {
            $table->id();
            $table->string('linkedin_id')->unique();
            $table->text('text')->nullable();
            $table->string('author_name')->nullable();
            $table->text('share_url')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->json('media')->nullable();
            $table->integer('likes_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->integer('shares_count')->default(0);
            $table->integer('impressions_count')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
            
            $table->index('published_at');
            $table->index('is_published');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('linkedin_posts');
    }
};
