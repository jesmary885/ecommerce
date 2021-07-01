<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence();
        /*$url = no se si aqui deba generar la imagen y luego en el return llamar al modelo 
        imageable y asignar esa url a la tabla imageable y colocarle imageable type el del product
        y el imageable ud acceder al registro id del que se esta agrehando en ese momenyo*/
        $subcategory = Subcategory::all()->random(); //se selecciona una subcategoria al azar
        $category = $subcategory->category; //se accede a la relacion que hay entre esa subcategoria y categoria para saber a que categoria pertenece
        $brand = $category->brands->random(); /*accedo a la relacion entre esa categoria y marcas y escojo con el metodo random una marca al azar de 
        todas las que estan en esa coleccion*/
        if($subcategory->color){ //sto quiere decir que si el color es igual a true sin colocar ==true
            $quantity = null; //para esto debo indicar en la migracion de product que este campo puede llevar el valor null
        }
        else{
                $quantity = 5;
        }
        return [
            'name' => $name,
            'slug'=> Str::slug($name), //aqui llamo a la clase str y accedemos al metodo slug
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement([19.99 , 49.99, 99.99]),
            /*La cantidad va a depender del tipo de producto, va a haber veces que la cantidad se va a almacenar aqui, si el producto no tiene color ni talla, 
            si tiene color pero no tiene talla se almacena en la tabla color_product, y si tiene talla y color se almacenara en la tabla color_size, entonces, tenemos que 
            colocar una condicional, en donde si la subcategoria a la cual pertenece ese producto tiene color entonces quantity se va a agregar en null y de lo contrario
            agregamos un numero */
            'quantity' => $quantity,
            'subcategory_id'=>$subcategory->id,
            'brand_id'=> $brand->id,
            'status' => 2 //todos los vamos a poner como publicados
        ];
       
        
    }
}
