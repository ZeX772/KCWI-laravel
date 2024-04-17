@extends('theme::layouts.customer')

@section('style')
    <style>
        .shopping {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
            font-weight: 700;
            margin-right: -10%;
        }

        .order {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
            background: #ffffff;
            border-radius: 8px;
            border-style: solid;
            border-color: var(--appcolortone-secondary-1, #233656);
            border-width: 1px;
            padding: 15px 16px 15px 16px;
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

        .container-fluid {
            display: flex;
            flex-direction: column;
        }

        .p16b {
            color: rgba(23, 20, 51, 0.7);
            text-align: center;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            font-weight: bold;
        }

        .box1 {
            background: #ffffff;
            padding: 0px 24px 0px 24px;
            min-height: 40px;
            flex-direction: column;
            gap: 12px;
            align-items: center;
            justify-content: flex-start;
            width: 120%;
            border-radius: 24px;
            margin-left: -40px;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        input[type="radio"] {
            width: 30px;
            height: 20px;
        }

        input[type="radio"]:checked {
            /* Change the background color when the radio button is checked */
            accent-color: #233656;
            font-size: 24px;
        }

        .p1b {
            color: #919BAB;
            /* Default color when not selected */
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
            align-self: stretch;
        }

        /* Change color when the radio button is checked */
        input[type="radio"]:checked~.divcard .box1 {
            color: var(--appcolortone-secondary-1, #233656);
        }

        .button1 {
            background: #233656;
            border-radius: 33px;
            width: 118%;
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
            margin-left: -70px;
        }
    </style>
@endsection

@section('content')



            

            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);height: 100vh;">
                <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                    <div style="display: flex; align-items: center;">
                        <div
                            class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                            <a href="{{ route('wave.shopping') }}">
                                <button class type="button"
                                    style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                                    <i class="fas fa-chevron-left"></i></button></a>
                        </div>
                    </div>

                    <p class="shopping d-xl-flex justify-content-xl-center align-items-xl-center "
                        style="margin-bottom: 0px;height: 31px;text-align: center;margin-left:-140px;">
                        <strong>Ticket</strong></p>
                    <div>
                    </div>
                </div>
                <div class="d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center justify-content-xxl-center"
                    style="margin-bottom: 20px;margin-top: 50px;">
                    <div style="width: 50%;">
                        <div class="progress beautiful progress-xs" style="height: 8px; border-radius: 50px;">
                            <div class="progress-bar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"
                                style="width: 33%; background-color: #AAC9E4;"><span class="visually-hidden">33%</span>
                            </div>
                        </div>
                        <div style="margin-top: 50px;">
                            <p class="shopping" style="text-align: center;margin-left:-30px;">Date</p>
                            <p class="p16b" style="text-align: center;margin-left:30px;">Please select the date (1/3)</p>
                        </div>

                        <div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-bottom: 10px;">
                                <input type="radio" id="date" name="schedule" value="(15/7, Sat, 09:00-17:00)">
                                <div class="d-xxl-flex justify-content-xxl-start align-items-xxl-center divcard"
                                    style="margin-left: 30px;padding: 10px;padding-left: 30px;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;width: 90%;">
                                    <p class="box1 p1b" style="margin-bottom: 0px;padding-top: 5px;">(15/7, Sat,
                                        09:00-17:00)</p>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-bottom: 10px;">
                                <input type="radio" id="date1" name="schedule" value="(16/7, Sat, 09:00-17:00)">
                                <div class="d-xxl-flex justify-content-xxl-start align-items-xxl-center divcard"
                                    style="margin-left: 30px;padding: 10px;padding-left: 30px;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;width: 90%;">
                                    <p class="box1 p1b "style="margin-bottom: 0px;padding-top: 5px;">(16/7, Sat,
                                        09:00-17:00)</p>
                                </div>
                            </div>
                        </div>


                        <div class="d-xl-flex d-xxl-flex justify-content-xl-end justify-content-xxl-end align-items-xxl-center"
                            style="margin-top: 50px;">
                            <button id="nextButton" class="button1" type="button"
                                style="width: auto;padding-left: 20px;padding-right: 20px;">Next
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em"
                                    height="1em" fill="currentColor" style="margin-left: 20px;">
                                    <path
                                        d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </body>
@endsection

@section('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#nextButton').click(function() {
                // Get the value of the selected radio button
                var selectedSchedule = $("input[name='schedule']:checked").val();

                if (selectedSchedule) {
                    $.ajax({
                        url: 'buy-ticket1',
                        method: 'POST',
                        data: {
                            schedule: selectedSchedule
                        },
                        success: function(response) {
                            console.log(response);
                            window.location.href = 'buy-ticket2';
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    alert('Please select a schedule before proceeding.');
                    return false;
                }
            });
        });
    </script>
@endsection
