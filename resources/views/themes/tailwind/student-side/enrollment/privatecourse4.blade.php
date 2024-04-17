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

        .p18b {
            color: rgba(23, 20, 51, 0.7);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
        }

        .select1 {
            background: #f1f2f9;
            border-radius: 83px;
            border-style: solid;
            border-color: var(--app-color-tone-secondary-2-50percent,
                    rgba(170, 201, 228, 0.5));
            border-width: 5px;
            padding: 20px 40px 0px 40px;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: flex-start;
            flex-shrink: 0;
            width: 710px;
            height: 100px;
            box-shadow: var(--app-drop-shadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
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

        .btn3-check {
            position: absolute;
            clip: rect(0, 0, 0, 0);
            pointer-events: none;
        }
        input[type="radio"]:checked {
            accent-color: black;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* Two columns */
            grid-template-rows: repeat(2, auto);
            /* Two rows */
            gap: 10px;
            /* Gap between grid items */
        }
        .grid-container .grid-item {
            padding: 10px 20px;
            border-radius: 25px;
            background-color: #fff;
            box-shadow: var(--app-drop-shadow-box-shadow, 0px 4px 4px 0px rgba(35, 54, 86, 0.5));
            cursor: pointer;
        }
        .grid-container .grid-item.selected {
            background-color: #233656 !important;
            color: #fff;
        }
    </style>
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 100%;">
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                    style="margin-bottom: 0px;height: 31px;"><strong>Private Course Enrollment</strong></p>
                <div style="margin-bottom: 30px; position: absolute;" onclick="goBack()"><button class="button2"
                        type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></div>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                    <div style="width: 50%; padding-top: 30px;">
                        <div class="progress beautiful progress-xs"
                            style="height: 8px;border-top-left-radius: 50px;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-bottom-left-radius: 50px;">
                            <div class="progress-bar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                style="width: 80%; background: var(--app-color-tone-testing, linear-gradient(180deg,rgba(127, 158, 211, 1) 0%, rgba(165, 208, 245, 1) 100%));">
                                <span class="visually-hidden">80%</span></div>
                        </div>
                        <div style="margin-top: 50px;">
                            <p class="p24b" style="text-align: center;">Schedule</p>
                            <p class="p16b" style="text-align: center;">Please select the venue (3/4)</p>
                        </div>
                        <div class="course-classes_day_container" style="margin-bottom: 20px;position: relative;">
                            <p class="p18b" style="position: absolute; opacity: 0.50; top: 35px; left: 44px;"><strong>Choose Day <span class="text-danger">*</span></strong></p>
                            <select id="course-classes_day" class="textField select1" style="width: 100%;margin-top:10px;">
                                <option value="" hidden>Please select day</option>
                                @if(isset($course_classes['response']) && $course_classes['response'] !== null)
                                    @foreach($course_classes['response'] as $entry)
                                        <option value="{{ $entry['start_date'] }}">{{ $entry['start_date'] }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <svg class="icn4" width="60" height="44" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: absolute;width:6%;height:30%;margin-top:60px;margin-left:-80px;">
                                <path d="M10.7816 11.5556L19.6803 2.65737C19.8851 2.45184 20 2.17356 20 1.88346C20 1.59337 19.8851 1.31509 19.6803 1.10956L19.0247 0.453935C18.8193 0.248802 18.541 0.133574 18.2507 0.133574C17.9605 0.133574 17.6821 0.248802 17.4768 0.453935L10.0042 7.92601L2.52325 0.445491C2.3177 0.240771 2.03941 0.125827 1.7493 0.125827C1.45918 0.125827 1.18089 0.240771 0.975344 0.445491L0.319681 1.10112C0.114949 1.30665 -4.49794e-07 1.58491 -4.37114e-07 1.87501C-4.24433e-07 2.1651 0.114949 2.44338 0.319681 2.64891L9.22858 11.5556C9.43521 11.7602 9.71426 11.875 10.0051 11.875C10.2959 11.875 10.5749 11.7602 10.7816 11.5556Z" fill="#171433" />
                            </svg>
                        </div>

                        <form id="radioForm" action="{{route('wave.storePrivateCourseSchedule')}}" method="POST">
                            @csrf
                            <p class="p18b" style="text-align: left;"><strong>Time Slot</strong></p>
                            <input type="hidden" name="class_id" value="">
                            @if(isset($course_classes['response']) && $course_classes['response'] !== null)
                                <div class="available-course_classes_time grid-container">
                                    Please select course class day first
                                </div>
                            @else
                            <!-- Handle the case where levels are not available -->
                            <p style="text-align: center;">No schedule available</p>
                            @endif
                            <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center"
                                style="margin-top: 50px;">
                                <div><button class="button1 previous-button" type="button"
                                        onclick="window.location.href='{{ route('wave.privatecourse3') }}'"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em"
                                            height="1em" fill="currentColor" style="margin-right: 20px;">
                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z">
                                            </path>
                                        </svg>Previous</button></div>
                                <div><button class="button1 next-button" type="submit">Next<svg
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
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </body>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(function() {
            $('.course-classes_day_container').on('change', '#course-classes_day', function(){
                const selectedStartDate = $(this).val();
                
                const systemCourseClasses = <?= json_encode($course_classes['response']) ?>;
                
                const filteredArray = systemCourseClasses.filter(obj => obj.start_date === selectedStartDate);
                console.log(filteredArray)
                $('#radioForm .available-course_classes_time').empty();
                filteredArray.forEach(element => {
                    $('#radioForm .available-course_classes_time').append(renderCourseClassesTime(element));
                });
            });

            $('.available-course_classes_time').on('click', '.grid-item', function(){
                const selectedClassID = $(this).data('class_id');
                if( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                    $('#radioForm input[name=class_id]').val('');
                } else {
                    $('.available-course_classes_time .grid-item').removeClass('selected');
                    $(this).addClass('selected');
                    $('#radioForm input[name=class_id]').val(selectedClassID);
                }
            });

            $('#radioForm').on('click', '.next-button', function(e){
                e.preventDefault();
                if(! $('#radioForm input[name=class_id]').val() ) {
                    toastTopEnd("Warning", "Please select time", "warning");
                    return;
                }
                $('#radioForm').submit();
            })
        
            /**
             * * Functions
             */
            function renderCourseClassesTime(courseClass)
            {
                return `<div class="grid-item" data-class_id="${courseClass.id}">
                            <span>${courseClass.start_time} - ${courseClass.end_time}</span>
                        </div>`;
            }
        });
    
    </script>
        
@endsection
