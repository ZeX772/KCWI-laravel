<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BlitzWiZ Gym</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('themes/tailwind/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/tailwind/css/vars.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('themes/tailwind/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/tailwind/css/global.css') }}">
    <link media="all" type="text/css" rel="stylesheets" href="{{ URL::asset('/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link media="all" type="text/css" rel="stylesheets" href="{{ URL::asset('/assets/css/swiper-icons.css') }}">
    <link media="all" type="text/css" rel="stylesheets" href="{{ URL::asset('/assets/css/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap-file-input.css') }}">
    <link media="all" type="text/css" rel="stylesheets" href="{{ URL::asset('/assets/css/progress-bars-progress.css') }}">
    <link media="all" type="text/css" rel="stylesheets" href="{{ URL::asset('/assets/css/Simple-Slider.css') }}">
    <link media="all" type="text/css" rel="stylesheets" href="{{ URL::asset('/assets/css/untitled.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday@1.8.0/css/pikaday.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="{{ asset('css/I18NSwitch.css')}}">
    <link href="{{ asset('themes/' . $theme->folder . '/css/custom/labels-style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/custom/customer.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .nav-link:hover {
            background-color: #f1f2f9; /* Change this to your desired hover background color */
            color: #000; /* Change this to your desired hover text color */
            left: 0;
        }
        
        .nav-link1 {
            background: var(--appcolortone-secondary-1, #233656);
            border-radius: 8px;
            padding: 0px 18px 0px 18px;
            display: flex;
            flex-direction: row;
            gap: 16px;
            align-items: center;
            justify-content: flex-start;
            flex-shrink: 0;
            width: 252px;
            height: 56px;
            position: relative;
        }

        .nav-link {
            left: 7%;
            border-radius: 8px;
            padding: 0px 18px 0px 18px;
            display: flex;
            flex-direction: row;
            gap: 16px;
            align-items: center;
            justify-content: flex-start;
            flex-shrink: 0;
            width: 252px;
            height: 56px;
            position: relative;
        }

        .navbar {
            background: #FFF;
            padding: 20px;
            position: left;
            min-height: 0px;
            top: 0;
            left: 0;
            right: 0;
            box-shadow: 0px 0px 60px 0px #17143340;
        }

        .active-btn{
            filter: brightness(0)  invert(1);
        }

        #content-wrapper {
            margin-left: 295px; 
            width: calc(100% - 295px) !important;
        }
    </style>
    @yield('style')
    <base href="https://mozilla.github.io">
</head>

@php
$currentRoute = \Illuminate\Support\Facades\Route::current()->getName();
$homePageRoutes = [
    'wave.home', 'wave.notifications', 'wave.urgentsnews', 'wave.myschedules', 'wave.pastschedules', 'wave.newslists', 'wave.lists', 'wave.levels', 'wave.levellists', 'wave.notificationss', 'wave.new', 'wave.urgentNewsDetails'
];

$tutorialRoutes = [
    'wave.tutorial'
];

$studentRoutes = [
    'wave.student', 'wave.student1', 'wave.my-level', 'wave.ripple', 'wave.my-schedule', 'wave.my-past-schedule',
    'wave.leaveOrmakeup', 'wave.apply-leave', 'wave.apply-makeup', 'wave.leave-record',
    'wave.sick-leave', 'wave.medical-cert', 'wave.make-up.request', 'wave.casual-leave',
    'wave.others', 'wave.payment-record', 'wave.reservation', 'wave.reservation1',
    'wave.invoice1', 'wave.online-payment1', 'wave.upload-receipt', 'wave.payment-history',
    'wave.payment-history1', 'wave.payment-history2', 'wave.addnewstudent', 'wave.newstudent',
    'wave.newstudent1', 'wave.newstudent2', 'wave.newstudent3', 'wave.newstudent4', 'wave.newstudent5'
];

$enrollRoutes = [
    'wave.enrollment', 'wave.fulltermenrollment', 'wave.fulltermenrollment1', 'wave.fulltermenrollment2', 'wave.fulltermenrollment3', 'wave.fulltermenrollment4',
    'wave.flexiblecourse', 'wave.flexiblecourse1', 'wave.flexiblecourse2', 'wave.flexiblecourse3', 'wave.flexiblecourse4',
    'wave.privatecourse', 'wave.privatecourse1', 'wave.privatecourse2', 'wave.privatecourse3', 'wave.privatecourse4', 'wave.privatecourse5',
    'wave.history', 'wave.history-details', 'wave.history-reserved', 'wave.history-complete',
    'wave.changecourse', 'wave.changecourse1',
    'wave.cancelcourse', 'wave.cancelcourse1',
    'wave.competitionenrollment', 'wave.competitionenrollment1', 'wave.competitionenrollment2', 'wave.competitionenrollment3',
    'wave.competitionpreview',
    'wave.competitionpayment',
    'wave.cancelcompetition', 'wave.cancelcompetition2',
    'wave.competitioninvitation'
    ,'wave.competitionHistory'
];

