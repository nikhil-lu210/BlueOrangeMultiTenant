<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Stancl\Tenancy\Tenancy;
use Illuminate\Http\Request;
use App\Models\Tenant\Tenant;
use Symfony\Component\HttpFoundation\Response;

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
            app(Tenancy::class)->initialize($tenant);
        } else {
            // No tenant found, set default DB connection (optional)
            config(['database.default' => env('DB_CONNECTION', 'mysql')]);
        }

        return $next($request);
    }
}
