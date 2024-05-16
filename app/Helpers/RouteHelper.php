<?php
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
