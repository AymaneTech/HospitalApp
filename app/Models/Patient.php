<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Person
{

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }
}
