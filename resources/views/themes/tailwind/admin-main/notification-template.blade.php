@extends('theme::layouts.app')


@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Notification - Template" 
        withButton="true"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#template-modal" 
        buttonType="button"
        buttonId="add-template_btn"
        buttonTitle="Add Template"
    />
    <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4 mt-4" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" role="tab">ALL</a>
        </li>
    </ul>
 	<div class="row" style="margin-top: 15px;">
        <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
 			<div class="tab-content custom-datatable_container" style="padding: 15px;">
 				<div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                    <div class="row template-filter-tab">
                        <div class="col-10 position-relative">
                            <x-search-input inputType="text" inputName="template_search" inputID="template_search" inputPlaceholder="Search..." />
                        </div>
                        <div class="col-2">
                            <x-form-select
                                label="" 
                                name="action"
                                id="bulk_action_btn"
                                isRequired="true"
                            >
                                <option value="" hidden>Actions</option>
                                <option value="activate">Activate</option>
                                <option value="deactivate">Deactivate</option>
                                <option value="archive">Archive</option>
                            </x-form-select>
                        </div>
                    </div>
 					<div class="table-responsive" style="height: auto;max-height: none;">
 						<table class="table table-hover custom-datatable" id="notification-template-table" style="width: 100%;">
 							<thead>
 								<tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
 									<th class="text-center"><input type="checkbox"></th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">TEMPLATE NAME</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">ADDED DATE</th>
 									<th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">STATUS</th>
 									<th></th>
 								</tr>
 							</thead>
 							<tbody style="height: auto;">
                                @foreach($data as $key => $template)
                                <tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="{{ $key }}">
                                    <td class="text-center"><input type="checkbox" class="check" data-id="{{ $template['id'] }}"></td>
                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $template['template_name'] }}</td>
                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ date("m/d/Y", strtotime($template['created_at'])) }}</td>
                                    <td style="color: #4CBC9A;font-family: Poppins, sans-serif;font-size: 12px;" class="{{ $template['status'] == 'Archived' || $template['status'] == 'Inactive' ? 'text-danger' : 'text-success' }}">{{ $template['status'] }}</td>
                                    <td>
                                        <div class="table-acitions_container d-flex gap-2">
                                            @if($template['status'] === 'Active')
                                            <button type="button" class="use-button" id="use-btn" data-row_index="{{ $key }}" data-bs-toggle="modal" data-bs-target="#notification-modal" style="margin-right: 5px;">
                                                <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="color: #3B3B3B;">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 2C2.34315 2 1 3.34315 1 5V9V10V19C1 20.6569 2.34315 22 4 22H12C12.5523 22 13 21.5523 13 21C13 20.4477 12.5523 20 12 20H4C3.44772 20 3 19.5523 3 19V10V9C3 8.44772 3.44772 8 4 8H11.7808H13.5H20.1C20.5971 8 21 8.40294 21 8.9V9C21 9.55228 21.4477 10 22 10C22.5523 10 23 9.55228 23 9V8.9C23 7.29837 21.7016 6 20.1 6H13.5H11.7808L11.3489 4.27239C11.015 2.93689 9.81505 2 8.43845 2H4ZM4 6C3.64936 6 3.31278 6.06015 3 6.17071V5C3 4.44772 3.44772 4 4 4H8.43845C8.89732 4 9.2973 4.3123 9.40859 4.75746L9.71922 6H4ZM20 13C20 12.4477 19.5523 12 19 12C18.4477 12 18 12.4477 18 13V16H15C14.4477 16 14 16.4477 14 17C14 17.5523 14.4477 18 15 18H18V21C18 21.5523 18.4477 22 19 22C19.5523 22 20 21.5523 20 21V18H23C23.5523 18 24 17.5523 24 17C24 16.4477 23.5523 16 23 16H20V13Z" fill="#000000"/>
                                                </svg>
                                            </button>
                                            @endif
                                            <button type="button" class="edit-button" id="edit-btn" data-row_index="{{ $key }}" data-bs-toggle="modal" data-bs-target="#template-modal" style="margin-right: 5px;">
                                                <svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="color: #3B3B3B;">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                </svg>
                                            </button>
                                            @if($template['status'] === 'Active')
                                            <button type="button" class="delete-button" id="delete-btn" data-row_index="{{ $key }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;">
                                                    <path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path>
                                                    <path d="M9 9H11V17H9V9Z" fill="currentColor"></path>
                                                    <path d="M13 9H15V17H13V9Z" fill="currentColor"></path>
                                                </svg>
                                            </button>
                                            @endif
                                            @if( isSuperAdmin() && $template['status'] == 'Archived' )
                                            <button type="button" class="unarchive-button" id="unarchive-btn" data-row_index="{{ $key }}">
                                                <i class="fa-solid fa-trash-arrow-up"></i>
                                            </button>
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
		<!-- Detail Section -->
 		<div class="col">
 			<div class="card">
 				<div class="card-body">
 					<div class="col">
 						<div>
 							<h1 class="fw-semibold" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;text-align: center;">Template</h1>
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
 											<h1 id="detail-status" style="color: #4CBC9A;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Template Name</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-template-name" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
 										</div>
 									</div>
 									<div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Upload Date</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-upload-date" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
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
<!-- ADD TEMPLATE MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="template-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Add Template</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
				<form id="modal-add-form">
					<div class="col" style="width: 100%;">
						<div class="container" style="padding: 0px;color: #636363;">
							<div class="form-inline">
								<div class="form-group">
                                    <x-form-input 
                                        label="Template Name" 
                                        type="text" 
                                        name="template_name"
                                        id="template_name"
                                        isRequired="true"
                                        tabindex="1"
                                        class="form-control"
                                    />
								</div>
							</div>
						</div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
                                    <x-form-input 
                                        label="Title" 
                                        type="text" 
                                        name="title"
                                        id="title"
                                        isRequired="true"
                                        tabindex="1"
                                        class="form-control"
                                    />
								</div>
							</div>
						</div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Content <span class="text-danger">*</span></label>
                                    <textarea id="content" name="content" tabindex="2" class="form-control" placeholder="Enter content..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
								</div>
							</div>
						</div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div onclick="document.getElementById('attachment').click()" style="cursor:pointer;width: 177px;height: 115px;padding: 20px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;text-align: center;margin-top: 10px;border: 1px dashed #4A5C7A;border-bottom-width: 1px;">
                                <button class="btn btn-primary" type="button" disabled style="width: 40px;height: 40px;background: #F5F5F5;border-style: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg" style="color: #4A5C7A;">
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                    </svg>
                                    <img src="{{ asset('themes/tailwind/images/clipboard-image-50.png') }}" style="margin-top: -2px" class="d-none">
                                </button>
                                <h1 style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;margin-top: 10px; overflow: hidden; text-overflow: ellipsis;">Attachment</h1>
                            </div>
                            <input type="file" name="attachment" id="attachment" class="d-none">
						</div>

						<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
                                    <x-form-select
                                        label="Status"
                                        name="status"
                                        id="status"
                                        isRequired="true"
                                        tabindex="5"
                                        class="form-control"
                                    >
                                        <option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
                                    </x-form-select>
								</div>
							</div>
						</div>
					</div>
				</form>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" id="cancel-btn"  class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button type="button" id="save-modal-data-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
			</div>
 		</div>
 	</div>
