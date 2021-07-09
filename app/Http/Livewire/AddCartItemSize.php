<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;
use Gloudemans\Shoppingcart\Cart;

class AddCartItemSize extends Component
{
    public $product, $sizes;
    public $qty = 1; //contador de boton de incremento y decremento
    public $color_id =""; //tomara el color que seleccionemos en el select de la vista
    public $size_id ="";
    public $quantity=0; //me tomara la cant d eproductos en stock
    public  $colors= [];

    public function mount(){
        $this->sizes=$this->product->sizes; //obtengo las tallas asociadas a este producto

    }
    public function decrement(){
        $this->qty = $this->qty - 1;

    }
    public function increment(){
        $this->qty = $this->qty + 1;
    }
    public function updatedSizeId($value){ //metodo que me tomara los colores asociados a la talla que seleccionare
        $size = Size::find($value); //size sera igual a la talla que acabamos de seleccionar en el select
        $this->colors=$size->colors; //ahora a colors le vamos a asignar la relacion entre la talla y colores para traerme los colores asociados a esa talla
    }

    public function updatedColorId($value){
        $size = Size::find($this->size_id); //recupero la talla que tenemos seleccionado en el select el cual esta en size_id
        $this->quantity=$size->colors->find($value)->pivot->quantity; /*le asigno a quantity la cantidad de registros asociados a los productos 
        con la relacion entre talla y colores y activo que en la pivote me tome la variable*/
    }

    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
