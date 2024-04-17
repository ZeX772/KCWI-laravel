<div>
    <div class="row pl-3">
        <!-- Table List -->
        <div class="col-12 page-content-col">
            <div class="p-3 pt-4">
                <div class="row table-custom-filter">
                    <div class="col-12 position-relative d-flex align-items-end">
                        <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
                    </div>
                </div>
                <div class="table-responsive table-custom with-custom-search mt-4">
                    <table class="table table-hover w-100" id="student-course_table">
                        <thead>
                            <tr>
                                <th class="text-left">COURSE CODE</th>
                                <th class="text-left">LEVEL</th>
                                <th class="text-left">VENUE</th>
                                <th class="text-left">COACH</th>
                                <th class="text-left">DATE</th>
                                <th class="text-left">TIME</th>
                                <th class="text-left">COURSE CATEGORY</th>
                                <th class="text-left">ACTIONS</th>
                                <th class="text-left"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $entry['courseEnrollments'] as $course_enrollment )
                                <tr data-row_id="{{ $course_enrollment['id'] }}">
                                    <td class="text-left">{{ $course_enrollment['package']['course']['course_abbreviation'] ?? '-' }}</td>
                                    <td class="text-left">{{ $course_enrollment['package']['course']['level']['name'] ?? '-' }}</td>
                                    <td class="text-left">{{ $course_enrollment['package']['course']['venue']['name'] ?? '-' }}</td>
                                    <td class="text-left">
                                        <div>
                                            @foreach($course_enrollment['package']['course']['coaches'] as $coach)
                                                <p>{{ $coach['name'] }}</p>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="text-left">{{ count($course_enrollment['filteredStudentClasses']) > 0 ? $course_enrollment['filteredStudentClasses'][0]['class']['start_date'] : '-' }}</td>
                                    <?php
                                        $startTime = count($course_enrollment['filteredStudentClasses']) > 0 ? $course_enrollment['filteredStudentClasses'][0]['class']['start_time'] : '?';
                                        $endTime = count($course_enrollment['filteredStudentClasses']) > 0 ? $course_enrollment['filteredStudentClasses'][0]['class']['end_time'] : '?';
                                        $formattedTime = $startTime . " - " . $endTime;
                                    ?>
                                    <td class="text-left">{{ $formattedTime }}</td>
                                    <td class="text-left">{{ $course_enrollment['package']['course']['course_type']['name'] }}</td>
                                    <td class="text-left text-{{ $course_enrollment['status'] }}">{{ $course_enrollment['status_label'] }}</td>
                                    <td class="text-left">
                                        <div class="table-acitions_container d-flex gap-2">
                                            <button type="button" class="view-button" id="view-btn" data-row_id="{{ $course_enrollment['id'] }}" data-bs-toggle="modal" data-bs-target="#enrolled-course-view_modal">
                                                <x-svg-icon icon="view" />
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

