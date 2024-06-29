<div class="row pl-3">
    <!-- Table List -->
    <div class="col-9 page-content-col">
        <div class="tab-content p-3 pt-4">
            <div class="row">
                <div class="col-10">
                    <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
                </div>
                <div class="col-2">
                    <x-form-select
                        label="" 
                        name="action"
                        id="action_btn"
                        isRequired="true"
                    >
                        <option value="" hidden>Actions</option>
                        <option value="bulk-archive">Bulk Archive</option>
                        <option value="bulk-assign">Bulk Assign</option>
                        <option value="bulk-delete">Bulk Delete</option>
                        <!-- <option value="bulk-assign">Bulk Assign</option> -->
                    </x-form-select>
                </div>
            </div>
            <div class="table-responsive table-custom with-custom-search mt-4">
                <table class="table table-hover w-100" id="waiting-list-table">
                    <thead>
                        <tr>
                            <th class="text-left"><input type="checkbox"></th>
                            <th class="text-left">STUDENT NAME</th>
                            <th class="text-left">COURSE ENROLL</th>
                            <th class="text-left">COURSE LEVEL</th>
                            <th class="text-left">COURSE TYPE</th>
                            <th class="text-left">REMARKS</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($waitingLists['all'] as $waiting_list)
                            <tr data-id="{{ $waiting_list['id'] }}">
                                <td><input type="checkbox"></td>
                                <td>{{ $waiting_list['user']['name'] }}</td>
                                <td>{{ optional($waiting_list['package']['course'])['course_abbreviation'] }}</td>
                                <td>{{ optional($waiting_list['package']['course']['level'])['name'] }}</td>
                                <td>{{ optional($waiting_list['package']['course']['course_type'])['name'] }}</td>
                                <td>{{ $waiting_list['remarks'] ?? '-' }}</td>
                                <td>
                                    <div>
                                        <button type="button" class="view-button" id="view-btn" data-row_id="{{ $waiting_list['id'] }}" data-bs-toggle="modal" data-bs-target="#waiting-list-modal">
                                            <x-svg-icon icon="assign" width="20" height="20" />
                                        </button>
                                        <button type="button" class="delete-button" id="delete-btn" data-row_id="{{ $waiting_list['id'] }}" data-bs-toggle="modal" data-bs-target="#delete-waiting-list-modal">
                                            <x-svg-icon icon="delete" width="16" height="16" />
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
    <!-- Table Information -->
    <div class="col-3">
        <div class="card">
            <div class="card-body main-page_normal_card_info">
                <div class="col mb-4">
                    <div>
                        <h1 class="fw-semibold card-heading text-center">Waiting List</h1>
                    </div>
                </div>
                <div class="mb-3">
                    <h1 class="fw-semibold card-sub_heading">INFORMATION</h1>
                </div>
                <div class="col border-bottom">
                    <ul class="list-group border-none">
                        <li class="list-group-item d-xxl-flex p-0" style="border-style: none;">
                            <div class="container p-0">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Student Name</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-student_name" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Course</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-course" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Course Level</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-course_level" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Course Type</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-course_type" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Modified by</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-modified_by" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Modified Date</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-updated_at" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- <div class="col mt-4">
                    <div class="col-md-12 mb-3">
                        <h1 class="card-detail_title">Notes</h1>
                    </div>
                    <div class="col-md-12">
                        <h1 id="detail-updated_at" class="card-detail_sub_title">For the Reservation, please check the payment in “Accounting”.</h1>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="delete-waiting-list-modal">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p style="color: #FF4550;font-size: 20px;font-family: Poppins, sans-serif;">Are you sure to remove this student from the waiting list?</p>
			</div>
			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button id="cancel-btn" class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button id="delete-from-waiting-list" class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Yes</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="bulk-delete-modal">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p style="color: #FF4550;font-size: 20px;font-family: Poppins, sans-serif;">Are you sure to remove the selected students from the waiting list?</p>
			</div>
			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button id="cancel-btn" class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button id="delete-bulk" class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Yes</button>
			</div>
		</div>
	</div>
</div>

