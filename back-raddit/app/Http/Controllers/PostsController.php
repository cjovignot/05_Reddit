<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Will need Posts Model to request API
// use App\Model\Post;

class PostsController extends Controller
{
    public function show(Posts $product)
    {
        $posts = Posts::all();
        $post = Posts::all()->where('post_id', '=', '1');
        return "Je suis le post dont l'id est XX";
    }
}