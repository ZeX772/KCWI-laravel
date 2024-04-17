<?php

namespace Wave\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class User_Login_Controller extends Controller{

    function uploadBunny(){
        $request->file();
        BunnyCDN::push($file);
    }
    use AuthenticatesUsers;

    //login function
    public function login(){
        //guard() return the authetication guard used for user authenticationand user() check if the user is currently authenticated using the guard.
        if($this->guard()->user()){
            //if user logged in(non-null value)
            return $this->redirectTo();
        }
        return view('theme::auth.login_user');
    }

    //redirect function
    public function redirectTo(){

        $prefix = getPrefixByRole(auth()->user()->role->name);
        $prefix = $prefix != '' ? $prefix. '.':
        $prefix;

        return redirect()->route($prefix . 'dashboard');
    }

    //postLogin function
    public function postLogin(Request $request){
        //validate the login credentials
        $this->validateLogin($request);
        //check for too many login attempts
        if($this->hasTooManyLoginAttempts($request)){
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        //authentication attempts - if correct then it will send login response
        $credentials = $this->credentials($request);
        if($this->guard()->attempt($credentials, $request->has('remember'))){
            return $this->sendLoginResponse($request);
        }
        //if authentication failed, then it will increment the login attempt
        $this->incrementLoginAttempts($request);
        //if authentication failed until here then send a response indicating a failed login.
        return $this->sendFailedLoginResponse($request);
    }

    //after use was authenticated it will send response
    private function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $response()->json([
            'msg'=>'Login succesfully',
        ]);
    }

    //guard function
    protected function guard(){
        return Auth::guard();
    }

    //logout function
    public function logout(){
        Auth::guard()->logout();
        return redirect()->route('login');
    }

}