<?php

namespace App\Http\Controllers\Tenant;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tenant\Tenant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tenant\TenantRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

class TenantVerificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        config(['database.default' => env('DB_CONNECTION', 'mysql')]);
    }

    public function verify(string $token) {
        try {
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
                // 'domain' => Str::slug($tenant->name). '.' .config('app.domain'),
                'domain' => Str::slug($tenant->name),
            ]);

            // Get the tenant database name
            $tenantDatabase = $tenant->tenancy_db_name;

            // Ensure the tenant database exists
            $this->createTenantDatabase($tenantDatabase);

            // Set the database name dynamically
            Config::set("database.connections.mysql_tenant.database", $tenantDatabase);

            // Force Laravel to refresh the database connection
            DB::purge('mysql_tenant');
            DB::reconnect('mysql_tenant');

            // Ensure the new connection is being used
            DB::setDefaultConnection('mysql_tenant');

            // Run migrations before seeding
            Artisan::call('migrate', ['--database' => 'mysql_tenant', '--force' => true]);

            // Run seeders on the correct tenant database
            Artisan::call('db:seed', ['--database' => 'mysql_tenant', '--force' => true]);

            // Dynamically generate the subdomain URL
            $subdomain = $tenant->domains()->first()->domain;
            $url = 'https://' . $subdomain . '.' . config('app.domain'). '/login';

            // Redirect to the tenant's subdomain URL
            return redirect()->to($url);
        } catch (Exception $e) {
            dd('Tenant Error: '. $e->getMessage());
        }
    }


    /**
     * Create the tenant database if it doesn't exist.
     */
    private function createTenantDatabase(string $databaseName) {
        $landlordDbConnection = env('DB_CONNECTION');
        $pdo = DB::connection($landlordDbConnection)->getPdo(); // Use landlord DB connection

        // Correct way to check if the database exists
        $statement = $pdo->query("SHOW DATABASES LIKE '$databaseName'");

        if (!$statement->fetch()) {
            // Correct way to create the database
            $pdo->exec("CREATE DATABASE `$databaseName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        }
    }
}
