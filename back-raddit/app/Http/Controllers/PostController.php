<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Will need Posts Model to request API
use App\Models\Posts;

class PostController extends Controller
{    
    public function display()
    {
        $posts = Posts::all();
        return response()->json($posts);
    }
    
    public function displayOne(string $title) {
        $posts = Posts::all()->where('title', $title);
        return response()->json($posts);
    }
    
    public function storePost(Request $request) {
        $post = new Posts;

        $post->author_id = "2";
        $post->subraddit_name = "Rosenbaum LLC";
        $post->title = "Test article 2";
        $post->content = "Test contenu 2";

        $post->save();
        dd($post);

        return Posts::all();
    }

    public function edit() {

    }

    public function delete() {

    }
}