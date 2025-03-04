<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [];

    /**
     * Determine if the request has a URI that should pass through CSRF verification.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function inExceptArray($request)
    {
        $host = $request->getHost(); // Get the current domain
        $centralDomain = config('tenancy.central_domains')[0] ?? env('APP_DOMAIN', 'blueorangemultitenant.localhost');

        // If the request is from a central domain or a tenant subdomain, skip CSRF verification
        if ($host === $centralDomain || strpos($host, env('SESSION_DOMAIN', '.blueorangemultitenant.localhost')) !== false) {
            return true; // Skip CSRF verification
        }

        return parent::inExceptArray($request);
    }
}
