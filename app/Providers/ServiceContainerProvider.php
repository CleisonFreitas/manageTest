<?php

namespace App\Providers;

use App\Classes\Services\Containers\AuthService;
use App\Classes\Services\Containers\LivroServiceContainer;
use App\Classes\Services\Containers\UserServiceContainer;
use App\Interfaces\AuthContract;
use App\Interfaces\CreateUserContract;
use App\Interfaces\ListLivrosContract;
use App\Interfaces\Livros\CriarLivroContract;
use Illuminate\Support\ServiceProvider;

class ServiceContainerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceContainer::class, function ($app) {
            return new UserServiceContainer(
                $app->make(CreateUserContract::class),
            );
        });
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthService(
                $app->make(AuthContract::class)
            );
        });
        $this->app->bind(LivroServiceContainer::class, function ($app) {
            return new LivroServiceContainer(
                $app->make(CriarLivroContract::class),
                $app->make(ListLivrosContract::class)
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
