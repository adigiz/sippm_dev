<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    public function jurusans(){
        return $this->belongsTo('Jurusan');
    }
    public function profilProdi(){
        return $this->belongsTo('Profil','prodi_id','id');
    }
}
