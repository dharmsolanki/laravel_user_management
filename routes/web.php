<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::any('/login', [LoginController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::any('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::any('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/add-user', [DashboardController::class, 'createUser'])->name('dashboard.add-user');
    Route::post('/dashboard/add-user', [DashboardController::class, 'createUser'])->name('user.register');
    Route::get('/dashboard/user-list', [DashboardController::class, 'userList'])->name('user.list');
    Route::any('/dashboard/user-edit/{id}', [DashboardController::class, 'edit'])->name('user.edit');
});
