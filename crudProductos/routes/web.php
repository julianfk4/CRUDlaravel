<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);

Route::get('dashboard/{id}', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('crear/{id}', [App\Http\Controllers\ProductosController::class, 'crear'])->name('crear');

Route::post('guardar', [App\Http\Controllers\ProductosController::class, 'guardar'])->name('guardar');

Route::get('detail/{id}', [App\Http\Controllers\ProductosController::class, 'index'])->name('index');

Route::get('edit/{id}', [App\Http\Controllers\ProductosController::class, 'editar'])->name('editar');

Route::get('borrar/{id}', [App\Http\Controllers\ProductosController::class, 'borrar'])->name('borrar');