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

    .p20b {
        color: rgba(23, 20, 51, 0.8);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 20px;
        font-weight: 600;
        position: relative;
    }

    .p16b {
        color: rgba(23, 20, 51, 0.7);
        font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
    }

    .class-code {
        color: var(--app-color-tone-secondary-2, #aac9e4);
        text-align: left;
        font-family: "Barlow-Medium", sans-serif;
        font-size: 13px;
        font-weight: 500;
        position: relative;
    }

    .price {
        color: var(--app-color-tone-primary, #171433);
        text-align: right;
        font-family: "Barlow-Medium", sans-serif;
        font-size: 13px;
        font-weight: 500;
        position: relative;
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

    .previous-button {
        background: rgba(170, 201, 228, 0.50);
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        color: #171433;
        text-align: left;
        font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
        top: calc(50% - 8.5px);
        border-radius: 30px;
        flex-shrink: 0;
        padding: 10px 20px 10px 20px;
    }

    input[type="radio"]:checked {
        accent-color: black;
    }

    .disabled {
        pointer-events: none;
        opacity: 0.5;
    }
</style>
@endsection
@section('content')

<div class="d-flex flex-column" id="content-wrapper" style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 100%;">
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 0px;height: 31px;"><strong>Full Term Enrollment</strong></p>
    <div style="margin-bottom: 30px; position: absolute;" onclick="window.location.href='{{ route('wave.enrollment') }}'"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></div>
    <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
        <div style="width: 50%; padding-top: 30px;">
            <div class="progress beautiful progress-xs" style="height: 8px;border-top-left-radius: 50px;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-bottom-left-radius: 50px;">
                <div class="progress-bar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; background: var(--app-color-tone-testing, linear-gradient(180deg,rgba(127, 158, 211, 1) 0%, rgba(165, 208, 245, 1) 100%));"><span class="visually-hidden">75%</span></div>
            </div>
            <div style="margin-top: 50px;">
                <p class="p24b" style="text-align: center;">Schedule</p>
                <p class="p16b" style="text-align: center;">Please select the Course (3/4)</p>
            </div>
            <form id="radioForm" action="{{route('wave.storeFullTermEnrollSchedule')}}" method="post" onsubmit="return validate();">
                @csrf
                @if(isset($levels['response']) && $levels['response'] !== null && isset($levels['response']['levels']))
                    @foreach($levels['response']['levels'] as $Level)
                        @foreach($Level['courses'] as $course)
                            
                            <div class="d-xl-flex d-xxl-flex align-items-xl-start align-items-xxl-center {{ count($course['course_classes']) > 0 ? '' : 'disabled' }}" style="margin-bottom: 10px;">
                                <input type="radio" style="margin-right: 20px;margin-top: 20px;" name="course_id" id="option1" value="{{ $course['id'] }}">
                                <div class="accordion" role="tablist" id="accordion-1" style="border-radius: 24px 24px 0px 0px;background: #FFF;box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);margin-bottom: 20px;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;width: 100%;">
                                    <h2 class="accordion-header" role="tab" style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;">
                                        <button class="accordion-button d-xl-flex p18b" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-{{$course['id']}}" aria-expanded="false" aria-controls="accordion-1 .item-{{$course['id']}}" style="background: rgb(253,254,255);color: #171433;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;">
                                            <?php
                                                // Initialize starting and end dates with null
                                                $startDate = null;
                                                $endDate = null;

                                                // Iterate over the array to find the earliest and latest dates
                                                foreach ($course['course_classes'] as $object) {
                                                    $date = $object['start_date'];
                                                    
                                                    // Check if the current date is earlier than the current start date
                                                    if ($startDate === null || $date < $startDate) {
                                                        $startDate = $date;
                                                    }
                                                    
                                                    // Check if the current date is later than the current end date
                                                    if ($endDate === null || $date > $endDate) {
                                                        $endDate = $date;
                                                    }
                                                }
                                            ?>
                                            
                                            <strong>
                                                @if( $startDate )
                                                    {{ $startDate }} - {{ $endDate }}
                                                @else
                                                    No Schedule Found
                                                @endif
                                                </br>
                                                <h2 class="class-code" style="margin-top: 5px; margin-bottom: 1px;">{{ $course['course_name'] }}<span class="price" style="padding-left: 20px;">HK$ {{ $course['course_full_price'] }}</span></h2>
                                            </strong></button></h2>
                                    <div class="accordion-collapse collapse show item-{{$course['id']}}" role="tabpanel" data-bs-parent="#accordion-1" style="border-top-style: solid;border-top-color: rgba(35, 54, 86, 0.50);">
                                        <div class="accordion-body">
                                            @if( count($course['course_classes']) > 0 )
                                                @foreach($course['course_classes'] as $key => $courseClass)
                                                    <div class="d-xl-flex justify-content-between align-items-xl-center" style="padding-bottom: 10px;border-bottom-width: 1px;border-bottom-style: solid;">
                                                        <div>
                                                            <p class="p20b" style="margin-bottom: 0px;">{{ $courseClass['start_date'] }}</p>
                                                            <p class="p16b" style="margin-bottom: 0px;text-align: left;">{{ $courseClass['start_time'] }}-{{ $courseClass['end_time'] }}</p>
                                                        </div>
                                                        <div>
                                                            <p class="p16b" style="margin-bottom: 0px; color: var(--app-color-tone-secondary-1-50percent, rgba(35, 54, 86, 0.5));">{{ optional($courseClass['course']['facility'])['name'] }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>No class available</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
                    @endforeach
                @else
                <!-- Handle the case where levels are not available -->
                <p style="text-align: center;">No schedule available</p>
                @endif
                <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="margin-top: 50px;">
                    <div><button class="button1 previous-button" type="button" onclick="window.location.href='{{ route('wave.fulltermenrollment2') }}'"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 20px;">
                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"></path>
                            </svg>Previous</button></div>
                    <div><button class="button1 next-button" type="submit">Next<svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-left: 20px;">
                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                            </svg></button></div>
            </form>
        </div>
    </div>
</div>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>


</body>

@endsection
@section('javascript')
<script>
    function validate() {
        var radioButtons = document.getElementsByName('course_id');
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
