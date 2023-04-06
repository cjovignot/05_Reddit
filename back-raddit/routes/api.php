<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubRadditController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/subraddits', [SubRadditController::class, 'displayAll']);
Route::get('/{subName}', [SubRadditController::class, 'displayOne']);
Route::put('/{subName}', [SubRadditController::class, 'editOne']);
Route::delete('/{subName}', [SubRadditController::class, 'deleteOne']);

// Route::resource('/subraddit', SubRadditController::class);
