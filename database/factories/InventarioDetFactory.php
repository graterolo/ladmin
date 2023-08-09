<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InventarioDet>
 */
class InventarioDetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'inventario_id' => $this->faker->numberBetween(1,3),
            'fvence' => now(),
            'lote' => $this->faker->numberBetween(1,10),
            'cantidad' => rand(10, 20),
            'user_id' => $this->faker->numberBetween(1,2),
        ];
    }
}
