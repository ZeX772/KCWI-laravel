<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        return view('theme::user.dashboard');
    }

    public function settingsReflection(Request $request)
    {
        Log::info(session('school'));
    }
}
