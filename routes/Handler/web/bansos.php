<?php
Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'role:RW']);
