<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RankEdas extends Model
{
    use HasFactory;

    protected $table = 'rank_edas';
    protected $primaryKey = 'id_rankEdas';
    protected $guarded = [
        'id_rankEdas'
    ];

    /**
     *  Relationship to Keluarga
     */
    public function keluarga(): belongsTo
    {
        return $this->belongsTo(Keluarga::class, 'id_keluarga', 'id_keluarga');
    }
}
