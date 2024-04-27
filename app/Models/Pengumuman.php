<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pengumuman';
    protected $primaryKey = 'id_pengumuman';

    protected $guarded = [
        'id_pengumuman'
    ];

    /**
     * Get the file that owns the Pengumuman
     */
    public function file()
    {
        return $this->belongsTo(File::class, 'id_file', 'id_file');
    }
}
