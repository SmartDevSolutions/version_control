<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/apps', [HomepageController::class, 'getAll']);
