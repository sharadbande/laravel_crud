<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

function loginView()
{
    return view('auth.login');
}

function login_auth(Request $request)
{ 
     
    $input = $request->all();
 
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);

    
    $remember_me = $request->has('remember_me') ? true : false; 
 
   
    if(auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me))

    {     
         
        if (auth()->user()->is_admin == 1)
         {
            return redirect()->route('AdminHome')->with('massage','You are log in succesfully...!');

         }
          elseif(auth()->user()->is_admin !== 1)
            {
                Auth::logout();
                return redirect()->route('login_View')->with('massage','You are not Authenticate User...!');
            }
             else
              {
                
                return redirect()->route('login_View')->with('massage','You are not Authenticate User...!');
              }
    }
    else{ 
        
        

        return redirect()->route('login_View')->with('massage','Email Id And Password Are Wrong.');
    }
}

  function SignoutUser(Request $request) {
    
   
    Auth::logout();
    return redirect('/');
  }



}
