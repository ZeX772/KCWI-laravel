@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <div class="row g-0 d-xxl-flex justify-content-between mb-4">
 		<div class="col-auto">
 			<h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;">Receipt - {{ $entry['receipt_no'] }}</h1>
 		</div>
 	</div>
    <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4" role="tablist">
        <li class="nav-item" role="presentation" style="border-left-style: none;">
            <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">INVOICE INFORMATION</a>
        </li>
        <li class="nav-item" role="presentation" style="border-left-style: none;">
            <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2">INVOICE PREVIEW</a>
        </li>

        <!-- <li class="nav-item" role="presentation" style="border-left-style: none;">
            <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-3">QUOTATION PREVIEW</a>
        </li> -->

        <li class="nav-item accounting-tab_btn" role="presentation" style="border-left-style: none;">
            <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-4">RECEIPT PREVIEW</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="tab-1" class="tab-pane active invoice-info_tab" role="tabpanel">
            <x-receipt-invoice-info :entry="$entry" :school="$school"/>
        </div>
        <div id="tab-2" class="tab-pane invoice-preview_tab" role="tabpanel">
            <x-receipt-invoice-preview  :entry="$entry" :school="$school"/>
        </div>
        <!-- <div id="tab-3" class="tab-pane quotation-preview_tab" role="tabpanel">
            <p>Quotation Preview Tab</p>
        </div> -->
        <div id="tab-4" class="tab-pane receipt-preview_tab" role="tabpanel">
            <x-receipt-preview  :entry="$entry" :school="$school"/>
        </div>
    </div>
</div>
@endsection

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

@section('script')
<script type="text/javascript">
    $(function() {
        
    });
</script>
@endsection