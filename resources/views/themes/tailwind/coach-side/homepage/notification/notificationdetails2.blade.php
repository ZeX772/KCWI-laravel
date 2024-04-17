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

        .p24bb {
            color: var(--app-color-tone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
        }

        .p20b {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 20px;
            line-height: 28px;
            font-weight: 600;
            opacity: 0.75;
            position: relative;
        }

        .p16b {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 16px;
            font-weight: 600;
            position: relative;
            right: 0%;
            left: 0%;
            width: 100%;
            bottom: 0%;
            top: 0%;
            height: 100%;
        }

        .frame {
            background: var(--cm-scolor-white, #ffffff);
            border-radius: 20px;
            padding: 20px 23px 20px 23px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
            justify-content: flex-start;
            align-self: stretch;
            flex-shrink: 0;
            position: relative;
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
                        <li class="nav-item"><a class="nav-link" href="{{ route('wave.loginwithoutclass') }}"
                                style="width: 250px; text-decoration: none;"><img
                                    src="{{ asset('themes/tailwind/images/home.png') }}"
                                    style="width: 20px;margin-right: 20px; filter: brightness(0.5) invert(1);"><span
                                    class="fw-normal p16normal3" style="color: rgb(145, 155, 171);">Home</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('wave.schedule') }}"
                                style="width: 250px;"><img src="{{ asset('themes/tailwind/images/student.png') }}"
                                    style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                    style="color: rgb(145, 155, 171);">Schedule</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="Home/2-Notification.html" style="width: 250px;"><img
                                    src="{{ asset('themes/tailwind/images/account.png') }}"
                                    style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                    style="color: rgb(145, 155, 171);">Account</span></a></li>
                        <li class="nav-item"><a class="nav-link1 active d-xl-flex align-items-xl-center"
                                href="{{ route('wave.notificationdetails') }}"
                                style="height: 56px;width: 250px; text-decoration: none;"><img
                                    src="{{ asset('themes/tailwind/images/notification.png') }}"
                                    style="width: 20px;margin-right: 20px; filter: brightness(0) invert(1);"><span
                                    class="fw-normal p16normal3" style="color: #FFFFFF;">Notification</span></a></li>
                    </ul>
                </div>
            </nav>

            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);width: 100%;">
                <div style="margin-bottom: 30px; position: absolute;"
                    onclick="window.location.href='{{ route('wave.notificationdetails') }}'"><button class="button2"
                        type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></div>
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                    style="margin-bottom: 0px;height: 31px;"><strong>Notification</strong></p></br>
                <div style="margin-bottom: 20px;">
                    <p class="p20b" style="text-align: left;"><strong>Category:</strong></p>
                    <div class="divcard2 frame">
                        <p class="p16b" style="margin-bottom: 0px;">Student Absent</p>
                    </div>
                </div>
                <div style="margin-bottom: 20px;">
                    <p class="p20b" style="text-align: left;"><strong>Title:</strong></p>
                    <div class="divcard2 frame">
                        <p class="p16b" style="margin-bottom: 0px;">Student Absent Confirmation</p>
                    </div>
                </div>
                <div style="margin-bottom: 20px;">
                    <p class="p20b" style="text-align: left;"><strong>Content:</strong></p>
                    <div class="divcard2 frame">
                        <p class="p16b" style="margin-bottom: 0px;text-align: left;">Student A was absent Beginner 1
                            lesson on<br>GHS 7/9/2021 12:00<br><br>If you have any questions, please contact 22956066,
                            Whatsapp 5507 5333 or email to knock@hkswimmingacademy.com.</p>
                    </div>
                </div>
                <div style="margin-bottom: 20px;">
                    <p class="p20b" style="text-align: left;"><strong>Received Schedule:</strong></p>
                    <div class="divcard2 frame">
                        <p class="text-start p16b" style="margin-bottom: 0px;">Date: 01/06/2023<br>Time: 08:25</p>
                    </div>
                </div>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
