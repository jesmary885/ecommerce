<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(category $category){
        return view('categories.show',compact('category'));
    }
}
