@extends('theme::layouts.customer')

@section('style')
    <style>
        .p24bb {
            color: var(--app-color-tone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
        }

        .p24b {
            color: #171433;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 22px;
            font-weight: 600;
        }

        .frame {
            background: #ffffff;
            border-radius: 32px;
            display: flex;
            gap: 10px;
            align-items: flex-start;
            flex-shrink: 0;
            box-shadow: var(--app-drop-shadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .process {
            background: var(--cms-color-body-light, #7a7a7a);
            border-radius: 12px;
            padding: 4px 12px 4px 12px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: relative;
        }

        .waiting {
            background: var(--app-color-tone-secondary-2, #aac9e4);
            border-radius: 12px;
            padding: 4px 12px 4px 12px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: relative;
        }

        .reserved {
            background: var(--cms-color-yellow, #fcc43e);
            border-radius: 12px;
            padding: 4px 12px 4px 12px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: relative;
        }

        .reject {
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
        }

        .complete {
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
        }
    </style>
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);width: 100%;">
                <div style="margin-bottom: 30px; position: absolute;"
                    onclick="window.location.href='{{ route('wave.enrollment') }}'"><button class="button2" type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></div>
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                    style="margin-bottom: 0px;height: 31px;"><strong>Enrollment History</strong></p></br>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                    <div style="width: 50%;">
                        @if(!empty($enrollments))
                            @foreach($enrollments as $enrollment)
                                <?php
                                    $routeURL = "";
                                    switch ($enrollment['status']) {
                                        case 'waiting_list':
                                            $routeURL = route('wave.history-waiting', ['id' => $enrollment['id']]);
                                            break;
                                        case 'processing':
                                            $routeURL = route('wave.history-waiting', ['id' => $enrollment['id']]);
                                            break;
                                        case 'completed':
                                            $routeURL = route('wave.history-complete', ['id' => $enrollment['id']]);
                                            break;
                                        case 'reservation':
                                            $routeURL = route('wave.history-reserved', ['id' => $enrollment['id']]);
                                            break;
                                        case 'cancelled':
                                            $routeURL = route('wave.history-waiting', ['id' => $enrollment['id']]);
                                            break;
                                        case 'refund':
                                            $routeURL = route('wave.history-waiting', ['id' => $enrollment['id']]);
                                            break;
                                        case 'rejected':
                                            $routeURL = route('wave.history-waiting', ['id' => $enrollment['id']]);
                                            break;
                                        case 'approved':
                                            $routeURL = route('wave.history-waiting', ['id' => $enrollment['id']]);
                                            break;
                                    }
                                ?>
                                <div style="margin-bottom: 20px;">
                                    <a href="{{ $routeURL }}"
                                        class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard frame"
                                        style="padding: 20px; text-decoration: none; color: inherit;">
                                        <div>
                                            <div class="d-xl-flex align-items-xl-center">
                                                <p class="p24b" style="margin-bottom: 0px;margin-right: 10px;">Enrollment</p>
                                                <div class="waiting status-bg-color_{{ $enrollment['status'] }}">
                                                    <p style="margin-bottom: 0px;"><strong>{{$enrollment['status_label']}}</strong></p>
                                                </div>
                                            </div>
                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                <p class="p18b" style="margin-bottom: 0px;color: #23365680;margin-right: 5px;">
                                                    <strong>Date:</strong></p>
                                                <p class="p18b" style="margin-bottom: 0px;margin-right: 10px;"><strong>{{ getCourseStartEndDate($enrollment['student_classes'])['start_date'] }}</strong></p>
                                                <p style="margin-bottom: 0px;color: #23365680;margin-right: 5px;" class="p18b">
                                                    <strong>Time:</strong></p>
                                                <p style="margin-bottom: 0px;" class="p18b"><strong>{{ getCourseStartEndDate($enrollment['student_classes'])['start_time'] }} - {{ getCourseStartEndDate($enrollment['student_classes'])['end_time'] }}</strong></p>
                                            </div>
                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                <p style="margin-bottom: 0px;color: #23365680;margin-right: 5px;" class="p18b">
                                                    <strong>Course Code:</strong></p>
                                                <p style="margin-bottom: 0px;" class="p18b"><strong>{{ optional($enrollment['package']['course'])['course_name'] }}</strong></p>
                                            </div>
                                        </div>
                                        <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em"
                                                height="1em" fill="currentColor" style="color: #171433;">
                                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                                </path>
                                            </svg></div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p>No enrollments found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
