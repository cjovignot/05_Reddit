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
Route::post('/subraddit/create', [SubRadditController::class, 'store']);
Route::get('/{subName}', [SubRadditController::class, 'displayOne']);
Route::put('/{subName}', [SubRadditController::class, 'editOne']);
Route::delete('/{subName}', [SubRadditController::class, 'deleteOne']);



Route::get('/users', [UserController::class, 'displayAll']);
Route::get('/user/{id}', [UserController::class, 'displayOne']);
Route::put('/user/{id}', [UserController::class, 'editOne']);
Route::delete('/user/{id}', [UserController::class, 'deleteOne']);
Route::post('/user', [UserController::class, 'store']);
