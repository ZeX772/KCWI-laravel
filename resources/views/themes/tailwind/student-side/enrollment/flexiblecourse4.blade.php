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
            text-align: center;
        }

        .p16b {
            color: rgba(23, 20, 51, 0.7);
            font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
            text-align: center;
        }

        .p13 {
            color: var(--app-color-tone-secondary-1-50percent, rgba(35, 54, 86, 0.5));
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
        }

        .frame {
            background: var(--app-color-tone-white, #ffffff);
            border-radius: 24px;
            padding: 12px 24px 12px 24px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            align-items: flex-start;
            justify-content: flex-start;
            align-self: stretch;
            flex-shrink: 0;
            position: relative;
            box-shadow: var(--app-drop-shadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .send-button {
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

        .send-button:disabled {
            opacity: 0.5;
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
                            <div class="progress-bar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%; background: var(--app-color-tone-testing, linear-gradient(180deg,rgba(127, 158, 211, 1) 0%, rgba(165, 208, 245, 1) 100%));">
                                <span class="visually-hidden">100%</span></div>
                        </div>
                        <div style="margin-top: 50px;">
                            <p class="p24b">Review</p>
                            <p class="p16b">Please review the details (4/4)</p>
                        </div>
                        <form id="enrollmentForm" action="/flexibleenrollreview" method="post">
                            @csrf
                            <div>
                                <?php 
                                    $countNumber = 0; 
                                    $totalFee = 0;
                                ?>
                                @foreach($course_classes as $courseClass)
                                    <?php 
                                        $countNumber++;
                                        $totalFee += floatVal($courseClass->class_data->course->course_full_price);
                                    ?>
                                    <div class="mb-3">
                                        <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;"><img
                                                src="{{ asset('themes/tailwind/images/clipboard-image-55.png') }}"
                                                style="width: 16px;margin-right: 10px;">
                                            <p class="p20b" style="margin-bottom: 0px;"><strong>Course Details ({{ $countNumber }})</strong></p>
                                        </div>
                                        <div class="d-xl-flex flex-column divcard frame" style="padding: 15px;padding-left: 30px;">
                                            <div class="d-xxl-flex flex-column align-items-xxl-start">
                                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                                    style="margin-bottom: 10px;">
                                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Course Type:
                                                    </p>
                                                    <p class="p13normal" style="margin-bottom: 0px;"><input type="hidden" id="type_of_course"
                                                        name="type_of_course" value="flexible_course">Flexible Course Enrollment</p>
                                                </div>
                                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                                    style="margin-bottom: 10px;">
                                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Course Code:
                                                    </p>
                                                    <p class="p13normal" style="margin-bottom: 0px;">{{ $courseClass->class_data->course_class_code }}</p>
                                                    <input type="hidden" style="display:none;" name="package_id" value="{{ $courseClass->class_data->package_id }}"></p>
                                                </div>
                                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                                    style="margin-bottom: 10px;">
                                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Level: </p>
                                                    <p class="p13normal" style="margin-bottom: 0px;">
                                                        {{ $courseClass->class_data->course->level->name }}</p>
                                                </div>
                                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                                    style="margin-bottom: 10px;">
                                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Venue: </p>
                                                    <p class="p13normal" style="margin-bottom: 0px;">
                                                        {{ $courseClass->class_data->course->venue->name }}</p>
                                                </div>
                                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                                    style="margin-bottom: 10px;">
                                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Facility: </p>
                                                    <p class="p13normal" style="margin-bottom: 0px;">
                                                        {{ $courseClass->class_data->course->facility->name }}</p>
                                                </div>
                                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                                    style="margin-bottom: 10px;">
                                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Date: </p>
                                                    <p class="p13normal" style="margin-bottom: 0px;">{{ $courseClass->class_data->start_date }}
                                                    </p>
                                                </div>
                                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Time: </p>
                                                    <p class="p13normal" style="margin-bottom: 0px;">
                                                        {{ date('h:iA', strtotime($courseClass->class_data->start_time)) }}-{{ date('h:iA', strtotime($courseClass->class_data->end_time)) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                    style="margin-top: 20px;margin-bottom: 10px;"><img
                                        src="{{ asset('themes/tailwind/images/clipboard-image-63.png') }}"
                                        style="width: 16px;margin-right: 10px;">
                                    <p class="p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;">
                                        <strong>Student Details</strong></p>
                                </div>
                                <div style="padding: 15px;padding-left: 30px;" class="divcard frame">
                                    <div class="d-xxl-flex flex-column align-items-xxl-start">
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                            style="margin-bottom: 10px;">
                                            <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Student Name:
                                            </p>
                                            <p class="p13normal" style="margin-bottom: 0px;">{{ session('selected_studentInfoName') }}</p>
                                        </div>
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                            style="margin-bottom: 10px;">
                                            <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Student ID:
                                            </p>
                                            <p class="p13normal" style="margin-bottom: 0px;"><input type="hidden" name="user_id" value="{{session('selected_studentInfoID')}}">{{session('selected_studentInfoID')}}</p>
                                        </div>
                                        {{-- <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                            <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Phone: </p>
                                            <p class="p13normal" style="margin-bottom: 0px;">6999 9999</p>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                    style="margin-top: 20px;margin-bottom: 10px;"><img
                                        src="{{ asset('themes/tailwind/images/clipboard-image-64.png') }}"
                                        style="width: 23px;margin-right: 10px;">
                                    <p class="p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;">
                                        <strong>Payment Review</strong></p>
                                </div>
                                <div style="padding: 15px;padding-left: 30px;" class="divcard frame">
                                    <div class="d-xxl-flex flex-column align-items-xxl-start">
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                            <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Total fee
                                                (RM): </p>
                                            <p class="p13normal" style="margin-bottom: 0px;">{{ $totalFee }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="p14normal"
                                        style="margin-top: 20px; color: var(--app-color-tone-secondary-1-50percent, rgba(35, 54, 86, 0.5));">
                                        *No need for any payment at current stage. After reviewing your request, we will
                                        send you a confirmtion for the payment. Once the fee is paid, the registration
                                        process is complete.</p>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="margin-top: 50px;">
                                <button class="button1 send-button" type="button">Send the Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal2" role="dialog" tabindex="-1" id="modal-1" style="border-style: none;">
            <div class="modal-dialog modal-dialog-centered" role="document" style="padding-left: 150px;">
                <div class="modal-body d-xl-flex flex-column justify-content-evenly align-items-xl-center"
                    style="position: absolute; height: 500px;border-radius: 200px;background: var(--app-color-tone-secondary-2, #AAC9E4);border-style: none;">
                    <img src="{{ asset('themes/tailwind/images/clipboard-image-61.png') }}"
                        style="width: 217px; margin-bottom: 20px;">
                    <p class="p20b" style="text-align:center; padding-bottom: 10px;"><strong>Enrollment form was
                            received.</br>We will send you a&nbsp;</strong><br><strong>confirmation.</strong></p><button
                        class="button1" type="button" data-bs-dismiss="modal"
                        style="padding: 10px 0px 10px 0px;width: 188px; color: #ffffff;background: var(--app-color-tone-secondary-1, #233656);box-shadow: var(--app-drop-shadow-box-shadow,0px 4px 4px 0px rgba(35, 54, 86, 0.5));border-radius: 30px;">Done</button></br>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(function() {
            $('#enrollmentForm').on('click', '.send-button', async function(e){
                e.preventDefault();

                $(this).prop('disabled', true);

                const user_id = <?= json_encode($user_id) ?>;
                const systemData = <?= json_encode($course_classes) ?>;
                const totalFee = <?= json_encode($totalFee) ?>;

                let formData = [];
                let packageIDs = [];
                let classes = [];
                systemData.forEach(element => {
                    const package = packageIDs.find(value => value == element.class_data.package_id)
                    if(! package ) {
                        packageIDs.push(element.class_data.package_id);
                        classes.push({
                            id: element.class_data.id
                        });
                    }
                });

                // Get the current date
                var currentDate = moment();

                // Add 7 days to the current date
                var futureDate = currentDate.add(7, 'days');

                // Format the date as "YYYY-MM-DD"
                var formattedDate = futureDate.format('YYYY-MM-DD');

                packageIDs.forEach(element => {
                    formData.push({
                        user_id: user_id,
                        package_id: element,
                        is_paid: 0,
                        type_of_course: "flexible_course",
                        course_classes: classes,
                        payment_methods: [
                            {
                                payment_method: "PayMe",
                                total_fee: totalFee,
                                payment_date: formattedDate,
                                remarks: "From customer site",
                            }
                        ]
                    });
                });

                await axios.post(`${getApiUrl()}/student/bulk-enroll-course`, formData, {
                        headers: {
                            'Authorization': 'Bearer ' + getUserToken()
                        }
                    }).then(res => {
                        if ( res.data.success ) {
                            $('#modal-1').modal('show');

                            $(this).removeAttr('disabled');
                        } else {
                            toastInfo("Cant' Save", res.data.message, "warning");

                            $(this).removeAttr('disabled');
                        }
                    }).catch(error => {
                        $(this).removeAttr('disabled');

                        if( error.response.status == 400 || error.response.status == 422 ) {
                            let errorMessages = "";
                            Object.keys(error.response.data.errors).forEach(key => {
                                error.response.data.errors[key].forEach(value => {
                                    errorMessages += (`<p>${key}: ` + value + '</p><br>')

                                    toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                                });
                            });
                        }

                        if( error.response.status == 404 ) {
                            toastTopEnd("Cant' Process", error.response.data.message, "warning");
                        }

                        if( error.response.status == 500 ) {
                            toastTopEnd("System Error", error.response.data.message, "error");
                        }

                        if( error.response.status == 401 ) {
                            alert("Your session expired!");
                            window.location = window.location;
                        }

                        console.error('Error fetching data:', error);
                    });
            });

            $('#modal-1').on('hidden.bs.modal', function (e) {
                window.location = "{{ route('wave.enrollment') }}"
            });
        });
    </script>
@endsection
