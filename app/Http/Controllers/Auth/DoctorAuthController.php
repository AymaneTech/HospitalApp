<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRegisterRequest;
use App\Models\Doctor;
use App\Services\ImageService;
use Illuminate\Http\Request;

class DoctorAuthController extends Controller
{
    private $imageService;
    public function __construct(ImageService $imageService){
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

        return redirect("/doctor-dashboard")->with("success", "Successfully");
    }
}
