<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\DoctorAuthController;
use App\Http\Controllers\Auth\PatientAuthController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpecialityController;
use App\Models\Speciality;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [PatientController::class, "index"]);

Route::get("/register", function () {
    return view('auth.register', [
        "specialities" => Speciality::all(),
    ]);
});
Route::get("/login", [SessionsController::class, "create"]);
Route::post("/login", [SessionsController::class, "store"]);

Route::get("forget-password", [SessionsController::class, "forget_password"]);
Route::post("forget-password", [SessionsController::class, "check"])->middleware('guest');

Route::post("doctor-register", [DoctorAuthController::class, "store"]);
Route::post("patient-register", [PatientAuthController::class, "store"]);

Route::get("doctor-dashboard", [DoctorController::class, "index"]);

Route::get("/test", function () {
    return view('test');
});

Route::get("/dashboard", [AdminController::class, "index"]);

//Route::post("speciality/store", [SpecialityController::class, "store"]);
Route::resource("speciality", SpecialityController::class)->only(["store"]);
Route::delete("speciality-delete/{speciality:name}", [SpecialityController::class, "destroy"])->name("speciality-delete");
Route::patch("/speciality-update", [SpecialityController::class, "update"])->name("speciality-update");


Route::get("medicines", [MedicineController::class, "index"])->name("medicine-index");
Route::delete("medicines", [MedicineController::class, "destroy"])->name("medicine-delete");
Route::patch("medicines", [MedicineController::class, "update"])->name("medicine-update");


/*****
 * *
 *  Todo : https://laravel.com/docs/10.x/passwords
 * here is the documentation for reseting password
 * i'm so tired and need to sleep so until tomorrow
 * ***/
