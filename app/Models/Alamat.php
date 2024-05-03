<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Alamat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alamat';
    protected $primaryKey = 'id_alamat';

    protected $guarded = [
        'id_alamat'
    ];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'alamat',
        'rt'
    ];

    /*
     *  Relationship to Warga
     * */
    public function warga(): hasOne
    {
        return $this->hasOne(Warga::class, 'id_alamat', 'id_alamat');
    }

}
