<?php

namespace App\Http\Controllers\Admin\CoachManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoachDetail;

class CoachController extends Controller
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

    public function listCoach(Request $request)
    {
        $coaches = CoachDetail::get();

        $data = $coaches->map(function ($coach) {
            return ['id' => $coach->id,'name' => $coach->user->name];
        });

        return response()->json([
                'data' => $data,
                'success' => true,
                'message' => 'Coaches Retrieved.',
            ]);
    }
}
