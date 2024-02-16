<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appointement;
use Illuminate\Http\Request;

class AppointementController extends Controller
{
    public function create(AppointmentRequest $request){
        $validatedData = $request->validated();

        $appointment = Appointement::create([
            "patient_id" => auth("patient")->id(),
            "doctor_id" => $validatedData["doctor_id"],
            "time" => $validatedData["time"],
        ]);
        return $appointment;
    }
}
