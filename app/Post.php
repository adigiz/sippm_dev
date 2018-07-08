<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = array('judul','isi','file');
    public $timestamps = true;
    public function Author(){
        return $this->belongsTo('Admin','users_id');
    }
}
