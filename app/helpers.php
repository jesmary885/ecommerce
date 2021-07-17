<?php

use App\Models\Product;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;

function quantity($product_id, $color_id=null, $size_id=null){

    $product = Product::find($product_id); //busco en el modelo product el producto que tiene el id del producto que seleccione

    if($size_id){
        $size=Size::find($size_id); //busco en el modelo talla el id de la talla que seleccione
        $quantity=$size->colors->find($color_id)->pivot->quantity; //busco en la tabla relacional entre talla y color, el color escogido y rescato la cantidad de ese producto
    }
    elseif($color_id){
        $quantity=$product->colors->find($color_id)->pivot->quantity; //busco en la tabla relacional entre producto y color, el color escogido y rescato la cantidad de ese producto
    }
    else{
        $quantity=$product->quantity;
    }

    return $quantity;
}

function qty_added($product_id, $color_id=null, $size_id=null){
    $cart=Cart::content(); //todos los items del carrito

    $item=$cart->where('id', $product_id)
                ->where('options.color_id', $color_id)
                ->where('options.size_id', $size_id)
                ->first();

    if($item){
        return $item->qty;
    }else{
        return 0;
    }
}

function qty_available($product_id, $color_id=null, $size_id=null){

    return quantity($product_id, $color_id, $size_id) - qty_added($product_id, $color_id, $size_id);

}