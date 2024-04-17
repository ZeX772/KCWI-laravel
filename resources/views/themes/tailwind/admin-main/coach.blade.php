@extends('theme::layouts.app')


@section('content')
<div style="padding: 20px;background: #ffffff;box-shadow: 0px 0px 3px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
 	<div class="row g-0 d-xxl-flex justify-content-between">
 		<div class="col-auto">
 			<h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;font-weight: bold;">Coach Management</h1>
 		</div>
 		<div class="col-auto">
			<button id="add-coach_btn" class="btn btn-primary text-nowrap" type="button" style="display: flex; align-items: center;background: #4A5C7A;box-shadow: 0px 4px rgb(40,51,68);border-style: none;border-bottom-style: none;border-bottom-color: rgb(29,44,88);" data-bs-toggle="modal" data-bs-target="#coach-modal">
				<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="margin-right: 3px;">
 					<path d="M12 4C11.4477 4 11 4.44772 11 5V11H5C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13H11V19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19V13H19C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11H13V5C13 4.44772 12.5523 4 12 4Z" fill="currentColor"></path>
 				</svg>Add Coach
			</button>
		</div>
 	</div>
 	<div class="row" style="margin-top: 15px;">
		<!-- Coach List | Left - Table Section -->
 		<div class="col-xxl-6" style="background: #ffffff;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
 			<div class="tab-content" style="padding: 15px;">
 				<form class="d-xl-flex align-items-xl-center w-100 pb-4" style="width: 100vh;">
 					<button class="btn btn-primary" type="button" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px; width:50px; height: 45px; background-color: #e8e8e8; border-style: none;">
						<img src="{{ asset('themes/tailwind/images/clipboard-image-20.png') }}" style="width: 20px;">
					</button>
					<input class="form-control" type="search" id="coach-search_input" placeholder="Search Coach" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px; background: #e8e8e8; border-style: none; height: 45px;" />
 				</form>
 				<div class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
 					<div class="table-responsive" style="height: auto;max-height: none;">
 						<table class="table table-hover" id="coach-table" style="width: 100%;">
 							<thead>
 								<tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">NAME</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">EMAIL</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">DOB</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">PHONE</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: center;"></th>
 								</tr>
 							</thead>
 							<tbody style="height: auto;">
								@foreach($data as $coach)
									<tr style="border-bottom: 2px solid #E8E8E8;" data-id="{{ $coach['id'] }}">
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $coach['name'] }}</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $coach['email'] }}</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $coach['coach_details']['dob'] ?? '' }}</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $coach['coach_details']['phone'] ?? '' }}</td>
										<td>
											<div class="d-flex align-items-center gap-2">
												<a href="{{ route('wave.user.admin-main.coach-view', $coach['id']) }}" class="d-flex align-items-center justify-content-center cursor-pointer" style="margin: 0 !important; height: 20px; font-size: 13px;">
													<!-- <x-svg-icon icon="view" width="20" height="20" /> -->
													<i class="fa-solid fa-up-right-and-down-left-from-center"></i>
												</a>
												@if( $coach['status'] != 'archived' )
													<div class="delete-btn cursor-pointer" data-id="{{ $coach['id'] }}" data-name="{{ $coach['name'] }}" data-bs-toggle="modal" data-bs-target="#delete-modal" style="font-size: 13px;">
														<i class="fa-solid fa-trash"></i>
													</div>
												@endif
												@if( isSuperAdmin() && $coach['status'] == 'archived' )
													<div class="unarchive-btn cursor-pointer" data-id="{{ $coach['id'] }}" data-name="{{ $coach['name'] }}" data-bs-toggle="modal" data-bs-target="#unarchive-modal" style="font-size: 13px;">
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
 		</div>
		<!-- Coach Details | Right Section -->
 		<div class="col d-xxl-flex flex-column" style="border: 1px solid rgb(232,232,232);border-top-right-radius: 10px;border-bottom-right-radius: 11px;padding-top: 20px;">
 			<div class="d-xxl-flex">
 				<div class="w-25 d-flex flex-column align-items-center pt-4">
					<div class="main-page_avatar-container">
						<img id="main-page_avatar" src="{{ asset('themes/tailwind/images/profile.png') }}">
					</div>
 					<h1 id="detail-full_name" style="font-size: 18px;font-family: Poppins, sans-serif;color: #3B3B3B;text-align: center;padding-top: 10px;">-</h1>
 				</div>
 				<div class="w-100 p-3">
 					<div class="col d-xxl-flex justify-content-between align-items-xxl-center mb-4">
 						<h1 class="fw-semibold text-nowrap" style="font-size: 15px;font-family: Poppins, sans-serif;color: #3B3B3B;text-align: center;">Personal Information
 							<button id="edit-profile_btn" class="btn btn-primary d-none" type="button" style="width: auto;color: #3B3B3B;background: rgba(78,115,223,0);padding: 0px;border-style: none;" data-bs-toggle="modal" data-bs-target="#coach-modal">
								<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil">
 									<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
 								</svg>
							</button>
 						</h1>
 						<button id="btn-take_leave" class="btn btn-primary fw-semibold d-none" type="button" style="display: flex; align-items: center;height: 30px; width: auto; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255,255,255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0,0,0,0.25); line-height: 30px;" data-bs-toggle="modal" data-bs-target="#take-leave_modal">Take Leave</button>
 					</div>
					<div class="row mb-3">
						<div class="col-4">
							<div>
								<h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">USER NAME</h1>
								<h1 id="detail-username" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
							</div>
						</div>
						<div class="col-4">
							<div>
								<h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">DATE OF BIRTH</h1>
								<h1 id="detail-dob" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
							</div>
						</div>
						<!-- <div class="col">
							<div>
								<h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">GENDER</h1>
								<h1 id="detail-gender" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
							</div>
						</div> -->
						<div class="col-4">
							<div>
								<h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">HKID</h1>
								<h1 id="detail-hkid" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-8">
							<div>
								<h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">RESIDENTIAL ADDRESS</h1>
								<h1 id="detail-address" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
							</div>
						</div>
						<div class="col-4">
							<div>
								<h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">RESPONSE COURSE</h1>
								<h1 id="detail-response_course" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-8">
							<div>
								<h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">EMAIL</h1>
								<h1 id="detail-email" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
							</div>
						</div>
						<div class="col-4">
							<div>
								<h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">PHONE</h1>
								<h1 id="detail-phone" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div>
								<h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">REMARKS</h1>
								<h1 id="detail-remarks" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
							</div>
						</div>
					</div>
 				</div>
 			</div>
			<div class="d-xxl-flex">
				<div class="w-100 p-3">
					<div class="row mb-3">
						<div class="col-4">
							<div>
								<h5 class="additional-details_title">BANK ACC(S)</h5>
								<div class="bank-accounts_container">
									-
								</div>
							</div>
						</div>
						<div class="col-4">
							<div>
								<h5 class="additional-details_title">PAY RATE(S)</h5>
								<div class="pay-rates_container">
									-
								</div>
							</div>
						</div>
						<div class="col-4">
							<div>
								<h5 class="additional-details_title">NOT AVAILABLE</h5>
								<div class="availabilities_container">
									-
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
 			<!-- <div class="mt-5">
 				<ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start gap-4" role="tablist" style="border-style: none; border-left-style: none; border-bottom: 2px solid #F5F5F5;">
 					<li class="nav-item" role="presentation" style="border-left-style: none;">
						<a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1" style="border-style: none; border-left-style: none; font-size: 14px; font-family: Poppins, sans-serif; font-weight: 600; padding: 0 0 6px 0;">BASIC INFORMATION</a>
					</li>
 					<li class="nav-item" role="presentation">
						<a class="nav-link" role="tab" href="{{ route('wave.user.admin-main.coach-history') }}" style="border-style: none; border-left-style: none; padding: 0 0 6px 0; font-size: 14px; font-weight: 400;">TEACHING HISTORY</a>
					</li>
 					<li class="nav-item" role="presentation">
						<a class="nav-link" role="tab" href="{{ route('wave.user.admin-main.coach-comment') }}" style="border-style: none; border-left-style: none; padding: 0 0 6px 0; font-size: 14px; font-weight: 400;">COACH COMMENT</a>
					</li>
 				</ul>

 				<div class="tab-content">
 					<div id="tab-1" class="tab-pane active" role="tabpanel">
 						<div class="col" style="margin-top: 20px; ">
						 	<h1 class="text-nowrap mb-2" style="display: flex; align-items: center;color: #3B3B3B;font-size: 20px;font-family: Poppins, sans-serif;">
								Coach Contact
								<span class="ml-2">
									<svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg">
										<path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
									</svg>
								</span>
							</h1>
 							<div class="d-xxl-flex justify-content-between align-items-xxl-center" style="height: 40px;background: #F5F5F5;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding: 7px 20px 7px 20px; display: grid !important; grid-template-columns: 0.7fr 1fr 60px;">
 								<h1 style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;">Coach Contact.pdf</h1>
 								<h1 style="display: flex; align-items: center;color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;">
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-calendar" style="margin-right: 10px;">
											<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
										</svg>
									</span>
									20/11/2021
								</h1>
 								<h1 style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif; display: flex; justify-content: flex-end;">
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye">
											<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
											<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
										</svg>
									</span>
								</h1>
 							</div>
 						</div>
 						<div class="col" style="margin-top: 20px;">
 							<h1 class="text-nowrap mb-2" style="display: flex; align-items: center;color: #3B3B3B;font-size: 20px;font-family: Poppins, sans-serif;">
								Other Attachment (e.g. Certificate)
								<span class="ml-2">
									<svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg">
										<path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
									</svg>
								</span>
							</h1>
 							<div class="d-xxl-flex justify-content-between align-items-xxl-center" style="height: 40px;background: #F5F5F5;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding: 7px 20px 7px 20px; display: grid !important; grid-template-columns: 0.7fr 1fr 60px;">
 								<h1 style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;opacity: 0.50;">No File</h1>
 								<h1 class="text-nowrap" style="display: flex; align-items: center;color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;opacity: 0.50;">
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-calendar" style="margin-right: 10px;">
											<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
										</svg>
									</span>
									--/--/--
								</h1>
 								<h1 style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif; display: flex; justify-content: flex-end;">
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye" style="opacity: 0.50;">
											<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
											<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
										</svg>
									</span>
								</h1>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div> -->
 		</div>
 	</div>
