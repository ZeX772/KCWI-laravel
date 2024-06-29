 {{-- @extends('theme::layouts.app')


 @section('content')
 <div style="padding: 20px;background: #ffffff;box-shadow: 0px 0px 3px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
 	<div class="row g-0 d-xxl-flex justify-content-between">
 		<div class="col-auto">
 			<h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;font-weight: bold;">Venue Management</h1>
 		</div>
 		<div class="col-auto">
			<button id="add-venue-modal" data-bs-toggle="modal" data-bs-target="#main-venue-modal" class="btn btn-primary text-nowrap d-flex align-items-center" type="button" style="background: #4A5C7A;box-shadow: 0px 4px rgb(40,51,68);border-style: none;border-bottom-style: none;border-bottom-color: rgb(29,44,88);">
				<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="margin-right: 2px;">
 					<path d="M12 4C11.4477 4 11 4.44772 11 5V11H5C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13H11V19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19V13H19C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11H13V5C13 4.44772 12.5523 4 12 4Z" fill="currentColor"></path>
 				</svg>
				Add Venue
			</button>
		</div>
 	</div>
 	<div class="row d-xxl-flex" style="text-align: left;">
 		<div class="col d-xxl-flex justify-content-xxl-start" style="border-bottom: 1px solid #E8E8E8;">
 			<ul class="nav nav-tabs d-xxl-flex justify-content-xxl-end" role="tablist" style="border-style: none;border-left-style: none;">
 				<li class="nav-item" role="presentation" style="border-left-style: none;">
					<a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1" style="border-style: none;border-left-style: none;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 600;color: #7A7A7A;">ALL</a>
				</li>
 			</ul>
 		</div>
 	</div>
	<!-- Table and Information Display -->
 	<div class="row" style="margin-top: 15px;">
 		<!-- Table -->
 		<div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
 			<div class="tab-content custom-datatable_container" style="padding: 15px;">
 				<div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
 					<div class="table-responsive" style="height: auto;max-height: none;">
 						<table class="table table-hover custom-datatable" style="width: 100%;">
 							<thead>
 								<tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
 									<th class="text-center"><input type="checkbox"></th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">VENUE NAME</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">SHORT FORM</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">ADDRESS</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">REMARKS</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">STATUS</th>
 									<th></th>
 								</tr>
 							</thead>
 							<tbody style="height: auto;">
 								@foreach($data as $key => $value)
 								<tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="<?= $key ?>">
 									<td class="text-center"><input type="checkbox"></td>
 									<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $value['name'] }}</td>
 									<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $value['short_name'] }}</td>
 									<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $value['contact_person'] }}</td>
 									<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $value['remarks'] ?? '-' }}</td>
 									<td style="color: #4CBC9A;font-family: Poppins, sans-serif;font-size: 12px;" class="{{ $value['status'] != 'archived' ? 'text-success' : 'text-danger' }}">{{ ucfirst($value['status']) }}</td>
 									<td>
 										<div class="d-flex gap-2">
											<div id="edit-btn" data-row_index="<?= $key ?>" data-bs-toggle="modal" data-bs-target="#main-venue-modal" class="cursor-pointer">
												<svg id="" class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="color: #3B3B3B;">
													<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
												</svg>
											</div>
											@if( $value['status'] != 'archived' )
												<div id="delete-btn" data-row_index="<?= $key ?>" data-bs-toggle="modal" data-bs-target="#delete-modal" class="cursor-pointer">
													<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;">
														<path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path>
														<path d="M9 9H11V17H9V9Z" fill="currentColor"></path>
														<path d="M13 9H15V17H13V9Z" fill="currentColor"></path>
													</svg>
												</div>
											@endif
											@if( isSuperAdmin() && $value['status'] == 'archived' )
												<div data-id="{{ $value['id'] }}" data-bs-toggle="modal" data-bs-target="#unarchive-modal" class="cursor-pointer unarchive-btn">
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
		<!-- Information Display -->
 		<div class="col">
 			<div class="card">
 				<div class="card-body">
 					<div class="col">
 						<div>
 							<h1 class="fw-semibold" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;text-align: center;">Venue</h1>
 						</div>
 					</div>
 					<div>
 						<h1 class="fw-semibold" style="font-size: 15px;color: #3B3B3B;font-family: Poppins, sans-serif;">INFORMATION</h1>
 					</div>
 					<div class="col mt-3">
 						<ul class="list-group" style="border-style: none;">
 							<li class="list-group-item d-xxl-flex" style="border-style: none;padding: 0px;">
 								<div class="container" style="padding: 0px;">
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Status</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-status" style="color: #4CBC9A;font-size: 14px;font-family: Poppins, sans-serif;">N/A</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Venue Name</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-venue_name" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">N/A</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Short Form</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-short_form" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">N/A</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Contact Person</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-contact_person" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">N/A</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Phone</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-phone" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">N/A</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Address</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-address" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">N/A</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Remark</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-remark" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">N/A</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Modified by</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-modified_by" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Modified Date</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-updated_at" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
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
 <!-- Modal for Add and Update of Data -->
 <div class="modal fade" role="dialog" tabindex="-1" id="main-venue-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Venue Information</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
 				<div class="col" style="width: 100%;">
 					<form id="modal-venue-form">
 						<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
 							<div class="form-inline" style="width: 100%;margin-right: 10px;">
 								<div class="form-group">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Venue Name <span class="text-danger">*</span></label>
 									<input name="venue_name" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
 								</div>
 							</div>
 						</div>
 						<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
							<x-form-select
								label="Venue Area" 
								name="coordinates"
								id="coordinates"
								isRequired="true"
							>
								<option value="" hidden>Select Venue Area</option>
							</x-form-select>
 							<div class="form-inline" style="width: 100%;margin-left: 10px;">
 								<div class="form-group">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Short Form (Venue Name) <span class="text-danger">*</span></label>
 									<input name="short_name" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
 								</div>
 							</div>
 						</div>
 						<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
 							<div class="form-inline" style="width: 100%;margin-right: 10px;">
 								<div class="form-group">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Contact Person <span class="text-danger">*</span></label>
 									<input name="contact_person" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
 								</div>
 							</div>
 							<div class="form-inline" style="width: 100%;margin-left: 10px;">
 								<div class="form-group">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Phone <span class="text-danger">*</span></label>
 									<input name="phone_number" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
 								</div>
 							</div>
 						</div>
 						<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
 							<div class="form-inline" style="width: 100%;margin-right: 10px;">
 								<div class="form-group">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Address <span class="text-danger">*</span></label>
 									<input name="address" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
 								</div>
 							</div>
 						</div>
						<div id="map"></div>
 						<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
 							<div class="form-inline" style="width: 100%;margin-right: 10px;">
 								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Facility</label>
									<div id="facilities-container" class="d-flex flex-wrap gap-1"></div>
 								</div>
 							</div>
 						</div>
 						<div class="container facility-container d-none" style="padding: 0px;color: #636363;margin-top: 20px;">
 							<div class="card">
 								<div class="card-body">
									<input type="text" name="facility_name" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;width: 100%;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
 									<div class="col" style="margin-top: 20px;">
										<button class="btn btn-light fw-semibold hide-facility_container" type="button" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);margin-right: 20px;">Cancel</button>
										<button id="save-facility" class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
									</div>
 								</div>
 							</div>
 						</div>
 						<div class="container" style="margin-top: 10px; padding-left: 0px;">
 							<div class="row">
 								<div class="col-auto">
 									<button class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap show-facility_container" type="button" style="height: 30px; padding: 5px 12px; padding-top: 0px; padding-bottom: 0px; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255, 255, 255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.25);">
 										<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 8px;">
 											<path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
 										</svg>
 										Add Facility
 									</button>
 								</div>
 							</div>
 						</div>
 						<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
 							<div class="form-inline">
 								<div class="form-group">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Remark</label>
 									<textarea id="venue-remarks" name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
 								</div>
 							</div>
 						</div>
 						<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
 							<div class="form-inline">
 								<div class="form-group">
 									<label class="form-label" style="color: #636363;font-size: 14px;">Status</label>
 									<select name="status" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
										<option value="published">Published</option>
 										<option value="archived">Archived</option>
 									</select>
 								</div>
 							</div>
 						</div>
 					</form>
 				</div>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
 				<button id="cancel-btn" class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
 				<button id="save-venue" class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
 			</div>
 		</div>
 	</div>
 </div>

 <!-- Modal for Delete Confirmation -->
 <div class="modal fade" role="dialog" tabindex="-1" id="delete-modal">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p style="color: #FF4550;font-size: 20px;font-family: Poppins, sans-serif;" class="mb-3">Are you sure to archive this venue?</p>
				<p style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">
					<b style="text-decoration: underline;" id="label-delete-venue-name">Coach Ng</b> has a time clash with another class at this period.
				</p>
			</div>
			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button id="cancel-btn" class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button id="archive-venue" class="btn btn-primary" type="button" data-bs-dismiss="myModal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Yes</button>
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

