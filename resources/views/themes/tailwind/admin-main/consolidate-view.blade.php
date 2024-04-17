@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <div class="row g-0 d-xxl-flex justify-content-between mb-4">
        <div class="col-auto">
            <h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;">Consolidate - {{ $entry['consolidate_no'] }}</h1>
        </div>
        <div class="col-auto">
            <x-secondary-button type="button" withIcon="true" icon="caret-left" route="{{ route('wave.user.admin-main.consolidate') }}" id="back-btn" title="Back to list" dismiss=""/>
        </div>
    </div>
    <div class="row mt-2 p-2">
        <!-- Student List | Left - Table Section -->
        <div class="col-xxl-12 page-content-col1">
            <div class="main-view p-3 pt-4">
                <dl class="row mb-3">
                    <dt class="col-sm-2">Consolidate No.</dt>
                    <dd class="col-sm-10">{{ $entry['consolidate_no'] ?? "-" }}</dd>

                    <dt class="col-sm-2">Type</dt>
                    <dd class="col-sm-10">{{ ucfirst($entry['type']) ?? "-" }}</dd>

                    <dt class="col-sm-2">Date</dt>
                    <dd class="col-sm-10">{{ formatDate($entry['date'], 'm/d/Y h:i A') }}</dd>

                    <dt class="col-sm-2">Name</dt>
                    <dd class="col-sm-10">{{ $entry['user']['name'] ?? "-" }}</dd>

                    <dt class="col-sm-2">Total Amount</dt>
                    <dd class="col-sm-10 text-paid">{{ $entry['total_amount'] ? ("$".$entry['total_amount']) : "-" }}</dd>

                    <dt class="col-sm-2">Paid Amount</dt>
                    <dd class="col-sm-10 text-paid">{{ $entry['paid_amount'] ? ("$".$entry['paid_amount']) : "-" }}</dd>

                    <dt class="col-sm-2">Refunded Amount</dt>
                    <dd class="col-sm-10 text-refunded">{{ $entry['refunded_amount'] ? ("-$".$entry['refunded_amount']) : "-" }}</dd>

                    <dt class="col-sm-2">Payment Method</dt>
                    <dd class="col-sm-10">{{ $entry['payment_method'] ?? "-" }}</dd>

                    <dt class="col-sm-2">Status</dt>
                    <dd class="col-sm-10 text-{{ $entry['status'] }}">{{ ucfirst($entry['status']) ?? "-" }}</dd>
                </dl>
                @if( $entry['type'] == "invoice" )
                    <hr>
                    <div class="invoice-info mt-2">
                        <h2 class="section-title mb-3">Invoices</h2>
                        <div class="w-100 mt-2">
                            
                                <table class="table" id="basic-info_table">
                                    <thead style="border-bottom: 1px solid #d5d5d5;">
                                        <tr>
                                        <th class="table-header">INVOICE NO.</th>
                                        <th class="table-header">STUDENT NAME</th>
                                        <th class="table-header">EMAIL</th>
                                        <th class="table-header">PHONE</th>
                                        <th class="table-header">RESIDENTIAL ADDRESS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $entry['items'] as $item )
                                            <tr>
                                                <th class="table-body-row">{{ $item['invoice'] ? $item['invoice']['invoice_number'] : 'N/A' }}</th>
                                                <th class="table-body-row">{{ $item['invoice']['user'] ? $item['invoice']['user']['name'] : 'N/A' }}</th>
                                                <th class="table-body-row">{{ $item['invoice']['user'] ? $item['invoice']['user']['email'] : 'N/A' }}</th>
                                                <th class="table-body-row">{{ $item['invoice']['user']['student_information'] ? $item['invoice']['user']['student_information']['phone'] : 'N/A' }}</th>
                                                <th class="table-body-row">{{ $item['invoice']['user']['student_information'] ? $item['invoice']['user']['student_information']['address'] : 'N/A' }}</th>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            
                        </div>
                    </div>
                @endif

                <div class="payment-info mt-4">
                    <h2 class="section-title mb-3">Payment Record</h2>
                    <table class="table" id="basic-info_table">
                        <thead style="border-bottom: 1px solid #d5d5d5;">
                            <tr>
                                <th class="table-header">RECEIPT NO.</th>
                                <th class="table-header">INVOICE NO.</th>
                                <th class="table-header">PAYMENT METHOD</th>
                                <th class="table-header">TOTAL FEES</th>
                                <th class="table-header">PAYMENT DATE</th>
                                <th class="table-header">ATTACHMENT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $entry['items'] as $item )
                                @if( $item['invoice']['receipt'] )
                                    <tr>
                                        <td class="table-body-row"><a href="{{ route('wave.user.admin-main.receipt-view', $item['invoice']['receipt']['id']) }}" class="text-link">{{ $item['invoice']['receipt'] ? $item['invoice']['receipt']['receipt_no'] : "N/A" }} <i class="fa-solid fa-link"></i></a></td>
                                        <td class="table-body-row">{{ $item['invoice'] ? $item['invoice']['invoice_number'] : "N/A" }}</td>
                                        <td class="table-body-row">{{ $item['invoice']['receipt'] ? $item['invoice']['receipt']['payment_method'] : "N/A" }}</td>
                                        <td class="table-body-row">${{ $item['invoice']['receipt'] ? $item['invoice']['receipt']['total_fee'] : "N/A" }}</td>
                                        <td class="table-body-row">{{ formatDate($item['invoice']['receipt']['payment_date'], 'm/d/Y h:i A') }}</td>
                                        <td class="table-body-row">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="table-row-img">
                                                    <img src="{{ $item['invoice']['receipt']['image_path'] }}" alt="" style="width: 61px;">
                                                </div>
                                                <div class="d-flex gap-3 ">
                                                    <span style="color: #7A7A7A;" class="cursor-pointer download-img_btn" data-src="{{ $item['invoice']['receipt']['image_path'] }}" data-filename="{{ $item['invoice']['receipt']['attachment'] }}">
                                                        <x-svg-icon icon="download" />
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .table-header {
        font-size: 14px;
        font-weight: 700;
        color: #7A7A7A;
        padding-left: 0 !important;
    }

    .table-body-row {
        font-size: 14px;
        font-weight: 400;
        color: #3B3B3B;
        padding-left: 0 !important;
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

    /* text colors of status */
    .text-link {
        color: #4a56ff;
    }

    .text-refunded,
    .text-failed,
    .text-cancelled {
        color: #ab0606;
        font-weight: 700;
    }

    .text-pending {
        color: #b1b50b;
        font-weight: 700;
    }

    .text-success {
        color: #72bb00;
        font-weight: 700;
    }

    .text-archived {
        color: #b3b3b3;
        font-weight: 700;
    }
</style>

@section('script')
<script type="text/javascript">
    $(function() {
        
    });
</script>
@endsection