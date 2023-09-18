<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Branch\BranchController;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\Client\Balance\DownloadFileController;
use App\Http\Controllers\Client\Balance\ManageBalanceController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\CreditCard\CreditCardController;
use App\Http\Controllers\Client\CreditCard\ManageCreditCardRequestController;
use App\Http\Controllers\Client\MetalAndCrypto\MetalAndCryptoController;
use App\Http\Controllers\Country\CountryController;
use App\Http\Controllers\Courier\CourierController;
use App\Http\Controllers\Key\KeyController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\UploadFile\UploadFileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Home')->with(['time' => now()->toTimeString()]);
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users', 'store')->name('users.store');
        Route::delete('/users/{user}', 'destroy')->name('users.destroy');
        Route::patch('/users/{user}', 'update')->name('users.update');
    });

    Route::controller(ClientController::class)->group(function () {
        Route::get('/clients', 'index')->name('clients');
        Route::get('/clients/create', 'create')->name('clients.create');
        Route::post('/clients', 'store')->name('clients.store');
        Route::delete('/clients/{client}', 'destroy')->name('clients.destroy');
        Route::patch('/clients/{client}', 'update')->name('clients.update');
        Route::get('/clients/{client}', 'show')->name('clients.show');
    });

    Route::controller(ManageBalanceController::class)->group(function () {
        Route::post('/clients/{client}/manage-balance', 'manage')->name('clients.balance.manage');
        Route::get('/clients/{client}/manage-balance', 'create')->name('clients.balance.create');
        Route::post('/clients/{client}/manage-balance/{balanceRequest}', 'activate')->name('clients.balance.activate');
    });

    Route::controller(ManageCreditCardRequestController::class)->group(function () {
        Route::post('/clients/{client}/manage-credit-card', 'store')->name('clients.credit-card.store');
        Route::get('/clients/{client}/manage-credit-card', 'create')->name('clients.credit-card.create');
        Route::patch('/clients/{client}/manage-credit-card/{creditCardRequest}', 'update')->name('clients.credit-card.update');
        Route::post('/clients/{client}/manage-credit-card-anonymous', 'storeAnonymous')->name('clients.credit-card.store-anonymous');
        Route::patch('/clients/{client}/manage-credit-card-anonymous/{creditCardRequest}', 'updateAnonymous')->name('clients.credit-card.update-anonymous');
        Route::post('/clients/{client}/manage-credit-card/{creditCardRequest}', 'activate')->name('clients.credit-card.activate');
    });

    Route::controller(CreditCardController::class)->group(function () {
        Route::post('/credit-cards/{creditCard}/destroy', 'destroy')->name('credit-cards.destroy');
        Route::patch('/credit-cards/{creditCard}', 'update')->name('credit-cards.update');
        Route::get('/credit-cards/{creditCard}/manage', 'create')->name('credit-cards.create');
        Route::post('/credit-cards/{creditCard}/manage', 'manage')->name('credit-card.update');
        Route::patch('/credit-cards/{creditCard}/manage/{balanceRequest}', 'accept')->name('credit-cards.accept');
    });

    Route::controller(CourierController::class)->group(function () {
        Route::get('/couriers', 'index')->name('couriers');
        Route::post('/couriers', 'store')->name('couriers.store');
        Route::patch('/couriers/{courier}', 'update')->name('couriers.update');
        Route::delete('/couriers/{courier}', 'destroy')->name('couriers.destroy');
        Route::post('/couriers/{courier}/status', 'status')->name('couriers.status');
    });

    Route::controller(ChatController::class)->group(function () {
        Route::get('/chat', 'index');
        Route::get('/getToken', 'getToken');
        Route::post('/send/{client}', 'send');
        Route::get('/chat/{chatRoom}', 'show');
        Route::post('/chat-room/{chatRoom}', 'update');
    });

    Route::controller(BranchController::class)->group(function () {
        Route::get('/branches', 'index')->name('branches');
        Route::get('/branches/create', 'create')->name('branches.create');
        Route::post('/branches', 'store')->name('branches.store');
        Route::get('/branches/{branch}', 'show')->name('branches.show');
        Route::get('/branches/{branch}/edit', 'edit')->name('branches.edit');
        Route::patch('/branches/{branch}', 'update')->name('branches.update');
        Route::delete('/branches/{branch}', 'destroy')->name('branches.destroy');
    });

    Route::controller(KeyController::class)->group(function () {
        Route::get('/keys', 'index')->name('keys');
        Route::get('/keys/create', 'create')->name('keys.create');
        Route::post('/keys', 'store')->name('keys.store');
        Route::get('/keys/{key}', 'edit')->name('keys.edit');
        Route::patch('/keys/{key}', 'update')->name('keys.update');
        Route::delete('/keys/{key}', 'destroy')->name('keys.destroy');
    });

    Route::controller(CountryController::class)->group(function () {
        Route::get('/countries', 'index')->name('countries');
        Route::get('/countries/create', 'create')->name('countries.create');
        Route::post('/countries', 'store')->name('countries.store');
        Route::get('/countries/{country}', 'edit')->name('countries.edit');
        Route::patch('/countries/{country}', 'update')->name('countries.update');
        Route::delete('/countries/{country}', 'destroy')->name('countries.destroy');
    });


    Route::controller(MetalAndCryptoController::class)->group(function () {
        Route::get('/metal/{client}', 'metal')->name('metals.balance');
        Route::post('/metal/{client}/{metalAndCryptoTransaction}', 'activate')->name('metals.activate');
        Route::post('/metal/{client}/{metalAndCryptoTransaction}/cancel', 'cancelMetal')->name('metals.cancel');
        Route::get('/crypto/{client}', 'crypto')->name('crypto.balance');
        Route::post('/crypto/{client}/{metalAndCryptoTransaction}', 'activateCrypto')->name('crypto.activate');
        Route::post('/crypto/{client}/{metalAndCryptoTransaction}/cancel', 'cancelCrypto')->name('crypto.cancel');
    });

    Route::post('/transactions/{balanceRequest}/status', [ManageBalanceController::class, 'changeStatus']);

    Route::controller(DownloadFileController::class)->group(function () {
        Route::post('download', 'download')->name('download-file');
    });

    Route::controller(TransactionController::class)->group(function () {
        Route::get('/transactions/balance', 'balance')->name('transactions.balance');
        Route::get('/transactions/metal', 'metal')->name('transactions.metal');
        Route::get('/transactions/crypto', 'crypto')->name('transactions.crypto');
        //TODO:DELETE
        Route::get('/check', 'check')->name('transactions.check');
    });

    Route::post('/uploadFile', UploadFileController::class);
});


Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/submit', [LoginController::class, 'submit'])->name('login.submit');
Route::post('/verify', [LoginController::class, 'verify'])->name('login.verify');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/centrifugo', function (Request $request) {
    return view('index');
});

