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
            padding: 0px 20px 0px 20px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: flex-start;
            flex-shrink: 0;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow, 0px 4px 4px 0px rgba(35, 54, 86, 0.5));
            outline: none;

        }

        .p24b {
            color: #171433;
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
        }

        .p18b {
            color: #233656;
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 14px;
            font-weight: 500;
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

        .text {
            color: var(--app-color-tone-white, #ffffff);
            text-align: center;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 400;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .process {
            background: var(--cms-color-body-light, rgba(122, 122, 122, 0.5));
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
            padding-left: -20px;
            left: -20px;
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
            padding-left: -20px;
            left: -20px;
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
            padding-left: -20px;
            left: -20px;
        }
    </style>
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="background:#f2f1f9;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;min-height:100vh;">
                <a href="{{ route('wave.leaveOrmakeup', $student_id) }}">
                    <button class type="button"
                        style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                        <i class="fas fa-chevron-left"></i></button></a>
                <div style="width: 100%;margin-bottom: 30px;">
                    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24b1"
                        style="margin-bottom: 10px;margin-top:-30px;height: 31px;text-align: center;"><strong>Make Up
                            Request</strong></p>
                </div>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center" placeholder="">
                    <div style="min-width:50%;">
                        @foreach($entries as $entry)
                            <a href="{{ route(($entry['status'] == 'processing' ) ? 'wave.casual-leave' : 'wave.sick-leave1', ['id' => $student_id, 'makeUpClassID' => $entry['id']]) }}" style="text-decoration: none;">
                                <div class="box-container">
                                    <div class="box d-xl-flex d-xxl-flex justify-content-between divcard"
                                        style="padding: 20px;margin-bottom:20px;">
                                        <div style="display: flex; flex-direction: column; justify-content: flex-start;">
                                            <div style="display: flex; justify-content: flex-start;">
                                                <p class="p24b" style="margin-bottom: 0px;margin-right:30px;">{{ $entry['reason'] }}</p>
                                                <div class="process status-bg-color_{{ $entry['status'] }}">
                                                    <p class="text" style="margin-bottom: 0px;"><strong>{{ ucfirst($entry['status']) }}</strong></p>
                                                </div>
                                            </div>
                                            <div style="display: flex; flex-direction: row;">
                                                <p class="p18b"
                                                    style="margin-bottom: 0px;color: #23365680;margin-right: 5px;">
                                                    <strong>Date:</strong></p>
                                                <p class="p18b" style="margin-bottom: 0px;margin-right: 10px;">
                                                    <strong>{{ $entry['class']['start_date'] }}</strong></p>
                                                <p style="margin-bottom: 0px;color: #23365680;margin-right: 5px;"
                                                    class="p18b"><strong>Time:</strong></p>
                                                <p style="margin-bottom: 0px;" class="p18b"><strong>{{ $entry['class']['start_time'] }} - {{ $entry['class']['end_time'] }}</strong></p>
                                            </div>
                                            <div style="display: flex; flex-direction: row;">
                                                <p style="margin-bottom: 0px;color: #23365680;margin-right: 5px;"
                                                    class="p18b"><strong>Class Code:&nbsp;</strong></p>
                                                <p style="margin-bottom: 0px;" class="p18b"><strong>{{ $entry['class']['course_class_code'] }}</strong>
                                                </p>
                                            </div>
                                        </div>
                                        <div style="margin-left: auto;">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em"
                                                height="1em" fill="currentColor"
                                                style="color: #171433;transform: translateY(0px);">
                                                <path
                                                    d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
