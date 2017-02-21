<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * All viewers in this user
     * 
     * @return array
     */
    public function viewer()
    {
        return $this->hasMany('App\Viewer');
    }

    /**
     * All likes in this post
     * 
     * @return array
     */
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
     /**
     * All dislikes in this post
     * 
     * @return array
     */
    public function dislikes()
    {
        return $this->hasMany('App\dislike');
    }
    /**
     * All posts in this user
     * 
     * @return array
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