</div>

<!-- Take Leave Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="take-leave_modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="col d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 20px;padding-top: 10px;padding-bottom: 0px;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;font-family: Poppins, sans-serif;">Take leave</h4>
 			</div>
 			<div class="modal-body">
				<form id="modal-form" enctype="multipart/form-data">
					<div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
						<x-form-input 
							label="Start Date" 
							type="date" 
							name="start_date"
							id="start_date"
							isRequired=true
						/>
						<x-form-input 
							label="End Date" 
							type="date" 
							name="end_date"
							id="end_date"
							isRequired=true
						/>
					</div>
					<div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
						<div class="form-group w-100">
							<label class="form-label" style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;">UPLOAD ATTACHMENTS</label>
							<input name="attachment" class="form-control" type="file">
						</div>
					</div>
					<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
 						<form class="form-inline">
 							<div class="form-group">
								<label class="form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Remark <span class="text-danger">*</span></label>
								<textarea name="reason_for_leave" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
							</div>
 						</form>
 					</div>
				</form>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
			 	<x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
				<x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target=""/>
			</div>
 		</div>
 	</div>
</div>

<!-- Add/Update Coach Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="coach-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="col d-xxl-flex justify-content-between align-items-xxl-center p-4 pr-5">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Personal Information</h4>
				<div class="position-relative d-flex justify-content-center" style="width: 130px; height: 130px;">
				 	<img id="modal-avatar" src="{{ asset('themes/tailwind/images/profile.png') }}" style="width: 130px;">
                    <span class="profile-image-edit_btn">
                        <x-svg-icon icon="edit" />
                    </span>
                    <input type="file" class="d-none" id="avatar-field">
                </div>
 			</div>
 			<div class="modal-body">
				<!-- Step 1 -->
				<div class="col steps" style="width: 100%;" id="step-1">
					<form id="modal-form">
						<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline" style="width: 100%;margin-right: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Last Name <span class="text-danger">*</span></label>
									<input name="last_name" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
								</div>
							</div>
							<div class="form-inline" style="width: 100%;margin-left: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">First Name <span class="text-danger">*</span></label>
									<input name="first_name" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
								</div>
							</div>
						</div>
						<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline" style="width: 100%;margin-right: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">User Name <span class="text-danger">*</span></label>
									<input name="username" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
								</div>
							</div>
							<div class="form-inline" style="width: 100%;margin-left: 10px;">
								<div class="form-group">
									<label id="field-password_label" class="form-label" style="color: #636363;font-size: 14px;">Password <span class="text-danger">*</span></label>
									<input min='6' name="password" class="form-control passwordInput" type="password" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
								</div>
							</div>
						</div>
						<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline" style="width: 100%;margin-right: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">HKID <span class="text-danger">*</span></label>
									<input name="hkid" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
								</div>
							</div>
						</div>
						<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline" style="width: 100%;margin-right: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Phone <span class="text-danger">*</span></label>
									<input name="phone" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
								</div>
							</div>
							<div class="form-inline" style="width: 100%;margin-left: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Email <span class="text-danger">*</span></label>
									<input name="email" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
								</div>
							</div>
						</div>
						<div class="container d-xxl-flex justify-content-between align-items-xxl-center mb-4" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline" style="width: 100%;margin-right: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Date of Birth <span class="text-danger">*</span></label>
									<div class="input-group">
										<span class="input-group-text" style="background: #F5F5F5;border-style: none;">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
												<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
											</svg>
										</span>
										<input name="dob" class="form-control" type="date" style="background: #F5F5F5;border-style: none;">
									</div>
								</div>
							</div>
						</div>
						<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 0px;">
							<div class="form-inline" style="width: 100%;margin-right: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Residential Address <span class="text-danger">*</span></label>
									<input name="address" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
								</div>
							</div>
						</div>
						<div class="container d-xxl-flex justify-content-between align-items-xxl-center mb-4" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline" style="width: 100%;margin-right: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Start Date <span class="text-danger">*</span></label>
									<div class="input-group">
										<span class="input-group-text" style="background: #F5F5F5;border-style: none;">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
												<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
											</svg>
										</span>
										<input name="start_date" class="form-control" type="date" style="background: #F5F5F5;border-style: none;">
									</div>
								</div>
							</div>
							<div class="form-inline" style="width: 100%;margin-right: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">End Date</label>
									<div class="input-group">
										<span class="input-group-text" style="background: #F5F5F5;border-style: none;">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
												<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
											</svg>
										</span>
										<input name="end_date" class="form-control" type="date" style="background: #F5F5F5;border-style: none;">
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<form class="form-inline">
								<div class="form-group" style="margin-bottom: 20px;">
									<label class="form-label" style="color: #636363;font-size: 14px;">Response Course (Course Category)</label>
									<div class="d-xxl-flex justify-content-around align-items-xxl-center">
										<div class="col">
											<div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
												<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">ASA</h1>
												<input type="checkbox">
											</div>
										</div>
										<div class="col">
											<div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
												<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Club</h1>
												<input type="checkbox">
											</div>
										</div>
										<div class="col">
											<div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
												<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Group</h1>
												<input type="checkbox">
											</div>
										</div>
									</div>
									<div class="d-xxl-flex justify-content-around align-items-xxl-center" style="margin-top: 10px;">
										<div class="col">
											<div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
												<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Private</h1>
												<input type="checkbox">
											</div>
										</div>
										<div class="col">
											<div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
												<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Run</h1>
												<input type="checkbox">
											</div>
										</div>
										<div class="col">
											<div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
												<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Swim Team</h1>
												<input type="checkbox">
											</div>
										</div>
									</div>
								</div>
							</form>
						</div> -->
						<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Remarks</label>
									<textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- Step 2 -->
				<div class="col steps d-none" style="width: 100%;" id="step-2">
					<form id="modal-form">
						<div class="container" style="padding: 0px;color: #636363;margin-top: 0px;">
							<div class="form-inline" style="width: 100%;margin-right: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Payment Method <span class="text-danger">*</span></label>
									<select name="payment_method" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
										<option value="" hidden>Select Payment Method</option>
										<option value="bank_transfer">Bank Transfer</option>
										<option value="cash">Cash</option>
									</select>
								</div>
							</div>
						</div>
						<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline" style="width: 100%;margin-right: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Payment Type <span class="text-danger">*</span></label>
									<select name="payment_type" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;width: 340px;">
										<option value="" hidden>Select Payment Type</option>
										<option value="monthly">Monthly</option>
										<option value="weekly">Weekly</option>
										<option value="daily">Daily</option>
									</select>
								</div>
							</div>
							<div class="form-inline" style="width: 100%;margin-left: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Rate per payment type <span class="text-danger">*</span></label>
									<input name="monthly_rate" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
								</div>
							</div>
						</div>
					</form>
					<div class="container bank-container" style="padding: 0px;color: #636363;margin-top: 20px;">
						<label class="form-label" style="color: #636363;font-size: 14px;">Bank Account(s) <span class="text-danger">*</span></label>
						<form id="modal-form_bank-0">
							<div class="card mb-2 bank-0">
								<div class="card-body">
									<div class="d-xxl-flex justify-content-between align-items-xxl-center mb-4">
										<div class="form-inline" style="width: 100%;">
											<div class="form-group">
												<label class="form-label" style="color: #636363;font-size: 14px;">Bank Name <span class="text-danger">*</span></label>
												<select name="bank_id" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
													<option value="" hidden>Select Bank Name</option>
													@foreach($banks as $bank)
														<option value="{{ $bank['id'] }}">{{ $bank['bank_name'] }}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<div class="d-xxl-flex justify-content-between align-items-xxl-center gap-3 mb-4">
										<div class="form-inline" style="width: 100%;">
											<div class="form-group">
												<label class="form-label" style="color: #636363;font-size: 14px;">Bank Account <span class="text-danger">*</span></label>
												<input name="bank_account" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
											</div>
										</div>
										<div class="form-inline" style="width: 100%;">
											<div class="form-group">
												<label class="form-label" style="color: #636363;font-size: 14px;">Bank account Name <span class="text-danger">*</span></label>
												<input name="bank_account_name" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
											</div>
										</div>
									</div>
									<div class="d-xxl-flex justify-content-between align-items-xxl-center gap-3 mb-4">
										<div class="form-inline" style="width: 100%;">
											<div class="d-flex align-items-center gap-2">
												<input name="is_default" type="checkbox" id="">
												<label class="form-label" style="color: #636363;font-size: 14px; margin: 0;">Primary</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="container" style="margin-top: 10px; padding-left: 0px;">
						<div class="row">
							<div class="col-auto">
								<button id="modal-form-add_bank" class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap show-characteristic_container" type="button" style="height: 30px; padding: 5px 12px; padding-top: 0px; padding-bottom: 0px; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255, 255, 255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.25);">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 8px;">
										<path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
									</svg>
									Add Bank Account
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Step 3 -->
				<div class="col steps d-none" style="width: 100%;" id="step-3">
					<div class="container availability-container" style="padding: 0px;color: #636363;margin-top: 20px;">
						<label class="form-label" style="color: #636363;font-size: 14px;">Availability Rules</label>
						<p class="form-label" style="color: #636363;font-size: 14px;">Add rules for <b>unavailable</b> period(s)</p>
						<form id="modal-form_availability-0">
							<div class="card mb-2 availability-0">
								<div class="card-body">
									<div class="d-flex justify-content-end">
										<span class="cursor-pointer modal-form-remove_availability" data-index="0">x</span>
									</div>
									<div class="d-xxl-flex justify-content-between align-items-xxl-center mb-4">
										<div class="form-inline" style="width: 100%;">
											<div class="form-group">
												<label class="form-label" style="color: #636363;font-size: 14px;">Type</label>
												<select name="availability_type" data-index="0" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
													<option value="" hidden>Select Type</option>
													<option value="time">Time</option>
													<option value="day">Day</option>
													<option value="month">Month</option>
													<option value="year">Year</option>
													<option value="custom_date">Custom Date</option>
												</select>
											</div>
										</div>
									</div>
									<div class="time-type">
										<div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
											<x-form-input 
												label="Start" 
												type="time" 
												name="availability_start"
												id="availability_start"
												placeholder="{{ formatYear(now()) }}"
												isRequired=false
											/>

											<x-form-input 
												label="End" 
												type="time" 
												name="availability_end"
												id="availability_end"
												placeholder="{{ formatYear(now()) }}"
												isRequired=false
											/>
										</div>
									</div>
									<div class="day-type d-none">
										<div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
											<x-form-select
												label="Start" 
												name="availability_start"
												id="availability_start"
												isRequired="false"
											>
												<option value="" hidden>--Select--</option>
												<option value="moday">Monday</option>
												<option value="tuesday">Tuesday</option>
												<option value="wednesday">Wednesday</option>
												<option value="thursday">Thursday</option>
												<option value="friday">Friday</option>
												<option value="saturday">Saturday</option>
												<option value="sunday">Sunday</option>
											</x-form-select>

											<x-form-select
												label="End" 
												name="availability_end"
												id="availability_end"
												isRequired="false"
											>
												<option value="" hidden>--Select--</option>
												<option value="moday">Monday</option>
												<option value="tuesday">Tuesday</option>
												<option value="wednesday">Wednesday</option>
												<option value="thursday">Thursday</option>
												<option value="friday">Friday</option>
												<option value="saturday">Saturday</option>
												<option value="sunday">Sunday</option>
											</x-form-select>
										</div>
									</div>
									<div class="month-type d-none">
										<div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
											<x-form-select
												label="Start" 
												name="availability_start"
												id="availability_start"
												isRequired="false"
											>
												<option value="" hidden>--Select--</option>
												<option value="january">January</option>
												<option value="february">February</option>
												<option value="march">March</option>
												<option value="april">April</option>
												<option value="may">May</option>
												<option value="june">June</option>
												<option value="july">July</option>
												<option value="august">August</option>
												<option value="september">September</option>
												<option value="october">October</option>
												<option value="november">November</option>
												<option value="december">December</option>
											</x-form-select>
											<x-form-select
												label="End" 
												name="availability_end"
												id="availability_end"
												isRequired="false"
											>
												<option value="" hidden>--Select--</option>
												<option value="january">January</option>
												<option value="february">February</option>
												<option value="march">March</option>
												<option value="april">April</option>
												<option value="may">May</option>
												<option value="june">June</option>
												<option value="july">July</option>
												<option value="august">August</option>
												<option value="september">September</option>
												<option value="october">October</option>
												<option value="november">November</option>
												<option value="december">December</option>
											</x-form-select>
										</div>
									</div>
									<div class="year-type d-none">
										<div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
											<x-form-input 
												label="Start" 
												type="number" 
												name="availability_start"
												id="availability_start"
												placeholder="{{ formatYear(now()) }}"
												isRequired=false
											/>

											<x-form-input 
												label="End" 
												type="number" 
												name="availability_end"
												id="availability_end"
												placeholder="{{ formatYear(now()) }}"
												isRequired=false
											/>
										</div>
									</div>
									<div class="custom-date-type d-none">
										<div class="d-xxl-flex justify-content-between align-items-xxl-center gap-3 mb-4">
											<div class="form-inline" style="width: 100%;margin-right: 10px;">
												<div class="form-group">
													<label class="form-label" style="color: #636363;font-size: 14px;">Start Date</label>
													<div class="input-group">
														<span class="input-group-text" style="background: #F5F5F5;border-style: none;">
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
																<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
															</svg>
														</span>
														<input name="from_date" class="form-control" type="date" data-index="0" style="background: #F5F5F5;border-style: none;">
													</div>
												</div>
											</div>
											<div class="form-inline" style="width: 100%;margin-right: 10px;">
												<div class="form-group">
													<label class="form-label" style="color: #636363;font-size: 14px;">End Date</label>
													<div class="input-group">
														<span class="input-group-text" style="background: #F5F5F5;border-style: none;">
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
																<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
															</svg>
														</span>
														<input name="to_date" class="form-control" type="date" data-index="0" style="background: #F5F5F5;border-style: none;">
													</div>
												</div>
											</div>
										</div>
										<div class="d-xxl-flex justify-content-between align-items-xxl-center gap-3 mb-4">
											<div class="form-inline" style="width: 100%;margin-right: 10px;">
												<div class="form-group">
													<label class="form-label" style="color: #636363;font-size: 14px;">Start Time</label>
													<div class="input-group">
														<span class="input-group-text" style="background: #F5F5F5;border-style: none;">
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
																<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
															</svg>
														</span>
														<input name="from_time" class="form-control" data-index="0" type="time" style="background: #F5F5F5;border-style: none;">
													</div>
												</div>
											</div>
											<div class="form-inline" style="width: 100%;margin-right: 10px;">
												<div class="form-group">
													<label class="form-label" style="color: #636363;font-size: 14px;">End Time</label>
													<div class="input-group">
														<span class="input-group-text" style="background: #F5F5F5;border-style: none;">
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
																<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
															</svg>
														</span>
														<input name="to_time" class="form-control" data-index="0" type="time" style="background: #F5F5F5;border-style: none;">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="container" style="margin-top: 10px; padding-left: 0px;">
						<div class="row">
							<div class="col-auto">
								<button id="modal-form-add_availability" class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap show-characteristic_container" type="button" style="height: 30px; padding: 5px 12px; padding-top: 0px; padding-bottom: 0px; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255, 255, 255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.25);">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 8px;">
										<path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
									</svg>
									Add Rule
								</button>
							</div>
						</div>
					</div>
				</div>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button id="cancel-btn" class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button id="prev-btn" class="btn btn-light fw-semibold d-none" type="button" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Previous</button>
				<button id="next-btn" class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Next</button>
				<button id="save-btn" class="btn btn-primary d-none" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
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
					Are you sure you want to archive <b style="text-decoration: underline;" id="label-delete-coach-name">[coach name]</b>?
					<p>Please make sure payment of salary is settle and unlinked before archiving it.</p>
				</p>
			</div>
			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button id="cancel-btn" class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button id="process-archive" class="btn btn-primary" type="button" data-bs-dismiss="myModal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Yes</button>
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
					Are you sure you want to unarchive <b style="text-decoration: underline;" id="label-unarchive-coach-name">[coach name]</b>?
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

