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

        .p24b1 {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
            font-weight: 700;
            margin-right: 0%;
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
        }

        .box {
            background: #ffffff;
            border-radius: 36px;
            padding: 0px 10px 0px 10px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: flex-start;
            flex-shrink: 0;
            width: 580px;
            min-height: 128px;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow, 0px 4px 4px 0px rgba(35, 54, 86, 0.5));
            outline: none;
        }

        .p24b {
            color: #171433;
            text-align: left;
            font-family: var(--app-text-styles-h4-heading-font-family,
                    "Poppins-Bold",
                    sans-serif);
            font-size: var(--app-text-styles-h4-heading-font-size, 24px);
            font-weight: var(--app-text-styles-h4-heading-font-weight, 700);
            position: relative;
        }

        .button1 {
            background: #233656;
            color: white;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            justify-content: center;
            position: relative;
            font-size: 1.2em;
            padding: 24px 48px;
            border-radius: 40.5px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        }

        .p16b {
            color: var(--app-color-tone-primary, #171433);
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            font-weight: 600;

        }

        .p18b {
            color: #233656;
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 14px;
            font-weight: 500;
            position: relative;
        }

        .p22bold {
            color: var(--app-color-tone-secondary-1, #233656);
            text-align: left;
            font-family: var(--app-text-styles-app-title-22-font-family,
                    "Barlow-SemiBold",
                    sans-serif);
            font-size: var(--app-text-styles-app-title-22-font-size, 22px);
            font-weight: var(--app-text-styles-app-title-22-font-weight, 600);
            position: relative;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #171433 !important;
            background-color: transparent;
            border: none;
            text-align: center;
            font-family: 'Barlow', sans-serif;
            font-size: 16px;
            font-weight: bold;
            line-height: normal;
            border: none !important;
            text-decoration: underline;
            /* Add text underline */
            transition: text-decoration-color 0.3s ease;
        }

        .nav-tabs .nav-item .nav-link {
            border: none;
            /* Remove border */
            color: #555;
            font-weight: bold;
        }

        .nav-tabs .nav-item .nav-link:focus {
            outline: none;
            /* Remove outline */
        }

        .process {
            background: var(--cms-color-body-light, rgba(122, 122, 122, 0.5));
            border-radius: 12px;
            padding: 4px 12px 4px 12px;
            height: auto;
            color: white;
        }

        .rejected {
            background: var(--app-color-tone-warning-color, #ff4d4d);
            border-radius: 12px;
            padding: 4px 12px 4px 12px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: relative;
            max-width: 150px;
            height: auto;
            top: -5px;
            color: white;
        }

        .completed {
            background: var(--app-color-tone-green, #43f86b);
            border-radius: 12px;
            padding: 4px 12px 4px 12px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: relative;
            max-width: 150px;
            height: auto;
            top: -5px;
        }
    </style>
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="background:#f2f1f9;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;min-height:100vh;">
                <a href="{{ route('wave.payment-record') }}">
                    <button class type="button"
                        style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                        <i class="fas fa-chevron-left"></i></button></a>
                <div style="width: 100%;margin-bottom: 30px;">
                    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24b1"
                        style="margin-bottom: 60px;margin-top:-30px;height: 31px;text-align: center;"><strong>Payment
                            History</strong></p>
                    <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center" placeholder="">
                        <div style="width: 50%;">
                            <div>
                                <ul class="nav nav-tabs" role="tablist" style="border-style: none;margin-bottom: 20px;">
                                    <li class="nav-item" role="presentation"><a class="nav-link active" role="tab"
                                            data-bs-toggle="tab"
                                            href="#tab-1"style="background: transparent;width:auto;height:40px;">Class</a>
                                    </li>
                                    <li class="nav-item" role="presentation"><a class="nav-link" role="tab"
                                            data-bs-toggle="tab"
                                            href="#tab-2"style="background: transparent;width:auto;height:40px;">Competition</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" role="tabpanel" id="tab-1">
                                        @foreach( $entries as $entry)
                                            <div style="width: 100%;margin-bottom: 20px;">
                                                <a href="{{ route('wave.payment-history1', $entry['id']) }}" style="text-decoration:none;">
                                                    <div class="box d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard"
                                                        style="padding: 20px;">
                                                        <div>
                                                            <div class="d-xl-flex align-items-center gap-2 mb-2">
                                                                <p class="p24b m-0">
                                                                    Payment details</p>
                                                                <div class="process status-bg-color_{{$entry['status']}}">
                                                                    <p style="margin-bottom: 0px;"><strong>{{ $entry['status_label'] }}</strong>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            @foreach( $entry['active_filtered_student_classes'] as $student_class )
                                                                <div style="display: flex; flex-direction: row;">
                                                                    <p class="p18b"
                                                                        style="margin-bottom: 0px;color: #23365680;margin-right:10px;">
                                                                        <strong>Date:</strong></p>
                                                                    <p class="p18b"
                                                                        style="margin-bottom: 0px;margin-right: 10px;">
                                                                        <strong>{{ $student_class['class']['start_date'] }}</strong></p>
                                                                    <p style="margin-bottom: 0px;color: #23365680;margin-right: 10px;"
                                                                        class="p18b"><strong>Time:</strong></p>
                                                                    <p style="margin-bottom: 0px;" class="p18b"><strong>{{ $student_class['class']['start_time'] }} -
                                                                        {{ $student_class['class']['end_time'] }}</strong></p>
                                                                </div>
                                                                <div style="display: flex; flex-direction: row;">
                                                                    <p style="margin-bottom: 0px;color: #23365680;margin-right: 10px;"
                                                                        class="p18b"><strong>Class Code:</strong></p>
                                                                    <p style="margin-bottom: 0px;" class="p18b">
                                                                        <strong>{{ $student_class['class']['course_class_code'] }}</strong></p>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512"
                                                                width="1em" height="1em" fill="currentColor"
                                                                style="color: #171433;">
                                                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                <path
                                                                    d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                                                </path>
                                                            </svg></div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="tab-2">
                                        @if( count($competition_lists) > 0 )
                                            @foreach( $competition_lists as $competitionList )
                                                <div style="width: 100%;margin-bottom: 20px;">
                                                    <a href="{{ route('wave.payment-history2', $competitionList['id']) }}" style="text-decoration:none;">
                                                        <div class="box d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard"
                                                            style="padding: 20px;">
                                                            <div>
                                                                <div class="d-xl-flex align-items-center gap-2 mb-2">
                                                                    <p class="p24b m-0">{{ $competitionList['status'] == 'processing' ? 'Payment Details' : 'Enrollment' }}</p>
                                                                    <div class="process status-bg-color_{{ $competitionList['status'] }}">
                                                                        <p style="margin-bottom: 0px;"><strong>{{ ucfirst($competitionList['status']) }}</strong>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                                    <p class="p18b"
                                                                        style="margin-bottom: 0px;color: #23365680;margin-right: 5px;">
                                                                        <strong>Date:</strong></p>
                                                                    <p class="p18b"
                                                                        style="margin-bottom: 0px;margin-right: 10px;">
                                                                        <strong>{{ $competitionList['competition']['start_date'] }}</strong></p>
                                                                    <p style="margin-bottom: 0px;color: #23365680;margin-right: 10px;"
                                                                        class="p18b"><strong>Time:</strong></p>
                                                                    <p style="margin-bottom: 0px;" class="p18b"><strong>{{ $competitionList['competition']['start_time'] }} -
                                                                        {{ $competitionList['competition']['end_time'] }}</strong></p>
                                                                </div>
                                                                <div
                                                                    class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                                    <p style="margin-bottom: 0px;color: #23365680;margin-right: 10px;"
                                                                        class="p18b"><strong>Competition Code:</strong></p>
                                                                    <p style="margin-bottom: 0px;" class="p18b">
                                                                        <strong>{{ $competitionList['competition']['competition_code'] }}</strong></p>
                                                                </div>
                                                            </div>
                                                            <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512"
                                                                    width="1em" height="1em" fill="currentColor"
                                                                    style="color: #171433;">
                                                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                    <path
                                                                        d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                                                    </path>
                                                                </svg></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            <div>
                                                <p>No Compeition Enrollment Found</p>
                                            </div>
                                        @endif
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
