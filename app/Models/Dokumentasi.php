<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function file()
    {
        return $this->belongsTo(file::class, 'id_file', 'id_file');
    }
}
