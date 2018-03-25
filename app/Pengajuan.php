<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    public function profils()
    {
        return $this->belongsTo('App\Profile');
    }
}
