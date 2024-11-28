<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Models\Service;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ReviewController;

Route::get('/', [ServiceController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // Service routes
    Route::resource('services', ServiceController::class);
    Route::get('/services/category/{category}', [ServiceController::class, 'byCategory'])
        ->name('services.category');
    Route::get('/services/search', [ServiceController::class, 'search'])
        ->name('services.search');

    // Booking routes
    Route::get('/services/{service}/book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/services/{service}/book', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');

    // Review routes
    Route::get('/bookings/{booking}/review', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/bookings/{booking}/review', [ReviewController::class, 'store'])->name('reviews.store');
    Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::get('/how-it-works', function () {
    return view('how-it-works');
})->name('how-it-works');

require __DIR__.'/auth.php';
