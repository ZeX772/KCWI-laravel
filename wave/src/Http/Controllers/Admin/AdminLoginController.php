<?php

namespace Wave\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\School;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isNull;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        $response = get(config('services.api_url').'/school/public-view');

        $school = [];
        if( $response['response'] ?? false ) {
            session(['school' => $response['response']]);
            $school = $response['response'];
        }

        return view('theme::admin-panel.index')->with([
            'data' => $school
        ]);
    }

    /**
     * Process WEB Request Login
     * 
     * @return void
     */
    public function login(LoginRequest $request)
    {
        // Validate if has a valid API TOKEN
        if ( $request->input('api_token') ) {
            session(['api_token' => $request->input('api_token')]);
            
            $response = Http::withToken($request->input('api_token'))->get(config('services.api_url').'/get-user');

            if( $response->json('success') )
                session(['user' => $response->json()['data']['user']]);

            $schoolResponse = Http::withToken($request->input('api_token'))->get(config('services.api_url').'/school/view');

            session(['school' => $schoolResponse->json('response')]);

            // $tokenPayload = Http::withToken($request->input('api_token'))->get(config('services.api_url').'/token/payload');

            // session(['api_token_expires_at' => $tokenPayload->json('data')['exp']]);

            $rememberMe = $request->input('remember_me', false);
            $tokenExpiration = $rememberMe ? config('wave.jwt_expiration.remember_me_expires_in') : config('wave.jwt_expiration.expires_in');
            session(['api_token_expires_at' => time() + $tokenExpiration]);

            // For Requests
            $incomingRequest = Http::withToken($request->input('api_token'))->get(config('services.api_url').'/request/incoming-requests');
            session(['total_request' => $incomingRequest['response']['total_incoming_request']]);

            return redirect()->route('wave.user.admin-main.dashboard');
        } else {
            // dd($request->all());
            if( isset($request->data) ) {
                if(isset($request->data['success']) && ! $request->data['success'] ) {
                    session(['invalid' => $request->data['message']]);
                    return back();
                }
            }

            session([
                'email_error' => 'Email and Pasword are incorrect',
                'email' => $request->email,
                'password' => $request->password,
            ]);

            return back();
        }
    }

    public function forgotPassword()
    {
        return view('theme::admin-panel.forgot-password');
    }

    public function resetPassword()
    {
        return view('theme::admin-panel.reset-password');
    }

    public function verifyOTP()
    {
        return view('theme::admin-panel.verify-otp');
    }

}