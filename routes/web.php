<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternController;
use App\Http\Controllers\MoaTrackingController;
use App\Http\Controllers\RequirementController;

Route::get('/', function () {
    return view('landing');
});

// Intern routes
Route::resource('interns', InternController::class);

// Requirement routes
Route::put('/requirements/{requirement}', [RequirementController::class, 'update'])->name('requirements.update');

// MOA Tracking routes
Route::resource('moa', MoaTrackingController::class);
