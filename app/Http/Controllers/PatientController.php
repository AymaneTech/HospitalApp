<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {

        return view("patient.index", [
            "specialities" => Speciality::take(8)->get(),
            "doctors" => Doctor::take(8)->get(),
        ]);
    }
}
