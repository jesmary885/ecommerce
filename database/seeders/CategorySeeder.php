<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\category;
use PhpParser\Node\Stmt\Foreach_;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Material de oficina y papeleria',
                'slug' => Str::slug('Material de oficina y papeleria'),
                'icon' => '<i class="fas fa-paste"></i>'
            ],
            [
                'name' => 'Material escolar',
                'slug' => Str::slug('Material escolar'),
                'icon' => '<i class="fas fa-book-reader"></i>'
            ],
            [
                'name' => 'Libreria',
                'slug' => Str::slug('Libreria'),
                'icon' => '<i class="fas fa-book"></i>'
            ],
            [
                'name' => 'Uniformes escolares',
                'slug' => Str::slug('Uniformes escolares'),
                'icon' => '<i class="fas fa-tshirt"></i>'
            ],
        ];

        
        foreach ($categories as $category){
            $category = Category::factory(1)->create($category)->first(); //con first estoy accediendo al primer registro

            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand){
                $brand->categories()->attach($category->id);
            }
        }
    }
}
