<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;


class AddCartItemSize extends Component
{
    public $product, $sizes;
    public $qty = 1; //contador de boton de incremento y decremento
    public $color_id =""; //tomara el color que seleccionemos en el select de la vista
    public $size_id ="";
    public $quantity=0; //me tomara la cant d eproductos en stock
    public  $colors= [];
    public $options = [];

    public function addItem(){
        Cart::add([ 'id' => $this->product->id, 
                    'name' => $this->product->name,
                    'qty' => $this->qty,
                    'price' => $this->product->price,
                    'weight' => 315,
                    'options' => $this->options
        ]);
        $this->quantity=qty_available($this->product->id, $this->color_id, $this->size_id);
        $this->reset('qty');
        $this->emitTo('dropdown-cart','render');
    }

    public function mount(){
        $this->sizes=$this->product->sizes; //obtengo las tallas asociadas a este producto
        $this->options['image'] = Storage::url($this->product->images->first()->url);

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
        $this->options['size_id'] = $size->id;
    }

    public function updatedColorId($value){
        
        $size = Size::find($this->size_id); //recupero la talla que tenemos seleccionado en el select el cual esta en size_id
        $color=$size->colors->find($value); /*aca estoy rescatando otra vez los colores asociados a ese producto y 
        con el find estoy buscando cual coincide con el que acabo de seleccionar en el select y lo estoy almacenando en la variable color*/
       // $this->quantity=$color->pivot->quantity; le asigno a quantity la cantidad de registros asociados a los productos 
        //con la relacion entre talla y colores y activo que en la pivote me tome la variable
        $this->quantity=qty_available($this->product->id, $color->id, $size->id);
        $this->options['color'] = $color->name; 
        $this->options['size'] = $size->name; 
        $this->options['color_id'] = $color->id;
    }

    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
