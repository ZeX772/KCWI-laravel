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

    .nav-link1 {
        background: var(--appcolortone-secondary-1, #233656);
        border-radius: 8px;
        padding: 0px 18px 0px 18px;
        display: flex;
        flex-direction: row;
        gap: 16px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        width: 252px;
        height: 56px;
        position: relative;
    }

    .nav-link {
        left: 7%;
        border-radius: 8px;
        padding: 0px 18px 0px 18px;
        display: flex;
        flex-direction: row;
        gap: 16px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        width: 252px;
        height: 56px;
        position: relative;
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
        border-radius: 24px;
        padding: 0px 20px 0px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        height: auto;
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

    .button1 {
        background: #233656;
        color: white;
        display: flex;
        flex-direction: column;
        gap: 10px;
        border-radius: 36px;
        align-items: center;
        justify-content: center;
        position: relative;
        font-size: 1.2em;
        padding: 24px 48px;
        box-shadow: var(--app-dropshadow-box-shadow, 0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        width: 100%;
    }


    .p18b {
        color: var(--app-color-tone-primary, #171433);
        text-align: left;
        font-family: var(--barlow-copy-1-font-family, "Barlow-Medium", sans-serif);
        font-size: var(--barlow-copy-1-font-size, 18px);
        font-weight: var(--barlow-copy-1-font-weight, 500);
        position: relative;
        margin-top: 10px;
    }

    .p24bb {
        color: var(--app-color-tone-primary, #171433);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 24px;
        line-height: 28px;
        font-weight: 600;
        position: relative;
        font-style: normal !important;
    }

    .default {
        background: var(--cms-color-body-light, rgba(122, 122, 122, 0.5));
        border-radius: 36px;
        padding: 4px 12px 4px 12px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        max-width: 150px;
        height: auto;
        font-style: normal;
        font-weight: 600;
        bottom: 2px;
        color: #171433;
    }

    .absent {
        background: var(--app-color-tone-warning-color, #ff4d4d);
        border-radius: 36px;
        padding: 4px 12px 4px 12px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        max-width: 150px;
        height: auto;
        font-style: normal;
        font-weight: 600;
        bottom: 2px;
        color: #171433;
    }

    .present {
        background: var(--app-color-tone-green, #43f86b);
        border-radius: 36px;
        padding: 4px 12px 4px 12px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        max-width: 150px;
        height: auto;
        color: white;
        font-style: normal;
        font-weight: 600;
        bottom: 2px;
    }

    .leave {
        background: #aac9e4;
        border-radius: 36px;
        padding: 4px 12px 4px 12px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        max-width: 150px;
        height: auto;
        font-style: normal;
        font-weight: 600;
        bottom: 2px;
        color: #171433;
    }

    .not_signed_in {
        background: #fcc43e;
        border-radius: 36px;
        padding: 4px 12px 4px 12px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        max-width: 150px;
        height: auto;
        font-style: normal;
        font-weight: 600;
        bottom: 2px;
        color: #171433;
    }

    select.present:focus {
        outline: none;
    }

    select.present option {
        color: black;
    }
</style>
@endsection

@section('content')

<body id="page-top" style="height: 100vh; margin: 0;">
    <div id="wrapper" class="d-flex" style="min-height: 100vh;">
        <div class="d-flex flex-column" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);min-height: 100vh;">
            <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center mb-5">
                <div style="display: flex; align-items: center;">
                    <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                        <a href="{{ session('is_pastschedule') ? route('wave.pastschedule', $entry['course_class']['course_id']) : route('wave.upcomingschedule', $entry['course_class']['course_id']) }}">
                            <button class type="button" style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                                <i class="fas fa-chevron-left"></i></button></a>
                    </div>
                </div>
                <p class="p24bb d-xl-flex justify-content-xl-center align-items-xl-center " style="margin-bottom: 0px;height: 31px;text-align: center;margin-left:-40px;">Attendance</p>
                <div>
                </div>
            </div>
            <div style="margin: 0 auto;">
                <div class="box d-xl-flex flex-column divcard" style="padding: 15px;height:auto;width:635px!important;">
                    <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="width: 100%;">
                        <p class="p28b" style="margin-bottom: 0px;padding-left:20px;margin-top:10px;">{{ optional($entry['course_class'])['start_date'] }}</p>
                    </div>
                    <div class=" d-xxl-flex align-items-start">
                        <div class="table-responsive" style="width:auto;overflow-x:hidden;">
                            <table class="table" style="margin-right:250px;">
                                <tbody>
                                    <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;margin-top:4px;">
                                                <circle cx="8" cy="8" r="8"></circle>
                                            </svg></td>
                                        <td class="p16b" style="text-align: left;">Time</td>
                                        <td style="text-align: left;" class="p16b">{{ optional($entry['course_class'])['start_time'] }} - {{ optional($entry['course_class'])['end_time'] }}</td>
                                    </tr>
                                    <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;margin-top:4px;">
                                                <circle cx="8" cy="8" r="8"></circle>
                                            </svg></td>
                                        <td class="p16b" style="text-align: left;">Class Level</td>
                                        <td style="text-align: left;" class="p16b">{{ optional($entry['course_class']['course']['level'])['name'] }}</td>
                                    </tr>
                                    <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;margin-top:4px;">
                                                <circle cx="8" cy="8" r="8"></circle>
                                            </svg></td>
                                        <td class="p16b" style="text-align: left;">Venue</td>
                                        <td style="text-align: left;" class="p16b">{{ optional($entry['course_class']['course']['venue'])['name'] }}</td>
                                    </tr>
                                    <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                        <td><span style="color: rgb(35, 54, 86);"> </span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;margin-top:4px;">
                                                <circle cx="8" cy="8" r="8"></circle>
                                            </svg></td>
                                        <td class="p16b" style="text-align: left;">Facility</td>
                                        <td style="text-align: left;" class="p16b">{{ optional($entry['course_class']['course']['facility'])['name'] }}</td>
                                    </tr>
                                    <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill" style="width: 8px;color: #233656;margin-top:4px;">
                                                <circle cx="8" cy="8" r="8"></circle>
                                            </svg></td>
                                        <td class="p16b" style="text-align: left;">Class Code</td>
                                        <td style="text-align: left;" class="p16b">{{ optional($entry['course_class'])['course_class_code'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Student List -->
                <div class=" d-xl-flex flex-column divcard p-0" style="padding: 15px;height:auto;width:635px!important;">
                    <p class="p16b text-left" style="margin-top:20px;text-align: center;">Student List</p>
                    <div class="d-xxl-flex align-items-center justify-content-center" id="student-list_container">
                        <div class="table-responsive" style="width:100%;overflow-x:hidden;">
                            <table class="table" style="margin-right:250px;" id="student-list_table">
                                <tbody>
                                    @foreach( $entry['course_class_students'] as $classStudent )
                                        <tr style="border-bottom: 2px solid rgba(171,171,171,0.26); ">
                                            <td style="padding-left: 0; width: 150px;">
                                                <select class="attendance default" style="margin-bottom: 0px;" value="{{ $classStudent['attendance'] ? $classStudent['attendance']['status'] : '' }}" data-student_id="{{ $classStudent['student']['id'] }}" onchange="changeClass(this)">
                                                    <option value="default" selected hidden disabled>-</option>
                                                    <option value="present" <?= $classStudent['attendance'] ? ($classStudent['attendance']['status'] == 'present' ? 'selected' : '') : '' ?>>Present</option>
                                                    <option value="absent" <?= $classStudent['attendance'] ? ($classStudent['attendance']['status'] == 'absent' ? 'selected' : '') : '' ?>>Absent</option>
                                                    <option value="leave" <?= $classStudent['attendance'] ? ($classStudent['attendance']['status'] == 'leave' ? 'selected' : '') : '' ?>>Leave</option>
                                                    <option value="not_signed_in" <?= $classStudent['attendance'] ? ($classStudent['attendance']['status'] == 'not_signed_in' ? 'selected' : '') : '' ?>>Not Signed In</option>
                                                </select>
                                            </td>
                                            <td class="p16b" style="text-align: left;">{{ optional($classStudent['student'])['name'] }}</td>
                                            <td style="text-align: left;" class="p16b">{{ optional($classStudent['student']['student_information'])['hkid'] ?? "-" }}</td>
                                            <td style="width: 20px;"><a href="{{ route('wave.student-performance', optional($classStudent['student'])['id']) }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #171433;transform: translateX(-10px);">
                                                        <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                                        </path>
                                                    </svg></a></td>
                                        </tr>
                                    @endforeach
                                    @if( count($entry['course_class_students']) <= 0 )
                                        <div>
                                            <p>No student available</p>
                                        </div>
                                    @endif
                                </tbody>
                            </table>
                            @if( count($entry['course_class_students']) > 0 )
                                <div style="margin-top: 20px;">
                                    <button class="button1" id="saveBtn" type="submit" style="text-decoration:none;color:white;">Save</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

@section('javascript')
<script>
    function changeClass(selectElement) {
        // Store selected value and class list for each option in local storage
        selectElement.querySelectorAll('option').forEach(function(option) {
            var selectedValue = option.value;
            var selectedClass = option.dataset.class; // Get class from data-class attribute

            // Remove all existing classes related to attendance for the option
            option.classList.remove("present", "absent", "leave", "not_signed_in");

            // Apply the appropriate class based on the selected value
            switch (selectedValue) {
                case "present":
                    option.classList.add("present");
                    break;
                case "absent":
                    option.classList.add("absent");
                    break;
                case "leave":
                    option.classList.add("leave");
                    break;
                case "not_signed_in":
                    option.classList.add("not_signed_in");
                    break;
                default:
                    break;
            }

            // Store selected value and class for the option in local storage
            localStorage.setItem(selectElement.id + '_' + selectedValue + '_class', selectedClass);
        });

        // Get the selected option
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var selectedValue = selectedOption.value;
        var selectedClass = selectedOption.dataset.class; // Get class from data-class attribute

        // Remove all existing classes related to attendance for the select element
        selectElement.classList.remove("present", "absent", "leave", "not_signed_in");

        // Apply the appropriate class based on the selected value to the select element itself
        switch (selectedValue) {
            case "present":
                selectElement.classList.add("present");
                break;
            case "absent":
                selectElement.classList.add("absent");
                break;
            case "leave":
                selectElement.classList.add("leave");
                break;
            case "not_signed_in":
                selectElement.classList.add("not_signed_in");
                break;
            default:
                break;
        }

        // Store selected value and class for the select element in local storage
        localStorage.setItem(selectElement.id + '_value', selectedValue);
        localStorage.setItem(selectElement.id + '_class', selectedClass);
    }

    // Apply stored styles when the page loads
    window.onload = function() {
        var selectElements = document.querySelectorAll('.attendance');
        selectElements.forEach(function(selectElement) {
            // Retrieve stored value and class for each option from local storage
            selectElement.querySelectorAll('option').forEach(function(option) {
                var storedClass = localStorage.getItem(selectElement.id + '_' + option.value +
                    '_class');
                if (storedClass) {
                    option.dataset.class = storedClass; // Store class in data-class attribute
                }
            });

            // Apply stored styles
            changeClass(selectElement);
        });
    }

    // Attach onchange event to update styles when the value changes
    var selectElements = document.querySelectorAll('.attendance');
    selectElements.forEach(function(selectElement) {
        selectElement.onchange = function() {
            changeClass(this);
        };
    });

    $(document).ready(function() {
        $('#student-list_container').on('click', '#saveBtn', async function(){
            $(this).prop('disabled', true);

            const studentsStatus = $('#student-list_table select.attendance');

            let studentsData = [];
            studentsStatus.each(function(item){
                const studentID = $(this).data('student_id');
                const status = $(this).val();

                studentsData.push({
                    student_id: studentID,
                    status: status,
                    remarks: "Update from coach customer side",
                });
            });

            const courseClass = <?= json_encode($entry['course_class']) ?>;

            const formData = {
                class_id: courseClass.id,
                students: studentsData
            };

            await axios.post(`${getApiUrl()}/coach/student-attendance`, formData, {
                    headers: {
                        'Authorization': 'Bearer ' + getUserToken()
                    }
                }).then(res => {
                    $(this).removeAttr('disabled');
                    if ( res.data.success ) {
                        toastInfo("Success", "Student status successfully updated", "success");
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");
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
    });
</script>
@endsection