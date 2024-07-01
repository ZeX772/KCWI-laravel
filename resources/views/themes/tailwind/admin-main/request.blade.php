@extends('theme::layouts.app')

<?php
    $incomingRequest = "0";
    if ( $incomingRequest = session('incoming_requests') )
        $incomingRequest = $incomingRequest ?? "0";

    session(['total_request' => $incoming_requests['total_incoming_request']]);
?>

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Requests" 
        withButton="false"
        withIcon="true"
        icon=""
        buttonModalTarget="#general-qr-modal" 
        buttonType="button"
        buttonId="general-qr_btn"
        buttonTitle="GENERAL QR"
    />
    <div class="row mt-4">
        <div class="col-xxl-12">
            <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4" role="tablist">
                <li class="nav-item" role="presentation" style="border-left-style: none;">
                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-1" data-type="course-enrollment">COURSE ENROLLMENT [{{ $incoming_requests['course_enrollments'] }}]</a>
                </li>
                
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-7" data-type="leave-request">LEAVE REQUEST [{{ $incoming_requests['coach_leaves'] }}]</a>
                </li>
            </ul>
            <div class="tab-content pt-2">
                <div id="tab-1" class="tab-pane course-enrollment-tab course-enrollment" role="tabpanel">
                    <x-course-enrollment-list :courseEnrollements="$course_enrollements" />
                </div>
                <div id="tab-7" class="tab-pane leave-request-tab leave-request" role="tabpanel">
                    <x-leave-request-list :coachLeaves="$coach_leaves" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        loadActiveTab();

        $('.nav-tabs').on('click', '.nav-link', function(e){
            e.preventDefault();
            const type = $(this).data('type');

            window.location = `?type=${type}`;
        });

        function loadActiveTab()
        {
            var params = new URLSearchParams(window.location.search);
            const type = params.get('type');

            if(! type ) {
                $('.tab-pane').removeClass('active');
                $('.nav-link').removeClass('active');
                $(`[data-type=course-enrollment]`).addClass('active');
                $(`.tab-content .course-enrollment`).addClass('active');
            } else {
                $('.tab-pane').removeClass('active');
                $('.nav-link').removeClass('active');
                $(`[data-type=${type}]`).addClass('active');
                $(`.tab-content .${type}`).addClass('active');
            }
        }
    });
</script>
@endsection