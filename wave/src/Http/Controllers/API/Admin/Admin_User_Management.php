<?php

namespace Wave\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\users_table; 
use App\Models\roles_table; //newly added
use App\Models\schools_table;
use Illuminate\Http\Request;
//add this for Auto Increment fix
use Illuminate\Support\Facades\DB;

class Admin_User_Management extends Controller{

    //Add Student function
    public function addUser(Request $request){

        //start a database transaction
        DB::beginTransaction();

        try{
            //validate the request data
            $request->validate([
                //role_id = 1(admin) 2(student)
                'role_id' => 'required|integer',    
                //'school_id' => 'required|integer',
                'school_id' => ($request->input('role_id') == 2) ? 'required|integer' : '',
                'username' => 'required|string',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'chinese_name' => 'required|string',

                //newly added
                'hkid' => 'required|string',
                'address' => 'required|string',
                'nationality' => 'required| string',
                'phone' => 'required|string',
                'email' => 'required|string',
                'dob' => 'required|date_format:Y-m-d',
                'remarks' => 'required|string',
                'archived' => 'boolean' //default it will be false

            ]);

            //retrieve the input data from the request and then set role_id to 2 (student)
            $user = users_table::create([
                'role_id' => $request->input('role_id'),
                'school_id' => $request->input('school_id'),
                'username' => $request->input('username'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'chinese_name' => $request->input('chinese_name'),
                
                //newly added
                'hkid' => $request->input('hkid'),
                'address' => $request->input('address'),
                'nationality' => $request->input('nationality'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'dob' => $request->input('dob'),
                'remarks' => $request->input('remarks'),
                //use the provided value or default to false
                'archived' => $request->input('archived', false),

            ]);

            DB::commit();

            //return a success response
            return response()->json(['message' => 'Users added successfully', 'user' => $user], 201);
        
        }catch(\Illuminate\Validation\ValidationException $e){
            
            DB::rollback();

            //Validation failed
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        
        }catch(\Exception $e){

            DB::rollback();

            //Other unexpected errors
            return response()->json(['message' => 'Error adding user', 'error' => $e->getMessage()], 500);
        
        }
        

    }

    // //Add admin function
    // public function addAdmin(Request $request){
        
    //     try{
    //         //validate the request data
    //         $request->validate([
    //             //role_id = 1(admin) 2(student)
    //             'role_id' => 'required]integer',    
    //             'school_id' => 'required|integer',
    //             'username' => 'required|string',
    //             'first_name' => 'required|string',
    //             'last_name' => 'required|string',
    //             'chinese_name' => 'required|string'

    //         ]);

    //         //retrieve the input data from the request and then set role_id to 2 (student)
    //         $user = users_table::create([
    //             'role_id' => '1', //role_id = 2 (student)
    //             'school_id' => $request->input('school_id'),
    //             'username' => $request->input('username'),
    //             'first_name' => $request->input('first_name'),
    //             'last_name' => $request->input('last_name'),
    //             'chinese_name' => $request->input('chinese_name'),
    //         ]);

    //         //return a success response
    //         return response()->json(['message' => 'admin added successfully', 'user' => $user], 201);
        
    //     }catch(\Illuminate\Validation\ValidationException $e){
            
    //         //Validation failed
    //         return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        
    //     }catch(\Exception $e){

    //         //Other unexpected errors
    //         return response()->json(['message' => 'Error adding admin'], 500);

    //     }

    // }



    //List Student function
    // public function listStudent()
    // {
    //     try {
    //         //Retrieve all students from the users_table
    //         //$students = users_table::where('role_id', '=', 2)->get();

    //         // Retrieve all students from the users_table
    //         $students = users_table::where('role_id', 2)->select('id','username','role_id','created_at')->with(['roleName:role_id,role_name'])->get();
    //         // Transform the result to include role_name directly in the student's structure
    //         $formattedStudents = $students->map(function ($student) {
    //             return [
    //                 'id' => $student->id,
    //                 'username' => $student->username,
    //                 'role_id' => $student->role_id,
    //                 'role_name' => $student->roleName->role_name,
    //                 'created_at' => $student->created_at
    //              ];
    //         });

    //         //Return a success response
    //         return response()->json(['message' => 'Students listed successfully', 'students' => $formattedStudents], 200);
    //     } catch (\Exception $e) {
    //         //Handle unexpected errors
    //         return response()->json(['message' => 'Error listing students', 'error' => $e->getMessage()], 500);
    //     }
    // }
    

    //listUser function
    public function listUser(Request $request)
    {
        try {
            // Retrieve the role_id from the request
            $role_id = $request->input('role_id');
    
            // Check if role_id is provided and if it exists in roles_table
            if ($role_id !== null && !roles_table::find($role_id)) {
                return response()->json(['message' => "Role with role_id $role_id not found"], 404);
            }
            
            // Query to get users based on role_id
            $usersQuery = users_table::query();
    
            // If role_id is provided, filter by role_id
            if ($role_id !== null) {
                $usersQuery->where('role_id', $role_id);
            }
    
            // Retrieve the users
            $users = $usersQuery->select('id', 'role_id', 'school_id', 'username', 'first_name', 'last_name', 'chinese_name', 'hkid', 'address', 'nationality', 'phone', 'email', 'dob', 'remarks', 'created_at', 'updated_at')->get();
    
            // Check if the result set is empty
            if ($users->isEmpty()) {

                if($role_id !== null){
                    return response()->json(['message' => "No users with role_id $role_id found"], 404);
                }else{
                    return response()->json(['message' => 'User table is empty'], 200);
                }
            }
    
            // Load the role_name for each user
            foreach ($users as $user) {
                $user->role_name = roles_table::find($user->role_id)->role_name;
                $user->school_name = schools_table::find($user->school_id)->school_name;
                $user->course_names = $user->courses->pluck('course_name')->toArray();
            }
    
            return response()->json(['message' => 'Users listed successfully', 'users' => $users], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            
            return response()->json(['message' => 'Error listing users', 'error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            
            return response()->json(['message' => 'Unexpected error', 'error' => $e->getMessage()], 500);
        }
    }











    
    // //List Admin function
    // public function listAdmin()
    // {
    //     try {
    //         //Retrieve all admin from the database
    //         $admins = users_table::where('role_id', '=', 1)->get();
    
    //         //Return a success response
    //         return response()->json(['message' => 'Admins listed successfully', 'students' => $admins], 200);
    //     } catch (\Exception $e) {
    //         //Handle unexpected errors
    //         return response()->json(['message' => 'Error listing admins', 'error' => $e->getMessage()], 500);
    //     }
    // }
        



    // //Edit Student function
    // public function editStudent($id, Request $request)
    // {
    //     try {
    //         // Validate the request data
    //         $request->validate([
    //             'username' => 'required|string',
    //         ]);
    
    //         // Find the student by ID
    //         $student = users_table::find($id);
    
    //         // If the student doesn't exist, return a 404 response
    //         if (!$student) {
    //             return response()->json(['message' => 'Student not found'], 404);
    //         }
    
    //         // Check if the user is indeed a student (role_id = 2)
    //         if ($student->role_id !== 2) {
    //             return response()->json(['message' => 'This user is not a student'], 422);
    //         }
    
    //         // Update the student details
    //         $student->update([
    //             'username' => $request->input('username'),
    //             // Optionally, update more fields here
    //         ]);
    
    //         // Retrieve the updated student data
    //         $updatedStudent = users_table::find($id);
    
    //         // Return a success response
    //         return response()->json(['message' => 'Student updated successfully', 'student' => $updatedStudent], 200);
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         // Validation failed
    //         return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
    //     } catch (\Exception $e) {
    //         // Other unexpected errors
    //         return response()->json(['message' => 'Error updating student', 'error' => $e->getMessage()], 500);
    //     }
    // }

    // Edit User function
    public function editUser($id, Request $request)
    {

        try {
            // Validate the request data
            $request->validate([
                //role_id = 1(admin) 2(student)
                'role_id' => 'required|integer',    
                //'school_id' => 'required|integer',
                'school_id' => ($request->input('role_id') == 2) ? 'required|integer' : '',
                'username' => 'required|string',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'chinese_name' => 'required|string',

                //newly added
                'hkid' => 'required|string',
                'address' => 'required|string',
                'nationality' => 'required| string',
                'phone' => 'required|string',
                'email' => 'required|string',
                'dob' => 'required|date_format:Y-m-d',
                'remarks' => 'required|string',

            ]);

            // Find the user by ID
            $user = users_table::find($id);

            // If the user doesn't exist, return a 404 response
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            // Update the user details
            $user->update([
                'role_id' => $request->input('role_id'),
                'school_id' => $request->input('school_id'),
                'username' => $request->input('username'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'chinese_name' => $request->input('chinese_name'),
                

                //newly added
                'hkid' => $request->input('hkid'),
                'address' => $request->input('address'),
                'nationality' => $request->input('nationality'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'dob' => $request->input('dob'),
                'remarks' => $request->input('remarks'),
            ]);

            // Retrieve the updated user data
            $updatedUser = users_table::find($id);

            // Return a success response
            return response()->json(['message' => 'User updated successfully', 'user' => $updatedUser], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Other unexpected errors
            return response()->json(['message' => 'Error updating user', 'error' => $e->getMessage()], 500);
        }
    
    }

}