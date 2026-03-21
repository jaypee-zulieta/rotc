<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "unit" => $this->faker->optional()->buildingNumber(),
            "street_name" => $this->faker->optional()->streetName(),
            "purok" => $this->faker->optional()->streetSuffix(),
            "barangay" => $this->faker->optional()->citySuffix(),
            "municipality_or_city" => $this->faker->city(),
            "province" => $this->faker->state(),
            "zip_code" => $this->faker->postcode(),
            "telephone_number" => $this->faker->optional()->phoneNumber(),
        ];
    }
}
