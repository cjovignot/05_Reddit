<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Will need Posts Model to request API
// use App\Model\Post;

class HomeController extends Controller
{    
    public function show()
    {
        // $products = Product::all();
        // $categories = Categories::all();
        // return view('products.index', compact('products', 'categories'));
        return "Coucou, je suis la liste des posts";
    }
}