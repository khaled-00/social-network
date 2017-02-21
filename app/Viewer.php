<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
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
     * All posts 
     * 
     * @return array
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /**
     * All users 
     * 
     * @return array
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Bring all viewers belongs to these post and user
     * 
     * @param viewer model $q 
     * @param int $q
     * @return object
     */
    public function Scopeseen ($q,int $post_id)
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
