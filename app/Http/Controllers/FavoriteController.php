<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $request->validate(["doctor_id" => "required"]);
        $favorite = Favorite::create([
            "doctor_id" => $request->doctor_id,
            "patient_id" => auth("patient")->user()->id,
        ]);
        return back()->with("success", "doctor added to favorites successfully");
    }
    public function destroy(Favorite $favorite){
        $favorite->delete();
        return back()->with("success", "favorite deleted successfully");
    }
}
