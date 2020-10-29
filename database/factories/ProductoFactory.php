<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'titulo' => $this->faker->text(20),
            'descripcion' => $this->faker->text(30),
            'precio' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 1000)//numberBetween($min = 100, $max = 1000),
        ];
    }
}
