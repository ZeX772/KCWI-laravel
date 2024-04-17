<?php


namespace Wave\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Facades\App\Services\BunnyCDN;

class StudentController extends Controller
{

    public function showStudent(){
        // Define the bearer 
        
        if( session('role') == 'student' )
            return $this->showStudent1(session('userSession')['id']);
        
        $token = session('token');
        $studentsPost = get(config('services.api_url').'/customer/guardian/student-list');
   
        if( !empty($studentsPost) )
        {
            if( $studentsPost['success'] )
            {
                $responseData = $studentsPost['response'];
            }
        }
        else
        {
            $responseData = [];
        }
        $students = $responseData;

        return view('theme::student.student-homepage', compact('students'));
    }
    
    public function uploadProfilePic(Request $request){

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $fileExtension = $file->getClientOriginalExtension();
            // replace with bunny function
            $url = storeFile(Auth::user()->id . '-' . time().'.'.$fileExtension, file_get_contents($file));
            $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzEwMTQ1NzQyLCJleHAiOjE3MTAxNDkzNDIsIm5iZiI6MTcxMDE0NTc0MiwianRpIjoiZjlTQmo2ZHFUSEk4UzJnUCIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.JS4jBkW95KTG8szbmbGYg6Jwn-HxmEzWcS0q_LFFRu0';
            // $courseEnrollments = Http::withToken(session('api_token'))->post(config('services.api_url').'/request/course-enrollment');
            $json        = array();
            $json['url'] = $url;
            $json['student_id'] = $request->studentId;
            $studentsPost = Http::withToken($token)->post(config('services.api_url').'api/changeImage',$json);
    
        }
        // Define the bearer token

