<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaktuPengajuan extends Model
{
    public function pengajuans()
    {
        return $this->hasMany('App\Pengajuan','waktu_pengajuan_id','id');
    }
}
