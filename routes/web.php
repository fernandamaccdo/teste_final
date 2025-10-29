<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicacaoController;
// use App\Http\Controllers\LdController;

// página inicial 
Route::get('/', [HomeController::class, 'listarPublicacoes'])->name('home');

// página de comentários 
Route::get('/publicacao', [PublicacaoController::class, 'listarComentarios'])->name('publicacao');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::post('/like', [LdController::class, 'like'])->name('like'); erro

require __DIR__ . '/auth.php';

