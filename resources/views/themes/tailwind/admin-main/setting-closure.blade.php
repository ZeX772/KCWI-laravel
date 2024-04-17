@extends('theme::layouts.app')


@section('content')
<div style="height: 100vh;background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;padding: 20px;">
	<x-page-content-heading 
		heading="Setting - Closure" 
		withButton="true"
		withIcon="true"
		icon="plus"
		buttonModalTarget="#closure-modal" 
		buttonType="button"
		buttonId="add-closure-btn"
		buttonTitle="Add Closure"
		secondBtnRoute="{{ route('wave.user.admin-main.setting-closure-category') }}"
		secondButtonId="categories-btn"
		withIconSecondBtn="true"
		secondBtnIcon="caret-right"
		secondBtnTitle="Categories"
	/>
	<?php $count = 0; ?>
	@foreach($data as $key => $value)
		<div class="mt-5">
			<div class="d-flex gap-2">
				<span class="d-flex align-items-center cursor-pointer" data-toggle="collapsible" data-target="#collapse-{{ $key }}">
					<i class="fa-solid fa-caret-{{ $count == 0 ? 'down' : 'up' }}"></i>
				</span>
				<h1 style="color: #3B3B3B;font-size: 20px;font-family: Poppins, sans-serif;font-weight: 500;">{{ $key }}</h1>
			</div>
			<div class="collapsible {{ $count == 0 ? '' : 'd-none' }}" id="collapse-{{ $key }}">
				@foreach($value as $closure)
					<div class="card edit-closure" style="margin-top: 10px;" data-year="{{ $key }}" data-id="{{ $closure['id'] }}" data-bs-toggle="modal" data-bs-target="#closure-modal">
						<div class="card-body d-xl-flex align-items-xl-center">
							<div class="col">
								<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">{{ $closure['closure_reason']['name'] }}</h1>
							</div>
							<div class="col" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">
								<div class="d-flex align-items-center">
									<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-calendar4" style="margin-right: 10px; width: 20px;">
										<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"></path>
									</svg>
									<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">
										{{ formatDate($closure['start_date'], 'M d') . ' - ' . formatDate($closure['end_date'], 'M d') }}
									</h1>
								</div>
							</div>
							<div class="col">
								<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">{{ formatDate($closure['start_time'], 'h:i A') . ' - ' . formatDate($closure['end_time'], 'h:i A') }}</h1>
							</div>
							@if( $closure['all_venue'] )
								<div class="col">
									<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">All Venue</h1>
								</div>
							@else
								<div class="col">
									<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">{{ $closure['venue']['name'] }}</h1>
								</div>
							@endif
								<div class="col">
									<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">{{ $closure['closure_types']['name'] }}</h1>
								</div>
							@if( $closure['public_holiday'] )
								<div class="col">
									<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;"><i class="fa-solid fa-check"></i> Public Holiday</h1>
								</div>
							@else
								<div class="col">
									<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">-</h1>
								</div>
							@endif
							@if( $closure['repeat'] != "" )
								<div class="col">
									<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;"><i class="fa-solid fa-repeat"></i> {{ ucfirst($closure['repeat']) }}</h1>
								</div>
							@else
								<div class="col">
									<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">-</h1>
								</div>
							@endif
							<div class="col">
								<h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">Remark: {{ $closure['remarks'] }}</h1>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<?php $count++; ?>
	@endforeach
</div>

