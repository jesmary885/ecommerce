<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItemColor extends Component
{
    public $qty = 1; //contador de boton de incremento y decremento
    public $product, $colors; /*aca estoy recibiendo la variable product de la vista show.product, color toma los colores asociados
    a ese producto para llenar el select*/
    public $color_id =""; //tomara el color que seleccionemos en el select de la vista
    public $quantity=0; //me tomara la cant d eproductos en stock
    public $options = [
        'size_id' => null
    ];

    public function decrement(){
        $this->qty = $this->qty - 1;

    }

    public function increment(){
        $this->qty = $this->qty + 1;
    }


    public function mount(){
        $this->colors=$this->product->colors; //la propiedad colors es = a la relacion entre product y color, es decir todos los colores asociados a ese producto
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }

    public function addItem(){
        Cart::add([ 'id' => $this->product->id, 
                    'name' => $this->product->name,
                    'qty' => $this->qty,
                    'price' => $this->product->price,
                    'weight' => 315,
                    //'options' => ['image' => $this->product->options]
                    'options' => $this->options
        ]);
        $this->quantity=qty_available($this->product->id, $this->color_id);
        $this->reset('qty');
        $this->emitTo('dropdown-cart','render');
    }

    public function updatedColorId($value){
        $color=$this->product->colors->find($value); /*aca estoy rescatando otra vez los colores asociados a ese producto y 
        con el find estoy buscando cual coincide con el que acabo de seleccionar en el select y lo estoy almacenando en la variable color*/
       // $this->quantity=$color->pivot->quantity; //aca estamos accediendo a la tabla pivote entre productos y colores para tomar la cant. disponible de ese producto
       $this->quantity=qty_available($this->product->id, $color->id);
        $this->options['color'] = $color->name; 
        $this->options['color_id'] = $color->id;
    }

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }
}
