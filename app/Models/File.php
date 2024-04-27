<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'file';
    protected $primaryKey = 'id_file';

    protected $guarded = [
        'id_file'
    ];

    /**
     * Get all of the comments for the File
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function umkm()
    {
        return $this->hasMany(Umkm::class, 'id_file', 'id_file');
    }

    /**
     * Get all of the comments for the File
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class, 'id_file', 'id_file');
    }

    /**
     * Get all of the comments for the File
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengumuman()
    {
        return $this->hasMany(Pengumuman::class, 'id_file', 'id_file');
    }
}
