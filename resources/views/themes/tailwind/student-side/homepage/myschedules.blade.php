@extends('theme::layouts.customer')

@section('style')
<style>
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

    .button1 {
        position: relative;
        height: 60px;
        width: 343px;
        margin-top: 20px;
        background-color: #233656;
        color: #ffffff;
        text-align: center;
        font-family: "Barlow-Medium", sans-serif;
        font-size: 18px;
        font-weight: 500;
        border: none;
        padding: 10px;
        box-sizing: border-box;
        border-radius: 50px;
        filter: drop-shadow(0px 4px 4px rgba(35, 54, 86, 0.50));
    }

    .d-flex {
        display: flex;
        flex-grow: 1;
    }
</style>
@endsection

@section('content')




<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);">
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 20px;height: 31px; text-align: center;">My Schedule</p>
    <div style="width: 100%; margin-bottom: 15px; position: relative;"><a href="{{ route('wave.home') }}"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></div>
    <div class="d-md-flex d-xl-flex justify-content-md-center justify-content-xl-center" style="margin-bottom: 20px;width: auto;">
        <div style="fill: #FFF;filter: drop-shadow(0px 4px 4px rgba(35, 54, 86, 0.50));background-color: #ffffff;border-radius: 20px;width: 250px;">
            <button class="btn btn-primary" onclick="window.location.href='{{ route('wave.myschedules') }}'" type="button" style="width: 124px; background-color: var(--app-color-tone-secondary-2, #AAC9E4);filter: drop-shadow(0px 4px 4px rgba(35, 54, 86, 0.50));border-radius: 20px;border-style: none;padding-left: 20px;padding-right: 20px;color: #171433;">Upcoming</button></a>
            <button class="btn btn-primary" onclick="window.location.href='{{ route('wave.pastschedules') }}'" type="button" style="width: 124px; border-color: white;border-style: none;background-color: white;color: #171433;border-radius: 20px;padding-left: 20px;padding-right: 20px; margin-left: -5px;">Past</button></a>
        </div>
    </div>
    <div class="d-lg-flex d-xl-flex justify-content-lg-center justify-content-xl-center align-items-xl-center" style="margin-top: 100px;width: 100%;">
        <div class="d-md-flex d-lg-flex d-xl-flex justify-content-md-start align-items-md-center align-items-lg-center align-items-xl-center" style="width: 343px;"><img src="{{ asset('themes/tailwind/images/clocklogo.png') }}" style="width: 18px;">
            <p class="p20b" style="margin-bottom: 0px;margin-left: 10px;">Class</p>
        </div>
    </div>
    <div class="d-md-flex d-lg-flex d-xl-flex flex-column align-items-md-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="margin-top: 20px;">
        <p class="p24b1" style="margin-bottom: 0px;margin-left: 10px;"><strong>You Don't
                Have&nbsp;</strong><br><strong>Any </strong><span class="p24bb">Class</span><strong>
                Yet!</strong></p><img src="{{ asset('themes/tailwind/images/schedulelogo2.png') }}" style="width: 334px;">
        <button class="button1" type="button" style="width: 343px;margin-top: 80px;">Enroll New Course</button>
    </div>
</div>
</div>
</body>
@endsection

@section('javascript')
<script></script>
@endsection