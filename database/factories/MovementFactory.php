<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movement>
 */
class MovementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cantidad = $this->faker->randomFloat(3, 1, 100);
        $precio = $this->faker->randomFloat(3, 10, 100);

        return [
            'product_id' => Product::factory(),
            'tipo' => $this->faker->randomElement(['entrada', 'salida']),
            'cantidad' => $cantidad,
            'precio' => $precio,
            'subtotal' => $cantidad * $precio,
            'user_id' => User::factory(), 
        ];
    }
}
