<?php

namespace Wave\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\roles_table;
use Illuminate\Http\Request;

class Admin_Role_Management extends Controller{
    
    //Add Role function
    public function addRole(Request $request){

        try{
            //validate the request
            $this->validate($request, [
                //rolename
                'role_name' => 'required|string'
            ]);

            //Retrieve the input data from the request
            $role = roles_table::create([
                'role_name' => $request->input('role_name'),
            ]);

            //return a success response
            return response()->json([
                'message' => 'Role added successfully', 
                'user' => $role
            ], 201);

        }catch(\Illuminate\Validation\ValidationException $e){
            //handle validation error
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        }catch(\Exception $e){
            //handle other errors
            return response()->json(['meesage' => 'Error adding role' . $e->getMessage()], 500);
        }

    }

    //List Role function
    public function listRole(){

        //try and catch block to handle when retrieving roles_table
        try{
            //retrieve all the record from the database
            $rolelist = roles_table::all();

            //check if the roles_table is empty
            if($rolelist->isEmpty()){
                //return a JSON reponse with a message indicating that the roles_table is empty
                return response()->json(['message' => 'The roles_table is empty']);
            }
            
        }catch(\Exception $e){
            //return a JSON response with an error message
            return response()->json(['message' => 'Error retrieving roles_table records'], 500);
        }

        //return a JSON response with the rolelist data
        return response()->json(['data'=>$rolelist]);
    }

    //Update Role function
    public function updateRole($role_id, Request $request){

        try{
            //validate the request
            $this->validate($request, [
                'role_name' => 'required|string',
            ]);

            //update the role in the database
            roles_table::where('role_id',$role_id)->update($request->all());

            //retrieve the updated role data
            $updatedRoles = roles_table::find($role_id);

            // If the role doesn't exist, return a 404 response
            if (!$updatedRoles) {
                return response()->json(['message' => 'Role not found'], 404);
            }

            //return a response indicating success along with the updated role data
            return response()->json(['message' => 'roles updated succesfully', 'data' => $updatedRoles]);

        }catch(\Illuminate\Validation\ValidationException $e){
            //validation failed
            return response()->json(['message' => 'validation failed', 'errors' => $e->errors()], 422);

        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            //FAQ not found
            return response()->json(['message' => 'roles not found'], 404);
        }catch(\Exception $e){
            //other unexpected errors
            return response()->json(['message' => 'Error updating roles'], 500);
        }
    }

    //Delete Role function
    public function deleteRole($role_id){

        try{
            //Find the Role by Id
            $role_id = roles_table::findOrFail($role_id);

            //Delete the role
            $role_id->delete();

            //Return a response indicating success
            return response()->json(['message' => 'Roles deleted succesfully']);

        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            //FAQ not found
            return response()->json(['message' => 'roles not found'], 404);
        }catch(\Exception $e){
            //Other unexpected errors
            return response()->json(['message' => 'Error deleting roles'], 500);
        }

    }

}