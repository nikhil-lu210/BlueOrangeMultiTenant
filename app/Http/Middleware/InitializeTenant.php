<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Stancl\Tenancy\Tenancy;
use Illuminate\Http\Request;
use App\Models\Tenant\Tenant;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class InitializeTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $fullDomain = $request->getHost();
        $subdomain = Str::before($fullDomain, '.');

        // Try to find a tenant based on the subdomain
        $tenant = Tenant::whereHas('domains', function ($query) use ($subdomain) {
            $query->where('domain', $subdomain);
        })->first();

        if ($tenant) {
            // dd($tenant);
            // Initialize the tenant using Stancl Tenancy package
            app(Tenancy::class)->initialize($tenant);

            // Dynamically set the tenant database connection
            $tenantDatabase = $tenant->tenancy_db_name; // Ensure the tenant has a `tenancy_db_name` field or update accordingly
            Config::set('database.connections.mysql_tenant.database', $tenantDatabase);

            // Ensure the database connection is refreshed for the tenant's database
            DB::purge('mysql_tenant');
            DB::reconnect('mysql_tenant');
            DB::setDefaultConnection('mysql_tenant');
        } else {
            // No tenant found, fallback to landlord DB connection
            config(['database.default' => env('DB_CONNECTION', 'mysql')]);
        }

        return $next($request);
    }
}
