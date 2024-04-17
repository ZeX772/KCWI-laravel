<?php

namespace wave\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Facades\App\Services\BunnyCDN;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function addGuardianAcc(Request $request)
    {
        $apiUrl = config('services.api_url') . '/add-guardian-account';
        //  print_r($request->input());exit;

        $user_id = session('user_id');

        $requestData = [
            'relationship' => $request->input('relationship'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation'),
            'student_id' => $user_id,
        ];
        // dd($requestData);
        $apiResponse = post($apiUrl, $requestData);
        $token = $apiResponse->json('token');

        return redirect()->route('wave.account')->with('token', $token);
    }
    public function changePassword(Request $request)
    {
        $apiUrl = config('services.api_url') . '/change-password';
        $user = $request->session()->get('userSession');
        $userId = $user['id'];
        $requestData = [
            'password' => $request->input('password'),
            'new_password' => $request->input('new_password'),
            'password_confirmation' => $request->input('password_confirmation'),
            'userId' => $userId,
        ];
        $apiResponse = post($apiUrl, $requestData);

        session()->put('changePassword', $apiResponse);

        return back();
    }
    public function editPersonalInformation(Request $request)
    {
        $apiUrl = config('services.api_url') . '/edit-personal-information';

        $user = $request->session()->get('userSession');
        $userId = $user['id'];
        $dob = date('Y-m-d', strtotime(str_replace('/', '-', $request->input('dob'))));
        $requestData = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'hkid' => $request->input('hkid'),
            'gender' => $request->input('gender'),
            'dob' => $dob,
            'address' => $request->input('address'),
            'userId' => $userId,
        ];
        $apiResponse = post($apiUrl, $requestData);

        session()->put('edit_status', $apiResponse);

        return back();
    }
    public function showAccount(Request $request)
    {

        $user = $request->session()->get('userSession');

        $apiUrl = config('services.api_url') . '/profile';
        $apiResponse = post($apiUrl, $user);
        $response = $apiResponse['response'];

        return view('theme::account.account', ['response' => $response[0], 'user_id' => $user['id']]);
    }
    public function showPersonalInformation(Request $request)
    {
        $user = $request->session()->get('userSession');
        $apiUrl = config('services.api_url') . '/profile';
        $apiResponse = post($apiUrl, $user);
        $response = $apiResponse['response'][0];

        return view('theme::account.personal-information', ['response' => $response]);
    }
    public function showEditPersonalInformation(Request $request)
    {
        $user = $request->session()->get('userSession');
        $apiUrl = config('services.api_url') . '/profile';
        $apiResponse = post($apiUrl, $user);
        $response = $apiResponse['response'][0];

        return view('theme::account.edit-personal-information', ['response' => $response, 'role_id' => $user['role_id'], 'user_id' => $user['id']]);
    }
    public function showAddGuardianAcc()
    {
        return view('theme::account.add-guardian');
    }
    public function showChangePassword(Request $request)
    {
        $user = $request->session()->get('userSession');
        return view('theme::account.change-password', ['user_id' => $user['id']]);
    }
    public function showPaymentMethod()
    {
        $apiUrl = config('services.api_url') . '/customer/payment-method/' . session('userSession')['id'] . '/show';
        $apiResponse = get($apiUrl);

        return view('theme::account.payment-method')->with([
            'entry' => $apiResponse['response'] ? json_decode($apiResponse['response']['additional_details']) : null
        ]);
    }
    public function showFAQ()
    {
        $apiUrl = config('services.api_url') . '/customer/faq/categories';
        $apiResponse = get($apiUrl);
        $faq = $apiResponse;
        $faqArray = $faq['response'];

        return view('theme::account.faq', ['responses' => $faqArray]);
    }
    public function showSingleRegistrationFAQ($id)
    {

        $apiUrl = config('services.api_url') . '/customer/faq/list/' . $id;
        $apiResponse = get($apiUrl);
        $singleFaq = $apiResponse;
        $singleFaq = $singleFaq['response'];

        return view('theme::account.registration-faq', ['faqList' => $singleFaq]);
    }

    public function showPrivacyPolicy()
    {
        $apiUrl = config('services.api_url') . '/privacypolicy';
        $apiResponse = get($apiUrl);
        $policy = $apiResponse;

        return view('theme::account.privacy-policy', ['policy' => $policy]);
    }

    public function storeImgProfile(Request $request)
    {

        $user = $request->session()->get('userSession');
        $userId = $user['id'];
        $requestData = [
            'userId' => $userId,
            'imageName' => null,
        ];

        if ($request->hasFile('pro-image')) {
            session(['uploadSuccess' => '']);
            $file = $request->file('pro-image');

            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            try {
                $imageName = BunnyCDN::updateFile($file, $filename, 'hksa/profile-image/')['url'];
                $requestData['imageName'] = $imageName;

                // Update profile via API
                $apiUrlUpdate = config('services.api_url') . '/updateprofile';
                $apiResponseUpdate = post($apiUrlUpdate, $requestData);
                $success = 'Image Saved';

                session(['uploadSuccess' => $success]);

                if ($apiResponseUpdate) {
                    // Retrieve updated profile
                    $apiUrl = config('services.api_url') . '/profile';
                    $apiResponse = post($apiUrl, ['userId' => $userId]);
                    if ($apiResponse) {
                        $profile = $apiResponse;
                        $success = 'Image Saved';
                        return back();
                    } else {
                        throw new \Exception("Failed to retrieve updated profile.");
                    }
                } else {
                    throw new \Exception("Failed to update profile.");
                }
            } catch (\Exception $e) {
                $errors = [
                    'message' => $e->getMessage(),
                    'status_code' => 500, // Internal Server Error
                ];
                return redirect()->route('wave.personal-information')->withErrors($errors)->withInput();
            }
        } else {
            $errors = [
                'message' => 'Error: No image uploaded.',
                'status_code' => 400, // Bad Request
            ];
            return redirect()->route('wave.personal-information')->withErrors($errors)->withInput();
        }
    }
}
