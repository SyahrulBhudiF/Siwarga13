<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Warga extends Model
{
    use HasFactory;

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

}
