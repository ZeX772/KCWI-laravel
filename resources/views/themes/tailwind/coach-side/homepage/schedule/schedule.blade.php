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

    .background-container {
        position: relative;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="375" height="812" viewBox="0 0 375 812" fill="none"><path d="M375 0H0V812H375V0Z" fill="url(%23paint0_linear_670_78379)"/><defs><linearGradient id="paint0_linear_670_78379" x1="367.125" y1="804.692" x2="138.969" y2="203.026" gradientUnits="userSpaceOnUse"><stop stop-color="%23AAC9E4"/><stop offset="1" stop-color="%23233656"/></linearGradient></defs></svg>');
        background-size: cover;
        background-repeat: no-repeat;
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

    .p24bb {
        color: #ffff;
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 25px;
        font-weight: 700;
        position: relative;
        white-space: nowrap;
        margin-top: 20px;
    }

    .p24b {
        color: #ffff;
        text-align: center;
        font-family: var(--apptextstyles-h-4-heading-font-family,
                "Poppins-Bold",
                sans-serif);
        font-size: var(--apptextstyles-h-4-heading-font-size, 24px);
        font-weight: var(--apptextstyles-h-4-heading-font-weight, 700);
        position: relative;
    }

    .p18b {
        font-size: 18px;
    }
</style>
@endsection

@section('content')

<body id="page-top">
    <div id="wrapper" class="d-flex background-container" style="min-height: 100vh;">
        <div class="d-flex flex-column" id="content-wrapper" style="width: 100%; height: 100%;">
            <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb">Schedule</p>
            <div style="margin-top: 10px;">
                <p class="p24b" style="text-align: center;">My Current Course</p>
            </div>
            <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                <div style="width: 50%; padding-top: 30px;">
                    <?php
                        $totalClass = 0;
                    ?>
                    @foreach ($entries as $schedule)
                        <a href="{{ route('wave.upcomingschedule', $schedule['course']['id']) }}" class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard frame" style="margin-bottom: 20px; padding: 20px; text-decoration: none; color: inherit;">
                            <div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                    <p class="p18b" style="margin-bottom: 0px;color: #23365680;margin-right: 5px;">
                                        <strong>Course Code:</strong>
                                    </p>
                                    <p class="p18b" style="margin-bottom: 0px;margin-right: 10px;">
                                        <strong>{{ optional($schedule['course'])['course_name'] }}</strong>
                                    </p>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                    <p style="margin-bottom: 0px;color: #23365680;margin-right: 5px;" class="p18b">
                                        <strong>Level:</strong>
                                    </p>
                                    <p style="margin-bottom: 0px;" class="p18b"><strong>{{ optional($schedule['course']['level'])['name'] }}</strong></p>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                    <p style="margin-bottom: 0px;color: #23365680;margin-right: 5px;" class="p18b">
                                        <strong>Venue:</strong>
                                    </p>
                                    <p style="margin-bottom: 0px;" class="p18b"><strong>{{ optional($schedule['course']['venue'])['name'] }}</strong></p>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                    <p style="margin-bottom: 0px;color: #23365680;margin-right: 5px;" class="p18b">
                                        <strong>Facility:</strong>
                                    </p>
                                    <p style="margin-bottom: 0px;" class="p18b"><strong>{{ optional($schedule['course']['facility'])['name'] }}</strong></p>
                                </div>
                                <div class="d-xl-flex d-xxl-flex">
                                    <p style="margin-bottom: 0px;color: #23365680;margin-right: 5px;" class="p18b">
                                        <strong>Date & Time:</strong>
                                    </p>
                                    <div>
                                        @foreach( $schedule['course']['course_classes'] as $courseClass )
                                            <p style="margin-bottom: 0px;" class="p18b"><strong>{{ $courseClass['start_date'] }} {{ $courseClass['start_time'] }} - {{ $courseClass['end_time'] }}</strong></p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #171433;">
                                    <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                    </path>
                                </svg>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

@section('javascript')
<script></script>
@endsection