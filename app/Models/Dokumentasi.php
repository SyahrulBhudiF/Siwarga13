<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dokumentasi extends Model
{
    use HasFactory;

//    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dokumentasi';
    protected $primaryKey = 'id_dokumentasi';

    protected $guarded = [
        'id_dokumentasi'
    ];

    /**
     * Get the file that owns the Dokumentasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function file(): hasMany
    {
        return $this->hasMany(file::class, 'id_file', 'id_file');
    }
}
