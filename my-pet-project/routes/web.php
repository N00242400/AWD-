<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pets', [PetController::class, 'index'])->name('pets.index');
    Route::get('/pets/create', [PetController::class, 'create'])->name('pets.create');
    Route::get('/pets/{pet}', [PetController::class, 'show'])->name('pets.show');
    Route::post('/pets', [PetController::class, 'store'])->name('pets.store');
    //url to call pet controller- edit function//
    Route::get('/pets/{pet}/edit', [PetController::class, 'edit'])->name('pets.edit');
    Route::put('/pets/{pet}', [PetController::class, 'update'])->name('pets.update');
    Route::delete('/pets/{pet}', [PetController::class, 'destroy'])->name('pets.destroy');


});


// Global appointments routes
Route::resource('appointments', AppointmentController::class);

// Appointments for a specific pet
Route::post('pets/{pet}/appointments', [AppointmentController::class, 'store'])
    ->name('pets.appointments.store');


require __DIR__.'/auth.php';
