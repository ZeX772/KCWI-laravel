<style>

</style>

@php
    $currentRoute = \Illuminate\Support\Facades\Route::current()->getName();

@endphp

@switch($currentRoute)
    {{-- NAV BAR FOR Tutorials --}}
    @case('wave.tutorial')
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
            style="background: #FFF;padding: 20px; ">
            <input type="hidden" id="selectedLanguage" value="{{ session('locale') }}">
            <div class="container-fluid d-flex flex-column p-0">
                <div id="i18n-switch" style="margin-top: 20px;" class="switch-container">
                    <div class="switch"
                        style="background-image: url(&quot;https://unpkg.com/i18n-switch@2.0.0/assets/united-states.png&quot;);"
                        name="switchLanguage" id="switchLanguage" data-value="">
                    </div>
                </div>
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"><img
                        src="{{ asset('themes/tailwind/images/HKSA-logo-1.png') }}"
                        style="width: 200px;height: 67px; margin-top: 30px;" width="191" height="16"></a>
                <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
                    <li class="nav-item"><a class="nav-link d-xl-flex align-items-xl-center" href="{{ route('wave.home') }}"
                            style="height: 56px;width: 250px;"><img src="{{ asset('themes/tailwind/images/home.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145,155,171);">Home</span></a></li>
                    <li class="nav-item"><a class="nav-link1 active" href="{{ route('wave.tutorial') }}"
                            style="width: 250px;text-decoration:none;"><img
                                src="{{ asset('themes/tailwind/images/tutorial.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color:#fff;filter: brightness(0) invert(1);">Tutorial</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.student') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/student.png') }}"
                                style="width: 20px;margin-right: 35px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Student</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.enrollment') }}"
                            style="width: 250px;"><img src="{{ asset('themes/tailwind/images/enrollment.png') }}"
                                style="width: 20px;margin-right: 35px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Enrollment</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.account') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/account.png') }}"
                                style="width: 20px;margin-right: 35px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Account</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.shopping') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/shopping.png') }}"
                                style="width: 20px; margin-right: 35px; "><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Shopping</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.notification') }}"
                            style="width: 250px;"><img src="{{ asset('themes/tailwind/images/notification.png') }}"
                                style="width: 20px;margin-right: 35px;"><span class="fw-normal p16normal3"
                                style="color:  rgb(145, 155, 171);">Notification</span></a></li>
                </ul>
            </div>
        </nav>
    @break

    {{-- NAV BAR FOR Students --}}
    @case('wave.student')
    @case('wave.student1')
    @case('wave.my-level')
    @case('wave.ripple')
    @case('wave.my-schedule')
    @case('wave.my-past-schedule')
    @case('wave.leaveOrmakeup')
    @case('wave.apply-leave')
    @case('wave.apply-makeup')
    @case('wave.leave-record')
    @case('wave.sick-leave')
    @case('wave.medical-cert')
    @case('wave.make-up.request')
    @case('wave.casual-leave')
    @case('wave.others')
    @case('wave.payment-record')
    @case('wave.reservation')
    @case('wave.reservation1')
    @case('wave.invoice1')
    @case('wave.online-payment1')
    @case('wave.upload-receipt')
    @case('wave.payment-history')
    @case('wave.payment-history1')
    @case('wave.payment-history2')
    @case('wave.addnewstudent')
    @case('wave.newstudent')
    @case('wave.newstudent1')
    @case('wave.newstudent2')
    @case('wave.newstudent3')
    @case('wave.newstudent4')
    @case('wave.newstudent5')

        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
            style="background: #FFF;padding: 20px; ">
            <input type="hidden" id="selectedLanguage" value="{{ session('locale') }}">
            <div class="container-fluid d-flex flex-column p-0">
                <div id="i18n-switch" style="margin-top: 20px;" class="switch-container">
                    <div class="switch"
                        style="background-image: url(&quot;https://unpkg.com/i18n-switch@2.0.0/assets/united-states.png&quot;);"
                        name="switchLanguage" id="switchLanguage" data-value="">
                    </div>
                </div>
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"><img
                        src="{{ asset('themes/tailwind/images/HKSA-logo-1.png') }}"
                        style="width: 200px;height: 67px; margin-top: 30px;" width="191" height="16"></a>
                <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
                    <li class="nav-item"><a class="nav-link d-xl-flex align-items-xl-center" href="{{ route('wave.home') }}"
                            style="height: 56px;width: 250px;"><img src="{{ asset('themes/tailwind/images/home.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145,155,171);">Home</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.tutorial') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/tutorial.png') }}"
                                style="width: 20px;margin-right: 35px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Tutorial</span></a></li>
                    <li class="nav-item"><a class="nav-link1 active" href="{{ route('wave.student') }}"
                            style="width: 250px; text-decoration: none;"><img
                                src="{{ asset('themes/tailwind/images/student.png') }}"
                                style="width: 20px;margin-right: 20px; filter: brightness(0) invert(1);"><span
                                class="fw-normal p16normal3" style="color: #FFFFFF;">Student</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.enrollment') }}"
                            style="width: 250px;"><img src="{{ asset('themes/tailwind/images/enrollment.png') }}"
                                style="width: 20px;margin-right: 35px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Enrollment</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.account') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/account.png') }}"
                                style="width: 20px;margin-right: 35px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Account</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.shopping') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/shopping.png') }}"
                                style="width: 20px; margin-right: 35px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Shopping</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.notification') }}"
                            style="width: 250px;"><img src="{{ asset('themes/tailwind/images/notification.png') }}"
                                style="width: 20px;margin-right: 35px;"><span class="fw-normal p16normal3"
                                style="color:  rgb(145, 155, 171);">Notification</span></a></li>
                </ul>
            </div>
        </nav>
    @break

    {{-- NAV BAR FOR Enrollment --}}
    @case('wave.enrollment')
    @case('wave.enrollment')
    @case('wave.fulltermenrollment')
    @case('wave.fulltermenrollment1')
    @case('wave.fulltermenrollment2')
    @case('wave.fulltermenrollment3')
    @case('wave.fulltermenrollment4')
    @case('wave.flexiblecourse')
    @case('wave.flexiblecourse1')
    @case('wave.flexiblecourse2')
    @case('wave.flexiblecourse3')
    @case('wave.flexiblecourse4')
    @case('wave.privatecourse')
    @case('wave.privatecourse1')
    @case('wave.privatecourse2')
    @case('wave.privatecourse3')
    @case('wave.privatecourse4')
    @case('wave.privatecourse5')
    @case('wave.history')
    @case('wave.history-waiting')
    @case('wave.history-reserved')
    @case('wave.history-complete')
    @case('wave.changecourse')
    @case('wave.changecourse1')
    @case('wave.cancelcourse')
    @case('wave.cancelcourse1')
    @case ('wave.competitionenrollment')
    @case ('wave.competitionenrollment1')
    @case ('wave.competitionenrollment2')
    @case ('wave.competitionenrollment3')
    @case ('wave.competitionpreview')
    @case ('wave.competitionpayment')
    @case ('wave.cancelcompetition')
    @case ('wave.cancelcompetition2')
    @case ('wave.competitioninvitation')

    

        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
            style="background: #FFF;padding: 20px; ">
            <input type="hidden" id="selectedLanguage" value="{{ session('locale') }}">
            <div class="container-fluid d-flex flex-column p-0">
                <div id="i18n-switch" style="margin-top: 20px;" class="switch-container">
                    <div class="switch"
                        style="background-image: url(&quot;https://unpkg.com/i18n-switch@2.0.0/assets/united-states.png&quot;);"
                        name="switchLanguage" id="switchLanguage" data-value="">
                    </div>
                </div>
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"><img
                        src="{{ asset('themes/tailwind/images/HKSA-logo-1.png') }}"
                        style="width: 200px;height: 67px; margin-top: 30px;" width="191" height="16"></a>
                <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.home') }}"
                            style="width: 250px; text-decoration: none;"><img
                                src="{{ asset('themes/tailwind/images/home.png') }}"
                                style="width: 20px;margin-right: 20px; filter: brightness(0.5) invert(1);"><span
                                class="fw-normal p16normal3" style="color: rgb(145, 155, 171);">Home</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.tutorial') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/tutorial.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Tutorial</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.student') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/student.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Student</span></a></li>
                    <li class="nav-item"><a class="nav-link1 active d-xl-flex align-items-xl-center"
                            href="{{ route('wave.enrollment') }}"
                            style="height: 56px;width: 250px; text-decoration: none;"><img
                                src="{{ asset('themes/tailwind/images/enrollment.png') }}"
                                style="width: 20px;margin-right: 20px; filter: brightness(0) invert(1);"><span
                                class="fw-normal p16normal3" style="color: #FFFFFF;">Enrollment</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.account') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/account.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Account</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.shopping') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/shopping.png') }}"
                                style="width: 20px; margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145,155,171);">Shopping</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.notification') }}"
                            style="width: 250px;"><img src="{{ asset('themes/tailwind/images/notification.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color:  rgb(145, 155, 171);">Notification</span></a></li>
                </ul>
            </div>
        </nav>
    @break

    {{-- NAV BAR FOR Account --}}
    @case('wave.account')
    @case('wave.account')
    @case('wave.personal-information')
    @case('wave.edit-personal-information')
    @case('wave.add-guardian')
    @case('wave.change-password')
    @case('wave.faq')
    @case('wave.registration-faq')
    @case('wave.privacy-policy')

    
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
            style="background: #FFF;padding: 20px; ">
            <input type="hidden" id="selectedLanguage" value="{{ session('locale') }}">
            <div class="container-fluid d-flex flex-column p-0">
                <div id="i18n-switch" style="margin-top: 20px;" class="switch-container">
                    <div class="switch"
                        style="background-image: url(&quot;https://unpkg.com/i18n-switch@2.0.0/assets/united-states.png&quot;);"
                        name="switchLanguage" id="switchLanguage" data-value="">
                    </div>
                </div>
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"><img
                        src="{{ asset('themes/tailwind/images/HKSA-logo-1.png') }}"
                        style="width: 200px;height: 67px; margin-top: 30px;" width="191" height="16"></a>
                <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.home') }}"
                            style="width: 250px; padding-top: 15px;"><img
                                src="{{ asset('themes/tailwind/images/home.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Home</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.tutorial') }}"
                            style="width: 250px; padding-top: 15px;"><img
                                src="{{ asset('themes/tailwind/images/tutorial.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Tutorial</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.student') }}"
                            style="width: 250px; padding-top: 15px;"><img
                                src="{{ asset('themes/tailwind/images/student.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Student</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.enrollment') }}"
                            style="width: 250px; padding-top: 15px;"><img
                                src="{{ asset('themes/tailwind/images/enrollment.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Enrollment</span></a></li>
                    <li class="nav-item"><a class="nav-link1 active d-xl-flex align-items-xl-center"
                            href="{{ route('wave.account') }}" style="height: 56px;width: 250px; text-decoration: none;"><img
                                src="{{ asset('themes/tailwind/images/account.png') }}"
                                style="width: 20px;margin-right: 20px; filter: brightness(0) invert(1);"><span
                                class="fw-normal p16normal3" style="color: #FFFFFF;">Account</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.shopping') }}"
                            style="width: 250px; padding-top: 15px;"><img
                                src="{{ asset('themes/tailwind/images/shopping.png') }}"
                                style="width: 20px; margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145,155,171);">Shopping</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.notification') }}"
                            style="width: 250px; padding-top: 15px;"><img
                                src="{{ asset('themes/tailwind/images/notification.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color:  rgb(145, 155, 171);">Notification</span></a></li>
                </ul>
            </div>
        </nav>
    @break

    {{-- NAV BAR FOR Shopping --}}
    @case('wave.shopping')
    @case('wave.result')
    @case('wave.item')
    @case('wave.cart-details')
    @case('wave.my-order')
    @case('wave.order1')
    @case('wave.order2')
    @case('wave.ticket1')
    @case('wave.ticket2')
    @case('wave.ticket3')
    @case('wave.invoice2')
    @case('wave.online-payment')
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
            style="background: #FFF;padding: 20px; ">
            <input type="hidden" id="selectedLanguage" value="{{ session('locale') }}">
            <div class="container-fluid d-flex flex-column p-0">
                <div id="i18n-switch" style="margin-top: 20px;" class="switch-container">
                    <div class="switch"
                        style="background-image: url(&quot;https://unpkg.com/i18n-switch@2.0.0/assets/united-states.png&quot;);"
                        name="switchLanguage" id="switchLanguage" data-value="">
                    </div>
                </div>
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"><img
                        src="{{ asset('themes/tailwind/images/HKSA-logo-1.png') }}"
                        style="width: 200px;height: 67px; margin-top: 30px;" width="191" height="16"></a>
                <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
                    <li class="nav-item"><a class="nav-link d-xl-flex align-items-xl-center" href="{{ route('wave.home') }}"
                            style="height: 56px;width: 250px;"><img src="{{ asset('themes/tailwind/images/home.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145,155,171);">Home</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.tutorial') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/tutorial.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Tutorial</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.student') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/student.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Student</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.enrollment') }}"
                            style="width: 250px;"><img src="{{ asset('themes/tailwind/images/enrollment.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Enrollment</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.account') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/account.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Account</span></a></li>
                    <li class="nav-item"><a class="nav-link1 active" href="{{ route('wave.shopping') }}"
                            style="width: 250px; text-decoration: none;"><img
                                src="{{ asset('themes/tailwind/images/shopping.png') }}"
                                style="width: 20px; margin-right: 20px; filter: brightness(0) invert(1);"><span
                                class="fw-normal p16normal3" style="color: #FFFFFF;">Shopping</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.notification') }}"
                            style="width: 250px;"><img src="{{ asset('themes/tailwind/images/notification.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color:  rgb(145, 155, 171);">Notification</span></a></li>
                </ul>
            </div>
        </nav>
    @break

    {{-- NAV BAR FOR Notification --}}
    @case('wave.notification')
    @case('wave.notification2')
    @case('wave.attendancenotification')
    @case('wave.attendancenotification2')
    @case('wave.videoshare')
    @case('wave.videosharenotification')
    @case('wave.swapcoachnotification')
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
            style="background: #FFF;padding: 20px; ">
            <input type="hidden" id="selectedLanguage" value="{{ session('locale') }}">
            <div class="container-fluid d-flex flex-column p-0">
                <div id="i18n-switch" style="margin-top: 20px;" class="switch-container">
                    <div class="switch"
                        style="background-image: url(&quot;https://unpkg.com/i18n-switch@2.0.0/assets/united-states.png&quot;);"
                        name="switchLanguage" id="switchLanguage" data-value="">
                    </div>
                </div>
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"><img
                        src="{{ asset('themes/tailwind/images/HKSA-logo-1.png') }}"
                        style="width: 200px;height: 67px; margin-top: 30px;" width="191" height="16"></a>
                <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.home') }}"
                            style="width: 250px; text-decoration: none;"><img
                                src="{{ asset('themes/tailwind/images/home.png') }}"
                                style="width: 20px;margin-right: 20px; filter: brightness(0.5) invert(1);"><span
                                class="fw-normal p16normal3" style="color: rgb(145, 155, 171);">Home</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.tutorial') }}"
                            style="width: 250px;"><img src="{{ asset('themes/tailwind/images/tutorial.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Tutorial</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.student') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/student.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Student</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.enrollment') }}"
                            style="width: 250px;"><img src="{{ asset('themes/tailwind/images/enrollment.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color:  rgb(145, 155, 171);">Enrollment</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.account') }}" style="width: 250px;"><img
                                src="{{ asset('themes/tailwind/images/account.png') }}"
                                style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145, 155, 171);">Account</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('wave.shopping') }}"
                            style="width: 250px;"><img src="{{ asset('themes/tailwind/images/shopping.png') }}"
                                style="width: 20px; margin-right: 20px;"><span class="fw-normal p16normal3"
                                style="color: rgb(145,155,171);">Shopping</span></a></li>
                    <li class="nav-item"><a class="nav-link1 active d-xl-flex align-items-xl-center"
                            href="{{ route('wave.notification') }}"
                            style="height: 56px;width: 250px; text-decoration: none;"><img
                                src="{{ asset('themes/tailwind/images/notification.png') }}"
                                style="width: 20px;margin-right: 20px; filter: brightness(0) invert(1);"><span
                                class="fw-normal p16normal3" style="color: #FFFFFF;">Notification</span></a></li>
                </ul>
            </div>
        </nav>
        @break
        @default
    @endswitch
