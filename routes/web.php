<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FasilitasAreaController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('fasilitas.index'));

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'role:admin,pustakawan,anggota'])->group(function () {
    Route::resource('fasilitas', FasilitasAreaController::class)
        ->only(['index']);
});

Route::middleware(['auth', 'role:admin,pustakawan'])->group(function () {
    Route::resource('fasilitas', FasilitasAreaController::class)
        ->only(['store', 'edit', 'update']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('fasilitas', FasilitasAreaController::class)
        ->only(['destroy']);
});