        // $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzEwMTQ1NzQyLCJleHAiOjE3MTAxNDkzNDIsIm5iZiI6MTcxMDE0NTc0MiwianRpIjoiZjlTQmo2ZHFUSEk4UzJnUCIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.JS4jBkW95KTG8szbmbGYg6Jwn-HxmEzWcS0q_LFFRu0';
        // // $courseEnrollments = Http::withToken(session('api_token'))->post(config('services.api_url').'/request/course-enrollment');
        // $studentsPost = Http::withToken($token)->post(config('services.api_url').'/getStudents');
        // $responseData = $studentsPost['response']['students'];
        // $students = $responseData;
        // return view('theme::student.student-homepage', compact('students'));
    }

    public function showStudent1($id)
    {
        // fetch individual student details
        $token = session('token');
        $studentDetails = Http::withToken($token)->get(config('services.api_url').'/customer/student/view/'.$id);
   
        if( $studentDetails && $studentDetails['success'] )
            $responseData = $studentDetails['response'];
        else
            abort(404);

        session(['selected_student_id' => $id]);

        return view('theme::student.student1')->with([
            'entry' => $responseData,
            'student_id' => $id
        ]);
    }

    public function showLevel($id){
        $apiUrl = config('services.api_url') . '/customer/student/show-my-level/' . $id;
        $studentLevel = get($apiUrl); 
        
        // dd($studentLevel);
        
        return view('theme::student.my-level')->with([
            'student_id' => $id,
            'entry' => $studentLevel['data']
        ]);
    }

    public function showRipple($id, $enrollmentID){
        $apiUrl = config('services.api_url') . '/customer/student/show-course-detail';

        $json = [
            'id' => $id,
            'course_enrollment_id' => $enrollmentID,
        ];

        $courseDetail = post($apiUrl, $json);
        
        // dd($courseDetail);

        return view('theme::student.ripple')->with([
            'student_id' => $id,
            'entry' => $courseDetail['data']
        ]);
    }

    public function showSchedule($studentID){
        // fetch student up coming schedule
        $apiResponse = get(config('services.api_url')."/customer/student/$studentID/class-schedule/1");
        
        return view('theme::student.my-schedule', [
            'student_id' => $studentID,
            'students' => $apiResponse['student_schedules'],
            'competitions' => $apiResponse['competition_enrollments'],
        ]);
    }

    public function showPastSchedule($studentID){
        // fetch student past schedule
        $apiResponse = get(config('services.api_url')."/customer/student/$studentID/class-schedule/0");
        
        return view('theme::student.my-past-schedule', [
            'student_id' => $studentID,
            'students' => $apiResponse['student_schedules'],
            'competitions' => $apiResponse['competition_enrollments'],
        ]);
    }

    public function showLeaveOrMakeUp($id){


        return view('theme::student.leaveOrmakeup')->with([
            'student_id' => $id
        ]);
    }

    public function showApplyLeave($studentID){
        if(! $studentID )
            abort(404);
        
        // Fetch Up Comming Classes
        $upcomingClasses = Http::withToken(session('token'))
            ->get(config('services.api_url')."/student/upcoming-classes/$studentID");

        return view('theme::student.applyLeave')->with([
            'entries' => $upcomingClasses['response'],
            'user_id' => $studentID
        ]);
    }
    public function showApplyMakeUp($id){
        if(! $id )
            abort(404);

        // fetch the list of leave of the user
        $studentLeaves = Http::withToken(session('token'))
            ->get(config('services.api_url')."/student/leave/list/$id");

        return view('theme::student.applyMakeUp')->with([
            'student_id' => $id,
            'entries' => $studentLeaves['data'],
        ]);
    }

    public function showLeaveRecord($studentID)
    {
        if(! $studentID )
            abort(404);

        // fetch the list of leave of the user
        $studentLeaves = Http::withToken(session('token'))
            ->get(config('services.api_url')."/student/leave/list/$studentID");

        return view('theme::student.leave-record.leaveRecord')->with([
            'student_id' => $studentID,
            'entries' => $studentLeaves['data'],
        ]);
    }

    public function showSickLeave($studentID, $leaveID){
        if(! $studentID || ! $leaveID )
            abort(404);

        // fetch the list of leave of the user
        $studentLeave = Http::withToken(session('token'))
            ->get(config('services.api_url')."/student/leave/detail/$leaveID");

        return view('theme::student.leave-record.sickLeave')->with([
            'student_id' => $studentID,
            'leave_id' => $leaveID,
            'entry' => $studentLeave['data'],
        ]);
    }

    public function showMedicalCert($studentID, $leaveID){
        if(! $studentID || ! $leaveID )
            abort(404);

        // fetch the list of leave of the user
        $studentLeave = Http::withToken(session('token'))
            ->get(config('services.api_url')."/student/leave/detail/$leaveID");
        // dd($studentLeave['data']);
        return view('theme::student.leave-record.medicalCert')->with([
            'student_id' => $studentID,
            'leave_id' => $leaveID,
            'entry' => $studentLeave['data'],
        ]);
    }

    public function showMakeUpRequest($studentID)
    {
        if(! $studentID )
            abort(404);

        // fetch the list of makeup classes of the user
        $makeupClasses = Http::withToken(session('token'))
            ->get(config('services.api_url')."/customer/make-up-class/list/$studentID");

        return view('theme::student.make-up-request.makeUpRequest')->with([
            'student_id' => $studentID,
            'entries' => $makeupClasses['response'],
        ]);
    }
    public function showMakeUpCasualLeave($studentID, $makeUpClassID){
        if(! $studentID || ! $makeUpClassID )
            abort(404);

        // fetch the list of makeup classes of the user
        $makeupClass = Http::withToken(session('token'))
            ->get(config('services.api_url')."/customer/make-up-class/view/$makeUpClassID");

        return view('theme::student.make-up-request.casualLeave')->with([
            'student_id' => $studentID,
            'entry' => $makeupClass['response'],
        ]);
    }
    public function showMakeUpSickLeave($studentID, $makeUpClassID){
        if(! $studentID || ! $makeUpClassID )
            abort(404);

        // fetch the list of makeup classes of the user
        $makeupClass = Http::withToken(session('token'))
            ->get(config('services.api_url')."/customer/make-up-class/view/$makeUpClassID");

        return view('theme::student.make-up-request.sickLeave')->with([
            'student_id' => $studentID,
            'entry' => $makeupClass['response'],
        ]);
    }

    public function showMakeUpOthers()
    {
        return view('theme::student.make-up-request.others');
    }

    public function showPaymentRecord()
    {
        return view('theme::student.payment-record.paymentRecord')->with([
            'student_id' => session('selected_student_id')
        ]);
    }

    public function showReservation()
    {
        //* Fetch the list of reservation course enrollment
        $reservationLists = Http::withToken(session('token'))
            ->post(config('services.api_url')."/customer/payment-record/list/reservation", [
                "student_id" => session('selected_student_id')
            ]);

        return view('theme::student.payment-record.reservation')->with([
            'entries' => isset($reservationLists['response']) && $reservationLists['response'] != null ? $reservationLists['response'] : []
        ]);
    }

    public function showReservation1($courseEnrollmentID)
    {
        if(! $courseEnrollmentID )
            abort(404);

        //* Fetch the course enrollment details with payment
        $reservationList = Http::withToken(session('token'))
            ->post(config('services.api_url')."/customer/payment-record/view", [
                'course_enrollment_id' => $courseEnrollmentID
            ]);
        
        $response = isset($reservationList['response']) && $reservationList['response'] != null ? $reservationList['response'] : [];

        session(['course_enrollment' => $response]);
        //dd($response);
        return view('theme::student.payment-record.reservation1')->with([
            'entry' => $response
        ]);
    }
    
    public function showInvoice()
    {
        // $pdfUrl = session('course_enrollment')['invoice_item']['invoice'];
        // session(['invoice' => $pdfUrl]);
        // dd(session('invoice'));
        if (session('invoice') == null) {
            return view('theme::student.payment-record.invoice')->with([
                'message' => 'Broken Url / No Pdf file'
            ]);
        }else {
            return view('theme::student.payment-record.invoice')->with([
                'entry' => session('invoice')
            ]);
        }
    }

    public function fetchPdf(Request $request)
    {
        $pdfUrl = '';
        if( !isset($request->pdf_url) )
            $pdfUrl = session('course_enrollment')['invoice_item'];
        else
            $pdfUrl = $request->pdf_url;
        // $pdfUrl = session('course_enrollment')['invoice_item'];
        // Make a request to fetch the PDF file from the backend
        $response = Http::get($pdfUrl);
        // Return the PDF content
        return $response->body();
    }

    public function showOnlinePayment()
    {
        return view('theme::student.payment-record.online-payment')->with([
            'entry' => session('course_enrollment')
        ]);
    }

    public function showUploadReceipt( $enrollmentID )
    {    
        if(! $enrollmentID )
            abort(404);

        return view('theme::student.payment-record.upload-receipt')->with([
            'enrollment_id' => $enrollmentID
        ]);
    }
    public function showPaymentHistory(){
        // dd(session('selected_student_id'));
        //* Fetch the list of reservation course enrollment
        $historyLists = Http::withToken(session('token'))
            ->post(config('services.api_url')."/customer/payment-record/list", [
                "student_id" => session('selected_student_id')
            ]);
        // dd($historyLists['response']);
        $competitionLists = Http::withToken(session('token'))
            ->post(config('services.api_url')."/competition/lists", [
                "student_id" => session('selected_student_id')
            ]);

        return view('theme::student.payment-record.payment-history')->with([
            'entries' => isset($historyLists['response']) && $historyLists['response'] != null ? $historyLists['response'] : [],
            'competition_lists' => isset($competitionLists['response']) && $competitionLists['response'] != null ? $competitionLists['response'] : [],
        ]);
    }

    public function showPaymentHistory1($id)
    {
        if(! $id )
            abort(404);

        // fetch the selected historylist
        $reservationList = Http::withToken(session('token'))
            ->post(config('services.api_url')."/customer/payment-record/view", [
                'course_enrollment_id' => $id
            ]);

        $entry = isset($reservationList['response']) && $reservationList['response'] != null ? $reservationList['response'] : [];

        if(! empty($entry) )
            session(['invoice' => $entry['invoice_item']['invoice']]);

        return view('theme::student.payment-record.payment-history1')->with([
            'entry' => $entry
        ]);
    }

    public function showPaymentHistory2($id)
    {
        if(! $id )
            abort(404);

        // fetch the selected historylist
        $competitionEnrollment = Http::withToken(session('token'))
            ->get(config('services.api_url')."/customer/competition/view/$id");

        // dd($competitionEnrollment['response']);

        return view('theme::student.payment-record.payment-history2')->with([
            'entry' => isset($competitionEnrollment['response']) && $competitionEnrollment['response'] != null ? $competitionEnrollment['response'] : []
        ]);
    }

    public function storeImgStudentProfile(Request $request , $id){
       
       
        $requestData = [
            'userId' => $id,
            'imageName' => null,
        ];
    
        if ($request->hasFile('pro-image')) {
            session(['uploadSuccess' => '']); 
            $file = $request->file('pro-image');
    
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            try {
                $imageName = BunnyCDN::updateFile($file, $filename, 'hksa/profile-image/')['url'];
                $requestData['imageName'] = $imageName;
    
                // Update profile via API
                $apiUrlUpdate = config('services.api_url') . '/updateprofile';
                $apiResponseUpdate = post($apiUrlUpdate, $requestData);
                $success = 'Image Saved';

                session(['uploadSuccess' => $success]); 

                if ( $apiResponseUpdate ) {
                    // Retrieve updated profile
                    return back();

                } else {
                    throw new \Exception("Failed to update profile.");
                    
                }
            } catch (\Exception $e) {
                $errors = [
                    'message' => $e->getMessage(),
                    'status_code' => 500, // Internal Server Error
                ];
                return redirect()->route('wave.personal-information')->withErrors($errors)->withInput();
            }
        } else {
            $errors = [
                'message' => 'Error: No image uploaded.',
                'status_code' => 400, // Bad Request
            ];
            return redirect()->route('wave.personal-information')->withErrors($errors)->withInput();
        }
    }
}
