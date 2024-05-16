<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';
    protected $primaryKey = 'id_keluarga';
    protected $guarded = [
        'id_keluarga'
    ];

    /**
     *  Relationship to Warga
     */
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'id_warga', 'id_warga');
    }

    /**
     *  Relationship to RankEdas
     */
    public function rankEdas(): hasOne
    {
        return $this->hasOne(RankEdas::class, 'id_keluarga', 'id_keluarga');
    }

    /**
     *  Relationship to RankMabac
     */
    public function rankMabac(): hasOne
    {
        return $this->hasOne(RankMabac::class, 'id_keluarga', 'id_keluarga');
    }
}
