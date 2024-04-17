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

        .p16b {
            color: rgba(23, 20, 51, 0.7);
            font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
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

        .button {
            background: var(--app-color-tone-secondary-1, #233656);
            box-shadow: var(--app-drop-shadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
            border-radius: 10px;
            width: 20%;
            padding-left: 20px;
            padding-right: 20px;
            color: #ffffff;
            text-align: center;
            font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
            height: 35px;
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
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                    style="margin-bottom: 0px;height: 31px;"><strong>Competition Enrollment</strong></p>
                <div style="margin-bottom: 30px; position: absolute;"><button class="button2"  onclick="window.location.href='{{ route('wave.enrollment') }}'" type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></div>

                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                    <div style="width: 50%; padding-top: 30px;" class="competition-details_container">
                        <div class="progress beautiful progress-xs"
                            style="height: 8px;border-top-left-radius: 50px;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-bottom-left-radius: 50px;">
                            <div class="progress-bar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%; background: var(--app-color-tone-testing, linear-gradient(180deg,rgba(127, 158, 211, 1) 0%, rgba(165, 208, 245, 1) 100%));">
                                <span class="visually-hidden">100%</span></div>
                        </div>
                        <div style="margin-top: 50px;">
                            <p class="p24b" style="text-align: center;">Review</p>
                            <p class="p16b" style="text-align: center;">Please review the details (2/2)</p>
                        </div>
                        <div>
                            <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;"><img
                                    src="{{ asset('themes/tailwind/images/clipboard-image-55.png') }}"
                                    style="width: 16px;margin-right: 10px;">
                                <p class="p20b" style="margin-bottom: 0px;"><strong>Course Details</strong></p>
                            </div>
                            <div class="d-xl-flex flex-column divcard frame" style="padding: 15px;padding-left: 30px;">
                                <div class="d-xxl-flex flex-column align-items-xxl-start">
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Course Type: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">Competition Enrollment</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Competition Code: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ optional($entry['competition'])['competition_code'] }}</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Categories: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ optional($entry['category']['category'])['name'] }} <br/> ({{ optional($entry['category'])['start_date'] }} {{ optional($entry['category'])['start_time'] }}-{{ optional($entry['category'])['end_time'] }})</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Venue: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ optional($entry['competition']['school_venue'])['name'] }}</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Date: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ optional($entry['competition'])['start_date'] }}</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Time: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ optional($entry['competition'])['start_time']}}-{{optional($entry['competition'])['end_time'] }}</p>
                                    </div>
                                </div>
                            </div>
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
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Student Name: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ optional($student_data)['name'] }}</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Student ID: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ optional($student_data['student_information'])['hkid'] }}</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Phone: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ optional($student_data['student_information'])['phone'] }}</p>
                                    </div>
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
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Total fee (HK$):
                                        </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ optional($entry['competition'])['enrollment_price'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="margin-top: 50px;">
                            <button class="button1" type="button">Apply</button>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal2" role="dialog" tabindex="-1" id="modal-1" style="border-style: none;">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-body d-xl-flex flex-column justify-content-evenly align-items-xl-center" style="position:absolute;width:60%;height: 509px;border-radius: 200px;background: var(--app-color-tone-secondary-2, #AAC9E4);border-style: none;right:15%;">
                    <img src="{{ asset('themes/tailwind/images/clipboard-image-61.png') }}" style="width: 217px;">
                    <p class="p20b"><strong>Enrollment form was received. We will send you
                                a&nbsp;</strong><br><strong>confirmation.</strong></p>
                                <button class="button1"
                            type="button" data-bs-dismiss="modal" style="width: 188px;">Done</button>
                </div>

            </div>
        </div>
    </body>
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        // * Events
        $('.competition-details_container').on('click', '.button1', async function(){
            $(this).prop('disabled', true);

            const competitionDetail = <?= json_encode($entry['category']) ?>;

            let formData = {
                competition_category_id: competitionDetail.id,
                user_id: "{{ $student_id }}",
            };

            // console.log(formData)
            // $(this).removeAttr('disabled');
            // return;

            await axios.post(`${getApiUrl()}/customer/competition/enroll`, formData, {
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
            window.location = "{{ route('wave.enrollment') }}"
        });

        // * Functions
        function generateRandomNumberNotInArray(array) {
            var randomNumber;
            do {
                // Generate a random number
                randomNumber = Math.floor(Math.random() * 10) + 1; // Adjust range as needed

                // Check if the number already exists in the array
            } while (array.indexOf(randomNumber) !== -1);

            return randomNumber;
        }
    });
</script>
@endsection
