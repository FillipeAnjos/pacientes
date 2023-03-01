<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdmModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->userName,
            'email' => $this->faker->safeEmail,
            'password' => $this->faker->password,
        ];
    }
}
