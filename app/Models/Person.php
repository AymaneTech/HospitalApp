<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use \Illuminate\Auth\Authenticatable as authenticatable_trait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Auth\Passwords\canResetPassword as CanResetPassword_trait;
abstract class Person extends Model implements Authenticatable, CanResetPassword
{
    use authenticatable_trait, Notifiable, HasFactory, CanResetPassword_trait;
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
