<?php

namespace Wave\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmergencyContacts;
use App\Models\Siblings;

class User_Profile_Controller extends Controller{

    //Constructor
    public function __construct(){

        $this->middleware('auth:api',['except' => []]);
    }

    //constructs a JSON response with access token
    protected function respondWithToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('wave.api.auth_token_expires',60)
        ]);
    }

    public function completeProfile(Request $request){
        $validator = Validator::make($request->all(),[
            'hkid'  => 'string|max:255',
            'phone'  => 'string|max:255',
            'address'  => 'string|max:255',
            'gender'  => 'string|max:255',
            'nationality'  => 'string',
            'date_of_birth'  => 'string',
            'school'  => 'string',
            'grade_of_class'  => 'string',
            'heard_about'  => 'string',
            'referred_by'  => 'string',
            'emergency_contact'  => 'string',
            'sibling'  => 'string',


        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $user = auth() -> user();

        if(!empty($request->emergency_contact))
        {
            foreach ($request->emergency_contact as $contact) {
                $existingContact = EmergencyContacts::firstOrNew([
                    'user_id' => $user->id,
                    'emergency_contact' => $contact['emergency_contact'],
                ]);
                $existingContact->emergency_contact_name = $contact['emergency_contact_name'];
                $existingContact->emergency_contact_relationship = $contact['emergency_contact_relationship'];
                $existingContact->save();
            }
        }

        if(!empty($request->sibling))
        {
            foreach ($request->sibling as $sibling) {
                $existingContact = Siblings::firstOrNew([
                    'student_id' => $user->id,
                    'sibling_id' => $sibling,
                ]);
                $existingContact->save();
            }
        }

        $user                   = auth()->user();
        $user                   = User::find($user->id);
        $user->hkid             = $request->filled('hkid') ? $request->hkid : null;
        $user->address          = $request->filled('address') ? $request->address : null;
        $user->gender           = $request->filled('gender') ? $request->gender : null;
        $user->date_of_birth    = $request->filled('date_of_birth') ? $request->date_of_birth : null;
        $user->nationality      = $request->filled('nationality') ? $request->nationality : null;
        $user->school           = $request->filled('school') ? $request->school : null;
        $user->phone            = $request->filled('phone') ? $request->phone : null;
        $user->class_year       = $request->filled('grade_of_class') ? $request->grade_of_class : null;
        $user->save();

        return response()->json([
            'msg'=>'Profile updated',
        ]);

    }

}