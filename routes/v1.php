<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Livros\CriarLivroController;
use App\Http\Controllers\Livros\ListLivroController;
use App\Http\Controllers\User\CreateUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('auth/token', [AuthController::class, 'login']);
    Route::controller(CreateUserController::class)->group(function () {
        Route::prefix('user')
            ->group(function () {
                Route::post('create', 'store');
            });
    });

    Route::middleware('jwt')->group(function () {

        Route::post('livros', [CriarLivroController::class, 'store']);
        Route::get('livros', [ListLivroController::class, 'index']);
    });
});
