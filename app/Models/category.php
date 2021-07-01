<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','image','icon'];

    //Relacion uno a muchos
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }
    //Relacion mucho a muchos
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }
    //Relación a traves de
    public function products(){
        return $this->hasManyThrough(Product::class,Subcategory::class);
    }

    //Url amigables

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
