<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\SubRadditController;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// SUBRADDIT
Route::get('/r/{subName}', [SubRadditController::class, 'displayOne']);

// USER 
Route::get('/user/{id}', [UserController::class, 'displayOne']);

// LOGIN / LOGOUT
// if not logged in...
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);


// PROTECTED ROUTES
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/subraddits', [SubRadditController::class, 'displayAll']);
    Route::get('/comments', [CommentsController::class, 'displayAll']);

    Route::post('/r/create', [SubRadditController::class, 'store']);
    Route::put('/r/{subName}', [SubRadditController::class, 'editOne']);
    Route::delete('/r/{subName}', [SubRadditController::class, 'deleteOne']);

    Route::get('/user', [UserController::class, 'displayAll']);
    Route::put('/user/{id}', [UserController::class, 'editOne']);
    Route::delete('/user/{id}', [UserController::class, 'deleteOne']);
    Route::post('/user', [UserController::class, 'store']);
    Route::post('/logout', [UserController::class, 'logout']);
});
