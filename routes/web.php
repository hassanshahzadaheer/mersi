<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Survey;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//    price module
    Route::get('/price-plan', [SubscriptionController::class, 'index'])->name('subscription.index');
    Route::get('/price-plan/payment', [SubscriptionController::class, 'payments'])->name('subscription.payment');

//    survey module
    Route::get('/survey', [Survey::class, 'index'])->name('survey.index');
    Route::get('/survey/create', [Survey::class, 'create'])->name('survey.create');
    Route::post('/survey/store', [Survey::class, 'store'])->name('survey.store');

});

require __DIR__.'/auth.php';
