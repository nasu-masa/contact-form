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

Route::middleware('auth')->group(function(){
    Route::get('/', [AuthController::class, 'index']);
});
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'loginPost']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::middleware('auth')->group(function(){
Route::get('/contact', [ContactController::class, 'contact']);
});
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);

