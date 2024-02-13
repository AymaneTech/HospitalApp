<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index(){
        return view("admin.medicines", [
            "medicines" => Medicine::paginate(7),
        ]);
    }
}
