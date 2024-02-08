<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use \Illuminate\Auth\Authenticatable as authenticatable_trait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Hash;

abstract class Person extends Model implements Authenticatable
{
    use authenticatable_trait;
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
