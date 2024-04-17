<?php

namespace Wave\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\schools_table;
use Illuminate\Http\Request;

class Admin_School_Management extends Controller{

    //Add School function
    public function addSchool(Request $request){

        try{
            //validate the request
            $this->validate($request, [
                //rolename
                'school_name' => 'required|string'
            ]);

            //Retrieve the input data from the request
            $school = schools_table::create([
                'school_name' => $request->input('school_name'),
            ]);

            //return a success response
            return response()->json([
                'message' => 'school added successfully', 
                'school' => $school
            ], 201);

        }catch(\Illuminate\Validation\ValidationException $e){
            //handle validation error
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        }catch(\Exception $e){
            //handle other errors
            return response()->json(['meesage' => 'Error adding school' . $e->getMessage()], 500);
        }

    }

    // List School function
    public function listSchool(){

        try {
            // Retrieve all records from the schools_table
            $schoolList = schools_table::all();

            if ($schoolList->isEmpty()) {
                return response()->json(['message' => 'The schools_table is empty']);
            }

            return response()->json(['data' => $schoolList]);
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database query exception
            return response()->json(['message' => 'Error retrieving school list', 'error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            // Handle other unexpected errors
            return response()->json(['message' => 'Unexpected error', 'error' => $e->getMessage()], 500);
        }
    }

    //Update School function
    public function updateSchool($school_id, Request $request)
    {
        try {
            $this->validate($request, [
                'school_name' => 'required|string',
            ]);

            schools_table::where('school_id', $school_id)->update($request->all());

            $updatedSchool = schools_table::find($school_id);

            if (!$updatedSchool) {
                return response()->json(['message' => 'School not found'], 404);
            }

            return response()->json(['message' => 'School updated successfully', 'data' => $updatedSchool]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Illuminate\Database\QueryException $e) {
            // Database query exception
            return response()->json(['message' => 'Error updating school', 'error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            // Other unexpected errors
            return response()->json(['message' => 'Error updating school', 'error' => $e->getMessage()], 500);
        }
    }

    //Delete School function
    public function deleteSchool($school_id)
    {
        try {
            // Find the school by ID or throw a ModelNotFoundException
            $school = schools_table::findOrFail($school_id);

            // Delete the school
            $school->delete();

            return response()->json(['message' => 'School deleted successfully'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // School not found
            return response()->json(['message' => 'School not found'], 404);
        } catch (\Exception $e) {
            // Other unexpected errors
            return response()->json(['message' => 'Error deleting school', 'error' => $e->getMessage()], 500);
        }
    }





}