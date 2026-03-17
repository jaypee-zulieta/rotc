<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentalFigure extends Model
{
    //
    public $timestamps = false;

    public function studentCadet()
    {
        return $this->belongsTo(StudentCadet::class);
    }
}
