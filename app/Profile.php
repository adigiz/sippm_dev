<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profils';
    public function  jurusans(){
        return $this->hasOne('App\Jurusan','id','jurusan_id');
    }

    public function prodis(){
        return $this->hasOne('App\Prodi','id','prodi_id');
    }

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function pengajuans(){
        return $this->hasMany('App\Pengajuan');
    }

}
