<?php

namespace Wave\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users_table;
use App\Models\courses_table;

class Admin_User_Course_Management extends Controller{

    //attach course to user //enrollment of course for student
    public function attachCoursesToUser($id, Request $request){

        try {
            $user = users_table::findOrFail($id);

            $this->validate($request, [
                'course_id' => 'exists:courses_table,course_id',
            ]);

            $courseIds = $request->input('course_id');

            // Attach courses to the user
            $user->courses()->attach($courseIds);

            return response()->json(['message' => 'Courses attached to the user successfully'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'User not found'], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error attaching courses to user', 'error' => $e->getMessage()], 500);
        }
    }

    //detach course from user 
    public function detachCoursesFromUser($id, Request $request)
    {
        try {
            // Find the user by ID
            $user = users_table::findOrFail($id);

            // Validate the request data
            $this->validate($request, [
                'course_id' => 'exists:courses_table,course_id',
            ]);

            // Get the course IDs from the request
            $courseIds = $request->input('course_id');

            // Check if the course exists for the user
            if (!$user->courses->contains($courseIds)) {
                return response()->json(['message' => 'Course ID not found for the user'], 404);
            }

            // Detach courses from the user
            $user->courses()->detach($courseIds);

            // Return success response
            return response()->json(['message' => 'Courses detached from the user successfully'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // User not found
            return response()->json(['message' => 'User not found'], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Other unexpected errors
            return response()->json(['message' => 'Error detaching courses from user', 'error' => $e->getMessage()], 500);
        }
    }

    //list courses for a user
    public function listCoursesForUser($id)
    {
        try {
            // Find the user by ID
            $user = users_table::findOrFail($id);

            // Get the courses for the user
            $courses = $user->courses;

            // Return the list of courses with user id and username
            return response()->json([
                'message' => 'Courses listed for the user successfully',
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'chinese_name' => $user->chinese_name,
                    'hkid' => $user->hkid,
                    'address' => $user->address,
                    'nationality' => $user->nationality,
                    'phone' => $user->phone,
                    'email' => $user->email,
                    'dob' => $user->dob,
                    'remarks' => $user->remarks,
                    'archived' => $user->archived,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                    
                ],
                'courses' => $courses
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // User not found
            return response()->json(['message' => 'User not found'], 404);
        } catch (\Exception $e) {
            // Other unexpected errors
            return response()->json(['message' => 'Error listing courses for user', 'error' => $e->getMessage()], 500);
        }
    }

    //list users for a course
    public function listUsersForCourse($courseId)
    {
        try {
            // Find the course by ID
            $course = courses_table::findOrFail($courseId);

            // Get the users for the course
            $users = $course->users;

            // Return the list of users with course id and name
            return response()->json([
                'message' => 'Users listed for the course successfully',
                'course' => [
                    'id' => $course->course_id,
                    'name' => $course->course_name,
                ],
                'users' => $users
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            
            // Course not found
            return response()->json(['message' => 'Course not found'], 404);
        } catch (\Exception $e) {
            
            // Other unexpected errors
            return response()->json(['message' => 'Error listing users for course', 'error' => $e->getMessage()], 500);
        }
    }




}