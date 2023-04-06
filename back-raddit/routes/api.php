<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubRadditController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/subraddit', [SubRadditController::class, 'displayAll']);
Route::get('/subraddit/{id}', [SubRadditController::class, 'displayOne']);
Route::put('/subraddit/{id}', [SubRadditController::class, 'editOne']);
Route::put('/subraddit/{id}', [SubRadditController::class, 'deleteOne']);

// Route::resource('/subraddit', SubRadditController::class);
