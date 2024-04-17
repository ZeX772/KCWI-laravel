<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Wave\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Auth\LoginController;
use Wave\Http\Controllers\EnrollmentController;
use Wave\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Wave\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Wave\Http\Controllers\Auth\ForgotPasswordController as CustomerForgotPasswordController;
use Wave\Http\Controllers\Auth\LoginController as AuthLoginController;

Route::impersonate();

// Route::get('/auth-login', function () {
//     return view('login.blade.php'); // Update with the actual name of your Blade view
// })->name('auth-login');
Route::get('@{username}', '\Wave\Http\Controllers\ProfileController@index')->name('wave.profile');

// Documentation routes
Route::view('docs/{page?}', 'docs::index')->where('page', '(.*)');
Route::get('user/verify/{verification_code}', '\Wave\Http\Controllers\Auth\RegisterController@verify')->name('verify');
Route::post('register/complete', '\Wave\Http\Controllers\Auth\RegisterController@complete')->name('wave.register-complete');

Route::get('blog', '\Wave\Http\Controllers\BlogController@index')->name('wave.blog');
Route::get('blog/{category}', '\Wave\Http\Controllers\BlogController@category')->name('wave.blog.category');
Route::get('blog/{category}/{post}', '\Wave\Http\Controllers\BlogController@post')->name('wave.blog.post');

Route::view('install', 'wave::install')->name('wave.install');

/***** Pages *****/
Route::get('p/{page}', '\Wave\Http\Controllers\PageController@page');

/***** Pricing Page *****/
Route::view('pricing', 'theme::pricing')->name('wave.pricing');

/***** Billing Routes *****/
Route::post('paddle/webhook', '\Wave\Http\Controllers\WebhookController');
Route::post('checkout', '\Wave\Http\Controllers\SubscriptionController@checkout')->name('checkout');

Route::group(['middleware' => 'auth'], function () {
	Route::get('settings/{section?}', '\Wave\Http\Controllers\SettingsController@index')->name('wave.settings');

	Route::post('settings/profile', '\Wave\Http\Controllers\SettingsController@profilePut')->name('wave.settings.profile.put');
	Route::put('settings/security', '\Wave\Http\Controllers\SettingsController@securityPut')->name('wave.settings.security.put');

	Route::post('settings/api', '\Wave\Http\Controllers\SettingsController@apiPost')->name('wave.settings.api.post');
	Route::put('settings/api/{id?}', '\Wave\Http\Controllers\SettingsController@apiPut')->name('wave.settings.api.put');
	Route::delete('settings/api/{id?}', '\Wave\Http\Controllers\SettingsController@apiDelete')->name('wave.settings.api.delete');

	Route::get('settings/invoices/{invoice}', '\Wave\Http\Controllers\SettingsController@invoice')->name('wave.invoice');

	Route::get('notifications', '\Wave\Http\Controllers\NotificationController@index')->name('wave.notifications');
	Route::get('announcements', '\Wave\Http\Controllers\AnnouncementController@index')->name('wave.announcements');
	Route::get('announcement/{id}', '\Wave\Http\Controllers\AnnouncementController@announcement')->name('wave.announcement');
	Route::post('announcements/read', '\Wave\Http\Controllers\AnnouncementController@read')->name('wave.announcements.read');
	Route::get('notifications', '\Wave\Http\Controllers\NotificationController@index')->name('wave.notifications');
	Route::post('notification/read/{id}', '\Wave\Http\Controllers\NotificationController@delete')->name('wave.notification.read');

	/********** Checkout/Billing Routes ***********/
	Route::post('cancel', '\Wave\Http\Controllers\SubscriptionController@cancel')->name('wave.cancel');
	Route::view('checkout/welcome', 'theme::welcome');

	Route::post('subscribe', '\Wave\Http\Controllers\SubscriptionController@subscribe')->name('wave.subscribe');
	Route::view('trial_over', 'theme::trial_over')->name('wave.trial_over');
	Route::view('cancelled', 'theme::cancelled')->name('wave.cancelled');
	Route::post('switch-plans', '\Wave\Http\Controllers\SubscriptionController@switchPlans')->name('wave.switch-plans');
});

Route::group(['middleware' => 'admin.user'], function () {
	Route::view('admin/do', 'wave::do');
});

// * Public Main Page
Route::get('/', [HomeController::class, 'mainPage'])->name('main.page');

// * Admin Login pages
Route::group(['middleware' => ['guest', 'cms-external'], 'prefix' => 'admin-panel'], function () {
	Route::get('index', '\Wave\Http\Controllers\Admin\AdminLoginController@index')->name('wave.user.admin-panel.index');
	Route::post('login', '\Wave\Http\Controllers\Admin\AdminLoginController@login')->name('wave.user.admin-panel.login');
	Route::get('forgot-password', '\Wave\Http\Controllers\Admin\AdminLoginController@forgotPassword')->name('wave.user.admin-panel.forgot-password');
	Route::post('forgot-password', 'Wave\Http\Controllers\Auth\ForgotPasswordController@sendOTPToMail')->name('wave.user.admin-panel.sendOTP');
	Route::get('verify-otp', 'Wave\Http\Controllers\Auth\ForgotPasswordController@showVerifyOTPForm')->name('wave.user.admin-panel.verify-otp');
	Route::post('check-otp', 'Wave\Http\Controllers\Auth\ForgotPasswordController@verifyOTP')->name('wave.user.admin-panel.check-otp');
	Route::get('show-reset-password', '\Wave\Http\Controllers\Admin\AdminLoginController@resetPassword')->name('wave.user.admin-panel.show-reset-password');
	Route::post('reset-password', '\Wave\Http\Controllers\Admin\ResetPasswordController@reset')->name('wave.user.admin-panel.reset-password');
});

