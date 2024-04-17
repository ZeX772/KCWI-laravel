<?php

namespace Wave\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Http;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function reset(Request $request, $response)
    {
        if( null == Session::get('my_email') || null == Session::get('my_otp') ) {
            return redirect()->route('forgot-password')
                ->with(['message' => 'Invalid Request!', 'message_type' => 'error']);
        }

        // Request to API
        $response = post(config('services.api_url').'/reset-password', [
            'otp' => Session::get('my_otp'),
            'email' => Session::get('my_email'),
            'password' => $request->password,
            'password1' => $request->password1,
        ]);

        if (! $response->json('success') ){
            if( $response->json('error_type') == 'password' )
                return back()->withInput([
                    'password' => $request->password,
                    'password1' => $request->password1
                ])->withErrors(['password' => $response->json('message')]);

            return back()->withErrors([$response->json('error_type') => $response->json('message')]);
        }

        Session::forget('email');
        Session::forget('my_email');
        Session::forget('my_otp');

        return redirect()->route('wave.user.admin-panel.index')->with('status', 'Reset password successfully!');
    }

    public function showResetPassword($token){
        return view('theme::auth.reset-password', ['token' => $token]);
    }   

    
}