$accountRoutes = [
    'wave.account',
    'wave.personal-information',
    'wave.edit-personal-information',
    'wave.add-guardian',
    'wave.change-password',
    'wave.faq',
    'wave.registration-faq',
    'wave.privacy-policy'
];

$shoppingRoutes = [
    'wave.shopping',
    'search-items',
    'wave.item',
    'wave.cart-details',
    'wave.my-order',
    'wave.order1',
    'wave.order2',
    'wave.ticket1',
    'wave.ticket2',
    'wave.ticket3',
    'wave.invoice2',
    'wave.online-payment'
];

$notificationRoutes = [
    'wave.notification',
    'wave.notification2',
    'wave.attendancenotification',
    'wave.attendancenotification2',
    'wave.videoshare',
    'wave.videosharenotification',
    'wave.swapcoachnotification'
];

$authRoutes = [
    'register',
    'verify-otp',
    'resend-otp',
    'auth-login',
    'request.auth-login',
    'auth-login1',
    'forgot-password',
    'reset_password'
];

$scheduleRoutes = [
    'wave.schedule',
    'wave.upcomingschedule',
    'wave.pastschedule',
    'wave.comment',
    'wave.pastcomment',
    'wave.coach-attendance',
    'wave.student-performance'
];

@endphp

<body id="page-top">
    <div id="wrapper" class="" style="min-height: 100vh; background: var(--app-color-tone-bg-color, #F1F2F9);">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: #FFF;padding: 20px !important; width: 295px; float: left; min-height: 100vh; z-index: 1; position: fixed;">
            <input type="hidden" id="selectedLanguage" value="{{ session('locale') }}">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"><img src="{{ asset('themes/tailwind/images/logo1.png') }}" style="width: 150px;height: 150px; margin-top: 30px;" width="191" height="16"></a>
                <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
                    {{-- Homepage --}}
                    <li class="nav-item">
                        <a class="{{ in_array($currentRoute, $homePageRoutes) ? 'active nav-link1' : 'nav-link' }} d-xl-flex align-items-xl-center" href="{{ route('wave.home') }}" style="height: 56px;width: 250px; text-decoration: none;">
                            <img src="{{ asset('themes/tailwind/images/home.png') }}" style="width: 20px;margin-right: 20px;" class="{{ in_array($currentRoute, $homePageRoutes) ? 'active-btn' : '' }}">
                            <span class="fw-normal p16normal3" style="color: {{ in_array($currentRoute, $homePageRoutes) ? '#fff' : 'rgb(145,155,171)' }}">Home</span>
                        </a>
                    </li>
                    @if(session('role') != 'coach')
                        {{-- Tutorials --}}
                        <li class="nav-item">
                            <a class="{{ in_array($currentRoute, $tutorialRoutes) ? 'active nav-link1' : 'nav-link' }} d-xl-flex align-items-xl-center" href="{{ route('wave.tutorial') }}" style="height: 56px;width: 250px; text-decoration: none;">
                                <img src="{{ asset('themes/tailwind/images/tutorial.png') }}" style="width: 20px;margin-right: 20px;" class="{{ in_array($currentRoute, $tutorialRoutes) ? 'active-btn' : '' }}">
                                <span class="fw-normal p16normal3" style="color: {{ in_array($currentRoute, $tutorialRoutes) ? '#fff' : 'rgb(145,155,171)' }}">Tutorial</span>
                            </a>
                        </li>
                        {{-- Enrollment --}}
                        <li class="nav-item">
                            <a class="{{ in_array($currentRoute, $enrollRoutes) ? 'active nav-link1' : 'nav-link' }} d-xl-flex align-items-xl-center" href="{{ route('wave.enrollment') }}" style="height: 56px;width: 250px; text-decoration: none;">
                                <img src="{{ asset('themes/tailwind/images/enrollment.png') }}" style="width: 20px;margin-right: 20px;" class="{{ in_array($currentRoute, $enrollRoutes) ? 'active-btn' : '' }}">
                                <span class="fw-normal p16normal3" style="color: {{ in_array($currentRoute, $enrollRoutes) ? '#fff' : 'rgb(145,155,171)' }}">Enrollment</span>
                            </a>
                        </li>
                        {{-- Account --}}
                        <li class="nav-item">
                            <a class="{{ in_array($currentRoute, $accountRoutes) ? 'active nav-link1' : 'nav-link' }} d-xl-flex align-items-xl-center" href="{{ route('wave.account') }}" style="height: 56px;width: 250px; text-decoration: none;">
                                <img src="{{ asset('themes/tailwind/images/account.png') }}" style="width: 20px;margin-right: 20px;" class="{{ in_array($currentRoute, $accountRoutes) ? 'active-btn' : '' }}">
                                <span class="fw-normal p16normal3" style="color: {{ in_array($currentRoute, $accountRoutes) ? '#fff' : 'rgb(145,155,171)' }}">Account</span>
                            </a>
                        </li>
                        {{-- Shopping --}}
                        <li class="nav-item">
                            <a class="{{ in_array($currentRoute, $shoppingRoutes) ? 'active nav-link1' : 'nav-link' }} d-xl-flex align-items-xl-center" href="{{ route('wave.shopping') }}" style="height: 56px;width: 250px; text-decoration: none;">
                                <img src="{{ asset('themes/tailwind/images/shopping.png') }}" style="width: 20px;margin-right: 20px;" class="{{ in_array($currentRoute, $shoppingRoutes) ? 'active-btn' : '' }}">
                                <span class="fw-normal p16normal3" style="color: {{ in_array($currentRoute, $shoppingRoutes) ? '#fff' : 'rgb(145,155,171)' }}">Shopping</span>
                            </a>
                        </li>
                        {{-- Notification --}}
                        <li class="nav-item">
                            <a class="{{ in_array($currentRoute, $notificationRoutes) ? 'active nav-link1' : 'nav-link' }} d-xl-flex align-items-xl-center" href="{{ route('wave.notification') }}" style="height: 56px;width: 250px; text-decoration: none;">
                                <img src="{{ asset('themes/tailwind/images/notification.png') }}" style="width: 20px;margin-right: 20px;" class="{{ in_array($currentRoute, $notificationRoutes) ? 'active-btn' : '' }}">
                                <span class="fw-normal p16normal3" style="color: {{ in_array($currentRoute, $notificationRoutes) ? '#fff' : 'rgb(145,155,171)' }}">Notification</span>
                            </a>
                        </li>
                    @else
                        {{-- Schedule --}}
                        <li class="nav-item">
                            <a class="{{ in_array($currentRoute, $scheduleRoutes) ? 'active nav-link1' : 'nav-link' }} d-xl-flex align-items-xl-center" href="{{ route('wave.schedule') }}" style="height: 56px;width: 250px; text-decoration: none;">
                                <img src="{{ asset('themes/tailwind/images/clipboard-image-4.png') }}" style="width: 20px;margin-right: 20px;" class="{{ in_array($currentRoute, $scheduleRoutes) ? 'active-btn' : '' }}">
                                <span class="fw-normal p16normal3" style="color: {{ in_array($currentRoute, $scheduleRoutes) ? '#fff' : 'rgb(145,155,171)' }}">Schedule</span>
                            </a>
                        </li>
                        {{-- Account --}}
                        <li class="nav-item">
                            <a class="{{ in_array($currentRoute, $accountRoutes) ? 'active nav-link1' : 'nav-link' }} d-xl-flex align-items-xl-center" href="{{ route('wave.account') }}" style="height: 56px;width: 250px; text-decoration: none;">
                                <img src="{{ asset('themes/tailwind/images/account.png') }}" style="width: 20px;margin-right: 20px;" class="{{ in_array($currentRoute, $accountRoutes) ? 'active-btn' : '' }}">
                                <span class="fw-normal p16normal3" style="color: {{ in_array($currentRoute, $accountRoutes) ? '#fff' : 'rgb(145,155,171)' }}">Account</span>
                            </a>
                        </li>
                    @endif
                </ul>
                <a href="{{ route('logout') }}" style="text-decoration:none;color:#171433;">
                    <img src="{{ asset('/themes/tailwind/images/logoutlogo.png') }}" style="position: fixed; bottom: 0; left: 0">
                </a>
            </div>
        </nav>


        @yield('content')
    </div>
    <script src="{{ asset('js/I18NSwitch.js')}}"></script>
    <script src="{{ asset('themes/tailwind/js/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/tailwind/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('themes/tailwind/js/jquery.min.js') }}"></script>
    <script type="text/javascript" rel="script" href="{{ URL::asset('/assets/js/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap-fileinput.js') }}"></script>
    <script type="text/javascript" rel="script" href="{{ URL::asset('/assets/js/script.js') }}"></script>
    <script type="text/javascript" rel="script" href="{{ URL::asset('/assets/js/Simple-Slider-swiper-bundle.min.js') }}"></script>
    <script type="text/javascript" rel="script" href="{{ URL::asset('/assets/js/Simple-Slider.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bcryptjs/2.4.3/bcrypt.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pikaday@1.8.0/pikaday.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js" integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/custom/toast.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function goBack() {
            window.history.back();
        }

        function getUserToken() {
            const response = "<?= session('token') ?>";

            return response;
        }

        function getApiUrl() {
            const response = "{{ config('services.api_url') }}";

            return response;
        }
    </script>
    @yield('javascript')
</body>
</html>