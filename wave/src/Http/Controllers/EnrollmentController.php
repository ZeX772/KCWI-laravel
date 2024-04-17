<?php

namespace Wave\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnrollmentController extends Controller
{
    public function storeDataLevelLists(Request $request){
    
        $selected_levelFullTerm = $request->input('levelFullTerm');
        $selectedStudent = $request->input('studentInfoFullTerm');
        $selectedStudentInfo = $request->input('selectedStudentInfo'); // Assuming you have a hidden input with the ID
    
        session([
            'selected_studentInfoFullTerm' => $selectedStudent,
            'selected_studentInfoID' => $selectedStudentInfo,
            'selected_levelFullTerm' => $selected_levelFullTerm
        ]);

        return redirect('/fulltermenrollvenue'); 
    }

    public function enrollment()
    {
        $user = session()->get('userSession');
        $guardian_id = $user['id'];
        
        return view('theme::student-side.enrollment.enrollment', ['guardian_id' => $guardian_id]);
    }

    public function selectStudentFullTerm(Request $request)
    {
        if( session('role') == 'student' ) {
            $studentData = session('userSession');
            
            session([
                'selected_studentInfoFullTerm' => $studentData['name'],
                'selected_studentInfoID' => $studentData['id'],
                'selected_student' => $studentData
            ]);
        
            return redirect('/fulltermenrolllevel');
        }

        // $user = $request->session()->get('userSession');
        // $apiUrl = config('services.api_url') . '/customer/student/list';
        $apiEndpoint = config('services.api_url') . '/customer/guardian/student-list';
        $apiResponse = get($apiEndpoint);

        session(['students' => $apiResponse['response']]);
        //     $responseJson = $apiResponse;
        //     $studentList = $responseJson['response']['students'];
        //  dd($studentList);
        return view('theme::student-side.enrollment.fulltermenrollment', [
            'students' => $apiResponse['response']
        ]);
    }

    public function storeFullTermStudentInfo(Request $request)
    {
        $request->validate([
            'studentInfoFullTerm' => 'required' // Validate if a student is selected
        ]);
    
        $selectedStudent = $request->input('studentInfoFullTerm');
        $selectedStudentInfo = $request->input('selectedStudentInfo'); // Assuming you have a hidden input with the ID
        
        $selectedStudentData = array_filter(session('students'), function($obj) use ($selectedStudentInfo) {
            return (int)$obj["id"] === (int)$selectedStudentInfo;
        });
        
        session([
            'selected_studentInfoFullTerm' => $selectedStudent,
            'selected_studentInfoID' => $selectedStudentInfo,
            'selected_student' => array_values($selectedStudentData)[0]
        ]);
    
        return redirect('/fulltermenrolllevel');
    }

    public function selectLevelFullTerm()
    {
        $apiUrl = config('services.api_url') . '/customer/enroll/info';
        $levels = get($apiUrl);
      
        return view('theme::student-side.enrollment.fulltermenrollment1', ['levels' => $levels]);
    }

    public function storeFullTermEnrollLevel(Request $request)
    {
        
        session([
            'selected_levelFullTerm' => $request->input('levelFullTerm'),
            'abbreviation' => $request->input('selectedAbbreviation')
        ]);
        
        return redirect('/fulltermenrollvenue'); 
    }

    public function selectVenueFullTerm()
    {
        $apiUrl = config('services.api_url') . '/customer/enroll/info';
        $venues = post($apiUrl, [
            'level_id' => session('selected_levelFullTerm'),
            'abbreviation' => session('abbreviation')        
        ]);

        return view('theme::student-side.enrollment.fulltermenrollment2', ['venues' => $venues]);
    }

    public function storeFullTermEnrollVenue(Request $request)
    {
        session(['selected_venueFullterm' => $request->input('venueFullterm')]);
	
		return redirect('/fulltermenrollschedule'); 
    }

    
    public function selectScheduleFullTerm()
    {
        $apiUrl = config('services.api_url') . '/customer/enroll/info';
        $levels = post($apiUrl, [
            'level_id' => session('selected_levelFullTerm'),
            'venue_id' => session('selected_venueFullterm'),
        ]);

        $levelsResponse = $levels['response']['levels'];
        session(['levels_response' => $levelsResponse]);
        // dd($levels);
        return view('theme::student-side.enrollment.fulltermenrollment3', [
            'levels' => $levels
        ]);
    }

