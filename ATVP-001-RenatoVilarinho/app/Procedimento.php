<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class procedimento extends Model
{
    public function exame(){
        return $this->hasMany('App\Exame');
    }

    public function adminUser(){
        return $this->belongsTo('App\AdminUser', 'usuario_id');
    }
}
