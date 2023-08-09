<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventario>
 */
class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'name' => $this->faker->text(20),
            'empresa_id' => $this->faker->numberBetween(1,2),
            'deposito_id' => $this->faker->numberBetween(1,2),
            'producto_id' => $this->faker->numberBetween(1,3),
            'cantidad' => $this->faker->numberBetween(1,10),
            'activo' => 1,
            'limite_stock' => rand(10, 20),
            'user_id' => $this->faker->numberBetween(1,2),
        ];
    }
}
