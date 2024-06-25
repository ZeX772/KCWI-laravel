@extends('theme::layouts.customer')

@section('style')
    <style>
        .navbar {
            background: #FFF;
            padding: 20px;
            position: left;
            min-height: 0px;
            top: 0;
            left: 0;
            right: 0;
            box-shadow: 10px 0 10px -10px rgba(0, 0, 0, 0.25);
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

        .p24b1 {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
            font-weight: 700;
            margin-right: 0%;
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
        }

        .box {
            background: #ffffff;
            border-radius: 36px;
            padding: 0px 20px 0px 20px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: flex-start;
            flex-shrink: 0;
            width: 710px;
            height: 128px;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow, 0px 4px 4px 0px rgba(35, 54, 86, 0.5));
            outline: none;
        }

        .p24b {
            color: #171433;
            text-align: left;
            font-family: var(--app-text-styles-h4-heading-font-family,
                    "Poppins-Bold",
                    sans-serif);
            font-size: var(--app-text-styles-h4-heading-font-size, 24px);
            font-weight: var(--app-text-styles-h4-heading-font-weight, 700);
            position: relative;
        }

        .p26 {
            color: #171433;
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 26px;
            font-weight: 600;
            position: relative;
        }

        .button1 {
            background: #233656;
            color: white;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            justify-content: center;
            position: relative;
            font-size: 1.2em;
            padding: 24px 48px;
            border-radius: 40.5px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        }

        .p16b {
            color: var(--app-color-tone-primary, #171433);
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            font-weight: 600;

        }

        .p18b li {
            list-style-type: disc;
            /* Use disc for filled bullet point, or circle for hollow bullet point */
            margin-bottom: 10px;
            /* Add margin between list items */
        }

        .textField {
            box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);
            min-height: 100px;
            background-color: transparent;
            border-radius: 130.5px;
            border: 3px solid var(--app-color-tone-secondary-150, rgba(35, 54, 86, 0.50));
            font-family: Barlow;
            font-size: 17px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            width: 110%;
        }

        .select1 {
            -webkit-appearance: none;
            /* Remove default arrow for WebKit browsers */
            -moz-appearance: none;
            /* Remove default arrow for Firefox */
            appearance: none;
            /* Remove default arrow for other browsers */
        }

        .select1 {
            color: var(--app-color-tone-primary, #171433);
            text-align: left;
            font-family: var(--app-text-styles-app-title-22-font-family,
                    "Barlow-SemiBold",
                    sans-serif);
            font-size: var(--app-text-styles-app-title-22-font-size, 22px);
            font-weight: var(--app-text-styles-app-title-22-font-weight, 600);
            position: relative;
            padding-left: 40px;
        }

        .p18b {
            color: var(--app-color-tone-primary, #171433);
            text-align: left;
            font-family: var(--barlow-copy-1-font-family, "Barlow-Medium", sans-serif);
            font-size: var(--barlow-copy-1-font-size, 18px);
            font-weight: var(--barlow-copy-1-font-weight, 500);
            opacity: 0.5;
            position: relative;
            margin-left: 40px;
            margin-top: 20px;
        }

        .p22bold {
            color: var(--app-color-tone-secondary-1, #233656);
            text-align: left;
            font-family: var(--app-text-styles-app-title-22-font-family,
                    "Barlow-SemiBold",
                    sans-serif);
            font-size: var(--app-text-styles-app-title-22-font-size, 22px);
            font-weight: var(--app-text-styles-app-title-22-font-weight, 600);
            position: relative;
        }
    </style>
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="background:#f2f1f9;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;min-height:100vh;">
                <a href="{{ route('wave.leaveOrmakeup', $student_id) }}">
                    <button class type="button"
                        style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                        <i class="fas fa-chevron-left"></i></button></a>
                <div style="width: 100%;margin-bottom: 30px;">
                    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24b1"
                        style="margin-bottom: 60px;margin-top:-30px;height: 31px;text-align: center;"><strong>Apply for Make
                            Up</strong></p>
                </div>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center"
                    placeholder="">
                    <div style="width: 50%;position: relative;" class="apply-makeup">
                        <div style="margin-bottom: 20px;">
                            <p class="p18b" style="position: absolute; opacity: 0.50; left: 3px;">
                                <strong>Leave Records</strong>
                            </p>
                            <select id="make-up" class="textField select1" style="padding-top: 20px; width: 100%;">
                                <option value="">Please select the Class</option>
                                @foreach( $entries as $entry )
                                    <optgroup label="{{ $entry['key'] }}">
                                        @foreach( $entry['value'] as $item )
                                            <option value="{{ $item['id'] }}">
                                                {{ $item['class']['start_date'] }} ({{ $item['class']['start_time'] }}-{{ $item['class']['end_time'] }}) Class Code: {{ $item['class']['course_class_code'] }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            <svg class="icn4" width="60" height="44" viewBox="0 0 30 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                style="position: absolute; right: 30px; top: 37px; width: 2.5rem;">
                                <path
                                    d="M10.7816 11.5556L19.6803 2.65737C19.8851 2.45184 20 2.17356 20 1.88346C20 1.59337 19.8851 1.31509 19.6803 1.10956L19.0247 0.453935C18.8193 0.248802 18.541 0.133574 18.2507 0.133574C17.9605 0.133574 17.6821 0.248802 17.4768 0.453935L10.0042 7.92601L2.52325 0.445491C2.3177 0.240771 2.03941 0.125827 1.7493 0.125827C1.45918 0.125827 1.18089 0.240771 0.975344 0.445491L0.319681 1.10112C0.114949 1.30665 -4.49794e-07 1.58491 -4.37114e-07 1.87501C-4.24433e-07 2.1651 0.114949 2.44338 0.319681 2.64891L9.22858 11.5556C9.43521 11.7602 9.71426 11.875 10.0051 11.875C10.2959 11.875 10.5749 11.7602 10.7816 11.5556Z"
                                    fill="#171433" />
                            </svg>
                        </div>
                        <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                            <button id="submitBtn" class="button1" type="button"
                                style="width: 50%;margin-top:20px;" data-bs-target="#modal-1">Apply for
                                Makeup</button>
                        </div>
                        <div style="margin-top: 50px;">
                            <p class="p22bold"><img src="../themes/tailwind/images/clipboard-image-55.png"
                                    style="width: 37px;margin-right: 10px;"><strong>Note</strong></p>
                            <ul class="p18b" style="text-align: left;">
                                <li>Parents should notify kcwi at 2295 6066 or email to knock@hkswimmingacademy.com</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal fade modal2" role="dialog" tabindex="-1" id="modal-1" style="border-style: none;">
                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-body d-xl-flex flex-column justify-content-evenly align-items-xl-center"
                        style="position:absolute;width:60%;height: 509px;border-radius: 200px;background: var(--app-color-tone-secondary-2, #AAC9E4);border-style: none;right:15%;">
                        <img src="{{ asset('themes/tailwind/images/clipboard-image-61.png') }}" style="width: 217px;">
                        <p class="p20b"><strong>The application was submitted.You will receive a
                                notification&nbsp;</strong><br><strong>later.</strong></p><button class="button1"
                            type="button" data-bs-dismiss="modal" style="width: 188px;">Done</button>
                    </div>

                </div>
            </div>
        </div>
    </body>
@endsection

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // $('#submitBtn').click(function() {
            //     // Initialize an array to store missing fields
            //     var missingFields = [];

            //     // Get the selected value from the select element
            //     var makeUp = $('#make-up').val();

            //     // Check if the makeUp value is missing and add it to the missingFields array
            //     if (!makeUp) {
            //         missingFields.push('Select a class for make up');
            //     }

            //     // Check if there are missing fields
            //     if (missingFields.length > 0) {
            //         alert('Please select the following field:\n' + missingFields.join('\n'));
            //     } else {
            //         // Create a FormData object and append the data
            //         var formData = new FormData();
            //         formData.append('class', makeUp);

            //         // Perform AJAX POST request
            //         $.ajax({
            //             url: '/apply-makeup',
            //             method: 'POST',
            //             data: formData,
            //             processData: false, // Prevent jQuery from automatically processing the data
            //             contentType: false, // Prevent jQuery from setting content type
            //             success: function(response) {
            //                 // Handle successful response here
            //                 console.log(response);
            //                 showSuccessModal();
            //             },
            //             error: function(xhr, status, error) {
            //                 // Handle error
            //                 console.error(xhr.responseText);
            //             }
            //         });
            //     }
            // });

            $('.apply-makeup').on('click', '#submitBtn', async function(){

                if(! $('.apply-makeup #make-up').val() )
                    toastTopEnd("Warning", 'Please select class first', "warning");

                // get user token
			    const userToken = getUserToken();

                let formData = {
                    user_id: "{{ $student_id }}",
                    leave_id: $('.apply-makeup #make-up').val()
                };
                
                await axios.post(`${getApiUrl()}/student/makeup-class/create`, formData, {
                    headers: {
                        'Authorization': 'Bearer ' + userToken
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
                window.location = "{{ route('wave.leaveOrmakeup', $student_id) }}"
            });
        });

        function showSuccessModal() {
            $('#modal-1').modal('show');
        }
    </script>
@endsection
