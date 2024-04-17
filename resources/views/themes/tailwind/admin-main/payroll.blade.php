@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Payroll" 
        :withButton="false"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#place-video-modal" 
        buttonType="button"
        buttonId="video-modal_id"
        buttonTitle="Place Video"
    />
    <div class="row mt-1">
        <div class="col-xxl-12">
            <div class="row pl-3">
                <div class="col-12 page-content-col">
                    <div class="p-3">
                        <div class="row">
                            <form class="col-5" method="GET">
                                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                    <x-form-input
                                        label="Start Date"
                                        type="date"
                                        name="start_date"
                                        id="start_date"
                                        isRequired="true"
                                        required="required"
                                        value="{{ request('start_date') }}"
                                    />
                                    <x-form-input
                                        label="End Date"
                                        type="date"
                                        name="end_date"
                                        id="end_date"
                                        isRequired="true"
                                        required="required"
                                        value="{{ request('end_date') }}"
                                    />
                                </div>
                                <div class="container d-xxl-flex align-items-xxl-end form-input-container gap-4 mb-3">
                                    <x-form-select
                                        label="Coach" 
                                        name="coach"
                                        id="coach"
                                        isRequired="true"
                                        required="required"
                                    >
                                        <option value="" hidden>Coach</option>
                                        <option value="all" {{ request('coach') == 'all' || request('coach') == '' ? 'selected' : '' }}>All</option>
                                        @foreach( $entries['coaches'] as $entry )
                                            <option value="{{ $entry['id'] }}" {{ request('coach') == $entry['id'] ? 'selected' : '' }}>{{ $entry['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                    <div>
                                        <x-primary-button type="submit" id="save-form_btn" title="Filter" toggle="" target=""/>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="page-content-col mt-3" style="overflow: hidden;">
                            <div class="d-flex justify-content-between p-3">
                                <div class="d-flex align-items-center gap-3">
                                    <p>
                                        <span>Start Date:</span>
                                        <span class="fw-bold">{{ request('start_date') ? formatDate(request('start_date'), 'm/d/Y (D)') : '-' }}</span>
                                    </p>
                                    <p>
                                        <span>End Date:</span>
                                        <span class="fw-bold">{{ request('start_date') ? formatDate(request('end_date'), 'm/d/Y (D)') : '-' }}</span>
                                    </p>
                                    <p>
                                        <span>Coach:</span>
                                        <span class="fw-bold selected-coach_name">All</span>
                                    </p>
                                </div>
                                <div class="d-flex gap-3">
                                    <x-secondary-button type="button" id="export-btn" title="Export" dismiss=""/>
                                    <x-secondary-button type="button" id="refresh-btn" title="Refresh" dismiss=""/>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive table-custom with-custom-search mt-4">
                                    <table class="table table-hover w-100" id="payroll-table">
                                        <thead>
                                            <tr>
                                                <th class="text-left" style="padding-left: 20px">COACH NAME</th>
                                                <th class="text-left">PAYMENT METHOD</th>
                                                <th class="text-left">BANK</th>
                                                <th class="text-left">RATE OF PAY</th>
                                                <th class="text-left">ATTENDANCE</th>
                                                <th class="text-left">TOTAL SALARY</th>
                                                <th class="text-left">LAST UPDATED DATE & TIME</th>
                                                <th class="text-left">STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach( $entries['payrolls'] as $entry )
                                                <tr class="view-btn" data-status="{{ $entry['status'] }}" data-id="{{ $entry['id'] }}">
                                                    <td class="text-left" style="padding-left: 20px">{{ $entry['user']['name'] }}</td>
                                                    <td class="text-left">{{ $entry['user']['coach_details']['payment_method'] }}</td>
                                                    <td class="text-left">{{ $entry['user']['coach_active_bank_details']['bank_account_name'] }}</td>
                                                    <td class="text-left">{{ $entry['user']['coach_details']['payment_type'] }}</td>
                                                    <td class="text-left">{{ $entry['days_of_attendance'] }}</td>
                                                    <td class="text-left">{{ $entry['total_amount'] }}</td>
                                                    <td class="text-left">{{ formatDate($entry['updated_at'], 'm/d/Y h:i A') }}</td>
                                                    <td class="text-left {{ $entry['status'] == 'draft' ? 'text-scondary' : ($entry['status'] == 'paid' ? 'text-success' : 'text-warning') }}">{{ $entry['status_label'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payroll Detail Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="payroll-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4 pb-0">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Payment Details</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div>
                        <p class="fw-bold">Status:</p>
                        <p class="text-success details-status">Paid</p>
                    </div>
                    <div class="mt-3">
                        <p class="fw-bold">Classes:</p>
                        <div class="border">
                            <div class="table-responsive table-custom with-custom-search">
                                <table class="table table-hover w-100 m-0" id="classes-list_table">
                                    <thead>
                                        <tr class="table-active">
                                            <th class="text-left" style="padding-left: 20px">CLASS</th>
                                            <th class="text-left">COURSE</th>
                                            <th class="text-left">PAY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="view-btn">
                                            <td class="text-left" style="padding-left: 20px">
                                                <div>
                                                    <p>Ripple Beginner 1 - Class #3</p>
                                                    <p>2023-01-18 16:00 - 16:55</p>
                                                    <p><span class="fw-bold">Duration:</span> 0.91666666666667 hour(s)</p>
                                                </div>
                                            </td>
                                            <td class="text-left">
                                                <div>
                                                    <p>Ripple Beginner 1</p>
                                                    <p>Ripple Beginner 1</p>
                                                </div>
                                            </td>
                                            <td class="text-left">
                                                <div>
                                                    <p class="fw-bold">Amount:</p>
                                                    <p>$0.00</p>
                                                    <p class="fw-bold">Remarks:</p>
                                                    <p>This is remarks</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="fw-bold">Addition <span class="text-success">(+)</span>:</p>
                        <div class="border">
                            <div class="table-responsive table-custom with-custom-search">
                                <table class="table table-hover w-100 m-0" id="addition-list_table">
                                    <thead>
                                        <tr class="table-active">
                                            <th class="text-left" style="padding-left: 20px; width: 300px">AMOUNT</th>
                                            <th class="text-left">REMARKS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="view-btn">
                                            <td class="text-left text-success" style="padding-left: 20px">$10,000.00</td>
                                            <td class="text-left">Monthly Salary for 2023-01</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="fw-bold">Deduction <span class="text-danger">(-)</span>:</p>
                        <div class="border">
                            <div class="table-responsive table-custom with-custom-search">
                                <table class="table table-hover w-100 m-0" id="deduction-list_table">
                                    <thead>
                                        <tr class="table-active">
                                            <th class="text-left" style="padding-left: 20px; width: 300px">AMOUNT</th>
                                            <th class="text-left">REMARKS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="view-btn">
                                            <td class="text-left text-danger" style="padding-left: 20px">$5,000.00</td>
                                            <td class="text-left">Leave</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="border rounded  mt-5">
                        <div class="row">
                            <div class="col-6">
                                <div class="p-3">
                                    <div>
                                        <p class="fw-bold">Remarks:</p>
                                        <p class="details-remarks">bank 1-22</p>
                                    </div>
                                    <div>
                                        <p class="fw-bold">Payment Method:</p>
                                        <p class="details-payment_method">Uprise Payment</p>
                                    </div>
                                    <div>
                                        <p class="fw-bold">Payment Bank:</p>
                                        <p class="details-bank_name">Hang Seng</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-end p-3">
                                    <div class="d-flex flex-column w-75">
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Coach rate:</p>
                                            <p class="w-25 text-center" id="total-coach_rate">$5000</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Payment type:</p>
                                            <p class="w-25 text-center" id="total-payment_type">Monthly</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Classes:</p>
                                            <p class="w-25 text-center" id="total-classes_count">3</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Class attendanded:</p>
                                            <p class="w-25 text-center" id="total-classes_attended">1</p>
                                        </div>
                                        <!-- <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Classes Subtotal:</p>
                                            <p class="w-25 text-center" id="total-classes_subtotal">$11</p>
                                        </div> -->
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Additions subtotal:</p>
                                            <p class="w-25 text-center" id="total-additions_subtotal">$0</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Deduction subtotal:</p>
                                            <p class="w-25 text-center" id="total-deductions_subtotal">-$10</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75 fw-bold">Total:</p>
                                            <p class="w-25 text-center fw-bold" id="total-amount">$5000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-4">
                    <!-- <x-primary-button type="button" id="cancel-payroll_btn" title="Cancel" toggle="" target=""/> -->
                    <x-secondary-button type="button" id="addition-btn" title="Cancel" dismiss="modal"/>
                    <x-primary-button type="button" id="paid-form_btn" title="Generate Payslip" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payroll Detail Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="payroll-update_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4 pb-0">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Update Payment</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div>
                        <p class="fw-bold"><u>Pay Date:</u></p>
                        <p>01-26-2024</p>
                    </div>
                    <div class="mt-3">
                        <p class="fw-bold">Classes:</p>
                        <div class="border">
                            <div class="table-responsive table-custom with-custom-search">
                                <table class="table table-hover w-100 m-0" id="classes-list_table">
                                    <thead>
                                        <tr class="table-active">
                                            <th class="text-left" style="padding-left: 20px">CLASS</th>
                                            <th class="text-left">COURSE</th>
                                            <th class="text-left">PAY RATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="view-btn">
                                            <td class="text-left" style="padding-left: 20px">
                                                <div>
                                                    <p>Ripple Beginner 1 - Class #3</p>
                                                    <p>2023-01-18 16:00 - 16:55</p>
                                                    <p><span class="fw-bold">Duration:</span> 0.91666666666667 hour(s)</p>
                                                </div>
                                            </td>
                                            <td class="text-left">
                                                <div>
                                                    <p>Ripple Beginner 1</p>
                                                    <p>Ripple Beginner 1</p>
                                                </div>
                                            </td>
                                            <td class="text-left">
                                                <div>
                                                    <x-form-input 
                                                        label="RATE ($):" 
                                                        type="text" 
                                                        name="rate"
                                                        id="rate"
                                                        isRequired="false"
                                                        placeholder="0.00"
                                                    />
                                                    <x-form-input 
                                                        label="Remarks:" 
                                                        type="text" 
                                                        name="remarks"
                                                        id="remarks"
                                                        isRequired="false"
                                                        placeholder="Remarks here..."
                                                    />
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="fw-bold">Addition <span class="text-success">(+)</span>:</p>
                        <div class="border addition-table_container d-none">
                            <div class="table-responsive table-custom with-custom-search">
                                <table class="table table-hover w-100 m-0" id="addition-list_table">
                                    <thead>
                                        <tr class="table-active">
                                            <th class="text-left" style="padding-left: 20px; width: 300px">AMOUNT</th>
                                            <th class="text-left">REMARKS</th>
                                            <th class="text-left" style="width: 40px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <x-secondary-button type="button" id="addition-btn" title="+ Addition" dismiss=""/>
                    </div>
                    <div class="mt-3">
                        <p class="fw-bold">Deduction <span class="text-danger">(-)</span>:</p>
                        <div class="border deduction-table_container d-none">
                            <div class="table-responsive table-custom with-custom-search">
                                <table class="table table-hover w-100 m-0" id="deduction-list_table">
                                    <thead>
                                        <tr class="table-active">
                                            <th class="text-left" style="padding-left: 20px; width: 300px">AMOUNT</th>
                                            <th class="text-left">REMARKS</th>
                                            <th class="text-left" style="width: 40px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <x-secondary-button type="button" id="deduction-btn" title="- Deduction" dismiss=""/>
                    </div>
                    <div class="border rounded  mt-5">
                        <div class="row">
                            <div class="col-6">
                                <div class="p-3">
                                    <div>
                                        <p class="fw-bold">Remarks:</p>
                                        <p class="details-remarks">bank 1-22</p>
                                    </div>
                                    <div>
                                        <p class="fw-bold">Payment Method:</p>
                                        <p class="details-payment_method">Uprise Payment</p>
                                    </div>
                                    <div>
                                        <p class="fw-bold">Payment Bank:</p>
                                        <p class="details-bank_name">Hang Seng</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-end p-3">
                                    <div class="d-flex flex-column w-75">
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Coach rate:</p>
                                            <p class="w-25 text-center" id="total-coach_rate">$5000</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Payment type:</p>
                                            <p class="w-25 text-center" id="total-payment_type">Monthly</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Classes:</p>
                                            <p class="w-25 text-center" id="total-classes_count">3</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Class attendanded:</p>
                                            <p class="w-25 text-center" id="total-classes_attended">1</p>
                                        </div>
                                        <!-- <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Classes Subtotal:</p>
                                            <p class="w-25 text-center" id="total-classes_subtotal">$11</p>
                                        </div> -->
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Additions subtotal:</p>
                                            <p class="w-25 text-center" id="total-additions_subtotal">$0</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75">Deduction subtotal:</p>
                                            <p class="w-25 text-center" id="total-deductions_subtotal">-$10</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-right w-75 fw-bold">Total:</p>
                                            <p class="w-25 text-center fw-bold" id="total-amount">$5000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-4">
                    <x-primary-button type="button" id="submit-payroll_btn" title="Submit" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    #payroll-table_wrapper .row:nth-child(3) {
        margin-left: 20px !important;
    }

    .table-remove_btn {
        display: flex;
        height: 56px;
        align-items: center;
    }
</style>

@section('script')
<script type="text/javascript">
    $(function() {
        var selectedData = {};

        var customTable = $('#payroll-table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "aoColumnDefs": mSortingString,
            "columnDefs": [{
                    targets: [0,1,6],
                    orderable: false
            }]
        });

        var coachID = "{{ request('coach') }}";
        if( coachID ) {
            if( coachID == 'all' ) {
                $('.selected-coach_name').text("All");
            } else{
                var systemCoach = <?= json_encode($entries['coaches']) ?>;
                var coach = systemCoach.find(value => value.id == coachID);
                $('.selected-coach_name').text(coach.name);
            }
        }

        $('#payroll-table').on('click', '.view-btn', function(){
            const payrollStatus = $(this).data('status');
            const rowID = $(this).data('id');

            switch (payrollStatus) {
                case 'draft':
                    $('#payroll-update_modal').modal('show');
                    console.log(rowID);
                    draftPayroll(rowID)

                    break;
            
                case 'processing':
                    paidPayroll(rowID);
                    $('#payroll-modal').modal('show');
                    $('#payroll-modal #paid-form_btn').removeClass('d-none');
                    break;

                case 'paid':
                    paidPayroll(rowID);
                    $('#payroll-modal').modal('show');
                    $('#payroll-modal #paid-form_btn').addClass('d-none');
                    break;
            }
        });

        $('#payroll-modal').on('click', '#paid-form_btn', async function(){
            // Get the main Payment Details
            $(this).attr('disabled', 'true');

            // get user token
			const userToken = getUserToken();

            let data = {
                id: selectedData.id
            }

            await axios.post(`${getApiUrl()}/payroll/paid`, data, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#payroll-modal #cancel-btn').click();

                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        window.location = window.location
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");

                        $(this).removeAttr('disabled');
                    }
                }).catch(error => {
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

        $('#payroll-update_modal').on('click', '#addition-btn', function(){
            const trData = `<tr>
                                <td class="text-left" style="padding-left: 20px">
                                    <x-form-input 
                                        label="" 
                                        type="text" 
                                        name="amount"
                                        id="amount"
                                        isRequired="false"
                                        placeholder="0.00"
                                    />
                                </td>
                                <td class="text-left">
                                    <x-form-input 
                                        label="" 
                                        type="text" 
                                        name="remark"
                                        id="remark"
                                        isRequired="false"
                                        placeholder="Remarks here.."
                                    />
                                </td>
                                <td>
                                    <div class="table-remove_btn">
                                        <span class="cursor-pointer text-danger addition-remove-row_btn"><x-svg-icon icon="times" /></span>
                                    </div>
                                </td>
                            </tr>`;

            $('.addition-table_container').removeClass('d-none');

            if($('#addition-list_table tbody .no-data').length > 0)
                $('#addition-list_table tbody').empty();

            $('#addition-list_table tbody').append(trData);
        });

        $('#payroll-update_modal').on('click', '.addition-remove-row_btn', function(){
            $(this).closest('tr').remove();

            if($('#payroll-update_modal #addition-list_table tbody tr').length <= 0)
                $('#payroll-update_modal .addition-table_container').addClass('d-none');

            renderComputation()
        })

        $('#payroll-update_modal').on('click', '#deduction-btn', function(){
            const trData = `<tr>
                                <td class="text-left" style="padding-left: 20px">
                                    <x-form-input 
                                        label="" 
                                        type="text" 
                                        name="amount"
                                        id="amount"
                                        isRequired="false"
                                        placeholder="0.00"
                                    />
                                </td>
                                <td class="text-left">
                                    <x-form-input 
                                        label="" 
                                        type="text" 
                                        name="remark"
                                        id="remark"
                                        isRequired="false"
                                        placeholder="Remarks here.."
                                    />
                                </td>
                                <td>
                                    <div class="table-remove_btn">
                                        <span class="cursor-pointer text-danger deduction-remove-row_btn"><x-svg-icon icon="times" /></span>
                                    </div>
                                </td>
                            </tr>`;

            $('.deduction-table_container').removeClass('d-none');

            if($('#deduction-list_table tbody .no-data').length > 0)
                $('#deduction-list_table tbody').empty();

            $('#deduction-list_table tbody').append(trData);
        });

        $('#payroll-update_modal').on('click', '.deduction-remove-row_btn', function(){
            $(this).closest('tr').remove();

            console.log('Deduction:: ', $('#payroll-update_modal #deduction-list_table tbody tr').length)
            if($('#payroll-update_modal #deduction-list_table tbody tr').length <= 0)
                $('#payroll-update_modal .deduction-table_container').addClass('d-none');

            renderComputation()
        })

        $('#payroll-update_modal').on('click', '#submit-payroll_btn', async function(){
            // Get the main Payment Details
            $(this).attr('disabled', 'true');

            // get user token
			const userToken = getUserToken();

            const data = {};

            // Get additional/bonus payment
            const additionals = $('#payroll-update_modal #addition-list_table tbody tr');
            const noAdditionals = $('#payroll-update_modal #addition-list_table tbody .no-data');
            let additionalDetails = [];

            additionals.each(function(){
                const amount = $(this).find('input[name=amount]').val();
                const remarks = $(this).find('input[name=remark]').val();

                if( noAdditionals.length <= 0 )
                    additionalDetails.push({
                        type: 'addition',
                        amount: amount,
                        remarks: remarks,
                    });
            });

            // Get deduction payment
            const deductions = $('#payroll-update_modal #deduction-list_table tbody tr');
            const noDeductions = $('#payroll-update_modal #deduction-list_table tbody .no-data');
            let deductionDetails = [];

            deductions.each(function(){
                const amount = $(this).find('input[name=amount]').val();
                const remarks = $(this).find('input[name=remark]').val();

                if( noDeductions.length <= 0 )
                    deductionDetails.push({
                        type: 'deduction',
                        amount: amount,
                        remarks: remarks,
                    });
            });

            const classes = $('#payroll-update_modal #classes-list_table tbody tr');
            let classesDetails = [];

            classes.each(function(){
                const amount = $(this).find('input[name=rate]').val();
                const remarks = $(this).find('input[name=remarks]').val();
                const classID = $(this).data('id');

                classesDetails.push({
                    id: classID,
                    amount: amount,
                    remarks: remarks,
                });
            });

            data['additionals'] = additionalDetails;
            data['deductions'] = deductionDetails;
            data['classes'] = classesDetails;
            data['id'] = selectedData.id;
            console.log(data);
            // return;
            await axios.post(`${getApiUrl()}/payroll/update`, data, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#payroll-update_modal #cancel-btn').click();

                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        window.location = window.location
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");

                        $(this).removeAttr('disabled');
                    }
                }).catch(error => {
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

        $('tbody').on('blur', 'input[name=amount]', function(){
            renderComputation()
        });

        $(`.page-container`).on('click', '#export-btn', async function(){
            $(this).attr('disabled', 'true');

            const userToken = getUserToken();

            const filteredPayrolls = <?= json_encode($entries['payrolls']) ?>;

            let selectedPayrolls = [];
            filteredPayrolls.forEach(function(item){
                    selectedPayrolls.push({id: item.id});
            });

            if( selectedPayrolls.length <= 0 ) {
                toastInfo("Warning", "Cannot process your request, please make sure there's a record", "warning");
                return;
            }

            // console.log(selectedPayrolls);
            // $(this).removeAttr('disabled');
            // return;

            await axios.post(`${getApiUrl()}/payroll/generate-excel`, selectedPayrolls, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        const filePath = res.data.file_path;
                        const a = document.createElement('a');
                        a.href = filePath;
                        a.download = res.data.filename;
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);

                        removeExcelFile(res.data.filename);

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

        $(`.page-container`).on('click', '#refresh-btn', function(){
            window.location = window.location
        });

        function paidPayroll(rowID)
        {
            const payrolls = <?= json_encode($entries['payrolls']) ?>;
            const payroll = payrolls.find(value => value.id == rowID);
            selectedData = payroll
            
            if( payroll ) {
                $('#payroll-modal #classes-list_table tbody').empty();
                let dataRow = '';
                let totalClassesAmount = 0;
                payroll.payroll_classes.forEach(element => {
                    // var startDateTime = moment(element.course_class.formated_start_date_time);
                    // var endDateTime = moment(element.course_class.formated_end_date_time);

                    totalClassesAmount += element.amount;

                    var formattedStartTime = moment(element.course_class.start_time, "HH:mm:ss").format("h:mm A");
                    var formattedEndTime = moment(element.course_class.end_time, "HH:mm:ss").format("h:mm A");

                    var startDateTime = moment(element.course_class.start_date + ' ' + element.course_class.start_time);
                    var endDateTime = moment(element.course_class.start_date + ' ' + element.course_class.end_time);
                    var duration = moment.duration(endDateTime.diff(startDateTime));

                    dataRow += `<tr class="view-btn">
                                    <td class="text-left" style="padding-left: 20px">
                                        <div>
                                            <p>${element.course_class.course_class_code ?? '-'}</p>
                                            <p>${element.course_class.start_date} ${formattedStartTime} - ${formattedEndTime}</p>
                                            <p><span class="fw-bold">Duration:</span> ${duration.hours()} hour(s)</p>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div>
                                            <p>${element.course_class.course.level.name ?? '-'}</p>
                                            <p>${element.course_class.course.course_abbreviation ?? '-'}</p>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div>
                                            <p class="fw-bold">Amount:</p>
                                            <p>${'$'+element.amount}</p>
                                            <p class="fw-bold">Remarks:</p>
                                            <p>${element.remarks ?? '-'}</p>
                                        </div>
                                    </td>
                                </tr>`;
                });

                $('#payroll-modal #classes-list_table tbody').append(dataRow);

                // Render Details for Addition

                let additionDetails = '';
                let deductionDetails = '';

                let additionCount = 0;
                let totalAddition = 0;

                let deductionCount = 0;
                let totalDeduction = 0;
                payroll.payroll_additionals.forEach(element => {
                    if( element.type == 'addition' ) {
                        additionCount++;
                        totalAddition += element.amount;
                        additionDetails += `<tr class="view-btn">
                                            <td class="text-left text-success" style="padding-left: 20px">${'$' + element.amount}</td>
                                            <td class="text-left">${element.remarks}</td>
                                        </tr>`;
                    } else if ( element.type == 'deduction' ) {
                        deductionCount++;
                        totalDeduction += element.amount;
                        deductionDetails += `<tr class="view-btn">
                                            <td class="text-left text-danger" style="padding-left: 20px">${'$' + element.amount}</td>
                                            <td class="text-left">${element.remarks}</td>
                                        </tr>`;
                    }
                });

                if( additionCount <= 0 ) {
                    additionDetails = `<tr class="view-btn">
                                            <td colspan="2" class="text-left">No Additions</td>
                                        </tr>`;
                }

                if( deductionCount <= 0 ) {
                    deductionDetails = `<tr class="view-btn">
                                            <td colspan="2" class="text-left">No Deductions</td>
                                        </tr>`;
                }

                $('#payroll-modal #addition-list_table tbody').empty();
                $('#payroll-modal #addition-list_table tbody').append(additionDetails);
                
                $('#payroll-modal #deduction-list_table tbody').empty();
                $('#payroll-modal #deduction-list_table tbody').append(deductionDetails);

                // Display the total
                
                $('#payroll-modal #total-coach_rate').text("$"+payroll.rate);
                $('#payroll-modal #total-payment_type').text(ucfirst(payroll.user.coach_details.payment_type));
                $('#payroll-modal #total-classes_count').text(payroll.number_of_classes);
                $('#payroll-modal #total-classes_attended').text(payroll.days_of_attendance);
                // $('#total-classes_subtotal').text("$"+parseFloat(totalClassesAmount).toFixed(2));
                $('#payroll-modal #total-additions_subtotal').text("$"+parseFloat(totalAddition).toFixed(2));
                $('#payroll-modal #total-deductions_subtotal').text("-$"+parseFloat(totalDeduction).toFixed(2));
                $('#payroll-modal #total-amount').text("$"+payroll.total_amount);

                // Additional Details
                $('#payroll-modal .details-status').text(ucfirst(payroll.status) ?? '-');
                $('#payroll-modal .details-remarks').text(payroll.remarks ?? '-');
                $('#payroll-modal .details-payment_method').text(ucfirst(payroll.user.coach_details.payment_method) ?? '-');
                $('#payroll-modal .details-bank_name').text(payroll.user.coach_active_bank_details.bank.bank_name ?? '-');
            }
        }

        function draftPayroll(rowID)
        {
            const payrolls = <?= json_encode($entries['payrolls']) ?>;
            const payroll = payrolls.find(value => value.id == rowID);
            selectedData = payroll

            if( payroll ) {
                $('#payroll-update_modal #classes-list_table tbody').empty();
                let dataRow = '';
                let totalClassesAmount = 0;
                payroll.payroll_classes.forEach(element => {
                    // var startDateTime = moment(element.course_class.formated_start_date_time);
                    // var endDateTime = moment(element.course_class.formated_end_date_time);

                    totalClassesAmount += element.amount;

                    var formattedStartTime = moment(element.course_class.start_time, "HH:mm:ss").format("h:mm A");
                    var formattedEndTime = moment(element.course_class.end_time, "HH:mm:ss").format("h:mm A");

                    var startDateTime = moment(element.course_class.start_date + ' ' + element.course_class.start_time);
                    var endDateTime = moment(element.course_class.start_date + ' ' + element.course_class.end_time);
                    var duration = moment.duration(endDateTime.diff(startDateTime));
                    var remarks = element.remarks ?? '';
                    dataRow += `<tr class="view-btn" data-id="${element.id}">
                                    <td class="text-left" style="padding-left: 20px">
                                        <div>
                                            <p>${element.course_class.course_class_code ?? '-'}</p>
                                            <p>${element.course_class.start_date} ${formattedStartTime} - ${formattedEndTime}</p>
                                            <p><span class="fw-bold">Duration:</span> ${duration.hours()} hour(s)</p>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div>
                                            <p>${element.course_class.course.level.name ?? '-'}</p>
                                            <p>${element.course_class.course.course_abbreviation ?? '-'}</p>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div>
                                            <x-form-input 
                                                label="RATE ($):" 
                                                type="text" 
                                                name="rate"
                                                id="rate"
                                                isRequired="false"
                                                placeholder="0.00"
                                                value="${element.amount}"
                                            />
                                            <x-form-input 
                                                label="Remarks:" 
                                                type="text" 
                                                name="remarks"
                                                id="remarks"
                                                isRequired="false"
                                                placeholder="Remarks here..."
                                                value="${remarks}"
                                            />
                                        </div>
                                    </td>
                                </tr>`;
                });

                $('#payroll-update_modal #classes-list_table tbody').append(dataRow);

                // Render Details for Addition

                let additionDetails = '';
                let deductionDetails = '';

                let additionCount = 0;
                let totalAddition = 0;

                let deductionCount = 0;
                let totalDeduction = 0;
                payroll.payroll_additionals.forEach(element => {
                    if( element.type == 'addition' ) {
                        additionCount++;
                        totalAddition += element.amount;
                        let remarks = element.remarks ?? '';
                        additionDetails += `<tr>
                                                <td class="text-left" style="padding-left: 20px">
                                                    <x-form-input 
                                                        label="" 
                                                        type="text" 
                                                        name="amount"
                                                        id="amount"
                                                        isRequired="false"
                                                        placeholder="0.00"
                                                        value="${element.amount}"
                                                    />
                                                </td>
                                                <td class="text-left">
                                                    <x-form-input 
                                                        label="" 
                                                        type="text" 
                                                        name="remark"
                                                        id="remark"
                                                        isRequired="false"
                                                        placeholder="Remarks here.."
                                                        value="${remarks}"
                                                    />
                                                </td>
                                                <td>
                                                    <div class="table-remove_btn">
                                                        <span class="cursor-pointer text-danger addition-remove-row_btn"><x-svg-icon icon="times" /></span>
                                                    </div>
                                                </td>
                                            </tr>`;
                    } else if ( element.type == 'deduction' ) {
                        deductionCount++;
                        totalDeduction += element.amount;
                        let remarks = element.remarks ?? '';
                        deductionDetails += `<tr>
                                                <td class="text-left" style="padding-left: 20px">
                                                    <x-form-input 
                                                        label="" 
                                                        type="text" 
                                                        name="amount"
                                                        id="amount"
                                                        isRequired="false"
                                                        placeholder="0.00"
                                                        value="${element.amount}"
                                                    />
                                                </td>
                                                <td class="text-left">
                                                    <x-form-input 
                                                        label="" 
                                                        type="text" 
                                                        name="remark"
                                                        id="remark"
                                                        isRequired="false"
                                                        placeholder="Remarks here.."
                                                        value="${remarks}"
                                                    />
                                                </td>
                                                <td>
                                                    <div class="table-remove_btn">
                                                        <span class="cursor-pointer text-danger deduction-remove-row_btn"><x-svg-icon icon="times" /></span>
                                                    </div>
                                                </td>
                                            </tr>`;
                    }
                });

                if( additionCount <= 0 ) {
                    additionDetails = `<tr class="view-btn no-data">
                                            <td colspan="2" class="text-left">No Additions</td>
                                        </tr>`;
                }

                if( deductionCount <= 0 ) {
                    deductionDetails = `<tr class="view-btn no-data">
                                            <td colspan="2" class="text-left">No Deductions</td>
                                        </tr>`;
                }
                $('#payroll-update_modal .addition-table_container').removeClass('d-none');
                $('#payroll-update_modal .deduction-table_container').removeClass('d-none');

                $('#payroll-update_modal #addition-list_table tbody').empty();
                $('#payroll-update_modal #addition-list_table tbody').append(additionDetails);
                
                $('#payroll-update_modal #deduction-list_table tbody').empty();
                $('#payroll-update_modal #deduction-list_table tbody').append(deductionDetails);

                // Display the total
                
                $('#payroll-update_modal #total-coach_rate').text("$"+payroll.rate);
                $('#payroll-update_modal #total-payment_type').text(ucfirst(payroll.user.coach_details.payment_type));
                $('#payroll-update_modal #total-classes_count').text(payroll.number_of_classes);
                $('#payroll-update_modal #total-classes_attended').text(payroll.days_of_attendance);
                // $('#total-classes_subtotal').text("$"+parseFloat(totalClassesAmount).toFixed(2));
                $('#payroll-update_modal #total-additions_subtotal').text("$"+parseFloat(totalAddition).toFixed(2));
                $('#payroll-update_modal #total-deductions_subtotal').text("-$"+parseFloat(totalDeduction).toFixed(2));
                $('#payroll-update_modal #total-amount').text("$"+payroll.total_amount);

                // Additional Details
                $('#payroll-update_modal .details-status').text(ucfirst(payroll.status) ?? '-');
                $('#payroll-update_modal .details-remarks').text(payroll.remarks ?? '-');
                $('#payroll-update_modal .details-payment_method').text(ucfirst(payroll.user.coach_details.payment_method) ?? '-');
                $('#payroll-update_modal .details-bank_name').text(payroll.user.coach_active_bank_details.bank.bank_name ?? '-');
            }
        }

        function renderComputation()
        {
            const rates = $('#payroll-update_modal #classes-list_table tbody tr');

            let totalMainClass = 0;
            rates.each(function(){
                const rate = $(this).find('input[name=rate]').val();

                totalMainClass += parseInt(rate);
            })

            const additionals = $('#payroll-update_modal #addition-list_table tbody tr');
            let totalAdditional = 0;

            additionals.each(function(){
                const amount = $(this).find('input[name=amount]').val();
                totalAdditional += parseInt(amount);
            });

            const deductions = $('#payroll-update_modal #deduction-list_table tbody tr');
            let totalDeductions = 0;
            deductions.each(function(){
                const amount = $(this).find('input[name=amount]').val();

                totalDeductions += parseInt(amount);
            });

            
            if(! totalAdditional ) {
                totalAdditional = 0;
            }

            if(! totalDeductions ) {
                totalDeductions = 0;
            }

            console.log(totalAdditional)
            console.log(totalDeductions)

            $('#payroll-update_modal #total-additions_subtotal').text("$"+parseFloat(totalAdditional).toFixed(2));
            $('#payroll-update_modal #total-deductions_subtotal').text("$"+parseFloat(totalDeductions).toFixed(2));

            const classSubtotal = (parseFloat(selectedData.rate / selectedData.number_of_classes) * selectedData.days_of_attendance);
            const grandTotal = (classSubtotal + parseFloat(totalAdditional)) - parseFloat(totalDeductions);

            $('#payroll-update_modal #total-amount').text("$"+parseFloat(grandTotal).toFixed(2));
        }

        async function removeExcelFile(filename)
        {
            const userToken = getUserToken();

            await axios.delete(`${getApiUrl()}/payroll/remove-excel/${filename}`, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            })
        }
    });
</script>
@endsection