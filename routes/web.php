<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\MoaTrackingController;

Route::get('/', function () {
    return view('landing');
});

// Intern routes
Route::resource('interns', InternController::class);

// Requirements routes
Route::get('/requirements', [RequirementController::class, 'index'])->name('requirements.index');
Route::get('/requirements/{intern}/edit', [RequirementController::class, 'edit'])->name('requirements.edit');
Route::put('/requirements/{intern}', [RequirementController::class, 'update'])->name('requirements.update');

// MOA Tracking routes
Route::resource('moa', MoaTrackingController::class);
