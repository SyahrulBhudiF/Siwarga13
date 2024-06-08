<?php
Route::middleware(['auth', 'role:RW'])->group(function () {
    Route::resource('/bansos', \App\Http\Controllers\BansosController::class)->except(['create', 'destroy']);

    Route::group(['prefix' => 'bansos'], function () {
        Route::get('/mabac/show', [\App\Http\Controllers\BansosController::class, 'getMabac']);


        Route::group(['prefix' => 'check'], function () {
            Route::get('/edas', [\App\Http\Controllers\BansosController::class, 'checkEdas']);
            Route::get('/mabac', [\App\Http\Controllers\BansosController::class, 'checkMabac']);
        });
    });

    Route::group(['prefix' => 'calculate'], function () {
        Route::get('/edas', [\App\Http\Controllers\BansosController::class, 'edas']);
        Route::get('/mabac', [\App\Http\Controllers\BansosController::class, 'mabac']);
    });
});
