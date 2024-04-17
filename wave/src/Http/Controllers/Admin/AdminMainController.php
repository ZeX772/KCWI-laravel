<?php

namespace Wave\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class AdminMainController extends Controller
{
    public function dashboard()
    {
        $response = Http::withToken(session('api_token'))->get(config('services.api_url').'/dashboard/list');
        // dd($response['response']);
        return view('theme::admin-main.dashboard')->with([
            'entries' => $response ? $response['response'] : [],
        ]);
    }

    public function timetable()
    {
        $classesResponse = Http::withToken(session('api_token'))->get(config('services.api_url').'/course-class/all');
        $classes = $classesResponse ? $classesResponse['response'] : [];

        $courses = Http::withToken(session('api_token'))->get(config('services.api_url').'/course/list');
        $courses = $courses ? $courses['response'] : [];

        $levels = Http::withToken(session('api_token'))->get(config('services.api_url').'/level/all');
        $levels = $levels ? $levels['response'] : [];

        $coaches = Http::withToken(session('api_token'))->get(config('services.api_url').'/coach/list');
        $coaches = $coaches ? $coaches['response'] : [];

        $venues = Http::withToken(session('api_token'))->get(config('services.api_url').'/school-venue/all');
        $venues = $venues ? $venues['response'] : [];

        $students = Http::withToken(session('api_token'))->get(config('services.api_url').'/student/list');
        $students = $students ? $students['response'] : [];

        $events = [];
        foreach($classes as $class)
        {
            $events[] = [
                'id' => $class['id'],
                'title' => $class['course_class_code'],
                'start' => $class['start_date'].'T'.$class['start_time'],
                'end' => $class['start_date'].'T'.$class['end_time'],
                'backgroundColor' => $class['course']['level']['color'],
                'borderColor' => $class['course']['level']['color'],
                'type' => 'class',
                'overlap' => false
            ];
        }

        // For Enrollment
        $coursePackages = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/course/package-list');
        $coursePackages = $coursePackages ? $coursePackages['response'] : [];

        // Filter course package to remove the empty course
        $coursePackages = array_filter($coursePackages, function($coursePackage){
            if( $coursePackage['course'] == null ) {
                return false;
            }

            return true;
        });

        $newCourses = array_map(function($value) use ($coaches){
            $courseCoaches = [];

            if( $value['course'] != null ) {
                $courseCoachArray = json_decode($value['course']['course_coaches']);
            
                if( $courseCoachArray != null )
                    $courseCoaches = array_filter($coaches, function($coach) use ($courseCoachArray){
                        return in_array($coach['id'], $courseCoachArray);
                    });

                $value['course']['coaches'] = $courseCoaches;
            }

            return (object)$value;
        }, $coursePackages);

        $schoolVenues = Http::withToken(session('api_token'))
            ->get(config('services.api_url').'/school-venue/all');

        $schoolVenues = $schoolVenues ? $schoolVenues['response'] : [];

        return view('theme::admin-main.timetable')->with([
            'events' => $events,
            'classes' => $classes,
            'levels' => $levels,
            'coaches' => $coaches,
            'venues' => $venues,
            'courses' => $courses,
            'course_packages' => $newCourses,
            'school_venues' => $schoolVenues,
            'students' => $students
        ]);
    }

