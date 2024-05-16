<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Warga extends Model
{
    use HasFactory;

//    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'warga';
    protected $primaryKey = 'id_warga';

    protected $guarded = [
        'id_warga'
    ];


    /*
     *  Relationship to Alamat
     * */
    public function alamat(): belongsTo
    {
        return $this->belongsTo(Alamat::class, 'id_alamat', 'id_alamat');
    }

    /*
     *  Relationship to Status
     * */
    public function status(): belongsTo
    {
        return $this->belongsTo(Status::class, 'id_status', 'id_status');
    }

    /*
     *  Relationship to Keluarga
     * */
    public function keluarga(): HasOne
    {
        return $this->hasOne(Keluarga::class, 'id_warga', 'id_warga');
    }

}