<!-- Comment Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="comment-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Coach Comment</h4>
                <div class="d-flex align-items-center gap-2">
                    <span class="small-icon_btn p-2 cursor-pointer cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div class="modal-body p-4 pt-0">
                <div id="preview-form">
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('themes/tailwind/images/clipboard-image-7.png') }}" style="width: 24px;" alt="">
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-coach">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: center; justify-content: center;" class="pt-1">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-student">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: center; justify-content: center;" class="pt-1">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-level">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: center; justify-content: center;" class="pt-1">
                            <x-svg-icon icon="calendar" />
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-class_datetime">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: center; justify-content: center;" class="pt-1">
                            <x-svg-icon icon="calendar" />
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-comment_date_time">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: flex-start; justify-content: center;" class="pt-1">
                            <i class="fa-solid fa-square"></i>
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-title" style="font-weight: 500; font-size: 16px;">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-3 mb-3">
                        <div style="width: 30px; display: flex; align-items: flex-start; justify-content: center;" class="pt-1">
                            <x-svg-icon icon="list" />
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-comment">-</p>
                        </div>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <div class="form-inline w-100">
                            <p class="preview-status">Status: <span>Active</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enrolled Course View Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="course-view_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Enrolled Course Details</h4>
                    <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div id="main-form" class="modal-body p-4 pt-0">
                <div id="course-detail_container" class="mb-4">
                    <div class="course-contents">
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Course Code</dd>
                            <dd class="col-sm-9" id="course-detail_code">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Level</dd>
                            <dd class="col-sm-9" id="course-detail_level">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Venue</dd>
                            <dd class="col-sm-9" id="course-detail_venue">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Facility</dd>
                            <dd class="col-sm-9" id="course-detail_facility">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Size</dd>
                            <dd class="col-sm-9" id="course-detail_size">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Type</dd>
                            <dd class="col-sm-9" id="course-detail_type">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Coaches</dd>
                            <dd class="col-sm-9" id="course-detail_coaches">-</dd>
                        </dl>
                    </div>
                </div>
                <div class="withdrawal-btn_container mb-4">
                    <div class="form_btn mt-3">
                        <x-primary-button type="button" id="withdrawal-btn" customClass='sm' title="Withdraw Course" toggle="" target=""/>
                    </div>
                </div>
                <div id="class-detail_container" class="mb-3 mt-3">
                    <label class="detail-column-heading"><u>Classes</u></label>
                    <table class="table modal-table">
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col">CLASS CODE</th>
                                <th scope="col">VENUE</th>
                                <th scope="col">FACILITY</th>
                                <th scope="col">COACH</th>
                                <th scope="col">DATE</th>
                                <th scope="col">TIME</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="arrangement-container mt-5 mb-3 d-none">
                    <div class="container" style="padding: 0px;color: #636363;">
                        <div class="form-inline">
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Please Select</label>
                                <div class="grid-reapeat-col-3 gap-3">
                                    <div class="col">
                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                            <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Makeup/Swap</label>
                                            <input type="radio" name="arrangement" value="makeup_swap" checked>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                            <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Change Course</label>
                                            <input type="radio" name="arrangement" value="change_course">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="makeup-detail_container" class="mb-3 d-none">
                    <label class="detail-column-heading"><u>Makeup / Swap</u></label>
                    <form id="modal-form" enctype="multipart/form-data">
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-select
                                label="Available Classes (optional)" 
                                name="class_id"
                                id="class_id"
                                isRequired="false"
                            >
                                <option value="" hidden>Select Available Class</option>
                                <option value="1">VSA-RS2-0002-1</option>
                            </x-form-select>
                        </div>
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label form-input-label">Upload Attachments</label>
                                <input name="attachment" class="form-control" type="file">
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="form-label form-input-label">Reason <span class="text-danger">*</span></label>
                                    <textarea name="makeup_reason" class="form-control" placeholder="Enter reason here..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </form>
                            <div class="form_btn mt-3">
                                <x-primary-button type="button" id="make-up-swap_btn" title="Makeup/Swap" toggle="" target=""/>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="change-course_container" class="mb-3 d-none">
                    <label class="detail-column-heading"><u>Change Course</u></label>
                    <form id="modal-form" enctype="multipart/form-data">
                        <!-- <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-select
                                label="Available Classes (optional)" 
                                name="class_id"
                                id="class_id"
                                isRequired="false"
                            >
                                <option value="" hidden>Select Available Class</option>
                                <option value="1">VSA-RS2-0002-1</option>
                            </x-form-select>
                        </div> -->
                        <!-- <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label form-input-label">Upload Attachments</label>
                                <input name="attachment" class="form-control" type="file">
                            </div>
                        </div> -->
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="form-label form-input-label">Reason <span class="text-danger">*</span></label>
                                    <textarea name="reason" class="form-control" placeholder="Enter reason here..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </form>
                            <div class="form_btn mt-3">
                                <x-primary-button type="button" id="change-course_btn" title="Change Course" toggle="" target=""/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enrolled Course Withdrawal Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="course-withdrawal_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Course Withdrawal</h4>
                    <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div class="modal-body p-4 pt-0">
                <p class="modal-body_message">Are you sure you want to withdraw this course <span></span>?</p>
                <form id="modal-form" enctype="multipart/form-data">
                    <div class="container mb-3" style="padding: 0px;color: #636363;margin-top: 20px;">
                        <div class="form-group">
                            <label class="form-label form-input-label">Reason <span class="text-danger">*</span></label>
                            <textarea name="reason" class="form-control" placeholder="Enter reason here..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                        </div>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label form-input-label">Upload Attachments (optional)</label>
                            <input name="attachment" class="form-control" type="file">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-form_btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Enrolled Course View Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="enrolled-course-view_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Course Information</h4>
                    <div class="d-flex gap-2">
                        <!-- <span class="small-icon_btn p-2 cursor-pointer" id="preview_btn"><x-svg-icon icon="view" /></span>
                        <span class="small-icon_btn p-2 cursor-pointer" id="edit_btn"><x-svg-icon icon="edit" /></span> -->
                        <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                    </div>
                </div>
            </div>
            <div id="main-form" class="modal-body p-4 pt-0">
                <div id="course-detail_container" class="mb-4">
                    <div class="course-contents">
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Course Code</dd>
                            <dd class="col-sm-9" id="course-detail_code">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Level</dd>
                            <dd class="col-sm-9" id="course-detail_level">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Venue</dd>
                            <dd class="col-sm-9" id="course-detail_venue">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Coach</dd>
                            <dd class="col-sm-9" id="course-detail_coach">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Date</dd>
                            <dd class="col-sm-9" id="course-detail_date">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Time</dd>
                            <dd class="col-sm-9" id="course-detail_time">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Course Category</dd>
                            <dd class="col-sm-9" id="course-detail_category">-</dd>
                        </dl>
                    </div>
                </div>
                <hr>
                <div>
                    <h4 class="attendance-record-title mt-3 d-flex justify-content-between" style="font-size: 32px;color: #3B3B3B;">
                        <span>Attendance Records</span>
                        <div>
                            <button type="button" class="btn btn-secondary dropdown-toggle d-flex gap-2" data-bs-toggle="dropdown" aria-expanded="false" data-popper-placement="bottom-end">
                                <span>Actions</span>
                            </button>
                            <ul class="dropdown-menu" data-popper-placement="bottom-end" style="position: absolute; left: -70px; top: 30px;">
                                <li>
                                    <a href="" class="dropdown-item overflow-hidden" data-value="withdraw" style="text-overflow: ellipsis" data-id="">
                                        <span>
                                            <i class="fa-regular fa-star"></i>
                                        </span>
                                        <span class="ms-2">Withdraw</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </h4>
                    <div class="table-responsive table-custom with-custom-search mt-4">
                        <table class="table table-hover w-100" id="enrolled-course_table">
                            <thead>
                                <tr>
                                    <th class="text-left">DATE</th>
                                    <th class="text-left">TIME</th>
                                    <th class="text-left">STATUS</th>
                                    <th class="text-left">REMARKS</th>
                                    <th class="text-left" style="width: 5px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-left">6/7/2022</td>
                                    <td class="text-left">10:00 - 11:00</td>
                                    <td class="text-left">Present</td>
                                    <td class="text-left">Remark...</td>
                                    <td class="text-left" style="width: 5px;">
                                        <div style="position: relative;">
                                            <span class="table-action_btn cursor-pointer">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </span>
                                            <div class="table-action_dropdown d-none">
                                                <div class="w-100 table-action_content">
                                                    <div class="table-action_content_item d-flex align-items-center gap-2 p-2 m-2 cursor-pointer">
                                                        <span><i class="fa-regular fa-clipboard"></i></span>
                                                        <span>Absent</span>
                                                    </div>
                                                    <div class="table-action_content_item d-flex align-items-center gap-2 p-2 m-2 cursor-pointer">
                                                        <span><i class="fa-regular fa-clipboard"></i></span>
                                                        <span>Leave</span>
                                                    </div>
                                                    <div class="table-action_content_item d-flex align-items-center gap-2 p-2 m-2 cursor-pointer">
                                                        <span><i class="fa-regular fa-clipboard"></i></span>
                                                        <span>Makeup / Swap</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enrolled Course Makeup / Swap Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="makeup-swap_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Makeup / Swap</h4>
                    <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div id="main-form" class="modal-body p-4 pt-0">
                <div id="makeup-detail_container" class="mb-3">
                    <label class="detail-column-heading"><u>Course Class Code</u></label>
                    <form id="modal-form" enctype="multipart/form-data">
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-select
                                label="Available Classes (optional)" 
                                name="class_id"
                                id="class_id"
                                isRequired="false"
                            >
                                <option value="" hidden>Select Available Class</option>
                                <option value="1">VSA-RS2-0002-1</option>
                            </x-form-select>
                        </div>
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label form-input-label">Upload Attachments</label>
                                <input name="attachment" class="form-control" type="file">
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="form-label form-input-label">Reason <span class="text-danger">*</span></label>
                                    <textarea name="makeup_reason" class="form-control" placeholder="Enter reason here..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </form>
                            <div class="form_btn mt-3">
                                <x-primary-button type="button" id="make-up-swap_btn" title="Makeup/Swap" toggle="" target=""/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enrolled Course Absent Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="absent_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Absent</h4>
                    <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div id="main-form" class="modal-body p-4 pt-0">
                <div id="makeup-detail_container" class="mb-3">
                    <label class="detail-column-heading"><u>Course Class Code</u></label>
                    <form id="modal-form" enctype="multipart/form-data">
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="form-label form-input-label">Reason <span class="text-danger">*</span></label>
                                    <textarea name="remarks" class="form-control" placeholder="Enter reason here..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </form>
                            <div class="form_btn mt-3">
                                <x-primary-button type="button" id="submit_btn" title="Save" toggle="" target=""/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enrolled Course Leave Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="leave_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Leave</h4>
                    <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div id="main-form" class="modal-body p-4 pt-0">
                <div id="makeup-detail_container" class="mb-3">
                    <label class="detail-column-heading"><u>Course Class Code</u></label>
                    <form id="modal-form" enctype="multipart/form-data">
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="form-label form-input-label">Reason <span class="text-danger">*</span></label>
                                    <textarea name="remarks" class="form-control" placeholder="Enter reason here..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </form>
                            <div class="form_btn mt-3">
                                <x-primary-button type="button" id="submit_btn" title="Save" toggle="" target=""/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-approved,
    .text-completed {
        color: #398000 !important;
    }

    .text-processing {
        color: #808090 !important;
    }

    .text-waiting_list {
        color: #0061FF !important;
    }

    .text-reservation {
        color: #FFC24A !important;
    }

    .table-btn {
        padding: 10px;
        background: #fff;
        border-radius: 5px;
        box-shadow: 1px 1px 2px 1px #d2d2d2;
    }

    /* Table Action Dropdown */
    .table-action_dropdown {
        position: absolute; 
        right: 40px;
        box-shadow: 0px 24px 50px 0px #58585840; 
        background: #FFFFFF; 
        z-index: 99; 
        width: 200px; 
        border-radius: 8px;
    }

    .table-action_dropdown .table-action_content_item:hover {
        background: #ededed;
        border-radius: 8px;
    }

    #enrolled-course_table_wrapper .row:nth-child(2) {
        margin-bottom: 50px;
    }

    /* Button */
    .attendance-record-title button {
        border: 1px solid #f5f5f5;
        background: #f5f5f5;
        color: #3B3B3B;
    }
