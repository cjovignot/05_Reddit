<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubRadditController;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


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
