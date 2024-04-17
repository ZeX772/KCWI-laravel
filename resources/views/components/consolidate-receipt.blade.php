

<div class="row mt-2 p-2">
    <!-- Consolidate List | Left - Table Section -->
    <div class="col-xxl-9 page-content-col1">
        <div class="tab-content p-3 pt-4">
            <x-search-input
                inputType="text"
                inputName="consolidate_search"
                inputID="consolidate_search"
                inputPlaceholder="Search..."
            />
            <div class="table-responsive table-custom data-table with-custom-search mt-4">
                <table class="table table-hover w-100" id="consolidate-table">
                    <thead>
                        <tr>
                            <th class="text-left"><input type="checkbox"></th>
                            <th class="text-left">CONSOLIDATE #</th>
                            <th class="text-left">DATE & TIME</th>
                            <th class="text-left">NAME</th>
                            <th class="text-left">TOTAL AMOUNT</th>
                            <th class="text-left">PAID AMOUNT</th>
                            <th class="text-left">REFUNDED AMOUNT</th>
                            <th class="text-left">PAYMENT METHOD</th>
                            <th class="text-left">STATUS</th>
                            <th class="text-center" style="width: 60px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($entries as $entry)
                            <tr data-entry_id="{{ $entry['id'] }}">
                                <td class="text-left"><input type="checkbox"></td>
                                <td class="text-left">{{ $entry['consolidate_no'] }}</td>
                                <td class="text-left">{{ formatDate($entry['date'], 'm/d/Y h:i A') }}</td>
                                <td class="text-left">{{ $entry['user']['name'] }}</td>
                                <td class="text-left">{{ $entry['total_amount'] ? ("$" . $entry['total_amount']) : "-" }}</td>
                                <td class="text-left">{{ $entry['paid_amount'] ? ("$" . $entry['paid_amount']) : "-" }}</td>
                                <td class="text-left">{{ $entry['refunded_amount'] ? ("-$" . $entry['refunded_amount']) : "-" }}</td>
                                <td class="text-left">{{ $entry['payment_method'] ?? "-" }}</td>
                                <td class="text-left">{{ ucfirst($entry['status']) }}</td>
                                <td class="text-center" style="width: 60px;">
                                    <a href="{{ route('wave.user.admin-main.consolidate-view', $entry['id']) }}">
                                        <x-svg-icon icon="view"/>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Consolidate Details | Right Section -->
    <div class="col d-xxl-flex flex-column page-content-col2">
        <div class="card">
            <div class="card-body main-page_normal_card_info">
                <div class="col mb-4">
                    <div>
                        <h1 class="fw-semibold card-heading text-center">Consolidate</h1>
                    </div>
                </div>
                <div class="mb-3">
                    <h1 class="fw-semibold card-sub_heading">INFORMATION</h1>
                </div>
                <div class="col">
                    <ul class="list-group border-none">
                        <li class="list-group-item d-xxl-flex p-0" style="border-style: none;">
                            <div class="container p-0 consolidate-details_container">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Status</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-status" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Consolidate #</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-consolidate_no" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Date & Time</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-payment_date" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Total Amount</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-total_amount" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Paid Amount</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-paid_amount" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                    <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Refunded Amount</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-refunded_amount" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Payment Method</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-payment_method" class="card-detail_sub_title">-</h1>
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

<script type="text/javascript">
    $(function() {
        $('.invoice-receipt #consolidate-table').on('click', 'tr', function(){
            const entryID = $(this).data('entry_id');

            if( entryID ) {
                const systemEntries = <?= json_encode($entries) ?>;
                const selectedEntry = systemEntries.find(value => value.id == entryID);

                $('.invoice-receipt .consolidate-details_container #detail-status').text(ucfirst(selectedEntry.status));
                $('.invoice-receipt .consolidate-details_container #detail-consolidate_no').text(selectedEntry.consolidate_no);
                $('.invoice-receipt .consolidate-details_container #detail-payment_date').text( moment(selectedEntry.date).format('MM/DD/YYYY h:mm A'));
                $('.invoice-receipt .consolidate-details_container #detail-total_amount').text( selectedEntry.total_amount ? ("$" + selectedEntry.total_amount): "-" );
                $('.invoice-receipt .consolidate-details_container #detail-paid_amount').text( selectedEntry.paid_amount ? ("$" + selectedEntry.paid_amount): "-" );
                $('.invoice-receipt .consolidate-details_container #detail-refunded_amount').text( selectedEntry.refunded_amount ? ("-$" + selectedEntry.refunded_amount): "-" );
                $('.invoice-receipt .consolidate-details_container #detail-payment_method').text(selectedEntry.payment_method ?? "-");
            } else {
                $('.invoice-receipt .consolidate-details_container #detail-status').text("-");
                $('.invoice-receipt .consolidate-details_container #detail-consolidate_no').text("-");
                $('.invoice-receipt .consolidate-details_container #detail-payment_date').text("-");
                $('.invoice-receipt .consolidate-details_container #detail-total_amount').text("-");
                $('.invoice-receipt .consolidate-details_container #detail-paid_amount').text("-");
                $('.invoice-receipt .consolidate-details_container #detail-refunded_amount').text("-");
                $('.invoice-receipt .consolidate-details_container #detail-payment_method').text("-");
            }
        });
    });
</script>