<?php

namespace Wave\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function mainPage()
    {
        return view('theme::guest.index');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (setting('auth.dashboard_redirect', true) != "null") {
            if (!Auth::guest()) {
                return redirect('dashboard');
            }
        }
        $seo = [
            'title'         => setting('site.title', 'Laravel Wave'),
            'description'   => setting('site.description', 'Software as a Service Starter Kit'),
            'image'         => url('/og_image.png'),
            'type'          => 'website'
        ];

        // fetch guardian students schedule
        if( session('role') != 'coach' ) {
            $apiResponse = get(config('services.api_url') . '/customer/guardian/student-schedules');
            $apiResponse = $apiResponse['response'] ?? [];
        } else {
            $apiResponse = [];
        }

        //urgent news in homepage
        $urgentNewsResponse = get(config('services.api_url') . '/urgentsnews/latest');
        $latestUrgentNews = $urgentNewsResponse ?? [];

        //normal news in homepage
        $normalNewsResponse = get(config('services.api_url') . '/normalnews/latest');
        $latestNormalNews = $normalNewsResponse ?? [];

        $normalNews = get(config('services.api_url') . '/normalnews');

        if( session('role') != 'coach' ) {
            //Shopping
            $shoppingResponse = get(config('services.api_url') . '/productMainPage');
            $shopping = $shoppingResponse['products'] ?? [];

            //level
            $levelResponse = get(config('services.api_url') . '/levelall');
            $levels = $levelResponse['response'] ?? [];
        } else {
            $shopping = [];
            $levels = [];
        }

        // dd($levels);

        //* Coach Schedule
        if( session('role') == 'coach') {
            $schedulesResponse = get(config('services.api_url') . '/coach/schedules');
            $schedules = $schedulesResponse['response'] ?? [];
        } else {
            $schedules = [];
        }

        return view('theme::student-side.homepage.home', [
            "seo" => $seo,
            "students" => $apiResponse,
            "latestUrgentNews" => $latestUrgentNews,
            "latestNormalNews" => $latestNormalNews,
            "shopping" => $shopping,
            "levels" => $levels,
            "normalNews" => $normalNews,
            "schedules" => $schedules,
        ]);
    }


    public function showDetails($id)
    {
        $apiResponse = get(config('services.api_url') . '/normalnews');
        $news = $apiResponse;
        $newsItem = collect($news)->firstWhere('id', $id);

        return view('theme::student-side.homepage.new', ['newsItem' => $newsItem]);
    }

    public function showUrgentNews()
    {
        $apiResponse = get(config('services.api_url') . '/urgentsnews');

        $urgentNews = collect($apiResponse)->sortByDesc('posting_time')->values()->all();

        return view('theme::student-side.homepage.urgentsnews', ['urgentNews' => $urgentNews]);
    }
    public function urgentNewsDetails($id)
    {
        $apiResponse = get(config('services.api_url') . '/urgentsnews');
        $news = $apiResponse;
        $details = collect($news)->firstWhere('id', $id);

        return view('theme::student-side.homepage.urgentNewsDetails', ['details' => $details]);
    }

    public function showNews()
    {
        $apiResponse = get(config('services.api_url') . '/normalnews');

        $news = collect($apiResponse)->sortByDesc('posting_time')->values()->all();

        return view('theme::student-side.homepage.notificationss', ['news' => $news]);
    }
    public function myschedule()
    {
        return view('theme::student-side.homepage.myschedules');
    }

    public function pastschedule()
    {
        return view('theme::student-side.homepage.pastschedules');
    }

    public function newslist()
    {
        $apiResponse = get(config('services.api_url') . '/normalnews');

        $news = $apiResponse;

        return view('theme::student-side.homepage.newslists', ['news' => $news]);
    }

    public function showList($id)
    {
        $apiResponse = get(config('services.api_url') . '/normalnews');

        $list = $apiResponse;

        $newsList = collect($list)->firstWhere('id', $id);
        return view('theme::student-side.homepage.lists', ['newsList' => $newsList]);
    }

    public function level()
    {
        $apiUrl = config('services.api_url') . '/levelall';
        $apiResponse = get($apiUrl);
        $levels = $apiResponse;

        return view('theme::student-side.homepage.levels', ['levels' => $levels]);
    }
    public function showLevelList($id)
    {
        $apiUrl = config('services.api_url') . '/levelselected/' . $id;
        $apiResponse = get($apiUrl);
        $levels = $apiResponse;
        $characteristic = $levels['characteristics'];
        $levels = $levels['level'];

        // Call showStudent method to retrieve student data
        $students = $this->showStudent();

        return view('theme::student-side.homepage.levellists', [
            'levels' => $levels,
            'characteristic' => $characteristic,
            'students' => $students
        ]);
    }

    public function showStudent()
    {
        $apiEndpoint = config('services.api_url') . '/customer/guardian/student-list';
        $apiResponse = get($apiEndpoint);
        return $apiResponse['response'];
    }
}
