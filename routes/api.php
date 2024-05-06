<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

function loadRoutesApi($dir)
{
    if (!is_dir($dir)) return;

    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file == '.' || $file == '..') continue;

        $filePath = $dir . '/' . $file;
        if (is_file($filePath) && pathinfo($filePath)['extension'] === 'php')
            require_once $filePath;
        else if (is_dir($filePath)) loadRoutes($filePath);
    }
}

loadRoutesApi(__DIR__ . '/Handler/api');
