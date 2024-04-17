<?php

namespace Wave\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerificationController extends Controller
{
    public function showOTPVerification()
    {
        return view('theme::auth.show-otp');
    }
    public function verifyOTP(Request $request)
{
    $apiUrl = config('services.api_url') . '/verify-otp';

    $userEmail = session('registered_user_email');
    // $enteredOtp = $request->input('otp');
    $combinedOtp = $request->input('combinedInput');
    $token = $request->session()->get('token');

    // dd($combinedOtp);
    $apiResponse = post($apiUrl, [
        'combinedInput' => $combinedOtp,
        'email' => $userEmail,
    ]);
    // dd($apiResponse->body());
    if ($apiResponse->successful()) {
        return redirect()->route('wave.home')->with('token', $token);
    } else {
        // Handle the OTP verification failure
        return redirect()->back()->with('error', 'OTP verification failed. Please try again.');
    }
}

    public function resendCode(Request $request)
{
    $apiUrl1 = config('services.api_url') . '/resend-otp'; 

    $userEmail = session('registered_user_email');

    $apiResponse1 = post($apiUrl1, [
        'email' => $userEmail,
    ]);
        $responseData = $apiResponse1->json();
        $response = [
            'status_code' => $responseData['status_code'] ?? 'default_status_code',
            'msg' => $responseData['msg'] ?? 'default_msg',
        ];
        
        echo json_encode($response);

        return redirect()->route('verify-otp')->with('success', 'Verification code resent successfully.');
    }
      

        public function showNotification(){
            return view('theme::auth.resend-otp');
        }
        }