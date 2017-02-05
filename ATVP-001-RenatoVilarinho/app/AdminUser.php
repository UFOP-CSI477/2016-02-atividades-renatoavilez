<?php

namespace App;

class AdminUser extends Authenticatable
{
    protected $table = "admin_users";

    public function procedimento(){
        return $this->hasMany('App\Procedimento');
    }
}
