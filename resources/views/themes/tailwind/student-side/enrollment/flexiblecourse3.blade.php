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

        .pika-button:hover,
        .pika-row.pick-whole-week:hover .pika-button {
            color: #fff;
            background: var(--app-color-tone-secondary-1, #233656);
            box-shadow: var(--app-drop-shadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
            border-radius: 3px;
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
    
        .grid-items {
            border-radius: 25px;
            background: #fff;
            padding: 10px 20px;
        }

        .grid-items.active {
            background: #233656;
            color: #fff;
        }

        .cursor-pointer {
            cursor: pointer;
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
                    <div id="form-class_main_container" style="width: 50%; padding-top: 30px;">
                        <div class="progress beautiful progress-xs"
                            style="height: 8px;border-top-left-radius: 50px;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-bottom-left-radius: 50px;">
                            <div class="progress-bar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                style="width: 75%; background: var(--app-color-tone-testing, linear-gradient(180deg,rgba(127, 158, 211, 1) 0%, rgba(165, 208, 245, 1) 100%));">
                                <span class="visually-hidden">75%</span></div>
                        </div>
                        <div style="margin-top: 50px;">
                            <p class="p24b" style="text-align: center;">Schedule</p>
                            <p class="p16b" style="text-align: center;">Please select the venue (3/4)</p>
                        </div>
                        <form id="radioForm" action="{{route('wave.storeFlexibleCourseSchedule')}}" method="post" class="mb-2">
                            <input type="hidden" name="class_data">
                            <div class="class-form mb-3">
                                <div class="class-form_item form-1 mb-3" data-form_key="1" style="border-bottom: 1px solid #c9ced7;">
                                    <p class="p18b mb-0" style="text-align: left;"><strong>Class (1)</strong></p>
                                    <div class="class-selection_container" style="margin-bottom: 20px;position: relative;">
                                        <p class="p18b" style="position: absolute;opacity: 0.50; top: 30px; left: 44px;"><strong>Choose Day</strong></p>
                                        <select id="classSelect" name="class_days" data-form_key="1" class="textField select1" style="width: 100%;margin-top:10px;">
                                            <option value="" hidden>Please select the Class</option>
                                            <?php
                                                $courseClassesDates = [];
                                            ?>
                                            @if(isset($levels['response']) && $levels['response'] !== null && isset($levels['response']['levels']))
                                                @foreach($levels['response']['levels'] as $Level)
                                                    @foreach($Level['courses'] as $course)
                                                        @foreach($course['course_classes'] as $key => $courseClass)
                                                            @if(! in_array( $courseClass['start_date'], $courseClassesDates ) )
                                                                <option value="{{ $courseClass['start_date'] }}">{{ $courseClass['start_date'] }}</option>
                                                            @endif
                                                            <?php
                                                                if(! in_array( $courseClass['start_date'], $courseClassesDates ) )
                                                                    $courseClassesDates[] = $courseClass['start_date'];
                                                            ?>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        </select>
                                        <svg class="icn4" width="60" height="44" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: absolute;width:6%;height:30%;margin-top:60px;margin-left:-80px;">
                                            <path d="M10.7816 11.5556L19.6803 2.65737C19.8851 2.45184 20 2.17356 20 1.88346C20 1.59337 19.8851 1.31509 19.6803 1.10956L19.0247 0.453935C18.8193 0.248802 18.541 0.133574 18.2507 0.133574C17.9605 0.133574 17.6821 0.248802 17.4768 0.453935L10.0042 7.92601L2.52325 0.445491C2.3177 0.240771 2.03941 0.125827 1.7493 0.125827C1.45918 0.125827 1.18089 0.240771 0.975344 0.445491L0.319681 1.10112C0.114949 1.30665 -4.49794e-07 1.58491 -4.37114e-07 1.87501C-4.24433e-07 2.1651 0.114949 2.44338 0.319681 2.64891L9.22858 11.5556C9.43521 11.7602 9.71426 11.875 10.0051 11.875C10.2959 11.875 10.5749 11.7602 10.7816 11.5556Z" fill="#171433" />
                                        </svg>
                                    </div>

                                    <div id="radioForm" class="mb-2">
                                        <p class="p18b" style="text-align: left;"><strong>Time Slot</strong></p>
                                        <div class="time-slot_container form-1">
                                            <div class="grid-container">
                                                <p>Please choose day</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="new-class_btn_container cursor-pointer d-none" style="border-radius: 25px; padding: 4px 15px; border: 1px solid; display: inline-block;">
                                <div><i class="fa-solid fa-plus"></i> Add Class</div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center"
                                style="margin-top: 50px;">
                                <div>
                                    <button class="button1 previous-button" type="button"
                                        onclick="window.location.href='{{ route('wave.flexiblecourse2') }}'"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em"
                                            height="1em" fill="currentColor" style="margin-right: 20px;">
                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z">
                                            </path>
                                        </svg>Previous</button>
                                </div>
                                <div>
                                    <button class="button1 next-button" type="submit">Next<svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em"
                                            height="1em" fill="currentColor" style="margin-left: 20px;">
                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
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
        var classLists = [];
        var selectedClassData = [];

        $(function() {
            initializeClassLists();

            // * Events
            $('.class-form').on('change', '.class-selection_container select[name=class_days]', function(){
                const selectedDay = $(this).val();
                const formKey = $(this).data('form_key');

                $('.new-class_btn_container').addClass('d-none');

                selectedClassData = [];

                renderTimeSlots(selectedDay, formKey)
            });

            $('.class-form').on('click', '.time-slot_container .grid-items', function(){
                const formKey = $(this).data('form_key');

                $(`.grid-items.form-${formKey}`).removeClass('active');

                $(this).addClass('active');

                const classID = $(this).data('class_id');
                const selectedClass = classLists.find(value => value.id == classID);
                
                const selectedClassIndex = selectedClassData.findIndex(value => value.form_key == formKey);

                if( selectedClassIndex != -1 ) {
                    selectedClassData[selectedClassIndex] = {
                        form_key: formKey,
                        class_id: selectedClass.id,
                        class_data: selectedClass
                    };
                } else {
                    selectedClassData.push({
                        form_key: formKey,
                        class_id: selectedClass.id,
                        class_data: selectedClass
                    });
                }

                showAddClassButton();
            });

            $('.class-form').on('click', '.remove-form_btn', function(){
                const formKey = $(this).data('form_key');

                $(`.class-form_item.form-${formKey}`).remove();

                selectedClassDataIndex = selectedClassData.findIndex(value => value.form_key == formKey);
                selectedClassData.splice(selectedClassDataIndex, 1);

                const currentFormList = $('.class-form .class-form_item');
                
                let classFormCount = 1;
                currentFormList.each(function() {
                    const newFormKey = $(this).data('form_key');
                    
                    $(`.class-form .class-form_item.form-${newFormKey} .form-label strong`).text(`Class (${classFormCount})`);
                    classFormCount++;
                });

                showAddClassButton();
            });

            $('#form-class_main_container').on('click', '.new-class_btn_container', function(){
                $('.class-form').append(renderNewClass());

                $('.new-class_btn_container').addClass('d-none');
            });

            $('form').on('click', '.next-button', function(e){
                e.preventDefault();

                // add the selected items to the input before proceeding
                if( selectedClassData.length <= 0 )
                    toastTopEnd("Warning", "Select atleast 1 class time slot", "warning");

                $('form input[name=class_data]').val(JSON.stringify(selectedClassData));

                $('#radioForm').submit();
            })

            // * Functions
            function initializeClassLists()
            {
                const systemData = <?= json_encode($levels['response']['levels']) ?>;

                systemData.forEach(data => {
                    data.courses.forEach(course => {
                        course.course_classes.forEach(courseClass => {
                            classLists.push(courseClass);
                        });
                    });
                });
            }

            function renderTimeSlots(date, formKey)
            {
                let matchedClassesDay = [];
                classLists.forEach(courseClass => {
                    if( courseClass.start_date == date ) {
                        const exists = selectedClassData.find(value => value.class_id == courseClass.id);
                        if(! exists )
                            matchedClassesDay.push(courseClass);
                    }
                        
                });

                $(`.time-slot_container.form-${formKey} .grid-container`).empty();
                if( matchedClassesDay.length > 0 ) {
                    matchedClassesDay.forEach(courseClass => {
                        $(`.time-slot_container.form-${formKey} .grid-container`).append(`<div class="grid-items form-${formKey} cursor-pointer" data-form_key="${formKey}" data-class_id="${courseClass.id}">${courseClass.start_time} - ${courseClass.end_time}</div>`);
                    });
                } else {
                    $(`.time-slot_container.form-${formKey} .grid-container`).append(`<p>No class time available</p>`);
                }
            }

            function renderNewClass()
            {
                const randomFormKey = getRandomNumber(2, 5000);

                let courseSelection = '';
                let courseClassesDates = [];
                classLists.forEach(element => {
                    isExists = courseClassesDates.find(value => value == element.start_date)
                    if(! isExists ) {
                        courseSelection += `<option value="${element.start_date}">${element.start_date}</option>`;

                        courseClassesDates.push(element.start_date);
                    }
                });

                const totalCurrentForm = $('.class-form_item').length;

                return `<div class="class-form_item form-${randomFormKey} mb-3" data-form_key="${randomFormKey}" style="border-bottom: 1px solid #c9ced7;">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="p18b mb-0 form-label" style="text-align: left;"><strong>Class (${totalCurrentForm + 1})</strong></p>
                                    <span class="remove-form_btn" data-form_key="${randomFormKey}"><i class="fa-regular fa-circle-xmark"></i></span>
                                </div>
                                <div class="class-selection_container" style="margin-bottom: 20px;position: relative;">
                                    <p class="p18b" style="position: absolute;opacity: 0.50; top: 30px; left: 44px;"><strong>Choose Day</strong></p>
                                    <select id="classSelect" name="class_days" data-form_key="${randomFormKey}" class="textField select1" style="width: 100%;margin-top:10px;">
                                        <option value="" hidden>Please select the Class</option>
                                        ${courseSelection}
                                    </select>
                                    <svg class="icn4" width="60" height="44" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: absolute;width:6%;height:30%;margin-top:60px;margin-left:-80px;">
                                        <path d="M10.7816 11.5556L19.6803 2.65737C19.8851 2.45184 20 2.17356 20 1.88346C20 1.59337 19.8851 1.31509 19.6803 1.10956L19.0247 0.453935C18.8193 0.248802 18.541 0.133574 18.2507 0.133574C17.9605 0.133574 17.6821 0.248802 17.4768 0.453935L10.0042 7.92601L2.52325 0.445491C2.3177 0.240771 2.03941 0.125827 1.7493 0.125827C1.45918 0.125827 1.18089 0.240771 0.975344 0.445491L0.319681 1.10112C0.114949 1.30665 -4.49794e-07 1.58491 -4.37114e-07 1.87501C-4.24433e-07 2.1651 0.114949 2.44338 0.319681 2.64891L9.22858 11.5556C9.43521 11.7602 9.71426 11.875 10.0051 11.875C10.2959 11.875 10.5749 11.7602 10.7816 11.5556Z" fill="#171433" />
                                    </svg>
                                </div>

                                <div id="radioForm" class="mb-2">
                                    @csrf
                                    <p class="p18b" style="text-align: left;"><strong>Time Slot</strong></p>
                                    <div class="time-slot_container form-${randomFormKey}">
                                        <div class="grid-container">
                                            <p>Please choose day</p>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            }

            function showAddClassButton()
            {
                // check if there's a selected item
                const gridItems = $('.class-form .time-slot_container .grid-items');

                let hasSelectedItem = false;
                gridItems.each(function(){
                    const formKey = $(this).data('form_key');

                    hasSelectedDataFromKey = selectedClassData.find(value => value.form_key == formKey);
                    if( hasSelectedDataFromKey )
                        hasSelectedItem = true;
                    else
                        hasSelectedItem = false;
                });

                if( hasSelectedItem )
                    $('.new-class_btn_container').removeClass('d-none');
                else
                    $('.new-class_btn_container').addClass('d-none');
            }

            function getRandomNumber(min, max) {
                // Generate a random number between min (inclusive) and max (exclusive)
                return Math.floor(Math.random() * (max - min) + min);
            }
        });
    </script>

@endsection