<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'is_featured',

        // SEO
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    /*
    |--------------------------------------------------------------------------
    | Boot (Auto Slug)
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (!$post->slug) {
                $post->slug = Str::slug($post->title);
            }
        });

        static::updating(function ($post) {
            if (!$post->slug) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}

public function likes()
{
    return $this->hasMany(Like::class);
}

public function isLikedByUser()
{
    return $this->likes()->where('user_id', auth()->id())->exists();
}

public function incrementViews()
{
    $this->increment('views_count');
}

public function bookmarks()
{
    return $this->hasMany(Bookmark::class);
}

public function isBookmarked()
{
    return $this->bookmarks()
        ->where('user_id', auth()->id())
        ->exists();
}

    /*
    |--------------------------------------------------------------------------
    | Media Library (Image)
    |--------------------------------------------------------------------------
    */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('post_image')->singleFile();
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */
    public function getImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('post_image') ?: asset('default.png');
    }
}