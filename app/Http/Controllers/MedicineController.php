<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedicineRequest;
use App\Http\Requests\EditMedicineRequest;
use App\Models\Medicine;
use App\Models\Speciality;
use App\Services\ImageService;

class MedicineController extends Controller
{
    private $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        return view("admin.medicines", [
            "medicines" => Medicine::paginate(7),
            "specialities" => Speciality::all(),
        ]);
    }
    public function store(CreateMedicineRequest $request)
    {
        $validatedData = $request->validated();

        $medicine = Medicine::create($validatedData);
        if ($request->has("image")) {
            $imageName = $this->imageService->moveImage($request->file("image"));
            $medicine->image()->create(["path" => $imageName]);
        }
        return redirect(route("medicine-index"))->with("success", "medicine created successfully");
    }
    public function update(CreateMedicineRequest $request)
    {
        $validatedData = $request->validated();
        $medicine = Medicine::find($request->id);

        $medicine->name = $validatedData['name'];
        $medicine->description = $validatedData['description'];
        $medicine->price = $validatedData['price'];
        $medicine->speciality_id = $validatedData['speciality_id'];

        $medicine->save();
        if ($request->has("image")) {
            $imageName = $this->imageService->moveImage($request->file("image"));
            $medicine->image()->update(["path" => $imageName]);
        }

        return redirect(route("medicine-index"))->with('success', "medicine updated successfully");
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect("/medicines")->with("success", "the medicine deleted successfully");
    }
}
