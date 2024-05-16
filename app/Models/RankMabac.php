<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RankMabac extends Model
{
    use HasFactory;

    protected $table = 'rank_mabac';
    protected $primaryKey = 'id_rankMabac';
    protected $guarded = [
        'id_rankMabac'
    ];

    /**
     *  Relationship to Keluarga
     */
    public function keluarga(): belongsTo
    {
        return $this->belongsTo(Keluarga::class, 'id_keluarga', 'id_keluarga');
    }
}
