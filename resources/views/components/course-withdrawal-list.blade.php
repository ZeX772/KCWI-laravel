<div class="row pl-3">
    <!-- Table List -->
    <div class="col-9 page-content-col">
        <div class="tab-content p-3 pt-4">
            <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
            <div class="table-responsive table-custom with-custom-search mt-4">
                <table class="table table-hover w-100" id="course-withdrawal-table">
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
                        @foreach($courseWithdrawals as $courseWithdrawal)
                        <tr data-id="{{ $courseWithdrawal['id'] }}">
                            <td><input type="checkbox"></td>
                            <td>{{ $courseWithdrawal['id'] }}</td>
                            <td>
                                <p>{{ formatDate($courseWithdrawal['created_at']) }} <br><small>{{ formatTime($courseWithdrawal['created_at']) }}</small></p>
                            </td>
                            <td>{{ $courseWithdrawal['reason'] }}</td>
                            <td>{{ optional($courseWithdrawal['user'])['name'] ?? '-' }}</td>
                            <td>{{ optional($courseWithdrawal['user']['student_information'])['phone'] }}</td>
                            <td class="status-color_{{ $courseWithdrawal['status'] }}">{{ $courseWithdrawal['status_label'] }}</td>
                            <td>
                                <div>
                                    <button type="button" class="view-button" id="view-btn" data-row_id="{{ $courseWithdrawal['id'] }}" data-bs-toggle="modal" data-bs-target="#course-withdrawal-record-modal">
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
                        <h1 id="detail-updated_at" class="card-detail_sub_title">For the Reservation, please check the payment in “Accounting”.</h1>
                    </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="course-withdrawal-record-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Course Withdrawal Request</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div class="make-up-class-details">
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
                                        <dd class="col-sm-9" id="course-withdrawal-enrollment_type">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Course Code</dd>
                                        <dd class="col-sm-9" id="course-withdrawal-course_code">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Level</dd>
                                        <dd class="col-sm-9" id="course-withdrawal-level">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Venue</dd>
                                        <dd class="col-sm-9" id="course-withdrawal-venue">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Facility</dd>
                                        <dd class="col-sm-9" id="course-withdrawal-facility">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Date & Time</dd>
                                        <dd class="col-sm-9" id="course-withdrawal-date-time">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Coach</dd>
                                        <dd class="col-sm-9" id="course-withdrawal-coach">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Course Category</dd>
                                        <dd class="col-sm-9" id="course-withdrawal-category">-</dd>
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
                                    <dd class="col-sm-9" id="course-withdrawal-detail_id">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Status</dd>
                                    <dd class="col-sm-9" id="course-withdrawal-detail_status">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Entries Date & Time</dd>
                                    <dd class="col-sm-9" id="course-withdrawal-detail_created_at">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Reason for Cancelling</dd>
                                    <dd class="col-sm-9" id="course-withdrawal-detail_reason">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Attachment</dd>
                                    <dd class="col-sm-9" id="course-withdrawal-detail_attachment"></dd>
                                </dl>
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
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <div class="cancel-btn_container">
                    <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal" />
                </div>

                <div class="submit-btn_container">
                    <x-primary-button type="button" color="primary" id="next-btn" title="Next" toggle="" target="" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Refund Payment Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="refund-payment-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Refund Payment</h4>
                <span class="small-icon_btn p-2 cursor-pointer cancel-btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div class="refund-payment-details">
                    <div id="accordion-without-dropdown_container">
                        <div>
                            <h2>INFORMATION</h2>
                            <div class="detail_body">
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Invoice No.</dd>
                                    <dd class="col-sm-9" id="information-detail_invoice">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Name</dd>
                                    <dd class="col-sm-9" id="information-detail_name">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Student ID</dd>
                                    <dd class="col-sm-9" id="information-detail_student_id">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Course Code</dd>
                                    <dd class="col-sm-9" id="information-detail_course_code">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Date</dd>
                                    <dd class="col-sm-9" id="information-detail_date">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Total Fee</dd>
                                    <dd class="col-sm-9" id="information-detail_total_fee">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Actual Paid</dd>
                                    <dd class="col-sm-9" id="information-detail_actual_paid">-</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div id="accordion-without-dropdown_container">
                        <div>
                            <h2>WITHDRAW</h2>
                            <div class="detail_body">
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Classes</dd>
                                    <dd class="col-sm-9" id="withdraw-detail_classes">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Date & Time</dd>
                                    <dd class="col-sm-9" id="withdraw-detail_date-time">-</dd>
                                </dl>
                                <form id="modal-form">
                                    <div class="container form-input-container mb-3">
                                        <label class="form-label" style="color: #636363;font-size: 14px;">Do you need to refund the payment?</label>
                                        <div class="row radio-group">
                                            <div class='col-4'>
                                                <label for="yes">
                                                    <input type="radio" name="status" value="yes" id="yes" checked>
                                                    <span>Yes</span>
                                                </label>
                                            </div>
                                            <div class='col-4'>
                                                <label for="no">
                                                    <input type="radio" name="status" value="no" id="no">
                                                    <span>No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                        <x-form-input label="Refund Amout (RM)" type="text" name="refund_amount" id="refund_amount" isRequired=false placeholder="0.00" />
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
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <div class="cancel-btn_container">
                    <x-secondary-button type="button" id="cancel-btn" title="Back" dismiss="" />
                </div>

                <div class="submit-btn_container">
                    <x-primary-button type="button" color="primary" id="process-submit" title="Refund & Send Notification " toggle="" target="" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Notification Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="course-withdrawal-notification-modal" data-bs-backdrop="static" data-bs-keyboard="false">
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
                        <x-form-input label="Title" type="text" name="title" id="title" isRequired=true tabindex="1" value="Enrollment Record" />
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="file" />
                        </div>
                        <div class="form-inline w-100">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Content <span class="text-danger">*</span></label>
                                <textarea id="course-withdrawal-notification-content" name="content" tabindex="2" class="form-control" placeholder="Enter content..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Enroll Course successful. We have reserved your seat. Please settle the payment of $1860.

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
                        <x-form-select label="Category" name="category" id="category" isRequired="true" tabindex="5" value="enrollment">
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
                            <h5 style="font-size: 20px; font-weight: 500; color: #3B3B3B;" class="preview-title">Enrollment Record</h5>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="file" />
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-content">
                                Enroll Course successful. We have reserved your seat. Please settle the payment of $1860.<br /><br />
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
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal" customStyle="cancel_btn" />
                <x-primary-button type="button" id="process-notification" title="Send Notification" toggle="" target="" />
            </div>
        </div>
    </div>
