<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return session("success");
    }
    public function show(Doctor $doctor)
    {
        return view ("patient.doctor-profile", [
            "doctor" => $doctor
        ]);
    }
}
