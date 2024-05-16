<?php
Route::middleware(['auth', 'role:RW'])->prefix('bansos')->group(function () {
    Route::get('/', [\App\Http\Controllers\BansosController::class, 'index']);
});
