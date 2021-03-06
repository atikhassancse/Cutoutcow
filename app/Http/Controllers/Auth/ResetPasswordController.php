<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo="/user";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check() && (Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'Admin')){
            $this->redirectTo = route('admin.dashboard');
        }elseif (Auth::check() && (Auth::user()->user_role == 'user' || Auth::user()->user_role == 'user')){
            $this->redirectTo = route('user.dashboard');
        }
        $this->middleware('guest');
    }
}
