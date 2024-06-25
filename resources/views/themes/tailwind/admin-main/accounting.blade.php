@extends('theme::layouts.app')

@section('content')
<div class="page-container min-vh-80">
    <x-page-content-heading 
        heading="Accounting" 
        withButton="false"
        withIcon="false"
        icon="plus"
    />
    <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4 mt-4" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" role="tab">All</a>
        </li>
    </ul>
    <div class="row mt-2 p-2">
        <!-- Accounting List -->
        <div class="col-xxl-12 page-content-col">
            <div class="tab-content p-3 pt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="d-xl-flex align-items-xl-center w-100" style="width: 100%;" id="accounting-filter">
                            <button class="btn btn-primary" type="button" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px; width:50px; height: 45px; background-color: #e8e8e8; border-style: none;">
                                <img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-20.png" style="width: 20px;">
                            </button>
                            <input class="form-control custom-table_search" type="text" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;border-top-left-radius: 0px; border-bottom-left-radius: 0px;background: #e8e8e8; border-style: none; height: 45px;" />
                                <button class="btn btn-primary" type="button" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;width:50px; height: 45px; background-color: #e8e8e8; border-style: none;">
                                <img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-48.png" data-bs-toggle="modal" data-bs-target="#modal-1" style="width: 20px;">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-custom with-custom-search mt-4">
                    <table class="table table-hover w-100 position-relative" id="accounting-table">
                        <thead>
                            <tr>
                                <th class="text-left">
                                    <input type="checkbox">
                                </th>
                                <th class="text-left">INVOICE NO.</th>
                                <th class="text-left">NAME / ID</th>
                                <th class="text-left">COURSE CODE</th>
                                <th class="text-left">COURSE DATE</th>
                                <th class="text-left">TOTAL FEE (HK$)</th>
                                <th class="text-left">ACTUAL PAID (HK$)</th>
                                <th class="text-left">VIA EMAIL</th>
                                <th class="text-left">VIA APP</th>
                                <th class="text-right" style="width: 230px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $entries as $entry )
                                <tr>
                                    <td class="text-left">
                                        <input type="checkbox">
                                    </td>
                                    <td class="text-left">{{ optional($entry['invoice_item']['invoice'])['invoice_number'] }}</td>
                                    <td class="text-left">
                                        <div>
                                            <p>{{ optional($entry['user'])['name'] }}</p>
                                            <small>{{ optional($entry['user']['student_information'])['hkid'] }}</small>
                                        </div>
                                    </td>
                                    <td class="text-left">{{ optional($entry['package']['course'])['course_name'] }}</td>
                                    <td class="text-left">
                                        @foreach( $entry['all_filtered_student_classes'] as $courseClasses )
                                            <p>{{ optional($courseClasses['class'])['start_date'] }}</p>
                                        @endforeach
                                    </td>
                                    <td class="text-left">{{ $entry['total_fee'] }}</td>
                                    <td class="text-left">{{ $entry['total_fee'] }}</td>
                                    <td class="text-left">
                                        @if( $entry['course_enrollment_notification'] )
                                            <span>{{ optional($entry['course_enrollment_notification']['platform_notification'])['email_sent'] ? 'Sent' : '-' }}</span>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td class="text-left">
                                        @if( $entry['course_enrollment_notification'] )
                                            <span>{{ optional($entry['course_enrollment_notification']['platform_notification'])['in_app_sent'] ? 'Sent' : '-' }}</span>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="d-flex gap-3 align-items-center">
                                            <div>
                                                <x-primary-button type="button" id="notification-btn" title="Notification" attribute="data-student_id={{ $entry['user_id'] }} data-course_enrollment_id={{ $entry['id'] }}" customClass="sm notification-btn" toggle="" target=""/>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <a href="{{route('wave.user.admin-main.accounting-details', $entry['id'])}}" class="view-button" id="view-btn" data-row_id="">
                                                    <x-svg-icon icon="view" width="1.5rem" height="1.2rem"/>
                                                </a> 
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <button type="button" class="edit-button" id="edit-btn" data-row_id="{{ $entry['id'] }}">
                                                    <x-svg-icon icon="edit" width="1rem" height="1rem"/>
                                                </button> 
                                            </div>
                                            <div>
                                                <a href="#" style="font-weight: 600; text-decoration: underline; color: blue;" class="print-btn" data-pdf_url="{{ $entry['invoice_item']['invoice']['pdf_url'] }}">Print</a>
                                            </div>
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

