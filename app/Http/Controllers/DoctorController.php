<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        return view("patient.doctor-profile", [
            "doctor" => $doctor,
            "comments" => Comment::latest()->where("doctor_id", "=", $doctor->id)->get(),
        ]);
    }
}
