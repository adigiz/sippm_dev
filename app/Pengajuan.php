<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table='pengajuans';
    public function profils()
    {
        return $this->belongsTo('App\Profile','profil_id');
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
    public function kelengkapans(){
        return $this->hasOne('App\Kelengkapan');
    }

    public function hakis(){
        return $this->hasMany('App\Haki');
    }
    public function publikasis(){
        return $this->hasMany('App\Publikasi');
    }
    public function pertemuans(){
        return $this->hasMany('App\PertemuanIlmiah');
    }
    public function prototypes(){
        return $this->hasMany('App\Prototype');
    }
}
