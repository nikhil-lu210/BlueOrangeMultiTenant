<?php

namespace App\Models\Tenant;

use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Illuminate\Support\Str;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    // Define custom columns for the tenant model
    public static function getCustomColumns(): array
    {
        return [
            'id',
            'name',
            'super_admin_name',
            'email',
            'password',
        ];
    }

    public function getIncrementing()
    {
        return true;
    }
}

