<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function loginForm()
    {
        $user = Auth::user();
        if ($user && $user->hasRole('admin')) {
            return redirect()->route('task.index');
        }
        if ($user && $user->hasRole('manager')) {
            return redirect()->route('manager-task.index');
        }
        if ($user && $user->hasRole('user')) {
            return redirect()->route('user-task.index');
        }
        return view('auth.login');
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('task.index');
        } elseif ($user->hasRole('manager')) {
            return redirect()->route('manager-task.index');
        } elseif ($user->hasRole('user')) {
            return redirect()->route('user-task.index');
        } else {
            Auth::logout();
            return view('auth.login');
        }
    }
}
