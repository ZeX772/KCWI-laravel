<?php

namespace Wave\Http\Controllers\Auth;

use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use function PHPUnit\Framework\isNull;

use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('theme::auth.login');
    }

    public function authLogin(LoginRequest $request)
    {
        // Validate if has a valid API TOKEN
        if ($request->input('api_token')) {
            session(['user_id' => $request->input('user_id')]);

            session(['api_token' => $request->input('api_token')]);

            $response = Http::withToken($request->input('api_token'))->get(config('services.api_url') . '/get-user');

            if ($response->json('success'))
                session(['user' => $response->json()['data']['user']]);

            $schoolResponse = Http::withToken($request->input('api_token'))->get(config('services.api_url') . '/school/view');

            session(['school' => $schoolResponse->json('response')]);

            // $tokenPayload = Http::withToken($request->input('api_token'))->get(config('services.api_url').'/token/payload');

            // session(['api_token_expires_at' => $tokenPayload->json('data')['exp']]);

            session(['api_token_expires_at' => time() + 3600]); // 3600 seconds = 1 hour

            return redirect()->route('wave.home')->with('token', $response->json('access_token'));
        } else {
            $errors = [
                'message' => 'Wrong password or email',
                'status_code' => 401,
            ];

            return back()->withInput($request->only(['email', 'password']))->withErrors($errors);
        }
    }

    public function authCustomerLogin(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'remember_me' => $request->input('remember_me'),
        ];

        $apiResponse = post(config('services.api_url') . '/customer/login', $credentials);

        if (isset($apiResponse['access_token'])) {
            $token = $apiResponse['access_token'];

            session(['token' => $token]); // Store token into separate session
            session(['userSession' => $apiResponse['user']]);
            session(['role' => $apiResponse['role']]);

            return redirect()->route('wave.home');
        } else {
            $errors = [
                'message' => 'Wrong email or password',
                'status_code' => 401,
            ];

            session([
                'auth_error' => $apiResponse['message'],
                'email' => $request->email,
                'password' => $request->password,
            ]);

            return redirect()->route('request.auth-login')->withErrors($errors)->withInput();
        }
    }


    public function authCustomerRegister(Request $request)
    {
        if($request->has('phone')){
            $credentials = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'type' => $request->input('type'),
                'phone' => $request->input('phone'),
                'password_confirmation' => $request->input('password_confirmation'),
            ];
        }
        else{
            $credentials = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'type' => $request->input('type'),
                'password_confirmation' => $request->input('password_confirmation'),
            ];
        }

        $apiUrl = config('services.api_url') . '/customer/register';
        $apiResponse = post($apiUrl, $credentials);
        
        if ($apiResponse['status']!=='fail') {

            $token = $apiResponse['access_token'];
            session(['token' => $token]); // Store token into separate session
            session(['userSession' => $apiResponse['user']]);
            session(['role' => $apiResponse['role']]);
            session(['account_created' => 'Account created Successful! You Are Free To Sign In Now']);
            
            return redirect()->route('login');
        } else {
            $errors = $apiResponse;
            session(['auth_register' => $errors]);
            return redirect()->route('register');
        }
    }

    public function authGuardianLogin(Request $request)
    {
        // $apiUrl = config('services.api_url') . '/auth-login1';
        // // dd($apiUrl);
        // $credentials = [
        //     'phone' => $request->input('phone_number'),
        //     'password' => $request->input('guardian_password'),
        // ];
        // $apiResponse = post($apiUrl, $credentials);
        // //  dd($apiResponse->status(), $apiResponse->body());
        // // dd($apiResponse);
        // $user = auth()->user();
        // if ($apiResponse->successful()) {
        //     $userId = $apiResponse->json('user_id');
        //     $token = $apiResponse->json('token');
        //     $studentId = $apiResponse->json('student_id');
        //     session(['guardian_id' => $userId]);
        //     session(['student_id' => $studentId]);
        //     // dd($userId);
        //     return redirect()->route('wave.home')->with('token', $token);
        // } else {
        //     $errors = [
        //         'message' => 'Wrong password or phone number',
        //         'status_code' => 401,
        //     ];

        //     return redirect()->route('auth-login')->withErrors($errors)->withInput();
        // }

        if ($request->input('api_token')) {
            session(['guardian_id' => $request->input('user_id')]);
            session(['student_id' => $request->input('student_id')]);

            session(['api_token' => $request->input('api_token')]);

            $response = Http::withToken($request->input('api_token'))->get(config('services.api_url') . '/get-user');

            if ($response->json('success'))
                session(['user' => $response->json()['data']['user']]);

            $schoolResponse = Http::withToken($request->input('api_token'))->get(config('services.api_url') . '/school/view');

            session(['school' => $schoolResponse->json('response')]);

            session(['api_token_expires_at' => time() + 3600]); // 3600 seconds = 1 hour

            return redirect()->route('wave.home')->with('token',  $request->input('api_token'));
        } else {
            $errors = [
                'message' => 'Wrong password or phone number',
                'status_code' => 401,
            ];

            return redirect()->route('auth-login')->withErrors($errors)->withInput();
        }
    }

    public function logout()
    {
        // Start or resume the session
        Session::flush();

        return redirect()->route('auth-login');
    }
}
