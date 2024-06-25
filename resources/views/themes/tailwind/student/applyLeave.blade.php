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
        padding: 0px 10px 0px 10px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        width: 100%;
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

    textarea::placeholder {
        color: var(--app-color-tone-primary, #171433);
        text-align: left;
        font-family: var(--barlow-copy-1-font-family, "Barlow-Medium", sans-serif);
        font-size: var(--barlow-copy-1-font-size, 18px);
        font-weight: var(--barlow-copy-1-font-weight, 500);
        opacity: 0.5;
        position: relative;
        font-weight: bold;
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

    .icn4 {
        flex-shrink: 0;
        width: 11.75px;
        height: 20px;
        position: relative;
        transform: translate(0px, -11.75px);
        overflow: visible;
    }

    .select1 {
        -webkit-appearance: none;
        /* Remove default arrow for WebKit browsers */
        -moz-appearance: none;
        /* Remove default arrow for Firefox */
        appearance: none;
        /* Remove default arrow for other browsers */
    }

    textarea {
        resize: none;
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

    .fileinput-new {
        color: var(--app-color-tone-secondary-1, #233656);
        text-align: left;
        font-family: var(--text-text-medium-1-font-family,
                "Poppins-Medium",
                sans-serif);
        font-size: var(--text-text-medium-1-font-size, 18px);
        font-weight: var(--text-text-medium-1-font-weight, 500);
        position: relative;
    }

    .input-group-text {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding: 0.375rem 0.75rem;
        margin-bottom: 0;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        text-align: center;
        white-space: nowrap;
        background-color: #f1f2f9 !important;
        border: 1px solid #233656 !important;
        border-radius: 0.25rem;
    }
</style>
@endsection

@section('content')
<div class="d-flex flex-column" id="content-wrapper" style="background:#f2f1f9;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;min-height:100vh;">
    <a href="{{ route('wave.leaveOrmakeup', $user_id) }}">
        <button class type="button" style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
            <i class="fas fa-chevron-left"></i></button></a>
    <div style="width: 100%;margin-bottom: 30px;">
        <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24b1" style="margin-bottom: 60px;margin-top:-30px;height: 31px;text-align: center;"><strong>Apply for
                Leave</strong></p>
        <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center" placeholder="">
            <div style="width: 50%;" id="form-container">
                <div class="" style="margin-bottom: 20px;position: relative;">
                    <p class="p18b" style="position: absolute;opacity: 0.50;"><strong>Class <span class="text-danger">*</span></strong></p>
                    <select id="classSelect" class="textField select1" style="width: 100%;margin-top:10px;">
                        <option value="" hidden>Please select the Class</option>
                        @foreach($entries as $entry)
                        <option value="{{ $entry['class']['id'] }}">{{ $entry['class']['start_date'] }} {{ $entry['class']['start_time'] }} - {{ $entry['class']['end_time'] }}
                            ({{ $entry['class']['course_class_code'] }})</option>
                        @endforeach
                    </select>
                    <svg class="icn4" width="60" height="44" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: absolute;width:6%;height:30%;margin-top:60px;margin-left:-80px;">
                        <path d="M10.7816 11.5556L19.6803 2.65737C19.8851 2.45184 20 2.17356 20 1.88346C20 1.59337 19.8851 1.31509 19.6803 1.10956L19.0247 0.453935C18.8193 0.248802 18.541 0.133574 18.2507 0.133574C17.9605 0.133574 17.6821 0.248802 17.4768 0.453935L10.0042 7.92601L2.52325 0.445491C2.3177 0.240771 2.03941 0.125827 1.7493 0.125827C1.45918 0.125827 1.18089 0.240771 0.975344 0.445491L0.319681 1.10112C0.114949 1.30665 -4.49794e-07 1.58491 -4.37114e-07 1.87501C-4.24433e-07 2.1651 0.114949 2.44338 0.319681 2.64891L9.22858 11.5556C9.43521 11.7602 9.71426 11.875 10.0051 11.875C10.2959 11.875 10.5749 11.7602 10.7816 11.5556Z" fill="#171433" />
                    </svg>
                </div>
                <div class="" style="margin-bottom: 20px;position: relative;">
                    <p class="p18b" style="position: absolute;opacity: 0.50;"><strong>Reason for
                            Leaving <span class="text-danger">*</span></strong></p>
                    <select id="leaveSelect" class="textField select1" style="width: 100%;margin-top:10px;">
                        <option value="">Please select </option>
                        <option value="Sick Leave">Sick Leave (3 hours before the
                            lesson)</option>
                        <option value="Casual Leave">Casual Leave(At
                            least 3 days before the lesson begins)</option>
                        <option value="Other">Others(Please specify the reason)
                        </option>
                    </select>
                    <svg class="icn4" width="60" height="44" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: absolute;width:6%;height:30%;margin-top:60px;margin-left:-80px;">
                        <path d="M10.7816 11.5556L19.6803 2.65737C19.8851 2.45184 20 2.17356 20 1.88346C20 1.59337 19.8851 1.31509 19.6803 1.10956L19.0247 0.453935C18.8193 0.248802 18.541 0.133574 18.2507 0.133574C17.9605 0.133574 17.6821 0.248802 17.4768 0.453935L10.0042 7.92601L2.52325 0.445491C2.3177 0.240771 2.03941 0.125827 1.7493 0.125827C1.45918 0.125827 1.18089 0.240771 0.975344 0.445491L0.319681 1.10112C0.114949 1.30665 -4.49794e-07 1.58491 -4.37114e-07 1.87501C-4.24433e-07 2.1651 0.114949 2.44338 0.319681 2.64891L9.22858 11.5556C9.43521 11.7602 9.71426 11.875 10.0051 11.875C10.2959 11.875 10.5749 11.7602 10.7816 11.5556Z" fill="#171433" />
                    </svg>
                </div>
                <div class="box" style="margin-bottom: 20px;">
                    <img src="../themes/tailwind/images/clipboard-image-60.png" style="width: 40px;position: absolute;transform: translateX(5px) translateY(-30px);">
                    <textarea id="description" class="textarea1" placeholder="Please specify..." style="width: calc(100% - 58px); padding-left: 58px; border: none; outline: none;resize:none;margin-top:-50px;"></textarea>
                </div>
                <div style="margin-bottom: 20px;">
                    <div class="input-group fileinput fileinput-new" data-provides="fileinput" id="fileDiv">
                        <span id="fileNameDisplay"></span>
                        <span class="input-group-text input-group-addon btn btn-default btn-file file1" style="border-radius: 20px;height:40px;">

                            <label for="fileInput" class="fileinput-new"><span style="font-size:36px;vertical-align: -7px;cursor: pointer;">+
                                </span>&nbsp;Attachment (e.g. Medical Certificate)</label>
                            <input type="file" id="fileInput" name="attachment" style="display: none;">
                        </span>
                    </div>
                </div>
                <div class="d-xxl-flex justify-content-xxl-center">
                    <button id="submitBtn" class="button1" type="button" style="width: 343px;" data-bs-target="#modal-1">Apply for Leave</button>
                </div>
                <div style="margin-top: 50px;">
                    <p class="p22bold"><img src="../themes/tailwind/images/clipboard-image-55.png" style="width: 37px;margin-right: 10px;"><strong>Note</strong></p>
                    <ul class="p18b" style="text-align: left;">
                        <li>Parents should notify kcwi at 2295 6066 or email to knock@hkswimmingacademy.com</li>
                        <li>Casual leave: At least 3 days before the lesson begins</li>
                        <li>Sick leave: 3 hours before the lesson (Original doctor or registered Chinese
                            medicine practitioner’s note with indication of time period is compulsory.)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal2" role="dialog" tabindex="-1" id="modal-1" style="border-style: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-body d-xl-flex flex-column justify-content-evenly align-items-xl-center" style="position:absolute;width:60%;height: 509px;border-radius: 200px;background: var(--app-color-tone-secondary-2, #AAC9E4);border-style: none;right:15%;">
                <img src="{{ asset('themes/tailwind/images/clipboard-image-61.png') }}" style="width: 217px;">
                <p class="p20b"><strong>The application was submitted.You will receive a
                        notification&nbsp;</strong><br><strong>later.</strong></p><button class="button1" type="button" style="width: 188px;">Done</button>
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
        $('#fileInput').change(function() {
            var fileName = $(this).val();
            if (fileName) {
                console.log('File selected: ' + fileName);
                // You can perform further actions here
            } else {
                console.log('No file selected');
            }
        });
    });
    $(document).ready(function() {
        $('#fileInput').change(function() {
            var fileName = $(this).val().split('\\').pop(); // Get the file name without the path
            $('#fileNameDisplay').text(fileName); // Display the file name
        });
    });

    $(document).ready(function() {
        $('#form-container').on('click', '#submitBtn', async function() {
            // Initialize an array to store missing fields
            var missingFields = [];

            // Get the selected values from the select elements and textarea
            var classValue = $('#classSelect').val();
            var leaveValue = $('#leaveSelect').val();
            var descriptionValue = $('#description').val();

            // Get the selected file
            var file = $('#fileInput')[0].files[0];

            // Check if any field is missing and add it to the missingFields array
            if (!classValue) {
                missingFields.push('Class');
            }
            if (!leaveValue) {
                missingFields.push('Leave');
            }
            // if (!descriptionValue) {
            //     missingFields.push('Description');
            // }
            // if (!file) {
            //     missingFields.push('Attachment');
            // }

            // Check if there are missing fields
            if (missingFields.length > 0) {
                // Alert the user with the list of missing fields
                const errorMessage = 'Please select or fill in the following fields:\n' + missingFields.join('\n');

                toastInfo("Cant' Save", errorMessage, "warning");
            } else {
                // Proceed with the AJAX request
                // Create a FormData object and append the data
                var formData = new FormData();
                formData.append('user_id', "{{ $user_id }}");
                formData.append('class_id', classValue);
                formData.append('reason', leaveValue);
                formData.append('remark', descriptionValue);
                if( file )
                    formData.append('attachment', file);

                await axios.post(`${getApiUrl()}/student/leave`, formData, {
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
            }
        });

        $('#modal-1').on('hidden.bs.modal', function (e) {
            window.location = "{{ route('wave.leaveOrmakeup', $user_id) }}"
        });
    });

    function showSuccessModal() {
        $('#modal-1').modal('show');
    }
</script>
@endsection