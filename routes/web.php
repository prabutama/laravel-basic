<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'dashboard']);
Route::get('/users', [HomeController::class, 'users'])->name('user.index');

Route::get('/create', [HomeController::class, 'create'])->name('user.create');
Route::post('/create', [HomeController::class, 'store'])->name('user.store');

Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
Route::put('/update/{id}', [HomeController::class, 'update'])->name('user.update');

Route::delete('/delete/{id}', [HomeController::class, 'destroy'])->name('user.delete');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


