<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement([
                'Maths',
                'English',
                'Science',
                'Music',
                'Chemistry',
                'Physics',
                'Biology',
                'Further-Maths',
            ])
        ];
    }
}
