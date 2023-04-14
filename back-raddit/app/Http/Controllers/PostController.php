<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Will need Posts Model to request API
use App\Models\Posts;
use App\Models\Users;
use App\Models\Comments;


/**
 * @group POST Management
 * 
 * APIs to manage the POST resources.
 */
class PostController extends Controller
{
    
    /**
     * Display all Posts 20 by 20
     */
    public function displayAllPosts()
    {
        // $posts = Posts::all();
        $post = Posts::select('posts.*', 'users.name AS uname', 'subraddits.name AS sname')
            ->join('users', 'users.id', '=', 'posts.author_id')
            ->join('subraddits', 'subraddits.id', '=', 'posts.subraddit_id')
            ->orderBy('id', 'DESC')
            ->paginate(20);
        return response()->json($post);
    }

    
    /**
     * Display all Posts from a Subraddit ID
     */
    public function display(string $subId)
    {
        $posts = Posts::all()->where('subraddit_id', $subId);
        return response()->json($posts);
    }

    public function displayOne($id)
    {
        $post = Posts::select('posts.*', 'users.name AS uname', 'subraddits.name AS sname')
            ->join('users', 'users.id', '=', 'posts.author_id')
            ->join('subraddits', 'subraddits.id', '=', 'posts.subraddit_id')
            ->where('posts.id', $id)
        ->firstOrFail();



        // $post = Posts::where('id', $id)->firstOrFail();
        return response()->json($post);
    }


    
    /**
     * Function to store Post in DB
     */
    public function storePost(Request $request)
    {

        // return $request;
        $post = new Posts;

        $post->author_id = request('author_id');
        $post->subraddit_id = request('subraddit_id');
        $post->title = request('title');
        $post->content = request('content');
        // $post->img_url = request('img_url');
        $post->nsfw = request('nsfw');
        $post->OC = request('OC');
        $post->spoiler = request('spoiler');

        $post->save();

        return Posts::all();
    }

    
    /**
     * Function to edit Post in DB
     */
    public function editPost(Request $request, $id)
    {
        $post = Posts::where('id', $id)->firstOrFail();

        $post->update($request->all());
        return $post;
    }

    
    /**
     * Function to delete Post from DB
     */
    public function deletePost(string $id)
    {
        $post = Posts::where('id', $id)->firstOrFail();
        $success =  $post->delete();

        return [
            'deleted' => $success
        ];
    }


    /**
     * @group TOP FILTER BAR
     * 
     * APIs to manage the POST resources.
     */

    /**
     * Filter to display posts BY CROPS DESC
     */
    public function postByCropsDown()
    {
        $posts = Posts::orderBy('crops', 'desc')->get();
        return response()->json($posts);
    }

    /**
     * Filter to display posts BY CROPS ASC
     */
    public function postByCropsUp()
    {
        $posts = Posts::orderBy('crops', 'asc')->get();
        return response()->json($posts);
    }

    /**
     * Filter to display posts BY CREATION DATE ASC
     */
    public function postsByCreateDateUp()
    {
        $posts = Posts::orderBy('created_at', 'asc')->get();
        return response()->json($posts);
    }

    /**
     * Filter to display posts BY CREATION DATE DESC
     */
    public function postsByCreateDateDown()
    {
        $posts = Posts::orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }

    /**
     * Filter to display posts BY HOT ASC -> Muliplies const by date of creation
     */
    public function postsHotUp()
    {
        $curdate = now();
        // $new = Posts::parse($curdate)->format('Y-m-d');;
        // $dates = Posts::all('created_at')->firstOrFail();
        // $diff = dateDiff($dates, $curdate);
        // $format = $dates->format('');

        // $datediff = diffInDays($curdate, $dates);



        return response()->json($curdate);
    }

    /**
     * Filter to display posts BY HOT DESC -> Muliplies const by date of creation
     */
    public function postsHotDown()
    {
    }



    /**
     * @group POST Management
     * 
     * APIs to manage the POST resources.
     */

    /**
     * Display comments of One Post, filtered by the Post ID
     */
    public function displayComments($post_id)
    {
        $post = Posts::all()->where('id', $post_id);
        $comments = Comments::all()->where('post_id', $post_id);

        $array = [
            'post' => $post,
            'comments' => $comments,
        ];


        return response()->json([$array]);
    }
}
