<?php

use App\Http\Controllers\SpecialityController;
use Illuminate\Support\Facades\Route;

Route::middleware(["is_admin"])->group(function () {
    Route::get("/specialities", [SpecialityController::class, "index"]);
    Route::post("speciality/store", [SpecialityController::class, "store"])->name("speciality-store");
    Route::patch("/speciality-update", [SpecialityController::class, "update"])->name("speciality-update");
    Route::delete("speciality-delete/{speciality:name}", [SpecialityController::class, "destroy"])->name("speciality-delete");
});