    // Polish the migration for this student view
    public function student()
    {
        $studentResponse = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/student/list');
        $studentResponse = $studentResponse ? $studentResponse['response'] : [];
        
        $siblings = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/user/get-siblings');
                            
        $siblings = $siblings ? $siblings['response'] : [];
        
        $guardians = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/user/get-guardians');
        $guardians = $guardians ? $guardians['response'] : [];
        // dd($guardians);
        $levels = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/level/all');
        $levels = $levels ? $levels['response'] : [];
        
        // For Enrollment
        $coursePackages = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/course/package-list');
        $coursePackages = $coursePackages ? $coursePackages['response'] : [];
        
        $coaches = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/coach/list');
        $coaches = $coaches ? $coaches['response'] : [];
        
        // Filter course package to remove the empty course
        $coursePackages = array_filter($coursePackages, function($coursePackage){
            if( $coursePackage['course'] == null ) {
                return false;
            }

            return true;
        });

        $newCourses = array_map(function($value) use ($coaches){
            $courseCoaches = [];

            if( $value['course'] != null ) {
                $courseCoachArray = json_decode($value['course']['course_coaches']);
            
                if( $courseCoachArray != null )
                    $courseCoaches = array_filter($coaches, function($coach) use ($courseCoachArray){
                        return in_array($coach['id'], $courseCoachArray);
                    });

                $value['course']['coaches'] = $courseCoaches;
            }

            return (object)$value;
        }, $coursePackages);

        $classes = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/course-class/all');
        $classes = $classes ? $classes['response'] : [];
        
        $newClasses = array_map(function($value) use ($coaches){
            $courseCoaches = [];
            
            if( $value['course'] != null ) {
                $courseCoachArray = json_decode($value['course']['course_coaches']);

                if( $courseCoachArray != null )
                    $courseCoaches = array_filter($coaches, function($coach) use ($courseCoachArray){
                        return in_array($coach['id'], $courseCoachArray);
                    });
                
                $value['course']['coaches'] = $courseCoaches;
            }

            return (object)$value;
        }, $classes);
        
        $schools = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/school/list');
        $schools = $schools ? $schools['response'] : [];
        
        // for referal field
        $users = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/user/all');
        $users = $users ? $users['response'] : [];

        // dd($studentResponse);
        return view('theme::admin-main.student')->with([
            'data' => $studentResponse,
            'siblings' => $siblings,
            'guardians' => $guardians,
            'levels' => $levels,
            'course_packages' => $newCourses,
            'classes' => $newClasses,
            'schools' => $schools,
            'users' => $users,
        ]);
    }

    public function studentView($id)
    {
        if(! $id )
            abort(404);

        $entry = Http::withToken(session('api_token'))->post(config('services.api_url').'/student/view', [
            "id" => $id
        ]);
        // dd($entry['response']);
        $coachComments = Http::withToken(session('api_token'))->post(config('services.api_url').'/coach/comment/by-student', [
            "student_id" => $id
        ]);

        $coachCommentsData = [];
        if( $coachComments ) {
            if( array_key_exists('response', $coachComments->json()) )
                if( $coachComments['success'] )
                    $coachCommentsData = $coachComments ? $coachComments['response'] : [];
        }

        $studentAccounts = Http::withToken(session('api_token'))->post(config('services.api_url').'/course/student-accounting', [
            "student_id" => $id
        ]);

        // For Enrollment
        $levels = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/level/all');
        $levels = $levels ? $levels['response'] : [];

        $coursePackages = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/course/package-list');
        $coursePackages = $coursePackages ? $coursePackages['response'] : [];
        
        $coaches = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/coach/list');
        $coaches = $coaches ? $coaches['response'] : [];
        
        // Filter course package to remove the empty course
        $coursePackages = array_filter($coursePackages, function($coursePackage){
            if( $coursePackage['course'] == null ) {
                return false;
            }

            return true;
        });

        $newCourses = array_map(function($value) use ($coaches){
            $courseCoaches = [];

            if( $value['course'] != null ) {
                $courseCoachArray = json_decode($value['course']['course_coaches']);
            
                if( $courseCoachArray != null )
                    $courseCoaches = array_filter($coaches, function($coach) use ($courseCoachArray){
                        return in_array($coach['id'], $courseCoachArray);
                    });

                $value['course']['coaches'] = $courseCoaches;
            }

            return (object)$value;
        }, $coursePackages);
        
        $notificationTemplates = Http::withToken(session('api_token'))->get(config('services.api_url').'/notification/templates/list');

        $schoolData = Http::withToken(session('api_token'))->get(config('services.api_url').'/school/view');
        // dd($studentAccounts['response']);
        return view('theme::admin-main.student-view')->with([
            'entry' => $entry ? $entry['response'] : [],
            'coachComments' => $coachCommentsData,
            'studentAccounts' => $studentAccounts ? $studentAccounts['response'] : [],
            'levels' => $levels,
            'course_packages' => $newCourses,
            'notification_templates' => $notificationTemplates ? $notificationTemplates['response'] : [],
            'school' => $schoolData ? $schoolData['response'] : [],
        ]);
    }

    public function course() // Migrated
    {
        $courseResponse     = Http::withToken(session('api_token'))->get(config('services.api_url').'/course/list');
        $courseResponse     = $courseResponse ? $courseResponse['response'] : [];

        $courseTypes        = Http::withToken(session('api_token'))->get(config('services.api_url').'/course-type/all');
        $levels             = Http::withToken(session('api_token'))->get(config('services.api_url').'/level/all');
        $venues             = Http::withToken(session('api_token'))->get(config('services.api_url').'/school-venue/all');
        $venuesFacilities   = Http::withToken(session('api_token'))->get(config('services.api_url').'/school-venue-facility/all');
        $coaches            = Http::withToken(session('api_token'))->get(config('services.api_url').'/coach/all');
        $coaches            = $coaches ? $coaches['response'] : [];

        return view('theme::admin-main.course')->with([
            'data'          => $courseResponse,
            'course_types'  => $courseTypes ? $courseTypes['response'] : [],
            'levels'        => $levels ? $levels['response'] : [],
            'venues'        => $venues ? $venues['response'] : [],
            'school_venue_facilities' => $venuesFacilities ? $venuesFacilities['response'] : [],
            'coaches'       => $coaches,
        ]);
    }

