<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Banner\BannerRepositoryInterface;
use App\Repositories\Banner\BannerRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BannerRepositoryInterface::class, BannerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
