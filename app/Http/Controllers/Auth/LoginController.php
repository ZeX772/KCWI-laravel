<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use TCG\Voyager\Http\Controllers\Controller;

class LoginController extends Controller
{
	use AuthenticatesUsers;

	public function login()
    {
        if ($this->guard()->user()) {
	        return $this->redirectTo();
        }

        return view('theme::auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);
        
    	if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
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

    /*
     * Preempts $redirectTo member variable (from RedirectsUsers trait)
     */
    public function redirectTo()
    {
        $prefix = getPrefixByRole(auth()->user()->role->name);
    	$prefix = $prefix != '' ? $prefix.'.' : $prefix;

        return redirect()->route( $prefix . 'dashboard');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
    	return Auth::guard();
    }

    public function logout()
    {
        Auth::guard()->logout();

        return redirect()->route('login');
    }
    public function showLoginForm()
    {
        return view('theme::auth.login');
    }
    public function authLogin(Request $request)
    {
        // $apiUrl = config('services.api_url') . '/auth-login';
        
        // $credentials = [
        //     'email' => $request->input('email'),
        //     'password' => $request->input('password'),
        // ];
        // $apiResponse = post($apiUrl, $credentials);
        // // dd($apiResponse->status(), $apiResponse->body());
        // // dd($apiResponse);
        // Log::info($apiResponse);
        // $user = auth()->user();
        // if ($apiResponse->successful()) {
        //     $userId = $apiResponse->json('user_id'); // Assuming the user_id is returned in the API response
        //     $token = $apiResponse->json('token');
        //     session(['user_id' => $userId]);
        //     // dd($userId);
        //     // dd(session()->all());
            

        //     return redirect()->route('wave.home')->with('token', $token);
        // } else {
        //     $errors = [
        //         'message' => 'Wrong password or email',
        //         'status_code' => 401,
        //     ];
        
        //     return redirect()->route('auth-login')->withErrors($errors)->withInput();
        // }

        // Make a request to the external API to get the token
        $response = post(config('services.api_url').'/auth-login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'from' => 'student',
        ]);
        
        if( $response->successful() ) {
            // dd($response->status());
            session(['user_id' => $response->json('user_id')]);
            $email = $response->json('email'); //added
            session(['email' => $email]); //student's email
            // * Additional sessions for middleware validation
            session(['api_token' => $request->input('api_token')]);
            
            $response = Http::withToken($request->input('api_token'))->get(config('services.api_url').'/get-user');

            if( $response->json('success') )
                session(['user' => $response->json()['data']['user']]);

            $schoolResponse = Http::withToken($request->input('api_token'))->get(config('services.api_url').'/school/view');

            session(['school' => $schoolResponse->json('response')]);

            session(['api_token_expires_at' => time() + 3600]); // 3600 seconds = 1 hour
            // * end of additional session

            return redirect()->route('wave.home')->with('token', $response->json('access_token'));
        } else {
                $errors = [
                    'message' => 'Wrong password or email',
                    'status_code' => 401,
                ];
            
                return redirect()->route('auth-login')->withErrors($errors)->withInput();
        }
    }
    public function authGuardianLogin(Request $request)
    {
        $apiUrl = config('services.api_url') . '/auth-login1';
        // dd($apiUrl);
        $credentials = [
            'phone' => $request->input('phone_number'),
            'password' => $request->input('guardian_password'),
        ];
        $apiResponse = post($apiUrl, $credentials);
        //  dd($apiResponse->status(), $apiResponse->body());
        // dd($apiResponse);
        $user = auth()->user();
        if ($apiResponse->successful()) {
            $userId = $apiResponse->json('user_id');
            $token = $apiResponse->json('token');
            $studentId = $apiResponse->json('student_id');
            session(['guardian_id' => $userId]);
            session(['student_id' => $studentId]);
            // dd($userId);
            return redirect()->route('wave.home')->with('token', $token);
        } else {
            $errors = [
                'message' => 'Wrong password or phone number',
                'status_code' => 401,
            ];
        
            return redirect()->route('auth-login')->withErrors($errors)->withInput();
        }
    }
}
