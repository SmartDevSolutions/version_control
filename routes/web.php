<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Application;

// Ovo je tvoja početna stranica!
Route::get('/', function () {
    return view('app_index'); // OBAVEZNO: resources/views/app_index.blade.php
});

// Dashboard rute ako se logiraš (opcionalno)
//Route::get('/dashboard', function () {
   /* return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/', function () {
    $apps = Application::where('is_visible', true)->get();
    return view('app_index', compact('apps'));
});

// Profile management ako želiš koristiti Breeze-ov korisnički sustav
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Breeze auth rute (login, register, itd.)
require __DIR__.'/auth.php';
