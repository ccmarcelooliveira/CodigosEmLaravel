<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Oficina>
 */
class OficinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           
            'CmpOficina' => fake()->name(),
            'CmpCnpj' => fake()->name(),
            'CmpEndereco' => fake()->name(),
            'CmpEmail' => fake()->unique()->safeEmail(),
            'CmpDataInclusao' => now(),
            'CmpStatus' => 'ATV',
            //'token' => fake()->unique(),
           
        ];
    }
}
