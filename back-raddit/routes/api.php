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
Route::get('/post', [PostController::class, 'display']);
Route::get('/post/{title}', [PostController::class, 'displayOne']);
Route::post('/post/store', [PostController::class, 'storePost']);
// Route::put('/post/{title}', [PostController::class, 'editPost']);
// Route::delete('/post/{title}', [PostController::class, 'deletePost']);


Route::get('/subraddits', [SubRadditController::class, 'displayAll']);
Route::post('/r/create', [SubRadditController::class, 'store']);
Route::get('/r/{subName}', [SubRadditController::class, 'displayOne']);
Route::put('/r/{subName}', [SubRadditController::class, 'editOne']);
Route::delete('/r/{subName}', [SubRadditController::class, 'deleteOne']);


// USER
Route::get('/user', [UserController::class, 'displayAll']);
Route::get('/user/{id}', [UserController::class, 'displayOne']);
Route::put('/user/{id}', [UserController::class, 'editOne']);
Route::delete('/user/{id}', [UserController::class, 'deleteOne']);
Route::post('/user', [UserController::class, 'store']);

// LOGIN / LOGOUT
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
// Route::get('', [HomeController::class, 'display']);
Route::get('/', [PostsController::class, 'display']);
Route::get('/subraddit', [SubRadditController::class, 'display']);
