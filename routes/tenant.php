<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyBySubdomain::class,  // Make sure this is first
    PreventAccessFromCentralDomains::class,
    'guest',  // Then add the guest middleware
    'initialize_tenant',
])->group(function () {
    // Auth::routes();
    /*==============================================================
    ===========================< Auth Routes >======================
    ==============================================================*/
    include_once 'custom_auth/auth.php';

    Route::get('/', function () {
        dd('Tenant ID: ' . tenant('id')); // Debugging the tenant ID
        return view('welcome');
    })->name('homepage');
});


Route::middleware([
    'web',
    'auth',
    'active_user',
    'initialize_tenant',
    InitializeTenancyBySubdomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    /*==============================================================
    ======================< Administration Routes >=================
    ==============================================================*/
    include_once 'administration/administration.php';
});
