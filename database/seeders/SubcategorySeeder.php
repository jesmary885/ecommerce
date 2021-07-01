<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        $subcategories = [
            //Categoria Material de oficina y papelería
            [
               'category_id' => 1,
               'name' => 'Bolígrafos y Recambios',
               'slug' => Str::slug('Bolígrafos y Recambios'),
               'color' => true 
            ],
            [
                'Category_id' => 1,
                'name' => 'Carpetas y sobres',
                'slug' => Str::slug('Carpetas y sobres'),
                'color' => true 
            ],
            [
                'Category_id' => 1,
                'name' => 'Cintas adhesivas y Cola blanca',
                'slug' => Str::slug('Cintas adhesivas y Cola blanca')
            ],

            [
                'Category_id' => 1,
                'name' => 'Hojas de papel de fotocopiadora',
                'slug' => Str::slug('Hojas de papel de fotocopiadora')
            ],

            //Categoria Material escolar
            [
                'category_id' => 2,
                'name' => 'Calculadoras escolares',
                'slug' => Str::slug('Calculadoras escolares'),
            ],
            [
                'Category_id' => 2,
                'name' => 'Juegos de regla y escuadras',
                'slug' => Str::slug('Juegos de regla y escuadras')
            ],
            [
                'Category_id' => 2,
                'name' => 'Cuadernos',
                'slug' => Str::slug('Cuadernos')
            ],
            //Categoria Libreria
            [
                'category_id' => 3,
                'name' => 'Literatura',
                'slug' => Str::slug('Literatura'),
                'author' => true
            ],
            [
                'Category_id' => 3,
                'name' => 'Infantil',
                'slug' => Str::slug('Infantil'),
                'author' => true
            ],
            [
                'Category_id' => 3,
                'name' => 'Idiomas',
                'slug' => Str::slug('Idiomas'),
                'author' => true
            ],
            //Uniformes escolares
            [
                'category_id' => 4,
                'name' => 'Franelas',
                'slug' => Str::slug('Franelas'),
                'color' => true,
                'size' => true
            ],
            [
                'Category_id' => 4,
                'name' => 'Pantalones',
                'slug' => Str::slug('Pantalones'),
                'color' => true,
                'size' => true
            ],
            [
                'Category_id' => 4,
                'name' => 'Sueter',
                'slug' => Str::slug('Sueter'),
                'color' => true,
                'size' => true
            ],
         ];

         foreach ($subcategories as $subcategory){
            Subcategory::factory(1)->create($subcategory);
         }
    }
}
