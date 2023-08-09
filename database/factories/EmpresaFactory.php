<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->text(20),
            'acronimo' => $this->faker->text(10),
            'rif' => $this->faker->text(12),
            'telef' => $this->faker->e164phoneNumber,
            'direccion' => $this->faker->sentence(),
            'email' => $this->faker->email,
            'tipo' => rand(1, 2),
            'descripcion' => $this->faker->sentence(),
            //'user_id' => $this->faker->numberBetween(1,2),

        ];
    }
}
