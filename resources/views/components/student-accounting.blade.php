<div>
    <div class="row pl-3" id="main-table">
        <!-- Table List -->
        <div class="col-9 page-content-col">
            <div class="p-3 pt-4">
                <div class="row table-custom-filter">
                    <div class="col-12 position-relative d-flex align-items-end">
                        <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
                    </div>
                </div>
                <div class="table-responsive table-custom with-custom-search mt-4">
                    <table class="table table-hover w-100" id="student-accounting_table">
                        <thead>
                            <tr>
                                <th class="text-left"><input type="checkbox" class="check-all"></th>
                                <th class="text-left">INVOICE NO.</th>
                                <th class="text-left">COURSE CODE</th>
                                <th class="text-left">DATE</th>
                                <th class="text-left">TOTAL FEE (HK$)</th>
                                <th class="text-left">PAYMENT METHOD</th>
                                <th class="text-left"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $studentAccounts as $studentAccount )
                                <tr data-row_id="{{ $studentAccount['id'] }}">
                                    <td class="text-left"><input type="checkbox" class="check-all"></td>
                                    <td class="text-left">{{ $studentAccount['invoice'] ?? '-' }}</td>
                                    <td class="text-left">{{ $studentAccount['package']['course']['course_abbreviation'] }}</td>
                                    <td class="text-left">{{ $studentAccount['payment'] ? formatDate($studentAccount['payment']['payment_date']) : '-' }}</td>
                                    <td class="text-left">{{ $studentAccount['payment'] ? $studentAccount['payment']['total_fee'] : '-' }}</td>
                                    <td class="text-left">{{ $studentAccount['payment'] ? $studentAccount['payment']['payment_method_label'] : '-' }}</td>
                                    <td class="text-left">
                                        <div class="d-flex gap-2">
                                            <div data-id="{{ $studentAccount['id'] }}" class="cursor-pointer preview-btn">
                                                <x-svg-icon icon="view" />
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
        <!-- Table Information -->
        <div class="col-3">
            <div class="card">
                <div class="card-body main-page_normal_card_info">
                    <div class="col mb-4">
                        <div>
                            <h1 class="fw-semibold card-heading text-center">Accounting</h1>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h1 class="fw-semibold card-sub_heading">INFORMATION</h1>
                    </div>
                    <div class="col coach-comment-detail_container">
                        <ul class="list-group border-none">
                            <li class="list-group-item d-xxl-flex p-0 border-bottom" style="border-style: none;">
                                <div class="container p-0">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Invoice No.</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-invoice" class="card-detail_sub_title">-</h1>
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
                                            <h1 class="card-detail_title">Student ID</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-student_id" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Date</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-date" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Total Fee (HK$)</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-total_fee" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Actual Paid</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-actual_paid" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Modified by</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="info-modified_by" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Modified Date</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="info-updated_at" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
 										</div>
 									</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="preview-content" class="d-none">
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
                    <tr>
                        <th class="table-body-row">KCWI-I-000030</th>
                        <td class="table-body-row">Ethan Ng</td>
                        <td class="table-body-row">ethan.ng@mail.com</td>
                        <td class="table-body-row">6999 9999</td>
                        <td class="table-body-row">2108 Paul Y. Centre 51 Hung To Road Kowloon,Kwun Tong District,Hongkong</td>
                    </tr>
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
                    <tr>
                        <th class="table-body-row">PayMe</th>
                        <td class="table-body-row">2,160</td>
                        <td class="table-body-row">4/9/2022</td>
                        <td class="table-body-row">
                            <div class="d-flex align-items-center gap-4">
                                <div class="table-row-img">
                                    <img src="{{ asset('themes/tailwind/images/Logo.png') }}" alt="" style="width: 61px;">
                                </div>
                                <div>
                                    <p>Receipt01.jpg</p>
                                    <p>Uploaded on 15/07/2022 at 11:50</p>
                                    <p>1.2 MB</p>
                                </div>
                                <div class="d-flex gap-3">
                                    <span style="color: #7A7A7A;" class="cursor-pointer">
                                        <x-svg-icon icon="download" />
                                    </span>
                                    <span style="color: #7A7A7A;" class="cursor-pointer delete-payment_method_record">
                                        <x-svg-icon icon="trash" />
                                    </span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-2">
                <div class="d-flex gap-2 cursor-pointer" style="font-size: 14px; font-weight: 500; color: #4A5C7A;" data-bs-toggle="modal" data-bs-target="#accounting-payment-modal">
                    <span>
                        <x-svg-icon icon="plus" />
                    </span>
                    <span>Add another payment record</span>
                </div>
            </div>
        </div>
        <div class="w-100 mt-4 invoice-container">
            <div class="d-flex justify-content-between">
                <h2 class="section-title">Invoice</h2>
                <div>
                    <x-secondary-button 
                        type="button" 
                        id="export-btn" 
                        title="Export PDF" 
                        toggle="" 
                        target=""
                        withIcon="true"
                        icon="download"
                    />
                </div>
            </div>
            <div class="row mt-2 mb-5 invoice-school_details">
                @if( $school )
                    <div class="col-12 mb-4">
                        <img src="{{ asset($school['logo']) }}" alt="" style="width: 168px;">
                    </div>
                    <div class="col-9">
                        <div>
                            <h5>{{ $school['name'] }}</h5>
                            <p>{{ $school['address'] }}</p>
                            <p>{{ $school['city'] . ", " . $school['state'] . ", " . $school['country']}}</p>
                            <p>{{ $school['email'] }}</p>
                            <p>{{ $school['school_website'] }}</p>
                        </div>
                    </div>
                @else
                    <div class="col-12 mb-4">
                        <img src="{{ asset('themes/tailwind/images/Logo.png') }}" alt="" style="width: 168px;">
                    </div>
                    <div class="col-9">
                        <div>
                            <h5>School Name</h5>
                            <p>Address</p>
                            <p>City, State, Country</p>
                            <p>school@gmail.com</p>
                            <p>www.school.com</p>
                        </div>
                    </div>
                @endif
                <div class="col-3 d-flex justify-content-end align-items-center">
                    <div class="text-right invoice-payment_date">September 14, 2021</div>
                </div>
            </div>
            <div class="invoice-product_details">
                <table class="table">
                    <thead style="border-bottom: 1px solid #d5d5d5;">
                        <tr>
                        <th class="table-header">PRODUCT</th>
                        <th class="table-header">PRICE</th>
                        <th class="table-header">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="table-body-row">
                                <div>
                                    <p>VSA-RS1-001</p>
                                    <p>Ripple Starter 1 </p>
                                    <p>(6, 8, 13, 15, 20, 22, 27, 29 Jul, 2021  10:00 - 11:00)</p>
                                </div>
                            </th>
                            <td class="table-body-row">2,500</td>
                            <td class="table-body-row">$2.500</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="w-100 invoice-total_details">
                <div class="w-100 d-flex justify-content-end gap-4 mt-5">
                    <div class="text-right">
                        <p style="font-size: 15px; font-weight: 500; color: #7A7A7A;">Subtotal</p>
                        <p style="font-size: 18px; font-weight: 500; color: #3B3B3B;">Total</p>
                    </div>
                    <div class="text-right">
                        <p style="font-size: 15px; font-weight: 500; color: #7A7A7A;" class="payment-detail_subtotal">$2,500</p>
                        <p style="font-size: 18px; font-weight: 500; color: #3B3B3B;" class="payment-detail_total">$2,500</p>
                    </div>
                </div>
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
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal" customStyle="cancel_btn"/>
                <x-primary-button type="button" id="confirm-btn" title="Save" toggle="" target=""/>
            </div>
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

    .text-rejected,
    .text-refund,
    .text-cancelled {
        color: #FF0018 !important;
    }

    .text-reservation {
        color: #FFC24A !important;
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
</style>

<script>
    $(function() {
        var customTable = $('#student-accounting_table').DataTable({
            "columnDefs": [{
                    targets: [0],
                    orderable: false
            }]
        });

        // Event listener for custom search input
        $('.table-custom-filter').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            customTable.search(searchTerm).draw();
        });

        $('#student-accounting_table tbody').on('click', 'tr', function(){
            const rowID = $(this).data('row_id');
            if(! rowID )
                return;

            const systemStudentAccount = <?= json_encode($studentAccounts) ?>;
            const studentAccount = systemStudentAccount.find(value => value.id == rowID);

            $('.coach-comment-detail_container #info-invoice').text(studentAccount.invoice ?? '-');
            $('.coach-comment-detail_container #info-name').text(studentAccount.user.name ?? '-');
            $('.coach-comment-detail_container #info-student_id').text(studentAccount.user.id ?? '-');
            $('.coach-comment-detail_container #info-date').text(studentAccount.payment ? moment(studentAccount.payment.payment_date).format('l') : '-');
            $('.coach-comment-detail_container #info-total_fee').text(studentAccount.payment ? studentAccount.payment.total_fee : '-');
            $('.coach-comment-detail_container #info-actual_paid').text(studentAccount.payment ? (studentAccount.payment.total_fee ? studentAccount.payment.total_fee : '-') : '-');
            $('.coach-comment-detail_container #info-modified_by').text(studentAccount.log ? studentAccount.log.user.name : '-' );
            $('.coach-comment-detail_container #info-updated_at').text( studentAccount.log ? moment(studentAccount.log.created_at).format('l') : '-' );
        });

        var courseEnrollmentID = null;
        $('#student-accounting_table').on('click', '.preview-btn', function(){
            const ID = $(this).data('id');
            
            const systemStudentAccounts = <?= json_encode($studentAccounts) ?>;
            const selectedAccount = systemStudentAccounts.find(value => value.id == ID);
            courseEnrollmentID = selectedAccount.id
            // console.log(selectedAccount)
            
            $('.accounting_tab #main-table').addClass('d-none');
            $('.accounting_tab #preview-content').removeClass('d-none');

            // render the basic info based on selected row on accounting list
            $('#preview-content #basic-info_table tbody').empty();
            const basicTableContent = `<tr>
                        <th class="table-body-row">${selectedAccount.invoice ?? '-'}</th>
                        <td class="table-body-row">${selectedAccount.user.name}</td>
                        <td class="table-body-row">${selectedAccount.user.email}</td>
                        <td class="table-body-row">${selectedAccount.user.student_information.phone}</td>
                        <td class="table-body-row">${selectedAccount.user.student_information.address}</td>
                    </tr>`;
            $('#preview-content #basic-info_table tbody').append(basicTableContent);

            // render the payment records based on selected row on accounting list
            $('#preview-content #payment-record_table tbody').empty();
            let paymentTableContent = ``;
            selectedAccount.payments.forEach(payment => {
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
            if( selectedAccount.payments.length <= 0 ){
                paymentTableContent = `<tr>
                        <td colspan="4" class="text-center">No payment method found</td>
                    </tr>`;
            }
            $('#preview-content #payment-record_table tbody').append(paymentTableContent);

            if( selectedAccount.payments.length > 0 ){
                // render the Invoice Details here
                $('.invoice-container').removeClass('d-none');
                $('.invoice-payment_date').text(selectedAccount.payment.payment_date);

                $('#preview-content .invoice-product_details tbody').empty();
                const paymentTableContent = `<tr>
                            <th class="table-body-row">
                                <div>
                                    <p>${selectedAccount.package.course.course_abbreviation}</p>
                                    <p>${selectedAccount.package.course.level.name}</p>
                                </div>
                            </th>
                            <td class="table-body-row">${selectedAccount.package.course.class_full_price}</td>
                            <td class="table-body-row">${"$"+selectedAccount.payment.total_fee}</td>
                        </tr>`;
                $('#preview-content .invoice-product_details tbody').append(paymentTableContent);

                $('.payment-detail_subtotal').text(selectedAccount.package.course.class_full_price);
                $('.payment-detail_total').text("$"+selectedAccount.payment.total_fee);
                
            } else {
                $('.invoice-container').addClass('d-none');
            }
        });

        $('.nav-tabs').on('click', '.accounting-tab_btn', function(){
            $('.accounting_tab #main-table').removeClass('d-none');
            $('.accounting_tab #preview-content').addClass('d-none');
        });

        // Event to dowload image from the table row
        $('#payment-record_table').on('click', '.download-img_btn', function(){
            var imageUrl = $(this).data('src'); // Get the src attribute of the img element
            var filename = $(this).data('filename'); // Get the src attribute of the img element
            
            downloadImage(`${getAppUrl()}/admin-main/download-file?url=${imageUrl}`, filename);
        });

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

        // Payment Modal Events and Functions
        $('#accounting-payment-modal #modal-form').on('click', 'input[name=payment_method]', function(){
            const value = $(this).val();
            const paymentmethodID = $(this).data('paymentmethod_id');

            $(`#accounting-payment-modal .payment-method_${paymentmethodID} input[name=payment_method]`).prop('checked', false);
            $(`#accounting-payment-modal .payment-method_${paymentmethodID} input[value="${value}"]`).prop('checked', true);
        });

        var selectedAttachment = null;
        $('#accounting-payment-modal .payment-method_container').on('change', 'input[type=file]', function(){
            const paymentmethodID = $(this).closest('.container').data('paymentmethod_id');
            
            var file = this.files[0];
            if (file) {
                selectedAttachment = file;

                var reader = new FileReader();
                reader.onload = function(event) {
                    $(`#accounting-payment-modal .payment-method_${paymentmethodID} .uploaded-attachment_container img`).attr('src', event.target.result);
                };
                reader.readAsDataURL(file);

                var currentDate = new Date();
                var date = currentDate.toLocaleDateString();
                var time = currentDate.toLocaleTimeString();

                $(`#accounting-payment-modal .payment-method_${paymentmethodID} .attachment-file_name`).text(file.name);
                $(`#accounting-payment-modal .payment-method_${paymentmethodID} .attachment-date`).text(date);
                $(`#accounting-payment-modal .payment-method_${paymentmethodID} .attachment-time`).text(time);
                $(`#accounting-payment-modal .payment-method_${paymentmethodID} .attachment-size`).text(formatBytes(file.size));
                
                $(`#accounting-payment-modal .payment-method_${paymentmethodID} .uploaded-attachment_container`).removeClass('d-none');
                $(`#accounting-payment-modal .payment-method_${paymentmethodID} .upload-attachment_form`).addClass('d-none');
            }
        });

        $('#accounting-payment-modal .payment-method_container').on('click', '.remove-attachment_btn', function(){
            const paymentmethodID = $(this).data('paymentmethod_id');

            $(`#accounting-payment-modal .payment-method_${paymentmethodID} .uploaded-attachment_container`).addClass('d-none');
            $(`#accounting-payment-modal .payment-method_${paymentmethodID} .upload-attachment_form`).removeClass('d-none');

            $(`#accounting-payment-modal .payment-method_${paymentmethodID} .upload-attachment_form input[type=file]`).val('');
        });

        $('#accounting-payment-modal').on('click', '.add-payment_method_btn', function(){
            renderNewPaymentMethod();
        });

        $('#accounting-payment-modal .payment-method_container').on('click', '.remove-payment_method_btn', function(){
            const paymentmethodID = $(this).data('paymentmethod_id');

            $(`#accounting-payment-modal .payment-method_${paymentmethodID}`).remove();
        });

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
                        if( $('#preview-content #payment-record_table tbody tr td').length == 1 ) {
                            $('#preview-content #payment-record_table tbody').empty();
                            window.location = window.location;
                        } else {
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

                            $('#preview-content #payment-record_table tbody').append(paymentTableContent);
                        }
                        
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

        var selectedPaymentMethodID = null;
        $('#preview-content #payment-record_table').on('click', '.delete-payment_method_record', function() {
            const id = $(this).data('id');
            selectedPaymentMethodID = id;
            
            $('#delete-modal').modal('show');
        });

        $('.accounting_tab #delete-modal').on('click', '#process-delete', async function(){
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

                        if( $('#preview-content #payment-record_table tbody tr td').length >= 1 ) {
                            $('.accounting_tab #delete-modal #cancel-btn').click();
                        } else {
                            window.location = window.location
                        }
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

        // Invoice
        $('.invoice-container').on('click', '#export-btn', async function(){
            // get user token
			const userToken = await getUserToken();
            
            const formData = { 
                course_enrollment_id: courseEnrollmentID 
            };

            await axios.post(`${getApiUrl()}/course/export-accounting-pdf`, formData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    
                    if ( res.data.success ) {
                        console.log(res.data);
                        toastTopEnd("Success", res.data.message, "success");

                        // Assuming response is your JSON response
                        var base64String = res.data.file;

                        // Create a Blob from the base64 string
                        var blob = b64toBlob(base64String, 'application/pdf');

                        // Create a temporary URL for the blob
                        var url = window.URL.createObjectURL(blob);

                        // Create a link and trigger the download
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = res.data.filename;
                        document.body.appendChild(a);
                        a.click();

                        // Clean up: remove the temporary URL and the created link
                        window.URL.revokeObjectURL(url);
                        document.body.removeChild(a);
                    } else {
                        toastInfo("Cant' Process", res.data.message, "warning");

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

            $(this).val("");
        });
        // End of Invoice

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