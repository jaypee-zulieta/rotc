<?php

use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\StudentCadetController;
use Illuminate\Support\Facades\Route;


Route::resource('student-cadets', StudentCadetController::class, ['only' => [
    'index',
    'show',
    'store',
    'destroy'
]]);


Route::resource('registrations', RegistrationController::class, ['only' => ['index', 'show', 'store', 'destroy']]);
