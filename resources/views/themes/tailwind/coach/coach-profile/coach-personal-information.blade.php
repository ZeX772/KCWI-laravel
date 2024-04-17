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
            height: auto;
            width: 550px;
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

        .textField {
            box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);
            height: 70px;
            background-color: transparent;
            margin-top: 20px;
            border-radius: 100.5px;
            border: 3px solid var(--app-color-tone-secondary-150, rgba(35, 54, 86, 0.50));
            font-family: Barlow;
            font-size: 18px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            width: 175%;
            margin-left: -2px;
        }

        .p14b1 {
            color: #7a7a7a !important;
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
                <a href="{{ route('coach-profile') }}">
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
                            style="margin-top: 100px;">
                            <div style="width: 80%;">
                                <div class="row">
                                    <div class="col-sm-6" style="margin-bottom: 10px;margin-top: 10px;">
                                        <div class="box divcard" style="padding-bottom: 30px;left:-25%;">
                                            <div class="box d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard"
                                                style="height: 60px;border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;padding: 20px;">
                                                <p class="fw-semibold p18b"
                                                    style="margin-bottom: 0px;left:-170px;position: relative;">
                                                    <strong>Personal Information</strong></p>
                                                <a href="{{ route('edit-coach-information') }}"
                                                    style="text-decoration:none;color:#171333;">
                                                    <div
                                                        class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                            width="1em" height="1em" fill="currentColor" class="p12"
                                                            style="margin-right: 10px;margin-top:-40px;left:90%;position: relative;">
                                                            <path
                                                                d="M421.7 220.3L188.5 453.4L154.6 419.5L158.1 416H112C103.2 416 96 408.8 96 400V353.9L92.51 357.4C87.78 362.2 84.31 368 82.42 374.4L59.44 452.6L137.6 429.6C143.1 427.7 149.8 424.2 154.6 419.5L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3zM492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75z">
                                                            </path>
                                                        </svg>
                                                        <p class="p12"
                                                            style="margin-bottom: 0px;margin-top:-45px;margin-left:450px;">
                                                            <strong>Edit</strong></p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div
                                                class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                                                <div style="width: 90%;">
                                                    <div class="textField d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center "
                                                        style="padding-right: 20px;padding-left: 20px;padding-bottom: 20px;padding-top: 20px;">
                                                        <p class="p14b1" style="margin-bottom: 0px;">First Name</p>
                                                        <p class="p14b" style="margin-bottom: 0px;">Coach</p>
                                                    </div>
                                                    <div class="textField d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center "
                                                        style="padding-right: 20px;padding-left: 20px;padding-top: 20px;padding-bottom: 20px;">
                                                        <p class="p14b1" style="margin-bottom: 0px;">Last Name</p>
                                                        <p class="p14b" style="margin-bottom: 0px;">Chan</p>
                                                    </div>
                                                    <div class="textField d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center "
                                                        style="padding-right: 20px;padding-left: 20px;padding-top: 20px;padding-bottom: 20px;">
                                                        <p class="p14b1" style="margin-bottom: 0px;">Phone No.</p>
                                                        <p class="p14b" style="margin-bottom: 0px;">69996999</p>
                                                    </div>
                                                    <div class="textField d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center "
                                                        style="padding-right: 20px;padding-left: 20px;padding-bottom: 20px;padding-top: 20px;">
                                                        <p class="p14b1" style="margin-bottom: 0px;">Location</p>
                                                        <p class="p14b" style="margin-bottom: 0px;">Hong Kong</p>
                                                    </div>
                                                    <div class="textField d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-start"
                                                        style="padding-right: 20px;padding-left: 20px;height: auto;padding-top: 20px;padding-bottom: 20px;border-radius:36px;">
                                                        <p class="p14b1" style="margin-bottom: 0px;">Address</p>
                                                        <p class="p14b"
                                                            style="margin-bottom: 0px;width: 80%;text-align: right;">2108
                                                            Paul Y. Centre 51 Hung<br>To Road Kowloon,Kwun Tong
                                                            <br>District,Hongkong</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6" style="margin-bottom: 10px;margin-top: 10px;">
                                        <div class="box divcard" style="padding-bottom: 30px;height: auto;">
                                            <div class="box d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard"
                                                style="height: 60px;border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;padding: 20px;">
                                                <p class="fw-semibold p18b"
                                                    style="margin-bottom: 0px;left:-200px;position: relative;">
                                                    <strong>Account Info</strong></p>
                                                <a href="{{ route('change-coach-password') }}"
                                                    style="text-decoration:none;color:#171333;">
                                                    <div
                                                        class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                            width="1em" height="1em" fill="currentColor"
                                                            class="p12"
                                                            style="margin-right: 10px;margin-top:-40px;left:70%;position: relative;">
                                                            <path
                                                                d="M421.7 220.3L188.5 453.4L154.6 419.5L158.1 416H112C103.2 416 96 408.8 96 400V353.9L92.51 357.4C87.78 362.2 84.31 368 82.42 374.4L59.44 452.6L137.6 429.6C143.1 427.7 149.8 424.2 154.6 419.5L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3zM492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75z">
                                                            </path>
                                                        </svg>
                                                        <p class="p12"
                                                            style="margin-bottom: 0px;margin-top:-45px;margin-left:350px;whitespace:nowrap;">
                                                            <strong>Change Password</strong></p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div
                                                class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                                                <div style="width: 90%;">
                                                    <div
                                                        class="textField d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center "style="padding-right: 20px;padding-left: 20px;padding-bottom: 20px;padding-top: 20px;width:510px;">
                                                        <p class="p14b1" style="margin-bottom: 0px;">Email</p>
                                                        <p class="p14b" style="margin-bottom: 0px;">chan@mail.com</p>
                                                    </div>
                                                    <div class="textField d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center "
                                                        style="padding-right: 20px;padding-left: 20px;padding-top: 20px;padding-bottom: 20px;width:510px;">
                                                        <p class="p14b1" style="margin-bottom: 0px;">Password</p>
                                                        <p class="p14b" style="margin-bottom: 0px;">********</p>
                                                    </div>
                                                </div>
                                            </div>
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
    <script></script>
@endsection
