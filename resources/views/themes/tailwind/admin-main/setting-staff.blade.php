@extends('theme::layouts.app')

@section('content')
<div class="page-container min-vh-80">
    <x-page-content-heading 
        heading="Setting - Staff" 
        route="{{ route('wave.user.admin-main.setting-addstaff') }}"
        withButton="false"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#competition-modal" 
        buttonType="button"
        buttonId="add-competition_btn"
        buttonTitle="Add Staff"
    />
    <div class="row mt-2 p-2">
        <!-- Student List | Left - Table Section -->
        <div class="col-xxl-9 page-content-col1">
            <div class="tab-content p-3 pt-4">
                <div class="row">
                    <div class="col-10">
                        <x-search-input
                            inputType="text"
                            inputName="student_search"
                            inputID="staff-search"
                            inputPlaceholder="Search..."
                        />
                    </div>
                    <div class="col-2">
                        <x-form-select
                            label="" 
                            name="action"
                            id="action_btn"
                            isRequired="true"
                        >
                            <option value="" hidden>Actions</option>
                            <option value="bulk-delete">Bulk Delete</option>
                        </x-form-select>
                    </div>
                </div>
                
                
                <div class="table-responsive table-custom data-table with-custom-search mt-4">
                    <table class="table table-hover w-100 position-relative" id="staff-table">
                        <thead>
                            <tr>
                                <th class="text-left"><input type="checkbox" class="check-all"></th>
                                <th class="text-left">STAFF EMAIL</th>
                                <th class="text-left">ROLE</th>
                                <th class="text-left">CREATE DATE</th>
                                <th class="text-left">STATUS</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $value)
                                <tr data-id="{{ $value['id'] }}">
                                    <td style="width: 16px;"><input type="checkbox" class="check" data-id="{{ $value['id'] }}"></td>
                                    <td>{{ $value['email'] }}</td>
                                    <td>{{ $value['role']['display_name'] }}</td>
                                    <td>{{ formatDate($value['created_at']) }}</td>
                                    <td class="text-{{ $value['status'] == 'active' ? 'success' : ( $value['status'] == 'inactive' ? 'warning' : 'danger' ) }}">{{ ucfirst($value['status']) }}</td>
                                    <td>
                                        <div class="table-acitions_container d-flex gap-2">
                                            <a href="{{ route('wave.user.admin-main.setting-updatestaff', $value['id']) }}" class="edit-button" id="edit-btn"">
                                                <x-svg-icon icon="edit" width="16" height="16" />
                                            </a> 
                                            @if( $value['status'] != 'archived' )
                                                <button type="button" class="delete-button" id="delete-btn" data-row_id="{{ $value['id'] }}" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                                    <x-svg-icon icon="delete" width="16" height="14" />
                                                </button>
                                            @endif
                                            @if( isSuperAdmin() && $value['status'] == 'archived' )
                                                <div class="cursor-pointer unarchive-btn" data-row_id="{{ $value['id'] }}" data-bs-toggle="modal" data-bs-target="#unarchive-modal">
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
 							<h1 class="fw-semibold card-heading text-center">Staff</h1>
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
 											<h1 id="detail-status" class="card-detail_sub_title text-success">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Account Email</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-email" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Role</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-role" class="card-detail_sub_title">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">Create Date</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-created_at" class="card-detail_sub_title">-</h1>
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

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mb-4">
                <p class="heading mb-3">Archive Confirmation</p>
                <p class="sub-heading text-secondary">
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" color="danger" id="process-archive" title="Yes" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Unarchive Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="unarchive-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="heading text-warning mb-3" style="font-size: 20px;font-family: Poppins, sans-serif;">Unarchive Confirmation</p>
                <p class="sub-heading">
                    Are you sure you want to unarchive <b id="label-unarchive-name"><u>[competition name]</u></b>?
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

