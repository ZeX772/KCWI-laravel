<?php


namespace Wave\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;



class User_ResetPassword_Controller extends Controller{


    use ResetsPasswords;

    //redirect user to dashboard after resetign the password
    protected $redirectTo = '/dashboard';

    //constructor
    public function __construct(){
        $this->middleware('guest');
    }

    //display the reset form for the user
    public function showResetForm(Request $request, $token = null)
    {
        return view('theme::auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function sendResetResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            return new JsonResponse(['message' => trans($response)], 200);
        }

        return redirect($this->redirectPath())
                    ->with(['message' => 'Welcome back, you have successfully reset your password.', 'message_type' => 'success']);
    }

}