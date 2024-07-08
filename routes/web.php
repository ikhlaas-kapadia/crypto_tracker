<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoinGeckoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TransactionController;

// class Service
// {
//     // ...
// }

// Route::get('/test', function (Service $service) {
    // return view('test', ['service'=>$service::class]);
    // die($service::class);
// });

Route::get('/', [CoinGeckoController::class, 'coinsList'])->name('home');
Route::get('/testcrypto', [CoinGeckoController::class, 'test']);
Route::get('/coin/{id}', [CoinGeckoController::class, 'coinDetails']);
Route::get('/test', function () {
    return view('home');
});





Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');


Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/portfolio', [PortfolioController::class, 'show']);

Route::get('/transaction', [TransactionController::class, 'addCoin'])->name('addCoin');

// Route::get('/crypto/{id}', function ($id) {
//     return view('crypto', ['id' => $id]);
// });

// Route::get('/register', function () {
//     return view('/auth/register');
// });


