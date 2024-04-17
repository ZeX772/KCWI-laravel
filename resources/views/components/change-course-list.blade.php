<div class="row pl-3">
    <!-- Table List -->
    <div class="col-9 page-content-col">
        <div class="tab-content p-3 pt-4">
            <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
            <div class="table-responsive table-custom with-custom-search mt-4">
                <table class="table table-hover w-100" id="change-course-table">
                    <thead>
                        <tr>
                            <th class="text-left"><input type="checkbox"></th>
                            <th class="text-left">#</th>
                            <th class="text-left">ENTRIES DATE & TIME</th>
                            <th class="text-left">REASON FOR LEAVING</th>
                            <th class="text-left">STUDENT NAME</th>
                            <th class="text-left">PHONE</th>
                            <th class="text-left">STATUS</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($changeCourses['change_courses'] as $changeCourse)
                            <tr data-id="{{ $changeCourse['id'] }}">
                                <td><input type="checkbox"></td>
                                <td>{{ $changeCourse['id'] }}</td>
                                <td><p>{{ formatDate($changeCourse['created_at']) }} <br><small>{{ formatTime($changeCourse['created_at']) }}</small></p></td>
                                <td>{{ $changeCourse['reason'] }}</td>
                                <td>{{ optional($changeCourse['user'])['name'] ?? '-' }}</td>
                                <td>{{ optional($changeCourse['user']['student_information'])['phone'] }}</td>
                                <td class="status-color_{{ $changeCourse['status'] }}">{{ $changeCourse['status_label'] }}</td>
                                <td>
                                    <div>
                                        <button type="button" class="view-button" id="view-btn" data-row_id="{{ $changeCourse['id'] }}" data-bs-toggle="modal" data-bs-target="#change-course-modal">
                                            <x-svg-icon icon="view" width="20" height="20" />
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
                        <h1 class="fw-semibold card-heading text-center">Requests</h1>
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
                                        <h1 class="card-detail_title">Status</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-status" class="card-detail_sub_title text-success">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">#</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-id" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Date & Time</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-created_at" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Reason for Leaving</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-reason" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Name</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-name" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Phone</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-phone" class="card-detail_sub_title">-</h1>
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
                        <h1 id="detail-updated_at" class="card-detail_sub_title">* Please contact parent / students first before cancel the course.</h1>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="change-course-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Change Course Request</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div class="change-course-details">
                    <div class="accordion" id="class-detail_container">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Course Details
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body pl-0 pr-0">
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Enrollment Type</dd>
                                        <dd class="col-sm-9" id="change-course-enrollment_type">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Course Code</dd>
                                        <dd class="col-sm-9" id="change-course-class_code">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Level</dd>
                                        <dd class="col-sm-9" id="change-course-level">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Venue</dd>
                                        <dd class="col-sm-9" id="change-course-venue">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Facility</dd>
                                        <dd class="col-sm-9" id="change-course-facility">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Date</dd>
                                        <dd class="col-sm-9" id="change-course-date">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Time</dd>
                                        <dd class="col-sm-9" id="change-course-time">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Coach</dd>
                                        <dd class="col-sm-9" id="change-course-coach">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Course Category</dd>
                                        <dd class="col-sm-9" id="change-course-category">-</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="accordion-without-dropdown_container">
                        <div>
                            <h2>Student Details</h2>
                            <div class="detail_body">
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Student Name</dd>
                                    <dd class="col-sm-9" id="student-detail_name">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Student ID</dd>
                                    <dd class="col-sm-9" id="student-detail_student_id">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Phone</dd>
                                    <dd class="col-sm-9" id="student-detail_phone">-</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div id="accordion-without-dropdown_container">
                        <div>
                            <h2>Details</h2>
                            <div class="detail_body">
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">#</dd>
                                    <dd class="col-sm-9" id="change-course-detail_id">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Status</dd>
                                    <dd class="col-sm-9" id="change-course-detail_status">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Entries Date & Time</dd>
                                    <dd class="col-sm-9" id="change-course-detail_created_at">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Reason for Leaving</dd>
                                    <dd class="col-sm-9" id="change-course-detail_reason">-</dd>
                                </dl>
                                <!-- <dl class="row mb-2">
                                    <dd class="col-sm-3">Attachment</dd>
                                    <dd class="col-sm-9" id="change-course-detail_attachment"></dd>
                                </dl> -->
                            </div>
                        </div>
                    </div>
                    <form id="form-container">
                        <div class="container form-input-container mb-3">
                            <label class="form-label" style="color: #636363;font-size: 14px;">Following Action <span class="text-danger">*</span></label>
                            <div class="row radio-group">
                                <div class='col-4'>
                                    <label for="approved">
                                        <span>Approved</span>
                                        <input type="radio" name="status" value="approved" id="approved" checked>
                                    </label>
                                </div>
                                <div class='col-4'>
                                    <label for="reject">
                                        <span>Reject</span>
                                        <input type="radio" name="status" value="rejected" id="reject">
                                    </label>
                                </div>
                            </div>
                            <p>* Please contact parent / students first before cancel the course.</p>
                        </div>
                    </form>
                </div>
                <div class="change-course-form d-none">
                    <form id="modal-form">
                        <div class="container" style="padding: 0px;color: #636363;">
                            <div class="form-inline">
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Please Select</label>
                                    <div class="grid-reapeat-col-3 gap-3">
                                        <div class="col">
                                            <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                                <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Available Class</label>
                                                <input type="radio" name="arrangement" value="available_class">
                                            </div>
                                        </div>
                                        <!-- <div class="col">
                                            <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                                <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Start a New Class</label>
                                                <input type="radio" name="arrangement" value="start_new_class">
                                            </div>
                                        </div> -->
                                        <div class="col">
                                            <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                                <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Start a New Course</label>
                                                <input type="radio" name="arrangement" value="start_new_course" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="available-classes-container d-none">
                            <p class="mt-3"><u>Available Class</u></p>
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <x-form-select
                                    label="Please Select the Level" 
                                    name="level_id"
                                    id="level_id"
                                    isRequired="true"
                                >
                                    <option value="" hidden>Select Level</option>
                                    @foreach($changeCourses['levels'] as $level)
                                        <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                                    @endforeach
                                </x-form-select>
                                <x-form-select
                                    label="Please Choose the Venue" 
                                    name="venue_id"
                                    id="venue_id"
                                    isRequired="true"
                                >
                                    <option value="" hidden>Select Venue</option>
                                    @foreach($changeCourses['venues'] as $venue)
                                        <option value="{{ $venue['id'] }}">{{ $venue['name'] }}</option>
                                    @endforeach
                                </x-form-select>
                                <x-form-input 
                                    label="Please Choose the Date" 
                                    type="date" 
                                    name="class_date"
                                    id="class_date"
                                    isRequired=false
                                />
                            </div>
                            <div class="container available-time-slot_container" style="padding: 0px;color: #636363;">
                                <div class="form-inline">
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label class="form-label" style="color: #636363;font-size: 14px;">Available time-slot</label>
                                        <div class="grid-repeat-container d-none">
                                            <div class="grid-reapeat-col-3 gap-3">
                                                @foreach($changeCourses['classes'] as $class)
                                                    <div class="col">
                                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                                            <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{ $class['start_time'] . ' - ' . $class['end_time'] }}</label>
                                                            <input type="radio" name="class_id" value="{{ $class['id'] }}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="empty-available-slot">
                                            <p>There's no found available time.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="start-new-class-container d-none">
                            <p class="mt-3"><u>Start a New Class</u></p>
                            <div class="col" style="width: 100%;">
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-select
                                        label="Course Level" 
                                        name="default_level_id"
                                        id="default_level_id"
                                        isRequired="false"
                                        dataAttribute="disabled"
                                        customClass="disabled"
                                    >
                                        <option value="" hidden>Select Course Level</option>
                                        @foreach($changeCourses['levels'] as $level)
                                            <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                    <x-form-select
                                        label="Coach" 
                                        name="coach_id"
                                        id="coach_id"
                                        isRequired="false"
                                        dataAttribute="disabled"
                                        customClass="disabled"
                                    >
                                        <option value="" hidden>Select Coach</option>
                                    </x-form-select>
                                </div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-input 
                                        label="Class Size (Maximum Number of Students)" 
                                        type="number" 
                                        name="class_size"
                                        id="class_size"
                                        isRequired=false
                                        disabled=true
                                        customClass="disabled"
                                    />    
                                    <x-form-input 
                                        label="Fee (HK$) Per Class" 
                                        type="number" 
                                        name="fee_per_class"
                                        id="fee_per_class"
                                        isRequired=false
                                        disabled=true
                                        customClass="disabled"
                                    />
                                </div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-select
                                        label="Venue" 
                                        name="default_venue_id"
                                        id="default_venue_id"
                                        isRequired="false"
                                        dataAttribute="disabled"
                                        customClass="disabled"
                                    >
                                        <option value="" hidden>Select Venue</option>
                                        @foreach($changeCourses['venues'] as $venue)
                                            <option value="{{ $venue['id'] }}">{{ $venue['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                    <x-form-select
                                        label="Facility" 
                                        name="facility_id"
                                        id="facility_id"
                                        isRequired="false"
                                        dataAttribute="disabled"
                                        customClass="disabled"
                                    >
                                        <option value="" hidden>Select Facility</option>
                                        @foreach($changeCourses['facilities'] as $facility)
                                            <option value="{{ $facility['id'] }}">{{ $facility['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-input 
                                        label="Date" 
                                        type="date" 
                                        name="start_date"
                                        id="start_date"
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
                                <div class="container" style="padding: 0px;color: #636363;">
                                    <div class="form-inline">
                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <label class="form-label" style="color: #636363;font-size: 14px;">Course Category</label>
                                            <div class="grid-reapeat-col-3 gap-3">
                                                @foreach($changeCourses['course_types'] as $course_type)
                                                    <div class="col disabled">
                                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                                            <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{ $course_type['name'] }}</label>
                                                            <input type="radio" name="course_type" class="course-type-{{ $course_type['id'] }} disabled" value="{{ $course_type['id'] }}" disabled>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="start-new-course-container">
                            <p class="mt-3"><u>Start a New Course</u></p>
                            <div class="col" style="width: 100%;">
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-select
                                        label="Course Level" 
                                        name="new_course_level_id"
                                        id="new_course_level_id"
                                        isRequired="true"
                                    >
                                        <option value="" hidden>Select Course Level</option>
                                        @foreach($changeCourses['levels'] as $level)
                                            <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                    <x-form-select
                                        label="Coach" 
                                        name="new_course_coach_id"
                                        id="new_course_coach_id"
                                        isRequired="true"
                                    >
                                        <option value="" hidden>Select Coach</option>
                                        @foreach($changeCourses['coaches'] as $coach)
                                            <option value="{{ $coach['id'] }}">{{ $coach['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-input 
                                        label="Class Size (Maximum Number of Students)" 
                                        type="number" 
                                        name="new_course_class_size"
                                        id="new_course_class_size"
                                        isRequired=true
                                    />    
                                    <x-form-input 
                                        label="Fee (HK$) Per Class" 
                                        type="number" 
                                        name="new_course_fee_per_class"
                                        id="new_course_fee_per_class"
                                        isRequired=true
                                    />
                                </div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-select
                                        label="Venue" 
                                        name="new_course_default_venue_id"
                                        id="new_course_default_venue_id"
                                        isRequired="true"
                                    >
                                        <option value="" hidden>Select Venue</option>
                                        @foreach($changeCourses['venues'] as $venue)
                                            <option value="{{ $venue['id'] }}">{{ $venue['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                    <x-form-select
                                        label="Facility" 
                                        name="new_course_facility_id"
                                        id="new_course_facility_id"
                                        isRequired="true"
                                    >
                                        <option value="" hidden>Select Facility</option>
                                        @foreach($changeCourses['facilities'] as $facility)
                                            <option value="{{ $facility['id'] }}">{{ $facility['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-input 
                                        label="Date" 
                                        type="date" 
                                        name="new_course_start_date"
                                        id="new_course_start_date"
                                        isRequired=true
                                    />    
                                    <x-form-input 
                                        label="Start Time" 
                                        type="time" 
                                        name="new_course_start_time"
                                        id="new_course_start_time"
                                        isRequired=true
                                    />
                                    <x-form-input 
                                        label="End Time" 
                                        type="time" 
                                        name="new_course_end_time"
                                        id="new_course_end_time"
                                        isRequired=true
                                    />
                                </div>
                                <div class="container" style="padding: 0px;color: #636363;">
                                    <div class="form-inline">
                                        <div class="form-group" style="margin-bottom: 20px;">
                                            <label class="form-label" style="color: #636363;font-size: 14px;">Course Category <span class="text-danger">*</span></label>
                                            <div class="grid-reapeat-col-3 gap-3">
                                                @foreach($changeCourses['course_types'] as $course_type)
                                                    <div class="col">
                                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                                            <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{ $course_type['name'] }}</label>
                                                            <input type="radio" name="new_course_course_type" class="course-type-{{ $course_type['id'] }}" value="{{ $course_type['id'] }}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <div class="cancel-btn_container">
                    <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                </div>
                <div class="back-btn_container d-none">
                    <x-secondary-button type="button" id="back-btn" title="Back"/>
                </div>

                <div class="next-btn_container">
                    <x-primary-button type="button" color="primary" id="process-next" title="Next" toggle="" target=""/>
                </div>
                <div class="submit-btn_container d-none">
                    <x-primary-button type="button" color="primary" id="process-submit" title="Submit" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" tabindex="-1" id="change-course-notification-modal" data-bs-backdrop="static" data-bs-keyboard="false">
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
                                <textarea id="change-course-notification-content" name="content" tabindex="2" class="form-control" placeholder="Enter content..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Enroll Course successful. We have reserved your seat. Please settle the payment of $1860.

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
    /* #change-course-table_wrapper .row:nth-child(2) {
        min-height: calc(100vh - 50vh) !important;
        max-height: calc(100vh - 50vh) !important;
    }

    .main-page_normal_card_info {
        min-height: calc(100vh - 32vh) !important;
        max-height: calc(100vh - 32vh) !important;
    } */

    .change-course-tab .card {
        border: none;
        border-radius: 0;
        border-left: 1px solid #e8e8e8 !important;
    }

    #class-detail_container .accordion-item {
        display: contents;
    }

    #class-detail_container .accordion-button {
        border-radius: 0;
        background-color: transparent;
        padding-left: 0;
        padding-right: 0;
        padding-bottom: 10px;
        color: #4A5C7A;
        font-size: 20px;
        font-weight: 500;
    }

    #class-detail_container .accordion-button::after {
        background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='currentColor'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>");
    }

    #class-detail_container .accordion-body{
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

    .disabled {
        background-color: #f5f5f5 !important;
        opacity: 50% !important;
    }
</style>

<script type="text/javascript">
    $(function() {
        var courseEnrollmentTable = $('.change-course-tab table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "columnDefs": [
                {
                    targets: [0,3,5,7],
                    orderable: false
                }
            ]
        });

        // Event listener for custom search input
        $('.change-course-tab').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            courseEnrollmentTable.search(searchTerm).draw();
        });
        
        var selectedData = {};

        tinymce.init({
            selector: '#change-course-notification-content',
            height: 300,
            auto_focus: '#tinymce'
            // other configuration options...
        });

        $('.change-course-tab #change-course-table tbody').on('click', 'tr', function() {
			const dataID = $(this).data('id');
            
 			const data = <?= json_encode($changeCourses['change_courses']) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            $('.change-course-tab #info-status').empty(); 
            $('.change-course-tab #info-status').append(`<span class="status-color_${rowData.status}">${rowData.status_label}</span>`);
            $('.change-course-tab #info-id').text( rowData.id );
            $('.change-course-tab #info-created_at').text( rowData.created_at );
            $('.change-course-tab #info-reason').text( rowData.reason );
            $('.change-course-tab #info-name').text( rowData.user.name );
            $('.change-course-tab #info-phone').text( rowData.user.student_information.phone );

            $('.change-course-tab #detail-modified_by').text( rowData.log ? rowData.log.user.name : '-' );
            $('.change-course-tab #detail-updated_at').text( rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});

        $('.change-course-tab #change-course-table').on('click', '.view-button', function() {
            const rowID = $(this).data('row_id');
            const changeCourseData = <?= json_encode($changeCourses['change_courses']) ?>;
            const changeCourse = changeCourseData.find(value => value.id == rowID);

            selectedData = changeCourse;
            console.log(selectedData);
            // COMPETITION DETAILS
            $('.change-course-tab #change-course-enrollment_type').text(changeCourse.enrollment.type_label);
            $('.change-course-tab #change-course-class_code').text(changeCourse.student_class.class.course_class_code);
            $('.change-course-tab #change-course-level').text(changeCourse.student_class.class.course.level.name);
            $('.change-course-tab #change-course-venue').text(changeCourse.student_class.class.course.venue_data.name);
            $('.change-course-tab #change-course-facility').text(changeCourse.student_class.class.course.facility.name);

            $('.change-course-tab #change-course-date').text(changeCourse.student_class.class.start_date);
            $('.change-course-tab #change-course-time').text(changeCourse.student_class.class.start_time  + " - " + changeCourse.student_class.class.end_time);

            // COACH DETAILS
            let coachesList = "";
            $('.change-course-tab #change-course-coach').empty();
            changeCourse.enrollment.package.course.coaches.forEach(coach => {
                coachesList += `<p>${coach.name}</p>`;
            });
            $('.change-course-tab #change-course-coach').append(coachesList);
            // END COACH DETAILS

            $('.change-course-tab #change-course-category').text(changeCourse.student_class.class.course.course_type.name);
            
            // STUDENT DETAILS
            $('.change-course-tab #student-detail_name').text(changeCourse.user.name);
            $('.change-course-tab #student-detail_student_id').text(changeCourse.user.student_information.student_id);
            $('.change-course-tab #student-detail_phone').text(changeCourse.user.student_information.phone);
            
            // OTHER DETAILS
            $('.change-course-tab #change-course-detail_id').text(changeCourse.id);
            $('.change-course-tab #change-course-detail_status').empty();
            $('.change-course-tab #change-course-detail_status').append(`<span class="status-color_${changeCourse.status}">${changeCourse.status_label}</span>`);
            $('.change-course-tab #change-course-detail_created_at').text(changeCourse.created_at);
            $('.change-course-tab #change-course-detail_reason').text(changeCourse.reason);
            const image = changeCourse.attachment
                ? `<img src="${changeCourse.image_path}" class="attachment-img">`
                : '-'
            $('.change-course-tab #change-course-detail_attachment').empty();
            $('.change-course-tab #change-course-detail_attachment').append(image);
            
            $('.start-new-class-container select[name=default_level_id]').val(changeCourse.student_class.class.course.level.id).trigger('change');
            $('.start-new-class-container select[name=default_venue_id]').val(changeCourse.student_class.class.course.venue).trigger('change');
            $('.start-new-class-container select[name=facility_id]').val(changeCourse.student_class.class.course.facility.id).trigger('change');
            $('.start-new-class-container input[name=class_size]').val(changeCourse.student_class.class.course.course_size);
            $('.start-new-class-container input[name=fee_per_class]').val(changeCourse.student_class.class.course.course_full_price);
            
            // $(`.start-new-class-container .course-type-${changeCourse.student_class.class.course.course_type.id}`).removeAttr('disabled');
            $(`.start-new-class-container .course-type-${changeCourse.student_class.class.course.course_type.id}`).removeClass('disabled');
            setTimeout(() => {
                $(`.start-new-class-container .course-type-${changeCourse.student_class.class.course.course_type.id}`).attr('checked', true);
            }, 1000);

            // Start New Course
            $('.start-new-course-container select[name=new_course_level_id]').val(changeCourse.student_class.class.course.level.id);
            $('.start-new-course-container input[name=new_course_class_size]').val(changeCourse.student_class.class.course.course_size);
            $('.start-new-course-container input[name=new_course_fee_per_class]').val(changeCourse.student_class.class.course.course_full_price);
            $('.start-new-course-container select[name=new_course_default_venue_id]').val(changeCourse.student_class.class.course.venue);
            $('.start-new-course-container select[name=new_course_facility_id]').val(changeCourse.student_class.class.course.facility.id);
            
            $(`.start-new-course-container .course-type-${changeCourse.student_class.class.course.course_type.id}`).removeClass('disabled');
            $(`.start-new-course-container .course-type-${changeCourse.student_class.class.course.course_type.id}`).attr('checked', true);
            

            if( changeCourse.status != 'processing' ) {
                $('#change-course-modal .next-btn_container').addClass('d-none');
            }
        });

        $('#change-course-modal').on('click', '#process-next', function(){
            $('#change-course-modal .cancel-btn_container').addClass('d-none');
            $('#change-course-modal .back-btn_container').removeClass('d-none');

            $('#change-course-modal .next-btn_container').addClass('d-none');
            $('#change-course-modal .submit-btn_container').removeClass('d-none');

            $('#change-course-modal .change-course-details').addClass('d-none');
            $('#change-course-modal .change-course-form').removeClass('d-none');
        });

        $('#change-course-modal').on('click', '#back-btn', function(){
            $('#change-course-modal .cancel-btn_container').removeClass('d-none');
            $('#change-course-modal .back-btn_container').addClass('d-none');

            $('#change-course-modal .next-btn_container').removeClass('d-none');
            $('#change-course-modal .submit-btn_container').addClass('d-none');

            $('#change-course-modal .change-course-details').removeClass('d-none');
            $('#change-course-modal .change-course-form').addClass('d-none');
        });

        var tempDate = "";
        var tempLevel = "";
        var tempVenue = "";

        // AVAILABLE CLASS FILTER
        $('.available-classes-container').on('change', 'input[name=class_date]', function(){
            const value = $(this).val();
            tempDate = value;

            if( value != '' && tempLevel != "" && tempVenue != "" ) {
                const courseClasses = <?= json_encode($changeCourses['classes']) ?>;

                const availableTimeSlot = courseClasses.filter(function(classData){
                    return classData.start_date == value && classData.course.venue == tempVenue && classData.course.course_level == tempLevel && classData.id != selectedData.student_class.class.id;
                });

                if( availableTimeSlot.length > 0 ) {
                    $('.available-time-slot_container .grid-repeat-container').removeClass('d-none')
                    $('.available-time-slot_container .empty-available-slot').addClass('d-none')
                    $('.available-time-slot_container .grid-reapeat-col-3').empty();
                    
                    let options = '';
                    availableTimeSlot.forEach(function($classData){
                        options += `<div class="col">
                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                            <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">${ $classData['start_time'] + ' - ' + $classData['end_time'] }</label>
                                            <input type="radio" name="class_id" value="${ $classData['id'] }">
                                        </div>
                                    </div>`;
                    });

                    $('.available-time-slot_container .grid-reapeat-col-3').append(options);
                } else {
                    $('.available-time-slot_container .grid-repeat-container').addClass('d-none')
                    $('.available-time-slot_container .empty-available-slot').removeClass('d-none')
                }
            } else {
                $('.available-time-slot_container .grid-repeat-container').addClass('d-none')
                $('.available-time-slot_container .empty-available-slot').removeClass('d-none')
            }
        });

        $('.available-classes-container').on('change', 'select[name=level_id]', function(){
            const level = $(this).val();
            tempLevel = level

            if( level != "" && tempVenue != "" ) {
                const courseClasses = <?= json_encode($changeCourses['classes']) ?>;
                const availableTimeSlot = courseClasses.filter(function(classData){
                    return classData.course.venue == tempVenue && classData.course.course_level == level && classData.id != selectedData.student_class.class.id;
                });

                if( availableTimeSlot.length > 0 ) {
                    $('.available-time-slot_container .grid-repeat-container').removeClass('d-none')
                    $('.available-time-slot_container .empty-available-slot').addClass('d-none')
                    $('.available-time-slot_container .grid-reapeat-col-3').empty();
                    
                    let options = '';
                    availableTimeSlot.forEach(function($classData){
                        options += `<div class="col">
                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                            <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">${ $classData['start_time'] + ' - ' + $classData['end_time'] }</label>
                                            <input type="radio" name="class_id" value="${ $classData['id'] }">
                                        </div>
                                    </div>`;
                    });

                    $('.available-time-slot_container .grid-reapeat-col-3').append(options);
                } else {
                    $('.available-time-slot_container .grid-repeat-container').addClass('d-none')
                    $('.available-time-slot_container .empty-available-slot').removeClass('d-none')
                }
            } else {
                $('.available-time-slot_container .grid-repeat-container').addClass('d-none')
                $('.available-time-slot_container .empty-available-slot').removeClass('d-none')
            }
        });

        $('.available-classes-container').on('change', 'select[name=venue_id]', function(){
            const venue = $(this).val();
            tempVenue = venue

            if( tempLevel != "" && venue != "" ) {
                const courseClasses = <?= json_encode($changeCourses['classes']) ?>;
                const availableTimeSlot = courseClasses.filter(function(classData){
                    return classData.course.venue == venue && classData.course.course_level == tempLevel && classData.id != selectedData.student_class.class.id;
                });

                if( availableTimeSlot.length > 0 ) {
                    $('.available-time-slot_container .grid-repeat-container').removeClass('d-none')
                    $('.available-time-slot_container .empty-available-slot').addClass('d-none')
                    $('.available-time-slot_container .grid-reapeat-col-3').empty();
                    
                    let options = '';
                    availableTimeSlot.forEach(function($classData){
                        options += `<div class="col">
                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                            <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">${ $classData['start_time'] + ' - ' + $classData['end_time'] }</label>
                                            <input type="radio" name="class_id" value="${ $classData['id'] }">
                                        </div>
                                    </div>`;
                    });

                    $('.available-time-slot_container .grid-reapeat-col-3').append(options);
                } else {
                    $('.available-time-slot_container .grid-repeat-container').addClass('d-none')
                    $('.available-time-slot_container .empty-available-slot').removeClass('d-none')
                }
            } else {
                $('.available-time-slot_container .grid-repeat-container').addClass('d-none')
                $('.available-time-slot_container .empty-available-slot').removeClass('d-none')
            }
        });
        // END OF AVAILABLE CLASS FILTER

        $('#change-course-modal').on('click', 'input[name=arrangement]', function(){
            const value = $(this).val();

            if( value == 'available_class' ) {
                $('#change-course-modal .available-classes-container').removeClass('d-none');
                $('#change-course-modal .start-new-class-container').addClass('d-none');
                $('#change-course-modal .start-new-course-container').addClass('d-none');
            }

            if( value == 'start_new_class' ) {
                $('#change-course-modal .available-classes-container').addClass('d-none');
                $('#change-course-modal .start-new-class-container').removeClass('d-none');
                $('#change-course-modal .start-new-course-container').addClass('d-none');
            }

            if( value == 'start_new_course' ) {
                $('#change-course-modal .available-classes-container').addClass('d-none');
                $('#change-course-modal .start-new-class-container').addClass('d-none');
                $('#change-course-modal .start-new-course-container').removeClass('d-none');
            }

            $('select').removeClass('border border-danger');
			if( $('select').next().is('p') )
				$('select').next('p').remove();

			$('input').removeClass('border border-danger');
			if( $('input').next().is('p') )
				$('input').next('p').remove();

            $('input').parent().removeClass('border border-danger');
			if( $('input').parent().next().is('p') )
				$('input').parent().next('p').remove();

			$('textarea').removeClass('border border-danger');
			if( $('textarea').next().is('p') )
				$('textarea').next('p').remove();
        });

        $('#change-course-modal').on('click', '#process-submit', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#change-course-modal .change-course-form #modal-form').serializeArray();
            // const arrangement = $('#change-course-modal .change-course-form input[name=arrangement]').val();
            let arrangement = '';

            let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;

                if (item.name == 'arrangement') {
                    arrangement = item.value
                }
			});

            // available classes
            let requiredFields = [
                'level_id', 'venue_id',
                'class_id', 'remarks'
            ];
            
            // start new class
            if( arrangement == "start_new_class" ) {
                requiredFields = ['start_date', 'start_time', 'end_time', 'remarks'];
            }

            // start new class
            if( arrangement == "start_new_course" ) {
                requiredFields = [
                    'new_course_level_id',
                    'new_course_coach_id',
                    'new_course_class_size',
                    'new_course_fee_per_class',
                    'new_course_default_venue_id',
                    'new_course_facility_id',
                    'new_course_start_date',
                    'new_course_start_time',
                    'new_course_end_time',
                    'new_course_course_type',
                    'remarks'
                ];
            }
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

            // transformedData['id'] = selectedData.id;
            // transformedData['user_id'] = selectedData.user_id;
            // transformedData['course_id'] = selectedData.student_class.class.course.id;
            // transformedData['student_class_id'] = selectedData.student_class_id;
            // transformedData['package_id'] = selectedData.student_class.class.package_id;

            const formStatus = $('#change-course-modal #form-container input[name=status]').val();
            
            transformedData['status'] = formStatus;

            // Transform new Data for Start new Course
            newTransformedData = {};
            if( arrangement == "available_class" ) {
                newTransformedData['id'] = selectedData.id;
                newTransformedData['status'] = transformedData['status'];
                newTransformedData['arrangement'] = transformedData['arrangement'];
                newTransformedData['student_class_id'] = selectedData.student_class_id;
                newTransformedData['user_id'] = selectedData.user_id;
                newTransformedData['class_id'] = transformedData['class_id'];
                newTransformedData['remarks'] = transformedData['remarks'];
                newTransformedData['old_course_id'] = selectedData.student_class.class.course.id;
                newTransformedData['old_package_id'] = selectedData.student_class.class.package_id;
            }

            // ! this is removed base on figma and documentation
            if( arrangement == "start_new_class" ) {
                newTransformedData['id'] = selectedData.id;
                newTransformedData['status'] = transformedData['status'];
                newTransformedData['arrangement'] = transformedData['arrangement'];
                newTransformedData['student_class_id'] = selectedData.student_class_id;
                newTransformedData['course_id'] = selectedData.student_class.class.course.id;
                newTransformedData['package_id'] = selectedData.student_class.class.package_id;

                newTransformedData['start_date'] = transformedData['start_date'];
                newTransformedData['start_time'] = transformedData['start_time'];
                newTransformedData['end_time'] = transformedData['end_time'];
                
                newTransformedData['user_id'] = selectedData.user_id;
                newTransformedData['remarks'] = transformedData['remarks'];
            }

            if( arrangement == "start_new_course" ) {
                newTransformedData['id'] = selectedData.id;
                newTransformedData['status'] = transformedData['status'];
                newTransformedData['arrangement'] = transformedData['arrangement'];
                newTransformedData['student_class_id'] = selectedData.student_class_id;
                newTransformedData['venue_id'] = transformedData['new_course_default_venue_id'];
                newTransformedData['level_id'] = transformedData['new_course_level_id'];
                newTransformedData['course_full_price'] = transformedData['new_course_fee_per_class'];
                newTransformedData['remarks'] = transformedData['remarks'];
                newTransformedData['course_size'] = transformedData['new_course_class_size'];
                newTransformedData['course_type'] = transformedData['new_course_course_type'];
                newTransformedData['facility_id'] = transformedData['new_course_facility_id'];
                newTransformedData['coach_id'] = transformedData['new_course_coach_id'];
                newTransformedData['start_date'] = transformedData['new_course_start_date'];
                newTransformedData['start_time'] = transformedData['new_course_start_time'];
                newTransformedData['end_time'] = transformedData['new_course_end_time'];
                newTransformedData['user_id'] = selectedData.user_id;
                newTransformedData['old_course_id'] = selectedData.student_class.class.course.id;
                newTransformedData['old_package_id'] = selectedData.student_class.class.package_id;
            }

            // $(this).removeAttr('disabled');
            // console.log(transformedData);
            // console.log(newTransformedData);
            // return;
            await axios.post(`${getApiUrl()}/request/change-course-response`, newTransformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#change-course-modal #cancel-btn').click();

                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        $('#change-course-notification-modal').modal('show');
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
        $('#change-course-notification-modal').on('click', '.edit_form_btn', function(){
            // show the form
            $('#change-course-notification-modal #modal-form').removeClass('d-none');
            $('#change-course-notification-modal #preview-form').addClass('d-none');
            
            // show the preview button
            $('#change-course-notification-modal .edit_form_btn').addClass('d-none');
            $('#change-course-notification-modal .preview_form_btn').removeClass('d-none');
        });

        $('#change-course-notification-modal').on('click', '.preview_form_btn', function(){
            // show the form
            $('#change-course-notification-modal #modal-form').addClass('d-none');
            $('#change-course-notification-modal #preview-form').removeClass('d-none');
            
            // show the preview button
            $('#change-course-notification-modal .edit_form_btn').removeClass('d-none');
            $('#change-course-notification-modal .preview_form_btn').addClass('d-none');

            // Update the preview form
            const formData = $('#change-course-notification-modal #modal-form').serializeArray();

            formData.forEach(function(data){
                if(data.name == 'title')
                    $('#change-course-notification-modal .preview-title').text(data.value)

                if(data.name == 'content') {
                    var content = tinymce.get('change-course-notification-content').getContent();
                    $('#change-course-notification-modal .preview-content').empty();
                    $('#change-course-notification-modal .preview-content').append(content)
                }
                    

                if(data.name == "category")
                    $('#change-course-notification-modal .preview-category').text(data.value)
            })

            // For Scheduled Date
            const isSendEmediate = $('#change-course-notification-modal input[name=send_immediate]').is(':checked');
            const scheduledDate = $('#change-course-notification-modal input[name=datetime_to_send]').val();
            if( isSendEmediate )
                $('#change-course-notification-modal .preview-send_content').text("Immediately");
            else
                $('#change-course-notification-modal .preview-send_content').text(scheduledDate);

            // For what is selected
            const isSendViaEmail = $('#change-course-notification-modal input[name=send_via_email]').is(':checked');
            const isSendViaApp = $('#change-course-notification-modal input[name=send_via_app]').is(':checked');

            $('#change-course-notification-modal .preview-send_via').text(`Send via: ${isSendViaEmail ? 'Email' : ''} ${isSendViaEmail && isSendViaApp ? ',' : ''} ${isSendViaApp ? 'App' : ''}`)
        });

        // Get the current date and time
        const now = new Date();
        const formattedDate = now.toISOString().slice(0, 16); // Format: "YYYY-MM-DDTHH:mm"
        $('#change-course-notification-modal input[name=datetime_to_send]').val(formattedDate);

        $('#change-course-notification-modal input[name=send_via_email]').on('change', function(){
            $('input[name=send_via_app]').prop('checked', false);
        });

        $('#change-course-notification-modal input[name=send_via_app]').on('change', function(){
            $('input[name=send_via_email]').prop('checked', false);
        });
        
        $('#change-course-notification-modal').on('click', '#process-notification', async function(){
            $(this).attr('disabled', 'true');
            console.log("Hello");
			// get user token
			const userToken = getUserToken();

            var content = tinymce.get('change-course-notification-content').getContent();
            $('#change-course-notification-content').val(content);
            
			// Prepare Data
			const formData = $('#change-course-notification-modal #modal-form').serializeArray();

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
            if ( $('#change-course-notification-modal input[name=send_via_email]').is(':checked') )
                sendVia = "email";

            if( $('#change-course-notification-modal input[name=send_via_app]').is(':checked') )
                sendVia = "app";

            let sendImmediate = 0;
            if( $('#change-course-notification-modal input[name=send_immediate]').is(':checked') )
                sendImmediate = 1;

            transformedData['make_up_class_id'] = selectedData.id;
            transformedData['send_via'] = sendVia;
            transformedData['send_immediate'] = sendImmediate;
            // $(this).removeAttr('disabled');
            // console.log(transformedData);
            // return;
            // API Request to save level
            await axios.post(`${getApiUrl()}/request/change-course-notification`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        $('#change-course-notification-modal .cancel_btn').click();

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

        $('#change-course-notification-modal').on('click', '.cancel_btn', function(){
            window.location = window.location
        });

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
                const hasParentFields = ['new_course_start_date', 'class_date', 'start_date'];

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