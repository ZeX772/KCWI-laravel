<?php

namespace Wave\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class Admin_privacy_policy_Controller extends Controller{

    // View the latest privacy policy
    public function viewPrivacyPolicy()
    {
        //always show the latest privacy policy to the user
        $latestPrivacyPolicy = PrivacyPolicy::latest()->first();

        if (!$latestPrivacyPolicy) {
            //Return a response with a message indicating that the privacy was not found
            return response()->json(['message' => 'Privacy policy not found.']);
        }
        //Return a response with the latest privacy policy
        return response()->json(['privacy_policy' => $latestPrivacyPolicy]);
    }

    public function updatePrivacyPolicy(Request $request){
        try{
            //validate the request
            $this->validate($request, [
                'title' => 'required|string',
                'content' => 'required|string',
            ]);

            //find the existing privacy policy record
            $privacyPolicy = PrivacyPolicy::latest()->first();

            if(!$privacyPolicy){
                //create a new record if none exists
                $privacyPolicy = PrivacyPolicy::create([
                    'title' => $request->input('title'),
                    'content' => $request->input('content'),
                ]);
            }else{
                //update the existing record with the new data
                $privacyPolicy->update([
                    'title' => $request->input('title'),
                    'content' => $request->input('content'),
                ]);

                //update the updated_at timestamp
                $privacyPolicy->touch();
            }

            // Retrieve the updated privacy policy data
            $updatedPrivacyPolicy = PrivacyPolicy::find($privacyPolicy->id);

            //successfully updated
            return response()->json(['message' => 'Privacy Policy updated succesfully.', 'data' => $updatedPrivacyPolicy]);
            //return response()->json(['message' => 'Privacy Policy updated succesfully.']);
        }catch (\Illuminate\Validation\ValidationException $e){
            //validation error
            return response()->json(['message' => 'Error updating Privacy Policy', 'error' => $e->getMessage()], 422);
        }catch(\Exception $e){
            //other error
            return response()->json(['message' => 'Error updating Privacy Policy', 'error' => $e->getMessage()], 500);
        }

    }

}