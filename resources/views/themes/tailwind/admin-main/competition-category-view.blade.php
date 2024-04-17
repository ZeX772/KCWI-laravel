@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Competition Category Management"
        headingSpan="{{ $data['competition']['competition_code'] }}"
        withButton="true"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#participants-modal" 
        buttonType="button"
        buttonId="add-participants_btn"
        buttonTitle="Add Participants"
        secondBtnRoute="{{ route('wave.user.admin-main.competition-category-view-results', [$data['competition']['id'], $data['id']]) }}"
        secondButtonId="view-results_btn"
        withIconSecondBtn="true"
        secondBtnIcon="view"
        secondBtnTitle="View Results"
    />
    <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4 mt-4" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" role="tab">All</a>
        </li>
    </ul>
    <div class="row mt-2 p-2">
        <!-- Student List | Left - Table Section -->
        <div class="col-xxl-12 page-content-col">
            <div class="tab-content p-2">
                <div class="main-page_table_info">
                    <div class="d-flex align-items-center mb-4">
                        <h2 class="heading mr-2">{{ $data['competition']['competition_code'] }}, <span class="heading-span">{{ $data['category']['name'] ?? '' }}</span></h2>
                        <div class="d-glex d-flex align-items-center gap-4">
                            <a href="" id="edit-competition_category_btn" data-bs-toggle="modal" data-bs-target="#competition-category-modal">
                                <x-svg-icon icon="edit" />
                            </a>
                            <span class="status-tag p-2">{{ ucfirst($data['status']) }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 d-flex flex-column gap-2">
                            <p class="detail-title">Date: <span class="detail-sub_title">{{ $data['start_date'] ? date("m/d/Y", strtotime($data['start_date'])) : '' }}{{ $data['end_date'] ? ' - '.date("m/d/Y", strtotime($data['end_date'])) : '' }}</span></p>
                            <p class="detail-title">Time: <span class="detail-sub_title">{{ $data['start_time'] ? date("h:i a", strtotime($data['start_time'])) : '' }}{{ $data['end_time'] ? ' - '.date("h:i a", strtotime($data['end_time'])) : '' }}</span></p>
                            <p class="detail-title">Participant Total: <span class="detail-sub_title">{{ count($students) }}/{{ $data['competition']['competition_size'] }}</span></p>
                        </div>
                        <div class="col-4 d-flex flex-column gap-2">
                            <p class="detail-title">Venue: <span class="detail-sub_title">{{ $data['competition']['school_venue']['name'] ?? '-' }}</span></p>
                            <p class="detail-title">Facility: <span class="detail-sub_title">{{ $data['competition']['school_venue_facility']['name'] ?? '-' }}</span></p>
                            <p class="detail-title">Remark: <span class="detail-sub_title">{{ $data['remarks'] }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-custom data-table with-custom-search mt-4 border-top">
                    <table class="table table-hover w-100" id="student-table">
                        <thead>
                            <tr>
                                <th class="text-left">PARTICIPANTS</th>
                                <th class="text-center">GROUP NUM</th>
                                <th class="text-left">STUDENT ID</th>
                                <th class="text-left">PHONE</th>
                                <th class="text-left">EMAIL</th>
                                <th class="text-left">GENDER</th>
                                <th class="text-left">DATE OF BIRTH (AGE)</th>
                                <th class="text-left">LINE</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $key => $student)
                                <tr>
                                    <td class="text-left">{{ $student['name'] }}</td>
                                    <td class="text-center">{{ $student['competition_participant']['competition_group']['group_number'] }}</td>
                                    <td class="text-left">{{ $student['student_information']['student_id'] }}</td>
                                    <td class="text-left">{{ $student['student_information']['phone'] }}</td>
                                    <td class="text-left">{{ $student['email'] }}</td>
                                    <td class="text-left">{{ $student['student_information']['gender'] }}</td>
                                    <td class="text-left">{{ $student['student_information']['year_age'] }}</td>
                                    <td class="text-left">{{ $student['competition_participant']['competition_group']['assign_line'] }}</td>
                                    <td class="text-center">
                                        <div class="table-acitions_container d-flex gap-2">
                                            <button type="button" class="delete-button" data-id="{{ $student['competition_participant']['id'] }}" data-name="{{ $student['name'] }}" data-row_index="" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                                <x-svg-icon icon="delete" width="16" height="14" />
                                            </button>
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
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="competition-category-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Update Competition Category</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Category" 
                            name="category_id"
                            id="category_id"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Category</option>
                            @foreach($categories as $key => $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Start Date" 
                            type="date" 
                            name="start_date"
                            id="start_date"
                            isRequired="false"
                        />
                        <x-form-input 
                            label="End Date" 
                            type="date" 
                            name="end_date"
                            id="end_date"
                            isRequired="false"
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Start Time" 
                            type="time" 
                            name="start_time"
                            id="start_time"
                            isRequired="false"
                        />
                        <x-form-input 
                            label="End Time" 
                            type="time" 
                            name="end_time"
                            id="end_time"
                            isRequired="false"
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Status" 
                            name="status"
                            id="status"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Status</option>
                            <option value="published">Published</option>
                            <option value="private">Private</option>
                        </x-form-select>
                    </div>
                    <div class="container" style="padding: 0px;color: #636363">
                        <div class="form-inline">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                                <textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-4">
                    <x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Update Participants Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="participants-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Add Participants</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Date" 
                            type="date" 
                            name="date"
                            id="date"
                            isRequired=false
                        />
                        <x-form-input 
                            label="Start Time" 
                            type="time" 
                            name="start_time"
                            id="start_time"
                            isRequired=false
                        />
                        <x-form-input 
                            label="End Time" 
                            type="time" 
                            name="end_time"
                            id="end_time"
                            isRequired=false
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Assign Line" 
                            name="assign_line"
                            id="assign_line"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Line</option>
                            <option value="1">Line 1</option>
                            <option value="2">Line 2</option>
                            <option value="3">Line 3</option>
                            <option value="4">Line 4</option>
                            <option value="5">Line 5</option>
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Group Number" 
                            type="text" 
                            name="group_number"
                            id="group_number"
                            isRequired=false
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Students" 
                            name="student_id"
                            id="student_id"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Student</option>
                            @foreach( $all_students as $key => $student )
                                <option value="{{ $student['id'] }}">{{ $student['name'] ?? '' }} / {{ $student['student_information']['student_id'] ?? '' }} / {{ $student['student_information']['level']['abbreviation'] ?? '' }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div id="selected-student_container" class="d-inline-block flex-column gap-2 mb-3">
                    </div>
                    <div class="container" style="padding: 0px;color: #636363">
                        <div class="form-inline">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                                <textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-4">
                    <x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mb-4">
                <p class="heading mb-3">Are you sure to delete this student <b><u></u></b>?</p>
                <p class="sub-heading text-secondary">
                    This student will be removed to this competition.
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" color="danger" id="process-archive" title="Continue" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Notification Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="notification-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Notification</h4>
                <span class="small-icon_btn p-2 cursor-pointer cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <form id="modal-form">
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="menu" />
                        </div>
                        <x-form-input 
                            label="Title" 
                            type="text" 
                            name="title"
                            id="title"
                            isRequired=true
                            tabindex="1"
                        />
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="file" />
                        </div>
                        <div class="form-inline w-100">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Content <span class="text-danger">*</span></label>
                                <textarea id="notification-content" name="content" tabindex="2" class="form-control" placeholder="Enter content..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="clock" />
                        </div>
                        <div class="form-inline" style="width: 100%;">
                            <div class="form-group">
                                <label for="datetime_to_send" class="form-label form-input-label">Schedule Notification to send <span class="text-danger">*</span></label>
                                <div class="d-flex gap-1">
                                    <div class="col-6">
                                        <input name="datetime_to_send" id="datetime_to_send" tabindex="3" class="form-control form-input-date" type="datetime-local">
                                    </div>
                                </div>
                                <div class="col-12 d-flex align-items-center gap-1 mt-2">
                                    <input type="checkbox" name="send_immediate" tabindex="4" id="send-immediately">
                                    <label for="send-immediately">Send Immediately</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="list" />
                        </div>
                        <x-form-select
                            label="Category" 
                            name="category"
                            id="category"
                            isRequired="true"
                            tabindex="5"
                        >
                            <option value="" hidden>Select Category</option>
                            <option value="competition">Competition</option>
                            <option value="coach-absent">Coach Absent</option>
                            <option value="student-absent">Student Absent</option>
                            <option value="class-cancel">Class Cancel</option>
                            <option value="class-migration">Class Migration</option>
                            <option value="emergency">Emergency</option>
                            <option value="others">Others</option>
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <div class="form-inline">
                            <div class="form-group">
                                <label for="" class="form-label form-input-label">Send Via <span class="text-danger">*</span></label>
                                <div class="d-flex gap-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" name="send_via_email" tabindex="6" id="via-email" checked>
                                        <label for="via-email">Via Email</label>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" name="send_via_app" tabindex="7" id="via-app">
                                        <label for="via-app">Via App</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal" customStyle="cancel_btn"/>
                <x-primary-button type="button" id="process-notification" title="Confirm" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    var errors = [];
    var selectedData = {};
    var selectedStudents = [];
    var formAction = '';
    var competitionGroupID = '';
    var studentID = '';

    $(function() {
        tinymce.init({
            selector: '#notification-content',
            height: 300,
            auto_focus: '#tinymce'
            // other configuration options...
        });

        // PARTICIPANTS
        $('#add-participants_btn').on('click', function(){
            formAction = 'add';
        });

        $('#participants-modal #modal-form select[name=student_id]').on('change', function(){
            const val = $(this).val();

            const isExist = selectedStudents.find(val => val.student_id == val);

            if( isExist )
                return;

            selectedStudents.push({
                student_id: val
            });

            $(this).val("");

            processDisplayStudentSelected();

            $('.remove-student').on('click', function(){
                const index = $(this).data('index');
                
                selectedStudents.splice(index, 1);
                
                processDisplayStudentSelected();
            });
        });

        $('#notification-modal .cancel_btn').on('click', function(){
            window.location = window.location
        });

        $('#participants-modal #save-form_btn').on('click', async function(){
            $(this).attr('disabled', 'true');
			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#participants-modal #modal-form').serializeArray();

            const requiredFields = [
                'date', 'start_time', 'end_time',
                'assign_line', 'group_number'
            ];

			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');
				return;
			}
            let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            transformedData['students'] = selectedStudents;
            const pageData = <?= json_encode($data) ?>;

            transformedData['competition_category_id'] = pageData.id;
            
            // $(this).removeAttr('disabled');
            // console.log(transformedData);
            // return;
            if ( formAction == 'add' )
				// API Request to save level
				await axios.post(`${getApiUrl()}/competition-group/add`, transformedData, {
						headers: {
							'Content-Type': 'application/json',
							'Authorization': 'Bearer ' + userToken
						}
					}).then(res => {
                        if ( res.data.success ) {
                            competitionGroupID = res.data.data.id
                            $('#participants-modal #cancel-btn').click();

                            toastTopEnd("Success", res.data.message, "success");
                            $('#notification-modal').modal('show')
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

						console.error('Error fetching data:', error.response.data);
					});
        });

        $('.main-page_table_info').on('click', '#edit-competition_category_btn', function(){
            const competitionCategory = <?= json_encode($data) ?>;

            $('select[name=category_id]').val(competitionCategory.category_id);
            $('input[name=start_date]').val(competitionCategory.start_date);
            $('input[name=end_date]').val(competitionCategory.end_date);
            $('input[name=start_time]').val(competitionCategory.start_time);
            $('input[name=end_time]').val(competitionCategory.end_time);
            $('select[name=status]').val(competitionCategory.status);
            $('textarea[name=remarks]').val(competitionCategory.remarks);

            selectedData = competitionCategory;
        });

        // Modal Form Submit
        $('#competition-category-modal').on('click', '#save-form_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#modal-form').serializeArray();

            const requiredFields = [
                'category_id', 'school_venue_id', 'school_venue_facility_id',
                'competition_size', 'enrollment_price', 'start_date', 'start_time', 
                'end_time', 'status', 'remarks'
            ];
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

            let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            // console.log(transformedData);
            // return;
            transformedData['id'] = selectedData.id.toString();
            // Format the time
            const startTime = transformedData['start_time'].split(':');
            transformedData['start_time'] = startTime[0] + ":" + startTime[1];

            const endTimeTime = transformedData['end_time'].split(':');
            transformedData['end_time'] = endTimeTime[0] + ":" + endTimeTime[1];

            // return;
            await axios.post(`${getApiUrl()}/competition/update-category`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#competition-category-modal #cancel-btn').click();

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

        // NOTIFICATION
        // Get the current date and time
        const now = new Date();
        const formattedDate = now.toISOString().slice(0, 16); // Format: "YYYY-MM-DDTHH:mm"
        $('input[name=datetime_to_send]').val(formattedDate);

        $('input[name=send_via_email]').on('change', function(){
            $('input[name=send_via_app]').prop('checked', false);
        });

        $('input[name=send_via_app]').on('change', function(){
            $('input[name=send_via_email]').prop('checked', false);
        });

        $('#notification-modal #process-notification').on('click', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

            var content = tinymce.get('notification-content').getContent();
            $('#notification-content').val(content);
            
			// Prepare Data
			const formData = $('#notification-modal #modal-form').serializeArray();

            const requiredFields = [
                'title', 'content', 'datetime_to_send',
                'category'
            ];

			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

            let transformedData = {};
            let excludeFromFormData = ['send_via_email', 'send_via_app'];
			formData.forEach(function(item) {
                if(! excludeFromFormData.includes(item.name) )
				    transformedData[item.name] = item.value;
			});

            transformedData['competition_group_id'] = competitionGroupID;

            let sendVia = "email";
            if ( $('input[name=send_via_email]').is(':checked') )
                sendVia = "email";

            if( $('input[name=send_via_app]').is(':checked') )
                sendVia = "app";

            let sendImmediate = 0;
            if( $('input[name=send_immediate]').is(':checked') )
                sendImmediate = 1;

            transformedData['competition_group_id'] = competitionGroupID;
            transformedData['send_via'] = sendVia;
            transformedData['send_immediate'] = sendImmediate;
            transformedData['students'] = selectedStudents;
            
            // API Request to save level
            await axios.post(`${getApiUrl()}/competition-notification/add`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        $('#notification-modal .cancel_btn').click();

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

                    console.error('Error fetching data:', error.response.data);
                });
        });

        // DELETE STUDENT
        $('#student-table .delete-button').on('click', function(){
            const id = $(this).data('id');
            const name = $(this).data('name');

            studentID = id;

            $('#delete-modal .heading u').text(name);
        });

        $('#delete-modal #process-archive').on('click', async function(){
            $(this).attr('disabled', 'true');
            
            // get user token
			const userToken = getUserToken();

            await axios.delete(`${getApiUrl()}/competition-group/archive-student/${studentID}`, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        $('#delete-modal #cancel-btn').click();

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
                    
                    console.error('Error fetching data:', error.response.data);
                });
        });

        // Error Validations
        function processErrorValidation(formData, requiredFields) {
			errors = [];
            let startTime = '';
			let endTime = '';

			formData.forEach(function(item) {
				if ( requiredFields.includes(item.name) ) {
					if( item.value == "" ){
						errors.push({
							field_name: item.name,
							message: formatString(item.name) + " is required."
						});
					}

                    if( item.name == 'start_time' )
						startTime = item.value;

					if( item.name == 'end_time' )
						endTime = item.value;
				}
			});

            if ( endTime < startTime )
				errors.push({
					field_name: 'end_time',
					message: "Cannot be less than to Start Time."
				});

			if ( startTime > endTime )
				errors.push({
					field_name: 'start_time',
					message: "Cannot be greater than to End Time."
				});
            console.log(errors);
			if ( errors.length > 0 ) {
				renderErrors();

				return true;
			}

			return false;
		}

		function renderErrors() {
			if ( errors.length > 0 ) {
                const hasParentFields = ['date'];

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

        function processDisplayStudentSelected()
        {
            const students = <?= json_encode($all_students) ?>;
            
            let items = "";
            selectedStudents.forEach((element, key) => {
                const student = students.find(value => value.id == parseInt(element.student_id));
                
                items += `<div class="d-flex align-items-center justify-content-between gap-4 border rounded p-2">
                            <p>${student.name} / ${student.student_information.student_id} / ${student.student_information.level ? student.student_information.level.abbreviation : '-'}</p>
                            <span class="remove-student cursor-pointer" data-index="${key}"><x-svg-icon icon='times' /></span>
                        </div>`;
            });

            $('#selected-student_container').empty();
            $('#selected-student_container').append(items);
        }
    });
</script>
@endsection