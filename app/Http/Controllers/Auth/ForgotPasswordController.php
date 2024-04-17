<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\SendOTP;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display the form to request OTP.
     *
     * @return \Illuminate\Http\Response
     */
    public function showOTPRequestForm()
    {
        return view('theme::auth.passwords.email');
    }

    /**
     * Send OTP to Mail
     *
     * @return \Illuminate\Http\Response
     */
    public function sendOTPToMail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if( ! $user )
            return back()->withInput($request->only('email'))->withErrors(['email' => 'Email does not exist!']);

        $otp = rand(11111,999999);

        $user->otp = $otp;
        $user->save();

        Mail::to($request->email)->send(new SendOTP($otp));

        return redirect()->route('verify-otp')->with(['email' => $request->email]);
    }

    /**
     * Display the form to verify OTP.
     *
     * @return \Illuminate\Http\Response
     */
    public function showVerifyOTPForm(Request $request)
    {
        if( null == session('email') ) {
            return redirect()->route('forgot-password')
                ->with(['message' => 'Email does not exist!', 'message_type' => 'error']);
        }

        $user = User::where('email', session('email'))->first();

        if( ! $user ) {
            return redirect()->route('forgot-password')
                ->with(['message' => 'Email does not exist!', 'message_type' => 'error']);
        }

        $email = session('email');

        return view('theme::auth.passwords.verify-otp', ['email' => $email]);
    }

    /**
     * Verify OTP
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyOTP(Request $request)
    {
        $request->validate(['otp' => 'required|integer', 'email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if( ! $user ) {
            return back()
                ->with(['message' => 'Email does not exist!', 'message_type' => 'error']);
        }

        if($request->otp != $user->otp) {
            return back()
                ->with(['message' => 'One Time Password is incorrect!', 'message_type' => 'error']);
        }

        Session::put('my_email', $request->email);
        Session::put('my_otp', $request->otp);

        return redirect()->route('reset-password');
    }
}
