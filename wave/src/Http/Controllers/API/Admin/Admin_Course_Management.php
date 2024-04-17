<?php

namespace Wave\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\courses_table;
use Illuminate\Http\Request;

class Admin_Course_Management extends Controller{

    //Add Course function
    public function addCourse(Request $request){

        try{
            //validate the request
            $this->validate($request, [
               'course_name' => 'required|string' 
            ]);

            //retrieve the input data from the request
            $course = courses_table::create([
                'course_name' => $request->input('course_name'),
            ]);

            //return a success response
            return response()->json([
                'message' => 'course added succesfully',
                'course' => $course
            ], 201);

        }catch(\Illuminate\Validation\ValidationException $e){
            //handle validation error
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);

        }catch(\Exception $e){
            //handle other errors
            return response()->json(['meesage' => 'Error adding course' . $e->getMessage()], 500);
        }

    }

    //List Course function
    public function listCourse()
    {
        try {
            // Retrieve all courses from the database
            $courses = courses_table::all();

            // Check if the courses table is empty
            if ($courses->isEmpty()) {
                return response()->json(['message' => 'The courses table is empty']);
            }

            // Return the list of courses
            return response()->json(['data' => $courses]);

        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database query exception
            return response()->json(['message' => 'Error retrieving course list', 'error' => $e->getMessage()], 500);

        } catch (\Exception $e) {
            // Handle other unexpected errors
            return response()->json(['message' => 'Unexpected error', 'error' => $e->getMessage()], 500);
        }
    }


    //Update Course function
    public function updateCourse($course_id, Request $request)
    {
        try {
            // Validate the request data
            $this->validate($request, [
                'course_name' => 'required|string',
            ]);

            // Update the course details
            courses_table::where('course_id', $course_id)->update($request->all());

            // Retrieve the updated course data
            $updatedCourse = courses_table::find($course_id);

            // If the course doesn't exist, return a 404 response
            if (!$updatedCourse) {
                return response()->json(['message' => 'Course not found'], 404);
            }

            // Return a success response
            return response()->json(['message' => 'Course updated successfully', 'data' => $updatedCourse]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);

        } catch (\Illuminate\Database\QueryException $e) {
            // Database query exception
            return response()->json(['message' => 'Error updating course', 'error' => $e->getMessage()], 500);

        } catch (\Exception $e) {
            // Other unexpected errors
            return response()->json(['message' => 'Error updating course', 'error' => $e->getMessage()], 500);
        }
    }

    //Delete Course function
    public function deleteCourse($course_id)
    {
        try {
            // Find the course by ID or throw a ModelNotFoundException
            $course = courses_table::findOrFail($course_id);

            // Delete the course
            $course->delete();

            return response()->json(['message' => 'Course deleted successfully'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Course not found
            return response()->json(['message' => 'Course not found'], 404);
        } catch (\Exception $e) {
            // Other unexpected errors
            return response()->json(['message' => 'Error deleting course', 'error' => $e->getMessage()], 500);
        }
    }


}