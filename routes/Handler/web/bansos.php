<?php
Route::middleware(['auth', 'role:RW'])->group(function () {
    Route::resource('/bansos', \App\Http\Controllers\BansosController::class)->except(['create', 'destroy']);

    Route::group(['prefix' => 'bansos', 'controller' => \App\Http\Controllers\BansosController::class], function () {
        Route::group(['prefix' => 'calculate'], function () {
            Route::get('/edas', 'edas');
            Route::get('/mabac', 'mabac');
        });

        Route::group(['prefix' => 'check'], function () {
            Route::get('/edas', 'checkEdas');
            Route::get('/mabac', 'checkMabac');
        });
    });
});