</div>
<!-- ADD ANNOUNCEMENT MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="notification-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Notification</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
				<form id="modal-add-form">
					<div class="col" style="width: 100%;">
                        <div class="container" style="padding: 0px;color: #636363;">
                            <div class="form-inline">
								<div class="form-group">
									<label for="" class="form-label form-input-label">Notification Types <span class="text-danger">*</span></label>
									<div class="d-flex gap-3">
										<div class="d-flex align-items-center gap-2">
											<input type="checkbox" name="notification_types[]" tabindex="6" id="notification-announcement" checked>
											<label for="notification-announcement">Announcement</label>
										</div>
										<div class="d-flex align-items-center gap-2">
											<input type="checkbox" name="notification_types[]" tabindex="7" id="notification-news" checked>
											<label for="notification-news">News</label>
										</div>
                                        <div class="d-flex align-items-center gap-2">
											<input type="checkbox" name="notification_types[]" tabindex="8" id="notification-urgent-news" checked>
											<label for="notification-urgent-news">Urgent News</label>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
                                    <x-form-select
                                        label="Notification Type" 
                                        name="notification_type"
                                        id="notification_type"
                                        isRequired="true"
                                        tabindex="5"
                                        class="form-control"
                                    >
                                        <option value="" hidden>Please select the type</option>
                                        <option value="all-student">All student</option>
                                        <option value="by-course">By Course</option>
                                        <option value="by-class">By Class</option>
                                        <option value="individual">Individual</option>
                                    </x-form-select>
								</div>
							</div>
						</div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
									<label for="" class="form-label form-input-label">Send Via <span class="text-danger">*</span></label>
									<div class="d-flex gap-3">
										<div class="d-flex align-items-center gap-2">
											<input type="checkbox" name="send_via" tabindex="6" id="via-email" checked>
											<label for="via-email">Via Email</label>
										</div>
										<div class="d-flex align-items-center gap-2">
											<input type="checkbox" name="send_via" tabindex="7" id="via-app" checked>
											<label for="via-app">Via App</label>
										</div>
									</div>
								</div>
							</div>
						</div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
                                    <x-form-select
                                        label="Template" 
                                        name="template_id"
                                        id="template_id"
                                        isRequired="true"
                                        tabindex="5"
                                        class="form-control"
                                    >
                                        <option value="customize" selected>Customize</option>
                                        @foreach($data as $template)
                                        <option value="{{ $template['id'] }}">{{ $template['template_name'] }}</option>
                                        @endforeach
                                    </x-form-select>
								</div>
							</div>
						</div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
                                    <x-form-input 
                                        label="Title" 
                                        type="text" 
                                        name="title"
                                        id="title"
                                        isRequired="true"
                                        tabindex="1"
                                        class="form-control"
                                    />
								</div>
							</div>
						</div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Content <span class="text-danger">*</span></label>
                                    <textarea id="notification-content" name="content" tabindex="2" class="form-control" placeholder="Enter content..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
								</div>
							</div>
						</div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline" style="width: 100%;">
								<div class="form-group">
									<label for="datetime_to_send" class="form-label form-input-label">Schedule Notification to send</label>
									<div class="d-flex gap-1">
										<div class="col-6">
											<input name="datetime_to_send" id="datetime_to_send" tabindex="3" class="form-control form-input-date" type="datetime-local">
										</div>
									</div>
									<div class="col-12 d-flex align-items-center gap-1 mt-2">
										<input type="checkbox" name="send_immediately" tabindex="4" id="send-immediately" checked>
										<label for="send-immediately">Publish Immediately</label>
									</div>
								</div>
							</div>
						</div>

						<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Remarks</label>
                                    <textarea id="remarks" name="remarks" tabindex="2" class="form-control" placeholder="Remarks..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
								</div>
							</div>
						</div>

						<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline">
								<div class="form-group">
                                    <x-form-select
                                        label="Status"
                                        name="status"
                                        id="status"
                                        isRequired="true"
                                        tabindex="5"
                                        class="form-control"
                                    >
                                        <option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
                                    </x-form-select>
								</div>
							</div>
						</div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div onclick="document.getElementById('attachment').click()" style="cursor:pointer;width: 177px;height: 115px;padding: 20px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;text-align: center;margin-top: 10px;border: 1px dashed #4A5C7A;border-bottom-width: 1px;">
                                <button class="btn btn-primary" type="button" disabled style="width: 40px;height: 40px;background: #F5F5F5;border-style: none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg" style="color: #4A5C7A;">
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                    </svg>
                                    <img src="{{ asset('themes/tailwind/images/clipboard-image-50.png') }}" style="margin-top: -2px" class="d-none">
                                </button>
                                <h1 style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;margin-top: 10px; overflow: hidden; text-overflow: ellipsis;">Attachment</h1>
                            </div>
                            <input type="file" name="attachment" id="attachment" class="d-none">
						</div>
					</div>
				</form>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" id="cancel-btn"  class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button type="button" id="save-modal-data-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
			</div>
 		</div>
 	</div>
</div>