// * For the admin authenticated users
Route::group(['middleware' => 'cms'], function () {
	Route::get('admin-main/logout', '\Wave\Http\Controllers\Admin\CustomController@logout')->name('wave.admin.logout');

	Route::group(['middleware' => 'check.permission:dashboard'], function () {
		Route::get('admin-main/dashboard', '\Wave\Http\Controllers\Admin\AdminMainController@dashboard')->name('wave.user.admin-main.dashboard');
	});

	Route::group(['middleware' => 'check.permission:time_table'], function () {
		Route::get('admin-main/timetable', '\Wave\Http\Controllers\Admin\AdminMainController@timetable')->name('wave.user.admin-main.timetable');
	});

	Route::group(['middleware' => 'check.permission:student'], function () {
		Route::get('admin-main/student', '\Wave\Http\Controllers\Admin\AdminMainController@student')->name('wave.user.admin-main.student');
		Route::get('admin-main/student/{id}/show', '\Wave\Http\Controllers\Admin\AdminMainController@studentView')->name('wave.user.admin-main.student-view');
	});

	Route::group(['middleware' => 'check.permission:course'], function () {
		Route::get('admin-main/course', '\Wave\Http\Controllers\Admin\AdminMainController@course')->name('wave.user.admin-main.course');
		Route::get('admin-main/view-course', '\Wave\Http\Controllers\Admin\AdminMainController@viewCourse')->name('wave.user.admin-main.view-course');
	});

	Route::group(['middleware' => 'check.permission:level'], function () {
		Route::get('admin-main/level', '\Wave\Http\Controllers\Admin\AdminMainController@level')->name('wave.user.admin-main.level');
	});

	Route::group(['middleware' => 'check.permission:venue'], function () {
		Route::get('admin-main/venue', '\Wave\Http\Controllers\Admin\AdminMainController@venue')->name('wave.user.admin-main.venue');
	});

	Route::group(['middleware' => 'check.permission:classes'], function () {
		Route::get('admin-main/classes', '\Wave\Http\Controllers\Admin\AdminMainController@courseClass')->name('wave.user.admin-main.classes');
		Route::get('admin-main/class-view/{class}', '\Wave\Http\Controllers\Admin\AdminMainController@courseClassView')->name('wave.user.admin-main.classes-view');
	});

	Route::group(['middleware' => 'check.permission:qr_scanner'], function () {
		Route::get('admin-main/general-qr-view/{venue}', '\Wave\Http\Controllers\Admin\AdminMainController@generalQrView')->name('wave.user.admin-main.general-qr-view');
		Route::get('admin-main/qr-view/{class}', '\Wave\Http\Controllers\Admin\AdminMainController@qrView')->name('wave.user.admin-main.qr-view');
		Route::get('admin-main/qr-scanner', '\Wave\Http\Controllers\Admin\AdminMainController@qrScanner')->name('wave.user.admin-main.qr-scanner');
	});

	Route::group(['middleware' => 'check.permission:competition'], function () {
		Route::get('admin-main/competition', '\Wave\Http\Controllers\Admin\AdminMainController@competition')->name('wave.user.admin-main.competition');
		Route::get('admin-main/competition-view/{competition}', '\Wave\Http\Controllers\Admin\AdminMainController@competitionView')->name('wave.user.admin-main.competition-view');
		Route::get('admin-main/competition-view/{competition}/view-category/{compCategory}', '\Wave\Http\Controllers\Admin\AdminMainController@competitionViewCategory')->name('wave.user.admin-main.competition-category-view');
		Route::get('admin-main/competition-view/{competition}/view-category/{compCategory}/results', '\Wave\Http\Controllers\Admin\AdminMainController@competitionViewCategoryResults')->name('wave.user.admin-main.competition-category-view-results');
	});

	Route::group(['middleware' => 'check.permission:coach'], function () {
		Route::get('admin-main/coach', '\Wave\Http\Controllers\Admin\AdminMainController@coach')->name('wave.user.admin-main.coach');
		Route::get('admin-main/coach/{id}/show', '\Wave\Http\Controllers\Admin\AdminMainController@coachView')->name('wave.user.admin-main.coach-view');
		Route::get('admin-main/coach-history', '\Wave\Http\Controllers\Admin\AdminMainController@coachHistory')->name('wave.user.admin-main.coach-history');
		Route::get('admin-main/coach-comment', '\Wave\Http\Controllers\Admin\AdminMainController@coachComment')->name('wave.user.admin-main.coach-comment');
		Route::get('admin-main/coach-teaching-history', '\Wave\Http\Controllers\Admin\AdminMainController@coachTeachingHistory')->name('wave.user.admin-main.coach-teaching-history');
	});

	Route::group(['middleware' => 'check.permission:products'], function () {
		Route::get('admin-main/products/{tab?}/{page?}/{search?}', '\Wave\Http\Controllers\Admin\AdminMainController@products')->name('wave.user.admin-main.products');
		Route::get('admin-main/productCategory/{tab?}/{page?}/{search?}', '\Wave\Http\Controllers\Admin\AdminMainController@productCategory')->name('wave.user.admin-main.productCategory');
	});

	Route::group(['middleware' => 'check.permission:orders'], function () {
		Route::get('admin-main/orders', '\Wave\Http\Controllers\Admin\AdminMainController@orders')->name('wave.user.admin-main.orders');
		Route::get('admin-main/order-view/{id}', '\Wave\Http\Controllers\Admin\AdminMainController@orderView')->name('wave.user.admin-main.order-view');
		Route::post('admin-main/download-pdf', '\Wave\Http\Controllers\Admin\AdminMainController@downloadOrderPDF')->name('wave.user.admin-main.download-pdf');
	});

	Route::group(['middleware' => 'check.permission:customers'], function () {
		Route::get('admin-main/customers', '\Wave\Http\Controllers\Admin\AdminMainController@customers')->name('wave.user.admin-main.customers');
	});

	Route::group(['middleware' => 'check.permission:request'], function () {
		Route::get('admin-main/request', '\Wave\Http\Controllers\Admin\AdminMainController@request')->name('wave.user.admin-main.request');
	});

	Route::group(['middleware' => 'check.permission:invoices'], function () {
		Route::get('admin-main/invoices', '\Wave\Http\Controllers\Admin\AdminMainController@invoices')->name('wave.user.admin-main.invoices');
	});

	Route::group(['middleware' => 'check.permission:accounting'], function () {
		Route::get('admin-main/accounting', '\Wave\Http\Controllers\Admin\AdminMainController@accounting')->name('wave.user.admin-main.accounting');
	});

	Route::group(['middleware' => 'check.permission:payroll'], function () {
		Route::get('admin-main/payroll', '\Wave\Http\Controllers\Admin\AdminMainController@payroll')->name('wave.user.admin-main.payroll');
		Route::get('admin-main/payroll-details', '\Wave\Http\Controllers\Admin\AdminMainController@payrollDetails')->name('wave.user.admin-main.payroll-details');
	});

	Route::group(['middleware' => 'check.permission:consolidate'], function () {
		Route::get('admin-main/consolidate', '\Wave\Http\Controllers\Admin\AdminMainController@consolidate')->name('wave.user.admin-main.consolidate');
		Route::get('admin-main/consolidate-view/{id}', '\Wave\Http\Controllers\Admin\AdminMainController@consolidateView')->name('wave.user.admin-main.consolidate-view');
	});

	Route::group(['middleware' => 'check.permission:receipt'], function () {
		Route::get('admin-main/receipt', '\Wave\Http\Controllers\Admin\AdminMainController@receipt')->name('wave.user.admin-main.receipt');
		Route::get('admin-main/receipt-view/{id}', '\Wave\Http\Controllers\Admin\AdminMainController@receiptView')->name('wave.user.admin-main.receipt-view');
	});

	Route::group(['middleware' => 'check.permission:report'], function () {
		Route::get('admin-main/general-report', '\Wave\Http\Controllers\Admin\AdminMainController@generalReport')->name('wave.user.admin-main.general-report');
		Route::get('admin-main/invoice-report', '\Wave\Http\Controllers\Admin\AdminMainController@invoiceReport')->name('wave.user.admin-main.invoice-report');
	});

	Route::group(['middleware' => 'check.permission:web_app'], function () {
		Route::get('admin-main/web-app', '\Wave\Http\Controllers\Admin\AdminMainController@webApp')->name('wave.user.admin-main.setting-web-app');
		Route::get('admin-main/content-webapp', '\Wave\Http\Controllers\Admin\AdminMainController@contentWebapp')->name('wave.user.admin-main.content-webapp');
	});

	Route::group(['middleware' => 'check.permission:place_video'], function () {
		Route::get('admin-main/content-placevideo', '\Wave\Http\Controllers\Admin\AdminMainController@contentPlacevideo')->name('wave.user.admin-main.content-placevideo');
	});

	Route::group(['middleware' => 'check.permission:share_video'], function () {
		Route::get('admin-main/content-sharevideo', '\Wave\Http\Controllers\Admin\AdminMainController@contentSharevideo')->name('wave.user.admin-main.content-sharevideo');
	});

	Route::group(['middleware' => 'check.permission:notification_category'], function () {
		Route::get('admin-main/notification-template', '\Wave\Http\Controllers\Admin\AdminMainController@notificationTemplate')->name('wave.user.admin-main.notification.template');
	});

	Route::group(['middleware' => 'check.permission:notification_announcement'], function () {
		Route::get('admin-main/notification-announcement', '\Wave\Http\Controllers\Admin\AdminMainController@notificationAnnouncement')->name('wave.user.admin-main.notification.announcement');
	});

	Route::group(['middleware' => 'check.permission:role'], function () {
		Route::get('admin-main/setting-role', '\Wave\Http\Controllers\Admin\AdminMainController@settingRole')->name('wave.user.admin-main.setting-role');
		Route::get('admin-main/setting-addrole/{id?}', '\Wave\Http\Controllers\Admin\AdminMainController@settingAddrole')->name('wave.user.admin-main.setting-addrole');
	});

	Route::group(['middleware' => 'check.permission:staff'], function () {
		Route::get('admin-main/setting-staff', '\Wave\Http\Controllers\Admin\AdminMainController@settingStaff')->name('wave.user.admin-main.setting-staff');
		Route::get('admin-main/setting-addstaff', '\Wave\Http\Controllers\Admin\AdminMainController@settingAddstaff')->name('wave.user.admin-main.setting-addstaff');
		Route::get('admin-main/setting-updatestaff/{id}', '\Wave\Http\Controllers\Admin\AdminMainController@settingUpdatestaff')->name('wave.user.admin-main.setting-updatestaff');
	});

	Route::group(['middleware' => 'check.permission:school'], function () {
		Route::get('admin-main/setting', '\Wave\Http\Controllers\Admin\AdminMainController@setting')->name('wave.user.admin-main.setting');
	});

	Route::group(['middleware' => 'check.permission:closure'], function () {
		Route::get('admin-main/setting-closure', '\Wave\Http\Controllers\Admin\AdminMainController@settingClosure')->name('wave.user.admin-main.setting-closure');
		Route::get('admin-main/setting-closure-category', '\Wave\Http\Controllers\Admin\AdminMainController@settingClosureCategory')->name('wave.user.admin-main.setting-closure-category');
	});

	Route::group(['middleware' => 'check.permission:bank_list'], function () {
		Route::get('admin-main/setting-banklist', '\Wave\Http\Controllers\Admin\AdminMainController@settingBanklist')->name('wave.user.admin-main.setting-banklist');
	});

	Route::group(['middleware' => 'check.permission:faq'], function () {
		Route::get('admin-main/faq', '\Wave\Http\Controllers\Admin\AdminMainController@faq')->name('wave.user.admin-main.faq');
		Route::get('admin-main/faq-category', '\Wave\Http\Controllers\Admin\AdminMainController@faqCategory')->name('wave.user.admin-main.faq-category');
	});

	Route::get('admin-main/content', '\Wave\Http\Controllers\Admin\AdminMainController@content')->name('wave.user.admin-main.content');
	Route::get('admin-main/setting-logs', '\Wave\Http\Controllers\Admin\AdminMainController@settingLogs')->name('wave.user.admin-main.setting-logs');
	Route::get('admin-main/setting-holiday', '\Wave\Http\Controllers\Admin\AdminMainController@settingHoliday')->name('wave.user.admin-main.setting-holiday');
	Route::get('admin-main/setting-addholiday', '\Wave\Http\Controllers\Admin\AdminMainController@settingAddholiday')->name('wave.user.admin-main.setting-addholiday');
	Route::get('admin-main/accounting-details/{id}/view', '\Wave\Http\Controllers\Admin\AdminMainController@accountingDetails')->name('wave.user.admin-main.accounting-details');
	// Route::get('admin-main/invoice-report', '\Wave\Http\Controllers\Admin\AdminMainController@invoiceReport')->name('wave.user.admin-main.accounting-details');
	Route::get('admin-main/notification-tempclosure', '\Wave\Http\Controllers\Admin\AdminMainController@notificationTempclosure')->name('wave.user.admin-main.notification-tempclosure');

	// Custom API
	Route::post('admin-main/refresh-settings', '\Wave\Http\Controllers\Admin\CustomController@settingsReflection')->name('wave.user.admin.refresh-settings');
	Route::post('admin-main/refresh-token', '\Wave\Http\Controllers\Admin\CustomController@refreshToken')->name('wave.user.admin.refresh-token');
	Route::get('admin-main/download-file', '\Wave\Http\Controllers\Admin\CustomController@downloadFile')->name('wave.user.admin.download-file');
});

