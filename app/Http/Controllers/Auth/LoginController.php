<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
//use Socialite;
use Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm(){

        session()->put('previousUrl', url()->previous());
        return view('auth.login');
    }

    public function redirectTo(){
        return str_replace(url('/'), '', session()->get('previousUrl', '/'));
    }


    public function redirectToProvider(){
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(){
        $user = Socialite::driver('google')->user();

        return $user->token;
    }


}
