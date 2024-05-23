<?php

namespace App\Providers;

use App\Services\CivilliantService;
use App\Services\EdasService;
use App\Services\MabacService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class SPKServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $services = [
            EdasService::class,
            MabacService::class,
        ];

        foreach ($services as $service) {
            $this->app->singleton($service, function () use ($service) {
                return new $service();
            });
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
