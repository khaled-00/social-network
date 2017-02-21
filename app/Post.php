<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The table name
     * 
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'image', 
        'created_at', 'updated_at',
        'article_id',
    ];

     /**
     * All viewers in this post
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
        return $this->hasMany('App\Dislike');
    }
    /**
     * User create this post
     * 
     * @return array
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * All article in this post
     * 
     * @return array
     */
    public function article()
    {
        return $this->belongsTo('App\Article');
    } 

}
