<?php

use Illuminate\Support\Facades\Route;

require_once app_path('Helpers/RouteHelper.php');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
loadRoutes(__DIR__ . '/Handler/web');

Route::get('/', function () {
    return view('welcome');
});

Route::fallback(function () {
    return redirect('/dashboard');
});


