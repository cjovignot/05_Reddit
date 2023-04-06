<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubRadditController;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/subraddits', [SubRadditController::class, 'displayAll']);
Route::get('/subraddit/{id}', [SubRadditController::class, 'displayOne']);
Route::put('/subraddit/{id}', [SubRadditController::class, 'editOne']);
Route::delete('/subraddit/{id}', [SubRadditController::class, 'deleteOne']);



Route::get('/users', [UserController::class, 'displayAll']);
Route::get('/user/{id}', [UserController::class, 'displayOne']);
Route::put('/user/{id}', [UserController::class, 'editOne']);
Route::delete('/user/{id}', [UserController::class, 'deleteOne']);
Route::post('/user', [UserController::class, 'store']);
