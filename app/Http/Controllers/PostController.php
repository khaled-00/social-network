<?php
namespace App\Http\Controllers;

use App\Post;
use App\Article;
use App\Like;
use App\Dislike;

use Auth;
use Session;
use Image;
use Storage;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\ViewerController;

class PostController extends Controller
{
    /**
     * Visitor can go to index and show only. 
     * 
     * @return boolean
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['index', 'show']]);
    }

    /**
     * Display a listing of the Posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // All posts, Oldest first
        $posts  = Post::latest()->paginate(2);
    
        return view('home', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.CreatePost');
    }

    /**
     * Store a newly created Post in database.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // All inputs data
        $inputs = $request->all();

        // Renaming and moving image
        $inputs['image'] = self::imaging($request->file('image'));
        
        // Adding post
        Auth::user()->posts()->create($inputs);

        // Success message
        Session::flash('flash_message', ' A post has CREATED successfully');
        return redirect('el-nour');
    }

    /**
     * Display the specified post, add a viewer, build dis\like system.
     *
     * @param  post  $post
     * @param  Controller  $viewer
     * @return \Illuminate\Http\Response
     */
    public function show(post $post,ViewerController $viewer)
    {   
        // Does the user has seen this post? return none if there is no user.
        $viewer->store($post->id);

        // Does the user has liked this post?
        $like    =  Like::liked($post->id)->get();

        // Does the user has disliked this post?
        $dislike =  Dislike::disliked($post->id)->get();

        return view('pages.ShowPost', [
            'post'      => $post, 
            'liked'     => $like,
            'disliked'  => $dislike
        ]);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        // Do you own this post? 
        abort_if(Auth::user()->id != $post->user->id, 503);

        return view('pages.UpdatePost', ['post' => $post ]);
    }

    /**
     * Update the specified post in database.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,post $post)
    {
        // Do you own this post? 
        abort_if(Auth::user()->id != $post->user->id, 503);

        // All inputs data
        $inputs = $request->all();
        
        // Does image going to update? 
        if ($request->file('image'))
        {
            // Removing post's old image
            Storage::delete("posts/$post->image");

            // Renaming and moving image
            $inputs['image'] =  self::imaging($request->file('image'));
        }

        // Update post
        $post->update($inputs);

        // Success message
        Session::flash('flash_message', 'A Post has been UPDATED successfully');
        return redirect('el-nour');
    }

    /**
     * Remove the specified Post from database.
     *
     * @param  post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        // Do you own this post? 
        abort_if(Auth::user()->id != $post->user->id, 503);

        // Delete the post
        $post->delete();
        
        // Removing post image
        Storage::delete("posts/$post->image");

        // Success message
        Session::flash('flash_message', 'A Post has been DELETED successfully');
        return redirect('el-nour');
    }

    /**
     * Moving the image file and return the name to be saved.
     * 
     * @param file $image 
     * @return string 
     */
    private function imaging($image) 
    {
        // Image new name
        $image_name = 'Image' . '_' . date('Y_m_d H_m_s') . '.' . $image->getClientOriginalExtension();
       
        // Resize image
        $img = Image::make($image);
        $img->resize(900, 400);
        $img->save($image);

        // Store it
        $image->storeAs('posts/', $image_name);

        // Image name
        return $image_name;
    } 

}
