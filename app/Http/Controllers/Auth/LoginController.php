<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // dd($request->all());
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/login');
    }



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
