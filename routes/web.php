<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedController;

// 🏠 Route d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// 🚀 Routes accessibles aux visiteurs (non connectés)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthenticatedController::class, 'formRegister'])->name('register');
    Route::post('/register', [AuthenticatedController::class, 'register']);

    Route::get('/login', [AuthenticatedController::class, 'formLogin'])->name('login');
    Route::post('/login', [AuthenticatedController::class, 'login']);
});

// 🔒 Routes protégées (nécessitent une connexion)
Route::middleware('auth')->group(function () {
    Route::get('/page', [AuthenticatedController::class, 'page'])->name('page');
    Route::post('/logout', [AuthenticatedController::class, 'logout'])->name('logout');
});

// 🔄 Permet aussi de se déconnecter via un lien GET (optionnel)
Route::get('/logout', function () {
    return redirect('/')->with('etat', 'Vous avez été déconnecté avec succès.');
})->middleware('auth');
