<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Tenant\TenantVerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

// Auth::routes();

// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
// // Email Verification Routes
// Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
// Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::get('/verify-tenant/{token}', [TenantVerificationController::class, 'verify'])->name('tenant.verify');
Route::get('/verification/mail/sent', function () {
    return view('tenant.auth.verify');
})->name('tenant.auth.verify');



/*==============================================================
======================< Public Routes >=================
==============================================================*/
Route::middleware(['web'])->group(function () {
    include_once 'application/application.php';
});


// /*==============================================================
// ======================< Administration Routes >=================
// ==============================================================*/
// Route::middleware(['auth', 'active_user'])->group(function () {
//     include_once 'administration/administration.php';
// });
