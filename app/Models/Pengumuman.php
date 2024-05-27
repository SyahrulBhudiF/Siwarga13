<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengumuman extends Model
{
    use HasFactory;

//    public $timestamps = false;

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
    public function file(): hasOne
    {
        return $this->hasOne(File::class, 'id_pengumuman', 'id_pengumuman');
    }
}
