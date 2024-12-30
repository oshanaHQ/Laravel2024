<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// Homepage route
Route::get('/', function () {
    return view('home');
});

// Authentication routes
require __DIR__.'/auth.php';

// Register route
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');

// Login routes
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

// Logout route 
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Protected routes For User's Dashboard, Profile, Wishlist, Favorites
Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', [GameController::class, 'showDashboard'])->name('dashboard');

    // Profile routes For edit, update and delete profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes for games
    Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');
    Route::post('/games/{game}/add-to-favorites', [GameController::class, 'addToFavorites'])->name('games.addToFavorites');
    Route::post('/games/{game}/add-to-wishlist', [GameController::class, 'addToWishlist'])->name('games.addToWishlist');
    Route::delete('/games/{game}/remove-from-favorites', [GameController::class, 'removeFromFavorites'])->name('games.removeFromFavorites');
    Route::delete('/games/{game}/remove-from-wishlist', [GameController::class, 'removeFromWishlist'])->name('games.removeFromWishlist');
    
    // Route to show the user's favorites and wishlist
    Route::get('/favorites', [GameController::class, 'showFavorites'])->name('favorites');
    Route::get('/wishlist', [GameController::class, 'showWishlist'])->name('wishlist');
    
    // Routes for editing and updating a game
    Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
    Route::patch('/games/{game}', [GameController::class, 'update'])->name('games.update');
    Route::post('/games', [GameController::class, 'store'])->name('games.store');

    // Add the route for deleting a game
    Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');  // Add this line
});
