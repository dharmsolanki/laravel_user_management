<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
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
    Route::get('/dashboard/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/dashboard/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/dashboard/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('dashboard/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('dashboard/roles/{id}/edit', [RoleController::class, 'edit']);
    Route::get('dashboard/users/{id}/delete', [UsersController::class, 'delete'])->name('user.delete');
    Route::get('dashboard/users/{id}/delete-permanent', [UsersController::class, 'deleteUserPermanently'])->name('user.delete-permanent');
    Route::get('dashboard/users/{id}/restore', [UsersController::class, 'restore'])->name('user.restore');
});
