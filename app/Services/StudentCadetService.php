<?php

namespace App\Services;

use App\Models\Address;
use App\Models\BirthDetails;
use App\Http\Requests\StoreStudentCadetRequest;
use App\Http\Requests\UpdateStudentCadetRequest;
use App\Http\Resources\StudentCadetResource;
use App\Models\StudentCadet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentCadetService
{

    public function index(Request $request)
    {
        $studentCadets = StudentCadet::search($request->query('search'))
            ->query(function ($builder) use ($request) {
                $studentNumber = $request->query('student_number');
                $sex = $request->query('sex');

                $builder->with('birthDetails.address')
                    ->when($studentNumber, fn($q) => $q->where('student_number', $studentNumber))
                    ->when($sex, fn($q) => $q->where('sex', $sex));
            })->paginate(10);

        return response()->json([
            'total' => $studentCadets->total(),
            'per_page' => $studentCadets->perPage(),
            'current_page' => $studentCadets->currentPage(),
            'total_pages' => $studentCadets->lastPage(),
            'data' => StudentCadetResource::collection($studentCadets->items())
        ]);
    }

    public function store(StoreStudentCadetRequest $request)
    {
        $validated = $request->validated();
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

    public function show(StudentCadet $studentCadet)
    {
        return new StudentCadetResource($studentCadet);
    }

    public function update(UpdateStudentCadetRequest $request, StudentCadet $studentCadet)
    {
        $validated = $request->validated();


        return DB::transaction(function () use ($validated, $studentCadet) {
            $studentCadet->update($validated);
            $birthDetails = $studentCadet->birthDetails;
            $birthDetails->update(collect($validated['birth_details'])
                ->except('birth_place')->toArray());
            $birthDetails->address->update($validated['birth_details']['birth_place']);

            return $studentCadet;
        });
    }
}
