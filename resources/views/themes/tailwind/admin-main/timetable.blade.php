 @extends('theme::layouts.app')


@section('content')
<style>
    #timetable-calendar-toolbar {
        margin-bottom: 1.5em;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .toolbar-button-group {
        display: inline-flex;
        position: relative;
        vertical-align: middle;
    }
    .toolbar-button-group > button {
        flex: 1 1 auto;
        position: relative;
        background-color: #F5F5F5;
        /* border-color: var(--btn-primary-color); */
        border: 1px solid transparent;
        border-radius: 0.25em;
        display: inline-block;
        font-size: 1em;
        font-weight: 400;
        line-height: 1.5;
        padding: 0.4em 0.65em;
        text-align: center;
        user-select: none;
        vertical-align: middle;
        appearance: button;
        margin: 0px;
        overflow: visible;
        text-transform: none;
    }
    .toolbar-button-group > button:hover {
        background-color: var(--fc-button-bg-color);
        color: #fff;
    }
    .toolbar-button-group > button:not(:disabled) {
        cursor: pointer;
    }
    .toolbar-button-group > button:not(:first-child) {
        border-bottom-left-radius: 0px;
        border-top-left-radius: 0px;
        margin-left: -1px;
    }
    .toolbar-button-group > button:not(:last-child) {
        border-bottom-right-radius: 0px;
        border-top-right-radius: 0px;
    }
    .toolbar-button-group > button .toolbar-prev-button-icon,
    .toolbar-button-group > button .toolbar-next-button-icon {
        font-size: 1.5em;
        vertical-align: middle;
        speak: none;
        -webkit-font-smoothing: antialiased;
        height: 1em;
        line-height: 1;
        text-align: center;
        text-transform: none;
        user-select: none;
        width: 1em;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .toolbar-button-group > button .toolbar-prev-button-icon:before,
    .toolbar-button-group > button .toolbar-next-button-icon:before {
        font-size: 16px;
    }

    .toolbar-section .toolbar-title {
        font-size: 1.75em;
        margin: 0px;
    }

    .toolbar-view-selector button.active {
        background-color: var(--fc-button-bg-color);
        color: #fff;
    }

    #level-dropdown, #venue-dropdown, #coach-dropdown {
        display: inline-block !important;
    }

    #level-dropdown button, #venue-dropdown button, #coach-dropdown button {
        background-color: #F5F5F5;
        border: 1px solid transparent;
        color: inherit;
        border-radius: 0.25em;
    }

    #level-dropdown button:hover, #venue-dropdown button:hover, #coach-dropdown button:hover {
        background-color: var(--fc-button-bg-color);
        color: #fff;
        border: 1px solid transparent;
    }

    #level-dropdown .dropdown-item.active, #venue-dropdown .dropdown-item.active, #coach-dropdown .dropdown-item.active,
    #level-dropdown .dropdown-item:hover, #venue-dropdown .dropdown-item:hover, #coach-dropdown .dropdown-item:hover {
        color: var(--bs-dropdown-link-hover-color);
        background-color: var(--bs-dropdown-link-hover-bg);
    }

    #timetable-calendar .fc-timeGridDay-view a.fc-event .fc-event-main, #timetable-calendar .fc-timeGridWeek-view a.fc-event .fc-event-main {
        height: unset;
    }

    #timetable-calendar .fc-timeGridDay-view a.fc-event .fc-event-main .fc-event-main-frame, #timetable-calendar .fc-timeGridWeek-view a.fc-event .fc-event-main .fc-event-main-frame {
        height: unset;
    }

    #class-action-modal .modal-body a {
        border-radius: 0.375rem;
    }

    #class-action-modal .modal-body a:hover {
        color: inherit;
        background-color: #e9ecef;
    }

    #students-container .row:not(:first-child) {
        cursor: pointer;
        border-radius: 0.25em;
    }

    #students-container .row:not(:first-child):hover {
        color: #1e2125;
        background-color: #e9ecef;
    }

    #absent-coaches-container .row:not(:first-child) {
        cursor: pointer;
        border-radius: 0.25em;
    }

    #absent-coaches-container .row:not(:first-child):hover {
        color: #1e2125;
        background-color: #e9ecef;
    }

    #available-coaches-container .row:not(:first-child) {
        cursor: pointer;
        border-radius: 0.25em;
    }

    #available-coaches-container .row:not(:first-child):hover {
        color: #1e2125;
        background-color: #e9ecef;
    }
</style>
<div class="page-container">
    <x-page-content-heading 
        heading="Timetable" 
        withButton="true"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#enrollment-modal" 
        buttonType="button"
        buttonId="enrollment-btn"
        buttonTitle="Enrollment"
    />

    <div class="row mt-4">
        <div class="col-12" style="margin-bottom: 1.5em;">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="toolbar-section d-inline-flex">
                        <div class="toolbar-button-group">
                            <button type="button" class="toolbar-prev-button">
                                <span class="toolbar-prev-button-icon fa fa-chevron-left"></span>
                            </button>
                            <button type="button" class="toolbar-next-button">
                                <span class="toolbar-next-button-icon fa fa-chevron-right"></span>
                            </button>
                        </div>
                        <div class="input-group ms-3">
                            <span class="input-group-text" style="background: #F5F5F5;border-style: none;">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-calendar" style="margin-right: 10px;">
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                    </svg>
                                </span>
                            </span>
                            <input name="date" id="date" class="form-control datepicker form-input-date " type="date" value="{{ date('Y-m-d') }}" style="background: #F5F5F5;border-style: none; height: 48px;">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-auto mx-auto d-flex align-items-center justify-content-center">
                    <div class="toolbar-section">
                        <h2 class="toolbar-title">January 2024</h2>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="toolbar-section d-flex float-end w-100">
                        <div class="toolbar-button-group toolbar-view-selector">
                            <button type="button" class="toolbar-month-view active">Month</button>
                            <button type="button" class="toolbar-week-view">Week</button>
                            <button type="button" class="toolbar-day-view">Day</button>
                        </div>
                        <div class="dropdown ms-3" id="level-dropdown">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Level
                            </button>

                            <ul class="dropdown-menu">
                                @foreach($levels as $level)
                                <li>
                                    <a href="#" class="dropdown-item overflow-hidden" style="text-overflow: ellipsis" data-id="{{ $level['id'] }}">
                                        <img src="{{ asset('themes/tailwind/images/clipboard-image-4.png') }}" style="width: 22px; display: inline-block;">
                                        <span class="ms-1">{{ $level['name'] }}</span>
                                        <!-- <img src="{{ asset('themes/tailwind/images/clipboard-image-15.png') }}" style="width: 22px; display: inline-block;"> -->
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="dropdown ms-3" id="venue-dropdown">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Venue
                            </button>

                            <ul class="dropdown-menu">
                                @foreach($venues as $venue)
                                <li>
                                    <a href="#" class="dropdown-item overflow-hidden" style="text-overflow: ellipsis" data-id="{{ $venue['id'] }}">
                                        <img src="{{ asset('themes/tailwind/images/clipboard-image-5.png') }}" style="width: 22px; display: inline-block;">
                                        <span class="ms-1">{{ $venue['name'] }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="dropdown ms-3" id="coach-dropdown">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Coach
                            </button>

                            <ul class="dropdown-menu">
                                @foreach($coaches as $coach)
                                <li>
                                    <a href="#" class="dropdown-item overflow-hidden" style="text-overflow: ellipsis" data-id="{{ $coach['id'] }}">
                                        <img src="{{ asset('themes/tailwind/images/clipboard-image-7.png') }}" style="width: 22px; display: inline-block;">
                                        <span class="ms-1">{{ $coach['name'] }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div id="timetable-calendar"></div>
        </div>
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="class-action-modal">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 24px;color: #3B3B3B;"></h4>
            </div>
            <div class="modal-body p-4 pt-0">
                <ul>
                    <li><a href="#" class="d-flex align-item-center p-3" id="coach-settings-action"><img src="{{ asset('themes/tailwind/images/clipboard-image-7.png') }}" style="width: 24px;"><span class="ms-1">Coach Settings</span></a></li>
                    <li><a href="#" class="d-flex align-item-center p-3" id="student-settings-action"><img src="{{ asset('themes/tailwind/images/clipboard-image-2.png') }}" style="width: 24px;"><span class="ms-1">Student Settings</span></a></li>
                    <li><a href="#" class="d-flex align-items-center p-3" id="class-cancel-action"><img src="{{ asset('themes/tailwind/images/clipboard-image-3.png') }}" style="width: 24px;"><span class="ms-1">Class Cancel</span></a></li>
                    <li><a href="#" class="d-flex align-items-center p-3" id="class-migration-action"><img src="{{ asset('themes/tailwind/images/clipboard-image-3.png') }}" style="width: 24px;"><span class="ms-1">Class Migration</span></a></li>
                    <li><a href="#" class="d-flex align-items-center p-3" id="notification-action"><img src="{{ asset('themes/tailwind/images/clipboard-image-12.png') }}" style="width: 24px;"><span class="ms-1">Notification</span></a></li>
                    <li><a href="#" class="d-flex align-items-center p-3" id="enrollment-action"><img src="{{ asset('themes/tailwind/images/clipboard-image-9.png') }}" style="width: 24px;"><span class="ms-1">Enrollment</span></a></li>
                    <li><a href="#" class="d-flex align-items-center p-3" id="attendance-qr-action"><img src="{{ asset('themes/tailwind/images/QR.png') }}" style="width: 24px;"><span class="ms-1">Attendance QR</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Coach Settings Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="coach-settings-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Coach Settings</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div class="container form-input-container gap-4 mb-3">
                        <div class="callout callout-warning">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <p><span class="venue-name"></span> <span class="class-date"></span></p>
                                    <p><span class="class-start-time"></span> - <span class="class-end-time"></span></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <p><span class="level-name"></span> (<span class="enrolled-students"></span>/<span class="class-size"></span>)</p>
                                    <p>Coach: <span class="coach-attended"></span>/<span class="total-coaches"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Action" 
                            name="coach_setting_action"
                            id="coach_setting_action"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Action</option>
                            <option value="add-coaches">Add Coach</option>
                            <option value="replace-coaches">Replace Coach</option>
                            <option value="remove-coaches">Remove Coaches</option>
                            <option value="sign-attendance">Sign Attendance</option>
                            <option value="absent">Absent</option>
                        </x-form-select>
                    </div>

                    <hr style="margin: 0 -1.5rem">
                    <div id="coach-action-form"></div>

                    <div class="container form-input-container gap-1 my-3">
                        <div class="form-inline">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Remarks</label>
                                <textarea name="remarks" class="form-control" placeholder="Remark: Sick with Certificate" style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" id="cancel-btn"  class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button type="button" id="save-modal-data-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Confirm</button>
			</div>
        </div>
    </div>
</div>

<!-- SELECT COACH MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="select-coaches-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Select Coaches</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
                <div class="row">
                    <div class="col" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
                        <div class="tab-content custom-datatable_container" style="padding: 15px;">
                            <div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                                <div class="row announcement-filter-tab">
                                    <div class="col-12 position-relative">
                                        <x-search-input inputType="text" inputName="coach_search" inputID="coach_search" inputPlaceholder="Search..." />
                                    </div>
                                </div>
                                <div class="table-responsive" style="height: auto;max-height: none;">
                                    <table class="table table-hover custom-datatable" id="coaches-table" style="width: 100%;">
                                        <thead>
                                            <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                                <th class="text-center"></th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">NAME</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">EMAIL</th>
                                            </tr>
                                        </thead>
                                        <tbody style="height: auto;"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Close</button>
				<button type="button" id="add-coaches-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Add</button>
			</div>
 		</div>
 	</div>
</div>

<!-- Coach Settings Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="student-settings-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Student Settings</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div class="container form-input-container gap-4 mb-3">
                        <div class="callout callout-warning">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <p><span class="venue-name"></span> <span class="class-date"></span></p>
                                    <p><span class="class-start-time"></span> - <span class="class-end-time"></span></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <p><span class="level-name"></span> (<span class="enrolled-students"></span>/<span class="class-size"></span>)</p>
                                    <p>Coach: <span class="coach-attended"></span>/<span class="total-coaches"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Action" 
                            name="student_setting_action"
                            id="student_setting_action"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Action</option>
                            <option value="sign-attendance">Sign Attendance</option>
                            <option value="absent">Absent</option>
                            <option value="make-up">Make Up</option>
                            <option value="withdrawal">Withdrawal</option>
                        </x-form-select>
                    </div>

                    <div id="student-action-form"></div>
                </form>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" id="cancel-btn"  class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button type="button" id="save-modal-data-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Confirm</button>
			</div>
        </div>
    </div>
</div>

<!-- SELECT COACH MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="settings-select-students-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Select Students</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
                <div class="row">
                    <div class="col" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
                        <div class="tab-content custom-datatable_container" style="padding: 15px;">
                            <div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                                <div class="row announcement-filter-tab">
                                    <div class="col-12 position-relative">
                                        <x-search-input inputType="text" inputName="student_search" inputID="student_search" inputPlaceholder="Search..." />
                                    </div>
                                </div>
                                <div class="table-responsive" style="height: auto;max-height: none;">
                                    <table class="table table-hover custom-datatable" id="students-table" style="width: 100%;">
                                        <thead>
                                            <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                                <th class="text-center"></th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">NAME/ID</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">EMAIL</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">LEVEL</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">PHONE</th>
                                            </tr>
                                        </thead>
                                        <tbody style="height: auto;"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Close</button>
				<button type="button" id="add-students-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Add</button>
			</div>
 		</div>
 	</div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="class-cancel-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Class Cancel</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div class="container form-input-container gap-4 mb-3">
                        <div class="callout callout-warning">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <p><span class="venue-name"></span> <span class="class-date"></span></p>
                                    <p><span class="class-start-time"></span> - <span class="class-end-time"></span></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <p><span class="level-name"></span> (<span class="enrolled-students"></span>/<span class="class-size"></span>)</p>
                                    <p>Coach: <span class="coach-attended"></span>/<span class="total-coaches"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr style="margin: 0 -1.5rem">

                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Reason" 
                            name="class_cancel_reason"
                            id="class_cancel_reason"
                            isRequired="true"
                        >
                            <option value="weather-affect" selected>Weather Affect</option>
                            <option value="venue-close">Venue Close</option>
                            <option value="other">Other</option>
                        </x-form-select>
                    </div>

                    <hr style="margin: 0 -1.5rem">

                    <div class="container form-input-container gap-1 my-3">
                        <div class="form-inline">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                                <textarea name="remarks" class="form-control" placeholder="Remarks..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" id="cancel-btn"  class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button type="button" id="save-modal-data-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Confirm</button>
			</div>
        </div>
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="class-migration-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Class Migration</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div class="container form-input-container gap-4 mb-3">
                        <div class="callout callout-warning">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <p><span class="venue-name"></span> <span class="class-date"></span></p>
                                    <p><span class="class-start-time"></span> - <span class="class-end-time"></span></p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <p><span class="level-name"></span> (<span class="enrolled-students"></span>/<span class="class-size"></span>)</p>
                                    <p>Coach: <span class="coach-attended"></span>/<span class="total-coaches"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Date" 
                            type="date" 
                            name="date"
                            id="date"
                            isRequired="true"
                        />
                    </div>

                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Start Time" 
                            type="time" 
                            name="start_time"
                            id="start_time"
                            isRequired="true"
                        />
                        <x-form-input 
                            label="End Time" 
                            type="time" 
                            name="end_time"
                            id="end_time"
                            isRequired="true"
                        />
                    </div>

                    <div class="container form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Venue" 
                            name="school_venue_id"
                            id="school_venue_id"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Default Venue</option>
                            @foreach($school_venues as $key => $school_venue)
                                <option value="{{ $school_venue['id'] }}">{{ $school_venue['name'] }}</option>
                            @endforeach
                        </x-form-select>
                    </div>

                    <div class="container form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Facility" 
                            name="school_venue_facility_id"
                            id="school_venue_facility_id"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Default Facility</option>
                        </x-form-select>
                    </div>

                    <hr style="margin: 0 -1.5rem">

                    <div class="container form-input-container gap-1 my-3">
                        <div class="form-inline">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                                <textarea name="remarks" class="form-control" placeholder="Remarks..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" id="cancel-btn"  class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button type="button" id="save-modal-data-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Confirm</button>
			</div>
        </div>
    </div>
</div>

<!-- ADD NOTIFICATION MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="notification-modal" data-bs-backdrop="static" data-bs-keyboard="false">
 	<div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Notification</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
 			</div>
 			<div class="modal-body">
				<form id="modal-form">
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
							<div class="form-inline" style="width: 100%;">
								<div class="form-group">
									<label for="datetime_to_send" class="form-label form-input-label">Schedule Notification to send</label>
									<div class="gap-1">
                                        <input name="datetime_to_send" id="datetime_to_send" tabindex="3" class="form-control form-input-date" type="datetime-local">
									</div>
									<div class="col-12 d-flex align-items-center gap-1 mt-2">
										<input type="checkbox" name="send_immediately" tabindex="4" id="send-immediately" checked>
										<label for="send-immediately">Send Immediately</label>
									</div>
								</div>
							</div>
						</div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
                                    <x-form-select
                                        label="Category" 
                                        name="category"
                                        id="category"
                                        isRequired="true"
                                        tabindex="5"
                                        class="form-control"
                                    >
                                        <option value="" hidden>Select Category</option>
                                        <option value="coach-absent">Coach Absent</option>
                                        <option value="student-absent">Student Absent</option>
                                        <option value="class-cancel">Class Cancel</option>
                                        <option value="class-migration">Class Migration</option>
                                        <option value="emergency">Emergency</option>
                                        <option value="enrollment">Enrollment</option>
                                        <option value="customize">Customize</option>
                                    </x-form-select>
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

<!-- Class Enrollment Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="class-enrollment-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Enrollment</h4>
                    <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div id="course-modal_header" class="d-none">
                <div class="col d-xxl-flex justify-content-between align-items-start" style="padding: 1rem 1.5rem 0 1.5rem !important; border-bottom: 1px solid #E8E8E8;">
                    <h4 class="modal-title main-form-title pb-3" style="font-size: 14px; font-weight: 600; color: #4A5C7A; border-bottom: 3px solid #4A5C7A;">COURSE</h4>
                </div>
            </div>
            <div id="main-form" class="modal-body p-4 pt-0">
                <div id="student-detail_container">
                    <label class="detail-column-heading"><u>Student Details</u></label>
                    <table class="table modal-table">
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">GENDER</th>
                                <th scope="col">LEVEL</th>
                                <th scope="col">DATE OF BIRTH (AGE)</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" class="text-center">No Selected Students</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="container" style="padding: 0px;color: #636363;margin-top: 20px; margin-bottom: 15px;">
                        <div class="d-inline-block">
                            <button class="btn btn-primary custom-btn_primary" id="select-student" type="button">
                                <div class="text-nowrap d-flex align-items-center ml-3 mr-3">
                                    Select Student
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="course-details_container" style="margin-bottom: 15px;">
                    <label class="detail-column-heading mb-2"><u>Course Details</u></label>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Type of Course"
                            name="type_of_course"
                            id="type_of_course"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Type of Course</option>
                            <option value="full_term">Full Term</option>
                            <option value="flexible_course">Flexible Course</option>
                        </x-form-select>
                    </div>
                    <table class="table modal-table mt-3">
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col">CLASS</th>
                                <th scope="col">DATE</th>
                                <th scope="col">TIME</th>
                                <th scope="col">VENUE</th>
                                <th scope="col">FACILITY</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" class="text-center">No Selected Course/Class</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="remarks-detail_container" class=" mb-3">
                    <div class="form-inline">
                        <div class="form-group">
                            <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                            <textarea rows="2" name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                        </div>
                    </div>
                </div>
                <div id="modal-actions_container" class="d-flex gap-4">
                    <x-primary-button type="button" id="pay-now_btn" title="Pay Now" toggle="" target=""/>
                    <x-primary-button type="button" id="send-invoice_btn" title="Send Invoice" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Notification Preview -->
<div class="modal fade" role="dialog" tabindex="-1" id="notification-preview-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-end align-items-start p-4">
                    <span class="small-icon_btn p-2 cursor-pointer mr-1" id="edit_notification_btn"><x-svg-icon icon="pencil" /></span>
                    <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div class="modal-body">
                <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                    <div style="width: 25px;" class="pt-1">
                        <x-svg-icon icon="menu" />
                    </div>
                    <div class="form-inline" style="width: 100%;">
                        <div class="form-group position-relative">
                            <h4 for="" class="notification-title"></h4>
                        </div>
                    </div>
                </div>
                <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                    <div style="width: 25px;" class="pt-1">
                        <x-svg-icon icon="file" />
                    </div>
                    <div class="form-inline w-100">
                        <div class="form-group">
                            <p class="notification-content">
                                <span></span><b></b><br><br>If you have any questions, please contact 22956066,<br>WhatsApp 5507 5333 or email to<br>knock@hkswimmingacademy.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                    <div style="width: 25px;" class="pt-1">
                        <x-svg-icon icon="clock" />
                    </div>
                    <div class="form-inline" style="width: 100%;">
                        <div class="form-group">
                            <label for="" class="notification-schedule">Immediately</label>
                        </div>
                    </div>
                </div>
                <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                    <div style="width: 25px;" class="pt-1">
                        <x-svg-icon icon="list" />
                    </div>
                    <div class="form-inline" style="width: 100%;">
                        <div class="form-group">
                            <label for="" class="notification-category"></label>
                        </div>
                    </div>
                </div>
                <div class="container d-xxl-flex form-input-container gap-1 mb-3">
                    <div class="form-inline" style="width: 100%;">
                        <div class="form-group">
                            <label for="">Send via: <span class="notification-send-via">Email, App</span></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" id="process-notification" title="Send Notification" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- SELECT STUDENT MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="select-student-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Select Student</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
                <div class="row">
                    <div class="col" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
                        <div class="tab-content custom-datatable_container" style="padding: 15px;">
                            <div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                                <div class="row announcement-filter-tab">
                                    <div class="col-10 position-relative">
                                        <x-search-input inputType="text" inputName="student_search" inputID="student_search" inputPlaceholder="Search..." />
                                    </div>
                                    <div class="col-2">
                                        <x-form-select
                                            label="" 
                                            name="action"
                                            id="filter_students_by_level_btn"
                                            isRequired="true"
                                        >
                                            <option value="" hidden>Level</option>
                                            @foreach($levels as $key => $level)
                                            <option value="{{ $level['abbreviation'] }}">{{ $level['name'] }}</option>
                                            @endforeach
                                        </x-form-select>
                                    </div>
                                </div>
                                <div class="table-responsive" style="height: auto;max-height: none;">
                                    <table class="table table-hover custom-datatable" id="students-table" style="width: 100%;">
                                        <thead>
                                            <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                                <th class="text-center"></th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">NAME/ID</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">GENDER</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">LEVEL</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">PHONE</th>
                                            </tr>
                                        </thead>
                                        <tbody style="height: auto;">
                                            @foreach($students as $key => $student)
                                            <tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="{{ $key }}">
                                                <td class="text-center"><input type="checkbox" class="check" data-id="{{ $student['id'] }}"></td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $student['name'] }}</td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $student['student_information']['gender'] }}</td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $student['student_information']['level']['name'] ?? '' }}</td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $student['student_information']['phone'] }}</td>
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
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Close</button>
				<button type="button" id="add-students-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Add</button>
			</div>
 		</div>
 	</div>
