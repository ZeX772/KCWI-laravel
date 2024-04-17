@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Invoices"
        withButton="false"
    />
    <div class="row mt-2 p-2">
        <!-- Student List | Left - Table Section -->
        <div class="col-xxl-9 page-content-col1">
            <div class="tab-content p-3 pt-4">
 				<div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
					<div class="row template-filter-tab">
						<div class="col-10 position-relative">
							<x-search-input inputType="text" inputName="invoice_search" inputID="invoice_search" inputPlaceholder="Search..." />
						</div>
						<div class="col-2">
							<x-form-select
								label="" 
								name="action"
								id="bulk_action_btn"
								isRequired="true"
							>
								<option value="" hidden>Actions</option>
								<option value="generate-pdf">Generate PDF</option>
								<option value="print">Print</option>
								<option value="refund">Refund</option>
								<option value="send-notification">Send Notification</option>
								<option value="payment">Bulk Payment</option>
							</x-form-select>
						</div>
					</div>
					<div class="table-responsive table-custom with-custom-search mt-4">
						<table class="table table-hover w-100 custom-datatable" id="invoices-table">
							<thead>
								<tr>
									<th class="text-left"><input type="checkbox"></th>
									<th class="text-left">INVOICE NUM</th>
									<th class="text-left">DATE</th>
									<th class="text-left">STUDENT</th>
									<th class="text-left">TYPE</th>
									<th class="text-left">CONSOLIDATED</th>
									<th class="text-left">TOTAL AMOUNT (HK$)</th>
									<th class="text-left">STATUS</th>
								</tr>
							</thead>
							<tbody>
								@foreach($invoices as $key => $invoice)
									<tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="{{ $key }}">
										<td><input type="checkbox" class="check" data-id="{{ $invoice['id'] }}"></td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $invoice['invoice_number'] }}</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ date("m/d/Y", strtotime($invoice['date'])) }}</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $invoice['user']['name'] }}</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ formatString($invoice['type']) }}</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">
											@if( $invoice['consolidate_item_invoice'] )
												<a href="{{ route('wave.user.admin-main.consolidate-view', $invoice['consolidate_item_invoice']['consolidate']['id']) }}" class="text-link">{{ $invoice['consolidate_item_invoice'] ? $invoice['consolidate_item_invoice']['consolidate']['consolidate_no'] : "-" }} <i class="fa-solid fa-link"></i></a></td>
											@else
												<span>-</span>
											@endif
										</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $invoice['total_amount'] }}</td>
										<td style="font-family: Poppins, sans-serif;font-size: 12px;" class="text-{{ $invoice['status'] }}">{{ ucfirst($invoice['status']) }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
        <!-- Coach Details | Right Section -->
        <div class="col d-xxl-flex flex-column page-content-col2">
            <div class="card">
 				<div class="card-body main-page_normal_card_info">
 					<div class="col mb-4">
 						<div>
 							<h1 class="fw-semibold card-heading text-center">Invoice</h1>
 						</div>
 					</div>
 					<div class="mb-3">
 						<h1 class="fw-semibold card-sub_heading">INFORMATION</h1>
 					</div>
 					<div class="col">
 						<ul class="list-group border-none">
 							<li class="list-group-item d-xxl-flex p-0" style="border-style: none;">
 								<div class="container p-0">
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Status</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-invoice_status" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Invoice Number</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-invoice_num" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Due Date</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-due_date" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Type</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-type" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Total Amount (HK$)</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-total_amount" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">User</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-user" class="card-detail_sub_title">-</h1>
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
</div>

<!-- ADD ANNOUNCEMENT MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="notification-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Notification</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
				<form id="modal-add-form">
					<div class="col" style="width: 100%;">
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
                                    <x-form-input 
                                        label="Title" 
                                        type="text" 
                                        name="title"
                                        id="title"
                                        isRequired="true"
                                        tabindex="1"
                                        class="form-control"
                                    />
								</div>
							</div>
						</div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Content <span class="text-danger">*</span></label>
                                    <textarea id="content" name="content" tabindex="2" class="form-control" placeholder="Enter content..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
								</div>
							</div>
						</div>
						
						<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
									<label for="" class="form-label form-input-label">Send Via <span class="text-danger">*</span></label>
									<div class="d-flex gap-3">
										<div class="d-flex align-items-center gap-2">
											<input type="checkbox" name="send_via" tabindex="6" id="via-email" checked>
											<label for="via-email">Via Email</label>
										</div>
										<div class="d-flex align-items-center gap-2">
											<input type="checkbox" name="send_via" tabindex="7" id="via-app" checked>
											<label for="via-app">Via App</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" id="cancel-btn"  class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button type="button" id="save-modal-data-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
			</div>
 		</div>
 	</div>
</div>

<!-- BULK PAYMENT -->
<div class="modal fade" role="dialog" tabindex="-1" id="payment-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Payment</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
				<form id="modal-add-form">
					<div class="guardian-info mt-4">
						<h2 class="section-title mb-3">Invoices</h2>
						<table class="table" id="basic-info_table">
							<thead style="border-bottom: 1px solid #d5d5d5;">
								<tr>
									<th class="table-header">INVOICE NO.</th>
									<th class="table-header">STUDENT NAME</th>
									<th class="table-header">EMAIL</th>
									<th class="table-header">PHONE</th>
									<th class="table-header">AMOUNT</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="table-body-row">INV_00001</td>
									<td class="table-body-row">JOHN DOE</td>
									<td class="table-body-row">johndoe@gmail.com</td>
									<td class="table-body-row">+639300322049</td>
									<td class="table-body-row">$200.00</td>
								</tr>
								<tr>
									<td colspan="4" class="text-right">Total:</td>
									<td class="table-body-row table-total">$200.00</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3 select2-input">
						<x-form-select
							label="User" 
							name="user_id"
							id="user_id"
							isRequired="true"
							customClass="select2"
						>
							@foreach($users as $user)
								<optgroup label="{{ $user['label'] }}">
									@foreach($user['list'] as $list)
										<option value="{{ $list['id'] }}">{{ $list['name'] }}</option>
									@endforeach
								</optgroup>
							@endforeach
						</x-form-select>
					</div>
					<!-- <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
						<x-form-input
							label="Amount"
							type="text"
							name="amount"
							id="amount"
							isRequired="true"
						/>
					</div> -->

					<label for="card-element">
						Credit or debit card
					</label>

					<div id="card-element">
						<!-- A Stripe Element will be inserted here. -->
					</div>

					<!-- Used to display form errors. -->
					<div id="card-errors" role="alert"></div>
				</form>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" id="cancel-btn"  class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button type="button" id="paynow-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Pay Now</button>
			</div>
 		</div>
 	</div>
</div>

<!-- REFUND CONFIRMATION -->
<div class="modal fade" role="dialog" tabindex="-1" id="payment-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Payment</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
				<form id="modal-add-form">
					<div class="guardian-info mt-4">
						<h2 class="section-title mb-3">Invoices</h2>
						<table class="table" id="basic-info_table">
							<thead style="border-bottom: 1px solid #d5d5d5;">
								<tr>
									<th class="table-header">INVOICE NO.</th>
									<th class="table-header">STUDENT NAME</th>
									<th class="table-header">EMAIL</th>
									<th class="table-header">PHONE</th>
									<th class="table-header">AMOUNT</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="table-body-row">INV_00001</td>
									<td class="table-body-row">JOHN DOE</td>
									<td class="table-body-row">johndoe@gmail.com</td>
									<td class="table-body-row">+639300322049</td>
									<td class="table-body-row">$200.00</td>
								</tr>
								<tr>
									<td colspan="4" class="text-right">Total:</td>
									<td class="table-body-row table-total">$200.00</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3 select2-input">
						<x-form-select
							label="User" 
							name="user_id"
							id="user_id"
							isRequired="true"
							customClass="select2"
						>
							@foreach($users as $user)
								<optgroup label="{{ $user['label'] }}">
									@foreach($user['list'] as $list)
										<option value="{{ $list['id'] }}">{{ $list['name'] }}</option>
									@endforeach
								</optgroup>
							@endforeach
						</x-form-select>
					</div>
					<!-- <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
						<x-form-input
							label="Amount"
							type="text"
							name="amount"
							id="amount"
							isRequired="true"
						/>
					</div> -->

					<label for="card-element">
						Credit or debit card
					</label>

					<div id="card-element">
						<!-- A Stripe Element will be inserted here. -->
					</div>

					<!-- Used to display form errors. -->
					<div id="card-errors" role="alert"></div>
				</form>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" id="cancel-btn"  class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button type="button" id="paynow-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Pay Now</button>
			</div>
 		</div>
 	</div>
</div>
@endsection

<style>
    .text-link {
        color: #4a56ff;
    }

	.select2-input .form-group {
		display: flex;
    	flex-direction: column;
	}

	/* Stripe Card Element styles */
    .StripeElement {
        color: #3B3B3B;
		font-size: 14px;
		font-family: Nunito, sans-serif;
		background: #F5F5F5;
		border-style: none;
		border-radius: 0.375rem;
		padding: 1rem 0.75rem;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.4);
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }

	#card-errors {
		color: #eb1c26;
	}

	/* Modal Table Style */
	/* .section-title {
        font-size: 24px;
        font-weight: 500;
        color: #3B3B3B;
    } */

	#payment-modal .table-header {
        font-size: 14px;
        font-weight: 700;
        color: #7A7A7A;
        padding-left: 0 !important;
    }

    #payment-modal .table-body-row {
        font-size: 14px;
        font-weight: 400;
        color: #3B3B3B;
        padding-left: 0 !important;
    }

	#payment-modal .table-total {
		font-weight: 700;
    	font-size: 15px;
	}

	/* Text Colors */
	/* processing, completed, waiting, unsuccessful, refunding, refunded */

	.text-refunded,
    .text-failed,
    .text-cancelled {
        color: #ab0606 !important;
        font-weight: 700 !important;
    }

    .text-refunding {
        color: #b1b50b !important;
        font-weight: 700 !important;
    }

    .text-completed {
        color: #72bb00 !important;
        font-weight: 700 !important;
    }

    .text-processing,
	.text-waiting {
        color: #b3b3b3 !important;
        font-weight: 700 !important;
    }
