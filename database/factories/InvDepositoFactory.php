<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvDeposito>
 */
class InvDepositoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(20),
            'acronimo' => $this->faker->text(10),
            'tipo' => rand(1, 2),
            'condicion' => rand(1, 2),
            'descripcion' => $this->faker->sentence(),
            'empresa_id' => $this->faker->numberBetween(1,2),
            'user_id' => $this->faker->numberBetween(1,2),
        ];
    }
}
