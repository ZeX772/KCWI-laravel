<?php

namespace Wave\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

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
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('theme::auth.forgot-password');
    }

    /**
     * Send OTP to Mail
     *
     * @return \Illuminate\Http\Response
     */
    public function sendOTPToMail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Request to API
        $response = Http::post(config('services.api_url').'/send-otp-to-mail', [
            'email' => $request->email,
        ]);

        if(! $response->json('success') ) {
            if( $response->json('error_type') == 'mailer' )
                return back()->withInput($request->only('email'))
                        ->withErrors(['mailer' => $response->json('message')]);

            // return back()->withInput($request->only('email'))
            //         ->withErrors(['email' => $response->json('message')]);
    //   dd($request->all());
    
        if ($userData) {
           
            $user = new User();
            $user->fill($userData);

            $token = $responseData1['token'] ?? null;

            if ($token) {
        
                // $user->notify(new ResetPasswordNotification($token));
            }
           
            echo json_encode($responseData1);

            $responseData1['token'] = $token;
            $responseData1['email'] = $email;
            // dd($responseData1);
            return response()->json($responseData1);
        } else {
            return redirect()->back()->with('error', 'User not found or API request failed.');
        }

        Session::forget('countdown_expiration');

        return redirect()->route('wave.user.admin-panel.verify-otp')->with(['email' => $request->email]);
    }
}

    /**
     * Display the form to verify OTP.
     *
     * @return \Illuminate\Http\Response
     */
    public function showVerifyOTPForm()
    {
        $email = session('email');

        if( session('email') == null )
            return redirect()->route('wave.user.admin-panel.forgot-password');

        Session::put('email', $email);

        $user = User::where('email', $email)->first();

        if( ! $user ) {
            return redirect()->route('wave.user.admin-panel.forgot-password')
                ->with([
                    'message' => 'Email not found on the system!', 
                    'message_type' => 'error',
                ]);
        }

        return view('theme::admin-panel.verify-otp', ['email' => $email, 'countdown_expiration' => session('countdown_expiration') ?? null]);
    }

    /**
     * Verify OTP
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyOTP(Request $request)
    {
        // Request to API
        $response = Http::post(config('services.api_url').'/verify-otp', [
            'otp' => $request->otp,
            'email' => $request->email,
        ]);

        Session::put('email', $request->email);
        
        if (! $response->json('success') )
            return redirect()->route('wave.user.admin-panel.verify-otp')->with([
                'email' => $request->email,
            ])->withErrors([
                'otp' => $response->json('message'),
            ]);

        Session::put('my_email', $request->email);
        Session::put('my_otp', $request->otp);
        
        return redirect()->route('wave.user.admin-panel.show-reset-password');
    }

    /**
     * Send OTP to Mail
     *
     * @return \Illuminate\Http\Response
     */
    public function resendOtp(Request $request)
    {
        // Request to API
        $response = Http::post(config('services.api_url').'/resend-otp', [
            'email' => $request->email,
        ]);

        if(! $response->json('success') )
            return response()->json([
                'success' => false,
                'message' => $response->json('message')
            ]);

        $countdownExpiration = null;

        if ( session('countdown_expiration') == null ) {
            $countdownExpiration = $response->json('countdown_expiration');

            Session::put('countdown_expiration', $countdownExpiration);
        }

        return response()->json([
            'success' => true,
            'message' => 'New OTP has been sent.',
            'countdown_expiration' => $countdownExpiration
        ]);
    }
}
