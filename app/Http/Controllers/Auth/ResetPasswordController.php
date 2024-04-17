<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

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
    protected $redirectTo = '/login';

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
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request)
    {
        if(null == Session::get('my_email') || null == Session::get('my_otp')) {
            return redirect()->route('forgot-password')
                ->with(['message' => 'Invalid Request!', 'message_type' => 'error']);
        }

        return view('theme::auth.passwords.reset')->with(
            ['email' => Session::get('my_email'), 'otp' => Session::get('my_otp')]
        );
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        if(null == Session::get('my_email') || null == Session::get('my_otp')) {
            return redirect()->route('forgot-password')
                ->with(['message' => 'Invalid Request!', 'message_type' => 'error']);
        }

        if ( $request->password != $request->password1 )
            return back()->withInput([
                    'password' => $request->password,
                    'password1' => $request->password1
                ])->withErrors(['password' => 'Password not match!']);

        $request->merge(['email' => Session::get('my_email')]);
        $request->merge(['otp' => Session::get('my_otp')]);

        $request->validate($this->rules(), $this->validationErrorMessages());

        $user = User::where('email', Session::get('my_email'))->first();

        $response = Password::PASSWORD_RESET;
        if( ! $user ) {
            $response = Password::INVALID_USER;
        }

        $user->otp = null;
        $user->password = Hash::make($request->password);
        $user->save();

        Session::forget('email');
        Session::forget('my_email');
        Session::forget('my_otp');
        
        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($request, $response)
                    : $this->sendResetFailedResponse($request, $response);
    }

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'otp' => 'required',
            'email' => 'required|email',
            'password' => ['required', Rules\Password::defaults()],
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [];
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            return new JsonResponse(['message' => trans($response)], 200);
        }

        // return redirect($this->redirectPath())->with('status', trans($response));
        return redirect()->route('wave.user.admin-panel.index')->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'email' => [trans($response)],
            ]);
        }

        return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
    }
}