    public function storeFullTermEnrollSchedule(Request $request)
    {
        // Retrieve the concatenated value from the scheduleRadioButton input
        $course_id = $request->input('course_id');

        $levelsResponse = session('levels_response');
        $selectedCourse = null;
        foreach ($levelsResponse as $key => $level) {
            foreach ($level['courses'] as $key => $course) {
                if( $course['id'] == $course_id )
                    $selectedCourse = $course;
            }
        }

        session(['selected_course' => $selectedCourse]);
    
        // Redirect to the appropriate route
        return redirect()->route('wave.fulltermenrollment4'); 
    }

    public function displayReviewFullTerm()
    {
        return view('theme::student-side.enrollment.fulltermenrollment4')->with([
            'user_id' => session('selected_studentInfoID'),
            'selected_course' => session('selected_course'),
            'selected_student' => session('selected_student')
        ]);
    }

    /**
     * * Student Enrollment | Flexible
     */
    public function selectStudentFlexible(Request $request)
    {
        // $user = $request->session()->get('userSession');
        // $apiUrl = config('services.api_url') . '/customer/student/list';
        // $apiResponse = post($apiUrl, $user);
        // $responseJson = $apiResponse;
        // $studentList = $responseJson['response']['students'];

        if( session('role') == 'student' ) {
            $studentData = session('userSession');
            
            session([
                'selected_studentInfoName' => $studentData['name'],
                'selected_studentInfoID' => $studentData['id']
            ]);
        
            return redirect('/flexiblecourselevel');
        }
     
        $apiEndpoint = config('services.api_url') . '/customer/guardian/student-list';
        $apiResponse = get($apiEndpoint);
        // dd($apiResponse['response']);
        return view('theme::student-side.enrollment.flexiblecourse', [
            'students' => $apiResponse['response']
        ]);
    }
    public function storeFlexibleStudentInfo(Request $request)
    {
        $request->validate([
            'studentInfoFlexible' => 'required' // Validate if a student is selected
        ]);
    
        $selectedStudent = $request->input('studentInfoFlexible');
        $selectedStudentInfo = $request->input('selectedStudentInfo'); // Assuming you have a hidden input with the ID
    
        session([
            'selected_studentInfoName' => $selectedStudent,
            'selected_studentInfoID' => $selectedStudentInfo
        ]);
    
        return redirect('/flexiblecourselevel');
    }

    public function selectLevelFlexible()
    {
        $apiUrl = config('services.api_url') . '/customer/enroll/info';
        $apiResponse = post($apiUrl, []);
        
        $levels = $apiResponse;
      
        return view('theme::student-side.enrollment.flexiblecourse1', ['levels' => $levels]);
    }

    public function storeFlexibleCourseLevel(Request $request)
    {
        session(['selected_levelFlexible' => $request->input('levelFlexible')]);
	
		return redirect('/flexiblecoursevenue');
    }
    
    public function selectVenueFlexible()
    {
        $apiUrl = config('services.api_url') . '/customer/enroll/info';
        $apiResponse = post($apiUrl, []);

        $venues = $apiResponse;

        return view('theme::student-side.enrollment.flexiblecourse2', ['venues' => $venues]);
    }

    public function storeFlexibleCourseVenue(Request $request)
    {
        session(['selected_venueFlexible' => $request->input('venueFlexible')]);
	
		return redirect('/flexiblecourseschedule'); 
    }

    public function selectScheduleFlexible()
    {
        // dd(session('selected_venueFlexible'));
        // dd(session('selected_levelFlexible'));
        $apiUrl = config('services.api_url') . '/customer/enroll/info';
        $apiResponse = post($apiUrl, [
            'level_id' => session('selected_levelFlexible'),
            'venue_id' => session('selected_venueFlexible'),
        ]);

        $levels = $apiResponse;

        // dd($levels['response']);

        return view('theme::student-side.enrollment.flexiblecourse3', ['levels' => $levels]);
    }

    public function storeFlexibleCourseSchedule(Request $request)
    {
        $radioButtonValue = $request->input('scheduleFlexible');
    
        // // Split the concatenated value into individual components
        // list($package_id, $start_date, $course_class_code, $class_full_price, $start_time, $end_time) = explode(',', $radioButtonValue);
    
        // // Store the desired components in separate session variables
        // session(['selected_date' => $start_date]);
        // session(['selected_course_code' => $course_class_code]);
        // session(['selected_package_id' => $package_id]);
        // session(['selected_class_full_price' => $class_full_price]);
        // session(['selected_start_time' => $start_time]);
        // session(['selected_end_time' => $end_time]);

        session(['course_classes' => json_decode($request->class_data)]);
	
		return redirect()->route('wave.flexiblecourse4'); 
    }

