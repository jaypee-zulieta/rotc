<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Registration extends Model
{
    use Searchable;
    use HasFactory;
    //
    public $timestamps = false;

    protected $fillable = [
        'student_cadet_id',
        'school',
        'academic_course',
        'military_course',
        'religion',
        'height_m',
        'weight_kg',
        'registration_date',
        'contact_number',
        'semester',
        'school_year',
        'is_willing_to_take_advance_course'
    ];

    public function studentCadet()
    {
        return $this->belongsTo(StudentCadet::class);
    }

    public function addresses(): BelongsToMany
    {
        return $this->belongsToMany(Address::class)
            ->withPivot('is_permanent');
    }

    public function permanentAddress()
    {
        return $this->addresses()->wherePivot('is_permanent', true)->first();
    }

    public function temporaryAddress()
    {
        return $this->addresses()->wherePivot('is_permanent', false)->first();
    }

    public function emergencyContacts()
    {
        return $this->hasMany(EmergencyContact::class);
    }

    public function toSearchableArray()
    {
        return [
            'school' => $this->school,
            'academic_course' => $this->academic_course,
            'military_course' => $this->military_course,
            'religion' => $this->religion,
            'height_m' => $this->height_m,
            'weight_kg' => $this->weight_kg,
            'registration_date' => $this->registration_date,
            'contact_number' => $this->contact_number,
            'semester' => $this->semester,
            "school_year" => $this->school_year
        ];
    }
}
