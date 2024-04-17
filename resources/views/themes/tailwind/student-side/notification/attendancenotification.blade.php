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
        font-size: 24px;
        font-weight: 600;
    }

    .p18b {
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 18px;
        font-weight: 600;
        position: relative;
    }

    .p16normal {
        text-align: left;
        font-family: "Barlow-Medium", sans-serif;
        font-size: 16px;
        line-height: 17.99px;
        font-weight: 500;
        position: relative;
        align-self: stretch;
        margin-bottom: 0px;
    }

    .frame {
        padding: 15px;
        height: 143px;
        padding-right: 20px;
        margin-bottom: 20px;
        border-radius: 34px;
        box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.5);
        position: relative;
        background: #ffffff;
    }

    .frame:hover {
        background: linear-gradient(282deg, #7F9ED3 15.35%, #A5D0F5 86.77%);
        color: #FFFFFF;
        cursor: pointer;
    }

</style>
@endsection
@section('content')

<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 100%;min-height:100vh;">
    <div style="margin-bottom: 30px; position: absolute;" onclick="window.location.href='{{ route('wave.home') }}'"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></div>
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 0px;height: 31px;"><strong>Notification</strong></p></br>

    <div class="d-md-flex d-lg-flex d-xl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center" style="margin-bottom: 20px;">
        <div style="fill: #FFF;filter: drop-shadow(0px 4px 4px rgba(35, 54, 86, 0.50));background-color: #ffffff;border-radius: 20px;width: 250px;">
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ route('wave.notification') }}'" style="width: 124px; border-color: white;border-style: none;background-color: white;color: #171433;border-radius: 20px;padding-left: 20px;padding-right: 20px;">General</button>
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ route('wave.attendancenotification') }}'" style="width: 126.5px; background-color: var(--app-color-tone-secondary-2, #AAC9E4);filter: drop-shadow(0px 4px 4px rgba(35, 54, 86, 0.50));border-radius: 20px;border-style: none; padding-left: 20px;padding-right: 20px;color: #171433;margin-left: -5px;">Attendance</button></div>
    </div>

    <div>
        @unless (empty($notificationsToday))
        <p class="p24b">Today</p>
        @foreach($notificationsToday as $notificationToday)
        @if(\Carbon\Carbon::parse($notificationToday['created_at'])->isToday())
        <div onclick="window.location.href='{{ route('wave.attendancenotification2', ['id' => $notificationToday['id']]) }}'" class="d-md-flex flex-column divcard frame" style="padding: 15px;max-height: 143px;padding-right: 20px;margin-bottom: 20px;">
            <div style="width: 100%;">
                <p class="p16normal" style="margin-bottom: 0px;text-align: right;">{{ \Carbon\Carbon::parse($notificationToday['created_at'])->format('d/m/Y') }}</p>
            </div>
            <div class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                <div><img src="{{ asset('/themes/tailwind/images/attendancelogo.png') }}" style="width: 70px;" width="70" height="70"></div>
                <div style="margin-left: 10px;">
                    <p class="p18b" style="text-align: left;"><strong>{{$notificationToday['template_name']}}</strong></p>
                    <p class="p16normal" style="text-align: left;margin-bottom: 0px;">{!! substr($notificationToday['content'], 0, 25) . '...' !!}</p>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        @else

        @endunless
    </div>
    <div>
        <p class="p24b">Earlier</p>
        @unless (empty($notificationsEarlier))
        @foreach($notificationsEarlier as $notificationEarlier)
        @unless(\Carbon\Carbon::parse($notificationEarlier['created_at'])->isToday())
        <div onclick="window.location.href='{{ route('wave.attendancenotification2', ['id' => $notificationEarlier['id']]) }}'" class="d-md-flex flex-column divcard frame" style="padding: 15px;max-height: 143px;padding-right: 20px;margin-bottom: 20px;">
            <div style="width: 100%;">
                <p class="p16normal" style="margin-bottom: 0px;text-align: right;">{{ \Carbon\Carbon::parse($notificationEarlier['created_at'])->format('d/m/Y') }}</p>
            </div>
            <div class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                <div><img src="{{ asset('/themes/tailwind/images/attendancelogo.png') }}" style="width: 70px;" width="70" height="70"></div>
                <div style="margin-left: 10px;">
                    <p class="p18b" style="text-align: left;"><strong>{{$notificationEarlier['template_name']}}</strong></p>
                    <p class="p16normal" style="text-align: left;margin-bottom: 0px;">{!! substr($notificationEarlier['content'], 0, 25) .  '...' !!}</p>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        @else
        <div class="alert alert-warning" role="alert">
            <p>NO EARLIER ATTENDANCE FOUND</p>
        </div>
        @endunless
    </div>
</div>


@endsection

@section('javascript')

@endsection
