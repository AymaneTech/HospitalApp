<?php

use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;

Route::middleware("is_doctor_or_admin")->group(function (){
    Route::get("medicines", [MedicineController::class, "index"])->name("medicine-index");
    Route::post("medicines", [MedicineController::class, "store"])->name("medicine-store");
    Route::patch("medicines/update", [MedicineController::class, "update"])->name("medicine-update");
    Route::delete("medicines/delete{medicine:name}", [MedicineController::class, "destroy"])->name("medicine-delete");
});
