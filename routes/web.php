<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
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
    Route::post('/subscribe', [StripeController::class, 'checkout'])->name('subscription.subscribe');
    Route::get('/subscribe/success', [StripeController::class, 'success'])->name('stripe.success');

    Route::get('/price-plan', [SubscriptionController::class, 'index'])->name('subscription.index');
    Route::get('/price-plan/payment', [SubscriptionController::class, 'payments'])->name('subscription.payment');
    Route::get('/payment-success', [SubscriptionController::class, 'success'])->name('payment.success');


//    survey module
    Route::get('/survey', [Survey::class, 'index'])->name('survey.index');
    Route::get('/survey/create', [Survey::class, 'create'])->name('survey.create');
    Route::post('/survey/store', [Survey::class, 'store'])->name('survey.store');

//    Evaluation
    Route::get('/survey/evaluation/', [Survey::class, 'evaluation'])->name('survey.evaluation');
    Route::get('/survey/evaluation/{businessId}',
        [Survey::class, 'evaluateSurvey'])->name('survey.business.evaluation');

    // reporting
    Route::get('/survey/report', [Survey::class, 'report'])->name('survey.report');

    Route::get('/audit/generate/{businessId}', [Survey::class, 'generateAuditReport'])->name('survey.audit.generate');
    Route::get('/survey/view/{businessId}', [Survey::class, 'showSurveyReports'])->name('survey.audit.view');
    Route::get('/survey/{businessId}/download', [Survey::class, 'downloadSurveyReport'])
        ->name('survey.report.download');

});

require __DIR__.'/auth.php';
