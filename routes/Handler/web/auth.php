<?php
Route::get('/login', [\App\Http\Controllers\auth\AuthController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\auth\AuthController::class, 'auth'])->name('login.auth');
Route::post('/logout', [\App\Http\Controllers\auth\AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password/{token}', [\App\Http\Controllers\auth\AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::get('/send-email', [\App\Http\Controllers\auth\AuthController::class, 'sendEmailForm'])->name('send-email');
Route::post('/send-email', [\App\Http\Controllers\auth\AuthController::class, 'sendEmail'])->name('sendEmail');
Route::post('/forgot-password', [\App\Http\Controllers\auth\AuthController::class, 'sendForgotPassword'])->name('forgot-password.send');
