<?php

use Illuminate\Support\Facades\Route;


// APP and WEB
Route::post('login', '\Wave\Http\Controllers\API\AuthController@login');
Route::post('register', '\Wave\Http\Controllers\API\AuthController@register');
Route::post('logout', '\Wave\Http\Controllers\API\AuthController@logout');
Route::post('refresh', '\Wave\Http\Controllers\API\AuthController@refresh');
Route::post('token', '\Wave\Http\Controllers\API\AuthController@token');
Route::get('getUserToken/{user}', '\Wave\Http\Controllers\API\AuthController@getUserToken');
Route::post('/profile/completeProfile', '\Wave\Http\Controllers\API\ProfileController@completeProfile');

Route::post('resend-otp', '\Wave\Http\Controllers\Auth\ForgotPasswordController@resendOtp');

// BROWSE
Route::get('/{datatype}', '\Wave\Http\Controllers\API\ApiController@browse');

// READ
Route::get('/{datatype}/{id}', '\Wave\Http\Controllers\API\ApiController@read');

// EDIT
Route::put('/{datatype}/{id}', '\Wave\Http\Controllers\API\ApiController@edit');

// ADD
Route::post('/{datatype}', '\Wave\Http\Controllers\API\ApiController@add');

// DELETE
Route::delete('/{datatype}/{id}', '\Wave\Http\Controllers\API\ApiController@delete');

// Bank
Route::post('/bank/add', '\Wave\Http\Controllers\API\Admin\BankController@add');
Route::post('/bank/list', '\Wave\Http\Controllers\API\Admin\BankController@list');
Route::post('/bank/update/{bank}', '\Wave\Http\Controllers\API\Admin\BankController@update');
Route::post('/bank/archive', '\Wave\Http\Controllers\API\Admin\BankController@archive');
Route::post('/bank/unarchive', '\Wave\Http\Controllers\API\Admin\BankController@unarchive');

// Closures
Route::post('/closure/add', '\Wave\Http\Controllers\API\Admin\ClosureController@add');
Route::post('/closure/list', '\Wave\Http\Controllers\API\Admin\ClosureController@list');
Route::post('/closure/update/{schoolClosure}', '\Wave\Http\Controllers\API\Admin\ClosureController@update');
Route::post('/closure/archive', '\Wave\Http\Controllers\API\Admin\ClosureController@archive');
Route::post('/closure/unarchive', '\Wave\Http\Controllers\API\Admin\ClosureController@unarchive');
Route::post('/closure/addType', '\Wave\Http\Controllers\API\Admin\ClosureController@addType');
Route::post('/closure/updateType', '\Wave\Http\Controllers\API\Admin\ClosureController@updateType');
Route::post('/closure/listType', '\Wave\Http\Controllers\API\Admin\ClosureController@listType');

// Coach
Route::post('/coach/add', '\Wave\Http\Controllers\API\Admin\CoachController@add');
Route::post('/coach/list', '\Wave\Http\Controllers\API\Admin\CoachController@list');
Route::post('/coach/update', '\Wave\Http\Controllers\API\Admin\CoachController@update');
Route::post('/coach/archive', '\Wave\Http\Controllers\API\Admin\CoachController@archive');
Route::post('/coach/unarchive', '\Wave\Http\Controllers\API\Admin\CoachController@unarchive');
Route::post('/coach/active', '\Wave\Http\Controllers\API\Admin\CoachController@active');
Route::post('/coach/inactive', '\Wave\Http\Controllers\API\Admin\CoachController@inactive');

// Student
Route::post('/student/list', '\Wave\Http\Controllers\API\Admin\StudentController@list');
Route::post('/student/view', '\Wave\Http\Controllers\API\Admin\StudentController@view');
Route::post('/student/archive', '\Wave\Http\Controllers\API\Admin\StudentController@archive');
Route::post('/student/unarchive', '\Wave\Http\Controllers\API\Admin\StudentController@unarchive');
Route::post('/student/add', '\Wave\Http\Controllers\API\Admin\StudentController@add');
Route::post('/student/update', '\Wave\Http\Controllers\API\Admin\StudentController@update');
Route::post('/student/enroll-course', '\Wave\Http\Controllers\API\Admin\StudentController@enrollCourse');

