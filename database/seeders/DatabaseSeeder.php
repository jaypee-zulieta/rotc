<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\BirthDetails;
use App\Models\StudentCadet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::transaction(function () {
            $address = Address::firstOrCreate([
                'unit_number' => 'lot 2',
                'street_name' => 'Ruby street',
                'purok' => 'Purok 12',
                'barangay' => 'Manga',
                'municipality_or_city' => 'Pagadian City',
                'province' => 'Zamboanga del Sur',
                'zip_code' => '7016',
            ]);

            $birthDetails = BirthDetails::create([
                'date_of_birth' => '2006-05-15',
                'address_id' => $address->id
            ]);

            $studentCadet = StudentCadet::create([
                'student_number' => '300944',
                'first_name' => 'Jaypee',
                'middle_name' => 'Pagalan',
                'last_name' => 'Zulieta',
                'complexion' => 'brown',
                'blood_type' => 'O',
                'birth_details_id' => $birthDetails->id,
                'sex' => 'Male'
            ]);
        });
    }
}
