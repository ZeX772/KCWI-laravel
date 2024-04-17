@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Content - Place Video" 
        :withButton="can('create_place_video') ? true : false"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#place-video-modal" 
        buttonType="button"
        buttonId="video-modal_id"
        buttonTitle="Place Video"
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
                            <table class="table table-hover w-100" id="videos-table">
                                <thead>
                                    <tr>
                                        <th class="text-left" style="width: 15px;"><input type="checkbox" class="check-all"></th>
                                        <th class="text-left" style="width: 28px;"></th>
                                        <th class="text-left" style="width: 250px;">TITLE</th>
                                        <th class="text-left">LEVEL</th>
                                        <th class="text-left">UPLOAD DATE</th>
                                        <th class="text-left">STATUS</th>
                                        <th class="text-center head-action" style="width: 50px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $entries['videos'] as $video )
                                        <tr data-id="{{ $video['id'] }}">
                                            <td style="width: 15px;"><input type="checkbox" class="single-checkbox" value="{{ $video['id'] }}"></td>
                                            <td class="text-left" style="width: 28px;">
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="{{ $video['image_path'] }}" alt="" class="custom-table_thumbnail">
                                                </div>
                                            </td>
                                            <td class="text-left">{{ $video['title'] }}</td>
                                            <td class="text-left">{{ $video['level']['name'] }}</td>
                                            <td class="text-left">{{ formatDate($video['created_at'], 'd/m/Y h:i A') }}</td>
                                            <td class="text-left {{ $video['status'] == 'archived' ? 'text-danger' : 'text-success' }}">{{ ucfirst($video['status']) }}</td>
                                            <td style="width: 50px;" class="text-right">
                                                <div class="table-acitions_container d-flex gap-2">
                                                    @if( can('update_place_video')  == true )
                                                        <button type="button" class="edit-button" id="edit-btn" data-row_id="{{ $video['id'] }}" data-bs-toggle="modal" data-bs-target="#place-video-modal">
                                                            <x-svg-icon icon="edit" width="16" height="16" />
                                                        </button> 
                                                    @endif
                                                    @if( can('archive_place_video') && $video['status'] != 'archived' )
                                                        <button type="button" class="delete-button" id="delete-btn" data-row_id="{{ $video['id'] }}" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                                            <x-svg-icon icon="delete" width="16" height="14" />
                                                        </button>
                                                    @endif
                                                    @if( can('unarchive_place_video') && $video['status'] == 'archived' )
                                                        <div class="cursor-pointer unarchive-btn" data-row_id="{{ $video['id'] }}" data-bs-toggle="modal" data-bs-target="#unarchive-modal">
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
                                                    <h1 class="card-level">Level</h1>
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
                                                    <h1 class="card-detail_modified_by">-</h1>
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
<div class="modal fade" role="dialog" tabindex="-1" id="place-video-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Place Video</h4>
                <span class="small-icon_btn p-2 cursor-pointer cancel-btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div>
                    <form id="form-container">
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-input 
                                label="Title" 
                                type="text" 
                                name="title"
                                id="title"
                                isRequired="true"
                            />
                        </div>
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-input 
                                label="Thumbnail (optional)" 
                                type="file" 
                                name="attachment"
                                id="attachment"
                                isRequired="false"
                            />
                        </div>
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-input 
                                label="YouTube link" 
                                type="text" 
                                name="youtube_link"
                                id="youtube_link"
                                isRequired="true"
                            />
                        </div>
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-select
                                label="Level" 
                                name="level_id"
                                id="level_id"
                                isRequired="true"
                            >
                                <option value="" hidden>Choose Level</option>
                                @foreach( $entries['levels'] as $level )
                                    <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                                @endforeach
                            </x-form-select>
                        </div>
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-select
                                label="Characteristics" 
                                name="characteristics_id"
                                id="characteristics_id"
                                isRequired="true"
                            >
                                <option value="" hidden>Choose Level First</option>
                            </x-form-select>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Description <span class="text-muted">(optional)</span></label>
                                    <textarea name="description" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-select
                                label="Status" 
                                name="status"
                                id="status"
                                isRequired="true"
                            >
                                <option value="published">Publish</option>
                                <option value="unpublished">Unpublish</option>
                                <option value="archived">Archived</option>
                            </x-form-select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" color="primary" id="process-submit" title="Upload" toggle="" target=""/>
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
                    Are you sure to archive this video?
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

@section('style')
<style>
    #videos-table .head-action  {
        width: 50px !important;
    }
