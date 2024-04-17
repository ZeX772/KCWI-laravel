@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Competition Management"
        headingSpan="{{ $data['competition_code'] }}"
        withButton="true"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#categories-modal" 
        buttonType="button"
        buttonId="add-categories_btn"
        buttonTitle="Add Categories"
    />
    <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4 mt-4" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" role="tab">All</a>
        </li>
    </ul>
    <div class="row mt-2 p-2">
        <div class="col-xxl-9 page-content-col1">
            <div class="tab-content p-2">
                <div class="main-page_table_info">
                    <div class="d-flex align-items-center mb-4">
                        <h2 class="heading mr-2">{{ $data['competition_code'] }}</h2>
                        <div class="d-glex d-flex align-items-center gap-4">
                            <a href="" id="edit-competition_btn" data-bs-toggle="modal" data-bs-target="#competition-modal">
                                <x-svg-icon icon="edit" />
                            </a>
                            <span class="status-tag p-2">{{ ucfirst($data['status']) }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 d-flex flex-column gap-2">
                            <p class="detail-title">Date: <span class="detail-sub_title">{{ $data['start_date'] ?? '-' }} - {{ $data['end_date'] }}</span></p>
                            <p class="detail-title">Time: <span class="detail-sub_title">{{ $data['start_time'] }} - {{ $data['end_time'] }}</span></p>
                            <p class="detail-title">Remark: <span class="detail-sub_title">{{ $data['remarks'] }}</span></p>
                        </div>
                        <div class="col-4 d-flex flex-column gap-2">
                            <p class="detail-title">Venue: <span class="detail-sub_title">{{ $data['school_venue']['name'] ?? '-' }}</span></p>
                            <p class="detail-title">Facility: <span class="detail-sub_title">{{ $data['school_venue_facility']['name'] ?? '-' }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-custom data-table with-custom-search mt-4 border-top">
                    <table class="table table-hover w-100" id="categories-table">
                        <thead>
                            <tr>
                                <th class="text-left">CATEGORY</th>
                                <th class="text-left">DATE</th>
                                <th class="text-left">TIME</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
							@foreach($selected_categories as $selected)
							<tr data-id="{{ $selected['id'] }}">
								<td class="text-left">{{ $selected['category']['name'] }}</td>
								<td class="text-left">{{ $selected['start_date'] ? date("m/d/Y", strtotime($selected['start_date'])) : '' }}{{ $selected['end_date'] ? ' - '.date("m/d/Y", strtotime($selected['end_date'])) : '' }}</td>
								<td class="text-left">{{ $selected['start_time'] ? date("h:i a", strtotime($selected['start_time'])) : '' }}{{ $selected['end_time'] ? ' - '.date("h:i a", strtotime($selected['end_time'])) : '' }}</td>
								<td class="text-center">
									<div class="table-acitions_container d-flex gap-2">
										<a href="{{ route('wave.user.admin-main.competition-category-view', [$data['id'], $selected['id']]) }}">
											<x-svg-icon icon="view"/>
										</a>
										<button type="button" class="edit-button" id="edit-btn" data-row_id="{{ $selected['id'] }}" data-bs-toggle="modal" data-bs-target="#categories-modal">
											<x-svg-icon icon="edit" />
										</button> 
										<button type="button" class="delete-button" data-row_id="{{ $selected['id'] }}" data-bs-toggle="modal" data-bs-target="#delete-modal">
											<x-svg-icon icon="delete" width="16" height="14" />
										</button>
									</div>
								</td>
							</tr>
							@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col d-xxl-flex flex-column page-content-col2">
            <div class="card">
 				<div class="card-body main-page_normal_card_info">
 					<div class="col mb-4">
 						<div>
 							<h1 class="fw-semibold card-heading text-center">Category</h1>
 						</div>
 					</div>
 					<div class="mb-3">
 						<h1 class="fw-semibold card-sub_heading">INFORMATION</h1>
 					</div>
 					<div class="col">
 						<ul class="list-group border-none">
 							<li class="list-group-item d-xxl-flex p-0" style="border-style: none;">
 								<div class="container p-0">
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Status</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-category_status" class="card-detail_sub_title text-success">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Categories</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-category_category" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Start Date</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-category_start_date" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">End Date</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-category_end_date" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Start Time</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-category_start_time" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">End Time</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-category_end_time" class="card-detail_sub_title">-</h1>
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
 									<div class="row mb-3">
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
<!-- Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="competition-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Update Competition</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input
                            label="Competition Name"
                            type="text"
                            name="competition_name"
                            id="competition_name"
                            isRequired="true"
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Default Venue" 
                            name="school_venue_id"
                            id="school_venue_id"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Default Venue</option>
                            @foreach($school_venues as $key => $school_venue)
                                <option value="{{ $school_venue['id'] }}">{{ $school_venue['name'] }}</option>
                            @endforeach
                        </x-form-select>
                        <x-form-select
                            label="Default Facility" 
                            name="school_venue_facility_id"
                            id="school_venue_facility_id"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Default Facility</option>
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Competition Size (Maximum Number of Student)" 
                            type="text" 
                            name="competition_size"
                            id="competition_size"
                            isRequired="false"
                        />
                        <x-form-input 
                            label="Fee (HK$) Per Competition" 
                            type="text" 
                            name="enrollment_price"
                            id="enrollment_price"
                            isRequired="false"
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Start Date" 
                            type="date" 
                            name="start_date"
                            id="start_date"
                            isRequired="false"
                        />
                        <x-form-input 
                            label="End Date" 
                            type="date" 
                            name="end_date"
                            id="end_date"
                            isRequired="false"
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Start Time" 
                            type="time" 
                            name="start_time"
                            id="start_time"
                            isRequired="false"
                        />
                        <x-form-input 
                            label="End Time" 
                            type="time" 
                            name="end_time"
                            id="end_time"
                            isRequired="false"
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Competition Type" 
                            name="competition_type"
                            id="competition_type"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Type</option>
                            <option value="relay">Relay</option>
                            <option value="butterfly">Butterfly</option>
                            <option value="medley">Medley</option>
                            <option value="breaststroke">Breaststroke</option>
                            <option value="backstroke">Backstroke</option>
                            <option value="freestyle">Freestyle</option>
                        </x-form-select>
                        <x-form-select
                            label="Competition Gender" 
                            name="competition_for_gender"
                            id="competition_for_gender"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Gender</option>
                            <option value="boys">Boys</option>
                            <option value="girls">Girls</option>
                            <option value="mixed">Mixed</option>
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Status" 
                            name="status"
                            id="status"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Status</option>
                            <option value="published">Published</option>
                            <option value="private">Private</option>
                        </x-form-select>
                    </div>
                    <div class="container" style="padding: 0px;color: #636363">
                        <div class="form-inline">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                                <textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-4">
                    <x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Categories Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="categories-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Add Category</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Category" 
                            name="category_id"
                            id="category_id"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Category</option>
                            @foreach($categories as $key => $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Start Date" 
                            type="date" 
                            name="start_date"
                            id="start_date"
                            isRequired="false"
                        />
                        <x-form-input 
                            label="End Date" 
                            type="date" 
                            name="end_date"
                            id="end_date"
                            isRequired="false"
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Start Time" 
                            type="time" 
                            name="start_time"
                            id="start_time"
                            isRequired="false"
                        />
                        <x-form-input 
                            label="End Time" 
                            type="time" 
                            name="end_time"
                            id="end_time"
                            isRequired="false"
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Status" 
                            name="status"
                            id="status"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Status</option>
                            <option value="published">Published</option>
                            <option value="private">Private</option>
                        </x-form-select>
                    </div>
                    <div class="container" style="padding: 0px;color: #636363">
                        <div class="form-inline">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                                <textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-4">
                    <x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mb-4">
                <p class="heading mb-3">Are you sure to delete this category <b><u></u></b>?</p>
                <p class="sub-heading text-secondary">
                    This student will be removed to this competition.
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" color="danger" id="process-archive" title="Continue" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	var errors = [];
    var selectedData = {};
	var formAction = 'add';

	$(function() {
		$('.main-page_table_info').on('click', '#edit-competition_btn', function(){
            const competitionData = <?= json_encode($data) ?>;

			$('input[name=competition_name]').val(competitionData.competition_name);
            $('select[name=school_venue_id]').val(competitionData.school_venue_id).trigger('change');
            $('select[name=school_venue_facility_id]').val(competitionData.school_venue_facility_id);
			$('input[name=competition_size]').val(competitionData.competition_size);
			$('input[name=enrollment_price]').val(competitionData.enrollment_price);
			$('input[name=start_date]').val(competitionData.start_date);
			$('input[name=end_date]').val(competitionData.end_date);
			$('input[name=start_time]').val(competitionData.start_time);
			$('input[name=end_time]').val(competitionData.end_time);
            $('select[name=status]').val(competitionData.status);
			$('textarea[name=remarks]').val(competitionData.remarks);
            $('select[name=competition_type]').val(competitionData.competition_type);
            $('select[name=competition_for_gender]').val(competitionData.competition_for_gender);

            selectedData = competitionData;
        });

		$('#school_venue_id').on('change', function(){
            const val = $(this).val();
            const schoolVenues = <?= json_encode($school_venues) ?>;
            const schoolVenue = schoolVenues.find((element) => element.id == val);

            let options = "";
            schoolVenue.school_venue_facilities.forEach(function(element){
                options += `<option value="${element.id}">${element.name}</option>`;
            });

            $('#school_venue_facility_id').append(options);
        });

		// Modal Form Submit
        $('#competition-modal').on('click', '#save-form_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const compeFormData = $('#competition-modal #modal-form').serializeArray();

            const requiredCompeFields = [
                'competition_name', 'school_venue_id', 'school_venue_facility_id',
                'competition_size', 'enrollment_price', 'start_date', 'end_date',
                'start_time', 'end_time', 'status', 'remarks', 'competition_for_gender', 'competition_type'
            ];
            
			if( processUpdateValidation(compeFormData, requiredCompeFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

            let transformedData = {};

			compeFormData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            // console.log(transformedData);
            // return;
            transformedData['id'] = selectedData.id.toString();
            // Format the time
            const startTime = transformedData['start_time'].split(':');
            transformedData['start_time'] = startTime[0] + ":" + startTime[1];

            const endTimeTime = transformedData['end_time'].split(':');
            transformedData['end_time'] = endTimeTime[0] + ":" + endTimeTime[1];

            // return;
            await axios.post(`${getApiUrl()}/competition/update`, transformedData, {
				headers: {
					'Content-Type': 'application/json',
					'Authorization': 'Bearer ' + userToken
				}
			}).then(res => {
				$('#competition-modal #cancel-btn').click();

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

		function processUpdateValidation(compeFormData, requiredCompeFields) {
			errors = [];
            let startTime = '';
			let endTime = '';

			compeFormData.forEach(function(item) {
				if ( requiredCompeFields.includes(item.name) ) {
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
            console.log(errors);
			if ( errors.length > 0 ) {
				renderErrors('competition-modal');

				return true;
			}

			return false;
		}

        $('#categories-table').on('click', 'tr', function() {
			const dataID = $(this).data('id');
 			const selected_categories = <?= json_encode($selected_categories) ?>;
			const rowData = selected_categories.find(value => value.id == dataID);

            selectedData = rowData;

            $('#detail-category_status').text( rowData.status.charAt(0).toUpperCase() + rowData.status.slice(1) );
            $('#detail-category_category').text( rowData.category.name );
            $('#detail-category_start_date').text( rowData.start_date );
            $('#detail-category_end_date').text( rowData.end_date );
            $('#detail-category_start_time').text( rowData.start_time );
            $('#detail-category_end_time').text( rowData.end_time );
            $('#detail-category_remarks').text( rowData.remarks );

            $('#detail-modified_by').text( rowData.log ? rowData.log.user.name : '-' );
            $('#detail-updated_at').text( rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});

        $('#categories-table .edit-button').on('click', function(){
            const dataID = $(this).data('row_id');
            formAction = "update";

            $('#categories-modal .modal-title').text("Update Category");

            const selected_categories = <?= json_encode($selected_categories) ?>;
			const rowData = selected_categories.find(value => value.id == dataID);

            $('select[name=category_id]').val(rowData.category_id);
            $('input[name=start_date]').val(rowData.start_date);
            $('input[name=end_date]').val(rowData.end_date);
            $('input[name=start_time]').val(rowData.start_time);
            $('input[name=end_time]').val(rowData.end_time);
            $('select[name=status]').val(rowData.status);
            $('[name=remarks]').val(rowData.remarks);
        });

        $('#categories-table .delete-button').on('click', function(){
            const dataID = $(this).data('row_id');
            const selected_categories = <?= json_encode($selected_categories) ?>;
			const rowData = selected_categories.find(value => value.id == dataID);
            selectedData = rowData;

            $('#delete-modal .heading u').text(selectedData.category.name);
        });

		// Modal Form Submit
        $('#categories-modal').on('click', '#save-form_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#categories-modal #modal-form').serializeArray();

            const requiredFields = [
                'category_id', 'start_date', 'end_date',
                'start_time', 'end_time', 'status', 'remarks'
            ];
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

            let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            // return;
            const competitionData = <?= json_encode($data) ?>;
            // Format the time
            const startTime = transformedData['start_time'].split(':');
            transformedData['start_time'] = startTime[0] + ":" + startTime[1];

            const endTimeTime = transformedData['end_time'].split(':');
            transformedData['end_time'] = endTimeTime[0] + ":" + endTimeTime[1];

            if ( formAction == 'add' ) {
                await axios.post(`${getApiUrl()}/competition/${competitionData.id}/add-category`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#competition-modal #cancel-btn').click();

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

            if ( formAction == 'update' ) {
                transformedData['id'] = selectedData.id.toString();
                // Format the time
                const startTime = transformedData['start_time'].split(':');
                transformedData['start_time'] = startTime[0] + ":" + startTime[1];

                const endTimeTime = transformedData['end_time'].split(':');
                transformedData['end_time'] = endTimeTime[0] + ":" + endTimeTime[1];
                
                await axios.post(`${getApiUrl()}/competition/update-category`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#competition-modal #cancel-btn').click();

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
        });

        $('#delete-modal #process-archive').on('click', async function(){
            $(this).attr('disabled', 'true');
            
            // get user token
			const userToken = getUserToken();

            await axios.delete(`${getApiUrl()}/competition/archive-category/${selectedData.id}`, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        $('#delete-modal #cancel-btn').click();

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
                    
                    console.error('Error fetching data:', error.response.data);
                });
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
            console.log(errors);
			if ( errors.length > 0 ) {
				renderErrors('categories-modal');

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
	});
</script>
@endsection