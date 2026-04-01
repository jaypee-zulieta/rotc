<?php

namespace App\Services;

use App\Http\Resources\RegistrationResource;
use Illuminate\Http\Request;
use App\Models\Registration;
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
}