<!-- SELECT COURSE MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="select-course-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Course</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
                <div class="row">
                    <div class="col" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
                        <div class="tab-content custom-datatable_container" style="padding: 15px;">
                            <div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                                <div class="row announcement-filter-tab">
                                    <div class="col-10 position-relative">
                                        <x-search-input inputType="text" inputName="course_search" inputID="course_search" inputPlaceholder="Search..." />
                                    </div>
                                    <div class="col-2">
                                        <x-form-select
                                            label="" 
                                            name="action"
                                            id="filter_courses_by_level_btn"
                                            isRequired="true"
                                        >
                                            <option value="" hidden>Level</option>
                                            @foreach($levels as $key => $level)
                                            <option value="{{ $level['abbreviation'] }}">{{ $level['name'] }}</option>
                                            @endforeach
                                        </x-form-select>
                                    </div>
                                </div>
                                <div class="table-responsive" style="height: auto;max-height: none;">
                                    <table class="table table-hover custom-datatable" id="courses-table" style="width: 100%;">
                                        <thead>
                                            <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                                <th class="text-center"></th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COURSE CODE</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">LEVEL</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">VENUE</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COACH</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">TOTAL FEE (RM)</th>
                                            </tr>
                                        </thead>
                                        <tbody style="height: auto;">
                                            @foreach($courses as $key => $course)
                                            <tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="{{ $key }}">
                                                <td class="text-center"><input type="checkbox" class="check" data-id="{{ $course['id'] }}"></td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $course['course_abbreviation'] }}</td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $course['level']['abbreviation'] }}</td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $course['venue_data']['short_name'] ?? '' }}</td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">
                                                    @if(count($course['coaches'] ?? []) > 0)
                                                    <div>
                                                        @foreach($course['coaches'] as $coach)
                                                        <span>{{ $coach['name'] }}</span>
                                                        @endforeach
                                                    </div>
                                                    @else
                                                    <span>-</span>
                                                    @endif
                                                </td>
										        <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $course['course_full_price'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Close</button>
				<button type="button" id="add-courses-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Add</button>
			</div>
 		</div>
 	</div>
</div>

<!-- SELECT CLASS MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="select-class-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Class</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
                <div class="row">
                    <div class="col" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
                        <div class="tab-content custom-datatable_container" style="padding: 15px;">
                            <div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                                <div class="row announcement-filter-tab">
                                    <div class="col-10 position-relative">
                                        <x-search-input inputType="text" inputName="class_search" inputID="class_search" inputPlaceholder="Search..." />
                                    </div>
                                    <div class="col-2">
                                        <x-form-select
                                            label="" 
                                            name="action"
                                            id="filter_classes_by_level_btn"
                                            isRequired="true"
                                        >
                                            <option value="" hidden>Level</option>
                                            @foreach($levels as $key => $level)
                                            <option value="{{ $level['abbreviation'] }}">{{ $level['name'] }}</option>
                                            @endforeach
                                        </x-form-select>
                                    </div>
                                </div>
                                <div class="table-responsive" style="height: auto;max-height: none;">
                                    <table class="table table-hover custom-datatable" id="classes-table" style="width: 100%;">
                                        <thead>
                                            <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                                <th class="text-center"></th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">CLASS CODE</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">LEVEL</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">VENUE</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COACH</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">DATE</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">TIME</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">TOTAL FEE (RM)</th>
                                            </tr>
                                        </thead>
                                        <tbody style="height: auto;">
                                            @foreach($classes as $key => $class)
                                            <tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="{{ $key }}">
                                                <td class="text-center"><input type="checkbox" class="check" data-id="{{ $class['id'] }}"></td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $class['course_class_code'] }}</td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $class['course']['level']['abbreviation'] }}</td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $class['course']['venue']['short_name'] ?? '' }}</td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">-</td>
										        <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">
                                                    @if($class['end_date'])
                                                    {{ date("m/d/Y", strtotime($class['start_date'])).'-'.date("m/d/Y", strtotime($class['end_date'])) }}
                                                    @else
                                                    {{ date("m/d/Y", strtotime($class['start_date'])) }}
                                                    @endif
                                                </td>
										        <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ date("H:i", strtotime($class['start_time'])).'-'.date("H:i", strtotime($class['end_time'])) }}</td>
										        <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $class['course']['course_full_price'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Close</button>
				<button type="button" id="add-classes-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Add</button>
			</div>
 		</div>
 	</div>
</div>

<!-- SELECT STUDENT MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="select-student-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Select Student</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 			</div>
 			<div class="modal-body">
                <div class="row">
                    <div class="col" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
                        <div class="tab-content custom-datatable_container" style="padding: 15px;">
                            <div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                                <div class="row announcement-filter-tab">
                                    <div class="col-10 position-relative">
                                        <x-search-input inputType="text" inputName="student_search" inputID="student_search" inputPlaceholder="Search..." />
                                    </div>
                                    <div class="col-2">
                                        <x-form-select
                                            label="" 
                                            name="action"
                                            id="filter_students_by_level_btn"
                                            isRequired="true"
                                        >
                                            <option value="" hidden>Level</option>
                                            @foreach($levels as $key => $level)
                                            <option value="{{ $level['abbreviation'] }}">{{ $level['name'] }}</option>
                                            @endforeach
                                        </x-form-select>
                                    </div>
                                </div>
                                <div class="table-responsive" style="height: auto;max-height: none;">
                                    <table class="table table-hover custom-datatable" id="students-table" style="width: 100%;">
                                        <thead>
                                            <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                                <th class="text-center"></th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">NAME/ID</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">GENDER</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">LEVEL</th>
                                                <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">PHONE</th>
                                            </tr>
                                        </thead>
                                        <tbody style="height: auto;">
                                            @foreach($students as $key => $student)
                                            <tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="{{ $key }}">
                                                <td class="text-center"><input type="checkbox" class="check" data-id="{{ $student['id'] }}"></td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $student['name'] }}</td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $student['student_information']['gender'] ?? ''}}</td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $student['student_information']['level']['name'] ?? '' }}</td>
                                                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">{{ $student['student_information']['phone'] ?? ''}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Close</button>
				<button type="button" id="add-students-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Add</button>
			</div>
 		</div>
 	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
var selectedTemplateId = "";
var formAction = "add"
var modalTitle = "Template";
var errors = [];
var attachmentData = '';

var selectedCourses = [];
var selectedClasses = [];
var selectedStudents = [];

