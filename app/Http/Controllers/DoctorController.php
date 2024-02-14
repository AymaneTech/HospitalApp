<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return session("success");
    }

    public function show(Doctor $doctor)
    {
        return view("patient.doctor-profile", [
            "doctor" => $doctor,
            "comments" => Comment::latest()->where("doctor_id", "=", $doctor->id)->get(),
        ]);
    }

    public function showBySpeciality(Speciality $speciality)
    {
        $doctors = Doctor::find($speciality->id)->with("speciality");
        if ($doctors) {
            $doctors = $doctors->get();
        } else {
            $doctors = false;
        }
        return view("patient.speciality-doctors", [
            "speciality" => $speciality,
            "doctors" => $doctors,
        ]);
    }
}
