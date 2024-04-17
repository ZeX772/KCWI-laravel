<?php

namespace Wave\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Models\Role;
use Tymon\JWTAuth\Facades\JWTAuth;
use Wave\ApiKey;
use App\Models\User;
use App\Notifications\UserRegistered;


class User_Authenticate_Controller extends Controller{

    //the constructor of the function
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'token', 'register']]);
    }

    //login function
    public function login(){

        $credentials = request(['email', 'password']);
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    //logout function
    public function logout(){
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function token(){
        //get current request object using laravel application helper
        $request = app('request');

        //check if the 'key' parameter is present in the request
        if(isset($request->key)){

            //find an API key record in the database based on the provided key
            $key = ApiKey::where('key', '=', $request->key)->first();

            //update the last_used_at timestamp
            $key->update([
                'last_used_at' => Carbon::now(),
            ]);

            //check if a valid API key record was found
            if(isset($key->id)){
                return response()->json(['access_token' => JWTAuth::fromUser($key->user, ['exp' => config('wave.api.key_token_expires', 1)])]);
            } else {
                abort('400', 'Invalid Api Key');
            }

        } else {
            //if they 'key' parameter is not present in the request return a 401 reponse
            abort('401', 'Unauthorized');
        }

    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('wave.api.auth_token_expires', 60)
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:250|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $otpCode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $role = Role::where('name', config('voyager.user.default_role'))->first();
        //this will invoke the create function
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'avatar' => 'users/default.png',
            'password' => bcrypt($request->password),
            'role_id' => $role->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->email,
            'email_code' => $otpCode
        ]);
        $user->notify(new UserRegistered($otpCode));
        $credentials = ['email' => $request['email'], 'password' => $request['password']];

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

}