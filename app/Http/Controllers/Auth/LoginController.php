<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\VerifyRegistration;
use Auth;

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
    public const HOME = '/';
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     public function login(Request $request)
    {
         $request->validate([
           'email' => 'required|email',
          'password' => 'required',
        ]);
         //Find User by this email
         $user =User::where('email',$request->email)->first();
         if ($user->status == 1) 
         {
            //login this user
            if (Auth::guard('web')->attempt(['email' => $request->email,'password'=> $request->password], $request->remember))
             {
                return redirect('/');
               
            }
            else
            {

                  session()->flash('ERROR','Invalide Login!!');
                   return back();

            }
         }
         else
         {
            //send him a token again
            if (!is_null($user))
             {
               $user->notify(new VerifyRegistration($user));

                  session()->flash('succes','A new Confirmation email has sent to you.. Please Checked Your Email');
        return redirect('/');
            }
            else
            {
                  session()->flash('ERROR','Please Login first!!');
        return redirect('/')->route('login');
            }
         }

    }
}
