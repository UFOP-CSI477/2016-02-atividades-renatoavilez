<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function categoriaProduto(){
        //return $this->belongsTo('App\CategoriaProduto');
        return $this->belongsTo('App\CategoriaProduto', 'categoriaProduto_id');
    }

    public function categoriaPreco(){
        return $this->belongsTo('App\CategoriaPreco', 'categoriaPreco_id');
    }
}
