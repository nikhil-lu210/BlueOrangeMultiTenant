<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tenant\Tenant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tenant\TenantRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class TenantVerificationController extends Controller
{
    public function verify(string $token) {
        // Fetch the tenant request based on the verification token
        $tenantRequest = TenantRequest::where('verification_token', $token)
                                      ->whereNull('email_verified_at')
                                      ->firstOrFail();

        // Mark tenantRequest as verified
        $tenantRequest->update([
            'email_verified_at' => now(),
            'verification_token' => NULL,
        ]);

        // Create the tenant in the Tenant model (do not trigger DB creation here if not needed)
        $tenant = Tenant::create([
            'name' => $tenantRequest->name,
            'super_admin_name' => $tenantRequest->super_admin_name,
            'email' => $tenantRequest->email,
            'password' => $tenantRequest->password,
        ]);

        $tenant->domains()->create([
            'domain' => Str::slug($tenant->name). '.' .config('app.domain'),
        ]);

        return redirect()->route('login')->with('success', 'Your account has been verified. You can now log in.');
    }
}
