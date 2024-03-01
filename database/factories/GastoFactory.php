<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GastoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo' => $this->faker->word(),
            'monto' => $this->faker->randomFloat(2,50,1000),
            'descripcion' => $this->faker->sentence(3),
            'fecha_gasto' => $this->faker->dateTimeBetween('-1 week', '+1 week')
        ];
    }
}
