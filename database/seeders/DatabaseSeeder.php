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
            $birthPlace = Address::firstOrCreate([
                "unit" => "CDO Maternity Children's Hospital",
                "municipality_or_city" => "Cagayan de Oro City",
                "province" => "Misamis Oriental",
                "zip_code" => "9000"
            ]);

            $birthDetails = BirthDetails::create([
                "date_of_birth" => "2003-12-20",
                "address_id" => $birthPlace->id
            ]);

            $studentCadet = StudentCadet::create([
                "student_number" => "300943",
                "first_name" => "Jaypee",
                "middle_name" => "Pagalan",
                "last_name" => "Zulieta",
                "suffix" => null,
                "complexion" => "Brown",
                "blood_type" => "O",
                "sex" => "Male",
                "birth_details_id" => $birthDetails->id
            ]);

            $registration = $studentCadet->registrations()->create([
                "school" => "Saint Columban College",
                "academic_course" => "Bachelor of Science in Computer Science",
                "military_course" => "Military Science 1",
                "religion" => "Roman Catholic",
                "height_m" => 1.75,
                "weight_kg" => 70,
                "registration_date" => "2022-06-01",
                "contact_number" => "09123456789",
                "semester" => "1st Semester",
                "school_year" => "SY 2024-2025",
                "is_willing_to_take_advance_course" => true
            ]);

            $permanentAddress = Address::firstOrCreate([
                "unit" => "lot 2",
                "street_name" => "Ruby street",
                "purok" => "Purok 12",
                "barangay" => "Manga",
                "municipality_or_city" => "Pagadian City",
                "province" => "Zamboanga del Sur",
                "zip_code" => "7016",
            ]);

            $temporaryAddress = Address::firstOrCreate([
                "unit" => "Janneth Store",
                "barangay" => "Bulatok",
                "municipality_or_city" => "Pagadian City",
                "province" => "Zamboanga del Sur",
                "zip_code" => "7016",
            ]);

            $registration->addresses()->attach($permanentAddress, ['is_permanent' => true]);
            $registration->addresses()->attach($temporaryAddress, ['is_permanent' => false]);

            $emergencyContactAddress = Address::firstOrCreate([
                "unit" => "lot 6",
                "street_name" => "Ruby street",
                "purok" => "Purok 12",
                "barangay" => "Manga",
                "municipality_or_city" => "Pagadian City",
                "province" => "Zamboanga del Sur",
                "zip_code" => "7016",
            ]);

            $emergencyContact = $registration->emergencyContacts()->create([
                "first_name" => "Juan",
                "middle_name" => "Dela",
                "last_name" => "Cruz",
                "relationship" => "Father",
                "phone_number" => "09987654321",
                "address_id" => $emergencyContactAddress->id
            ]);

            $father = $studentCadet->parentalFigures()->create([
                "first_name" => "Juan",
                "middle_name" => "Dela",
                "last_name" => "Cruz",
                "relationship" => "Father",
                "occupation" => "Farmer"
            ]);

            $mother = $studentCadet->parentalFigures()->create([
                "first_name" => "Maria",
                "middle_name" => "Dela",
                "last_name" => "Cruz",
                "relationship" => "Mother",
                "occupation" => "Housewife"
            ]);
        });
    }
}