    public function level() // Migrated
    {
        $response = Http::withToken(session('api_token'))->post(config('services.api_url').'/level/list');
        
        return view('theme::admin-main.level')->with([
            'data' => $response ? $response['response'] : [],
            'user' => auth()->user(),
        ]);
    }

    public function venue() // Migrated
    {
        $response = Http::withToken(session('api_token'))->post(config('services.api_url').'/venue/list');

        return view('theme::admin-main.venue')->with([
            'data' => $response ? $response['response']['list'] : [],
            'user' => session('user'),
        ]);
    }

    public function courseClass() // Migrated
    {
        $courseClassData = Http::withToken(session('api_token'))->get(config('services.api_url').'/course-class/all');
        
        $venues = Http::withToken(session('api_token'))->post(config('services.api_url').'/venue/list');

        return view('theme::admin-main.course-classes')->with([
            'class_list' => $courseClassData ? $courseClassData['response'] : [],
            'venues' => $venues ? $venues['response']['list'] : [],
        ]);
    }

    public function courseClassView($class)
    {
        $courseClassData = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/course-class/list/'. $class);
        // dd($courseClassData['response']);
        return view('theme::admin-main.course-classes-view')->with([
            'classData' => $courseClassData ? $courseClassData['response']['class_list'] : [],
            'coaches' => $courseClassData ? $courseClassData['response']['coaches'] : [],
        ]);
    }

    public function qrView($class)
    {
        $courseClassData = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/course-class/list/'. $class);
                            
        return view('theme::admin-main.qr-view')->with([
            'class_data' => $courseClassData ? $courseClassData['response']['class_list'] : []
        ]);
    }

    public function generalQrView($venue)
    {
        $venueData = Http::withToken(session('api_token'))
                            ->get(config('services.api_url').'/course-class/venue/'. $venue);

        return view('theme::admin-main.general-qr-view')->with([
            'venue_data' => $venueData ? $venueData['response'] : []
        ]);
    }

    public function qrScanner()
    {
        $schoolVenues = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/school-venue/all');

        return view('theme::admin-main.qr-scanner')->with([
            'venues' => $schoolVenues ? $schoolVenues['response'] : []
        ]);
    }

    public function competition()
    {
        $competitionData = Http::withToken(session('api_token'))
            ->get(config('services.api_url').'/competition/list');

        $categories = Http::withToken(session('api_token'))
            ->get(config('services.api_url').'/category/list');

        $schoolVenues = Http::withToken(session('api_token'))
            ->get(config('services.api_url').'/school-venue/all');

        return view('theme::admin-main.competition')->with([
            'data' => $competitionData ? $competitionData['response'] : [],
            'categories' => $categories ? $categories['response'] : [],
            'school_venues' => $schoolVenues ? $schoolVenues['response'] : [],
        ]);
    }

    public function competitionView($id)
    {
        $competitionData = Http::withToken(session('api_token'))
            ->get(config('services.api_url').'/competition/view/'.$id);
        
        $categories = Http::withToken(session('api_token'))
            ->get(config('services.api_url').'/category/list');

        $schoolVenues = Http::withToken(session('api_token'))
            ->get(config('services.api_url').'/school-venue/all');

        return view('theme::admin-main.competition-view')->with([
            'data' => $competitionData ? $competitionData['response']['competition'] : [],
            'selected_categories' => $competitionData ? $competitionData['response']['categories'] : [],
            'categories' => $categories ? $categories['response'] : [],
            'school_venues' => $schoolVenues ? $schoolVenues['response'] : [],
        ]);
    }

