<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\TenantVerificationMail;
use App\Models\Tenant\TenantRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\TenantRegistrationRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }



    public function register(TenantRegistrationRequest $request)
    {
        DB::transaction(function () use ($request) {
            // Create the tenant record without triggering automatic DB creation
            $tenant = TenantRequest::create([
                'name' => $request->company_name,
                'super_admin_name' => $request->super_admin_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'verification_token' => Str::random(60),
            ]);

            // Send the verification email
            Mail::to($tenant->email)->send(new TenantVerificationMail($tenant));
        }, 5);

        // Return the verification view
        return redirect()->route('tenant.auth.verify');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
