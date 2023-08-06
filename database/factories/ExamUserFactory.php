<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExamUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'score' => 19.5,
            'date_shamsi' => 14020215,
            'user_id' => 1,
            'exam_id' => 1,
        ];
    }
}
