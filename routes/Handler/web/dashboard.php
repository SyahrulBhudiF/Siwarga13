<?php
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [\App\Http\Controllers\dashboard\DashboardController::class, 'index']);
    Route::get('/pengumuman', [\App\Http\Controllers\dashboard\DashboardController::class, 'pengumuman']);
        Route::get('/dokumentasi', [\App\Http\Controllers\dashboard\DashboardController::class, 'dokumentasi']);
        Route::get('/umkm', [\App\Http\Controllers\dashboard\DashboardController::class, 'umkm']);
});