    public function competitionViewCategory($competitionId, $compCategoryId)
    {
        $compeCategoryData = Http::withToken(session('api_token'))
            ->get(config('services.api_url')."/competition/$competitionId/view-category/$compCategoryId");

        $studentResponse = Http::withToken(session('api_token'))
            ->get(config('services.api_url').'/student/list');

        $categories = Http::withToken(session('api_token'))
            ->get(config('services.api_url').'/category/list');

        $schoolVenues = Http::withToken(session('api_token'))
            ->get(config('services.api_url').'/school-venue/all');

        return view('theme::admin-main.competition-category-view')->with([
            'data' => $compeCategoryData ? $compeCategoryData['response']['category'] : [],
            'students' => $compeCategoryData ? $compeCategoryData['response']['students'] : [],
            'all_students' => $studentResponse ? $studentResponse['response'] : [],
            'categories' => $categories ? $categories['response'] : [],
            'school_venues' => $schoolVenues ? $schoolVenues['response'] : []
        ]);
    }

    public function competitionViewCategoryResults($competitionId, $compCategoryId)
    {
        $compeCategoryData = Http::withToken(session('api_token'))
            ->get(config('services.api_url')."/competition/$competitionId/view-category/$compCategoryId");

        $participants = Http::withToken(session('api_token'))->get(config('services.api_url')."/competition/get-participants/$compCategoryId");

        return view('theme::admin-main.competition-category-results')->with([
            'data' => $compeCategoryData ? $compeCategoryData['response']['category'] : [],
            'participants' => $participants ? $participants['response'] : []
        ]);
    }

    public function coach()
    {
        $coachData = Http::withToken(session('api_token'))->get(config('services.api_url').'/coach/list');
        $bankData = Http::withToken(session('api_token'))->get(config('services.api_url').'/bank/list');
        
        return view('theme::admin-main.coach')->with([
            'data' => $coachData ? $coachData['response'] : [],
            'banks' => $bankData ? $bankData['response'] : [],
        ]);
    }

    public function coachView($id)
    {

        if(! $id )
            abort(404);

        $coachData = Http::withToken(session('api_token'))->get(config('services.api_url').'/coach/view/'.$id);
        $coachTeachingHistory = Http::withToken(session('api_token'))->post(config('services.api_url').'/coach/teaching-history',[
            "id" => $id
        ]);

        $coaches = Http::withToken(session('api_token'))->get(config('services.api_url').'/coach/all');

        $coachComments = Http::withToken(session('api_token'))->post(config('services.api_url').'/coach/comment/by-coach', [
            "coach_id" => $id
        ]);

        $coachCommentsData = [];
        if( $coachComments ) {
            if( array_key_exists('response', $coachComments->json()) )
                if( $coachComments['success'] )
                    $coachCommentsData = $coachComments ? $coachComments['response'] : [];
        }
        // dd($coachTeachingHistory['response']);
        return view('theme::admin-main.coach-view')->with([
            'entry' => $coachData ? $coachData['response'] : [],
            'coaches' => $coaches ? $coaches['response'] : [],
            'coach_comments' => $coachCommentsData,
            'teaching_history' => $coachTeachingHistory ? $coachTeachingHistory['response'] : [],
        ]);
    }

    public function products($tab = 'all', $page = 1, $search = '')
    {
        $products = Http::withToken(session('api_token'))->post(config('services.api_url').'/product/list?page='.$page,[
            'search' => $search,
            'tab' => $tab,
        ]);

        $allProducts = Http::withToken(session('api_token'))->get(config('services.api_url').'/product/all');
        
        return view('theme::admin-main.products')->with([
            'list' => $products ? $products['response'] : [],
            'available_products' => $products['available_products'] ?? [],
            'archived_products' => $products['archived_products'] ?? [],
            'product_categories' => $products['product_categories'] ?? [],
            'product_tags' => $products['product_tags'] ?? [],
            'tab' => $tab,
            'all_products' => $allProducts['response'] ?? [],
        ]);
    }

    public function orders()
    {
        $orders = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/order/list');

        $users = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/user/all');
                        
        return view('theme::admin-main.orders')->with([
            'all' => $orders['all'] ?? [],
            'pending_orders' => $orders['pending_orders'] ?? [],
            'processing_orders' => $orders['processing_orders'] ?? [],
            'refunded_orders' => $orders['refunded_orders'] ?? [],
            'shipped_orders' => $orders['shipped_orders'] ?? [],
            'users' => $users['response'] ?? [],
        ]);
    }

    public function orderView($id)
    {
        $order = Http::withToken(session('api_token'))->post(config('services.api_url').'/order/view', [
            'id' => $id,
        ]);

        $schoolData = Http::withToken(session('api_token'))->get(config('services.api_url').'/school/view');

        return view('theme::admin-main.orders-view')->with([
            'order' => $order ? $order['response'] : [],
            'school' => $schoolData ? $schoolData['response'] : []
        ]);
    }

