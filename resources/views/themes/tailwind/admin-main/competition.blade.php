@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Competition" 
        withButton="true"
        withIcon="true"
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
        <div class="col-xxl-9 page-content-col1">
            <div class="tab-content p-3 pt-4">
                <x-search-input
                    inputType="text"
                    inputName="student_search"
                    inputID="student_search"
                    inputPlaceholder="Search..."
                />
                <div class="table-responsive table-custom data-table with-custom-search mt-4">
                    <table class="table table-hover w-100" id="competition-table">
                        <thead>
                            <tr>
                                <th class="text-left"><input type="checkbox"></th>
                                <th class="text-left">CODE</th>
                                <th class="text-left">COMPETITION NAME</th>
                                <th class="text-left">SIZE</th>
                                <th class="text-left">VENUE</th>
                                <th class="text-left">FACILITY</th>
                                <th class="text-left">TOTAL FEE (HK$)</th>
                                <th class="text-left">STATUS</th>
                                <th class="text-center" style="width: 60px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $competition)
                                <tr data-id="{{ $competition['id'] }}">
                                    <td><input type="checkbox"></td>
                                    <td>{{ $competition['competition_code']??''; }}</td>
                                    <td>{{ $competition['competition_name']??''; }}</td>
                                    <td class="text-left">{{ $competition['competition_size']??''; }}</td>
                                    <td class="text-left">{{ $competition['school_venue']['name']??''; }}</td>
                                    <td>{{ $competition['school_venue_facility']['name']??''; }}</td>
                                    <td class="text-left">{{ $competition['enrollment_price']??''; }}</td>
                                    <td class="{{ $competition['status'] == 'archived' ? 'text-danger' : 'text-success' }}">{{ ucfirst($competition['status']) }}</td>
                                    <td>
                                        <div class="table-acitions_container d-flex gap-2">
                                            <a href="{{ route('wave.user.admin-main.competition-view', $competition['id']) }}">
                                                <x-svg-icon icon="view"/>
                                            </a>
                                            <button type="button" class="edit-button" id="edit-btn" data-row_id="{{ $competition['id'] }}" data-bs-toggle="modal" data-bs-target="#competition-modal">
                                                <x-svg-icon icon="edit" />
                                            </button> 
                                            @if( $competition['status'] != 'archived' )
                                                <button type="button" class="delete-button" id="delete-btn" data-row_id="{{ $competition['id'] }}" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                                    <x-svg-icon icon="delete"/>
                                                </button>
                                            @endif
                                            @if( isSuperAdmin() && $competition['status'] == 'archived' )
                                                <div class="cursor-pointer unarchive-btn" data-row_id="{{ $competition['id'] }}" data-bs-toggle="modal" data-bs-target="#unarchive-modal">
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
        <!-- Coach Details | Right Section -->
        <div class="col d-xxl-flex flex-column page-content-col2">
            <div class="card">
 				<div class="card-body main-page_normal_card_info">
 					<div class="col mb-4">
 						<div>
 							<h1 class="fw-semibold card-heading text-center">Competion</h1>
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
 											<h1 id="detail-competition_status" class="card-detail_sub_title text-success">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Competition Name</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-competition_name" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Size</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-competition_size" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Venue</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-competition_venue" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Facility</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-competition_facility" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Fee (HK$)</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-competition_fee" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Date</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-competition_date" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Remark</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-competition_remarks" class="card-detail_sub_title">-</h1>
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

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="competition-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Add Competition</h4>
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

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mb-4">
                <p class="heading mb-3">Are you sure to delete competition?</p>
                <p class="sub-heading text-secondary">
                    <span id="competition-code"></span></span>
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
                <p class="heading text-warning mb-3" style="font-size: 20px;font-family: Poppins, sans-serif;">Are you sure you want to unarchive <b id="label-unarchive-name"><u>[competition name]</u></b>?</p>
                <p class="sub-heading">
                    Unarchiving this competition, would be able again.
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" id="process-unarchive" title="Yes" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    var errors = [];
    var selectedData = {};
    var formAction = '';
    var defaultPageTitle = ' Competition';

    $(function() {
        $('#student_search').on('keyup', function() {
            var searchTerm = $(this).val();
            
            window.table.search(searchTerm).draw();
        });

        $('#competition-table').on('click', 'tr', function() {
			const dataID = $(this).data('id');
 			const data = <?= json_encode($data) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;

            $('#detail-competition_status').text( rowData.status.charAt(0).toUpperCase() + rowData.status.slice(1) );
            $('#detail-competition_name').text( rowData.competition_name );
            $('#detail-competition_size').text( rowData.competition_size );
            $('#detail-competition_venue').text( rowData.school_venue.name );
            $('#detail-competition_facility').text( rowData.school_venue_facility.name );
            $('#detail-competition_fee').text( rowData.enrollment_price );
            $('#detail-competition_date').text( rowData.start_date );
            $('#detail-competition_remarks').text( rowData.remarks );

            $('#detail-modified_by').text( rowData.log ? rowData.log.user.name : '-' );
            $('#detail-updated_at').text( rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});

        $('#add-competition_btn').on('click', function(){
            formAction = "add";

            $('#competition-modal .modal-title').text("Add" + defaultPageTitle);
        });

        $('#competition-table').on('click', '.edit-button', function(){
            const dataID = $(this).data('row_id');

            formAction = "update";

            $('#competition-modal .modal-title').text("Update" + defaultPageTitle);

            const data = <?= json_encode($data) ?>;
			const rowData = data.find(value => value.id == dataID);

            $('input[name=competition_name]').val(rowData.competition_name);
            $('select[name=school_venue_id]').val(rowData.school_venue_id).trigger('change');
            $('select[name=school_venue_facility_id]').val(rowData.school_venue_facility_id);
            $('input[name=competition_size]').val(rowData.competition_size);
            $('input[name=enrollment_price]').val(rowData.enrollment_price);
            $('input[name=start_date]').val(rowData.start_date);
            $('input[name=end_date]').val(rowData.end_date);
            $('input[name=start_time]').val(rowData.start_time);
            $('input[name=end_time]').val(rowData.end_time);
            $('select[name=status]').val(rowData.status);
            $('[name=remarks]').val(rowData.remarks);
            $('select[name=competition_type]').val(rowData.competition_type);
            $('select[name=competition_for_gender]').val(rowData.competition_for_gender);
            
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

        $('#competition-table .delete-button').on('click', function(){
            const dataID = $(this).data('row_id');
 			const data = <?= json_encode($data) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            
            $("#delete-modal #competition-code").text( rowData.competition_code );
        });

        $('#competition-table .unarchive-btn').on('click', function(){
            const dataID = $(this).data('row_id');
 			const data = <?= json_encode($data) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            console.log(selectedData);
            $('#label-unarchive-name u').text( rowData.competition_code );
        });

        // Modal Form Submit
        $('#save-form_btn').on('click', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#modal-form').serializeArray();

            const requiredFields = [
                'competition_name', 'school_venue_id', 'school_venue_facility_id',
                'competition_size', 'enrollment_price', 'start_date', 'end_date',
                'start_time', 'end_time', 'status', 'remarks', 'competition_for_gender', 'competition_type'
            ];
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

            let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            // console.log(transformedData);
            // return;
            if ( formAction == 'add' ) {
                await axios.post(`${getApiUrl()}/competition/add`, transformedData, {
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
                const startTime = selectedData.start_time.split(':');
                transformedData['start_time'] = startTime[0] + ":" + startTime[1];

                const endTimeTime = selectedData.end_time.split(':');
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
            }
        });

        $('#process-archive').on('click', async function(){
            $(this).attr('disabled', 'true');

            // get user token
			const userToken = await getUserToken();

            const id = selectedData.id;
            await axios.post(`${getApiUrl()}/competition/archive`, { "id": id }, {
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
                        toastInfo("Cant' Archive", res.data.message, "warning");

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
        });

        $('#process-unarchive').on('click', async function(){
            $(this).attr('disabled', 'true');

            // get user token
			const userToken = await getUserToken();

            const id = selectedData.id;
            await axios.post(`${getApiUrl()}/competition/unarchive`, { "id": id }, {
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
                        toastInfo("Cant' Process", res.data.message, "warning");

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
        });

        // Error Validations
        function processErrorValidation(formData, requiredFields) {
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
				renderErrors();

				return true;
			}

			return false;
		}

		function renderErrors() {
			if ( errors.length > 0 ) {
                const hasParentFields = ['start_date'];

				errors.forEach((element) => {
                    const fieldSelector = $(`[name="${element.field_name}"]`);
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

        function formatString(inputString) {
			// Split the string into words using underscores as separators
			let words = inputString.split('_');

			// Capitalize the first letter of each word
			let capitalizedWords = words.map(word => word.charAt(0).toUpperCase() + word.slice(1));

			// Join the words back together with a space between them
			let formattedString = capitalizedWords.join(' ');

			return formattedString;
		}

        function initializeInputClearEvent() {
            $('input').on('change', function(){
                $(this).removeClass('border border-danger');
                $(this).parent().removeClass('border border-danger');

                if ( $(this).next().is('p') )
                    $(this).next().remove();

                if ( $(this).parent().next().is('p') )
                    $(this).parent().next().remove();
            })

            $('select').on('change', function(){
                $(this).removeClass('border border-danger');
                $(this).parent().removeClass('border border-danger');

                if ( $(this).next().is('p') )
                    $(this).next().remove();

                if ( $(this).parent().next().is('p') )
                    $(this).parent().next().remove();
            })

            $('textarea').on('change', function(){
                $(this).removeClass('border border-danger');
                $(this).parent().removeClass('border border-danger');

                if ( $(this).next().is('p') )
                    $(this).next().remove();

                if ( $(this).parent().next().is('p') )
                    $(this).parent().next().remove();
            })
        }

        initializeInputClearEvent();
    });
</script>
@endsection