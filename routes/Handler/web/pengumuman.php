<?php
$roles = ['RW', 'RT 1', 'RT 2', 'RT 3', 'RT 4', 'RT 5'];
$rolesString = implode(',', $roles);

Route::resource('/pengumuman', \App\Http\Controllers\PengumumanController::class)->middleware(['auth', "role:$rolesString"])->except('show');
