<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItem extends Component
{
    public $qty = 1; //contador de boton de incremento y decremento
    public $product; //aca estoy recibiendo la variable product de la vista show.product
    public $quantity; //me tomara la cant d eproductos en stock
    public $options = [];

    public function mount(){
        $this->quantity = $this->product->quantity;
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }

    public function addItem(){
        Cart::add([ 'id' => $this->product->id, 
                    'name' => $this->product->name,
                    'qty' => $this->quantity,
                    'price' => $this->product->price,
                    'weight' => 315,
                    //'options' => ['image' => $this->product->options]
                    'options' => $this->options
        ]);


    }

    public function decrement(){
        $this->qty = $this->qty - 1;

    }

    public function increment(){
        $this->qty = $this->qty + 1;
    }


    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
