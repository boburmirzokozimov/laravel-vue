<?php


use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\HelpRequest\HelpRequestController;


Route::middleware('api')->group(function () {
    Route::get('/hello', function () {
        return 'hiiii';
    });

    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/help-request', [HelpRequestController::class, 'store']);