</style>

<script>
    $(function() {
        var customTable = $('#student-course_table').DataTable({
            "columnDefs": [{
                    targets: [0],
                    orderable: false
            }]
        });

        var customTableEnrolledCourse = $('#enrolled-course_table').DataTable({
            "columnDefs": [{
                    targets: [0],
                    orderable: false
            }]
        });

        // Event listener for custom search input
        $('.course_tab .table-custom-filter').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            customTable.search(searchTerm).draw();
        });

        // for makeup class
        var availableClassList;
        var selectedStudentClassID;
        var userID;
        // for change course
        var selectedCourseEnrollmentID;
        var selectedClassPackageID;

        // for course withdraw
        var selectedCourse;
        var selectedCoursePackage;

        $('#student-course_table').on('click', '.view-course-btn', function(){
            $('#course-view_modal').modal('show');

            const id = $(this).data('id');

            const entry = <?= json_encode($entry) ?>;

            const selectedData = entry.courseEnrollments.find(value => value.id == id);
            console.log(selectedData);
            availableClassList = selectedData.package.course.available_classes;
            selectedCourseEnrollmentID = selectedData.id;
            selectedCourse = selectedData.package.course;
            selectedCoursePackage = selectedData.package;
            userID = selectedData.user_id;
            
            // Fill the course detail modal view
            $('#course-detail_container #course-detail_code').text(selectedData.package.course.course_abbreviation);
            $('#course-detail_container #course-detail_level').text(selectedData.package.course.level.name);
            $('#course-detail_container #course-detail_venue').text(selectedData.package.course.venue.name);
            $('#course-detail_container #course-detail_facility').text(selectedData.package.course.facility.name);
            $('#course-detail_container #course-detail_size').text(selectedData.package.course.course_size);
            
            $('#course-detail_container #course-detail_type').text(selectedData.package.course.course_type.name);
            $('#course-detail_container #course-detail_coaches').empty();
            let courseCoachesElement = '';
            selectedData.package.course.coaches.forEach(element => {
                courseCoachesElement += `<p>${element.name}</p>`;
            });
            $('#course-detail_container #course-detail_coaches').append(courseCoachesElement);

            // For table rows
            $('#class-detail_container table tbody').empty();
            let tableRows = '';
            selectedData.filteredStudentClasses.forEach(element => {
                let coachesElement = '';
                element.class.course.coaches.filter(function(coach){
                    coachesElement += `<p>${coach.name}</p>`;
                });

                tableRows += `<tr>
                                <td>${element.class.course_class_code}</td>
                                <td>${element.class.course.venue.name ?? "-"}</td>
                                <td>${element.class.course.facility.name ?? "-"}</td>
                                <td>${coachesElement}</td>
                                <td>${element.class.start_date}</td>
                                <td>${element.class.start_time + " - " + element.class.end_time}</td>
                                <td>
                                    <span class="cursor-pointer makeup-class_btn" data-class_id="${element.class.id}" data-student_class_id="${element.id}" data-package_id="${element.class.package_id}">
                                        <i class="fa-solid fa-right-left"></i>
                                    </span>
                                </td>
                            </tr>`;
            });

            if( selectedData.filteredStudentClasses.length <= 0 )
                tableRows += `<tr>
                                <td colspan="7" class="text-center">No Enrolled Class found</td>
                            </tr>`;

            $('#class-detail_container table tbody').append(tableRows);

            // clear form field
            resetModalForm();
        });

        $('#class-detail_container').on('click', '.makeup-class_btn', function(){
            let classID = $(this).data('class_id');
            selectedStudentClassID = $(this).data('student_class_id');
            selectedClassPackageID = $(this).data('package_id');

            let userDetails = <?= json_encode($entry); ?>;
            userID = userDetails.id;

            $('#class-detail_container table tbody tr').removeAttr('style');
            $(this).closest('tr').attr('style', 'background: #e7e7e7;');

            // show the makeup/swap container
            $('#makeup-detail_container').removeClass('d-none');
            $('.arrangement-container').removeClass('d-none');

            $('#makeup-detail_container select[name=class_id]').empty();
            let availableClassOptions = '';
            availableClassOptions += `<option value="" hidden>Select Available Class</option>`;
            availableClassList.forEach(element => {
                availableClassOptions += `<option value="${element.id}">${element.course_class_code + " (" + element.start_date + " " + element.start_time + " - " + element.end_time + " )"}</option>`;
            });

            if( availableClassList.length <= 0 )
                availableClassOptions = `<option value="" hidden>No Available Class</option>`;

            $('#makeup-detail_container select[name=class_id]').append(availableClassOptions);

            $('#makeup-detail_container').removeClass('d-none');
            $('#change-course_container').addClass('d-none');
            $('input[value=makeup_swap]').prop('checked', true);
        });

        // Arrangement Option
        $('.arrangement-container').on('click', 'input[name=arrangement]', function(){
            const value = $(this).val();
            
            if( value == 'makeup_swap' ) {
                $('#makeup-detail_container').removeClass('d-none');
                $('#change-course_container').addClass('d-none');
            }

            if( value == 'change_course' ) {
                $('#makeup-detail_container').addClass('d-none');
                $('#change-course_container').removeClass('d-none');
            }
        });

        $('#makeup-swap_modal #makeup-detail_container').on('click', '#make-up-swap_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();
			
			// Prepare Data
			const formData = $('#makeup-swap_modal #makeup-detail_container #modal-form').serializeArray();

            const requiredFields = [
                'makeup_reason'
            ];
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

			let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

			let data = new FormData()
			data.append('user_id', userID)
			data.append('student_class_id', selectedStudentClassID)
			data.append('class_id', transformedData['class_id'])
			data.append('reason', transformedData['makeup_reason'])

            if( $('#makeup-swap_modal #makeup-detail_container input[name=attachment]')[0].files[0] ) {
                data.append('attachment', $('#makeup-swap_modal #makeup-detail_container input[name=attachment]')[0].files[0], $('#makeup-detail_container input[name=attachment]')[0].files[0].name)
            }
            
			// $(this).removeAttr('disabled');
			// console.log(selectedStudentClassID);
			// return;

			await axios.post(`${getApiUrl()}/request/create-make-up-class`, data, {
					headers: {
						'Authorization': 'Bearer ' + userToken,
					}
				}).then(res => {
					if ( res.data.success ) {
                        $('#course-view_modal').modal('hide');

						toastTopEnd("Success", res.data.message, "success");

						window.location = window.location
					} else {
						toastTopEnd("Cant' process request", res.data.message, "warning");

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

        $('#change-course_container').on('click', '#change-course_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();
			
			// Prepare Data
			const formData = $('#change-course_container #modal-form').serializeArray();

            const requiredFields = [
                'makeup_reason'
            ];
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

			let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

			let data = new FormData()
			data.append('user_id', userID)
    
            if( selectedStudentClassID )
			    data.append('student_class_id', selectedStudentClassID)

            if( selectedCourseEnrollmentID )
                data.append('course_enrollment_id', selectedCourseEnrollmentID)

            data.append('package_id', selectedClassPackageID)
			data.append('reason', transformedData['reason'])

			await axios.post(`${getApiUrl()}/request/create-change-course`, data, {
					headers: {
						'Authorization': 'Bearer ' + userToken,
					}
				}).then(res => {
					$('#course-view_modal').modal('hide');

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

        // $('.withdrawal-btn_container').on('click', '#withdrawal-btn', function(){
        //     $('#course-view_modal #cancel_btn').click();
        //     $('#course-withdrawal_modal').modal('show');
            
        //     $('#course-withdrawal_modal .modal-body_message span').text(selectedCourse.course_abbreviation);
        // });

        $('#course-withdrawal_modal').on('click', '#save-form_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();
			
			// Prepare Data
			const formData = $('#course-withdrawal_modal #modal-form').serializeArray();

            const requiredFields = [
                'reason'
            ];
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

			let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

			let data = new FormData()
			data.append('user_id', userID)
			data.append('reason', transformedData['reason'])
            data.append('package_id', selectedCoursePackage.id)
			data.append('course_enrollment_id', selectedCourseEnrollmentID)
			data.append('from', 'student-courses')
			
            const attachmentData = $('#course-withdrawal_modal input[name=attachment]')[0].files[0];

            if( attachmentData )
			    data.append('attachment', attachmentData, attachmentData.name);
            
            // $(this).removeAttr('disabled');
			// console.log(userID);
			// console.log(selectedCoursePackage);
			// console.log(selectedCourseEnrollmentID);
			// return;

			await axios.post(`${getApiUrl()}/request/create-course-withdrawal`, data, {
					headers: {
						'Authorization': 'Bearer ' + userToken,
					}
				}).then(res => {
					if ( res.data.success ) {
                        $('#course-withdrawal_modal #cancel_btn').click();

						toastTopEnd("Success", res.data.message, "success");

						window.location = window.location
					} else {
						toastTopEnd("Cant' process request", res.data.message, "warning");

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

        // Table Actions
        $('#enrolled-course_table').on('click', '.table-action_btn', function(){
            $('#enrolled-course_table .table-action_dropdown').addClass('d-none');

            $(this).next('.table-action_dropdown').toggleClass('is-open');
            if( $(this).next('.table-action_dropdown').hasClass('is-open') ) {
                $(this).next('.table-action_dropdown').removeClass('d-none');
            }
            else {
                $(this).next('.table-action_dropdown').addClass('d-none');
            }
        });

        // New Course View Action
        var availableClassList = [];
        var selectedCourseEnrollment = {};
        $('#student-course_table').on('click', '.view-button', function(){
            const rowID = $(this).data('row_id');
            const courseEnrollmentData = <?= json_encode($entry['courseEnrollments']) ?>;
            const selectedData = courseEnrollmentData.find(value => value.id == rowID );
            console.log( selectedData );
            availableClassList = selectedData.package.course.available_classes;
            selectedCourseEnrollment = selectedData;

            // this is for withdrawal
            userID = selectedData.user_id
            selectedCoursePackage = selectedData.package
            selectedCourseEnrollmentID = selectedData.id;

            $('#enrolled-course-view_modal #course-detail_code').text(selectedData.package.course.course_abbreviation);
            $('#enrolled-course-view_modal #course-detail_level').text(selectedData.package.course.level.name);
            $('#enrolled-course-view_modal #course-detail_venue').text(selectedData.package.course.venue.name);
            if( selectedData.package.course.coaches.length > 0 ) {
                $('#enrolled-course-view_modal #course-detail_coach').empty();
                let coachContent = '';
                selectedData.package.course.coaches.forEach(coach => {
                    coachContent += `<p>${coach.name}</p>`;
                });
                $('#enrolled-course-view_modal #course-detail_coach').append(coachContent);
            } else {
                $('#enrolled-course-view_modal #course-detail_coach').text('-');
            }
            
            $('#enrolled-course-view_modal #course-detail_date').text(selectedData.filteredStudentClasses.length > 0 ? selectedData.filteredStudentClasses[0]['class']['start_date'] : '-')
            $('#enrolled-course-view_modal #course-detail_time').text(selectedData.filteredStudentClasses.length > 0 ? (selectedData.filteredStudentClasses[0]['class']['start_time'] + " - " + selectedData.filteredStudentClasses[0]['class']['end_time']) : '-')
            $('#enrolled-course-view_modal #course-detail_category').text(selectedData.package.course.course_type.name);

            // Render attendances
            if( selectedData.filteredStudentClasses.length > 0 ) {
                $('#enrolled-course_table tbody').empty();
                let tableAttendanceContents = '';
                selectedData.filteredStudentClasses.forEach(attendance => {
                    tableAttendanceContents += `<tr>
                                        <td class="text-left">${attendance.class.start_date}</td>
                                        <td class="text-left">${attendance.class.start_time + " - " + attendance.class.end_time}</td>
                                        <td class="text-left">${attendance.attendance ? attendance.attendance.status_label : 'In Progress'}</td>
                                        <td class="text-left">${attendance.attendance ? (attendance.attendance.remarks ?? '-') : '-'}</td>
                                        <td class="text-left" style="width: 5px;">
                                            <div style="position: relative;">
                                                <span class="table-action_btn cursor-pointer p-2">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </span>
                                                <div class="table-action_dropdown d-none">
                                                    <div class="w-100 table-action_content">
                                                        <div class="table-action_content_item d-flex align-items-center gap-2 p-2 m-2 cursor-pointer absent-btn" data-class_id="${attendance.class.id}" data-student_class_id="${attendance.id}" data-package_id="${attendance.package_id} data-user_id="${attendance.student_id}" data-attendance_id="${attendance.attendance ? attendance.attendance.id : ''}">
                                                            <span><i class="fa-regular fa-clipboard"></i></span>
                                                            <span>Absent</span>
                                                        </div>
                                                        <div class="table-action_content_item d-flex align-items-center gap-2 p-2 m-2 cursor-pointer makeup-swap_btn" data-class_id="${attendance.class.id}" data-student_class_id="${attendance.id}" data-package_id="${attendance.package_id}">
                                                            <span><i class="fa-regular fa-clipboard"></i></span>
                                                            <span>Makeup / Swap</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>`;
                });
                $('#enrolled-course_table tbody').append(tableAttendanceContents);
            }
            
        });

        $('#enrolled-course_table').on('click', '.makeup-swap_btn', function(){
            $('#enrolled-course-view_modal #cancel_btn').click();
            $('#makeup-swap_modal').modal('show');

            let classID = $(this).data('class_id');
            selectedStudentClassID = $(this).data('student_class_id');
            selectedClassPackageID = $(this).data('package_id');

            let selectedClass = selectedCourseEnrollment.filteredStudentClasses.find(value => value.id == selectedStudentClassID);

            $('#makeup-swap_modal .detail-column-heading').text(selectedClass.class.course_class_code);

            let userDetails = <?= json_encode($entry); ?>;
            userID = userDetails.id;

            $('#class-detail_container table tbody tr').removeAttr('style');
            $(this).closest('tr').attr('style', 'background: #e7e7e7;');

            // show the makeup/swap container
            $('#makeup-detail_container').removeClass('d-none');
            $('.arrangement-container').removeClass('d-none');

            $('#makeup-detail_container select[name=class_id]').empty();
            let availableClassOptions = '';
            availableClassOptions += `<option value="" hidden>Select Available Class</option>`;
            availableClassList.forEach(element => {
                availableClassOptions += `<option value="${element.id}">${element.course_class_code + " (" + element.start_date + " " + element.start_time + " - " + element.end_time + " )"}</option>`;
            });

            if( availableClassList.length <= 0 )
                availableClassOptions = `<option value="" hidden>No Available Class</option>`;

            $('#makeup-detail_container select[name=class_id]').append(availableClassOptions);
            $('#makeup-swap_modal #makeup-detail_container [name=makeup_reason]').val('');
        });

        $('#makeup-swap_modal').on('click', '#cancel_btn', function(){
            $('#enrolled-course-view_modal').modal('show');
        });

        var userID = '';
        var attendanceID = '';
        var classID = '';
        $('#enrolled-course_table').on('click', '.leave-btn', function(){
            $('#enrolled-course-view_modal #cancel_btn').click();
            $('#leave_modal').modal('show');

            classID = $(this).data('class_id');
            selectedStudentClassID = $(this).data('student_class_id');
            selectedClassPackageID = $(this).data('package_id');
            userID = $(this).data('user_id');
            attendanceID = $(this).data('attendance_id');

            let selectedClass = selectedCourseEnrollment.filteredStudentClasses.find(value => value.id == selectedStudentClassID);

            $('#leave_modal .detail-column-heading').text(selectedClass.class.course_class_code);
        });

        $('#leave_modal').on('click', '#cancel_btn', function(){
            $('#enrolled-course-view_modal').modal('show');
        });

        $('#leave_modal').on('click', '#submit_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

            let formData = {
                user_id: userID,
                class_id: classID,
                student_class_id: selectedStudentClassID,
                student_attendance_id: attendanceID,
                remarks: $('#leave_modal [name=remarks]').val(),
            };

            await axios.post(`${getApiUrl()}/student/attendance/leave`, formData, {
					headers: {
						'Authorization': 'Bearer ' + userToken,
					}
				}).then(res => {
					if ( res.data.success ) {
                        $('#leave_modal #cancel_btn').click();

						toastTopEnd("Success", res.data.message, "success");

						window.location = window.location
					} else {
						toastTopEnd("Cant' process request", res.data.message, "warning");

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

        $('#enrolled-course_table').on('click', '.absent-btn', function(){
            $('#enrolled-course-view_modal #cancel_btn').click();
            $('#absent_modal').modal('show');

            let classID = $(this).data('class_id');
            selectedStudentClassID = $(this).data('student_class_id');
            selectedClassPackageID = $(this).data('package_id');

            let selectedClass = selectedCourseEnrollment.filteredStudentClasses.find(value => value.id == selectedStudentClassID);

            $('#absent_modal .detail-column-heading').text(selectedClass.class.course_class_code);
        });

        $('#absent_modal').on('click', '#cancel_btn', function(){
            $('#enrolled-course-view_modal').modal('show');
        });

        $('#absent_modal').on('click', '#submit_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

            let formData = {
                user_id: userID,
                class_id: classID,
                student_class_id: selectedStudentClassID,
                student_attendance_id: attendanceID,
                remarks: $('#absent_modal [name=remarks]').val(),
            };

            await axios.post(`${getApiUrl()}/student/attendance/absent`, formData, {
					headers: {
						'Authorization': 'Bearer ' + userToken,
					}
				}).then(res => {
					if ( res.data.success ) {
                        $('#absent_modal #cancel_btn').click();

						toastTopEnd("Success", res.data.message, "success");

						window.location = window.location
					} else {
						toastTopEnd("Cant' process request", res.data.message, "warning");

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

        $('#enrolled-course-view_modal').on('click', '.dropdown-item', function(e){
            e.preventDefault();

            const value = $(this).data('value');

            if( value == 'withdraw' ) {
                // const rows = $('#enrolled-course_table .single-check');
                // let selectedRows = [];

                // rows.each(function(){
                //     if( $(this).is(':checked') )
                //         selectedRows.push($(this).data('id'))
                // });

                // if( selectedRows.length <= 0 ) {
                //     toastTopEnd("Warning", "Please selected atleast one entry", "warning");
                //     return;
                // }

                $('#enrolled-course-view_modal #cancel_btn').click();
                $('#course-withdrawal_modal').modal('show');
                
                $('#course-withdrawal_modal .modal-body_message span').text(selectedCourseEnrollment.package.course.course_abbreviation);
            }
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
                    else if ( item.name == 'phone' ) {
                        if (! isValidPhoneNumber( item.value ) )
                            errors.push({
                                field_name: item.name,
                                message: formatString(item.name) + " must be a valid phone number."
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
                const hasParentFields = ['dob'];

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

        function resetModalForm() {
            // check back the radio button to makeup_swap
            $('input[value="change_course"]').prop('checked', false);
            $('input[value="makeup_swap"]').click();

            $('.arrangement-container').addClass('d-none');
            $('#makeup-detail_container').addClass('d-none');
            $('#change-course_container').addClass('d-none');

            // clear form field
            $('#makeup-detail_container select[name=class_id]').val('');
            $('#makeup-detail_container input[name=attachment]').val('');
            $('#makeup-detail_container [name=makeup_reason]').val('');

            $('#makeup-detail_container [name=reason]').val('');
        }
    });
</script>