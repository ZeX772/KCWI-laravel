<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Admin_Faq_Web_Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use Wave\Facades\Wave;

// Route::get('/', function () {
//     return redirect()->route('wave.user.admin-panel.index');
// });

//login - student, parent, guardian
Route::get('/student/login', function(){
    return view('themes.tailwind.auth.login_user');
});

// Authentication routes
Auth::routes();

// Route::prefix('thevoyager')->group(function () {
// 	Voyager::routes();
// });

// CMS Authenticated routes
Route::prefix('cms')->group(function () {

	Route::redirect('/', '/cms/dashboard');

	Route::middleware('cms')->group(function () {
        Voyager::routes();
        

        //Question module
        //listQuestion route 
        Route::get('faq/listQuestion','App\Http\Controllers\Admin\FAQManagement\Admin_FAQ_Web_Controller@listQuestions')->name('cms.faq-list');
        //addQuestion
        Route::post('faq/addQuestion', 'App\Http\Controllers\Admin\FAQManagement\Admin_Faq_Web_Controller@addQuestion')->name('cms.faq-add');
        //deleteQuestion
        Route::delete('faq/deleteQuestion/{id}', 'App\Http\Controllers\Admin\FAQManagement\Admin_Faq_Web_Controller@deleteQuestion')->name('cms.faq-delete');
        //updateQuestion
        Route::put('faq/updateQuestion/{id}', 'App\Http\Controllers\Admin\FAQManagement\Admin_Faq_Web_Controller@updateQuestion')->name('cms.faq-update');
        //getQuestionById
        Route::get('faq/getQuestionById/{id}', 'App\Http\Controllers\Admin\FAQManagement\Admin_Faq_Web_Controller@getQuestionById')->name('cms.faq-getById');
        
        
        //Route::delete('/delete-question/{id}', [Admin_FAQ_Web_Controller::class, 'deleteQuestion'])->name('delete-question');





        //updateQuestion
        //Route::post('faq/updateQuestion/{id}','Wave\Http\Controllers\Admin\FAQManagement@updateQuestion')->name('cms.faq-update');
        //Route::get('faq/updateQuestion/{id}', [Admin_Faq_Web_Controller::class, 'updateQuestion'])->name('cms.faq-update');
        
        
        




        Route::post('course/add', 'App\Http\Controllers\Admin\CourseModule\CourseController@addCourse')->name('cms.course-add');
        Route::get('dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('cms.dashboard');
		
        // Course Module
        Route::get('course', 'App\Http\Controllers\Admin\CourseModule\CourseController@index')->name('cms.course-show');

        Route::get('course/list', 'App\Http\Controllers\Admin\CourseModule\CourseController@listCourse')->name('cms.course-list');

        Route::post('course/add', 'App\Http\Controllers\Admin\CourseModule\CourseController@addCourse')->name('cms.course-add');
        Route::post('course/addBulk', 'App\Http\Controllers\Admin\CourseModule\CourseController@addBulkCourse')->name('cms.course-add-bulk');
        Route::post('course/update', 'App\Http\Controllers\Admin\CourseModule\CourseController@updateCourse')->name('cms.course-update');
        Route::post('course/view', 'App\Http\Controllers\Admin\CourseModule\CourseController@getCourse')->name('cms.course-get');
        Route::post('course/archieve', 'App\Http\Controllers\Admin\CourseModule\CourseController@archieveCourse')->name('cms.course-archieve');
        Route::get('course/class/{number}', 'App\Http\Controllers\Admin\CourseModule\CourseController@viewClass')->name('cms.course-view-class');
        Route::post('course/package', 'App\Http\Controllers\Admin\CourseModule\CourseController@getCoursePackage')->name('cms.course-get-package');
        
        // Level Management
        Route::get('level/list', 'App\Http\Controllers\Admin\LevelManagement\LevelController@listLevel')->name('cms.level-list');

        // Venue Management
        Route::get('venue/list', 'App\Http\Controllers\Admin\VenueManagement\VenueController@listVenue')->name('cms.venue-list');
        Route::post('venue/facilities', 'App\Http\Controllers\Admin\VenueManagement\VenueController@listVenueFacility')->name('cms.venue-facility-list');

        // Coach Management
        Route::get('coach/list', 'App\Http\Controllers\Admin\CoachManagement\CoachController@listCoach')->name('cms.coach-list');

        // Classes Management
        Route::get('classes/list', 'App\Http\Controllers\Admin\CourseModule\ClassController@listClass')->name('cms.class-list');
    });

    Route::middleware('sa')->group(function () {
        Route::post('course/unarchieve', 'App\Http\Controllers\Admin\CourseModule\CourseController@unarchieveCourse')->name('cms.course-unarchieve');
        
    });
});

// USER Authenticated Routes
Route::prefix('user')->group(function() {

    Route::redirect('/', '/user/dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('user.dashboard');

    });
});


// Unauthenticated routes
Route::middleware(['guest'])->group(function () {

    // Routes that should only be accessible to guests
    Route::get('login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
    Route::post('login', 'App\Http\Controllers\Auth\LoginController@postLogin')->name('postLogin');
    Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    // Route::get('forgot-password', 'App\Http\Controllers\Auth\ForgotPasswordController@showOTPRequestForm')->name('forgot-password');
    // Route::post('forgot-password', 'App\Http\Controllers\Auth\ForgotPasswordController@sendOTPToMail')->name('sendOTP');
    // Route::get('verify-otp', 'App\Http\Controllers\Auth\ForgotPasswordController@showVerifyOTPForm')->name('verify-otp');
    // Route::post('verify-otp', 'App\Http\Controllers\Auth\ForgotPasswordController@verifyOTP')->name('check-otp');
    Route::get('reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('reset-password');
    Route::post('reset-password', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('confirm-reset');
});

/**
 * PUBLIC ROUTES
 */
Route::get('/enquiry', '\Wave\Http\Controllers\Main\MainController@enquiry')->name('wave.user.main.enquiry');

// Wave routes
Wave::routes();
