<?php

namespace Wave\Http\Controllers\API\User;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class User_ForgotPassword_Controller extends Controller{

    use SendsPasswordResetEmails;

    //constructor set up middleware that will check if the user is authenticated.
    public function __construct(){
        $this->middleware('guest');
    }

    //display the form that allow user to insert their email addresses
    public function showLinkRequestForm(){
        return view('theme::auth.passwords.email');
    }

}