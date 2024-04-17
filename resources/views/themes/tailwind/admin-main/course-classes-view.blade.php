@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Class Detail" 
        withButton="true"
        withIcon="true"
        icon="qr"
        buttonModalTarget="#generate-qr-modal" 
        buttonType="button"
        buttonId="generate-qr_btn"
        buttonTitle="GENERATE QR"
    />
    <div class="row mt-4">
        <!-- Student List | Left - Table Section -->
        <div class="col-xxl-12 page-content-col1">
            <div class="row">
                <div class="col-12">
                    <div class="w-100 p-3">
                        <h2 style="font-size: 24px; font-weight: 500;">Information</h2>
                        <div class="row mb-3 mt-2">
                            <div class="col-3">
                                <div>
                                    <h6 class="detail-content-heading">COURSE NAME</h6>
                                    <p id="detail-dob" class="detail-content-heading_value">{{ $classData['course']['course_abbreviation'] }}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <h6 class="detail-content-heading">CLASS NAME</h6>
                                    <p id="detail-gender" class="detail-content-heading_value">{{ $classData['course_class_code'] }}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <h6 class="detail-content-heading">COURSE TYPE</h6>
                                    <p id="detail-address" class="detail-content-heading_value">{{ $classData['course']['course_type']['name'] ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <h6 class="detail-content-heading">COURSE LEVEL</h6>
                                    <p id="detail-school" class="detail-content-heading_value">{{ $classData['course']['level']['name'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <div>
                                    <h6 class="detail-content-heading">CLASS START DATE & TIME</h6>
                                    <p id="detail-phone" class="detail-content-heading_value">{{ $classData['formated_start_date_time'] }}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <h6 class="detail-content-heading">CLASS END DATE & TIME</h6>
                                    <p id="detail-grade_of_class" class="detail-content-heading_value">{{ $classData['formated_end_date_time'] }}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <h6 class="detail-content-heading">VENUE</h6>
                                    <p id="detail-phone" class="detail-content-heading_value">{{ $classData['course']['venue_data']['name'] ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <h6 class="detail-content-heading">FACILITY</h6>
                                    <p id="detail-grade_of_class" class="detail-content-heading_value">{{ $classData['course']['facility']['name'] }}</p>
                                    <!-- @foreach($classData['course']['venue_data']['schoolVenueFacilities'] ?? [] as $facility)
                                        <p id="detail-grade_of_class" class="detail-content-heading_value">{{ $facility['name'] }}</p>
                                    @endforeach -->
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <div>
                                    <h6 class="detail-content-heading">CLASS SIZE</h6>
                                    <p id="detail-phone" class="detail-content-heading_value">{{ $classData['course']['course_size'] }} (Maximum Number of Students)</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <h6 class="detail-content-heading">STATUS</h6>
                                    <p id="detail-grade_of_class" class="detail-content-heading_value">{{ $classData['course']['course_status'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3">
                        <h2 style="font-size: 24px; font-weight: 500;">Coaches</h2>
                        <div class="card mt-2">
                            <div class="card-body" style="height: 400px;">
                                <table class="table table-hover table-responsive w-100" id="student-table">
                                    <thead>
                                        <tr>
                                            <th class="text-left"><input type="checkbox" /></th>
                                            <th class="text-left">Coach name</th>
                                            <th class="text-left">Contact Number</th>
                                            <th class="text-left">Email</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($coaches as $coach)
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                
                                                <td class="{{ ! $coach['coach_attendance'] ? '' : 'text-danger' }}">{{ $coach['name'] }}</td>
                                                <td class="{{ ! $coach['coach_attendance'] ? '' : 'text-danger' }}">{{ $coach['coachDetails']['phone'] ?? '-' }}</td>
                                                <td class="{{ ! $coach['coach_attendance'] ? '' : 'text-danger' }}">{{ $coach['email'] }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                                        <span class="cursor-pointer show-coach-attendance_list_btn" data-id="{{ $coach['id'] }}" data-bs-toggle="modal" data-bs-target="#coach-modal">
                                                            <x-svg-icon icon="view" width="20" height="20" />
                                                        </span>
                                                        @if(! $coach['coach_attendance'] )
                                                            <span class="cursor-pointer show-coach-attendance_confirmation_btn" data-id="{{ $coach['id'] }}" data-attendance-type="coach" data-bs-toggle="modal" data-bs-target="#attendance-confirmation_modal">
                                                                <x-svg-icon icon="attendance" />
                                                            </span>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3">
                        <h2 style="font-size: 24px; font-weight: 500;">Students</h2>
                        <div class="card mt-2">
                            <div class="card-body" style="height: 400px;">
                                <table class="table table-hover table-responsive w-100" id="student-table">
                                    <thead>
                                        <tr>
                                            <th class="text-left"><input type="checkbox" /></th>
                                            <th class="text-left">Student's name</th>
                                            <th class="text-left">Contact Number</th>
                                            <th class="text-left">Email</th>
                                            <th class="text-left">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($classData['course_enrollments'] as $courseEnrollment)
                                            @foreach($courseEnrollment['student_classes'] as $student)
                                                <tr>
                                                    <td><input type="checkbox" /></td>
                                                    <td>{{ $student['class_student']['name'] }}</td>
                                                    <td>{{ $student['class_student']['student_information']['phone'] }}</td>
                                                    <td>{{ $student['class_student']['email'] }}</td>
                                                    <td class="{{ ! $student['has_attended'] ? '' : 'text-success' }}">{{ ! $student['has_attended'] ? '-' : 'Present' }}</td>
                                                    <td class="text-center">
                                                        @if(! $student['has_attended'] )
                                                            <div class="d-flex align-items-center justify-content-center gap-3">
                                                                <span data-id="{{ $student['id'] }}" data-attendance-type="student" class="cursor-pointer show-student-attendance_confirmation_btn" data-bs-toggle="modal" data-bs-target="#attendance-confirmation_modal"><x-svg-icon icon="attendance" /></span>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Coach View Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="coach-modal">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Coach Attendance List</h4>
                <span class="cursor-pointer close-modal_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div id="coach-attendance-list_conatiner">
                    <div class="card mt-2">
                        <div class="card-body" style="height: 400px;">
                            <table class="table table-hover table-responsive w-100" id="student-table">
                                <thead style="border-bottom: 1px solid #dfdddd;">
                                    <tr>
                                        <th class="text-left" style="font-size: 14px; font-weight: 700; color: #7A7A7A;">COACH NAME</th>
                                        <th class="text-left" style="font-size: 14px; font-weight: 700; color: #7A7A7A;">COACH SIGN DATE</th>
                                        <th class="text-left" style="font-size: 14px; font-weight: 700; color: #7A7A7A;">CANCEL ATTENDANCE DATE</th>
                                        <th class="text-left" style="font-size: 14px; font-weight: 700; color: #7A7A7A;">ATTENDANCE STATUS</th>
                                        <th class="text-left" style="font-size: 14px; font-weight: 700; color: #7A7A7A;">REMARKS</th>
                                        <th class="text-left" style="font-size: 14px; font-weight: 700; color: #7A7A7A;">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody id="coach-attendance-container">
                                    <tr>
                                        <td>Coach NG</td>
                                        <td>2023-12-01</td>
                                        <td>2023-12-03</td>
                                        <td class="text-danger">Cancelled</td>
                                        <td>Incorrect Attendance</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Coach NG</td>
                                        <td>2023-12-04</td>
                                        <td>-</td>
                                        <td class="text-success">Attend</td>
                                        <td></td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center gap-3">
                                                <span class="cursor-pointer cancel-attendance_btn"><x-svg-icon icon="cancel" /></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="coach-attendance-canel_container" class="d-none">
                    <div class="mb-3">
                        <p>Cancel Attendance of coach on date <b><u>2023-12-04</u></b></p>
                    </div>
                    <form id="modal-form">
                        <div class="container form-input-container mb-3">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                                    <textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="back-tolist__btn" title="Back"/>
                <x-primary-button type="button" id="save-form_btn" title="Cancel" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- QR Generator Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="generate-qr-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">GENERATE QR?</h4>
                <span class="cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div>
                    <div class="w-100 p-3">
                        <div class="row mb-3 mt-2">
                            <div class="col-6">
                                <div>
                                    <h6 class="detail-content-heading">CLASS NAME</h6>
                                    <p id="detail-dob" class="detail-content-heading_value">{{ $classData['course_class_code'] ?? '-'  }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <h6 class="detail-content-heading">COURSE NAME</h6>
                                    <p id="detail-dob" class="detail-content-heading_value">{{ $classData['course']['course_abbreviation'] ?? '-'  }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div>
                                    <h6 class="detail-content-heading">CLASS START DATE & TIME</h6>
                                    <p id="detail-phone" class="detail-content-heading_value">{{ $classData['formated_start_date_time'] ?? '-'  }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <h6 class="detail-content-heading">CLASS END DATE & TIME</h6>
                                    <p id="detail-grade_of_class" class="detail-content-heading_value">{{ $classData['formated_end_date_time'] ?? '-'  }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div>
                                    <h6 class="detail-content-heading">VENUE</h6>
                                    <p id="detail-phone" class="detail-content-heading_value">{{ $classData['course']['venue_data']['name'] ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <h6 class="detail-content-heading">FACILITY</h6>
                                    <p id="detail-grade_of_class" class="detail-content-heading_value">{{ $classData['course']['facility']['name'] ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('wave.user.admin-main.qr-view', $classData['id']) }}" class="btn btn-primary custom-btn_primary">GENERATE QR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Attendance Confirmation Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="attendance-confirmation_modal">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Sign/Mark Attendance</h4>
            </div>
            <div class="modal-body p-4 pt-0">
                <p>Are you sure you wan't to sign/mark attendance for this <b><u><span>coach</span></u></b>?</p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-form_btn" title="CANCEL" dismiss="modal"/>
                <x-primary-button type="button" id="sign-attendance_btn" title="YES" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        var attendanceID = "";
        var attendanceType = "";
        var classID = "";
        var formData = {};

        // For cancelling of coach attendance
        var tableRowIndex = "";
        var coachAttendanceList = [];

        $('.show-coach-attendance_list_btn').on('click', function(){
            resetCoachModal();

            // get the coach attendances by coach id
            const coaches = <?= json_encode($coaches) ?>;
            const coachID = $(this).data('id');
            const coachData = coaches.find(value => value.id == coachID);

            if( coachAttendanceList.length <= 0 )
                coachAttendanceList = coachData.coach_attendances;

            $('#coach-attendance-container').empty();

            let list = ``;
            coachAttendanceList.forEach((element, key) => {
                let action = ``;
                if( element.status == 'Attended' )
                    action = `<div class="d-flex align-items-center justify-content-center gap-3">
                                    <span class="cursor-pointer cancel-attendance_btn" data-id="${element.id}" data-index="${key}"><x-svg-icon icon="cancel" /></span>
                                </div>`;

                list += `<tr data-index="${key}">
                            <td>${coachData.name}</td>
                            <td>${element.signed_date}</td>
                            <td class="cancelled-date">${element.cancelled_date ?? '-'}</td>
                            <td class="status ${element.status == 'Attended' ? 'text-success' : 'text-danger'}">${element.status ?? '-'}</td>
                            <td class="remarks">${element.remarks ?? '-'}</td>
                            <td class="actions">${action}</td>
                        </tr>`;
            });
            $('#coach-attendance-container').append(list);
        });

        $('.show-coach-attendance_confirmation_btn').on('click', function(){
            $('#attendance-confirmation_modal .modal-body p span').text('coach');
            $('#attendance-confirmation_modal .modal-title').text('Coach Attendance');
            const classData = <?= json_encode($classData) ?>

            attendanceID = $(this).data('id');
            attendanceType = $(this).data('attendance-type'); // Student, Coach
            classID = classData.id;
            formData = {
                class_id: classID
            };
            console.log(formData);
        });

        $('.show-student-attendance_confirmation_btn').on('click', function(){
            $('#attendance-confirmation_modal .modal-body p span').text('student');
            $('#attendance-confirmation_modal .modal-title').text('Student Attendance');

            attendanceID = $(this).data('id');
            attendanceType = $(this).data('attendance-type'); // Student, Coach
        });

        // Process the marking of Student Attendance
        $('#attendance-confirmation_modal #sign-attendance_btn').on('click', async function(){
            $(this).attr('disabled', 'true');

            // get user token
			const userToken = getUserToken();
            
            await axios.patch(`${getApiUrl()}/${attendanceType}/mark-attendance/${attendanceID}`, formData,{
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + userToken
                        }
                    }).then(res => {
                        $('#attendance-confirmation_modal #cancel-form_btn').click();

                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");

                            window.location = window.location
                        } else {
                            toastInfo("Cant' Save", res.data.message, "warning");

                            $(this).removeAttr('disabled');
                        }
                    })
                    .catch(error => {
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

        $('#coach-modal').on('click', '.cancel-attendance_btn', function(){
            $('#coach-attendance-list_conatiner').addClass('d-none');
            $('#coach-attendance-canel_container').removeClass('d-none');

            $('#coach-modal .modal-dialog').toggleClass('modal-xl modal-lg');
            $('#coach-modal .close-modal_btn').addClass('d-none');
            $('#coach-modal .modal-footer').removeClass('d-none');

            $('#coach-modal .modal-title').text('Cancel Attendance');

            attendanceID = $(this).data('id');
            tableRowIndex = $(this).data('index');
        });

        $('#coach-modal').on('click', '#save-form_btn', async function(){
            $(this).attr('disabled', 'true');

            // get user token
			const userToken = getUserToken();

            const remarks = $('#coach-modal [name=remarks]').val();

            const formData1 = $('#coach-attendance-canel_container #modal-form').serializeArray();

            const requiredFields = [
                'remarks'
            ];

			if( processErrorValidation(formData1, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

            formData = {
                remarks: remarks
            };
            
            await axios.patch(`${getApiUrl()}/coach/cancel-attendance/${attendanceID}`, formData,{
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + userToken
                        }
                    }).then(res => {
                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");
                            
                            $(`#coach-attendance-container [data-index="${tableRowIndex}"] .cancelled-date`).text(res.data.data.cancelled_date);
                            $(`#coach-attendance-container [data-index="${tableRowIndex}"] .status`).text("Cancelled");
                            $(`#coach-attendance-container [data-index="${tableRowIndex}"] .status`).removeClass("text-success");
                            $(`#coach-attendance-container [data-index="${tableRowIndex}"] .status`).addClass("text-danger");
                            $(`#coach-attendance-container [data-index="${tableRowIndex}"] .remarks`).text(remarks);
                            $(`#coach-attendance-container [data-index="${tableRowIndex}"] .actions`).empty();

                            coachAttendanceList[tableRowIndex] = res.data.data

                            $('#coach-modal [name=remarks]').val("");

                            resetCoachModal();
                        } else {
                            toastInfo("Cant' Save", res.data.message, "warning");

                            $(this).removeAttr('disabled');
                        }
                    })
                    .catch(error => {
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

        $('#back-tolist__btn').on('click', function(){
            resetCoachModal();
        });

        function resetCoachModal() {
            $('#coach-attendance-list_conatiner').removeClass('d-none');
            $('#coach-attendance-canel_container').addClass('d-none');

            $('#coach-modal .modal-dialog').removeClass('modal-lg');
            $('#coach-modal .modal-dialog').addClass('modal-xl');
            $('#coach-modal .close-modal_btn').removeClass('d-none');
            $('#coach-modal .modal-footer').addClass('d-none');

            $('#coach-modal .modal-title').text('Coach Attendance List');
        }

        function processErrorValidation(formData, requiredFields) {
			errors = [];

			formData.forEach(function(item) {
				if ( requiredFields.includes(item.name) ) {
					if( item.value == "" ){
						errors.push({
							field_name: item.name,
							message: formatString(item.name) + " is required."
						});
					}
				}
			});

			if ( errors.length > 0 ) {
				renderErrors();

				return true;
			}

			return false;
		}

		function renderErrors() {
			if ( errors.length > 0 ) {
                const hasParentFields = [];

				errors.forEach((element) => {
                    const fieldSelector = $(`[name="${element.field_name}"]`);
                    // Clear the errors first
                    fieldSelector.removeClass('border border-danger');
                    fieldSelector.parent().removeClass('border border-danger');

                    if ( fieldSelector.next().is('p') )
                        fieldSelector.next().remove();

                    if ( fieldSelector.parent().next().is('p') )
                        fieldSelector.parent().next().remove();

                    if (! hasParentFields.includes(element.field_name) ) {
                        fieldSelector.addClass('border border-danger');
					    fieldSelector.after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
                    } else {
                        fieldSelector.parent().addClass('border border-danger');
					    fieldSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
                    }
				});
			}
		}

        function formatString(inputString) {
			// Split the string into words using underscores as separators
			let words = inputString.split('_');

			// Capitalize the first letter of each word
			let capitalizedWords = words.map(word => word.charAt(0).toUpperCase() + word.slice(1));

			// Join the words back together with a space between them
			let formattedString = capitalizedWords.join(' ');

			return formattedString;
		}
    });
</script>
@endsection
