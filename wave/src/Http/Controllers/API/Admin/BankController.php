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
use App\Models\Bank;
use App\Models\EmergencyContacts;
use App\Models\Course;
use App\Models\Siblings;

class BankController extends Controller
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
        $list = Bank::where('bank_status','active')->get();

        return response()->json([
            'msg' => 'Bank list retriefved',
            'response' => $list
        ]);
    }


    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bank_name'           => 'string|required|unique:banks',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $new = Bank::insert($request->input());
        
        return response()->json([
            'msg'=>'Bank created',
        ]);
    }

    public function update(Request $request, Bank $bank)
    {
        $validator = Validator::make($request->all(), [
            'bank_name' => 'string|required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $bank->update($request->input());

        return response()->json([
            'msg'=>'Bank updated',
        ]);
    }

    public function archive(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'id' => 'array|required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
    
        // Find and archive the closure records by IDs
        $closureIds = $request->input('id'); // Get the array of IDs from the request
    
        // Use the "whereIn" method to update multiple records at once and count the updated rows
        $updatedCount = Bank::whereIn('id', $closureIds)
            ->where('bank_status', 'active')
            ->update(['bank_status' => 'archive']);
    
        // Check if any records were updated and return a response accordingly
        if ($updatedCount > 0) {
            return response()->json(['msg' => "{$updatedCount} bank(s) archived"]);
        } else {
            return response()->json(['msg' => 'No banks found for archiving'], 404);
        }
    }

    public function unarchive(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'id' => 'array|required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
    
        // Find and archive the closure records by IDs
        $closureIds = $request->input('id'); // Get the array of IDs from the request
    
        // Use the "whereIn" method to update multiple records at once and count the updated rows
        $updatedCount = Bank::whereIn('id', $closureIds)
            ->where('status', 'archive')
            ->update(['status' => 'active']);
    
        // Check if any records were updated and return a response accordingly
        if ($updatedCount > 0) {
            return response()->json(['msg' => "{$updatedCount} bank(s) unarchive"]);
        } else {
            return response()->json(['msg' => 'No banks found for unarchiving'], 404);
        }
    }

}
