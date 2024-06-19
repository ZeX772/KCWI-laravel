@extends('theme::layouts.customer')

@section('style')
<style>
    .p28b {
        color: var(--appcolortone-primary, #171433);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 28px;
        font-weight: 600;
        position: relative;
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

    .p18b {
        color: var(--appcolortone-primary, #171433);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 18px;
        font-weight: 600;
        position: relative;
    }

    .p18bb {
        color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
        text-align: right;
        font-family: var(--apptextstyles-text-semi-bold-1-font-family,
                "Poppins-SemiBold",
                sans-serif);
        font-size: var(--apptextstyles-text-semi-bold-1-font-size, 18px);
        font-weight: var(--apptextstyles-text-semi-bold-1-font-weight, 600);

    }

    .p18red {
        color: #ff4d4d;
        text-align: center;
        font-family: var(--apptextstyles-text-semi-bold-1-font-family,
                "Poppins-SemiBold",
                sans-serif);
        font-size: var(--apptextstyles-text-semi-bold-1-font-size, 18px);
        font-weight: var(--apptextstyles-text-semi-bold-1-font-weight, 600);
        position: relative;
    }

    .p16b {
        color: var(--appcolortone-primary, #171433);
        text-align: center;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 16px;
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

    .SC-frame {
        display: flex;
        flex-direction: column;
        gap: 5px;
        align-items: flex-start;
        justify-content: flex-start;
        flex-shrink: 0;
        position: relative;
        height: 15vh;
        justify-content: center;
    }

    .urgentnewsbox {
        background: #ffffff;
        border-radius: 34px;
        flex-shrink: 0;
        width: 100%;
        height: 143px;
        position: relative;
        box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.5);
    }

    .p18white {
        color: var(--appcolortone-white, #ffffff);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 18px;
        font-weight: 600;
        position: relative;
    }

    .p16white {
        color: var(--appcolortone-white, #ffffff);
        text-align: left;
        font-family: "Barlow-Medium", sans-serif;
        font-size: 16px;
        line-height: 17.99px;
        font-weight: 500;
        position: relative;
        align-self: stretch;
        height: 54.29px;
    }

    .p14b {
        color: #000000;
        text-align: left;
        font-family: var(--apptextstyles-text-medium-2-font-family,
                "Poppins-Medium",
                sans-serif);
        font-size: var(--apptextstyles-text-medium-2-font-size, 14px);
        font-weight: var(--apptextstyles-text-medium-2-font-weight, 500);
        position: relative;
    }

    .p14whiteb {
        color: #ffffff;
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 14px;
        line-height: 14.05px;
        font-weight: 600;
        position: relative;
        width: 102.92px;
    }

    .p14white {
        color: var(--appcolortone-white, #ffffff);
        text-align: left;
        font-family: "Barlow-Regular", sans-serif;
        font-size: 14px;
        font-weight: 400;
        position: relative;
    }

    .p12 {
        color: #7168d3;
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 12px;
        position: absolute;
        right: 23.13%;
        left: 23.12%;
        width: 53.75%;
        bottom: 7.45%;
        top: 62.77%;
        height: 29.79%;
        -webkit-text-stroke: 1px var(--appcolortone-secondary-1, #233656);
    }

    .newsframe {
        background: var(--appcolortone-white, #ffffff);
        border-radius: 34px;
        padding: 10px 16px 10px 16px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
        justify-content: center;
        flex-shrink: 0;
        width: 100%;
        height: 143px;
        position: relative;
        box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.5);
        overflow: hidden;
        margin-top: 10px;
    }

    .schedule-frame {
        background: var(--cm-scolor-white, #ffffff);
        border-radius: 20px;
        padding: 12px 23px 12px 23px;
        display: flex;
        flex-direction: column;
        gap: 5px;
        align-items: flex-start;
        justify-content: flex-start;
        flex-shrink: 0;
        width: 100%;
        height: 349px;
        position: relative;
        box-shadow: var(--app-dropshadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    }

    .small-border {
        width: 80px;
        height: 20px;
        border: 1px solid #233656;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .shopping-frame {
        background: #ffffff;
        border-radius: 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        width: 100%;
        height: 100%;
        position: relative;
        box-shadow: var(--app-dropshadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        overflow: hidden;
    }

    .level-frame {
        background: var(--appcolortone-white, #ffffff);
        border-radius: 34px;
        padding: 10px 16px 10px 16px;
        display: flex;
        flex-direction: row;
        gap: 0px;
        align-items: center;
        justify-content: flex-start;
        align-self: stretch;
        flex-shrink: 0;
        height: 143px;
        box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.5);
        width: 77%;
    }

    @media only screen and (max-width: 768px) {

        .d-xl-flex,
        .d-xxl-flex,
        .row {
            flex-direction: column;
        }

        .SC-frame,
        .urgentnewsbox,
        .newsframe,
        .schedule-frame,
        .shopping-frame,
        .level-frame {
            width: 100%;
            /* Adjust width for full width on smaller screens */
        }
    }

    @keyframes slide {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-100%);
        }
    }

    .news-lists {
        white-space: nowrap;
    }

    .news-lists:hover .news-lists-slide {
        animation-play-state: paused;
    }

    .news-lists-slide {
        display: inline-block;
        animation: slide 30s infinite linear;
    }

    .two-row-truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Number of lines to show */
        -webkit-box-orient: vertical;
        max-height: 2em; /* Height of two rows */
    }

    /* Shopping Slider Style */
    .slick-track {
        margin-left:0;
    }

    .slick-initialized .slick-slide {
        padding-left: 2px;
    }

    /* .slick-slider {
        width: calc(100% - 150px) !important;
    }
    .slick-list {
        width: calc(100% - 150px) !important;
    } */
</style>
@endsection

@section('content')

<div class="d-block" id="content-wrapper" style="padding: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);position: relative; width: 100%;">
    <!-- News -->
    <div class="d-flex justify-content-between gap-3">
        <div style="width: 50%;">
            <!-- Urgent News -->
            <div class="d-md-flex d-lg-flex d-xl-flex justify-content-between align-items-md-center align-items-lg-center align-items-xl-center pb-1">
                <div class="p24b">Urgent News</div>
                <a href="{{ route('wave.urgentsnews') }}" class="p18bb" style="text-decoration: none;"><strong>More</strong></a>
            </div>
            <a href="{{ route('wave.urgentsnews') }}" style="text-decoration: none;" class="d-xl-flex align-items-xl-center divcard urgentnewsbox" style="padding: 15px;">
                <div>
                    <img src="{{ asset('themes/tailwind/images/newslogored.png') }}" style="width: 70px; margin-left: 20px;">
                </div>
                <div style="margin-left: 10px;">
                    <div class="SC-frame">
                        @if(isset($latestUrgentNews) && !empty($latestUrgentNews) && $latestUrgentNews['is_active'] === 1 && $latestUrgentNews['posting_time'] <= now())
                            <p class="p18b" style="text-align: left; margin-top: 20px; margin-bottom: 5px;"><strong>{{ isset($latestUrgentNews['title']) ?$latestUrgentNews['title']:'' }}</strong></p>
                            <div class="p165" style="text-align: left;">{!! isset($latestUrgentNews) && $latestUrgentNews['content'] ? Illuminate\Support\Str::limit($latestUrgentNews['content'], 100, $end = '...') : '' !!}</div>
                        @else
                            <p class="p18b" style="text-align: left; margin-top: 20px;"><strong>No urgent news available</strong></p>
                        @endif
                    </div>
                </div>
            </a>
        </div>
        <div style="width: 25%; margin-left: 10px;">
            <!-- News -->
            <div class="d-xl-flex justify-content-between align-items-xl-center">
                <div class="p24b">News</div>
            </div>
            <a href="{{ route('wave.notificationss') }}" style="text-decoration: none;">
                <div class="d-xl-flex align-items-xl-center divcard" style="padding: 15px;background: linear-gradient(282deg, #7F9ED3 15.35%, #A5D0F5 86.77%); height: 143px; flex-shrink: 0; border-radius: 34px; box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.5);">
                    <div>
                        <img src="{{ asset('themes/tailwind/images/notificationlogo.png') }}" style="width: 70px;" width="70" height="70">
                    </div>
                    <div style="margin-left: 10px;">
                        <div class="SC-frame">
                            @if (isset($latestNormalNews) && count($latestNormalNews) > 0)
                                <p class="p18white" style="text-align: left; margin-top: 20px; margin-bottom: 5px;"><strong>{{ $latestNormalNews['title'] }}</strong></p>
                                <div class="p16white" style="text-align: left;">{!! Illuminate\Support\Str::limit($latestNormalNews['content'], 65, $end = '...') !!}</div>
                            @else
                                <p class="p18b" style="text-align: left; margin-top: 20px;"><strong>No news available</strong></p>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div style="width: 25%; margin-left: 10px;">
            <!-- News Lists -->
            <div class="d-xl-flex justify-content-between align-items-xl-center justify-content-xxl-end">
                <a href="{{ route('wave.newslists') }}" class="p18bb" style="margin-left: auto; text-decoration: none;"><strong>More</strong></a>
            </div>
            @if(!empty($normalNews))
                <div class="newsframe">
                    <div class="d-xl-flex align-items-xl-center divcard news-lists" style="overflow: hidden; width: auto;">
                        <div class="d-xl-flex align-items-xl-center divcard news-lists-slide" style="overflow: hidden; width: auto;">
                            @foreach ($normalNews as $articleNews)
                                <a href="{{ route('wave.lists', ['id' => $articleNews['id']]) }}" style="position: relative;margin-right: 15px;">
                                    <p class="p14white" style="position: absolute;transform: translateX(5px) translateY(55px); padding: 0 10px 10px 10px;">{{ formatDate($articleNews['posting_time']) }}</p>
                                    <p class="p14whiteb" style="position: absolute;transform: translateX(5px) translateY(75px); padding: 0 10px 10px 10px; text-wrap: wrap;"><strong>{{ Illuminate\Support\Str::limit($articleNews['title'], 25, $end = '...') }}</strong></p>
                                    <img src="{{ asset($articleNews['image_path']) }}" style="height: 111px;">
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="newsframe">
                    <div class="d-xl-flex align-items-xl-center divcard news-lists" style="overflow: hidden; width: auto;">
                        <div class="d-xl-flex align-items-xl-center divcard empty-news-lists-slide" style="overflow: hidden; width: auto;">
                            <p>No news available</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- My Schedule | Guardian or Student -->
    @if( session('role') != 'coach' )
        <div class="" style="padding-top: 15px;">
            <div style="width: auto;">
                <div class="d-xl-flex justify-content-between align-items-xl-center">
                    <p class="p24b" style="margin-bottom: 5px;">My Schedule</p>
                    <a href="{{ session('role') != 'coach' ? route('wave.myschedules') : route('wave.schedule') }}" class="p18bb" style="text-decoration: none;"><strong>More</strong></a>
                </div>

                <div class="row">
                    <?php 
                        $totalClass = 0;
                    ?>
                    @if (count($students) > 0)
                        @foreach ($students as $student)
                            @if (count($student['course_enrollments']) > 0)
                                @foreach ($student['course_enrollments'] as $courseEnrollment)
                                    @if (count($courseEnrollment['active_filtered_student_classes']) > 0)
                                        @foreach ($courseEnrollment['active_filtered_student_classes'] as $studentClass)
                                            <div class="col-3" style="padding-right: 10px;padding-left: 10px; padding-bottom: 15px;">
                                                <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px; height: 100%;">
                                                    <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="width: 100%;">
                                                        <p class="p28b"><strong>{{ $studentClass['class']['start_date'] }}</strong>
                                                        </p>
                                                        <div>
                                                            <p class="p16b" style="margin-bottom: 5px;">
                                                                <strong>{{ optional($studentClass['class_student'])['name'] }}</strong>
                                                            </p>
                                                            <p class="p12 small-border" style="flex-shrink: 0; width: 80px; height: 20px; position: static;">
                                                                <strong>{{ optional($studentClass['class_student']['student_information'])['hkid'] }}</strong>
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
                                                                    <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                                <circle cx="8" cy="8" r="8"></circle>
                                                                            </svg></td>
                                                                        <td class="p16b" style="text-align: left;">Time</td>
                                                                        <td style="text-align: left;" class="p16b">
                                                                            {{ $studentClass['class']['start_time'] }} -
                                                                            {{ $studentClass['class']['end_time'] }}</td>
                                                                    </tr>
                                                                    <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                                <circle cx="8" cy="8" r="8"></circle>
                                                                            </svg></td>
                                                                        <td class="p16b" style="text-align: left;">Class</td>
                                                                        <td style="text-align: left;" class="p16b">
                                                                            {{ $studentClass['class']['course']['course_abbreviation'] }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                                <circle cx="8" cy="8" r="8"></circle>
                                                                            </svg></td>
                                                                        <td class="p16b" style="text-align: left;">Level</td>
                                                                        <td style="text-align: left;" class="p16b">
                                                                            {{ $studentClass['class']['course']['level']['name'] }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                        <td><span style="color: rgb(35, 54, 86);"> </span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                                <circle cx="8" cy="8" r="8"></circle>
                                                                            </svg></td>
                                                                        <td class="p16b" style="text-align: left;">Facility</td>
                                                                        <td style="text-align: left;" class="p16b">
                                                                            {{ $studentClass['class']['course']['facility']['name'] }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                                <circle cx="8" cy="8" r="8"></circle>
                                                                            </svg></td>
                                                                        <td class="p16b" style="text-align: left;">Class Code</td>
                                                                        <td style="text-align: left;" class="p16b">
                                                                            {{ $studentClass['class']['course_class_code'] }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php 
                                                $totalClass++;
                                            ?>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                    @if( $totalClass <= 0 )
                        <div class="col-12">
                            No schedule available
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
    @if( session('role') == 'coach' )
        <div class="" style="padding-top: 15px;">
            <div style="width: auto;">
                <div class="d-xl-flex justify-content-between align-items-xl-center">
                    <p class="p24b" style="margin-bottom: 5px;">My Schedule</p>
                    <a href="{{ session('role') != 'coach' ? route('wave.myschedules') : route('wave.schedule') }}" class="p18bb" style="text-decoration: none;"><strong>More</strong></a>
                </div>

                <div class="row">
                    <?php
                        $totalClass = 0;
                    ?>
                    @foreach ($schedules as $schedule)
                        @if (!empty($schedule['course']['course_classes']))
                            @foreach ($schedule['course']['course_classes'] as $courseClass)
                                @foreach ($courseClass['enrolled_students'] as $enrolledStudent)
                                    <div class="col-3" style="padding-right: 10px;padding-left: 10px; padding-bottom: 15px;">
                                        <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px; height: 100%;">
                                            <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="width: 100%;">
                                                <p class="p28b"><strong>{{ $courseClass['start_date'] }}</strong>
                                                </p>
                                                <div>
                                                    <p class="p16b" style="margin-bottom: 5px;">
                                                        <strong>{{ optional($enrolledStudent['student'])['name'] }}</strong>
                                                    </p>
                                                    <p class="p12 small-border" style="flex-shrink: 0; width: 80px; height: 20px; position: static;">
                                                        <strong>{{ optional($enrolledStudent['student']['student_information'])['hkid'] ?? "-" }}</strong>
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
                                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                        <circle cx="8" cy="8" r="8"></circle>
                                                                    </svg></td>
                                                                <td class="p16b" style="text-align: left;">Time</td>
                                                                <td style="text-align: left;" class="p16b">
                                                                    {{ $courseClass['start_time'] }} -
                                                                    {{ $courseClass['end_time'] }}</td>
                                                            </tr>
                                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                        <circle cx="8" cy="8" r="8"></circle>
                                                                    </svg></td>
                                                                <td class="p16b" style="text-align: left;">Class</td>
                                                                <td style="text-align: left;" class="p16b">
                                                                    {{ optional($schedule['course'])['course_abbreviation'] }}
                                                                </td>
                                                            </tr>
                                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                        <circle cx="8" cy="8" r="8"></circle>
                                                                    </svg></td>
                                                                <td class="p16b" style="text-align: left;">Level</td>
                                                                <td style="text-align: left;" class="p16b">
                                                                    {{ optional($schedule['course']['level'])['name'] }}
                                                                </td>
                                                            </tr>
                                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                <td><span style="color: rgb(35, 54, 86);"> </span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                        <circle cx="8" cy="8" r="8"></circle>
                                                                    </svg></td>
                                                                <td class="p16b" style="text-align: left;">Facility</td>
                                                                <td style="text-align: left;" class="p16b">
                                                                    {{ optional($schedule['course']['facility'])['name'] }}
                                                                </td>
                                                            </tr>
                                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                        <circle cx="8" cy="8" r="8"></circle>
                                                                    </svg></td>
                                                                <td class="p16b" style="text-align: left;">Class Code</td>
                                                                <td style="text-align: left;" class="p16b">
                                                                    {{ $courseClass['course_class_code'] }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $totalClass++;
                                    ?>
                                @endforeach
                                @if( count($courseClass['enrolled_students']) <= 0 )
                                    <div class="col-3" style="padding-right: 10px;padding-left: 10px; padding-bottom: 30px;">
                                        <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px; height: 100%;">
                                            <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="width: 100%;">
                                                <p class="p28b"><strong>{{ $courseClass['start_date'] }}</strong>
                                                </p>
                                                <div>
                                                    <p class="p16b" style="margin-bottom: 5px;">
                                                        <strong>N/A</strong>
                                                    </p>
                                                    <p class="p12 small-border" style="flex-shrink: 0; width: 80px; height: 20px; position: static;">
                                                        <strong>N/A</strong>
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
                                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                        <circle cx="8" cy="8" r="8"></circle>
                                                                    </svg></td>
                                                                <td class="p16b" style="text-align: left;">Time</td>
                                                                <td style="text-align: left;" class="p16b">
                                                                    {{ $courseClass['start_time'] }} -
                                                                    {{ $courseClass['end_time'] }}</td>
                                                            </tr>
                                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                        <circle cx="8" cy="8" r="8"></circle>
                                                                    </svg></td>
                                                                <td class="p16b" style="text-align: left;">Class</td>
                                                                <td style="text-align: left;" class="p16b">
                                                                    {{ optional($schedule['course'])['course_abbreviation'] }}
                                                                </td>
                                                            </tr>
                                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                        <circle cx="8" cy="8" r="8"></circle>
                                                                    </svg></td>
                                                                <td class="p16b" style="text-align: left;">Level</td>
                                                                <td style="text-align: left;" class="p16b">
                                                                    {{ optional($schedule['course']['level'])['name'] }}
                                                                </td>
                                                            </tr>
                                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                <td><span style="color: rgb(35, 54, 86);"> </span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                        <circle cx="8" cy="8" r="8"></circle>
                                                                    </svg></td>
                                                                <td class="p16b" style="text-align: left;">Facility</td>
                                                                <td style="text-align: left;" class="p16b">
                                                                    {{ optional($schedule['course']['facility'])['name'] }}
                                                                </td>
                                                            </tr>
                                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                                        <circle cx="8" cy="8" r="8"></circle>
                                                                    </svg></td>
                                                                <td class="p16b" style="text-align: left;">Class Code</td>
                                                                <td style="text-align: left;" class="p16b">
                                                                    {{ $courseClass['course_class_code'] }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $totalClass++;
                                    ?>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    @if($totalClass <= 0)
                        <div>
                            <p>No available schedule</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if( session('role') !== 'coach' )
        <!-- shopping -->
        <div class="" style="padding-top: 15px;">
            <div style="width: 100%;">
                <div class="d-md-flex d-lg-flex d-xl-flex justify-content-between align-items-md-center align-items-lg-center align-items-xl-center pb-1">
                    <div class="p24b">Shopping</div>
                    <a href="{{ route('wave.shopping') }}" class="p18bb" style="text-decoration: none;"><strong>More</strong></a>
                </div>

                <div style="display: block;">
                    @if(! empty($shopping) )
                        <div class="responsive" style="display: block;">
                            @for ($i = 0; $i < min(8, count($shopping)); $i++) @php $item=$shopping[$i]; @endphp 
                                <div class="col">
                                    <a href="{{ route('wave.item', ['id' => $item['id']]) }}" style="text-decoration: none;">
                                        <div class="d-md-flex d-lg-flex d-xl-flex flex-row align-items-md-center align-items-lg-center justify-content-xxl-start align-items-xxl-center divcard shopping-frame" style="padding: 15px; max-height: 250px; margin-bottom: 20px;">
                                            <div style="display: flex; align-items: center; gap: 15px">
                                                <div style="width: 117px; height: 122px; position: relative;">
                                                    <img src="{{ $item['image_path'] ? $item['image_path'] : asset('/themes/tailwind/images/default.jpeg') }}" style="width: 117px; min-height: 122px; object-fit: cover;">
                                                </div>
                                                <div>
                                                    <p class="p18red" style="margin-bottom: 2px;">HK$ {{ $item['price'] }}</p>
                                                    <p class="p14b" style="margin-bottom: 5px; font-size: 14px; font-weight: 500;">{{ $item['name'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endfor
                        </div>
                    @else
                        <p>No product available</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- level -->
        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="padding-top: 0px;">
            <div style="width: 100%;">
                <div class="d-xl-flex justify-content-between align-items-xl-center pb-1">
                    <p class="p24b m-0">Level</p>
                    <a href="{{ route('wave.levels') }}" class="p18bb" style="text-decoration: none; margin-left: 92%;"><strong>More</strong></a>
                </div>

                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                    <div class="d-flex d-xl-flex flex-row justify-content-xxl-start align-items-xxl-center divcard level-frame gap-3" style="white-space: nowrap; width: 100%;">
                        @if(! empty($levels) )
                            @foreach ($levels as $level)
                                <div class="d-inline-flex flex-column align-items-xxl-center gap-2">
                                    <a href="{{ route('wave.levellists', ['id' => $level['id']]) }}">
                                        <img src="{{ isset($level) && $level['banner'] != '' ?$level['banner']: 'https://rma-zone.b-cdn.net/hksa/level-icon/default-level-icon.png'; }}" style="width: 99px; min-height: 95px; border-radius: 26px; object-fit: cover;">
                                    </a>
                                    <p class="text-nowrap p14b" style="margin-bottom: 0px; font-size: 14px; font-weight: 600;">
                                        {{ strlen($level['name']) > 13 ? substr($level['name'], 0, 13) . '...' : $level['name'] }}
                                    </p>
                                </div>
                            @endforeach
                        @else
                            <p>No levels available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@endsection

@section('javascript')
<script>
    // Calculate animation duration based on content width
    window.addEventListener('DOMContentLoaded', function() {
        // var slide = document.getElementById('news-lists-slide');
        // var contentWidth = slide.offsetWidth; // Get width of the content
        // var viewportWidth = slide.parentNode.offsetWidth; // Get width of the viewport
        // var animationDuration = (contentWidth + viewportWidth) / 100; // Adjust the divisor to control speed

        // slide.style.animationDuration = animationDuration + 's'; // Set the calculated duration
    });

</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.responsive').slick({
                dots: false,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                variableWidth: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
@endsection
