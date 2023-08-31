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

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');

    Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::patch('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');

    Route::post('/clients/{client}/manage-balance', [ManageBalanceController::class, 'manage'])
        ->name('clients.balance.manage');
    Route::get('/clients/{client}/manage-balance', [ManageBalanceController::class, 'create'])
        ->name('clients.balance.create');
    Route::post('/clients/{client}/manage-balance/{balanceRequest}', [ManageBalanceController::class, 'activate'])
        ->name('clients.balance.activate');


    Route::post('/clients/{client}/manage-credit-card', [ManageCreditCardRequestController::class, 'store'])
        ->name('clients.credit-card.store');
    Route::get('/clients/{client}/manage-credit-card', [ManageCreditCardRequestController::class, 'create'])
        ->name('clients.credit-card.create');
    Route::patch('/clients/{client}/manage-credit-card/{creditCardRequest}', [ManageCreditCardRequestController::class, 'update'])
        ->name('clients.credit-card.update');

    Route::post('/clients/{client}/manage-credit-card-anonymous', [ManageCreditCardRequestController::class, 'storeAnonymous'])
        ->name('clients.credit-card.store-anonymous');
    Route::patch('/clients/{client}/manage-credit-card-anonymous/{creditCardRequest}', [ManageCreditCardRequestController::class, 'updateAnonymous'])
        ->name('clients.credit-card.update-anonymous');

    Route::post('/clients/{client}/manage-credit-card/{creditCardRequest}', [ManageCreditCardRequestController::class, 'activate'])
        ->name('clients.credit-card.activate');

    Route::patch('credit-cards/{creditCard}', [CreditCardController::class, 'update'])
        ->name('credit-cards.update');

    Route::get('credit-cards/{creditCard}/manage', [CreditCardController::class, 'create'])
        ->name('credit-cards.create');

    Route::post('credit-cards/{creditCard}/manage', [CreditCardController::class, 'manage'])
        ->name('credit-cards.update');

    Route::patch('credit-cards/{creditCard}/manage/{balanceRequest}', [CreditCardController::class, 'accept'])
        ->name('credit-cards.accept');

    Route::post('download', [DownloadFileController::class, 'download'])
        ->name('download-file');

    Route::get('/couriers', [CourierController::class, 'index'])
        ->name('couriers');
    Route::post('/couriers', [CourierController::class, 'store'])
        ->name('couriers.store');
    Route::patch('/couriers/{courier}', [CourierController::class, 'update'])
        ->name('couriers.update');
    Route::delete('/couriers/{courier}', [CourierController::class, 'destroy'])
        ->name('couriers.destroy');
    Route::post('/couriers/{courier}/status', [CourierController::class, 'status'])
        ->name('couriers.status');

    Route::controller(ChatController::class)->group(function () {
        Route::get('/chat', 'index');
        Route::post('/send/{client}', 'send');
        Route::post('/chat/{client}', 'sendByClient');
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

    Route::controller(TransactionController::class)->group(function () {
        Route::get('/transactions/balance', 'balance')->name('transactions.balance');
    });

    Route::controller(MetalAndCryptoController::class)->group(function () {
        Route::get('/metal/{client}', 'metal')->name('metals.balance');
        Route::post('/metal/{client}/{metalAndCryptoTransaction}', 'activate')->name('metals.activate');
        Route::get('/crypto/{client}', 'crypto')->name('crypto.balance');
        Route::post('/crypto/{client}/{metalAndCryptoTransaction}', 'activateCrypto')->name('crypto.activate');
    });

    Route::post('/transactions/{balanceRequest}/status', [ManageBalanceController::class, 'changeStatus']);

    Route::post('/uploadFile', UploadFileController::class);
    Route::post('/hello', [CreditCardController::class, 'changeStatus']);
});


Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/submit', [LoginController::class, 'submit'])->name('login.submit');
Route::post('/verify', [LoginController::class, 'verify'])->name('login.verify');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


