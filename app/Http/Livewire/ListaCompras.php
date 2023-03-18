<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListaCompras extends Component
{
    public $item    = '';
    public $valor   = '';
    public $quant   = '';
    public $soma    = 0;
    public $lista   = [];
    public $count   = [];

    public $key;
    public $acao = 'cadastrar';

    public function render()
    {
        return view('livewire.lista-compras');
    }

    public function add() 
    {
        $item   = $this->item;
        $valor  = $this->valor;
        $quant  = $this->quant;
        $lis    = compact('item', 'valor', 'quant');
        $cou    = compact('item', 'valor', 'quant');
        array_unshift($this->lista, $lis); //PHP=> array_unshift: adiciona no inicio da lista
        array_unshift($this->count, $cou);
       

       
        //array_push($this->lista, $this->item); //PHP=> array_push: adiciona no fim da lista
        
        $this->reset('item');
        $this->reset('valor');
        $this->reset('quant');
    }

    public function resetlist() 
    {
        unset($this->lista);
        $this->lista = [];
        $this->reset('soma');
        $this->reset('quant');
    }

    public function delete($key)
    {
        unset($this->lista[$key]);
        unset($this->count[$key]);
    }

    public function edit($key)
    {
        
        $this->key = $key;
        $this->acao = 'atualizar';
        $this->item = $this->lista[$key]['item'];
        $this->valor = $this->lista[$key]['valor'];
        $this->quant = $this->lista[$key]['quant'];
        //dd($this->valor);
    }

    public function update($key)
    {
        //dd($this->item);
        //dd($key);
        $this->lista = array_replace($this->lista, [$key => ['item' => $this->item, 'valor' => $this->valor, 'quant' => $this->quant]]); //PHP=> array_replace: substitui no array lista pelo item referente a key.
        //dd($this->lista);
        $this->reset('item');
        $this->reset('valor');
        $this->reset('quant');
        $this->acao = 'cadastrar';
    }

    public function total() 
    {
        if($this->soma == 0){
            foreach ($this->count as $key => $value) {
                $this->count[$key]['valor'] = $value['valor'] * $value['quant'];
                //$this->lista[$key]['valor'] = $value['valor'] * $value['quant'];
                ///$this->lista = array_replace($this->lista,  ['valor'=>$value]); 
            }
            foreach ($this->count as $key => $valor ){
                $this->soma += $valor['valor'];
            }
            //dd($this->soma);
            //dd($this->lista, $this->soma);
        }
            /*if($this->soma == 0){
                
                foreach ($this->count as $key => $valor ){
                    $this->soma += $valor['valor'];
                }*/
            

            //dd($this->soma);
             else {
                $this->soma = 0;
                    
                foreach($this->lista as $key => $value){
                    $this->count[$key]['valor'] = $this->lista[$key]['valor'];
                    $this->count[$key]['quant'] = $this->lista[$key]['quant'];
                    $this->count[$key]['valor'] = $value['valor'] * $value['quant'];
                }
                
                foreach ($this->count as $key => $valor ){
                    $this->soma += $valor['valor'];
                } 
                //dd($this->count, $this->lista, $this->soma);
            
        }
    }
}
