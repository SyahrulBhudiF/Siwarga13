<?php

use Illuminate\Support\Facades\Route;

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
function loadRoutes($dir)
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

loadRoutes(__DIR__ . '/Handler');
