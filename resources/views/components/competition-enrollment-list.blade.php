<div class="row pl-3">
    <!-- Table List -->
    <div class="col-9 page-content-col">
        <div class="tab-content p-3 pt-4">
            <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
            <div class="table-responsive table-custom with-custom-search mt-4">
                <table class="table table-hover w-100" id="competition-enrollment-table">
                    <thead>
                        <tr>
                            <th class="text-left"><input type="checkbox"></th>
                            <th class="text-left">#</th>
                            <th class="text-left">ENTRIES DATE & TIME</th>
                            <th class="text-left">NAME</th>
                            <th class="text-left">INVOICE NO.</th>
                            <th class="text-left">PHONE</th>
                            <th class="text-left">STATUS</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($competitionEnrollements as $competition_enrollement)
                        <tr data-id="{{ $competition_enrollement['id'] }}">
                            <td><input type="checkbox"></td>
                            <td>{{ $competition_enrollement['id'] }}</td>
                            <td>{{ formatDate($competition_enrollement['created_at']) }}</td>
                            <td>{{ optional($competition_enrollement['user'])['name'] }}</td>
                            <td>{{ $competition_enrollement['invoice'] ?? '-' }}</td>
                            <td>{{ optional($competition_enrollement['user']['student_information'])['phone'] }}</td>
                            <td class="status-color_{{ $competition_enrollement['status'] }}">{{ $competition_enrollement['status_label'] }}</td>
                            <td>
                                <div>
                                    <button type="button" class="view-button" id="view-btn" data-row_id="{{ $competition_enrollement['id'] }}" data-bs-toggle="modal" data-bs-target="#competition-enrollment-record-modal">
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
                                        <h1 class="card-detail_title">Entries Form</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-entries_form" class="card-detail_sub_title">-</h1>
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
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="competition-enrollment-record-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Enrollment Records</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div>
                    <div class="accordion" id="competition-detail_container">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Competition Details
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body pl-0 pr-0">
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Competition Code</dd>
                                        <dd class="col-sm-9" id="competition-detail_code">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Competition Category</dd>
                                        <dd class="col-sm-9" id="competition-detail_category">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Venue</dd>
                                        <dd class="col-sm-9" id="competition-detail_venue">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Facility</dd>
                                        <dd class="col-sm-9" id="competition-detail_facility">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Competition Size</dd>
                                        <dd class="col-sm-9" id="competition-detail_competition_size">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Assigned Line</dd>
                                        <dd class="col-sm-9" id="competition-detail_assign_line">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Group Number</dd>
                                        <dd class="col-sm-9" id="competition-detail_group_number">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Date</dd>
                                        <dd class="col-sm-9" id="competition-detail_date">-</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Time</dd>
                                        <dd class="col-sm-9" id="competition-detail_time">-</dd>
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
                            <h2>Payment</h2>
                            <div class="detail_body">
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Enrollment Price</dd>
                                    <dd class="col-sm-9" id="competition-detail_enrollment_price">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Status</dd>
                                    <dd class="col-sm-9" id="competition-payment_status">Pending</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Payment Method</dd>
                                    <dd class="col-sm-9" id="competition-payment_method">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Date of Payment</dd>
                                    <dd class="col-sm-9" id="competition-payment_date">-</dd>
                                </dl>
                                <!-- <dl class="row mb-2">
                                    <dd class="col-sm-3">Attachment</dd>
                                    <dd class="col-sm-9" id="competition-payment_attachment">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Remarks</dd>
                                    <dd class="col-sm-9" id="competition-payment_remarks">-</dd>
                                </dl> -->
                            </div>
                        </div>
                    </div>
                    <div id="accordion-without-dropdown_container">
                        <div>
                            <h2>Others</h2>
                            <div class="detail_body">
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">#</dd>
                                    <dd class="col-sm-9" id="competition-enrollment-detail_id">00000010</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Status</dd>
                                    <dd class="col-sm-9" id="competition-enrollment-detail_status">Processing</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Entries Date & Time</dd>
                                    <dd class="col-sm-9" id="competition-enrollment-detail_created_at">12/4/2022 11:00</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Entries Form</dd>
                                    <dd class="col-sm-9" id="competition-enrollment-detail_entry_type">Website</dd>
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
                                        <input type="radio" name="status" value="reservation" id="approved" checked>
                                    </label>
                                </div>
                                <div class='col-4'>
                                    <label for="reject">
                                        <span>Reject</span>
                                        <input type="radio" name="status" value="rejected" id="reject">
                                    </label>
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
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal" />
                <x-primary-button type="button" color="primary" id="process-submit" title="Submit" toggle="" target="" />
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" tabindex="-1" id="competition-enrollment-notification-modal" data-bs-backdrop="static" data-bs-keyboard="false">
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
                                <textarea id="competition-notification-content" name="content" tabindex="2" class="form-control" placeholder="Enter content..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Enroll Course successful. We have reserved your seat. Please settle the payment of $1860.

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
    /* #competition-enrollment-table_wrapper .row:nth-child(2) {
        min-height: calc(100vh - 50vh) !important;
        max-height: calc(100vh - 50vh) !important;
    }

    .main-page_normal_card_info {
        min-height: calc(100vh - 32vh) !important;
        max-height: calc(100vh - 32vh) !important;
    } */

    .competition-enrollment-tab .card {
        border: none;
        border-radius: 0;
        border-left: 1px solid #e8e8e8 !important;
    }

    #competition-detail_container .accordion-item {
        display: contents;
    }

    #competition-detail_container .accordion-button {
        border-radius: 0;
        background-color: transparent;
        padding-left: 0;
        padding-right: 0;
        padding-bottom: 10px;
        color: #4A5C7A;
        font-size: 20px;
        font-weight: 500;
    }

    #competition-detail_container .accordion-button::after {
        background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='currentColor'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>");
    }

    #competition-detail_container .accordion-body {
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
        var courseEnrollmentTable = $('.competition-enrollment-tab table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "columnDefs": [{
                targets: [0, 5, 7],
                orderable: false
            }]
        });

        // Event listener for custom search input
        $('.competition-enrollment-tab').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            courseEnrollmentTable.search(searchTerm).draw();
        });

        var selectedData = {};
        var competitionGroupID = "";
        var selectedStudents = []

        tinymce.init({
            selector: '#competition-notification-content',
            height: 300,
            auto_focus: '#tinymce'
            // other configuration options...
        });

        $('.competition-enrollment-tab #competition-enrollment-table tbody').on('click', 'tr', function() {
            const dataID = $(this).data('id');

            const data = <?= json_encode($competitionEnrollements) ?>;
            const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            $('.competition-enrollment-tab #info-status').empty();
            $('.competition-enrollment-tab #info-status').append(`<span class="status-color_${rowData.status}">${rowData.status_label}</span>`);
            $('.competition-enrollment-tab #info-id').text(rowData.id);
            $('.competition-enrollment-tab #info-created_at').text(rowData.created_at);
            $('.competition-enrollment-tab #info-entries_form').text(rowData.entries_form ?? 'Website');
            $('.competition-enrollment-tab #info-name').text(rowData.user.name);
            $('.competition-enrollment-tab #info-phone').text(rowData.user.student_information.phone);

            $('.competition-enrollment-tab #detail-modified_by').text(rowData.log ? rowData.log.user.name : '-');
            $('.competition-enrollment-tab #detail-updated_at').text(rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-');
        });

        $('.competition-enrollment-tab #competition-enrollment-table').on('click', '.view-button', function() {
            const rowID = $(this).data('row_id');
            const competitionEnrollments = <?= json_encode($competitionEnrollements) ?>;
            const competitionEnrollment = competitionEnrollments.find(value => value.id == rowID);

            selectedData = competitionEnrollment;

            competitionGroupID = competitionEnrollment.user.competition_participant.competition_group.id;

            selectedStudents = [{
                student_id: competitionEnrollment.user.id
            }];

            // COMPETITION DETAILS
            $('.competition-enrollment-tab #competition-detail_code').text(competitionEnrollment.competition.competition_code);
            $('.competition-enrollment-tab #competition-detail_category').text(competitionEnrollment.competition_category.category.name);
            $('.competition-enrollment-tab #competition-detail_venue').text(competitionEnrollment.competition.school_venue.name);
            $('.competition-enrollment-tab #competition-detail_facility').text(competitionEnrollment.competition.school_venue_facility.name);
            $('.competition-enrollment-tab #competition-detail_competition_size').text(competitionEnrollment.competition.competition_size);

            $('.competition-enrollment-tab #competition-detail_assign_line').text(competitionEnrollment.user.competition_participant.competition_group.assign_line);
            $('.competition-enrollment-tab #competition-detail_group_number').text(competitionEnrollment.user.competition_participant.competition_group.group_number);
            $('.competition-enrollment-tab #competition-detail_date').text(competitionEnrollment.user.competition_participant.competition_group.date);
            $('.competition-enrollment-tab #competition-detail_time').text(competitionEnrollment.competition.start_time + " - " + competitionEnrollment.competition.end_time);


            // STUDENT DETAILS
            $('.competition-enrollment-tab #student-detail_name').text(competitionEnrollment.user.name);
            $('.competition-enrollment-tab #student-detail_student_id').text(competitionEnrollment.user.student_information.student_id);
            $('.competition-enrollment-tab #student-detail_phone').text(competitionEnrollment.user.student_information.phone);

            // PAYMENT DETAILS
            $('.competition-enrollment-tab #competition-detail_enrollment_price').text(competitionEnrollment.competition.enrollment_price);
            console.log(competitionEnrollment)
            if( competitionEnrollment.payment ){
                $('.competition-enrollment-tab #competition-payment_status').text(ucfirst(competitionEnrollment.payment.status));
                $('.competition-enrollment-tab #competition-payment_method').text(competitionEnrollment.payment.payment_type == 'token' ? 'Card' : competitionEnrollment.payment.payment_type);
                $('.competition-enrollment-tab #competition-payment_date').text(moment(competitionEnrollment.payment.created_at).format('MM/DD/YYYY'));
            }

            // OTHER DETAILS
            $('.competition-enrollment-tab #competition-enrollment-detail_id').text(competitionEnrollment.invoice ?? '-');
            $('.competition-enrollment-tab #competition-enrollment-detail_status').empty();
            $('.competition-enrollment-tab #competition-enrollment-detail_status').append(`<span class="status-color_${competitionEnrollment.status}">${competitionEnrollment.status_label}</span>`);
            $('.competition-enrollment-tab #competition-enrollment-detail_created_at').text(moment(competitionEnrollment.created_at).format('MM/DD/YYYY'));
            $('.competition-enrollment-tab #competition-enrollment-detail_entry_type').text(competitionEnrollment.entries_form ?? 'Website');

            $('.competition-enrollment-tab #competition-enrollment-record-modal [name=remarks]').val(competitionEnrollment.remarks);

        })

        $('.competition-enrollment-tab #competition-enrollment-record-modal').on('click', '#process-submit', async function() {
            $(this).attr('disabled', 'true');

            // get user token
            const userToken = getUserToken();

            // Prepare Data
            const formData = $('#competition-enrollment-record-modal #form-container').serializeArray();

            const requiredFields = ['remarks'];

            if (processErrorValidation(formData, requiredFields)) {
                $(this).removeAttr('disabled');
                
                return;
            }

            let transformedData = {};

            formData.forEach(function(item) {
                transformedData[item.name] = item.value;
            });

            transformedData['id'] = selectedData.id;
            // $(this).removeAttr('disabled');
            // console.log(transformedData);
            // return;
            await axios.post(`${getApiUrl()}/request/competition-enrollment-response`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    if (res.data.success) {
                        $('#competition-enrollment-record-modal #cancel-btn').click();

                        toastTopEnd("Success", res.data.message, "success");

                        $('#competition-enrollment-notification-modal').modal('show');
                    } else {
                        $('#competition-enrollment-record-modal #cancel-btn').click();

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

        $('#competition-enrollment-notification-modal').on('click', '.cancel-btn', function() {
            window.location = window.location
        });

        $('#competition-enrollment-notification-modal').on('click', '#cancel-btn', function() {
            window.location = window.location
        });

        $('#competition-enrollment-notification-modal').on('click', '.edit_form_btn', function() {
            // show the form
            $('#competition-enrollment-notification-modal #modal-form').removeClass('d-none');
            $('#competition-enrollment-notification-modal #preview-form').addClass('d-none');

            // show the preview button
            $('#competition-enrollment-notification-modal .edit_form_btn').addClass('d-none');
            $('#competition-enrollment-notification-modal .preview_form_btn').removeClass('d-none');
        });

        $('#competition-enrollment-notification-modal').on('click', '.preview_form_btn', function() {
            // show the form
            $('#competition-enrollment-notification-modal #modal-form').addClass('d-none');
            $('#competition-enrollment-notification-modal #preview-form').removeClass('d-none');

            // show the preview button
            $('#competition-enrollment-notification-modal .edit_form_btn').removeClass('d-none');
            $('#competition-enrollment-notification-modal .preview_form_btn').addClass('d-none');

            // Update the preview form
            const formData = $('#competition-enrollment-notification-modal #modal-form').serializeArray();

            formData.forEach(function(data) {
                if (data.name == 'title')
                    $('#competition-enrollment-notification-modal .preview-title').text(data.value)

                if (data.name == 'content') {
                    var content = tinymce.get('competition-notification-content').getContent();
                    $('#competition-enrollment-notification-modal .preview-content').empty();
                    $('#competition-enrollment-notification-modal .preview-content').append(content)
                }


                if (data.name == "category")
                    $('#competition-enrollment-notification-modal .preview-category').text(data.value)
            })

            // For Scheduled Date
            const isSendEmediate = $('#competition-enrollment-notification-modal input[name=send_immediate]').is(':checked');
            const scheduledDate = $('#competition-enrollment-notification-modal input[name=datetime_to_send]').val();
            if (isSendEmediate)
                $('#competition-enrollment-notification-modal .preview-send_content').text("Immediately");
            else
                $('#competition-enrollment-notification-modal .preview-send_content').text(scheduledDate);

            // For what is selected
            const isSendViaEmail = $('#competition-enrollment-notification-modal input[name=send_via_email]').is(':checked');
            const isSendViaApp = $('#competition-enrollment-notification-modal input[name=send_via_app]').is(':checked');

            $('#competition-enrollment-notification-modal .preview-send_via').text(`Send via: ${isSendViaEmail ? 'Email' : ''} ${isSendViaEmail && isSendViaApp ? ',' : ''} ${isSendViaApp ? 'App' : ''}`)
        });

        // NOTIFICATION
        // Get the current date and time
        const now = new Date();
        const formattedDate = now.toISOString().slice(0, 16); // Format: "YYYY-MM-DDTHH:mm"
        $('#competition-enrollment-notification-modal input[name=datetime_to_send]').val(formattedDate);

        $('#competition-enrollment-notification-modal input[name=send_via_email]').on('change', function() {
            $('input[name=send_via_app]').prop('checked', false);
        });

        $('#competition-enrollment-notification-modal input[name=send_via_app]').on('change', function() {
            $('input[name=send_via_email]').prop('checked', false);
        });

        $('#competition-enrollment-notification-modal').on('click', '#process-notification', async function() {
            $(this).attr('disabled', 'true');

            // get user token
            const userToken = getUserToken();

            var content = tinymce.get('competition-notification-content').getContent();
            $('#competition-notification-content').val(content);

            // Prepare Data
            const formData = $('#competition-enrollment-notification-modal #modal-form').serializeArray();

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

            transformedData['competition_group_id'] = competitionGroupID;

            let sendVia = "email";
            if ($('#competition-enrollment-notification-modal input[name=send_via_email]').is(':checked'))
                sendVia = "email";

            if ($('#competition-enrollment-notification-modal input[name=send_via_app]').is(':checked'))
                sendVia = "app";

            let sendImmediate = 0;
            if ($('#competition-enrollment-notification-modal input[name=send_immediate]').is(':checked'))
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
                    if (res.data.success) {
                        $('#competition-enrollment-notification-modal .cancel_btn').click();

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
                const hasParentFields = ['start_date'];

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