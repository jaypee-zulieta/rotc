<?php

namespace Database\Seeders;

use App\Models\StudentCadet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentCadetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentCadet::factory()->count(600)->create();
    }
}
