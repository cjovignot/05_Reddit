<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\SubRadditController;

use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routing Posts
// 
// Displays All Posts, NO FILTER
Route::get('/posts', [PostController::class, 'displayAllPosts']);
// Displays All Posts from a Subraddit
Route::get('/{subName}/posts', [PostController::class, 'display']);
// Displays ONLY One Post from a Subraddit
Route::get('/{subName}/{id}', [PostController::class, 'displayOne']);
// Creates a Post in a Subraddit called from input -> Change values in function
Route::post('/post', [PostController::class, 'storePost']);
// Edits a post from its ID
Route::put('/{id}', [PostController::class, 'editPost']);
// Deletes a post from its ID
Route::delete('/post/{id}', [PostController::class, 'deletePost']);

// SUBRADDIT

Route::get('/subraddits', [SubRadditController::class, 'displayAll']);
Route::post('/r/create', [SubRadditController::class, 'store']);
Route::get('/r/{subName}', [SubRadditController::class, 'displayOne']);

// COMMENTS
Route::get('/comment/{id}', [CommentsController::class, 'displayOne']);


// Route::get('/')


// USER 
Route::get('/user/{id}', [UserController::class, 'displayOne']);

// LOGIN / LOGOUT
// if not logged in...
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
// Route::get('', [HomeController::class, 'display']);
Route::get('/', [PostsController::class, 'display']);
Route::get('/subraddit', [SubRadditController::class, 'display']);


// PROTECTED ROUTES (if logged in)
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/subraddits', [SubRadditController::class, 'displayAll']);
    Route::get('/comments', [CommentsController::class, 'displayAll']);
    Route::post('/comment', [CommentsController::class, 'store']);
    Route::put('/comment/{commentId}', [CommentsController::class, 'editOne']);
    Route::delete('/comment/{commentId}', [CommentsController::class, 'deleteOne']);


    Route::post('/r/create', [SubRadditController::class, 'store']);
    Route::put('/r/{subName}', [SubRadditController::class, 'editOne']);
    Route::delete('/r/{subName}', [SubRadditController::class, 'deleteOne']);

    Route::get('/user', [UserController::class, 'displayAll']);
    Route::put('/user/{id}', [UserController::class, 'editOne']);
    Route::delete('/user/{id}', [UserController::class, 'deleteOne']);
    Route::post('/user', [UserController::class, 'store']);
    Route::post('/logout', [UserController::class, 'logout']);
});
