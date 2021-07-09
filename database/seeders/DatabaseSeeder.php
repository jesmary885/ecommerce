<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Editorial;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Storage::deleteDirectory('/products');
        Storage::deleteDirectory('/categorys');
        Storage::deleteDirectory('/subcategorys');
        Storage::makeDirectory('/products');
        Storage::makeDirectory('/categorys');
        Storage::makeDirectory('/subcategorys');
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(ColorProductSeeder::class);
        $this->call(SizesSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(ColorSizeSeeder::class);
    }
}
