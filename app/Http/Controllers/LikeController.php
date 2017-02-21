<?php

namespace App\Http\Controllers;

use App\Like;
use App\Dislike;
use Auth;

use App\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
   
    /**
     * Store a newly like resource in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLike(Request $request,post $post)
    {  
        // Does the user has liked this post before?
        $newlike =  Like::liked($post->id)->get();

        // Add a like if he didin't 
        if ($newlike->isEmpty())
        {
            // Does the user has disliked this post before?
            $disliked =  Dislike::disliked($post->id)->get();
            if (! $disliked->isEmpty())
            {
                // Remove the dislike
                $disliked->first()->delete();
            }

            Auth::user()->likes()->create(['post_id' => $post->id]);
        }
        
        return back();
    }

    /**
     * Store a newly dislike resource in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDisLike(Request $request,post $post)
    {  
        // Does the user has disliked this post before?
        $newdislike =  Dislike::disliked($post->id)->get();

        // Add a dislike if he didin't 
        if ($newdislike->isEmpty())
        {
            // Does the user has disliked this post before?
            $liked =  Like::liked($post->id)->get();
            if (! $liked->isEmpty())
            {
                // Remove the like
                $liked->first()->delete();
            }

            Auth::user()->dislikes()->create(['post_id' => $post->id]);
        }
        
        return back();
    }

  
}
