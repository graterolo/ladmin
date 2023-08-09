<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProdCategoria>
 */
class ProdCategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //codigo, name, descripcion, empresa_id
            'codigo' => $this->faker->text(10),
            'name' => $this->faker->name,
            'descripcion' => $this->faker->sentence(),
            'empresa_id' => $this->faker->numberBetween(1,2),
            'user_id' => $this->faker->numberBetween(1,2),
        ];
    }
}
