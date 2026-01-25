<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class LinkedInPost extends Model
{
    protected $fillable = [
        'linkedin_id',
        'text',
        'author_name',
        'share_url',
        'published_at',
        'media',
        'likes_count',
        'comments_count',
        'shares_count',
        'impressions_count',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'media' => 'array',
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
     * Accessor pour le texte tronqué
     */
    protected function excerpt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->text ? \Str::limit($this->text, 150) : null,
        );
    }

    /**
     * Accessor pour vérifier si le post a des médias
     */
    protected function hasMedia(): Attribute
    {
        return Attribute::make(
            get: fn () => !empty($this->media),
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

    /**
     * Accessor pour l'image principale
     */
    protected function mainImage(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->media[0]['url'] ?? null,
        );
    }
}
