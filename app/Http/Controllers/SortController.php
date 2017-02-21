<?php
namespace App\Http\Controllers;

use App\Post;
use App\Article;
use App\User;
use App\Like;
use App\Viewer;
use App\Dislike;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class SortController extends Controller
{
	/**
	 * Display a listing of the Posts based on its article.
	 * 
	 * @return \Illuminate\Http\Response
	 */
    public function article(article $article)
    {
    	// Get only the posts in this category 
    	$posts	=  $article->posts()->paginate(2);

		return View('pages.sort', ['posts' => $posts, 'sortedAs' => $article->name]);
    }
    
    /**
     * Display a listing of the Posts based on its user.
     * 
     * @return \Illuminate\Http\Response
     */
    public function user(user $user)
    {
    	// Get only the posts that published by this some user 
    	$posts	=  $user->posts()->paginate(2);

		return View('pages.sort', ['posts' => $posts, 'sortedAs' => $user->name]);
    }
    
    /**
     * Display a listing of the Posts based on most viewers.
     * 
     * @return \Illuminate\Http\Response
     */
    public function viewers()
    {
        // Sort it based on viewers 
        $posts = Post::get()->sortBy(function($post)
        {
            return $post->viewer->count();
        }, SORT_REGULAR ,true);
        
        // Pagination
        $paginatedPosts = self::customPaginator($posts, 2, 'viewers');
        
        return View('pages.sort', ['posts' => $paginatedPosts, 'sortedAs' => 'The Most Viewers']);
    }

    /**
     * Display a listing of the Posts based on most likes.
     * 
     * @return \Illuminate\Http\Response
     */
    public function likes()
    {
       // Sort it based on likes, Now if two posts are equle it will based on ther viewers 
        $posts = Post::all()->sortBy(function($post)
        {
            return $post->likes->count() - $post->dislikes->count();
        }, SORT_REGULAR ,true);
        
        // Pagination
        $paginatedPosts = self::customPaginator($posts, 2, 'likes');
        
        return View('pages.sort', ['posts' => $paginatedPosts, 'sortedAs' => 'The Most likes']);
    }

    /**
     * Display a listing of the Posts based on its popular.
     *
     * @return \Illuminate\Http\Response
     */
    public function popular(Request $request)
    {
        // Sort it based on viewers 
        $posts = Post::all()->sortBy(function($post)
        {
            return $post->viewer->count();
        }, SORT_REGULAR, true);

        // Sort it based on likes, Now if two posts are equal it will based on ther viewers 
        $posts = $posts->sortBy(function($post)
        {
            return $post->likes->count() - $post->dislikes->count();
        }, SORT_REGULAR, true);
    
        // Pagination
        $paginatedPosts = self::customPaginator($posts, 2, 'popular');

        return View('pages.sort', [
            'posts'     => $paginatedPosts, 
            'sortedAs'  => 'The Most popular',
        ]);
    }

    /**
     * Pagination posts manually.
     *  
     * @param  array  $posts    array of all posts
     * @param  int    $perPage  number of posts per page
     * @param  srting $pagename url to this page
     * 
     * @return array  $paginatedposts posts after pagination
     */
    private function customPaginator($posts, $perPage, $pagename)
    {
        // GET ?page= 
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Make $posts a collection
        $collection = new Collection($posts);

        // Get posts to display in current page
        $pagePosts = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Create paginator to pass it to the view
        $paginatedPosts = new LengthAwarePaginator($pagePosts, count($collection), $perPage, null, ['path' => $pagename]);

        return $paginatedPosts;
    }  
}
