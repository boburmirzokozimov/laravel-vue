<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ManageBalanceController;
use App\Http\Controllers\UserController;
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

    Route::post('/clients/{client}/manage-balance', [ManageBalanceController::class, 'manage'])->name('clients.balance.manage');
    Route::get('/clients/{client}/manage-balance', [ManageBalanceController::class, 'create'])->name('clients.balance.create');
    Route::post('/clients/{client}/manage-balance/{balanceRequest}', [ManageBalanceController::class, 'activate'])->name('clients.balance.activate');
});

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/submit', [LoginController::class, 'submit'])->name('login.submit');
Route::post('/verify', [LoginController::class, 'verify'])->name('login.verify');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
