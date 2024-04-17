 @extends('theme::layouts.app')


 @section('content')
<div style="height: 100vh;background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;padding: 20px;">
 	<h1 class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center titles" style="font-size: 2vw;font-family: Poppins, sans-serif;color: #3B3B3B;">Setting - Bank List</h1>
 	<div class="card" style="margin-top: 30px;border-style: none;">
 		<div class="card-body" style="color: #3B3B3B;">
 			<div class="tab-content">
 				<div id="tab-1" class="tab-pane active" role="tabpanel">
 					<div class="row">
 						<div class="col-xl-12 col-xxl-12" style="border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding-top: 12px;padding-bottom: 12px;">
 							<h1 style="color: #3B3B3B;font-size: 24px;font-family: Poppins, sans-serif;font-weight: 500;">Bank</h1>
 							<div class="card mb-5 mt-3" style="width: 60%;">
 								<div class="card-body">
									<form id="bank-form">
										<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start form-group">
											<label class="form-label" style="color: #636363;font-size: 14px;">Fill in the Bank Name</label>
											<input type="text" name="bank_name" placeholder="ex. BDO" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;width: 100%;">
											<button class="btn btn-primary {{ can('create_bank_list') ? '' : 'd-none' }}" id="btn-save" type="button" style="background: #4A5C7A;border-style: none;border-bottom-style: none;border-bottom-color: rgb(29,44,88);margin-top: 15px;">Add</button>
											<button class="btn btn-light fw-semibold mt-2 d-none" id="btn-cancel" type="button" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;height: 48px;background: rgb(255,255,255);">Cancel</button>
										</div>
									</form>
 								</div>
 							</div>
							 @foreach($data as $value)
								<div class="card" style="width: 60%;margin-top: 15px;">
									<div class="card-body d-xl-flex justify-content-between align-items-xl-center">
										<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">{{ $value['bank_name'] }}</h1>
										<div class="d-flex gap-2">
											<span class="cursor-pointer btn-edit" data-id="{{ $value['id'] }}">
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</span>
											@if( can('archive_bank_list') && $value['bank_status'] != 'archived' )
												<span class="cursor-pointer btn-archive" data-id="{{ $value['id'] }}" data-bs-toggle="modal" data-bs-target="#delete-modal">
													<i class="fa fa-times" aria-hidden="true"></i>
												</span>
											@endif
											@if( can('unarchive_bank_list') && $value['bank_status'] == 'archived' )
												<span data-id="{{ $value['id'] }}" data-name="{{ $value['bank_name'] }}" data-bs-toggle="modal" data-bs-target="#unarchive-modal" class="cursor-pointer unarchive-btn">
													<i class="fa-solid fa-trash-arrow-up"></i>
												</span>
											@endif
										</div>
									</div>
								</div>
							@endforeach
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
			<div class="modal-body">
				<p style="color: #FF4550;font-size: 20px;font-family: Poppins, sans-serif;" class="mb-3">Archive Confirmation</p>
				<p style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">
				 	Are you sure to archive <b style="text-decoration: underline;" id="label-delete-bank-name">Coach Ng</b>?
				</p>
			</div>
			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button id="cancel-archive" class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button id="process-archive" class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Yes</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" role="dialog" tabindex="-1" id="unarchive-modal">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="text-warning mb-3" style="font-size: 20px;font-family: Poppins, sans-serif;">Unarchive Confirmation</p>
				<p style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">
					Are you sure you want to unarchive <b style="text-decoration: underline;" id="label-unarchive-name">[coach name]</b>?
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
	var selectedData = {};
	var selectedID = '';
	var errors = [];
	var formAction = "add";
	var canAdd = "{{ can('create_bank_list') }}";

	$(function() {

		$('.btn-edit').click(function(){
			errors = [];

			formAction = "update";

			const selectedId = $(this).data('id');
			const pageData = <?= json_encode($data) ?>;
			const bank = pageData.find((value) => value.id == selectedId );

			$('#btn-save').removeClass('d-none');

			if ( bank ) {
				$('#btn-save').text('Update');
				$('#btn-cancel').removeClass('d-none');

				selectedData = bank;

				$('input[name=bank_name]').val(bank.bank_name);
				$('input[name=bank_name]').removeClass('border border-danger');
				$('.text-danger').remove();
			}
		});

		$('#btn-cancel').click(function(){
			formAction = "add";
			if( canAdd ) {
				$('#btn-save').text('Add');
				$('#btn-cancel').toggleClass('d-none');
			} else {
				$('#btn-save').addClass('d-none');
				$('#btn-cancel').toggleClass('d-none');
			}
			
			$('input[name=bank_name]').val('');

			selectedData = {};

			$('input[name=bank_name]').removeClass('border border-danger');
			$('.text-danger').remove();
		});

		$('.btn-archive').on('click', function(){
			const selectedId = $(this).data('id');
			const pageData = <?= json_encode($data) ?>;
			const bank = pageData.find((value) => value.id == selectedId );

			if ( bank ) {
				selectedData = bank;

				$('#label-delete-bank-name').text(bank.bank_name);
			}
		});
		
		$('.unarchive-btn').on('click', function(){
			const id = $(this).data('id');
			selectedID = id;

			const name = $(this).data('name');

			$('#label-unarchive-name').text( name );
		});

		$('#cancel-archive').on('click', function(){
			selectedData = {};
		})

		$('#btn-save').on('click', async function(){
			$(this).attr('disabled', 'true');
			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#bank-form').serializeArray();

			if( processErrorValidation(formData) ) {
				$(this).removeAttr('disabled');

				return;
			}

			let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});
			
			if ( formAction == 'add' )
				await axios.post(`${getApiUrl()}/bank/add`, transformedData, {
						headers: {
							'Content-Type': 'application/json',
							'Authorization': 'Bearer ' + userToken
						}
					}).then(res => {
						if( res.data.success ) {
							toastTopEnd("Success", res.data.message, "success");

							window.location = window.location
						} else {
							toastInfo("Can't Save", res.data.message, 'error');
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
			
			if ( formAction == 'update' )
				await axios.post(`${getApiUrl()}/bank/update/${selectedData.id}`, transformedData, {
						headers: {
							'Content-Type': 'application/json',
							'Authorization': 'Bearer ' + userToken
						}
					}).then(res => {
						if( res.data.success ) {
							toastTopEnd("Success", res.data.message, "success");

							window.location = window.location
						} else {
							toastInfo("Can't Save", res.data.message, 'error');
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

						console.error('Error fetching data:', error.response.data.errors);
					});
		});

		$('#process-archive').on('click', async function(){
			$(this).attr('disabled', 'true');
			// get user token
			const userToken = await getUserToken();
			
			let transformedData = {
				id: [ selectedData.id ]
			};

			await axios.post(`${getApiUrl()}/bank/archive`, transformedData, {
					headers: {
						'Content-Type': 'application/json',
						'Authorization': 'Bearer ' + userToken
					}
				}).then(res => {
					$('#delete-modal #cancel-archive').click();

					if( res.data.success ) {
						toastTopEnd("Success", res.data.message, "success");

						window.location = window.location
					} else {
						toastInfo("Can't Archive", res.data.message, 'warning');
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
		})

		$('#process-unarchive').on('click', async function(){
			$(this).attr('disabled', 'true');
			// get user token
			const userToken = await getUserToken();
			
			let transformedData = {
				id: [ selectedID ]
			};

			await axios.post(`${getApiUrl()}/bank/unarchive`, transformedData, {
					headers: {
						'Content-Type': 'application/json',
						'Authorization': 'Bearer ' + userToken
					}
				}).then(res => {
					$('#unarchive-modal #cancel-btn').click();

					if( res.data.success ) {
						toastTopEnd("Success", res.data.message, "success");

						window.location = window.location
					} else {
						toastInfo("Can't Unarchive", res.data.message, 'warning');
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
		})

		function processErrorValidation(formData) {
			const requiredFields = ['bank_name'];
			errors = [];

			formData.forEach(function(item) {
				if ( requiredFields.includes(item.name) ) {
					console.log(item.value);
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
				errors.forEach((element) => {
					$(`[name="${element.field_name}"]`).addClass('border border-danger');
					$(`[name="${element.field_name}"]`).after(`<p class="text-danger" style="font-size: 12px;">${element.message}</p>`)
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

		$('input').on('input', function(){
			$(this).removeClass('border border-danger');
			$('.text-danger').remove();
		})
	});
</script>
@endsection