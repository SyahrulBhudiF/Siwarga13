<?php
Route::middleware(['auth', 'role:RW'])->group(function () {
    Route::get('/beranda', [\App\Http\Controllers\BerandaController::class, 'index']);
});
