<?php

namespace Database\Factories;

use App\Models\Registration;
use App\Models\StudentCadet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registration>
 */
class RegistrationFactory extends Factory
{
    protected $model = Registration::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $academicCourses = [
            "Bachelor in Science in Computer Science",
            "Bachelor in Science in Information Technology",
            "Bachelor in Library Information Science",
            "Bachelor in Science in Information Systems"
        ];

        $militaryCourses = [
            "Military Science 1",
            "Military Science 2",
            "Military Science 31",
            "Military Science 32",
            "Military Science 41",
            "Military Science 42"
        ];

        $religion = [
            'Christianity',
            'Islam',
            'Hinduism',
            'Buddhism',
            'Judaism',
            'Sikhism'
        ];

        return [
            "student_cadet_id" => StudentCadet::factory()->create(),
            "school" => $this->faker->company() . ' College',
            "academic_course" => $this->faker->randomElement($academicCourses),
            "military_course" => $this->faker->randomElement($militaryCourses),
            "religion" => $this->faker->randomElement($religion),
            "height_m" => $this->faker->randomFloat(2, 1.524, 2.2),
            "weight_kg" => $this->faker->randomFloat(1, 50, 120),
            "registration_date" => $this->faker->date(),
            "contact_number" => $this->faker->phoneNumber(),
            "semester" => $this->faker->randomElement(["1st Semester", "2nd Semester"]),
            "school_year" => $this->faker->randomElement(['SY 2024-2025', 'SY 2025-2026']),
            "is_willing_to_take_advance_course" => $this->faker->boolean()
        ];
    }
}
