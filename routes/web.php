<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::redirect('/home', '/');

Route::get('/', [MainController::class, 'indexProducts']);

Route::post('/', [MainController::class, 'calculateRent'])->name('calculate.rent');

Route::post('/application', [MainController::class, 'submitApplication'])->name('submit.application');

Route::post('/contacts', [MainController::class, 'submitQwestion'])->name('submit.question');


Route::get('review/create', [ReviewController::class, 'create'])->name('review.create');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
