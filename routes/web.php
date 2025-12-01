<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdoptionController;

Route::get('/', [AdoptionController::class, 'index'])->name('home');
Route::post('/interest', [AdoptionController::class, 'storeInterest'])->name('interest.store');