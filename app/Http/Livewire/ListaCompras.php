<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListaCompras extends Component
{
    public $item;
    public $lista = ['Bolo', 'Alface', 'Batata', 'Repolho', 'Coca', 'Fanta'];

    public $key;
    public $acao = 'cadastrar';

    public function render()
    {
        return view('livewire.lista-compras');
    }

    public function add() 
    {
        array_unshift($this->lista, $this->item); //PHP=> array_unshift: adiciona no inicio da lista
        //array_push($this->lista, $this->item); //PHP=> array_push: adiciona no fim da lista
        $this->reset('item');
    }

    public function resetlist() 
    {
        unset($this->lista);
        $this->lista = [];
    }

    public function delete($key)
    {
        unset($this->lista[$key]);
    }

    public function edit($key)
    {
        $this->key = $key;
        $this->acao = 'atualizar';
        $this->item = $this->lista[$key];
    }

    public function update()
    {
        $this->lista = array_replace($this->lista, [$this->key => $this->item]); //PHP=> array_replace: substitui no array lista pelo item referente a key.
        $this->reset('item');
        $this->acao = 'cadastrar';
    }
}
