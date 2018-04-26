<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table='pengajuans';
    public function profils()
    {
        return $this->belongsTo('App\Profile');
    }

    public function mitras()
    {
        return $this->hasMany('App\Mitra');
    }
    public function anggotas()
    {
        return $this->hasMany('App\Anggota');
    }

    public function waktus()
    {
        return $this->belongsTo('App\WaktuPengajuan');
    }
}
