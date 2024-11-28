<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->paragraph(),
            'stock_actual' => $this->faker->randomFloat(3, 0, 1000),
            'precio' => $this->faker->randomFloat(3, 10, 100),
            'category_id' => Category::factory(), 
        ];
    }
}
