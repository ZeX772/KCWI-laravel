@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Receipt" 
        withButton="false"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#receipt-modal" 
        buttonType="button"
        buttonId="add-receipt_btn"
        buttonTitle="Add Receipt"
    />
    <div class="row mt-2 p-2">
        <!-- Student List | Left - Table Section -->
        <div class="col-xxl-9 page-content-col1">
            <div class="tab-content p-3 pt-4">
                <x-search-input
                    inputType="text"
                    inputName="student_search"
                    inputID="student_search"
                    inputPlaceholder="Search..."
                />
                <div class="table-responsive table-custom data-table with-custom-search mt-4">
                    <table class="table table-hover w-100" id="receipt-table">
                        <thead>
                            <tr>
                                <th class="text-left"><input type="checkbox"></th>
                                <th class="text-left">RECEIPT #</th>
                                <th class="text-left">DATE & TIME</th>
                                <th class="text-left">CONSOLIDATED</th>
                                <th class="text-left">PAYMENT METHOD</th>
                                <th class="text-center" style="width: 60px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entries as $entry)
                                <tr data-entry_id="{{ $entry['id'] }}">
                                    <td class="text-left"><input type="checkbox"></td>
                                    <td class="text-left">{{ $entry['receipt_no'] }}</td>
                                    <td class="text-left">{{ formatDate($entry['payment_date'], 'm/d/Y h:i A') }}</td>
                                    <td class="text-left">
                                        @if( $entry['invoice']['consolidate_item_receipt'] )
                                            <a href="{{ route('wave.user.admin-main.consolidate-view', $entry['invoice']['consolidate_item_receipt']['consolidate']['id']) }}" class="text-link">{{ $entry['invoice']['consolidate_item_receipt'] ? $entry['invoice']['consolidate_item_receipt']['consolidate']['consolidate_no'] : "-" }} <i class="fa-solid fa-link"></i></a></td>
                                        @else
                                            <span>-</span>
                                        @endif
                                    <td class="text-left">{{ $entry['payment_method'] }}</td>
                                    <td class="text-center" style="width: 60px;">
                                        <a href="{{ route('wave.user.admin-main.receipt-view', $entry['id']) }}">
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
        <!-- Coach Details | Right Section -->
        <div class="col d-xxl-flex flex-column page-content-col2">
            <div class="card">
 				<div class="card-body main-page_normal_card_info">
 					<div class="col mb-4">
 						<div>
 							<h1 class="fw-semibold card-heading text-center">Receipt</h1>
 						</div>
 					</div>
 					<div class="mb-3">
 						<h1 class="fw-semibold card-sub_heading">INFORMATION</h1>
 					</div>
 					<div class="col">
 						<ul class="list-group border-none">
 							<li class="list-group-item d-xxl-flex p-0" style="border-style: none;">
 								<div class="container p-0 receipt-details_container">
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Receipt #</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-receipt_no" class="card-detail_sub_title text-success">-</h1>
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
 											<h1 class="card-detail_title">Consolidated</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-consolidated" class="card-detail_sub_title">-</h1>
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
</div>
@endsection

<style>
    .text-link {
        color: #4a56ff;
    }
</style>

@section('script')
<script type="text/javascript">
    $(function() {
        $('#receipt-table').on('click', 'tr', function(){
            const entryID = $(this).data('entry_id');

            if( entryID ) {
                const systemEntries = <?= json_encode($entries) ?>;
                const selectedEntry = systemEntries.find(value => value.id == entryID);

                $('.receipt-details_container #detail-receipt_no').text(selectedEntry.receipt_no);
                $('.receipt-details_container #detail-payment_date').text( moment(selectedEntry.payment_date).format('MM/DD/YYYY h:mm A'));
                $('.receipt-details_container #detail-consolidated').text("-");
                $('.receipt-details_container #detail-payment_method').text(selectedEntry.payment_method);
            } else {
                $('.receipt-details_container #detail-receipt_no').text("-");
                $('.receipt-details_container #detail-payment_date').text("-");
                $('.receipt-details_container #detail-consolidated').text("-");
                $('.receipt-details_container #detail-payment_method').text("-");
            }
        });
    });
</script>
@endsection