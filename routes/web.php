<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TypeController;

// Page d'accueil → redirige vers login si non connecté
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('articles.index')
        : redirect()->route('login');
});

// Après connexion → redirige direct vers les articles
Route::get('/dashboard', function () {
    return redirect()->route('articles.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Articles & Types
    Route::resource('articles', ArticleController::class);
    Route::resource('types', TypeController::class);
});

require __DIR__.'/auth.php';