<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $categories = category::all();
        return view('welcome', compact('categories'));
    }
}
