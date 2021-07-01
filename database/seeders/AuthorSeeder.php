<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Editorial;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Builder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::whereHas('Subcategory', function(Builder $query){
            $query->where('author',true);
        })->get();

        foreach ($products as $product){
            Author::factory(1)->create(['product_id' => $product->id]);
            Editorial::factory(1)->create(['product_id' => $product->id]);
        }
    }
}
