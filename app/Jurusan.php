<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    public function prodis()
    {
        return $this->hasMany('App\Prodi');
    }
    public function profilJurusan(){
        return $this->belongsTo('Profil','jurusan_id','id');
    }
}
