<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function umkm(): belongsTo
    {
        return $this->belongsTo(Umkm::class, 'id_file', 'id_file');
    }

    /**
     * Get all of the comments for the File
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function dokumentasi(): belongsTo
    {
        return $this->belongsTo(Dokumentasi::class, 'id_file', 'id_file');
    }

    /**
     * Get all of the comments for the File
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function pengumuman(): belongsTo
    {
        return $this->belongsTo(Pengumuman::class, 'id_file', 'id_file');
    }
}