var courseTable = $('#select-course-modal #courses-table').DataTable({
    "paging": true,
    "ordering": true,
    "info": true,
    "aaSorting": [],
    "orderMulti": true,
    "searching": true,
    "lengthChange": false,
    "columns": [
        {"orderable": false, "searchable": false},
        {"orderable": true, "searchable": true},
        {"orderable": true, "searchable": true},
        {"orderable": true, "searchable": true},
        {"orderable": true, "searchable": true},
        {"orderable": true, "searchable": true},
    ]
});

var classTable = $('#select-class-modal #classes-table').DataTable({
    "paging": true,
    "ordering": true,
    "info": true,
    "aaSorting": [],
    "orderMulti": true,
    "searching": true,
    "lengthChange": false,
    "columns": [
        {"orderable": false, "searchable": false},
        {"orderable": true, "searchable": true},
        {"orderable": true, "searchable": true},
        {"orderable": true, "searchable": true},
        {"orderable": true, "searchable": true},
        {"orderable": true, "searchable": true},
        {"orderable": true, "searchable": true},
        {"orderable": true, "searchable": true},
    ]
});

var studentTable = $('#select-student-modal #students-table').DataTable({
    "paging": true,
    "ordering": true,
    "info": true,
    "aaSorting": [],
    "orderMulti": true,
    "searching": true,
    "lengthChange": false,
    "columns": [
        {"orderable": false, "searchable": false},
        {"orderable": true, "searchable": true},
        {"orderable": true, "searchable": true},
        {"orderable": true, "searchable": true},
        {"orderable": true, "searchable": true},
    ]
});

const recipientFields = [
    'selected-course-container',
    'selected-class-container',
    'selected-student-container'
];

