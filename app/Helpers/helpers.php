<?php

use Illuminate\Support\Facades\Http;

if (!function_exists('getPrefixByRole')) {
  function getPrefixByRole($roleName = null)
  {
    // Your custom logic here
    $roles = config('auth.roles');

    foreach ($roles as $key => $role) {
      if (in_array($roleName, $role)) {
        return $key;
      }
    }

    return '';
  }
}

if (!function_exists('currentUser')) {
  function currentUser()
  {
    return auth()->user();
  }
}

if (!function_exists('isSuperAdmin')) {
  function isSuperAdmin()
  {
    return session('user.role.name') == 'superadmin' || session('user.role.name') == 'super_admin' ? true : false;
  }
}

if (!function_exists('isCms')) {
  function isCms()
  {
    $rolesForCMS = ['coach', 'student', 'guardian', 'sibling'];

    return in_array(session('user.role.name'), $rolesForCMS);
  }
}

if (!function_exists('formatDate')) {
  function formatDate($date, $format = 'd/m/Y')
  {
    return \Carbon\Carbon::parse($date)->setTimezone(config('app.timezone'))->format($format);
  }

  function formatDateTime($date, $time)
  {
    $formattedDate = \Carbon\Carbon::parse($date)->setTimezone(config('app.timezone'))->format('d/m/Y');
    $formattedTime = \Carbon\Carbon::parse($time)->setTimezone(config('app.timezone'))->format('h:i A');

    return $formattedDate . ", " . $formattedTime;
  }

  function formatYear($date)
  {
    $formattedDate = \Carbon\Carbon::parse($date)->setTimezone(config('app.timezone'))->format('Y');

    return $formattedDate;
  }

  function formatTime($date, $format = 'h:i A')
  {
    $formattedTime = \Carbon\Carbon::parse($date)->setTimezone(config('app.timezone'))->format($format);

    return $formattedTime;
  }

  function isPastDate($date)
  {
    $dateToCheck = \Carbon\Carbon::createFromFormat('Y-m-d', $date);

    return $dateToCheck->isPast();
  }

  function formatName($input)
  {
    // Convert to lowercase
    $lowercase = strtolower($input);

    // Replace spaces with underscores
    $underscored = str_replace(' ', '_', $lowercase);

    return $underscored;
  }

  function formatString($string)
  {
    $string = str_replace('_', ' ', $string); // Replace underscore with space
    $string = ucwords($string); // Capitalize the first letter of each word

    return $string;
  }

  function getDateRangeDuration($startDate, $endDate)
  {
    $duration = $endDate->diff($startDate);

    return $duration->format('%h hours, %i minutes'); // Output: 2 hours, 30 minutes
  }

  function can($permission)
  {
    $hasPermission = false;
    foreach (session('user.role.permissions') as $key => $userPermission) {
      if ($userPermission['key'] == $permission) {
        $hasPermission = true;

        break;
      }
    }
    // dd($hasPermission);
    return $hasPermission;
  }
}

function getCourseStartEndDate($student_classes)
{
  // Your array of objects
  $array = array_map(function ($value) {
    return [
      "start_date" => $value['class']['start_date'],
      "start_time" => $value['class']['start_time'],
      "end_time" => $value['class']['end_time'],
    ];
  }, $student_classes);

  // Initialize variables to hold the earliest and latest start dates
  $earliestStartDate = null;
  $latestStartDate = null;
  $startTime = null;
  $endTime = null;

  // Iterate over the array of objects
  foreach ($array as $item) {
    $startDate = strtotime($item['start_date']); // Convert start date to a Unix timestamp

    // Update earliest start date
    if ($earliestStartDate === null || $startDate < $earliestStartDate) {
      $earliestStartDate = $startDate;
      $startTime = $item['start_time'];
      $endTime = $item['end_time'];
    }

    // Update latest start date
    if ($latestStartDate === null || $startDate > $latestStartDate) {
      $latestStartDate = $startDate;
    }
  }

  // Format the earliest and latest start dates
  $startDateFormat = 'd-m-Y';
  $earliestStartDateFormatted = date($startDateFormat, $earliestStartDate);
  $latestStartDateFormatted = date($startDateFormat, $latestStartDate);

  // Output the result
  $result = [
    'start_date' => $earliestStartDateFormatted,
    'end_date' => $latestStartDateFormatted,
    'start_time' => $startTime,
    'end_time' => $endTime,
  ];

  return $result;
}


function post($apiUrl, $json)
{
  $apiResponse = Http::withHeaders([
    'Authorization' => 'Bearer ' . session('token'),
  ])->post($apiUrl, $json);
  
    return $apiResponse->json();
}

function get($apiUrl)
{
  $apiResponse = Http::withHeaders([
    'Authorization' => 'Bearer ' . session('token'),
  ])->get($apiUrl);
  return $apiResponse->json();
}

function postWithoutToken($apiUrl, $json)
{
  $apiResponse = Http::withHeaders([
    'Authorization' => 'Bearer ',
  ])->post($apiUrl, $json);
  return $apiResponse->json();
}

function getRole(){
  $user = session()->get('userSession');

  $roleId = $user['role_id'];

  if($roleId != null)
    return $roleId;
  else
    return 'You have No Account Please Sign In Again';
}

