<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::any('/login', [LoginController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::any('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::any('/dashboard', [UsersController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/add-user', [UsersController::class, 'createUser'])->name('dashboard.add-user');
    Route::post('/dashboard/add-user', [UsersController::class, 'createUser'])->name('user.register');
    Route::get('/dashboard/user-list', [UsersController::class, 'userList'])->name('user.list');
    Route::any('/dashboard/user-edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
});
