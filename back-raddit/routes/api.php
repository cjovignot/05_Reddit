<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::get('/{subName}/{title}', [PostController::class, 'displayOne']);
// Creates a Post in a Subraddit called from input -> Change values in function
Route::post('/post', [PostController::class, 'storePost']);
// Edits a post from its ID
Route::put('/{id}', [PostController::class, 'editPost']);
// Deletes a post from its ID
Route::delete('/post/{id}', [PostController::class, 'deletePost']);

Route::get('/subraddits', [SubRadditController::class, 'displayAll']);
Route::post('/subraddit/create', [SubRadditController::class, 'store']);
Route::get('/{subName}', [SubRadditController::class, 'displayOne']);
Route::put('/{subName}', [SubRadditController::class, 'editOne']);
Route::delete('/{subName}', [SubRadditController::class, 'deleteOne']);



Route::get('/users', [UserController::class, 'displayAll']);
Route::get('/user/{id}', [UserController::class, 'displayOne']);
Route::put('/user/{id}', [UserController::class, 'editOne']);
Route::delete('/user/{id}', [UserController::class, 'deleteOne']);
Route::post('/user', [UserController::class, 'store']);
