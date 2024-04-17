@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Closure Category" 
        withButton="true"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#closure-category-modal" 
        buttonType="button"
        buttonId="add-closure_category_btn"
        buttonTitle="Add Category"
        secondBtnRoute="{{ route('wave.user.admin-main.setting-closure') }}"
        secondButtonId="back-closure_category_btn"
        withIconSecondBtn="true"
        secondBtnIcon="caret-left"
        secondBtnTitle="Back to Closures"
    />
    <div class="row mt-2 p-2">
        <!-- Closure List | Left - Table Section -->
        <div class="col-xxl-9 page-content-col1">
            <div class="tab-content p-3 pt-4">
                <x-search-input
                    inputType="text"
                    inputName="closure_category_search"
                    inputID=""
                    inputPlaceholder="Search..."
                />
                <div class="table-responsive table-custom data-table with-custom-search mt-4">
                    <table class="table table-hover w-100" id="closure-category-table">
                        <thead>
                            <tr>
                                <!-- <th class="text-left"><input type="checkbox"></th> -->
                                <th class="text-left">ID</th>
                                <th class="text-left">NAME</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $key => $closureCategory)
                                <tr data-id="{{ $closureCategory['id'] }}">
                                    <!-- <td style="width: 15px;"><input type="checkbox"></td> -->
                                    <td style="width: 50px;" class="text-left">{{ $closureCategory['id'] }}</td>
                                    <td class="text-left">{{ $closureCategory['name'] }}</td>
                                    <td class="text-center {{ $closureCategory['status'] == 'archived' ? 'text-danger' : 'text-success' }}">{{ ucfirst($closureCategory['status']) }}</td>
                                    <td style="width: 100px;" class="text-right">
                                        <div class="table-acitions_container d-flex gap-2">
                                            <button type="button" class="edit-button" id="edit-btn" data-row_id="{{ $closureCategory['id'] }}" data-bs-toggle="modal" data-bs-target="#closure-category-modal">
                                                <x-svg-icon icon="edit" width="16" height="16" />
                                            </button> 
                                            @if( $closureCategory['status'] != 'archived' )
                                                <button type="button" class="delete-button" id="delete-btn" data-row_id="{{ $closureCategory['id'] }}" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                                    <x-svg-icon icon="delete" width="16" height="14" />
                                                </button>
                                            @endif
                                            @if( isSuperAdmin() && $closureCategory['status'] == 'archived' )
                                                <div class="cursor-pointer unarchive-btn" data-row_id="{{ $closureCategory['id'] }}" data-bs-toggle="modal" data-bs-target="#unarchive-modal">
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
        <!-- Closure Details | Right Section -->
        <div class="col d-xxl-flex flex-column page-content-col2">
            <div class="card">
 				<div class="card-body main-page_normal_card_info">
 					<div class="col mb-4">
 						<div>
 							<h1 class="fw-semibold card-heading text-center">Closure Category</h1>
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
 											<h1 class="card-detail_title">STATUS</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-closure_category_status" class="card-detail_sub_title text-success">-</h1>
 										</div>
 									</div>
 									<div class="row mb-3">
 										<div class="col-md-6">
 											<h1 class="card-detail_title">NAME</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-closure_category_name" class="card-detail_sub_title">-</h1>
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
<div class="modal fade" role="dialog" tabindex="-1" id="closure-category-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Add Closure Category</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Name" 
                            type="text" 
                            name="name"
                            placeholder="Enter closure category name..."
                            id="name"
                            isRequired=true
                        />
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
<div class="modal fade" role="dialog" tabindex="-1" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mb-4">
                <p class="heading mb-3">Archive Confirmation</p>
                <p class="sub-heading text-secondary">
                    Are you sure to archive this category?
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
<div class="modal fade" role="dialog" tabindex="-1" id="unarchive-modal" data-bs-backdrop="static" data-bs-keyboard="false">
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

@section('script')
<script type="text/javascript">
    var errors = [];
    var selectedData = {};
    var formAction = '';
    var defaultPageTitle = ' Closure Category';

    $(function() {
        $('#closure-category-table').on('click', 'tr', function() {
			const dataID = $(this).data('id');
            if(! dataID )
                return;

 			const data = <?= json_encode($list) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;

            $('#detail-closure_category_status').text( ucfirst(rowData.status) );
            if( rowData.status == 'archived' ) {
                $('#detail-closure_category_status').removeClass('text-success');
                $('#detail-closure_category_status').addClass('text-danger');
            }else{
                $('#detail-closure_category_status').removeClass('text-danger');
                $('#detail-closure_category_status').addClass('text-success');
            }
            
            $('#detail-closure_category_name').text( rowData.name );

            $('#detail-modified_by').text( rowData.log ? rowData.log.user.name : '-' );
            $('#detail-updated_at').text( rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});

         $('.page-container').on('keyup', 'input[name=closure_category_search]', function(){
            const searchQuery = $(this).val();
            
            window.table.search(searchQuery).draw();
        });

        $('#add-closure_category_btn').on('click', function(){
            formAction = "add";

            $('#closure-category-modal .modal-title').text("Add" + defaultPageTitle);

            initializeInputClearEvent();
        });

        $('#closure-category-table .edit-button').on('click', function(){
            initializeInputClearEvent();

            const dataID = $(this).data('row_id');

            formAction = "update";

            $('#closure-category-modal .modal-title').text("Update" + defaultPageTitle);

            const data = <?= json_encode($list) ?>;
			const rowData = data.find(value => value.id == dataID);

            $('input[name=name]').val(rowData.name);
        });

        $('#closure-category-table .delete-button').on('click', function(){
            const dataID = $(this).data('row_id');
 			const data = <?= json_encode($list) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
        });

        $('#closure-category-table .unarchive-btn').on('click', function(){
            const dataID = $(this).data('row_id');
 			const data = <?= json_encode($list) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            
            $('#label-unarchive-name u').text( rowData.name );
        });

        // Modal Form Submit
        $('#save-form_btn').on('click', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#modal-form').serializeArray();

            const requiredFields = ['name'];
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

            let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            if ( formAction == 'add' ) {
                await axios.post(`${getApiUrl()}/closure/category/add`, transformedData, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + userToken
                        }
                    }).then(res => {
                        $('#closure-category-modal #cancel-btn').click();

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
            
            if ( formAction == 'update' ) {
                transformedData['id'] = selectedData.id.toString();
                
                // return;
                await axios.post(`${getApiUrl()}/closure/category/update`, transformedData, {
						headers: {
							'Content-Type': 'application/json',
							'Authorization': 'Bearer ' + userToken
						}
					}).then(res => {
                        $('#closure-category-modal #cancel-btn').click();

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

        $('#process-archive').on('click', async function(){
            $(this).attr('disabled', 'true');

            // get user token
			const userToken = await getUserToken();

            const id = selectedData.id;
            await axios.patch(`${getApiUrl()}/closure/category/archive/${id}`, { "id": id }, {
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
            await axios.patch(`${getApiUrl()}/closure/category/unarchive/${id}`, { "id": id }, {
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
                const hasParentFields = [];

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
            $('input').val('');
            
            $("#modal-form input").removeClass('border border-danger');
            $("#modal-form input").parent().removeClass('border border-danger');
            $("#modal-form input").next('p').remove();

            $("#modal-form select").removeClass('border border-danger');
            $("#modal-form select").parent().removeClass('border border-danger');
            $("#modal-form select").next('p').remove();

            $("#modal-form textarea").removeClass('border border-danger');
            $("#modal-form textarea").parent().removeClass('border border-danger');
            $("#modal-form textarea").next('p').remove();

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