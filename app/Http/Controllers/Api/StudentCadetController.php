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
        $student_number = $request->query('student_number');
        $first_name = $request->query('first_name');
        $last_name = $request->query('last_name');
        $blood_type = $request->query('blood_type');
        $sex = $request->query('sex');

        $studentCadets = StudentCadet::with('birthDetails.address')
            ->when($first_name, function ($query, $first_name) {
                $query->where('first_name', 'like', "%{$first_name}%");
            })
            ->when($blood_type, function ($query, $blood_type) {
                $query->where('blood_type', $blood_type);
            })
            ->when($sex, function ($query, $sex) {
                $query->where('sex', $sex);
            })
            ->when($student_number, function ($query, $student_number) {
                $query->where('student_number', $student_number);
            })
            ->when($last_name, function ($query, $last_name) {
                $query->where('last_name', 'like', "%{$last_name}%");
            })
            ->paginate(15);

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