    public function customers()
    {
        return view('theme::admin-main.customers');
    }

    public function request()
    {
        $type = "course-enrollment";
        if( isset(request()->type) )
            $type = request()->type;

        $incomingRequest = Http::withToken(session('api_token'))->get(config('services.api_url').'/request/incoming-requests');

        $courseEnrollments = null;
        $competitionEnrollments = null;
        $makeUpClasses = null;
        $coachLeaves = null;
        $changeCourses = null;
        $courseWithdrawals = null;
        $waitingLists = null;
        $enquiries = null;
        switch ($type) {
            case 'course-enrollment':
                $courseEnrollments = Http::withToken(session('api_token'))->post(config('services.api_url').'/request/course-enrollment');
                break;
            case 'competition-enrollment':
                $competitionEnrollments = Http::withToken(session('api_token'))->post(config('services.api_url').'/request/competition-enrollment');
                break;
            case 'make-up-class':
                $makeUpClasses = Http::withToken(session('api_token'))->post(config('services.api_url').'/request/make-up-class');
                break;
            case 'change-course':
                $changeCourses = Http::withToken(session('api_token'))->post(config('services.api_url').'/request/change-course');
                break;
            case 'course-withdrawal':
                $courseWithdrawals = Http::withToken(session('api_token'))->post(config('services.api_url').'/request/course-withdrawal');
                break;
            case 'enquiry-form':
                $enquiries = Http::withToken(session('api_token'))->post(config('services.api_url').'/request/enquiry');
                break;
            case 'leave-request':
                $coachLeaves = Http::withToken(session('api_token'))->post(config('services.api_url').'/request/coach-leave');
                break;
            case 'waiting-list':
                $waitingLists = Http::withToken(session('api_token'))->get(config('services.api_url').'/request/waitlist/all');
                break;
        }

        // dd($courseEnrollments['response']);

        return view('theme::admin-main.request')->with([
            'incoming_requests' => isset($incomingRequest) 
                ? $incomingRequest['response'] 
                : [],
            'course_enrollements' => isset($courseEnrollments) 
                ? $courseEnrollments['response'] 
                : [],
            'competition_enrollments' => isset($competitionEnrollments) 
                ? $competitionEnrollments['response'] 
                : [],
            'make_up_classes' => isset($makeUpClasses) 
                ? $makeUpClasses['response'] 
                : [
                    "make_up_classes" => [],
                    "levels" => [],
                    "venues" => [],
                    "classes" => [],
                    "facilities" => [],
                    "course_types" => [],
                ],
            'coach_leaves' => isset($coachLeaves) 
                ? $coachLeaves['response'] 
                : [],
            'change_courses' => isset($changeCourses) 
                ? $changeCourses['response'] 
                : [
                    "change_courses" => [],
                    "levels" => [],
                    "venues" => [],
                    "classes" => [],
                    "facilities" => [],
                    "course_types" => [],
                    "coaches" => [],
                ],
            'course_withdrawals' => isset($courseWithdrawals) 
                ? $courseWithdrawals['response'] 
                : [],
            'waiting_lists' => isset($waitingLists) 
                ? $waitingLists['response'] 
                : [
                    "all" => [],
                    "course_types" => [],
                    "levels" => [],
                    "coaches" => [],
                    "venues" => [],
                    "courses" => [],
                    "classes" => [],
                ],
            'enquiries' => isset($enquiries) 
                ? $enquiries['response'] 
                : [],
        ]);
    }

    public function invoices()
    {
        $invoices = Http::withToken(session('api_token'))->post(config('services.api_url').'/invoices/list');

        return view('theme::admin-main.invoices')->with([
            'invoices' => isset($invoices) ? $invoices['response']['invoices'] : [],
            'users' => isset($invoices) ? $invoices['response']['users'] : [],
        ]);
    }

    public function accounting()
    {
        $entries = Http::withToken(session('api_token'))->get(config('services.api_url').'/accounting/all');

        return view('theme::admin-main.accounting')->with([
            'entries' => isset($entries) ? $entries['response']['course_enrollments'] : [],
            'notification_categories' => isset($entries) ? $entries['response']['notification_categories'] : [],
        ]);
    }

    public function payroll()
    {
        $startDate = request('start_date');
        $endDate = request('end_date');
        $coach = request('coach');

        $payrolls = Http::withToken(session('api_token'))->post(config('services.api_url').'/payroll/all', [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'coach' => $coach,
        ]);

        return view('theme::admin-main.payroll')->with([
            'entries' => $payrolls ? $payrolls['response'] : []
        ]);
    }