</div>

<style>
    /* #course-withdrawal-table_wrapper .row:nth-child(2) {
        min-height: calc(100vh - 50vh) !important;
        max-height: calc(100vh - 50vh) !important;
    }

    .main-page_normal_card_info {
        min-height: calc(100vh - 32vh) !important;
        max-height: calc(100vh - 32vh) !important;
    } */

    .course-withdrawal-tab .card {
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

    #class-detail_container .accordion-body {
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

    #form-container .radio-group label,
    #modal-form .radio-group label {
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
        var courseEnrollmentTable = $('.course-withdrawal-tab table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "columnDefs": [{
                targets: [0, 3, 5, 7],
                orderable: false
            }]
        });

        // Event listener for custom search input
        $('.course-withdrawal-tab').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            courseEnrollmentTable.search(searchTerm).draw();
        });

        var selectedData = {};
        var formStatus = "approved";

        tinymce.init({
            selector: '#course-withdrawal-notification-content',
            height: 300,
            auto_focus: '#tinymce'
            // other configuration options...
        });

        $('.course-withdrawal-tab #course-withdrawal-table tbody').on('click', 'tr', function() {
            const dataID = $(this).data('id');

            const data = <?= json_encode($courseWithdrawals) ?>;
            const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            $('.course-withdrawal-tab #info-status').empty();
            $('.course-withdrawal-tab #info-status').append(`<span class="status-color_${rowData.status}">${rowData.status_label}</span>`);
            $('.course-withdrawal-tab #info-id').text(rowData.id);
            $('.course-withdrawal-tab #info-created_at').text(rowData.created_at);
            $('.course-withdrawal-tab #info-reason').text(rowData.reason);
            $('.course-withdrawal-tab #info-name').text(rowData.user.name);
            $('.course-withdrawal-tab #info-phone').text(rowData.user.student_information.phone);

            $('.course-withdrawal-tab #detail-modified_by').text(rowData.log ? rowData.log.user.name : '-');
            $('.course-withdrawal-tab #detail-updated_at').text(rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-');
        });

        $('.course-withdrawal-tab #course-withdrawal-table').on('click', '.view-button', function() {
            const rowID = $(this).data('row_id');
            const courseWithdrawalData = <?= json_encode($courseWithdrawals) ?>;
            const courseWithdrawal = courseWithdrawalData.find(value => value.id == rowID);

            selectedData = courseWithdrawal;

            // COURSE DETAILS
            $('.course-withdrawal-tab #course-withdrawal-enrollment_type').text(courseWithdrawal.enrollment.type_label ?? '-');
            $('.course-withdrawal-tab #course-withdrawal-course_code').text(courseWithdrawal.package.course.course_abbreviation);
            $('.course-withdrawal-tab #course-withdrawal-level').text(courseWithdrawal.package.course.level.name);
            $('.course-withdrawal-tab #course-withdrawal-venue').text(courseWithdrawal.package.course.venue_data.name);
            $('.course-withdrawal-tab #course-withdrawal-facility').text(courseWithdrawal.package.course.facility.name);

            let courseCLassess = '';
            courseWithdrawal.enrollment.all_filtered_student_classes.forEach(function(value) {
                const startTimeStr = value.class.start_time;
                const startTimeObj = new Date(`2000-01-01 ${startTimeStr}`);

                const endTimeStr = value.class.end_time;
                const endTimeObj = new Date(`2000-01-01 ${endTimeStr}`);

                courseCLassess += `<p>${moment(value.class.start_date).format("MM/DD/YYYY") + " " + moment(startTimeObj).format("h:mm A") + " - " + moment(endTimeObj).format("h:mm A")}</p>`;
            });
            $('.course-withdrawal-tab #course-withdrawal-date-time').empty();
            $('.course-withdrawal-tab #course-withdrawal-date-time').append(courseCLassess);

            let courseCoaches = '';
            courseWithdrawal.package.course.coaches.forEach(function(value) {
                courseCoaches += `<p>${value.name}</p>`;
            });
            $('.course-withdrawal-tab #course-withdrawal-coach').empty();
            $('.course-withdrawal-tab #course-withdrawal-coach').append(courseCoaches);
            $('.course-withdrawal-tab #course-withdrawal-category').text(courseWithdrawal.package.course.course_type.name ?? '-');

            // STUDENT DETAILS
            $('.course-withdrawal-tab #student-detail_name').text(courseWithdrawal.user.name);
            $('.course-withdrawal-tab #student-detail_student_id').text(courseWithdrawal.user.student_information.student_id);
            $('.course-withdrawal-tab #student-detail_phone').text(courseWithdrawal.user.student_information.phone);

            // OTHER DETAILS
            $('.course-withdrawal-tab #course-withdrawal-detail_id').text(courseWithdrawal.id);
            $('.course-withdrawal-tab #course-withdrawal-detail_status').empty();
            $('.course-withdrawal-tab #course-withdrawal-detail_status').append(`<span class="status-color_${courseWithdrawal.status}">${courseWithdrawal.status_label}</span>`);
            $('.course-withdrawal-tab #course-withdrawal-detail_created_at').text(courseWithdrawal.created_at);
            $('.course-withdrawal-tab #course-withdrawal-detail_reason').text(courseWithdrawal.reason);
            const image = courseWithdrawal.attachment ?
                `<img src="${courseWithdrawal.image_path}" class="attachment-img">` :
                '-'
            $('.course-withdrawal-tab #course-withdrawal-detail_attachment').empty();
            $('.course-withdrawal-tab #course-withdrawal-detail_attachment').append(image);
        });

        $('#course-withdrawal-record-modal #form-container').on('click', 'input[name=status]', function() {
            formStatus = $(this).val();
        });

        // NOTIFICATION
        $('#course-withdrawal-notification-modal').on('click', '.edit_form_btn', function() {
            // show the form
            $('#course-withdrawal-notification-modal #modal-form').removeClass('d-none');
            $('#course-withdrawal-notification-modal #preview-form').addClass('d-none');

            // show the preview button
            $('#course-withdrawal-notification-modal .edit_form_btn').addClass('d-none');
            $('#course-withdrawal-notification-modal .preview_form_btn').removeClass('d-none');
        });

        $('#course-withdrawal-notification-modal').on('click', '.preview_form_btn', function() {
            // show the form
            $('#course-withdrawal-notification-modal #modal-form').addClass('d-none');
            $('#course-withdrawal-notification-modal #preview-form').removeClass('d-none');

            // show the preview button
            $('#course-withdrawal-notification-modal .edit_form_btn').removeClass('d-none');
            $('#course-withdrawal-notification-modal .preview_form_btn').addClass('d-none');

            // Update the preview form
            const formData = $('#course-withdrawal-notification-modal #modal-form').serializeArray();

            formData.forEach(function(data) {
                if (data.name == 'title')
                    $('#course-withdrawal-notification-modal .preview-title').text(data.value)

                if (data.name == 'content') {
                    var content = tinymce.get('course-withdrawal-notification-content').getContent();
                    $('#course-withdrawal-notification-modal .preview-content').empty();
                    $('#course-withdrawal-notification-modal .preview-content').append(content)
                }


                if (data.name == "category")
                    $('#course-withdrawal-notification-modal .preview-category').text(data.value)
            })

            // For Scheduled Date
            const isSendEmediate = $('#course-withdrawal-notification-modal input[name=send_immediate]').is(':checked');
            const scheduledDate = $('#course-withdrawal-notification-modal input[name=datetime_to_send]').val();
            if (isSendEmediate)
                $('#course-withdrawal-notification-modal .preview-send_content').text("Immediately");
            else
                $('#course-withdrawal-notification-modal .preview-send_content').text(scheduledDate);

            // For what is selected
            const isSendViaEmail = $('#course-withdrawal-notification-modal input[name=send_via_email]').is(':checked');
            const isSendViaApp = $('#course-withdrawal-notification-modal input[name=send_via_app]').is(':checked');

            $('#course-withdrawal-notification-modal .preview-send_via').text(`Send via: ${isSendViaEmail ? 'Email' : ''} ${isSendViaEmail && isSendViaApp ? ',' : ''} ${isSendViaApp ? 'App' : ''}`)
        });

        // Get the current date and time
        const now = new Date();
        const formattedDate = now.toISOString().slice(0, 16); // Format: "YYYY-MM-DDTHH:mm"
        $('#course-withdrawal-notification-modal input[name=datetime_to_send]').val(formattedDate);

        $('#course-withdrawal-notification-modal input[name=send_via_email]').on('change', function() {
            $('input[name=send_via_app]').prop('checked', false);
        });

        $('#course-withdrawal-notification-modal input[name=send_via_app]').on('change', function() {
            $('input[name=send_via_email]').prop('checked', false);
        });

        $('#course-withdrawal-notification-modal').on('click', '#process-notification', async function() {
            $(this).attr('disabled', 'true');

            // get user token
            const userToken = getUserToken();

            var content = tinymce.get('course-withdrawal-notification-content').getContent();
            $('#course-withdrawal-notification-content').val(content);

            // Prepare Data
            const formData = $('#course-withdrawal-notification-modal #modal-form').serializeArray();

            const requiredFields = [
                'title', 'content', 'datetime_to_send',
                'category'
            ];

            if (processErrorValidation(formData, requiredFields)) {
                $(this).removeAttr('disabled');

                return;
            }

            let transformedData = {};
            let excludeFromFormData = ['send_via_email', 'send_via_app'];
            formData.forEach(function(item) {
                if (!excludeFromFormData.includes(item.name))
                    transformedData[item.name] = item.value;
            });

            let sendVia = "email";
            if ($('#course-withdrawal-notification-modal input[name=send_via_email]').is(':checked'))
                sendVia = "email";

            if ($('#course-withdrawal-notification-modal input[name=send_via_app]').is(':checked'))
                sendVia = "app";

            let sendImmediate = 0;
            if ($('#course-withdrawal-notification-modal input[name=send_immediate]').is(':checked'))
                sendImmediate = 1;

            transformedData['course_withdrawal_id'] = selectedData.id;
            transformedData['send_via'] = sendVia;
            transformedData['send_immediate'] = sendImmediate;

            // API Request to save level
            await axios.post(`${getApiUrl()}/request/course-withdrawal-notification`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    if (res.data.success) {
                        $('#course-withdrawal-notification-modal .cancel_btn').click();

                        toastTopEnd("Success", res.data.message, "success");

                        window.location = window.location
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");

                        $(this).removeAttr('disabled');
                    }
                })
                .catch(error => {
                    $(this).removeAttr('disabled');

                    if (error.response.status == 400 || error.response.status == 422) {
                        let errorMessages = "";
                        Object.keys(error.response.data.errors).forEach(key => {
                            error.response.data.errors[key].forEach(value => {
                                errorMessages += (`<p>${key}: ` + value + '</p><br>')

                                toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                            });
                        });
                    }

                    if (error.response.status == 404) {
                        toastTopEnd("Cant' Process", error.response.data.message, "warning");
                    }

                    if (error.response.status == 500) {
                        toastTopEnd("System Error", error.response.data.message, "error");
                    }

                    if (error.response.status == 401) {
                        alert("Your session expired!");
                        window.location = window.location;
                    }

                    console.error('Error fetching data:', error.response.data);
                });
        });

        $('#course-withdrawal-notification-modal').on('click', '.cancel_btn', function() {
            window.location = window.location
        });

        // Withdrawal Form Modal
        $('#course-withdrawal-record-modal').on('click', '#next-btn', async function() {
            // check if status is approved or rejected
            // if rejected then proceed on updating the status then show directly the notification
            if (formStatus == 'rejected') {
                $(this).attr('disabled', 'true');

                // get user token
                const userToken = getUserToken();

                // Prepare Data
                const formData = $('#refund-payment-modal #modal-form').serializeArray();

                let status = '';

                let transformedData = {};

                transformedData['id'] = selectedData.id;
                transformedData['status'] = formStatus;
                transformedData['remarks'] = 'Your request has been rejected.';

                await axios.post(`${getApiUrl()}/request/course-withdrawal-response`, transformedData, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + userToken
                        }
                    }).then(res => {
                        $('#course-withdrawal-record-modal #cancel-btn').click();

                        if (res.data.success) {
                            toastTopEnd("Success", res.data.message, "success");

                            $('#course-withdrawal-notification-modal').modal('show');
                        } else {
                            toastInfo("Cant' Save", res.data.message, "warning");

                            $(this).removeAttr('disabled');
                        }
                    })
                    .catch(error => {
                        $(this).removeAttr('disabled');

                        if (error.response.status == 400 || error.response.status == 422) {
                            let errorMessages = "";
                            Object.keys(error.response.data.errors).forEach(key => {
                                error.response.data.errors[key].forEach(value => {
                                    errorMessages += (`<p>${key}: ` + value + '</p><br>')

                                    toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                                });
                            });
                        }

                        if (error.response.status == 404) {
                            toastTopEnd("Cant' Process", error.response.data.message, "warning");
                        }

                        if (error.response.status == 500) {
                            toastTopEnd("System Error", error.response.data.message, "error");
                        }

                        if (error.response.status == 401) {
                            alert("Your session expired!");
                            window.location = window.location;
                        }

                        console.error('Error fetching data:', error);
                    });
            }

            if (formStatus == 'approved') {
                $('#course-withdrawal-record-modal #cancel-btn').click();
                $('#refund-payment-modal').modal('show');

                $('#information-detail_invoice').text(selectedData.enrollment.invoice ?? '-');
                $('#information-detail_name').text(selectedData.user.name);
                $('#information-detail_student_id').text(selectedData.user.student_information.student_id);
                $('#information-detail_course_code').text(selectedData.package.course.course_abbreviation);
                $('#information-detail_date').text(selectedData.created_at);
                $('#information-detail_total_fee').text(selectedData.package.course.course_full_price);
                $('#information-detail_actual_paid').text('-'); // there's no data, since payment feature not yet done

                let courseCLassess = "";
                selectedData.enrollment.all_filtered_student_classes.forEach(function(value) {
                    courseCLassess += `<p>${value.class.course_class_code}</p>`;
                });
                $('#withdraw-detail_classes').empty();
                $('#withdraw-detail_classes').append(courseCLassess);

                let courseClassesDateTime = '';
                selectedData.enrollment.all_filtered_student_classes.forEach(function(value) {
                    const startTimeStr = value.class.start_time;
                    const startTimeObj = new Date(`2000-01-01 ${startTimeStr}`);

                    const endTimeStr = value.class.end_time;
                    const endTimeObj = new Date(`2000-01-01 ${endTimeStr}`);

                    courseClassesDateTime += `<p>${moment(value.class.start_date).format("MM/DD/YYYY") + " " + moment(startTimeObj).format("h:mm A") + " - " + moment(endTimeObj).format("h:mm A")}</p>`;
                });
                $('#withdraw-detail_date-time').empty();
                $('#withdraw-detail_date-time').append(courseClassesDateTime);
            }
        });

        $('#refund-payment-modal').on('click', '#cancel-btn', function() {
            $('#course-withdrawal-record-modal').modal('show');
            $('#refund-payment-modal .cancel-btn').click();
        });

        $('#refund-payment-modal').on('click', '#process-submit', async function() {
            $(this).attr('disabled', 'true');

            // get user token
            const userToken = getUserToken();

            // Prepare Data
            const formData = $('#refund-payment-modal #modal-form').serializeArray();

            let status = '';

            let transformedData = {};

            formData.forEach(function(item) {
                transformedData[item.name] = item.value;

                if (item.name == 'status') {
                    status = item.value
                }
            });

            // available classes
            let requiredFields = ['remarks', 'refund_amount'];

            // start new class
            if (status == "no") {
                requiredFields = [];
            }

            if (processErrorValidation(formData, requiredFields)) {
                $(this).removeAttr('disabled');

                return;
            }

            transformedData['id'] = selectedData.id;

            const refundStatus = $('#refund-payment-modal input[name=status]').val();
            transformedData['refund_payment'] = refundStatus;

            const formStatus = $('#course-withdrawal-record-modal #form-container input[name=status]').val();

            transformedData['status'] = formStatus;

            // $(this).removeAttr('disabled');
            // console.log(transformedData);
            // console.log(selectedData);
            // return;
            await axios.post(`${getApiUrl()}/request/course-withdrawal-response`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#refund-payment-modal .cancel-btn').click();

                    if (res.data.success) {
                        toastTopEnd("Success", res.data.message, "success");

                        $('#course-withdrawal-notification-modal').modal('show');
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");

                        $(this).removeAttr('disabled');
                    }
                })
                .catch(error => {
                    $(this).removeAttr('disabled');

                    if (error.response.status == 400 || error.response.status == 422) {
                        let errorMessages = "";
                        Object.keys(error.response.data.errors).forEach(key => {
                            error.response.data.errors[key].forEach(value => {
                                errorMessages += (`<p>${key}: ` + value + '</p><br>')

                                toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                            });
                        });
                    }

                    if (error.response.status == 404) {
                        toastTopEnd("Cant' Process", error.response.data.message, "warning");
                    }

                    if (error.response.status == 500) {
                        toastTopEnd("System Error", error.response.data.message, "error");
                    }

                    if (error.response.status == 401) {
                        alert("Your session expired!");
                        window.location = window.location;
                    }

                    console.error('Error fetching data:', error);
                });

        });

        // Error Validations
        function processErrorValidation(formData, requiredFields) {
            errors = [];

            formData.forEach(function(item) {
                if (requiredFields.includes(item.name)) {
                    if (item.value == "") {
                        errors.push({
                            field_name: item.name,
                            message: formatString(item.name) + " is required."
                        });
                    }
                }
            });

            if (errors.length > 0) {
                renderErrors();

                return true;
            }

            return false;
        }

        function renderErrors() {
            if (errors.length > 0) {
                const hasParentFields = ['class_date', 'start_date'];

                errors.forEach((element) => {
                    const fieldSelector = $(`[name="${element.field_name}"]`);
                    // Clear the errors first
                    fieldSelector.removeClass('border border-danger');
                    fieldSelector.parent().removeClass('border border-danger');

                    if (fieldSelector.next().is('p'))
                        fieldSelector.next().remove();

                    if (fieldSelector.parent().next().is('p'))
                        fieldSelector.parent().next().remove();

                    if (!hasParentFields.includes(element.field_name)) {
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