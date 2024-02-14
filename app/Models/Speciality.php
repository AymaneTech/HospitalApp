<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Comment\Doc;

class Speciality extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "name",
        "description"
    ];
    protected $with = ["image"];

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }
//    public function doctors (){
//        return $this->hasMany(Doctor::class);
//    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, "imageable");
    }
}
