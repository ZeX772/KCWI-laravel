<?php

namespace App\Http\Controllers\Admin\VenueManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SchoolVenue;
use App\Models\SchoolVenueFacility;

class VenueController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('cms');
    }

    public function listVenue(Request $request)
    {
        $venues = SchoolVenue::get();

        return response()->json([
                'data' => $venues,
                'success' => true,
                'message' => 'Venues Retrieved.',
            ]);
    }

    public function listVenueFacility(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'venue_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed. Please try again.',
            ]);
        }

        $venue = SchoolVenue::where('id', $request->venue_id)->first();

        if(!$venue) {
            return response()->json([
                'success' => false,
                'message' => 'Venue not found. Please try again.',
            ]);
        }

        $facilities = SchoolVenueFacility::where('school_venue_id', $request->venue_id)->get();

        return response()->json([
                'data' => $facilities,
                'success' => true,
                'message' => 'Facilities Retrieved.',
            ]);
    }
}