</div>

<!-- SELECT CLASS MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="select-class-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Class</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
                <div class="row">
                    <div class="col" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
                        <div class="tab-content custom-datatable_container" style="padding: 15px;">
                            <div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                                <div class="row announcement-filter-tab">
                                    <div class="col-10 position-relative">
                                        <x-search-input inputType="text" inputName="class_search" inputID="class_search" inputPlaceholder="Search..." />
                                    </div>
                                    <div class="col-2">
                                        <x-form-select
                                            label="" 
                                            name="action"
                                            id="filter_classes_by_level_btn"
                                            isRequired="true"
                                        >
                                            <option value="" hidden>Level</option>
                                            @foreach($levels as $key => $level)
                                            <option value="{{ $level['abbreviation'] }}">{{ $level['name'] }}</option>
                                            @endforeach
                                        </x-form-select>
                                    </div>
                                </div>
                                <div class="table-responsive" style="height: auto;max-height: none;">
                                    <table class="table table-hover custom-datatable" id="classes-table" style="width: 100%;">
                                        <thead>
                                            <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                                <th class="text-center"></th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">CLASS CODE</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">LEVEL</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">VENUE</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COACH</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">DATE</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">TIME</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">TOTAL FEE (HK$)</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COURSE CATEGORY</th>
                                            </tr>
                                        </thead>
                                        <tbody style="height: auto;">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Close</button>
				<button type="button" id="add-classes-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Add</button>
			</div>
 		</div>
 	</div>
</div>

<!-- Modal for Attendance QR -->
<div class="modal fade" role="dialog" tabindex="-1" id="attendance-qr-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Attendance QR</h4>
                    <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Student List | Left - Table Section -->
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="qr-container" class="d-flex justify-content-center">
                                    
                                </div>
                                <div id="qr-details_container" class="d-flex align-items-center justify-content-center mt-5">
                                    <div class="w-100 p-3">
                                        <div class="row mb-3 mt-2">
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <h6 class="detail-content-heading">CLASS NAME</h6>
                                                    <p id="detail-dob" class="detail-content-heading_value class_name"></p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <h6 class="detail-content-heading">COURSE NAME</h6>
                                                    <p id="detail-dob" class="detail-content-heading_value course_name"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <h6 class="detail-content-heading">CLASS START DATE & TIME</h6>
                                                    <p id="detail-phone" class="detail-content-heading_value start_date_time"></p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <h6 class="detail-content-heading">CLASS END DATE & TIME</h6>
                                                    <p id="detail-grade_of_class" class="detail-content-heading_value end_date_time"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <h6 class="detail-content-heading">VENUE</h6>
                                                    <p id="detail-phone" class="detail-content-heading_value venue"></p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <h6 class="detail-content-heading">FACILITY</h6>
                                                    <p id="detail-grade_of_class" class="detail-content-heading_value facility"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enrollment Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="enrollment-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Enrollment</h4>
                    <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div id="course-modal_header" class="d-none">
                <div class="col d-xxl-flex justify-content-between align-items-start" style="padding: 1rem 1.5rem 0 1.5rem !important; border-bottom: 1px solid #E8E8E8;">
                    <h4 class="modal-title main-form-title pb-3" style="font-size: 14px; font-weight: 600; color: #4A5C7A; border-bottom: 3px solid #4A5C7A;">COURSE</h4>
                </div>
            </div>
            <div id="main-form" class="modal-body p-4 pt-0">
                <div id="student-detail_container">
                    <label class="detail-column-heading"><u>Student Details</u></label>
                    <table class="table modal-table">
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">GENDER</th>
                                <th scope="col">LEVEL</th>
                                <th scope="col">DATE OF BIRTH (AGE)</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" class="text-center">No Selected Students</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="container" style="padding: 0px;color: #636363;margin-top: 20px; margin-bottom: 15px;">
                        <div class="d-inline-block">
                            <button class="btn btn-primary custom-btn_primary" id="select-student" type="button">
                                <div class="text-nowrap d-flex align-items-center ml-3 mr-3">
                                    Select Student
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="course-details_container" style="margin-bottom: 15px;">
                    <label class="detail-column-heading mb-2"><u>Course Details</u></label>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Course"
                            name="course"
                            id="course"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Course</option>
                            @foreach($course_packages as $course_package)
                                <option value="{{ $course_package->id }}">{{ $course_package->course ? $course_package->course['course_abbreviation'] : '-' }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Type of Course"
                            name="type_of_course"
                            id="type_of_course"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Type of Course</option>
                            <option value="full_term">Full Term</option>
                            <option value="flexible_course">Flexible Course</option>
                        </x-form-select>
                    </div>
                    <table class="table modal-table mt-3">
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col">CLASS</th>
                                <th scope="col">DATE</th>
                                <th scope="col">TIME</th>
                                <th scope="col">VENUE</th>
                                <th scope="col">FACILITY</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" class="text-center">No Selected Course/Class</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <x-primary-button type="button" id="select-course" title="Select Course" toggle="" target=""/> -->
                </div>
                <div id="remarks-detail_container" class=" mb-3">
                    <div class="form-inline">
                        <div class="form-group">
                            <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                            <textarea rows="2" name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                        </div>
                    </div>
                </div>
                <div id="modal-actions_container" class="d-flex gap-4">
                    <x-primary-button type="button" id="pay-now_btn" title="Pay Now" toggle="" target=""/>
                    <x-primary-button type="button" id="send-invoice_btn" title="Send Invoice" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('themes/' . $theme->folder . '/js/fullcalendar-6.1.10/dist/index.global.min.js') }}"></script>
