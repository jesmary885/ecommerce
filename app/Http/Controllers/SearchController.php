<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request){

        $name = $request->name; //aca rescato lo que tiene el input que le colocamos de nombre name

        $products = Product::where('name', 'LIKE' , "%" . $name . "%")
                                ->where('status',2)
                                ->paginate(8);

        return view('search',compact('products'));
    }
}
