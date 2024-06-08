<?php
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [\App\Http\Controllers\dashboard\DashboardController::class, 'index']);
    Route::get('/pengumuman', [\App\Http\Controllers\dashboard\DashboardController::class, 'pengumuman']);
    Route::get('/pengumuman/{id}', [\App\Http\Controllers\dashboard\DashboardController::class, 'showPengumuman']);
    Route::get('/dokumentasi', [\App\Http\Controllers\dashboard\DashboardController::class, 'dokumentasi']);
    Route::get('/dokumentasi/{id}', [\App\Http\Controllers\dashboard\DashboardController::class, 'showDokumentasi']);
    Route::get('/umkm', [\App\Http\Controllers\dashboard\DashboardController::class, 'umkm']);
    Route::get('/umkm/{id}', [\App\Http\Controllers\dashboard\DashboardController::class, 'showUmkm']);
});
