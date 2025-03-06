<?php

namespace App\Http\Controllers\Tenant;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Tenant\Tenant;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Tenant\TenantRequest;
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

            // Create first tenant
            $this->createFirstSuperAdminUser($tenant);

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


    /**
     * Create first user on tenant
     */
    private function createFirstSuperAdminUser(Tenant $tenant)
    {
        // Create a superAdmin
        $superAdmin = User::create([
            'userid' => date('Ymd'),
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'name' => $tenant->super_admin_name,
            'email' => $tenant->email,
            'password' => $tenant->password,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // Assign a role to the superAdmin
        $superAdminRole = Role::findByName('Super Admin');
        $superAdmin->assignRole($superAdminRole);
        // Assign team_leader
        $superAdmin->employee_team_leaders()->attach($superAdmin->id, ['is_active' => true]);
        // Attach the interaction for this superAdmin
        $superAdmin->interacted_users()->attach($superAdmin->id);
        // Create associated EmployeeShift
        $superAdmin->employee_shifts()->create([
            'start_time' => '14:00:00',
            'end_time' => '22:00:00',
            'total_time' => '08:00:00',
            'implemented_from' => date('Y-m-d'),
        ]);
        // Create associated Leave
        $superAdmin->leave_alloweds()->create([
            'earned_leave' => '120:00:00',
            'casual_leave' => '120:00:00',
            'sick_leave' => '120:00:00',
            'implemented_from' => '01-01',
            'implemented_to' => '12-31',
        ]);
        // Create associated employee for the superAdmin
        $superAdmin->employee()->create([
            'joining_date' => date('Y-m-d'),
            'alias_name' => 'Controller',
            'father_name' => fake()->name('male'),
            'mother_name' => fake()->name('female'),
            'birth_date' => fake()->dateTimeBetween('-30 years', '-20 years')->format('Y-m-d'),
            'personal_email' => fake()->unique()->safeEmail,
            'official_email' => fake()->email(),
            'personal_contact_no' => fake()->phoneNumber(),
            'official_contact_no' => fake()->unique()->phoneNumber(),
        ]);
    }
}
