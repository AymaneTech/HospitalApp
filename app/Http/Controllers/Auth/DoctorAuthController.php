<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRegisterRequest;
use App\Http\Requests\EditDoctorProfileRequest;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Services\ImageService;
use Illuminate\Http\Request;

class DoctorAuthController extends Controller
{
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRegisterRequest $request)
    {
        $validatedData = $request->validated();
        $doctor = Doctor::create($validatedData);
        $imageName = $this->imageService->moveImage($request->file("user_avatar"));
        $doctor->image()->create(["path" => $imageName]);
        auth()->guard("doctor")->login($doctor);
        return redirect("/doctor-dashboard")->with("success", "Successfully");
    }

    public function edit()
    {
        return view("auth.edit-profile", [
            "specialities" => Speciality::all(),
            "doctor" => auth("doctor")->user(),
        ]);
    }

    public function update(Doctor $doctor, EditDoctorProfileRequest $request)
    {
        $validatedData = $request->validated();
        $doctor->forceFill($validatedData);
        $doctor->save();

        if ($request->file("user_avatar")) {
            $imageName = $this->imageService->moveImage($request->user_avatar);
            $doctor->image->update(["path" => $imageName]);
        }
        return back()->with("success", "changes saved successfully");
    }
}
