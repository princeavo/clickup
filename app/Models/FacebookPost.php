<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class FacebookPost extends Model
{
    protected $fillable = [
        'facebook_id',
        'message',
        'type',
        'full_picture',
        'permalink_url',
        'published_at',
        'attachments',
        'likes_count',
        'comments_count',
        'shares_count',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'attachments' => 'array',
        'is_published' => 'boolean',
    ];

    /**
     * Scope pour récupérer uniquement les posts publiés
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope pour récupérer les posts récents
     */
    public function scopeRecent($query, int $limit = 10)
    {
        return $query->orderBy('published_at', 'desc')->limit($limit);
    }

    /**
     * Accessor pour le message tronqué
     */
    protected function excerpt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->message ? \Str::limit($this->message, 150) : null,
        );
    }

    /**
     * Accessor pour vérifier si le post a une image
     */
    protected function hasImage(): Attribute
    {
        return Attribute::make(
            get: fn () => !empty($this->full_picture),
        );
    }

    /**
     * Accessor pour le total d'engagements
     */
    protected function totalEngagement(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->likes_count + $this->comments_count + $this->shares_count,
        );
    }
}
