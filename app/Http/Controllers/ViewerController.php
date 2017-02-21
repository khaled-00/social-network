<?php
namespace App\Http\Controllers;

use App\Viewer;
use Auth;

use Illuminate\Http\Request;

class ViewerController extends Controller
{
   
	/**
	 * Add new viewer if it necessary.
	 * 
	 * @param int $postID 
	 * @return Boolean
	 */
    public function store(int $postID)
    {
        // Does the user has seen this post before?
        $newViewer =  Viewer::seen($postID)->get();

        // Add a viewer if he didin't see it before 
        if ($newViewer->isEmpty())
        {
            Auth::user()->viewer()->create(['post_id' => $postID]);

            return true;
        }

        return false;
    }
}
