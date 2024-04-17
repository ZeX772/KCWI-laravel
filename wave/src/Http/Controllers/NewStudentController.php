<?php

namespace Wave\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EmergencyContacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewStudentController extends Controller
{
    public function addNewStudent1(Request $request){

        session()->forget('newStudent');

        $userId = $request->session()->get('userSession')['id'];
    
        // // If Future Maintain put api here to check and return message whether success anot
        // // Not Efficient here basically need to end only post
        // $apiUrl1 = config('services.api_url') . '/newstudent';
        // $requestData = [
        //     'relationship' => $request->input('relationship'),
        //     'guardian_id' => $userId,
        // ];
        // $apiResponse = post($apiUrl1, $requestData);

        session(['newStudent' => [
            'guardian_id' => $userId,
            'relationship' => $request->input('relationship'),
        ]]);

        return redirect()->route('wave.newstudent');
    }

    public function addNewStudent2(Request $request){
        $dob = date('Y-m-d', strtotime(str_replace('/', '-', $request->input('dob'))));

        $requestData = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'dob' => $dob,
            'gender' => $request->input('gender'),
        ];

        // If Future Maintain put api here to check and return message whether success anot
        // Not Efficient here basically need to end only post
        // $apiUrl1 = config('services.api_url') . '/newstudent2';
        // $apiResponse = post($apiUrl1, $requestData);

        $existingData = session('newStudent');

        $combinedData = array_merge($existingData, $requestData);

        session(['newStudent' => $combinedData]);
        session()->forget('add_new_student');
        return redirect()->route('wave.newstudent2');
    }

    public function addNewStudent3(Request $request){

        $requestData = [
            'hkid' => $request->input('hkid'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation'),
            'address' => $request->input('address'),
        ];

        $apiUrl = config('services.api_url') . '/newstudent3';
        $apiResponse = post($apiUrl, $requestData);

        if(!isset($apiResponse) || $apiResponse['status'] == 'fail')
        {
            session(['add_new_student' => $apiResponse]);
            return redirect()->back();
        }
        elseif($apiResponse['status'] == 'pass')
        {
            $existingData = session('newStudent');
            $combinedData = array_merge($existingData, $requestData);
            session(['newStudent' => $combinedData]);

            return redirect()->route('wave.newstudent3');
        }
    }

    public function addNewStudent4(Request $request){

        $requestData = [
            'school_id' => $request->input('school_id'),
            'grade_of_class' => $request->input('grade_of_class'),
            'hear_about_us' => $request->input('hksa_source'),
            'referral_by' => $request->input('referral_by'),
        ];
        ////Optional Checking
        //$apiUrl = config('services.api_url') . '/newstudent4';
        //$apiResponse = post($apiUrl, $combinedData);

        $existingData = session('newStudent');
        $combinedData = array_merge($existingData, $requestData);
        session(['newStudent' => $combinedData]);
        
        return redirect()->route('wave.newstudent4');
    }

    public function addNewStudent5(Request $request){

        $requestData = [
            'emergency_contact' => $request->input('emergency_contact'),
            'emergency_contact_name' => $request->input('emergency_contact_name'),
            'emergency_contact_relationship' => $request->input('emergency_contact_relationship'),
        ];

        $apiUrl = config('services.api_url') . '/newstudent5';
        $apiResponse = post($apiUrl, $requestData);


        if(!isset($apiResponse) || $apiResponse['status'] == 'fail')
        {
            session(['add_new_contact' => $apiResponse]);
            return redirect()->back();
        }
        elseif($apiResponse['status'] == 'pass')
        {
            $existingData = session('newStudent');
            $combinedData = array_merge($existingData, $requestData);
            session(['newStudent' => $combinedData]);
            $finalStudentData = session()->get('newStudent');

            //Run Add New Student Logic
            $apiUrlStudent = config('services.api_url') . '/newstudent6';
            $apiResponseStudentCreate = post($apiUrlStudent, $finalStudentData);

            if(!isset($apiResponse) || $apiResponse['status'] == 'fail')
            {
            session(['add_final_new_student' => $apiResponse]);
            return redirect()->back();
            }
            else if($apiResponse['status'] == 'pass'){
                return redirect()->route('wave.newstudent5');
            }
        }
    }

    public function addNewStudent(){
        return view('theme::student-side.newstudent.addnewstudent');
    }

    public function NewStudent(){
        return view('theme::student-side.newstudent.newstudent');
    }

    public function NewStudent2(){
        return view('theme::student-side.newstudent.newstudent2');
    }

    public function NewStudent3(){
        return view('theme::student-side.newstudent.newstudent3');
    }
    public function NewStudent4(){

        return view('theme::student-side.newstudent.newstudent4');
    }
    public function NewStudent5(){

        return view('theme::student-side.newstudent.newstudent5');
    }

}
