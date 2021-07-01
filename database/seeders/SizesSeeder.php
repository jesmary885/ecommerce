<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Builder;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sizes = ['S','M','L','XL'];
        $products = Product::whereHas('Subcategory', function(Builder $query){
            $query->where('color',true)->where('size',true);
        })->get();

        foreach ($products as $product){
            foreach ($sizes as $size){
                $sizeg = Size::create(['name' => $size, 'product_id' => $product->id]);
                $colors = Color::all();
                foreach ($colors as $color){
                    $color->sizes()->attach([$sizeg->id => ['quantity' => 5]]);
                }
            }
        }
    }
}
