<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeController::class, 'dashboard']);
Route::get('/users', [HomeController::class, 'users'])->name('user.index');

Route::get('/create', [HomeController::class, 'create'])->name('user.create');
Route::post('/create', [HomeController::class, 'store'])->name('user.store');

Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
Route::put('/update/{id}', [HomeController::class, 'update'])->name('user.update');


