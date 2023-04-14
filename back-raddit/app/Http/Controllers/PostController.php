<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Will need Posts Model to request API
use App\Models\Posts;
use App\Models\Users;
use App\Models\Comments;

class PostController extends Controller
{
    public function displayAllPosts()
    {
        // $posts = Posts::all();
        $post = Posts::select('posts.*', 'users.name AS uname', 'subraddits.name AS sname')
            ->join('users', 'users.id', '=', 'posts.author_id')
            ->join('subraddits', 'subraddits.id', '=', 'posts.subraddit_id')
            ->paginate(20);
        return response()->json($post);
    }

    public function display(string $subId)
    {
        $posts = Posts::all()->where('subraddit_id', 1);
        return response()->json($posts);
    }

    public function displayOne(string $subName, $id)
    {
        $post = Posts::where('subraddit_name', $subName)->where('id', $id)->firstOrFail();
        return response()->json($post);
    }

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

    public function editPost(Request $request, $id)
    {
        $post = Posts::where('id', $id)->firstOrFail();

        $post->update($request->all());
        return $post;
    }

    public function deletePost(string $id)
    {
        $post = Posts::where('id', $id)->firstOrFail();
        $success =  $post->delete();

        return [
            'deleted' => $success
        ];
    }


    // TOP FILTTER BAR

    public function postByCropsDown()
    {
        $posts = Posts::orderBy('crops', 'desc')->get();
        return response()->json($posts);
    }

    public function postByCropsUp()
    {
        $posts = Posts::orderBy('crops', 'asc')->get();
        return response()->json($posts);
    }

    public function postsByCreateDateUp()
    {
        $posts = Posts::orderBy('created_at', 'asc')->get();
        return response()->json($posts);
    }

    public function postsByCreateDateDown()
    {
        $posts = Posts::orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }

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

    public function postsHotDown()
    {
    }



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