@section('style')
<style>
    #staff-table_wrapper .row:nth-child(2) {
        min-height: calc(100vh - 44vh) !important;
    }

    .page-content-col2 {
        border: none;
        border-left: 1px solid rgb(232,232,232);
        border-top-right-radius: 10px;
        border-bottom-right-radius: 11px;
        padding: 0 20px 0 20px;
        margin-left: 10px;
    }

    .page-content-col2 .card {
        border: none;
        border-radius: 0;
        border-bottom: 1px solid #e8e8e8 !important;
    }
</style>
@endsection

@section('script')
<script type="text/javascript">
    var errors = [];
    var selectedData = {};
    var formAction = '';
    var defaultPageTitle = ' Competition';

    $(function() {
        // Event listener for custom search input
        $('#staff-search').on('keyup', function() {
            var searchTerm = $(this).val();
            
            window.table.search(searchTerm).draw();
        });

        $('#staff-table').on('click', 'tr', function() {
			const dataID = $(this).data('id');
            if(! dataID )
                return;

 			const data = <?= json_encode($data) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            console.log(rowData);
            $('#detail-status').text( ucfirst(rowData.status) );
            $('#detail-status').removeClass('text-success text-danger');
            $('#detail-status').addClass(rowData.status != 'archived' ? 'text-success' : 'text-danger');
            $('#detail-email').text( rowData.email );
            $('#detail-role').text( rowData.role.display_name );
            $('#detail-created_at').text( rowData.created_at );
            $('#detail-updated_at').text( rowData.updated_at );

            $('#detail-modified_by').text( rowData.log.length > 0 ? rowData.log.user.name : '-' );
            $('#detail-updated_at').text( rowData.log.length > 0 ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});

         $('#staff-table .delete-button').on('click', function(){
            const dataID = $(this).data('row_id');
 			const data = <?= json_encode($data) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            
            $("#delete-modal .sub-heading").empty();
            $("#delete-modal .sub-heading").text( "Are you sure you want to archive " + rowData.email + ", " + rowData.role.display_name );
        });

        $('#staff-table .unarchive-btn').on('click', function(){
            const dataID = $(this).data('row_id');
 			const data = <?= json_encode($data) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;

            $('#label-unarchive-name u').text( rowData.name );
        });

        $('#process-archive').on('click', async function(){
            $(this).attr('disabled', 'true');

            // get user token
			const userToken = await getUserToken();

            const id = selectedData.id;
            await axios.delete(`${getApiUrl()}/user/archive/${id}`, {
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
            await axios.patch(`${getApiUrl()}/user/unarchive/${id}`, {}, {
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

        $('#action_btn').on('change', async function(){
            const value = $(this).val();

            if (value == 'bulk-delete') {
                const rows = $("#staff-table tbody tr .check");
                let rowsID = [];

                rows.each(function(){
                    console.log($(this));
                    if( $(this).is(':checked') )
                        rowsID.push($(this).data('id'));
                });

                if( rowsID.length <= 0 ){
                    toastTopEnd("Warning", "No entries selected", "warning");
                }else{
                    // Show loading spinner
                    var spinner = $('<div class="loading-container"><span class="loading"></span></div>').appendTo('#staff-table');

                    // get user token
			        const userToken = await getUserToken();

                    await axios.post(`${getApiUrl()}/user/bulk-archive`, { entries: rowsID }, {
                            headers: {
                                'Content-Type': 'application/json',
                                'Authorization': 'Bearer ' + userToken
                            }
                        }).then(res => {
                            if ( res.data.success ) {
                                toastTopEnd("Success", res.data.message, "success");

                                window.location = window.location
                            } else {
                                toastInfo("Cant' Archive", res.data.message, "warning");

                                spinner.remove();
                                $(this).removeAttr('disabled');
                            }
                        })
                        .catch(error => {
                            spinner.remove();
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

                    spinner.remove();
                }

                $(this).val('');
            }
        });

        $('#staff-table').on('click', '.check-all', function(){
            if($(this).is(':checked')) {
                // * check all td checkboxes
                $('#staff-table tbody input.check').prop('checked', true);
            } else {
                $('#staff-table tbody input.check').prop('checked', false);
            }
        });
    });
</script>
@endsection