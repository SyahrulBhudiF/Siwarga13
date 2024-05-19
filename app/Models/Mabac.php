<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mabac extends Model
{
    use HasFactory;

    protected $table = 'mabac';
    protected $primaryKey = 'id_mabac';
    protected $guarded = [
        'id_mabac'
    ];
}
