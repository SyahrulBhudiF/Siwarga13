<?php
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [\App\Http\Controllers\dashboard\DashboardController::class, 'index']);
});
