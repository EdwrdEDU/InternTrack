<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternController;
use App\Http\Controllers\MoaTrackingController;

Route::get('/', function () {
    return view('landing');
});

// Intern routes
Route::resource('interns', InternController::class);

// MOA Tracking routes
Route::resource('moa', MoaTrackingController::class);
