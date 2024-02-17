<?php

namespace App\Http\Controllers;

use App\Models\Appointement;
use App\Models\Comment;
use App\Models\Doctor;
use App\Models\Speciality;
use Carbon\Carbon;

class DoctorController extends Controller
{
    public function index()
    {
        return view("doctor.index");
    }

    public function show(Doctor $doctor)
    {
        $booked = Appointement::where("doctor_id", $doctor->id)
            ->whereDate("created_at", Carbon::today())
            ->get();


        return view("patient.doctor-profile", [
            "doctor" => $doctor,
            "comments" => Comment::latest()
                ->where("doctor_id", "=", $doctor->id)
                ->get(),
            "booked_shifts" => Appointement::where("doctor_id", $doctor->id)
                ->whereDate("created_at", Carbon::today())
                ->get(),
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
