<?php

namespace Wave\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\notifications_table;
use App\Models\users_table;


class Admin_User_Notification_Management extends Controller{

    //attach notification to user
    public function attachNotificationsToUser($id, Request $request){

        try {
            $user = users_table::findOrFail($id);

            $this->validate($request, [
                'notification_id' => 'exists:notifications_table,notification_id',
            ]);

            $notificationIds = $request->input('notification_id');

            // Attach courses to the user
            $user->notifications()->attach($notificationIds);

            return response()->json(['message' => 'Notification attached to the user successfully'], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            
            return response()->json(['message' => 'User not found'], 404);

        } catch (\Illuminate\Validation\ValidationException $e) {
            
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);

        } catch (\Exception $e) {
            
            return response()->json(['message' => 'Error attaching notification to user', 'error' => $e->getMessage()], 500);

        }
    }


    //detach notification from user
    public function detachNotificationsFromUser($id, Request $request)
    {
        try {
            // Find the user by ID
            $user = users_table::findOrFail($id);

            // Validate the request data
            $this->validate($request, [
                'notification_id' => 'exists:notifications_table,notification_id',
            ]);

            // Get the notification IDs from the request
            $notificationIds = $request->input('notification_id');

            // Check if the course exists for the user
            if (!$user->notifications->contains($notificationIds)) {
                return response()->json(['message' => 'Course ID not found for the user'], 404);
            }

            // Detach notifications from the user
            $user->notifications()->detach($notificationIds);

            // Return success response
            return response()->json(['message' => 'Notifications detached from the user successfully'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            
            // User not found
            return response()->json(['message' => 'User not found'], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            // Validation failed
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            
            // Other unexpected errors
            return response()->json(['message' => 'Error detaching notifications from user', 'error' => $e->getMessage()], 500);
        }
    }

    //list notifications for a user
    public function listNotificationsForUser($id)
    {
        try {
            // Find the user by ID
            $user = users_table::findOrFail($id);

            // Get the courses for the user
            $notifications = $user->notifications;

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
                'notifications' => $notifications
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            
            // User not found
            return response()->json(['message' => 'User not found'], 404);
        } catch (\Exception $e) {
            
            // Other unexpected errors
            return response()->json(['message' => 'Error listing notifications for user', 'error' => $e->getMessage()], 500);
        }
    }

    //list users for a notification
    public function listUsersForNotification($notification_id)
    {
        try {
            // Find the course by ID
            $notification = notifications_table::findOrFail($notification_id);

            // Get the users for the course
            $users = $notification->users;

            // Return the list of users with course id and name
            return response()->json([
                'message' => 'Users listed for the notification successfully',
                'notification' => [
                    'id' => $notification->notification_id,
                    'title' => $notification->notification_title,
                    'content' => $notification->notification_content,
                ],
                'users' => $users
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            
            // Course not found
            return response()->json(['message' => 'Notification not found'], 404);
        } catch (\Exception $e) {
            
            // Other unexpected errors
            return response()->json(['message' => 'Error listing users for notification', 'error' => $e->getMessage()], 500);
        }
    }
    
}