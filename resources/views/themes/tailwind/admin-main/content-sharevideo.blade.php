@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Content - Share Video" 
        withButton="true"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#share-video-modal" 
        buttonType="button"
        buttonId="share-video_btn"
        buttonTitle="Share Video"
    />
    <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4" role="tablist">
        <li class="nav-item" role="presentation" style="border-left-style: none;">
            <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">All</a>
        </li>
    </ul>
    <div class="row mt-1">
        <div class="col-xxl-12">
            <div class="row pl-3">
                <!-- Table List -->
                <div class="col-9 page-content-col">
                    <div class="tab-content p-3 pt-4">
                        <div class="row share-video-custom-filter">
                            <div class="col-10 position-relative">
                                <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search (title / Category)" />
                            </div>
                            <div class="col-2">
                                <x-form-select
                                    label="" 
                                    name="action"
                                    id="bulk_action_btn"
                                    isRequired="true"
                                >
                                    <option value="" hidden>Actions</option>
                                    <option value="delete">Archive Items</option>
                                </x-form-select>
                            </div>
                        </div>
                        <div class="table-responsive table-custom with-custom-search mt-4">
                            <table class="table table-hover w-100" id="share-videos-table">
                                <thead>
                                    <tr>
                                        <th class="text-left"><input type="checkbox" class="check-all"></th>
                                        <th class="text-left">VIDEO</th>
                                        <th class="text-left">TITLE</th>
                                        <th class="text-left">NOTIFICATION TYPE</th>
                                        <th class="text-left">SEND DATE & TIME</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $entries['share_videos'] as $shareVideo )
                                        <tr data-id="{{ $shareVideo['id'] }}">
                                            <td style="width: 15px;"><input type="checkbox" class="single-checkbox" value="{{ $shareVideo['id'] }}"></td>
                                            <td class="text-left">
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="{{ $shareVideo['place_video']['image_path'] }}" alt="" class="custom-table_thumbnail">
                                                </div>
                                            </td>
                                            <td class="text-left">{{ $shareVideo['title'] }}</td>
                                            <td class="text-left">{{ $shareVideo['formatted_notification_type'] }}</td>
                                            <td class="text-left">{{ formatDate($shareVideo['date_to_send'], 'd/m/Y h:i A') }}</td>
                                            <td style="width: 100px;" class="text-right">
                                                <div class="table-acitions_container d-flex gap-2">
                                                    <button type="button" class="edit-button" id="edit-btn" data-row_id="{{ $shareVideo['id'] }}" data-bs-toggle="modal" data-bs-target="#share-video-modal">
                                                        <x-svg-icon icon="edit" width="16" height="16" />
                                                    </button> 
                                                    @if( $shareVideo['status'] != 'archived' )
                                                        <button type="button" class="delete-button" id="delete-btn" data-row_id="{{ $shareVideo['id'] }}" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                                            <x-svg-icon icon="delete" width="16" height="14" />
                                                        </button>
                                                    @endif
                                                    @if( isSuperAdmin() && $shareVideo['status'] == 'archived' )
                                                        <div class="cursor-pointer unarchive-btn" data-row_id="{{ $shareVideo['id'] }}" data-bs-toggle="modal" data-bs-target="#unarchive-modal">
                                                            <i class="fa-solid fa-trash-arrow-up"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Table Information -->
                <div class="col-3">
                    <div class="card">
                        <div class="card-body main-page_normal_card_info">
                            <div class="col mb-4">
                                <div>
                                    <h1 class="fw-semibold card-heading text-center">Video</h1>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h1 class="fw-semibold card-sub_heading">INFORMATION</h1>
                            </div>
                            <div class="col border-bottom">
                                <ul class="list-group border-none">
                                    <li class="list-group-item d-xxl-flex p-0" style="border-style: none;">
                                        <div class="container p-0">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <h1 class="card-detail_title">Status</h1>
                                                </div>
                                                <div class="col-md-6">
                                                    <h1 id="info-status" class="card-detail_sub_title text-success">-</h1>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <h1 class="card-detail_title">Title</h1>
                                                </div>
                                                <div class="col-md-6">
                                                    <h1 id="info-title" class="card-detail_sub_title">-</h1>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <h1 class="card-detail_title">YouTube Link</h1>
                                                </div>
                                                <div class="col-md-6">
                                                    <h1 id="info-link" class="card-detail_sub_title">-</h1>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <h1 class="card-detail_title">Upload Date</h1>
                                                </div>
                                                <div class="col-md-6">
                                                    <h1 id="info-upload_date" class="card-detail_sub_title">-</h1>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <h1 class="card-level">Category</h1>
                                                </div>
                                                <div class="col-md-6">
                                                    <h1 id="info-name" class="card-detail_sub_title">-</h1>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <h1 class="card-detail_title">Modified by</h1>
                                                </div>
                                                <div class="col-md-6">
                                                    <h1 id="detail-modified_by" class="card-detail_sub_title">-</h1>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <h1 class="card-detail_title">Modified Date</h1>
                                                </div>
                                                <div class="col-md-6">
                                                    <h1 id="detail-updated_at" class="card-detail_sub_title">-</h1>
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
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="share-video-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Share Video</h4>
                <span class="small-icon_btn p-2 cursor-pointer cancel-btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div>
                    <form id="form-container">
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-select
                                label="Notification Type" 
                                name="notification_type"
                                id="notification_type"
                                isRequired="true"
                            >
                                <option value="" hidden>Choose Notification Type</option>
                                <option value="all_student">All Student</option>
                                <option value="by_course">By Course</option>
                                <option value="by_class">By Class</option>
                                <option value="individual">Individual</option>
                            </x-form-select>
                        </div>
                        <div class="selected-items_container d-flex flex-wrap gap-3 mb-3 d-none"></div>
                        <div class="btn-container d-none mb-3">
                            <x-primary-button type="button" color="primary" id="select-course_btn" title="Select Course" customClass="sm d-none" toggle="" target=""/>
                            <x-primary-button type="button" color="primary" id="select-class_btn" title="Select Class" customClass="sm d-none" toggle="" target=""/>
                            <x-primary-button type="button" color="primary" id="select-student_btn" title="Select Student" customClass="sm d-none" toggle="" target=""/>
                        </div>
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-select
                                label="Video" 
                                name="video_id"
                                id="video_id"
                                isRequired="true"
                            >
                                <option value="" hidden>Choose Video</option>
                                @foreach($entries['videos'] as $video)
                                    <option value="{{ $video['id'] }}">{{ $video['title'] }}</option>
                                @endforeach
                            </x-form-select>
                        </div>
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-input 
                                label="Title" 
                                type="text" 
                                name="title"
                                id="title"
                                isRequired="true"
                            />
                        </div>
                        <div class="container" style="padding: 0px;color: #636363">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Description <span class="text-muted">(optional)</span></label>
                                    <textarea name="description" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline" style="width: 100%;">
								<div class="form-group">
									<label for="date_to_send" class="form-label form-input-label">Schedule Notification to send</label>
									<div class="d-flex gap-1">
										<div class="col-6">
											<input name="date_to_send" id="date_to_send" tabindex="3" class="form-control form-input-date" type="datetime-local">
										</div>
									</div>
									<div class="col-12 d-flex align-items-center gap-1 mt-2">
										<input type="checkbox" name="send_immediately" tabindex="4" id="send-immediately" checked>
										<label for="send-immediately">Publish Immediately</label>
									</div>
								</div>
							</div>
						</div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" color="primary" id="process-submit" title="Share" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Course/Class Selection Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="course-class-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-head">
                <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4" role="tablist">
                    <li class="nav-item" role="presentation" style="border-left-style: none; padding-left: 23px; padding-top: 15px;">
                        <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">Course</a>
                    </li>
                </ul>
            </div>
            <div class="modal-body p-4">
                <div>
                    <h2 class="modal-selection-title_modal mb-2">Course</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="row course-class-custom-filter">
                                <div class="col-10 position-relative">
                                    <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search.." />
                                </div>
                                <div class="col-2">
                                    <x-form-select
                                        label="" 
                                        name="level_id"
                                        id="level_id"
                                        isRequired="true"
                                    >
                                        <option value="">Level</option>
                                        @foreach($entries['levels'] as $level)
                                            <option value="{{ $level['name'] }}">{{ $level['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                            </div>
                            <div class="table-responsive table-custom with-custom-search mt-4 course-table_container d-none">
                                <table class="table table-hover w-100" id="course-table">
                                    <thead>
                                        <tr>
                                            <th class="text-left"><input type="checkbox" class="check-all"></th>
                                            <th class="text-left">COURSE CODE</th>
                                            <th class="text-left">LEVEL</th>
                                            <th class="text-left">VENUE</th>
                                            <th class="text-left">COACH</th>
                                            <th class="text-left">DATE</th>
                                            <th class="text-left">TIME</th>
                                            <th class="text-left">TOTAL FEE (HK$)</th>
                                            <th class="text-left">COURSE CATEGORY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $entries['courses'] as $course )
                                            <tr>
                                                <td class="text-left">
                                                    <input type="checkbox" class="single-checkbox" value="{{ $course['id'] }}" data-code="{{ $course['course_abbreviation'] }}">
                                                </td>
                                                <td class="text-left">{{ $course['course_abbreviation'] }}</td>
                                                <td class="text-left">{{ $course['level']['name'] }}</td>
                                                <td class="text-left">{{ $course['venue_data']['name'] }}</td>
                                                <td class="text-left">
                                                    @foreach( $course['coaches'] as $coach )
                                                        <p>{{ $coach['name'] }} <br><small>{{ $coach['coach_details']['phone'] }}</small></p>
                                                    @endforeach
                                                </td>
                                                <td class="text-left">{{ $course['first_course_class'] ? formatDate($course['first_course_class']['start_date']) : "-" }}</td>
                                                <td class="text-left">{{ $course['first_course_class'] ? formatTime($course['first_course_class']['start_time']) : '' }} - {{ $course['first_course_class'] ? formatTime($course['first_course_class']['end_time']) : '' }}</td>
                                                <td class="text-left">{{ $course['class_full_price'] }}</td>
                                                <td class="text-left">{{ $course['course_type'] ? $course['course_type']['name'] : '' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive table-custom with-custom-search mt-4 class-table_container d-none">
                                <table class="table table-hover w-100" id="class-table">
                                    <thead>
                                        <tr>
                                            <th class="text-left"><input type="checkbox" class="check-all"></th>
                                            <th class="text-left">CLASS CODE</th>
                                            <th class="text-left">LEVEL</th>
                                            <th class="text-left">VENUE</th>
                                            <th class="text-left">COACH</th>
                                            <th class="text-left">DATE</th>
                                            <th class="text-left">TIME</th>
                                            <th class="text-left">TOTAL FEE (HK$)</th>
                                            <th class="text-left">COURSE CATEGORY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $entries['classes'] as $class )
                                            <tr>
                                                <td class="text-left">
                                                    <input type="checkbox" class="single-checkbox" value="{{ $class['id'] }}" data-code="{{ $class['course_class_code'] }}">
                                                </td>
                                                <td class="text-left">{{ $class['course_class_code'] }}</td>
                                                <td class="text-left">{{ $class['course']['level']['name'] }}</td>
                                                <td class="text-left">{{ $class['course']['venue_data']['name'] }}</td>
                                                <td class="text-left">
                                                    @foreach( $class['course']['coaches'] as $coach )
                                                        <p>{{ $coach['name'] }} <br><small>{{ $coach['coach_details']['phone'] }}</small></p>
                                                    @endforeach
                                                </td>
                                                <td class="text-left">{{ formatDate($class['start_date']) }}</td>
                                                <td class="text-left">{{ formatTime($class['start_time']) }} - {{ formatTime($class['end_time']) }}</td>
                                                <td class="text-left">{{ $class['course']['class_full_price'] }}</td>
                                                <td class="text-left">{{ $class['course']['course_type']['name'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="close-btn" title="Close" dismiss="modal"/>
                <x-primary-button type="button" color="primary" id="add-btn" title="Add" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Student Selection Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="student-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div>
                    <h2 class="modal-selection-title_modal mb-2">Select Student</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="row student-custom-filter">
                                <div class="col-10 position-relative">
                                    <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search.." />
                                </div>
                                <div class="col-2">
                                    <x-form-select
                                        label="" 
                                        name="level_id"
                                        id="level_id"
                                        isRequired="true"
                                    >
                                        <option value="" hidden>Level</option>
                                        @foreach($entries['levels'] as $level)
                                            <option value="{{ $level['name'] }}">{{ $level['name'] }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                            </div>
                            <div class="table-responsive table-custom with-custom-search mt-4">
                                <table class="table table-hover w-100" id="students-table">
                                    <thead>
                                        <tr>
                                            <th class="text-left"><input type="checkbox" class="check-all"></th>
                                            <th class="text-left">NAME/ID</th>
                                            <th class="text-left">GENDER</th>
                                            <th class="text-left">LEVEL</th>
                                            <th class="text-left">PHONE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $entries['users'] as $user )
                                            <tr>
                                                <td class="text-left">
                                                    <input type="checkbox" class="single-checkbox" value="{{ $user['id'] }}" data-code="{{ $user['name'] }} / {{ $user['student_information']['student_id'] }}">
                                                </td>
                                                <td class="text-left">
                                                    <div>
                                                        <p>{{ $user['name'] }} <br><small>{{ $user['student_information']['student_id'] }}</small></p>
                                                    </div>
                                                </td>
                                                <td class="text-left">{{ ucfirst($user['student_information']['gender']) }}</td>
                                                <td class="text-left">{{ $user['student_information']['level']['name'] }}</td>
                                                <td class="text-left">{{ $user['student_information']['phone'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="close-btn" title="Close" dismiss="modal"/>
                <x-primary-button type="button" color="primary" id="add-btn" title="Add" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mb-4">
                <p class="heading mb-3">Delete Confirmation</p>
                <p class="sub-heading text-secondary">
                    Are you sure to delete this video?
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" color="danger" id="process-archive" title="Continue" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Unarchive Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="unarchive-modal">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="text-warning" style="font-size: 20px;font-family: Poppins, sans-serif;">Unarchive Confirmation</p>
				<p style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">
                    Are you sure you want to unarchive entry?
				</p>
			</div>
			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button id="cancel-btn" class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button id="process-unarchive" class="btn btn-primary" type="button" data-bs-dismiss="myModal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Yes</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        var selectedCourses = [];
        var selectedClasses = [];
        var selectedStudents = [];

        var mainShareVideoTable = $('#share-videos-table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "aoColumnDefs": mSortingString,
            "columnDefs": [{
                    targets: [0,1,5],
                    orderable: false
            }]
        });

        var courseTable = $('#course-table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "aoColumnDefs": mSortingString,
            "columnDefs": [{
                    targets: [0],
                    orderable: false
            }]
        });

        var classTable = $('#class-table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "aoColumnDefs": mSortingString,
            "columnDefs": [{
                    targets: [0],
                    orderable: false
            }]
        });

        var studentsTable = $('#students-table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "aoColumnDefs": mSortingString,
            "columnDefs": [{
                    targets: [0],
                    orderable: false
            }]
        });

        var formAction = "add";

        $('#share-video-modal input[name=date_to_send]').val(moment().format("YYYY-MM-DD HH:mm:ss"))

        $('.share-video-custom-filter').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            mainShareVideoTable.search(searchTerm).draw();
        });

        $('.course-class-custom-filter').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            if(! $('.course-table_container').hasClass('d-none') )
                courseTable.search(searchTerm).draw();

            if(! $('.class-table_container').hasClass('d-none') )
                classTable.search(searchTerm).draw();
        });

        $('.student-custom-filter').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            studentsTable.search(searchTerm).draw();
        });

        // Add custom filter for "custom_column"
        $('.course-class-custom-filter').on('change', 'select[name=level_id]', function () {
            const selectValue = $(this).val();

            if(! $('.course-table_container').hasClass('d-none') )
                courseTable.column(2).search(selectValue).draw();

            if(! $('.class-table_container').hasClass('d-none') )
                classTable.column(2).search(selectValue).draw();
            
        });

        $('.student-custom-filter').on('change', 'select[name=level_id]', function () {
            const selectValue = $(this).val();

            studentsTable.column(3).search(selectValue).draw();
        });

        $('#share-videos-table tbody').on('click', 'tr', function() {
			const dataID = $(this).data('id');
            
 			const data = <?= json_encode($entries['share_videos']) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            
            $('#info-status').empty(); 
            $('#info-status').append(`<span class="status-color_${selectedData.status}">${ucfirst(selectedData.status_label)}</span>`);
            $('#info-title').text( selectedData.title );
            $('#info-link').empty()
            $('#info-link').append( `<a href="${selectedData.place_video.youtube_link}">${selectedData.place_video.youtube_link}</a>` );
            $('#info-upload_date').text( selectedData.place_video.created_at );
            $('#info-name').text( selectedData.place_video.level.name );

            $('#detail-modified_by').text( selectedData.log ? selectedData.log.user.name : '-' );
            $('#detail-updated_at').text( selectedData.log ? moment(selectedData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});

        $('.page-container').on('click', '#share-video_btn', function(){
            clearModalFields();
        });

        // Event when changing notification type
        $('#share-video-modal').on('change', 'select[name=notification_type]', function(){
            const selectValue = $(this).val();

            if( selectValue !== 'all_student' ) {
                // show the selected item container and the button container
                
                $('.selected-items_container').removeClass('d-none');
                $('.btn-container').removeClass('d-none');

                // check what button should be displayed
                if( selectValue == 'by_course' ) {
                    $('#select-course_btn').removeClass('d-none');
                    $('#select-class_btn').addClass('d-none');
                    $('#select-student_btn').addClass('d-none');
                }

                if( selectValue == 'by_class' ) {
                    $('#select-course_btn').addClass('d-none');
                    $('#select-class_btn').removeClass('d-none');
                    $('#select-student_btn').addClass('d-none');
                }

                if( selectValue == 'individual' ) {
                    $('#select-course_btn').addClass('d-none');
                    $('#select-class_btn').addClass('d-none');
                    $('#select-student_btn').removeClass('d-none');
                }
            } else {
                $('.selected-items_container').addClass('d-none');
                $('.btn-container').addClass('d-none');
                $('#select-course_btn').addClass('d-none');
                $('#select-class_btn').addClass('d-none');
                $('#select-student_btn').addClass('d-none');
            }

            selectedCourses = [];
            selectedClasses = [];
            selectedStudents = [];

            renderSelectedItems('course')
        });
        
        $('#share-video-modal').on('click', '#select-course_btn', function(){
            $('#share-video-modal .cancel-btn').click();
            $('#course-class-modal').modal('show');

            $('#course-class-modal .course-table_container').removeClass('d-none');
            $('#course-class-modal .class-table_container').addClass('d-none');

            // update title of the modal
            $('#course-class-modal .nav-link').text('Course');
            $('#course-class-modal .modal-selection-title_modal').text('Course');

            // reset filter
            $('.course-class-custom-filter select[name=level_id]').val('').trigger('change');
            $('.student-custom-filter select[name=level_id]').val('').trigger('change');

            $('#course-table .single-checkbox').prop('checked', false);
            $('#course-table .check-all').prop('checked', false);
        });

        $('#share-video-modal').on('click', '#select-class_btn', function(){
            $('#share-video-modal .cancel-btn').click();
            $('#course-class-modal').modal('show');

            $('#course-class-modal .course-table_container').addClass('d-none');
            $('#course-class-modal .class-table_container').removeClass('d-none');

            // update title of the modal
            $('#course-class-modal .nav-link').text('Class');
            $('#course-class-modal .modal-selection-title_modal').text('Class');

            // reset filter
            $('.course-class-custom-filter select[name=level_id]').val('').trigger('change');
            $('.student-custom-filter select[name=level_id]').val('').trigger('change');

            $('#class-table .single-checkbox').prop('checked', false);
            $('#class-table .check-all').prop('checked', false);
        });

        $('#share-video-modal').on('click', '#select-student_btn', function(){
            $('#share-video-modal .cancel-btn').click();
            $('#student-modal').modal('show');

            $('.student-custom-filter select[name=level_id]').val().trigger('change');

            $('#students-table .single-checkbox').prop('checked', false);
            $('#students-table .check-all').prop('checked', false);
        });

        $('#course-class-modal').on('click', '#close-btn', function(){
            $('#share-video-modal').modal('show');
        });

        $('#student-modal').on('click', '#close-btn', function(){
            $('#share-video-modal').modal('show');
        });
        // End Notification Event Change

        // Event when adding selected data
        $('#course-class-modal').on('click', '#add-btn', function(){

            selectedCourses = [];

            if(! $('.course-table_container').hasClass('d-none') ) {
                const allRows = $('#course-table .single-checkbox');

                allRows.each(function(){
                    const isChecked = $(this).is(':checked');

                    if( isChecked ) {
                        const value = $(this).val();
                        const code = $(this).data('code');

                        selectedCourses.push({
                            id: value,
                            label: code,
                        })
                    }
                });

                renderSelectedItems('course')
            }

            selectedClasses = [];

            if(! $('.class-table_container').hasClass('d-none') ) {
                const allRows = $('#class-table .single-checkbox');

                allRows.each(function(){
                    const isChecked = $(this).is(':checked');

                    if( isChecked ) {
                        const value = $(this).val();
                        const code = $(this).data('code');

                        selectedClasses.push({
                            id: value,
                            label: code,
                        })
                    }
                });

                renderSelectedItems('class')
            }

            $('#course-class-modal #close-btn').click();
        });

        $('#student-modal').on('click', '#add-btn', function(){

            selectedStudents = [];

            const allRows = $('#students-table .single-checkbox');

            allRows.each(function(){
                const isChecked = $(this).is(':checked');

                if( isChecked ) {
                    const value = $(this).val();
                    const code = $(this).data('code');

                    selectedStudents.push({
                        id: value,
                        label: code,
                    })
                }
            });

            renderSelectedItems('student')

            $('#student-modal #close-btn').click();
        });
        // -- End ---

        $('#share-videos-table tbody').on('click', '.edit-button', function(){
            const rowID = $(this).data('row_id');
            formAction = "edit";

            const data = <?= json_encode($entries['share_videos']) ?>;
			const rowData = data.find(value => value.id == rowID);

            // Populate the field on the modal
            $('#share-video-modal select[name=notification_type]').val(rowData.notification_type).trigger('change');

            // render the selected items
            console.log(rowData.notification_type)
            if( rowData.notification_type == 'by_course' ) {
                selectedCourses = JSON.parse(rowData.notification_type_data)
                renderSelectedItems('course');
            }

            if( rowData.notification_type == 'by_class' ) {
                selectedClasses = JSON.parse(rowData.notification_type_data)
                renderSelectedItems('class');
            }

            if( rowData.notification_type == 'individual' ) {
                selectedStudents = JSON.parse(rowData.notification_type_data)
                renderSelectedItems('student');
            }

            if( rowData.notification_type == 'all_student' ) {
                selectedStudents = [];
                renderSelectedItems('student');
            }

            $('#share-video-modal select[name=video_id]').val(rowData.video_id);
            $('#share-video-modal input[name=title]').val(rowData.title);
            $('#share-video-modal [name=description]').val(rowData.description);
            $('#share-video-modal input[name=date_to_send]').val(rowData.date_to_send);
            $('#share-video-modal input[name=send_immediately]').prop('checked', rowData.publish_immediately ? true : false);
        });

        $("#share-video-modal").on('click', '#process-submit', async function() {
            $(this).attr('disabled', 'true');

            // get user token
            const userToken = getUserToken();

            // Prepare Data
            const formData = $('#share-video-modal #form-container').serializeArray();

            let transformedData = {}

            formData.forEach(function(item) {
                transformedData[item.name] = item.value
            });

            const requiredFields = [
                'notification_type', 'video_id', 'title'
            ];

            if( processErrorValidation(formData, requiredFields) ) {
                $(this).removeAttr('disabled');

                return;
            }

            // console.log(transformedData.notification_type)
            if( transformedData.notification_type == 'all_student' )
                transformedData['notification_type_data'] = JSON.stringify([]); 

            if( transformedData.notification_type == 'by_course' )
                transformedData['notification_type_data'] = JSON.stringify(selectedCourses);

            if( transformedData.notification_type == 'by_class' )
                transformedData['notification_type_data'] = JSON.stringify(selectedClasses); 

            if( transformedData.notification_type == 'individual' )
                transformedData['notification_type_data'] = JSON.stringify(selectedStudents); 

            transformedData['publish_immediately'] = $('#share-video-modal input[name=send_immediately]').is(':checked') ? 1 : 0;

            // $(this).removeAttr('disabled');
            console.log(transformedData)
            // return;

            if( formAction == 'add' )
                await axios.post(`${getApiUrl()}/content/share-video/add`, transformedData, {
                        headers: {
                            'Authorization': 'Bearer ' + userToken,
                            'Content-Type': 'application/json',
                        }
                    }).then(res => {
                        $('#share-video-modal .cancel-btn').click();

                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");

                            window.location = window.location
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
            if( formAction == 'edit' ) {
                transformedData['id'] = selectedData.id

                await axios.post(`${getApiUrl()}/content/share-video/update`, transformedData, {
                        headers: {
                            'Authorization': 'Bearer ' + userToken,
                            'Content-Type': 'application/json',
                        }
                    }).then(res => {
                        $('#share-video-modal .cancel-btn').click();

                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");

                            window.location = window.location
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
            }
        });

        $('#share-videos-table tbody').on('click', '.delete-button', function(){
            const rowID = $(this).data('row_id');

            const data = <?= json_encode($entries['share_videos']) ?>;
			const rowData = data.find(value => value.id == rowID);

            selectedData = rowData;
            formAction = 'single-delete'
        });

        $('#share-videos-table tbody').on('click', '.unarchive-btn', function(){
            const rowID = $(this).data('row_id');

            const data = <?= json_encode($entries['share_videos']) ?>;
			const rowData = data.find(value => value.id == rowID);

            selectedData = rowData;
        });

        $('#delete-modal').on('click', '#process-archive', async function(){
            $(this).attr('disabled', 'true');

            const userToken = getUserToken();

            if( formAction == 'single-delete' ) {
                let transformedData = {
                    id: selectedData.id
                };

                await axios.post(`${getApiUrl()}/content/share-video/archive`, transformedData,{
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#delete-modal #cancel-btn').click();

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
            }
            
            if( formAction == 'bulk-delete' ) {
                let transformedData = {
                    ids: selectedIds
                };

                await axios.post(`${getApiUrl()}/content/share-video/bulk-archive`, transformedData,{
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#delete-modal #cancel-btn').click();

                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");
                        formAction = 'add'
                        selectedIds = [];
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
            }
        });

        $('#unarchive-modal').on('click', '#process-unarchive', async function(){
            $(this).attr('disabled', 'true');

            const userToken = getUserToken();

            let transformedData = {
                id: selectedData.id
            };

            await axios.post(`${getApiUrl()}/content/share-video/unarchive`, transformedData,{
				headers: {
					'Content-Type': 'application/json',
					'Authorization': 'Bearer ' + userToken
				}
			}).then(res => {
				$('#unarchive-modal #cancel-btn').click();

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

        $('#share-videos-table thead').on('click', '.check-all', function(){
            const isChecked = $(this).is(':checked');

            if( isChecked ) {
                // check all data in the table
                $('.single-checkbox').prop('checked', true);
            }else{
                $('.single-checkbox').prop('checked', false);
            }
        });

        $('#course-table thead').on('click', '.check-all', function(){
            const isChecked = $(this).is(':checked');
            
            if( isChecked ) {
                // check all data in the table
                $('#course-table .single-checkbox').prop('checked', true);
            }else{
                $('#course-table .single-checkbox').prop('checked', false);
            }
        });

        $('#class-table thead').on('click', '.check-all', function(){
            const isChecked = $(this).is(':checked');

            if( isChecked ) {
                // check all data in the table
                $('#class-table .single-checkbox').prop('checked', true);
            }else{
                $('#class-table .single-checkbox').prop('checked', false);
            }
        });

        $('#students-table thead').on('click', '.check-all', function(){
            const isChecked = $(this).is(':checked');

            if( isChecked ) {
                // check all data in the table
                $('#students-table .single-checkbox').prop('checked', true);
            }else{
                $('#students-table .single-checkbox').prop('checked', false);
            }
        });

        var selectedIds = [];
        $('.share-video-custom-filter').on('change', '#bulk_action_btn', async function(){
            const selectedRows = $('.single-checkbox');

            selectedIds = [];
            selectedRows.each(function(){
                if( $(this).is(':checked') ) {
                    const id = $(this).val();
                    selectedIds.push(id);
                }
            });

            if( selectedIds.length <= 0 ) {
                toastTopEnd("Warning", "No Entries selected", "warning");
                $(this).val("");
                
                return;
            }

            $('#delete-modal').modal('show');
            $('#delete-modal .sub-heading').text(`Are you sure you want to delete ${selectedIds.length} entries?`);

            formAction = "bulk-delete";

            $(this).val("");
        });

        function renderSelectedItems(type) {
            if( type == 'course' ) {
                let options = '';
                selectedCourses.forEach(function(value){
                    options += `<div class="d-flex align-items-center gap-5 p-2 border rounded">
                                    <span>${value.label}</span>
                                    <span class="cursor-pointer remove-item_btn" data-type="course" data-id="${value.id}"><x-svg-icon icon="times" /></span>
                                </div>`;
                });

                $('.selected-items_container').empty();
                $('.selected-items_container').append(options);
            }

            if( type == 'class' ) {
                let options = '';
                selectedClasses.forEach(function(value){
                    options += `<div class="d-flex align-items-center gap-5 p-2 border rounded">
                                    <span>${value.label}</span>
                                    <span class="cursor-pointer remove-item_btn" data-type="class" data-id="${value.id}"><x-svg-icon icon="times" /></span>
                                </div>`;
                });

                $('.selected-items_container').empty();
                $('.selected-items_container').append(options);
            }

            if( type == 'student' ) {
                let options = '';
                selectedStudents.forEach(function(value){
                    options += `<div class="d-flex align-items-center gap-5 p-2 border rounded">
                                    <span>${value.label}</span>
                                    <span class="cursor-pointer remove-item_btn" data-type="student" data-id="${value.id}"><x-svg-icon icon="times" /></span>
                                </div>`;
                });

                $('.selected-items_container').empty();
                $('.selected-items_container').append(options);
            }
        }

        $('.selected-items_container').on('click', '.remove-item_btn', function(){
            const type = $(this).data('type');
            const id = $(this).data('id');

            if( type == 'course' ) {
                const index = selectedCourses.findIndex(value => value.id == id)

                selectedCourses.splice(index, 1);
            }

            if( type == 'class' ) {
                const index = selectedClasses.findIndex(value => value.id == id)

                selectedClasses.splice(index, 1);
            }

            if( type == 'student' ) {
                const index = selectedStudents.findIndex(value => value.id == id)

                selectedStudents.splice(index, 1);
            }

            renderSelectedItems(type)
        });

        // Error Validations
        function processErrorValidation(formData, requiredFields) {
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
				renderErrors('share-video-modal');

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

        function renderErrors(modal) {
			if ( errors.length > 0 ) {
                const hasParentFields = ['date'];

				errors.forEach((element) => {
                    const fieldSelector = $(`#${modal} [name="${element.field_name}"]`);
                    // Clear the errors first
                    fieldSelector.removeClass('border border-danger');
                    fieldSelector.parent().removeClass('border border-danger');

                    if ( fieldSelector.next().is('p') )
                        fieldSelector.next().remove();

                    if ( fieldSelector.parent().next().is('p') )
                        fieldSelector.parent().next().remove();

                    if (! hasParentFields.includes(element.field_name) ) {
                        fieldSelector.addClass('border border-danger');
					    fieldSelector.after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
                    } else {
                        fieldSelector.parent().addClass('border border-danger');
					    fieldSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
                    }
				});
			}
		}

        function clearModalFields(){
            $('#share-video-modal select[name=notification_type]').val("");
            $('#share-video-modal select[name=video_id]').val("");
            $('#share-video-modal input[name=title]').val("");
            $('#share-video-modal [name=description]').val("");
            $('#share-video-modal input[name=date_to_send]').val(moment().format("YYYY-MM-DD HH:mm:ss"));
            $('#share-video-modal input[name=send_immediately]').prop('checked', false);

            selectedClasses = [];
            selectedCourses = [];
            selectedStudents = [];
            renderSelectedItems('student');

            formAction = "add";
        }
    });
</script>
@endsection