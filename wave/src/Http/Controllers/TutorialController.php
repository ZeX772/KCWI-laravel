<?php
namespace Wave\Http\Controllers;
use Illuminate\Support\Facades\Http;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function showTutorial(){
        $apiUrl     = config('services.api_url') . '/customer/tutorial/list';
        $response   = get($apiUrl);
        $videos = $response['response']['videos'] ?? [];
        
        return view('theme::tutorial.tutorial-list',[
            'videos' => $videos,
        ]);
    }

    public function showVideo(){
        return view('theme::tutorial.video');
    }
}
