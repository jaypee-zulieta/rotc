<?php

namespace Database\Seeders;

use App\Models\Registration;
use Database\Factories\RegistrationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Registration::factory()->count(587)->create();
    }
}
