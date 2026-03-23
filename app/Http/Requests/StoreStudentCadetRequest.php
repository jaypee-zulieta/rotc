<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentCadetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "student_number" => "required|string|unique:student_cadets",
            "first_name" => "required|string",
            "middle_name" => "string|nullable",
            "last_name" => "required|string",
            "suffix" => "string|nullable",
            "complexion" => "nullable|string",
            "blood_type" => "nullable|string",
            "sex" => "required|string|in:Male,Female",
            "birth_details.date_of_birth" => "required|date",
            "birth_details.birth_place.unit" => "string|nullable",
            "birth_details.birth_place.street_name" => "string|nullable",
            "birth_details.birth_place.purok" => "string|nullable",
            "birth_details.birth_place.barangay" => "string|nullable",
            "birth_details.birth_place.municipality_or_city" => "required|string",
            "birth_details.birth_place.province" => "required|string",
            "birth_details.birth_place.zip_code" => "required|string|numeric",
            "birth_details.birth_place.telephone_number" => "string|nullable"
        ];
    }
}
