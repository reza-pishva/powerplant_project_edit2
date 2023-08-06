<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'father_job' => $this->faker->title(),
            'mother_job' => $this->faker->title(),
            'father_phone_number' => $this->faker->PhoneNumber(),
            'mother_phone_number' => $this->faker->PhoneNumber(),
            'address' => $this->faker->text(),
            'consideration' => $this->faker->text(),
            'birthday' => str_repeat($this->faker->randomDigit(),8),
            'major' => $this->faker->title(),
            'user_id' => 44,
        ];
    }
}
