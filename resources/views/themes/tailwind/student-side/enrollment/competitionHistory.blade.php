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

        .button1 {
            background: #dd2222;
            border-radius: 33px;
            width: 100%;
            height: 50px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #ffffff;
            text-align: left;
            font-family: "Poppins-Medium", sans-serif;
            font-size: 18px;
            font-weight: 500;
            position: relative;
            margin-right: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex flex-column" id="content-wrapper"
        style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);width: 100%;height:100vh;">
        <div style="margin-bottom: 30px; position: absolute;" onclick="window.location.href='{{ route('wave.enrollment') }}'">
            <button class="button2" type="button"
                style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                    class="fas fa-chevron-left"></i></button>
        </div>
        <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 0px;height: 31px;">
            <strong>Enrollment Competition History</strong>
        </p></br>
        <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
            @foreach ($competitions as $competition)
                <div style="width: 550px;">
                    <a href="{{ route('wave.competition.details', $competition['id']) }}" style="margin-bottom: 20px; text-decoration: none; color: #000;">
                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard frame"
                            style="padding: 20px; text-decoration: none; color: inherit;">
                            <div>
                                <div class="d-xl-flex align-items-xl-center">
                                    <p class="p24b" style="margin-bottom: 0px;margin-right: 10px;">Enrollment</p>
                                    <div class="process status-bg-color_{{$competition['status']}}">
                                        <p style="margin-bottom: 0px;">
                                            <strong>{{ $competition['status_label'] }}</strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                    <p class="p18b" style="margin-bottom: 0px;color: #23365680;margin-right: 5px;">
                                        <strong>Date:</strong>
                                    </p>
                                    <p class="p18b" style="margin-bottom: 0px;margin-right: 10px;"><strong>{{ optional($competition['competition'])['start_date'] }}</strong></p>
                                    <p style="margin-bottom: 0px;color: #23365680;margin-right: 5px;" class="p18b">
                                        <strong>Time:</strong>
                                    </p>
                                    <p style="margin-bottom: 0px;" class="p18b"><strong>{{ optional($competition['competition'])['start_time'] }}-{{ optional($competition['competition'])['end_time'] }}</strong></p>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                    <p style="margin-bottom: 0px;color: #23365680;margin-right: 5px;" class="p18b">
                                        <strong>Competition Code:</strong>
                                    </p>
                                    <p style="margin-bottom: 0px;" class="p18b"><strong>{{ optional($competition['competition'])['competition_code'] }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            </body>
        @endsection

        @section('javascript')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                var statusDivs = document.getElementsByClassName("process");

                for (var i = 0; i < statusDivs.length; i++) {
                    var statusLabel = statusDivs[i].querySelector("strong").innerText;
                    var statusClass = getStatusClass(statusLabel);
                    statusDivs[i].classList.add(statusClass);
                }

                function getStatusClass(statusLabel) {
                    switch (statusLabel) {
                        case 'finished':
                            return 'complete';
                        case 'processing':
                            return 'process';
                        case 'cancelled':
                            return 'reject'; //reject reserved waiting needs to be double checked ltr on
                        case 'reserved':
                            return 'reserved';
                        case 'waiting':
                            return 'waiting';
                        default:
                            return 'process';
                    }
                }
                
            </script>
        @endsection
