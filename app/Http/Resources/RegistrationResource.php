<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "registration_id" => $this->id,
            "registration_date" => $this->registration_date,
            "cadet_information" => new StudentCadetResource($this->studentCadet),
            "school" => $this->school,
            "academic_course" => $this->academic_course,
            "military_course" => $this->military_course,
            "religion" => $this->religion,
            "height_m" => $this->height_m,
            "weight_kg" => $this->weight_kg,
            "contact_number" => $this->contact_number,
            "semester" => $this->semester,
            "school_year" => $this->school_year,
            "is_willing_to_take_advance_course" => $this->is_willing_to_take_advance_course,
        ];
    }
}
