<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        "note",
        "doctor-id",
        "patient_id",
    ];

    public function doctor()
    {
        return $this->blongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->blongsTo(Patient::class);
    }
}
