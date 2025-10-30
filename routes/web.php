<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicacaoController;
use App\Http\Controllers\LdController;


Route::get('/', [HomeController::class, 'index'])->name('home');

// usuário logado , (método que preenche $publicacoes)
Route::get('/dashboard', [PublicacaoController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/dashboard-alias', [PublicacaoController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.alias');

// like deslike
Route::post('/like', [PublicacaoController::class, 'like'])
    ->middleware('auth')
    ->name('like');

Route::post('/deslike', [PublicacaoController::class, 'deslike'])
    ->middleware('auth')
    ->name('deslike');

// (dashboard)
Route::get('/publicacao', [PublicacaoController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('publicacao.index');

// comentários
Route::get('/publicacao/{id}', [PublicacaoController::class, 'avaliacoes'])
    ->middleware(['auth', 'verified'])
    ->name('publicacao.show');

    Route::post('/avaliacao', [AvaliacaoController::class, 'store'])->name('avaliacao.store');
    Route::delete('/avaliacao/{id}', [AvaliacaoController::class, 'destroy'])->name('avaliacao.destroy');

    Route::get('/publicacao/{id}', [PublicacaoController::class, 'show'])->name('publicacao.show');




require __DIR__.'/auth.php';