    public function displayReviewFlexible()
    {

        // $courseClasses = [];
        // foreach (session('course_classes') as $key => $courseClasses) {
        //     $courseClasses [] = [
        //         "id" => $courseClasses
        //     ];
        // }

        // $data = [
        //     'user_id' => session('selected_studentInfoID'),
        //     'package_id' => session('selected_studentInfoID'),
        //     'is_paid' => 0,
        //     'type_of_course' => 'flexible_course',
        //     'course_classes' => $courseClasses,
        // ];
        // dd(session('course_classes'));
        return view('theme::student-side.enrollment.flexiblecourse4')->with([
            'course_classes' => session('course_classes'),
            'user_id' => session('selected_studentInfoID'),
        ]);
    }

    /**
     * * Student Enrollment | Private
     */
    public function selectStudentPrivate(Request $request) 
    {
        if( session('role') == 'student' ) {
            $studentData = session('userSession');
            
            session([
                'selected_studentInfoName' => $studentData['name'],
                'selected_studentInfoID' => $studentData['id'],
                'selected_student' => $studentData,
            ]);
        
            return redirect('/privatecourseclasstype');
        }
        $apiEndpoint = config('services.api_url') . '/customer/guardian/student-list';
        $apiResponse = get($apiEndpoint);
        // echo '<pre>';
        // print_r($apiResponse);exit;

        session(['students' => $apiResponse['response']]);
     
        return view('theme::student-side.enrollment.privatecourse', [
            'students' => $apiResponse['response']
        ]);
    }

