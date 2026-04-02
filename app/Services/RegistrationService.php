<?php

namespace App\Services;

use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Resources\RegistrationResource;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;
use App\Models\Address;
use App\Models\BirthDetails;
use App\Models\StudentCadet;

class RegistrationService
{

    public function index(Request $request)
    {
        $registrations = Registration::search($request->query('search'))
            ->query(function ($builder) use ($request) {
                $builder->with('studentCadet.birthDetails.address');
            })
            ->paginate(10);
        return response()->json([
            'total' => $registrations->total(),
            'per_page' => $registrations->perPage(),
            'current_page' => $registrations->currentPage(),
            'total_pages' => $registrations->lastPage(),
            'data' => RegistrationResource::collection($registrations->items())
        ]);
    }

    public function show(Registration $registration)
    {
        $registration->load('studentCadet.birthDetails.address');
        return new RegistrationResource($registration);
    }

    public function store(StoreRegistrationRequest $request)
    {
        $validated = $request->validated();

        return DB::transaction(function () use ($validated) {

            // If it finds an address with the same details it will use that, if it doesn't it will make a new record
            $address = Address::firstOrCreate($validated['student_cadet_information']['birth_details']['birth_place']);

            $birthDetails = BirthDetails::firstOrCreate([
                "date_of_birth" => $validated['student_cadet_information']['birth_details']['date_of_birth'],
                "address_id" => $address->id
            ]);

            $studentCadet = StudentCadet::updateOrCreate([
                "student_number" => $validated['student_cadet_information']['student_number']
            ], [
                "first_name" => $validated['student_cadet_information']['first_name'],
                "middle_name" => data_get($validated['student_cadet_information'], 'middle_name'),
                "last_name" => $validated['student_cadet_information']['last_name'],
                "suffix" => data_get($validated['student_cadet_information'], 'suffix'),
                "complexion" => data_get($validated['student_cadet_information'], 'complexion'),
                "blood_type" => data_get($validated['student_cadet_information'], 'blood_type'),
                "sex" => $validated['student_cadet_information']['sex'],
                "birth_details_id" => $birthDetails->id,
            ]);

            $registration = Registration::create([
                "student_cadet_id" => $studentCadet->id,
                "registration_date" => $validated['registration_date'],
                "school" => $validated['school'],
                "academic_course" => $validated['academic_course'],
                "military_course" => $validated['military_course'],
                "religion" => $validated['religion'],
                "height_m" => $validated['height_m'],
                "weight_kg" => $validated['weight_kg'],
                "contact_number" => $validated['contact_number'],
                "semester" => $validated['semester'],
                "school_year" => $validated['school_year'],
                "is_willing_to_take_advance_course" => data_get($validated, 'is_willing_to_take_advance_course', false),
            ]);

            return new RegistrationResource($registration);
        });
    }

    public function delete(Registration $registration)
    {
        $registration->delete();
    }
}
