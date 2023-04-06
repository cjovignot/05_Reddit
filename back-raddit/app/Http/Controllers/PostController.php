<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Will need Posts Model to request API
use App\Models\Posts;

class PostController extends Controller
{    
    public function index()
    {
        $posts = Posts::all();
        return response()->json($posts);
    }

    public function create() {
        
    }

    public function edit() {

    }

    public function delete() {

    }
}