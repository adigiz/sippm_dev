<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelengkapan extends Model
{
    public function pengajuans(){
        return $this->belongsTo('App\Pengajuan');
    }
}
