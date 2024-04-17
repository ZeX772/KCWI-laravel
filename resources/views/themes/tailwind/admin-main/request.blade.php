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
                <li class="nav-item" role="presentation" style="border-left-style: none;">
                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2" data-type="competition-enrollment">COMPETITION ENROLLMENT [{{ $incoming_requests['competition_enrollments'] }}]</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-3" data-type="make-up-class">MAKE UP CLASS REQUEST [{{ $incoming_requests['make_up_classes'] }}]</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-4" data-type="change-course">CHANGE COURSE [{{ $incoming_requests['change_courses'] }}]</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-5" data-type="course-withdrawal">COURSE WITHDRAWAL [{{ $incoming_requests['course_withdrawals'] }}]</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-6" data-type="enquiry-form">ENQUIRY FORM [{{ $incoming_requests['enquiries'] }}]</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-7" data-type="leave-request">LEAVE REQUEST [{{ $incoming_requests['coach_leaves'] }}]</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-8" data-type="waiting-list">WAITING LIST [{{ $incoming_requests['waiting_lists'] }}]</a>
                </li>
            </ul>
            <div class="tab-content pt-2">
                <div id="tab-1" class="tab-pane course-enrollment-tab course-enrollment" role="tabpanel">
                    <x-course-enrollment-list :courseEnrollements="$course_enrollements" />
                </div>
                <div id="tab-2" class="tab-pane competition-enrollment-tab competition-enrollment" role="tabpanel">
                    <x-competition-enrollment-list :competitionEnrollements="$competition_enrollments" />
                </div>
                <div id="tab-3" class="tab-pane make-up-class-tab make-up-class" role="tabpanel">
                    <x-class-make-up-request-list :makeUpClasses="$make_up_classes" />
                </div>
                <div id="tab-4" class="tab-pane change-course-tab change-course" role="tabpanel">
                    <x-change-course-list :changeCourses="$change_courses" />
                </div>
                <div id="tab-5" class="tab-pane course-withdrawal-tab course-withdrawal" role="tabpanel">
                    <x-course-withdrawal-list :courseWithdrawals="$course_withdrawals" />
                </div>
                <div id="tab-6" class="tab-pane enquiry-tab enquiry-form" role="tabpanel">
                    <x-enquiry-list :enquiriesData="$enquiries" />
                </div>
                <div id="tab-7" class="tab-pane leave-request-tab leave-request" role="tabpanel">
                    <x-leave-request-list :coachLeaves="$coach_leaves" />
                </div>
                <div id="tab-8" class="tab-pane waiting-list-tab waiting-list" role="tabpanel">
                    <x-waiting-list :waitingLists="$waiting_lists"/>
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