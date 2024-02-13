<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Person
{
    protected $fillable = [
        "name",
        "email",
        "password",
        "speciality_id",
    ];
    protected $with = ["speciality", "image"];

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }
}
