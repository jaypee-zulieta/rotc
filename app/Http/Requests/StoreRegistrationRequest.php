<?php

namespace App\Http\Requests;

use App\Models\StudentCadet;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $studentCadetId = StudentCadet::where('student_number', $this->input('student_cadet_information.student_number'))
            ->value('id');

        $this->merge([
            'student_cadet_id' => $studentCadetId,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "registration_date" => "required|date",
            "student_cadet_information.student_number" => "required|string",
            "student_cadet_information.first_name" => "required|string",
            "student_cadet_information.last_name" => "required|string",
            "student_cadet_information.middle_name" => "nullable|string",
            "student_cadet_information.suffix" => "nullable|string",
            "student_cadet_information.complexion" => "nullable|string",
            "student_cadet_information.blood_type" => "nullable|string",
            "student_cadet_information.sex" => "required|string|in:Male,Female",
            "student_cadet_information.birth_details.date_of_birth" => "required|date",
            "student_cadet_information.birth_details.birth_place.unit" => "nullable|string",
            "student_cadet_information.birth_details.birth_place.street_name" => "nullable|string",
            "student_cadet_information.birth_details.birth_place.purok" => "nullable|string",
            "student_cadet_information.birth_details.birth_place.barangay" => "nullable|string",
            "student_cadet_information.birth_details.birth_place.municipality_or_city" => "required|string",
            "student_cadet_information.birth_details.birth_place.province" => "required|string",
            "student_cadet_information.birth_details.birth_place.zip_code" => "nullable|string",
            "student_cadet_information.birth_details.birth_place.telephone_number" => "nullable|string",
            "school" => "required|string",
            "academic_course" => "required|string",
            "military_course" => [
                "required",
                "string",
                "in:Military Science 1,Military Science 2,Military Science 31,Military Science 32,Military Science 41,Military Science 42",
                Rule::unique('registrations')->where(function ($query) {
                    return $query->where('school_year', $this->input('school_year'))
                        ->where('semester', $this->input('semester'))
                        ->where('student_cadet_id', $this->input('student_cadet_id'));
                }),
            ],
            "religion" => "required|string",
            "height_m" => "required|numeric",
            "weight_kg" => "required|numeric",
            "contact_number" => "required|string",
            "semester" => "required|string|in:1st Semester,2nd Semester",
            "school_year" => "required|string",
            "is_willing_to_take_advance_course" => "nullable|boolean"
        ];
    }
}
