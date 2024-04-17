<?php

namespace Wave\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\notifications_table;
use Illuminate\Http\Request;

//add this for Auto Increment fix
use Illuminate\Support\Facades\DB;

class Admin_Notification_Management extends Controller{

    //Add Course function
    public function addNotification(Request $request){

        //start a database transaction
        DB::beginTransaction();

        try{
            //validate the request
            $this->validate($request, [
               'notification_title' => 'required|string',
               'notification_content' => 'required|string' 
            ]);

            //retrieve the input data from the request
            $notification = notifications_table::create([
                'notification_title' => $request->input('notification_title'),
                'notification_content' => $request->input('notification_content')
            ]);

            DB::commit();

            //return a success response
            return response()->json([
                'message' => 'notification added succesfully',
                'course' => $notification
            ], 201);

        }catch(\Illuminate\Validation\ValidationException $e){

            DB::rollback();

            //handle validation error
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);

        }catch(\Exception $e){

            DB::rollback();

            //handle other errors
            return response()->json(['meesage' => 'Error adding notification' . $e->getMessage()], 500);
        }

    }

    //List Notification function
    public function listNotification()
    {
        try {
            // Retrieve all courses from the database
            $notifications = notifications_table::all();

            // Check if the courses table is empty
            if ($notifications->isEmpty()) {
                return response()->json(['message' => 'The notifications table is empty']);
            }

            // Return the list of courses
            return response()->json(['data' => $notifications]);

        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database query exception
            return response()->json(['message' => 'Error retrieving notification list', 'error' => $e->getMessage()], 500);

        } catch (\Exception $e) {
            // Handle other unexpected errors
            return response()->json(['message' => 'Unexpected error', 'error' => $e->getMessage()], 500);
        }
    }

        //Update Course function
    public function updateNotification($notification_id, Request $request)
    {
        try {
            // Validate the request data
            $this->validate($request, [
                'notification_title' => 'required|string',
                'notification_content' => 'required|string' 
            ]);
    
            // Update the course details
            notifications_table::where('notification_id', $notification_id)->update($request->all());
    
            // Retrieve the updated course data
            $updatedNotification = notifications_table::find($notification_id);

            // If the course doesn't exist, return a 404 response
            if (!$updatedNotification) {
                return response()->json(['message' => 'Notification not found'], 404);
            }
    
            // Return a success response
            return response()->json(['message' => 'Notification updated successfully', 'data' => $updatedNotification]);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
    
        } catch (\Illuminate\Database\QueryException $e) {
            // Database query exception
            return response()->json(['message' => 'Error updating notification', 'error' => $e->getMessage()], 500);
    
        } catch (\Exception $e) {
            // Other unexpected errors
            return response()->json(['message' => 'Error updating notification', 'error' => $e->getMessage()], 500);
        }
    }

    //Delete Course function
    public function deleteNotification($notification_id)
    {
        try {
            // Find the course by ID or throw a ModelNotFoundException
            $notification = notifications_table::findOrFail($notification_id);

            // Delete the course
            $notification->delete();

            return response()->json(['message' => 'Notification deleted successfully'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Course not found
            return response()->json(['message' => 'Notification not found'], 404);
        } catch (\Exception $e) {
            // Other unexpected errors
            return response()->json(['message' => 'Error deleting Notification', 'error' => $e->getMessage()], 500);
        }
    }

}