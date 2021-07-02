<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category, $subcategoria, $marca;

    public $view = 'grid';
    
    public function limpiar(){
        $this->reset(['subcategoria','marca']);
    }

    public function render(){
      /*  $products = $this->category->products()
                                    ->where('status','2')->paginate(8);*/

        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('id',$this->category->id);
        });

        if ($this->subcategoria){
            $productsQuery = $productsQuery->whereHas('subcategory',function(Builder $query){
                $query->where('name', $this->subcategoria);
            });
        }
        if ($this->marca){
            $productsQuery = $productsQuery->whereHas('brand',function(Builder $query){
                $query->where('name', $this->marca);
            });
        }

        $products = $productsQuery->paginate(8);
        return view('livewire.category-filter',compact('products'));

    }
}
