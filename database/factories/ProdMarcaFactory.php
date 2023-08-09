<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProdMarca>
 */
class ProdMarcaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'supervisado' => $this->faker->numberBetween(0,1),
            'descripcion' => $this->faker->sentence(),
            'empresa_id' => $this->faker->numberBetween(1,2),
            'user_id' => $this->faker->numberBetween(1,2),
        ];
    }
}