//Student, Guardian, Parent
//Authenticate
Route::post('/user/auth','\Wave\Http\Controllers\API\User\User_Authenticate_Controller@world');

//User_Authenticate_Controller
//login
Route::post('/user/login', '\Wave\Http\Controllers\API\User\User_Login_Controller@login');
//logout
Route::post('/user/logout','\Wave\Http\Controllers\API\User\User_Login_Controller@logout');
//token
Route::post('/user/token','\Wave\Http\Controllers\API\User\User_Login_Controller@token');
//refresh
Route::post('/user/refresh', '\Wave\Http\Controllers\API\User\User_Login_Controller@refresh');
//respondWithToken
Route::post('/user/respondWithToken', '\Wave\Http\Controllers\API\User\User_Login_Controller@respondWithToken');
//register
Route::post('/user/register','\Wave\Http\Controllers\API\User\User_Register_Controller@register');





//reset password
Route::post('/user/reset_password','\Wave\Http\Controllers\API\User\User_ResetPassword_Controller@sendResetResponse');

//forgot password
Route::post('/user/forgot_password','\Wave\Http\Controllers\API\User\User_ForgotPassword_Controller@showLinkRequestForm');

//profile
Route::post('/user/complete_profile','\Wave\Http\Controllers\API\User\User_Profile_Controller@completeProfile');


//FAQ
//add question (admin)
Route::post('/admin/addQuestion', '\Wave\Http\Controllers\API\Admin\Admin_Faq_Controller@addQuestion');
//list question (admin)
Route::post('/admin/listQuestion', '\Wave\Http\Controllers\API\Admin\Admin_Faq_Controller@listQuestion');
//list question (user)
Route::post('/user/listQuestion', '\Wave\Http\Controllers\API\Admin\Admin_Faq_Controller@listQuestion');
//get question by id
Route::get('/admin/getQuestionById/{id}', '\Wave\Http\Controllers\API\Admin\Admin_Faq_Controller@getQuestionById');
//update question (admin)
Route::put('/admin/updateQuestion/{id}', '\Wave\Http\Controllers\API\Admin\Admin_Faq_Controller@updateQuestion');




//delete question (admin)
Route::delete('/admin/deleteQuestion/{id}', '\Wave\Http\Controllers\API\Admin\Admin_Faq_Controller@deleteQuestion');

//PRIVACY POLICY
//view privacy policy (admin)
Route::post('/admin/viewPrivacyPolicy','\Wave\Http\Controllers\API\Admin\Admin_Privacy_Policy_Controller@viewPrivacyPolicy');
//view privacy policy (user)
Route::post('/user/viewPrivacyPolicy','\Wave\Http\Controllers\API\Admin\Admin_Privacy_Policy_Controller@viewPrivacyPolicy');
//update privacy policy - the reason use post here is because there is only 1 privacy policy
Route::post('/admin/updatePrivacyPolicy','\Wave\Http\Controllers\API\Admin\Admin_Privacy_Policy_Controller@updatePrivacyPolicy');

//role management
 //add Role
 Route::post('/admin/addRole','\Wave\Http\Controllers\API\Admin\Admin_Role_Management@addRole');
//list Role
Route::post('/admin/listRole','\Wave\Http\Controllers\API\Admin\Admin_Role_Management@listRole');
//update Role
Route::put('/admin/updateRole/{role_id}','\Wave\Http\Controllers\API\Admin\Admin_Role_Management@updateRole');
//delete Role
Route::Delete('/admin/deleteRole/{role_id}','\Wave\Http\Controllers\API\Admin\Admin_Role_Management@deleteRole');

