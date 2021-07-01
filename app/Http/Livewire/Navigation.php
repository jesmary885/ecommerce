<?php

namespace App\Http\Livewire;

use App\Models\category;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $categories = category::all();
        return view('livewire.navigation',compact('categories'));
    }
}
