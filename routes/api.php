<?php


use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Balance\BalanceReplenishController;
use App\Http\Controllers\Api\Branch\BranchController;
use App\Http\Controllers\Api\Chat\ChatController;
use App\Http\Controllers\Api\Chat\ChatRoomController;
use App\Http\Controllers\Api\Client\Crypto\CryptoController;
use App\Http\Controllers\Api\Client\Metal\MetalController;
use App\Http\Controllers\Api\Country\CountryController;
use App\Http\Controllers\Api\HelpRequest\HelpRequestController;
use App\Http\Controllers\Api\Key\KeyController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UploadFile\UploadFileController;
use App\Http\Controllers\Api\VisaCard\VisaCardController;
use Illuminate\Support\Facades\Route;


Route::middleware(['api', 'auth.token'])->group(function () {
    Route::get('/me', [AuthController::class, 'me']);

    Route::post('/chat-room', [ChatRoomController::class, 'store']);
    Route::get('/chat-room/{chatRoom}', [ChatRoomController::class, 'history']);
    Route::post('/chat', [ChatController::class, 'sendByClient']);

    Route::post('/help-request', [HelpRequestController::class, 'store']);

    Route::post('/balance', [BalanceReplenishController::class, 'manage']);
    Route::post('/balance-requisite', [BalanceReplenishController::class, 'requisite']);
    Route::get('/balance-transactions-history', [BalanceReplenishController::class, 'history']);

    Route::get('/keys', [KeyController::class, 'index']);
    Route::get('/countries', CountryController::class);
    Route::post('/cards', [VisaCardController::class, 'store']);
    Route::get('/cards', [VisaCardController::class, 'cards']);
    Route::post('/cards/{card}/manage', [VisaCardController::class, 'manage']);

    Route::get('/branches', BranchController::class);

    Route::post('/transaction', TransactionController::class);

    Route::post('/uploadFile', UploadFileController::class);

    Route::controller(MetalController::class)->group(function () {
        Route::get('/metal', 'index');
        Route::get('/metal/balance', 'balance');
        Route::post('/metal/buy', 'buy');
        Route::post('/metal/sell', 'sell');
    });

    Route::controller(CryptoController::class)->group(function () {
        Route::get('/crypto', 'index');
        Route::get('/crypto/balance', 'balance');
        Route::post('/crypto/buy', 'buy');
        Route::post('/crypto/sell', 'sell');
    });
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/refresh', [AuthController::class, 'refresh']);
