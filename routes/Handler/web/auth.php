<?php
Route::get('/login', [\App\Http\Controllers\auth\AuthController::class, 'index'])->name('login');
