<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BirthDetails;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentCadet>
 */
class StudentCadetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "student_number" => $this->faker->unique()->numerify('S-#####'),
            "first_name" => $this->faker->firstName(),
            "middle_name" => $this->faker->optional()->firstName(),
            "last_name" => $this->faker->lastName(),
            "suffix" => $this->faker->optional()->suffix(),
            "complexion" => $this->faker->randomElement(['Fair', 'Medium', 'Dark']),
            "blood_type" => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            "sex" => $this->faker->randomElement(['Male', 'Female']),
            "birth_details_id" => BirthDetails::factory(),
        ];
    }
}
