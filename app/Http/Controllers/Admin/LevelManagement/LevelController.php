<?php

namespace App\Http\Controllers\Admin\LevelManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
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

    public function listLevel(Request $request)
    {
        $levels = Level::get();

        return response()->json([
                'data' => $levels,
                'success' => true,
                'message' => 'Levels Retrieved.',
            ]);
    }
}
