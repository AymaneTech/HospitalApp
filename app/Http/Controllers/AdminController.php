<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index", [
            "specialities" => Speciality::paginate(5),
        ]);
    }
}
