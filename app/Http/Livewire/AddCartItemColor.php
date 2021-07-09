<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItemColor extends Component
{
    public $qty = 1; //contador de boton de incremento y decremento
    public $product, $colors; /*aca estoy recibiendo la variable product de la vista show.product, color toma los colores asociados
    a ese producto para llenar el select*/
    public $color_id =""; //tomara el color que seleccionemos en el select de la vista
    public $quantity=0; //me tomara la cant d eproductos en stock

    public function decrement(){
        $this->qty = $this->qty - 1;

    }

    public function increment(){
        $this->qty = $this->qty + 1;
    }


    public function mount(){
        $this->colors=$this->product->colors;
    }

    public function updatedColorId($value){
        $this->quantity=$this->product->colors->find($value)->pivot->quantity;
    }

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }
}
