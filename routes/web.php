<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::any('/login', [LoginController::class, 'login'])->name('login-get');
Route::get('/dashboard', function () {
    return 'Welcome to the Dashboard!';
})->middleware('auth')->name('dashboard');
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');