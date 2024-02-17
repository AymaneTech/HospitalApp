<?php

use App\Http\Controllers\Auth\DoctorAuthController;
use App\Http\Controllers\Auth\PatientAuthController;
use App\Http\Controllers\Auth\SessionsController;
use App\Models\Speciality;
use Illuminate\Support\Facades\Route;

Route::get("/register", function () {
    return view('auth.register', [
        "specialities" => Speciality::all(),
    ]);
});
Route::get("/login", [SessionsController::class, "create"]);
Route::post("/login", [SessionsController::class, "store"])->name("login");
Route::get("/logout", [SessionsController::class, "destroy"]);

Route::get("forget-password", [SessionsController::class, "forget_password"]);
Route::post("forget-password", [SessionsController::class, "check"])->middleware('guest');

Route::post("doctor-register", [DoctorAuthController::class, "store"]);
Route::post("patient-register", [PatientAuthController::class, "store"]);

Route::get("edit-doctor-profile", [DoctorAuthController::class, "edit"])->name("doctor-edit");
Route::patch("edit-doctor-profile{doctor}", [DoctorAuthController::class, "update"])->name("save-doctor");