<!-- Bulk Assign Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="bulk-assign-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Bulk Assign Enrollment</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div>
                    <table class="table table-hover w-100" id="bulk-assign-students-table">
                        <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="text-left">NAME</th>
                                <th class="text-left">CHINESE NAME</th>
                                <th class="text-left">hkid</th>
                                <th class="text-left">GENDER</th>
                                <th class="text-left">DOB</th>
                                <th class="text-left">LEVEL</th>
                                <th class="text-left">PHONE</th>
                                <th class="text-left">ADDRESS</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <form id="form-container">
                        <div class="container form-input-container mb-3">
                            <label class="form-label" style="color: #636363;font-size: 14px;">Arrangements <span class="text-danger">*</span></label>
                            <div class="row radio-group">
                                <div class='col-4'>
                                    <label for="available">
                                        <span>Available Course & Class</span>
                                        <input type="radio" name="status" value="available" id="available" checked>
                                    </label>
                                </div>
                                <div class='col-4'>
                                    <label for="add_class">
                                        <span>Add Class on current Course</span>
                                        <input type="radio" name="status" value="add_class" id="add_class">
                                    </label>
                                </div>
                                <div class='col-4'>
                                    <label for="add_course">
                                        <span>Add Course</span>
                                        <input type="radio" name="status" value="add_course" id="add_course">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" color="primary" id="next-btn" title="Next" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="bulk-next-waiting-list-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Available course & class</h4>
                <span class="small-icon_btn p-2 cursor-pointer cancel-btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div>
                    <form id="form-container">
                        <div class="available-add-class-container">
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-4">
                                <x-form-select
                                    label="Course Type" 
                                    name="course_type"
                                    id="course_type"
                                    isRequired="true"
                                >
                                    <option value="" hidden>Select Course Type</option>
                                    @foreach($waitingLists['course_types'] as $course_type)
                                        <option value="{{ $course_type['id'] }}">{{ $course_type['name'] }}</option>
                                    @endforeach
                                </x-form-select>
                                <x-form-select
                                    label="Course Name" 
                                    name="course_id"
                                    id="course_id"
                                    isRequired="true"
                                >
                                    <option value="" hidden>Select Course</option>
                                </x-form-select>
                            </div>
                        </div>
                        <div class="available-add-class-container">
                            <dl class="row mb-2">
                                <dd class="col-sm-3">Number of class to complete</dd>
                                <dd class="col-sm-9" id="course-number_to_complete">-</dd>
                            </dl>
                        </div>
                        <div class="add-course-container d-none">
                            <div class="col" style="width: 100%;">
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-select
                                        label="Course Level" 
                                        name="default_level_id"
                                        id="default_level_id"
                                        isRequired="true"
                                    >
                                        <option value="" hidden>Select Course Level</option>
                                        @foreach($waitingLists['levels'] as $level)
                                            <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                    <x-form-select
                                        label="Coach" 
                                        name="coach_id"
                                        id="coach_id"
                                        isRequired="true"
                                    >
                                        <option value="" hidden>Select Coach</option>
                                        @foreach($waitingLists['coaches'] as $coach)
                                            <option value="{{ $coach['id'] }}">{{ $coach['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-input 
                                        label="Class Size (Maximum Number of Students)" 
                                        type="number" 
                                        name="class_size"
                                        id="class_size"
                                        placeholder="0"
                                        isRequired=true
                                    />    
                                    <x-form-input 
                                        label="Fee (RM) Per Class" 
                                        type="number" 
                                        name="fee_per_class"
                                        id="fee_per_class"
                                        isRequired=true
                                        placeholder="0.00"
                                    />
                                </div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-input 
                                        label="Sales Per Class" 
                                        type="number" 
                                        name="course_sale_price"
                                        id="course_sale_price"
                                        isRequired=false
                                        placeholder="0.00"
                                    />    
                                    <x-form-input 
                                        label="Class Number to Complete" 
                                        type="number" 
                                        name="class_number_to_complete"
                                        id="class_number_to_complete"
                                        isRequired=true
                                        placeholder="0"
                                    />
                                </div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-select
                                        label="Venue" 
                                        name="default_venue_id"
                                        id="default_venue_id"
                                        isRequired="true"
                                    >
                                        <option value="" hidden>Select Venue</option>
                                        @foreach($waitingLists['venues'] as $venue)
                                            <option value="{{ $venue['id'] }}">{{ $venue['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                    <x-form-select
                                        label="Facility" 
                                        name="facility_id"
                                        id="facility_id"
                                        isRequired="false"
                                    >
                                        <option value="" hidden>Please Select Venue First</option>
                                    </x-form-select>
                                </div>
                                <div class="container" style="padding: 0px;color: #636363;">
                                    <div class="form-inline">
                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <label class="form-label" style="color: #636363;font-size: 14px;">Course Category</label>
                                            <div class="grid-reapeat-col-3 gap-3">
                                                @foreach($waitingLists['course_types'] as $course_type)
                                                    <div class="col">
                                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                                            <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{ $course_type['name'] }}</label>
                                                            <input type="radio" name="course_type" class="course-type-{{ $course_type['id'] }}" value="{{ $course_type['id'] }}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Class List-->
                        <div class="mt-3">
                            <!-- This filter Only for flexible course  -->
                            <div class="container d-xxl-flex align-items-end form-input-container gap-4 mb-3">
                                <div class="form-class_filter w-100">
                                    <x-form-input 
                                        label="Time Filter" 
                                        type="time" 
                                        name="time"
                                        id="time"
                                        isRequired=false
                                    />
                                </div>
                                <x-primary-button type="button" color="primary" id="add-class-btn" title="Add Class" customClass="sm mb-1" toggle="" target=""/>
                            </div>
                            <div class="table-responsive table-custom with-custom-search mt-4">
                                <table class="table table-hover w-100" id="class-list-table">
                                    <thead>
                                        <tr>
                                            <th class="text-left"></th>
                                            <th class="text-left">CLASS NAME</th>
                                            <th class="text-left">CLASS DATE</th>
                                            <th class="text-left">CLASS START TIME</th>
                                            <th class="text-left">CLASS END TIME</th>
                                            <th class="text-left">CLASS CAPACITY</th>
                                            <th class="text-left">CLASS FEEs</th>
                                            <th class="text-left"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="no-record">
                                            <td colspan="8" class="text-center">No Record Found</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <dl class="row mb-2">
                                    <dd class="col-sm-2">Total Fee</dd>
                                    <dd class="col-sm-10" id="class-total_fee">-</dd>
                                </dl>
                            </div>
                            <div class="container" style="padding: 0px;color: #636363">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                                        <textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="back-btn" title="Back" dismiss="modal"/>
                <div>
                    <x-secondary-button type="button" id="reserved-enrollment-btn" title="Reserved Enrollment" dismiss=""/>
                    <x-primary-button type="button" color="primary" id="pay-now-btn" title="Pay Now" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="waiting-list-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Assign Enrollment</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div>
                    <div class="accordion" id="student-detail_container">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Student Details
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body pl-0 pr-0">
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Image</dd>
                                        <dd class="col-sm-9">
                                            <div class="main-page_avatar-container">
                                                <img id="main-page_avatar" src="{{ asset('themes/tailwind/images/profile.png') }}">
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">#</dd>
                                        <dd class="col-sm-9" id="wait-list-student_id">4</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Name</dd>
                                        <dd class="col-sm-9" id="wait-list-student_name">John Doe</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">chinese_name</dd>
                                        <dd class="col-sm-9" id="wait-list-student_chinese">伍正文</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">hkid</dd>
                                        <dd class="col-sm-9" id="wait-list-student_hkid">23124aw</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Gender</dd>
                                        <dd class="col-sm-9" id="wait-list-student_gender">Male</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">DOB</dd>
                                        <dd class="col-sm-9" id="wait-list-student_dob">2014-03-06</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Level</dd>
                                        <dd class="col-sm-9" id="wait-list-student_level">Ripplet Starter 2</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Phone</dd>
                                        <dd class="col-sm-9" id="wait-list-student_phone">+1 (734) 805-3965</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Address</dd>
                                        <dd class="col-sm-9" id="wait-list-student_address">Ea magnam quasi pari</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="form-container">
                        <div class="container form-input-container mb-3">
                            <label class="form-label" style="color: #636363;font-size: 14px;">Arrangements <span class="text-danger">*</span></label>
                            <div class="row radio-group">
                                <div class='col-4'>
                                    <label for="available">
                                        <span>Available Course & Class</span>
                                        <input type="radio" name="status" value="available" id="available" checked>
                                    </label>
                                </div>
                                <div class='col-4'>
                                    <label for="add_class">
                                        <span>Add Class on current Course</span>
                                        <input type="radio" name="status" value="add_class" id="add_class">
                                    </label>
                                </div>
                                <div class='col-4'>
                                    <label for="add_course">
                                        <span>Add Course</span>
                                        <input type="radio" name="status" value="add_course" id="add_course">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" color="primary" id="next-btn" title="Next" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="next-waiting-list-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Available course & class</h4>
                <span class="small-icon_btn p-2 cursor-pointer cancel-btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div>
                    <form id="form-container">
                        <div class="available-add-class-container">
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-4">
                                <x-form-select
                                    label="Course Type" 
                                    name="course_type"
                                    id="course_type"
                                    isRequired="true"
                                >
                                    <option value="" hidden>Select Course Type</option>
                                    @foreach($waitingLists['course_types'] as $course_type)
                                        <option value="{{ $course_type['id'] }}">{{ $course_type['name'] }}</option>
                                    @endforeach
                                </x-form-select>
                                <x-form-select
                                    label="Course Name" 
                                    name="course_id"
                                    id="course_id"
                                    isRequired="true"
                                >
                                    <option value="" hidden>Select Course</option>
                                </x-form-select>
                            </div>
                        </div>
                        <div class="available-add-class-container">
                            <dl class="row mb-2">
                                <dd class="col-sm-3">Number of class to complete</dd>
                                <dd class="col-sm-9" id="course-number_to_complete">-</dd>
                            </dl>
                        </div>
                        <div class="add-course-container d-none">
                            <div class="col" style="width: 100%;">
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-select
                                        label="Course Level" 
                                        name="default_level_id"
                                        id="default_level_id"
                                        isRequired="true"
                                    >
                                        <option value="" hidden>Select Course Level</option>
                                        @foreach($waitingLists['levels'] as $level)
                                            <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                    <x-form-select
                                        label="Coach" 
                                        name="coach_id"
                                        id="coach_id"
                                        isRequired="true"
                                    >
                                        <option value="" hidden>Select Coach</option>
                                        @foreach($waitingLists['coaches'] as $coach)
                                            <option value="{{ $coach['id'] }}">{{ $coach['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-input 
                                        label="Class Size (Maximum Number of Students)" 
                                        type="number" 
                                        name="class_size"
                                        id="class_size"
                                        placeholder="0"
                                        isRequired=true
                                    />    
                                    <x-form-input 
                                        label="Fee (RM) Per Class" 
                                        type="number" 
                                        name="fee_per_class"
                                        id="fee_per_class"
                                        isRequired=true
                                        placeholder="0.00"
                                    />
                                </div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-input 
                                        label="Sales Per Class" 
                                        type="number" 
                                        name="course_sale_price"
                                        id="course_sale_price"
                                        isRequired=false
                                        placeholder="0.00"
                                    />    
                                    <x-form-input 
                                        label="Class Number to Complete" 
                                        type="number" 
                                        name="class_number_to_complete"
                                        id="class_number_to_complete"
                                        isRequired=true
                                        placeholder="0"
                                    />
                                </div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-select
                                        label="Venue" 
                                        name="default_venue_id"
                                        id="default_venue_id"
                                        isRequired="true"
                                    >
                                        <option value="" hidden>Select Venue</option>
                                        @foreach($waitingLists['venues'] as $venue)
                                            <option value="{{ $venue['id'] }}">{{ $venue['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                    <x-form-select
                                        label="Facility" 
                                        name="facility_id"
                                        id="facility_id"
                                        isRequired="false"
                                    >
                                        <option value="" hidden>Please Select Venue First</option>
                                    </x-form-select>
                                </div>
                                <div class="container" style="padding: 0px;color: #636363;">
                                    <div class="form-inline">
                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <label class="form-label" style="color: #636363;font-size: 14px;">Course Category</label>
                                            <div class="grid-reapeat-col-3 gap-3">
                                                @foreach($waitingLists['course_types'] as $course_type)
                                                    <div class="col">
                                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                                            <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{ $course_type['name'] }}</label>
                                                            <input type="radio" name="course_type" class="course-type-{{ $course_type['id'] }}" value="{{ $course_type['id'] }}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Class List-->
                        <div class="mt-3">
                            <!-- This filter Only for flexible course  -->
                            <div class="container d-xxl-flex align-items-end form-input-container gap-4 mb-3">
                                <div class="form-class_filter w-100">
                                    <x-form-input 
                                        label="Time Filter" 
                                        type="time" 
                                        name="time"
                                        id="time"
                                        isRequired=false
                                    />
                                </div>
                                <x-primary-button type="button" color="primary" id="add-class-btn" title="Add Class" customClass="sm mb-1" toggle="" target=""/>
                            </div>
                            <div class="table-responsive table-custom with-custom-search mt-4">
                                <table class="table table-hover w-100" id="class-list-table">
                                    <thead>
                                        <tr>
                                            <th class="text-left"></th>
                                            <th class="text-left">CLASS NAME</th>
                                            <th class="text-left">CLASS DATE</th>
                                            <th class="text-left">CLASS START TIME</th>
                                            <th class="text-left">CLASS END TIME</th>
                                            <th class="text-left">CLASS CAPACITY</th>
                                            <th class="text-left">CLASS FEEs</th>
                                            <th class="text-left"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="no-record">
                                            <td colspan="8" class="text-center">No Record Found</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <dl class="row mb-2">
                                    <dd class="col-sm-2">Total Fee</dd>
                                    <dd class="col-sm-10" id="class-total_fee">-</dd>
                                </dl>
                            </div>
                            <div class="container" style="padding: 0px;color: #636363">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                                        <textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="back-btn" title="Back" dismiss="modal"/>
                <div>
                    <x-secondary-button type="button" id="reserved-enrollment-btn" title="Reserved Enrollment" dismiss=""/>
                    <x-primary-button type="button" color="primary" id="pay-now-btn" title="Pay Now" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" tabindex="-1" id="waitlist-notification-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Notification</h4>
                <div class="d-flex align-items-center gap-2">
                    <span class="small-icon_btn p-2 cursor-pointer edit_form_btn"><x-svg-icon icon="edit" /></span>
                    <span class="small-icon_btn p-2 cursor-pointer d-none preview_form_btn"><x-svg-icon icon="view" /></span>
                    <span class="small-icon_btn p-2 cursor-pointer cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div class="modal-body p-4 pt-0">
                <form id="modal-form" class="d-none">
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
                            value="Enrollment Record"
                        />
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="file" />
                        </div>
                        <div class="form-inline w-100">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Content <span class="text-danger">*</span></label>
                                <textarea id="waitlist-notification-content" name="content" tabindex="2" class="form-control" placeholder="Enter content..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Enroll Course successful. We have reserved your seat. Please settle the payment of $1860.

                                    If you have any questions, please contact 22956066, Whatsapp 5507 5333 or email to knock@hkswimmingacademy.com.</textarea>
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
                                    <input type="checkbox" name="send_immediate" tabindex="4" id="send-immediately" checked>
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
                            value="enrollment"
                        >
                            <option value="" hidden>Select Category</option>
                            <option value="competition">Competition</option>
                            <option value="coach-absent">Coach Absent</option>
                            <option value="student-absent">Student Absent</option>
                            <option value="class-cancel">Class Cancel</option>
                            <option value="class-migration">Class Migration</option>
                            <option value="emergency">Emergency</option>
                            <option value="enrollment" selected>Enrollment</option>
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
                <div id="preview-form">
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="menu" />
                        </div>
                        <div class="form-inline w-100">
                            <h5 style="font-size: 20px; font-weight: 500; color: #3B3B3B;" class="preview-title">Enrollment  Record</h5>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="file" />
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-content">
                                Enroll Course successful. We have reserved your seat. Please settle the payment of $1860.<br/><br/>
                                If you have any questions, please contact 22956066, Whatsapp 5507 5333 or email to knock@hkswimmingacademy.com.
                            </p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="clock" />
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-send_content">Immediately</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="list" />
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-category">Enrollment</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <div class="form-inline w-100">
                            <p class="preview-send_via">Send via: Email</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal" customStyle="cancel_btn"/>
                <x-primary-button type="button" id="process-notification" title="Send Notification" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<style>
    /* #waiting-list-table_wrapper .row:nth-child(2) {
        min-height: calc(100vh - 50vh) !important;
        max-height: calc(100vh - 50vh) !important;
    } */

    /* .main-page_normal_card_info {
        min-height: calc(100vh - 32vh) !important;
        max-height: calc(100vh - 32vh) !important;
    } */

    .waiting-list-tab .card {
        border: none;
        border-radius: 0;
        border-left: 1px solid #e8e8e8 !important;
    }

    #student-detail_container .accordion-item {
        display: contents;
    }

    #student-detail_container .accordion-button {
        border-radius: 0;
        background-color: transparent;
        padding-left: 0;
        padding-right: 0;
        padding-bottom: 10px;
        color: #4A5C7A;
        font-size: 20px;
        font-weight: 500;
    }

    #student-detail_container .accordion-button::after {
        background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='currentColor'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>");
    }

    #student-detail_container .accordion-body{
        padding: 20px 0 20px 0;
    }

    #accordion-without-dropdown_container h2 {
        padding: 10px 0 10px 0;
        color: #4A5C7A;
        font-size: 20px;
        font-weight: 500;
        border-bottom: 1px solid #e8e8e8;
    }
    
    #accordion-without-dropdown_container .detail_body {
        padding: 20px 0 20px 0;
    }

    #form-container {
        padding: 20px 0 20px 0;
        border-top: 1px solid #e8e8e8;
    }

    dd.col-sm-3 {
        font-size: 14px;
        font-weight: 400;
        line-height: 21px;
        color: #636363;
    }

    dd.col-sm-9 {
        font-size: 14px;
        font-weight: 400;
        line-height: 21px;
        color: #3B3B3B;
    }

    #form-container .radio-group label {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 13px 10px;
        border-radius: 8px;
        background-color: #F5F5F5;
        font-size: 14px;
        font-weight: 400;
    }
</style>

<script type="text/javascript">
    $(function() {
        var arrangementStatus = 'available';
        var defaultNeClasses = [];
        var newClasses = [];
        var selectedData = {};
        var defaultSelectedClasses = [];
        var selectedClasses = [];
        var selectedCourse = {};

        var bulkArrangementStatus = 'available';
        var bulkDefaultNeClasses = [];
        var bulkNewClasses = [];
        var bulkDefaultSelectedClasses = [];
        var bulkSelectedClasses = [];
        var bulkSelectedCourse = {};

        tinymce.init({
            selector: '#waitlist-notification-content',
            height: 300,
            auto_focus: '#tinymce'
            // other configuration options...
        });

        var waitingListTable = $('#waiting-list-table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "columnDefs": [
                {
                    targets: [0],
                    orderable: false
                }
            ]
        });

        // Event listener for custom search input
        $('.waiting-list-tab').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            waitingListTable.search(searchTerm).draw();
        });

        // Display details to the rightside
        $('.waiting-list-tab #waiting-list-table tbody').on('click', 'tr', function() {
			const dataID = $(this).data('id');
            
 			const data = <?= json_encode($waitingLists['all']) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            $('.waiting-list-tab #info-student_name').text(selectedData.user.name); 
            $('.waiting-list-tab #info-course').text(selectedData.package.course.course_abbreviation);
            $('.waiting-list-tab #info-course_level').text( selectedData.package.course.level.name );
            $('.waiting-list-tab #info-course_type').text( selectedData.package.course.course_type.name );

            $('.waiting-list-tab #detail-modified_by').text( rowData.log ? rowData.log.user.name : '-' );
            $('.waiting-list-tab #detail-updated_at').text( rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});

        var selectedDatas = [];
        $('#action_btn').on('change', function() {
            switch($(this).val()) {
                case 'bulk-delete' :
                    if($('.waiting-list-tab #waiting-list-table tbody tr input[type=checkbox]:checked').length > 0) {
                        $('#bulk-delete-modal').modal('show');
                    } else {
                        toastTopEnd("Can't Process", "Please select a record in the table.", "warning");
                    }
                break;
                case 'bulk-assign' :
                    if($('.waiting-list-tab #waiting-list-table tbody tr input[type=checkbox]:checked').length > 0) {
                        $('#bulk-assign-modal #bulk-assign-students-table tbody').empty();

                        selectedDatas = [];
                        $('.waiting-list-tab #waiting-list-table tbody tr input[type=checkbox]:checked').each(function() {
                            const dataID = $(this).closest('tr').data('id');
            
                            const data = <?= json_encode($waitingLists['all']) ?>;
                            const rowData = data.find(value => value.id == dataID);

                            selectedDatas.push(rowData);

                            $('#bulk-assign-students-table tbody').append(`<tr data-id="${rowData.id}">
                                <td>${rowData.user.student_information.student_id}</td>
                                <td>${rowData.user.name}</td>
                                <td>${rowData.user.student_information.chinese_name}</td>
                                <td>${rowData.user.student_information.hkid}</td>
                                <td>${rowData.user.student_information.gender}</td>
                                <td>${rowData.user.student_information.dob}</td>
                                <td>${rowData.user.student_information.level.name}</td>
                                <td>${rowData.user.student_information.phone}</td>
                                <td>${rowData.user.student_information.address}</td>
                            </tr>`);
                        });

                        $('#bulk-assign-modal').modal('show');
                    } else {
                        toastTopEnd("Can't Process", "Please select a record in the table.", "warning");
                    }
                break;
            }

            $(this).val('');
        });

        $('#bulk-delete-modal #delete-bulk').on('click', async function() {
            $(this).attr('disabled', 'true');

            var transformedData = {};
            var selectedIds = [];

            $('.waiting-list-tab #waiting-list-table tbody tr input[type=checkbox]:checked').each(function() {
                selectedIds.push($(this).closest('tr').data('id'));
            });

            transformedData['course_enrollment_ids'] = selectedIds;

            const userToken = await getUserToken();

            await axios.post(`${getApiUrl()}/request/waitlist/bulk-delete`, transformedData, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            }).then(res => {
                $('#bulk-delete-modal #cancel-btn').click();

                if ( res.data.success ) {
                    toastTopEnd("Success", res.data.message, "success");

                    window.location = window.location
                } else {
                    toastInfo("Cant' Delete", res.data.message, "warning");

                    $(this).removeAttr('disabled');
                }
            }).catch(error => {
                $(this).removeAttr('disabled');
                
                if( error.response.status == 400 ) {
                    let errorMessages = "";
                    Object.keys(error.response.data.errors).forEach(key => {
                        error.response.data.errors[key].forEach(value => {
                            errorMessages += (`${key}: ` + value + '\n')

                            toastTopEnd("Cant' Process", errorMessages, "warning");
                        });
                    });
                }

                if( error.response.status == 404 ) {
                    toastTopEnd("Cant' Process", error.response.data.message, "warning");
                }

                if( error.response.status == 500 ) {
                    toastTopEnd("System Error", error.response.data.message, "error");
                }

                console.error('Error fetching data:', error);
            });
        });

        $('.waiting-list-tab #waiting-list-table tbody').on('click', '.delete-button', function() {
            const dataID = $(this).data('row_id');
            
            const data = <?= json_encode($waitingLists['all']) ?>;
            const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
        });

        $('#delete-waiting-list-modal #delete-from-waiting-list').on('click', async function() {
            $(this).attr('disabled', 'true');

            var transformedData = {};
            transformedData['course_enrollment_id'] = selectedData.id;

            const userToken = await getUserToken();

            await axios.post(`${getApiUrl()}/request/waitlist/delete`, transformedData, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            }).then(res => {
                $('#delete-waiting-list-modal #cancel-btn').click();

                if ( res.data.success ) {
                    toastTopEnd("Success", res.data.message, "success");

                    window.location = window.location
                } else {
                    toastInfo("Cant' Delete", res.data.message, "warning");

                    $(this).removeAttr('disabled');
                }
            }).catch(error => {
                $(this).removeAttr('disabled');
                
                if( error.response.status == 400 ) {
                    let errorMessages = "";
                    Object.keys(error.response.data.errors).forEach(key => {
                        error.response.data.errors[key].forEach(value => {
                            errorMessages += (`${key}: ` + value + '\n')

                            toastTopEnd("Cant' Process", errorMessages, "warning");
                        });
                    });
                }

                if( error.response.status == 404 ) {
                    toastTopEnd("Cant' Process", error.response.data.message, "warning");
                }

                if( error.response.status == 500 ) {
                    toastTopEnd("System Error", error.response.data.message, "error");
                }

                console.error('Error fetching data:', error);
            });
        });

        $('#bulk-assign-modal #form-container').on('change', 'input[name=status]', function(){
            bulkArrangementStatus = $(this).val();
        });

        $('#bulk-assign-modal #next-btn').on('click', function() {
            bulkNewClasses = [];
            bulkDefaultNeClasses = [];
            bulkDefaultSelectedClasses = [];
            bulkSelectedClasses = [];
            bulkSelectedCourse = null;

            $('#bulk-next-waiting-list-modal select[name=course_type]').val('').trigger('change');
            $('#bulk-next-waiting-list-modal select[name=course_id]').val('').trigger('change');
            $('#course-number_to_complete').text('-');

            renderBulkSelectedClasses();

            $('#bulk-assign-modal #cancel-btn').click();
            $('#bulk-next-waiting-list-modal').modal('show');

            // Reset
            $('#bulk-next-waiting-list-modal .available-add-class-container select[name=course_type]').removeAttr('disabled');
            $('#bulk-next-waiting-list-modal .available-add-class-container select[name=course_id]').removeAttr('disabled');
            $('#bulk-next-waiting-list-modal .available-add-class-container dl').removeClass('d-none')
            $('#bulk-next-waiting-list-modal .form-class_filter .form-inline').addClass('d-none');

            // Reset add course fields
            $('#bulk-next-waiting-list-modal .add-course-container select[name=default_level_id]').val("");
            $('#bulk-next-waiting-list-modal .add-course-container select[name=coach_id]').val("");
            $('#bulk-next-waiting-list-modal .add-course-container input[name=class_size]').val("");
            $('#bulk-next-waiting-list-modal .add-course-container input[name=fee_per_class]').val("");
            $('#bulk-next-waiting-list-modal .add-course-container input[name=course_sale_price]').val("");
            $('#bulk-next-waiting-list-modal .add-course-container input[name=class_number_to_complete]').val("");
            $('#bulk-next-waiting-list-modal .add-course-container select[name=default_venue_id]').val("");
            $('#bulk-next-waiting-list-modal .add-course-container select[name=facility_id]').val("");
            $('#bulk-next-waiting-list-modal .add-course-container input[name=course_type]').prop("checked", false);

            // change the title of waiting list information
            if( bulkArrangementStatus == 'available' ) {
                $('#bulk-next-waiting-list-modal .modal-title').text('Available course & class');

                // Hide add class button
                // $('#bulk-next-waiting-list-modal #form-container #add-class-btn').addClass('d-none');

                // hide some fields
                $('#bulk-next-waiting-list-modal .available-add-class-container').removeClass('d-none');
                $('#bulk-next-waiting-list-modal .add-course-container').addClass('d-none');
            }

            if( bulkArrangementStatus == 'add_class' ) {
                $('#bulk-next-waiting-list-modal .modal-title').text('Add Class on current Course');

                // hide some fields
                $('#bulk-next-waiting-list-modal .available-add-class-container').removeClass('d-none');
                $('#bulk-next-waiting-list-modal .add-course-container').addClass('d-none');

                // Assign the course type and course on the two field
                $('#bulk-next-waiting-list-modal .available-add-class-container select[name=course_type]').val(selectedData.package.course.course_type.id).trigger('change');
                $('#bulk-next-waiting-list-modal .available-add-class-container select[name=course_id]').val(selectedData.package.course.id).trigger('change');

                // Disable the two column
                $('#bulk-next-waiting-list-modal .available-add-class-container select[name=course_type]').attr('disabled', true);
                $('#bulk-next-waiting-list-modal .available-add-class-container select[name=course_id]').attr('disabled', true);

                // hide the number of class to complete display when the course term is flexible
                $('#bulk-next-waiting-list-modal .available-add-class-container dl').addClass('d-none');
            }

            if( bulkArrangementStatus == 'add_course' ) {
                $('#bulk-next-waiting-list-modal .modal-title').text('Add Course');

                // Show add class button
                $('#bulk-next-waiting-list-modal #form-container #add-class-btn').removeClass('d-none');

                // hide some fields
                $('#bulk-next-waiting-list-modal .available-add-class-container').addClass('d-none');
                $('#bulk-next-waiting-list-modal .add-course-container').removeClass('d-none');
            }

            $('#bulk-next-waiting-list-modal [name=remarks]').val("");
            clearFormFieldErrors('#bulk-next-waiting-list-modal #form-container');
        });

        $('#bulk-next-waiting-list-modal').on('change', 'select[name=course_type]', function(){
            const value = $(this).val();

            const systemCourses = <?= json_encode($waitingLists['courses']) ?>;
            const courses = systemCourses.filter(function(course){
                return parseInt(course.course_type) == parseInt(value)
            });

            // Fill the select courses with filtered data
            let courseSelectOptions = '<option value="" hidden>Select Course</option>';
            courses.forEach(function(value){
                courseSelectOptions += `<option value="${value.id}" >${value.course_abbreviation}</option>`;
            });

            $('#bulk-next-waiting-list-modal select[name=course_id]').empty();
            $('#bulk-next-waiting-list-modal select[name=course_id]').append(courseSelectOptions);
        });

        $('#bulk-next-waiting-list-modal').on('change', 'select[name=course_id]', function(){
            const value = $(this).val();
            const systemCourses = <?= json_encode($waitingLists['courses']) ?>;
            const course = systemCourses.find(course => course.id == value);
            if ( !course )
                return;

            // get the classes related to the course selected
            const systemClasses = <?= json_encode($waitingLists['classes']) ?>;
            const classes = systemClasses.filter((data) => {
                return data.course_id == value;
            });

            bulkDefaultSelectedClasses = classes;
            bulkSelectedCourse = course;
            bulkSelectedClasses = classes;
            
            renderBulkSelectedClasses();

            $('#bulk-next-waiting-list-modal #course-number_to_complete').text(bulkSelectedClasses.length + "/" + course.class_number_to_complete);
        });

        $('#bulk-next-waiting-list-modal').on('change', 'input[name=time]', function(){
            const inputValue = $(this).val();
            if( bulkArrangementStatus == 'available' ) {
                const filteredClasses = defaultSelectedClasses.filter(function (obj) {
                    var startTime = new Date("1970-01-01T" + obj.start_time + "Z");
                    var endTime = new Date("1970-01-01T" + obj.end_time + "Z");
                    var filterDateTime = new Date("1970-01-01T" + inputValue + "Z");
                    console.log("startTime:: ", startTime)
                    console.log("endTime:: ", endTime)
                    console.log("filterDateTime:: ", filterDateTime)
                    // var startTime = obj.start_time;
                    // var endTime = obj.end_time;

                    // Perform the filtering based on the entered time
                    return filterDateTime === "" || (startTime <= filterDateTime && endTime >= filterDateTime);
                });

                bulkSelectedClasses = filteredClasses;

                renderBulkSelectedClasses();
            } 

            else if( bulkArrangementStatus == 'add_class' ){
                const filteredClasses = bulkDefaultSelectedClasses.filter(function (obj) {
                    var startTime = new Date("1970-01-01T" + obj.start_time + "Z");
                    var endTime = new Date("1970-01-01T" + obj.end_time + "Z");
                    var filterDateTime = new Date("1970-01-01T" + inputValue + "Z");

                    // Perform the filtering based on the entered time
                    return filterDateTime === "" || (startTime <= filterDateTime && endTime >= filterDateTime);
                });

                bulkSelectedClasses = filteredClasses;
                renderBulkSelectedClasses();

                const filteredNewClasses = bulkDefaultNeClasses.filter(function (obj) {
                    var startTime = new Date("1970-01-01T" + obj.start_time + "Z");
                    var endTime = new Date("1970-01-01T" + obj.end_time + "Z");
                    var filterDateTime = new Date("1970-01-01T" + inputValue + "Z");

                    // Perform the filtering based on the entered time
                    return filterDateTime === "" || (startTime <= filterDateTime && endTime >= filterDateTime);
                });

                bulkNewClasses = filteredNewClasses;
                renderNewClassRowsBulk();
            }

            
            else if( arrangementStatus == 'add_course' ){
                const filteredNewClasses = bulkDefaultNeClasses.filter(function (obj) {
                
                    var startTime = new Date("1970-01-01T" + obj.start_time.slice(0, 5) + "Z");
                    var endTime = new Date("1970-01-01T" + obj.end_time.slice(0, 5) + "Z");
                    var filterDateTime = new Date("1970-01-01T" + inputValue.slice(0, 5) + "Z");
                    // Perform the filtering based on the entered time
                    return filterDateTime === "" || (startTime <= filterDateTime && endTime >= filterDateTime);
                });

                bulkNewClasses = filteredNewClasses;
                renderNewClassRowsBulk();
            }
            
        });

        function renderBulkSelectedClasses()
        {
            if( bulkDefaultSelectedClasses.length <= 0 && !bulkSelectedCourse ) {
                $('#bulk-next-waiting-list-modal #class-list-table tbody').empty();
                $('#bulk-next-waiting-list-modal #class-list-table tbody').append(`<tr class="no-record">
                                <td colspan="8" class="text-center">No Record Found</td>
                            </tr>`);
                
                // display the total class fee
                $('#bulk-next-waiting-list-modal #class-total_fee').text('0.00');

                $('#bulk-next-waiting-list-modal #form-container #add-class-btn').addClass('d-none');

                return;
            }

            if( bulkArrangementStatus == 'available' ) {
                $('#bulk-next-waiting-list-modal #form-container #add-class-btn').addClass('d-none');
            }

            if( bulkArrangementStatus == 'add_class' || bulkArrangementStatus == 'add_course' ) {
                $('#bulk-next-waiting-list-modal #form-container #add-class-btn').removeClass('d-none');
            }

            let classRows = '';
            let classTotalFee = 0;
            if( bulkDefaultSelectedClasses.length <= bulkSelectedCourse.class_number_to_complete ) {
                // display all filtered bulkDefaultSelectedClasses to the table without checkbox
                bulkDefaultSelectedClasses.forEach((classData) => {
                    const startTimeObj = new Date(`2000-01-01 ${classData.start_time}`);
                    const endTimeObj = new Date(`2000-01-01 ${classData.end_time}`);

                    classRows += `<tr>
                                    <td></td>
                                    <td>${classData.course_class_code}</td>
                                    <td>${classData.start_date}</td>
                                    <td>${moment(startTimeObj).format("h:mm A")}</td>
                                    <td>${moment(endTimeObj).format("h:mm A")}</td>
                                    <td>${classData.formatted_class_seat_ratio}</td>
                                    <td>${classData.course.course_full_price}</td>
                                    <td></td>
                                </tr>`;
                    classTotalFee += parseFloat(classData.course.course_full_price);
                })

                bulkSelectedClasses = bulkDefaultSelectedClasses

                // $('#add-class-btn').removeClass('d-none');
            }

            if( bulkDefaultSelectedClasses.length > bulkSelectedCourse.class_number_to_complete) {
                classRows = '';
                classTotalFee = 0;

                // display all filtered defaultSelectedClasses to the table without checkbox
                bulkDefaultSelectedClasses.forEach((classData) => {
                    const startTimeObj = new Date(`2000-01-01 ${classData.start_time}`);
                    const endTimeObj = new Date(`2000-01-01 ${classData.end_time}`);

                    classRows += `<tr>
                                    <td><input type="checkbox" class="class-checkbox" data-id="${classData.id}"></td>
                                    <td>${classData.course_class_code}</td>
                                    <td>${classData.start_date}</td>
                                    <td>${moment(startTimeObj).format("h:mm A")}</td>
                                    <td>${moment(endTimeObj).format("h:mm A")}</td>
                                    <td>${classData.formatted_class_seat_ratio}</td>
                                    <td>${classData.course.course_full_price}</td>
                                    <td></td>
                                </tr>`;
                })

                bulkSelectedClasses = [];

                // $('#add-class-btn').removeClass('d-none');
            }

            if( bulkDefaultSelectedClasses.length <= 0 ){
                classRows = `<tr class="no-record">
                                <td colspan="8" class="text-center">No Record Found</td>
                            </tr>`;
                // $('#add-class-btn').addClass('d-none');
            }

            $('#bulk-next-waiting-list-modal #class-list-table tbody').empty();
            $('#bulk-next-waiting-list-modal #class-list-table tbody').append(classRows);
            
            // display the total class fee
            $('#bulk-next-waiting-list-modal #class-total_fee').text(classTotalFee.toFixed(2));
        }

        $('#bulk-next-waiting-list-modal #class-list-table tbody').on('click', '.class-checkbox', function(){
            const isChecked = $(this).is(':checked');
            
            if( bulkArrangementStatus != 'add_course' ) {
                const dataId = $(this).data('id');
                const classCode = $(this).data('class_code');

                const defaultClass = bulkDefaultSelectedClasses.find(value => value.id == dataId);
                if ( isChecked ) {
                    const selectedClass = bulkSelectedClasses.find(value => value.id == dataId)

                    if(! selectedClass && defaultClass )
                        bulkSelectedClasses.push(defaultClass);
                        
                    if( classCode ) {
                        const newClassIndex = bulkNewClasses.findIndex(value => value.course_class_code == classCode)
                        
                        bulkNewClasses[newClassIndex]['is_selected'] = true;
                    }
                } else {
                    const selectedClassIndex = bulkSelectedClasses.findIndex(value => value.id == dataId);

                    if (selectedClassIndex !== -1)
                        bulkSelectedClasses.splice(selectedClassIndex, 1);

                    if( classCode ) {
                        const newClassIndex = bulkNewClasses.findIndex(value => value.course_class_code == classCode)
                        bulkNewClasses[newClassIndex]['is_selected'] = false;
                    }
                }

                bulkGenerateTotalClassFee();

                const selectedNewClass = bulkNewClasses.filter( value => value.is_selected == true );
                const totalSelectedClasses = selectedNewClass.length + bulkSelectedClasses.length;

                $('#bulk-next-waiting-list-modal #course-number_to_complete').text(totalSelectedClasses + "/" + bulkSelectedCourse.class_number_to_complete);
            } else {
                const classCode = $(this).data('class_code');
                const key = $(this).data('key');

                const newClassIndex = bulkNewClasses.findIndex(value => value.course_class_code == classCode)
             
                if ( isChecked ) {
                    bulkNewClasses[newClassIndex]['is_selected'] = true;
                } else {
                    bulkNewClasses[newClassIndex]['is_selected'] = false;
                }

                bulkGenerateTotalClassFee();
            }
        })

        function bulkGenerateTotalClassFee() {
            let classTotalFee = 0;
            bulkSelectedClasses.forEach((classData) => {
                classTotalFee += parseFloat(classData.course.course_full_price);
            })

            bulkNewClasses.forEach((value) => {
                if( value.is_selected )
                    classTotalFee += parseFloat(value.class_fee);
            })

            // display the total class fee
            $('#bulk-next-waiting-list-modal #class-total_fee').text(classTotalFee.toFixed(2));
        }

        var oldSelectedVenue = '';
        var oldSelectedLevel = '';
        $('#bulk-next-waiting-list-modal').on('click', '#add-class-btn', function(){
            if( bulkArrangementStatus == 'add_course' ) {
                const formData = $('#bulk-next-waiting-list-modal #form-container').serializeArray();

                const requiredFields = [
                    'default_level_id', 'coach_id', 'class_size',
                    'fee_per_class', 'class_number_to_complete', 'default_venue_id'
                ];

                if( processErrorValidation(formData, requiredFields, false) ) {
                    toastTopEnd("Warning", 'Please complete the course fields first', "warning");

                    return;
                }
            }

            const currentDate = "{{ formatDate(now(), 'Y-m-d') }}";
            const currentTime = "{{ formatTime(now(), 'h:i:s') }}";
            
            let newCode = "";
            let course_size = "";
            let course_full_price = "";
            if( bulkArrangementStatus == 'add_class' ) {
                course_size = `0/${bulkSelectedCourse.course_size}`
                course_full_price = bulkSelectedCourse.course_full_price
                // get the latest code from the selected classes
                let commonPrefix = '';
                let latestCode = '';

                if( bulkNewClasses.length > 0 ) {
                    commonPrefix = getCommonPrefix(bulkNewClasses);
                    latestCode = getLatestCourseClassCode(bulkNewClasses);
                } else {
                    commonPrefix = getCommonPrefix(bulkDefaultSelectedClasses);
                    latestCode = getLatestCourseClassCode(bulkDefaultSelectedClasses);
                }

                newCode = `${commonPrefix}-${latestCode + 1}`;
            }

            if( bulkArrangementStatus == 'add_course' ) {
                // get the latest course abbrevation baseed on the selected venue and levels
                const selectedVenue = $('#bulk-next-waiting-list-modal .add-course-container select[name=default_venue_id]').val();
                const selectedLevel = $('#bulk-next-waiting-list-modal .add-course-container select[name=default_level_id]').val();

                if( selectedVenue != oldSelectedVenue || selectedLevel != oldSelectedLevel ) {
                    bulkNewClasses = [];
                    bulkDefaultNeClasses = [];

                    oldSelectedVenue = selectedVenue
                    oldSelectedLevel = selectedLevel
                }

                course_full_price = parseFloat($('#bulk-next-waiting-list-modal .add-course-container input[name=fee_per_class]').val()).toFixed(2);
                course_size = '0/' + $('#bulk-next-waiting-list-modal .add-course-container input[name=class_number_to_complete]').val();

                // Filter courses by venue and level
                const systemCourses = <?= json_encode($waitingLists['courses']) ?>;
                const filteredCourses = systemCourses.filter((value) => {
                    return value.course_level == selectedLevel && value.venue == selectedVenue;
                });

                const coursesCodes = filteredCourses.map((value) => {
                    return {
                        course_abbreviation: value.course_abbreviation
                    }
                });

                let commonPrefix = '';
                let latestCode = '';

                const courseCodePrefix = getCourseCodePrefix(coursesCodes);
                const courseCodeLatestNumber = getCourseCodeLatestNumber(coursesCodes);
                const newNumericPart = courseCodeLatestNumber + 1;
                let newCourseCode = "";

                if( courseCodePrefix ){
                    newCourseCode = `${courseCodePrefix}${String(newNumericPart).padStart(4, '0')}`;
                } else {
                    const systemVenues = <?= json_encode($waitingLists['venues']) ?>;
                    const venue = systemVenues.find(value => value.id == selectedVenue);
                    
                    const systemLevels = <?= json_encode($waitingLists['levels']) ?>;
                    const level = systemLevels.find(value => value.id == selectedLevel);

                    newCourseCode = venue.short_name + "-" + level.abbreviation + "-0001"
                }

                if( newClasses.length > 0 ) {
                    commonPrefix = getCommonPrefix(newClasses);
                    latestCode = getLatestCourseClassCode(newClasses);

                    newCode = `${commonPrefix}-${latestCode + 1}`;
                } else {
                    newCode = `${newCourseCode}-1`;
                }
            }

            bulkNewClasses.push({
                course_class_code: newCode,
                start_date: currentDate,
                start_time: currentTime,
                end_time: currentTime,
                capacity: course_size,
                class_fee: course_full_price,
                is_selected: false
            });

            bulkDefaultNeClasses = bulkNewClasses;
            
            renderNewClassRowsBulk();
            generateTotalClassFeeBulk();
        });

        // Render new classes rows
        function renderNewClassRowsBulk(){
            let rowTemplate = '';
            bulkNewClasses.forEach((element, key) => {
                rowTemplate += `<tr class="new-class-row" data-id="${key}">
                                    <td><input type="checkbox" class="class-checkbox" data-key="${key}" data-class_code="${element.course_class_code}"></td>
                                    <td>${element.course_class_code}</td>
                                    <td contenteditable="true" class="editable-table-column" data-name="start_date">${element.start_date}</td>
                                    <td contenteditable="true" class="editable-table-column" data-name="start_time">${element.start_time}</td>
                                    <td contenteditable="true" class="editable-table-column" data-name="end_time">${element.end_time}</td>
                                    <td>${element.capacity}</td>
                                    <td>${element.class_fee}</td>
                                    <td><span class="text-danger cursor-pointer remove-new-class-btn" data-id="${key}"><x-svg-icon icon='times' /></span></td>
                                </tr>`;
            });

            $('#bulk-next-waiting-list-modal #class-list-table tbody .new-class-row').remove();
            $('#bulk-next-waiting-list-modal #class-list-table tbody .no-record').remove();
            $('#bulk-next-waiting-list-modal #class-list-table tbody').append(rowTemplate);
        }

        function generateTotalClassFeeBulk() {
            let classTotalFee = 0;
            bulkSelectedClasses.forEach((classData) => {
                classTotalFee += parseFloat(classData.course.course_full_price);
            })

            bulkNewClasses.forEach((value) => {
                if( value.is_selected )
                    classTotalFee += parseFloat(value.class_fee);
            })

            // display the total class fee
            $('#bulk-next-waiting-list-modal #class-total_fee').text(classTotalFee.toFixed(2));
        }

        $('#bulk-next-waiting-list-modal').on('click', '#back-btn', function(){
            $('#bulk-next-waiting-list-modal .cancel-btn').click();
            $('#bulk-assign-modal').modal('show');
        });

        var transformedData = {};
        $('#bulk-next-waiting-list-modal').on('click', '#reserved-enrollment-btn', async function(){
            $(this).attr('disabled', 'true');

            transformedData = {}
            const formData = $('#bulk-next-waiting-list-modal #form-container').serializeArray();

            let tempTransformedData = {};

			formData.forEach(function(item) {
				tempTransformedData[item.name] = item.value;
			});

            if( bulkArrangementStatus != 'add_course' ) {
                const requiredFields = [
                    'course_type', 'course_id', 'remarks'
                ];

                if( processErrorValidation(formData, requiredFields, true) ) {
                    $(this).removeAttr('disabled');

                    return;
                }

                const selectedNewClass = bulkNewClasses.filter( value => value.is_selected == true );
                const totalSelectedClasses = selectedNewClass.length + bulkSelectedClasses.length;

                // if( selectedCourse.class_number_to_complete < totalSelectedClasses && selectedData.type_of_course != "flexible_course" ) {
                //     toastInfo("Warning", `Only ${selectedCourse.class_number_to_complete} class is allowed to be selected for the full-term course`, "warning");

                //     $(this).removeAttr('disabled');
                //     return;
                // }
                    
                // if( selectedCourse.class_number_to_complete > totalSelectedClasses && selectedData.type_of_course != "flexible_course" ) {
                //     toastInfo("Warning", `Class number selected is not enough to fulfil the Full-term course requirement. Please choose ${selectedCourse.class_number_to_complete} to proceed.`, "warning");

                //     $(this).removeAttr('disabled');
                //     return;
                // }

                if ( totalSelectedClasses <= 0) {
                    toastInfo("Warning", `Class number selected is not enough. Please choose atleast 1 to proceed.`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }
            } else {
                const requiredFields = [
                    'default_level_id', 'coach_id', 'class_size',
                    'fee_per_class', 'class_number_to_complete', 'default_venue_id', 'remarks'
                ];

                if( processErrorValidation(formData, requiredFields, true) ) {
                    $(this).removeAttr('disabled');

                    return;
                }

                const class_number_to_complete = $('#bulk-next-waiting-list-modal .add-course-container input[name=class_number_to_complete]').val();
                const selectedNewClass = bulkNewClasses.filter( value => value.is_selected == true );
                // if( class_number_to_complete < selectedNewClass.length && selectedData.type_of_course != "flexible_course" ) {
                //     toastInfo("Warning", `Only ${class_number_to_complete} class is allowed to be selected for the full-term course`, "warning");

                //     $(this).removeAttr('disabled');
                //     return;
                // }
                    
                // if( class_number_to_complete > selectedNewClass.length && selectedData.type_of_course != "flexible_course" ) {
                //     toastInfo("Warning", `Class number selected is not enough to fulfil the Full-term course requirement. Please choose ${class_number_to_complete} to proceed.`, "warning");

                //     $(this).removeAttr('disabled');
                //     return;
                // }

                if ( selectedNewClass.length <= 0) {
                    toastInfo("Warning", `Class number selected is not enough. Please choose atleast 1 to proceed.`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }
            }

			// get user token
			const userToken = getUserToken();

            const remarks = $('#bulk-next-waiting-list-modal [name=remarks]').val();

            var users = [];
            var courseEnrollmentIds = [];
            selectedDatas.forEach(function(selectedData, index) {
                users.push(selectedData.user_id);
                courseEnrollmentIds.push(selectedData.id);
            });
            transformedData['user_ids'] = users;
            transformedData['course_enrollment_ids'] = courseEnrollmentIds;
            transformedData['selected_classes'] = bulkSelectedClasses;
            transformedData['new_classes'] = bulkNewClasses;
            transformedData['remarks'] = remarks;
            transformedData['arrangement'] = bulkArrangementStatus;
            transformedData['status'] = 'reservation';

            if( bulkArrangementStatus != 'add_course' ) {
                transformedData['selected_course_id'] = bulkSelectedCourse.id
            } else {
                transformedData['course_full_price'] = tempTransformedData['fee_per_class']
                transformedData['course_sale_price'] = tempTransformedData['course_sale_price']
                transformedData['course_remarks'] = remarks
                transformedData['course_level'] = tempTransformedData['default_level_id']
                transformedData['course_size'] = tempTransformedData['class_size']
                transformedData['course_type'] = tempTransformedData['course_type']
                transformedData['venue_id'] = tempTransformedData['default_venue_id']
                transformedData['facility_id'] = tempTransformedData['facility_id']
                transformedData['course_coaches'] = [tempTransformedData['coach_id']]
                transformedData['class_number_to_complete'] = tempTransformedData['class_number_to_complete']
            }

            // API Request to process wait list
            await axios.post(`${getApiUrl()}/request/waitlist/bulk-process-response`, transformedData, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            }).then(res => {
                $('#bulk-next-waiting-list-modal .cancel-btn').click();

                if ( res.data.success ) {
                    toastTopEnd("Success", res.data.message, "success");

                    $('#waitlist-notification-modal').modal('show');
                } else {
                    toastInfo("Cant' Save", res.data.message, "warning");

                    $(this).removeAttr('disabled');
                }
            }).catch(error => {
                $(this).removeAttr('disabled');

                if( error.response.status == 400 || error.response.status == 422 || error.response.status == 422 ) {
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

        $('#bulk-next-waiting-list-modal').on('click', '#pay-now-btn', function(){
            $(this).attr('disabled', 'true');

            transformedData = {}
            const formData = $('#bulk-next-waiting-list-modal #form-container').serializeArray();

            let tempTransformedData = {};

			formData.forEach(function(item) {
				tempTransformedData[item.name] = item.value;
			});

            if( bulkArrangementStatus != 'add_course' ) {
                const requiredFields = [
                    'course_type', 'course_id', 'remarks'
                ];

                if( processErrorValidation(formData, requiredFields, true) ) {
                    $(this).removeAttr('disabled');

                    return;
                }

                const selectedNewClass = bulkNewClasses.filter( value => value.is_selected == true );
                const totalSelectedClasses = selectedNewClass.length + bulkSelectedClasses.length;

                // if( selectedCourse.class_number_to_complete < totalSelectedClasses && selectedData.type_of_course != "flexible_course" ) {
                //     toastInfo("Warning", `Only ${selectedCourse.class_number_to_complete} class is allowed to be selected for the full-term course`, "warning");

                //     $(this).removeAttr('disabled');
                //     return;
                // }
                    
                // if( selectedCourse.class_number_to_complete > totalSelectedClasses && selectedData.type_of_course != "flexible_course" ) {
                //     toastInfo("Warning", `Class number selected is not enough to fulfil the Full-term course requirement. Please choose ${selectedCourse.class_number_to_complete} to proceed.`, "warning");

                //     $(this).removeAttr('disabled');
                //     return;
                // }

                if ( totalSelectedClasses <= 0) {
                    toastInfo("Warning", `Class number selected is not enough. Please choose atleast 1 to proceed.`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }
            } else {
                const requiredFields = [
                    'default_level_id', 'coach_id', 'class_size',
                    'fee_per_class', 'class_number_to_complete', 'default_venue_id', 'remarks'
                ];

                if( processErrorValidation(formData, requiredFields, true) ) {
                    $(this).removeAttr('disabled');

                    return;
                }

                const class_number_to_complete = $('#bulk-next-waiting-list-modal .add-course-container input[name=class_number_to_complete]').val();
                const selectedNewClass = newClasses.filter( value => value.is_selected == true );
                // if( class_number_to_complete < selectedNewClass.length && selectedData.type_of_course != "flexible_course" ) {
                //     toastInfo("Warning", `Only ${class_number_to_complete} class is allowed to be selected for the full-term course`, "warning");

                //     $(this).removeAttr('disabled');
                //     return;
                // }
                    
                // if( class_number_to_complete > selectedNewClass.length && selectedData.type_of_course != "flexible_course" ) {
                //     toastInfo("Warning", `Class number selected is not enough to fulfil the Full-term course requirement. Please choose ${class_number_to_complete} to proceed.`, "warning");

                //     $(this).removeAttr('disabled');
                //     return;
                // }

                if ( selectedNewClass.length <= 0) {
                    toastInfo("Warning", `Class number selected is not enough. Please choose atleast 1 to proceed.`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }
            }

			// get user token
			const userToken = getUserToken();

            const remarks = $('#bulk-next-waiting-list-modal [name=remarks]').val();

            var users = [];
            var courseEnrollmentIds = [];
            selectedDatas.forEach(function(selectedData, index) {
                users.push(selectedData.user_id);
                courseEnrollmentIds.push(selectedData.id);
            });
            transformedData['user_ids'] = users;
            transformedData['course_enrollment_ids'] = courseEnrollmentIds;
            transformedData['selected_classes'] = bulkSelectedClasses
            transformedData['new_classes'] = bulkNewClasses
            transformedData['remarks'] = remarks
            transformedData['arrangement'] = bulkArrangementStatus
            transformedData['status'] = 'processing';

            if( bulkArrangementStatus != 'add_course' ) {
                transformedData['selected_course_id'] = bulkSelectedCourse.id
            } else {
                transformedData['course_full_price'] = tempTransformedData['fee_per_class']
                transformedData['course_sale_price'] = tempTransformedData['course_sale_price']
                transformedData['course_remarks'] = remarks
                transformedData['course_level'] = tempTransformedData['default_level_id']
                transformedData['course_size'] = tempTransformedData['class_size']
                transformedData['course_type'] = tempTransformedData['course_type']
                transformedData['venue_id'] = tempTransformedData['default_venue_id']
                transformedData['facility_id'] = tempTransformedData['facility_id']
                transformedData['course_coaches'] = [tempTransformedData['coach_id']]
                transformedData['class_number_to_complete'] = tempTransformedData['class_number_to_complete']
            }

            // $(this).removeAttr('disabled');
            // return;
            // API Request to save level

            Swal.fire({
                title: "Please complete payment.",
                text: "Temporary process of payment",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#4A5C7A",
                cancelButtonColor: "#B9B8B8",
                confirmButtonText: "Paid"
            }).then(async (result) => {
                if ( result.isConfirmed ) {
                    await axios.post(`${getApiUrl()}/request/waitlist/bulk-process-response`, transformedData, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + userToken
                        }
                    }).then(res => {
                        $('#bulk-next-waiting-list-modal .cancel-btn').click();

                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");

                            $('#waitlist-notification-modal').modal('show');
                        } else {
                            toastInfo("Cant' Save", res.data.message, "warning");

                            $(this).removeAttr('disabled');
                        }
                    }).catch(error => {
                        $(this).removeAttr('disabled');

                        if( error.response.status == 400 || error.response.status == 422 || error.response.status == 422 ) {
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
                } else {
                    $(this).removeAttr('disabled');
                }
            });
        });

        $('.waiting-list-tab #waiting-list-table tbody').on('click', '.view-button', function() {
            const dataID = $(this).data('row_id');
            
 			const data = <?= json_encode($waitingLists['all']) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            console.log(selectedData);
            // First Modal Information
            $('#waiting-list-modal #main-page_avatar').attr('src', selectedData.user.image_path);
            $('#waiting-list-modal #wait-list-student_id').text(selectedData.user.student_information.student_id);
            $('#waiting-list-modal #wait-list-student_name').text(selectedData.user.name);
            $('#waiting-list-modal #wait-list-student_chinese').text(selectedData.user.student_information.chinese_name);
            $('#waiting-list-modal #wait-list-student_hkid').text(selectedData.user.student_information.hkid);
            $('#waiting-list-modal #wait-list-student_gender').text(selectedData.user.student_information.gender);
            $('#waiting-list-modal #wait-list-student_dob').text(selectedData.user.student_information.dob);
            $('#waiting-list-modal #wait-list-student_level').text(selectedData.user.student_information.level.name);
            $('#waiting-list-modal #wait-list-student_phone').text(selectedData.user.student_information.phone);
            $('#waiting-list-modal #wait-list-student_address').text(selectedData.user.student_information.address);
            console.log(selectedData.type_of_course);
            if( selectedData.type_of_course == 'full_term' ) {
                $('.form-class_filter .form-inline').addClass('d-none');
            }
        });

        $('#next-waiting-list-modal').on('change', 'select[name=course_type]', function(){
            const value = $(this).val();

            const systemCourses = <?= json_encode($waitingLists['courses']) ?>;
            const courses = systemCourses.filter(function(course){
                return parseInt(course.course_type) == parseInt(value)
            });

            // Fill the select courses with filtered data
            let courseSelectOptions = '<option value="" hidden>Select Course</option>';
            courses.forEach(function(value){
                courseSelectOptions += `<option value="${value.id}" >${value.course_abbreviation}</option>`;
            });

            $('#next-waiting-list-modal select[name=course_id]').empty();
            $('#next-waiting-list-modal select[name=course_id]').append(courseSelectOptions);
        });

        $('#next-waiting-list-modal').on('change', 'select[name=course_id]', function(){
            const value = $(this).val();
            const systemCourses = <?= json_encode($waitingLists['courses']) ?>;
            const course = systemCourses.find(course => course.id == value);
            if ( !course )
                return;

            // get the classes related to the course selected
            const systemClasses = <?= json_encode($waitingLists['classes']) ?>;
            const classes = systemClasses.filter((data) => {
                return data.course_id == value;
            });

            defaultSelectedClasses = classes;
            selectedCourse = course;
            selectedClasses = classes;
            
            renderSelectedClasses();

            $('#next-waiting-list-modal #course-number_to_complete').text(selectedClasses.length + "/" + course.class_number_to_complete);
        });

        $('#next-waiting-list-modal').on('change', 'input[name=time]', function(){
            const inputValue = $(this).val();
            console.log("arrangementStatus", arrangementStatus)
            if( arrangementStatus == 'available' ) {
                const filteredClasses = defaultSelectedClasses.filter(function (obj) {
                    var startTime = new Date("1970-01-01T" + obj.start_time + "Z");
                    var endTime = new Date("1970-01-01T" + obj.end_time + "Z");
                    var filterDateTime = new Date("1970-01-01T" + inputValue + "Z");
                    console.log("startTime:: ", startTime)
                    console.log("endTime:: ", endTime)
                    console.log("filterDateTime:: ", filterDateTime)
                    // var startTime = obj.start_time;
                    // var endTime = obj.end_time;

                    // Perform the filtering based on the entered time
                    return filterDateTime === "" || (startTime <= filterDateTime && endTime >= filterDateTime);
                });

                selectedClasses = filteredClasses;
                
                renderSelectedClasses();
            } 

            else if( arrangementStatus == 'add_class' ){
                const filteredClasses = defaultSelectedClasses.filter(function (obj) {
                    var startTime = new Date("1970-01-01T" + obj.start_time + "Z");
                    var endTime = new Date("1970-01-01T" + obj.end_time + "Z");
                    var filterDateTime = new Date("1970-01-01T" + inputValue + "Z");

                    // Perform the filtering based on the entered time
                    return filterDateTime === "" || (startTime <= filterDateTime && endTime >= filterDateTime);
                });

                selectedClasses = filteredClasses;
                renderSelectedClasses();

                const filteredNewClasses = defaultNeClasses.filter(function (obj) {
                    var startTime = new Date("1970-01-01T" + obj.start_time + "Z");
                    var endTime = new Date("1970-01-01T" + obj.end_time + "Z");
                    var filterDateTime = new Date("1970-01-01T" + inputValue + "Z");

                    // Perform the filtering based on the entered time
                    return filterDateTime === "" || (startTime <= filterDateTime && endTime >= filterDateTime);
                });

                newClasses = filteredNewClasses;
                renderNewClassRows();
            }

            
            else if( arrangementStatus == 'add_course' ){
                console.log("defaultNeClasses", defaultNeClasses)
                const filteredNewClasses = defaultNeClasses.filter(function (obj) {
                
                    var startTime = new Date("1970-01-01T" + obj.start_time.slice(0, 5) + "Z");
                    var endTime = new Date("1970-01-01T" + obj.end_time.slice(0, 5) + "Z");
                    var filterDateTime = new Date("1970-01-01T" + inputValue.slice(0, 5) + "Z");
                    console.log("startTime", startTime)
                    console.log("endTime", endTime)
                    console.log("filterDateTime", filterDateTime)
                    // Perform the filtering based on the entered time
                    return filterDateTime === "" || (startTime <= filterDateTime && endTime >= filterDateTime);
                });

                newClasses = filteredNewClasses;
                renderNewClassRows();
            }
            
        });

        $('#next-waiting-list-modal #class-list-table tbody').on('click', '.class-checkbox', function(){
            const isChecked = $(this).is(':checked');
            
            if( arrangementStatus != 'add_course' ) {
                const dataId = $(this).data('id');
                const classCode = $(this).data('class_code');

                const defaultClass = defaultSelectedClasses.find(value => value.id == dataId);
                console.log(isChecked)
                if ( isChecked ) {
                    const selectedClass = selectedClasses.find(value => value.id == dataId)
                    
                    if(! selectedClass && defaultClass )
                        selectedClasses.push(defaultClass);
                        
                    if( classCode ) {
                        const newClassIndex = newClasses.findIndex(value => value.course_class_code == classCode)
                        
                        newClasses[newClassIndex]['is_selected'] = true;
                    }
                } else {
                    const selectedClassIndex = selectedClasses.findIndex(value => value.id == dataId);

                    if (selectedClassIndex !== -1)
                        selectedClasses.splice(selectedClassIndex, 1);

                    if( classCode ) {
                        const newClassIndex = newClasses.findIndex(value => value.course_class_code == classCode)
                        newClasses[newClassIndex]['is_selected'] = false;
                    }
                }

                generateTotalClassFee();

                const selectedNewClass = newClasses.filter( value => value.is_selected == true );
                const totalSelectedClasses = selectedNewClass.length + selectedClasses.length;

                $('#next-waiting-list-modal #course-number_to_complete').text(totalSelectedClasses + "/" + selectedCourse.class_number_to_complete);
            } else {
                const classCode = $(this).data('class_code');
                const key = $(this).data('key');

                const newClassIndex = newClasses.findIndex(value => value.course_class_code == classCode)
             
                if ( isChecked ) {
                    newClasses[newClassIndex]['is_selected'] = true;
                } else {
                    newClasses[newClassIndex]['is_selected'] = false;
                }

                generateTotalClassFee();
            }

            console.log(newClasses);
        })

        var transformedData = {};
        $('#next-waiting-list-modal').on('click', '#reserved-enrollment-btn', async function(){
            $(this).attr('disabled', 'true');

            transformedData = {}
            const formData = $('#next-waiting-list-modal #form-container').serializeArray();

            let tempTransformedData = {};

			formData.forEach(function(item) {
				tempTransformedData[item.name] = item.value;
			});

            if( arrangementStatus != 'add_course' ) {
                const requiredFields = [
                    'course_type', 'course_id', 'remarks'
                ];

                if( processErrorValidation(formData, requiredFields, true) ) {
                    $(this).removeAttr('disabled');

                    return;
                }

                const selectedNewClass = newClasses.filter( value => value.is_selected == true );
                const totalSelectedClasses = selectedNewClass.length + selectedClasses.length;

                if( selectedCourse.class_number_to_complete < totalSelectedClasses && selectedData.type_of_course != "flexible_course" ) {
                    toastInfo("Warning", `Only ${selectedCourse.class_number_to_complete} class is allowed to be selected for the full-term course`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }
                    
                if( selectedCourse.class_number_to_complete > totalSelectedClasses && selectedData.type_of_course != "flexible_course" ) {
                    toastInfo("Warning", `Class number selected is not enough to fulfil the Full-term course requirement. Please choose ${selectedCourse.class_number_to_complete} to proceed.`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }

                if ( totalSelectedClasses <= 0) {
                    toastInfo("Warning", `Class number selected is not enough. Please choose atleast 1 to proceed.`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }
            } else {
                const requiredFields = [
                    'default_level_id', 'coach_id', 'class_size',
                    'fee_per_class', 'class_number_to_complete', 'default_venue_id', 'remarks'
                ];

                if( processErrorValidation(formData, requiredFields, true) ) {
                    $(this).removeAttr('disabled');

                    return;
                }

                const class_number_to_complete = $('.add-course-container input[name=class_number_to_complete]').val();
                const selectedNewClass = newClasses.filter( value => value.is_selected == true );
                console.log(newClasses);
                console.log(selectedNewClass);
                if( class_number_to_complete < selectedNewClass.length && selectedData.type_of_course != "flexible_course" ) {
                    toastInfo("Warning", `Only ${class_number_to_complete} class is allowed to be selected for the full-term course`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }
                    
                if( class_number_to_complete > selectedNewClass.length && selectedData.type_of_course != "flexible_course" ) {
                    toastInfo("Warning", `Class number selected is not enough to fulfil the Full-term course requirement. Please choose ${class_number_to_complete} to proceed.`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }

                if ( selectedNewClass.length <= 0) {
                    toastInfo("Warning", `Class number selected is not enough. Please choose atleast 1 to proceed.`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }
            }

			// get user token
			const userToken = getUserToken();

            const remarks = $('#next-waiting-list-modal [name=remarks]').val();

            transformedData['user_id'] = selectedData.user_id
            transformedData['course_enrollment_id'] = selectedData.id
            transformedData['selected_classes'] = selectedClasses
            transformedData['new_classes'] = newClasses
            transformedData['remarks'] = remarks
            transformedData['arrangement'] = arrangementStatus
            transformedData['status'] = 'reservation';

            if( arrangementStatus != 'add_course' ) {
                transformedData['selected_course_id'] = selectedCourse.id
            } else {
                transformedData['course_full_price'] = tempTransformedData['fee_per_class']
                transformedData['course_sale_price'] = tempTransformedData['course_sale_price']
                transformedData['course_remarks'] = remarks
                transformedData['course_level'] = tempTransformedData['default_level_id']
                transformedData['course_size'] = tempTransformedData['class_size']
                transformedData['course_type'] = tempTransformedData['course_type']
                transformedData['venue_id'] = tempTransformedData['default_venue_id']
                transformedData['facility_id'] = tempTransformedData['facility_id']
                transformedData['course_coaches'] = [tempTransformedData['coach_id']]
                transformedData['class_number_to_complete'] = tempTransformedData['class_number_to_complete']
            }

            console.log(tempTransformedData);
            console.log(transformedData);
            // $(this).removeAttr('disabled');
            // return;
            // API Request to save level
            await axios.post(`${getApiUrl()}/request/waitlist/process-response`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#next-waiting-list-modal .cancel-btn').click();

                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        $('#waitlist-notification-modal').modal('show');
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");

                        $(this).removeAttr('disabled');
                    }
                })
                .catch(error => {
                    $(this).removeAttr('disabled');

                    if( error.response.status == 400 || error.response.status == 422 || error.response.status == 422 ) {
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

        $('#next-waiting-list-modal').on('click', '#pay-now-btn', function(){
            $(this).attr('disabled', 'true');

            transformedData = {}
            const formData = $('#next-waiting-list-modal #form-container').serializeArray();

            let tempTransformedData = {};

			formData.forEach(function(item) {
				tempTransformedData[item.name] = item.value;
			});

            if( arrangementStatus != 'add_course' ) {
                const requiredFields = [
                    'course_type', 'course_id', 'remarks'
                ];

                if( processErrorValidation(formData, requiredFields, true) ) {
                    $(this).removeAttr('disabled');

                    return;
                }

                const selectedNewClass = newClasses.filter( value => value.is_selected == true );
                const totalSelectedClasses = selectedNewClass.length + selectedClasses.length;

                if( selectedCourse.class_number_to_complete < totalSelectedClasses && selectedData.type_of_course != "flexible_course" ) {
                    toastInfo("Warning", `Only ${selectedCourse.class_number_to_complete} class is allowed to be selected for the full-term course`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }
                    
                if( selectedCourse.class_number_to_complete > totalSelectedClasses && selectedData.type_of_course != "flexible_course" ) {
                    toastInfo("Warning", `Class number selected is not enough to fulfil the Full-term course requirement. Please choose ${selectedCourse.class_number_to_complete} to proceed.`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }

                if ( totalSelectedClasses <= 0) {
                    toastInfo("Warning", `Class number selected is not enough. Please choose atleast 1 to proceed.`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }
            } else {
                const requiredFields = [
                    'default_level_id', 'coach_id', 'class_size',
                    'fee_per_class', 'class_number_to_complete', 'default_venue_id', 'remarks'
                ];

                if( processErrorValidation(formData, requiredFields, true) ) {
                    $(this).removeAttr('disabled');

                    return;
                }

                const class_number_to_complete = $('.add-course-container input[name=class_number_to_complete]').val();
                const selectedNewClass = newClasses.filter( value => value.is_selected == true );
                console.log(newClasses);
                console.log(selectedNewClass);
                if( class_number_to_complete < selectedNewClass.length && selectedData.type_of_course != "flexible_course" ) {
                    toastInfo("Warning", `Only ${class_number_to_complete} class is allowed to be selected for the full-term course`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }
                    
                if( class_number_to_complete > selectedNewClass.length && selectedData.type_of_course != "flexible_course" ) {
                    toastInfo("Warning", `Class number selected is not enough to fulfil the Full-term course requirement. Please choose ${class_number_to_complete} to proceed.`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }

                if ( selectedNewClass.length <= 0) {
                    toastInfo("Warning", `Class number selected is not enough. Please choose atleast 1 to proceed.`, "warning");

                    $(this).removeAttr('disabled');
                    return;
                }
            }

			// get user token
			const userToken = getUserToken();

            const remarks = $('#next-waiting-list-modal [name=remarks]').val();

            transformedData['user_id'] = selectedData.user_id
            transformedData['course_enrollment_id'] = selectedData.id
            transformedData['selected_classes'] = selectedClasses
            transformedData['new_classes'] = newClasses
            transformedData['remarks'] = remarks
            transformedData['arrangement'] = arrangementStatus
            transformedData['status'] = 'processing';

            if( arrangementStatus != 'add_course' ) {
                transformedData['selected_course_id'] = selectedCourse.id
            } else {
                transformedData['course_full_price'] = tempTransformedData['fee_per_class']
                transformedData['course_sale_price'] = tempTransformedData['course_sale_price']
                transformedData['course_remarks'] = remarks
                transformedData['course_level'] = tempTransformedData['default_level_id']
                transformedData['course_size'] = tempTransformedData['class_size']
                transformedData['course_type'] = tempTransformedData['course_type']
                transformedData['venue_id'] = tempTransformedData['default_venue_id']
                transformedData['facility_id'] = tempTransformedData['facility_id']
                transformedData['course_coaches'] = [tempTransformedData['coach_id']]
                transformedData['class_number_to_complete'] = tempTransformedData['class_number_to_complete']
            }

            console.log(tempTransformedData);
            console.log(transformedData);
            // $(this).removeAttr('disabled');
            // return;
            // API Request to save level

            Swal.fire({
                title: "Please complete payment.",
                text: "Temporary process of payment",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#4A5C7A",
                cancelButtonColor: "#B9B8B8",
                confirmButtonText: "Paid"
            }).then(async (result) => {
                if ( result.isConfirmed ) {
                    await axios.post(`${getApiUrl()}/request/waitlist/process-response`, transformedData, {
                            headers: {
                                'Content-Type': 'application/json',
                                'Authorization': 'Bearer ' + userToken
                            }
                        }).then(res => {
                            $('#next-waiting-list-modal .cancel-btn').click();

                            if ( res.data.success ) {
                                toastTopEnd("Success", res.data.message, "success");

                                $('#waitlist-notification-modal').modal('show');
                            } else {
                                toastInfo("Cant' Save", res.data.message, "warning");

                                $(this).removeAttr('disabled');
                            }
                        })
                        .catch(error => {
                            $(this).removeAttr('disabled');

                            if( error.response.status == 400 || error.response.status == 422 || error.response.status == 422 ) {
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
                } else {
                    $(this).removeAttr('disabled');
                }
            });
        });

        function renderSelectedClasses()
        {
            if( defaultSelectedClasses.length <= 0 && !selectedCourse ) {
                $('#next-waiting-list-modal #class-list-table tbody').empty();
                $('#next-waiting-list-modal #class-list-table tbody').append(`<tr class="no-record">
                                <td colspan="8" class="text-center">No Record Found</td>
                            </tr>`);
                
                // display the total class fee
                $('#next-waiting-list-modal #class-total_fee').text('0.00');

                $('#add-class-btn').addClass('d-none');

                return;
            }

            if( arrangementStatus == 'available' ) {
                $('#next-waiting-list-modal #form-container #add-class-btn').addClass('d-none');
            }

            if( arrangementStatus == 'add_class' || arrangementStatus == 'add_course' ) {
                $('#next-waiting-list-modal #form-container #add-class-btn').removeClass('d-none');
            }

            let classRows = '';
            let classTotalFee = 0;
            if( defaultSelectedClasses.length <= selectedCourse.class_number_to_complete ) {
                // display all filtered defaultSelectedClasses to the table without checkbox
                defaultSelectedClasses.forEach((classData) => {
                    const startTimeObj = new Date(`2000-01-01 ${classData.start_time}`);
                    const endTimeObj = new Date(`2000-01-01 ${classData.end_time}`);

                    classRows += `<tr>
                                    <td></td>
                                    <td>${classData.course_class_code}</td>
                                    <td>${classData.start_date}</td>
                                    <td>${moment(startTimeObj).format("h:mm A")}</td>
                                    <td>${moment(endTimeObj).format("h:mm A")}</td>
                                    <td>${classData.formatted_class_seat_ratio}</td>
                                    <td>${classData.course.course_full_price}</td>
                                    <td></td>
                                </tr>`;
                    classTotalFee += parseFloat(classData.course.course_full_price);
                })

                selectedClasses = defaultSelectedClasses

                // $('#add-class-btn').removeClass('d-none');
            }

            if( defaultSelectedClasses.length > selectedCourse.class_number_to_complete || selectedData.type_of_course == "flexible_course" ) {
                classRows = '';
                classTotalFee = 0;

                // display all filtered defaultSelectedClasses to the table without checkbox
                defaultSelectedClasses.forEach((classData) => {
                    const startTimeObj = new Date(`2000-01-01 ${classData.start_time}`);
                    const endTimeObj = new Date(`2000-01-01 ${classData.end_time}`);

                    classRows += `<tr>
                                    <td><input type="checkbox" class="class-checkbox" data-id="${classData.id}"></td>
                                    <td>${classData.course_class_code}</td>
                                    <td>${classData.start_date}</td>
                                    <td>${moment(startTimeObj).format("h:mm A")}</td>
                                    <td>${moment(endTimeObj).format("h:mm A")}</td>
                                    <td>${classData.formatted_class_seat_ratio}</td>
                                    <td>${classData.course.course_full_price}</td>
                                    <td></td>
                                </tr>`;
                })

                selectedClasses = [];

                // $('#add-class-btn').removeClass('d-none');
            }

            if( defaultSelectedClasses.length <= 0 ){
                classRows = `<tr class="no-record">
                                <td colspan="8" class="text-center">No Record Found</td>
                            </tr>`;
                // $('#add-class-btn').addClass('d-none');
            }

            $('#next-waiting-list-modal #class-list-table tbody').empty();
            $('#next-waiting-list-modal #class-list-table tbody').append(classRows);
            
            // display the total class fee
            $('#next-waiting-list-modal #class-total_fee').text(classTotalFee.toFixed(2));
        }

        function generateTotalClassFee() {
            let classTotalFee = 0;
            console.log("selectedClasses:: ", selectedClasses);
            selectedClasses.forEach((classData) => {
                classTotalFee += parseFloat(classData.course.course_full_price);
            })

            newClasses.forEach((value) => {
                if( value.is_selected )
                    classTotalFee += parseFloat(value.class_fee);
            })

            // display the total class fee
            $('#next-waiting-list-modal #class-total_fee').text(classTotalFee.toFixed(2));
        }

        // Error Validations
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
                const hasParentFields = ['start_date'];

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

        // fetch the selected arrangement
        $('#waiting-list-modal #form-container').on('click', 'input[name=status]', function(){
            arrangementStatus = $(this).val();
        });

        $('#waiting-list-modal').on('click', '#next-btn', function(){
            newClasses = [];
            defaultNeClasses = [];
            defaultSelectedClasses = [];
            selectedClasses = [];
            selectedCourse = null;
            console.log(selectedData);

            $('#next-waiting-list-modal select[name=course_type]').val('').trigger('change');
            $('#next-waiting-list-modal select[name=course_id]').val('').trigger('change');
            $('#course-number_to_complete').text('-');
            
            renderSelectedClasses();

            $('#waiting-list-modal #cancel-btn').click();
            $('#next-waiting-list-modal').modal('show');

            // Reset
            $('.available-add-class-container select[name=course_type]').removeAttr('disabled');
            $('.available-add-class-container select[name=course_id]').removeAttr('disabled');
            $('.available-add-class-container dl').removeClass('d-none')

            // Reset add course fields
            $('.add-course-container select[name=default_level_id]').val("");
            $('.add-course-container select[name=coach_id]').val("");
            $('.add-course-container input[name=class_size]').val("");
            $('.add-course-container input[name=fee_per_class]').val("");
            $('.add-course-container input[name=course_sale_price]').val("");
            $('.add-course-container input[name=class_number_to_complete]').val("");
            $('.add-course-container select[name=default_venue_id]').val("");
            $('.add-course-container select[name=facility_id]').val("");
            $('.add-course-container input[name=course_type]').prop("checked", false);

            // change the title of waiting list information
            if( arrangementStatus == 'available' ) {
                $('#next-waiting-list-modal .modal-title').text('Available course & class');

                // Hide add class button
                // $('#next-waiting-list-modal #form-container #add-class-btn').addClass('d-none');

                // hide some fields
                $('#next-waiting-list-modal .available-add-class-container').removeClass('d-none');
                $('#next-waiting-list-modal .add-course-container').addClass('d-none');
            }

            if( arrangementStatus == 'add_class' ) {
                $('#next-waiting-list-modal .modal-title').text('Add Class on current Course');

                // hide some fields
                $('#next-waiting-list-modal .available-add-class-container').removeClass('d-none');
                $('#next-waiting-list-modal .add-course-container').addClass('d-none');

                // Assign the course type and course on the two field
                $('.available-add-class-container select[name=course_type]').val(selectedData.package.course.course_type.id).trigger('change');
                $('.available-add-class-container select[name=course_id]').val(selectedData.package.course.id).trigger('change');

                // Disable the two column
                $('.available-add-class-container select[name=course_type]').attr('disabled', true);
                $('.available-add-class-container select[name=course_id]').attr('disabled', true);

                // hide the number of class to complete display when the course term is flexible
                if( selectedData.type_of_course != 'full_term' ) {
                    $('.available-add-class-container dl').addClass('d-none')
                }
            }
                
            if( arrangementStatus == 'add_course' ) {
                $('#next-waiting-list-modal .modal-title').text('Add Course');

                // Show add class button
                $('#next-waiting-list-modal #form-container #add-class-btn').removeClass('d-none');

                // hide some fields
                $('#next-waiting-list-modal .available-add-class-container').addClass('d-none');
                $('#next-waiting-list-modal .add-course-container').removeClass('d-none');

                // Populate field with current enrolled course
                $('.add-course-container select[name=default_level_id]').val(selectedData.package.course.course_level);
                if( selectedData.package.course.coaches.length > 0 )
                    $('.add-course-container select[name=coach_id]').val(selectedData.package.course.coaches[0].id);

                $('.add-course-container input[name=class_size]').val(selectedData.package.course.course_size);
                $('.add-course-container input[name=fee_per_class]').val(selectedData.package.course.course_full_price);
                $('.add-course-container input[name=course_sale_price]').val(selectedData.package.course.course_sale_price ?? '');
                $('.add-course-container input[name=class_number_to_complete]').val(selectedData.package.course.class_number_to_complete);
                $('.add-course-container select[name=default_venue_id]').val(selectedData.package.course.venue).trigger('change');
                $('.add-course-container select[name=facility_id]').val(selectedData.package.course.facility.id);
                $('.add-course-container input[name=course_type]').each(function(courseType){
                    if( $(this).val() == selectedData.package.course.course_type.id ) {
                        $(this).prop('checked', true);
                    }
                })
            }

            $('#next-waiting-list-modal [name=remarks]').val("");
            clearFormFieldErrors('#next-waiting-list-modal #form-container');
        });

        $('#next-waiting-list-modal').on('click', '#back-btn', function(){
            $('#next-waiting-list-modal .cancel-btn').click();
            $('#waiting-list-modal').modal('show');
        });

        // add class to the table
        var oldSelectedVenue = '';
        var oldSelectedLevel = '';
        $('#next-waiting-list-modal').on('click', '#add-class-btn', function(){
            if( arrangementStatus == 'add_course' ) {
                const formData = $('#next-waiting-list-modal #form-container').serializeArray();

                const requiredFields = [
                    'default_level_id', 'coach_id', 'class_size',
                    'fee_per_class', 'class_number_to_complete', 'default_venue_id'
                ];

                if( processErrorValidation(formData, requiredFields, false) ) {
                    toastTopEnd("Warning", 'Please complete the course fields first', "warning");

                    return;
                }
            }
            
            const currentDate = "{{ formatDate(now(), 'Y-m-d') }}";
            const currentTime = "{{ formatTime(now(), 'h:i:s') }}";
            
            let newCode = "";
            let course_size = "";
            let course_full_price = "";
            if( arrangementStatus == 'add_class' ) {
                course_size = `0/${selectedCourse.course_size}`
                course_full_price = selectedCourse.course_full_price
                // get the latest code from the selected classes
                let commonPrefix = '';
                let latestCode = '';

                if( newClasses.length > 0 ) {
                    commonPrefix = getCommonPrefix(newClasses);
                    latestCode = getLatestCourseClassCode(newClasses);
                } else {
                    commonPrefix = getCommonPrefix(defaultSelectedClasses);
                    latestCode = getLatestCourseClassCode(defaultSelectedClasses);
                }
                
                newCode = `${commonPrefix}-${latestCode + 1}`;
            }

            if( arrangementStatus == 'add_course' ) {
                // get the latest course abbrevation baseed on the selected venue and levels
                const selectedVenue = $('.add-course-container select[name=default_venue_id]').val();
                const selectedLevel = $('.add-course-container select[name=default_level_id]').val();

                if( selectedVenue != oldSelectedVenue || selectedLevel != oldSelectedLevel ) {
                    newClasses = [];
                    defaultNeClasses = [];

                    oldSelectedVenue = selectedVenue
                    oldSelectedLevel = selectedLevel
                }

                course_full_price = parseFloat($('.add-course-container input[name=fee_per_class]').val()).toFixed(2);
                course_size = '0/' + $('.add-course-container input[name=class_number_to_complete]').val();

                // Filter courses by venue and level
                const systemCourses = <?= json_encode($waitingLists['courses']) ?>;
                const filteredCourses = systemCourses.filter((value) => {
                    return value.course_level == selectedLevel && value.venue == selectedVenue;
                });

                const coursesCodes = filteredCourses.map((value) => {
                    return {
                        course_abbreviation: value.course_abbreviation
                    }
                });
                
                let commonPrefix = '';
                let latestCode = '';

                const courseCodePrefix = getCourseCodePrefix(coursesCodes);
                const courseCodeLatestNumber = getCourseCodeLatestNumber(coursesCodes);
                const newNumericPart = courseCodeLatestNumber + 1;
                let newCourseCode = "";

                if( courseCodePrefix ){
                    newCourseCode = `${courseCodePrefix}${String(newNumericPart).padStart(4, '0')}`;
                } else {
                    const systemVenues = <?= json_encode($waitingLists['venues']) ?>;
                    const venue = systemVenues.find(value => value.id == selectedVenue);
                    
                    const systemLevels = <?= json_encode($waitingLists['levels']) ?>;
                    const level = systemLevels.find(value => value.id == selectedLevel);

                    newCourseCode = venue.short_name + "-" + level.abbreviation + "-0001"
                }
                
                if( newClasses.length > 0 ) {
                    commonPrefix = getCommonPrefix(newClasses);
                    latestCode = getLatestCourseClassCode(newClasses);

                    newCode = `${commonPrefix}-${latestCode + 1}`;
                } else {
                    newCode = `${newCourseCode}-1`;
                }
            }

            newClasses.push({
                course_class_code: newCode,
                start_date: currentDate,
                start_time: currentTime,
                end_time: currentTime,
                capacity: course_size,
                class_fee: course_full_price,
                is_selected: false
            });

            defaultNeClasses = newClasses;
            
            renderNewClassRows();
            generateTotalClassFee();
        })

        // Enable inline editing
        $('#next-waiting-list-modal #class-list-table').on('blur', 'td[contenteditable="true"]', function() {
            var cellData = $(this).text();
            var parentID = $(this).closest('tr').data('id');
            var rowName = $(this).data('name');

            newClasses[parentID][rowName] = cellData;
            defaultNeClasses[parentID][rowName] = cellData;
        });

        // remove newadded class
        $('#next-waiting-list-modal #class-list-table').on('click', '.remove-new-class-btn', function(){
            const arrayID = $(this).data('id');

            newClasses.splice(arrayID, 1);
            defaultNeClasses.splice(arrayID, 1);
            
            renderNewClassRows();
        });

        // Add Course Form Actions
        $('.add-course-container').on('change', 'select[name=default_venue_id]', function(){
            const valueData = $(this).val();

            // filter the facilities
            const systemVenues = <?= json_encode($waitingLists['venues']) ?>;

            const venue = systemVenues.find(value => value.id == valueData);

            let facilityOptions = '<option value="" hidden>Select Facility</option>';
            venue.school_venue_facilities.forEach(element => {
                facilityOptions += `<option value="${element.id}">${element.name}</option>`;
            });

            $('.add-course-container select[name=facility_id]').empty();
            $('.add-course-container select[name=facility_id]').append(facilityOptions);
        });

        // Render new classes rows
        function renderNewClassRows(){
            let rowTemplate = '';
            newClasses.forEach((element, key) => {
                rowTemplate += `<tr class="new-class-row" data-id="${key}">
                                    <td><input type="checkbox" class="class-checkbox" data-key="${key}" data-class_code="${element.course_class_code}"></td>
                                    <td>${element.course_class_code}</td>
                                    <td contenteditable="true" class="editable-table-column" data-name="start_date">${element.start_date}</td>
                                    <td contenteditable="true" class="editable-table-column" data-name="start_time">${element.start_time}</td>
                                    <td contenteditable="true" class="editable-table-column" data-name="end_time">${element.end_time}</td>
                                    <td>${element.capacity}</td>
                                    <td>${element.class_fee}</td>
                                    <td><span class="text-danger cursor-pointer remove-new-class-btn" data-id="${key}"><x-svg-icon icon='times' /></span></td>
                                </tr>`;
            });

            $('#next-waiting-list-modal #class-list-table tbody .new-class-row').remove();
            $('#next-waiting-list-modal #class-list-table tbody .no-record').remove();
            $('#next-waiting-list-modal #class-list-table tbody').append(rowTemplate);
        }

        // Function to get the course class code prefix
        function getCommonPrefix(courseClassCodes) {
            const prefixes = courseClassCodes.map(item => item.course_class_code.split('-').slice(0, -1).join('-'));
            const commonPrefix = Array.from(new Set(prefixes))[0];

            return commonPrefix;
        }

        function getLatestCourseClassCode(courseClassCodes) {
            const latestCode = courseClassCodes.reduce((latest, current) => {
                const currentNumber = parseInt(current.course_class_code.split('-').pop(), 10);

                return currentNumber > latest ? currentNumber : latest;
            }, 0);

            return latestCode;
        }
        
        // Function to get the course code prefix and latestNumber
        function getCourseCodePrefix(courseClassCodes) {
            const prefixes = courseClassCodes.map(item => item.course_abbreviation.slice(0, -4));
            const commonPrefix = Array.from(new Set(prefixes))[0];

            return commonPrefix;
        }

        function getCourseCodeLatestNumber(courseClassCodes) {
            const latestNumericPart = courseClassCodes.reduce((latest, current) => {
                const currentNumber = parseInt(current.course_abbreviation.slice(-4), 10);
                return currentNumber > latest ? currentNumber : latest;
            }, 0);

            return latestNumericPart;
        }
        
        // Function for validation
        function processErrorValidation(formData, requiredFields, errorMessage = true) {
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
                
			if ( errors.length > 0 ) {
				if( errorMessage )
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

        // NOTIFICATION
        $('#waitlist-notification-modal').on('click', '.edit_form_btn', function(){
            // show the form
            $('#waitlist-notification-modal #modal-form').removeClass('d-none');
            $('#waitlist-notification-modal #preview-form').addClass('d-none');
            
            // show the preview button
            $('#waitlist-notification-modal .edit_form_btn').addClass('d-none');
            $('#waitlist-notification-modal .preview_form_btn').removeClass('d-none');
        });

        $('#waitlist-notification-modal').on('click', '.preview_form_btn', function(){
            // show the form
            $('#waitlist-notification-modal #modal-form').addClass('d-none');
            $('#waitlist-notification-modal #preview-form').removeClass('d-none');
            
            // show the preview button
            $('#waitlist-notification-modal .edit_form_btn').removeClass('d-none');
            $('#waitlist-notification-modal .preview_form_btn').addClass('d-none');

            // Update the preview form
            const formData = $('#waitlist-notification-modal #modal-form').serializeArray();

            formData.forEach(function(data){
                if(data.name == 'title')
                    $('#waitlist-notification-modal .preview-title').text(data.value)

                if(data.name == 'content') {
                    var content = tinymce.get('waitlist-notification-content').getContent();
                    $('#waitlist-notification-modal .preview-content').empty();
                    $('#waitlist-notification-modal .preview-content').append(content)
                }
                    

                if(data.name == "category")
                    $('#waitlist-notification-modal .preview-category').text(data.value)
            })

            // For Scheduled Date
            const isSendEmediate = $('#waitlist-notification-modal input[name=send_immediate]').is(':checked');
            const scheduledDate = $('#waitlist-notification-modal input[name=datetime_to_send]').val();
            if( isSendEmediate )
                $('#waitlist-notification-modal .preview-send_content').text("Immediately");
            else
                $('#waitlist-notification-modal .preview-send_content').text(scheduledDate);

            // For what is selected
            const isSendViaEmail = $('#waitlist-notification-modal input[name=send_via_email]').is(':checked');
            const isSendViaApp = $('#waitlist-notification-modal input[name=send_via_app]').is(':checked');

            $('#waitlist-notification-modal .preview-send_via').text(`Send via: ${isSendViaEmail ? 'Email' : ''} ${isSendViaEmail && isSendViaApp ? ',' : ''} ${isSendViaApp ? 'App' : ''}`)
        });

        // Get the current date and time
        const now = new Date();
        const formattedDate = now.toISOString().slice(0, 16); // Format: "YYYY-MM-DDTHH:mm"
        $('#waitlist-notification-modal input[name=datetime_to_send]').val(formattedDate);

        $('#waitlist-notification-modal input[name=send_via_email]').on('change', function(){
            $('input[name=send_via_app]').prop('checked', false);
        });

        $('#waitlist-notification-modal input[name=send_via_app]').on('change', function(){
            $('input[name=send_via_email]').prop('checked', false);
        });
        
        $('#waitlist-notification-modal').on('click', '#process-notification', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

            var content = tinymce.get('waitlist-notification-content').getContent();
            $('#waitlist-notification-content').val(content);
            
			// Prepare Data
			const formData = $('#waitlist-notification-modal #modal-form').serializeArray();

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

            let sendVia = "email";
            if ( $('#waitlist-notification-modal input[name=send_via_email]').is(':checked') )
                sendVia = "email";

            if( $('#waitlist-notification-modal input[name=send_via_app]').is(':checked') )
                sendVia = "app";

            let sendImmediate = 0;
            if( $('#waitlist-notification-modal input[name=send_immediate]').is(':checked') )
                sendImmediate = 1;

            transformedData['course_enrollment_id'] = selectedData.id;
            transformedData['send_via'] = sendVia;
            transformedData['send_immediate'] = sendImmediate;

            // API Request to save level
            await axios.post(`${getApiUrl()}/request/waitlist/notification`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        $('#waitlist-notification-modal .cancel_btn').click();

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

        $('#waitlist-notification-modal').on('click', '.cancel_btn', function(){
            window.location = window.location
        });
    });
</script>