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
        color: var(--appcolortone-primary, #171433);
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 25px;
        font-weight: 700;
        position: relative;
        white-space: nowrap;
    }

    .p24b1 {
        color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 24px;
        font-weight: 600;
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
        height: auto;
        position: relative;
        box-shadow: var(--app-dropshadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    }

    .p28b {
        color: var(--appcolortone-primary, #171433);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 28px;
        font-weight: 600;
        position: relative;
    }

    .p16b {
        color: var(--appcolortone-primary, #171433);
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 16px;
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
</style>
@endsection

@section('content')
<div class="d-block" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);width: 100%;">
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 20px;height: 31px; text-align: center;">Course</p>
    <div style="width: 100%; margin-bottom: 15px; position: relative;">
        <a href="{{ route('wave.schedule') }}">
            <button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button>
        </a>
    </div>

    <div class="d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center" style="margin-bottom: 20px;">
        <div style="fill: #FFF;filter: drop-shadow(0px 4px 4px rgba(35, 54, 86, 0.50));background-color: #ffffff;border-radius: 20px;width: 250px;">
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ route('wave.upcomingschedule', $entry['id']) }}'" style="width: 124px; border-color: white;border-style: none;background-color: white;color: #171433;border-radius: 20px;padding-left: 20px;padding-right: 20px;">Upcoming</button>
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ route('wave.pastschedule', $entry['id']) }}'" style="width: 126.5px; background-color: var(--app-color-tone-secondary-2, #AAC9E4);filter: drop-shadow(0px 4px 4px rgba(35, 54, 86, 0.50));border-radius: 20px;border-style: none; padding-left: 20px;padding-right: 20px;color: #171433;margin-left: -5px;">Past</button>
        </div>
    </div>

    <!-- <div class="d-lg-flex d-xl-flex justify-content-lg-center justify-content-xl-center align-items-xl-center" style="margin-top: 50px;width: 100%;">
        <div class="d-md-flex d-lg-flex d-xl-flex justify-content-md-start align-items-md-center align-items-lg-center align-items-xl-center" style="width: 343px;"><img src="{{ asset('themes/tailwind/images/clocklogo.png') }}" style="width: 18px;">
            <p class="p20b" style="margin-bottom: 0px;margin-left: 10px;">Class</p>
        </div>
    </div> -->
    <div class="d-xl-flex justify-content-between align-items-xl-center">
        <p class="p24b">{{ $entry['course_name'] }}</p>
    </div>
    @if( count($entry['course_classes']) > 0 )
        <div class="row row-cols-sm-3 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-3" style="margin-top: 10px;">
            @foreach( $entry['course_classes'] as $courseClass )
                <div class="col-4 cursor-pointer" style="padding-right: 10px;padding-left: 10px;" onclick="window.location.href='{{ route('wave.coach-attendance', $courseClass['id']) }}'">
                    <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="width: 100%;">
                            <p class="p28b"><strong>{{ $courseClass['start_date'] }}</strong></p>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="2em" height="2em" fill="currentColor" class="d-xxl-flex">
                                    <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <div class="d-xxl-flex align-items-xxl-center w-100">
                            <div class="table-responsive" style="width: 100%;">
                                <table class="table">
                                    <thead>
                                        <tr></tr>
                                    </thead>
                                    <tbody>
                                        <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                            <td style="width: 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                    <circle cx="8" cy="8" r="8"></circle>
                                                </svg></td>
                                            <td class="p16b" style="text-align: left;">Time</td>
                                            <td style="text-align: left;" class="p16b">{{ $courseClass['start_time'] }} - {{ $courseClass['end_time'] }}</td>
                                        </tr>
                                        <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                    <circle cx="8" cy="8" r="8"></circle>
                                                </svg></td>
                                            <td class="p16b" style="text-align: left;">Venue</td>
                                            <td style="text-align: left;" class="p16b">{{ optional($courseClass['course']['venue'])['name'] }}</td>
                                        </tr>
                                        <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                    <circle cx="8" cy="8" r="8"></circle>
                                                </svg></td>
                                            <td class="p16b" style="text-align: left;">Level</td>
                                            <td style="text-align: left;" class="p16b">{{ optional($courseClass['course']['level'])['name'] }}</td>
                                        </tr>
                                        <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                            <td><span style="color: rgb(35, 54, 86);"> </span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                    <circle cx="8" cy="8" r="8"></circle>
                                                </svg></td>
                                            <td class="p16b" style="text-align: left;">Facility</td>
                                            <td style="text-align: left;" class="p16b">{{ optional($courseClass['course']['facility'])['name'] }}</td>
                                        </tr>
                                        <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                    <circle cx="8" cy="8" r="8"></circle>
                                                </svg></td>
                                            <td class="p16b" style="text-align: left;">Class Code</td>
                                            <td style="text-align: left;" class="p16b">{{ $courseClass['course_class_code'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="text" placeholder="Remarks" style="padding: 10px 20px; border-radius: 10px; border-width: 1px; width: 100%;" value="{{ optional($courseClass['course'])['course_remarks'] }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="d-md-flex d-lg-flex d-xl-flex flex-column align-items-md-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="margin-top: 20px;">
            <p class="p24b1" style="margin-bottom: 0px;margin-left: 10px;">
                <strong>You Don't Have&nbsp;</strong><br>
                <strong>Any </strong>
                <span class="p24bb">Class</span>
                <strong>Yet!</strong>
            </p>
            <img src="{{ asset('themes/tailwind/images/schedulelogo2.png') }}" style="width: 334px;">
        </div>
    @endif
</div>
@endsection

@section('javascript')
<script></script>
@endsection