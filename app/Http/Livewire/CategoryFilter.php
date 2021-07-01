<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category, $subcategorias, $marcas;
    

    public function render()
    {
        $products = $this->category->products()
                                    ->where('status','2')->paginate(8);
        return view('livewire.category-filter',compact('products'));

    }
}
