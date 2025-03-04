<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

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

        // Extract the host parts (split by '.')
        $hostParts = explode('.', $host);
        $count = count($hostParts);

        if ($count >= 3) {
            // Subdomain detected (e.g., tenant1.blueorangemultitenant.localhost)
            $baseDomain = implode('.', array_slice($hostParts, -2));
            Config::set('session.domain', '.' . $baseDomain); // Session is for the entire domain
        } elseif ($count == 2) {
            // Main domain detected (e.g., blueorangemultitenant.localhost)
            Config::set('session.domain', null); // No subdomain, so no session sharing
        } else {
            // If no valid domain is detected, make sure session is not set globally
            Config::set('session.domain', null);
        }
    }
}