    public function receipt()
    {
        $receipts = Http::withToken(session('api_token'))->get(config('services.api_url')."/receipt");

        return view('theme::admin-main.receipt')->with([
            'entries' => $receipts['success'] ? $receipts['data'] : [],
        ]);
    }

    public function receiptView($id)
    {
        $receipt = Http::withToken(session('api_token'))->get(config('services.api_url')."/receipt/$id");

        if(! $receipt['success'] )
            abort(404);

        return view('theme::admin-main.receipt-view')->with([
            'entry' => $receipt['success'] ? $receipt['data'] : null,
            'school' => $receipt['success'] ? $receipt['school'] : null,
        ]);
    }

    public function generalReport()
    {
        $makeUpClasses = Http::withToken(session('api_token'))->post(config('services.api_url').'/request/make-up-class');
        $courseEnrollments = Http::withToken(session('api_token'))->post(config('services.api_url').'/request/course-enrollment');
        $competitionEnrollments = Http::withToken(session('api_token'))->post(config('services.api_url').'/request/competition-enrollment');
        $studentAttendances = Http::withToken(session('api_token'))->get(config('services.api_url').'/reports/student-attendances');
        $coaches = Http::withToken(session('api_token'))->get(config('services.api_url').'/coach/list');
        $coachAttendances = Http::withToken(session('api_token'))->get(config('services.api_url').'/reports/coach-attendances');

        $customReportParameters = [
            'student' => [
                "Student Number",
                "Guardian's Name",
                "First Name",
                "Relationship",
                "Last Name",
                "Phone",
                "Chinese Name",
                "Email",
                "DOB",
                "Address",
                "School",
                "Grade",
                "Enrollment Date",
                "Remark"
            ],
            'class' => [
                "Current Class",
                "Venue",
                "Time",
                "Date"
            ],
            'attendance' => [
                "Class Status",
                "Date",
                "Time",
                "Remark"
            ],
            'financial' => [
                "Invoice #",
                "Date",
                "Status",
                "Total",
                "Outstanding"
            ]
        ];

        $courses = Http::withToken(session('api_token'))->get(config('services.api_url').'/course/list');
        $classes = Http::withToken(session('api_token'))->get(config('services.api_url').'/course-class/all');
        $students = Http::withToken(session('api_token'))->get(config('services.api_url').'/student/list');

        $courses = isset($courses) ? $courses['response'] : [];
        $classes = isset($classes) ? $classes['response'] : [];
        $students = isset($students) ? $students['response'] : [];

        $searchItems = [];
        foreach($courses as $course)
        {
            $classDates = '';
            $classDates = array_column($course['course_classes'], 'start_date');
            foreach($classDates as $key => $classDate)
            {
                $classDates[$key] = date("m/d/Y", strtotime($classDate));
            }
            $classDates = implode(', ', $classDates);

            $searchItems[] = [
                'id' => 'course-'.$course['id'],
                'name' => $course['course_abbreviation'].' (Course: '.$classDates.')'
            ];
        }

        foreach($classes as $class)
        {
            $searchItems[] = [
                'id' => 'class-'.$class['id'],
                'name' => $class['course_class_code'].' (Class: '.date("m/d/Y", strtotime($class['start_date'])).')'
            ];
        }

        foreach($students as $student)
        {
            $searchItems[] = [
                'id' => 'student-'.$student['id'],
                'name' => $student['name'].' (Student)'
            ];
        }

        return view('theme::admin-main.general-report')->with([
            'make_up_classes' => isset($makeUpClasses) ? $makeUpClasses['response'] : [],
            'course_enrollments' => isset($courseEnrollments) ? $courseEnrollments['response'] : [],
            'competition_enrollments' => isset($competitionEnrollments) ? $competitionEnrollments['response'] : [],
            'student_attendances' => isset($studentAttendances) ? $studentAttendances['response'] : [],
            'coaches' => isset($coaches) ? $coaches['response'] : [],
            'coach_attendances' => isset($coachAttendances) ? $coachAttendances['response'] : [],
            'custom_report_parameters' => $customReportParameters,
            'dropdown_items' => $searchItems
        ]);
    }

    public function invoiceReport()
    {
        return view('theme::admin-main.invoice-report');
    }

    public function content()
    {
        return view('theme::admin-main.content');
    }

