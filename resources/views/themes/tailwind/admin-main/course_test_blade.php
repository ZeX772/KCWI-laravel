@extends('theme::layouts.app')


@section('content')
<div style="padding: 20px;background: #ffffff;box-shadow: 0px 0px 3px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
 	<div class="row g-0 d-xxl-flex justify-content-between">
 		<div class="col-auto">
 			<h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;">Course Management</h1>
 		</div>
 		<div class="col-auto">
			<x-primary-button type="button" id="add-btn" title="Add Course" toggle="modal" target="#course-modal"/>
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
 	<div class="row" style="margin-top: 15px;">
 		<!-- Table List Section -->
 		<div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
 			<div class="tab-content custom-datatable_container" style="padding: 15px;">
 				<div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
 					<div class="table-responsive" style="height: auto;max-height: none;">
 						<table class="table table-hover custom-datatable" id="course-table" style="width: 100%;">
 							<thead>
 								<tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
 									<th class="text-center"><input type="checkbox"></th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COURSE CODE</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COURSE LEVEL</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">CLASS SIZE</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">VENUE</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">FACILITY</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">TOTAL FEE (RM)</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COACH(ES)</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">STATUS</th>
 									<th></th>
 								</tr>
 							</thead>
 							<tbody style="height: auto;">
 								@foreach($data as $key => $course)
									<tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="{{ $key }}">
										<td class="text-center"><input type="checkbox"></td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $course->course_abbreviation }}</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $course->level->abbreviation }}</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $course->course_size }}</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $course->venue->short_name }}</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">
 											@if(count($course->venue->school_venue_facilities) > 0)
												<div>
													@foreach($course->venue->school_venue_facilities as $venueFacilities)
														<span>{{ $venueFacilities->name }}</span>
													@endforeach
												</div>
											@else
 												<span>-</span>
											@endif
										</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $course->course_full_price }}</td>
										<td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">-</td>
										<td style="color: #4CBC9A;font-family: Poppins, sans-serif;font-size: 12px;">{{ $course->course_status }}</td>
										<td>
											<div class="table-acitions_container d-flex gap-2">
												<button type="button" class="edit-button" id="edit-btn" data-row_index="{{ $key }}" data-bs-toggle="modal" data-bs-target="#course-modal">
													<i class="fa-solid fa-pencil"></i>
												</button> 
												<button type="button" class="delete-button" id="delete-btn" data-row_index="{{ $key }}" data-bs-toggle="modal" data-bs-target="#delete-modal">
													<i class="fa-solid fa-trash"></i>
												</button>
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
		<!-- Detail Section -->
 		<div class="col">
 			<div class="card">
 				<div class="card-body">
 					<div class="col">
 						<div>
 							<h1 class="fw-semibold" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;text-align: center;">Course</h1>
 						</div>
 					</div>
 					<div>
 						<h1 class="fw-semibold" style="font-size: 15px;color: #3B3B3B;font-family: Poppins, sans-serif;">INFORMATION</h1>
 					</div>
 					<div class="col">
 						<ul class="list-group" style="border-style: none;">
 							<li class="list-group-item d-xxl-flex" style="border-style: none;padding: 0px;">
 								<div class="container" style="padding: 0px;">
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Status</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-course_status" style="color: #4CBC9A;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Course Level</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-course_level" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Class Size</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-class_size" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Venue</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-venue_name" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Facility</h1>
 										</div>
 										<div class="col-md-6">
										 	<ul id="detail-venue_facility_name" style="padding: 0px;">
											</ul>
 											<!-- <h1 id="detail-venue_facility_name" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1> -->
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Fee (RM)</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-course_full_price" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Coach</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-course_coach" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Date</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-course_date" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Remark</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-course_remarks" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Modified by</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
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

