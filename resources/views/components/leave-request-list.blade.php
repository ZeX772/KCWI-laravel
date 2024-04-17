<div class="row pl-3">
    <!-- Table List -->
    <div class="col-9 page-content-col">
        <div class="tab-content p-3 pt-4">
            <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
            <div class="table-responsive table-custom with-custom-search mt-4">
                <table class="table table-hover w-100" id="leave-request-table">
                    <thead>
                        <tr>
                            <th class="text-left"><input type="checkbox"></th>
                            <th class="text-left">#</th>
                            <th class="text-left">ENTRIES DATE & TIME</th>
                            <th class="text-left">REASON FOR LEAVING</th>
                            <th class="text-left">NAME</th>
                            <th class="text-left">PHONE</th>
                            <th class="text-left">STATUS</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coachLeaves as $coachLeave)
                            <tr data-id="{{ $coachLeave['id'] }}">
                                <td><input type="checkbox"></td>
                                <td>{{ $coachLeave['id'] }}</td>
                                <td><p>{{ formatDate($coachLeave['created_at']) }} <br><small>{{ formatTime($coachLeave['created_at']) }}</small></p></td>
                                <td>{{ $coachLeave['reason_for_leave'] }}</td>
                                <td>{{ optional($coachLeave['user'])['name'] ?? '-' }}</td>
                                <td>{{ optional($coachLeave['user']['coach_details'])['phone'] }}</td>
                                <td class="status-color_{{ $coachLeave['status'] }}">{{ $coachLeave['status_label'] }}</td>
                                <td>
                                    <div>
                                        <button type="button" class="view-button" id="view-btn" data-row_id="{{ $coachLeave['id'] }}" data-bs-toggle="modal" data-bs-target="#leave-request-record-modal">
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
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="leave-request-record-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Leave request</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div class="leave-request-details">
                    <div id="accordion-without-dropdown_container">
                        <div>
                            <h2>Coach Details</h2>
                            <div class="detail_body">
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Name</dd>
                                    <dd class="col-sm-9" id="coach-detail_name">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">ID</dd>
                                    <dd class="col-sm-9" id="coach-detail_id">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Phone</dd>
                                    <dd class="col-sm-9" id="coach-detail_phone">-</dd>
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
                                    <dd class="col-sm-9" id="leave-request-detail_id">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Leave Start Date</dd>
                                    <dd class="col-sm-9" id="leave-request-detail_start_date">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Leave End Date</dd>
                                    <dd class="col-sm-9" id="leave-request-detail_end_date">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Status</dd>
                                    <dd class="col-sm-9" id="leave-request-detail_status">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Entries Date & Time</dd>
                                    <dd class="col-sm-9" id="leave-request-detail_created_at">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Reason for Leaving</dd>
                                    <dd class="col-sm-9" id="leave-request-detail_reason">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Attachment</dd>
                                    <dd class="col-sm-9" id="leave-request-detail_attachment"></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <form id="modal-form">
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
                <div class="submit-btn_container">
                    <x-primary-button type="button" color="primary" id="process-submit" title="Submit" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" tabindex="-1" id="deduction-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Confirm whether to deduct from salary?</h4>
                <div class="d-flex align-items-center gap-2">
                    <span class="small-icon_btn p-2 cursor-pointer cancel_btn"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div class="modal-body p-4 pt-0">
                <form id="modal-form">
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Deduction Amount" 
                            type="number" 
                            name="deduction_amount"
                            id="deduction_amount"
                            isRequired=true
                        />
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel_btn" class="cancel_btn" title="No" customStyle="cancel_btn"/>
                <x-primary-button type="button" id="yes-btn" title="Yes" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" tabindex="-1" id="leave-request-notification-modal" data-bs-backdrop="static" data-bs-keyboard="false">
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
                            value="Leave Request"
                        />
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="file" />
                        </div>
                        <div class="form-inline w-100">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Content <span class="text-danger">*</span></label>
                                <textarea id="leave-request-notification-content" name="content" tabindex="2" class="form-control" placeholder="Enter content..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Leave Request has been approved.</textarea>
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
                            value="leave"
                        >
                            <option value="" hidden>Select Category</option>
                            <option value="competition">Competition</option>
                            <option value="coach-absent">Coach Absent</option>
                            <option value="student-absent">Student Absent</option>
                            <option value="class-cancel">Class Cancel</option>
                            <option value="class-migration">Class Migration</option>
                            <option value="emergency">Emergency</option>
                            <option value="enrollment">Enrollment</option>
                            <option value="leave" selected>Leave</option>
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
                            <h5 style="font-size: 20px; font-weight: 500; color: #3B3B3B;" class="preview-title">Leave Request</h5>
                        </div>
                    </div>
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="file" />
                        </div>
                        <div class="form-inline w-100">
                            <p class="preview-content">
                                Leave Request has been approved.
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
                <x-secondary-button type="button" id="cancel-btn" class="cancel_btn" title="Cancel" dismiss="modal" customStyle="cancel_btn"/>
                <x-primary-button type="button" id="process-notification" title="Send Notification" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<style>
    /* #leave-request-table_wrapper .row:nth-child(2) {
        min-height: calc(100vh - 50vh) !important;
        max-height: calc(100vh - 50vh) !important;
    }

    .main-page_normal_card_info {
        min-height: calc(100vh - 32vh) !important;
        max-height: calc(100vh - 32vh) !important;
    } */

    .leave-request-tab .card {
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
        var courseEnrollmentTable = $('.leave-request-tab table').DataTable({
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
        $('.leave-request-tab').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            courseEnrollmentTable.search(searchTerm).draw();
        });

        var selectedData = {};

        tinymce.init({
            selector: '#leave-request-notification-content',
            height: 300,
            auto_focus: '#tinymce'
            // other configuration options...
        });

        $('.leave-request-tab #leave-request-table tbody').on('click', 'tr', function() {
			const dataID = $(this).data('id');
            
 			const data = <?= json_encode($coachLeaves) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            $('.leave-request-tab #info-status').empty(); 
            $('.leave-request-tab #info-status').append(`<span class="status-color_${rowData.status}">${rowData.status_label}</span>`);
            $('.leave-request-tab #info-id').text( rowData.id );
            $('.leave-request-tab #info-created_at').text( rowData.created_at );
            $('.leave-request-tab #info-reason').text( rowData.reason_for_leave );
            $('.leave-request-tab #info-name').text( rowData.user.name );
            $('.leave-request-tab #info-phone').text( rowData.user.coach_details.phone );

            $('.leave-request-tab #detail-modified_by').text( rowData.log ? rowData.log.user.name : '-' );
            $('.leave-request-tab #detail-updated_at').text( rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});

        $('.leave-request-tab #leave-request-table').on('click', '.view-button', function() {
            const rowID = $(this).data('row_id');
            const leaveRequestData = <?= json_encode($coachLeaves) ?>;
            const leaveRequest = leaveRequestData.find(value => value.id == rowID);

            selectedData = leaveRequest;

            // STUDENT DETAILS
            $('.leave-request-tab #coach-detail_name').text(leaveRequest.user.name);
            $('.leave-request-tab #coach-detail_id').text(leaveRequest.user.id);
            $('.leave-request-tab #coach-detail_phone').text(leaveRequest.user.coach_details.phone);
            
            // OTHER DETAILS
            $('.leave-request-tab #leave-request-detail_id').text(leaveRequest.id);
            $('.leave-request-tab #leave-request-detail_start_date').text(leaveRequest.start_date);
            $('.leave-request-tab #leave-request-detail_end_date').text(leaveRequest.end_date);

            $('.leave-request-tab #leave-request-detail_status').empty();
            $('.leave-request-tab #leave-request-detail_status').append(`<span class="status-color_${leaveRequest.status}">${leaveRequest.status_label}</span>`);
            $('.leave-request-tab #leave-request-detail_created_at').text(leaveRequest.created_at);
            $('.leave-request-tab #leave-request-detail_reason').text(leaveRequest.reason_for_leave);
            const image = leaveRequest.attachment
                ? `<img src="${leaveRequest.image_path}" class="attachment-img">`
                : '-'
            $('.leave-request-tab #leave-request-detail_attachment').empty();
            $('.leave-request-tab #leave-request-detail_attachment').append(image);

            $('.leave-request-tab [name=remarks]').val(leaveRequest.remarks);
        });

        $('#leave-request-record-modal').on('click', '#process-submit', async function(){
            // Prepare Data
			const formData = $('#leave-request-record-modal #modal-form').serializeArray();

            let requiredFields = ['remarks'];

            if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

            // display the deduction form
            $('#leave-request-record-modal #cancel-btn').click();
            $('#deduction-modal').modal('show');

        });

        $('#deduction-modal').on('click', '#yes-btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

            const deductionFormData = $('#deduction-modal #modal-form').serializeArray();

            let requiredFields = ['deduction_amount'];

            if( processErrorValidation(deductionFormData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

            // Prepare Data
			const formData = $('#leave-request-record-modal #modal-form').serializeArray();

            let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            const formStatus = $('#leave-request-record-modal #modal-form input[name=status]').val();
            
            transformedData['id'] = selectedData.id;
            transformedData['status'] = formStatus;

            const deductionAmount = $('#deduction-modal input[name=deduction_amount]').val();

            transformedData['deduction_amount'] = deductionAmount;

            // $(this).removeAttr('disabled');
            // console.log(transformedData);
            // console.log(selectedData);
            // return;
            await axios.post(`${getApiUrl()}/request/coach-leave-response`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#deduction-modal').modal('hide');

                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        $('#leave-request-notification-modal input[name=title]').val("Leave Request");
                        $('#leave-request-notification-modal [name="leave-request-notification-content"]').val("Leave Request has been approved.");
                        $('#leave-request-notification-modal').modal('show');
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

        $('#deduction-modal').on('click', '.cancel_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

            // Prepare Data
			const formData = $('#leave-request-record-modal #modal-form').serializeArray();

            let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            const formStatus = $('#leave-request-record-modal #modal-form input[name=status]').val();
            
            transformedData['id'] = selectedData.id;
            transformedData['status'] = formStatus;
            transformedData['deduction_amount'] = "";

            // $(this).removeAttr('disabled');
            // console.log(transformedData);
            // console.log(selectedData);
            // return;
            await axios.post(`${getApiUrl()}/request/coach-leave-response`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#deduction-modal').modal('hide');

                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        $('#leave-request-notification-modal').modal('show');
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");

                        $(this).removeAttr('disabled');
                    }
                })
                .catch(error => {
                    $(this).removeAttr('disabled');
                    $('#deduction-modal').modal('hide');
                    
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

        $('#leave-request-notification-modal').on('click', '.edit_form_btn', function(){
            // show the form
            $('#leave-request-notification-modal #modal-form').removeClass('d-none');
            $('#leave-request-notification-modal #preview-form').addClass('d-none');
            
            // show the preview button
            $('#leave-request-notification-modal .edit_form_btn').addClass('d-none');
            $('#leave-request-notification-modal .preview_form_btn').removeClass('d-none');
        });

        $('#leave-request-notification-modal').on('click', '.preview_form_btn', function(){
            // show the form
            $('#leave-request-notification-modal #modal-form').addClass('d-none');
            $('#leave-request-notification-modal #preview-form').removeClass('d-none');
            
            // show the preview button
            $('#leave-request-notification-modal .edit_form_btn').removeClass('d-none');
            $('#leave-request-notification-modal .preview_form_btn').addClass('d-none');

            // Update the preview form
            const formData = $('#leave-request-notification-modal #modal-form').serializeArray();

            formData.forEach(function(data){
                if(data.name == 'title')
                    $('#leave-request-notification-modal .preview-title').text(data.value)

                if(data.name == 'content') {
                    var content = tinymce.get('leave-request-notification-content').getContent();
                    $('#leave-request-notification-modal .preview-content').empty();
                    $('#leave-request-notification-modal .preview-content').append(content)
                }
                    

                if(data.name == "category")
                    $('#leave-request-notification-modal .preview-category').text(data.value)
            })

            // For Scheduled Date
            const isSendEmediate = $('#leave-request-notification-modal input[name=send_immediate]').is(':checked');
            const scheduledDate = $('#leave-request-notification-modal input[name=datetime_to_send]').val();
            if( isSendEmediate )
                $('#leave-request-notification-modal .preview-send_content').text("Immediately");
            else
                $('#leave-request-notification-modal .preview-send_content').text(scheduledDate);

            // For what is selected
            const isSendViaEmail = $('#leave-request-notification-modal input[name=send_via_email]').is(':checked');
            const isSendViaApp = $('#leave-request-notification-modal input[name=send_via_app]').is(':checked');

            $('#leave-request-notification-modal .preview-send_via').text(`Send via: ${isSendViaEmail ? 'Email' : ''} ${isSendViaEmail && isSendViaApp ? ',' : ''} ${isSendViaApp ? 'App' : ''}`)
        });

        // NOTIFICATION
        // Get the current date and time
        const now = new Date();
        const formattedDate = now.toISOString().slice(0, 16); // Format: "YYYY-MM-DDTHH:mm"
        $('#leave-request-notification-modal input[name=datetime_to_send]').val(formattedDate);

        $('#leave-request-notification-modal input[name=send_via_email]').on('change', function(){
            $('input[name=send_via_app]').prop('checked', false);
        });

        $('#leave-request-notification-modal input[name=send_via_app]').on('change', function(){
            $('input[name=send_via_email]').prop('checked', false);
        });
        
        $('#leave-request-notification-modal').on('click', '#process-notification', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

            var content = tinymce.get('leave-request-notification-content').getContent();
            $('#leave-request-notification-content').val(content);
            
			// Prepare Data
			const formData = $('#leave-request-notification-modal #modal-form').serializeArray();

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
            if ( $('#leave-request-notification-modal input[name=send_via_email]').is(':checked') )
                sendVia = "email";

            if( $('#leave-request-notification-modal input[name=send_via_app]').is(':checked') )
                sendVia = "app";

            let sendImmediate = 0;
            if( $('#leave-request-notification-modal input[name=send_immediate]').is(':checked') )
                sendImmediate = 1;

            transformedData['coach_leave_id'] = selectedData.id;
            transformedData['send_via'] = sendVia;
            transformedData['send_immediate'] = sendImmediate;

            // API Request to save level
            await axios.post(`${getApiUrl()}/coach-leave-notification/add`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        $('#leave-request-notification-modal .cancel_btn').click();

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

        $('#leave-request-notification-modal').on('click', '.cancel_btn', function(){
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
                const hasParentFields = ['class_date', 'start_date'];

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