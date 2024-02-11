<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRegisterRequest;
use App\Models\Patient;
use App\Services\ImageService;
use Illuminate\Http\Request;

class PatientAuthController extends Controller
{
    private $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRegisterRequest $request)
    {
        $validatedData = $request->validated();
        $patient = Patient::create($validatedData);
        $imageName = $this->imageService->moveImage($request->file("user_avatar"));
        $patient->image()->create(["path" => $imageName]);
        auth()->guard("patient")->login($patient);
        return redirect("/")->with("success", "Successfully");
    }
}
