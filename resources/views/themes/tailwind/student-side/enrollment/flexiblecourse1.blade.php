@extends('theme::layouts.customer')

@section('style')
    <style>
        .frame {
            background: #ffffff;
            border-radius: 15px;
            padding: 12px 24px 12px 24px;
            display: flex;
            flex-direction: row;
            gap: 15px;
            align-items: center;
            justify-content: center;
            flex: 1;
            position: relative;
            box-shadow: var(--app-drop-shadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

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

        .p16b {
            color: rgba(23, 20, 51, 0.7);
            font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
        }

        .next-button {
            background: var(--app-color-tone-secondary-1, #233656);
            box-shadow: var(--app-drop-shadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
            border-radius: 30px;
            flex-shrink: 0;
            color: #ffffff;
            text-align: left;
            font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
            top: calc(50% - 8.5px);
            padding: 10px 30px 10px 30px;
        }

        input[type="radio"]:checked {
            accent-color: black;
        }
    </style>
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 100%;">
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                    style="margin-bottom: 0px;height: 31px;"><strong>Flexible Course Enrollment</strong></p>
                <div style="margin-bottom: 30px; position: absolute;"
                    onclick="window.location.href='{{ route('wave.enrollment') }}'"><button class="button2" type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></div>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                    <div style="width: 50%; padding-top: 30px;">
                        <div class="progress beautiful progress-xs"
                            style="height: 8px;border-top-left-radius: 50px;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-bottom-left-radius: 50px;">
                            <div class="progress-bar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                                style="width: 25%; background: var(--app-color-tone-testing, linear-gradient(180deg,rgba(127, 158, 211, 1) 0%, rgba(165, 208, 245, 1) 100%));">
                                <span class="visually-hidden">25%</span></div>
                        </div>
                        <div style="margin-top: 50px;">
                            <p class="p24b" style="text-align: center;">Level</p>
                            <p class="p16b" style="text-align: center;">Please select the level (1/4)</p>
                        </div>
                        <form id="radioForm" action="{{route('wave.storeFlexibleCourseLevel')}}" method="post" onsubmit="return validate();">
                            @csrf
                            @if(isset($levels['response']) && $levels['response'] !== null && isset($levels['response']['levels']))
                            @foreach($levels['response']['levels'] as $level)
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                                    <input type="radio" name="levelFlexible" id="option1" value="{{ $level['id'] }}">
                                    <div class="d-xxl-flex justify-content-xxl-start align-items-xxl-center divcard frame" style="margin-left: 30px;padding: 10px;padding-left: 30px;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px; width: 90%;">
                                        <p class="p14b" style="margin-bottom: 0px;">{{ $level['name'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Handle the case where levels are not available -->
                            <p style="text-align: center;">No levels available</p>
                        @endif

                            <div class="d-xl-flex d-xxl-flex justify-content-xl-end justify-content-xxl-end align-items-xxl-center"
                                style="margin-top: 50px;"><button class="button1 next-button" type="submit">Next<svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em"
                                        height="1em" fill="currentColor" style="margin-left: 20px;">
                                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                        <path
                                            d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                        </path>
                                    </svg></button></div>
                        </form>
                    </div>
                </div>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </body>
@endsection

@section('javascript')
    <script>
        function validate() {
            var radioButtons = document.getElementsByName('levelFlexible');
            var isChecked = false;

            for (var i = 0; i < radioButtons.length; i++) {
                if (radioButtons[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            if (!isChecked) {
                alert('Please select before proceeding.');
                return false;
            }

            return true;
        }
    </script>
@endsection
