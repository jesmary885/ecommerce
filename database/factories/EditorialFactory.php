<?php

namespace Database\Factories;

use App\Models\Editorial;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class EditorialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Editorial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'product_id' => Product::all()->random()->id /*aca accedo al modelo Product, Selecciono todos los campos y al azar escojo uno y tomo su id*/
        ];
    }
}