<!-- ADD COURSE MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="course-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Add Course</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
				<form id="modal-add-form">
					<div class="col" style="width: 100%;">
						<div class="container" style="padding: 0px;color: #636363;">
							<div class="form-inline">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Course Level <span class="text-danger">*</span></label>
									<select name="course_level" id="level-select_field" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
										<option value="">Select Course Level</option>
										@foreach($levels as $level)
											<option value="{{ $level->id }}">{{ $level->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline" style="width: 100%;margin-right: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Default Venue <span class="text-danger">*</span></label>
									<select name="venue" id="venue-select_field" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
										<option value="">Select Default Venue</option>
										@foreach($venues as $venue)
											<option value="{{ $venue->id }}">{{ $venue->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-inline" style="width: 100%;margin-left: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Default Facility</label>
									<select name="facility" id="facility-select_field" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" disabled>
										<option value="">Please Select Venue</option>
									</select>
								</div>
							</div>
						</div>
						<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline" style="width: 100%;margin-right: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Class Size (Maximum Number of Students) <span class="text-danger">*</span></label>
									<input type="text" name="course_size" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
								</div>
							</div>
							<div class="form-inline" style="width: 100%;margin-left: 10px;">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Fee (RM) Per Class <span class="text-danger">*</span></label>
									<input type="text" name="course_full_price" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
								</div>
							</div>
						</div>
						<div class="container" style="padding: 0px;color: #636363;">
							<div class="form-inline">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px; margin-top: 20px;">Assign Coach</label>
									<select class="form-control" id="coach-select_field" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" data-role="tagsinput" data-class="label-info">
										<option value="">Please Select Coaches</option>
										<option value="1">Coach Ng</option>
										<option value="2">Coach Chan</option>
										<option value="3">Coach Lee</option>
										<option value="4">Coach Cheung</option>
										<option value="5">Coach Wong</option>
										<option value="6">Coach Ho</option>
										<option value="7">Intermediate 2</option>
										<option value="8">Coach Leung</option>
										<option value="9">Coach Law</option>
									</select>
									<div id="coach-container" class="d-flex flex-wrap gap-1 mt-2 mb-4"></div>
								</div>
							</div>
						</div>
						<div class="container" style="padding: 0px;color: #636363;">
							<div class="form-inline">
								<div class="form-group" style="margin-bottom: 20px;">
									<label class="form-label" style="color: #636363;font-size: 14px;">Course Category</label>
									<div class="grid-reapeat-col-3 gap-3">
										@foreach( $course_types as $course_type )
											<div class="col">
												<div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
													<label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{ $course_type->name }}</label>
													<input type="radio" name="course_type" class="course-type-{{ $course_type->id }}" value="{{ $course_type->id }}">
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="container" style="padding: 0px;color: #636363;">
							<div class="form-inline">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Add Class</label>
									<div id="classes-container" class="d-flex flex-column gap-2"></div>
								</div>
							</div>
						</div>
						<div class="container" style="margin-top: 10px; padding-left: 0px;">
							<div class="row">
								<div class="col-auto">
									<button type="button" id="add-class-btn" class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap" type="button" style="height: 30px; padding: 5px 12px; padding-top: 0px; padding-bottom: 0px; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255, 255, 255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.25); margin-right: 20px;">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 8px;">
											<path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
										</svg>
										Add Class
									</button>
								</div>
								<!-- <div class="col-auto">
									<button type="button" id="add-bulk_class-btn" class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap" type="button" style="height: 30px; padding: 5px 12px; padding-top: 0px; padding-bottom: 0px; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255, 255, 255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.25);" data-bs-toggle="modal" data-bs-target="#modal-2">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 8px;">
											<path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
										</svg>
										Add Bulk Class
									</button>
								</div> -->
							</div>
						</div>

						<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Status</label>
									<select name="course_status" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
										<option value="Published">Published</option>
										<option value="Draft">Draft</option>
										<option value="Cancel">Cancel</option>
									</select>
								</div>
							</div>
						</div>
						<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
									<label class="form-label" style="color: #636363;font-size: 14px;">Remark</label>
									<textarea name="course_remarks" class="form-control course-remarks" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
								</div>
							</div>
						</div>
					</div>
				</form>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button type="button" id="save-modal-data-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
			</div>
 		</div>
 	</div>
</div>

<!-- BULK CLASS MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="modal-2">
 	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Add Bulk Class</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body" style="padding-top: 0px;">
 				<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 0px;">
 					<form class="form-inline" style="width: 100%;margin-right: 10px;">
 						<div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Start Date</label>
 							<div class="input-group mb-4"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
 										<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
 									</svg></span><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;"></div>
 						</div>
 					</form>
 					<form class="form-inline" style="width: 100%;margin-left: 10px;">
 						<div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">End Date</label>
 							<div class="input-group mb-4"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
 										<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
 									</svg></span><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;"></div>
 						</div>
 					</form>
 				</div>
 				<div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 0px;">
 					<form class="form-inline" style="width: 100%;margin-right: 10px;">
 						<div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Repeat every</label><input class="form-control" type="number" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;"></div>
 					</form>
 					<form class="form-inline" style="width: 100%;margin-left: 10px;">
 						<div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">End Date</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
 								<option value="">days</option>
 								<option value="">weeks</option>
 								<option value="">months</option>
 								<option value="">years</option>
 							</select></div>
 					</form>
 				</div>
 				<div class="container" style="padding: 0px;color: #636363;margin-top: 10px;">
 					<form class="form-inline">
 						<div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Repeat on</label>
 							<div class="col d-xxl-flex justify-content-start align-items-xxl-center">
 								<div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Sun</label></div>
 								<div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Mon</label></div>
 								<div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Tue</label></div>
 								<div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Wed</label></div>
 								<div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Thu</label></div>
 								<div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Fri</label></div>
 								<div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Sat</label></div>
 							</div>
 						</div>
 					</form>
 				</div>
 				<div class="container" style="padding: 0px;color: #636363;margin-top: 10px;">
 					<form class="form-inline">
 						<div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">End</label><label class="form-label" style="color: #636363;font-size: 14px;"></label>
 							<div class="col d-xxl-flex justify-content-start align-items-xxl-center">
 								<div class="d-xxl-flex align-items-xxl-end">
 									<div class="col">
 										<div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding: 0px;padding-right: 20px;padding-left: 20px;width: 214px;">
 											<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Never</h1><input type="radio">
 										</div>
 										<div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding: 0px;padding-right: 20px;padding-left: 20px;width: 214px;margin-top: 10px;">
 											<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">On</h1><input type="radio">
 										</div>
 										<div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding: 0px;padding-right: 20px;padding-left: 20px;width: 214px;margin-top: 10px;">
 											<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">After</h1><input type="radio">
 										</div>
 									</div>
 									<div class="col" style="margin-left: 20px;"><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;width: 214px;height: 48px;">
 										<div class="d-xxl-flex align-items-xxl-center" style="margin-top: 10px;background: #F5F5F5;border-top-right-radius: 5.6px;border-bottom-right-radius: 5.6px;"><input class="form-control" type="number" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;width: 79px;"><label class="form-label d-xxl-flex" style="color: #636363;font-size: 14px;margin-bottom: 0px;">occurrences</label></div>
 									</div>
 								</div>
 							</div>
 						</div>
 					</form>
 				</div>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;"><button class="btn btn-light" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button><button class="btn btn-primary" type="button" data-bs-dismiss="modal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Confirm</button></div>
 		</div>
 	</div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="delete-modal">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p style="color: #FF4550;font-size: 20px;font-family: Poppins, sans-serif;">Are you sure to archive this course?</p>
				<p style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">
					This action cannot be undone.
				</p>
			</div>
			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button id="archive-course" class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Yes</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">

	var mSortingString = [];
	var disableSortingColumn = 4;
	var assignCoachesData = [];
	var courseClasses = [];
	var selectedCourseID = "";
	var formAction = "add"
	var modalTitle = "Course Information";
	var errors = [];

	mSortingString.push({
		"bSortable": false,
		"aTargets": [disableSortingColumn]
	});

	$(function() {
		var table = $('#course-table').DataTable({
			"paging": true,
			"ordering": true,
			"info": true,
			"aaSorting": [],
			"orderMulti": true,
			"aoColumnDefs": mSortingString
		});

		$('.custom-datatable').on('click', 'tr', function() {
			const rowIndex = $(this).data('row_index');
 			const courseData = <?= json_encode($data) ?>;
			const rowData = courseData[rowIndex];

			// Update Details on the Information Section
			$("#detail-course_status").text(rowData.course_status);
			$("#detail-course_level").text(rowData.level.abbreviation);
			$("#detail-class_size").text(rowData.course_size);
			$("#detail-venue_name").text(rowData.venue.short_name);

			// To fill the details for characteristics
            $("#detail-venue_facility_name").empty();
            rowData.venue.school_venue_facilities.forEach(value => {
                $("#detail-venue_facility_name").append( generateVenueFacilitiesDetail(value.name) )       
            });

			$("#detail-course_full_price").text(rowData.course_full_price);
			// $("#detail-course_coach").text(rowData.age);
			// $("#detail-course_date").text(rowData.age);
			$("#detail-course_remarks").text(rowData.course_remarks);
			$("#detail-updated_at").text(rowData.updated_at);
 		});

		$('#add-btn').click(function() {
			$("#course-modal .modal-title").text("Add " + modalTitle);

			formAction = 'add';

			$('select').removeClass('border border-danger');
			if( $('select').next().is('p') )
				$('select').next().remove();

			$('input').removeClass('border border-danger');
			if( $('input').next().is('p') )
				$('input').next().remove();

			$('textarea').removeClass('border border-danger');
			if( $('textarea').next().is('p') )
				$('textarea').next().remove();

			resetModalForm();
		});

		$('#course-table').on('click', '#edit-btn', function() {
			resetModalForm();

			$("#course-modal .modal-title").text("Update " + modalTitle);
			$('select').removeClass('border border-danger');
			if( $('select').next().is('p') )
				$('select').next().remove();

			$('input').removeClass('border border-danger');
			if( $('input').next().is('p') )
				$('input').next().remove();

			$('textarea').removeClass('border border-danger');
			if( $('textarea').next().is('p') )
				$('textarea').next().remove();

			formAction = 'update';

			const rowIndex = $(this).data('row_index');
 			const courseData = <?= json_encode($data) ?>;
			const selectedData = courseData[rowIndex];
			const rowData = Object.entries(selectedData).map(([key, value]) => {
				return { key, value };
			});

			selectedCourseID = selectedData.id;

			// Fill the input field with the selected data
			rowData.forEach(element => {
				$(`input[name=${element.key}]`).val(element.value);
				$(`select[name=${element.key}]`).val(element.value);

				if( element.key == 'venue' ) {
					$(`select[name=venue]`).val(element.value.id);
					$(`select[name=venue]`).change();
				}

				if( element.key == 'course_remarks' )
					$('.course-remarks').val(element.value);

				if( element.key == 'course_type' )
					$(`.course-type-${element.value}`).attr('checked', true);

				if ( element.key == 'course_coaches' ) {
					const courseCoaches = JSON.parse(element.value);

					courseCoaches.forEach(element => {
						populateAssignedCoachList(element);
					});
				}

				if ( element.key == 'course_classes' ) {
					element.value.forEach(element => {
						const data = {
							id: element.id,
							temp_id: element.id,
							course_class_code: element.course_class_code,
							start_date: element.start_date,
							end_date: element.end_date,
							start_time: element.start_time,
							end_time: element.end_time,
							repeat: element.repeat,
							repeat_type: element.repeat_type,
							repeat_on: element.repeat_on,
							repeat_end_type: element.repeat_end_type,
							repeat_end_date: element.repeat_end_date,
							repeat_end_occurancy: element.repeat_end_occurancy,
							change_coach: element.change_coach,
							coach_id: element.coach_id,
							change_venue: element.change_venue,
							venue_id: element.venue_id
						};

						courseClasses.push(data);
					});
					
					refreshClassFormCard();
				}
			});

			initializeCourModuleInputAction();
			initializeCoachAction();
		});

		$('#venue-select_field').change(function() {
			const venueID = $(this).val();
			const venueFacilities = <?= json_encode($school_venue_facilities) ?>

			const venueFacilityList = venueFacilities.filter(($value) => $value.school_venue_id == venueID);
			
			generateSelectedFacilityList( venueFacilityList );

			$('#facility-select_field').removeAttr('disabled');
		});

		$('#level-select_field').change(function() {
			const levelID = $(this).val();
			const levelFacilities = <?= json_encode($levels) ?>

			const levelFacilityList = levelFacilities.find(($value) => $value.id == levelID);

			$("input[name=course_full_price]").val(levelFacilityList.default_price);
		});

		$('#coach-select_field').change(function() {
			const coachID = $(this).val();
			
			populateAssignedCoachList(coachID);
			initializeCoachAction();
		});

		$('#course-modal #add-class-btn').on('click', function() {
			const data = {
				id: '',
				temp_id: courseClasses.length + 1,
				course_class_code: "",
				start_date: "",
				end_date: "",
				start_time: "",
				end_time: "",
				repeat: "",
				repeat_type: "",
				repeat_on: "",
				repeat_end_type: "",
				repeat_end_date: "",
				repeat_end_occurancy: "",
				change_coach: 0,
				coach_id: 0,
				change_venue: 0,
				venue_id: ""
			};

			courseClasses.push(data);

			refreshClassFormCard();
			initializeCourModuleInputAction();
		});

		$('.delete-button').on('click', function(){
			const rowIndex = $(this).data('row_index');
 			const courseData = <?= json_encode($data) ?>;
			const selectedData = courseData[rowIndex];

			selectedCourseID = selectedData.id;
		});

		$("#save-modal-data-btn").on('click', async function() {
			$(this).attr('disabled', 'true');
			// get user token
			const userToken = await getUserToken();

			// Prepare Data
			const formData = $('#modal-add-form').serializeArray();

			if( processErrorValidation(formData) ) {
				$(this).removeAttr('disabled');

				return;
			}

			let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

			if ( assignCoachesData.length > 0 ) {
				const courseCoaches = assignCoachesData.map(function(value){
					return value.id
				});

				transformedData['course_coaches'] = JSON.stringify(courseCoaches);
			}

			if ( courseClasses.length > 0 ) {
				const formatedCourseClasses = courseClasses.map(function(value){
					value.change_coach = value.change_coach ? 1 : 0;
					value.change_venue = value.change_venue ? 1 : 0;

					return value
				});

				transformedData['course_classes'] = formatedCourseClasses;

				if( processCourseClassesTimeValidation(transformedData['course_classes']) ) {
					$(this).removeAttr('disabled');

					return;
				}
			}
			
			// Map and find the value of selected course Type
			const courseTypes = <?= json_encode($course_types) ?>;
			if ( courseTypes )
				courseTypes.forEach((value) => {
					if ( $(`.course-type-${value.id}`).is(':checked') )
						transformedData['course_type'] = value.id
				})

			if ( selectedCourseID == '' && formAction == 'add' )
				// API Request to save level
				await axios.post('/api/course/add', transformedData, {
						headers: {
							'Content-Type': 'application/json',
							'Authorization': 'Bearer ' + userToken
						}
					}).then(response => {
						window.location = window.location
					})
					.catch(error => {
						$(this).removeAttr('disabled');
						// Handle errors
						console.error('Error fetching data:', error);
					});

			if ( selectedCourseID != '' && formAction == 'update' ) {
				// API Request to update vanue
				await axios.put(`/api/course/update/${selectedCourseID}`, transformedData, {
						headers: {
							'Content-Type': 'application/json',
							'Authorization': 'Bearer ' + userToken
						}
					}).then(response => {
						window.location = window.location
					})
					.catch(error => {
						$(this).removeAttr('disabled');
						// Handle errors
						console.error('Error fetching data:', error);
					});
			}
				
		});

		$('#archive-course').on('click', async function(){
			$(this).attr('disabled', 'true');
			
			// get user token
			const userToken = await getUserToken();

			await axios.delete(`/api/course/archive/${selectedCourseID}`, {
					headers: {
						'Content-Type': 'application/json',
						'Authorization': 'Bearer ' + userToken
					}
				}).then(response => {
					window.location = window.location
				})
				.catch(error => {
					$(this).removeAttr('disabled');
					// Handle errors
					console.error('Error fetching data:', error);
				});
		});

		function generateVenueFacilitiesDetail( name ) {
			return `<li style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;"><span style="color: rgb(122, 122, 122);">${name}</span></li>`;
		}

		function generateSelectedFacilityList( facilities ) {
			$('#facility-select_field').empty();

			$('#facility-select_field').append('<option value="">Please Select Venue</option>')

			if( facilities.length < 1 )
				return;
			
			facilities.forEach(function(facility){
				const content = `<option value="${facility.id}">${facility.name}</option>`;

				$('#facility-select_field').append(content)
			});
		}

		function assignCoaches( coachesData, index ) {
			const template = generateCoachesData(coachesData, index)
			
			$('#coach-container').append(template);
		}

		function generateCoachesData( data, index ) {
			return `
				<div class="d-xxl-flex align-items-xxl-center" style="height: 48px;background: #ffffff;border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding: 20px;">
					<div class="col-xxl-11 w-auto mr-4">
						<label class="col-form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">${data.name}</label>
					</div>
					<div class="col cursor-pointer d-flex gap-1">
						<div class="remove-coach" data-coach_id="${index}">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg" style="width: 16px; height: 16px;">
								<path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
								<path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
							</svg>
						</div>
					</div>
				</div>
			`;
		}

		function refreshCoachList() {
			$('#coach-container').empty();

			assignCoachesData.forEach((element, key) => {
				assignCoaches(element, key)
			});
		}

		function generateclassFormCard( data, index ) {

			return `<div class="card class-form-${data.temp_id}">
						<div class="card-body">
							<h4 class="d-xxl-flex justify-content-between align-items-xxl-center card-title" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">
								Class #${index + 1}
								<span class="remove-class-btn cursor-pointer" data-index="${data.temp_id}">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor">
										<path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
									</svg>
								</span>
							</h4>
							<div class="d-xxl-flex align-items-xxl-center mb-4">
								<div class="col" style="margin-right: 10px;">
									<div class="form-inline" style="width: 100%;margin-right: 10px;">
										<div class="form-group">
											<label class="form-label" style="color: #636363;font-size: 14px;">Date <span class="text-danger">*</span></label>
											<div class="input-group">
												<span class="input-group-text" style="background: #F5F5F5;border-style: none;">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
														<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
													</svg>
												</span>
												<input type="date" class="form-control" data-field_name="start_date" data-temp_id="${data.temp_id}" value="${data.start_date}" style="background: #F5F5F5;border-style: none;">
											</div>
										</div>
									</div>
								</div>
								<div class="col" style="margin-right: 10px;margin-left: 10px;">
									<div class="form-inline" style="width: 100%;margin-right: 10px;">
										<div class="form-group">
											<label class="form-label" style="color: #636363;font-size: 14px;">Start time <span class="text-danger">*</span></label>
											<div class="input-group">
												<span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
														<path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
													</svg>
												</span>
												<input type="time" class="form-control form-control" data-field_name="start_time" data-temp_id="${data.temp_id}" value="${data.start_time}" style="color: #3B3B3B;background: #F5F5F5;border-style: none;">
											</div>
										</div>
									</div>
								</div>
								<div class="col" style="margin-left: 10px;">
									<label class="form-label" style="color: #636363;font-size: 14px;">End time <span class="text-danger">*</span></label>
									<div class="input-group">
										<span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
												<path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
											</svg>
										</span>
										<input type="time" class="form-control form-control" data-field_name="end_time" data-temp_id="${data.temp_id}" value="${data.end_time}" style="color: #3B3B3B;background: #F5F5F5;border-style: none;">
									</div>
								</div>
							</div>
							<div class="col d-xxl-flex align-items-xxl-center">
								<div class="form-check" style="margin-right: 20px;">
									<input type="checkbox" class="form-check-input" data-field_name="change_coach" data-temp_id="${data.temp_id}" ${data.change_coach ? "checked" : ""}>
									<label class="form-check-label" for="formCheck-1" style="color: #3B3B3B;font-size: 14px;">Change Coach (only this class)</label>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" data-field_name="change_venue" data-temp_id="${data.temp_id}" ${data.change_venue ? "checked" : ""}>
									<label class="form-check-label" for="formCheck-2" style="color: #3B3B3B;font-size: 14px;">Change Venue / Facility (only this class)</label>
								</div>
							</div>
						</div>
					</div>`;
		}

		function refreshClassFormCard() {
			$('#classes-container').empty();

			courseClasses.forEach((element, key) => {
				if ( element.removed )
					return;

				const generatedclassFormCard = generateclassFormCard(element, key);

				$('#classes-container').append(generatedclassFormCard);
			});
		}

		function populateAssignedCoachList( coachID ) {
			// Populate Display of assigned coaches
			const coachData = {
				id: coachID,
				name: "Test " + coachID,
			};

			// check if the selected coach is already on the list
			const coach = assignCoachesData.find((value) => value.id == coachID);

			if( coach )
				return;

			assignCoachesData.push(coachData);

			assignCoaches(coachData, assignCoachesData.length - 1);
		}

		function resetModalForm() {
			courseClasses = [];
			errors = [];
			assignCoachesData = [];
			selectedCourseID = "";

			refreshClassFormCard();
			refreshCoachList();

			$('#course-modal input').val("");
			$('#course-modal select').val("");
			$('select[name=course_status]').val("Published");
			$('input[name=course_type]').removeAttr('checked');
			$('[name="course_remarks"]').val('');
			
			
		}

		function processErrorValidation(formData) {
			const requiredFields = ['course_level', 'venue', 'course_size', 'course_full_price'];
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

		function processCourseClassesTimeValidation(data) {
			let errorCount = 0;

			data.forEach((value, index) => {
				const startTimeSelector = $(`.class-form-${index+1} [data-field_name="start_time"]`);
				const startTime = value.start_time;

				const endTimeSelector = $(`.class-form-${index+1} [data-field_name="end_time"]`);
				const endTime = value.end_time;

				const startDateSelector = $(`.class-form-${index+1} [data-field_name="start_date"]`);

				// Clean the field first
				startTimeSelector.parent().removeClass('border border-danger');
				endTimeSelector.parent().removeClass('border border-danger');
				startDateSelector.parent().removeClass('border border-danger');
				
				if ( startTimeSelector.parent().next().is('p') )
					startTimeSelector.parent().next().remove();

				if ( endTimeSelector.parent().next().is('p') )
					endTimeSelector.parent().next().remove();

				if ( startDateSelector.parent().next().is('p') )
					startDateSelector.parent().next().remove();
				// End of field clean up

				// Start Time and End Time Validation
				if ( startTime > endTime ) {
					errorCount++;

					startTimeSelector.parent().addClass('border border-danger');
					startTimeSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">Cannot be greater than the End Time</p>`)
				}

				if ( endTime < startTime ) {
					errorCount++;

					endTimeSelector.parent().addClass('border border-danger');
					endTimeSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">Cannot be less than the Start Time</p>`)
				}
				// End of Time Validation

				// Required Field Validation
				if ( value.start_date == '' ) {
					errorCount++;

					startDateSelector.parent().addClass('border border-danger');
					startDateSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">Start Date is Required</p>`)
				}

				if ( value.start_time == '' ) {
					errorCount++;

					startTimeSelector.parent().addClass('border border-danger');
					startTimeSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">Start Time is Required</p>`)
				}

				if ( value.end_time == '' ) {
					errorCount++;
					
					endTimeSelector.parent().addClass('border border-danger');
					endTimeSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">End Time is Required</p>`)
				}

			});

			if ( errorCount )
				return true

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

		function renderErrors() {
			if ( errors.length > 0 ) {
				errors.forEach((element) => {
					$(`[name="${element.field_name}"]`).addClass('border border-danger');
					$(`[name="${element.field_name}"]`).after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`)
				});
			}
		}

		function initializeCourModuleInputAction() {
			$('#course-modal input').on('change', function(){
				const fieldName = $(this).data('field_name');
			
				const tempID = $(this).data('temp_id');
				let value = $(this).val();

				const classIndex = courseClasses.findIndex((value) => value.temp_id == tempID);

				// check input checkbox
				if( fieldName == 'change_coach' || fieldName == 'change_venue' )
					value = $(`[data-field_name="${fieldName}"]`).is(":checked")

				if (fieldName && (classIndex == 0 || classIndex))
					courseClasses[classIndex][fieldName] = value;
			});

			$('#course-modal .remove-class-btn').on('click', '', function() {
				const index = $(this).data('index');

				const courseClassIndex = courseClasses.findIndex((value) => value.temp_id == index);

				courseClasses.splice(courseClassIndex, 1);

				refreshClassFormCard();
				initializeCourModuleInputAction();
			});
		}

		function initializeCoachAction() {
			$('#course-modal .remove-coach').on('click', function() {
				const coachIndex = $(this).data('coach_id');

				assignCoachesData.splice(coachIndex, 1);
				
				refreshCoachList();
			});
		}

		$('input').on('change', function(){
			$(this).removeClass('border border-danger');
			
			if( $(this).next().is('p') )
				$(this).next().remove();
		})

		$('select').on('change', function(){
			$(this).removeClass('border border-danger');
			
			if( $(this).next().is('p') )
				$(this).next().remove();
		})

		initializeCourModuleInputAction();
		initializeCoachAction();
	});
</script>
@endsection