    public function storePrivateStudentInfo(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'student_id' => 'required' // Validate if a student is selected
        ]);
    
        $student_name = $request->input('student_name');
        $student_id = $request->input('student_id'); // Assuming you have a hidden input with the ID

        $filteredArray = array_filter(session('students'), function($obj) use ($student_id) {
            return $obj["id"] === (int)$student_id;
        });
    
        session([
            'selected_student_name' => $student_name,
            'selected_student_id' => $student_id,
            'selected_student' => $filteredArray[0],
        ]);
	
		return redirect('/privatecourseclasstype'); 
    }
    
    public function selectClassTypePrivate()
    {
        $apiUrl = config('services.api_url') . '/enrollment/private/course-types';
        $courseTypes = get($apiUrl);
        
        // Pass the course types to the frontend view
        return view('theme::student-side.enrollment.privatecourse1', ['courseTypes' => $courseTypes]);
    }

    public function storePrivateCourseClassType(Request $request)
    {
        session(['class_type_id' => $request->input('class_type_id')]);
	
		return redirect()->route('wave.privatecourse2'); 
    }

    public function selectLevelPrivate()
    {
        $apiUrl = config('services.api_url') . '/enrollment/private/levels';
        $levels = post($apiUrl, [
            'course_type_id' => session('class_type_id')
        ]);
      
        return view('theme::student-side.enrollment.privatecourse2', [
            'levels' => $levels
        ]);
    }

    public function storePrivateCourseLevel(Request $request)
    {

		session(['level_id' => $request->input('level_id')]);
	
		return redirect('/privatecoursevenue'); 
    }

    public function selectVenuePrivate()
    {
        $apiUrl = config('services.api_url') . '/enrollment/private/venues';
        $apiResponse = post($apiUrl, [
            'course_type_id' => session('class_type_id'),
            'course_level_id' => session('level_id'),
        ]);

        return view('theme::student-side.enrollment.privatecourse3', [
            'venues' => $apiResponse
        ]);
    }

    public function storePrivateCourseVenue(Request $request)
    {
        session(['venue_id' => $request->input('venue_id')]);
	
		return redirect('/privatecourseschedule'); 
    }

    public function selectSchedulePrivate()
    {
        $apiUrl = config('services.api_url') . '/enrollment/private/course-classes';
        $courseClasses = post($apiUrl, [
            'course_type_id' => session('class_type_id'),
            'course_level_id' => session('level_id'),
            'course_venue_id' => session('venue_id')
        ]);

        // dd($courseClasses['response']);

        session(['course_classes' => $courseClasses['response']]);
        
        return view('theme::student-side.enrollment.privatecourse4', [
            'course_classes' => $courseClasses
        ]);
    }

    public function storePrivateCourseSchedule(Request $request)
    {
        $selectedClassID = $request->class_id;

        // dd(session('course_classes'));

        $filteredArray = array_filter(session('course_classes'), function($obj) use ($selectedClassID) {
            return $obj['id'] === (int)$selectedClassID;
        });

        session(['selected_course_class' => $filteredArray[0]]);
        session(['class_id' => $selectedClassID]);
	
		return redirect()->route('wave.privatecourse5'); 
    }

    public function displayReviewPrivate()
    {
        if(session('role')=='student')
        {
            $user = session('userSession');
            // echo '<pre>';
            // print_r($user);exit;

            $apiUrl = config('services.api_url') . '/profile';
            $apiResponse = post($apiUrl, $user);
            $response = $apiResponse;
            // echo '<pre>';
            // print_r($response);exit;
    
        }
        return view('theme::student-side.enrollment.privatecourse5')->with([
            'selected_course_class' => session('selected_course_class'),
            'selected_student' => session('selected_student'),
        ]);
    }

    /**
     * * Student Enrollment | History
     */
    public function enrollmentHistory()
    {
        $guardian = session()->get('userSession');
        $guardian_id = $guardian['id'];
        $apiUrl = config('services.api_url') . '/customer/enrollmentHistory/'.$guardian_id;
        
        $enrollments = get($apiUrl);
        // dd($enrollments);
        session(['enrollments' => $enrollments['success'] ? $enrollments['data'] : []]);

        return view('theme::student-side.enrollment.history', [
            'enrollments' => $enrollments['success'] ? $enrollments['data'] : []
        ]);
    }

    public function HistoryWaiting()
    {
        $id = request()->input('id');

        if(! $id )
            abort(404);
    
        $enrollment = array_filter(session('enrollments'), function($data) use ($id){
            return $data['id'] == $id;
        });
        
        if( count($enrollment) <= 0 )
            abort(404);

        // dd($enrollment[0]);
        $enrollment = array_values($enrollment);

        return view('theme::student-side.enrollment.history-waiting')->with([
            'entry' => count($enrollment) > 0 ? $enrollment[0] : null
        ]);
    }

    public function HistoryReserved()
    {
        $id = request()->input('id');

        if(! $id )
            abort(404);
    
        $enrollment = array_filter(session('enrollments'), function($data) use ($id){
            return $data['id'] == $id;
        });
        
        if( count($enrollment) <= 0 )
            abort(404);

        $enrollment = array_values($enrollment);

        return view('theme::student-side.enrollment.history-reserved')->with([
            'entry' => count($enrollment) > 0 ? $enrollment[0] : null
        ]);
    }

    public function HistoryComplete()
    {
        $id = request()->input('id');

        if(! $id )
            abort(404);
    
        $enrollment = array_filter(session('enrollments'), function($data) use ($id){
            return $data['id'] == $id;
        });
        
        if( count($enrollment) <= 0 )
            abort(404);

        $enrollment = array_values($enrollment);

        return view('theme::student-side.enrollment.history-complete')->with([
            'entry' => count($enrollment) > 0 ? $enrollment[0] : null
        ]);
    }

    /**
     * * Student Enrollment | Change Course
     */
    public function selectStudentChangeCourse(Request $request)
    {
        if( session('role') == 'student' ) {
            $studentData = session('userSession');
            
            session([
                'student_name' => $studentData['name'],
                'student_id' => $studentData['id']
            ]);
        
            return redirect('/changecourse/reason/' .  $studentData['id']);
        }

        // $user = $request->session()->get('userSession');
        // $apiUrl = config('services.api_url') . '/customer/student/list';
        // $responseJson = post($apiUrl, $user);
        // $studentList = $responseJson['response']['students'];

        $apiEndpoint = config('services.api_url') . '/customer/guardian/student-list';
        $apiResponse = get($apiEndpoint);

        session(['students' => $apiResponse['response']]);
     
        return view('theme::student-side.enrollment.changecourse', [
            'students' => $apiResponse['response']
        ]);
    }

    public function storeChangeCourseStudentInfo(Request $request)
    {
        $request->validate([
            'student_name' => 'required' // Validate if a student is selected
        ]);
    
        $selectedStudent = $request->input('student_name');
        $selectedStudentInfo = $request->input('student_id'); // Assuming you have a hidden input with the ID
    
        session([
            'student_name' => $selectedStudent,
            'student_id' => $selectedStudentInfo
        ]);
    
        return $this->changeCourse();
    }

    public function changeCourse()
    {
        $courseEnrollments = Http::withToken(session('token'))->get(config('services.api_url').'/change-course/lists/'.session('student_id'));
        
        return view('theme::student-side.enrollment.changecourse1')->with([
            'student_id' => session('student_id'),
            'course_enrollments' => isset( $courseEnrollments['response'] ) && $courseEnrollments['response'] != null ? $courseEnrollments['response'] : []
        ]);
    }
    
    /**
     * * Student Enrollment | Cancel Course
     */
    public function selectStudentCancelCourse(Request $request)
    {
        if( session('role') == 'student' ) {
            $studentData = session('userSession');
            
            session([
                'student_name' => $studentData['name'],
                'student_id' => $studentData['id']
            ]);
        
            return redirect()->route('wave.cancelcourse1');
        }
        
        // $user = $request->session()->get('userSession');
        // $apiUrl = config('services.api_url') . '/customer/student/list';
        // $responseJson = post($apiUrl, $user);
        // $studentList = $responseJson['response']['students'];

        $apiEndpoint = config('services.api_url') . '/customer/guardian/student-list';
        $apiResponse = get($apiEndpoint);

        session(['students' => $apiResponse['response']]);
     
        return view('theme::student-side.enrollment.cancelcourse', [
            'students' => $apiResponse['response']
        ]);
    }

    public function storeCancelCourseStudentInfo(Request $request)
    {
        $request->validate([
            'student_name' => 'required'
        ]);
    
        $selectedStudentName = $request->input('student_name');
        $selectedStudentID = $request->input('student_id'); 
    
        session([
            'student_name' => $selectedStudentName,
            'student_id' => $selectedStudentID
        ]);
    
        return redirect()->route('wave.cancelcourse1');
    }

    public function CancelCourse1()
    {
        $courseEnrollments = Http::withToken(session('token'))->get(config('services.api_url').'/cancel-course/lists/'.session('student_id'));
        
        return view('theme::student-side.enrollment.cancelcourse1')->with([
            'student_id' => session('student_id'),
            'course_enrollments' => isset( $courseEnrollments['response'] ) && $courseEnrollments['response'] != null ? $courseEnrollments['response'] : []
        ]);
    }

    /**
     * * Student Enrollment | Competition
     */
    public function CompetitionEnrollment()
    {
        if( session('role') == 'student' ) {
            $studentData = session('userSession');

            session(['students' => [$studentData]]);
            
            return $this->CompetitionEnrollment1($studentData['id']);
        }
        
        $apiEndpoint = config('services.api_url') . '/customer/guardian/student-list';
        $apiResponse = get($apiEndpoint);
        $students = $apiResponse;

        if(! $students == null ) {
            session(['students' => $apiResponse['response']]);
            $students = $apiResponse['response'];

        } else {
            $students = array();
        }

        return view('theme::student-side.enrollment.competitionenrollment')->with([
            'students' => $students
        ]);
    }

    public function CompetitionEnrollment1( $studentID )
    {
        session(['student_id' => $studentID]);

        $apiUrl = config('services.api_url') . '/customer/competition/list';
        $apiResponse = get($apiUrl);
  
        $competitions = $apiResponse;
        
        $competitionTypes = [
            [
                "key" => "relay",
                "name" => "Relay",
            ],
            [
                "key" => "butterfly",
                "name" => "Butterfly",
            ],
            [
                "key" => "medley",
                "name" => "Medley",
            ],
            [
                "key" => "breaststroke",
                "name" => "Breaststroke",
            ],
            [
                "key" => "backstroke",
                "name" => "Backstroke",
            ],
            [
                "key" => "freestyle",
                "name" => "Freestyle",
            ]
        ];

        return view('theme::student-side.enrollment.competitionenrollment1', [
            'competitions' => $competitions['response']['competitions'],
            'competition_types' => $competitionTypes,
        ]);
    }

    public function CompetitionEnrollment2()
    {
        $apiUrl = config('services.api_url') . '/customer/competition/list';
        $apiResponse = post($apiUrl, []);
  
         $competitions = $apiResponse;
        //  dd($competitions);
        // foreach ($competitions['response']['competitions'] as &$competition) {
        
        //     if (!is_array($competition['competition_type'])) {
        //         $competition['competition_type'] = [$competition['competition_type']];
        //     }
        // }
        return view('theme::student-side.enrollment.competitionenrollment2', ['competitions' => $competitions['response']['competitions']]);

    }

    // Details
    public function CompetitionEnrollment3(Request $request)
    {
        $competitionId = $request->input('id');
        $categoryId = $request->input('category');
        
        if(! $competitionId && !$categoryId )
            abort(404);
        
        // Make API call to fetch competition details
        $apiUrl = config('services.api_url') . '/customer/competition/details';
        $apiResponse = post($apiUrl, [
            'competition_id' => $competitionId,
            'competition_category_id' => $categoryId,
        ]);
        
        $studentID = session('student_id');

        $selectedStudent = collect(session('students'))->filter(function($item) use ($studentID){
            return $item['id'] == $studentID;
        });

        $studentData = null;
        if( count($selectedStudent) > 0 )
            $studentData = $selectedStudent[0];
        
        return view('theme::student-side.enrollment.competitionenrollment3', [
            'entry' => $apiResponse['response'],
            'student_id' => $studentID,
            'student_data' => $studentData,
        ]);
    }

    /**
     * * Student Enrollment | Competition History
     */
    public function CompetitionEnrollmentHistory(Request $request)
    {
        $apiUrl = config('services.api_url') . '/competition/lists';
        $apiResponse = get($apiUrl);
      
        session(['competitions' => $apiResponse['response']]);
        // dd($apiResponse);
       
        return view('theme::student-side.enrollment.competitionHistory',[
            'competitions'=> $apiResponse['response']
        ]);
    }

    public function CompetitionPreview()
    {
        return view('theme::student-side.enrollment.competitionpreview');
    }

    public function CompetitionPayment($id)
    {
        if(! $id )
            abort(404);

        return view('theme::student-side.enrollment.competitionpayment')->with([
            'entry' => session('competition_details')
        ]);
    }

    public function CompetitionDetails($id)
    {
        if(! $id )
            abort(404);

        $apiUrl = config('services.api_url') . "/customer/competition/$id/details";
        $apiResponse = get($apiUrl);
        
        session(['competition_details' => $apiResponse['response']]);

        return view('theme::student-side.enrollment.competition-history-details')->with([
            'entry' => $apiResponse['response']
        ]);
    }

    /**
     * * Student Enrollment | Cancel Competition
     */
    public function CancelCompetition()
    {
        if( session('role') == 'student' ) {
            $studentData = session('userSession');
            
            return $this->CancelCompetition2($studentData['id']);
        }

        $apiEndpoint = config('services.api_url') . '/customer/guardian/student-list';
        $apiResponse = get($apiEndpoint);

        session(['students' => $apiResponse['response']]);

        return view('theme::student-side.enrollment.cancelcompetition')->with([
            'students' => $apiResponse['response']
        ]);
    }

    public function CancelCompetition2($studentID)
    {
        $apiUrl = config('services.api_url') . '/student/'.$studentID.'/competition/lists';

        $apiResponse = get($apiUrl);
       
        return view('theme::student-side.enrollment.cancelcompetition2',[
            'competitions' => $apiResponse['response']
        ]);
    }

    public function cancelCompetitions(Request $request)
    {
           
         $userId = $request->session()->get('userSession')['id'];
        // dd($request->session()->all());
        // dd($userId);
        //  $competitionId = $id;
           $apiUrl = config('services.api_url') . '/customer/competition/cancel';
           $requestData = [
            'user_id' => $userId,
            'competition_enrollment_id' => $request->competition_id,
            'remarks' => $request->remarks
        ];
        // dd($requestData);
           $apiResponse = post($apiUrl,$requestData);
        //    dd($apiResponse);
           if ($apiResponse->successful()) {
            return redirect()->route('wave.competitionHistory');
        } else {
            $errors = [
                'message' => 'Failed',
                'status_code' => 401,
            ];

            return redirect()->route('wave.cancelcompetition2')->withErrors($errors)->withInput();
        }
    }

    public function CompetitionInvitation()
    {
        return view('theme::student-side.enrollment.competitioninvitation');
    }

}