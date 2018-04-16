<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }

    public function getAvatarAttribute() {

       $pathToPlaceholder = '/img/profilepicture.jpeg';

       return $this->getMedia('avatars')->count() > 0 ? $this->getMedia('avatars')->first()->getUrl() : $pathToPlaceholder;
    }

    public function getThumbvatarAttribute() {

       $pathToPlaceholder = '/img/profilepicture.jpeg';

       return $this->getMedia('avatars')->count() > 0 ? $this->getMedia('avatars')->first()->getUrl('thumb') : $pathToPlaceholder;
    }
}
