<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentCadetRequest;
use App\Http\Requests\UpdateStudentCadetRequest;
use Illuminate\Http\Request;
use App\Services\StudentCadetService;
use App\Models\StudentCadet;

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
    public function store(StoreStudentCadetRequest $request)
    {
        return $this->studentCadetService->store($request);
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
    public function update(UpdateStudentCadetRequest $request, StudentCadet $studentCadet)
    {
        return $this->studentCadetService->update($request, $studentCadet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentCadet $studentCadet)
    {
        return $this->studentCadetService->destroy($studentCadet);
    }
}
