<?php

namespace Wave\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function enquiry()
    {
        $response = get(config('services.api_url').'/school/public-view');
        $courses = get(config('services.api_url').'/public/course/list');

        $school = [];
        if( $response['response'] ?? false ) {
            session(['school' => $response['response']]);
            $school = $response['response'];
        }
        // dd($courses);
        return view('theme::guest.enquiry-form')->with([
            'data' => $school,
            'courses' => $courses['response']
        ]);
    }
}