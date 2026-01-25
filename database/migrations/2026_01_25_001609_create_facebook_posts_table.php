<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facebook_posts', function (Blueprint $table) {
            $table->id();
            $table->string('facebook_id')->unique();
            $table->text('message')->nullable();
            $table->string('type')->default('status'); // status, photo, video, link
            $table->text('full_picture')->nullable();
            $table->text('permalink_url')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->json('attachments')->nullable();
            $table->integer('likes_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->integer('shares_count')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
            
            $table->index('published_at');
            $table->index('is_published');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facebook_posts');
    }
};
