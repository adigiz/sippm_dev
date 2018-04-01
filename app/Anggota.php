<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [
        'pengajuan_id', 'profil_id',
    ];

    public function pengajuans()
    {
        return $this->belongsTo('App\Pengajuan');
    }
}
