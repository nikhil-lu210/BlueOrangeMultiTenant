<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        $this->setSessionDomain();
    }

    protected function setSessionDomain()
    {
        $host = Request::getHost();

        // Extract the base domain dynamically (last two parts of the domain)
        $hostParts = explode('.', $host);
        $count = count($hostParts);

        if ($count >= 3) {
            // Has a subdomain, set session for the entire domain
            $baseDomain = implode('.', array_slice($hostParts, -2));
            Config::set('session.domain', '.' . $baseDomain);
        } else {
            // No subdomain, set session only for this domain
            Config::set('session.domain', null);
        }
    }
}
