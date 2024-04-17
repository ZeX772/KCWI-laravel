<?php

namespace Wave\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\notifications_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
    public function index(){
        return view('theme::notifications.index');
    }

    public function delete(Request $request, $id){
        $notification = auth()->user()->notifications()->where('id', $id)->first();
        if ($notification){
            $notification->delete();
            return response()->json(['type' => 'success', 'message' => 'Marked Notification as Read', 'listid' => $request->listid]);
        }
        else {
            return response()->json(['type' => 'error', 'message' => 'Could not find the specified notification.']);
        }
    }

    public function CusNotification(){
        $user = session('userSession');
        $userId = $user['id'];

        $apiUrlToday = config('services.api_url') . '/general-notif/today/'.$userId;
        $apiResponseToday = get($apiUrlToday);
        $notificationsToday = $apiResponseToday;

        $apiUrlEarlier = config('services.api_url') . '/general-notif/earlier/'.$userId;
        $apiResponseEarlier = get($apiUrlEarlier);
        $notificationsEarlier = $apiResponseEarlier;

        if( isset($notificationsToday['status']) ) {
            if( $notificationsToday['status'] == 'fail' )
                $notificationsToday = [];
        }

        if( isset($notificationsEarlier['status']) ) {
            if( $notificationsEarlier['status'] == 'fail' )
                $notificationsEarlier = [];
        }

        return view('theme::student-side.notification.notification', ['notificationsToday' => $notificationsToday, 'notificationsEarlier' => $notificationsEarlier]);
    }
    public function Notification2($id){

        $apiUrl = config('services.api_url') . '/show-selected-notif/'.$id;
        $apiResponse = get($apiUrl);
        $notificationsDetails = $apiResponse;
        $notificationsDetails = $notificationsDetails['response'];
        //dd($notificationsDetails);

        return view('theme::student-side.notification.notification2', ["notificationsDetails" => $notificationsDetails]);
    }

    public function AttendanceNotification(){

        $apiUrlToday = config('services.api_url') . '/attendance-notif/today';
        $apiResponseToday = get($apiUrlToday);
        $notificationsToday = $apiResponseToday;

        $apiUrlEarlier = config('services.api_url') . '/attendance-notif/earlier';
        $apiResponseEarlier = get($apiUrlEarlier);
        $notificationsEarlier = $apiResponseEarlier;

        return view('theme::student-side.notification.attendancenotification', ['notificationsToday' => $notificationsToday, 'notificationsEarlier' => $notificationsEarlier]);
    }

    public function AttendanceNotification2($id){

        $apiUrl = config('services.api_url') . '/show-selected-notif/'.$id;
        $apiResponse = get($apiUrl);
        $attendancesDetails = $apiResponse;
        $attendancesDetails = $attendancesDetails['response'];

        return view('theme::student-side.notification.attendancenotification2', ['attendancesDetails' => $attendancesDetails]);
    }

    public function VideoShareNotification(){
        return view('theme::student-side.notification.videosharenotification');
    }
    public function VideoShare(){
        return view('theme::student-side.notification.videoshare');
    }

    public function SwapCoachNotification(){
        return view('theme::student-side.notification.swapcoachnotification');
    }

}
