<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PertemuanIlmiah extends Model
{
    public function profils(){
        return $this->belongsTo('App\Profile', 'profil_id');
    }
}
