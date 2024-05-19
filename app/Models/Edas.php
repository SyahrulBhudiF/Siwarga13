<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edas extends Model
{
    use HasFactory;

    protected $table = 'edas';
    protected $primaryKey = 'id_edas';
    protected $guarded = [
        'id_edas'
    ];
}
