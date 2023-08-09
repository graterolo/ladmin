<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
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
            'serial' => $this->faker->text(20),
            'categoria_id' => $this->faker->numberBetween(1,3),
            'unidad_id' => $this->faker->numberBetween(1,3),
            'marca_id' => $this->faker->numberBetween(1,3),
            'activo' => $this->faker->numberBetween(0,1),
            'costo' => $this->faker->numberBetween(0.10,5.99),
            'utilidad1' => $this->faker->numberBetween(0.01,0.20),
            'utilidad2' => $this->faker->numberBetween(0.21,0.30),
            'utilidad3' => $this->faker->numberBetween(0.31,0.40),
            'utilidad4' => $this->faker->numberBetween(0.41,0.50),
            'precio1' => $this->faker->numberBetween(5.00,6.99),
            'precio2' => $this->faker->numberBetween(7.00,8.99),
            'precio3' => $this->faker->numberBetween(9.00,11.99),
            'precio4' => $this->faker->numberBetween(12.00,15.99),
            'exento' => $this->faker->numberBetween(0,1),
            'descripcion' => $this->faker->sentence(),
            'empresa_id' => $this->faker->numberBetween(1,2),
            'url_img' => "/images/productos/no-product.png",
            'user_id' => $this->faker->numberBetween(1,2),
        ];
    }
}
