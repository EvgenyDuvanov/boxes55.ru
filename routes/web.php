<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegistrationController;
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

Route::middleware('guest')->group( function () {
    Route::view('/registration', 'registration.index')->name('registration');
    Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

    Route::view('/login', 'login.index')->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});



Route::view('/login', 'login.index')->name('login');


Route::middleware('auth')->group( function () {

    Route::middleware('admin')->group( function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        // Route::get('admin/profile', [AdminController::class, 'profileIndex'])->name('admin.profile');
        Route::get('admin/clients', [AdminController::class, 'clientsIndex'])->name('admin.clients');
        Route::get('admin/products', [AdminController::class, 'productsIndex'])->name('admin.products');
        Route::get('/admin/application', [AdminController::class, 'applicationIndex'])->middleware('auth')->name('admin.application');
        Route::get('/admin/consultation', [AdminController::class, 'consultationIndex'])->middleware('auth')->name('admin.consultanion');

        Route::get('/admin/review', [AdminController::class, 'reviewIndex'])->name('admin.review');

        Route::get('/admin/reviews/create', [AdminController::class, 'createReview'])->name('admin.reviews.create');
        Route::post('/admin/reviews', [AdminController::class, 'storeReview'])->name('admin.review.store');

        Route::get('/admin/review/{review}/edit', [AdminController::class, 'editReview'])->name('admin.review.edit');
        Route::delete('/admin/review/{review}', [AdminController::class, 'destroyReview'])->name('review.destroy');

    });

    Route::middleware('user')->group( function () {
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    });
});


// Маршрут для отображения формы входа


// Маршрут для обработки входа пользователя
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Маршрут для выхода пользователя
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
