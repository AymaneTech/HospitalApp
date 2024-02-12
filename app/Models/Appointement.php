<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointement extends Model
{
    use HasFactory;

    protected $fillable = [
        "doctor_id",
        "patient_id",
        "shift",
        "status",
        "is_urgent",
        "booked_at",
    ];

    public function doctor()
    {
        return $this->belongsTO(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTO(Patient::class);
    }
}
