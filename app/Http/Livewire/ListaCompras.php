<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListaCompras extends Component
{
    public $item = '';
    public $valor= '';
    public $soma = 0;
    public $lista = [];

    public $key;
    public $acao = 'cadastrar';

    public function render()
    {
        return view('livewire.lista-compras');
    }

    public function add() 
    {
        $item = $this->item;
        $valor= $this->valor;
        $lis = compact('item', 'valor');
        array_unshift($this->lista, $lis); //PHP=> array_unshift: adiciona no inicio da lista
        //dd($lis);
        //array_push($this->lista, $this->item); //PHP=> array_push: adiciona no fim da lista
        $this->reset('item');
        $this->reset('valor');
    }

    public function resetlist() 
    {
        unset($this->lista);
        $this->lista = [];
        $this->reset('soma');
    }

    public function delete($key)
    {
        unset($this->lista[$key]);
    }

    public function edit($key)
    {
        
        $this->key = $key;
        $this->acao = 'atualizar';
        $this->item = $this->lista[$key]['item'];
        $this->valor = $this->lista[$key]['valor'];
        //dd($this->valor);
    }

    public function update($key)
    {
        //dd($this->item);
        //dd($key);
        $this->lista = array_replace($this->lista, [$key => ['item' => $this->item, 'valor' => $this->valor]]); //PHP=> array_replace: substitui no array lista pelo item referente a key.
        //dd($this->lista);
        $this->reset('item');
        $this->reset('valor');
        $this->acao = 'cadastrar';
    }

    public function total() 
    {
        foreach ($this->lista as $key => $valor ){
            $this->soma += $valor['valor'];
        }
    }
}
