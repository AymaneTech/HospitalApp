<?php

namespace App\Models;

use App\Enums\Time;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointement extends Model
{
    use HasFactory;

    protected $fillable = [
        "doctor_id",
        "patient_id",
        "time",
        "status",
        "is_urgent",
        "date"
    ];
    protected $casts = [
        "shift" => Time::class,
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
