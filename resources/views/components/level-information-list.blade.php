<div class="row mt-2 p-2">
    <!-- LEVEL INFORMATION List | Left - Table Section -->
    <div class="col-xxl-9 page-content-col1">
        <div class="tab-content p-3 pt-4">
            <div class="row custom-filter-tab">
                <div class="col-10 position-relative">
                    <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
                </div>
                <div class="col-2">
                    <div class="dropdown custon-dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-popper-placement="bottom-end">
                            Actions
                        </button>
                        <ul class="dropdown-menu" data-popper-placement="bottom-end" style="position: absolute; left: -70px; top: 30px;">
                            <li>
                                <a href="" class="dropdown-item overflow-hidden text-danger" data-value="archive" style="text-overflow: ellipsis" data-id="">
                                    <span>
                                        <x-svg-icon icon="delete" />
                                    </span>
                                    <span class="ms-2">Archive Items</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="table-responsive table-custom data-table with-custom-search mt-4">
                <table class="table table-hover w-100" id="level-info_table">
                    <thead>
                        <tr>
                            <th class="text-left"><input type="checkbox" class="check-all"></th>
                            <th class="text-left">COURSE LEVEL</th>
                            <th class="text-left">CLASS SIZE</th>
                            <th class="text-left">AGE</th>
                            <th class="text-left">COURSE CATEGORY</th>
                            <th class="text-left">STATUS</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $levelInformations as $levelInformation )
                            <tr data-id="{{ $levelInformation['id'] }}">
                                <td class="text-left"><input type="checkbox" class="single-checkbox" value="{{ $levelInformation['id'] }}"></td>
                                <td class="text-left">{{ $levelInformation['level']['name'] }}</td>
                                <td class="text-left">{{ $levelInformation['class_size'] }}</td>
                                <td class="text-left">{{ $levelInformation['age'] }}</td>
                                <td class="text-left">{{ $levelInformation['course_category_name'] }}</td>
                                <td class="text-left {{ $levelInformation['status'] == 'archived' ? 'text-danger' : 'text-success' }}">{{ $levelInformation['status_label'] }}</td>
                                <td class="text-center">
                                    <div class="table-acitions_container d-flex gap-2">
                                        <button type="button" class="edit-button" id="edit-btn" data-row_id="{{ $levelInformation['id'] }}" data-bs-toggle="modal" data-bs-target="#level-info_modal">
                                            <x-svg-icon icon="edit" width="16" height="16" />
                                        </button>
                                        @if( $levelInformation['status'] != 'archived' )
                                            <button type="button" class="delete-button" id="delete-btn" data-row_id="{{ $levelInformation['id'] }}" data-bs-toggle="modal" data-bs-target=".level-info_tab #delete-modal">
                                                <x-svg-icon icon="delete" width="16" height="14" />
                                            </button>
                                        @endif
                                        @if( isSuperAdmin() && $levelInformation['status'] == 'archived' )
                                            <div class="cursor-pointer unarchive-btn" data-row_id="{{ $levelInformation['id'] }}" data-bs-toggle="modal" data-bs-target=".level-info_tab #unarchive-modal">
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
    <!-- LEVEL INFORMATION Details | Right Section -->
    <div class="col d-xxl-flex flex-column page-content-col2">
        <div class="card">
            <div class="card-body main-page_normal_card_info">
                <div class="col mb-4">
                    <div>
                        <h1 class="fw-semibold card-heading text-center">COURSE</h1>
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
                                        <h1 class="card-detail_title">Course Level</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-course_level" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Class size</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-class_size" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Age</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-age" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Prerequisite</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-prerequisite" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Characteristics</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-characteristics" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Course Category</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-course_category" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Remark</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-remarks" class="card-detail_sub_title">-</h1>
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
<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="level-info_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Level Information</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input label="Name of Course Category" type="text" name="course_category_name" id="course_category_name" isRequired="true" />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select label="Please select the Level" name="level_id" id="level_id" isRequired="true">
                            <option value="" hidden>Select Level</option>
                            @foreach($levels as $level)
                                <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                        <div class="form-inline" style="width: 100%;margin-right: 10px;">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Characteristics</label>
                                <div id="characteristics-container" class="d-flex flex-wrap gap-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="container characteristic-container d-none" style="padding: 0px;color: #636363;margin-top: 20px;">
                        <div class="card">
                            <div class="card-body">
                                <input type="text" name="characteristic_name" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;width: 100%;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
                                <div class="col" style="margin-top: 20px;">
                                    <button class="btn btn-light fw-semibold hide-characteristic_container" type="button" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);margin-right: 20px;">Cancel</button>
                                    <button id="save-characteristic" class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container mb-3" style="margin-top: 10px; padding-left: 0px;">
                        <div class="row">
                            <div class="col-auto">
                                <button class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap show-characteristic_container" type="button" style="height: 30px; padding: 5px 12px; padding-top: 0px; padding-bottom: 0px; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255, 255, 255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.25);">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 8px;">
                                        <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                                    </svg>
                                    Add Characteristics
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input label="Class Size" type="text" name="class_size" id="class_size" isRequired="true" />
                        <x-form-input label="Age" type="text" name="age" id="age" isRequired="true" />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input label="Duration" type="text" name="duration" id="duration" isRequired="true" />
                        <x-form-input label="Cost (per class)" type="text" name="cost_per_class" id="cost_per_class" isRequired="true" />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input label="Prerequisite" type="text" name="prerequisite" id="prerequisite" isRequired="true" />
                    </div>
                    <div class="container mb-3" style="padding: 0px;color: #636363">
                        <div class="form-inline">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Remark <span class="text-danger">*</span></label>
                                <textarea name="remarks" class="form-control" placeholder="Type remarks here..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select label="Status" name="status" id="status" isRequired="true">
                            <option value="" hidden>Select Status</option>
                            <option value="published">Published</option>
                            <option value="private">Private</option>
                            <option value="archived">Archive</option>
                        </x-form-select>
                    </div>
                </form>
                <div class="mt-4">
                    <x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target="" />
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
                    Are you sure to archive this Level Information?
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal" />
                <x-primary-button type="button" color="danger" id="process-archive" title="Continue" toggle="" target="" />
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
                    Are you sure you wan't to unarchive this Level Information?
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal" />
                <x-primary-button type="button" id="process-unarchive" title="Yes" toggle="" target="" />
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        var formAction = '';
        var characteristicData = [];
        var selectedCharacteristicIndex = null;
        var modalTitle = "Level Information";
        var selectedData = {};

        $('#level-info_table').on('click', 'tr', function() {
			const rowID = $(this).data('id');
 			const systemData = <?= json_encode($levelInformations) ?>;
			const rowData = systemData.find(value => value.id == rowID);
            selectedData = rowData;

			// Update Details on the Level Information Section
			$("#detail-status").text(ucfirst(rowData.status));
			$("#detail-status").addClass(rowData.status == 'archived' ? 'text-danger' : 'text-success');
			$("#detail-course_level").text(rowData.level.name);
			$("#detail-class_size").text(rowData.class_size);
			$("#detail-age").text(rowData.age);
			$("#detail-prerequisite").text(rowData.prerequisite);
			$("#detail-prerequisite").text(rowData.prerequisite);

            // To fill the details for characteristics
            $("#detail-characteristics").empty();

            let characteristicsElements = '<ul style="padding-left: 18px;">';
            rowData.characteristics.forEach(characteristic => {
                characteristicsElements += `<li style="list-style-type: disc !important;">${characteristic.name}</li>`;
            });
            characteristicsElements += '</ul>';
            $("#detail-characteristics").append(characteristicsElements);
            
			$("#detail-course_category").text(rowData.course_category_name);
			$("#detail-remarks").text(rowData.remarks);
			$('.card-detail_modified_by').text( rowData.log ? rowData.log.user.name : '-' );
            $('#detail-updated_at').text( rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});

        $('#level-info_table').on('click', '.edit-button', function(){
            const rowID = $(this).data('row_id');
 			const systemData = <?= json_encode($levelInformations) ?>;
			const rowData = systemData.find(value => value.id == rowID);
            selectedData = rowData;

            formAction = 'update';
            
            $('.level-info_tab #level-info_modal input[name=course_category_name]').val(selectedData.course_category_name);
            $('.level-info_tab #level-info_modal select[name=level_id]').val(selectedData.level_id);
            $('.level-info_tab #level-info_modal input[name=class_size]').val(selectedData.class_size);
            $('.level-info_tab #level-info_modal input[name=age]').val(selectedData.age);
            $('.level-info_tab #level-info_modal input[name=duration]').val(selectedData.duration);
            $('.level-info_tab #level-info_modal input[name=cost_per_class]').val(selectedData.cost);
            $('.level-info_tab #level-info_modal input[name=prerequisite]').val(selectedData.prerequisite);
            $('.level-info_tab #level-info_modal [name=remarks]').val(selectedData.remarks);
            $('.level-info_tab #level-info_modal select[name=status]').val(selectedData.status);

            characteristicData = selectedData.characteristics.map(function(characteristic){
                return {
                    name: characteristic.name,
                    id: characteristic.id,
                    removed: false,
                }
            });

            refreshCharacteristicList();
        });

        $('#level-info_table').on('click', '.delete-button', function(){
            formAction = 'single-delete';
        });

        $('.page-container').on('click', '#level-information_btn', function() {
            resetModalForm();

            formAction = 'add';

            // $("#level-info_modal").text("Add " + modalTitle);

            // Set field status to Published as Default
            $('#modal-form input[name=status]').val('published');
        });

        /** MODAL (HIDE & SHOW) CHARACTERISTIC FORM CONTAINER */
        $('#level-info_modal').on('click', '.show-characteristic_container', function() {
            $(".characteristic-container").removeClass('d-none');
            $(".show-characteristic_container").addClass('d-none');
            $(".edit-characteristic").removeClass('d-none');

            $("input[name=characteristic_name]").removeClass('border border-danger');
            if ($("input[name=characteristic_name]").next().is('p'))
                $("input[name=characteristic_name]").next().remove();
        });

        $('#level-info_modal').on('click', '.hide-characteristic_container', function() {
            $(".characteristic-container").addClass('d-none');
            $(".show-characteristic_container").removeClass('d-none');
            $(".edit-characteristic").addClass('d-none');
        });

        $('#level-info_modal').on('click', '#save-characteristic', function() {
            const characteristicName = $("input[name=characteristic_name]").val();

            const requiredFields = [
                'characteristic_name'
            ];

            const formData = [{
                name: 'characteristic_name',
                value: characteristicName,
            }];

            if (processErrorValidation(formData, requiredFields))
                return;

            // If selectedCharacteristic variable has value, meaning action would be updating of characteristic
            if (selectedCharacteristicIndex != null) {
                characteristicData[selectedCharacteristicIndex].name = characteristicName;
                selectedCharacteristicIndex = null;

                refreshCharacteristicList();
            } else {
                const characteristicsData = {
                    name: characteristicName,
                    id: '',
                    removed: false,
                };

                characteristicData.push(characteristicsData);

                characteristics(characteristicsData, characteristicData.length - 1)
            }
            // reset field
            $("input[name=characteristic_name]").val("");
        });

        $('#level-info_modal').on('click', '.edit-characteristic', function() {
            refreshCharacteristicList();

            const characteristicIndex = $(this).data('characteristic_id');

            selectedCharacteristicIndex = characteristicIndex;

            // Fill the characteristic input field
            $("input[name=characteristic_name]").val(characteristicData[characteristicIndex].name);
        });

        $('#level-info_modal').on('click', '.remove-characteristic', function() {
            const characteristicIndex = $(this).data('characteristic_id');

            if (formAction == 'update' && characteristicData[characteristicIndex].id != '')
                characteristicData[characteristicIndex].removed = true;

            else
                characteristicData.splice(characteristicIndex, 1);

            refreshCharacteristicList();
        });

        $('#level-info_modal').on('click', '#save-form_btn', async function() {
            $(this).attr('disabled', 'true');

            // get user token
            const userToken = getUserToken();

            const formData = $('#level-info_modal #modal-form').serializeArray();

            const requiredFields = [
                'course_category_name',
                'level_id',
                'class_size',
                'age',
                'duration',
                'cost_per_class',
                'prerequisite',
                'remarks',
                'status',
            ];

            if (processErrorValidation(formData, requiredFields)) {
                $(this).removeAttr('disabled');

                return;
            }

            let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            transformedData['characteristics'] = characteristicData.map(function(data){
                return data.name
            });

            if ( formAction == 'add' ) {
                await axios.post(`${getApiUrl()}/content/level-information/store`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#level-info_modal #cancel-btn').click();
                    console.log(res)
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
                transformedData['id'] = selectedData.id;

                await axios.post(`${getApiUrl()}/content/level-information/update`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#level-info_modal #cancel-btn').click();
                    console.log(res)
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

        $('#level-info_table thead').on('click', '.check-all', function(){
            const isChecked = $(this).is(':checked');

            if( isChecked ) {
                // check all data in the table
                $('.single-checkbox').prop('checked', true);
            }else{
                $('.single-checkbox').prop('checked', false);
            }
        });

        $('.custom-filter-tab').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            window.table.search(searchTerm).draw();
        });

        var selectedIds = [];
        $('.custom-filter-tab').on('click', '.dropdown-item', async function(e){
            e.preventDefault();

            const value = $(this).data('value');

            if( value == 'archive' ) {
                const selectedRows = $('.level-info_tab .single-checkbox');
                console.log(selectedRows);
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

                $('.level-info_tab #delete-modal').modal('show');
                $('.level-info_tab #delete-modal .sub-heading').text(`Are you sure you want to delete ${selectedIds.length} entries?`);

                formAction = "bulk-delete";

                $(this).val("");
            }
        });

        $('#level-info_tab').on('click', '#delete-button', function(){
            formAction = "single-delete";
        });

        $('#level-info_modal').on('change', 'select[name=level_id]', function(){
            const value = $(this).val();

            const systemLevels = <?= json_encode($levels) ?>;
            const level = systemLevels.find(levelData => levelData.id == value);

            console.log(level);
        });

        $('.level-info_tab #delete-modal').on('click', '#process-archive', async function(){
            $(this).attr('disabled', 'true');
            console.log('hello')
            const userToken = getUserToken();

            if( formAction == 'single-delete' ) {
                let transformedData = {
                    id: selectedData.id
                };

                await axios.post(`${getApiUrl()}/content/level-information/archive/${selectedData.id}`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('.level-info_tab #delete-modal #cancel-btn').click();

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

                await axios.post(`${getApiUrl()}/content/level-information/bulk-archive`, transformedData,{
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('.level-info_tab #delete-modal #cancel-btn').click();

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

        $('.level-info_tab #unarchive-modal').on('click', '#process-unarchive', async function(){
            $(this).attr('disabled', 'true');

            const userToken = getUserToken();

            let transformedData = {
                id: selectedData.id
            };

            await axios.post(`${getApiUrl()}/content/level-information/unarchive/${selectedData.id}`, transformedData, {
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

        function refreshCharacteristicList() {
            $('#characteristics-container').empty();
            characteristicData.forEach((element, key) => {
                characteristics(element, key)
            });
        }

        function characteristics(characteristicData, index) {
            const template = generateCharacteristicsData(characteristicData, index)

            if (!characteristicData?.removed)
                $('#characteristics-container').append(template);
        }

        function generateCharacteristicsData(data, index) {
            return `
				<div class="d-xxl-flex align-items-xxl-center" style="height: 48px;background: #ffffff;border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding: 20px; width: 100%; display: flex !important; justify-content: space-between;">
					<div class="w-auto mr-4">
						<label class="col-form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">${data.name}</label>
					</div>
					<div class="cursor-pointer d-flex gap-1">
						<div class="edit-characteristic" data-characteristic_id="${index}">
							<svg id="" class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="width: 16px; height: 16px;color: #3B3B3B;">
								<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
							</svg>
						</div>
						<div class="remove-characteristic" data-characteristic_id="${index}">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg" style="width: 16px; height: 16px;">
								<path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
								<path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
							</svg>
						</div>
					</div>
				</div>
			`;
        }

        // Error Validations
        function processErrorValidation(formData, requiredFields) {
            errors = [];

            formData.forEach(function(item) {
                if (requiredFields.includes(item.name)) {
                    if (item.value == "") {
                        errors.push({
                            field_name: item.name,
                            message: formatString(item.name) + " is required."
                        });
                    }
                }
            });

            if (errors.length > 0) {
                renderErrors();

                return true;
            }

            return false;
        }

        function renderErrors() {
            if (errors.length > 0) {
                const hasParentFields = ['dob'];

                errors.forEach((element) => {
                    const fieldSelector = $(`[name="${element.field_name}"]`);
                    // Clear the errors first
                    fieldSelector.removeClass('border border-danger');
                    fieldSelector.parent().removeClass('border border-danger');

                    if (fieldSelector.next().is('p'))
                        fieldSelector.next().remove();

                    if (fieldSelector.parent().next().is('p'))
                        fieldSelector.parent().next().remove();

                    if (!hasParentFields.includes(element.field_name)) {
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

        function clearErrorFields() {
            const fields = ['input', 'select', 'textarea'];

            fields.forEach(element => {
                const fieldSelector = $(`${element}`);
                // Clear the errors first
                fieldSelector.removeClass('border border-danger');
                fieldSelector.parent().removeClass('border border-danger');

                if (fieldSelector.next().is('p'))
                    fieldSelector.next().remove();

                if (fieldSelector.parent().next().is('p'))
                    fieldSelector.parent().next().remove();
            });

        }

        function resetModalForm() {
            formAction = '';
            characteristicData = [];
            selectedCharacteristicIndex = null;
            modalTitle = "Level Information";
            selectedData = {};

            $('.level-info_tab #level-info_modal input[name=course_category_name]').val('');
            $('.level-info_tab #level-info_modal select[name=level_id]').val('');
            $('.level-info_tab #level-info_modal input[name=class_size]').val('');
            $('.level-info_tab #level-info_modal input[name=age]').val('');
            $('.level-info_tab #level-info_modal input[name=duration]').val('');
            $('.level-info_tab #level-info_modal input[name=cost_per_class]').val('');
            $('.level-info_tab #level-info_modal input[name=prerequisite]').val('');
            $('.level-info_tab #level-info_modal [name=remarks]').val('');
            $('.level-info_tab #level-info_modal select[name=status]').val('');

            clearErrorFields();

            characteristicData = [];
            // selectedLevelID = "";
            // selectedCharacteristicIndex = null;

            refreshCharacteristicList();
        }

    });
</script>