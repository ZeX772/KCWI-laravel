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

        .p24b {
            color: #171433;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 24px;
            font-weight: 600;
        }

        .p18b {
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
        }

        .p16normal {
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            line-height: 17.99px;
            font-weight: 500;
            position: relative;
            align-self: stretch;
            margin-bottom: 0px;
        }

        .frame {
            padding: 15px;
            height: 143px;
            padding-right: 20px;
            margin-bottom: 20px;
            border-radius: 34px;
            box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.5);
            position: relative;
            background: #ffffff;
        }

        .frame:hover {
            background: linear-gradient(282deg, #7F9ED3 15.35%, #A5D0F5 86.77%);
            color: #FFFFFF;
            cursor: pointer;
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
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 100%;">
                <div style="margin-bottom: 30px; position: absolute;"
                    onclick="window.location.href='{{ route('wave.notificationdetails') }}'"><button class="button2"
                        type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></div>
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                    style="margin-bottom: 0px;height: 31px;"><strong>Notification</strong></p></br>

                <div style="margin-top: 20px;">
                    <p class="p24b">Today</p>
                    <div id="option1" onclick="window.location.href='{{ route('wave.notificationdetails2') }}'"
                        class="d-md-flex flex-column divcard frame"
                        style="padding: 15px;max-height: 143px;padding-right: 20px;margin-bottom: 20px;">
                        <div style="width: 100%;">
                            <p class="p16normal" style="margin-bottom: 0px;text-align: right;">8.25 AM</p>
                        </div>
                        <div
                            class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                            <div><img src="../themes/tailwind/images/clipboard-image-15.png" class="image"
                                    data-original-src="../themes/tailwind/images/clipboard-image-15.png"
                                    style="width: 70px;" width="70" height="70"></div>
                            <div style="margin-left: 10px;">
                                <p class="p18b" style="text-align: left;"><strong>Student Absent</strong></p>
                                <p class="p16normal" style="text-align: left;margin-bottom: 0px;">Student Absent
                                    Confirmation</p>
                            </div>
                        </div>
                    </div>

                    <div id="option10" onclick="window.location.href='{{ route('wave.notificationdetails2') }}'"
                        class="d-md-flex flex-column divcard frame"
                        style="padding: 15px;max-height: 143px;padding-right: 20px;margin-bottom: 20px;">
                        <div style="width: 100%;">
                            <p class="p16normal" style="margin-bottom: 0px;text-align: right;">9.00 AM</p>
                        </div>
                        <div
                            class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                            <div><img src="{{ asset('/themes/tailwind/images/clipboard-image-15.png') }}" class="image"
                                    data-original-src="../themes/tailwind/images/clipboard-image-15.png"
                                    style="width: 70px;" width="70" height="70"></div>
                            <div style="margin-left: 10px;">
                                <p class="p18b" style="text-align: left;"><strong>Class Cancel</strong></p>
                                <p class="p16normal" style="text-align: left;margin-bottom: 0px;">Class Cancel Confirmation
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="p24b">Earlier</p>
                    <div id="option2" onclick="window.location.href='{{ route('wave.notificationdetails2') }}'"
                        class="d-md-flex flex-column divcard frame"
                        style="padding: 15px;max-height: 143px;padding-right: 20px;margin-bottom: 20px;">
                        <div style="width: 100%;">
                            <p class="p16normal" style="margin-bottom: 0px;text-align: right;">16/10/2021</p>
                        </div>
                        <div
                            class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                            <div><img src="../themes/tailwind/images/clipboard-image-15.png" class="image"
                                    data-original-src="../themes/tailwind/images/clipboard-image-15.png"
                                    style="width: 70px;" width="70" height="70"></div>
                            <div style="margin-left: 10px;">
                                <p class="p18b" style="text-align: left;"><strong>Student Absent</strong></p>
                                <p class="p16normal" style="text-align: left;margin-bottom: 0px;">Coach Swap Confirmation
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="option3" class="d-md-flex flex-column divcard frame"
                        style="padding: 15px;max-height: 143px;padding-right: 20px;margin-bottom: 20px;">
                        <div style="width: 100%;">
                            <p class="p16normal" style="margin-bottom: 0px;text-align: right;">16/10/2021</p>
                        </div>
                        <div
                            class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                            <div><img src="../themes/tailwind/images/clipboard-image-15.png" class="image"
                                    data-original-src="../themes/tailwind/images/clipboard-image-15.png"
                                    style="width: 70px;" width="70" height="70"></div>
                            <div style="margin-left: 10px;">
                                <p class="p18b" style="text-align: left;"><strong>Student Absent</strong></p>
                                <p class="p16normal" style="text-align: left;margin-bottom: 0px;">Class Cancel
                                    Confirmation</p>
                            </div>
                        </div>
                    </div>
                    <div id="option4" class="d-md-flex flex-column divcard frame"
                        style="padding: 15px;max-height: 143px;padding-right: 20px;margin-bottom: 20px;">
                        <div style="width: 100%;">
                            <p class="p16normal" style="margin-bottom: 0px;text-align: right;">16/10/2021</p>
                        </div>
                        <div
                            class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                            <div><img src="../themes/tailwind/images/clipboard-image-15.png" class="image"
                                    data-original-src="../themes/tailwind/images/clipboard-image-15.png"
                                    style="width: 70px;" width="70" height="70"></div>
                            <div style="margin-left: 10px;">
                                <p class="p18b" style="text-align: left;"><strong>Student Absent</strong></p>
                                <p class="p16normal" style="text-align: left;margin-bottom: 0px;">Class Cancel
                                    Confirmation</p>
                            </div>
                        </div>
                    </div>
                    <div id="option5" class="d-md-flex flex-column divcard frame"
                        style="padding: 15px;max-height: 143px;padding-right: 20px;margin-bottom: 20px;">
                        <div style="width: 100%;">
                            <p class="p16normal" style="margin-bottom: 0px;text-align: right;">16/10/2021</p>
                        </div>
                        <div
                            class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                            <div><img src="../themes/tailwind/images/clipboard-image-15.png" class="image"
                                    data-original-src="../themes/tailwind/images/clipboard-image-15.png"
                                    style="width: 70px;" width="70" height="70"></div>
                            <div style="margin-left: 10px;">
                                <p class="p18b" style="text-align: left;"><strong>Student Absent</strong></p>
                                <p class="p16normal" style="text-align: left;margin-bottom: 0px;">Class Cancel
                                    Confirmation</p>
                            </div>
                        </div>
                    </div>
                    <div id="option6" class="d-md-flex flex-column divcard frame"
                        style="padding: 15px;max-height: 143px;padding-right: 20px;margin-bottom: 20px;">
                        <div style="width: 100%;">
                            <p class="p16normal" style="margin-bottom: 0px;text-align: right;">16/10/2021</p>
                        </div>
                        <div
                            class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                            <div><img src="../themes/tailwind/images/clipboard-image-15.png" class="image"
                                    data-original-src="../themes/tailwind/images/clipboard-image-15.png"
                                    style="width: 70px;" width="70" height="70"></div>
                            <div style="margin-left: 10px;">
                                <p class="p18b" style="text-align: left;"><strong>Student Absent</strong></p>
                                <p class="p16normal" style="text-align: left;margin-bottom: 0px;">Class Cancel
                                    Confirmation</p>
                            </div>
                        </div>
                    </div>
                    <div id="option7" class="d-md-flex flex-column divcard frame"
                        style="padding: 15px;max-height: 143px;padding-right: 20px;margin-bottom: 20px;">
                        <div style="width: 100%;">
                            <p class="p16normal" style="margin-bottom: 0px;text-align: right;">16/10/2021</p>
                        </div>
                        <div
                            class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                            <div><img src="../themes/tailwind/images/clipboard-image-15.png" class="image"
                                    data-original-src="../themes/tailwind/images/clipboard-image-15.png"
                                    style="width: 70px;" width="70" height="70"></div>
                            <div style="margin-left: 10px;">
                                <p class="p18b" style="text-align: left;"><strong>Student Absent</strong></p>
                                <p class="p16normal" style="text-align: left;margin-bottom: 0px;">Class Cancel
                                    Confirmation</p>
                            </div>
                        </div>
                    </div>
                    <div id="option8" class="d-md-flex flex-column divcard frame"
                        style="padding: 15px;max-height: 143px;padding-right: 20px;margin-bottom: 20px;">
                        <div style="width: 100%;">
                            <p class="p16normal" style="margin-bottom: 0px;text-align: right;">16/10/2021</p>
                        </div>
                        <div
                            class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                            <div><img src="../themes/tailwind/images/clipboard-image-15.png" class="image"
                                    data-original-src="../themes/tailwind/images/clipboard-image-15.png"
                                    style="width: 70px;" width="70" height="70"></div>
                            <div style="margin-left: 10px;">
                                <p class="p18b" style="text-align: left;"><strong>Student Absent</strong></p>
                                <p class="p16normal" style="text-align: left;margin-bottom: 0px;">Class Cancel
                                    Confirmation</p>
                            </div>
                        </div>
                    </div>
                    <div id="option9" class="d-md-flex flex-column divcard frame"
                        style="padding: 15px;max-height: 143px;padding-right: 20px;margin-bottom: 20px;">
                        <div style="width: 100%;">
                            <p class="p16normal" style="margin-bottom: 0px;text-align: right;">16/10/2021</p>
                        </div>
                        <div
                            class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                            <div><img src="../themes/tailwind/images/clipboard-image-15.png" class="image"
                                    data-original-src="../themes/tailwind/images/clipboard-image-15.png"
                                    style="width: 70px;" width="70" height="70"></div>
                            <div style="margin-left: 10px;">
                                <p class="p18b" style="text-align: left;"><strong>Student Absent</strong></p>
                                <p class="p16normal" style="text-align: left;margin-bottom: 0px;">Class Cancel
                                    Confirmation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </body>
@endsection

@section('javascript')
    <script>
        function handleHoverEffect(boxId, newImageSrc) {
            const box = document.getElementById(boxId);
            const image = box.querySelector('.image');
            const originalSrc = image.getAttribute('data-original-src');

            box.addEventListener('mouseover', function() {
                image.src = newImageSrc;
            });

            box.addEventListener('mouseout', function() {
                image.src = originalSrc;
            });
        }
        handleHoverEffect('option1', '../themes/tailwind/images/notificationlogo.png');
        handleHoverEffect('option2', '../themes/tailwind/images/notificationlogo.png');
        handleHoverEffect('option3', '../themes/tailwind/images/notificationlogo.png');
        handleHoverEffect('option4', '../themes/tailwind/images/notificationlogo.png');
        handleHoverEffect('option5', '../themes/tailwind/images/notificationlogo.png');
        handleHoverEffect('option6', '../themes/tailwind/images/notificationlogo.png');
        handleHoverEffect('option7', '../themes/tailwind/images/notificationlogo.png');
        handleHoverEffect('option8', '../themes/tailwind/images/notificationlogo.png');
        handleHoverEffect('option9', '../themes/tailwind/images/notificationlogo.png');
        handleHoverEffect('option10', '../themes/tailwind/images/notificationlogo.png');
    </script>
@endsection
