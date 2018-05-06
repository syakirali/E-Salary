<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    public $incrementing = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'absensi';
    protected $primaryKey = ['pegawai_id', 'tanggal'];

    /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
    public $timestamps = false;

    public function pegawai(){
        return $this->hasOne('App\Pegawai', 'id', 'pegawai_id');
    }
}
