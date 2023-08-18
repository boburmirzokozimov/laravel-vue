<?php


use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Balance\BalanceReplenishController;
use App\Http\Controllers\Api\Chat\ChatRoomController;
use App\Http\Controllers\Api\Country\CountryController;
use App\Http\Controllers\Api\HelpRequest\HelpRequestController;
use App\Http\Controllers\Api\Chat\ChatController;
use App\Http\Controllers\Api\Key\KeyController;


Route::middleware(['api', 'auth.token'])->group(function () {
    Route::get('/me', [AuthController::class, 'me']);

    Route::post('/chat-room', [ChatRoomController::class, 'store']);
    Route::post('/chat', [ChatController::class, 'sendByClient']);

    Route::post('/help-request', [HelpRequestController::class, 'store']);

    Route::post('/balance', [BalanceReplenishController::class, 'manage']);

    Route::get('/keys', [KeyController::class, 'index']);
    Route::get('/countries', CountryController::class);
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/refresh', [AuthController::class, 'refresh']);
