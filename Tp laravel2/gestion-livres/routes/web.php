<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

// Redirection racine vers la liste des livres
Route::redirect('/', '/books')->name('home');

// Routes pour les livres
Route::resource('books', BookController::class)->only([
    'index', 'create', 'store', 'show'  // Ajout de create/store pour la création
]);

// Routes pour les avis
Route::middleware('auth')->group(function () {
    // Création d'avis
    Route::post('books/{book}/reviews', [ReviewController::class, 'store'])
        ->name('reviews.store');
    
    // Édition d'avis (avec vérification de permission)
    Route::prefix('reviews')->middleware('can:update,review')->group(function () {
        Route::get('/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
        Route::put('/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    });

    Route::post('/books/{book}/reviews', [ReviewController::class, 'store'])
    ->name('reviews.store')
    ->middleware('auth');
});