    public function notificationTemplate()
    {
        $notificationTemplates = Http::withToken(session('api_token'))->get(config('services.api_url').'/notification/templates/list');

        $levels = Http::withToken(session('api_token'))->get(config('services.api_url').'/level/all');
        $courses = Http::withToken(session('api_token'))->get(config('services.api_url').'/course/list');
        $classes = Http::withToken(session('api_token'))->get(config('services.api_url').'/course-class/all');
        $student = Http::withToken(session('api_token'))->get(config('services.api_url').'/student/list');

        return view('theme::admin-main.notification-template')->with([
            'data' => $notificationTemplates->json('response'),
            'levels' => $levels->json('response'),
            'courses' => $courses->json('response'),
            'classes' => $classes->json('response'),
            'students' => $student->json('response'),
        ]);
    }

    public function notificationAnnouncement()
    {
        $notificationAnnouncements = Http::withToken(session('api_token'))->get(config('services.api_url').'/notification/announcements/list');
        $notificationTemplates = Http::withToken(session('api_token'))->get(config('services.api_url').'/notification/templates/list');

        $scheduled = [];
        $sent = [];
        foreach($notificationAnnouncements->json('response') as $notification)
        {
            if($notification['email_sent'] === 1 || $notification['in_app_sent'] === 1) {
                $sent[] = $notification;
            } else {
                $scheduled[] = $notification;
            }
        }

        $levels = Http::withToken(session('api_token'))->get(config('services.api_url').'/level/all');
        $courses = Http::withToken(session('api_token'))->get(config('services.api_url').'/course/list');
        $classes = Http::withToken(session('api_token'))->get(config('services.api_url').'/course-class/all');
        $student = Http::withToken(session('api_token'))->get(config('services.api_url').'/student/list');

        return view('theme::admin-main.notification-announcement')->with([
            'scheduled' => $scheduled,
            'sent' => $sent,
            'levels' => $levels->json('response'),
            'courses' => $courses->json('response'),
            'classes' => $classes->json('response'),
            'students' => $student->json('response'),
            'templates' => $notificationTemplates->json('response')
        ]);
    }

    public function setting()
    {
        $schoolData = Http::withToken(session('api_token'))->get(config('services.api_url').'/school/view');

        return view('theme::admin-main.setting')->with([
            'data' => $schoolData ? $schoolData['response'] : []
        ]);
    }

    public function viewCourse()
    {
        return view('theme::admin-main.view-course');
    }

    public function payrollDetails()
    {
        return view('theme::admin-main.payroll-details');
    }

    // public function coachComment()
    // {
    //     return view('theme::admin-main.coach-comment');
    // }

    // public function coachHistory()
    // {
    //     return view('theme::admin-main.coach-history');
    // }

    // public function coachTeachingHistory()
    // {
    //     return view('theme::admin-main.coach-teaching-history');
    // }

    public function accountingDetails($id)
    {
        $entry = Http::withToken(session('api_token'))->get(config('services.api_url').'/accounting/show/'.$id);
        // dd($entry['response']);
        return view('theme::admin-main.accounting-details')->with([
            'entry' => $entry ? $entry['response']['course_enrollment'] : null,
            'school' => $entry ? $entry['response']['school'] : null,
        ]);
    }

    public function contentWebapp()
    {
        return view('theme::admin-main.content-webapp');
    }

    public function contentSharevideo()
    {
        $shareVideos = Http::withToken(session('api_token'))->get(config('services.api_url').'/content/share-video/all');

        return view('theme::admin-main.content-sharevideo')->with([
            'entries' => $shareVideos ? $shareVideos['response'] : []
        ]);
    }

    public function contentPlacevideo()
    {
        $videos = Http::withToken(session('api_token'))->get(config('services.api_url').'/content/place-video/all');

        return view('theme::admin-main.content-placevideo')->with([
            'entries' => $videos ? $videos['response'] : []
        ]);
    }

    public function settingAddholiday()
    {
        return view('theme::admin-main.setting-addholiday');
    }

    public function settingAddrole($id = null)
    {
        $entries = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/role/view/'.$id);

        return view('theme::admin-main.setting-addrole')->with([
            'entry' => $entries ? $entries['response'] : []
        ]);
    }

    public function settingAddstaff()
    {
        $roles = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/role/list');
        // dd($roles['response']);
        return view('theme::admin-main.setting-addstaff')->with([
            'roles' => $roles ? $roles['response'] : []
        ]);
    }

    public function settingUpdatestaff($id)
    {
        $user = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/user/view/'.$id);

        $roles = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/role/list');

        return view('theme::admin-main.setting-updatestaff')->with([
            'roles' => $roles ? $roles['response'] : [],
            'user' => $user ? $user['response'] : [],
        ]);
    }

