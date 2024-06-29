 @extends('theme::layouts.app')


@section('content')
<div class="page-container min-vh-80">
    <x-page-content-heading 
        heading="Accounting - {{ optional($entry['invoice_item']['invoice'])['invoice_number'] ?? '-' }}" 
        withButton="false"
        withIcon="false"
        icon="plus"
    />
    <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4 mt-4" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" role="tab">DETAILS</a>
        </li>
    </ul>
    <div>
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
                        <tr>
                            <th class="table-body-row">{{ optional($entry['invoice_item']['invoice'])['invoice_number'] ?? '-' }}</th>
                            <td class="table-body-row">{{ optional($entry['user'])['name'] }}</td>
                            <td class="table-body-row">{{ optional($entry['user'])['email'] }}</td>
                            <td class="table-body-row">{{ optional($entry['user']['student_information'])['phone'] ?? '-' }}</td>
                            <td class="table-body-row">{{ optional($entry['user']['student_information'])['address'] ?? '-' }}</td>
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
                        <th class="table-header">TOTAL FEE (RM)</th>
                        <th class="table-header">PAYMENT DATE</th>
                        <th class="table-header"></th>
                        <th class="table-header" style="width: 25px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $entry['payments'] as $payment )
                            <tr>
                                <th class="table-body-row">{{ $payment['payment_method_label'] }}</th>
                                <td class="table-body-row">{{ $payment['total_fee'] }}</td>
                                <td class="table-body-row">{{ formatDate($payment['payment_date']) }}</td>
                                <td class="table-body-row">
                                    <div class="d-flex align-items-center gap-4">
                                        @if( $payment['attachment'] )
                                            <div class="table-row-img">
                                                <img src="{{ $payment['image_path'] }}" alt="" style="width: 61px;">
                                            </div>
                                            <div>
                                                <p>{{ $payment['attachment'] }}</p>
                                                <p>Uploaded on {{ formatDate($payment['updated_at'], 'd/m/Y') }} at {{ formatDate($payment['updated_at'], 'h:i') }}</p>
                                                <p>{{ $payment['attachment_size'] }}</p>
                                            </div>
                                        @endif
                                        <div class="d-flex gap-3">
                                            @if( $payment['attachment'] )
                                                <span style="color: #7A7A7A;" class="cursor-pointer download-img_btn" data-src="{{ $payment['image_path'] }}" data-filename="{{ $payment['attachment'] }}">
                                                    <x-svg-icon icon="download" />
                                                </span>
                                            @endif
                                            <span style="color: #7A7A7A;" class="cursor-pointer delete-payment_method_record" data-id="{{ $payment['id'] }}">
                                                <x-svg-icon icon="trash" />
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
            <div class="w-100 mt-4 mb-4 invoice-container">
                <div class="col-6 mb-4" style="padding: 0px;color: #636363">
                    <div class="form-inline">
                        <div class="form-group">
                            <label class="form-label" style="color: #636363;font-size: 14px;">Remarks</label>
                            <textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" readonly>{{ $entry['remarks'] }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-6" style="padding: 0px;color: #636363">
                    <div class="form-inline">
                        <div class="d-flex d-flex gap-3">
                            <label class="form-label" style="color: #636363;font-size: 14px;">Attachment</label>
                            <input type="file">
                        </div>
                    </div>
                </div> -->
            </div>
            <hr>
            <div class="w-100 mt-4 invoice-container">
                <div class="d-flex justify-content-between">
                    <h2 class="section-title">Invoice</h2>
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
                        <div class="text-right invoice-payment_date">{{ formatDate(optional($entry['invoice_item']['invoice'])['date'], 'F j, Y') }}</div>
                    </div>
                </div>
                <div class="invoice-product_details">
                    <table class="table">
                        <thead style="border-bottom: 1px solid #d5d5d5;">
                            <tr>
                            <th class="table-header">ITEM</th>
                            <th class="table-header">PRICE</th>
                            <th class="table-header">QUANTITY</th>
                            <th class="table-header">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $entry['all_filtered_student_classes'] as $studentClasses )
                                <tr>
                                    <th class="table-body-row">
                                        <div>
                                            <p>{{ optional($studentClasses['class']['course'])['course_name'] }}</p>
                                            <p>{{ optional($studentClasses['class']['course']['level'])['name'] }}</p>
                                            <p>({{ optional($studentClasses['class'])['formated_start_date'] }}  {{ optional($studentClasses['class'])['start_time'] }} - {{ optional($studentClasses['class'])['end_time'] }})</p>
                                        </div>
                                    </th>
                                    <td class="table-body-row">{{ optional($studentClasses['class']['course'])['course_full_price'] }}</td>
                                    <td class="table-body-row">1</td>
                                    <td class="table-body-row">${{ optional($studentClasses['class']['course'])['course_full_price'] }}</td>
                                </tr>
                            @endforeach
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
                            <p style="font-size: 15px; font-weight: 500; color: #7A7A7A;" class="payment-detail_subtotal">${{ $entry['total_fee'] }}</p>
                            <p style="font-size: 18px; font-weight: 500; color: #3B3B3B;" class="payment-detail_total">${{ $entry['total_fee'] }}</p>
                        </div>
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
                                        label="TOTAL FEE (RM)" 
                                        type="text" 
                                        name="total_fee"
                                        id="total_fee"
                                        isRequired="true"
                                        customClass="amount-input"
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
@endsection

@section('style')
<style>
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
        grid-template-columns: repeat(4, 1fr); /* Two columns */
        gap: 10px; /* Gap between grid items */
    }
</style>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
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

            const systemData = <?= json_encode($entry) ?>;

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
            formData['course_enrollment_id'] = systemData.id
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
                            let imgContent = '';
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
                                    <th class="table-body-row">${payment.payment_method}</th>
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

                        if( $('#preview-content #payment-record_table tbody tr td').length >= 1 ) {
                            $('#delete-modal #cancel-btn').click();
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
                                    <label class="grid-item d-flex gap-2 align-items-center" for="cash-${id}">
                                        <input type="checkbox" name="payment_method" value="Cash" id="cash-${id}" data-paymentmethod_id="${id}" checked>
                                        <span>Cash</span>
                                    </label>
                                    <label class="grid-item d-flex gap-2 align-items-center" for="cheque-${id}">
                                        <input type="checkbox" name="payment_method" value="Cheque" id="cheque-${id}" data-paymentmethod_id="${id}">
                                        <span>Cheque</span>
                                    </label>
                                    <label class="grid-item d-flex gap-2 align-items-center" for="bank_transfer-${id}">
                                        <input type="checkbox" name="payment_method" value="Bank Transfer" id="bank_transfer-${id}" data-paymentmethod_id="${id}">
                                        <span>Bank Transfer</span>
                                    </label>
                                    <label class="grid-item d-flex gap-2 align-items-center" for="fps-${id}">
                                        <input type="checkbox" name="payment_method" value="FPS" id="fps-${id}" data-paymentmethod_id="${id}">
                                        <span>FPS</span>
                                    </label>
                                    <label class="grid-item d-flex gap-2 align-items-center" for="pay_me-${id}">
                                        <input type="checkbox" name="payment_method" value="PayMe" id="pay_me-${id}" data-paymentmethod_id="${id}">
                                        <span>PayMe</span>
                                    </label>
                                    <label class="grid-item d-flex gap-2 align-items-center" for="others-${id}">
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
                                        label="TOTAL FEE (RM)" 
                                        type="text" 
                                        name="total_fee"
                                        id="total_fee"
                                        isRequired="false"
                                        customClass="amount-input"
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