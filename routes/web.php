<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentCadetController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('student-cadets', StudentCadetController::class);
