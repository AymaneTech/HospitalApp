<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointementController;
use App\Http\Controllers\Auth\DoctorAuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpecialityController;
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

Route::get("/", function (){
    return "hello";
});


Route::get("/test", function () {
    return view('test');
});
Route::get("/doctor-dashboard", [DoctorController::class, "index"])
    ->name("doctor-dashboard")
Route::get("/dashboard", [AdminController::class, "index"]);

Route::post("/create-comment", [CommentController::class, "store"])
    ->name("create-comment");
Route::post("/favorite/create", [FavoriteController::class, "store"])
    ->name("create-favorite");
Route::delete("/favorite/delete/{favorite}", [FavoriteController::class, "destroy"])
    ->name("delete-favorite");
Route::get("doctor-profile/{doctor:name}", [DoctorController::class, "show"])
    ->name("doctor-profile");
Route::get("doctors/{speciality:name}", [DoctorController::class, "showBySpeciality"])
    ->name("filter-doctors");

Route::post("/appointment/Create", [AppointementController::class, "create"])
    ->name("appointment-store");
Route::get("/appointment/", [AppointementController::class, "index"])->name("appointment-index");



require_once __DIR__ . "/auth.php";
require_once __DIR__ . "/specialities.php";
require_once __DIR__ . "/medicines.php";
/*****
 * *
 *  Todo : https://laravel.com/docs/10.x/passwords
 * here is the documentation for reseting password
 * i'm so tired and need to sleep so until tomorrow
 * ***/