<script src="{{ asset('themes/' . $theme->folder . '/js/qrcode.min.js') }}"></script>
<script>
    var selectedLevels = [];
    var selectedVenues = [];
    var selectedCoaches = [];
    var selectedData = {};

    var selectedStudents = [];
    var selectedClasses = [];

    const coursePackages = <?= json_encode($course_packages) ?>;
    const classes = <?= json_encode($classes) ?>;
    const levels = <?= json_encode($levels) ?>;
    const courses = <?= json_encode($courses) ?>;
    const coaches = <?= json_encode($coaches) ?>;
    const students = <?= json_encode($students) ?>;
    const schoolVenues = <?= json_encode($school_venues) ?>;

    var errors = [];
    var notificationData = {};

    var classActionModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('class-action-modal'));
    var coachSettingsModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('coach-settings-modal'));
    var studentSettingsModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('student-settings-modal'));
    var settingsSelectStudentsModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('settings-select-students-modal'));
    var classCancelModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('class-cancel-modal'));
    var classMigrationModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('class-migration-modal'));
    var classEnrollmentModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('class-enrollment-modal'));
    var enrollmentModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('enrollment-modal'));
    var selectStudentModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('select-student-modal'));
    var selectClassModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('select-class-modal'));
    var selectCoachesModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('select-coaches-modal'));
    var notificationModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('notification-modal'));
    var notificationPreviewModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('notification-preview-modal'));
    var attendanceQrModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('attendance-qr-modal'));

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('timetable-calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: false,
            allDaySlot: false,
            initialView: 'dayGridMonth',
            navLinks: true,
            editable: true,
            selectable: true,
            events: @json($events),
            eventDisplay: 'block',
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            },
            dayMaxEvents: 5,
            navLinkDayClick: function(date, jsEvent) {
                calendar.gotoDate(date);
                calendar.changeView('timeGridDay');

                $('.toolbar-day-view').parent().find('.active').removeClass('active');
                $('.toolbar-day-view').addClass('active');
            },
            eventClick: function(info) {
                if(info.event.extendedProps.type === 'class') {
                    $('#class-action-modal .modal-title').text(info.event.title);
                    classActionModal.show();

                    selectedData = classes.find(value => value.id == info.event.id);

                    resetModalForm();
                }
            },
            eventMouseEnter: function(mouseEnterInfo) {
                var el = mouseEnterInfo.el;
                if(mouseEnterInfo.view.type !== 'dayGridMonth') {
                    var eventHeight = $(el).innerHeight();
                    var containerHeight = $(el).find('.fc-event-main').innerHeight();

                    if(containerHeight > eventHeight) {
                        $(el).css('height', 'min-content');
                    }

                    var zIndex = $(el).parent().parent().find('.fc-timegrid-event-harness').length + 1;
                    $(el).parent().css('z-index', zIndex);
                } else {
                    var classData = classes.find(value => value.id == mouseEnterInfo.event.id);
                    var courseCoaches = JSON.parse(classData.course.course_coaches);
                    var venue = classData.course.venue;

                    $(el).find('.fc-event-main-frame').css('display', 'block');

                    var classStartTime = new Date(classData.start_date+' '+classData.start_time);
                    classStartTime = classStartTime.toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" , hour12: true});
                    var classEndTime = new Date(classData.start_date+' '+classData.end_time);
                    classEndTime = classEndTime.toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" , hour12: true});
                    $(el).find('.fc-event-time').text(classStartTime + ' - ' + classEndTime);

                    var coachesNames = '';
                    courseCoaches.forEach(function(coachId) {
                        var coach = coaches.find(value => value.id == coachId);

                        coachesNames += `<p>${coach.name}</p>`;
                    });

                    var courseCoaches = JSON.parse(classData.course.course_coaches);
                    var attended = coaches.filter(function(coach) {
                        var attendances = coach.coach_attendances;
                        return attendances.find((attendance) => attendance.class_id === classData.id && attendance.status === 'Attended');
                    });
                    $(el).find('.fc-event-title-container').append(`<div class="fc-event-title fc-sticky">
                        <div style="display: inline-block">Coach (${attended.length}/${courseCoaches.length}) : </div>
                        <div style="display: inline-block">${coachesNames}</div>
                    </div>`);

                    $(el).find('.fc-event-title-container').append(`<div class="fc-event-title fc-sticky">Venue: ${venue.name}</div>`);
                    $(el).find('.fc-event-title-container').append(`<div class="fc-event-title fc-sticky">Facility: ${classData.course.facility.name}</div><hr>`);

                    $(el).find('.fc-event-title-container').append(`<div class="fc-event-title fc-sticky">Students (${classData.enrolled_students.length}/${classData.course.course_size}) : </div>`);
                    var enrolledStudents = classData.enrolled_students;
                    var studentsElement = '';
                    enrolledStudents.forEach(function(student, index) {
                        studentsElement += `<p>${index + 1}. ${student.class_student.name}</p>`;
                    });
                    $(el).find('.fc-event-title-container').append(`<div class="fc-event-title fc-sticky">${studentsElement}</div>`);

                    $(el).find('.fc-event-title-container').find('.fc-event-title:not(:nth-child(2))').css('display', 'block');
                    $(el).find('.fc-event-title-container').find('.fc-event-title:nth-child(2)').css('display', 'flex');
                    $(el).find('.fc-event-title-container').find('.fc-event-title:nth-child(2)').css('align-items', 'start');
                }
            },
            eventMouseLeave: function(mouseEnterInfo) {
                var el = mouseEnterInfo.el;
                if(mouseEnterInfo.view.type !== 'dayGridMonth') {
                    $(el).css('height', '');

                    var zIndex = $(el).parent().index() + 1;
                    $(el).parent().css('z-index', zIndex);
                } else {
                    var classData = classes.find(value => value.id == mouseEnterInfo.event.id);
                    $(el).find('.fc-event-main-frame').css('display', '');

                    var classStartTime = new Date(classData.start_date+' '+classData.start_time);
                    classStartTime = classStartTime.toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" , hour12: true});
                    $(el).find('.fc-event-time').text(classStartTime);

                    $(el).find('.fc-event-title-container').find('.fc-event-title:not(:first-child)').remove();
                    $(el).find('.fc-event-title-container').find('hr').remove();
                    $(el).find('.fc-event-title-container').find('.fc-event-title').css('display', '');
                }
            },
            eventDidMount: function(info) {
                var view = info.view.type;
                var el = info.el;
                const classes = <?= json_encode($classes) ?>;
                const coaches = <?= json_encode($coaches) ?>;
                var classData = classes.find(value => value.id == info.event.id);
                var courseCoaches = JSON.parse(classData.course.course_coaches);
                var venue = classData.course.venue;

                if(view !== 'dayGridMonth') {
                    if(view === 'timeGridWeek') {
                        $(el).find('.fc-event-title-container').append(`<div class="fc-event-title fc-sticky">${classData.course.level.name} (${classData.enrolled_students.length}/${classData.course.course_size})</div>`);
                        $(el).find('.fc-event-title-container').append(`<div class="fc-event-title fc-sticky">Coach: 0/${courseCoaches.length}</div>`);
                    } else {
                        var coachesNames = '';
                        courseCoaches.forEach(function(coachId) {
                            var coach = coaches.find(value => value.id == coachId);

                            coachesNames = `<p>${coach.name}</p>`;
                        });
                        $(el).find('.fc-event-title-container').append(`<div class="fc-event-title fc-sticky">
                            <div style="display: inline-block">Coach (0/${courseCoaches.length}) : </div>
                            <div style="display: inline-block">${coachesNames}</div>
                        </div>`);

                        $(el).find('.fc-event-title-container').append(`<div class="fc-event-title fc-sticky">Venue: ${venue.name}</div><hr>`);

                        var enrolledStudents = classData.enrolled_students;
                        var studentsNames = '';
                        enrolledStudents.forEach(function(student, index) {
                            studentsNames = `<p>${index + 1}. ${student.class_student.name}</p>`;
                        });
                        $(el).find('.fc-event-title-container').append(`<div class="fc-event-title fc-sticky">${studentsNames}</div>`);
                    }
                }
            }
        });
        calendar.render();

        $('.toolbar-prev-button').on('click', function() {
            calendar.prev();

            setDateTitle();
        });

        $('.toolbar-next-button').on('click', function() {
            calendar.next();

            setDateTitle();
        });

        $('#date').on('change', function() {
            calendar.gotoDate($(this).val());

            setDateTitle();
        });

        $('.toolbar-month-view').on('click', function() {
            calendar.changeView('dayGridMonth');
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');

            setDateTitle();
            renderEvents();
        });

        $('.toolbar-week-view').on('click', function() {
            calendar.changeView('timeGridWeek');
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');

            setDateTitle();
            renderEvents();
        });

        $('.toolbar-day-view').on('click', function() {
            calendar.changeView('timeGridDay');
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');

            setDateTitle();
            renderEvents();
        });

        $('#level-dropdown .dropdown-menu a.dropdown-item').on('click', function() {
            if(selectedLevels.includes(parseInt($(this).data('id')))) {
                var index = selectedLevels.indexOf(parseInt($(this).data('id')));
                selectedLevels.splice(index, 1);
                $(this).removeClass('active');
            } else {
                selectedLevels.push(parseInt($(this).data('id')));
                $(this).addClass('active');
            }

            renderEvents();
        });

        $('#venue-dropdown .dropdown-menu a.dropdown-item').on('click', function() {
            if(selectedVenues.includes(parseInt($(this).data('id')))) {
                var index = selectedVenues.indexOf(parseInt($(this).data('id')));
                selectedVenues.splice(index, 1);
                $(this).removeClass('active');
            } else {
                selectedVenues.push(parseInt($(this).data('id')));
                $(this).addClass('active');
            }

            renderEvents();
        });

        $('#coach-dropdown .dropdown-menu a.dropdown-item').on('click', function() {
            if(selectedCoaches.includes(parseInt($(this).data('id')))) {
                var index = selectedCoaches.indexOf(parseInt($(this).data('id')));
                selectedCoaches.splice(index, 1);
                $(this).removeClass('active');
            } else {
                selectedCoaches.push(parseInt($(this).data('id')));
                $(this).addClass('active');
            }

            renderEvents();
        });

        function setDateTitle()
        {
            var date = new Date(calendar.getDate());
            var month = date.toLocaleString('default', { month: 'long' });
            var day = date.getDate();
            var year = date.getFullYear();
            switch(calendar.view.type) {
                case 'dayGridMonth' :
                    var title = month+' '+year;
                break;
                case 'timeGridWeek' :
                    day = date.getDay();
                    var diff = date.getDate() - day;
                    var newDate = new Date(date.setDate(diff));
                    var shortMonth = newDate.toLocaleString('default', { month: 'short' });
                    day = newDate.getDate();
                    year = newDate.getFullYear();

                    var endDate = new Date(date);
                    endDate.setDate(endDate.getDate() + 6);
                    var endShortMonth = endDate.toLocaleString('default', { month: 'short' });

                    if(date.getMonth() != endDate.getMonth() ) {
                        if(year < endDate.getFullYear()) {
                            var title = shortMonth+' '+day+', '+year+' - '+endShortMonth+' '+endDate.getDate()+', '+endDate.getFullYear();
                        } else {
                            var title = shortMonth+' '+day+' - '+endShortMonth+' '+endDate.getDate()+', '+year;
                        }
                    } else {
                        var title = shortMonth+' '+day+' - '+endDate.getDate()+', '+year;
                    }
                break;
                case 'timeGridDay' :
                    var title = month+' '+day+', '+year;
                break;
            }

            $('.toolbar-title').text(title);
        }

        function renderEvents()
        {
            var events = classes.filter(function(el) {
                var levelSelected = true;
                if(selectedLevels.length > 0) {
                    levelSelected = selectedLevels.includes(el.course.level.id);
                }

                var venueSelected = true;
                if(selectedVenues.length > 0) {
                    if(el.venue_id === null || el.venue_id === 0 || el.venue_id === '0' || el.venue_id === '') {
                        venueSelected = selectedVenues.includes(el.course.venue.id);
                    } else {
                        venueSelected = selectedVenues.includes(el.venue_id);
                    }
                }

                var coachSelected = true;
                if(selectedCoaches.length > 0) {
                    if(el.coach_id === null || el.coach_id === 0 || el.coach_id === '0' || el.coach_id === '') {
                        var courseCoaches = JSON.parse(el.course.course_coaches);

                        coachSelected = false;
                        for(i = 0; i < courseCoaches.length; i++)
                        {
                            if(selectedCoaches.includes(parseInt(courseCoaches[i]))) {
                                coachSelected = true;
                            }
                        }
                    } else {
                        coachSelected = selectedCoaches.includes(el.coach_id);
                    }
                }

                return levelSelected && venueSelected && coachSelected;
            });

            calendar.removeAllEvents();
            events.forEach(function(event) {
                calendar.addEvent({
                    "id" : event.id,
                    "title" : event.course_class_code,
                    "start" : event.start_date+'T'+event.start_time,
                    "end" : event.start_date+'T'+event.end_time,
                    'backgroundColor' : event.course.level.color,
                    'borderColor' : event.course.level.color,
                    'type' : 'class',
                    'overlap' : false
                });
            });
        }

        // Start of Coach Settings functions
        var coachesTable = $('#select-coaches-modal #coaches-table').DataTable({
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
                {"orderable": true, "searchable": true},
            ]
        });

        $('#class-action-modal #coach-settings-action').on('click', function(e) {
            e.preventDefault();

            classActionModal.hide();

            var venue = selectedData.course.venue;
            $('#coach-settings-modal .venue-name').text(venue.short_name);
            var classDate = new Date(selectedData.start_date);
            $('#coach-settings-modal .class-date').text(classDate.toLocaleString('default', { month: 'numeric', day: 'numeric', year: 'numeric' }));
            var startTime = selectedData.start_time;
            startTime = startTime.substring(0, startTime.length-3);
            $('#coach-settings-modal .class-start-time').text(startTime);
            var endTime = selectedData.end_time;
            endTime = endTime.substring(0, endTime.length-3);
            $('#coach-settings-modal .class-end-time').text(endTime);

            var level = selectedData.course.level;
            $('#coach-settings-modal .level-name').text(level.name);
            $('#coach-settings-modal .enrolled-students').text(selectedData.enrolled_students.length);
            $('#coach-settings-modal .class-size').text(selectedData.course.course_size);

            var courseCoaches = JSON.parse(selectedData.course.course_coaches);
            var attended = coaches.filter(function(coach) {
                var attendances = coach.coach_attendances;
                return attendances.find((attendance) => attendance.class_id === selectedData.id && attendance.status === 'Attended');
            });

            $('#coach-settings-modal .total-coaches').text(courseCoaches.length);
            $('#coach-settings-modal .coach-attended').text(attended.length);

            coachSettingsModal.show();
        });

        $('#coach-settings-modal #coach_setting_action').on('change', function() {
            $('#coach-settings-modal #coach-action-form').empty();
            newCoaches = [];
            coachesToReplace = [];
            replacementCoaches = [];
            coachesToRemove = [];
            signAttendanceCoaches = [];
            absentCoaches = [];
            switch($(this).val()) {
                case 'add-coaches' :
                    $('#coach-settings-modal #coach-action-form').html(`<div class="container form-input-container gap-1 my-3" id="added-coaches-container">
                        <div class="row mb-3">
                            <div class="col-12">
                                <h5 style="font-size: 20px">New Coaches</h5>
                            </div>
                        </div>
                    </div>
                    <div class="container my-3" style="padding: 0px;color: #636363;">
                        <div id="new-coaches-container" class="d-flex flex-wrap gap-1 mt-2 mb-4"></div>
                        <x-primary-button type="button" id="select-new-coaches" title="Select Coaches" toggle="" target=""/>
                    </div>

                    <hr style="margin: 0 -1.5rem">`);
                break;
                case 'replace-coaches' :
                    $('#coach-settings-modal #coach-action-form').html(`<div class="container form-input-container gap-1 my-3" id="replaced-coaches-container">
                        <div class="row mb-3">
                            <div class="col-12">
                                <h5 style="font-size: 20px">Coaches to be Replaced</h5>
                            </div>
                        </div>
                    </div>
                    <div class="container my-3" style="padding: 0px;color: #636363;">
                        <div id="coaches-to-be-replaced-container" class="d-flex flex-wrap gap-1 mt-2 mb-4"></div>
                        <x-primary-button type="button" id="select-class-coaches" title="Select Coaches" toggle="" target=""/>
                    </div>

                    <hr style="margin: 0 -1.5rem">

                    <div class="container form-input-container gap-1 my-3" id="replacement-coaches-container">
                        <div class="row mb-3">
                            <div class="col-12">
                                <h5 style="font-size: 20px">Replacement Coaches</h5>
                            </div>
                        </div>
                    </div>
                    <div class="container my-3" style="padding: 0px;color: #636363;">
                        <div id="coaches-to-replace-container" class="d-flex flex-wrap gap-1 mt-2 mb-4"></div>
                        <x-primary-button type="button" id="select-new-coaches" title="Select Coaches" toggle="" target=""/>
                    </div>

                    <hr style="margin: 0 -1.5rem">`);
                break;
                case 'remove-coaches' :
                    $('#coach-settings-modal #coach-action-form').html(`<div class="container form-input-container gap-1 my-3" id="absent-coaches-container">
                        <div class="row mb-3">
                            <div class="col-12">
                                <h5 style="font-size: 20px">Coaches to Remove</h5>
                            </div>
                        </div>
                    </div>
                    <div class="container my-3" style="padding: 0px;color: #636363;">
                        <div id="coaches-to-remove-container" class="d-flex flex-wrap gap-1 mt-2 mb-4"></div>
                        <x-primary-button type="button" id="select-class-coaches" title="Select Coaches" toggle="" target=""/>
                    </div>

                    <hr style="margin: 0 -1.5rem">`);
                break;
                case 'sign-attendance' :
                    $('#coach-settings-modal #coach-action-form').html(`<div class="container form-input-container gap-1 my-3" id="attended-coaches-container">
                        <div class="row mb-3">
                            <div class="col-12">
                                <h5 style="font-size: 20px">Sign Attendance for</h5>
                            </div>
                        </div>
                    </div>
                    <div class="container my-3" style="padding: 0px;color: #636363;">
                        <div id="coaches-to-sign-attendance-container" class="d-flex flex-wrap gap-1 mt-2 mb-4"></div>
                        <x-primary-button type="button" id="select-class-coaches" title="Select Coaches" toggle="" target=""/>
                    </div>

                    <hr style="margin: 0 -1.5rem">`);
                break;
                case 'absent' :
                    $('#coach-settings-modal #coach-action-form').html(`<div class="container form-input-container gap-1 my-3" id="absent-coaches-container">
                        <div class="row mb-3">
                            <div class="col-12">
                                <h5 style="font-size: 20px">Absent Coaches for</h5>
                            </div>
                        </div>
                    </div>
                    <div class="container my-3" style="padding: 0px;color: #636363;">
                        <div id="coaches-to-mark-absent-container" class="d-flex flex-wrap gap-1 mt-2 mb-4"></div>
                        <x-primary-button type="button" id="select-class-coaches" title="Select Coaches" toggle="" target=""/>
                    </div>

                    <hr style="margin: 0 -1.5rem">`);
                break;
            }
        });

        var container = null;
        $(document).on('click', '#coach-settings-modal #select-new-coaches', function() {
            container = $(this).parent().prev();

            coachesTable.destroy();
            $('#select-coaches-modal #coaches-table tbody').empty();

            const courseCoaches = JSON.parse(selectedData.course.course_coaches);
            const filteredCoaches = coaches.filter(function(coach) {
                return !courseCoaches.find((coachId) => parseInt(coachId) === coach.id);
            });

            let coachesElement = '';
            filteredCoaches.forEach((value, key) => {
                coachesElement += `<tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="${key}">
                    <td class="text-center"><input type="checkbox" class="check" data-id="${value.id}" ${container.find(`.selected-coach[data-coach_id=${value.id}]`).length ? 'checked' : ''}></td>
                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.name}</td>
                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.email}</td>
                </tr>`;
            });

            $('#select-coaches-modal #coaches-table tbody').append(coachesElement);

            coachesTable = $('#select-coaches-modal #coaches-table').DataTable({
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
                    {"orderable": true, "searchable": true},
                ]
            });

            coachSettingsModal.hide();

            selectCoachesModal.show();
        });

        $(document).on('click', '#coach-settings-modal #select-class-coaches', function() {
            container = $(this).parent().prev();

            coachesTable.destroy();
            $('#select-coaches-modal #coaches-table tbody').empty();

            const courseCoaches = JSON.parse(selectedData.course.course_coaches);
            const filteredCoaches = coaches.filter(function(coach) {
                return courseCoaches.find((coachId) => parseInt(coachId) === coach.id);
            });

            let coachesElement = '';
            filteredCoaches.forEach((value, key) => {
                coachesElement += `<tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="${key}">
                    <td class="text-center"><input type="checkbox" class="check" data-id="${value.id}"></td>
                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.name}</td>
                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.email}</td>
                </tr>`;
            });

            $('#select-coaches-modal #coaches-table tbody').append(coachesElement);

            coachesTable = $('#select-coaches-modal #coaches-table').DataTable({
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
                    {"orderable": true, "searchable": true},
                ]
            });

            coachSettingsModal.hide();

            selectCoachesModal.show();
        });

        $('#select-coaches-modal').on('hidden.bs.modal', function() {
            container = null;
            coachSettingsModal.show();
        });

        $('#select-coaches-modal #coach_search').on('keyup', function() {
            var searchTerm = $(this).val();

            coachesTable.column(1).search(searchTerm).draw();
        });

        var newCoaches = [];
        var coachesToReplace = [];
        var replacementCoaches = [];
        var coachesToRemove = [];
        var signAttendanceCoaches = [];
        var absentCoaches = [];
        $('#select-coaches-modal #add-coaches-btn').on('click', function() {
            var selected = $('#select-coaches-modal #coaches-table tbody  tr .check:checked');

            switch(container.attr('id')) {
                case 'new-coaches-container' :
                    var array = newCoaches;
                break;
                case 'coaches-to-be-replaced-container' :
                    var array = coachesToReplace;
                break;
                case 'coaches-to-replace-container' :
                    var array = replacementCoaches;
                break;
                case 'coaches-to-remove-container' :
                    var array = coachesToRemove;
                break;
                case 'coaches-to-sign-attendance-container' :
                    var array = signAttendanceCoaches;
                break;
                case 'coaches-to-mark-absent-container' :
                    var array = absentCoaches;
                break;
            }
            selected.each(function(key, element) {
                const isExist = array.find(val => val.id == $(this).data('id'));

                if( isExist )
                    return;

                array.push({
                    id: $(this).data('id')
                });
            });

            switch(container.attr('id')) {
                case 'new-coaches-container' :
                    newCoaches = array;
                break;
                case 'coaches-to-be-replaced-container' :
                    coachesToReplace = array;
                break;
                case 'coaches-to-replace-container' :
                    replacementCoaches = array;
                break;
                case 'coaches-to-remove-container' :
                    coachesToRemove = array;
                break;
                case 'coaches-to-sign-attendance-container' :
                    signAttendanceCoaches = array;
                break;
                case 'coaches-to-mark-absent-container' :
                    absentCoaches = array;
                break;
            }

            displaySelectedCoaches(array);

            selectCoachesModal.hide();
            coachSettingsModal.show();
        });

        function displaySelectedCoaches(array) {
            let items = "";
            array.forEach((element, key) => {
                const coach = coaches.find(value => value.id == parseInt(element.id));

                items += `<div class="d-xxl-flex align-items-xxl-center selected-coach" style="height: 48px;background: #ffffff;border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding: 20px;" data-coach_id="${coach.id}">
                    <div class="col-xxl-11 w-auto mr-4">
                        <label class="col-form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">${coach.name}</label>
                    </div>
                    <div class="col cursor-pointer d-flex gap-1">
                        <div class="remove-coach" data-index="${key}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg" style="width: 16px; height: 16px;">
                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                            </svg>
                        </div>
                    </div>
                </div>`;
            });

            container.empty();
            container.append(items);
        }

        $(document).on('click', '#coach-settings-modal .remove-coach', function() {
            const index = $(this).data('index');
            switch($(this).closest('.selected-coach').parent().attr('id')) {
                case 'new-coaches-container' :
                    newCoaches.splice(index, 1);
                break;
                case 'coaches-to-be-replaced-container' :
                    coachesToReplace.splice(index, 1);
                break;
                case 'coaches-to-replace-container' :
                    replacementCoaches.splice(index, 1);
                break;
                case 'coaches-to-remove-container' :
                    coachesToRemove.splice(index, 1);
                break;
                case 'coaches-to-sign-attendance-container' :
                    signAttendanceCoaches.splice(index, 1);
                break;
                case 'coaches-to-mark-absent-container' :
                    absentCoaches.splice(index, 1);
                break;
            }

            $(this).closest('.selected-coach').remove();
        });

        $('#coach-settings-modal #save-modal-data-btn').on('click', function() {
            $(this).attr('disabled', 'true');
            var formData = $('#coach-settings-modal #modal-form').serializeArray();

            switch($('#coach-settings-modal #coach_setting_action').val()) {
                case 'add-coaches' :
                    var addCoaches = [];
                    $('#coach-settings-modal #new-coaches-container').children('.selected-coach').each(function() {
                        addCoaches.push($(this).data('coach_id'))
                    });

                    if(addCoaches.length > 0) {
                        formData.push({
                            name: 'new_coaches',
                            value: addCoaches
                        });
                    }
                break;
                case 'replace-coaches' :
                    var replaceCoaches = [];
                    $('#coach-settings-modal #coaches-to-be-replaced-container').children('.selected-coach').each(function() {
                        replaceCoaches.push($(this).data('coach_id'));
                    });

                    if(replaceCoaches.length > 0) {
                        formData.push({
                            name: 'coaches_to_replace',
                            value: replaceCoaches
                        });
                    }

                    var replacements = [];
                    $('#coach-settings-modal #coaches-to-replace-container').children('.selected-coach').each(function() {
                        replacements.push($(this).data('coach_id'));
                    });

                    if(replacements.length > 0) {
                        formData.push({
                            name: 'replacement_coaches',
                            value: replacements
                        });
                    }
                break;
                case 'remove-coaches' :
                    var toRemove = [];
                    $('#coach-settings-modal #coaches-to-remove-container').children('.selected-coach').each(function() {
                        toRemove.push($(this).data('coach_id'));
                    });

                    if(toRemove.length > 0) {
                        formData.push({
                            name: 'coaches_to_remove',
                            value: toRemove
                        });
                    }
                break;
                case 'sign-attendance' :
                    var signAttendance = [];
                    $('#coach-settings-modal #coaches-to-sign-attendance-container').children('.selected-coach').each(function() {
                        signAttendance.push($(this).data('coach_id'));
                    });

                    if(signAttendance.length > 0) {
                        formData.push({
                            name: 'sign_attendance_coaches',
                            value: signAttendance
                        });
                    }
                break;
                case 'absent' :
                    var absent = [];
                    $('#coach-settings-modal #coaches-to-mark-absent-container').children('.selected-coach').each(function() {
                        absent.push($(this).data('coach_id'));
                    });

                    if(absent.length > 0) {
                        formData.push({
                            name: 'absent_coaches',
                            value: absent
                        });
                    }
                break;
            }

            if( validateCoachSettings(formData) ) {
                $(this).removeAttr('disabled');

                return;
            }

            let transformedData = {};

            formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            transformedData['class_id'] = selectedData.id;

            var notificationReceivers = [];
            var enrolledStudents = selectedData.enrolled_students;
            enrolledStudents.forEach(function(student, index) {
                notificationReceivers.push(student.class_student.id);
            });

            var courseCoaches = JSON.parse(selectedData.course.course_coaches);
            courseCoaches.forEach((coachId) => {
                notificationReceivers.push(coachId);
            });

            switch($('#coach-settings-modal #coach_setting_action').val()) {
                case 'add-coaches' :
                    $('#coach-settings-modal #new-coaches-container').children('.selected-coach').each(function() {
                        notificationReceivers.push($(this).data('coach_id'))
                    });
                break;
                case 'replace-coaches' :
                    $('#coach-settings-modal #coaches-to-replace-container').children('.selected-coach').each(function() {
                        notificationReceivers.push($(this).data('coach_id'));
                    });
                break;
            }

            notificationData['receivers'] = notificationReceivers;
            processCoachSettings(transformedData);
        });

        async function processCoachSettings(transformedData)
        {
            // get user token
			const userToken = getUserToken();

            await axios.post(`${getApiUrl()}/timetable/coach-settings`, transformedData, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            }).then(res => {
                $('#coach-settings-modal #save-modal-data-btn').removeAttr('disabled');
                coachSettingsModal.hide();

                if ( res.data.success ) {
                    toastTopEnd("Success", res.data.message, "success");

                    var venue = selectedData.course.venue;
                    var classDate = new Date(selectedData.start_date);
                    classDate = classDate.toLocaleString('default', { month: 'numeric', day: 'numeric', year: 'numeric' });
                    var classStartTime = new Date(selectedData.start_date+' '+selectedData.start_time);
                    classStartTime = classStartTime.toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" , hour12: true});
                    var classSched = classDate+' '+classStartTime;

                    $('#notification-preview-modal .notification-content b').text(classSched+' at '+venue.short_name);

                    switch(transformedData.coach_setting_action) {
                        case 'add-coaches' :
                            $('#notification-preview-modal .notification-title').text('Coach Add Notification');
                            $('#notification-preview-modal .notification-content span').text(`${transformedData.new_coaches.length > 1 ? 'New coaches' : 'A coach'} has been added on `);
                            $('#notification-preview-modal .notification-category').text('Customize');
                        break;
                        case 'replace-coaches' :
                            $('#notification-preview-modal .notification-title').text('Coach Swap Notification');
                            $('#notification-preview-modal .notification-content span').text(`Coach swap for `);
                            $('#notification-preview-modal .notification-category').text('Customize');
                        break;
                        case 'remove-coaches' :
                            $('#notification-preview-modal .notification-title').text('Coach Removal Notification');
                            $('#notification-preview-modal .notification-content span').text(`${transformedData.coaches_to_remove.length > 1 ? 'Coaches' : 'A coach'} has been removed on `);
                            $('#notification-preview-modal .notification-category').text('Customize');
                        break;
                        case 'sign-attendance' :
                            $('#notification-preview-modal .notification-title').text('Coach Attendance Notification');
                            $('#notification-preview-modal .notification-content span').text(`${transformedData.sign_attendance_coaches.length > 1 ? 'Coaches are' : 'A coach is'} present on `);
                            $('#notification-preview-modal .notification-category').text('Customize');
                        break;
                        case 'absent' :
                            $('#notification-preview-modal .notification-title').text('Coach Absent Notification');
                            $('#notification-preview-modal .notification-content span').text(`${transformedData.absent_coaches.length > 1 ? 'Coaches are' : 'A coach is'} absent on `);
                            $('#notification-preview-modal .notification-category').text('Coach Absent');
                        break;
                    }

                    notificationPreviewModal.show();
                } else {
                    toastInfo("Cant' Save", res.data.message, "warning");
                }
            }).catch(error => {
                $('#coach-settings-modal #save-modal-data-btn').removeAttr('disabled');

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

        function validateCoachSettings(formData)
        {
            var requiredFields = ['coach_setting_action'];
            const action = formData.find((item) => item.name === 'coach_setting_action');

            switch(action.value) {
                case 'add-coaches' :
                    requiredFields.push('new_coaches');
                break;
                case 'replace-coaches' :
                    requiredFields.push('coaches_to_replace');
                    requiredFields.push('replacement_coaches');
                break;
                case 'remove-coaches' :
                    requiredFields.push('coaches_to_remove');
                break;
                case 'sign-attendance' :
                    requiredFields.push('sign_attendance_coaches');
                break;
                case 'absent' :
                    requiredFields.push('absent_coaches');
                break;
            }

            errors.forEach((element) => {
                if(element.field_name !== 'remarks' && element.field_name !== 'coach_setting_action') {
                    switch(element.field_name) {
                        case 'new_coaches' :
                            var fieldSelector = $(`#coach-settings-modal #added-coaches-container h5`);
                        break;
                        case 'coaches_to_replace' :
                            var fieldSelector = $(`#coach-settings-modal #replaced-coaches-container h5`);
                        break;
                        case 'replacement_coaches' :
                            var fieldSelector = $(`#coach-settings-modal #replacement-coaches-container h5`);
                        break;
                        case 'coaches_to_remove' :
                            var fieldSelector = $(`#coach-settings-modal #coaches-to-remove-container h5`);
                        break;
                        case 'sign_attendance_coaches' :
                            var fieldSelector = $(`#coach-settings-modal #attended-coaches-container h5`);
                        break;
                        case 'absent_coaches' :
                            var fieldSelector = $(`#coach-settings-modal #absent-coaches-container h5`);
                        break;
                    }

                    if ( fieldSelector.next().is('p') )
                        fieldSelector.next().remove();
                } else {
                    const fieldSelector = $(`#coach-settings-modal [name="${element.field_name}"]`);
                    // Clear the errors first
                    fieldSelector.removeClass('border border-danger');
                    fieldSelector.removeClass('border border-danger');

                    if ( fieldSelector.next().is('p') )
                        fieldSelector.next().remove();

                    if ( fieldSelector.parent().next().is('p') )
                        fieldSelector.parent().next().remove();
                }
            });

            errors = [];

            formData.forEach(function(item) {
                if ( requiredFields.includes(item.name) ) {
                    if( item.value == "" || item.value == undefined){
                        errors.push({
                            field_name: item.name,
                            message: formatString(item.name) + " is required."
                        });
                    }
                }
            });

            switch(action.value) {
                case 'add-coaches' :
                    if(!formData.find((item) => item.name === 'new_coaches')) {
                        errors.push({
                            field_name: 'new_coaches',
                            message: "New coaches is required."
                        });
                    }
                break;
                case 'replace-coaches' :
                    if(!formData.find((item) => item.name === 'coaches_to_replace')) {
                        errors.push({
                            field_name: 'coaches_to_replace',
                            message: "Coaches to be Replaced is required."
                        });
                    }

                    if(!formData.find((item) => item.name === 'replacement_coaches')) {
                        errors.push({
                            field_name: 'replacement_coaches',
                            message: "Replacement Coaches is required."
                        });
                    }
                break;
                case 'remove-coaches' :
                    if(!formData.find((item) => item.name === 'coaches_to_remove')) {
                        errors.push({
                            field_name: 'coaches_to_remove',
                            message: "Coaches to Remove is required."
                        });
                    }
                break;
                case 'sign-attendance' :
                    if(!formData.find((item) => item.name === 'sign_attendance_coaches')) {
                        errors.push({
                            field_name: 'sign_attendance_coaches',
                            message: "Coaches is required."
                        });
                    }
                break;
                case 'absent' :
                    if(!formData.find((item) => item.name === 'absent_coaches')) {
                        errors.push({
                            field_name: 'absent_coaches',
                            message: "Coaches is required."
                        });
                    }
                break;
            }

            if ( errors.length > 0 ) {
                renderErrors('coach-settings-modal');

                return true;
            }

            return false;
        }
        // End of Coach Absent functions

        // Start of Student Settings functions
        var settingsStudentsTable = $('#settings-select-students-modal #students-table').DataTable({
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
                {"orderable": true, "searchable": true},
                {"orderable": true, "searchable": true},
                {"orderable": true, "searchable": true},
            ]
        });

        $('#class-action-modal #student-settings-action').on('click', function(e) {
            e.preventDefault();

            classActionModal.hide();

            var venue = selectedData.course.venue;
            $('#student-settings-modal .venue-name').text(venue.short_name);
            var classDate = new Date(selectedData.start_date);
            $('#student-settings-modal .class-date').text(classDate.toLocaleString('default', { month: 'numeric', day: 'numeric', year: 'numeric' }));
            var startTime = selectedData.start_time;
            startTime = startTime.substring(0, startTime.length-3);
            $('#student-settings-modal .class-start-time').text(startTime);
            var endTime = selectedData.end_time;
            endTime = endTime.substring(0, endTime.length-3);
            $('#student-settings-modal .class-end-time').text(endTime);

            var level = selectedData.course.level;
            $('#student-settings-modal .level-name').text(level.name);
            $('#student-settings-modal .enrolled-students').text(selectedData.enrolled_students.length);
            $('#student-settings-modal .class-size').text(selectedData.course.course_size);

            var courseCoaches = JSON.parse(selectedData.course.course_coaches);
            var attended = coaches.filter(function(coach) {
                var attendances = coach.coach_attendances;
                return attendances.find((attendance) => attendance.class_id === selectedData.id && attendance.status === 'Attended');
            });

            $('#student-settings-modal .total-coaches').text(courseCoaches.length);
            $('#student-settings-modal .coach-attended').text(attended.length);

            studentSettingsModal.show();
        });

        var settingsSelectedStuds = [];
        $('#student-settings-modal #student_setting_action').on('change', function() {
            $('#student-settings-modal #student-action-form').empty();
            if($(this).val()) {
                settingsSelectedStuds = [];

                var sectionTitle = '';
                switch($(this).val()) {
                    case 'sign-attendance' :
                        sectionTitle = 'Sign Attendance for';
                    break;
                    case 'absent' :
                        sectionTitle = 'Absent Students';
                    break;
                    case 'make-up' :
                        sectionTitle = 'Students for Make Up';
                    break;
                    case 'withdrawal' :
                        sectionTitle = 'Withdraw Students';
                    break;
                }

                $('#student-settings-modal #student-action-form').html(`<hr style="margin: 0 -1.5rem">

                <div class="container form-input-container gap-1 my-3" id="selected-students-container">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h5 style="font-size: 20px">${sectionTitle}</h5>
                        </div>
                    </div>
                </div>
                <div class="container my-3" style="padding: 0px;color: #636363;">
                    <div id="students-container" class="d-flex flex-wrap gap-1 mt-2 mb-4"></div>
                    <x-primary-button type="button" id="select-class-students" title="Select Students" toggle="" target=""/>
                </div>`);

                const coursePackage = Object.values(coursePackages).find(value => value.course_id == selectedData.course.id);
                var selectedPackage = coursePackage;
                var courseClasses = coursePackage.course.course_classes;

                switch($(this).val()) {
                    case 'make-up' :
                        var availableClasses = '';
                        courseClasses.forEach((value, key) => {
                            if(value.id !== selectedData.id) {
                                availableClasses += `<option value="${value.id}">${value.course_class_code} (${value.start_date} ${value.start_time} - ${value.end_time})</option>`;
                            }
                        });
                        $('#student-settings-modal #student-action-form').append(`<hr style="margin: 0 -1.5rem">
                        <div class="container my-3" style="padding: 0px;color: #636363;">
                            <div class="form-inline w-100" style="">
                                <div class="form-group">
                                    <label for="new_class_id" class="form-label" style="color: #636363;font-size: 14px;">Available Classes (optional)</label>
                                    <select id="new_class_id" name="new_class_id" value="" tabindex="" class="form-control " style="background-color: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                        <option value="" hidden="">Select Available Class</option>
                                        ${availableClasses}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container my-3" style="padding: 0px;color: #636363;">
                            <div class="form-group w-100">
                                <label class="form-label form-input-label">Upload Attachments</label>
                                <input name="attachment" class="form-control" type="file">
                            </div>
                        </div>
                        <div class="container form-input-container gap-1 my-3">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Reason <span class="text-danger">*</span></label>
                                    <textarea name="reason" class="form-control" placeholder="Reason" style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </div>
                        </div>`);
                    break;
                    case 'withdrawal' :
                        var otherCourseClasses = '';
                        courseClasses.forEach((value, key) => {
                            if(value.id !== selectedData.id) {
                                otherCourseClasses += `<p>${value.course_class_code} (${value.start_date} ${value.start_time} - ${value.end_time})</p>`;
                            }
                        });
                        $('#student-settings-modal #student-action-form').append(`<hr style="margin: 0 -1.5rem">
                        <div class="container my-3" style="padding: 0px;color: #636363;">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h5 style="font-size: 20px">Remaining Classes</h5>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    ${otherCourseClasses}
                                </div>
                            </div>
                        </div>
                        <hr style="margin: 0 -1.5rem">
                        <div class="container my-3" style="padding: 0px;color: #636363;">
                            <div class="form-group w-100">
                                <label class="form-label form-input-label">Upload Attachments</label>
                                <input name="attachment" class="form-control" type="file">
                            </div>
                        </div>
                        <div class="container form-input-container gap-1 my-3">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Reason <span class="text-danger">*</span></label>
                                    <textarea name="reason" class="form-control" placeholder="Reason" style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </div>
                        </div>`);
                    break;
                }
            }
        });
        
        var studentSettingsAttachment = '';
        $(document).on('change', '#student-settings-modal [name=attachment]', function() {
            if($(this)[0].files.length < 1) {
                studentSettingsAttachment = '';
            } else {
                var file = $(this)[0].files[0];

                var reader = new FileReader();

                reader.onload = function(e) {
                    const content = e.target.result.split(',')[1]; // Extract base64-encoded content

                    studentSettingsAttachment = {
                        name: file.name,
                        type: file.type,
                        size: file.size,
                        content: content
                    };
                };

                // Read the file as a data URL
                reader.readAsDataURL(file);
            }
        });

        $(document).on('click', '#student-settings-modal #select-class-students', function() {
            settingsStudentsTable.destroy();
            $('#settings-select-students-modal #students-table tbody').empty();

            const enrolledStudents = selectedData.enrolled_students;

            let studentsElement = '';
            enrolledStudents.forEach((value, key) => {
                const studentLevel = levels.find((level) => level.id === value.class_student.student_information.student_level);

                studentsElement += `<tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="${key}">
                    <td class="text-center"><input type="checkbox" class="check" data-id="${value.class_student.id}" ${$('#student-settings-modal #students-container').find(`.selected-student[data-student_id=${value.class_student.id}]`).length ? 'checked' : ''}></td>
                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.class_student.name}</td>
                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.class_student.email}</td>
                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${studentLevel.name}</td>
                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.class_student.student_information.phone}</td>
                </tr>`;
            });

            $('#settings-select-students-modal #students-table tbody').append(studentsElement);

            settingsStudentsTable = $('#settings-select-students-modal #students-table').DataTable({
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
                    {"orderable": true, "searchable": true},
                    {"orderable": true, "searchable": true},
                    {"orderable": true, "searchable": true},
                ]
            });

            studentSettingsModal.hide();

            settingsSelectStudentsModal.show();
        });

        $('#settings-select-students-modal').on('hidden.bs.modal', function() {
            studentSettingsModal.show();
        });

        $('#settings-select-students-modal #student_search').on('keyup', function() {
            var searchTerm = $(this).val();

            settingsStudentsTable.column(1).search(searchTerm).draw();
        });

        $('#settings-select-students-modal #add-students-btn').on('click', function() {
            var selected = $('#settings-select-students-modal #students-table tbody  tr .check:checked');

            selected.each(function(key, element) {
                const isExist = settingsSelectedStuds.find(val => val.id == $(this).data('id'));

                if( isExist )
                    return;

                settingsSelectedStuds.push({
                    id: $(this).data('id')
                });
            });

            displaySelectedStudents();

            settingsSelectStudentsModal.hide();
            studentSettingsModal.show();
        });

        function displaySelectedStudents()
        {
            let items = "";

            settingsSelectedStuds.forEach((element, key) => {
                const student = students.find(value => value.id == parseInt(element.id));

                items += `<div class="d-xxl-flex align-items-xxl-center selected-student" style="height: 48px;background: #ffffff;border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding: 20px;" data-student_id="${student.id}">
                    <div class="col-xxl-11 w-auto mr-4">
                        <label class="col-form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">${student.name}</label>
                    </div>
                    <div class="col cursor-pointer d-flex gap-1">
                        <div class="remove-student" data-index="${key}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg" style="width: 16px; height: 16px;">
                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                            </svg>
                        </div>
                    </div>
                </div>`;
            });

            $('#student-settings-modal #students-container').empty();
            $('#student-settings-modal #students-container').append(items);
        }

        $(document).on('click', '#student-settings-modal .remove-student', function() {
            const index = $(this).data('index');

            settingsSelectedStuds.splice(index, 1);

            $(this).closest('.selected-student').remove();
        });

        $('#student-settings-modal #save-modal-data-btn').on('click', function() {
            $(this).attr('disabled', 'true');
            var formData = $('#student-settings-modal #modal-form').serializeArray();

            if(settingsSelectedStuds.length > 0) {
                formData.push({
                    name: 'student_ids',
                    value: settingsSelectedStuds
                });
            }

            if( validateStudentSettings(formData) ) {
                $(this).removeAttr('disabled');

                return;
            }

            let transformedData = {};

            formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            transformedData['class_id'] = selectedData.id;

            if(studentSettingsAttachment) {
                transformedData['attachment'] = studentSettingsAttachment;
            }

            var notificationReceivers = [];
            settingsSelectedStuds.forEach((studentId) => {
                notificationReceivers.push(studentId);
            });
            var courseCoaches = JSON.parse(selectedData.course.course_coaches);
            courseCoaches.forEach((coachId) => {
                notificationReceivers.push(coachId);
            });

            notificationData['receivers'] = notificationReceivers;
            processStudentSettings(transformedData);
        });

        async function processStudentSettings(transformedData)
        {
            // get user token
			const userToken = getUserToken();

            await axios.post(`${getApiUrl()}/timetable/student-settings`, transformedData, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            }).then(res => {
                $('#student-settings-modal #save-modal-data-btn').removeAttr('disabled');
                studentSettingsModal.hide();

                if ( res.data.success ) {
                    toastTopEnd("Success", res.data.message, "success");

                    var venue = selectedData.course.venue;
                    var classDate = new Date(selectedData.start_date);
                    classDate = classDate.toLocaleString('default', { month: 'numeric', day: 'numeric', year: 'numeric' });
                    var classStartTime = new Date(selectedData.start_date+' '+selectedData.start_time);
                    classStartTime = classStartTime.toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" , hour12: true});
                    var classSched = classDate+' '+classStartTime;

                    $('#notification-preview-modal .notification-content b').text(classSched+' at '+venue.short_name);

                    switch(transformedData.student_setting_action) {
                        case 'sign-attendance' :
                            $('#notification-preview-modal .notification-title').text('Student Attendance Notification');
                            $('#notification-preview-modal .notification-content span').text(`${transformedData.student_ids.length > 1 ? 'Students are' : 'A student is'} present on `);
                            $('#notification-preview-modal .notification-category').text('Customize');
                        break;
                        case 'absent' :
                            $('#notification-preview-modal .notification-title').text('Student Absent Notification');
                            $('#notification-preview-modal .notification-content span').text(`${transformedData.student_ids.length > 1 ? 'Students are' : 'A student is'} absent ${selectedData.course.level.name} 1 lessons on `);
                            $('#notification-preview-modal .notification-category').text('Student Absent');
                        break;
                        case 'make-up' :
                            $('#notification-preview-modal .notification-title').text('Class Make Up Notification');
                            $('#notification-preview-modal .notification-content span').text(`Class make up ${transformedData.student_ids.length > 1 ? 'requests are' : 'request is'} created on `);
                            $('#notification-preview-modal .notification-category').text('Customize');
                        break;
                        case 'withdrawal' :
                            $('#notification-preview-modal .notification-title').text('Student Course Withdrawal Notification');
                            $('#notification-preview-modal .notification-content span').text(`${transformedData.student_ids.length > 1 ? 'Students have' : 'A student has'} requested to withdraw on `);
                            $('#notification-preview-modal .notification-category').text('Customize');
                        break;
                    }

                    notificationPreviewModal.show();
                } else {
                    toastInfo("Cant' Save", res.data.message, "warning");
                }
            }).catch(error => {
                $('#student-settings-modal #save-modal-data-btn').removeAttr('disabled');

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

        function validateStudentSettings(formData)
        {
            var requiredFields = ['coach_setting_action', 'student_ids'];
            const action = formData.find((item) => item.name === 'student_setting_action');

            switch(action.value) {
                case 'make-up' :
                    requiredFields.push('new_class_id');
                    requiredFields.push('reason');
                break;
                case 'withdrawal' :
                    requiredFields.push('reason');
                break;
            }

            errors.forEach((element) => {
                if(element.field_name !== 'remarks' && element.field_name !== 'reason' &&
                element.field_name !== 'new_class_id' && element.field_name !== 'student_setting_action' &&
                element.field_name !== 'attachment') {
                    var fieldSelector = $(`#student-settings-modal #selected-students-container h5`);

                    if ( fieldSelector.next().is('p') )
                        fieldSelector.next().remove();
                } else {
                    const fieldSelector = $(`#student-settings-modal [name="${element.field_name}"]`);
                    // Clear the errors first
                    fieldSelector.removeClass('border border-danger');
                    fieldSelector.removeClass('border border-danger');

                    if ( fieldSelector.next().is('p') )
                        fieldSelector.next().remove();

                    if ( fieldSelector.parent().next().is('p') )
                        fieldSelector.parent().next().remove();
                }
            });

            errors = [];

            formData.forEach(function(item) {
                if ( requiredFields.includes(item.name) ) {
                    if( item.value == "" || item.value == undefined){
                        errors.push({
                            field_name: item.name,
                            message: formatString(item.name) + " is required."
                        });
                    }
                }
            });

            if(!formData.find((item) => item.name === 'student_ids')) {
                errors.push({
                    field_name: 'student_ids',
                    message: "Please select student/s."
                });
            }

            if ( errors.length > 0 ) {
                renderErrors('student-settings-modal');

                return true;
            }

            return false;
        }
        //End of Student Settings functions

        // Start of Class Cancel Action
        $('#class-action-modal #class-cancel-action').on('click', function(e) {
            e.preventDefault();

            classActionModal.hide();

            var venue = selectedData.course.venue;
            $('#class-cancel-modal .venue-name').text(venue.short_name);
            var classDate = new Date(selectedData.start_date);
            $('#class-cancel-modal .class-date').text(classDate.toLocaleString('default', { month: 'numeric', day: 'numeric', year: 'numeric' }));
            var startTime = selectedData.start_time;
            startTime = startTime.substring(0, startTime.length-3);
            $('#class-cancel-modal .class-start-time').text(startTime);
            var endTime = selectedData.end_time;
            endTime = endTime.substring(0, endTime.length-3);
            $('#class-cancel-modal .class-end-time').text(endTime);

            var level = selectedData.course.level;
            $('#class-cancel-modal .level-name').text(level.name);
            $('#class-cancel-modal .enrolled-students').text(selectedData.enrolled_students.length);
            $('#class-cancel-modal .class-size').text(selectedData.course.course_size);

            var courseCoaches = JSON.parse(selectedData.course.course_coaches);
            var attended = coaches.filter(function(coach) {
                var attendances = coach.coach_attendances;
                return attendances.find((attendance) => attendance.class_id === selectedData.id && attendance.status === 'Attended');
            });

            $('#class-cancel-modal .total-coaches').text(courseCoaches.length);
            $('#class-cancel-modal .coach-attended').text(attended.length);

            classCancelModal.show();
        });

        $('#class-cancel-modal #save-modal-data-btn').on('click', function() {
            $(this).attr('disabled', 'true');
            const formData = $('#class-cancel-modal #modal-form').serializeArray();

            if( validateClassCancel(formData) ) {
                $(this).removeAttr('disabled');

                return;
            }

            let transformedData = {};

            formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            transformedData['class_id'] = selectedData.id;

            var notificationReceivers = [];
            var enrolledStudents = selectedData.enrolled_students;
            enrolledStudents.forEach(function(student, index) {
                notificationReceivers.push(student.class_student.id);
            });

            var courseCoaches = JSON.parse(selectedData.course.course_coaches);
            courseCoaches.forEach((coachId) => {
                notificationReceivers.push(coachId);
            });

            notificationData['receivers'] = notificationReceivers;

            processCancelClass(transformedData);
        });

        async function processCancelClass(transformedData)
        {
            // get user token
			const userToken = getUserToken();

            await axios.post(`${getApiUrl()}/timetable/class-cancel`, transformedData, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            }).then(res => {
                $('#class-cancel-modal #save-modal-data-btn').removeAttr('disabled');
                classCancelModal.hide();

                if ( res.data.success ) {
                    toastTopEnd("Success", res.data.message, "success");

                    var venue = selectedData.course.venue;
                    var classDate = new Date(selectedData.start_date);
                    classDate = classDate.toLocaleString('default', { month: 'numeric', day: 'numeric', year: 'numeric' });
                    var classStartTime = new Date(selectedData.start_date+' '+selectedData.start_time);
                    classStartTime = classStartTime.toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" , hour12: true});
                    var classSched = classDate+' '+classStartTime;
                    $('#notification-preview-modal .notification-title').text('Class Cancel Notification');
                    $('#notification-preview-modal .notification-content span').text('Class Cancel on ');
                    $('#notification-preview-modal .notification-content b').text(classSched+' at '+venue.short_name);
                    $('#notification-preview-modal .notification-category').text('Class Cancel');

                    notificationPreviewModal.show();
                } else {
                    toastInfo("Cant' Save", res.data.message, "warning");
                }
            }).catch(error => {
                $('#class-cancel-modal #save-modal-data-btn').removeAttr('disabled');

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

        function validateClassCancel(formData)
        {
            const requiredFields = ['class_cancel_reason', 'remarks'];

            errors.forEach((element) => {
                const fieldSelector = $(`#class-cancel-modal [name="${element.field_name}"]`);
                // Clear the errors first
                fieldSelector.removeClass('border border-danger');
                fieldSelector.removeClass('border border-danger');

                if ( fieldSelector.next().is('p') )
                    fieldSelector.next().remove();

                if ( fieldSelector.parent().next().is('p') )
                    fieldSelector.parent().next().remove();
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

            if ( errors.length > 0 ) {
                renderErrors('class-cancel-modal');

                return true;
            }

            return false;
        }
        // End of Class Cancel Action

        // Start of Class Migration Action
        $('#class-action-modal #class-migration-action').on('click', function(e) {
            e.preventDefault();

            classActionModal.hide();

            var venue = selectedData.course.venue;
            $('#class-migration-modal .venue-name').text(venue.short_name);
            var classDate = new Date(selectedData.start_date);
            $('#class-migration-modal .class-date').text(classDate.toLocaleString('default', { month: 'numeric', day: 'numeric', year: 'numeric' }));
            var startTime = selectedData.start_time;
            startTime = startTime.substring(0, startTime.length-3);
            $('#class-migration-modal .class-start-time').text(startTime);
            var endTime = selectedData.end_time;
            endTime = endTime.substring(0, endTime.length-3);
            $('#class-migration-modal .class-end-time').text(endTime);

            var level = selectedData.course.level;
            $('#class-migration-modal .level-name').text(level.name);
            $('#class-migration-modal .enrolled-students').text(selectedData.enrolled_students.length);
            $('#class-migration-modal .class-size').text(selectedData.course.course_size);

            var courseCoaches = JSON.parse(selectedData.course.course_coaches);
            var attended = coaches.filter(function(coach) {
                var attendances = coach.coach_attendances;
                return attendances.find((attendance) => attendance.class_id === selectedData.id && attendance.status === 'Attended');
            });

            $('#class-migration-modal .total-coaches').text(courseCoaches.length);
            $('#class-migration-modal .coach-attended').text(attended.length);

            classMigrationModal.show();
        });

        $('#class-migration-modal #school_venue_id').on('change', function(){
            const val = $(this).val();
            const schoolVenue = schoolVenues.find((element) => element.id == val);

            let options = "";
            schoolVenue.school_venue_facilities.forEach(function(element){
                options += `<option value="${element.id}">${element.name}</option>`;
            });

            $('#school_venue_facility_id').append(options);
        });

        $('#class-migration-modal #save-modal-data-btn').on('click', function() {
            $(this).attr('disabled', 'true');
            const formData = $('#class-migration-modal #modal-form').serializeArray();

            if( validateClassMigration(formData) ) {
                $(this).removeAttr('disabled');

                return;
            }

            let transformedData = {};

            formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            transformedData['class_id'] = selectedData.id;

            var notificationReceivers = [];
            var enrolledStudents = selectedData.enrolled_students;
            enrolledStudents.forEach(function(student, index) {
                notificationReceivers.push(student.class_student.id);
            });

            var courseCoaches = JSON.parse(selectedData.course.course_coaches);
            courseCoaches.forEach((coachId) => {
                notificationReceivers.push(coachId);
            });

            notificationData['receivers'] = notificationReceivers;

            processClassMigration(transformedData);
        });

        async function processClassMigration(transformedData)
        {
            // get user token
			const userToken = getUserToken();

            await axios.post(`${getApiUrl()}/timetable/class-migration`, transformedData, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            }).then(res => {
                $('#class-migration-modal #save-modal-data-btn').removeAttr('disabled');
                classMigrationModal.hide();

                if ( res.data.success ) {
                    toastTopEnd("Success", res.data.message, "success");

                    var venue = selectedData.course.venue;
                    var classDate = new Date(selectedData.start_date);
                    classDate = classDate.toLocaleString('default', { month: 'numeric', day: 'numeric', year: 'numeric' });
                    var classStartTime = new Date(selectedData.start_date+' '+selectedData.start_time);
                    classStartTime = classStartTime.toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" , hour12: true});
                    var classSched = classDate+' '+classStartTime;
                    $('#notification-preview-modal .notification-title').text('Class Migration Notification');
                    $('#notification-preview-modal .notification-content span').text('Class Migration from ' + classSched +' at '+venue.short_name+' to ');
                    
                    var newDate = new Date(transformedData.date);
                    newDate = newDate.toLocaleString('default', { month: 'numeric', day: 'numeric', year: 'numeric' });
                    var newStartTime = new Date(transformedData.date+' '+transformedData.start_time);
                    newStartTime.toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" , hour12: true});
                    var newSched = newDate+' '+newStartTime;
                    $('#notification-preview-modal .notification-content b').text(newSched);
                    $('#notification-preview-modal .notification-category').text('Class Cancel');

                    notificationPreviewModal.show();
                } else {
                    toastInfo("Cant' Save", res.data.message, "warning");
                }
            }).catch(error => {
                $('#class-migration-modal #save-modal-data-btn').removeAttr('disabled');

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

        function validateClassMigration(formData)
        {
            const requiredFields = ['date', 'start_time', 'end_time', 'school_venue_id', 'school_venue_facility_id', 'remarks'];

            errors.forEach((element) => {
                const fieldSelector = $(`#class-migration-modal [name="${element.field_name}"]`);
                // Clear the errors first
                fieldSelector.removeClass('border border-danger');
                fieldSelector.removeClass('border border-danger');

                if ( fieldSelector.next().is('p') )
                    fieldSelector.next().remove();

                if ( fieldSelector.parent().next().is('p') )
                    fieldSelector.parent().next().remove();
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

            if ( errors.length > 0 ) {
                renderErrors('class-migration-modal');

                return true;
            }

            return false;
        }
        // End of Class Migration Action

        // Start of Enrollment Action
        var studentTable = $('#select-student-modal #students-table').DataTable({
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
                {"orderable": true, "searchable": true},
                {"orderable": true, "searchable": true},
                {"orderable": true, "searchable": true},
            ]
        });

        var classTable = $('#select-class-modal #classes-table').DataTable({
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
                {"orderable": true, "searchable": true},
                {"orderable": true, "searchable": true},
                {"orderable": true, "searchable": true},
                {"orderable": true, "searchable": true},
                {"orderable": true, "searchable": true},
                {"orderable": true, "searchable": true},
                {"orderable": true, "searchable": true},
            ]
        });

        var referrerModal = null;
        $('#class-action-modal #enrollment-action').on('click', function(e) {
            e.preventDefault();

            selectedStudents = [];
            selectedClasses = [];
            classActionModal.hide();

            classEnrollmentModal.show();
        });

        $('#class-enrollment-moadl').on('hidden.bs.modal', function() {
            selectedStudents = [];
            selectedClasses = [];

            $('#select-student-modal #students-table tbody tr .check').prop('checked', false);
            $('#select-classes-modal #classes-table tbody tr .check').prop('checked', false);
        });

        $('#class-enrollment-modal #select-student').on('click', function() {
            classEnrollmentModal.hide();

            selectStudentModal.show();
            referrerModal = 'class-enrollment-modal';
        });

        $('#select-student-modal #student_search').on('keyup', function() {
            var searchTerm = $(this).val();

            studentTable.column(1).search(searchTerm).draw();
        });

        $('#select-student-modal #filter_students_by_level_btn').on('change', function() {
            var searchTerm = $(this).val();

            studentTable.column(3).search(searchTerm).draw();
        });

        $('#select-student-modal, #select-class-modal').on('hidden.bs.modal', function() {
            var modal = bootstrap.Modal.getOrCreateInstance(document.getElementById(referrerModal));
            modal.show();
            referrerModal = null;
        });

        $('#select-student-modal #add-students-btn').on('click', function() {
            var selected = $('#select-student-modal #students-table tbody  tr .check:checked');

            selected.each(function() {
                const isExist = selectedStudents.find(val => val.id == $(this).data('id'));

                if( isExist )
                    return;

                selectedStudents.push({
                    id: $(this).data('id')
                });
            });

            let items = '';
            selectedStudents.forEach((element, key) => {
                const student = students.find(value => value.id == parseInt(element.id));

                items += `<tr data-id="${student.id}">
                    <td>${student.name}</td>
                    <td>${student.student_information.gender}</td>
                    <td>${student.student_information.level?.name ?? ''}</td>
                    <td>${student.student_information.dob}</td>
                    <td class="d-flex justify-content-end" style="margin: 0 !important;">
                        <span class="small-icon_btn p-1 cursor-pointer remove-selected_btn" data-index="${key}"><x-svg-icon icon="times" /></span>
                    </td>
                </tr>`;
            });

            $(`#${referrerModal} #student-detail_container table tbody`).empty();
            $(`#${referrerModal} #student-detail_container table tbody`).append(items);

            $(`#${referrerModal} #student-detail_container table .remove-selected_btn`).on('click', function(){
                const index = $(this).data('index');

                selectedStudents.splice(index, 1);

                $(this).closest('tr').remove();
            });

            selectStudentModal.hide();
        });

        $('#class-enrollment-modal #type_of_course').on('change', function() {
            const coursePackage = Object.values(coursePackages).find(value => value.course_id == selectedData.course.id);
            var selectedPackage = coursePackage;
            var courseClasses = coursePackage.course.course_classes;

            selectedClasses = [];
            $('#class-enrollment-modal #course-details_container table tbody').empty();
            if($(this).val() === 'full_term') {
                $('#select-class').remove();

                $('#class-enrollment-modal #course-details_container table').next().remove();
                selectedClasses = courseClasses;

                renderSelectedClasses(selectedClasses, 'class-enrollment-modal');

                $('#class-enrollment-modal #course-details_container table .remove-selected_btn').on('click', function(){
                    const index = $(this).data('index');

                    selectedClasses.splice(index, 1);

                    $(this).closest('tr').remove();
                });
            } else {
                $('#select-class').remove();
                $('#class-enrollment-modal #course-details_container').append(`<x-primary-button type="button" id="select-class" title="Select Class" toggle="" target=""/>`);

                $('#class-enrollment-modal #select-class').on('click', function() {
                    classTable.destroy();
                    $('#select-class-modal #classes-table tbody').empty();
                    let classesElement = '';
                    courseClasses.forEach((value, key) => {
                        let coaches = '';
                        value.course.coaches.forEach(coach => {
                            coaches += `<p>${coach.name ?? coach.full_name}</p>`;
                        });

                        classesElement += `<tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="${key}">
                            <td class="text-center"><input type="checkbox" class="check" data-id="${value.id}"></td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.course_class_code}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.course.level?.abbreviation ?? ''}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.course.venue.name ?? ''}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${coaches}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.start_date}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.start_time + " - " + value.end_time}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.course.course_full_price}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.course.course_type.name}</td>
                        </tr>`;
                    });

                    $('#select-class-modal #classes-table tbody').append(classesElement);

                    classTable = $('#select-class-modal #classes-table').DataTable({
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
                            {"orderable": true, "searchable": true},
                            {"orderable": true, "searchable": true},
                            {"orderable": true, "searchable": true},
                            {"orderable": true, "searchable": true},
                            {"orderable": true, "searchable": true},
                            {"orderable": true, "searchable": true},
                            {"orderable": true, "searchable": true},
                        ]
                    });

                    classEnrollmentModal.hide();

                    selectClassModal.show();
                    referrerModal = 'class-enrollment-modal';
                });
            }
        });

        $('#select-class-modal #class_search').on('keyup', function() {
            var searchTerm = $(this).val();

            classTable.column(1).search(searchTerm).draw();
        });

        $('#select-class-modal #filter_classes_by_level_btn').on('change', function() {
            var searchTerm = $(this).val();

            classTable.column(2).search(searchTerm).draw();
        });

        $('#select-class-modal #add-classes-btn').on('click', function() {
            var selected = $('#select-class-modal #classes-table tbody  tr .check:checked');
            if(referrerModal === 'enrollment-modal') {
                const coursePackage = Object.values(coursePackages).find(value => value.id == $('#enrollment-modal #course').val());
                var courseClasses = coursePackage.course.course_classes;
            } else {
                const coursePackage = Object.values(coursePackages).find(value => value.course_id == selectedData.course.id);
                var courseClasses = coursePackage.course.course_classes;
            }

            selectedClasses = [];
            selected.each(function() {
                var selectedClass = courseClasses.find(value => value.id == $(this).data('id'))
                selectedClasses.push(selectedClass);
            });

            renderSelectedClasses(selectedClasses, referrerModal);

            $(`#${referrerModal} .remove-selected_btn`).on('click', function(){
                const index = $(this).data('index');

                selectedClasses.splice(index, 1);

                $(this).closest('tr').remove();
            });

            selectClassModal.hide();
        });

        function renderSelectedClasses(selectedClasses, referrerModal)
        {
            let dataElement = '';

            selectedClasses.forEach((value, key) => {
                let venueFacilities = '';

                value.course.venue.school_venue_facilities.forEach(value => {
                    venueFacilities += `<p>${value.name}</p>`;
                });

                dataElement += `<tr class="class-data-${key}" data-id="${value.id}">
                    <td>${value.course_class_code}</td>
                    <td>${value.start_date}</td>
                    <td>${value.start_time + " - " + value.end_time}</td>
                    <td>${value.course.venue.name ?? ''}</td>
                    <td>${venueFacilities ?? ''}</td>
                    <td class="d-flex justify-content-end" style="margin: 0 !important;">
                        <span class="small-icon_btn p-1 cursor-pointer remove-selected_btn" data-index="${key}"><x-svg-icon icon="times" /></span>
                    </td>
                </tr>`;
            });

            $(`#${referrerModal} #course-details_container table tbody`).empty();
            $(`#${referrerModal} #course-details_container table tbody`).append(dataElement);
        }

        $('#class-enrollment-modal #pay-now_btn, #class-enrollment-modal #send-invoice_btn').on('click', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

            var selectedStudents = $('#class-enrollment-modal #student-detail_container table tbody tr');
            var selectedClasses = $('#class-enrollment-modal #course-details_container table tbody tr');

            if ( selectedClasses.length <= 0 ) {
                toastTopEnd("Warning!", "Please select classes first", "warning");
                $(this).removeAttr('disabled');
                return;
            }

            if ( selectedStudents.length <= 0 ) {
                toastTopEnd("Warning!", "Please select students first", "warning");
                $(this).removeAttr('disabled');
                return;
            }

            var notificationReceivers = [];
            selectedStudents.each(function() {
                notificationReceivers.push($(this).data('id'));
            });

            selectedClasses.each(function() {
                var selectedClass = classes.find((value) => value.id === $(this).data('id'));
                var course = selectedClass.course;

                var courseCoaches = JSON.parse(course.course_coaches);
                courseCoaches.forEach((coachId) => {
                    notificationReceivers.push(parseInt(coachId));
                });
            });

            notificationData['receivers'] = notificationReceivers;

            const formData = {};

            var selectedStuds = [];
            selectedStudents.each(function() {
                selectedStuds.push($(this).data('id'));
            });

            var courseClasses = [];
            selectedClasses.each(function() {
                courseClasses.push($(this).data('id'));
            });

            const coursePackage = Object.values(coursePackages).find(value => value.course_id == selectedData.course.id);
            var selectedPackage = coursePackage;

            formData['students'] = selectedStuds;
            formData['package_id'] = selectedPackage.id;
            formData['type_of_course'] = $('#class-enrollment-modal #type_of_course').val();
            formData['is_paid'] = 1;
            formData['course_classes'] = courseClasses;
            formData['remarks'] = $('#class-enrollment-modal [name=remarks]').val();

            await axios.post(`${getApiUrl()}/timetable/enroll-to-course`, formData, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            }).then(res => {
                $('#class-enrollment-modal #cancel_btn').click();
                $(this).removeAttr('disabled');

                if ( res.data.success ) {
                    toastTopEnd("Success", res.data.message, "success");

                    $('#notification-preview-modal .notification-title').text('Enrollment Record');
                    $('#notification-preview-modal .notification-content span').text('Course Enrollment successful.');
                    $('#notification-preview-modal .notification-category').text('Enrollment');

                    notificationPreviewModal.show();
                } else {
                    toastInfo("Cant' Save", res.data.message, "warning");
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
        // End of Enrollment Action

        // Start Enrollment
        $('#enrollment-modal #select-student').on('click', function() {
            enrollmentModal.hide();

            selectStudentModal.show();
            referrerModal = 'enrollment-modal';
        });

        $('#enrollment-modal #course').on('change', function() {
            if($(this).val() !== '' && $('#enrollment-modal #type_of_course').val() !== '') {
                renderEnrollmentClasses();
            }
        });

        $('#enrollment-modal #type_of_course').on('change', function() {
            if($('#enrollment-modal #course').val() !== '' && $('#enrollment-modal #type_of_course').val() !== '') {
                renderEnrollmentClasses();
            }
        });

        function renderEnrollmentClasses()
        {
            var package = $('#enrollment-modal #course').val();
            const coursePackage = Object.values(coursePackages).find(value => value.id == package);
            var selectedPackage = coursePackage;
            var courseClasses = coursePackage.course.course_classes;

            selectedClasses = [];
            $('#enrollment-modal #course-details_container table tbody').empty();

            if($('#enrollment-modal #type_of_course').val() === 'full_term') {
                $('#enrollment-modal #course-details_container table').next().remove();
                selectedClasses = courseClasses;

                renderSelectedClasses(selectedClasses, 'enrollment-modal');

                $('#enrollment-modal #course-details_container table .remove-selected_btn').on('click', function(){
                    const index = $(this).data('index');

                    selectedClasses.splice(index, 1);

                    $(this).closest('tr').remove();
                });
            } else {
                $('#select-class').remove();
                $('#enrollment-modal #course-details_container').append(`<x-primary-button type="button" id="select-class" title="Select Class" toggle="" target=""/>`);

                $('#enrollment-modal #select-class').on('click', function() {
                    classTable.destroy();
                    $('#select-class-modal #classes-table tbody').empty();
                    let classesElement = '';
                    courseClasses.forEach((value, key) => {
                        let coaches = '';
                        value.course.coaches.forEach(coach => {
                            coaches += `<p>${coach.name ?? coach.full_name}</p>`;
                        });

                        classesElement += `<tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="${key}">
                            <td class="text-center"><input type="checkbox" class="check" data-id="${value.id}"></td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.course_class_code}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.course.level?.abbreviation ?? ''}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.course.venue.name ?? ''}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${coaches}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.start_date}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.start_time + " - " + value.end_time}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.course.course_full_price}</td>
                            <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${value.course.course_type.name}</td>
                        </tr>`;
                    });

                    $('#select-class-modal #classes-table tbody').append(classesElement);

                    classTable = $('#select-class-modal #classes-table').DataTable({
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
                            {"orderable": true, "searchable": true},
                            {"orderable": true, "searchable": true},
                            {"orderable": true, "searchable": true},
                            {"orderable": true, "searchable": true},
                            {"orderable": true, "searchable": true},
                            {"orderable": true, "searchable": true},
                            {"orderable": true, "searchable": true},
                        ]
                    });

                    enrollmentModal.hide();

                    selectClassModal.show();
                    referrerModal = 'enrollment-modal';
                });
            }
        }

        $('#enrollment-modal #pay-now_btn, #enrollment-modal #send-invoice_btn').on('click', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

            var selectedStudents = $('#enrollment-modal #student-detail_container table tbody tr');
            var selectedClasses = $('#enrollment-modal #course-details_container table tbody tr');

            if ( selectedClasses.length <= 0 ) {
                toastTopEnd("Warning!", "Please select classes first", "warning");
                $(this).removeAttr('disabled');
                return;
            }

            if ( selectedStudents.length <= 0 ) {
                toastTopEnd("Warning!", "Please select students first", "warning");
                $(this).removeAttr('disabled');
                return;
            }

            var notificationReceivers = [];
            selectedStudents.each(function() {
                notificationReceivers.push($(this).data('id'));
            });

            selectedClasses.each(function() {
                var selectedClass = classes.find((value) => value.id === $(this).data('id'));
                var course = selectedClass.course;

                var courseCoaches = JSON.parse(course.course_coaches);
                courseCoaches.forEach((coachId) => {
                    notificationReceivers.push(parseInt(coachId));
                });
            });

            notificationData['receivers'] = notificationReceivers;

            const formData = {};

            var selectedStuds = [];
            selectedStudents.each(function() {
                selectedStuds.push($(this).data('id'));
            });

            var courseClasses = [];
            selectedClasses.each(function() {
                courseClasses.push($(this).data('id'));
            });

            const coursePackage = Object.values(coursePackages).find(value => value.id == $('#enrollment-modal #course').val());
            var selectedPackage = coursePackage;

            formData['students'] = selectedStuds;
            formData['package_id'] = $('#enrollment-modal #course').val();
            formData['type_of_course'] = $('#enrollment-modal #type_of_course').val();
            formData['is_paid'] = 1;
            formData['course_classes'] = courseClasses;
            formData['remarks'] = $('#enrollment-modal [name=remarks]').val();

            await axios.post(`${getApiUrl()}/timetable/enroll-to-course`, formData, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            }).then(res => {
                $('#enrollment-modal #cancel_btn').click();
                $(this).removeAttr('disabled');

                if ( res.data.success ) {
                    toastTopEnd("Success", res.data.message, "success");

                    $('#notification-preview-modal .notification-title').text('Enrollment Record');
                    $('#notification-preview-modal .notification-content span').text('Course Enrollment successful.');
                    $('#notification-preview-modal .notification-category').text('Enrollment');

                    notificationPreviewModal.show();
                } else {
                    toastInfo("Cant' Save", res.data.message, "warning");
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
        // End Enrollment

        // Start of Preview Notification
        $('#notification-preview-modal [data-bs-dismiss="modal"]').on('click', function() {
            location.reload();
        });

        $('#notification-preview-modal #process-notification').on('click', function() {
            notificationData['title'] = $('#notification-preview-modal .notification-title').text().trim();
            notificationData['content'] = $('#notification-preview-modal .notification-content').html().trim();
            notificationData['send_schedule'] = $('#notification-preview-modal .notification-schedule').text().toLowerCase().trim();
            notificationData['category'] = $('#notification-preview-modal .notification-category').text().trim().toLowerCase().replace(' ', '-');
            notificationData['send_via'] = $('#notification-preview-modal .notification-send-via').text().toLowerCase().trim().split(', ');
            notificationData['class_id'] = selectedData.id;

            processNotification('notification-preview-modal', $(this));
        });

        $('#notification-preview-modal #edit_notification_btn').on('click', function() {
            $('#notification-modal #title').val($('#notification-preview-modal .notification-title').text().trim());
            $('#notification-modal #content').val($('#notification-preview-modal .notification-content').html().trim().replaceAll('<span>', '').replaceAll('</span>', '').replaceAll('<b>', '').replaceAll('</b>', '').replaceAll('<br>', '\n'));
            $('#notification-modal #datetime_to_send').val('').prop('disabled', true);
            $('#notification-modal #send-immediately').prop('checked', true);
            $('#notification-modal #category').val($('#notification-preview-modal .notification-category').text().trim().toLowerCase().replace(' ', '-'));
            $('#notification-modal [name="send_via"]#via-email').prop('checked', true);
            $('#notification-modal [name="send_via"]#via-app').prop('checked', true);

            notificationPreviewModal.hide();
            notificationModal.show();
        });
        // End of Preview Notification

        // Start of Notification functions
        $('#class-action-modal #notification-action').on('click', function(e) {
            e.preventDefault();

            classActionModal.hide();

            var notificationReceivers = [];
            var enrolledStudents = selectedData.enrolled_students;
            enrolledStudents.forEach(function(student, index) {
                notificationReceivers.push(student.class_student.id);
            });

            var courseCoaches = JSON.parse(selectedData.course.course_coaches);
            courseCoaches.forEach((coachId) => {
                notificationReceivers.push(coachId);
            });

            notificationData['receivers'] = notificationReceivers;

            notificationModal.show();
        });

        $('#notification-modal #send-immediately').on('change', function() {
            $('#notification-modal #datetime_to_send').prop('disabled', $(this).prop('checked'));
        });

        $('#notification-modal [data-bs-dismiss="modal"]').on('click', function() {
            location.reload();
        });

        $('#notification-modal #save-modal-data-btn').on('click', function() {
            $(this).attr('disabled', 'true');
            const formData = $('#notification-modal #modal-form').serializeArray();

            if( validateNotification(formData) ) {
                $(this).removeAttr('disabled');

                return;
            }

            notificationData['title'] = $('#notification-modal #title').val();
            notificationData['content'] = $('#notification-modal #content').val();
            notificationData['send_schedule'] = $('#notification-modal #send-immediately').prop('checked') ? 'immediately' : $('#notification-modal #datetime_to_send').val();
            notificationData['category'] = $('#notification-modal #category').val();
            var sendvia = [];
            $('#notification-modal [name="send_via"]:checked').each(function() {
                sendvia.push($(this).attr('id').replace('via-', ''));
            });
            notificationData['send_via'] = sendvia;
            notificationData['class_id'] = selectedData.id;

            processNotification('notification-modal', $(this));
        });

        function validateNotification(formData)
        {
            const requiredFields = ['category', 'title', 'content', 'send_via'];

            errors.forEach((element) => {
                const fieldSelector = $(`#notification-modal [name="${element.field_name}"]`);
                // Clear the errors first
                fieldSelector.removeClass('border border-danger');
                fieldSelector.removeClass('border border-danger');

                if ( fieldSelector.next().is('p') )
                    fieldSelector.next().remove();

                if ( fieldSelector.parent().next().is('p') )
                    fieldSelector.parent().next().remove();
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

            if ( errors.length > 0 ) {
                renderErrors('notification-modal');

                return true;
            }

            return false;
        }

        async function processNotification(modalName, button)
        {
            const userToken = getUserToken();

            await axios.post(`${getApiUrl()}/timetable/process-notification`, notificationData, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            }).then(res => {
                $(`#${modalName} #cancel-btn`).click();

                if(res.data.success) {
                    button.removeAttr('disabled');

                    toastTopEnd("Success", res.data.message, "success");

                    window.location = window.location
                } else {
                    toastInfo("Cant' Save", res.data.message, "warning");

                    button.removeAttr('disabled');
                }
            }).catch(error => {
                button.removeAttr('disabled');

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
        // End of notification functions

        // Start of Attendance QR
        var qrRefresh = null;
        $('#class-action-modal #attendance-qr-action').on('click', function(e) {
            e.preventDefault();

            $('#attendance-qr-modal .class_name').text(selectedData.course_class_code);
            $('#attendance-qr-modal .course_name').text(selectedData.course.course_abbreviation);
            $('#attendance-qr-modal .start_date_time').text(selectedData.formated_start_date_time);
            $('#attendance-qr-modal .end_date_time').text(selectedData.formated_end_date_time);
            $('#attendance-qr-modal .venue').text(selectedData.course.venue.name);
            $('#attendance-qr-modal .facility').text(selectedData.course.facility.name);

            classActionModal.hide();

            generateQR();

            qrRefresh = setInterval(runGeneration, 30000);

            attendanceQrModal.show();
        });

        function runGeneration()
        {
            generateQR();
        }

        $('#attendance-qr-modal').on('hidden.bs.modal', function() {
            clearInterval(qrRefresh);
        });

        async function generateQR()
        {
            // get user token
			const userToken = getUserToken();

            transformedData = {
                id: selectedData.id
            };

            await axios.post(`${getApiUrl()}/class/generate-class-qr`, transformedData, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            }).then(res => {
                if ( res.data.success ) {
                    generateQRCode(res.data.response);
                } else {

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

                // Handle errors
                console.error('Error fetching data:', error);
            });
            
        }

        function generateQRCode(url) {
            $("#qr-container").empty();

            new QRCode(document.getElementById("qr-container"), url);
        }
        // End of Attendance QR

        // Validation functions
        function formatString(inputString)
        {
            // Split the string into words using underscores as separators
            let words = inputString.split('_');

            // Capitalize the first letter of each word
            let capitalizedWords = words.map(word => word.charAt(0).toUpperCase() + word.slice(1));

            // Join the words back together with a space between them
            let formattedString = capitalizedWords.join(' ');

            return formattedString;
        }

        function renderErrors(modalName)
        {
            var coachSettingsFields = [
                {
                    field_name: 'new_coaches',
                    fieldSelector: $(`#coach-settings-modal #added-coaches-container h5`)
                },
                {
                    field_name: 'coaches_to_replace',
                    fieldSelector: $(`#coach-settings-modal #replaced-coaches-container h5`)
                },
                {
                    field_name: 'replacement_coaches',
                    fieldSelector: $(`#coach-settings-modal #replacement-coaches-container h5`)
                },
                {
                    field_name: 'coaches_to_remove',
                    fieldSelector: $(`#coach-settings-modal #coaches-to-remove-container h5`)
                },
                {
                    field_name: 'sign_attendance_coaches',
                    fieldSelector: $(`#coach-settings-modal #attended-coaches-container h5`)
                },
                {
                    field_name: 'absent_coaches',
                    fieldSelector: $(`#coach-settings-modal #absent-coaches-container h5`)
                },
            ];

            var studentSettingsFields = [
                {
                    field_name: 'student_ids',
                    fieldSelector: $(`#student-settings-modal #selected-students-container h5`)
                }
            ];

            if ( errors.length > 0 ) {
                errors.forEach((element) => {
                    var coachSettingField = coachSettingsFields.find((value) => value.field_name === element.field_name);
                    var studentSettingsField = studentSettingsFields.find((value) => value.field_name === element.field_name);

                    if(modalName === 'student-settings-modal' && studentSettingsField ||
                    modalName === 'coach-settings-modal' && coachSettingField) {
                        if(modalName === 'student-settings-modal') {
                            var fieldSelector = studentSettingsField.fieldSelector;
                        }

                        if(modalName === 'coach-settings-modal') {
                            var fieldSelector = coachSettingField.fieldSelector;
                        }

                        if ( fieldSelector.parent().next().is('p') )
                            fieldSelector.parent().next().remove();
                        
                        fieldSelector.after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
                    } else {
                        const fieldSelector = $(`#${modalName} [name="${element.field_name}"]`);
                        // Clear the errors first
                        fieldSelector.removeClass('border border-danger');
                        fieldSelector.removeClass('border border-danger');
                        fieldSelector.addClass('border border-danger');

                        if ( fieldSelector.next().is('p') )
                            fieldSelector.next().remove();

                        if ( fieldSelector.parent().next().is('p') )
                            fieldSelector.parent().next().remove();

                        fieldSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
                    }
                });
            }
        }

        function resetModalForm()
        {
            errors = [];
            notificationData = {};
            selectedStudents = [];
            selectedClasses = [];

            $('.modal input:not([type="checkbox"])').val("");
            $('.modal select').each(function() {
                if($(this).attr('id') === 'school_venue_facility_id') {
                    $(this).find('option:not(:first-child)').remove();
                }

                $(this).val($(this).find('option:first-child').attr('value'));

                if($(this).attr('id') !== 'school_venue_id' && $(this).attr('id') !== 'type_of_course') {
                    $(this).trigger('change')
                }
            });
            $('.modal textarea').val("");
            $('.modal:not(#select-student-modal, #select-classes-modal) input[type="checkbox"]').prop('checked', true);

            $('#class-enrollment-modal #student-detail_container table tbody').html(`<tr>
                <td colspan="5" class="text-center">No Selected Students</td>
            </tr>`);
            $('#class-enrollment-modal #course-details_container table tbody').html(`<tr>
                <td colspan="6" class="text-center">No Selected Course/Class</td>
            </tr>`);
        }
    });
</script>
@endsection