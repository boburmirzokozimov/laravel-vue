<?php


use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Chat\ChatRoomController;
use App\Http\Controllers\Api\HelpRequest\HelpRequestController;
use App\Http\Controllers\Api\Chat\ChatController;


Route::middleware(['api', 'auth.token'])->group(function () {
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::post('/chat-room', [ChatRoomController::class, 'store']);
    Route::post('/chat', [ChatController::class, 'sendByClient']);

    Route::post('/help-request', [HelpRequestController::class, 'store']);
});
Route::post('/login', [AuthController::class, 'login']);
