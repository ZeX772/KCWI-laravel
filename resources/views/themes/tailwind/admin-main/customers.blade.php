@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Customer" 
        withButton="false"
        withIcon="false"
        icon="plus"
        buttonModalTarget="#competition-modal" 
        buttonType="button"
        buttonId="add-competition_btn"
        buttonTitle="Add Competition"
    />
    <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4 mt-4" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" role="tab">All</a>
        </li>
    </ul>
    <div class="row mt-2 p-2">
        <!-- Student List | Left - Table Section -->
        <div class="col-xxl-9 page-content-col">
            <p>Under development</p>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

    $(function() {
        
    });
</script>
@endsection