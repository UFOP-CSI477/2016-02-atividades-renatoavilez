<?php

namespace App;

class Carrinho{

    public $itens = null;
    public $totalQtd = 0;
    public $totalPreco = 0;

    public function __construct($carrinhoVelho)
    {
        if($carrinhoVelho){
            $this->itens = $carrinhoVelho->itens;
            $this->totalQtd = $carrinhoVelho->totalQtd;
            $this->totalPreco = $carrinhoVelho->totalPreco;
        }
    }

    public function add($item, $id){
        $itemArmazenado = ['qtd' => 0, 'preco' => $item->preco, 'item' => $item];

        if ($this->itens){
            if(array_key_exists($id, $this->itens)){
                $itemArmazenado = $this->itens[$id];
            }
        }

        $itemArmazenado['qtd']++;
        $itemArmazenado['preco'] = $item->preco * $itemArmazenado['qtd'];
        $this->itens[$id] = $itemArmazenado;
        $this->totalQtd++;
        $this->totalPreco += $item->preco;
    }
}