</style>

@section('script')

<!-- Custom JS -->
<script type="text/javascript">
const invoices = <?= json_encode($invoices) ?>;
var selectedInvoices = [];
var errors = [];

$(function() {
	tinymce.init({
        selector: '#content',
        height: 300,
        auto_focus: '#tinymce'
        // other configuration options...
    });

	$('.select2').select2({
		dropdownParent: $('#payment-modal')
	});

	var table = $('#invoices-table').DataTable({
		"paging": true,
		"ordering": true,
		"info": true,
		"aaSorting": [],
		"orderMulti": true,
		"searching": true,
		"lengthChange": false,
		"columns": [
			{"orderable": false, "searchable": false},
			{"orderable": true, "searchable": true},
			{"orderable": true, "searchable": false},
			{"orderable": true, "searchable": true},
			{"orderable": true, "searchable": false},
			{"orderable": true, "searchable": false},
			{"orderable": true, "searchable": true},
			{"orderable": true, "searchable": false}
		]
	});

	$('#invoices-table').on('click', 'tr', function() {
        const rowIndex = $(this).data('row_index');
        const rowData = invoices[rowIndex];

        $('#detail-invoice_status').text(`${rowData.status.charAt(0).toUpperCase()}${rowData.status.slice(1)}`);
		
		$('#detail-invoice_status').removeAttr('class');
		$('#detail-invoice_status').addClass(`card-detail_sub_title`);
		$('#detail-invoice_status').addClass(`text-${rowData.status}`);

		$('#detail-invoice_num').text(rowData.invoice_number);
        var dueDate = new Date(rowData.due_date);
		$('#detail-due_date').text(dueDate.toLocaleString('en'));
		$('#detail-type').text(`${rowData.type.charAt(0).toUpperCase()}${rowData.type.slice(1)}`);
		$('#detail-total_amount').text(rowData.total_amount);
		$('#detail-user').text(rowData.user.name);
    });

	$('#invoice_search').on('keyup', function() {
        var searchTerm = $(this).val();

        table.search(searchTerm).draw();
    });

	var systemInvoices = <?= json_encode($invoices) ?>;
	var selectedInvoicesID = [];
    $('#bulk_action_btn').on('change', function() {
        const value = $(this).val();

		switch(value) {
			case 'generate-pdf' :
				$(this).val('');
				bulkGeneratePdf();
			break;
			case 'print' :
				$(this).val('');
				bulkPrintInvoices();
			break;
			case 'refund' :
				$(this).val('');
				refundInvoice();
			break;
			case 'send-notification' :
				$(this).val('');
				selectedInvoices = [];
				$('#invoices-table tbody tr .check:checked').each(function() {
					selectedInvoices.push($(this).data('id'));
				});

    			var notificationModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('notification-modal'));
				notificationModal.show();
			break;
			case 'payment' :
				$(this).val('');
				// get all selected invoice
				selectedInvoicesID = [];
				hasPaidInvoice = [];
				$('#invoices-table tbody .check:checked').each(function(){
					if( $(this).is(":checked") ) {
						selectedInvoicesID.push($(this).data('id'));

						selectedInvoice = systemInvoices.find(value => value.id == $(this).data('id'));
						if( selectedInvoice.status == "completed" )
							hasPaidInvoice.push($(this).data('id'));
					}
				});

				if( selectedInvoicesID.length <= 0 ) {
					toastInfo("Warning", "Cannot process your request, please make sure there's an invoice selected", "warning");
					return;
				}

				if( hasPaidInvoice.length > 0 ) {
					toastInfo("Warning", "Cannot process your request, please make sure there's no already completed invoice on you'r selected invoice", "warning");
					return;
				}

				var notificationModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('payment-modal'));
				notificationModal.show();

				bulkPayment(selectedInvoicesID);
			break;
		}

		$(this).val('');
	});

	$('#notification-modal #save-modal-data-btn').on('click', function() {
		$(this).attr('disabled', 'true');
        var content = tinymce.get('content').getContent();
		$('#notification-modal #content').val(content);
        const formData = $('#notification-modal #modal-add-form').serializeArray();

		if( processNotificationErrorValidation(formData) ) {
            $(this).removeAttr('disabled');

            return;
        }

        let transformedData = {};

		formData.forEach(function(item) {
            if(item.name === 'send_via') {
				var sendvia = [];
				$('#notification-modal input[name="send_via"]:checked').each(function() {
					sendvia.push($(this).attr('id').replace('via-', ''));
				});

				transformedData[item.name] = sendvia;
            } else {
                transformedData[item.name] = item.value;
            }
        });


		transformedData['selected_invoices'] = selectedInvoices
		
		bulkSendNotifications(transformedData);
	});

	$('#payment-modal').on('click', '#paynow-btn', function(){
		$('#payment-modal #modal-add-form').submit();
	});

	$('#payment-modal').on('submit', '#modal-add-form', async function(e){
		e.preventDefault();
		$('#payment-modal #paynow-btn').prop('disabled', true);
		
		const formData = $('#payment-modal #modal-add-form').serializeArray();

		const requiredFields = ['user_id'];
		if( processErrorValidation(formData, requiredFields, 'payment-modal') ) {
            $('#payment-modal #paynow-btn').removeAttr('disabled');

            return;
        }
		
		let stripeToken = "";
		await stripe.createToken(card).then(function(result) {
			if (result.error) {
				// Inform the user if there was an error.
				var errorElement = document.getElementById('card-errors');
				errorElement.textContent = result.error.message;

			} else {
				// Send the token to your server.
				stripeToken = result.token.id

				let requestBody = {};

				formData.forEach(element => {
					requestBody[element.name] = element.value
				});

				requestBody['items'] = selectedInvoicesID;
				requestBody['payment_method'] = "Card";
				requestBody['stripe_token'] = stripeToken;
				requestBody['paid_amount'] = parseFloat(totalAmount) * 100;

				processPayment(requestBody);
			}
		});
	})

	async function bulkGeneratePdf()
	{
		const checkedInvoices = $('#invoices-table tbody tr .check:checked');
		if( checkedInvoices.length <= 0 ) {
            toastInfo("Warning", "Cannot process your request, please make sure there's an invoice selected", "warning");
            return;
        }

		const userToken = await getUserToken();

		let invoices = [];
        checkedInvoices.each(function() {
            invoices.push({id: $(this).data('id')});
        });

		await axios.post(`${getApiUrl()}/invoices/bulk-generate-pdf`, invoices, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
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
                toastInfo("Cant' Save", res.data.message, "warning");
            }
        }).catch(error => {
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
	}

	async function bulkSendNotifications(transformedData)
	{
		const userToken = await getUserToken();

		await axios.post(`${getApiUrl()}/invoices/bulk-send-notification`, transformedData, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            $('#notification-modal #cancel-btn').click();

            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                window.location = window.location
            } else {
                toastInfo("Cant' Save", res.data.message, "warning");

                $(this).removeAttr('disabled');
            }
        }).catch(error => {
			$('#notification-modal #save-modal-data-btn').removeAttr('disabled');
            
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
	}

	async function bulkPrintInvoices()
	{
		const checkedInvoices = $('#invoices-table tbody tr .check:checked');
		if( checkedInvoices.length <= 0 ) {
            toastInfo("Warning", "Cannot process your request, please make sure there's an invoice selected", "warning");
            return;
        }

		const userToken = await getUserToken();

		let invoices = [];
        checkedInvoices.each(function() {
            invoices.push({id: $(this).data('id')});
        });

		await axios.post(`${getApiUrl()}/invoices/bulk-generate-pdf`, invoices, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                // Assuming response is your JSON response
				var base64String = res.data.file;

				// Create a link and trigger the download
				$('body').append(`<iframe src="data:application/pdf;base64,${base64String}" id="invoices-iframe" height="100%" width="100%" style="display: none"></iframe`);
            } else {
                toastInfo("Cant' Save", res.data.message, "warning");
            }
        }).catch(error => {
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
	}

	var formData = {};
	async function refundInvoice()
	{
		const checkedInvoices = $('#invoices-table tbody tr .check:checked');

		if( checkedInvoices.length <= 0 ) {
            toastInfo("Warning", "Cannot process your request, please make sure there's an invoice selected", "warning");
            return;
        }

		if( checkedInvoices.length > 1 ) {
            toastInfo("Warning", "Can't refund in bulk", "warning");
            return;
        }

		let systemInvoices = <?= json_encode($invoices) ?>;
		// check if the selected invoice is competition
		let invoiceSelected = {};
		let hasWarning = false;
		checkedInvoices.each(function(){
			const ID = $(this).data('id');

			const selectedInvoice = systemInvoices.find(value => value.id == ID);

			if( selectedInvoice ) {
				if( selectedInvoice.type == 'competition_enrollment' ) {
					toastInfo("Warning", "Competition refund is not available", "warning");
					hasWarning = true;
					return;
				}
				
				// check if the invoice is paid or not
				if( selectedInvoice.status !== 'completed' ) {
					toastInfo("Warning", "Only paid invoice can be refunded", "warning");
					hasWarning = true;
					return;
				}

				invoiceSelected = selectedInvoice
			}
		});

		if( invoiceSelected.items.length <= 0 ) {
			toastInfo("Warning", "Selected invoice doesn't have items", "warning");
			hasWarning = true;
		}

		if( hasWarning )
			return;

		formData = {
			user_id: invoiceSelected.user_id,
			package_id: invoiceSelected.items[0].course_enrollment_item.package_id,
			course_enrollment_id: invoiceSelected.items[0].course_enrollment_item.id,
			reason: "Refund from Invoice",
			refund_amount: invoiceSelected.total_amount,
			from: 'invoice',
			invoice_id: invoiceSelected.id
		}

		Swal.fire({
			title: "Are you sure?",
			text: "We will process your request, and you won't be able to cancel it!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, refund it!"
		}).then((result) => {
			if (result.isConfirmed) {
				processInvoiceRefund()
			}
		});
	}

	async function processInvoiceRefund()
	{
		const userToken = await getUserToken();

		await axios.post(`${getApiUrl()}/request/create-course-withdrawal`, formData, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                window.location = window.location
            } else {
                toastInfo("Cant' process request", res.data.message, "warning");
            }
        }).catch(error => {
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
	}

	let totalAmount = 0.00;
	function bulkPayment(selectedInvoicesID)
	{
		// remove initial values
		$('select[name=user_id]').val('').trigger('change');

		totalAmount = 0.00;

		//* loop the selected invoices and render the details to the modal table
		$('#basic-info_table tbody').empty();

		selectedInvoicesID.forEach(element => {
			selectedInvoice = systemInvoices.find(value => value.id == element);
			
			const tableRow = `<tr>
									<td class="table-body-row">${selectedInvoice.invoice_number}</td>
									<td class="table-body-row">${selectedInvoice.user.name}</td>
									<td class="table-body-row">${selectedInvoice.user.email}</td>
									<td class="table-body-row">${selectedInvoice.user.student_information.phone}</td>
									<td class="table-body-row">${"$" + selectedInvoice.total_amount}</td>
								</tr>`;
			$('#basic-info_table tbody').append(tableRow);

			totalAmount += parseFloat(selectedInvoice.total_amount);
		});

		$('#basic-info_table tbody').append(`
								<tr>
									<td colspan="4" class="text-right">Total:</td>
									<td class="table-body-row table-total">${totalAmount.toFixed(2)}</td>
								</tr>`);

		$('input[name=amount]').val(totalAmount.toFixed(2));

	}

	var stripe = Stripe('pk_test_51OrdGsBoUTviknMArCouPyNuRRQbUfA0EfkSg0SaufbEA7iJAIbz1yODj6SW0zVngNFL77SmIRiBpJNgdSlVgPVt00TKoGNblF');
	var elements = stripe.elements();
	var card = elements.create('card');
	function initializeStripe()
	{
		card.mount('#card-element');

		card.on('change', function(event) {
			var displayError = document.getElementById('card-errors');
			if (event.error) {
				displayError.textContent = event.error.message;
			} else {
				displayError.textContent = '';
			}
		});
	}

	async function processPayment(transformedData)
	{
		const userToken = await getUserToken();
		console.log(userToken);
		await axios.post(`${getApiUrl()}/payment/process-invoice-payment`, transformedData, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                window.location = window.location
            } else {
                toastInfo("Cant' process request", res.data.message, "warning");

                $('#payment-modal #paynow-btn').removeAttr('disabled');
            }
        }).catch(error => {
			$('#payment-modal #paynow-btn').removeAttr('disabled');
            
            if( error.response.status == 422 || error.response.status == 406 ) {
                let errorMessages = "";
                Object.keys(error.response.data.errors).forEach(key => {
                    error.response.data.errors[key].forEach(value => {
                        errorMessages += (`<p>${key}: ` + value + '</p><br>')

                        toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                    });
                });
            }

            if( error.response.status == 404 || error.response.status == 400 ) {
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

	initializeStripe()

	// * VALIDATION FUNCTIONS
	function processNotificationErrorValidation(formData, formID = 'notification-modal') {
        const requiredFields = ['title', 'content', 'send_via'];

        errors.forEach((element) => {
            if(recipientFields.includes(element.field_name)) {
                var fieldSelector = $(`#notification-modal #${element.field_name.replace('selected', 'select').replace('-container', '')}`);
            } else {
                var fieldSelector = $(`[name="${element.field_name}"]`);
                if(element.field_name === 'send_via' || element.field_name === 'notification_types[]') {
                    fieldSelector = $($(`[name="${element.field_name}"]`)[0]);
                }

                // Clear the errors first
                fieldSelector.removeClass('border border-danger');
                fieldSelector.removeClass('border border-danger');
            }

            if ( fieldSelector.next().is('p') )
                fieldSelector.next().remove();

            if ( fieldSelector.parent().next().is('p') )
                fieldSelector.parent().next().remove();

            if(element.field_name === 'send_via' || element.field_name === 'notification_types[]') {
                fieldSelector.closest('.container').find('p').remove();
            }
        });

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

        const send_via = formData.find((item) => item.name === 'send_via');
        if(!send_via) {
            errors.push({
                field_name: 'send_via',
                message: 'Send Via is required.'
            });
        }

        if ( errors.length > 0 ) {
            renderErrors(formID);

            return true;
        }

        return false;
    }

	function processErrorValidation(formData, requiredFields, formID) {
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
			renderErrors(formID);

			return true;
		}

		return false;
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

	function renderErrors(modalName) {
        if ( errors.length > 0 ) {
            errors.forEach((element) => {
                const fieldSelector = $(`#${modalName} [name="${element.field_name}"]`);
                // Clear the errors first
                fieldSelector.removeClass('border border-danger');
                fieldSelector.removeClass('border border-danger');

                if ( fieldSelector.next().is('p') )
                    fieldSelector.next().remove();

                if ( fieldSelector.parent().next().is('p') )
                    fieldSelector.parent().next().remove();

                fieldSelector.addClass('border border-danger');
                fieldSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
            });
        }
    }

	$('#payment-modal').on('input', 'input[name=amount]', function(){
		var value = $(this).val();
		if (!/^\d*(\.\d{0,2})?$/.test(value)) {
			// If the input does not match the desired format, remove the last character
			$(this).val(value.slice(0, -1));
		}
	});
});
</script>
@endsection