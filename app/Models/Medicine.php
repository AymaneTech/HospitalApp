<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = ["name",
        "description",
        "price",
        "speciality_id"
    ];

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }
    public function image()
    {
        return $this->morphOne(Image::class, "imageable");
    }

}
