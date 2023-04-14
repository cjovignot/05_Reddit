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

// POST
// TOP FILTER BAR
// Displays All Posts ordered by CROPS DESC
Route::get('/posts/crops/down', [PostController::class, 'postByCropsDown']);
// Displays All Posts ordered by CROPS ASC
Route::get('/posts/crops/up', [PostController::class, 'postByCropsUp']);
// Displays All Posts ordered by Creation Date ASC [OLD TO NEW]
Route::get('/posts/cdate/up', [PostController::class, 'postsByCreateDateUp']);
// Displays All Posts ordered by Creation Date DESC [NEW TO OLD]
Route::get('/posts/cdate/down', [PostController::class, 'postsByCreateDateDown']);
// Displays All Posts ordered by HOT UP
Route::get('/posts/hot/up', [PostController::class, 'postsHotUp']);
// Display All Posts ordered by HOT DOWN
Route::get('/posts/hot/down', [PostController::class, 'postsHotDown']);
// FOR DINO : Display All Posts SORTED BY Creation Date LIMIT 10

// Displays All Posts, NO FILTER
Route::get('/posts', [PostController::class, 'displayAllPosts']);
// Displays All Posts ordered by CROPS DESC
Route::get('/posts/crops', [PostController::class, 'postByCrops']);
// Displays All Posts from a Subraddit
Route::get('/{subName}/posts', [PostController::class, 'display']);
// Displays ONLY One Post from a Subraddit
Route::get('/p/{id}', [PostController::class, 'displayOne']); // CHECK IF NEEDS TO BE DELETED
// Edits a post from its ID
Route::put('/{id}', [PostController::class, 'editPost']);
// Deletes a post from its ID
Route::delete('/post/{id}', [PostController::class, 'deletePost']);
// 



// COMMENTS
// Route::get('/post/comments/{post_id}', [PostController::class, 'displayComments']);
Route::get('/comment/{id}', [CommentsController::class, 'displayOne']);

Route::get('/comments', [CommentsController::class, 'displayAll']);
Route::get('/comments/{id}', [CommentsController::class, 'displayAllByPost']);
Route::post('/comment', [CommentsController::class, 'store']);
Route::put('/comment/{commentId}', [CommentsController::class, 'editOne']);
Route::delete('/comment/{commentId}', [CommentsController::class, 'deleteOne']);

Route::get('/subraddits', [SubRadditController::class, 'displayAll']);
// Route::post('/r/create/{id}', [SubRadditController::class, 'store']);
Route::get('/r/subraddits/{id}', [SubRadditController::class, 'displaySubUser']);
Route::get('/r/{subName}', [SubRadditController::class, 'displayOne']);
Route::get('/subraddits', [SubRadditController::class, 'displayAll']);



// USER 
Route::get('/user/show/{id}', [UserController::class, 'displayOne']);
Route::get('/user', [UserController::class, 'displayAll']);
Route::delete('/user/{id}', [UserController::class, 'deleteOne']); // MARCHE PLUS ->     "message": "SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`raddit`.`posts`, CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)) (Connection: mysql, SQL: delete from `users` where `id` = 1)",

Route::get('/posts', [PostController::class, 'displayAllPosts']);


// LOGIN / LOGOUT
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);


// Route::get('/posts', [PostController::class, 'displayAllPosts']);
// Route::get('/subraddits', [SubRadditController::class, 'displayAll']);

// PROTECTED ROUTES (if logged in)
Route::group(['middleware' => ['auth:sanctum']], function () {


    // Creates a Post in a Subraddit called from input -> Change values in function
    Route::post('/post', [PostController::class, 'storePost']);

    Route::get('/comments', [CommentsController::class, 'displayAll']);
    Route::post('/comment', [CommentsController::class, 'store']);
    Route::put('/comment/{commentId}', [CommentsController::class, 'editOne']);
    Route::delete('/comment/{commentId}', [CommentsController::class, 'deleteOne']);




    Route::post('/r/create', [SubRadditController::class, 'store']);
    Route::put('/r/{subName}', [SubRadditController::class, 'editOne']);
    Route::delete('/r/{subName}', [SubRadditController::class, 'deleteOne']);

    // Route::get('/user', [UserController::class, 'displayAll']);
    Route::patch('/user/{id}', [UserController::class, 'editOne']);
    Route::put('/user/{id}', [UserController::class, 'editOne']);
    Route::post('/user', [UserController::class, 'store']);
    Route::post('/logout', [UserController::class, 'logout']);
});
