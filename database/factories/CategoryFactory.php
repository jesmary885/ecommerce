<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
 
    protected $model = Category::class;

    public function definition()
    {
        return [
            'image' => 'categorys/'. $this->faker->image('public/storage/categorys',640,480, null, false)
        ];
    }
}

