<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Session;

class AdminLoginController extends Controller
{
    //
    use ThrottlesLogins; 
    protected $maxLoginAttempts=3;
    protected $lockoutTime=20; 
    
    public function username()
    {
        return 'email';
    }
    public function login()
    {

        return view('admin_login');

    } 

    protected function hasTooManyLoginAttempts(Request $request)
    {
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), $this->maxLoginAttempts, $this->lockoutTime
        );
    }

    public function checklogin(Request $request)
    {
        $this->validate($request, [
        'email'   => 'required|email',
        'password'  => 'required'
        ]);

        $user_data = array(
        'email'  => $request->get('email'),
        'password' => $request->get('password')
        );

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

       /* $rules = array(
            'email'   => 'required|email',
            'password'  => 'required'
           );*/
        
        //$validator = Validator::make(Input::all(), $rules);

        if (count($request->all()) == 0)
        {
            return back()->with('error', 'Wrong Login Details');
        
        }
        else
        {
            if(Auth::attempt($user_data))
            {
                $this->clearLoginAttempts($request);
                return redirect('admin/dashboard');
            }
            else
            {
                $this->incrementLoginAttempts($request);
                return back()->with('error', 'Wrong Login Details');
            }
        }

    //remember me
    /*
    $remember_me = $request->has('remember_me') ? true : false; 
    if(auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], 
    $remember_me))
    {
        //$user = auth()->user();
        $user = auth()->user();
        Auth::login($user,true);
        //dd($user);
        return redirect('login/successlogin');
    }
    else
    {
        return back()->with('error','your username and password are wrong.');
    }*/




    }

 
    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
