@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <div class="row g-0 d-xxl-flex justify-content-between mb-4">
 		<div class="col-auto">
 			<h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;">Student - {{ $entry['name'] }}</h1>
 		</div>
 		<div class="col-auto">
		 	<x-secondary-button 
                type="button" 
                id="notification-btn" 
                title="Notification" 
                toggle="modal" 
                target="#student-view-notification-modal"
                withIcon="true"
                icon="plus"
            />
			<x-primary-button 
                type="button" 
                id="enrollment-btn" 
                title="Enrollment" 
                toggle="modal" 
                target="#enrollment-modal"
                withIcon="true"
                icon="plus"
            />
		</div>
 	</div>
    <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4" role="tablist">
        <li class="nav-item" role="presentation" style="border-left-style: none;">
            <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">BASIC INFORMATION</a>
        </li>
        <li class="nav-item" role="presentation" style="border-left-style: none;">
            <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2">COURSE</a>
        </li>

        <li class="nav-item" role="presentation" style="border-left-style: none;">
            <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-3">COACH COMMENT</a>
        </li>

        <li class="nav-item accounting-tab_btn" role="presentation" style="border-left-style: none;">
            <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-4">ACCOUNTING</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="tab-1" class="tab-pane active basic-info_tab" role="tabpanel">
            <x-student-basic-info :entry="$entry"/>
        </div>
        <div id="tab-2" class="tab-pane course_tab" role="tabpanel">
            <x-student-courses :entry="$entry"/>
        </div>
        <div id="tab-3" class="tab-pane coach-comments_tab" role="tabpanel">
            <x-student-coach-comments :coachComments="$coachComments"/>
        </div>
        <div id="tab-4" class="tab-pane accounting_tab" role="tabpanel">
            <x-student-accounting :studentAccounts="$studentAccounts" :school="$school"/>
        </div>
    </div>
</div>

