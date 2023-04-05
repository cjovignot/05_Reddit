<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Will need Posts Model to request API
// use App\Model\Post;

class PostsController extends Controller
{
    public function display() {
        // $posts = Post::all();
        echo "Coucou, je suis la liste des posts";
    }

}