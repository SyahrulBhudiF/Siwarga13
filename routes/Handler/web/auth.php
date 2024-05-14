<?php
Route::get('/login', [\App\Http\Controllers\auth\AuthController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\auth\AuthController::class, 'auth'])->name('login.auth');
Route::post('/logout', [\App\Http\Controllers\auth\AuthController::class, 'logout'])->name('logout');