<div class="modal fade" role="dialog" tabindex="-1" id="closure-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
 		<div class="modal-content">
 			<div class="modal-header">
 				<h4 class="modal-title" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;font-weight: 500;">Add Closure</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
				<form id="modal-form">
					<div class="col">
						<div>
							<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Closure Reason <span class="text-danger">*</span></h1>
							<select name="reason" class="form-control" id="notificationType" style="height: 48px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
								<option value="" hidden>Select closure reason</option>
								@foreach($closure_reasons as $reason)
									<option value="{{ $reason['id'] }}">{{ $reason['name'] }}</option>
								@endforeach
								<option value="other">Other</option>
							</select>
						</div>
						<div style="padding-top: 20px;">
							<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Category <span class="text-danger">*</span></h1>
							<select name="closure_type" class="form-control" style="height: 48px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
								<option value="" hidden>Select Category</option>
								@foreach($closure_types as $closureType)
									<option value="{{ $closureType['id'] }}">{{ $closureType['name'] }}</option>
								@endforeach
							</select>
						</div>
						<div style="padding-top: 20px;">
							<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Venue <span class="text-danger">*</span></h1>
							<select id="venue-field" name="venue" class="form-control" style="height: 48px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
								<option value="" hidden>Select Venue</option>
								@foreach($school_venues as $schoolVenue)
									<option value="{{ $schoolVenue['id'] }}">{{ $schoolVenue['name'] }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-12 d-flex align-items-center gap-1 mt-2">
							<input type="checkbox" name="all_venue" tabindex="4" id="all-venue">
							<label for="all-venue">All Venue</label>
						</div>
						<div class="d-none facility-field_container" style="padding-top: 20px;">
							<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Facility</h1>
							<select name="facility" class="form-control" style="height: 48px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
								<option value="" hidden>Select Facility</option>
							</select>
						</div>
						<div class="col-12 d-flex align-items-center gap-1 mt-2 d-none facility-field_container">
							<input type="checkbox" name="all_facility" tabindex="4" id="all-facility">
							<label for="all-facility">All Facility</label>
						</div>
						<div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center mb-4" style="padding-top: 20px;">
							<div class="col" style="padding-right: 10px;">
								<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Start Date <span class="text-danger">*</span></h1>
								<div class="form-inline" style="width: 100%;margin-right: 10px;">
									<div class="form-group">
										<div class="input-group" style="height: 48px;">
											<span class="input-group-text" style="background: #F5F5F5;border-style: none;">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
													<path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
												</svg>
											</span>
											<input name="start_date" class="form-control" type="date" style="background: #F5F5F5;border-style: none;">
										</div>
									</div>
								</div>
							</div>
							<div class="col">
								<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">End Date <span class="text-danger">*</span></h1>
								<div class="form-inline" style="width: 100%;">
									<div class="form-group">
										<div class="input-group" style="height: 48px;">
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
						</div>
						<div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center mb-4">
							<div class="col" style="padding-right: 10px;">
								<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Start Time <span class="text-danger">*</span></h1>
								<div class="form-inline" style="width: 100%;margin-right: 10px;">
									<div class="input-group" style="height: 48px;">
										<span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
												<path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
											</svg>
										</span>
										<input name="start_time" class="form-control form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;">
									</div>
								</div>
							</div>
							<div class="col">
								<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">End Time <span class="text-danger">*</span></h1>
								<div class="form-inline" style="width: 100%;margin-right: 10px;">
									<div class="input-group" style="height: 48px;">
										<span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
												<path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
											</svg>
										</span>
										<input name="end_time" class="form-control form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;">
									</div>
								</div>
							</div>
						</div>
						<div style="padding-top: 20px;">
							<div class="d-xxl-flex align-items-xxl-center">
								<div class="form-check" style="margin-right: 20px;">
									<input type="checkbox" name="is_whole_day" class="form-check-input" id="is-wholeday-field">
									<label class="form-check-label" for="is-wholeday-field" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Whole Day</label>
								</div>
							</div>
						</div>
						<div style="padding-top: 20px;">
							<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Remarks</h1>
							<textarea name="remarks" style="width: 100%;height: 143px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;"></textarea>
						</div>
						<div style="padding-top: 20px;">
							<div class="d-xxl-flex align-items-xxl-center">
								<div class="form-check" style="margin-right: 20px;">
									<input type="checkbox" name="public_holiday" class="form-check-input" id="public-holiday">
									<label class="form-check-label" for="public-holiday" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Public Holiday</label>
								</div>
							</div>
							<div class="d-xxl-flex align-items-xxl-center">
								<div class="form-check" style="margin-right: 20px;">
									<input type="checkbox" class="form-check-input" id="repeat-field">
									<label class="form-check-label" for="repeat-field" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Repeat</label>
								</div>
							</div>
							<div class="d-none" id="repeat-selection">
								<div class="d-xxl-flex align-items-xxl-center">
									<x-form-select
										label="Repeatable Every" 
										name="repeat"
										id="repeat"
										isRequired="false"
									>
										<option value="" hidden>Select When to Repeat</option>
										<option value="year">Year</option>
										<option value="month">Month</option>
									</x-form-select>
								</div>
							</div>
						</div>
					</div>
				</form>

				<div id="delete-confimation" class="d-none">
					<p style="color: #FF4550;font-size: 20px;font-family: Poppins, sans-serif;">Are you sure to delete this closure?</p>
					<p style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">
						Closure has a time clash with another class at this period.
					</p>
				</div>
 			</div>
 			<div id="modal-form_actions" class="modal-footer d-xxl-flex justify-content-between align-items-xxl-center" style="border-top-style: none;">
				<div>
					<button id="cancel-btn" class="btn btn-light" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;" data-bs-toggle="modal" data-bs-target="#closure-modal">Close</button>
					<button id="modal-btn-delete" class="btn btn-light d-none" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(255,69,80);border: 2px solid #FF4550;">Delete</button>
				</div>
				<button id="modal-btn_save" class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;box-shadow: 0px 5px 0px #273040;">Save</button>
			</div>

			<div id="delete-confimation_actions" class="modal-footer d-none justify-content-between align-items-xxl-center" style="border-top-style: none;">
				<button id="delete-confirmation-cancel_btn" class="btn btn-light" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;">Cancel</button>
				<button id="delete-confirmation-proceed_btn" class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;box-shadow: 0px 5px 0px #273040;">Yes</button>
			</div>
 		</div>
 	</div>
</div>
@endsection

<style>
	.disabled {
		opacity: 0.5 !important;
	}
</style>

@section('script')
<script type="text/javascript">
	var errors = [];
	var selectedData = {};
	var modalTitle = "Closure";
	var formAction = "add";

	$(function() {
		$('[data-toggle="collapsible"]').on('click', function(){
			const target = $(this).data('target');

			$(target).toggleClass('d-none');
			$(this).children('i').toggleClass('fa-caret-down fa-caret-up');
		});

		$('#venue-field').change(function(){
			$('.facility-field_container').removeClass('d-none');

			const id = $(this).val();

			// Populate select for Facility base on selected venue
			const pageFacilitiesData = <?= json_encode($school_venue_facilities) ?>;
			const facilities = pageFacilitiesData.filter((value) => value.school_venue_id == id);
			
			$('.facility-field_container select').empty();
			$('.facility-field_container select').append(`<option value="" hidden>Select Facility</option>`);
			facilities.forEach(element => {
				$('.facility-field_container select').append(`<option value="${element.id}">${element.name}</option>`);
			});
		});

		$('#add-closure-btn').on('click', function(){
			formAction = "add";
			$('#closure-modal .modal-title').text("Add " + modalTitle);

			$('#modal-btn-delete').addClass('d-none');
			$('#modal-form input').val("");
			$('#modal-form select').val("");
			$('#modal-form textarea').val("");
			$('#modal-form input[name=is_whole_day]').removeAttr("checked");

			$('.facility-field_container').addClass('d-none');
			$('#all-facility').prop('checked', false);
			$('#all-venue').prop('checked', false);
			$('select[name=facility]').removeAttr('disabled');
			$('select[name=facility]').removeClass('disabled');
			$('#venue-field').removeAttr('disabled');
			$('#venue-field').removeClass('disabled');
			$('#facility-field_container').removeAttr('disabled');

			$('input').removeClass('border border-danger');
			if ( $('input').next().is('p') )
				$('input').next().remove();

			$('select').removeClass('border border-danger');
			if ( $('select').next().is('p') )
				$('select').next().remove();

			$('input').parent().removeClass('border border-danger');
			if ( $('input').parent().next().is('p') )
				$('input').parent().next().remove();

			$('select').parent().removeClass('border border-danger');
			if ( $('select').parent().next().is('p') )
				$('select').parent().next().remove();
		});

		$('select[name=reason]').on('change', function(e) {
			if($(this).val() === 'other') {
				$(`<div style="padding-top: 20px;">
					<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">New Reason <span class="text-danger">*</span></h1>
					<input name="new_reason_name" class="form-control" type="text" style="background: #F5F5F5;border-style: none;">
				</div>`).insertAfter($(this).parent());
			} else {
				$('input[name=new_reason_name]').parent().remove();
			}
		});

		$('.edit-closure').on('click', function(){
			formAction = "update";
			$('#closure-modal .modal-title').text("Update " + modalTitle);
			$('#modal-btn-delete').removeClass('d-none');
			$('input').removeClass('border border-danger');
			$('select').removeClass('border border-danger');

			const year = $(this).data('year');
			const id = $(this).data('id');

			const pageData = <?= json_encode($data) ?>;
			const data = pageData[year];
			const closure = data.find((value) => value.id == id);

			selectedData = closure;

			$('select[name=reason]').val(selectedData.closure_reason.id);
			$('select[name=closure_type]').val(selectedData.closure_type);
			$('select[name=venue]').val(selectedData?.venue?.id)
			if(selectedData.venue) {
				$('select[name=venue]').change();
			}
			$('select[name=facility]').val(selectedData?.facility?.id);
			$('input[name=start_date]').val(selectedData.start_date);
			$('input[name=end_date]').val(selectedData.end_date);
			$('input[name=start_time]').val(selectedData.start_time);
			$('input[name=end_time]').val(selectedData.end_time);
			$('input[name=all_venue]').prop('checked', selectedData.all_venue ? true : false);
			$('input[name=all_facility]').prop('checked', selectedData.all_facility ? true : false);

			$('#closure-modal input[name=start_date]').attr('max', selectedData.end_date);
			$('#closure-modal input[name=end_date]').attr('min', selectedData.start_date);

			if ( selectedData.is_whole_day == 1 )
				$('input[name=is_whole_day]').attr('checked', true);
			else
				$('input[name=is_whole_day]').removeAttr('checked');

			if ( selectedData.public_holiday == 1 )
				$('input[name=public_holiday]').attr('checked', true);
			else
				$('input[name=public_holiday]').removeAttr('checked');

			if ( selectedData.all_venue == 1 )
				$('input[name=all_venue]').attr('checked', true).trigger('change');
			else
				$('input[name=all_venue]').removeAttr('checked').trigger('change');

			if ( selectedData.repeat != '' && selectedData.repeat !== null)
				$('#repeat-field').attr('checked', true).trigger('change');
			else
				$('#repeat-field').removeAttr('checked').trigger('change');
			
			$('select[name=repeat]').val(selectedData.repeat);
			$('[name="remarks"]').val(selectedData.remarks);
		});
		
		$('#modal-form').on('change', '#all-venue', function(){
			const isChecked = $(this).is(':checked');

			if( isChecked ) {
				$('#venue-field').attr('disabled', true);
				$('#venue-field').addClass('disabled');
				$('select[name=facility]').attr('disabled', true);
				$('select[name=facility]').addClass('disabled');
				$('#all-facility').prop('checked', true);
				$('#all-facility').prop('disabled', true);
			} else {
				$('#venue-field').removeAttr('disabled');
				$('#venue-field').removeClass('disabled');
				$('select[name=facility]').removeAttr('disabled');
				$('select[name=facility]').removeClass('disabled');
				$('#all-facility').prop('checked', false);
				$('#all-facility').prop('disabled', false);
			}
				
		});

		$('#modal-form').on('change', '#all-facility', function(){
			const isChecked = $(this).is(':checked');

			if( isChecked ) {
				$('select[name=facility]').attr('disabled', true);
				$('select[name=facility]').addClass('disabled');
			} else {
				$('select[name=facility]').removeAttr('disabled');
				$('select[name=facility]').removeClass('disabled');
			}
				
		});

		$('#modal-form').on('change', '#repeat-field', function(){
			const isChecked = $(this).is(':checked');

			if( isChecked ) {
				$('#repeat-selection').removeClass('d-none');

			} else {
				$('#repeat-selection').addClass('d-none');

			}
		});

		$('#modal-btn-delete').on('click', function() {
			$('#closure-modal .modal-title').text("Delete Confirmation");

			$('#delete-confimation').toggleClass('d-none');
			$('#delete-confimation_actions').toggleClass('d-none d-xxl-flex');

			$('#modal-form').toggleClass('d-none');
			$('#modal-form_actions').toggleClass('d-none d-xxl-flex');
		})

		$('#delete-confirmation-cancel_btn').on('click', function() {
			$('#closure-modal .modal-title').text("Update " + modalTitle);

			$('#delete-confimation').toggleClass('d-none');
			$('#delete-confimation_actions').toggleClass('d-none d-xxl-flex');

			$('#modal-form').toggleClass('d-none');
			$('#modal-form_actions').toggleClass('d-none d-xxl-flex');
		})

		$("#modal-btn_save").on('click', async function() {
			$(this).attr('disabled', 'true');
			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#modal-form').serializeArray();

			let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

			transformedData['is_whole_day'] = $('input[name=is_whole_day]').is(':checked') ? 1 : 0;
			transformedData['all_venue'] = $('input[name=all_venue]').is(':checked') ? 1 : 0;
			transformedData['all_facility'] = $('input[name=all_facility]').is(':checked') ? 1 : 0;
			transformedData['public_holiday'] = $('input[name=public_holiday]').is(':checked') ? 1 : 0;

			let requiredFields = ['reason', 'closure_type', 'venue', 'start_date', 'end_date', 'start_time', 'end_time'];
			if( transformedData['all_venue'] )
				requiredFields = ['reason', 'closure_type', 'start_date', 'end_date', 'start_time', 'end_time'];

			if( !transformedData['all_venue'] && !transformedData['all_facility'] )
				requiredFields.push('facility')

			if( transformedData['reason'] === 'other' )
				requiredFields.push('new_reason_name');

			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}
			// $(this).removeAttr('disabled');
			console.log(transformedData);
			// return;

			if ( formAction == "add" )
				await axios.post(`${getApiUrl()}/closure/add`, transformedData, {
						headers: {
							'Content-Type': 'application/json',
							'Authorization': 'Bearer ' + userToken
						}
					}).then(res => {
						
						$('#closure-modal #cancel-btn').click();

                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");

                            window.location = window.location
                        } else {
							$(this).removeAttr('disabled');

                            toastInfo("Cant' Save", res.data.message, "warning");
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

			if ( formAction == "update" )
				await axios.post(`${getApiUrl()}/closure/update/${selectedData.id}`, transformedData, {
						headers: {
							'Content-Type': 'application/json',
							'Authorization': 'Bearer ' + userToken
						}
					}).then(res => {
						$('#closure-modal #cancel-btn').click();

                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");

                            window.location = window.location
                        } else {
							$(this).removeAttr('disabled');

                            toastInfo("Cant' Save", res.data.message, "warning");
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

		$("#delete-confirmation-proceed_btn").on('click', async function() {
			$(this).attr('disabled', 'true');
			// get user token
			const userToken = getUserToken();

			const transformedData = {
				id: [selectedData.id]
			}

			await axios.post(`${getApiUrl()}/closure/archive`, transformedData, {
					headers: {
						'Content-Type': 'application/json',
						'Authorization': 'Bearer ' + userToken
					}
				}).then(res => {
					$('#closure-modal #delete-confirmation-cancel_btn').click();
					$('#closure-modal #cancel-btn').click();
					
					if ( res.data.success ) {
						toastTopEnd("Success", res.data.message, "success");

						window.location = window.location
					} else {
						$(this).removeAttr('disabled');

						toastInfo("Cant' Save", res.data.message, "warning");
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

		function processErrorValidation(formData, requiredFields) {
			errors = [];
			
			let startTimeValue = '';
			let endTimeValue = '';

			formData.forEach(function(item) {
				if ( requiredFields.includes(item.name) ) {
					if( item.value == "" ){
						errors.push({
							field_name: item.name,
							message: formatString(item.name) + " is required."
						});
					}

					if( item.name == 'start_time' )
						startTimeValue = item.value

					if( item.name == 'end_time' )
						endTimeValue = item.value
				}
			});

			if ( startTimeValue > endTimeValue )
				errors.push({
					field_name: 'start_time',
					message: 'Cannot be greater than to End Time'
				});

			if ( endTimeValue < startTimeValue )
				errors.push({
					field_name: 'end_time',
					message: 'Cannot be less than to Start Time'
				});

			if ( errors.length > 0 ) {
				renderErrors();

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

		function renderErrors() {
			if ( errors.length > 0 ) {
				const onParentFields = ['start_date', 'end_date', 'start_time', 'end_time'];

				errors.forEach((element) => {
					// clear error fields
					$(`[name="${element.field_name}"]`).parent().removeClass('border border-danger');
					if( $(`[name="${element.field_name}"]`).parent().next().is('p') )
						$(`[name="${element.field_name}"]`).parent().next().remove();

					$(`[name="${element.field_name}"]`).removeClass('border border-danger');
					if( $(`[name="${element.field_name}"]`).next().is('p') )
						$(`[name="${element.field_name}"]`).next().remove();
					
					if ( onParentFields.includes(element.field_name) ) {
						$(`[name="${element.field_name}"]`).parent().addClass('border border-danger');
						$(`[name="${element.field_name}"]`).parent().after(`<p class="text-danger" style="position:absolute; font-size: 12px;">${element.message}</p>`)
					} else {
						$(`[name="${element.field_name}"]`).addClass('border border-danger');
						$(`[name="${element.field_name}"]`).after(`<p class="text-danger" style="position:absolute; font-size: 12px;">${element.message}</p>`)
					}
				});
			}
		}

		$('input').on('change', function(){
			$(this).removeClass('border border-danger');
			if ( $(this).next().is('p') )
				$(this).next().remove();

			$(this).parent().removeClass('border border-danger');
			if ( $(this).parent().next().is('p') )
				$(this).parent().next().remove();
		})

		$('select').on('change', function(){
			$(this).removeClass('border border-danger');
			if ( $(this).next().is('p') )
				$(this).next().remove();
		})

		$('#all-venue').on('change', function() {
			$('#venue-field').removeClass('border').removeClass('border-danger');

			if ( $('#venue-field').next().is('p') )
				$('#venue-field').next().remove();

			$('#venue-field').parent().removeClass('border border-danger');
			if ( $('#venue-field').parent().next().is('p') )
				$('#venue-field').parent().next().remove();

			$('select[name=facility]').removeClass('border').removeClass('border-danger');

			if ( $('select[name=facility]').next().is('p') )
				$('select[name=facility]').next().remove();

			$('select[name=facility]').parent().removeClass('border border-danger');
			if ( $('select[name=facility]').parent().next().is('p') )
				$('select[name=facility]').parent().next().remove();
		});

		$('#all-facility').on('change', function() {
			$('select[name=facility]').removeClass('border').removeClass('border-danger');

			if ( $('select[name=facility]').next().is('p') )
				$('select[name=facility]').next().remove();

			$('select[name=facility]').parent().removeClass('border border-danger');
			if ( $('select[name=facility]').parent().next().is('p') )
				$('select[name=facility]').parent().next().remove();
		});

		$('input[name=start_date]').on('change', function(){
			const value = $(this).val();

			$('input[name=end_date]').attr('min', value);
		});

		$('input[name=end_date]').on('change', function(){
			const value = $(this).val();
			
			$('input[name=start_date]').attr('max', value);
		});

		$('input[name=start_time]').on('change', function(){
			const value = $(this).val();

			$('input[name=end_date]').attr('min', value);
		});

		$('input[name=end_time]').on('change', function(){
			const value = $(this).val();

			$('input[name=start_date]').attr('max', value);
		});
	});
</script>
@endsection