<canvas id="pdf-canvas" class="d-none"></canvas>

<!-- Modal for Edit accounting | Payment Method -->
<div class="modal fade" role="dialog" tabindex="-1" id="edit-accounting_modal">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Update Accounting</h4>
            </div>
            <div class="modal-body">
                <div id="preview-content">
                    <div class="w-100 mt-2">
                        <table class="table" id="basic-info_table">
                            <thead style="border-bottom: 1px solid #d5d5d5;">
                                <tr>
                                <th class="table-header">INVOICE NO.</th>
                                <th class="table-header">STUDENT</th>
                                <th class="table-header">EMAIL</th>
                                <th class="table-header">PHONE</th>
                                <th class="table-header">RESIDENTIAL ADDRESS</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="w-100 mt-4">
                        <h2 class="section-title mb-2">Payment Record</h2>
                        <table class="table" id="payment-record_table">
                            <thead style="border-bottom: 1px solid #d5d5d5;">
                                <tr>
                                <th class="table-header">PAYMENT METHOD</th>
                                <th class="table-header">TOTAL FEE (HK$)</th>
                                <th class="table-header">PAYMENT DATE</th>
                                <th class="table-header"></th>
                                <th class="table-header" style="width: 25px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                        <div class="mt-2" style="display: inline-block;">
                            <div class="d-flex gap-2 cursor-pointer" style="font-size: 14px; font-weight: 500; color: #4A5C7A;" data-bs-toggle="modal" data-bs-target="#accounting-payment-modal">
                                <span>
                                    <x-svg-icon icon="plus" />
                                </span>
                                <span>Add another payment record</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 mt-4 invoice-container">
                        <div class="container mb-4" style="padding: 0px;color: #636363">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Remarks</label>
                                    <textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="container" style="padding: 0px;color: #636363">
                            <div class="form-inline">
                                <div class="d-flex d-flex gap-3">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Attachment</label>
                                    <input type="file">
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" id="submit-btn" title="Save" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Filter -->
<div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fw-semibold" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;">Filter</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-inline" style="width: 100%;margin-right: 10px;">
                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Date</label>
                        <div class="input-group mb-4"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                    <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                </svg></span><input class="form-control" name="custom_date" type="date" style="background: #F5F5F5;border-style: none;"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer"><button class="btn btn-primary" id="submit-filter" type="button" style="background: #4A5C7A;box-shadow: 0px 4px rgb(40,51,68);border-style: none;border-bottom-style: none;border-bottom-color: rgb(29,44,88);width: 100%;height: 48px;" data-bs-toggle="modal" data-bs-target="#modal-1">Save</button></div>
        </div>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mb-4">
                <p class="heading mb-3">Delete Confirmation?</p>
                <p class="sub-heading text-secondary">
                    Are you sure you want to remove this payment method?
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" color="danger" id="process-delete" title="Continue" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="accounting-payment-modal" data-bs-backdrop="static" data-bs-keyboard="false">
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
                </form>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal" customStyle="cancel_btn"/>
                <x-primary-button type="button" id="confirm-btn" title="Save" toggle="" target=""/>
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
                            name="template"
                            id="template"
                            isRequired="true"
                            tabindex="5"
                            value="enrollment"
                        >
                            <option value="" hidden>Select Template</option>
                            @foreach($notification_categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['template_name'] }}</option>
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
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal" customStyle="cancel_btn"/>
                <x-primary-button type="button" id="process-notification" title="Send Notification" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    #staff-table_wrapper .row:nth-child(2) {
        min-height: calc(100vh - 44vh) !important;
    }

    .page-content-col2 {
        border: none;
        border-left: 1px solid rgb(232,232,232);
        border-top-right-radius: 10px;
        border-bottom-right-radius: 11px;
        padding: 0 20px 0 20px;
        margin-left: 10px;
    }

    .page-content-col2 .card {
        border: none;
        border-radius: 0;
        border-bottom: 1px solid #e8e8e8 !important;
    }

    table.dataTable tbody td {
        vertical-align: middle;
    }

    /* Custom CSS for Table */
    .table-header {
        font-size: 14px;
        font-weight: 700;
        color: #7A7A7A;
    }

    .table-body-row {
        font-size: 14px;
        font-weight: 400;
        color: #3B3B3B;
    }

    .section-title {
        font-size: 24px;
        font-weight: 500;
        color: #3B3B3B;
    }

    .table-row-img {
        width: 61px;
        height: 61px;
        border-radius: 15px;
        overflow: hidden;
        border: 1px solid #e7e1e1;
    }

    .table-row-img img {
        height: 100%;
        object-fit: cover;
    }

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
<script type="text/javascript">
    $(function() {
        var table = $('#accounting-table').DataTable({
			"paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "columnDefs": [
                {
                    targets: [0,1,3,4,5,6,7,8,9],
                    orderable: false
                }
            ]
		});

        $('#accounting-filter').on('keyup', '.custom-table_search', function() {
            var searchTerm = $(this).val();

            table.search(searchTerm).draw();
        });

        $('#modal-1').on('click', '#submit-filter', function(){
            const customDate = $('#modal-1 input[name=custom_date]').val();

            const filteredDate = moment(customDate).format('YYYY-MM-DD');

            table.search(filteredDate).draw();
        });

        var courseEnrollmentID = null;
        $('#accounting-table').on('click', '.edit-button', function(){
            const rowID = $(this).data('row_id');
            courseEnrollmentID = rowID;

            $('#edit-accounting_modal').modal('show');

            renderDetailsToModal(rowID);
        });

        // Event to dowload image from the table row
        $('#edit-accounting_modal #payment-record_table').on('click', '.download-img_btn', function(){
            var imageUrl = $(this).data('src'); // Get the src attribute of the img element
            var filename = $(this).data('filename'); // Get the src attribute of the img element
            
            downloadImage(`${getAppUrl()}/admin-main/download-file?url=${imageUrl}`, filename);
        });

        // Delete Payment Record
        var selectedPaymentMethodID = null;
        $('#edit-accounting_modal #payment-record_table').on('click', '.delete-payment_method_record', function() {
            const id = $(this).data('id');
            selectedPaymentMethodID = id;
            
            $('#edit-accounting_modal #cancel-btn').click();
            $('#delete-modal').modal('show');
        });

        $('#delete-modal').on('hidden.bs.modal', function (e) {
            $('#edit-accounting_modal').modal('show');
        });

        $('#delete-modal').on('click', '#process-delete', async function(){
            $(this).prop('disabled', true);

            // get user token
			const userToken = getUserToken();
            
            await axios.delete(`${getApiUrl()}/course/remove-payment-method/${selectedPaymentMethodID}`, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        $(`.delete-payment_method_record[data-id="${selectedPaymentMethodID}"]`).closest("tr").remove();

                        $(this).removeAttr('disabled');

                        $('#delete-modal #cancel-btn').click();
                        $('#edit-accounting_modal').modal('show');
                        // if( $('#preview-content #payment-record_table tbody tr td').length >= 1 ) {
                        //     $('.accounting_tab #delete-modal #cancel-btn').click();
                        // } else {
                        //     window.location = window.location
                        // }
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

        // Another Payment Method
        $('#accounting-payment-modal').on('click', '#confirm-btn', async function(){
            $(this).prop('disabled', true);

            // get user token
			const userToken = getUserToken();
            
            // fetch all data
            const paymentMethods = $('#accounting-payment-modal .payment-method_item');

            let paymentMethodFormData = [];
            for (const method of paymentMethods) {
                const paymentmethodID = $(method).data('paymentmethod_id');

                const paymentMethodTypes = $(`#accounting-payment-modal .payment-method_${paymentmethodID} input[name=payment_method]`);
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

                const dataField = [
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

                if( processErrorValidation(dataField, requiredFields, `.payment-method_${paymentmethodID}`) ) {
                    $(this).prop('disabled', false);
                    return;
                }
            }
            
            let formData = {};
            formData['course_enrollment_id'] = courseEnrollmentID
            formData['payment_methods'] = paymentMethodFormData
            // console.log(formData);

            // return;

            await axios.post(`${getApiUrl()}/course/store-payment-method`, formData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#accounting-payment-modal #cancel_btn').click();

                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        // render the payment records based on selected row on accounting list
                        let paymentTableContent = ``;
                        res.data.data.forEach(payment => {
                            let imgContent = '-';
                            let downloadBtn = '';
                            if( payment.attachment ) {
                                imgContent = '';
                                imgContent = `<div class="table-row-img">
                                                <img src="${payment.image_path}" alt="" style="width: 61px;">
                                            </div>
                                            <div>
                                                <p>Receipt01.jpg</p>
                                                <p>Uploaded on ${moment(payment.created_at).format('DD/MM/YYYY')} at ${moment(payment.created_at).format('hh:mm A')}</p>
                                                <p>${payment.attachment_size}</p>
                                            </div>`;
                                downloadBtn = `<span style="color: #7A7A7A;" class="cursor-pointer download-img_btn" data-src="${payment.image_path}" data-filename="${payment.attachment}">
                                                    <x-svg-icon icon="download" />
                                                </span>`;
                            }
                            paymentTableContent += `<tr>
                                    <th class="table-body-row">${payment.payment_method_label}</th>
                                    <td class="table-body-row">${payment.total_fee}</td>
                                    <td class="table-body-row">${payment.payment_date}</td>
                                    <td class="table-body-row">
                                        <div class="d-flex align-items-center gap-4">
                                            ${imgContent}
                                            <div class="d-flex gap-3">
                                                ${downloadBtn}
                                                <span style="color: #7A7A7A;" class="cursor-pointer delete-payment_method_record" data-id="${payment.id}">
                                                    <x-svg-icon icon="trash" />
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>`
                        });

                        $('#edit-accounting_modal #payment-record_table tbody').append(paymentTableContent);
                        $('#edit-accounting_modal').modal('show');
                        
                        $(this).removeAttr('disabled');
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

        $('#accounting-payment-modal').on('hidden.bs.modal', function (e) {
            $('#edit-accounting_modal').modal('show');
        });

        // Update Course Enrollment
        $('#edit-accounting_modal').on('click', '#submit-btn', async function() {
            $(this).prop('disabled', true);

            const remarks = $('#edit-accounting_modal [name=remarks]').val();

            const formData = {
                course_enrollment_id: courseEnrollmentID,
                remarks: remarks,
            };

            await axios.post(`${getApiUrl()}/course/update-enrollment`, formData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + getUserToken()
                    }
                }).then(res => {
                    $(this).removeAttr('disabled');

                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        window.location = window.location
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");
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

            console.log(formData)
        });

        // Print event
        $('#accounting-table').on('click', '.print-btn', function(e){
            const pdfUrl = $(this).data('pdf_url');
            // printPDF(`http://kcwi-api.local/storage/course-enrollment-payment-attachments/INV_000001.pdf`);
            printPDF(pdfUrl);
        });

        // Notification Event
        tinymce.init({
            selector: '#notification-content',
            height: 300,
            auto_focus: '#tinymce'
            // other configuration options...
        });

        $('#accounting-table').on('click', '.notification-btn', function(){
            studentID = $(this).data('student_id');
            courseEnrollmentID = $(this).data('course_enrollment_id');
            $('#notification-modal').modal('show');

            $('#notification-modal #modal-form input').next('p').remove();
            $('#notification-modal #modal-form select').next('p').remove();
            $('#notification-modal #modal-form .tox.tox-tinymce').next('p').remove();

            $('#notification-modal #modal-form .tox.tox-tinymce').attr('style', 'visibility: hidden; height: 300px;');
            $('#notification-modal #modal-form input').removeClass('border border-danger');
            $('#notification-modal #modal-form select').removeClass('border border-danger');
        });
        
        var templateID = "";
        $('#notification-modal').on('change', 'select[name=template]', function(){
            const selectedValue = $(this).val();
            templateID = selectedValue;

            const systemData = <?= json_encode($notification_categories) ?>;
            const selectedCategory = systemData.find(value => value.id == selectedValue)

            $('#notification-modal input[name=title]').val(selectedCategory.title);
            tinymce.get("notification-content").setContent(selectedCategory.content);
        });

        $('#notification-modal').on('click', '#process-notification', function(){
            $(this).prop('disabled', true);

            const title = $('#notification-modal input[name=title]').val();
            const datetimeToSend = $('#notification-modal input[name=datetime_to_send]').val();
            const isSendImmediately = $('#notification-modal input[name=send_immediate]').is(':checked');
            const tempContent = tinymce.get('notification-content').getContent();
            $('#notification-modal [name=content]').val(tempContent);
            const content = $('#notification-modal [name=content]').val();

            let sendVia = [];
            if( $('#notification-modal input[name=send_via_email]').is(':checked') )
                sendVia.push('email');
            if( $('#notification-modal input[name=send_via_app]').is(':checked') )
                sendVia.push('app');

            const formData = {
                notification_types: [""],
                notification_type: "individual",
                send_via: sendVia,
                template_id: templateID,
                title: title,
                content: content,
                send_immediately: isSendImmediately ? 1 : 0,
                remarks: "",
                datetime_to_send: datetimeToSend,
                selected_students: [studentID],
                status: "Active",
                course_enrollment_id: parseInt(courseEnrollmentID),
                from: "accounting",
            };

            const requiredFields = ['template', 'title', 'content'];
            const dataField = [
                {
                    name: 'template',
                    value: templateID
                },
                {
                    name: 'title',
                    value: title
                },
                {
                    name: 'content',
                    value: content
                }
            ];

            if( processErrorValidation(dataField, requiredFields, '#notification-modal #modal-form') ) {
                $(this).prop('disabled', false);

                return;
            }

            // console.log(formData);
            addAnnouncement(this, formData);
        });

        //* FUNCTIONS
        var studentID = null;
        function renderDetailsToModal(rowID)
        {
            const systemData = <?= json_encode($entries) ?>;
            const selectedData = systemData.find(value => value.id == rowID);
            studentID = selectedData.user_id;
            courseEnrollmentID = selectedData.id;

            console.log(selectedData);
            // Basic Information
            $('#basic-info_table tbody').empty();
            $('#basic-info_table tbody').append(`<tr>
                <th class="table-body-row">${selectedData.invoice_item ? selectedData.invoice_item.invoice.invoice_number : '-'}</th>
                <td class="table-body-row">${selectedData.user.name}</td>
                <td class="table-body-row">${selectedData.user.email}</td>
                <td class="table-body-row">${selectedData.user.student_information ? (selectedData.user.student_information.phone ? selectedData.user.student_information.phone : '-') : '-'}</td>
                <td class="table-body-row">${selectedData.user.student_information ? (selectedData.user.student_information.address ? selectedData.user.student_information.address : '-') : '-'}</td>
            </tr>`);

            // Payment Records
            $('#payment-record_table tbody').empty();
            let paymentRecordList = '';
            selectedData.payments.forEach(payment => {
                let attachment = '-';
                let downloadBtn = '';
                if( payment.attachment ) {
                    attachment = `<div class="table-row-img">
                                    <img src="${payment.image_path}" alt="" style="width: 61px;">
                                </div>
                                <div>
                                    <p>Receipt01.jpg</p>
                                    <p>Uploaded on ${moment(payment.updated_at).format('MM/DD/YYYY')} at ${moment(payment.updated_at).format('h:mm')}</p>
                                    <p>${payment.attachment_size}</p>
                                </div>`;

                    downloadBtn = `<span style="color: #7A7A7A;" class="cursor-pointer download-img_btn" data-src="${payment.image_path}" data-filename="${payment.attachment}">
                                        <x-svg-icon icon="download" />
                                    </span>`;
                }
                    

                paymentRecordList += `<tr>
                                    <th class="table-body-row">${payment.payment_method_label}</th>
                                    <td class="table-body-row">${payment.total_fee}</td>
                                    <td class="table-body-row">${moment(payment.payment_date).format('MM/DD/YYYY')}</td>
                                    <td class="table-body-row">
                                        <div class="d-flex align-items-center gap-4">
                                            ${attachment}
                                            <div class="d-flex gap-3">
                                                ${downloadBtn}
                                                <span style="color: #7A7A7A;" class="cursor-pointer delete-payment_method_record" data-id="${payment.id}">
                                                    <x-svg-icon icon="trash" />
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>`;
            });
            $('#payment-record_table tbody').append(paymentRecordList);

            // Remarks field
            $('[name=remarks]').val(selectedData.remarks);

        }

        async function downloadImage(imageSrc, filename) {
            const image = await fetch(imageSrc)
            const imageBlog = await image.blob()
            const imageURL = URL.createObjectURL(imageBlog)

            const link = document.createElement('a')
            link.href = imageURL
            link.download = filename
            document.body.appendChild(link)
            link.click()
            document.body.removeChild(link)
        }

        async function addAnnouncement(input, formData) {
            // API Request to save notification category
            await axios.post(`${getApiUrl()}/notification/announcements/add`, formData, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + getUserToken()
                }
            }).then(res => {

                if ( res.data.success ) {
                    toastTopEnd("Success", res.data.message, "success");

                    window.location = window.location
                } else {
                    toastInfo("Cant' Save", res.data.message, "warning");

                    $(input).removeAttr('disabled');
                }
            }).catch(error => {
                $(input).removeAttr('disabled');

                if( error.response.status == 400 || error.response.status == 422 ) {
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

                if( error.response.status == 401 ) {
                    alert("Your session expired!");
                    window.location = window.location;
                }

                console.error('Error fetching data:', error);
            });
        }

        // Error Validations
        function processErrorValidation(formData, requiredFields, form = null) {
			errors = [];
            console.log(formData);
			formData.forEach(function(item) {
                console.log(requiredFields.includes(item.name));
                console.log(item.value == "");
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
            console.log(errors);

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
                        fieldSelector = $(`${form} [name=${element.field_name}]`);
                    else
                        fieldSelector = $(`[name="${element.field_name}"]`);
                    
                    // Clear the errors first
                    fieldSelector.removeClass('border border-danger');
                    fieldSelector.parent().removeClass('border border-danger');
                    $('#notification-modal #modal-form .tox.tox-tinymce').next('p').remove();
                    $('#notification-modal #modal-form .tox.tox-tinymce').attr('style', 'visibility: hidden; height: 300px;');

                    if ( fieldSelector.next().is('p') )
                        fieldSelector.next().remove();

                    if ( fieldSelector.parent().next().is('p') )
                        fieldSelector.parent().next().remove();

                    if( element.field_name != 'content' ) {
                        if (! hasParentFields.includes(element.field_name) ) {
                            console.log(`${form} [name="${element.field_name}"]`);
                            fieldSelector.addClass('border border-danger');
                            fieldSelector.after(`<p class="text-danger" style="font-size: 12px;">${element.message}</p>`);
                        } else {
                            fieldSelector.parent().addClass('border border-danger');
                            fieldSelector.parent().after(`<p class="text-danger" style="font-size: 12px;">${element.message}</p>`);
                        }
                    } else {
                        $('#notification-modal #modal-form .tox.tox-tinymce').attr('style', 'visibility: hidden; height: 300px; border: 1px solid red !important;')
                        $('#notification-modal #modal-form .tox.tox-tinymce').after(`<p class="text-danger" style="font-size: 12px;">${element.message}</p>`);
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

        async function printPDF(pdf_url)
        {
            try {
                fetch("{{ config('services.app_url') }}/fetch-pdf", {
                    method: 'POST', // Specify the HTTP method as POST
                    headers: {
                        'Content-Type': 'application/json', // Specify the Content-Type header
                        // Add any other headers if needed
                    },
                    body: JSON.stringify({
                        pdf_url: pdf_url
                    })
                })
                .then(response => response.blob())
                .then(blob => {
                    const pdfUrl = URL.createObjectURL(blob);
                    // URL to your PDF file
                    // const pdfUrl = blob;

                    // Initialize PDF.js
                    const pdfjsLib = window['pdfjs-dist/build/pdf'];

                    // Load the PDF document
                    pdfjsLib.getDocument(pdfUrl).promise.then(pdf => {
                        // Get the first page
                        return pdf.getPage(1);
                    }).then(page => {
                        // Set up the canvas
                        const canvas = document.getElementById('pdf-canvas');
                        const context = canvas.getContext('2d');
                        const viewport = page.getViewport({ scale: 1 });

                        // Set the canvas size
                        canvas.width = viewport.width;
                        canvas.height = viewport.height;

                        // Render the PDF page on the canvas
                        page.render({
                            canvasContext: context,
                            viewport: viewport
                        }).promise.then(()=>{
                            // Print the PDF
                            const dataURL = canvas.toDataURL();
                            
                            const newWin = window.open('', 'Print-Window');
                            newWin.document.open();
                            newWin.document.write(`<html><body onload="window.print()"><img src="${dataURL}" style="width:100%;"></body></html>`);
                            newWin.document.close();
                            setTimeout(function(){ newWin.close(); }, 10);
                        });

                    }).catch(error => {
                        console.error('Error loading PDF:', error);
                    });
                })
                .catch(error => {
                    console.error('Error fetching PDF:', error);
                });
            } catch (error) {
                console.error('Error:', error);
            }
        }
    });
</script>
@endsection