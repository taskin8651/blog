<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
    ];

    /*
    |--------------------------------------------------------------------------
    | Media Collection
    |--------------------------------------------------------------------------
    */

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('category_image')
            ->singleFile(); // 🔥 only one image
    }

    /*
    |--------------------------------------------------------------------------
    | Helper 🔥
    |--------------------------------------------------------------------------
    */

    public function getImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('category_image') 
            ?: asset('assets/img/default.jpg');
    }
}