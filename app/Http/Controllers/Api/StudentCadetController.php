<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentCadet;

class StudentCadetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $searchTerm = $request->query('search');
        $studentNumber = $request->query('student_number');
        $sex = $request->query('sex');
        $bloodType = $request->query('blood_type');

        $studentCadets = StudentCadet::search($searchTerm)
            ->when($studentNumber, function ($query) use ($studentNumber) {
                $query->where('student_number', $studentNumber);
            })->when($sex, function ($query) use ($sex) {
                $query->where('sex', $sex);
            })->when($bloodType, function ($query) use ($bloodType) {
                $query->where('blood_type', $bloodType);
            })->paginate();
        return response()->json($studentCadets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