@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
<style>
	#map {
		height: 400px;
		width: 100%;
	}
</style>

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWH2dCkIXPYFb3tul9G36fuWk8cgW4inQ" async defer></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWH2dCkIXPYFb3tul9G36fuWk8cgW4inQ&libraries=places"></script>
<script type="text/javascript">
 	var mSortingString = [];
 	var disableSortingColumn = 4;
	var facilitiesData = [];
	var venueAction = '';
	var selectedVenueID = '';
	var selectedFacilityIndex = null;
	var modalTitle = "Venue Information";

	mSortingString.push({
 		"bSortable": false,
 		"aTargets": [disableSortingColumn]
 	});

 	$(function() {

		/** Initialize Datatable */
 		let table = $('.custom-datatable').DataTable({
 			"paging": true,
 			"ordering": true,
 			"info": true,
 			"aaSorting": [],
 			"orderMulti": true,
 			"aoColumnDefs": mSortingString,
            "columnDefs": [{
                    targets: [0,6],
                    orderable: false
            }]
 		});

		/**
		 * ------------------
		 * EVENTS
		 * ------------------
		 */
		/** SELECT ROW
		 * Process the population of information section when viewing specific data row */
		$('.custom-datatable').on('click', 'tr', function() {
			const rowIndex = $(this).data('row_index');
 			const venueData = <?= json_encode($data) ?>;
			const rowData = venueData[rowIndex];
			
			// Update Details on the Venue Information Section
			
			$("#detail-status").text(ucfirst(rowData.status));
			$("#detail-status").removeClass('text-success text-danger');
			$("#detail-status").addClass(rowData.status != 'archived' ? 'text-success' : 'text-danger');
			$("#detail-venue_name").text(rowData.name);
			$("#detail-short_form").text(rowData.short_name);
			$("#detail-contact_person").text(rowData.contact_person);
			$("#detail-phone").text(rowData.phone_number);
			$("#detail-address").text(rowData.address);
			$("#detail-remark").text(rowData.remarks ? rowData.remarks : '-');

			$('#detail-modified_by').text( rowData.log ? rowData.log.user.name : '-' );
            $('#detail-updated_at').text( rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});
		 
		/** UPDATE ROW
		 * Process the edit of School Venue by Populating the fields on the modal */
 		$('.custom-datatable').on('click', '#edit-btn', function() {
			resetFormData();
			
			$("#main-venue-modal .modal-title").text("Update " + modalTitle);
		
			venueAction = 'update';

			const rowIndex = $(this).data('row_index');
 			const venueData = <?= json_encode($data) ?>;
			const selectedData = venueData[rowIndex];
			const rowData = Object.entries(selectedData).map(([key, value]) => {
				return { key, value };
			});

			selectedVenueID = selectedData.id;

			// Fill the input field with the selected data
			rowData.forEach(element => {
				if( element.key == 'name' )
					$(`input[name=venue_name]`).val(element.value);

				if( element.key == 'remarks' )
					$(`#venue-remarks`).val(element.value);

				if( element.key == 'coordinates' )
					$(`select[name=coordinates]`).val(element.value);

				if( element.key == 'status' )
					$(`select[name=${element.key}]`).val(element.value);

				else
					$(`input[name=${element.key}]`).val(element.value);
			});
			
			// Map facilitiesData if the selected row has facilities
			if ( selectedData?.school_venue_facilities.length ) {
				selectedData?.school_venue_facilities.forEach(element => {
					facilitiesData.push({
						name: element.name,
						id: element.id,
						removed: false
					});
				});

				facilitiesData.forEach((element, key) => {
					facilities(element, key);
				});

				$(".edit-facility").toggleClass('d-none');
			}
 		});

		/** DELETE ROW
		 * Process the data configuration when deleting data */
 		$('.custom-datatable').on('click', '#delete-btn', function() {
			const rowIndex = $(this).data('row_index');
 			const venueData = <?= json_encode($data) ?>;
			const selectedData = venueData[rowIndex];

			selectedVenueID = selectedData.id;

			$("#label-delete-venue-name").text( selectedData.name );
 		});

		 $('.unarchive-btn').on('click', function(){
            
			const id = $(this).data('id');
            
			selectedVenueID = id

			const pageData = <?= json_encode($data) ?>;

			const data = pageData.find((data) => data.id == id);
			
			$('#label-unarchive-name').text( data.name );
		});

		/** MODAL (ADD & UPDATE) FACILITY
		 * Add and Update School Venue Facility */
		
		$('#main-venue-modal').on('click', '#save-facility', function() {
			const facilityName = $( "input[name=facility_name]" ).val();

			const requiredFields = [
                'facility_name'
            ];

			const formData = [
				{
					name: 'facility_name',
					value: facilityName,
				}
			];
            
			if( processErrorValidation(formData, requiredFields) )
				return;
			
			// If selectedFacility variable has value, meaning action would be updating of facility
			if ( selectedFacilityIndex != null ) {
				facilitiesData[selectedFacilityIndex].name = facilityName;

				selectedFacilityIndex = null;

				refreshFacilityList();
			} else {
				const facilityData = {
					name: facilityName,
					id: '',
					removed: false,
				};

				facilitiesData.push(facilityData);

				facilities(facilityData, facilitiesData.length - 1)
			}

			// reset field
			$( "input[name=facility_name]" ).val("");
 		});

		/** MODAL (HIDE & SHOW) FACILITY FORM CONTAINER */
		$('#main-venue-modal').on('click', '.show-facility_container', function() {
			$(".facility-container").toggleClass('d-none');
			$(".show-facility_container").toggleClass('d-none');
			$(".edit-facility").toggleClass('d-none');

			$( "input[name=facility_name]" ).removeClass('border border-danger');
			if( $( "input[name=facility_name]" ).next().is('p') )
				$( "input[name=facility_name]" ).next().remove();
 		});

		$('#main-venue-modal').on('click', '.hide-facility_container', function() {
			$(".facility-container").toggleClass('d-none');
			$(".show-facility_container").toggleClass('d-none');
			$(".edit-facility").toggleClass('d-none');
 		});

		$('#main-venue-modal').on('click', '.remove-facility', function() {
			const facilityIndex = $(this).data('facility_id');

			if ( venueAction == 'update' && facilitiesData[facilityIndex].id != '' )
				facilitiesData[facilityIndex].removed = true;

			else
				facilitiesData.splice(facilityIndex, 1);
			
			refreshFacilityList();
 		});

		$('#main-venue-modal').on('click', '.edit-facility', function() {
			refreshFacilityList();

			const facilityIndex = $(this).data('facility_id');

			selectedFacilityIndex = facilityIndex;

			// Fill the facility input field
			$("input[name=facility_name]").val(facilitiesData[facilityIndex].name);
 		});

		/** SHOW ADD MODAL
		 * Set Action ( Add or Update ) on Modal */
		$('#add-venue-modal').on('click', function() {
			resetFormData();

			venueAction = 'add';

			$("#main-venue-modal .modal-title").text("Add " + modalTitle);
 		});

		/** STORE AND UPDATE DATA
		 * EVENTS with API REQUESTS */
		$("#save-venue").on('click', async function() {
			$(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#modal-venue-form').serializeArray();

			const requiredFields = [
                'venue_name', 'coordinates', 'short_name',
                'contact_person', 'phone_number', 'address'
            ];
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

			let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

			if ( facilitiesData.length )
				transformedData['facilities'] = facilitiesData;

			if ( selectedVenueID == '' && venueAction == 'add' )
				// API Request to save vanue
				await axios.post(`${getApiUrl()}/venue/add`, transformedData, {
						headers: {
							'Content-Type': 'application/json',
							'Authorization': 'Bearer ' + userToken
						}
					}).then(res => {
						$('#main-venue-modal #cancel-btn').click();

						if( res.data.success ) {
							Swal.fire({
								toast: true,
								position: 'top-end',
								icon: 'success',
								title: res.data.message,
								showConfirmButton: false,
								timer: 3000  // Adjust the timer as needed (in milliseconds)
							});

							window.location = window.location
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
			
			if ( selectedVenueID != '' && venueAction == 'update' ) {
				transformedData['id'] = selectedVenueID;

				// API Request to update vanue
				await axios.post(`${getApiUrl()}/venue/update`, transformedData, {
						headers: {
							'Content-Type': 'application/json',
							'Authorization': 'Bearer ' + userToken
						}
					}).then(res => {
						$('#main-venue-modal #cancel-btn').click();

						if( res.data.success ) {
							Swal.fire({
								toast: true,
								position: 'top-end',
								icon: 'success',
								title: res.data.message,
								showConfirmButton: false,
								timer: 3000  // Adjust the timer as needed (in milliseconds)
							});

							window.location = window.location
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

		$("#archive-venue").on('click', async function() {
			$(this).attr('disabled', 'true');

			const userToken = getUserToken();

			const formData = {
				id: selectedVenueID
			};

			await axios.post(`${getApiUrl()}/venue/archive`, formData, {
					headers: {
						'Content-Type': 'application/json',
						'Authorization': 'Bearer ' + userToken
					}
				}).then(res => {
					$('#delete-modal #cancel-btn').click();
					
					if( res.data.success ) {
						Swal.fire({
							toast: true,
							position: 'top-end',
							icon: 'success',
							title: res.data.message,
							showConfirmButton: false,
							timer: 3000  // Adjust the timer as needed (in milliseconds)
						});

						window.location = window.location
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
			const userToken = getUserToken();

			const transformedData = {
				id: selectedVenueID
			};

			await axios.post(`${getApiUrl()}/venue/unarchive`, transformedData, {
					headers: {
						'Content-Type': 'application/json',
						'Authorization': 'Bearer ' + userToken
					}
				}).then(res => {
                    $('#unarchive-modal #cancel-btn').click();

                    if( res.data.success ) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: res.data.message,
                            showConfirmButton: false,
                            timer: 3000  // Adjust the timer as needed (in milliseconds)
                        });

                        window.location = window.location
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
		/**
		 * ------------------
		 * FUNCTIONS
		 * ------------------
		 */
		function facilities( facilityData, index ) {
			const template = generateFacilityData(facilityData, index)
			
			if (! facilityData?.removed )
				$('#facilities-container').append(template);
		}

		function generateFacilityData(data, index) {
			return `
				<div class="d-xxl-flex align-items-xxl-center" style="height: 48px;background: #ffffff;border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding: 20px;">
					<div class="col-xxl-11 w-auto mr-4">
						<label class="col-form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">${data.name}</label>
					</div>
					<div class="col cursor-pointer d-flex gap-1">
						<div class="edit-facility" data-facility_id="${index}">
							<svg id="" class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="width: 16px; height: 16px;color: #3B3B3B;">
								<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
							</svg>
						</div>
						<div class="remove-facility" data-facility_id="${index}">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg" style="width: 16px; height: 16px;">
								<path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
								<path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
							</svg>
						</div>
					</div>
				</div>
			`;
		}

 		function showDeleteModal(title, rowData) {

 			// Create a Bootstrap modal
 			var modal = `
                <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p style="color: #FF4550;font-size: 20px;font-family: Poppins, sans-serif;">Are you sure to delete this item?</p>
                            <p style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;"><b style="text-decoration: underline;">Coach Ng</b> has a time clash with another class at this period.</p>
                        </div>
                        <div class="modal-footer justify-content-between" style="border-top-style: none;"><button class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button><button class="btn btn-primary" type="button" data-bs-dismiss="myModal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button></div>
                    </div>
                </div>
            </div>
            `;

 			// Append the modal HTML to the body
 			$('body').append(modal);

 			// Show the modal
 			$('#myModal').modal('show');

 			// Remove the modal from the DOM when closed
 			$('#myModal').on('hidden.bs.modal', function() {
 				$(this).remove();
 			});
 		}

		function refreshFacilityList() {
			$('#facilities-container').empty();

			facilitiesData.forEach((element, key) => {
				facilities(element, key)
			});
		}

		function resetFormData() {
            $('#modal-venue-form input').val('');
            $('#modal-venue-form #venue-remarks').val('');

			$(".facility-container").addClass('d-none');
			$(".show-facility_container").removeClass('d-none');
			$(".edit-facility").addClass('d-none');

			$('#modal-venue-form input.form-control').removeClass('border border-danger');
            if( $('#modal-venue-form input.form-control').next().is('p') )
                $('#modal-venue-form input.form-control').next().remove();

            $('#modal-venue-form select').removeClass('border border-danger');
            if( $('#modal-venue-form select').next().is('p') )
                $('#modal-venue-form select').next().remove();

            $('#modal-venue-form textarea').removeClass('border border-danger');
            if( $('#modal-venue-form textarea').next().is('p') )
                $('#modal-venue-form textarea').next().remove();

            facilitiesData = [];
            selectedVenueID = "";
			selectedFacilityIndex = null;

            refreshFacilityList();
        }

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
					else if ( item.name == 'phone_number' ) {
                        if (! isValidPhoneNumber( item.value ) )
                            errors.push({
                                field_name: item.name,
                                message: formatString(item.name) + " must be a valid phone number."
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
                const hasParentFields = ['dob'];

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

		async function loadListofStateByCountry() {
			await axios.get(`https://api.countrystatecity.in/v1/countries/HK/states`, {
						headers: {
							'Content-Type': 'application/json',
							'X-CSCAPI-KEY': 'dXVnMVpxS21LMUpIaHJZQnNFQkFmZVc5T2hZWHJzRDl4b2VORXJzOQ=='
						}
					}).then(response => {
						let venueAreaOptions = '';
						response.data.forEach(function(element){
							venueAreaOptions += `<option value="${element.iso2}">${element.name}</option>`;
						});

						$('#main-venue-modal select[name=coordinates]').append(venueAreaOptions);
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

		function initMap() {
			var mapOptions = {
				zoom: 15,
				center: {lat: 22.321274, lng: 114.173440} // Center map at default coordinates
			}; 

			map = new google.maps.Map(document.getElementById('map'), mapOptions);
			
			marker = new google.maps.Marker({
				map: map,
				draggable: true,
				position: {lat: 22.3193, lng: 114.1694},
				map: map,
				title: 'Malaysia' // Optional: Marker tooltip text
			});

			console.log(marker);
			
			// Event listener to update address input when marker is dragged
			marker.addListener('dragend', function() {
				getAddress(marker.getPosition());
			});
		}

		function getAddress(latLng) {
			var geocoder = new google.maps.Geocoder();
			geocoder.geocode({ 'location': latLng }, function(results, status) {
				if (status === google.maps.GeocoderStatus.OK) {
					if (results[0]) {
						$('input[name=address]').val(results[0].formatted_address);
					} else {
						console.log('No results found');
					}
				} else {
					console.log('Geocoder failed due to: ' + status);
				}
			});
		}

		loadListofStateByCountry();

        initializeInputClearEvent();

		initMap();
 	});
</script>
@endsection --}}