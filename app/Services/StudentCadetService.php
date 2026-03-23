<?php

namespace App\Services;

use App\Http\Resources\StudentCadetResource;
use App\Models\StudentCadet;
use Illuminate\Http\Request;

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
        return StudentCadetResource::collection($studentCadets);
    }
}
