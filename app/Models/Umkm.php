<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'umkm';
    protected $primaryKey = 'id_umkm';

    protected $guarded = [
        'id_umkm'
    ];

    /**
     * Get the file that owns the Umkm
     */
    public function file()
    {
        return $this->belongsTo(file::class, 'id_file', 'id_file');
    }
}