<style>
	.additional-details_title {
		color: #4A5C7A;
		font-weight: 700;
		font-size: 15px;
	}
	
	.additional-items_title {
		font-size: 14px;
		font-weight: 600;
	}

	.additional-items_subtitle {
		font-size: 14px;
	}
</style>

@section('script')
<script type="text/javascript">
 	var mSortingString = [];
 	var disableSortingColumn = 4;
	var defaultStep = 1;
	var maxStep = 3;
	var currentStep = 1;
	var bankAccounts = [{
		"bank_id": '',
		"bank_account": '',
		"bank_account_name": '',
		"is_default": 0,
	}];
	// var availabilityRules = [{
	// 	"from_date": '',
	// 	"to_date": '',
	// 	"from_time": '',
	// 	"to_time": '',
	// 	"availability_type": 'time',
	// 	"availability_start": '',
	// 	"availability_end": ''
	// }];
	var availabilityRules = [];
	var errors = [];
	var formAction = 'add';
	var selectedData = {};

 	mSortingString.push({
 		"bSortable": false,
 		"aTargets": [disableSortingColumn]
 	});

	imageData = "";

 	$(function() {
		
 		var table = $('#coach-table').DataTable({
 			"paging": true,
 			"ordering": true,
 			"info": true,
 			"aaSorting": [],
 			"orderMulti": true,
 			"aoColumnDefs": mSortingString,
 			"columnDefs": [{

 			}]
 		});

		$('#coach-search_input').on('keyup', function() {
            var searchTerm = $(this).val();
            
            table.search(searchTerm).draw();
        });

		$('#coach-table').on('click', 'tr', function(){
			const userID = $(this).data('id');
			if(! userID )
				return;

			const pageData = <?= json_encode($data) ?>;

			const coach = pageData.find((data) => data.id == userID);
			
			selectedData = coach;

			$('#detail-full_name').text(coach.name);
			$('#detail-username').text(coach.username);
			$('#detail-email').text(coach.email);
			$('#detail-dob').text(coach.coach_details?.dob ?? '');
			$('#detail-hkid').text(coach.coach_details?.hkid ?? '');
			$('#detail-address').text(coach.coach_details?.address ?? '');
			$('#detail-phone').text(coach.coach_details?.phone ?? '');
			$('#main-page_avatar').attr('src', coach.image_path);
			$('#detail-remarks').text(coach.coach_details.remarks ?? '-');
			
			// Bank Accounts
			$('.bank-accounts_container').empty();
			let bankItems = "";
			coach.coach_bank_details.forEach(bankDetail => {
				bankItems += `<div class="mb-2">
							<p class="additional-items_title fw-bold">${bankDetail.bank.bank_name}</p>
							<p class="additional-items_subtitle">${bankDetail.bank_account_name}</p>
							<p class="additional-items_subtitle">${bankDetail.bank_account}</p>
						</div>`;
			});
			$('.bank-accounts_container').append(bankItems);

			// Pay Rates
			$('.pay-rates_container').empty();
			$('.pay-rates_container').append(`<div>
					<p class="additional-items_title ">All Courses</p>
					<p class="additional-items_subtitle">(${coach.coach_details.payment_type})</p>
					<p class="additional-items_subtitle">${'$'+coach.coach_details.monthly_rate}</p>
				</div>`);
			
			// Availabilities
			$('.availabilities_container').empty();
			let coachAvailabilityItem = '';
			coach.coach_availability.forEach(coachAvailability => {
				let value = coachAvailability.availability_type != 'custom_date'
					? `${coachAvailability.availability_start ?? ""} - ${coachAvailability.availability_end ?? ""}`
					: `${coachAvailability.from_date ?? ""} ${coachAvailability.from_time ?? ""} - ${coachAvailability.to_date ?? ""} ${coachAvailability.to_time ?? ""}`;

				coachAvailabilityItem += `<div class="mb-2">
										<p class="additional-items_title ">${formatString(coachAvailability.availability_type)}</p>
										<p class="additional-items_subtitle">${value}</p>
									</div>`;
			});
			$('.availabilities_container').append(coachAvailabilityItem);
			
			$('#edit-profile_btn').removeClass('d-none');
			$('#btn-take_leave').removeClass('d-none');
			
		});

		$('.delete-btn').on('click', function(){
			const userID = $(this).data('id');
			const name = $(this).data('name');
			
			const pageData = <?= json_encode($data) ?>;

			const coach = pageData.find((data) => data.id == userID);
			
			selectedData = coach;
			
			$('#label-delete-coach-name').text( name );
		});

		$('.unarchive-btn').on('click', function(){
			const userID = $(this).data('id');
			const name = $(this).data('name');

			const pageData = <?= json_encode($data) ?>;

			const coach = pageData.find((data) => data.id == userID);
			
			selectedData = coach;
			
			$('#label-unarchive-coach-name').text( name );
		});

		$('#add-coach_btn').on('click', function(){
			currentStep = 1;
			errors = [];
			bankAccounts = [{
				"bank_id": '',
				"bank_account": '',
				"bank_account_name": '',
				"is_default": 0,
			}];
			availabilityRules = [{
				"availability_type": 'time',
				"from_date": '',
				"to_date": '',
				"from_time": '',
				"to_time": '',
				"availability_start": '',
				"availability_end": ''
			}];
			formAction = 'add';

			stepsDetails(currentStep);

			$('.steps').addClass('d-none');
			$(`#step-${currentStep}`).removeClass('d-none');
			$('#coach-modal #prev-btn').addClass('d-none');
			$('#coach-modal #cancel-btn').removeClass('d-none');
			$('#coach-modal #save-btn').addClass('d-none');
			$('#coach-modal #next-btn').removeClass('d-none');
			$('#coach-modal input').removeClass('border border-danger');
			$('#coach-modal select').removeClass('border border-danger');
			$('#coach-modal textarea').removeClass('border border-danger');

			$('#coach-modal input').next('p.text-danger').remove();
			$('#coach-modal select').next('p.text-danger').remove();
			$('#coach-modal textarea').next('p.text-danger').remove();

			$('#coach-modal input').parent().removeClass('border border-danger');
			$('#coach-modal input').parent().next('p.text-danger').remove();

			$('#coach-modal input').val('');
			$('#coach-modal select').val('');
			$('#coach-modal textarea').val('');
			$('#modal-avatar').attr('src', "{{ asset('themes/tailwind/images/profile.png') }}");

			$('#coach-modal select[name=availability_type]').val('time').trigger('change');

			initializeAvailabilityFormAction();
		});

		$('#edit-profile_btn').on('click', function(){
			formAction = "update";

			// remove required indicator to password field
			$('#field-password_label .text-danger').addClass('d-none');

			$('#modal-avatar').attr('src', selectedData.image_path);

			// Fill all fields from user table
			Object.entries(selectedData).forEach((value) => {
				$(`[name=${value[0]}]`).val(value[1]);
			});

			// Fill all fields from coach details table
			Object.entries(selectedData.coach_details).forEach((value) => {
				$(`[name=${value[0]}]`).val(value[1]);
			});

			// Reset and generate new forms based on the selected coach_bank_details
			bankAccounts = selectedData.coach_bank_details.map((value) => {
				return {
					"id": value.id,
					"bank_id": value.bank_id,
					"bank_account": value.bank_account,
					"bank_account_name": value.bank_account_name,
					"is_default": value.is_default,
				};
			});
			console.log(selectedData.coach_bank_details)
			$('.bank-container').empty();

			bankAccounts.forEach((value, key) => {
				$('.bank-container').append(generateBankForm(key, value));

				$(`#modal-form_bank-${key} [name=bank_id]`).val(value.bank_id);
				$(`#modal-form_bank-${key} [name=bank_account]`).val(value.bank_account);
				$(`#modal-form_bank-${key} [name=bank_account_name]`).val(value.bank_account_name);
				$(`#modal-form_bank-${key} [name=is_default]`).prop('checked', value.is_default);
			});
			// End of Coach Bank Details
			
			// Reset and generate new forms for coach availability
			availabilityRules = selectedData.coach_availability.map((value) => {
				return {
					"id": value.id,
					"availability_type": value.availability_type,
					"from_date": value.from_date,
					"to_date": value.to_date,
					"from_time": value.from_time,
					"to_time": value.to_time,
					"availability_start": value.availability_start,
					"availability_end": value.availability_end
				};
			});

			$('.availability-container').empty();
			$('.availability-container').append(`
				<label class="form-label" style="color: #636363;font-size: 14px;">Availability Rules</label>
				<p class="form-label" style="color: #636363;font-size: 14px;">Add rules for <b>unavailable</b> period(s)</p>
			`);
			availabilityRules.forEach((value, key) => {
				$('.availability-container').append(generateAvailabilityForm(key));

				$(`#modal-form_availability-${key} [name=availability_type]`).val(value.availability_type);
				$(`#modal-form_availability-${key} [name=from_date]`).val(value.from_date);
				$(`#modal-form_availability-${key} [name=to_date]`).val(value.to_date);
				$(`#modal-form_availability-${key} [name=from_time]`).val(value.from_time);
				$(`#modal-form_availability-${key} [name=to_time]`).val(value.to_time);
				$(`#modal-form_availability-${key} [name=availability_start]`).val(value.availability_start);
				$(`#modal-form_availability-${key} [name=availability_end]`).val(value.availability_end);

				displayCorrectFieldSelection(value.availability_type, key);
			});

			initializeBankFormAction();
			initializeAvailabilityFormAction();
		})

		$('#next-btn').on('click', function(){
			// validate fields before proceeding to next step
			const step1RequiredFields = [
				'last_name', 'first_name', 'username',
				'hkid', 'phone', 'email', 'dob',
				'address', 'start_date'
			];

			if ( formAction == 'add' )
				step1RequiredFields.push('password');

			const step2RequiredFields = [
				'payment_method', 'payment_type', 'monthly_rate', 'bank_id',
				'bank_account', 'bank_account_name',
			];

			// validate fields for step 1
			if ( currentStep == 1 ) {
				const formData1 = $('#step-1 #modal-form').serializeArray();

				if( processErrorValidation(formData1, step1RequiredFields, '#modal-form') )
					return;
			}

			// validate fields for step 2
			if ( currentStep == 2 ) {
				const formData2 = $('#step-2 #modal-form').serializeArray();

				if( processErrorValidation(formData2, step2RequiredFields, '#modal-form') )
					return;

				let bankFormErrors = 0;
				bankAccounts.forEach((data, key) => {
					const formData = $(`#step-2 #modal-form_bank-${key}`).serializeArray();

					if( processErrorValidation(formData, step2RequiredFields, `#modal-form_bank-${key}`) )
						bankFormErrors++;
				});

				if ( bankFormErrors )
					return;
			}

			// By Default, Cancel and Next button is visible
			currentStep++;

			if ( currentStep > defaultStep ) {
				// Show prev button and hide cancel
				$('#coach-modal #prev-btn').removeClass('d-none');
				$('#coach-modal #cancel-btn').addClass('d-none');
			}

			stepsDetails(currentStep);

			if ( currentStep >= maxStep ) {
				// Show Save and hide next button
				$('#coach-modal #save-btn').removeClass('d-none');
				$('#coach-modal #next-btn').addClass('d-none');
			}
		});

		$('#prev-btn').on('click', function(){
			currentStep--;

			if ( currentStep > defaultStep ) {
				$('#coach-modal #prev-btn').removeClass('d-none');
				$('#coach-modal #cancel-btn').addClass('d-none');
				$('#coach-modal #save-btn').addClass('d-none');
				$('#coach-modal #next-btn').removeClass('d-none');
			}

			stepsDetails(currentStep);

			if ( currentStep <= defaultStep ) { // Probably Step 1
				$('#coach-modal #prev-btn').addClass('d-none');
				$('#coach-modal #cancel-btn').removeClass('d-none');
				$('#coach-modal #save-btn').addClass('d-none');
				$('#coach-modal #next-btn').removeClass('d-none');
			}
		});

		$('#modal-form-add_bank').on('click', function(){
			// Add new data to bankAccounts data array
			const index = bankAccounts.length;

			const data = {
				"bank_id": '',
				"bank_account": '',
				"bank_account_name": '',
				"is_default": 0,
			};

			if ( formAction == 'update' )
				data['id'] = "";

			bankAccounts.push(data);

			$('.bank-container').append(generateBankForm(index));

			$(`#modal-form_bank-${index} [name=bank_id]`).val(data.bank_id);
			$(`#modal-form_bank-${index} [name=bank_account]`).val(data.bank_account);
			$(`#modal-form_bank-${index} [name=bank_account_name]`).val(data.bank_account_name);
			$(`#modal-form_bank-${index} [name=is_default]`).prop('checked', data.is_default);

			initializeBankFormAction();
		});

		$('#modal-form-add_availability').on('click', function(){
			// Add new data to bankAccounts data array
			const data = {
				"availability_type": 'time',
				"from_date": '',
				"to_date": '',
				"from_time": '',
				"to_time": ''
			};

			if ( formAction == 'update' )
				data['id'] = "";


			$('.availability-container').append(generateAvailabilityForm(availabilityRules.length));

			availabilityRules.push(data);

			initializeAvailabilityFormAction();
		});

		$('.availability-container').on('change', 'select[name=availability_type]', function(){
			const index = $(this).data('index');
			const value = $(this).val();

			displayCorrectFieldSelection(value, index);
		})

		$('.bank-container').on('click', 'input[name=is_default]', function(){
			const isChecked = $(this).is(':checked');

			if ( isChecked ) {
				$('.bank-container input[name=is_default]').prop('checked', false);
				$(this).prop('checked', true);
			}
		})

		$('.bank-container').on('input', 'input[name=bank_account]', function(event) {
			// Get the input value
			var inputValue = $(this).val();

			// Remove non-numeric characters from the input value
			var numericValue = inputValue.replace(/[^0-9\s]/g, '');

			// Update the input value with the numeric value
			$(this).val(numericValue);
		});

		$('#save-btn').on('click', async function(){
			$(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();
			
			let transformedData = {};

			const unnecessaryField = [
				'bank_id',
				'bank_account',
				'bank_account_name',
				'from_date',
				'to_date',
				'from_time',
				'to_time'
			];

			// Prepare Data
			const formData1 = $('#step-1 #modal-form').serializeArray();
			formData1.forEach(function(item) {
				if ( !unnecessaryField.includes(item.name) )
					transformedData[item.name] = item.value;
			});

			const formData2 = $('#step-2 #modal-form').serializeArray();
			formData2.forEach(function(item) {
				if ( !unnecessaryField.includes(item.name) )
					transformedData[item.name] = item.value;
			});

			const formData3 = $('#step-3 #modal-form').serializeArray();
			formData3.forEach(function(item) {
				if ( !unnecessaryField.includes(item.name) )
					transformedData[item.name] = item.value;
			});
			
			// Validate required fields
			let step3RequiredFields = ['availability_type', 'from_date', 'to_date', 'from_time', 'to_time'];

			let availabilityFormErrors = 0;
			availabilityRules.forEach((data, key) => {
				const formData = $(`#step-3 #modal-form_availability-${key}`).serializeArray();

				const newFormData = formData.filter((element) => {
					if( element.name == "availability_start" && element.value == "" )
						return false;

					if( element.name == "availability_end" && element.value == "" )
						return false;

					return true
				});

				const availabilityType = $(`#step-3 #modal-form_availability-${key} select[name=availability_type]`).val();

				if( availabilityType == 'custom_date' )
					step3RequiredFields = ['availability_type', 'from_date', 'to_date', 'from_time', 'to_time'];
				else
					step3RequiredFields = ['availability_type', 'availability_start', 'availability_end'];

				if( processErrorValidation(newFormData, step3RequiredFields, `#modal-form_availability-${key}`) )
					availabilityFormErrors++;
			});
			
			if ( availabilityFormErrors ) {
				$(this).removeAttr('disabled');

				return;
			}
				
			// END of validation

			fillBankDetails();
			transformedData['bank'] = bankAccounts;
			
			fillAvailabilityDetails();
			transformedData['availability'] = availabilityRules;

			transformedData['password_confirmation'] = transformedData['password'];

			if ( imageData ) {
                transformedData['avatar'] = imageData;
            }

			// console.log(transformedData['availability']);
			// $(this).removeAttr('disabled');
			// return;
			if ( formAction == 'add' )
				// API Request to save level
				await axios.post(`${getApiUrl()}/coach/add`, transformedData, {
						headers: {
							'Content-Type': 'application/json',
							'Authorization': 'Bearer ' + userToken
						}
					}).then(res => {
						$('#coach-modal #cancel-btn').click();

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
						
						if( error.response.status == 400 || error.response.status == 422 || error.response.status == 422 ) {
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

			if ( formAction == 'update' ) {
				transformedData['id'] = selectedData.id.toString();
				
				// API Request to save level
				await axios.post(`${getApiUrl()}/coach/update`, transformedData, {
						headers: {
							'Content-Type': 'application/json',
							'Authorization': 'Bearer ' + userToken
						}
					}).then(res => {
						$('#coach-modal #cancel-btn').click();

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

			const transformedData = {
				id: selectedData.id
			};

			await axios.post(`${getApiUrl()}/coach/archive`, transformedData, {
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

			const transformedData = {
				id: selectedData.id
			};

			await axios.post(`${getApiUrl()}/coach/unarchive`, transformedData, {
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
						toastInfo("Cant' Unarchive", res.data.message, "warning");
						
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

		// TAKE LEAVE
		$('#take-leave_modal').on('click', '#save-form_btn', async function(){
			$(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();
			
			// Prepare Data
			const formData = $('#take-leave_modal #modal-form').serializeArray();

            const requiredFields = [
                'start_date', 'end_date', 'reason_for_leave'
            ];
            
			if( processErrorValidation(formData, requiredFields, '#take-leave_modal') ) {
				$(this).removeAttr('disabled');

				return;
			}

			let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

			let data = new FormData()
			if( $('#take-leave_modal input[name=attachment]')[0].files[0] )
				data.append('attachment', $('#take-leave_modal input[name=attachment]')[0].files[0], $('#take-leave_modal input[name=attachment]')[0].files[0].name)
			data.append('user_id', selectedData.id)
			data.append('start_date', transformedData['start_date'])
			data.append('end_date', transformedData['end_date'])
			data.append('reason_for_leave', transformedData['reason_for_leave'])

			// $(this).removeAttr('disabled');
			// console.log(selectedData);
			// console.log(transformedData);
			// return;

			await axios.post(`${getApiUrl()}/request/create-coach-leave`, data, {
					headers: {
						'Authorization': 'Bearer ' + userToken,
					}
				}).then(res => {
					$('#take-leave_modal').modal('hide');

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
		});

		function stepsDetails(currentStep) {
			$('.steps').addClass('d-none');
			$(`#step-${currentStep}`).removeClass('d-none');

			if ( currentStep != 1) { // Propably Payment Details
				// Hide the Avatar and change the modal title
				$('#modal-avatar').parent().addClass('d-none');
			}else{
				$('#modal-avatar').parent().removeClass('d-none');
			}

			switch (currentStep) {
				case 1:
					$('#coach-modal .modal-title').text('Personal Information');
					break;
				case 2:
					$('#coach-modal .modal-title').text('Payment Details');
					break;
				case 3:
					$('#coach-modal .modal-title').text('Availability');
					break;
			}
		}

		// Bank Actions
		function generateBankForm(index) {
			const banks = <?= json_encode($banks) ?>;

			let bankOptions = '';
			banks.forEach(function(bank) {
				bankOptions += `<option value="${bank.id}">${bank.bank_name}</option>`;
			});

			let btnRemove = index != 0 ?
				`<div class="d-flex justify-content-end">
					<span class="cursor-pointer modal-form-remove_bank" data-index="${index}">x</span>
				</div>` : '';

			return `<form id="modal-form_bank-${index}">
						<div class="card mb-2 bank-${index}">
							<div class="card-body">
								${btnRemove}
								<div class="d-xxl-flex justify-content-between align-items-xxl-center mb-4">
									<div class="form-inline" style="width: 100%;">
										<div class="form-group">
											<label class="form-label" style="color: #636363;font-size: 14px;">Bank Name <span class="text-danger">*</span></label>
											<select name="bank_id" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
												<option value="" hidden>Select Bank Name</option>
												${ bankOptions }
											</select>
										</div>
									</div>
								</div>
								<div class="d-xxl-flex justify-content-between align-items-xxl-center gap-3 mb-4">
									<div class="form-inline" style="width: 100%;">
										<div class="form-group">
											<label class="form-label" style="color: #636363;font-size: 14px;">Bank Account <span class="text-danger">*</span></label>
											<input name="bank_account" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
										</div>
									</div>
									<div class="form-inline" style="width: 100%;">
										<div class="form-group">
											<label class="form-label" style="color: #636363;font-size: 14px;">Bank account Name <span class="text-danger">*</span></label>
											<input name="bank_account_name" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
										</div>
									</div>
								</div>
								<div class="d-xxl-flex justify-content-between align-items-xxl-center gap-3 mb-4">
									<div class="form-inline" style="width: 100%;">
										<div class="d-flex align-items-center gap-2">
											<input name="is_default" type="checkbox" id="">
											<label class="form-label" style="color: #636363;font-size: 14px; margin: 0;">Primary</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>`;
		}

		function initializeBankFormAction() {
			// Initialize remove event when new Bank form added
			$('.modal-form-remove_bank').on('click', function(){
				const index = $(this).data('index');

				bankAccounts.splice(index, 1);

				$(`.bank-${index}`).remove();
			});
		}

		// Availability Rules Actions
		function generateAvailabilityForm(index) {
			// const btnRemove = index != 0 ?
			// 	`<div class="d-flex justify-content-end">
			// 		<span class="cursor-pointer modal-form-remove_availability" data-index="${index}">x</span>
			// 	</div>` : '';

			const btnRemove = `<div class="d-flex justify-content-end">
					<span class="cursor-pointer modal-form-remove_availability" data-index="${index}">x</span>
				</div>`;

			return `<form id="modal-form_availability-${index}">
						<div class="card mb-2 availability-${index}">
							<div class="card-body">
								${btnRemove}
								<div class="d-xxl-flex justify-content-between align-items-xxl-center mb-4">
									<div class="form-inline" style="width: 100%;">
										<div class="form-group">
											<label class="form-label" style="color: #636363;font-size: 14px;">Type</label>
											<select name="availability_type" data-index="${index}" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
												<option value="" hidden>Select Type</option>
												<option value="time">Time</option>
												<option value="day">Day</option>
												<option value="month">Month</option>
												<option value="year">Year</option>
												<option value="custom_date">Custom Date</option>
											</select>
										</div>
									</div>
								</div>
								<div class="time-type">
									<div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
										<x-form-input 
											label="Start" 
											type="time" 
											name="availability_start"
											id="availability_start"
											placeholder="{{ formatYear(now()) }}"
											isRequired=false
										/>

										<x-form-input 
											label="End" 
											type="time" 
											name="availability_end"
											id="availability_end"
											placeholder="{{ formatYear(now()) }}"
											isRequired=false
										/>
									</div>
								</div>
								<div class="day-type d-none">
									<div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
										<x-form-select
											label="Start" 
											name="availability_start"
											id="availability_start"
											isRequired="false"
										>
											<option value="" hidden>--Select--</option>
											<option value="moday">Monday</option>
											<option value="tuesday">Tuesday</option>
											<option value="wednesday">Wednesday</option>
											<option value="thursday">Thursday</option>
											<option value="friday">Friday</option>
											<option value="saturday">Saturday</option>
											<option value="sunday">Sunday</option>
										</x-form-select>

										<x-form-select
											label="End" 
											name="availability_end"
											id="availability_end"
											isRequired="false"
										>
											<option value="" hidden>--Select--</option>
											<option value="moday">Monday</option>
											<option value="tuesday">Tuesday</option>
											<option value="wednesday">Wednesday</option>
											<option value="thursday">Thursday</option>
											<option value="friday">Friday</option>
											<option value="saturday">Saturday</option>
											<option value="sunday">Sunday</option>
										</x-form-select>
									</div>
								</div>
								<div class="month-type d-none">
									<div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
										<x-form-select
											label="Start" 
											name="availability_start"
											id="availability_start"
											isRequired="false"
										>
											<option value="" hidden>--Select--</option>
											<option value="january">January</option>
											<option value="february">February</option>
											<option value="march">March</option>
											<option value="april">April</option>
											<option value="may">May</option>
											<option value="june">June</option>
											<option value="july">July</option>
											<option value="august">August</option>
											<option value="september">September</option>
											<option value="october">October</option>
											<option value="november">November</option>
											<option value="december">December</option>
										</x-form-select>
										<x-form-select
											label="End" 
											name="availability_end"
											id="availability_end"
											isRequired="false"
										>
											<option value="" hidden>--Select--</option>
											<option value="january">January</option>
											<option value="february">February</option>
											<option value="march">March</option>
											<option value="april">April</option>
											<option value="may">May</option>
											<option value="june">June</option>
											<option value="july">July</option>
											<option value="august">August</option>
											<option value="september">September</option>
											<option value="october">October</option>
											<option value="november">November</option>
											<option value="december">December</option>
										</x-form-select>
									</div>
								</div>
								<div class="year-type d-none">
									<div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
										<x-form-input 
											label="Start" 
											type="number" 
											name="availability_start"
											id="availability_start"
											placeholder="{{ formatYear(now()) }}"
											isRequired=false
										/>

										<x-form-input 
											label="End" 
											type="number" 
											name="availability_end"
											id="availability_end"
											placeholder="{{ formatYear(now()) }}"
											isRequired=false
										/>
									</div>
								</div>
								<div class="custom-date-type d-none">
									<div class="d-xxl-flex justify-content-between align-items-xxl-center gap-3 mb-4">
										<div class="form-inline" style="width: 100%;margin-right: 10px;">
											<div class="form-group">
												<label class="form-label" style="color: #636363;font-size: 14px;">Start Date</label>
												<div class="input-group">
													<span class="input-group-text" style="background: #F5F5F5;border-style: none;">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
															<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
														</svg>
													</span>
													<input name="from_date" class="form-control" type="date" data-index="${index}" style="background: #F5F5F5;border-style: none;">
												</div>
											</div>
										</div>
										<div class="form-inline" style="width: 100%;margin-right: 10px;">
											<div class="form-group">
												<label class="form-label" style="color: #636363;font-size: 14px;">End Date</label>
												<div class="input-group">
													<span class="input-group-text" style="background: #F5F5F5;border-style: none;">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
															<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
														</svg>
													</span>
													<input name="to_date" class="form-control" type="date" data-index="${index}" style="background: #F5F5F5;border-style: none;">
												</div>
											</div>
										</div>
									</div>
									<div class="d-xxl-flex justify-content-between align-items-xxl-center gap-3 mb-4">
										<div class="form-inline" style="width: 100%;margin-right: 10px;">
											<div class="form-group">
												<label class="form-label" style="color: #636363;font-size: 14px;">Start Time</label>
												<div class="input-group">
													<span class="input-group-text" style="background: #F5F5F5;border-style: none;">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
															<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
														</svg>
													</span>
													<input name="from_time" class="form-control" type="time" data-index="${index}" style="background: #F5F5F5;border-style: none;">
												</div>
											</div>
										</div>
										<div class="form-inline" style="width: 100%;margin-right: 10px;">
											<div class="form-group">
												<label class="form-label" style="color: #636363;font-size: 14px;">End Time</label>
												<div class="input-group">
													<span class="input-group-text" style="background: #F5F5F5;border-style: none;">
														<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
															<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
														</svg>
													</span>
													<input name="to_time" class="form-control" type="time" data-index="${index}" style="background: #F5F5F5;border-style: none;">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>`;
		}

		function initializeAvailabilityFormAction() {
			// Initialize remove event when new Availability Rule form added
			$('.modal-form-remove_availability').on('click', function(){
				const index = $(this).data('index');

				availabilityRules.splice(index, 1);

				$(`#modal-form_availability-${index}`).remove();
			});


			$('[name=from_time]').on('change', function(){
				$(this).parent().removeClass('border border-danger');

				if( $(this).parent().next().is('p') )
					$(this).parent().next().remove();
					
				const index = $(this).data('index');
				const value = $(this).val();
				const toTimeValue = $(`#modal-form_availability-${index} [name=to_time]`).val();
				console.log(value, toTimeValue);
				if ( value > toTimeValue ) {
					$(this).parent().addClass('border border-danger');
					$(this).parent().after('<p class="text-danger" style="position: absolute; font-size: 12px;">Cannot be greater than to End Time</p>');
				}
				
				if ( value <= toTimeValue ){
					$(`#modal-form_availability-${index} [name=to_time]`).parent().removeClass('border border-danger');

					if( $(`#modal-form_availability-${index} [name=to_time]`).parent().next().is('p') )
						$(`#modal-form_availability-${index} [name=to_time]`).parent().next().remove();
				}
			});

			$('[name=to_time]').on('change', function(){
				$(this).parent().removeClass('border border-danger');

				if( $(this).parent().next().is('p') )
					$(this).parent().next().remove();
				
				const index = $(this).data('index');
				const value = $(this).val();
				const fromTimeValue = $(`#modal-form_availability-${index} [name=from_time]`).val();
				
				if ( value < fromTimeValue ) {
					console.log(value, fromTimeValue);
					$(this).parent().addClass('border border-danger');
					$(this).parent().after('<p class="text-danger" style="position: absolute; font-size: 12px;">Cannot be less than to Start Time</p>');
				}
				
				if ( value >= fromTimeValue ){
					$(`#modal-form_availability-${index} [name=from_time]`).parent().removeClass('border border-danger');

					if( $(`#modal-form_availability-${index} [name=from_time]`).parent().next().is('p') )
						$(`#modal-form_availability-${index} [name=from_time]`).parent().next().remove();
				}
			});

			$('[name=from_date]').on('change', function(){
				const index = $(this).data('index');
				const value = $(this).val();

				$(`#modal-form_availability-${index} input[name=to_date]`).attr('min', value);
			});

			$('[name=to_date]').on('change', function(){
				const index = $(this).data('index');
				const value = $(this).val();

				$(`#modal-form_availability-${index} input[name=from_date]`).attr('max', value);
			});
		}

		// Fill multiple Bank Details on Submit
		function fillBankDetails() {
			bankAccounts.forEach((value, index) => {
				const arrayOfArrays = Object.entries(value).map(([key, value]) => [key, value]);
		
				arrayOfArrays.forEach((data) => {
					const inputValue = $(`.bank-container .bank-${index} [name="${data[0]}"]`).val();

					if ( data[0] != 'id' && data[0] != 'is_default' )
						bankAccounts[index][data[0]] = inputValue;

					if( data[0] == 'is_default' ) {
						bankAccounts[index][data[0]] = $(`.bank-container .bank-${index} [name="${data[0]}"]`).is(':checked') ? 1 : 0;
					}
				})
			});
		}

		// Fill multiple Availability Details on Submit
		function fillAvailabilityDetails() {
			availabilityRules.forEach((value, index) => {
				const formData = $(`#step-3 #modal-form_availability-${index}`).serializeArray();

				const arrayOfArrays = Object.entries(value).map(([key, value]) => [key, value]);
				arrayOfArrays.forEach((data) => {
					formData.forEach((element) => {
						if( element.name == "availability_start" && element.value == "" )
							return false;

						if( element.name == "availability_end" && element.value == "" )
							return false;

						if( data[0] != 'id' )
							availabilityRules[index][element.name] = element.value;
					});
				})
			});
		}

		function processErrorValidation(formData, requiredFields, formName) {
			errors = [];
			let fromTime = '';
			let toTime = '';

			let startDate = '';
			let endDate = '';

			let fromDate = '';
			let toDate = '';

			formData.forEach(function(item) {
				if ( requiredFields.includes(item.name) ) {
					if( item.value == "" ){
						errors.push({
							field_name: item.name,
							message: formatString(item.name) + " is required."
						});
					}
					else if ( item.name == 'phone' ) {
                        if (! isValidPhoneNumber( item.value ) )
                            errors.push({
                                field_name: item.name,
                                message: formatString(item.name) + " must be a valid phone number."
                            });
                    }

					// validation for time
					if( item.name == 'from_time' )
						fromTime = item.value;

					if( item.name == 'to_time' )
						toTime = item.value;

					if( item.name == 'start_date' )
						startDate = item.value;

					if( item.name == 'end_date' )
						endDate = item.value;

					if( item.name == 'from_date' )
						fromDate = item.value;

					if( item.name == 'to_date' )
						toDate = item.value;
				}
			});

			if ( toTime < fromTime )
				errors.push({
					field_name: 'to_time',
					message: "Cannot be less than to Start Time."
				});

			if ( fromTime > toTime )
				errors.push({
					field_name: 'from_time',
					message: "Cannot be greater than to End Time."
				});

			if ( endDate < startDate && endDate !== "" )
				errors.push({
					field_name: 'end_date',
					message: "Cannot be less than to Start Date."
				});

			if ( startDate > endDate && endDate !== ""  )
				errors.push({
					field_name: 'start_date',
					message: "Cannot be greater than to End Date."
				});

			if ( toDate < fromDate )
				errors.push({
					field_name: 'to_date',
					message: "Cannot be less than to Start Date."
				});

			if ( fromDate > toDate )
				errors.push({
					field_name: 'from_date',
					message: "Cannot be greater than to End Date."
				});

			if ( errors.length > 0 ) {
				renderErrors(formName);

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

		function renderErrors(formName) {
			if ( errors.length > 0 ) {
				const onParent = ['to_time', 'from_time', 'from_date', 'to_date', 'start_date', 'end_date', 'dob'];

				errors.forEach((element) => {
					if ( onParent.includes(element.field_name) ) {
						$(`${formName} [name="${element.field_name}"]`).parent().removeClass('border border-danger');
						$(`${formName} [name="${element.field_name}"]`).parent().next().remove();

						$(`${formName} [name="${element.field_name}"]`).parent().addClass('border border-danger');
						$(`${formName} [name="${element.field_name}"]`).parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`)
					} else {
						$(`${formName} [name="${element.field_name}"]`).removeClass('border border-danger');
						$(`${formName} [name="${element.field_name}"]`).next().remove();

						$(`${formName} [name="${element.field_name}"]`).addClass('border border-danger');
						$(`${formName} [name="${element.field_name}"]`).after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`)
					}
				});

				initializeClearErrorBorder();
			}
		}

		function initializeClearErrorBorder() {
			$('input').on('change', function(){
				$(this).removeClass('border border-danger');
				$(this).parent().removeClass('border border-danger');

				const index = $(this).data('index');

				if ( $(this).next().is("p") )
					$(this).next().remove();

				if ( $(this).parent().next().is("p") )
					$(this).parent().next().remove();
			})
			
			$('select').on('change', function(){
				$(this).removeClass('border border-danger');

				if ( $(this).next().is("p") )
					$(this).next().remove();
			})

			$('textarea').on('change', function(){
				$(this).removeClass('border border-danger');

				if ( $(this).next().is("p") )
					$(this).next().remove();
			})
		}

		function displayCorrectFieldSelection(value, index) {
			$(`#modal-form_availability-${index} .time-type`).addClass("d-none");
			$(`#modal-form_availability-${index} .day-type`).addClass("d-none");
			$(`#modal-form_availability-${index} .month-type`).addClass("d-none");
			$(`#modal-form_availability-${index} .year-type`).addClass("d-none");
			$(`#modal-form_availability-${index} .custom-date-type`).addClass("d-none");

			if( value == "time" ) {
				$(`#modal-form_availability-${index} .time-type`).removeClass("d-none");
			}

			if( value == "day" ) {
				$(`#modal-form_availability-${index} .day-type`).removeClass("d-none");
			}

			if( value == "month" ) {
				$(`#modal-form_availability-${index} .month-type`).removeClass("d-none");
			}

			if( value == "year" ) {
				$(`#modal-form_availability-${index} .year-type`).removeClass("d-none");
			}

			if( value == "custom_date" ) {
				$(`#modal-form_availability-${index} .custom-date-type`).removeClass("d-none");
			}
		}

		initializeClearErrorBorder();

		$('#modal-form input[name=start_date]').on('change', function(){
			const value = $(this).val();

			$('#modal-form input[name=end_date]').attr('min', value);
		});

		$('#modal-form input[name=end_date]').on('change', function(){
			const value = $(this).val();

			$('#modal-form input[name=start_date]').attr('max', value);
		});

		$('#coach-modal').on('click', '.profile-image-edit_btn', function(){
            $('#coach-modal #avatar-field').click();
        })

        $("#coach-modal").on('change', '#avatar-field', function() {
 			const input = $(this)[0].files[0];
 			var preview = $("#coach-modal #modal-avatar");

 			var reader = new FileReader();

 			reader.onload = function(e) {
 				preview.attr('src', e.target.result);

				 const content = e.target.result.split(',')[1]; // Extract base64-encoded content

				imageData = {
					name: input.name,
					type: input.type,
					size: input.size,
					content: content
				};
 			};

 			// Read the file as a data URL
 			reader.readAsDataURL(input);
 		});

		$('.passwordInput').on('keyup', function() {
			const password = $(this).val();
			const errorMessage = $('.error-message');

			if (password.length !== 6) {
				errorMessage.text('Password must be 6 characters long');
				errorMessage.show();
				$(this).addClass('border border-danger');
			} else {
				errorMessage.hide();
				$(this).removeClass('border border-danger');
			}
		});
 	});
</script>
@endsection