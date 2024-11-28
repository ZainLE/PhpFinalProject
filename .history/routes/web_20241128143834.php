<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

// Redirect the root URL to the services page
Route::get('/', function () {
    return redirect('/services');
});

// Define the services route
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// ... other routes ...
