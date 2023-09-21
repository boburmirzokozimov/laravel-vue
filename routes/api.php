<?php


use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Balance\BalanceReplenishController;
use App\Http\Controllers\Api\Branch\BranchController;
use App\Http\Controllers\Api\Chat\ChatController;
use App\Http\Controllers\Api\Chat\ChatRoomController;
use App\Http\Controllers\Api\Client\Crypto\CryptoController;
use App\Http\Controllers\Api\Client\Metal\MetalController;
use App\Http\Controllers\Api\Client\OneSignal\OneSignalController;
use App\Http\Controllers\Api\Country\CountryController;
use App\Http\Controllers\Api\HelpRequest\HelpRequestController;
use App\Http\Controllers\Api\Key\KeyController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UploadFile\UploadFileController;
use App\Http\Controllers\Api\VisaCard\VisaCardController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['api', 'auth.token', 'auth:api']], function () {
    Route::get('/me', [AuthController::class, 'me']);

    Route::controller(ChatRoomController::class)->group(function () {
        Route::post('/chat-room', 'store');
        Route::get('/chat-room/{chatRoom}', 'history');
    });

    Route::controller(ChatController::class)->group(function () {
        Route::get('/getToken', 'getToken');
        Route::post('/chat', 'sendByClient');
    });

    Route::controller(BalanceReplenishController::class)->group(function () {
        Route::post('/balance', 'manage');
        Route::post('/balance-requisite', 'requisite');
        Route::get('/balance-transactions-history', 'history');
    });

    Route::controller(VisaCardController::class)->group(function () {
        Route::post('/cards', 'store');
        Route::get('/cards', 'cards');
        Route::post('/cards/{card}/manage', 'manage');
    });

    Route::controller(MetalController::class)->group(function () {
        Route::get('/metal', 'index');
        Route::get('/metal/history', 'history');
        Route::get('/metal/balance', 'balance');
        Route::post('/metal/buy', 'buy');
        Route::post('/metal/sell', 'sell');
    });

    Route::controller(CryptoController::class)->group(function () {
        Route::get('/crypto', 'index');
        Route::get('/crypto/history', 'history');
        Route::get('/crypto/balance', 'balance');
        Route::post('/crypto/buy', 'buy');
        Route::post('/crypto/sell', 'sell');
    });

    Route::controller(OneSignalController::class)->group(function () {
        Route::post('/one-signal-token', 'setToken');
        Route::delete('/one-signal-token', 'removeToken');
    });

    Route::controller(HelpRequestController::class)->group(function () {
        Route::post('/help-request', 'store');
    });

    Route::controller(KeyController::class)->group(function () {
        Route::get('/keys', 'index');
    });

    Route::get('/branches', BranchController::class);
    Route::get('/countries', CountryController::class);
    Route::post('/uploadFile', UploadFileController::class);
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/refresh', 'refresh');
});
