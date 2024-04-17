

@extends('theme::layouts.main')

<?php
    $logo = asset('themes/tailwind/images/Logo.png');
    
    if( $data && $data['logo'] !== "" )
        $logo = $data['logo'] ?? $logo; 
?>

@section('content')
<section class="h-100" style="width: 100vw;" id="admin-login_page_container">
        <div class="row h-100" style="margin-right: 0px;margin-left: 0px;width: 100vw;">
            <div class="col-md-6 d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center h-100" style="text-align: center;padding: 0px;width: 50vw;">
                <div style="width: 400px;"><img src="{{ $logo }}">
                    <h1 style="font-size: 50px;font-weight: bold;color: #4A5C7A;margin-top: 50px;">Welcome to {{ $data['name'] }}</h1>
                </div>
            </div>
            <div class="col-md-6 d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center h-100" style="border-left: 1px solid #AAC9E4;padding: 0px;width: 50vw;">
                <div class="card w-50">
                    <div class="card-body">
                        <div style="color: #636363;" class="mb-3 pl-2">
                            <h1 style="color: #3B3B3B;font-weight: bold;font-size: 36px;">Enquiry</h1>
                        </div>
                        <form id="enquiry-form">
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <x-form-input 
                                    label="Email" 
                                    type="text" 
                                    name="email"
                                    id="email"
                                    isRequired="true"
                                    placeholder="johndoe@gmail.com"
                                />
                            </div>
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <x-form-select
                                    label="Your course (optional)" 
                                    name="selected_course"
                                    id="selected_course"
                                    isRequired="false"
                                >
                                    <option value="" hidden>Select Course</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course['id'] }}">{{ $course['course_abbreviation'] }}</option>
                                    @endforeach
                                </x-form-select>
                            </div>
                            <div class="container" style="color: #636363">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label class="form-label" style="color: #636363;font-size: 14px;">Message <span class="text-danger">*</span></label>
                                        <textarea name="message" class="form-control" placeholder="Your message here..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 ml-3">
                                <x-primary-button type="button" id="send-form_btn" title="Send" toggle="" target=""/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        /**
         * ---------------------------
         * EVENTS
         * ---------------------------
         */

        $('#enquiry-form').on('click', '#send-form_btn', async function(){
            $(this).attr('disabled', 'true');
            
            // Prepare Data
			const formData = $('#enquiry-form').serializeArray();

            const requiredFields = ['email', 'message'];

            if( processErrorValidation(formData, requiredFields) ) {
                $(this).removeAttr('disabled');

                return;
            }

            let transformedData = {};

            formData.forEach(function(item) {
                transformedData[item.name] = item.value;
            });

            await axios.post(`${getApiUrl()}/public/make-enquiry`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                    }
                }).then(res => {
                    console.log(res);
                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        window.location = window.location
                    } else {
                        toastInfo("Cant' Send", res.data.message, "warning");

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

					if( error.response.status == 404 || error.response.status == 401 ) {
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
				renderErrors('enquiry-form');

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