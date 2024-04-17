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
            border-radius: 24px;
            padding: 12px 12px 12px 12px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
            justify-content: flex-start;
            align-self: stretch;
            flex-shrink: 0;
            max-height: 100%;
            max-width: 375px;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .p12red {
            background-color: #f84343;
            border: 2px solid #f84343;
            border-radius: 20px;
            padding: 0px 10px 0px 10px;
            box-shadow: 0 4px 8px rgba(35, 54, 86, 0.5);
            font-size: 1vw;
        }

        .p18b {
            color: #171433;
            text-align: left;
            font-family: var(--app-text-styles-h4-heading-font-family,
                    "Poppins-Bold",
                    sans-serif);
            font-size: var(--app-text-styles-h4-heading-font-size, 18px);
            font-weight: var(--app-text-styles-h4-heading-font-weight, 700);
            position: relative;
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

        .p26 {
            color: var(--app-color-tone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 26px;
            font-weight: 600;
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
            text-align: center;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            font-weight: 600;

        }
    </style>
@endsection

@section('content')

    <body id="page-top">
        <div id="wrapper" class="d-flex" style="min-height: 100vh;">

            <div class="d-flex flex-column" id="content-wrapper"
                style="background:#f2f1f9;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;min-height:100vh;">
                <a href="{{ route('wave.student1', ['id' => $student_id]) }}">
                    <button class type="button"
                        style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                        <i class="fas fa-chevron-left"></i></button></a>
                <div style="width: 100%;margin-bottom: 30px;">
                    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24b1"
                        style="margin-bottom: 0px;height: 31px;text-align: center;margin-top:-30px;"><strong>My
                            schedule</strong></p>
                </div>
                <div class="d-md-flex d-xl-flex justify-content-md-center justify-content-xl-center"
                    style="margin-bottom: 20px;">
                    <div
                        style="fill: #FFF;filter: drop-shadow(0px 4px 4px rgba(35, 54, 86, 0.50));background-color: #ffffff;border-radius: 20px;width: 250px;">
                        <button class="btn btn-primary"
                            onclick="window.location.href='{{ route('wave.my-schedule', ['studentID' => $student_id]) }}'"
                            type="button"
                            style="width: 124px; border-color: white;border-style: none;background-color: white;color: #171433;border-radius: 20px;padding-left: 20px;padding-right: 20px;">Upcoming</button></a>
                        <button class="btn btn-primary" type="button"
                            style="width: 126.5px; background-color: var(--app-color-tone-secondary-2, #AAC9E4);filter: drop-shadow(0px 4px 4px rgba(35, 54, 86, 0.50));border-radius: 20px;border-style: none; padding-left: 20px;padding-right: 20px;color: #171433;margin-left: -5px;">Past</button></a>
                    </div>
                </div>
                @if ($students || $competitions)
                    <div class="container">
                        <div class="row">
                            @if ($students)
                                <div class="col-md-6 col-xl-8 col-xxl-8">
                                    <div>
                                        <p class="p24b"><strong>Class</strong></p>
                                    </div>
                                    <div>
                                        @foreach ($students as $month => $items)
                                            <p class="p26">{{ $month }}</p>
                                            <div class="row">
                                                @foreach ($items as $item)
                                                    @php
                                                        // $formattedDate = date('j/n/Y', strtotime($item['class']['start_date']));
                                                        $formattedDate = date(
                                                            'j/m/Y',
                                                            strtotime($item['class']['start_date']),
                                                        );
                                                        $formattedStartTime = date(
                                                            'H:i',
                                                            strtotime($item['class']['start_time']),
                                                        );
                                                        $formattedEndTime = date(
                                                            'H:i',
                                                            strtotime($item['class']['end_time']),
                                                        );
                                                    @endphp
                                                    <div class="box col-sm-6" style="margin-bottom: 20px;margin-right: 5px">
                                                        <div class="d-xl-flex flex-column divcard"
                                                            style="padding-top: 15px;width: 100%">
                                                            <div
                                                                class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center">
                                                                <p class="p26"
                                                                    style="margin-bottom: 0px;margin-top:-45px;">
                                                                    <strong>{{ $formattedDate }}</strong>
                                                                </p>
                                                                <div
                                                                    class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                                                    <p class="p12red"
                                                                        style="color: rgb(255,255,255);margin-bottom: 0px;margin-top:-45px;margin-left:5px;">
                                                                        Past</p>
                                                                </div>
                                                                <div>
                                                                    <p class="p16b"
                                                                        style="margin-bottom: 5px;margin-left:5px;width: 100%">
                                                                        <strong>{{ $item['name'] }}</strong>
                                                                    </p>
                                                                    <p class="p12"
                                                                        style="background: url(&quot;../themes/tailwind/images/clipboard-image-111.png&quot;) center / contain no-repeat;text-align: center;margin-left:10px;">
                                                                        <strong>{{ $item['student_id'] }}</strong>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="d-xxl-flex align-items-xxl-center">
                                                                <div class="table-responsive" style="width: 100%;">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr></tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr
                                                                                style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                                <td><svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="1em" height="1em"
                                                                                        fill="currentColor"
                                                                                        viewBox="0 0 16 16"
                                                                                        class="bi bi-circle-fill"
                                                                                        style="width: 8px;color: #233656;">
                                                                                        <circle cx="8"
                                                                                            cy="8" r="8">
                                                                                        </circle>
                                                                                    </svg></td>
                                                                                <td class="p16b"
                                                                                    style="text-align: left;">
                                                                                    Time
                                                                                </td>
                                                                                <td style="text-align: left;"
                                                                                    class="p16b">
                                                                                    {{ $formattedStartTime }} -
                                                                                    {{ $formattedEndTime }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr
                                                                                style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                                <td><svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="1em" height="1em"
                                                                                        fill="currentColor"
                                                                                        viewBox="0 0 16 16"
                                                                                        class="bi bi-circle-fill"
                                                                                        style="width: 8px;color: #233656;">
                                                                                        <circle cx="8"
                                                                                            cy="8" r="8">
                                                                                        </circle>
                                                                                    </svg></td>
                                                                                <td class="p16b"
                                                                                    style="text-align: left;">
                                                                                    Class
                                                                                    Level
                                                                                </td>
                                                                                <td style="text-align: left;"
                                                                                    class="p16b">
                                                                                    {{ $item['class']['course']['level']['name'] }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr
                                                                                style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                                <td><svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="1em" height="1em"
                                                                                        fill="currentColor"
                                                                                        viewBox="0 0 16 16"
                                                                                        class="bi bi-circle-fill"
                                                                                        style="width: 8px;color: #233656;">
                                                                                        <circle cx="8"
                                                                                            cy="8" r="8">
                                                                                        </circle>
                                                                                    </svg></td>
                                                                                <td class="p16b"
                                                                                    style="text-align: left;">
                                                                                    Venue
                                                                                </td>
                                                                                <td style="text-align: left;"
                                                                                    class="p16b">
                                                                                    {{ $item['class']['course']['venue']['short_name'] }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr
                                                                                style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                                <td><span style="color: rgb(35, 54, 86);">
                                                                                    </span><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="1em" height="1em"
                                                                                        fill="currentColor"
                                                                                        viewBox="0 0 16 16"
                                                                                        class="bi bi-circle-fill"
                                                                                        style="width: 8px;color: #233656;">
                                                                                        <circle cx="8"
                                                                                            cy="8" r="8">
                                                                                        </circle>
                                                                                    </svg></td>
                                                                                <td class="p16b"
                                                                                    style="text-align: left;">
                                                                                    Facility</td>
                                                                                <td style="text-align: left;"
                                                                                    class="p16b">
                                                                                    {{ $item['class']['course']['facility']['name'] }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr
                                                                                style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                                <td><svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="1em" height="1em"
                                                                                        fill="currentColor"
                                                                                        viewBox="0 0 16 16"
                                                                                        class="bi bi-circle-fill"
                                                                                        style="width: 8px;color: #233656;">
                                                                                        <circle cx="8"
                                                                                            cy="8" r="8">
                                                                                        </circle>
                                                                                    </svg></td>
                                                                                <td class="p16b"
                                                                                    style="text-align: left;">
                                                                                    Class
                                                                                    Code
                                                                                </td>
                                                                                <td style="text-align: left;"
                                                                                    class="p16b">
                                                                                    {{ $item['class']['course_class_code'] }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if ($competitions)
                                <div class="col-md-6 col-xl-4 col-xxl-4">
                                    <div>
                                        <p class="p24b"style="margin-left:20px;"><strong>Competition</strong></p>
                                    </div>
                                    @foreach ($competitions as $month => $items)
                                        <p class="p26" style="margin-left:20px;">{{ $month }}</p>
                                        @foreach ($items as $item)
                                            @php
                                                // $formattedDate = date('j/n/Y', strtotime($item['class']['start_date']));
                                                $formattedDate = date(
                                                    'j/m/Y',
                                                    strtotime($item['competition_start_date']),
                                                );
                                                $formattedStartTime = date(
                                                    'H:i',
                                                    strtotime($item['competition_start_time']),
                                                );
                                                $formattedEndTime = date(
                                                    'H:i',
                                                    strtotime($item['competition_end_time']),
                                                );
                                            @endphp
                                            <div class="box d-xl-flex flex-column divcard"
                                                style="padding: 15px; max-height:450px;margin-left:10px;margin-bottom: 20px;">
                                                <div class="d-xl-flex d-xxl-flex flex-column" style="width: 100%;">
                                                    <p class="p26" style="margin-bottom: 0px;">
                                                        <strong>{{ $formattedDate }}</strong>
                                                    </p>
                                                    <p class="p18b" style="margin-bottom: 0px;">
                                                        {{ $item['competition_name'] }}
                                                    </p>
                                                    <p class="p18b" style="margin-bottom: 0px;">
                                                        ({{ $formattedStartTime }}-{{ $formattedEndTime }})
                                                    </p>
                                                </div>
                                                <div class="d-xxl-flex flex-column align-items-xxl-center">
                                                    <div class="table-responsive" style="width: 100%;">
                                                        <table class="table">
                                                            <thead>
                                                                <tr></tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr
                                                                    style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                    <td><svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="1em" height="1em"
                                                                            fill="currentColor" viewBox="0 0 16 16"
                                                                            class="bi bi-circle-fill"
                                                                            style="width: 8px;color: #233656;">
                                                                            <circle cx="8" cy="8" r="8">
                                                                            </circle>
                                                                        </svg></td>
                                                                    <td class="p16b" style="text-align: left;">Date</td>
                                                                    <td style="text-align: left;" class="p16b">
                                                                        {{ $formattedDate }}</td>
                                                                </tr>
                                                                <tr
                                                                    style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                    <td><svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="1em" height="1em"
                                                                            fill="currentColor" viewBox="0 0 16 16"
                                                                            class="bi bi-circle-fill"
                                                                            style="width: 8px;color: #233656;">
                                                                            <circle cx="8" cy="8" r="8">
                                                                            </circle>
                                                                        </svg></td>
                                                                    <td class="p16b" style="text-align: left;">Venue
                                                                    </td>
                                                                    <td style="text-align: left;" class="p16b">
                                                                        {{ $item['venue_name'] }}</td>
                                                                </tr>
                                                                <tr
                                                                    style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="1em" height="1em"
                                                                            fill="currentColor" viewBox="0 0 16 16"
                                                                            class="bi bi-circle-fill"
                                                                            style="width: 8px;color: #233656;">
                                                                            <circle cx="8" cy="8" r="8">
                                                                            </circle>
                                                                        </svg></td>
                                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                                    <td style="text-align: left;" class="p16b">
                                                                        {{ $formattedStartTime }} -
                                                                        {{ $formattedEndTime }}</td>
                                                                </tr>
                                                                <tr
                                                                    style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                    <td><svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="1em" height="1em"
                                                                            fill="currentColor" viewBox="0 0 16 16"
                                                                            class="bi bi-circle-fill"
                                                                            style="width: 8px;color: #233656;">
                                                                            <circle cx="8" cy="8" r="8">
                                                                            </circle>
                                                                        </svg></td>
                                                                    <td class="p16b" style="text-align: left;">
                                                                        Participants
                                                                    </td>
                                                                    <td style="text-align: left;" class="p16b">
                                                                        {{ mb_strimwidth($item['participant_names'], 0, 60, '...') }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="d-lg-flex d-xl-flex justify-content-lg-center justify-content-xl-center align-items-xl-center"
                        style="margin-top: 100px;width: 100%;">
                        <div class="d-md-flex d-lg-flex d-xl-flex justify-content-md-start align-items-md-center align-items-lg-center align-items-xl-center"
                            style="width: 343px;"><img src="{{ asset('themes/tailwind/images/clocklogo.png') }}"
                                style="width: 18px;">
                            <p class="p20b" style="margin-bottom: 0px;margin-left: 10px;">Class/Competition</p>
                        </div>
                    </div>
                    <div class="d-md-flex d-lg-flex d-xl-flex flex-column align-items-md-center align-items-lg-center justify-content-xl-center align-items-xl-center"
                        style="margin-top: 20px;">
                        <p class="p24b1" style="margin-bottom: 0px;margin-left: 10px;"><strong>You Don't
                                Have&nbsp;</strong><br><strong>Any </strong><span
                                class="p24bb">Class/Competition</span><strong>
                                Yet!</strong></p><img src="{{ asset('themes/tailwind/images/schedulelogo2.png') }}"
                            style="width: 334px;">
                            <a href="{{ route('wave.enrollment') }}" class="button1" style="width: 343px;margin-top: 80px;">Enroll New Course</a>
                    </div>
                @endif
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </body>
@endsection

@section('javascript')
    <script>
        function removeFocus() {
            setInterval(function() {
                document.activeElement.blur();
            }, 100); // Adjust the interval (in milliseconds) as needed
        }

        // Call removeFocus function to start blurring focus immediately
        removeFocus();

        // Add event listeners to ensure blur even when hovered over
        document.addEventListener('mouseover', removeFocus);
    </script>
@endsection
