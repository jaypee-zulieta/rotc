<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "unit" => $this->unit,
            "street_name" => $this->street_name,
            "purok" => $this->purok,
            "barangay" => $this->barangay,
            "municipality_or_city" => $this->municipality_or_city,
            "province" => $this->province,
            "zip_code" => $this->zip_code,
            "telephone_number" => $this->telephone_number
        ];
    }
}
