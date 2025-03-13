<?php

namespace App\Providers;

use Illuminate\Support\Str;
use App\Models\Tenant\Tenant;
use Illuminate\Support\Facades\DB;
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

        $this->setTenantConnection();
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

    /**
     * Set the tenant database connection based on subdomain.
     *
     * @return void
     */
    private function setTenantConnection()
    {
        // Get the subdomain
        $fullDomain = request()->getHost();
        $subdomain = Str::before($fullDomain, '.');

        // Try to find a tenant based on the subdomain
        $tenant = Tenant::whereHas('domains', function ($query) use ($subdomain) {
            $query->where('domain', $subdomain);
        })->first();

        if ($tenant) {
            // Initialize the tenant using its database connection
            $tenantDatabase = $tenant->tenancy_db_name;

            // Dynamically set the tenant database connection
            Config::set('database.connections.mysql_tenant.database', $tenantDatabase);

            // Ensure the database connection is refreshed for the tenant's database
            DB::purge('mysql_tenant');
            DB::reconnect('mysql_tenant');
            DB::setDefaultConnection('mysql_tenant');
        } else {
            // Fallback to the landlord connection if no tenant is found
            config(['database.default' => 'mysql_landlord']);
        }
    }
}
