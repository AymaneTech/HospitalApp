<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointementController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FavoriteController;
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


Route::get("/test", function () {
    return view('test');
});

Route::get("/dashboard", [AdminController::class, "index"]);

Route::get("appointment", [AppointementController::class, "index"]);
Route::post("/create-comment", [CommentController::class, "store"])->name("create-comment");
Route::post("/favorite/create", [FavoriteController::class, "store"])->name("create-favorite");
Route::get("doctor-profile/{doctor:name}", [DoctorController::class, "show"])->name("doctor-profile");
Route::get("doctors/{speciality:name}", [DoctorController::class, "showBySpeciality"])->name("filter-doctors");


Route::get("/doctor/dashboard", [DoctorController::class, "index"])->name("doctor-dashboard");

// this is routes are clean
Route::middleware(["auth", "is_admin"])->group(function () {
    Route::get("/specialities", [SpecialityController::class, "index"]);
    Route::post("speciality/store", [SpecialityController::class, "store"])->name("speciality-store");
    Route::patch("/speciality-update", [SpecialityController::class, "update"])->name("speciality-update");
    Route::delete("speciality-delete/{speciality:name}", [SpecialityController::class, "destroy"])->name("speciality-delete");
});

Route::middleware(["is_doctor_or_admin"])->group(function (){
    Route::get("medicines", [MedicineController::class, "index"])->name("medicine-index");
    Route::post("medicines", [MedicineController::class, "store"])->name("medicine-store");
    Route::patch("medicines/update", [MedicineController::class, "update"])->name("medicine-update");
    Route::delete("medicines/delete{medicine:name}", [MedicineController::class, "destroy"])->name("medicine-delete");
});

require_once __DIR__ . "/auth.php";
/*****
 * *
 *  Todo : https://laravel.com/docs/10.x/passwords
 * here is the documentation for reseting password
 * i'm so tired and need to sleep so until tomorrow
 * ***/
