<?php
Route::middleware(['auth', 'role:RW'])->group(function () {
    Route::resource('/bansos', \App\Http\Controllers\BansosController::class)->except(['create', 'destroy']);
});
