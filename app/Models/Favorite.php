<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ["patient_id", "doctor_id"];
    protected $with = ["doctors"];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
