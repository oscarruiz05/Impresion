<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // if (env('REDIRECT_HTTPS')) {
        //     $this->app['request']->server->set('HTTPS', true);
        // }
        if (env('APP_ENV') != 'local') {
            $this->app['request']->server->set('HTTPS', true);
        }
    }
    public function boot(UrlGenerator $url)
    {
        if (env('APP_ENV') != 'local') {
            // URL::formatScheme('https://');
            $url->formatScheme('https://');
        }
        // if (env('REDIRECT_HTTPS')) {
        //     $url->formatScheme('https://');
        // }
    }
}