// * Customer Login pages
// Route::group(['middleware' => ['guest', 'cms-external'], 'prefix' => 'cms'], function(){
	Route::get('/register', [RegisterController::class,'showRegisterForm'])->name('register');
	Route::post('/register', [AuthLoginController::class, 'authCustomerRegister']);
	Route::get('/verify-otp', [VerificationController::class, 'showOTPVerification'])->name('verify-otp');
	Route::post('/verify-otp', [VerificationController::class, 'verifyOTP']);
	Route::get('/resend-otp', [VerificationController::class, 'showNotification']);
	Route::post('/resend-otp', [VerificationController::class, 'resendCode'])->name('resend-otp');
	Route::get('/auth-login', [LoginController::class, 'showLoginForm'])->name('auth-login');
	Route::post('/auth-login', [AuthLoginController::class, 'authCustomerLogin'])->name('request.auth-login');
	Route::get('/logout', [AuthLoginController::class, 'logout'])->name('logout');
	Route::post('/auth-login1', [LoginController::class, 'authGuardianLogin'])->name('auth-login1');
	Route::get('/password/reset', [CustomerForgotPasswordController::class, 'showLinkRequestForm'])->name('customer.forgot-password-page');
	Route::post('/forgot-password', [ForgotPasswordController::class, 'sendPasswordResetLink'])->name('customer.forgot-password');
	Route::get('/password-reset/{token}', [ResetPasswordController::class, 'showResetPassword'])->name('reset_password');
	Route::post('/password-reset/{token}', [ResetPasswordController::class, 'resetPasswordEmail']);
