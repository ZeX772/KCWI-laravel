<?php

namespace Wave\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoachController extends Controller{
    public function index()
    {
        return view('theme::coach-side.homepage.loginwithoutclass');
    }
    public function haventlogin()
    {
        return view('theme::coach-side.homepage.haventlogin');
    }

    public function loginupcomingclass()
    {
        return view('theme::coach-side.homepage.loginupcomingclass');
    }
    public function newsdetails()
    {
        return view('theme::coach-side.homepage.newsdetails');
    }

    public function notificationdetails()
    {
        return view('theme::coach-side.homepage.notification.notificationdetails');
    }
    public function notificationdetails2()
    {
        return view('theme::coach-side.homepage.notification.notificationdetails2');
    }
    public function schedule()
    {
        //urgent news in homepage
        $schedulesResponse = get(config('services.api_url') . '/coach/schedules');
        $schedules = $schedulesResponse['response'] ?? [];

        return view('theme::coach-side.homepage.schedule.schedule')->with([
            "entries" => $schedules
        ]);
    }
    public function pastschedule($id)
    {
        $scheduleResponse = post(config('services.api_url') . '/coach/view-current-course', [
            "course_id" => $id,
            "type" => "past",
        ]);
        $schedule = $scheduleResponse['response'] ?? [];

        session(['is_pastschedule' => true]);

        return view('theme::coach-side.homepage.schedule.pastschedule')->with([
            "entry" => $schedule
        ]);;
    }

    public function upcomingschedule($id)
    {
        $scheduleResponse = post(config('services.api_url') . '/coach/view-current-course', [
            "course_id" => $id,
            "type" => "upcoming",
        ]);
        $schedule = $scheduleResponse['response'] ?? [];
        
        session(['is_pastschedule' => false]);

        return view('theme::coach-side.homepage.schedule.upcomingschedule')->with([
            "entry" => $schedule
        ]);
    }
    public function comment(Request $request)
    {
        $entry = null;
        if( $request->has('id') ) {
            // fetch the record
            $dataResponse = post(config('services.api_url') . '/coach/student-show-comment', [
                "comment_id" => $request->id
            ]);
    
            $entry = $dataResponse['response'] ?? null;
        }
        
        return view('theme::coach-side.homepage.schedule.comment(coach).comment')->with([
            "student" => session('selected_student'),
            "auth_user" => session('userSession'),
            "entry" => $entry,
            "is_update" => $entry ? true : false
        ]);
    }

    public function pastcomment($studentID)
    {
        $dataResponse = post(config('services.api_url') . '/coach/student-comments', [
            "student_id" => $studentID,
            "coach_id" => session('userSession')['id'],
            "type" => "active"
        ]);

        $data = $dataResponse['response'] ?? [];

        return view('theme::coach-side.homepage.schedule.comment(coach).pastcomment')->with([
            "student" => session('selected_student'),
            "entries" => $data
        ]);
    }

    public function draftComment($studentID)
    {
        $dataResponse = post(config('services.api_url') . '/coach/student-comments', [
            "student_id" => $studentID,
            "coach_id" => session('userSession')['id'],
            "type" => "draft"
        ]);

        $data = $dataResponse['response'] ?? [];

        return view('theme::coach-side.homepage.schedule.comment(coach).draftcomment')->with([
            "student" => session('selected_student'),
            "entries" => $data
        ]);
    }

    public function showCoachAttendance($id)
    {
        $dataResponse = post(config('services.api_url') . '/coach/view-course-class', [
            "class_id" => $id
        ]);
        $data = $dataResponse['response'] ?? [];
        session(["coach_attendance" => $data]);

        // dd($data);

        return view('theme::coach.coach-attendance.attendance')->with([
            "entry" => $data
        ]);
    }

    public function showStudentPerformance($studentId)
    {
        $coachAttendance = session("coach_attendance");
        $courseLevelID = $coachAttendance['course_class']['course']['course_level'];
        $courseID = $coachAttendance['course_class']['course']['id'];
        $classID = $coachAttendance['course_class']['id'];
        
        $dataResponse = post(config('services.api_url') . '/coach/student-performance-list', [
            "user_id" => $studentId,
            "course_level_id" => $courseLevelID,
            "class_id" => $classID,
            "course_id" => $courseID,
        ]);

        $data = $dataResponse['response'] ?? null;

        session(['selected_student' => $data['student']]);

        return view('theme::coach.performance.student')->with([
            "coach_attendance" => $coachAttendance,
            "entry" => $data,
            "auth_user" => session('userSession')
        ]);
    }
}
