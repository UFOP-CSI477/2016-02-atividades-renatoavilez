<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exame extends Model
{
    public function procedimento(){
        return $this->belongsTo('App\Procedimento', 'procedimento_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'paciente_id');
    }
}
