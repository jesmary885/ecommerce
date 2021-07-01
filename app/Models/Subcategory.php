<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    //Relacion inversa uno a muchos
    public function category(){
        return $this->belongsTo(category::class);
    }
    //Relacion uno a muchos
    public function Products(){
        return $this->hasMany(Product::class);
    }

}
