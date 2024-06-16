<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'indexProducts']);

// Route::get('/#calculate', [MainController::class, 'showCalculator'])->name('page.calculator');

Route::post('/', [MainController::class, 'calculateRent'])->name('calculate.rent');

Route::post('/application', [MainController::class, 'submitApplication'])->name('submit.application');

Route::post('/contacts', [MainController::class, 'submitQwestion'])->name('submit.question');


// Route::get('/#reviews', [MainController::class, 'showReviews'])->name('page.reviews');


//админка
// Route::prefix('admin')->group(function () {
//     Route::get('/', [AdminController::class, 'indexAdmin']);
// });
