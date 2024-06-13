<?php

namespace App\Providers;

use App\Models\Warga;
use App\Services\CivilliantService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CivilliantService::class, function () {
            return new CivilliantService();
        });

        if (env('APP_ENV') === 'production') $this->app['request']->server->set('HTTPS', true);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        Paginator::defaultView('components.pagination.index');

        /*
         * Validator for checking if a family has only one head.
         * */
        Validator::extend('one_head_per_family', function ($attribute, $value, $parameters, $validator) {
            $noKK = $parameters[0];

            $headExists = Warga::with('status')
                ->where('noKK', $noKK)
                ->whereHas('status', function ($query) {
                    $query->where('status_peran', 'Kepala keluarga');
                })
                ->exists();

            return !($headExists && $value === 'Kepala keluarga');
        }, 'Setiap keluarga hanya boleh memiliki satu Kepala Keluarga.');
    }
}