    public function settingBanklist()
    {
        $bankData = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/bank/all');
        
        return view('theme::admin-main.setting-banklist')->with([
            'data' => $bankData ? $bankData['response'] : [],
        ]);
    }

    public function settingClosure()
    {
        $closureData = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/closure/list');

        $closureTypes = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/closure/category/list');

        $schoolVenues = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/school-venue/all');

        $schoolVenueFacilities = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/school-venue-facility/all');

        $closureReasons = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/closure-reason/all');
        
        return view('theme::admin-main.setting-closure')->with([
            'data' => $closureData ? $closureData['response'] : [],
            'closure_types' => $closureTypes ? $closureTypes['response'] : [],
            'school_venues' => $schoolVenues ? $schoolVenues['response'] : [],
            'school_venue_facilities' => $schoolVenueFacilities ? $schoolVenueFacilities['response'] : [],
            'closure_reasons' => $closureReasons ? $closureReasons['response'] : [],
        ]);

    }

    public function settingClosureCategory()
    {
        $categories = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/closure-type/all');

        return view('theme::admin-main.setting-closure-category')->with([
            'list' => $categories ? $categories['response'] : []
        ]);
    }

    public function settingHoliday()
    {
        return view('theme::admin-main.setting-Holiday');
    }

    public function settingLogs()
    {
        return view('theme::admin-main.setting-logs');
    }

    public function settingRole()
    {
        $roles = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/role/all');

        return view('theme::admin-main.setting-role')->with([
            'entries' => $roles ? $roles['response'] : []
        ]);
    }

    public function settingStaff()
    {
        $users = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/user/list');

        return view('theme::admin-main.setting-staff')->with([
            'data' => $users ? $users['response'] : []
        ]);
    }

    public function webApp()
    {
        $privacyPolicy = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/privacy-policy/show');

        $newsArticles = Http::withToken(session('api_token'))
                        ->post(config('services.api_url').'/content/news/all', [
                            'category' => 'normal_news'
                        ]);

        $urgentNews = Http::withToken(session('api_token'))
                        ->post(config('services.api_url').'/content/news/all', [
                            'category' => 'urgent_news'
                        ]);

        $levels = Http::withToken(session('api_token'))->post(config('services.api_url').'/level/list');

        $levelInformations = Http::withToken(session('api_token'))->get(config('services.api_url').'/content/level-information/all');

        return view('theme::admin-main.setting-webapp')->with([
            'privacy_policy' => $privacyPolicy ? $privacyPolicy['response'] : [],
            'news_articles' => $newsArticles ? $newsArticles['response'] : [],
            'urgent_news' => $urgentNews ? $urgentNews['response'] : [],
            'school' => $urgentNews ? $urgentNews['school'] : [],
            'levels' => $levels ? $levels['response'] : [],
            'level_informations' => $levelInformations ? $levelInformations['response'] : [],
            'user' => auth()->user(),
        ]);
    }

    public function notificationTempclosure()
    {
        return view('theme::admin-main.notification-tempclosure');
    }

    public function faq()
    {
        $list = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/faq/list');

        $categories = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/faq/category/list/without-archived');

        return view('theme::admin-main.faq')->with([
            'list' => $list['success'] ? $list['response'] : [],
            'categories' => $categories['success'] ? $categories['response'] : [],
        ]);
    }
   
    public function faqCategory()
    {
        $categories = Http::withToken(session('api_token'))
                        ->get(config('services.api_url').'/faq/category/list');

        return view('theme::admin-main.faq-category')->with([
            'list' => $categories['success'] ? $categories['response'] : [],
        ]);
    }
    
    public function consolidate()
    {
        $consolidatedInvoice = Http::withToken(session('api_token'))->get(config('services.api_url')."/consolidate/invoice");
        $consolidatedReceipt = Http::withToken(session('api_token'))->get(config('services.api_url')."/consolidate/receipt");

        return view('theme::admin-main.consolidate')->with([
            'consolidated_invoice' => $consolidatedInvoice['success'] ? $consolidatedInvoice['data'] : [],
            'consolidated_receipt' => $consolidatedReceipt['success'] ? $consolidatedReceipt['data'] : [],
        ]);
    }

    public function consolidateView($id)
    {
        $receipt = Http::withToken(session('api_token'))->get(config('services.api_url')."/consolidate/$id/show");

        if(! $receipt['success'] )
            abort(404);

        return view('theme::admin-main.consolidate-view')->with([
            'entry' => $receipt['success'] ? $receipt['data'] : null,
        ]);
    }
}
