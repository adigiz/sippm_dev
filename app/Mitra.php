<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $table = 'mitras';
    public function pengajuans()
    {
        return $this->belongsTo('App\Pengajuan');
    }
}
