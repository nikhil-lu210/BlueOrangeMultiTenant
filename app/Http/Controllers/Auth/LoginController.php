<?php

namespace App\Http\Controllers\Auth;

use Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('initialize_tenant');
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        // // Log database info here after tenant has been initialized
        // Log::info('Current Database From showLoginForm:', [
        //     'database' => DB::connection()->getDatabaseName(),
        //     'host-url' => request()->getHost(),
        //     'users' => User::all()
        // ]);

        return view('auth.login'); // Or wherever your login form is rendered
    }

    /**
     * Get the login field to be used by the controller.
     *
     * @return string
     */
    public function loginEmail()
    {
        return 'email';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ], [
            'email.required' => 'The Login Email is required.',
            'password.required' => 'The password is required.',
        ]);
    }


    /**
     * Email & password
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
    }

    /**
     * Override the attemptLogin method to check for active status
     */
    protected function attemptLogin(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        // Log::info('User status during login attempt:', [
        //     'email' => $request->input('email'),
        //     'status' => $user ? $user->status : null
        // ]);

        $loginAttempt = $this->guard()->attempt(
            array_merge($this->credentials($request), ['status' => 'Active']),
            $request->filled('remember')
        );

        // Log::info('Login attempt result:', ['success' => $loginAttempt]);

        if ($loginAttempt) {
            auth()->login($user, true);
            // Log::info('User manually logged in:', ['email' => $user->email]);
        }

        // Log session data after login
        // Log::info('Session Data After Login:', session()->all());

        return $loginAttempt;
    }



    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // Log::info('User authenticated:', [
        //     'id' => $user->id,
        //     'email' => $user->email
        // ]);
    }

    // public function logout(Request $request)
    // {
    //     dd($request);
    //     Log::info('User Logging Out:', ['id' => auth()->id()]);

    //     Auth::guard('web')->logout();
    //     Session::flush();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     Log::info('Session after logout:', session()->all());

    //     return redirect('/login');
    // }


    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if ($user && $user->status !== 'Active') {
            return redirect()->back()->withErrors([
                'email' => 'Your account is not active. Please contact support.',
            ]);
        }

        throw ValidationException::withMessages([
            $this->loginEmail() => [trans('auth.failed')],
        ]);
    }

}