//user management
//add User
Route::post('/admin/addUser','\Wave\Http\Controllers\API\Admin\Admin_User_Management@addUser');
//list User 
//pass role_id through JSON
//role_id = null (list all)
//role_id = 1 (admin)
//role_id = 2 (student)
Route::post('/admin/listUser','\Wave\Http\Controllers\API\Admin\Admin_User_Management@listUser');
//Edit User
Route::post('/admin/editUser/{id}','\Wave\Http\Controllers\API\Admin\Admin_User_Management@editUser');

//school management
//add School
Route::post('/admin/addSchool','\Wave\Http\Controllers\API\Admin\Admin_School_Management@addSchool');
//list School
Route::post('/admin/listSchool','\Wave\Http\Controllers\API\Admin\Admin_School_Management@listSchool');
//Update School
Route::put('/admin/updateSchool/{school_id}','\Wave\Http\Controllers\API\Admin\Admin_School_Management@updateSchool');
//Delete School
Route::delete('/admin/deleteSchool/{school_id}','\Wave\Http\Controllers\API\Admin\Admin_School_Management@deleteSchool');

//users_courses_table management
//attach course to user
Route::post('/admin/attachCourse/{id}','\Wave\Http\Controllers\API\Admin\Admin_User_Course_Management@attachCoursesToUser');
//detach courses from user
Route::post('/admin/detachCourse/{id}', '\Wave\Http\Controllers\API\Admin\Admin_User_Course_Management@detachCoursesFromUser');
//list courses for a user
Route::post('/admin/listCourseForUser/{id}', '\Wave\Http\Controllers\API\Admin\Admin_User_Course_Management@listCoursesForUser');
//list users for a course
Route::post('/admin/listUserForCourse/{id}', '\Wave\Http\Controllers\API\Admin\Admin_User_Course_Management@listUsersForCourse');

//course management
//add Course
Route::post('/admin/addCourse','\Wave\Http\Controllers\API\Admin\Admin_Course_Management@addCourse');
//list Course
Route::post('/admin/listCourse','\Wave\Http\Controllers\API\Admin\Admin_Course_Management@listCourse');
//update Course
Route::put('/admin/updateCourse/{course_id}','\Wave\Http\Controllers\API\Admin\Admin_Course_Management@updateCourse');
//delete Course
Route::delete('admin/deleteCourse/{course_id}','\Wave\Http\Controllers\API\Admin\Admin_Course_Management@deleteCourse');


//notifications_table management
//add notification
Route::post('/admin/addNotification','\Wave\Http\Controllers\API\Admin\Admin_Notification_Management@addNotification');
//list notification
Route::post('/admin/listNotification','\Wave\Http\Controllers\API\Admin\Admin_Notification_Management@listNotification');
//update notification
Route::put('/admin/updateNotification/{notification_id}','\Wave\Http\Controllers\API\Admin\Admin_Notification_Management@updateNotification');
//delete notification
Route::put('/admin/deleteNotification/{notification_id}','\Wave\Http\Controllers\API\Admin\Admin_Notification_Management@deleteNotification');

//users_notifications_table management
//attach notification to user
Route::post('/admin/attachNotification/{id}','\Wave\Http\Controllers\API\Admin\Admin_User_Notification_Management@attachNotificationsToUser');
//detach notification from user
Route::post('/admin/detachNotification/{id}','\Wave\Http\Controllers\API\Admin\Admin_User_Notification_Management@detachNotificationsFromUser');

//list notifications for a user
Route::post('/admin/listNotificationsForUser/{id}','\Wave\Http\Controllers\API\Admin\Admin_User_Notification_Management@listNotificationsForUser');
//list users for a notification
Route::post('/admin/listUsersForNotification/{notification_id}', '\Wave\Http\Controllers\API\Admin\Admin_User_Notification_Management@listUsersForNotification');

