@extends('theme::layouts.customer')

@section('style')
    <style>
        .navbar {
            background: #FFF;
            padding: 20px;
            position: left;
            min-height: 0px;
            top: 0;
            left: 0;
            right: 0;
            box-shadow: 10px 0 10px -10px rgba(0, 0, 0, 0.25);
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

        .d-flex {
            display: flex;
            flex-grow: 1;
        }

        .navbar {
            background: #FFF;
            padding: 20px;
            position: left;
            min-height: 0px;
            top: 0;
            left: 0%;
            right: 0%;
            box-shadow: 10px 0 10px -10px rgba(0, 0, 0, 0.25);
        }

        .p24bb {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
            font-weight: 700;
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
        }

        .box {
            background: #ffffff;
            border-radius: 24px;
            padding: 12px 12px 12px 12px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
            justify-content: flex-start;
            align-self: stretch;
            flex-shrink: 0;
            height: 104px;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .p22bold {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 22px;
            font-weight: 700;
        }

        .p18 {
            color: var(--cm-scolor-accent, #4a5c7a);
            text-align: left;
            font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
            font-size: var(--barlow-copy-2-font-size, 16px);
            font-weight: var(--barlow-copy-2-font-weight, 500);
            position: relative;
            white-space: nowrap;
        }

        .box {
            background: #ffffff;
            border-radius: 24px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
            justify-content: flex-start;
            align-self: stretch;
            flex-shrink: 0;
            height: 104px;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* Two columns */
            grid-template-rows: repeat(2, auto);
            /* Two rows */
            gap: 10px;
            /* Gap between grid items */
        }

        .button1 {
            background: #233656;
            border-radius: 29px;
            padding: 4px 10px 4px 10px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #ffffff;
            text-align: left;
            font-family: "Poppins-Medium", sans-serif;
            font-size: 18px;
            font-weight: 500;
            position: relative;
        }

        .box:hover {
            background-color: #233656;
        }

        .box:hover .svg-icon,
        .box:hover .p22bold {
            color: #ffffff;
            fill: white;
        }
    </style>
@endsection

@section('content')


            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
                style="background: #FFF;padding: 20px;min-height:100%; ">
                <div class="container-fluid d-flex flex-column p-0">
                    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                        href="#"><img src="{{ asset('themes/tailwind/images/HKSA-logo-1.png') }}"
                            style="width: 200px;height: 67px; margin-top: 60px;" width="191" height="16"></a>
                    <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
                        <li class="nav-item"><a class="nav-link d-xl-flex align-items-xl-center" href="Home/1-Homepage.html"
                                style="height: 56px;width: 250px;"><img src="{{ asset('themes/tailwind/images/home.png') }}"
                                    style="width: 20px;margin-right: 15px;"><span class="fw-normal p16normal3"
                                    style="color: rgb(145,155,171);">Home</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="Home/2-Notification.html" style="width: 250px;"><img
                                    src="{{ asset('themes/tailwind/images/student.png') }}"
                                    style="width: 20px;margin-right: 30px;"><span class="fw-normal p16normal3"
                                    style="color: rgb(145, 155, 171);">Schedule</span></a></li>
                        <li class="nav-item"><a class="nav-link1 active" href="Home/2-Notification.html"
                                style="width: 250px;margin-top:-10px; text-decoration: none;"><img
                                    src="{{ asset('themes/tailwind/images/account.png') }}"
                                    style="width: 20px;margin-right: 15px;filter: brightness(0) invert(1);"><span
                                    class="fw-normal p16normal3"style="color: #FFFFFF;">Account</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="Notification/1-Notification.html"
                                style="width: 250px;"><img src="{{ asset('themes/tailwind/images/notification.png') }}"
                                    style="width: 20px;margin-right: 30px;"><span class="fw-normal p16normal3"
                                    style="color:  rgb(145, 155, 171);">Notification</span></a></li>
                    </ul>
                </div>
            </nav>
            <div class="d-flex flex-column" id="content-wrapper"
                style="background-image: linear-gradient(180deg, rgba(35,53,101,1) 46%, rgba(170,201,228,1) 100%);padding: 50px;height:75vh;">
                <a href="{{ route('wave.home') }}">
                    <button class type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                </a>
                <div style="width: 100%; margin-bottom: 30px;"></div>
                <div
                    class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center">
                    <div>
                        <img src="../themes/tailwind/images/clipboard-image-43.png"
                            style="width: 200px; padding: 15px; background: rgba(133,135,150,0.33); border-top-left-radius: 100px; border-top-right-radius: 100px; border-bottom-right-radius: 100px; border-bottom-left-radius: 100px;"
                            width="200" height="201">
                        <button class="d d-xxl-flex justify-content-xxl-center align-items-xxl-center button1"
                            type="button"
                            style="width: 43px; height: 43px; background: #171433; padding: 0px; position: relative; transform: translateX(139px) translateY(-57px);">
                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-camera-fill">
                                <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                                <path
                                    d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z">
                                </path>
                            </svg>
                        </button>
                        <p class="p22bold" style="text-align: center; margin-bottom: 10px;">Coach Chan</p>
                    </div>
                </div>
                <div style="background: #f1f2f9; min-height:auto;width:109%;margin-left:-50px;margin-top:13px;">
                    <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center"
                        style="margin-top: 0px;">

                        <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center"
                            style="margin-top: 40px;">
                            <div style="width: 70%;">
                                <div class="row">
                                    <a
                                        href="{{ route('coach-personal-information') }}"style="text-decoration:none;color:#171433;">
                                        <div class="box col-sm-6"
                                            style="margin-bottom: 10px;margin-top: 10px;max-width:450px;margin-right:px;left:-20px!important;"
                                            id="option1">

                                            <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard"
                                                style="padding: 10px;padding-right: 20px;padding-left: 20px;">
                                                <div
                                                    class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                    <img src="../themes/tailwind/images/clipboard-image-79.png"
                                                        style="width: 100px;margin-right: 20px;margin-top:-15px;margin-left:-20px;"class="image"
                                                        data-original-src="../themes/tailwind/images/clipboard-image-79.png">
                                                    <p class="p22bold" style="margin-bottom: 25px;white-space:nowrap;">
                                                        <strong>Personal Information</strong></p>
                                                </div>
                                                <div><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="-96 0 512 512" width="1em" height="1em"
                                                        fill="currentColor"
                                                        style="margin-top:-20px;right:60px;font-size:24px;position:relative;right:-20px;">
                                                        <path
                                                            d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                                        </path>
                                                    </svg></div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('faq') }}"style="text-decoration:none;color:#171433;">
                                        <div class="box col-sm-6"
                                            style="margin-bottom: 10px;margin-top: 10px;max-width:450px;left:450px;top:-125px;"id="option2">
                                            <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard"
                                                style="padding: 10px;padding-right: 20px;padding-left: 20px;">
                                                <div
                                                    class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                    <img src="../themes/tailwind/images/clipboard-image-78.png"
                                                        style="width: 100px;margin-right: 20px;margin-top:-17px;margin-left:-20px;"class="image"
                                                        data-original-src="../themes/tailwind/images/clipboard-image-78.png">
                                                    <p class="p22bold" style="margin-bottom: 25px;white-space:nowrap;">
                                                        <strong>Notification</strong></p>
                                                </div>
                                                <div><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="-96 0 512 512" width="1em" height="1em"
                                                        fill="currentColor"style="margin-top:-20px;right:60px;font-size:24px;position:relative;right:-135px;">
                                                        <path
                                                            d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                                        </path>
                                                    </svg></div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('login') }}"style="text-decoration:none;color:#171433;">
                                        <div class="box col-sm-6"
                                            style="margin-bottom: 10px;margin-top: -110px;max-width:450px;margin-right:15px;left:-20px!important;"id="option7">
                                            <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard"
                                                style="padding: 10px;padding-right: 20px;padding-left: 20px;">
                                                <div
                                                    class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                    <img src="../themes/tailwind/images/clipboard-image-77.png"
                                                        style="width: 100px;margin-right: 20px;margin-top:-15px;margin-left:-20px;"class="image"
                                                        data-original-src="../themes/tailwind/images/clipboard-image-77.png">
                                                    <p class="p22bold" style="margin-bottom: 25px;white-space:nowrap;">
                                                        <strong>Logout</strong></p>
                                                </div>
                                                <div><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="-96 0 512 512" width="1em" height="1em"
                                                        fill="currentColor"style="margin-top:-20px;right:60px;font-size:24px;position:relative;right:-190px;">
                                                        <path
                                                            d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                                        </path>
                                                    </svg></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        handleHoverEffect('option1', '../themes/tailwind/images/personal_information_blue.png');
        handleHoverEffect('option2', '../themes/tailwind/images/notification_blue.png');
        handleHoverEffect('option3', '../themes/tailwind/images/add_guardian_blue.png');
        handleHoverEffect('option4', '../themes/tailwind/images/faq_blue.png');
        handleHoverEffect('option5', '../themes/tailwind/images/payment_blue.png');
        handleHoverEffect('option6', '../themes/tailwind/images/privacy_policy_blue.png');
        handleHoverEffect('option7', '../themes/tailwind/images/logout_blue.png');
    </script>
@endsection
