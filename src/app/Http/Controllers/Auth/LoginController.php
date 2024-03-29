<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Models\Users;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('home.member.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/member/login');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToGoogle()
    {
        // Google へのリダイレクト
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $gUser = Socialite::driver('google')
            ->stateless()
            ->user();
        $user = Users::where('email', $gUser->email)->first();
        if ($user == null) {
            $user = $this->createUserByGoogle($gUser);
        }
        \Auth::login($user, true);
        return redirect('/');
    }

    public function createUserByGoogle($gUser)
    {
        $user = Users::create([
            'name' => $gUser->name,
            'email' => $gUser->email,
            'password' => \Hash::make(uniqid()),
        ]);
        return $user;
    }
}
