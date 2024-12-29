<?php

use App\Http\Controllers\ProfileController;
use App\Models\Doctor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Fetch all available doctors from the database
    $doctors = Doctor::all();
    return view('dashboard', compact('doctors'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Add the route to show doctors
    Route::get('/doctors', function () {
        // Fetch all available doctors from the database
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    });
});

Route::middleware('auth')->group(function () {
    Route::post('/doctors/{doctor}/channel', [DoctorController::class, 'channel'])->name('doctors.channel');
    Route::delete('/channeled/{id}', [DoctorController::class, 'deleteChanneled'])->name('channeled.delete');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/', function () {
    $doctors = App\Models\Doctor::all(); // Fetch all doctors from the database
    return view('welcome', compact('doctors'));
});
    

require __DIR__.'/auth.php';
