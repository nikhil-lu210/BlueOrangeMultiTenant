<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'super_admin_name',
        'email',
        'password',
        'verification_token',
        'email_verified_at',
    ];
}
