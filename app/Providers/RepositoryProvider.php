<?php

namespace App\Providers;

use App\Interfaces\AuthContract;
use App\Interfaces\CreateUserContract;
use App\Interfaces\Livros\CriarLivroContract;
use App\Repositories\AuthRepository;
use App\Repositories\CreateUserRepository;
use App\Repositories\Livros\CriarLivroRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CreateUserContract::class, CreateUserRepository::class);
        $this->app->bind(AuthContract::class, AuthRepository::class);
        $this->app->bind(CriarLivroContract::class, CriarLivroRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
