@extends('theme::layouts.app')

@section('content')
<div class="page-container min-vh-80">
    <x-page-content-heading 
        heading="Setting - Staff" 
        route=""
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
        <div class="col-xxl-8 page-content-col">
            <div class="col-7 p-3">
                <form id="staff-form" class="position-relative">
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Staff Name" 
                            placeholder="Enter staff name..."
                            type="text" 
                            name="name"
                            id="name"
                            isRequired=true
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Staff Username" 
                            placeholder="Enter staff email..."
                            type="text" 
                            name="username"
                            id="username"
                            isRequired=false
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Staff Email" 
                            placeholder="Enter staff email..."
                            type="text" 
                            name="email"
                            id="email"
                            isRequired=true
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Password" 
                            placeholder="Enter staff password..."
                            type="password" 
                            name="password"
                            id="password"
                            isRequired=true
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Confirm Password" 
                            placeholder="Confirm password."
                            type="password" 
                            name="confirm_password"
                            id="confirm_password"
                            isRequired=true
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Role" 
                            name="role_id"
                            id="role_id"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Role</option>
                            @foreach($roles['roles'] as $role)
                                <option value="{{ $role['id'] }}">{{ $role['display_name'] }}</option>
                            @endforeach
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
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="archived">Archive</option>
                        </x-form-select>
                    </div>
                </form>
                <div class="d-flex align-items-center gap-3">
                    <x-primary-button type="button" color="primary" id="process-save" title="Save" toggle="" target=""/>
                    <x-secondary-button route="{{ route('wave.user.admin-main.setting-staff') }}" id="cancel-btn" title="Cancel" dismiss=""/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
</style>
@endsection

@section('script')
<script type="text/javascript">
    var errors = [];
    var selectedData = {};
    var formAction = '';
    var defaultPageTitle = ' Competition';

    $(function() {
        $('#process-save').on('click', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#staff-form').serializeArray();

            const requiredFields = [
                'email', 'password', 'role_id',
                'status', 'name', 'confirm_password',
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

            await axios.post(`${getApiUrl()}/user/store`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        window.location = "<?= route('wave.user.admin-main.setting-staff') ?>";
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
        });

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