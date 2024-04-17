@extends('theme::layouts.customer')

@section('style')
    <style>
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

        .p24bb {
            color: var(--app-color-tone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
        }

        .p18bb {
            color: #171433;
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 18px;
            font-weight: 500;
            position: relative;
            align-self: stretch;
        }

        .p18b {
            color: rgba(23, 20, 51, 0.7);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
        }

        .textarea1 {
            border-style: none;
            padding: 30px 10px 30px 70px;
            inset: 0;
            border-radius: 20px;
            height: 220px;
            width: 100%;
            box-shadow: var(--app-drop-shadow-box-shadow,
                    0px 10px 20px 0px rgba(35, 54, 86, 0.5));
        }

        .button1 {
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
    </style>
@endsection

@section('content')


            


            <div class="d-flex flex-column" id="content-wrapper"
                style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 100%;">
                <div style="margin-bottom: 30px; position: absolute;"
                    onclick="window.location.href='{{ route('wave.enrollment') }}'"><button class="button2" type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></div>
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                    style="margin-bottom: 50px;height: 31px;"><strong>Change Course</strong></p>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center" placeholder="">
                    <div style="width: 50%;">
                        <div style="margin-bottom: 20px;">
                            <p class="p18b"
                                style="position: absolute;transform: translateX(49px) translateY(25px);opacity: 0.50;">
                                <strong>Change Course</strong></p>
                            <form id="changeCourseForm" action="/changecourse/reason" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ session('student_id') }}">
                                <select class="select1" id="course" name="course"
                                    style="width: 100%; padding-left: 45px; font-size: 20px;">
                                    <option value="" hidden>Please select</option>
                                    <!-- <option value="Full Term">Full Term</option>
                                    <option value="Flexible">Flexible</option>
                                    <option value="Private">Private</option> -->
                                    @foreach( $course_enrollments as $courseEnrollment )
                                        <option value="{{ $courseEnrollment['id'] }}">#{{ $courseEnrollment['enrollment_no'] }} - {{ optional($courseEnrollment['package']['course'])['course_name'] }}</option>
                                    @endforeach
                                </select>
                                <svg class="icn4" width="60" height="44" viewBox="0 0 30 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    style="position: absolute;width:3%;height:8%;margin-top:30px;margin-left:-100px;">
                                    <path
                                        d="M10.7816 11.5556L19.6803 2.65737C19.8851 2.45184 20 2.17356 20 1.88346C20 1.59337 19.8851 1.31509 19.6803 1.10956L19.0247 0.453935C18.8193 0.248802 18.541 0.133574 18.2507 0.133574C17.9605 0.133574 17.6821 0.248802 17.4768 0.453935L10.0042 7.92601L2.52325 0.445491C2.3177 0.240771 2.03941 0.125827 1.7493 0.125827C1.45918 0.125827 1.18089 0.240771 0.975344 0.445491L0.319681 1.10112C0.114949 1.30665 -4.49794e-07 1.58491 -4.37114e-07 1.87501C-4.24433e-07 2.1651 0.114949 2.44338 0.319681 2.64891L9.22858 11.5556C9.43521 11.7602 9.71426 11.875 10.0051 11.875C10.2959 11.875 10.5749 11.7602 10.7816 11.5556Z"
                                        fill="#171433" />
                                </svg>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <p class="text-start p18bb">Reason for changing the Course &amp; available time slot</p>
                        </div>
                        <div style="margin-bottom: 20px; height: 38%;"><img
                                src="{{ asset('themes/tailwind/images/clipboard-image-60.png') }}"
                                style="width: 30px;position: absolute;transform: translateX(25px) translateY(20px);">
                            <textarea class="textarea1" name="reason" id="reason" placeholder="Please specify..."></textarea>
                        </div>
                        <div>
                            
                        </div>

                        <div class="d-xxl-flex justify-content-xxl-center">
                            <button class="button1" type="button">Request for Change</button>
                        </div>
                        </form>
                        <div style="margin-top: 50px;">
                            <p class="p22bold"><img src="{{ asset('themes/tailwind/images/clipboard-image-55.png') }}"
                                    style="width: 37px;margin-right: 10px;"><strong>Note</strong></p>
                            <ul class="p18b" style="text-align: left;">
                                <li><strong>Parents should notify HKSA at 2295 6066 or email to
                                        knock@hkswimmingacademy.com</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
            <div class="modal fade modal2" role="dialog" tabindex="-1" id="modal-1" style="border-style: none;">
                <div class="modal-dialog modal-dialog-centered" role="document" style="padding-left: 150px;">
                    <div>
                        <div class="modal-body d-xl-flex flex-column justify-content-evenly align-items-xl-center"
                            style="height: 509px;border-radius: 200px;background: var(--app-color-tone-secondary-2, #AAC9E4);border-style: none;">
                            <img src="{{ asset('themes/tailwind/images/clipboard-image-61.png') }}"
                                style="width: 217px; margin-bottom: 20px;">
                            <p class="p20b" style="text-align:center;"><strong>The application was
                                    submitted.</strong><br><strong>You will receive a
                                    notification&nbsp;</strong><br><strong>later.</strong></p>
                            <button class="button1" type="button" data-bs-dismiss="modal"
                                style="width: 188px; margin-bottom: 30px;">Done</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // function submitChangesForm() {
    //     var formData = $('#changeCourseForm').serialize();
    //     console.log('Form Data:', formData);

    //     var apiUrl = "{{ config('services.api_url') }}/changecourse/reason";
    //     $.ajax({
    //         type: 'POST',
    //         url: apiUrl,
    //         data: formData,
    //         success: function(response) {
    //             // Handle the success response here
    //             console.log(response);
    //         },
    //         error: function(error) {
    //             // Handle the error response here
    //             console.log(error);
    //         }
    //     });
    // }

    $(document).ready(function() {
        $('#content-wrapper').on('click', '.button1', async function(e){
            e.preventDefault();

            const selectedCourse = $('select[name=course]').val();

            if( selectedCourse == "" ) {
                toastTopEnd("Warning", "Please select course before you proceed", "warning");

                return;
            }
                
            const reason = $('#reason').val();

            if( reason == "" ) {
                toastTopEnd("Warning", "Please fill in the reason field", "warning");

                return;
            }

            $(this).prop('disabled', true);
                
            const systemCourseClasses = <?= json_encode($course_enrollments) ?>;

            let selectedCourseEnrollment = systemCourseClasses.find(value => value.id == selectedCourse);
            
            let formData = {
                user_id: "{{ $student_id }}",
                package_id: selectedCourseEnrollment.package.id,
                course_enrollment_id: selectedCourseEnrollment.id,
                reason: reason,
                status: "processing",
                student_class_id: selectedCourseEnrollment.active_filtered_student_classes.length > 0 ? selectedCourseEnrollment.active_filtered_student_classes[0].id : null
            };
            
            await axios.post(`${getApiUrl()}/request/create-change-course`, formData, {
                headers: {
                    'Authorization': 'Bearer ' + getUserToken()
                }
            }).then(res => {
                if ( res.data.success ) {
                    $('#modal-1').modal('show');
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
            window.location = "{{ route('wave.changecourse') }}"
        });
    });
</script>
@endsection
