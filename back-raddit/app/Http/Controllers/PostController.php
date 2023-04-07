<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Will need Posts Model to request API
use App\Models\Posts;

class PostController extends Controller
{   
    public function displayAllPosts() {
        $posts = Posts::all();
        return response()->json($posts);
    }

    public function display(string $subName)
    {
        $posts = Posts::all()->where('subraddit_name', $subName);
        return response()->json($posts);
    }
    
    public function displayOne(string $subName, $id) {
        $post = Posts::where('subraddit_name', $subName)->where('id', $id)->firstOrFail();
        return response()->json($post);
    }
    
    public function storePost(Request $request) {
        $post = new Posts;

        $post->author_id = request('author_id');
        $post->subraddit_name = request('subraddit_name');
        $post->title = request('title');
        $post->content = request('content');

        $post->save();

        return Posts::all();
    }

    public function editPost(Request $request, $id) {
        $post = Posts::where('id', $id)->firstOrFail();

        $post->update($request->all());
        return $post;
    }

    public function deletePost(string $id) {
        $post = Posts::where('id', $id)->firstOrFail();
        $success =  $post->delete();

        return [
            'deleted' => $success
        ];
    }
}