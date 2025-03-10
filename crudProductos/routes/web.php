<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
// R públicas
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);

// R privadas 
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard/{id}', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
    
    Route::get('crear/{id}', [App\Http\Controllers\ProductosController::class, 'crear'])->name('crear');
    Route::post('guardar', [App\Http\Controllers\ProductosController::class, 'guardar'])->name('guardar');
    
    Route::get('detail/{id}', [App\Http\Controllers\ProductosController::class, 'index'])->name('index');
    Route::get('edit/{id}', [App\Http\Controllers\ProductosController::class, 'editar'])->name('editar');
    Route::get('borrar/{id}', [App\Http\Controllers\ProductosController::class, 'borrar'])->name('borrar');
    
    Route::post('guardarc', [App\Http\Controllers\PostController::class, 'guardarc'])->name('guardarc');
    Route::get('borrarc/{id}', [App\Http\Controllers\PostController::class, 'borrarc'])->name('borrarc');
});
