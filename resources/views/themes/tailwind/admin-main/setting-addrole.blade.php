@extends('theme::layouts.app')
<?php
    $rolesPermissions = [];
    foreach ($entry['permissions'] as $permission) {
        $tableName = $permission['table_name'];
        if( $tableName ) {
            $resultIndex = array_search($tableName, array_column($rolesPermissions, 'role_name'));

            if ($resultIndex === false) {
                $rolesPermissions[] = [
                    'role_name' => $tableName,
                    'permissions' => [$permission],
                ];
            } else {
                $rolesPermissions[$resultIndex]['permissions'][] = $permission;
            }
        }
    }
?>
@section('content')
<div class="page-container min-vh-80">
    <x-page-content-heading 
        heading="Setting - Role" 
        route=""
        withButton="false"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#role-modal" 
        buttonType="button"
        buttonId="add-role_btn"
        buttonTitle="Add Role"
    />
    <div class="row mt-2 p-2">
        <!-- Student List | Left - Table Section -->
        <div class="col-xxl-8 page-content-col">
            <form id="role-form" class="position-relative">
                <div class="col-7 p-3">
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Role" 
                            placeholder="Enter role name..."
                            type="text" 
                            name="name"
                            id="name"
                            value="{{ $entry['role'] ? $entry['role']['display_name'] : '' }}"
                            isRequired=true
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Status" 
                            name="status"
                            id="status"
                            isRequired="true"
                        >
                            <option value="" hidden <?= $entry['role'] ? ($entry['role']['status'] ? '' : 'selected') : 'selected' ?>>Select Status</option>
                            <option value="active" <?= $entry['role'] ? ($entry['role']['status'] == 'active' ? 'selected' : '') : '' ?>>Active</option>
                            <option value="inactive" <?= $entry['role'] ? ($entry['role']['status'] == 'inactive' ? 'selected' : '') : '' ?>>Inactive</option>
                            <option value="archived" <?= $entry['role'] ? ($entry['role']['status'] == 'archived' ? 'selected' : '') : '' ?>>Archive</option>
                        </x-form-select>
                    </div>
                </div>
                <div class="col-12 p-3">
                    <div class="separator-container mb-3">
                        <p>Role Setting</p>
                        <hr>
                    </div>
                    <div>
                        <div class="switch-all_container mb-3">
                            <div class="col d-xl-flex align-items-xl-center">
                                <label class="switch">
                                    <input type="checkbox" class="check-all">
                                    <span class="slider round"></span>
                                </label>
                                <h1 class="switch-label">All</h1>
                            </div>
                        </div>
                        <div class="permission-list_container ml-4">
                            @foreach( $rolesPermissions as $rolesPermission )
                                <?php
                                    $foundObject = null;
                                    if( $entry['role'] )
                                        foreach ($entry['role']['permissions'] as $object) {
                                            if( $object['table_name'] ) {
                                                if ($object['table_name'] === $rolesPermission['role_name']) {
                                                    $foundObject = $object;
                                                    break; // Stop searching once found
                                                }
                                            }
                                        }
                                ?>
                                <div class="row mb-3">
                                    <div class="col-3 d-xl-flex align-items-xl-center">
                                        <label class="switch">
                                            <input type="checkbox" class="role-checkbox role-{{$rolesPermission['role_name']}}" data-key="{{$rolesPermission['role_name']}}" <?= $foundObject ? 'checked' : '' ?>>
                                            <span class="slider round"></span>
                                        </label>
                                        <h1 class="switch-label">{{ ucwords(str_replace('_', ' ', $rolesPermission['role_name'])) }}</h1>
                                    </div>
                
                                    <div class="col-9">
                                        <div class="d-flex gap-4 permission-container <?= $foundObject ? '' : 'disabled-selection' ?> {{$rolesPermission['role_name']}}-permission_container">
                                            @foreach( $rolesPermission['permissions'] as $permission )
                                                <?php
                                                    $foundPermission = null;

                                                    if( $entry['role'] )
                                                        foreach ($entry['role']['permissions'] as $object) {
                                                            if( $object['key'] ) {
                                                                if ($object['key'] === $permission['key']) {
                                                                    $foundPermission = $object;
                                                                    break; // Stop searching once found
                                                                }
                                                            }
                                                        }
                                                ?>
                                                <div class="d-flex align-items-center gap-1">
                                                    <input type="checkbox" name="permission_id" tabindex="4" value="{{ $permission['id'] }}" data-role_name="{{$rolesPermission['role_name']}}" id="{{ $permission['key'] }}" <?= $foundPermission ? 'checked' : '' ?>>
                                                    <label for="{{ $permission['key'] }}">{{ explode('_', $permission['key'])[0] }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
            <div class="d-flex align-items-center gap-3 p-3">
                <x-primary-button type="button" color="primary" id="process-save" title="Save" toggle="" target=""/>
                <x-secondary-button route="{{ route('wave.user.admin-main.setting-role') }}" id="cancel-btn" title="Cancel" dismiss=""/>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    .disabled-selection {
        opacity: 0.4;
        pointer-events: none;
    }
</style>
@endsection

@section('script')
<script type="text/javascript">
    var errors = [];
    var selectedData = {};
    var formAction = '';
    var defaultPageTitle = ' Competition';
    var entry = <?= $entry ? json_encode($entry) : null ?>;

    $(function() {
        $('.page-container').on('click', '#process-save', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#role-form').serializeArray();

            const requiredFields = ['status', 'name',];
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

            let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});
            
            transformedData['permissions'] = fetchSelectedPermissions();

            // console.log(transformedData);
            // $(this).removeAttr('disabled');
            // return;
            if(! entry.role ) {
                await axios.post(`${getApiUrl()}/role/store`, transformedData, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + userToken
                        }
                    }).then(res => {
                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");

                            window.location = "<?= route('wave.user.admin-main.setting-role') ?>";
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
                
            else {
                transformedData['id'] = entry.role.id;
                // console.log(transformedData);
                // $(this).removeAttr('disabled');
                // return;
                await axios.post(`${getApiUrl()}/role/update`, transformedData, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + userToken
                        }
                    }).then(res => {
                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");

                            window.location = "<?= route('wave.user.admin-main.setting-role') ?>";
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

        $('.permission-list_container').on('click', '.role-checkbox', function(){
            const isChecked = $(this).is(':checked');
            const key = $(this).data('key');

            if(isChecked) {
                $(`.${key}-permission_container`).removeClass('disabled-selection');
            }else{
                $(`.${key}-permission_container`).addClass('disabled-selection');
            }
        });

        $('.switch-all_container').on('click', '.check-all', function(){
            const isChecked = $(this).is(':checked');

            if(isChecked) {
                $('.role-checkbox').prop('checked', true);
                $(`.permission-container`).removeClass('disabled-selection');
                $(`.permission-container input[type=checkbox]`).prop('checked', true);
            } else {
                $('.role-checkbox').prop('checked', false);
                $(`.permission-container`).addClass('disabled-selection');
                $(`.permission-container input[type=checkbox]`).prop('checked', false);
            }
            
        });

        function fetchSelectedPermissions(){
            const permissionCheckboxes = $('.permission-container input[name=permission_id]');

            let permissions = [];
            permissionCheckboxes.each(function(){
                const isChecked = $(this).is(':checked');
                const roleName = $(this).data('role_name');
                const isRoleChecked = $(`.role-${roleName}`).is(':checked');

                if( isChecked && isRoleChecked ) {
                    const value = $(this).val();

                    permissions.push(value);
                }
            });

            return permissions;
        }

        // Error Validations
        function processErrorValidation(formData, requiredFields) {
			errors = [];
            let password = "";
            let confirmPassword = "";

			formData.forEach(function(item) {
				if ( requiredFields.includes(item.name) ) {
					if( item.value == "" ){
						errors.push({
							field_name: item.name,
							message: formatString(item.name) + " is required."
						});
					} else {
                        // Clear the errors first
                        $(`[name="${item.name}"]`).removeClass('border border-danger');
                        $(`[name="${item.name}"]`).parent().removeClass('border border-danger');

                        if($(`[name="${item.name}"]`).next().is('p'))
                            $(`[name="${item.name}"]`).next().remove();

                        if( item.name == 'password' && item.value != "" )
                            password = item.value;

                        if( item.name == 'confirm_password' && item.value != "" )
                            confirmPassword = item.value;
                    }
				}
			});

            if( password !== confirmPassword && password!= "" && confirmPassword!= "" ) {
                errors.push({
                    field_name: 'password',
                    message: "Password doesn't match"
                });

                errors.push({
                    field_name: 'confirm_password',
                    message: "Password doesn't match"
                });
            }

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
    });
</script>
@endsection