 @extends('theme::layouts.app')

 @section('content')
 <?php
	$logo = '';

	if ($data)
		if ($data['logo'] != '')
			$logo = $data['logo'];
	?>
 <div style="padding: 20px;background: #ffffff;box-shadow: 0px 0px 3px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
 	<div class="row g-0 d-xxl-flex justify-content-between">
 		<div class="col-auto">
 			<h1 class="fw-normal" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;/*font-weight: bold;*/"><strong>Setting - School</strong></h1>
 		</div>
 	</div>
 	<div class="row" style="margin-top: 15px;">
 		<div class="col-xl-9 col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;margin-left: 15px;">
 			<div class="card">
 				<div class="card-body">
 					<form id="school-settings-form" enctype="multipart/form-data">
 						<div class="col" style="border-bottom: 1px solid #E8E8E8;">
 							<h1 style="font-family: Poppins, sans-serif;font-size: 24px;color: #3B3B3B;font-weight: 500;">School</h1>
 						</div>
 						<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start" style="margin-top: 30px;">
 							<label class="form-label" style="color: #636363;font-size: 14px;">Display Name</label>
 							<input type="text" name="name" value="{{ $data ? $data['name'] : '' }}" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">
 						</div>
 						<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start" style="margin-top: 10px;">
 							<label class="form-label" style="color: #636363;font-size: 14px;">Email (This is the reply email for all outgoing emails.)</label>
 							<input type="email" name="email" value="{{ $data ? $data['email'] : '' }}" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">
 						</div>

 						<div class="col" style="border-bottom: 1px solid #E8E8E8;margin-top: 50px;">
 							<h1 style="font-family: Poppins, sans-serif;font-size: 24px;color: #3B3B3B;font-weight: 500;">Invoice Settings</h1>
 						</div>
 						<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start" style="margin-top: 30px;">
 							<label class="form-label" style="color: #636363;font-size: 14px;">Company Logo</label>
 							<img id="imagePreview" src="{{ $logo != '' ? $data['logo'] : asset('themes/tailwind/images/default.jpeg') }}" alt="Selected Image" class="rounded-circle-object-fit mb-2" style="border-radius: 5%!important; border: 1px solid #c7c7c7;">
 							<input type="file" name="logo" id="logo">
 						</div>
 						<div class="row mt-3">
 							<div class="col">
 								<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Invoice Prefix</label>
 									<input type="text" name="invoice_prefix" value="{{ $data ? $data['invoice_prefix'] : '' }}" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">
 								</div>
 							</div>
 							<div class="col">
 								<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Invoice Number</label>
 									<input type="text" name="invoice_number" value="{{ $data ? $data['invoice_number'] : '' }}" class="only-number" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">
 								</div>
 							</div>
							 <div class="col">
 								<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Tax <span class="text-muted">(%)</span></label>
 									<input type="number" name="tax" placeholder="16.5" value="{{ $data ? $data['tax'] : '' }}" class="amount-input" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">
 								</div>
 							</div>
 						</div>

 						<label class="form-label" style="color: #636363;font-size: 14px;">From Address</label>
 						<div class="row mt-3">
 							<div class="col">
 								<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start">
 									<input type="text" name="address" value="{{ $data ? $data['address'] : '' }}" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Street Address</label>
 								</div>

 							</div>
 						</div>
 						<div class="row mt-3">
 							<div class="col">
 								<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start">
 									<input type="text" name="address_line_2" value="{{ $data ? $data['address_line_2'] : '' }}" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Address Line 2</label>
 								</div>
 							</div>
 						</div>
 						<div class="row mt-3">
 							<div class="col">
 								<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start">
 									<input type="text" name="city" value="{{ $data ? $data['city'] : '' }}" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">
 									<label class="form-label" style="color: #636363;font-size: 14px;">City</label>
 								</div>
 							</div>
 							<div class="col">
 								<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start">
 									<input type="text" name="state" value="{{ $data ? $data['state'] : '' }}" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">
 									<label class="form-label" style="color: #636363;font-size: 14px;">State / Province / Region</label>
 								</div>
 							</div>
 						</div>
 						<div class="row mt-3">
 							<div class="col">
 								<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start">
 									<input type="text" name="zip" value="{{ $data ? $data['zip'] : '' }}" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">
 									<label class="form-label" style="color: #636363;font-size: 14px;">ZIP / POSTAL CODE</label>
 								</div>
 							</div>
 							<div class="col">
 								<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start">
 									<input type="text" name="country" value="{{ $data ? $data['country'] : '' }}" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Country</label>
 								</div>
 							</div>
 						</div>
 						<div class="row mt-3">
 							<div class="col">
 								<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Contact Phone Number</label>
 									<input type="text" name="contact_number" value="{{ $data ? $data['contact_number'] : '' }}" class="phone-input" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">
 								</div>
 							</div>
 						</div>
 						<div class="row mt-3">
 							<div class="col">
 								<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Website</label>
 									<input type="text" name="school_website" value="{{ $data ? $data['school_website'] : '' }}" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">
 								</div>
 							</div>
 						</div>

 						<div class="row mt-3">
 							<div class="col">
 								<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Remarks</label>
 									<textarea name="remarks" style="width: 100%;height: 48px;font-family: Poppins, sans-serif;color: #3B3B3B;font-size: 14px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;border-bottom-style: none;">{{ $data ? $data['remarks'] : '' }}</textarea>
 								</div>
 							</div>
 						</div>

 						<div class="col" style="border-bottom: 1px solid #E8E8E8;margin-top: 50px;">
 							<h1 style="font-family: Poppins, sans-serif;font-size: 24px;color: #3B3B3B;font-weight: 500;">Check-in</h1>
 						</div>
 						<div class="d-xl-flex flex-column justify-content-xl-center align-items-xl-start" style="margin-top: 10px;">
 							<label class="form-label" style="color: #636363;font-size: 14px;">Check-in Time (mins) (Before or after the course starts)</label>
 							<select name="check_in_time" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" data-role="tagsinput" data-class="label-info">
 								<option value="00:10" data-value="00:10:00">10</option>
 								<option value="00:20" data-value="00:20:00">20</option>
 								<option value="00:30" data-value="00:30:00">30</option>
 								<option value="00:40" data-value="00:40:00">40</option>
 								<option value="00:50" data-value="00:50:00">50</option>
 								<option value="00:60" data-value="00:60:00">60</option>
 							</select>
 						</div>
 						<button id="save-btn" class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-top: 15px;">Save</button>
 					</form>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
 <a href="{{ route('wave.admin.logout') }}" id="btn-logout" class="btn btn-primary d-none" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Logout</a>
 <!-- Modal for Delete Confirmation -->
 <div class="modal fade" role="dialog" tabindex="-1" id="success-modal">
 	<div class="modal-dialog modal-dialog-centered" role="document">
 		<div class="modal-content">
 			<div class="modal-body">
 				<p style="color: #FF4550;font-size: 20px;font-family: Poppins, sans-serif;">The school settings have been updated.</p>
 				<p style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">
					Please log in again to see the changes take effect.
 				</p>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
 				<button id="cancel-btn" class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Later</button>
 				<a href="{{ route('wave.admin.logout') }}" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Okay</a>
 			</div>
 		</div>
 	</div>
 </div>
 @endsection

 @section('script')
 <script type="text/javascript">
 	$(function() {
 		var pageData = <?= json_encode($data) ?>

 		$(`[data-value="${ pageData ? pageData.check_in_time : '' }"]`).attr('selected', true);

		$('#cancel-btn').on('click', function(){
			window.location = window.location
		});

 		$("#save-btn").on('click', async function() {

 			$(this).attr('disabled', 'true');
 			// get user token
 			const userToken = getUserToken();

 			const formData = $('#school-settings-form').serializeArray();

 			let transformedData = new FormData()

 			formData.forEach(function(item) {
 				transformedData.append(item.name, item.value)
 			});

 			const logo = document.getElementById('logo').files[0];

 			if (logo)
 				transformedData.append('logo', logo)

 			const data = <?= json_encode($data) ?>;

 			if (!data)
 				await axios.post(`${getApiUrl()}/school/add`, transformedData, {
 					headers: {
 						'Authorization': 'Bearer ' + userToken,
 						'content-type': 'multipart/form-data'
 					}
 				}).then(response => {
					$(this).removeAttr('disabled');

					if( response.data.success ) {
						toastTopEnd("Success", response.data.message, "success");

						const tempData = response.data.response;
						axios.post(`refresh-settings`, tempData, {
							headers: {
								'Content-Type': 'application/json',
							}
						}).then(res2 => {
							console.log(res2.data)

							if ( res2.data.success ) {
								window.location = window.location
							}
						});
					} else {
						toastTopEnd("Warning", res.data.message, "warning");
					}
					
					
					// Swal.fire({
					// 	title: 'The school settings have been updated.',
					// 	text: 'Please log in again to see the changes take effect.',
					// 	icon: 'success',
					// 	showCancelButton: true,
					// 	confirmButtonColor: '#3085d6',
					// 	cancelButtonColor: '#d33',
					// 	confirmButtonText: 'Yes, Log me out'
					// }).then((result) => {
					// 	if (result.isConfirmed) {
					// 		window.location.href = '{{ route("wave.admin.logout") }}';
					// 	}
					// });
					// $("#success-modal").modal('show');
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
 			else
 				await axios.post(`${getApiUrl()}/school/update/${data.id}`, transformedData, {
 					headers: {
 						'Authorization': 'Bearer ' + userToken,
 						'content-type': 'multipart/form-data'
 					}
 				}).then(res => {
					$(this).removeAttr('disabled');

					if( res.data.success ) {
						toastTopEnd("Success", res.data.message, "success");

						const tempData = res.data.response;
						axios.post(`refresh-settings`, tempData, {
							headers: {
								'Content-Type': 'application/json',
							}
						}).then(res2 => {
							console.log(res2.data)

							if ( res2.data.success ) {
								window.location = window.location
							}
						});
					} else {
						toastTopEnd("Warning", res.data.message, "warning");
					}
					
					// Swal.fire({
					// 	title: 'The school settings have been updated.',
					// 	text: 'Please log in again to see the changes take effect.',
					// 	icon: 'success',
					// 	showCancelButton: true,
					// 	confirmButtonColor: '#3085d6',
					// 	cancelButtonColor: '#d33',
					// 	confirmButtonText: 'Yes, Log me out'
					// }).then((result) => {
					// 	if (result.isConfirmed) {
					// 		window.location.href = '{{ route("wave.admin.logout") }}';
					// 	}
					// });
 				})
 				.catch(error => {
					
 					$(this).removeAttr('disabled');
 					// Handle errors

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

 		$("#logo").change(function() {
 			const input = $(this)[0].files[0];
 			var preview = $("#imagePreview");

 			var reader = new FileReader();

 			reader.onload = function(e) {
 				preview.attr('src', e.target.result);
 			};

 			// Read the file as a data URL
 			reader.readAsDataURL(input);
 		});
 	});
 </script>
 @endsection