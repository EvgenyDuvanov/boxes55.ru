<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContractController;
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

    Route::prefix('admin')->middleware('admin')->group( function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');

        // Route::get('admin/profile', [AdminController::class, 'profileIndex'])->name('admin.profile');

        Route::get('clients', [AdminController::class, 'clientsIndex'])->name('admin.clients');
        Route::delete('clients/{id}', [AdminController::class, 'destroyClients'])->name('admin.clients.destroy');

        //работа с договорами
        Route::get('contracts', [ContractController::class, 'index'])->name('admin.contracts');
        Route::get('contracts/create', [ContractController::class, 'create'])->name('admin.contracts.create');
        Route::post('contracts', [ContractController::class, 'store'])->name('admin.contracts.store');
        Route::get('contracts/{contract}/edit', [ContractController::class, 'edit'])->name('admin.contracts.edit');
        Route::put('contracts/{contract}', [ContractController::class, 'update'])->name('admin.contracts.update');
        Route::delete('contracts/{contract}', [ContractController::class, 'destroy'])->name('admin.contracts.destroy');

        //работа с товарам
        Route::get('products', [AdminController::class, 'productsIndex'])->name('admin.products');
        Route::get('products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
        Route::put('products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
        Route::get('sets/{id}/edit', [AdminController::class, 'editSet'])->name('admin.sets.edit');
        Route::put('sets/{id}', [AdminController::class, 'updateSet'])->name('admin.sets.update');

        //работа с заявками на аренду
        Route::get('application', [AdminController::class, 'applicationIndex'])->middleware('auth')->name('admin.application');
        Route::get('application/{id}/edit', [AdminController::class, 'editApplication'])->name('admin.application.edit');
        Route::put('application/{id}', [AdminController::class, 'updateApplication'])->name('admin.application.update');
        Route::delete('application/{id}', [AdminController::class, 'destroyApplication'])->name('admin.application.destroy');
       
        //работа с консультациями
        Route::get('consultation', [AdminController::class, 'consultationIndex'])->name('admin.consultation');
        Route::get('consultation/{id}/edit', [AdminController::class, 'editConsultation'])->name('admin.consultation.edit');
        Route::put('consultation/{id}', [AdminController::class, 'updateConsultation'])->name('admin.consultation.update');
        Route::delete('consultation/{id}', [AdminController::class, 'destroyConsultation'])->name('admin.consultation.destroy');

        //работа с отзывами
        Route::get('/admin/review', [AdminController::class, 'reviewIndex'])->name('admin.review');
        Route::get('/admin/reviews/create', [AdminController::class, 'createReview'])->name('admin.reviews.create');
        Route::post('/admin/reviews', [AdminController::class, 'storeReview'])->name('admin.review.store');
        Route::post('/admin/review/{review}/publish', [AdminController::class, 'publishReview'])->name('review.publish');
        Route::post('/admin/review/{review}/unpublish', [AdminController::class, 'unpublishReview'])->name('review.unpublish');
        Route::delete('/admin/review/{review}', [AdminController::class, 'destroyReview'])->name('review.destroy');
    });

    Route::middleware('user')->group( function () {
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    });
});

// Маршрут для обработки входа пользователя
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Маршрут для выхода пользователя
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
