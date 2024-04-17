<?php

namespace Wave\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Models\Role;
use Tymon\JWTAuth\Facades\JWTAuth;
use Wave\ApiKey;
use App\Models\User;
use App\Models\StudentInformation;
use App\Models\CourseEnrollment;
use App\Models\EmergencyContacts;
use App\Models\Siblings;
use App\Models\Guardian;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('wave.api.auth_token_expires', 60)
        ]);
    }

    public function list()
    {
        $role = Role::where('name', 'student')->first();

        $userQuery = User::where('role_id', $role->id)
                ->with(['student_information' => function($schoolQuery){
                    $schoolQuery->with(['level', 'school', 'referrer']);
                }, 'guardians.guardian', 'siblings', 'siblings.sibling.student_information.level', 'emergencyContacts']);

        if ( Auth::user()->role->name != 'superadmin' )
            $userQuery = $userQuery->where('status', 'active');

        $list = $userQuery->get();

        return response()->json([
            'msg' => 'Students list retrieved',
            'response' => $list
        ]);
    }

    public function view(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'     => 'int|required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $query = User::select('users.*, student_informations.*')
            ->where('users.id', $request->id)
            ->where('roles.name', 'student')
            ->join('roles', 'users.role_id', 'roles.id')
            ->join('student_informations', 'users.id', 'student_informations.student_id');

        if($query->get()->isEmpty()) {
            return response()->json([
                'msg'=>'There is no student with the given id.'
            ]);exit;
        } else {
            $user = $query->first();
        }

        return response()->json([
            'msg' => 'Student retrieved',
            'response' => $user
        ]);
    }

    public function archive(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'     => 'int|required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $query = User::select('users.*')
            ->where('users.id', $request->id)
            ->where('users.status', 'active')
            ->where('roles.name', 'student')
            ->join('roles', 'users.role_id', 'roles.id');

        if($query->get()->isEmpty()) {
            return response()->json([
                'msg'=>'There is no student with the given id.'
            ]);exit;
        } else {
            $user = $query->first();
            $user->status = 'archived';
            $user->save();
        }

        return response()->json([
            'msg'=>'Student archived',
        ]);
    }

    public function unarchive(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'     => 'int|required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $query = User::select('users.*')
            ->where('users.id', $request->id)
            ->where('users.status', 'archived')
            ->where('roles.name', 'student')
            ->join('roles', 'users.role_id', 'roles.id');

        if($query->get()->isEmpty()) {
            return response()->json([
                'msg'=>'There is no student with the given id.'
            ]);exit;
        } else {
            $user = $query->first();
            $user->status = 'active';
            $user->save();
        }

        return response()->json([
            'msg'=>'Student unarchived',
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'chinese_name' => 'string|max:255',
            'hkid' => 'required|string',
            'phone' => 'string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string|max:255',
            'school_id' => 'required|int|exists:schools,id',
            'grade_of_class' => 'required|string|max:255',
            'hear_about_us' => 'string|max:255',
            'referral_by' => 'int|exists:users,id',
            'student_level' => 'int|exists:levels,id',
            'guardians' => 'array',
            'guardians.*.id' => 'int|exists:users,id',
            'guardians.*.relationship' => 'string',
            'siblings' => 'array',
            'siblings.*.id' => 'int|exists:users,id',
            'emergency_contacts' => 'array',
            'emergency_contacts.*.emergency_contact' => 'required|string',
            'emergency_contacts.*.emergency_contact_name' => 'required|string',
            'emergency_contacts.*.emergency_contact_relationship' => 'required|string',
            'remarks' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $role = Role::where('name', 'student')->first();
        $user = User::create([
            'role_id' => $role->id,
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'avatar' => 'users/default.png',
            'password' => bcrypt($request->password),
            'username' => $request->email,
            'status' => 'active'
        ]);

        $studentInfo = StudentInformation::create([
            'student_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'chinese_name' => $request->chinese_name,
            'hkid' => $request->hkid,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'address' => $request->address,
            'school_id' => $request->school_id,
            'grade_of_class' => $request->grade_of_class,
            'hear_about_us' => $request->hear_about_us,
            'referral_by' => $request->referral_by,
            'student_level' => $request->student_level,
            'remarks' => $request->remarks
        ]);

        $studentGuardians = [];
        foreach($request->guardians as $guardian)
        {
            $studentGuardians[] = [
                'guardian_id' => $guardian['id'],
                'student_id' => $user->id,
                'relationship' => $guardian['relationship']
            ];
        }
        $guardians = Guardian::insert($studentGuardians);

        $studentSiblings = [];
        foreach($request->siblings as $sibling)
        {
            $studentSiblings[] = [
                'student_id' => $user->id,
                'sibling_id' => $sibling['id']
            ];
        }
        $siblings = Siblings::insert($studentSiblings);

        $emergencyContacts = [];
        foreach($request->emergency_contacts as $contact)
        {
            $contact['user_id'] = $user->id;
            $emergencyContacts[] = $contact;
        }
        $contacts = EmergencyContacts::insert($emergencyContacts);

        return response()->json([
            'msg'=>'Student created',
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'string|required|exists:users,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'chinese_name' => 'string|max:255',
            'hkid' => 'required|string',
            'phone' => 'string',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string|max:255',
            'school_id' => 'required|int|exists:schools,id',
            'grade_of_class' => 'required|string|max:255',
            'hear_about_us' => 'string|max:255',
            'referral_by' => 'int|exists:users,id',
            'student_level' => 'int|exists:levels,id',
            'guardians' => 'array',
            'guardians.*.id' => 'int|exists:users,id',
            'guardians.*.relationship' => 'string',
            'siblings' => 'array',
            'siblings.*.id' => 'int|exists:users,id',
            'emergency_contacts' => 'array',
            'emergency_contacts.*.emergency_contact' => 'required|string',
            'emergency_contacts.*.emergency_contact_name' => 'required|string',
            'emergency_contacts.*.emergency_contact_relationship' => 'required|string',
            'remarks' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $role = Role::where('name', 'student')->first();
        $user = User::where('id', $request->id)->where('role_id', $role->id)->first();

        if($user->isEmpty)
        {
            return response()->json(['msg' => 'Student not found']);
        }

        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        if($request->password != '')
        {
            $user->password = bcrypt($request->password);
        }
        $user->username = $request->email;
        $user->save();

        $studentInfo = $user->student_information;
        $studentInfo->first_name = $request->first_name;
        $studentInfo->last_name = $request->last_name;
        $studentInfo->chinese_name = $request->chinese_name;
        $studentInfo->hkid = $request->hkid;
        $studentInfo->phone = $request->phone;
        $studentInfo->dob = $request->dob;
        $studentInfo->gender = $request->gender;
        $studentInfo->address = $request->address;
        $studentInfo->school_id = $request->school_id;
        $studentInfo->grade_of_class = $request->grade_of_class;
        $studentInfo->hear_about_us = $request->hear_about_us;
        $studentInfo->referral_by = $request->referral_by;
        $studentInfo->student_level = $request->student_level;
        $studentInfo->remarks = $request->remarks;
        $studentInfo->save();

        Guardian::where('student_id', $user->id)->delete();
        $studentGuardians = [];
        foreach($request->guardians as $guardian)
        {
            $studentGuardians[] = [
                'guardian_id' => $guardian['id'],
                'student_id' => $user->id,
                'relationship' => $guardian['relationship']
            ];
        }
        $guardians = Guardian::insert($studentGuardians);

        Siblings::where('student_id', $user->id)->delete();
        $studentSiblings = [];
        foreach($request->siblings as $sibling)
        {
            $studentSiblings[] = [
                'student_id' => $user->id,
                'sibling_id' => $sibling['id']
            ];
        }
        $siblings = Siblings::insert($studentSiblings);

        EmergencyContacts::where('user_id', $user->id)->delete();
        $emergencyContacts = [];
        foreach($request->emergency_contacts as $contact)
        {
            $contact['user_id'] = $user->id;
            $emergencyContacts[] = $contact;
        }
        $contacts = EmergencyContacts::insert($emergencyContacts);

        return response()->json([
            'msg'=>'Student updated',
        ]);
    }

    public function enrollCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'int|required|exists:users,id',
            'package_id' => 'int|required|exists:course_package,id',
            'is_paid' => 'int|required',
            'status' => 'string|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $enrollment = CourseEnrollment::insert($request->input());
        return response()->json([
            'msg'=>'Enrollment successful',
        ]);
    }
}
