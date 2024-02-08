<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Hash;

abstract class Person extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "email",
        "password",
    ];
    protected $with = ["image"];

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, "imageable");
    }
}
