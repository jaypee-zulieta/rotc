<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentCadetRequest extends FormRequest
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
        $studentNumber = $this->route('studentCadet');
        return [
            "student_number" => ['string', Rule::unique('student_cadets')->ignore($studentNumber)],
            "first_name" => "string|nullable",
            "middle_name" => "string|nullable",
            "last_name" => "string|nullable",
            "suffix" => "string|nullable",
            "complexion" => "string|nullable",
            "blood_type" => "string|nullable",
            "sex" => "string|in:Male,Female|nullable",
            "birth_details.date_of_birth" => "date|nullable",
            "birth_details.birth_place.unit" => "string|nullable",
            "birth_details.birth_place.street_name" => "string|nullable",
            "birth_details.birth_place.purok" => "string|nullable",
            "birth_details.birth_place.barangay" => "string|nullable",
            "birth_details.birth_place.municipality_or_city" => "string|nullable",
            "birth_details.birth_place.province" => "string|nullable",
            "birth_details.birth_place.zip_code" => "string|nullable|numeric",
            "birth_details.birth_place.telephone_number" => "string|nullable"
        ];
    }
}
