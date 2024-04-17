@extends('theme::layouts.customer')

@section('style')
    <style>
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

        .frame {
            background: #ffffff;
            border-radius: 34px;
            flex-shrink: 0;
            height: 143px;
            position: relative;
            box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.5);
        }

        .frame1 {
            background: #ffffff;
            border-radius: 34px;
            flex-shrink: 0;
            height: auto;
            width: 50%;
            position: relative;
            text-align: center;
            box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.5);
            margin-left: 260px;
        }

        .p24bb {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 25px;
            font-weight: 700;
            position: relative;
            white-space: nowrap;
        }

        .p24b {
            color: #171433;
            text-align: left;
            font-family: var(--apptextstyles-h-4-heading-font-family,
                    "Poppins-Bold",
                    sans-serif);
            font-size: var(--apptextstyles-h-4-heading-font-size, 24px);
            font-weight: var(--apptextstyles-h-4-heading-font-weight, 700);
            position: relative;
        }

        .p24 {
            color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 24px;
            font-weight: 600;
        }

        .p18bb {
            color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
            text-align: right;
            font-family: var(--apptextstyles-text-semi-bold-1-font-family,
                    "Poppins-SemiBold",
                    sans-serif);
            font-size: var(--apptextstyles-text-semi-bold-1-font-size, 18px);
            font-weight: var(--apptextstyles-text-semi-bold-1-font-weight, 600);
            position: relative;
        }

        .p18b {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
        }

        .p165 {
            color: var(--appcolortone-secondary-1, #233656);
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            line-height: 17.99px;
            font-weight: 500;
            position: relative;
            align-self: stretch;
        }

        .p24 {
            color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 24px;
            font-weight: 600;
        }
    </style>
@endsection

@section('content')


            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
                style="background: #FFF;padding: 20px; height: 100vh;">
                <div class="container-fluid d-flex flex-column p-0"><a
                        class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                        href="#"><img src="{{ asset('themes/tailwind/images/HKSA-logo-1.png') }}"
                            style="width: 200px;height: 67px; margin-top: 60px;" width="191" height="16"></a>
                    <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
                        <li class="nav-item"><a class="nav-link1 active d-xl-flex align-items-xl-center"
                                href="{{ route('wave.loginwithoutclass') }}"
                                style="height: 56px;width: 250px; text-decoration: none;"><img
                                    src="{{ asset('themes/tailwind/images/home.png') }}"
                                    style="width: 20px;margin-right: 20px; filter: brightness(0) invert(1);"><span
                                    class="fw-normal p16normal3" style="color: #FFFFFF;">Home</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('wave.schedule') }}"
                                style="width: 250px;"><img src="{{ asset('themes/tailwind/images/student.png') }}"
                                    style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                    style="color: rgb(145, 155, 171);">Schedule</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="Home/2-Notification.html" style="width: 250px;"><img
                                    src="{{ asset('themes/tailwind/images/account.png') }}"
                                    style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                    style="color: rgb(145, 155, 171);">Account</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('wave.notificationdetails') }}"
                                style="width: 250px;"><img src="{{ asset('themes/tailwind/images/notification.png') }}"
                                    style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                    style="color:  rgb(145, 155, 171);">Notification</span></a></li>
                    </ul>
                </div>
            </nav>

            <!-- urgent news -->
            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);width: 100%; height: auto;">
                <div class="d-xl-flex d-xxl-flex align-items-xl-start align-items-xxl-start">
                    <div style="width: 100%;">
                        <div
                            class="d-md-flex d-lg-flex d-xl-flex justify-content-between align-items-md-center align-items-lg-center align-items-xl-center">
                            <div class="p24b" style="padding-bottom: 10px;">Urgent News</div>
                            <a href="{{ route('wave.newsdetails') }}" class="p18bb"
                                style="margin-right: 10px; text-decoration: none;"><strong>More</strong></a>
                        </div>

                        <div class="d-xl-flex align-items-xl-center divcard frame" style="padding: 15px;">
                            <a href="{{ route('wave.newsdetails') }}" style="text-decoration: none;">
                                <div><img src="{{ asset('themes/tailwind/images/newslogored.png') }}" style="width: 70px;">
                                </div>
                                <div style="margin-left: 10px;">
                                    <div>
                                        <p class="p18b" style="text-align: left; margin-top: 20px;"><strong>Suspended
                                                Classes</strong></p>
                                        <p class="p165" style="text-align: left;">All swimming classes will be suspended
                                            from 7 Jan until further notice. We shall keep you updated for the resumption of
                                            our swimming classes via emails and social media regularly.</p>
                                    </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="padding-top: 30px;">
                <div style="width: 100%;">
                    <div class="d-xl-flex justify-content-between align-items-xl-center">
                        <p class="p24b">My Schedule</p>
                        <a href="{{ route('wave.schedule') }}" class="p18bb"
                            style="margin-right: 10px; text-decoration: none;"><strong>More</strong></a>
                    </div>
                    <div class="d-md-flex d-lg-flex d-xl-flex flex-column align-items-md-center align-items-lg-center justify-content-xl-center align-items-xl-center frame1"
                        style="margin-top: 20px;">
                        <p class="p24" style="margin-bottom: 0px;margin-left: 10px;"><strong>You Don't
                                Have&nbsp;</strong><br><strong>Upcoming </strong><span class="p24bb">Class</span><strong>
                                Yet!</strong></p><img src="{{ asset('themes/tailwind/images/schedulelogo1.png') }}"
                            style="width: 334px; background-color: white;">
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
