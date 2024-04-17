@extends('theme::layouts.customer')

@section('style')
    <style>
        .p24bb {
            color: var(--app-color-tone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
        }

        .p16b {
            color: rgba(23, 20, 51, 0.7);
            font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
        }

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

        .start-enrollment-button {
            background: var(--app-color-tone-secondary-1, #233656);
            box-shadow: var(--app-drop-shadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
            border-radius: 30px;
            flex-shrink: 0;
            color: #ffffff;
            text-align: center;
            font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
            top: calc(50% - 8.5px);
            padding: 10px 30px 10px 30px;
            width: 100%;
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
                    style="margin-bottom: 0px;height: 31px;"><strong>Private Course Enrollment</strong></p>
                <div style="margin-bottom: 30px; position: absolute;"
                    onclick="window.location.href='{{ route('wave.enrollment') }}'"><button class="button2" type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></div>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                    <div style="width: 50%; padding-top: 30px;">
                        <div class="progress beautiful progress-xs"
                            style="height: 8px;border-top-left-radius: 50px;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-bottom-left-radius: 50px;">
                            <div class="progress-bar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                style="width: 20%; background: var(--app-color-tone-testing, linear-gradient(180deg,rgba(127, 158, 211, 1) 0%, rgba(165, 208, 245, 1) 100%));">
                                <span class="visually-hidden">20%</span></div>
                        </div>
                        <div style="margin-top: 50px;">
                            <p class="p16b" style="text-align: center;margin-bottom: 50px;">Please select the Class type
                            </p>
                        </div>
                        <form id="radioForm" action="{{route('wave.storePrivateCourseClassType')}}" method="post" onsubmit="return validate();">
                            @csrf
                            @if (!empty($courseTypes) && isset($courseTypes['response']))
                                @foreach ($courseTypes['response'] as $coursetype)
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                    style="margin-bottom: 10px;"><input type="radio" name="class_type_id" id="option1"
                                        value="{{ $coursetype['id'] }}">
                                    <div class="d-xxl-flex justify-content-xxl-start align-items-xxl-center divcard frame"
                                        style="margin-left: 30px;padding: 10px;padding-left: 30px;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;width: 90%;">
                                        <p class="p14b" style="margin-bottom: 0px;">{{ $coursetype['name'] }}</p>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p>No course types available.</p>
                            @endif
                            <div class="d-xl-flex d-xxl-flex justify-content-xl-end justify-content-xxl-end align-items-xxl-center"
                                style="margin-top: 50px;"><button class="button1 start-enrollment-button"
                                    type="submit">Start the Enrollment</button></div>
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
        var radioButtons = document.getElementsByName('class_type_id');
        var isChecked = false;

        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked) {
                isChecked = true;
                break;
            }
        }

        if (!isChecked) {
            toastTopEnd("Warning", "Please select before proceeding.", "warning");
            
            return false;
        }

        return true;
    }

</script>
@endsection
