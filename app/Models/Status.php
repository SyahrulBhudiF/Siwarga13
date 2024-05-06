<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';
    protected $primaryKey = 'id_status';

    protected $guarded = [
        'id_status'
    ];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'status_nikah',
        'status_peran',
        'status_hidup'
    ];

    /*
     *  Relationship to Warga
     * */
    public function warga(): hasOne
    {
        return $this->hasOne(Warga::class, 'id_status', 'id_status');
    }

}
