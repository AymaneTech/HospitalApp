<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appointement;
use Carbon\Carbon;

class AppointementController extends Controller
{
    public function create(AppointmentRequest $request){
        $validatedData = $request->validated();

        $appointment = Appointement::create([
            "patient_id" => auth("patient")->id(),
            "doctor_id" => $validatedData["doctor_id"],
            "time" => $validatedData["time"],
            "date" => Carbon::today(),
        ]);
       return back()->with("success", "you booked your shift with success!");
    }
}
