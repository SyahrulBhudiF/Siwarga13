<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Umkm extends Model
{
    use HasFactory;

    public $timestamps = false;

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
    public function file(): hasMany
    {
        return $this->hasMany(file::class, 'id_file', 'id_file');
    }
}