</style>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        var customTable = $('#videos-table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "aoColumnDefs": mSortingString,
            "columnDefs": [{
                    targets: [0,1,6],
                    orderable: false
            }]
        });

        // Event listener for custom search input
        $('.placed-vide-custom-filter').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            customTable.search(searchTerm).draw();
        });

        var formAction = "add";

        $('.placed-vide-custom-filter').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            customTable.search(searchTerm).draw();
        });

        $('#videos-table tbody').on('click', 'tr', function() {
			const dataID = $(this).data('id');
            
 			const data = <?= json_encode($entries['videos']) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            
            $('#info-status').empty(); 
            $('#info-status').append(`<span class="status-color_${selectedData.status}">${selectedData.status_label}</span>`);
            $('#info-title').text( selectedData.title );
            $('#info-link').text( selectedData.youtube_link );
            $('#info-upload_date').text( selectedData.created_at );
            $('#info-name').text( selectedData.level.name );
            $('.card-detail_modified_by').text( selectedData.log ? selectedData.log.user.name : '-' );
            $('#detail-updated_at').text( selectedData.log ? moment(selectedData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});

        $('.page-container').on('click', '#video-modal_id', function(){
            clearModalFields();
        });

        $('#place-video-modal').on('change', 'select[name=level_id]', function() {
            const valueID = $(this).val();
            
            const levels = <?= json_encode($entries['levels']) ?>;
            
            const levelsData = levels.find(value => value.id == valueID);

            let options = '';
            levelsData.level_characteristics.forEach(element => {
                options += `<option value="${element.id}">${element.name}</option>`;
            });

            $('#place-video-modal select[name=characteristics_id]').empty();
            $('#place-video-modal select[name=characteristics_id]').append(options);
        })

        $('#place-video-modal').on('blur', 'input[name=youtube_link]', function(){
            const valueData = $(this).val();
            console.log(valueData);
            const formattedYoutubeUrl = convertYouTubeURL(valueData);
            console.log(formattedYoutubeUrl)
            $(this).val(formattedYoutubeUrl);
        });

        $('#videos-table tbody').on('click', '.edit-button', function(){
            const rowID = $(this).data('row_id');
            formAction = "edit";

            const data = <?= json_encode($entries['videos']) ?>;
			const rowData = data.find(value => value.id == rowID);

            // Populate the field on the modal
            $('#place-video-modal input[name=title]').val(rowData.title);
            $('#place-video-modal input[name=youtube_link]').val(rowData.youtube_link);
            $('#place-video-modal select[name=level_id]').val(rowData.level_id).trigger('change');
            $('#place-video-modal select[name=characteristics_id]').val(rowData.characteristics_id);
            $('#place-video-modal [name=description]').val(rowData.description);
            $('#place-video-modal select[name=status]').val(rowData.status);
        });

        $("#place-video-modal").on('click', '#process-submit', async function() {
            $(this).attr('disabled', 'true');

            // get user token
            const userToken = getUserToken();

            // Prepare Data
            const formData = $('#place-video-modal #form-container').serializeArray();

            let transformedData = new FormData()

            formData.forEach(function(item) {
                transformedData.append(item.name, item.value)
            });

            const requiredFields = [
                'title', 'youtube_link', 'level_id',
                'characteristics_id', 'status'
            ];

            if( processErrorValidation(formData, requiredFields) ) {
                $(this).removeAttr('disabled');

                return;
            }

            const thumbnail = document.getElementById('attachment').files[0];
            
            if (thumbnail)
                transformedData.append('thumbnail', thumbnail);

            if( formAction == 'add' )
                await axios.post(`${getApiUrl()}/content/place-video/add`, transformedData, {
                        headers: {
                            'Authorization': 'Bearer ' + userToken,
                            'content-type': 'multipart/form-data'
                        }
                    }).then(res => {
                        $('#place-video-modal .cancel-btn').click();

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
                transformedData.append('id', selectedData.id)

                await axios.post(`${getApiUrl()}/content/place-video/update`, transformedData, {
                        headers: {
                            'Authorization': 'Bearer ' + userToken,
                            'content-type': 'multipart/form-data'
                        }
                    }).then(res => {
                        $('#place-video-modal .cancel-btn').click();

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

        $('#videos-table tbody').on('click', '.delete-button', function(){
            const rowID = $(this).data('row_id');

            const data = <?= json_encode($entries['videos']) ?>;
			const rowData = data.find(value => value.id == rowID);

            selectedData = rowData;
            formAction = 'single-delete'
        });

        $('#videos-table tbody').on('click', '.unarchive-btn', function(){
            const rowID = $(this).data('row_id');

            const data = <?= json_encode($entries['videos']) ?>;
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

                await axios.post(`${getApiUrl()}/content/place-video/archive`, transformedData,{
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

                await axios.post(`${getApiUrl()}/content/place-video/bulk-archive`, transformedData,{
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

            await axios.post(`${getApiUrl()}/content/place-video/unarchive`, transformedData,{
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

        $('#videos-table thead').on('click', '.check-all', function(){
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

        function convertYouTubeURL(inputURL) {
            // Check if the input URL matches the first format
            const matchFormat1 = inputURL.match(/https:\/\/www\.youtube\.com\/v\/([a-zA-Z0-9_-]+)/);

            // Check if the input URL matches the second format
            const matchFormat2 = inputURL.match(/https:\/\/www\.youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/);

            // Check if the input URL matches the third format
            const matchFormat3 = inputURL.match(/https:\/\/youtu\.be\/([a-zA-Z0-9_-]+)/);

            // If it's the first format, construct the second format
            if (matchFormat1) {
                return `https://www.youtube.com/watch?v=${matchFormat1[1]}`;
            }

            // If it's the third format, construct the second format
            if (matchFormat3) {
                return `https://www.youtube.com/watch?v=${matchFormat3[1]}`;
            }

            // If it's already the second format, return as is
            if (matchFormat2) {
                return inputURL;
            }

            // If it doesn't match any format, return null or handle accordingly
            return null;
        }

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

        function clearModalFields(){
            $('#place-video-modal input[name=title]').val("");
            $('#place-video-modal input[name=youtube_link]').val("");
            $('#place-video-modal select[name=level_id]').val("");
            $('#place-video-modal select[name=characteristics_id]').val("");
            $('#place-video-modal [name=description]').val("");
            $('#place-video-modal select[name=status]').val("");

            // clear error fields
            $('#place-video-modal input').removeClass('border border-danger');
            $('#place-video-modal input').next('p').remove();

            $('#place-video-modal select').removeClass('border border-danger');
            $('#place-video-modal select').next('p').remove();

            formAction = "add";
        }
    });
</script>
@endsection