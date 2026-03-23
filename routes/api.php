<?php

use App\Http\Controllers\Api\StudentCadetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::resource('student-cadets', StudentCadetController::class, ['only' => ['index', 'show']]);
