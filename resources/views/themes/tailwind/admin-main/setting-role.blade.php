@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Setting - Role" 
        withButton="false"
        route="{{ route('wave.user.admin-main.setting-addrole') }}"
        withIcon="true"
        icon="plus"
        buttonModalTarget="" 
        buttonType="button"
        buttonId="add-role_btn"
        buttonTitle="Add Role"
    />
    <div class="row mt-1">
        <div class="col-xxl-12">
            <div class="row pl-3">
                <!-- Table List -->
                <div class="col-9 page-content-col">
                    <div class="tab-content p-3 pt-4">
                        <div class="row placed-vide-custom-filter">
                            <div class="col-10 position-relative">
                                <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
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
                            <table class="table table-hover w-100" id="roles-table">
                                <thead>
                                    <tr>
                                        <th class="text-left"><input type="checkbox" class="check-all"></th>
                                        <th class="text-left">ROLE</th>
                                        <th class="text-left">CREATE DATE</th>
                                        <th class="text-left">STATUS</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($entries['roles'] as $entry)
                                        <tr data-id="{{ $entry['id'] }}">
                                            <td class="text-left"><input type="checkbox" class="single-checkbox" value="{{ $entry['id'] }}"></td>
                                            <td class="text-left">{{ $entry['display_name'] }}</td>
                                            <td class="text-left">{{ formatDate($entry['created_at']) }}</td>
                                            <td class="text-left {{ $entry['status'] == 'archived' || $entry['status'] == 'inactive' ? 'text-danger' : 'text-success' }}">{{ ucfirst($entry['status']) }}</td>
                                            <td class="text-center">
                                                <div class="table-acitions_container d-flex gap-2">
                                                    <a href="{{ route('wave.user.admin-main.setting-addrole', $entry['id']) }}">
                                                        <x-svg-icon icon="edit" width="16" height="16" />
                                                    </a>
                                                    @if( $entry['status'] != 'archived' )
                                                        <button type="button" class="delete-button" id="delete-btn" data-row_id="{{ $entry['id'] }}" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                                            <x-svg-icon icon="delete" width="16" height="14" />
                                                        </button>
                                                    @endif
                                                    @if( isSuperAdmin() && $entry['status'] == 'archived' )
                                                        <div class="cursor-pointer unarchive-btn" data-row_id="{{ $entry['id'] }}" data-bs-toggle="modal" data-bs-target="#unarchive-modal">
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
                                    <h1 class="fw-semibold card-heading text-center">Role</h1>
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
                                                    <h1 class="card-detail_title">Role</h1>
                                                </div>
                                                <div class="col-md-6">
                                                    <h1 id="info-role" class="card-detail_sub_title">-</h1>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <h1 class="card-detail_title">Create Date</h1>
                                                </div>
                                                <div class="col-md-6">
                                                    <h1 id="info-create_date" class="card-detail_sub_title">-</h1>
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

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mb-4">
                <p class="heading mb-3">Archive Confirmation</p>
                <p class="sub-heading text-secondary">
                    Are you sure to archive this role?
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
				<p class="text-warning mb-3" style="font-size: 20px;font-family: Poppins, sans-serif;">Unarchive Confirmation</p>
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
        var customTable = $('#roles-table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "aoColumnDefs": mSortingString,
            "columnDefs": [{
                    targets: [0,4],
                    orderable: false
            }]
        });

        var formAction = "add";
        var selectedData = {};

        $('#roles-table tbody').on('click', 'tr', function() {
			const dataID = $(this).data('id');
            if(! dataID )
                return;
            
 			const data = <?= json_encode($entries['roles']) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;

            $('#info-status').empty(); 
            $('#info-status').append(`<span class="status-color_${selectedData.status}">${ucfirst(selectedData.status)}</span>`);
            $('#info-role').text( selectedData.display_name );
            $('#info-create_date').text( moment(selectedData.created_at).format('m/d/Y') );

            $('#detail-modified_by').text( rowData.log ? rowData.log.user.name : '-' );
            $('#detail-updated_at').text( rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});

        $('.placed-vide-custom-filter').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();
            console.log(searchTerm)
            customTable.search(searchTerm).draw();
        });

        $('#roles-table').on('click', '.delete-button', function() {
            $('#delete-modal .sub-heading').text(`Are you sure to archive this role?`);
            formAction = "single-delete";
        });

        $('#delete-modal').on('click', '#process-archive', async function(){
            $(this).attr('disabled', 'true');

            const userToken = getUserToken();

            if( formAction == 'single-delete' ) {
                let transformedData = {
                    id: selectedData.id
                };

                await axios.post(`${getApiUrl()}/role/archive`, transformedData,{
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

                await axios.post(`${getApiUrl()}/role/bulk-archive`, transformedData,{
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

            await axios.post(`${getApiUrl()}/role/unarchive`, transformedData,{
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

        $('#roles-table thead').on('click', '.check-all', function(){
            const isChecked = $(this).is(':checked');

            if( isChecked ) {
                // check all data in the table
                $('.single-checkbox').prop('checked', true);
            }else{
                $('.single-checkbox').prop('checked', false);
            }
        });

        var selectedIds = [];
        $('.placed-vide-custom-filter').on('change', '#bulk_action_btn', async function(){
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
				renderErrors('place-video-modal');

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