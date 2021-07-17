<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const BORRADOR=1;
    const PUBLICADO=2;

    protected $guarded = ['id','created_at','updated_at'];

    //Accesores

    public function getStockAttribute(){
        if ($this->subcategory->size) { /*aca verificamos si el producto tiene el valor de size en true
            aca accedemos al modelo color_size para hacer consultas a sus relaciones
            como no tenemos una relacion directa entre esta tabla pivote y product, sino que la tenemos entre size y product,
            entonces para hacer consultas a las relaciones, lo hacemos utilizando el metodo whereHas */
           /*aca vamos a pedir que primero verifique la relacion con size y luego con product, 
            luego colocamos una funcion y recibimos un objeto de tipo builder*/
            return ColorSize::whereHas('size.product',function(Builder $query){
                //aca me va a extraer todos los producto de Colorsise, cuyo id coincida con el id del modelo product
                $query->where('id',$this->id);//accedemos al objeto query y hacemos la consulta, ahora quiero que me sume todos los quantitys,
            })->sum('quantity');  //para ello le pasamoe el metodo sum y pedimos que sume el campo quantity
        } elseif($this->subcategory->color) { //aca verificamos si el producto tiene el valor de color en true
            return ColorProduct::whereHas('product',function(Builder $query){
                $query->where('id',$this->id);
            })->sum('quantity');
        }else{
            return $this->quantity;
        }
    }

    //Relacion uno a muchos inversa
   public function subcategory(){
    return $this->belongsTo(Subcategory::class);
   }
  
   public function brand(){
       return $this->belongsTo(Brand::class);
   }

   //Relacion uno a muchos 
   public function sizes(){
       return $this->hasMany(Size::class);
   }
   public function authors(){
    return $this->hasMany(Author::class);
    }
    public function editorials(){
        return $this->hasMany(Editorial::class);
    }

   //Relacion muchos a muchos

   public function colors(){
       return $this->belongsToMany(Color::class)->withPivot('quantity');
   }
   //Relacion 1:n Polimorfica

   public function images(){
       return $this->morphMany(Image::class, "imageable");
   }
   public function getRouteKeyName()
   {
       return 'slug';
   }

}


