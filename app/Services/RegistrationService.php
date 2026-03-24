<?php

namespace App\Services;

use App\Http\Resources\RegistrationResource;
use Illuminate\Support\Facades\Request;
use App\Models\Registration;

class RegistrationService
{

    public function index(Request $request)
    {
        $registrations = Registration::with('studentCadet.birthDetails.address')->paginate(10);
        return RegistrationResource::collection($registrations);
    }
}
