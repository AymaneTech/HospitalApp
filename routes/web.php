<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\DoctorAuthController;
use App\Http\Controllers\Auth\PatientAuthController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
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

Route::get("/dashboard",[ AdminController::class, "index"]);

/*****
 * *
 *  Todo : https://laravel.com/docs/10.x/passwords
 * here is the documentation for reseting password
 * i'm so tired and need to sleep so until tomorrow
 * ***/