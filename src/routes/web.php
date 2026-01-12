<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// 認証不要
Route::prefix('auth')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost']);
});

// 認証必要
Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// 認証必要
Route::middleware('auth')->group(function () {
Route::get('/contact', [ContactController::class, 'contact']);
});

Route::prefix('contacts')->group(function () {
// 認証不要
    Route::post('/confirm', [ContactController::class, 'confirm']);
    Route::post('/', [ContactController::class, 'store']);
});

