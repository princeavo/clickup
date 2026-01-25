<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\SocialFeedController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/support', [SupportController::class, 'index'])->name('support');

Route::get('/agency', [AgencyController::class, 'index'])->name('agency');

Route::get('/results', [ResultsController::class, 'index'])->name('results');

Route::get('/offers', [OffersController::class, 'index'])->name('offers');

Route::get('/actualites', [SocialFeedController::class, 'index'])->name('social-feed');

// API endpoints pour les posts sociaux
Route::get('/api/facebook-posts', [SocialFeedController::class, 'apiFacebook'])->name('api.facebook-posts');
Route::get('/api/linkedin-posts', [SocialFeedController::class, 'apiLinkedIn'])->name('api.linkedin-posts');
Route::get('/api/social-posts', [SocialFeedController::class, 'apiAll'])->name('api.social-posts');

// Route pour la soumission du formulaire de contact
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


Route::get('/403', function () {
    return view('errors.403');
})->name('403');

Route::get('/404', function () {
    return view('errors.404');
})->name('404');

Route::get('/500', function () {
    return view('errors.500');
})->name('500');

Route::get('/419', function () {
    return view('errors.419');
})->name('419');
