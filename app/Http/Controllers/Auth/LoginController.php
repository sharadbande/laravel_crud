<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use hash;
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



function login_auth(Request $request)
{ 
     
    $input = $request->all();
//  echo "<pre>";
//  print_r($input);
//  die;
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ]);
 
   
    
 
    if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'] )))
    {  
       
        
        if (auth()->user()->is_admin == 1) {
          
            return redirect()->route('Home');
        }else{
         
            return redirect()->route('admin/home');
        }
    }
    else{ 
        
        return "Email-Address And Password Are Wrong";
        die;

        return redirect()->route('login')
            ->with('error','Email-Address And Password Are Wrong.');
    }
}

public function logout(Request $request) {
    
  
    Auth::logout();
    return redirect('/');
  }



}