// });

Route::post('/fetch-pdf', 'Wave\Http\Controllers\StudentController@fetchPdf')->name('wave.fetch-pdf');

// * For the customer authenticated users
// --------------------------------------------------------------------------------
Route::group(['middleware' => 'cms-customer'], function () {
	// Shopping Routes
	Route::get('/shopping', 'Wave\Http\Controllers\ShoppingController@index')->name('wave.shopping');
	Route::post('/searchFilter', 'Wave\Http\Controllers\ShoppingController@searchResult')->name('search-items');
	// Route::get('/result', 'Wave\Http\Controllers\ShoppingController@showSearchResult')->name('wave.result');
	Route::get('/item/{id}', 'Wave\Http\Controllers\ShoppingController@showItem')->name('wave.item');
	Route::get('/cart-details', 'Wave\Http\Controllers\ShoppingController@showCart')->name('wave.cart-details');
	Route::post('/cart-details', 'Wave\Http\Controllers\ShoppingController@addToCart')->name('add-cart');
	Route::post('/cart-details/remove', 'Wave\Http\Controllers\ShoppingController@removeFromCart')->name('remove-cart');
	// Route::post('/cart-details', function (Request $request) {
	// 	$data = $request->all();
	// 	return response()->json($data);
	// });
	Route::get('/my-order', 'Wave\Http\Controllers\ShoppingController@showMyOrder')->name('wave.my-order');
	Route::get('/order1', 'Wave\Http\Controllers\ShoppingController@showOrder1')->name('wave.order1');
	Route::get('/order2', 'Wave\Http\Controllers\ShoppingController@showOrder2')->name('wave.order2');
	Route::get('/buy-ticket1', 'Wave\Http\Controllers\ShoppingController@showBuyTicketProcess1')->name('wave.ticket1');
	Route::post('/buy-ticket1', function (Request $request) {
		$data = $request->all();
		return response()->json($data);
	});
	Route::get('/buy-ticket2', 'Wave\Http\Controllers\ShoppingController@showBuyTicketProcess2')->name('wave.ticket2');
	Route::post('/buy-ticket2', function (Request $request) {
		$data = $request->all();
		return response()->json($data);
	});
	Route::get('/buy-ticket3', 'Wave\Http\Controllers\ShoppingController@showBuyTicketProcess3')->name('wave.ticket3');
	Route::post('/buy-ticket3', function (Request $request) {
		$data = $request->all();
		return response()->json($data);
	});
	Route::get('/preview-invoice2', 'Wave\Http\Controllers\ShoppingController@showInvoice')->name('wave.invoice2');
	Route::get('/online-payment', 'Wave\Http\Controllers\ShoppingController@showOnlinePayment')->name('wave.online-payment');

	Route::post('/online-payment', function (Request $request) {
		$data = $request->all();
		return response()->json($data);
	});

	// Account Routes
	Route::get('/account', 'Wave\Http\Controllers\AccountController@showAccount')->name('wave.account');
	Route::get('/personal-information/{id}', 'Wave\Http\Controllers\AccountController@showPersonalInformation')->name('wave.personal-information');
	Route::post('/edit-profile-image', 'Wave\Http\Controllers\AccountController@storeImgProfile')->name('wave.image');
	Route::get('/edit-personal-information', 'Wave\Http\Controllers\AccountController@showEditPersonalInformation')->name('wave.edit-personal-information');
	Route::post('/edit-personal-information', 'Wave\Http\Controllers\AccountController@editPersonalInformation');
	Route::get('/add-guardian-account', 'Wave\Http\Controllers\AccountController@showAddGuardianAcc')->name('wave.add-guardian');
	Route::post('/add-guardian-account', 'Wave\Http\Controllers\AccountController@addGuardianAcc');
	Route::get('/change-password', 'Wave\Http\Controllers\AccountController@showChangePassword')->name('wave.change-password');
	Route::post('/change-password', 'Wave\Http\Controllers\AccountController@changePassword');
	Route::get('/payment-method', 'Wave\Http\Controllers\AccountController@showPaymentMethod')->name('wave.payment-method');
	Route::post('/payment-method', function (Request $request) {
		$data = $request->all();
		return response()->json($data);
	});
	Route::get('/FAQ', 'Wave\Http\Controllers\AccountController@showFAQ')->name('wave.faq');
	Route::get('/registration-FAQ/{id}', 'Wave\Http\Controllers\AccountController@showSingleRegistrationFAQ')->name('wave.registration-faq');
	Route::get('/privacy-policy', 'Wave\Http\Controllers\AccountController@showPrivacyPolicy')->name('wave.privacy-policy');

	// Tutorial Routes
	Route::get('/tutorial-list', 'Wave\Http\Controllers\TutorialController@showTutorial')->name('wave.tutorial');
	Route::get('/video', 'Wave\Http\Controllers\TutorialController@showVideo')->name('wave.video');

	// Student Routes
	Route::get('/student', 'Wave\Http\Controllers\StudentController@showStudent')->name('wave.student');
	Route::get('/student1/{id}/view', 'Wave\Http\Controllers\StudentController@showStudent1')->name('wave.student1');
	Route::post('/student1/{id}/swap-photo', 'Wave\Http\Controllers\StudentController@storeImgStudentProfile')->name('wave.student-swap-photo');
	Route::get('/my-level/{id}', 'Wave\Http\Controllers\StudentController@showLevel')->name('wave.my-level');
	Route::get('/ripple/{id}/{enrollmentID}', 'Wave\Http\Controllers\StudentController@showRipple')->name('wave.ripple');
	Route::get('/my-schedule/{studentID}', 'Wave\Http\Controllers\StudentController@showSchedule')->name('wave.my-schedule');
	Route::get('/my-past-schedule/{studentID}', 'Wave\Http\Controllers\StudentController@showPastSchedule')->name('wave.my-past-schedule');
	Route::get('/leave/makeup/{id}', 'Wave\Http\Controllers\StudentController@showLeaveOrMakeUp')->name('wave.leaveOrmakeup');
	Route::get('/apply-leave/{studentID}', 'Wave\Http\Controllers\StudentController@showApplyLeave')->name('wave.apply-leave');
	Route::get('/apply-makeup/{id}', 'Wave\Http\Controllers\StudentController@showApplyMakeUp')->name('wave.apply-makeup');
	Route::post('/apply-makeup', function (Request $request) {
		$data = $request->all();
		return response()->json($data);
	});
	Route::get('/leave-record/{id}/view', 'Wave\Http\Controllers\StudentController@showLeaveRecord')->name('wave.leave-record');
	Route::get('/leave-record/{id}/sick-leave/{leaveID}/view', 'Wave\Http\Controllers\StudentController@showSickLeave')->name('wave.sick-leave');
	Route::get('/medical-cert/{id}/view/{leaveID}', 'Wave\Http\Controllers\StudentController@showMedicalCert')->name('wave.medical-cert');
	Route::get('/make-up/request/{id}', 'Wave\Http\Controllers\StudentController@showMakeUpRequest')->name('wave.make-up.request');
	Route::get('/make-up/request/{id}/casual-leave/{makeUpClassID}', 'Wave\Http\Controllers\StudentController@showMakeUpCasualLeave')->name('wave.casual-leave');
	Route::get('/make-up/request/{id}/sick-leave/{makeUpClassID}', 'Wave\Http\Controllers\StudentController@showMakeUpSickLeave')->name('wave.sick-leave1');
	Route::get('/make-up/request/others', 'Wave\Http\Controllers\StudentController@showMakeUpOthers')->name('wave.others');
	Route::get('/payment-record', 'Wave\Http\Controllers\StudentController@showPaymentRecord')->name('wave.payment-record');
	Route::get('/reservation', 'Wave\Http\Controllers\StudentController@showReservation')->name('wave.reservation');
	Route::get('/reservation1/{courseEnrollmentID}/view', 'Wave\Http\Controllers\StudentController@showReservation1')->name('wave.reservation1');
	Route::post('/reservation1', function (Request $request) {
		$data = $request->all();
		return response()->json($data);
	})->name('wave.reservation1.post');
	Route::get('/preview-invoice1', 'Wave\Http\Controllers\StudentController@showInvoice')->name('wave.invoice1');
	
	Route::get('/online-payment1', 'Wave\Http\Controllers\StudentController@showOnlinePayment')->name('wave.online-payment1');
	Route::post('/online-payment1', function (Request $request) {
		$data = $request->all();
		return response()->json($data);
	});
	Route::get('/upload-receipt/{enrollmentID}', 'Wave\Http\Controllers\StudentController@showUploadReceipt')->name('wave.upload-receipt');
	Route::post('/upload-receipt', function (Request $request) {
		$data = $request->all();
		return response()->json($data);
	});
	Route::get('/payment-history', 'Wave\Http\Controllers\StudentController@showPaymentHistory')->name('wave.payment-history');
	Route::get('/payment-history1/{id}', 'Wave\Http\Controllers\StudentController@showPaymentHistory1')->name('wave.payment-history1');
	Route::get('/payment-history2/{id}', 'Wave\Http\Controllers\StudentController@showPaymentHistory2')->name('wave.payment-history2');
	
	//new student Routes
	Route::get('/addnewstudent', '\Wave\Http\Controllers\NewStudentController@addNewStudent')->name('wave.addnewstudent');
	Route::post('/addnewstudent', '\Wave\Http\Controllers\NewStudentController@addNewStudent1');
	Route::get('/newstudent', '\Wave\Http\Controllers\NewStudentController@NewStudent')->name('wave.newstudent');
	Route::post('/newstudent', '\Wave\Http\Controllers\NewStudentController@addNewStudent2');
	Route::get('/newstudent2', '\Wave\Http\Controllers\NewStudentController@NewStudent2')->name('wave.newstudent2');
	Route::post('/newstudent2', '\Wave\Http\Controllers\NewStudentController@addNewStudent3');
	Route::get('/newstudent3', '\Wave\Http\Controllers\NewStudentController@NewStudent3')->name('wave.newstudent3');
	Route::post('/newstudent3', '\Wave\Http\Controllers\NewStudentController@addNewStudent4');
	Route::get('/newstudent4', '\Wave\Http\Controllers\NewStudentController@NewStudent4')->name('wave.newstudent4');
	Route::post('/newstudent4', '\Wave\Http\Controllers\NewStudentController@addNewStudent5');
	Route::get('/newstudent5', '\Wave\Http\Controllers\NewStudentController@NewStudent5')->name('wave.newstudent5');
	Route::get('@{username}', '\Wave\Http\Controllers\ProfileController@index')->name('wave.profile');
	// Documentation routes
	Route::view('docs/{page?}', 'docs::index')->where('page', '(.*)');
	// Additional Auth Routes
	Route::get('logout', '\Wave\Http\Controllers\Auth\LoginController@logout')->name('wave.logout');
	Route::get('user/verify/{verification_code}', '\Wave\Http\Controllers\Auth\RegisterController@verify')->name('verify');
	Route::post('register/complete', '\Wave\Http\Controllers\Auth\RegisterController@complete')->name('wave.register-complete');
	Route::get('blog', '\Wave\Http\Controllers\BlogController@index')->name('wave.blog');
	Route::get('blog/{category}', '\Wave\Http\Controllers\BlogController@category')->name('wave.blog.category');
	Route::get('blog/{category}/{post}', '\Wave\Http\Controllers\BlogController@post')->name('wave.blog.post');
	Route::view('install', 'wave::install')->name('wave.install');
	/***** Pages *****/
	Route::get('p/{page}', '\Wave\Http\Controllers\PageController@page');
	/***** Pricing Page *****/
	Route::view('pricing', 'theme::pricing')->name('wave.pricing');
	/***** Billing Routes *****/
	Route::post('paddle/webhook', '\Wave\Http\Controllers\WebhookController');
	Route::post('checkout', '\Wave\Http\Controllers\SubscriptionController@checkout')->name('checkout');

	Route::get('test', '\Wave\Http\Controllers\SubscriptionController@test');

	Route::group(['middleware' => 'wave'], function () {
		Route::get('dashboard', '\Wave\Http\Controllers\DashboardController@index')->name('wave.dashboard');
	});
	//homepages
	Route::get('/', '\Wave\Http\Controllers\HomeController@index')->name('wave.home');
	Route::get('/news/{id}','\Wave\Http\Controllers\HomeController@showDetails')->name('wave.new');
	Route::get('/normalnews','\Wave\Http\Controllers\HomeController@showNews')->name('wave.notificationss');
	Route::get('/urgentsnews','\Wave\Http\Controllers\HomeController@showUrgentNews')->name('wave.urgentsnews');
	Route::get('/urgentsnews/details/{id}','\Wave\Http\Controllers\HomeController@urgentNewsDetails')->name('wave.urgentNewsDetails');
	Route::get('/myschedules','\Wave\Http\Controllers\HomeController@myschedule')->name('wave.myschedules');
	Route::get('/pastschedules','\Wave\Http\Controllers\HomeController@pastschedule')->name('wave.pastschedules');
	Route::get('/newslists','\Wave\Http\Controllers\HomeController@newslist')->name('wave.newslists');
	Route::get('/lists/{id}','\Wave\Http\Controllers\HomeController@showList')->name('wave.lists');
	Route::get('/levels','\Wave\Http\Controllers\HomeController@level')->name('wave.levels');
	Route::get('/levellists/{id}','\Wave\Http\Controllers\HomeController@showLevelList')->name('wave.levellists');

	//enrollment 
	Route::get('/enrollment','\Wave\Http\Controllers\EnrollmentController@enrollment')->name('wave.enrollment');
	Route::get('/fulltermenrollstudent','\Wave\Http\Controllers\EnrollmentController@selectStudentFullTerm')->name('wave.fulltermenrollment');
	Route::get('/fulltermenrolllevel','\Wave\Http\Controllers\EnrollmentController@selectLevelFullTerm')->name('wave.fulltermenrollment1');
	Route::get('/fulltermenrollvenue','\Wave\Http\Controllers\EnrollmentController@selectVenueFullTerm')->name('wave.fulltermenrollment2');
	Route::get('/fulltermenrollschedule','\Wave\Http\Controllers\EnrollmentController@selectScheduleFullTerm')->name('wave.fulltermenrollment3');
	Route::get('/fulltermenrollreview','\Wave\Http\Controllers\EnrollmentController@displayReviewFullTerm')->name('wave.fulltermenrollment4');
	Route::get('/flexiblecoursestudent','\Wave\Http\Controllers\EnrollmentController@selectStudentFlexible')->name('wave.flexiblecourse');
	Route::get('/flexiblecourselevel','\Wave\Http\Controllers\EnrollmentController@selectLevelFlexible')->name('wave.flexiblecourse1');
	Route::get('/flexiblecoursevenue','\Wave\Http\Controllers\EnrollmentController@selectVenueFlexible')->name('wave.flexiblecourse2');
	Route::get('/flexiblecourseschedule','\Wave\Http\Controllers\EnrollmentController@selectScheduleFlexible')->name('wave.flexiblecourse3');
	Route::get('/flexiblecoursereview','\Wave\Http\Controllers\EnrollmentController@displayReviewFlexible')->name('wave.flexiblecourse4');
	Route::get('/privatecoursestudent','\Wave\Http\Controllers\EnrollmentController@selectStudentPrivate')->name('wave.privatecourse');
	Route::get('/privatecourseclasstype','\Wave\Http\Controllers\EnrollmentController@selectClassTypePrivate')->name('wave.privatecourse1');
	Route::get('/privatecourselevel','\Wave\Http\Controllers\EnrollmentController@selectLevelPrivate')->name('wave.privatecourse2');
	Route::get('/privatecoursevenue','\Wave\Http\Controllers\EnrollmentController@selectVenuePrivate')->name('wave.privatecourse3');
	Route::get('/privatecourseschedule','\Wave\Http\Controllers\EnrollmentController@selectSchedulePrivate')->name('wave.privatecourse4');
	Route::get('/privatecoursereview','\Wave\Http\Controllers\EnrollmentController@displayReviewPrivate')->name('wave.privatecourse5');
	Route::get('/customer/enrollmentHistory','\Wave\Http\Controllers\EnrollmentController@enrollmentHistory')->name('wave.history');
	Route::get('/history-waiting','\Wave\Http\Controllers\EnrollmentController@HistoryWaiting')->name('wave.history-waiting');
	Route::get('/history-reserved','\Wave\Http\Controllers\EnrollmentController@HistoryReserved')->name('wave.history-reserved');
	Route::get('/history/detail/{id}','\Wave\Http\Controllers\EnrollmentController@HistoryDetails')->name('wave.history-details');
	Route::get('/changecourse/studentInfo','\Wave\Http\Controllers\EnrollmentController@selectStudentChangeCourse')->name('wave.changecourse');
	Route::get('/changecourse/reason/{student_id}','\Wave\Http\Controllers\EnrollmentController@changeCourse')->name('wave.changecourse1');
	// Route::get('/changecourse/reason/{student_id}','\Wave\Http\Controllers\EnrollmentController@getChangeCourse')->name('wave.changecourse1');
	Route::get('/cancelcourse/studentInfo','\Wave\Http\Controllers\EnrollmentController@selectStudentCancelCourse')->name('wave.cancelcourse');
	Route::get('/cancelcourse/reason','\Wave\Http\Controllers\EnrollmentController@CancelCourse1')->name('wave.cancelcourse1');

	Route::post('/changecourse','\Wave\Http\Controllers\EnrollmentController@postChangeCourse');

    //enrollment relay
	Route::get('/competitionenrollment','\Wave\Http\Controllers\EnrollmentController@CompetitionEnrollment')->name('wave.competitionenrollment');
	Route::post('/competitionenrollment','\Wave\Http\Controllers\EnrollmentController@CompetitionEnrollment')->name('wave.competitionenrollment');
	Route::get('/competitionenrollment1/{studentID}','\Wave\Http\Controllers\EnrollmentController@CompetitionEnrollment1')->name('wave.competitionenrollment1');
	Route::get('/competitionenrollment2','\Wave\Http\Controllers\EnrollmentController@CompetitionEnrollment2')->name('wave.competitionenrollment2');
	Route::get('/competitionenrollment3','\Wave\Http\Controllers\EnrollmentController@CompetitionEnrollment3')->name('wave.competitionenrollment3');
	// Route::post('/competitionenrollment3/{id}','\Wave\Http\Controllers\EnrollmentController@enrollCompetition')->name('enroll');
	Route::get('/competition-details/{id}','\Wave\Http\Controllers\EnrollmentController@CompetitionDetails')->name('wave.competition.details');
	Route::get('/competitionpreview','\Wave\Http\Controllers\EnrollmentController@CompetitionPreview')->name('wave.competitionpreview');
	Route::get('/competitionpayment/{id}','\Wave\Http\Controllers\EnrollmentController@CompetitionPayment')->name('wave.competitionpayment');

	Route::get('/cancelcompetition','\Wave\Http\Controllers\EnrollmentController@CancelCompetition')->name('wave.cancelcompetition');
	Route::get('/cancelcompetition2/{studentID}','\Wave\Http\Controllers\EnrollmentController@CancelCompetition2')->name('wave.cancelcompetition2');
	// Route::post('/cancelcompetition2','\Wave\Http\Controllers\EnrollmentController@CancelCompetitions')->name('wave.cancelCompetitions');
    Route::get('/competitioninvitation','\Wave\Http\Controllers\EnrollmentController@CompetitionInvitation')->name('wave.competitioninvitation');
	// Route::post('/cancelcompetition2','\Wave\Http\Controllers\EnrollmentController@CancelCompetition2')->name('wave.cancelcompetition2');
    // Route::post('/competitionpayment','\Wave\Http\Controllers\EnrollmentController@CompetitionPayment')->name('wave.competitionpayment');
	Route::get('/competition/history','\Wave\Http\Controllers\EnrollmentController@CompetitionEnrollmentHistory')->name('wave.competitionHistory');
	// Route::post('/cancel-competition','\Wave\Http\Controllers\EnrollmentController@cancelCompetitions')->name('wave.cancelCompetitions');
	//notification
	Route::get('/notification','\Wave\Http\Controllers\NotificationController@CusNotification')->name('wave.notification');
	Route::get('/notification2/{id}','\Wave\Http\Controllers\NotificationController@Notification2')->name('wave.notification2');
	Route::get('/attendancenotification','\Wave\Http\Controllers\NotificationController@AttendanceNotification')->name('wave.attendancenotification');
	Route::get('/attendancenotification2/{id}','\Wave\Http\Controllers\NotificationController@AttendanceNotification2')->name('wave.attendancenotification2');
	Route::get('/videoshare','\Wave\Http\Controllers\NotificationController@VideoShare')->name('wave.videoshare');
	Route::get('/videosharenotification','\Wave\Http\Controllers\NotificationController@VideoShareNotification')->name('wave.videosharenotification');
	Route::get('/swapcoachnotification','\Wave\Http\Controllers\NotificationController@SwapCoachNotification')->name('wave.swapcoachnotification');
	//new student register
	Route::get('/newstudent','\Wave\Http\Controllers\NewStudentController@NewStudent')->name('wave.newstudent');
	Route::get('/newstudent2','\Wave\Http\Controllers\NewStudentController@NewStudent2')->name('wave.newstudent2');
	Route::get('/newstudent3','\Wave\Http\Controllers\NewStudentController@NewStudent3')->name('wave.newstudent3');
	Route::get('/newstudent4','\Wave\Http\Controllers\NewStudentController@NewStudent4')->name('wave.newstudent4');
	Route::get('/newstudent5','\Wave\Http\Controllers\NewStudentController@NewStudent5')->name('wave.newstudent5');
	Route::get('/newstudent6','\Wave\Http\Controllers\NewStudentController@NewStudent6')->name('wave.newstudent6');
	Route::post('/cancelcourse/reason', [EnrollmentController::class, 'CancelCourseReason']);
	Route::post('/flexiblecourse4',[EnrollmentController::class, 'flexibleCourse']);
	Route::post('/changecourse/storeStudentInfo', [EnrollmentController::class, 'storeChangeCourseStudentInfo'])->name('wave.storeChangeCourseStudentInfo');
	Route::post('/changecourse/reason', [EnrollmentController::class, 'changeCourse']);
	Route::post('/cancelcourse/storeStudentInfo', [EnrollmentController::class, 'storeCancelCourseStudentInfo'])->name('wave.storeCancelCourseStudentInfo');
	//Full Term Enrollment course session route
	
	Route::post('/level/enroll', [EnrollmentController::class, 'storeDataLevelLists'])->name('wave.storeDataLevelLists');
	Route::post('/fulltermenrollment/storeStudentInfo', [EnrollmentController::class, 'storeFullTermStudentInfo'])->name('wave.storeFullTermStudentInfo');
	Route::post('/fulltermenrollment/storeLevel', [EnrollmentController::class, 'storeFullTermEnrollLevel'])->name('wave.storeFullTermEnrollLevel');
	Route::post('/fulltermenrollment/storeVenue', [EnrollmentController::class, 'storeFullTermEnrollVenue'])->name('wave.storeFullTermEnrollVenue');
	Route::post('/fulltermenrollment/storeSchedule', [EnrollmentController::class, 'storeFullTermEnrollSchedule'])->name('wave.storeFullTermEnrollSchedule');
	Route::post('/fulltermenrollreview', [EnrollmentController::class, 'displayReviewFullTerm']);
	Route::post('/flexibleenrollreview', [EnrollmentController::class, 'displayReviewFlexible']);
	Route::post('/privateenrollreview', [EnrollmentController::class, 'displayReviewPrivate']);
	//flexible course session route
	Route::post('/flexibleenrollment/storeStudentInfo', [EnrollmentController::class, 'storeFlexibleStudentInfo'])->name('wave.storeFlexibleStudentInfo');
	Route::post('/flexibleenrollment/storeLevel', [EnrollmentController::class, 'storeFlexibleCourseLevel'])->name('wave.storeFlexibleCourseLevel');
	Route::post('/flexibleenrollment/storeVenue', [EnrollmentController::class, 'storeFlexibleCourseVenue'])->name('wave.storeFlexibleCourseVenue');
    Route::post('/flexibleenrollment/storeSchedule', [EnrollmentController::class, 'storeFlexibleCourseSchedule'])->name('wave.storeFlexibleCourseSchedule');
	//private course session route
	Route::post('/privateenrollment/storeStudentInfo', [EnrollmentController::class, 'storePrivateStudentInfo'])->name('wave.storePrivateStudentInfo');
	Route::post('/privateenrollment/storeClassType', [EnrollmentController::class, 'storePrivateCourseClassType'])->name('wave.storePrivateCourseClassType');
	Route::post('/privateenrollment/storeLevel', [EnrollmentController::class, 'storePrivateCourseLevel'])->name('wave.storePrivateCourseLevel');
	Route::post('/privateenrollment/storeVenue', [EnrollmentController::class, 'storePrivateCourseVenue'])->name('wave.storePrivateCourseVenue');
    Route::post('/privateenrollment/storeSchedule', [EnrollmentController::class, 'storePrivateCourseSchedule'])->name('wave.storePrivateCourseSchedule');

	// * Coach side
	// choach home
	Route::get('/loginwithoutclass', '\Wave\Http\Controllers\CoachController@index')->name('wave.loginwithoutclass');
	Route::get('/haventlogin', '\Wave\Http\Controllers\CoachController@haventlogin')->name('wave.haventlogin');
	Route::get('/loginupcomingclass', '\Wave\Http\Controllers\CoachController@loginupcomingclass')->name('wave.loginupcomingclass');
	Route::get('/newsdetails', '\Wave\Http\Controllers\CoachController@newsdetails')->name('wave.newsdetails');
	Route::get('/notificationdetails', '\Wave\Http\Controllers\CoachController@notificationdetails')->name('wave.notificationdetails');
	Route::get('/notificationdetails2', '\Wave\Http\Controllers\CoachController@notificationdetails2')->name('wave.notificationdetails2');

	// coach schedules
	Route::get('/schedule', '\Wave\Http\Controllers\CoachController@schedule')->name('wave.schedule');
	Route::get('/pastschedule/{id}','\Wave\Http\Controllers\CoachController@pastschedule')->name('wave.pastschedule');
	Route::get('/upcomingschedule/{id}','\Wave\Http\Controllers\CoachController@upcomingschedule')->name('wave.upcomingschedule');
	Route::get('/comment','\Wave\Http\Controllers\CoachController@comment')->name('wave.comment');
	Route::get('/pastcomment/{studentID}','\Wave\Http\Controllers\CoachController@pastcomment')->name('wave.pastcomment');
	Route::get('/draftcomment/{studentID}','\Wave\Http\Controllers\CoachController@draftComment')->name('wave.draftcomment');
	Route::post('/comment', function (Request $request) {
		return redirect('/pastcomment');
	});
	Route::get('/coach/attendance/{id}', 'Wave\Http\Controllers\CoachController@showCoachAttendance')->name('wave.coach-attendance');
	Route::get('/coach/performance/{studentId}', 'Wave\Http\Controllers\CoachController@showStudentPerformance')->name('wave.student-performance');
	Route::post('/coach/performance', function (Request $request) {
		$data = $request->all();
		return response()->json($data);
	});

	// coach account
	Route::get('/coach/profile', 'Wave\Http\Controllers\CoachController@showProfile')->name('wave.coach-profile');
	Route::get('/coach/personal-information', 'Wave\Http\Controllers\CoachController@showCoachPersonalInfo')->name('wave.coach-personal-information');
	Route::get('/coach/edit-personal-information', 'Wave\Http\Controllers\CoachController@showEditCoachInfo')->name('wave.edit-coach-information');
	Route::post('/coach/edit-personal-information', function (Request $request) {
		$data = $request->all();
		return response()->json($data);
	});
	Route::get('/coach/change-password', 'Wave\Http\Controllers\CoachController@showCoachChangePassword')->name('wave.change-coach-password');
	Route::post('/coach/change-password', function (Request $request) {
		$data = $request->all();
		return response()->json($data);
	});

	//Language Switcher
	Route::get('/change-language/{lang}', [LanguageController::class, 'changeLanguage'])->name('changeLanguage');
	Route::get('/current-language', [LanguageController::class, 'currentLanguage'])->name('currentLanguage');
});



