<?php

namespace App\Models;

use App\Notifications\VerifyUserNotification;
use Carbon\Carbon;
use DateTimeInterface;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

// 🔥 Spatie Media
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use SoftDeletes, Notifiable, HasFactory, InteractsWithMedia;

    public $table = 'users';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',

        // 🔥 New fields
        'phone',
        'address',
        'designation',

        'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | Media Collection (Profile Image)
    |--------------------------------------------------------------------------
    */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile_image')
            ->singleFile(); // only 1 image
    }

    /*
    |--------------------------------------------------------------------------
    | Profile Image Accessor
    |--------------------------------------------------------------------------
    */
    public function getProfileImageAttribute()
    {
        return $this->getFirstMediaUrl('profile_image')
            ?: asset('assets/img/default-user.png');
    }

    /*
    |--------------------------------------------------------------------------
    | Serialize Date
    |--------------------------------------------------------------------------
    */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /*
    |--------------------------------------------------------------------------
    | Admin Check
    |--------------------------------------------------------------------------
    */
    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    /*
    |--------------------------------------------------------------------------
    | Auto Assign Role
    |--------------------------------------------------------------------------
    */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        self::created(function (self $user) {
            $registrationRole = config('panel.registration_default_role');

            if (!$user->roles()->get()->contains($registrationRole)) {
                $user->roles()->attach($registrationRole);
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Email Verified
    |--------------------------------------------------------------------------
    */
    public function getEmailVerifiedAtAttribute($value)
    {
        return $value
            ? Carbon::createFromFormat('Y-m-d H:i:s', $value)
                ->format(config('panel.date_format') . ' ' . config('panel.time_format'))
            : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value
            ? Carbon::createFromFormat(
                config('panel.date_format') . ' ' . config('panel.time_format'),
                $value
            )->format('Y-m-d H:i:s')
            : null;
    }

    /*
    |--------------------------------------------------------------------------
    | Password
    |--------------------------------------------------------------------------
    */
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] =
                app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}