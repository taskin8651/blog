<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title',
        'image',
        'link',
        'position',
        'type',
        'script',
        'is_active',
        'start_at',
        'end_at',
        'priority',
        'views',
        'clicks',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Scopes 🔥
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeScheduled($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('start_at')
              ->orWhere('start_at', '<=', now());
        })->where(function ($q) {
            $q->whereNull('end_at')
              ->orWhere('end_at', '>=', now());
        });
    }

    public function scopePosition($query, $position)
    {
        return $query->where('position', $position);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers 🔥
    |--------------------------------------------------------------------------
    */

    public function incrementViews()
    {
        $this->increment('views');
    }

    public function incrementClicks()
    {
        $this->increment('clicks');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors 🔥
    |--------------------------------------------------------------------------
    */

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/'.$this->image) : null;
    }
}