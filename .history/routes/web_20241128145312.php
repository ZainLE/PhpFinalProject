<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Models\Service;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ReviewController;

Route::get('/', [ServiceController::class, 'index'])->name('home');


    $services = Service::with('user')
        ->where('is_active', true)
        ->latest()
        ->get();

    return view('components.service-component', [
        'categories' => $categories,
        'services' => $services
    ]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/search', [ServiceController::class, 'search'])->name('services.search');
Route::get('/services/category/{category}', [ServiceController::class, 'byCategory'])
    ->name('services.category');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

Route::middleware(['auth'])->group(function () {
    // Service routes
    Route::resource('services', ServiceController::class);
    Route::get('/services/category/{category}', [ServiceController::class, 'byCategory'])
        ->name('services.category');
    Route::get('/services/search', [ServiceController::class, 'search'])
        ->name('services.search');
    Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

    // Booking routes
    Route::get('/services/{service}/book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/services/{service}/book', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/{booking}/review', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/bookings/{booking}/review', [ReviewController::class, 'store'])->name('reviews.store');
    Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

require __DIR__.'/auth.php';