<!-- Enrollment Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="enrollment-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Enrollment</h4>
                    <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div id="course-modal_header" class="d-none">
                <div class="col d-xxl-flex justify-content-between align-items-start" style="padding: 1rem 1.5rem 0 1.5rem !important; border-bottom: 1px solid #E8E8E8;">
                    <h4 class="modal-title main-form-title pb-3" style="font-size: 14px; font-weight: 600; color: #4A5C7A; border-bottom: 3px solid #4A5C7A;">COURSE</h4>
                </div>
            </div>
            <div id="main-form" class="modal-body p-4 pt-0">
                <div id="student-detail_container">
                    <label class="detail-column-heading"><u>Student Details</u></label>
                    <table class="table modal-table">
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">GENDER</th>
                                <th scope="col">LEVEL</th>
                                <th scope="col">DATE OF BIRTH (AGE)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                            </tr>
                            <tr>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="course-details_container">
                    <label class="detail-column-heading mb-2"><u>Course Details</u></label>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Course"
                            name="course"
                            id="course"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Course</option>
                            @foreach($course_packages as $course_package)
                                <option value="{{ $course_package->id }}">{{ $course_package->course ? $course_package->course['course_abbreviation'] : '-' }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Type of Course"
                            name="type_of_course"
                            id="type_of_course"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Type of Course</option>
                            <option value="full_term">Full Term</option>
                            <option value="flexible_course">Flexible Course</option>
                        </x-form-select>
                    </div>
                    <x-primary-button type="button" id="select-course" title="Select Course" toggle="" target=""/>
                    <table class="table modal-table mt-3">
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col">CLASS</th>
                                <th scope="col">DATE</th>
                                <th scope="col">TIME</th>
                                <th scope="col">VENUE</th>
                                <th scope="col">FACILITY</th>
                                <th scope="col">PAX</th>
                                <th scope="col">PRICE</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8" class="text-center">No Selected Course/Class</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="remarks-detail_container" class=" mb-3">
                    <div class="form-inline">
                        <div class="form-group">
                            <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                            <textarea rows="2" name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                        </div>
                    </div>
                </div>
                <div id="modal-actions_container" class="d-flex gap-4">
                    <x-primary-button type="button" id="pay-now_btn" title="Pay Now" toggle="" target=""/>
                    <x-primary-button type="button" id="send-invoice_btn" title="Send Invoice" toggle="" target=""/>
                </div>
            </div>
            <div id="course-form" class="modal-body p-4 pt-0 d-none">
                <h3 class="mt-4" style="font-size: 32px; font-weight: 400;">Course</h3>
                <div class="card">
                    <div class="card-body">
                        <!-- Filters -->
                        <div class="d-flex gap-3 mb-2">
                            <x-search-input
                                inputType="search"
                                inputName="search_filter"
                                inputID=""
                                inputPlaceholder="Search..."
                            />
                            <x-form-select
                                label=""
                                name="level_filter"
                                id="level_filter"
                                isRequired="false"
                                customContainerStyle="width: 20% !important;"
                            >
                                <option value="" hidden>Select Level</option>
                                @foreach($levels as $level)
                                    <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                                @endforeach
                            </x-form-select>
                        </div>
                        <div class="table-responsive table-custom with-custom-search">
                            <table class="table table-hover w-100">
                                <thead>
                                    <tr>
                                        <th class="text-left"><input type="checkbox" class="select-all"></th>
                                        <th class="text-left">COURSE CODE</th>
                                        <th class="text-left">LEVEL</th>
                                        <th class="text-left">VENUE</th>
                                        <th class="text-left">COACH</th>
                                        <th class="text-left">DATE</th>
                                        <th class="text-left">TIME</th>
                                        <th class="text-left">TOTAL FEE (HK$)</th>
                                        <th class="text-left">COURSE CATEGORY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="class-form" class="modal-body p-4 pt-0 d-none">
                <h3 class="mt-4" style="font-size: 32px; font-weight: 400;">Class</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex gap-3 mb-2">
                            <x-search-input
                                inputType="text"
                                inputName="search_filter"
                                inputID=""
                                inputPlaceholder="Search..."
                            />
                            <x-form-select
                                label=""
                                name="level_filter"
                                id="level_filter"
                                isRequired="false"
                                customContainerStyle="width: 20% !important;"
                            >
                                <option value="" hidden>Select Level</option>
                                @foreach($levels as $level)
                                    <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                                @endforeach
                            </x-form-select>
                        </div>
                        <div class="table-responsive table-custom with-custom-search">
                            <table class="table table-hover w-100">
                                <thead>
                                    <tr>
                                        <th class="text-left"><input type="checkbox" class="select-all"></th>
                                        <th class="text-left">CLASS CODE</th>
                                        <th class="text-left">LEVEL</th>
                                        <th class="text-left">VENUE</th>
                                        <th class="text-left">COACH</th>
                                        <th class="text-left">DATE</th>
                                        <th class="text-left">TIME</th>
                                        <th class="text-left">TOTAL FEE (HK$)</th>
                                        <th class="text-left">COURSE CATEGORY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td><input type="checkbox"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between d-none" style="border-top-style: none;">
                <x-secondary-button type="button" id="close-form_btn" title="Close" dismiss=""/>
                <x-primary-button type="button" id="add-form_btn" title="Add" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Notification Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="student-view-notification-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Notification</h4>
                <div class="d-flex align-items-center gap-2">
                    <span class="small-icon_btn p-2 cursor-pointer cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div class="modal-body p-4 pt-0">
                <form id="modal-form">
                    <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                        <div style="width: 25px;" class="pt-1">
                            <x-svg-icon icon="list" />
                        </div>
                        <x-form-select
                            label="Template" 
                            name="notification_template"
                            id="notification_template"
                            isRequired="true"
                            tabindex="5"
                        >
                            <option value="" hidden>Select Template</option>
                            @foreach( $notification_templates as $template )
                                <option value="{{ $template['id'] }}">{{ $template['template_name'] }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
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
                            value=""
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
                                    <input type="checkbox" name="send_immediate" tabindex="4" id="send-immediately" checked>
                                    <label for="send-immediately">Send Immediately</label>
                                </div>
                            </div>
                        </div>
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
                <x-secondary-button type="button" id="cancel-btn" class="cancel_btn" title="Cancel" dismiss="modal" customStyle="cancel_btn"/>
                <x-primary-button type="button" id="process-notification" title="Send Notification" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="payment-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Payment</h4>
                <div class="d-flex align-items-center gap-2">
                    <span class="small-icon_btn p-2 cursor-pointer cancel_btn" data-bs-dismiss="modal" id="cancel_btn"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div class="modal-body p-4 pt-0">
                <form id="modal-form">
                    <div class="mb-3 payment-method_container">
                        <div style="border: 1px solid #e7e7e7; padding: 20px; border-radius: 8px;" class="payment-method_item payment-method_1 mb-3" data-paymentmethod_id="1">
                            <div class="mb-4">
                                <p>Choose payment method:</p>
                                <div class="grid-container">
                                    <label class="grid-item" for="cash-1">
                                        <input type="checkbox" name="payment_method" value="Cash" id="cash-1" data-paymentmethod_id="1" checked>
                                        <span>Cash</span>
                                    </label>
                                    <label class="grid-item" for="cheque-1">
                                        <input type="checkbox" name="payment_method" value="Cheque" id="cheque-1" data-paymentmethod_id="1">
                                        <span>Cheque</span>
                                    </label>
                                    <label class="grid-item" for="bank_transfer-1">
                                        <input type="checkbox" name="payment_method" value="Bank Transfer" id="bank_transfer-1" data-paymentmethod_id="1">
                                        <span>Bank Transfer</span>
                                    </label>
                                    <label class="grid-item" for="fps-1">
                                        <input type="checkbox" name="payment_method" value="FPS" id="fps-1" data-paymentmethod_id="1">
                                        <span>FPS</span>
                                    </label>
                                    <label class="grid-item" for="pay_me-1">
                                        <input type="checkbox" name="payment_method" value="PayMe" id="pay_me-1" data-paymentmethod_id="1">
                                        <span>PayMe</span>
                                    </label>
                                    <label class="grid-item" for="others-1">
                                        <input type="checkbox" name="payment_method" value="Others" id="others-1" data-paymentmethod_id="1">
                                        <span>Others</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <p>Upload Attachment:</p>
                                <div>
                                    <div class="mb-2 uploaded-attachment_container d-none">
                                        <div class="d-flex align-items-center gap-4">
                                            <div style="width: 100px; height: 100px; overflow: hidden; border: 1px solid #e9e8e8; border-radius: 15px;">
                                                <img src="{{ asset('themes/tailwind/images/clipboard-image-5.png') }}" alt="" style="width: 100%; object-fit: cover;">
                                            </div>
                                            <div>
                                                <p class="attachment-file_name">Receipt01.jpg</p>
                                                <p>Uploaded on <span class="attachment-date"></span> at <span class="attachment-time"></span></p>
                                                <p class="attachment-size">1.2 MB</p>
                                            </div>
                                            <div class="d-flex gap-3">
                                                <!-- <span>
                                                    <x-svg-icon icon="download" />
                                                </span> -->
                                                <span class="remove-attachment_btn cursor-pointer" data-paymentmethod_id="1">
                                                    <x-svg-icon icon="trash" />
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="upload-attachment_form">
                                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3" data-paymentmethod_id="1">
                                            <x-form-input 
                                                label="" 
                                                type="file" 
                                                name="attachment"
                                                id="attachment"
                                                isRequired="false"
                                            />
                                        </div>
                                    </div>
                                    <!-- <div class="d-flex align-items-center gap-3 add-attachment_btn cursor-pointer" style="color: #4A5C7A;">
                                        <span>
                                            <x-svg-icon icon="plus" />
                                        </span>
                                        <span>Add</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 close-attachment_btn cursor-pointer d-none" style="color: #EF383F;">
                                        <span>
                                            <x-svg-icon icon="times" />
                                        </span>
                                        <span>Close</span>
                                    </div> -->
                                </div>
                            </div>
                            <div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-input 
                                        label="TOTAL FEE (HK$)" 
                                        type="text" 
                                        name="total_fee"
                                        id="total_fee"
                                        isRequired="true"
                                    />
                                    <x-form-input 
                                        label="PAYMENT DATE" 
                                        type="date" 
                                        name="payment_date"
                                        id="payment_date"
                                        isRequired="true"
                                    />
                                </div>
                                <div class="container" style="padding: 0px;color: #636363">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <label class="form-label" style="color: #636363;font-size: 14px;">Remarks</label>
                                            <textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-3 add-payment_method_btn cursor-pointer" style="color: #4A5C7A;">
                            <span>
                                <x-svg-icon icon="plus" />
                            </span>
                            <span>Add another payment record</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="back-btn" title="Back" customStyle="cancel_btn"/>
                <x-primary-button type="button" id="confirm-btn" title="Confirm" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Online Payment Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="online-payment-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Online Payment</h4>
                <div class="d-flex align-items-center gap-2">
                    <span class="small-icon_btn p-2 cursor-pointer cancel_btn" data-bs-dismiss="modal" id="cancel_btn"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div class="modal-body p-4 pt-0">
                <form id="modal-form">
                    <div class="mb-3 payment-method_container">
                        <div style="border: 1px solid #e7e7e7; padding: 20px; border-radius: 8px;" class="payment-method_item payment-method_1 mb-3" data-paymentmethod_id="1">
                            <div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-input 
                                        label="TOTAL FEE (HK$)" 
                                        type="text" 
                                        name="total_fee"
                                        id="total_fee"
                                        isRequired="true"
                                    />
                                    <x-form-input 
                                        label="Expiry Date (Pay before this date)" 
                                        type="date" 
                                        name="payment_date"
                                        id="payment_date"
                                        isRequired="true"
                                    />
                                </div>
                                <div class="container" style="padding: 0px;color: #636363">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <label class="form-label" style="color: #636363;font-size: 14px;">MESSAGE TO PARENTS / STUDENTS</label>
                                            <textarea name="remarks" class="form-control" placeholder="Payment remind..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="back-btn" title="Back" customStyle="cancel_btn"/>
                <x-primary-button type="button" id="confirm-btn" title="Confirm" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* 3 columns with equal width */
        grid-template-rows: repeat(2, auto); /* 2 rows with auto height */
        gap: 10px; /* Gap between grid items */
    }

    .grid-item {
        padding: 15px;
        border: 1px solid #d1d1d1;
        border-radius: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
</style>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        var coursePackages = [];
        var classes = [];
        var selectedClasses = [];
        var tempSelectedClasses = [];
        var selectedLevelID = '';
        var selectedPackage = '';
        var selectedCourseType = '';

        $('.page-container').on('click', '#enrollment-btn', function(){
            const entry = <?= json_encode($entry) ?>;

            // Fill the Student Detail table
            $('#student-detail_container table tbody').empty();

            const studentDetail = `<tr>
                                <td>${entry.name}</td>
                                <td>${ucfirst(entry.student_information.gender)}</td>
                                <td>${entry.student_information.level ? entry.student_information.level.name : '-'}</td>
                                <td>${entry.student_information.year_age}</td>
                            </tr>`;

            $('#student-detail_container table tbody').append(studentDetail);

            // reset
            resetEnrollmentModal();
            selectedClasses = [];
            tempSelectedClasses = [];
            $('#main-form #course-details_container table tbody').empty();
            $('#main-form #course-details_container table tbody').append('<tr><td colspan="8" class="text-center">No Selected Course/Class</td></tr>');
            $('#main-form #course-details_container select[name=course]').val('');
            $('#main-form #course-details_container select[name=type_of_course]').val('');

            coursePackages = <?= json_encode($course_packages) ?>;
        });

        $('#enrollment-modal').on('click', '#select-course', function(){
            const requiredFields = ['course', 'type_of_course'];
            const selectedCourse = $('select[name=course]').val();

            const typeOfCourseValue = $('select[name=type_of_course]').val();
            const formData = [
                {
                    "name": "type_of_course",
                    "value": typeOfCourseValue,
                },
                {
                    "name": "course",
                    "value": selectedCourse,
                }
            ];

			if( processErrorValidation(formData, requiredFields) )
				return;

            const typeOfCourse = $('#main-form #course-details_container select[name=type_of_course]').val();
            selectedCourseType = typeOfCourse

            if ( typeOfCourse == 'full_term' ) {
                // $('#class-form').addClass('d-none');
                // $('#course-form').removeClass('d-none');

                // // update the width of the modal
                // $('#enrollment-modal .modal-dialog').removeClass('modal-lg');
                // $('#enrollment-modal .modal-dialog').addClass('modal-xl');

                // // show modal footer
                // $('#enrollment-modal .modal-footer').removeClass('d-none');

                // // change the modal header
                // $('#enrollment-modal #course-modal_header').removeClass('d-none');
                // $('#enrollment-modal #main-modal_header').addClass('d-none');

                // renderCoursesToTable();

                const coursePackage = Object.values(coursePackages).find(value => value.id == selectedCourse);
                selectedPackage = coursePackage
                selectedClasses = coursePackage.course.course_classes;
                tempSelectedClasses = selectedClasses.slice();

                renderSelectedData();
            }
                
            if ( typeOfCourse == 'flexible_course' ){
                $('#enrollment-modal #main-form').addClass('d-none');

                $('#enrollment-modal #course-form').addClass('d-none');
                $('#enrollment-modal #class-form').removeClass('d-none');

                // update the width of the modal
                // $('#enrollment-modal .modal-dialog').removeClass('modal-lg');
                // $('#enrollment-modal .modal-dialog').addClass('modal-xl');

                // show modal footer
                $('#enrollment-modal .modal-footer').removeClass('d-none');

                // change the modal header
                $('#enrollment-modal #course-modal_header').removeClass('d-none');
                $('#enrollment-modal #main-modal_header').addClass('d-none');

                const coursePackage = Object.values(coursePackages).find(value => value.id == selectedCourse);
                selectedPackage = coursePackage
                classes = coursePackage.course.course_classes;
                console.log("selectedClasses:: ", selectedClasses)
                renderClassesToTable();
            }
        });

        $('#enrollment-modal').on('click', '#close-form_btn', function(){
            resetEnrollmentModal();
        });

        $('#enrollment-modal').on('click', '#add-form_btn', function(){
            $('#enrollment-modal #main-form').removeClass('d-none');
            $('#enrollment-modal #course-form').addClass('d-none');
            $('#enrollment-modal #class-form').addClass('d-none');
            $('#enrollment-modal .modal-footer').addClass('d-none');
            $('#enrollment-modal #course-modal_header').addClass('d-none');
            $('#enrollment-modal #main-modal_header').removeClass('d-none');
            // $('#enrollment-modal .modal-dialog').addClass('modal-lg');
            // $('#enrollment-modal .modal-dialog').removeClass('modal-xl');

            renderSelectedData();
        });

        $('#course-form').on('change', '.select-all', function(){
            const isChecked = $(this).prop('checked');
            
            if( isChecked )
                $('#course-form .course-checkbox').prop('checked', true);

            else
                $('#course-form .course-checkbox').prop('checked', false);

            $('#course-form .course-checkbox').change();
        });

        $('#class-form').on('change', '.select-all', function(){
            const isChecked = $(this).prop('checked');
            
            if( isChecked )
                $('#class-form .class-checkbox').prop('checked', true);
    
            else
                $('#class-form .class-checkbox').prop('checked', false);

            $('#class-form .class-checkbox').change();
        });

        $('#course-form').on('change', 'select[name=level_filter]', function(){
            const value = $(this).val();
            
            selectedLevelID = value;

            renderCoursesToTable();
        });

        $('#class-form').on('change', 'select[name=level_filter]', function(){
            const value = $(this).val();
            
            selectedLevelID = value;

            renderClassesToTable();
        });

        var formData = {};
        $('#enrollment-modal #main-form').on('click', '#pay-now_btn', async function(){
            const entry = <?= json_encode($entry) ?>;

			// get user token
			const userToken = getUserToken();

            if ( tempSelectedClasses.length <= 0 ) {
                toastTopEnd("Warning!", "Please select classes first", "warning");
                $(this).removeAttr('disabled');
                return;
            }

            formData = {
                user_id: entry.id,
                package_id: selectedPackage.id,
                is_paid: 1,
                type_of_course: selectedCourseType,
                course_classes: tempSelectedClasses,
                transaction_type: "pay-now"
            }

            $('#enrollment-modal #cancel_btn').click();
            $('#payment-modal').modal('show');

            $(this).removeAttr('disabled');
        });

        $('#enrollment-modal #main-form').on('click', '#send-invoice_btn', async function(){
            $(this).prop('disabled', true);

			// get user token
			const userToken = getUserToken();

            const entry = <?= json_encode($entry) ?>;

            if ( tempSelectedClasses.length <= 0 ) {
                toastTopEnd("Warning!", "Please select classes first", "warning");

                $(this).removeAttr('disabled');

                return;
            }

            formData = {
                user_id: entry.id,
                package_id: selectedPackage.id,
                is_paid: 1,
                type_of_course: selectedCourseType,
                course_classes: tempSelectedClasses,
                transaction_type: "send-invoice"
            }
            
            $('#enrollment-modal #cancel_btn').click();
            $('#payment-modal').modal('show');

            $('#payment-modal')

            $(this).removeAttr('disabled');
        });

        function renderCoursesToTable() {
            $('#course-form table').DataTable().destroy();
            $('#course-form table tbody').empty();
           
            let filteredCoursePackages = Object.values(coursePackages).filter(function(value){
                return value.course.course_level == selectedLevelID;
            });

            if ( selectedLevelID == '' )
                filteredCoursePackages = coursePackages;
            
            let coursePackagesData = ``;
            
            filteredCoursePackages.forEach(coursePackage => {
                let coaches = '';

                coursePackage.course.coaches.forEach(coach => {
                    coaches += `<p>${coach.name ?? coach.full_name}</p>`;
                });

                let hasSelected = selectedClasses.find(value => value.course_id == coursePackage.course.id);

                coursePackagesData += `<tr>
                                    <td><input type="checkbox" class="course-checkbox" data-id="${coursePackage.course.id}" ${hasSelected ? 'checked' : ''}></td>
                                    <td>${coursePackage.course.course_abbreviation}</td>
                                    <td>${coursePackage.course.level?.name ?? ''}</td>
                                    <td>${coursePackage.course.venue.name}</td>
                                    <td>${coaches}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>${coursePackage.course.class_full_price}</td>
                                    <td>${coursePackage.course.course_type.name}</td>
                                </tr>`;
            });

            $('#course-form table tbody').append(coursePackagesData);

            const table = $('#course-form table').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "aaSorting": [],
                "orderMulti": true,
            });
        }

        // Event listener for custom search input
        $('#course-form').on('keyup', 'input[name=search_filter]', function() {
            var searchTerm = $(this).val();
            
            table.search(searchTerm).draw();
        });

        $('#course-form').on('change', '.course-checkbox', function(){
            const isChecked = $(this).prop('checked');
            const rowId = $(this).data('id');
            
            if ( isChecked ) {
                // Check if selected is already on the array of data
                const onSelectedClasses = tempSelectedClasses.find(value => value.course_id == rowId);

                // Add to the array of data
                const courseClasses = classes.filter(function(value){
                    return value.course_id == rowId;
                });
                
                if ( courseClasses.length && !onSelectedClasses )
                    tempSelectedClasses.push(...courseClasses);
            } else {
                // remove from the array of data
                const classesByCourse = tempSelectedClasses.filter(function(value) {
                    return value.course_id == rowId;
                });

                classesByCourse.forEach(element => {
                    const selectedCourseIndex = tempSelectedClasses.findIndex(value => value.id == element.id);
                    
                    if ( selectedCourseIndex >= 0 )
                        tempSelectedClasses.splice(selectedCourseIndex, 1);
                });

                $("#course-form .select-all").prop('checked', false);
            }
        });

        function renderClassesToTable() {
            $('#class-form table').DataTable().destroy();
            $('#class-form table tbody').empty();

            let filteredClasses = classes.filter(function(value){
                return value.course.course_level == selectedLevelID;
            });
            
            if ( selectedLevelID == '' )
                filteredClasses = classes;
            
            let classesData = ``;
            
            filteredClasses.forEach(value => {
                let coaches = '';

                value.course.coaches.forEach(coach => {
                    coaches += `<p>${coach.name ?? coach.full_name}</p>`;
                });

                let hasSelected = tempSelectedClasses.find(selectedClass => selectedClass.id == value.id);

                classesData += `<tr>
                                    <td><input type="checkbox" class="class-checkbox" data-id="${value.id}" ${hasSelected ? 'checked' : ''}></td>
                                    <td>${value.course_class_code}</td>
                                    <td>${value.course.level?.name ?? ''}</td>
                                    <td>${value.course.venue.name}</td>
                                    <td>${coaches}</td>
                                    <td>${value.start_date + " - " + value.end_date}</td>
                                    <td>${value.start_time + " - " + value.end_time}</td>
                                    <td>${value.course.class_full_price}</td>
                                    <td>${value.course.course_type.name}</td>
                                </tr>`;
            });

            $('#class-form table tbody').append(classesData);

            const table = $('#class-form table').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "aaSorting": [],
                "orderMulti": true,
            });
        }

        // Event listener for custom search input
        $('#class-form').on('keyup', 'input[name=search_filter]', function() {
            var searchTerm = $(this).val();
            
            table.search(searchTerm).draw();
        });

        $('#class-form').on('change', '.class-checkbox', function(){
            const isChecked = $(this).prop('checked');
            const rowId = $(this).data('id');

            if ( isChecked ) {
                // Add to the array of data
                const selectedClass = classes.find((value) => {
                    return value.id == rowId;
                });
                
                if ( selectedClass )
                    tempSelectedClasses.push(selectedClass);
            } else {
                // remove from the array of data
                const selectedClassIndex = tempSelectedClasses.findIndex(value => value.id == rowId);

                if ( selectedClassIndex >= 0 )
                    tempSelectedClasses.splice(selectedClassIndex, 1);
            }

            console.log(tempSelectedClasses);
        });

        function resetEnrollmentModal() {
            $('#enrollment-modal #main-form').removeClass('d-none');
            $('#enrollment-modal #course-form').addClass('d-none');
            $('#enrollment-modal #class-form').addClass('d-none');
            $('#enrollment-modal .modal-footer').addClass('d-none');
            $('#enrollment-modal #course-modal_header').addClass('d-none');
            $('#enrollment-modal #main-modal_header').removeClass('d-none');
        }

        function renderSelectedData() {
            $('#main-form #course-details_container table tbody').empty();

            let dataElement = '';
            
            tempSelectedClasses.forEach((value, key) => {
                let venueFacilities = '';

                value.course.venue.school_venue_facilities.forEach(value => {
                    venueFacilities += `<p>${value.name}</p>`;
                });

                dataElement += `<tr class="class-data-${value.id}">
                                    <td>${value.course_class_code}</td>
                                    <td>${value.start_date + " - " + value.end_date}</td>
                                    <td>${value.start_time + " - " + value.end_time}</td>
                                    <td>${value.course.venue.name ?? ''}</td>
                                    <td>${venueFacilities ?? ''}</td>
                                    <td>${value.total_enrolled_student + "/" + value.total_seat}</td>
                                    <td>${"$"+value.course.course_full_price}</td>
                                    <td class="d-flex justify-content-end" style="margin: 0 !important;">
                                        <span class="small-icon_btn p-1 cursor-pointer remove-selected_btn" data-id="${value.id}"><x-svg-icon icon="times" /></span>
                                    </td>
                                </tr>`;
            });

            $('#main-form #course-details_container table tbody').append(dataElement);

            
        }

        $('#main-form #course-details_container').on('click', '.remove-selected_btn', function(){
            const ID = $(this).data('id');

            const index = tempSelectedClasses.findIndex(value => value.id == ID);

            tempSelectedClasses.splice(index, 1);

            $(`#main-form #course-details_container table tbody .class-data-${ID}`).remove();

            if( tempSelectedClasses.length <= 0 ) {
                $('#main-form #course-details_container table tbody').append('<tr><td colspan="8" class="text-center">No Selected Course/Class</td></tr>');
            }
        });

        // NOTIFICATION
        const now = new Date();
        const formattedDate = now.toISOString().slice(0, 16); // Format: "YYYY-MM-DDTHH:mm"

        tinymce.init({
            selector: '#notification-content',
            height: 300,
            auto_focus: '#tinymce'
            // other configuration options...
        });

        $('.page-container').on('click', '#notification-btn', function(){
            // Clear the errors first for select
            $('#student-view-notification-modal select').removeClass('border border-danger');
            $('#student-view-notification-modal select').parent().removeClass('border border-danger');

            if ( $('#student-view-notification-modal select').next().is('p') )
                $('#student-view-notification-modal select').next().remove();

            if ( $('#student-view-notification-modal select').parent().next().is('p') )
                $('#student-view-notification-modal select').parent().next().remove();

            // Clear the errors first for input
            $('#student-view-notification-modal input').removeClass('border border-danger');
            $('#student-view-notification-modal input').parent().removeClass('border border-danger');

            if ( $('#student-view-notification-modal input').next('p') )
                $('#student-view-notification-modal input').next('p').remove();

            if ( $('#student-view-notification-modal input').parent().next('p') )
                $('#student-view-notification-modal input').parent().next('p').remove();

            // Clear the errors first for textarea
            $('#student-view-notification-modal textarea').removeClass('border border-danger');
            $('#student-view-notification-modal textarea').parent().removeClass('border border-danger');

            if ( $('#student-view-notification-modal textarea').next().is('p') )
                $('#student-view-notification-modal textarea').next().remove();

            if ( $('#student-view-notification-modal textarea').parent().next().is('p') )
                $('#student-view-notification-modal textarea').parent().next().remove();
        });

        $('#student-view-notification-modal input[name=datetime_to_send]').val(formattedDate);

        $('#student-view-notification-modal input[name=send_via_email]').on('change', function(){
            $('input[name=send_via_app]').prop('checked', false);
        });

        $('#student-view-notification-modal input[name=send_via_app]').on('change', function(){
            $('input[name=send_via_email]').prop('checked', false);
        });

        $('#student-view-notification-modal').on('change', 'select[name=notification_template]', function(){
            const selectedTemplateValue = $(this).val();
            const systemNotificationTemplate = <?= json_encode($notification_templates) ?>;
            const selectedTemplate = systemNotificationTemplate.find(value => value.id == selectedTemplateValue);
            
            var content = tinymce.get('notification-content').setContent(selectedTemplate.content);
            $('#student-view-notification-modal #notification-content').val(content);
            $('#student-view-notification-modal input[name=title]').val(selectedTemplate.title);
        });

        $('#student-view-notification-modal').on('click', '#process-notification', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

            const entry = <?= json_encode($entry) ?>;

            var content = tinymce.get('notification-content').getContent();
            $('#notification-content').val(content);
            
			// Prepare Data
			const formData = $('#student-view-notification-modal #modal-form').serializeArray();

            const requiredFields = [
                'title', 'content', 'datetime_to_send',
                'notification_template'
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
            if ( $('#student-view-notification-modal input[name=send_via_email]').is(':checked') )
                sendVia = "email";

            if( $('#student-view-notification-modal input[name=send_via_app]').is(':checked') )
                sendVia = "app";

            let sendImmediate = 0;
            if( $('#student-view-notification-modal input[name=send_immediate]').is(':checked') )
                sendImmediate = 1;

            transformedData['user_id'] = entry.id;
            transformedData['send_via'] = sendVia;
            transformedData['send_immediate'] = sendImmediate;
            transformedData['template_id'] = $('#student-view-notification-modal select[name=notification_template]').val();
            transformedData['datetime_to_send'] = moment(transformedData['datetime_to_send']).format('YYYY-MM-DD HH:mm:ss');
            
            // API Request to save level
            await axios.post(`${getApiUrl()}/student/notification/send`, transformedData, {
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

        // Payment Modal Events and Functions
        $('#payment-modal #modal-form').on('click', 'input[name=payment_method]', function(){
            const value = $(this).val();
            const paymentmethodID = $(this).data('paymentmethod_id');

            $(`.payment-method_${paymentmethodID} input[name=payment_method]`).prop('checked', false);
            $(`.payment-method_${paymentmethodID} input[value="${value}"]`).prop('checked', true);

            // if( $(this).val() == "PayMe" ) {
            //     $('#online-payment-modal').modal('show');
            //     $('#enrollment-modal #cancel_btn').click();
            // }
        });

        var selectedAttachment = null;
        $('.payment-method_container').on('change', 'input[type=file]', function(){
            const paymentmethodID = $(this).closest('.container').data('paymentmethod_id');
            
            var file = this.files[0];
            if (file) {
                selectedAttachment = file;

                var reader = new FileReader();
                reader.onload = function(event) {
                    $(`.payment-method_${paymentmethodID} .uploaded-attachment_container img`).attr('src', event.target.result);
                };
                reader.readAsDataURL(file);

                var currentDate = new Date();
                var date = currentDate.toLocaleDateString();
                var time = currentDate.toLocaleTimeString();

                $(`.payment-method_${paymentmethodID} .attachment-file_name`).text(file.name);
                $(`.payment-method_${paymentmethodID} .attachment-date`).text(date);
                $(`.payment-method_${paymentmethodID} .attachment-time`).text(time);
                $(`.payment-method_${paymentmethodID} .attachment-size`).text(formatBytes(file.size));
                
                $(`.payment-method_${paymentmethodID} .uploaded-attachment_container`).removeClass('d-none');
                $(`.payment-method_${paymentmethodID} .upload-attachment_form`).addClass('d-none');
            }
        });

        $('.payment-method_container').on('click', '.remove-attachment_btn', function(){
            const paymentmethodID = $(this).data('paymentmethod_id');

            $(`.payment-method_${paymentmethodID} .uploaded-attachment_container`).addClass('d-none');
            $(`.payment-method_${paymentmethodID} .upload-attachment_form`).removeClass('d-none');

            $(`.payment-method_${paymentmethodID} .upload-attachment_form input[type=file]`).val('');
        });

        $('#payment-modal').on('click', '.add-payment_method_btn', function(){
            renderNewPaymentMethod();
        });

        $('.payment-method_container').on('click', '.remove-payment_method_btn', function(){
            const paymentmethodID = $(this).data('paymentmethod_id');

            $(`.payment-method_${paymentmethodID}`).remove();
        });

        $('#payment-modal').on('click', '#confirm-btn', async function(){
            $(this).prop('disabled', true);

            // get user token
			const userToken = getUserToken();
            
            // fetch all data
            const paymentMethods = $('#payment-modal .payment-method_item');

            let paymentMethodFormData = [];
            for (const method of paymentMethods) {
                const paymentmethodID = $(method).data('paymentmethod_id');

                const paymentMethodTypes = $(`.payment-method_${paymentmethodID} input[name=payment_method]`);
                let paymentMethodValue = "";
                
                paymentMethodTypes.each(function(){
                    if ($(this).is(':checked') && !paymentMethodValue) {
                        paymentMethodValue = $(this).val();
                    }
                });
                
                const file = $(method).find('input[name=attachment]')[0].files[0];

                let attachment = null;
                let attachmentType = "";
                if (file) {
                    attachment = await fileToBase64Promise(file);
                    attachmentType = file.name.split('.').pop().toLowerCase();
                }
                
                paymentMethodFormData.push({
                    payment_method: paymentMethodValue,
                    attachment: attachment,
                    attachment_type: attachmentType,
                    total_fee: $(method).find('input[name=total_fee]').val(),
                    payment_date: $(method).find('input[name=payment_date]').val(),
                    remarks: $(method).find('[name=remarks]').val(),
                });

                const formData = [
                    {
                        "name": "total_fee",
                        "value": $(method).find('input[name=total_fee]').val(),
                    },
                    {
                        "name": "payment_date",
                        "value": $(method).find('input[name=payment_date]').val(),
                    }
                ];

                const requiredFields = ['total_fee', 'payment_date'];

                if( processErrorValidation(formData, requiredFields, `.payment-method_${paymentmethodID}`) ) {
                    $(this).prop('disabled', false);

                    return;
                }
                    
            }

            formData['is_paid'] = paymentMethodFormData[0]['payment_method'] == "PayMe" ? 1 : 0;

            formData['payment_methods'] = paymentMethodFormData
            formData['transaction_type'] = "pay-now"
            // console.log(formData);

            // return;

            await axios.post(`${getApiUrl()}/student/enroll-course`, formData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#enrollment-modal #cancel_btn').click();

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

        $('#payment-modal').on('click', '#back-btn', function(){
            $('#enrollment-modal').modal('show');
            $('#payment-modal #cancel_btn').click();
        });

        function renderNewPaymentMethod()
        {
            const id = generateRandomString();

            const content = `<div style="border: 1px solid #e7e7e7; padding: 20px; border-radius: 8px;" class="payment-method_item payment-method_${id} mb-3" data-paymentmethod_id="${id}">
                            <div style="display: flex; justify-content: flex-end;">
                                <span class="remove-payment_method_btn cursor-pointer" data-paymentmethod_id="${id}">
                                    <x-svg-icon icon="times" />
                                </span>
                            </div>
                            <div class="mb-4">
                                <p>Choose payment method:</p>
                                <div class="grid-container">
                                    <label class="grid-item" for="cash-${id}">
                                        <input type="checkbox" name="payment_method" value="Cash" id="cash-${id}" data-paymentmethod_id="${id}" checked>
                                        <span>Cash</span>
                                    </label>
                                    <label class="grid-item" for="cheque-${id}">
                                        <input type="checkbox" name="payment_method" value="Cheque" id="cheque-${id}" data-paymentmethod_id="${id}">
                                        <span>Cheque</span>
                                    </label>
                                    <label class="grid-item" for="bank_transfer-${id}">
                                        <input type="checkbox" name="payment_method" value="Bank Transfer" id="bank_transfer-${id}" data-paymentmethod_id="${id}">
                                        <span>Bank Transfer</span>
                                    </label>
                                    <label class="grid-item" for="fps-${id}">
                                        <input type="checkbox" name="payment_method" value="FPS" id="fps-${id}" data-paymentmethod_id="${id}">
                                        <span>FPS</span>
                                    </label>
                                    <label class="grid-item" for="pay_me-${id}">
                                        <input type="checkbox" name="payment_method" value="PayMe" id="pay_me-${id}" data-paymentmethod_id="${id}">
                                        <span>PayMe</span>
                                    </label>
                                    <label class="grid-item" for="others-${id}">
                                        <input type="checkbox" name="payment_method" value="Others" id="others-${id}" data-paymentmethod_id="${id}">
                                        <span>Others</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <p>Upload Attachment:</p>
                                <div>
                                    <div class="mb-2 uploaded-attachment_container d-none">
                                        <div class="d-flex align-items-center gap-4">
                                            <div style="width: 100px; height: 100px; overflow: hidden; border: 1px solid #e9e8e8; border-radius: 15px;">
                                                <img src="{{ asset('themes/tailwind/images/clipboard-image-5.png') }}" alt="" style="width: 100%; object-fit: cover;">
                                            </div>
                                            <div>
                                                <p class="attachment-file_name">Receipt01.jpg</p>
                                                <p>Uploaded on <span class="attachment-date"></span> at <span class="attachment-time"></span></p>
                                                <p class="attachment-size">1.2 MB</p>
                                            </div>
                                            <div class="d-flex gap-3">
                                                <!-- <span>
                                                    <x-svg-icon icon="download" />
                                                </span> -->
                                                <span class="remove-attachment_btn cursor-pointer" data-paymentmethod_id="${id}">
                                                    <x-svg-icon icon="trash" />
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="upload-attachment_form">
                                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3" data-paymentmethod_id="${id}">
                                            <x-form-input 
                                                label="" 
                                                type="file" 
                                                name="attachment"
                                                id="attachment"
                                                isRequired="false"
                                            />
                                        </div>
                                    </div>
                                    <!-- <div class="d-flex align-items-center gap-3 add-attachment_btn cursor-pointer" style="color: #4A5C7A;">
                                        <span>
                                            <x-svg-icon icon="plus" />
                                        </span>
                                        <span>Add</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 close-attachment_btn cursor-pointer d-none" style="color: #EF383F;">
                                        <span>
                                            <x-svg-icon icon="times" />
                                        </span>
                                        <span>Close</span>
                                    </div> -->
                                </div>
                            </div>
                            <div>
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-input 
                                        label="TOTAL FEE (HK$)" 
                                        type="text" 
                                        name="total_fee"
                                        id="total_fee"
                                        isRequired="false"
                                    />
                                    <x-form-input 
                                        label="PAYMENT DATE" 
                                        type="date" 
                                        name="payment_date"
                                        id="payment_date"
                                        isRequired="false"
                                    />
                                </div>
                                <div class="container" style="padding: 0px;color: #636363">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <label class="form-label" style="color: #636363;font-size: 14px;">Remarks</label>
                                            <textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;

            $('.payment-method_container').append(content);
        }

        function formatBytes(bytes, decimals = 2) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        }

        function generateRandomString() {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < 5; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

        function fileToBase64Promise(file) {
            return new Promise((resolve, reject) => {
                fileToBase64(file, function(base64String) {
                    resolve(base64String);
                });
            });
        }

        function fileToBase64(file, callback) {
            var reader = new FileReader();
            reader.onload = function(event) {
                var base64String = event.target.result.split(',')[1]; // Remove data URL scheme
                callback(base64String);
            };
            reader.readAsDataURL(file);
        }
        // End of payment

        // Error Validations
        function processErrorValidation(formData, requiredFields, form = null) {
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
				renderErrors(form);

				return true;
			}

			return false;
		}

		function renderErrors(form) {
			if ( errors.length > 0 ) {
                const hasParentFields = ['dob', 'payment_date'];

				errors.forEach((element) => {
                    let fieldSelector = null;
                    if( form )
                        fieldSelector = $(`${form} [name="${element.field_name}"]`);
                    else
                        fieldSelector = $(`[name="${element.field_name}"]`);

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