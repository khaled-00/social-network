<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
 	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
    public $timestamps = false;

    /**
     * All posts in this article
     * 
     * @return array
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
