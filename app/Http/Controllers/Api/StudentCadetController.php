<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentCadetResource;
use App\Models\Address;
use App\Models\BirthDetails;
use Illuminate\Http\Request;
use App\Services\StudentCadetService;
use App\Models\StudentCadet;
use Illuminate\Support\Facades\DB;

class StudentCadetController extends Controller
{

    private StudentCadetService $studentCadetService;

    public function __construct(StudentCadetService $studentCadetService)
    {
        $this->studentCadetService = $studentCadetService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->studentCadetService->index($request);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "student_number" => "required|string|unique:student_cadets",
            "first_name" => "required|string",
            "middle_name" => "string|nullable",
            "last_name" => "required|string",
            "suffix" => "string|nullable",
            "complexion" => "nullable|string",
            "blood_type" => "nullable|string",
            "sex" => "required|string|in:Male,Female",
            "birth_details.date_of_birth" => "required|date",
            "birth_details.birth_place.unit" => "string|nullable",
            "birth_details.birth_place.street_name" => "string|nullable",
            "birth_details.birth_place.purok" => "string|nullable",
            "birth_details.birth_place.barangay" => "string|nullable",
            "birth_details.birth_place.municipality_or_city" => "required|string",
            "birth_details.birth_place.province" => "required|string",
            "birth_details.birth_place.zip_code" => "required|string|numeric",
            "birth_details.birth_place.telephone_number" => "string|nullable"
        ]);

        return DB::transaction(function () use ($validated) {
            $birthPlace = Address::firstOrCreate($validated['birth_details']['birth_place']);

            $birthDetails = BirthDetails::create([
                "date_of_birth" => $validated['birth_details']['date_of_birth'],
                "address_id" => $birthPlace->id
            ]);

            $studentCadet = StudentCadet::create([
                "student_number" => $validated['student_number'],
                "first_name" => $validated['first_name'],
                "middle_name" => data_get($validated, 'middle_name'),
                "last_name" => $validated['last_name'],
                "suffix" => data_get($validated, 'suffix'),
                "sex" => $validated['sex'],
                "complexion" => data_get($validated, 'complexion'),
                "blood_type" => data_get($validated, 'blood_type'),
                "birth_details_id" => $birthDetails->id
            ]);

            return new StudentCadetResource($studentCadet);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentCadet $studentCadet)
    {
        return $this->studentCadetService->show($studentCadet);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
