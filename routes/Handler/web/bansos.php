<?php
Route::middleware(['auth', 'role:RW'])->group(function () {
    Route::resource('/bansos', \App\Http\Controllers\BansosController::class)->except(['create', 'destroy']);

    Route::group(['prefix' => 'bansos'], function () {
        Route::get('/calculate/edas', [\App\Http\Controllers\BansosController::class, 'edas']);
        Route::get('/calculate/mabac', [\App\Http\Controllers\BansosController::class, 'mabac']);
    });
});
