<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpecialityRequest;
use App\Http\Requests\EditSpecialityRequest;
use App\Models\Speciality;
use App\Services\ImageService;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        return view("admin.index", [
            "specialities" => Speciality::paginate(5),
        ]);
    }

    public function store(CreateSpecialityRequest $request)
    {
        $validatedData = $request->validated();
        $speciality = Speciality::create($validatedData);
        if ($request->has("image")) {
            $imageName = $this->imageService->moveImage($request->file("image"));
            $speciality->image()->create(["path" => $imageName]);
        }
        return redirect("/specialities")->with("success", "success");
    }

    public function update(EditSpecialityRequest $request)
    {
        $validatedData = $request->validated();

        $speciality = Speciality::find($request->id);

        $speciality->name = $validatedData["name"];
        $speciality->description = $validatedData["description"];
        $speciality->save();
        return redirect("/specialities")->with("success", "updated with success");
    }

    public function destroy(Speciality $speciality)
    {
        $speciality->delete();
        return redirect("/specialities")->with("success", "deleted successfully");
    }
}
