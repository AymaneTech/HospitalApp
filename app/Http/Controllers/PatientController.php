<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Favorite;
use App\Models\Speciality;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where("patient_id", auth("patient")->id())->get();
        return view("patient.index", [
            "specialities" => Speciality::take(8)->get(),
            "doctors" => Doctor::with("speciality", "image", "favorites")->get(),
            "favorites" => $favorites,
        ]);
    }
}
