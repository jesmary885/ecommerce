<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name','product_id'];

    //Relacion uno a muchos inversa
    public function product(){
        return $this->belongsTo(Product::class);
    }
}

