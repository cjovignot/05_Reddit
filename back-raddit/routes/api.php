<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::get('/post', [PostController::class, 'index']);


Route::get('/subraddit', [SubRadditController::class, 'display']);
Route::get('/subraddit', [SubRadditController::class, 'displayAll']);
Route::get('/subraddit/{id}', [SubRadditController::class, 'displayOne']);
Route::put('/subraddit/{id}', [SubRadditController::class, 'editOne']);
Route::put('/subraddit/{id}', [SubRadditController::class, 'deleteOne']);

// Route::resource('/subraddit', SubRadditController::class);
