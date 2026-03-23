<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentCadetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "student_number" => $this->student_number,
            "first_name" => $this->first_name,
            "middle_name" => $this->middle_name,
            "last_name" => $this->last_name,
            "suffix" => $this->suffix,
            "complexion" => $this->complexion,
            "blood_type" => $this->blood_type,
            "sex" => $this->sex,
            "birthDetails" => new BirthDetailsResource($this->birthDetails)
        ];
    }
}
