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
        return RegistrationResource::collection($registrations);
    }

    public function show(Registration $registration)
    {
        $registration->load('studentCadet.birthDetails.address');
        return new RegistrationResource($registration);
    }
}
