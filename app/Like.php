<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'user_id', 
    ];

    /**
	 * Indicates if the model should be timestamped.
	 *
	 * @var bool
	 */
    public $timestamps = false;

     /**
     * Bring all likes belongs to these post and user
     * 
     * @param viewer model $q 
     * @param int $q
     * @return object
     */
    public function Scopeliked ($q,int $post_id)
    {
        // Only for users
        if (Auth::check())
        {
            $q->where([
                ['user_id', '=', Auth::user()->id],
                ['post_id', '=', $post_id]
            ]);
        }
    }
}
