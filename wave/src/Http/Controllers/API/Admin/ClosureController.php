<?php

namespace Wave\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Bank;
use App\Models\SchoolClosure;
use App\Models\ClosureType;

class ClosureController extends Controller
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
        $data = SchoolClosure::where('status','active')
            ->with(['venue' => function($venueQuery){
                $venueQuery->select('id', 'name', 'short_name');
            }, 'facility' => function($facilityQuery){
                $facilityQuery->select('id', 'name');
            }, 'closureTypes' => function($closureTypeQuery){
                $closureTypeQuery->select('id', 'name');
            }, 'closureReason' => function($closureReasonQuery){
                $closureReasonQuery->select('id', 'name');
            }])
            ->get()
            ->groupBy('year');

        return response()->json([
            'msg' => 'Closure list retrieved',
            'response' => $data->toArray()
        ]);
    }

    public function add(Request $request)
    {
        if ( isset($request['start_date']) ) {
            $request['year'] = explode("-", $request['start_date'])[0];
        }

        $new = new SchoolClosure;
        $new->create($request->input());
        
        return response()->json([
            'msg'=>'Closure created',
        ]);
    }

    public function update(Request $request, SchoolClosure $schoolClosure)
    {
        // Update the closure record with the new data
        if ( isset($request['start_date']) ) {
            $request['year'] = explode("-", $request['start_date'])[0];
        }

        $schoolClosure->update($request->input());
    
        return response()->json([
            'msg' => 'Closure updated'
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
        $updatedCount = SchoolClosure::whereIn('id', $closureIds)
            ->where('status', 'active')
            ->update(['status' => 'archive']);
    
        // Check if any records were updated and return a response accordingly
        if ($updatedCount > 0) {
            return response()->json(['msg' => "{$updatedCount} closure(s) archived"]);
        } else {
            return response()->json(['msg' => 'No closures found for archiving'], 404);
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
        $updatedCount = SchoolClosure::whereIn('id', $closureIds)
            ->where('status', 'archive')
            ->update(['status' => 'active']);
    
        // Check if any records were updated and return a response accordingly
        if ($updatedCount > 0) {
            return response()->json(['msg' => "{$updatedCount} closure(s) unarchive"]);
        } else {
            return response()->json(['msg' => 'No closures found for unarchiving'], 404);
        }
    }
    
    public function addType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|unique:closure_types,name',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $type            = new ClosureType;
        $type->name = $request->name;
        $type->save();

        return response()->json([
            'msg'=>'Closure category added',
        ]);
    }

    public function updateType(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'name' => 'string|required',
            'id' => 'string|required|exists:closure_types,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
    
        // Find the closure record by ID
        $closure = ClosureType::find($request->id);
    
        if (!$closure) {
            return response()->json(['error' => 'Closure not found'], 404);
        }
    
        // Update the closure record with the new data
        $closure->name = $request->name;
        $closure->save();
    
        return response()->json(['msg' => 'Closure updated']);
    }

    public function listType(Request $request)
    {
        $list = ClosureType::all();
    
        return response()->json(['msg' => 'List retrieved','response'=>$list]);
    }
}
