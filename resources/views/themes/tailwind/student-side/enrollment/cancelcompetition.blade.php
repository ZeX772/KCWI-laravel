@extends('theme::layouts.customer')

@section('style')
    <style>
        .p24bb {
            color: var(--app-color-tone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
        }

        .p22bold {
            color: var(--app-color-tone-primary, #171433);
            text-align: left;
            font-family: var(--app-text-styles-app-title-22-font-family,
                    "Barlow-SemiBold",
                    sans-serif);
            font-size: var(--app-text-styles-app-title-22-font-size, 22px);
            font-weight: var(--app-text-styles-app-title-22-font-weight, 600);
            position: relative;
        }

        .p18b {
            color: rgba(23, 20, 51, 0.7);
            text-align: center;
            font-family: var(--barlow-copy-1-font-family, "Barlow-Medium", sans-serif);
        }

        .ripple-beginner {
            color: var(--app-color-tone-secondary-1, #233656);
            font-family: var(--text-text-medium-1-font-family,
                    "Poppins-Medium",
                    sans-serif);
            font-size: var(--text-text-medium-1-font-size, 22px);
            font-weight: var(--text-text-medium-1-font-weight, 500);
            opacity: 0.5;
            position: relative;
            align-self: stretch;
        }

        .student-card {
            background: #ffffff;
            border-radius: 50px;
            display: flex;
            flex-direction: row;
            gap: 8px;
            align-items: center;
            justify-content: flex-start;
            flex-shrink: 0;
            width: 468px;
            height: 188px;
            box-shadow: var(--app-drop-shadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .p16normal2 {
            color: var(--app-color-tone-secondary-1-50percent, rgba(35, 54, 86, 0.5));
            text-align: center;
            font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
            position: relative;
            margin-bottom: 5px;
            margin-top: 50px;
        }

        .p16b {
            color: #171433;
            text-align: center;
            font-family: "Barlow-Medium", sans-serif;
            text-decoration: underline;
            position: relative;
        }
    </style>
@endsection

@section('content')


            


            <div class="d-flex flex-column" id="content-wrapper"
                style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 100%;">
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                    style="margin-bottom: 0px;height: 31px;"><strong>Cancel Competition</strong></p>
                <div style="margin-bottom: 30px; position: absolute;" onclick="goBack()"><button class="button2"
                        type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></div>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                    <div style="width: auto;">
                        <p class="p18b" style="margin-top: 50px;margin-bottom: 0px;">Choose Student and
                            Cancel</br>Competition</p>
                        @foreach($students as $student)
                            <div style="margin-bottom: 20px;">
                                <a href="{{ route('wave.cancelcompetition2', ['studentID' => $student['id']]) }}"
                                    class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center divcard student-card"
                                    style="padding-right: 20px;padding-left: 20px;padding-top: 20px;padding-bottom: 20px; text-decoration: none; color: black;">
                                    <div class="avatar-circle_container">
                                        <img src="{{ $student['image_path'] }}"
                                            style="width: 101px;">
                                    </div>
                                    <div>
                                        <p class="p22bold" style="margin-bottom: 15px;">{{ $student['name'] }}</p>
                                        <p class="ripple-beginner" style="margin-top: 15px;">{{ optional($student['student_information']['level'])['name'] }}</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                        <p class="p18b" style="border: 1px solid; border-radius: 15px; padding: 0 20px; margin: 0;">
                                            <strong>{{ optional($student['student_information'])['hkid'] }}</strong>
                                        </p>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor">
                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                            </path>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <p class="p16normal2">If you haven’t been HKSA student before,<br>
                            <a href="{{ route('wave.newstudent') }}" class="p16b">fill in the enrollment form and register
                                now!</a>
                        </p>
                    </div>
                </div>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