$(function() {
    var table = $('#notification-template-table').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "aaSorting": [],
        "orderMulti": true,
        "searching": true,
        "lengthChange": false,
        "columns": [
            {"orderable": false, "searchable": false},
            {"orderable": true, "searchable": true},
            {"orderable": true, "searchable": false},
            {"orderable": true, "searchable": false},
            {"orderable": false, "searchable": false},
        ]
    });

    tinymce.init({
        selector: '#content',
        height: 300,
        auto_focus: '#tinymce'
        // other configuration options...
    });

    tinymce.init({
        selector: '#notification-content',
        height: 300,
        auto_focus: '#tinymce'
        // other configuration options...
    });

    $('#notification-template-table').on('click', 'tr', function() {
        const rowIndex = $(this).data('row_index');
        const courseData = <?= json_encode($data) ?>;
        const rowData = courseData[rowIndex];

        $('#detail-status').text(rowData.status);
        $('#detail-template-name').text(rowData.title);

        var uploadDate = new Date(rowData.created_at);
        var modifiedDate = new Date(rowData.updated_at);

        $('#detail-upload-date').text(uploadDate.toLocaleString('en'));
        $('#detail-modified-by').text(rowData.modified_by);
        $('#detail-modified-date').text(modifiedDate.toLocaleString('en'));
        $('#detail-modified_by').text( rowData.log ? rowData.log.user.name : '-' );
        $('#detail-updated_at').text( rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
    });

    $('#template_search').on('keyup', function() {
        var searchTerm = $(this).val();

        table.search(searchTerm).draw();
    });

    $('#add-template_btn').on('click', function() {
        $("#template-modal .modal-title").text("Add " + modalTitle);

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

    $('#notification-template-table .use-button').on('click', function() {
        const rowIndex = $(this).data('row_index');
        const templatesData = <?= json_encode($data) ?>;
        const selectedData = templatesData[rowIndex];

        $('#notification-modal #template_id').val(selectedData.id).trigger('change');
    });

    $('#notification-template-table .edit-button').on('click', function() {
        resetModalForm();

        $("#template-modal .modal-title").text("Update " + modalTitle);
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
        const templatesData = <?= json_encode($data) ?>;
        const selectedData = templatesData[rowIndex];
        const rowData = Object.entries(selectedData).map(([key, value]) => {
            return { key, value };
        });

        selectedTemplateId = selectedData.id;
        // Fill the input field with the selected data
        rowData.forEach(element => {
            $(`input[name=${element.key}]`).val(element.value);
            $(`select[name=${element.key}]`).val(element.value);
            $(`textarea[name=${element.key}]`).val(element.value);
            if(element.key === 'content') {
                tinymce.get('content').setContent(element.value);
            }
        });
    });

    $('#notification-template-table .delete-button').on('click', function(){
        const rowIndex = $(this).data('row_index');
        const courseData = <?= json_encode($data) ?>;
        const selectedData = courseData[rowIndex];

        selectedTemplateId = selectedData.id;

        Swal.fire({
            title: "Are you sure you want to archive this template?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#157347",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            cancelButtonText: "No"
        }).then(async (result) => {
            if ( result.isConfirmed ) {
                deleteNotiTemplate();
            }
        });
    });

    $('#notification-template-table .unarchive-button').on('click', function() {
        const rowIndex = $(this).data('row_index');
        const courseData = <?= json_encode($data) ?>;
        const selectedData = courseData[rowIndex];

        selectedTemplateId = selectedData.id;

        Swal.fire({
            title: "Are you sure you want to unarchive this template?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#157347",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            cancelButtonText: "No"
        }).then(async (result) => {
            if ( result.isConfirmed ) {
                unarchiveNotiTemplate();
            }
        });
    });

    $('#save-modal-data-btn').on('click', function() {
        $(this).attr('disabled', 'true');
        var content = tinymce.get('content').getContent();
        $('#content').val(content);
        const formData = $('#modal-add-form').serializeArray();

        if( processErrorValidation(formData) ) {
            $(this).removeAttr('disabled');

            return;
        }

        let transformedData = {};

        formData.forEach(function(item) {
            transformedData[item.name] = item.value;
        });

        if(attachmentData) {
            transformedData['attachment'] = attachmentData;
        }

        if ( selectedTemplateId == '' && formAction == 'add' )
            addNotiTemplate(transformedData);

        if ( selectedTemplateId != '' && formAction == 'update' ) {
            updateNotiTemplate(transformedData);
        }
    });

    $('#bulk_action_btn').on('change', function() {
        const value = $(this).val();

        if(value === 'activate') {
            const rows = $("#notification-template-table tbody tr .check");
            let rowsID = [];

            rows.each(function(){
                if( $(this).is(':checked') )
                    rowsID.push($(this).data('id'));
            });

            if( rowsID.length <= 0 ){
                toastTopEnd("Warning", "No entries selected", "warning");
            } else {
                // Show loading spinner
                var spinner = $('<div class="loading-container"><span class="loading"></span></div>').appendTo('#notification-template-table');

                Swal.fire({
                    title: "Are you sure you want to activate the selected templates?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#157347",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No"
                }).then(async (result) => {
                    if ( result.isConfirmed ) {
                        bulkActivateTemplates(rowsID);
                    }
                });

                spinner.remove();
            }
        }

        if(value === 'deactivate') {
            const rows = $("#notification-template-table tbody tr .check");
            let rowsID = [];

            rows.each(function(){
                if( $(this).is(':checked') )
                    rowsID.push($(this).data('id'));
            });

            if( rowsID.length <= 0 ){
                toastTopEnd("Warning", "No entries selected", "warning");
            } else {
                // Show loading spinner
                var spinner = $('<div class="loading-container"><span class="loading"></span></div>').appendTo('#notification-template-table');

                Swal.fire({
                    title: "Are you sure you want to deactivate the selected templates?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#157347",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No"
                }).then(async (result) => {
                    if ( result.isConfirmed ) {
                        bulkDeactivateTemplates(rowsID);
                    }
                });

                spinner.remove();
            }
        }

        if(value === 'archive') {
            const rows = $("#notification-template-table tbody tr .check");
            let rowsID = [];

            rows.each(function(){
                if( $(this).is(':checked') )
                    rowsID.push($(this).data('id'));
            });

            if( rowsID.length <= 0 ){
                toastTopEnd("Warning", "No entries selected", "warning");
            } else {
                // Show loading spinner
                var spinner = $('<div class="loading-container"><span class="loading"></span></div>').appendTo('#notification-template-table');

                Swal.fire({
                    title: "Are you sure you want to archive the selected templates?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#157347",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No"
                }).then(async (result) => {
                    if ( result.isConfirmed ) {
                        bulkArchiveTemplates(rowsID);
                    }
                });

                spinner.remove();
            }
        }

        $(this).val('');
    });

    $('#template-modal #attachment').on('change', function() {
        if($(this)[0].files.length < 1) {
            $(this).prev().find('h1').text('Attachment');
            $(this).prev().find('img').addClass('d-none');
            $(this).prev().find('svg').removeClass('d-none');

            attachmentData = '';
        } else {
            var file = $(this)[0].files[0];
            $(this).prev().find('h1').text(file.name);
            $(this).prev().find('img').removeClass('d-none');
            $(this).prev().find('svg').addClass('d-none');

 			var reader = new FileReader();

 			reader.onload = function(e) {
                const content = e.target.result.split(',')[1]; // Extract base64-encoded content

                attachmentData = {
                    name: file.name,
                    type: file.type,
                    size: file.size,
                    content: content
                };
 			};

 			// Read the file as a data URL
 			reader.readAsDataURL(file);
        }
    });

    $('#notification-modal #notification-announcement').on('change', function() {
        if($(this).prop('checked')) {
            $('#notification-modal #template_id').closest('.container').show();
        } else {
            $('#notification-modal #template_id').closest('.container').hide();
        }
    });

    $('#notification-modal #notification_type').on('change', function() {
        var buttonText = '';
        var buttonId = '';
        switch($(this).val()) {
            case 'by-course' :
                buttonText = 'Select Course';
                buttonId = 'select-course';
            break;
            case 'by-class' :
                buttonText = 'Select Class';
                buttonId = 'select-class';
            break;
            case 'individual' :
                buttonText = 'Select Student';
                buttonId = 'select-student';
            break;
        }

        if($(this).closest('.container').next().find('button').length > 0) {
            $(this).closest('.container').next().remove();
        }

        selectedCourses = [];
        selectedClasses = [];
        selectedStudents = [];
        if($('#notification-modal #selected-course-container').length > 0) {
            $('#notification-modal #selected-course-container').closest('.container').remove();

            $('#select-course-modal #courses-table tbody tr .check').prop('checked', false);
        }

        if($('#notification-modal #selected-class-container').length > 0) {
            $('#notification-modal #selected-class-container').closest('.container').remove();

            $('#select-class-modal #classes-table tbody tr .check').prop('checked', false);
        }

        if($('#notification-modal #selected-student-container').length > 0) {
            $('#notification-modal #selected-student-container').closest('.container').remove();

            $('#select-student-modal #students-table tbody tr .check').prop('checked', false);
        }

        if($(this).val() !== 'all-student' && $(this).val() !== '') {
            $(`<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                <div class="d-inline-block">
                    <button class="btn btn-primary custom-btn_primary" id="${buttonId}" type="button" data-bs-toggle="modal" data-bs-target="#${buttonId}-modal">
                        <div class="text-nowrap d-flex align-items-center ml-3 mr-3">
                            ${buttonText}
                        </div>
                    </button>
                </div>
            </div>`).insertAfter($(this).closest('.container'));
        }
    });

    $('#select-course-modal #course_search').on('keyup', function() {
        var searchTerm = $(this).val();

        courseTable.column(1).search(searchTerm).draw();
    });

    $('#select-class-modal #class_search').on('keyup', function() {
        var searchTerm = $(this).val();

        classTable.column(1).search(searchTerm).draw();
    });

    $('#select-student-modal #student_search').on('keyup', function() {
        var searchTerm = $(this).val();

        studentTable.column(1).search(searchTerm).draw();
    });

    $('#select-course-modal #filter_courses_by_level_btn').on('change', function() {
        var searchTerm = $(this).val();

        courseTable.column(2).search(searchTerm).draw();
    });

    $('#select-class-modal #filter_classes_by_level_btn').on('change', function() {
        var searchTerm = $(this).val();

        classTable.column(2).search(searchTerm).draw();
    });

    $('#select-student-modal #filter_students_by_level_btn').on('change', function() {
        var searchTerm = $(this).val();

        studentTable.column(3).search(searchTerm).draw();
    });

    $('#select-course-modal, #select-class-modal, #select-student-modal').on('show.bs.modal', function() {
        var modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('notification-modal'));
        modal.hide();
    });

    $('#select-course-modal, #select-class-modal, #select-student-modal').on('hidden.bs.modal', function() {
        var modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('notification-modal'));
        modal.show();
    });

    $('#select-course-modal #add-courses-btn').on('click', function() {
        var selected = $('#select-course-modal #courses-table tbody  tr .check:checked');

        selected.each(function() {
            const isExist = selectedCourses.find(val => val.id == $(this).data('id'));

            if( isExist )
                return;

            selectedCourses.push({
                id: $(this).data('id')
            });
        });

        processDisplayCoursesSelected();

        var modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('select-course-modal'));
        modal.hide();
        var notificationModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('notification-modal'));
        notificationModal.show();
    });

    function processDisplayCoursesSelected() {
        const courses = <?= json_encode($courses) ?>;
        let items = "";
        selectedCourses.forEach((element, key) => {
            const course = courses.find(value => value.id == parseInt(element.id));
            
            items += `<div class="d-xxl-flex align-items-xxl-center" style="height: 48px;background: #ffffff;border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding: 20px;" data-course_id="${course.id}">
                <div class="col-xxl-11 w-auto mr-4">
                    <label class="col-form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">${course.course_abbreviation}</label>
                </div>
                <div class="col cursor-pointer d-flex gap-1">
                    <div class="remove-course" data-index="${key}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg" style="width: 16px; height: 16px;">
                            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                        </svg>
                    </div>
                </div>
            </div>`;
        });

        if($(document.getElementById('selected-course-container')).length < 1) {
            $(`<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                <div id="selected-course-container" class="d-flex flex-wrap gap-1 mt-2 mb-4"></div>
            </div>`).insertAfter($(document.getElementById('select-course')).closest('.container'));
        }

        $(document.getElementById('selected-course-container')).empty();
        $(document.getElementById('selected-course-container')).append(items);
    }

    $(document).on('click', '#notification-modal .remove-course', function(){
        const index = $(this).data('index');

        $(`#select-course-modal #courses-table tbody  tr .check[data-id="${selectedCourses[index].id}"]`).prop('checked', false);
        selectedCourses.splice(index, 1);

        processDisplayCoursesSelected();
    });

    $('#select-class-modal #add-classes-btn').on('click', function() {
        var selected = $('#select-class-modal #classes-table tbody  tr .check:checked');

        selected.each(function() {
            const isExist = selectedClasses.find(val => val.id == $(this).data('id'));

            if( isExist )
                return;

            selectedClasses.push({
                id: $(this).data('id')
            });
        });

        processDisplayClassesSelected();

        var modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('select-class-modal'));
        modal.hide();
        $('#notification-modal').show();
    });

    function processDisplayClassesSelected() {
        const classes = <?= json_encode($classes) ?>;
        let items = "";
        selectedClasses.forEach((element, key) => {
            const selectedClass = classes.find(value => value.id == parseInt(element.id));
            
            items += `<div class="d-xxl-flex align-items-xxl-center" style="height: 48px;background: #ffffff;border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding: 20px;" data-class_id="${selectedClass.id}">
                <div class="col-xxl-11 w-auto mr-4">
                    <label class="col-form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">${selectedClass.course_class_code}</label>
                </div>
                <div class="col cursor-pointer d-flex gap-1">
                    <div class="remove-class" data-index="${key}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg" style="width: 16px; height: 16px;">
                            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                        </svg>
                    </div>
                </div>
            </div>`;
        });

        if($(document.getElementById('selected-class-container')).length < 1) {
            $(`<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                <div id="selected-class-container" class="d-flex flex-wrap gap-1 mt-2 mb-4"></div>
            </div>`).insertAfter($(document.getElementById('select-class')).closest('.container'));
        }

        $(document.getElementById('selected-class-container')).empty();
        $(document.getElementById('selected-class-container')).append(items);
    }

    $(document).on('click', '#notification-modal .remove-class', function(){
        const index = $(this).data('index');

        $(`#select-class-modal #classes-table tbody  tr .check[data-id="${selectedClasses[index].id}"]`).prop('checked', false);
        selectedClasses.splice(index, 1);

        processDisplayClassesSelected();
    });

    $('#select-student-modal #add-students-btn').on('click', function() {
        var selected = $('#select-student-modal #students-table tbody  tr .check:checked');

        selected.each(function() {
            const isExist = selectedStudents.find(val => val.id == $(this).data('id'));

            if( isExist )
                return;

            selectedStudents.push({
                id: $(this).data('id')
            });
        });

        processDisplayStudentsSelected();

        var modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('select-student-modal'));
        modal.hide();
        $('#notification-modal').show();
    });

    function processDisplayStudentsSelected() {
        const students = <?= json_encode($students) ?>;
        let items = "";
        selectedStudents.forEach((element, key) => {
            const student = students.find(value => value.id == parseInt(element.id));
            
            items += `<div class="d-xxl-flex align-items-xxl-center" style="height: 48px;background: #ffffff;border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding: 20px;" data-student_id="${student.id}">
                <div class="col-xxl-11 w-auto mr-4">
                    <label class="col-form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">${student.name}</label>
                </div>
                <div class="col cursor-pointer d-flex gap-1">
                    <div class="remove-student" data-index="${key}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg" style="width: 16px; height: 16px;">
                            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                        </svg>
                    </div>
                </div>
            </div>`;
        });

        if($(document.getElementById('selected-student-container')).length < 1) {
            $(`<div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                <div id="selected-student-container" class="d-flex flex-wrap gap-1 mt-2 mb-4"></div>
            </div>`).insertAfter($(document.getElementById('select-student')).closest('.container'));
        }

        $(document.getElementById('selected-student-container')).empty();
        $(document.getElementById('selected-student-container')).append(items);
    }

    $(document).on('click', '#notification-modal .remove-student', function(){
        const index = $(this).data('index');

        $(`#select-student-modal #students-table tbody  tr .check[data-id="${selectedStudents[index].id}"]`).prop('checked', false);
        selectedStudents.splice(index, 1);

        processDisplayStudentsSelected();
    });

    $('#notification-modal #template_id').on('change', async function() {
        const templateId = $(this).val();
        if(templateId !== 'customize') {
            const templates = <?= json_encode($data) ?>;
            const template = templates.find((value) => value.id === parseInt(templateId));

            $('#notification-modal #title').val(template.title);
            $('#notification-modal #notification-content').val(template.content);
            tinymce.get('notification-content').setContent(template.content);
            if(template.attachment) {
                $('#notification-modal #attachment').prev().find('h1').text(template.attachment);
                $('#notification-modal #attachment').prev().find('img').removeClass('d-none');
                $('#notification-modal #attachment').prev().find('svg').addClass('d-none');

                attachmentData = {
                    name: template.attachment,
                    type: 'url',
                    content: template.attachment_path
                };
            }
        }
    });

	$('#notification-modal #save-modal-data-btn').on('click', function() {
        $(this).attr('disabled', 'true');
        var content = tinymce.get('notification-content').getContent();
        $('#notification-modal #notification-content').val(content);
        const formData = $('#notification-modal #modal-add-form').serializeArray();

        if( processNotificationErrorValidation(formData) ) {
            $(this).removeAttr('disabled');

            return;
        }

        let transformedData = {};

        switch($('#notification-modal #notification_type').val()) {
            case 'by-course' :
                var courses = [];
                $('#notification-modal #selected-course-container').children().each(function() {
                    courses.push($(this).data('course_id'));
                });

                transformedData['selected_courses'] = courses;
            break;
            case 'by-class' :
                var classes = [];
                $('#notification-modal #selected-class-container').children().each(function() {
                    classes.push($(this).data('class_id'));
                });

                transformedData['selected_classes'] = classes;
            break;
            case 'individual' :
                var students = [];
                $('#notification-modal #selected-student-container').children().each(function() {
                    students.push($(this).data('student_id'));
                });

                transformedData['selected_students'] = students;
            break;
        }

        formData.forEach(function(item) {
            if(item.name === 'send_via' || item.name === 'send_immediately' || item.name === 'notification_types[]') {
                switch(item.name) {
                    case 'send_immediately' :
                        transformedData[item.name] = item.value === 'on' ? 1 : 0;
                    break;
                    case 'send_via' :
                        var sendvia = [];
                        $('#notification-modal input[name="send_via"]:checked').each(function() {
                            sendvia.push($(this).attr('id').replace('via-', ''));
                        });

                        transformedData[item.name] = sendvia;
                    break;
                    case 'notification_types[]' :
                        var notiTypes = [];
                        $('#notification-modal input[name="notification_types[]"]:checked').each(function() {
                            notiTypes.push($(this).attr('id').replace('notification-', ''));
                        });

                        transformedData['notification_types'] = notiTypes;
                    break;
                }
            } else {
                transformedData[item.name] = item.value;
            }
        });

        if(attachmentData) {
            transformedData['attachment'] = attachmentData;
        }

        addAnnouncement(transformedData);
    });

    function processNotificationErrorValidation(formData) {
        const requiredFields = ['notification_type', 'template_id', 'title', 'content', 'status', 'send_via'];

        errors.forEach((element) => {
            if(recipientFields.includes(element.field_name)) {
                var fieldSelector = $(`#notification-modal #${element.field_name.replace('selected', 'select').replace('-container', '')}`);
            } else {
                var fieldSelector = $(`[name="${element.field_name}"]`);
                if(element.field_name === 'send_via' || element.field_name === 'notification_types[]') {
                    fieldSelector = $($(`[name="${element.field_name}"]`)[0]);
                }

                // Clear the errors first
                fieldSelector.removeClass('border border-danger');
                fieldSelector.removeClass('border border-danger');
            }

            if ( fieldSelector.next().is('p') )
                fieldSelector.next().remove();

            if ( fieldSelector.parent().next().is('p') )
                fieldSelector.parent().next().remove();

            if(element.field_name === 'send_via' || element.field_name === 'notification_types[]') {
                fieldSelector.closest('.container').find('p').remove();
            }
        });

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

        const send_via = formData.find((item) => item.name === 'send_via');
        if(!send_via) {
            errors.push({
                field_name: 'send_via',
                message: 'Send Via is required.'
            });
        }

        const notificationTypes = formData.find((item) => item.name === 'notification_types[]');
        if(!notificationTypes) {
            errors.push({
                field_name: 'notification_types[]',
                message: 'Notification Types is required.'
            });
        }

        const noti_type = formData.find((item) => item.name === 'notification_type');

        if(noti_type.value !== 'all-student') {
            switch(noti_type.value) {
                case 'by-course' :
                    if($('#notification-modal #selected-course-container').length < 1 || $('#notification-modal #selected-course-container').children().length < 1) {
                        errors.push({
                            field_name: 'selected-course-container',
                            message: 'Please select courses to send notification.'
                        });
                    }
                break;
                case 'by-class' :
                    if($('#notification-modal #selected-class-container').length < 1 || $('#notification-modal #selected-class-container').children().length < 1) {
                        errors.push({
                            field_name: 'selected-class-container',
                            message: 'Please select classes to send notification.'
                        });
                    }
                break;
                case 'individual' :
                    if($('#notification-modal #selected-student-container').length < 1 || $('#notification-modal #selected-student-container').children().length < 1) {
                        errors.push({
                            field_name: 'selected-student-container',
                            message: 'Please select students to send notification.'
                        });
                    }
                break;
            }
        }

        if ( errors.length > 0 ) {
            renderErrors('notification-modal');

            return true;
        }

        return false;
    }

    async function addAnnouncement(transformedData) {
        const userToken = getUserToken();

        // API Request to save notification category
        await axios.post(`${getApiUrl()}/notification/announcements/add`, transformedData, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            $('#notification-modal #cancel-btn').click();

            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                window.location = window.location
            } else {
                toastInfo("Cant' Save", res.data.message, "warning");

                $('#announcement-modal #save-modal-data-btn').removeAttr('disabled');
            }
        }).catch(error => {
            $('#announcement-modal #save-modal-data-btn').removeAttr('disabled');

            if( error.response.status == 400 || error.response.status == 422 ) {
                let errorMessages = "";
                Object.keys(error.response.data.errors).forEach(key => {
                    error.response.data.errors[key].forEach(value => {
                        errorMessages += (`${key}: ` + value + '\n')

                        toastTopEnd("Cant' Process", errorMessages, "warning");
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

    function processErrorValidation(formData) {
        const requiredFields = ['template_name', 'title', 'content', 'status'];

        errors.forEach((element) => {
            const fieldSelector = $(`[name="${element.field_name}"]`);
            // Clear the errors first
            fieldSelector.removeClass('border border-danger');
            fieldSelector.removeClass('border border-danger');

            if ( fieldSelector.next().is('p') )
                fieldSelector.next().remove();

            if ( fieldSelector.parent().next().is('p') )
                fieldSelector.parent().next().remove();
        });

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
            renderErrors('template-modal');

            return true;
        }

        return false;
    }

    function resetModalForm() {
        errors = [];
        selectedTemplateId = "";
        attachmentData = '';

        $('#template-modal #attachment').prev().find('h1').text('Attachment');
        $('#template-modal #attachment').prev().find('img').addClass('d-none');
        $('#template-modal #attachment').prev().find('svg').removeClass('d-none');

        $('#template-modal input').val("");
        $('#template-modal select').val("");
        $('select[name=status]').val("Active");
        $('#template-modal textarea').val("");
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

    function renderErrors(modalName) {
        if ( errors.length > 0 ) {
            errors.forEach((element) => {
                const fieldSelector = $(`#${modalName} [name="${element.field_name}"]`);
                // Clear the errors first
                fieldSelector.removeClass('border border-danger');
                fieldSelector.removeClass('border border-danger');

                if ( fieldSelector.next().is('p') )
                    fieldSelector.next().remove();

                if ( fieldSelector.parent().next().is('p') )
                    fieldSelector.parent().next().remove();

                fieldSelector.addClass('border border-danger');
                fieldSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
            });
        }
    }

    async function addNotiTemplate(transformedData) {
        const userToken = getUserToken();

        // API Request to save notification template
        await axios.post(`${getApiUrl()}/notification/templates/add`, transformedData, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            $('#template-modal #cancel-btn').click();

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
                        errorMessages += (`${key}: ` + value + '\n')

                        toastTopEnd("Cant' Process", errorMessages, "warning");
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

    async function updateNotiTemplate(transformedData) {
        const userToken = getUserToken();

        // API Request to update notification template
        await axios.put(`${getApiUrl()}/notification/templates/update/${selectedTemplateId}`, transformedData, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            $('#template-modal #cancel-btn').click();

            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                window.location = window.location
            } else {
                toastInfo("Cant' Save", res.data.message, "warning");

                $(this).removeAttr('disabled');
            }
        }).catch(error => {
            $(this).removeAttr('disabled');
            
            if( error.response.status == 400 ) {
                let errorMessages = "";
                Object.keys(error.response.data.errors).forEach(key => {
                    error.response.data.errors[key].forEach(value => {
                        errorMessages += (`${key}: ` + value + '\n')

                        toastTopEnd("Cant' Process", errorMessages, "warning");
                    });
                });
            }

            if( error.response.status == 404 ) {
                toastTopEnd("Cant' Process", error.response.data.message, "warning");
            }

            if( error.response.status == 500 ) {
                toastTopEnd("System Error", error.response.data.message, "error");
            }

            console.error('Error fetching data:', error);
        });
    }

    async function deleteNotiTemplate() {
        const userToken = await getUserToken();

        await axios.delete(`${getApiUrl()}/notification/templates/archive/${selectedTemplateId}`, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                window.location = window.location
            } else {
                toastInfo("Cant' Archive", res.data.message, "warning");

                $(this).removeAttr('disabled');
            }
        }).catch(error => {
            $(this).removeAttr('disabled');
            
            if( error.response.status == 400 ) {
                let errorMessages = "";
                Object.keys(error.response.data.errors).forEach(key => {
                    error.response.data.errors[key].forEach(value => {
                        errorMessages += (`${key}: ` + value + '\n')

                        toastTopEnd("Cant' Process", errorMessages, "warning");
                    });
                });
            }

            if( error.response.status == 404 ) {
                toastTopEnd("Cant' Process", error.response.data.message, "warning");
            }

            if( error.response.status == 500 ) {
                toastTopEnd("System Error", error.response.data.message, "error");
            }

            console.error('Error fetching data:', error);
        });
    }

    async function unarchiveNotiTemplate() {
        const userToken = await getUserToken();

        await axios.delete(`${getApiUrl()}/notification/templates/unarchive/${selectedTemplateId}`, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                window.location = window.location
            } else {
                toastInfo("Cant' Unarchive", res.data.message, "warning");

                $(this).removeAttr('disabled');
            }
        }).catch(error => {
            $(this).removeAttr('disabled');
            
            if( error.response.status == 400 ) {
                let errorMessages = "";
                Object.keys(error.response.data.errors).forEach(key => {
                    error.response.data.errors[key].forEach(value => {
                        errorMessages += (`${key}: ` + value + '\n')

                        toastTopEnd("Cant' Process", errorMessages, "warning");
                    });
                });
            }

            if( error.response.status == 404 ) {
                toastTopEnd("Cant' Process", error.response.data.message, "warning");
            }

            if( error.response.status == 500 ) {
                toastTopEnd("System Error", error.response.data.message, "error");
            }

            console.error('Error fetching data:', error);
        });
    }

    async function bulkActivateTemplates(rowsID) {
        // get user token
        const userToken = await getUserToken();

        await axios.post(`${getApiUrl()}/notification/templates/bulk-activate`, { entries: rowsID }, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                window.location = window.location
            } else {
                toastInfo("Cant' Activate", res.data.message, "warning");

                spinner.remove();
                $(this).removeAttr('disabled');
            }
        }).catch(error => {
            spinner.remove();
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

    async function bulkDeactivateTemplates(rowsID) {
        // get user token
        const userToken = await getUserToken();

        await axios.post(`${getApiUrl()}/notification/templates/bulk-deactivate`, { entries: rowsID }, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                window.location = window.location
            } else {
                toastInfo("Cant' Deactivate", res.data.message, "warning");

                spinner.remove();
                $(this).removeAttr('disabled');
            }
        }).catch(error => {
            spinner.remove();
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

    async function bulkArchiveTemplates(rowsID) {
        // get user token
        const userToken = await getUserToken();

        await axios.post(`${getApiUrl()}/notification/templates/bulk-archive`, { entries: rowsID }, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                window.location = window.location
            } else {
                toastInfo("Cant' Archive", res.data.message, "warning");

                spinner.remove();
                $(this).removeAttr('disabled');
            }
        }).catch(error => {
            spinner.remove();
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
</script>
@endsection