@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Student Management" 
        withButton="true"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#information-modal" 
        buttonType="button"
        buttonId="add-student_btn"
        buttonTitle="Add Student"
    />
    <div class="row mt-4">
        <!-- Student List | Left - Table Section -->
        <div class="col-xxl-6 page-content-col1">
            <div class="tab-content p-3 pt-4">
                <x-search-input
                    inputType="text"
                    inputName="student_search"
                    inputID="student_search"
                    inputPlaceholder="Search Student (Name/ID/Phone/Parent)"
                />
                <div class="table-responsive table-custom data-table with-custom-search mt-3">
                    <table class="table table-hover w-100" id="student-table">
                        <thead>
                            <tr>
                                <th class="text-left">NAME/ID</th>
                                <th class="text-left">GENDER</th>
                                <th class="text-left">LEVEL</th>
                                <th class="text-left">CURRENT COURSE</th>
                                <th class="text-left">PHONE</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $data as $student)
                                <tr data-id="{{ $student['id'] }}">
                                    <td>
                                        <p>{{ $student['name'] }}</p>
                                        <small class="">{{ $student['student_information'] ? $student['student_information']['student_id'] : '-' }}</small>
                                    </td>
                                    <td>{{ ucfirst($student['student_information'] ? $student['student_information']['gender'] : '-') }}</td>
                                    <td>{{ $student['student_information'] ? ($student['student_information']['level']['name'] ?? '-') : '-' }}</td>
                                    <td>-</td>
                                    <td>{{ $student['student_information'] ? $student['student_information']['phone'] : '-' }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('wave.user.admin-main.student-view', $student['id']) }}" class="d-flex align-items-center justify-content-center cursor-pointer" style="margin: 0 !important; height: 20px;">
                                                <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
                                            </a>
                                            @if( $student['status'] != 'archived' )
                                                <div id="delete-btn" data-id="{{ $student['id'] }}" data-bs-toggle="modal" data-bs-target="#delete-modal" class="cursor-pointer delete-btn">
                                                    <i class="fa-solid fa-trash"></i>
                                                </div>
                                            @endif
                                            @if( isSuperAdmin() && $student['status'] == 'archived' )
                                                <div id="unarchive-btn" data-id="{{ $student['id'] }}" data-bs-toggle="modal" data-bs-target="#unarchive-modal" class="cursor-pointer unarchive-btn">
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
        <!-- Coach Details | Right Section -->
        <div class="col d-xxl-flex flex-column page-content-col2">
            <!-- Detail Heading and Buttons -->
            <div class="col d-xxl-flex justify-content-between align-items-xxl-center mb-2" style="max-height: 40px !important;">
                <h3 class="fw-semibold text-nowrap detail-heading">
                    PERSONAL INFORMATION
                    <x-button-icon icon='edit' type="button" id="edit-profile_btn" customClass="d-none" toggle="modal" target="#information-modal" />
                </h3>
                <button id="btn-apply_for_leave" class="btn btn-primary fw-semibold d-none" type="button" style="display: flex; align-items: center;height: 30px; width: auto; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255,255,255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0,0,0,0.25); line-height: 30px;" data-bs-toggle="modal" data-bs-target="#modal-apply_for_leave">Apply for leave</button>
                <!-- <button id="btn-enroll_student" class="btn btn-primary fw-semibold d-none" type="button" style="display: flex; align-items: center;height: 30px; width: auto; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255,255,255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0,0,0,0.25); line-height: 30px;" data-bs-toggle="modal" data-bs-target="#enrollment-modal">Enroll</button> -->
            </div>
            <div class="d-xxl-flex">
                <!-- Avatar and Name -->
                <div class="w-25 d-flex flex-column align-items-center">
                    <h2 id="detail-full_name" class="detail-name text-center pt-2">-</h2>
                    <h2 id="detail-chinese_name" class="detail-name text-center pt-2 pb-3">-</h2>
                    <div class="main-page_avatar-container">
                        <img id="main-page_avatar" src="{{ asset('themes/tailwind/images/profile.png') }}" />
                    </div>
                    <p id="detail-student_id" class="badge bg-secondary p-2 mt-2">-</p>
                    <p id="detail-level" class="mt-3">-</p>
                </div>
                <!-- Main Details -->
                <div class="w-100 p-3 mt-5">
                    <div class="row mb-3">
                        <div class="col-4">
                            <div>
                                <h6 class="detail-content-heading">DATE OF BIRTH (AGE)</h6>
                                <p id="detail-dob" class="detail-content-heading_value">-</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <h6 class="detail-content-heading">GENDER</h6>
                                <p id="detail-gender" class="detail-content-heading_value">-</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <h6 class="detail-content-heading">HKID</h6>
                                <p id="detail-hkid" class="detail-content-heading_value">-</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <div>
                                <h6 class="detail-content-heading">RESIDENTIAL ADDRESS</h6>
                                <p id="detail-address" class="detail-content-heading_value">-</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <h6 class="detail-content-heading">SCHOOL</h6>
                                <p id="detail-school" class="detail-content-heading_value">-</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <div>
                                <h6 class="detail-content-heading">PHONE</h6>
                                <p id="detail-phone" class="detail-content-heading_value">-</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <h6 class="detail-content-heading">GRADE OF CLASS</h6>
                                <p id="detail-grade_of_class" class="detail-content-heading_value">-</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <h6 class="detail-content-heading">EMAIL</h6>
                                <p id="detail-email" class="detail-content-heading_value">-</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Additional Details -->
            <div>
                <div class="row mt-5">
                    <div class="col-6">
                        <h5 class="detail-column-heading mb-2">SIBLING</h5>
                        <div id="detail-siblings_container" class="grid-repeat-col-2 gap-5">
                            <p class="text-muted">No Data</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <h5 class="detail-column-heading mb-2">GUARDIAN</h5>
                        <div id="detail-guardians_container" class="grid-repeat-col-2 gap-5">
                            <p class="text-muted">No Data</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h5 class="detail-column-heading mb-2">EMERGENCY CONTACT</h5>
                    <div id="detail-emergency-contact_container" class="grid-repeat-col-4">
                        <p class="text-muted">No Data</p>
                    </div>
                </div>
            </div>
            <!-- Tab Panel | Additional Detail -->
            <div class="mt-5 tab-panel_container d-none">
                <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">BASIC INFORMATION</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab"  data-bs-toggle="tab" href="#tab-2">COURSES</a>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" href="{{ route('wave.user.admin-main.coach-comment') }}">COACH COMMENT</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" href="{{ route('wave.user.admin-main.coach-history') }}">ACCOUNTING</a>
                    </li> -->
                </ul>

                <div class="tab-content custom-tab-content">
                    <div id="tab-1" class="tab-pane active" role="tabpanel">
                        <div class="col mt-3">
                            <h1 class="text-nowrap record-container-heading mb-2">
                                Enrollment Records
                            </h1>
                            <div class="enrollment-records-container"></div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane" role="tabpanel">
                        <div class="col mt-3">
                            <h1 class="text-nowrap record-container-heading mb-2">
                                Courses
                            </h1>

                            <div class="courses-records-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="information-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between p-4 pr-5">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Personal Information</h4>
                <div class="position-relative d-flex justify-content-center" style="width: 130px; height: 130px;">
                    <img id="modal-avatar" src="{{ asset('themes/tailwind/images/profile.png') }}" style="width: 130px;">
                    <span class="profile-image-edit_btn">
                        <x-svg-icon icon="edit" />
                    </span>
                    <input type="file" class="d-none" id="avatar-field">
                </div>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Last Name" 
                            type="text" 
                            name="last_name"
                            id="last_name"
                            isRequired="true"
                        />
                        <x-form-input 
                            label="First Name" 
                            type="text" 
                            name="first_name"
                            id="first_name"
                            isRequired="true"
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Chinese Name" 
                            type="text" 
                            name="chinese_name"
                            id="chinese_name"
                            isRequired="false"
                        />
                        <x-form-input 
                            label="HKID" 
                            type="text" 
                            name="hkid"
                            id="hkid"
                            isRequired="true"
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Phone" 
                            type="text" 
                            name="phone"
                            id="phone"
                            isRequired="true"
                        />
                        <x-form-input 
                            label="Email" 
                            type="email" 
                            name="email"
                            id="email"
                            isRequired="true"
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Date of Birth" 
                            type="date" 
                            name="dob"
                            id="dob"
                            isRequired="true"
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Gender" 
                            name="gender"
                            id="gender"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Residential Address" 
                            type="text" 
                            name="address"
                            id="address"
                            isRequired=false
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="School" 
                            name="school_id"
                            id="school_id"
                            isRequired="false"
                        >
                            <option value="" hidden>Select School</option>
                            @foreach($schools as $school)
                                <option value="{{ $school['id'] }}">{{ $school['name'] }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Grade of Class" 
                            type="text" 
                            name="grade_of_class"
                            id="grade_of_class"
                            isRequired="false"
                        />
                        <x-form-input 
                            label="Hear about HKSA" 
                            type="text" 
                            name="hear_about_us"
                            id="hear_about_us"
                            isRequired="false"
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Referral by / others" 
                            name="referral_by"
                            id="referral_by"
                            isRequired="false"
                        >
                            @foreach($users as $user)
                                <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                            @endforeach
                        </x-form-select>
                        <x-form-select
                            label="Level" 
                            name="student_level"
                            id="student_level"
                            isRequired="false"
                        >
                            <option value="" hidden>Select Level</option>

                            @foreach( $levels as $level )
                                <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3 select2">
                        <x-form-select
                            label="Sibling" 
                            name="sibling"
                            id="sibling"
                            isRequired="false"
                        >
                            <option value="" hidden>Select Sibling</option>

                            @foreach($siblings as $sibling)
                                <option value="{{ $sibling['id'] }}">{{ $sibling['name'] }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div id="selected-sibling-container" class="d-flex flex-wrap gap-1 mt-2 mb-3"></div>
                    <!-- Section for Adding Multiple Data -->
                    <div class="mb-3">
                        <label class="form-label form-input-label">Guardian</label>
                        <!-- Form for Adding Guardian -->
                        <div class="container guardian-form_container form-input-container mb-3 d-none">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 manual-btn_container">
                                        <x-button-icon-text type="button" id="add-guardian_form" title="Add New Account" icon="plus" />
                                    </div>

                                    <div class="mb-3 selection-btn_container d-none">
                                        <x-button-icon-text type="button" id="selection-guardian_form" title="Link Existing Account" icon="plus" />
                                    </div>
                                    <div class="new-guardian-form d-none">
                                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                            <x-form-input 
                                                label="Name" 
                                                type="text" 
                                                name="guardian_name"
                                                id="guardian_name"
                                                isRequired="false"
                                            />
                                            <x-form-input 
                                                label="Phone" 
                                                type="text" 
                                                name="guardian_phone"
                                                id="guardian_phone"
                                                isRequired="false"
                                            />
                                            <x-form-input 
                                                label="Password" 
                                                type="password" 
                                                name="guardian_password"
                                                id="guardian_password"
                                                isRequired="false"
                                            />
                                        </div>
                                    </div>
                                    <div class="existing-guardian-selection">
                                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                            <x-form-select
                                                label="Select Guardian" 
                                                name="guardian_id"
                                                id="guardian_id"
                                                isRequired="true"
                                            >
                                                <option value="" hidden>Select Guardian</option>

                                                @foreach( $guardians as $guardian )
                                                    <option value="{{ $guardian['id'] }}">{{ $guardian['name'] }}</option>
                                                @endforeach
                                            </x-form-select>
                                        </div>
                                    </div>

                                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                        <x-form-input 
                                            label="Relationship" 
                                            type="text" 
                                            name="guardian_relationship"
                                            id="guardian_relationship"
                                            isRequired="true"
                                        />
                                    </div>
                                    <div class="col d-flex gap-3 mt-4">
                                        <x-secondary-button type="button" id="cancel-add_guardian" title="Cancel"/>
                                        <x-primary-button type="button" id="save-guardian" title="Save" toggle="" target=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-button-icon-text type="button" id="show-guardian_form" title="Add Guardian" icon="plus" />
                        </div>
                        <!-- Container for listing added Data -->
                        <div id="guardian-container" class="d-flex flex-wrap gap-1">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label form-input-label">Emergency Contact</label>
                        <!-- Form for Adding Guardian -->
                        <div class="container emergency-contact-form_container form-input-container mb-3 d-none">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                        <x-form-input 
                                            label="Contact Person" 
                                            type="text" 
                                            name="emergency_contact_name"
                                            id="emergency_contact_name"
                                            isRequired="true"
                                        />
                                        <x-form-input 
                                            label="Phone" 
                                            type="text" 
                                            name="emergency_contact"
                                            id="emergency_contact"
                                            isRequired="false"
                                        />
                                    </div>

                                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                        <x-form-input 
                                            label="Relationship" 
                                            type="text" 
                                            name="emergency_contact_relationship"
                                            id="emergency_contact_relationship"
                                            isRequired="true"
                                        />
                                    </div>
                                    <div class="col d-flex gap-3 mt-4">
                                        <x-secondary-button type="button" id="cancel-emergency_contact" title="Cancel"/>
                                        <x-primary-button type="button" id="save-emergency_contact" title="Save" toggle="" target=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <x-button-icon-text type="button" id="show-ermergency-contact" title="Add Emergency Contact" icon="plus" />
                        </div>

                        <!-- Container for listing added Data -->
                        <div id="emergency-contact-container" class="d-flex flex-wrap gap-1"></div>
                    </div>

                    <div class="container" style="padding: 0px;color: #636363">
                        <div class="form-inline">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Remarks</label>
                                <textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-form_btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="heading text-danger">Are you sure you want to archive <b id="label-delete-studen-name"><u>[student name]</u></b>?</p>
                <p class="sub-heading text-secondary">
                    Please make sure payment of salary is settle and unlinked before archiving it.
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" id="process-archive" title="Yes" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Unarchive Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="unarchive-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="heading text-warning" style="font-size: 20px;font-family: Poppins, sans-serif;">Are you sure you want to unarchive <b id="label-unarchive-student-name"><u>[student name]</u></b>?</p>
                <p class="sub-heading">
                    Unarchiving this student, would be able to access their account again.
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" id="process-unarchive" title="Yes" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Enrollment Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="enrollment-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Enrollment</h4>
                    <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div id="course-modal_header" class="d-none">
                <div class="col d-xxl-flex justify-content-between align-items-start" style="padding: 1rem 1.5rem 0 1.5rem !important; border-bottom: 1px solid #E8E8E8;">
                    <h4 class="modal-title main-form-title pb-3" style="font-size: 14px; font-weight: 600; color: #4A5C7A; border-bottom: 3px solid #4A5C7A;">COURSE</h4>
                </div>
            </div>
            <div id="main-form" class="modal-body p-4 pt-0">
                <div id="student-detail_container">
                    <label class="detail-column-heading"><u>Student Details</u></label>
                    <table class="table modal-table">
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">GENDER</th>
                                <th scope="col">LEVEL</th>
                                <th scope="col">DATE OF BIRTH (AGE)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                            </tr>
                            <tr>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="course-details_container">
                    <label class="detail-column-heading mb-2"><u>Course Details</u></label>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Course"
                            name="course"
                            id="course"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Course</option>
                            @foreach($course_packages as $course_package)
                                <option value="{{ $course_package->id }}">{{ $course_package->course ? $course_package->course['course_abbreviation'] : '-' }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Type of Course"
                            name="type_of_course"
                            id="type_of_course"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Type of Course</option>
                            <option value="full_term">Full Term</option>
                            <option value="flexible_course">Flexible Course</option>
                        </x-form-select>
                    </div>
                    <x-primary-button type="button" id="select-course" title="Select Course" toggle="" target=""/>
                    <table class="table modal-table mt-3">
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col">CLASS</th>
                                <th scope="col">DATE</th>
                                <th scope="col">TIME</th>
                                <th scope="col">VENUE</th>
                                <th scope="col">FACILITY</th>
                                <th scope="col">PAX</th>
                                <th scope="col">PRICE</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8" class="text-center">No Selected Course/Class</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="remarks-detail_container" class=" mb-3">
                    <div class="form-inline">
                        <div class="form-group">
                            <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                            <textarea rows="2" name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                        </div>
                    </div>
                </div>
                <div id="modal-actions_container" class="d-flex gap-4">
                    <x-primary-button type="button" id="pay-now_btn" title="Pay Now" toggle="" target=""/>
                    <x-primary-button type="button" id="send-invoice_btn" title="Send Invoice" toggle="" target=""/>
                </div>
            </div>
            <div id="course-form" class="modal-body p-4 pt-0 d-none">
                <h3 class="mt-4" style="font-size: 32px; font-weight: 400;">Course</h3>
                <div class="card">
                    <div class="card-body">
                        <!-- Filters -->
                        <div class="d-flex gap-3 mb-2">
                            <x-search-input
                                inputType="search"
                                inputName="search_filter"
                                inputID=""
                                inputPlaceholder="Search..."
                            />
                            <x-form-select
                                label=""
                                name="level_filter"
                                id="level_filter"
                                isRequired="false"
                                customContainerStyle="width: 20% !important;"
                            >
                                <option value="" hidden>Select Level</option>
                                @foreach($levels as $level)
                                    <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                                @endforeach
                            </x-form-select>
                        </div>
                        <div class="table-responsive table-custom with-custom-search">
                            <table class="table table-hover w-100">
                                <thead>
                                    <tr>
                                        <th class="text-left"><input type="checkbox" class="select-all"></th>
                                        <th class="text-left">COURSE CODE</th>
                                        <th class="text-left">LEVEL</th>
                                        <th class="text-left">VENUE</th>
                                        <th class="text-left">COACH</th>
                                        <th class="text-left">DATE</th>
                                        <th class="text-left">TIME</th>
                                        <th class="text-left">TOTAL FEE (HK$)</th>
                                        <th class="text-left">COURSE CATEGORY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="class-form" class="modal-body p-4 pt-0 d-none">
                <h3 class="mt-4" style="font-size: 32px; font-weight: 400;">Class</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex gap-3 mb-2">
                            <x-search-input
                                inputType="text"
                                inputName="search_filter"
                                inputID=""
                                inputPlaceholder="Search..."
                            />
                            <x-form-select
                                label=""
                                name="level_filter"
                                id="level_filter"
                                isRequired="false"
                                customContainerStyle="width: 20% !important;"
                            >
                                <option value="" hidden>Select Level</option>
                                @foreach($levels as $level)
                                    <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                                @endforeach
                            </x-form-select>
                        </div>
                        <div class="table-responsive table-custom with-custom-search">
                            <table class="table table-hover w-100">
                                <thead>
                                    <tr>
                                        <th class="text-left"><input type="checkbox" class="select-all"></th>
                                        <th class="text-left">CLASS CODE</th>
                                        <th class="text-left">LEVEL</th>
                                        <th class="text-left">VENUE</th>
                                        <th class="text-left">COACH</th>
                                        <th class="text-left">DATE</th>
                                        <th class="text-left">TIME</th>
                                        <th class="text-left">TOTAL FEE (HK$)</th>
                                        <th class="text-left">COURSE CATEGORY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td><input type="checkbox"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between d-none" style="border-top-style: none;">
                <x-secondary-button type="button" id="close-form_btn" title="Close" dismiss=""/>
                <x-primary-button type="button" id="add-form_btn" title="Add" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Enrolled Course View Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="course-view_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Enrolled Course Details</h4>
                    <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div id="main-form" class="modal-body p-4 pt-0">
                <div id="course-detail_container" class="mb-4">
                    <div class="course-contents">
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Course Code</dd>
                            <dd class="col-sm-9" id="course-detail_code">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Level</dd>
                            <dd class="col-sm-9" id="course-detail_level">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Venue</dd>
                            <dd class="col-sm-9" id="course-detail_venue">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Facility</dd>
                            <dd class="col-sm-9" id="course-detail_facility">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Size</dd>
                            <dd class="col-sm-9" id="course-detail_size">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Type</dd>
                            <dd class="col-sm-9" id="course-detail_type">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Coaches</dd>
                            <dd class="col-sm-9" id="course-detail_coaches">-</dd>
                        </dl>
                    </div>
                </div>
                <div class="withdrawal-btn_container mb-4">
                    <div class="form_btn mt-3">
                        <x-primary-button type="button" id="withdrawal-btn" customClass='sm' title="Withdraw Course" toggle="" target=""/>
                    </div>
                </div>
                <div id="class-detail_container" class="mb-3 mt-3">
                    <label class="detail-column-heading"><u>Classes</u></label>
                    <table class="table modal-table">
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col">CLASS CODE</th>
                                <th scope="col">VENUE</th>
                                <th scope="col">FACILITY</th>
                                <th scope="col">COACH</th>
                                <th scope="col">DATE</th>
                                <th scope="col">TIME</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="arrangement-container mt-5 mb-3 d-none">
                    <div class="container" style="padding: 0px;color: #636363;">
                        <div class="form-inline">
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Please Select</label>
                                <div class="grid-reapeat-col-3 gap-3">
                                    <div class="col">
                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                            <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Makeup/Swap</label>
                                            <input type="radio" name="arrangement" value="makeup_swap" checked>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;">
                                            <label style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Change Course</label>
                                            <input type="radio" name="arrangement" value="change_course">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="makeup-detail_container" class="mb-3 d-none">
                    <label class="detail-column-heading"><u>Makeup / Swap</u></label>
                    <form id="modal-form" enctype="multipart/form-data">
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-select
                                label="Available Classes (optional)" 
                                name="class_id"
                                id="class_id"
                                isRequired="false"
                            >
                                <option value="" hidden>Select Available Class</option>
                                <option value="1">VSA-RS2-0002-1</option>
                            </x-form-select>
                        </div>
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label form-input-label">Upload Attachments</label>
                                <input name="attachment" class="form-control" type="file">
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="form-label form-input-label">Reason <span class="text-danger">*</span></label>
                                    <textarea name="makeup_reason" class="form-control" placeholder="Enter reason here..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </form>
                            <div class="form_btn mt-3">
                                <x-primary-button type="button" id="make-up-swap_btn" title="Makeup/Swap" toggle="" target=""/>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="change-course_container" class="mb-3 d-none">
                    <label class="detail-column-heading"><u>Change Course</u></label>
                    <form id="modal-form" enctype="multipart/form-data">
                        <!-- <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-select
                                label="Available Classes (optional)" 
                                name="class_id"
                                id="class_id"
                                isRequired="false"
                            >
                                <option value="" hidden>Select Available Class</option>
                                <option value="1">VSA-RS2-0002-1</option>
                            </x-form-select>
                        </div> -->
                        <!-- <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label form-input-label">Upload Attachments</label>
                                <input name="attachment" class="form-control" type="file">
                            </div>
                        </div> -->
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="form-label form-input-label">Reason <span class="text-danger">*</span></label>
                                    <textarea name="reason" class="form-control" placeholder="Enter reason here..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </form>
                            <div class="form_btn mt-3">
                                <x-primary-button type="button" id="change-course_btn" title="Change Course" toggle="" target=""/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enrolled Course Withdrawal Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="course-withdrawal_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div id="main-modal_header">
                <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Course Withdrawal</h4>
                    <span class="small-icon_btn p-2 cursor-pointer" id="cancel_btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
                </div>
            </div>
            <div class="modal-body p-4 pt-0">
                <p class="modal-body_message">Are you sure you want to withdraw this course <span></span>?</p>
                <form id="modal-form" enctype="multipart/form-data">
                    <div class="container mb-3" style="padding: 0px;color: #636363;margin-top: 20px;">
                        <div class="form-group">
                            <label class="form-label form-input-label">Reason <span class="text-danger">*</span></label>
                            <textarea name="reason" class="form-control" placeholder="Enter reason here..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                        </div>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label form-input-label">Upload Attachments (optional)</label>
                            <input name="attachment" class="form-control" type="file">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-form_btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Apply for leave Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="modal-apply_for_leave">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="col d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 20px;padding-top: 10px;padding-bottom: 0px;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;font-family: Poppins, sans-serif;">Apply for leave</h4>
 			</div>
 			<div class="modal-body">
				<form id="modal-form" enctype="multipart/form-data">
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Upcoming Class" 
                            name="class_id"
                            id="class_id"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Class</option>
                        </x-form-select>
					</div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Reason" 
                            name="reason"
                            id="reason"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Reason</option>
                            <option value="Sick Leave">Sick Leave</option>
                            <option value="Casual Leave">Casual Leave</option>
                            <option value="Other">Other</option>
                        </x-form-select>
					</div>
                    <div class="w-100 other-leave d-none">
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-input 
                                label="Other Reason" 
                                type="text" 
                                name="other_reason"
                                id="other_reason"
                                isRequired="true"
                            />
                        </div>
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
								<label class="form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Remark</label>
								<textarea name="remark" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
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
@endsection

@section('style')
<style>
    .courses-records-container {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
</style>
@endsection

@section('script')
<script type="text/javascript">
    var siblingsData = [];
    var guardiansData = [];
    var emergencyContactsData = [];
    var errors = [];
    var selectedData = {};
    var formAction = '';
    var imageData = '';

    $(function() {
        $('.select2 select').select2({
            dropdownParent: $('#information-modal')
        });
        
        $('#student_search').on('keyup', function() {
            var searchTerm = $(this).val();
            
            window.table.search(searchTerm).draw();
        });

        $('.page-container').on('click', '#student-table tbody tr', function() {
			const dataID = $(this).data('id');

            if(! dataID )
                return;

 			const data = <?= json_encode($data) ?>;
			const rowData = data.find(value => value.id == dataID);
            selectedData = rowData;

            // show edit button on details section
            $('#edit-profile_btn').removeClass('d-none');
            $('#btn-enroll_student').removeClass('d-none');
            $('#btn-apply_for_leave').removeClass('d-none');
            
            $('#detail-full_name').text( rowData.name );
            $('#detail-chinese_name').text( rowData.student_information.chinese_name );
            $('#detail-student_id').text( rowData.student_information.student_id );
            $('#detail-level').text( rowData.student_information.level ? rowData.student_information.level.name : "-" );

            $('#detail-dob').text( rowData.student_information.dob );
            $('#detail-gender').text( ucfirst(rowData.student_information.gender) );
            $('#detail-hkid').text( rowData.student_information.hkid );
            $('#detail-address').text( rowData.student_information.address ?? "-" );
            $('#detail-school').text( rowData.student_information.school ? rowData.student_information.school.name : "-" );
            $('#detail-phone').text( rowData.student_information.phone );
            $('#detail-grade_of_class').text( rowData.student_information.grade_of_class ?? "-" );
            $('#detail-email').text( rowData.email );
            $('#main-page_avatar').attr('src', rowData.image_path);

            // Siblings
            $('#detail-siblings_container').empty();
            rowData.siblings.forEach(value => {
                const data = `<div>
                                <h6 class="detail-content-heading_value">${ value.name }</h6>
                                <p class="detail-content-heading">${ value.student_information.student_id } / ${ value.student_information.level.name }</p>
                            </div>`;

                $('#detail-siblings_container').append( data );
            });

            if(! rowData.siblings.length )
                $('#detail-siblings_container').append( '<p class="text-muted">No Data</p>' );

            // Guardians
            $('#detail-guardians_container').empty();
            rowData.guardians.forEach(value => {
                const data = `<div>
                                <h6 class="detail-content-heading_value">${ value.name }</h6>
                                <p class="detail-content-heading">${value.pivot.phone}</p>
                            </div>`;

                $('#detail-guardians_container').append( data );
            });

            if(! rowData.guardians.length )
                $('#detail-guardians_container').append( '<p class="text-muted">No Data</p>' );

            // Emergency Contacts
            $('#detail-emergency-contact_container').empty();
            rowData.emergency_contacts.forEach(value => {
                const data = `<div>
                            <h6 class="detail-content-heading_value">${ value.emergency_contact_name }</h6>
                            <p class="detail-content-heading">${ value.emergency_contact }</p>
                        </div>`;

                $('#detail-emergency-contact_container').append( data );
            });

            if(! rowData.emergency_contacts.length )
                $('#detail-emergency-contact_container').append( '<p class="text-muted">No Data</p>' );
            

            // Display the tab container once there is a selected student
            $('.tab-panel_container').removeClass('d-none');

            // Populate the enrollment records tab container based on selected student
            let studentEnrollmentRecordsContent = '';
            rowData.course_enrollments.forEach(element => {
                studentEnrollmentRecordsContent += `<div class="d-xxl-flex justify-content-between align-items-xxl-center record-container mb-2">
                                    <h1 class="record-content">${ element.invoice ?? "-" }</h1>
                                    <h1 class="d-flex align-items-center record-content">
                                        <x-svg-icon icon="calendar" />
                                        ${ moment(element.created_at).format("MM/DD/YYYY, h:mm A") }
                                    </h1>
                                    <h1 class="record-content">${ ucfirst(element.status) ?? "-" }</h1>
                                    <h1 class="d-flex justify-content-end record-content">
                                        <span>
                                            <x-svg-icon icon="view" />
                                        </span>
                                    </h1>
                                </div>`;
            });

            $('.enrollment-records-container').empty();
            $('.enrollment-records-container').append(studentEnrollmentRecordsContent);

            // Populate the courses tab container based on selected student
            let studentCoursesRecordsContent = '';
            rowData.course_enrollments.forEach(element => {
                studentCoursesRecordsContent += `<div class="d-xxl-flex justify-content-between align-items-xxl-center record-container">
                                <h1 class="record-content">${ element.package.course.course_abbreviation }</h1>
                                <h1 class="record-content">${ ucfirst(element.status) ?? "-" }</h1>
                                <h1 class="record-content">${ formatString(element.type_of_course) }</h1>
                                <h1 class="d-flex justify-content-end record-content">
                                    <span class="cursor-pointer enrolled-course_btn" data-id="${element.package.course.id}" data-bs-toggle="modal" data-bs-target="#course-view_modal">
                                        <x-svg-icon icon="view"/>
                                    </span>
                                </h1>
                            </div>`;
            });

            $('.courses-records-container').empty();
            $('.courses-records-container').append(studentCoursesRecordsContent);

            console.log(rowData)
            // Render upcoming student classes of selected student
            if( rowData.student_classes.length > 0 ) {
                let upcomingClasses = `<option value="" hidden>Select Class</option>`;
                
                rowData.student_classes.forEach(element => {
                    upcomingClasses += `<option value="${element.class ? element.class.id : ''}">${element.class ? element.class.start_date : 'N/A'} ${element.class ? element.class.start_time : 'N/A'} - ${element.class ? element.class.end_time : 'N/A'} (${element.class ? element.class.course_class_code : 'N/A'})</option>`;
                });

                $('#modal-apply_for_leave select[name=class_id]').empty();
                $('#modal-apply_for_leave select[name=class_id]').append(upcomingClasses);
            }
 		});

        $('#add-student_btn').on('click', function(){
            clearMainForm();

            $('#information-modal .modal-title').text('Personal Information')
            
            formAction = 'add';

            $(`select[name=sibling]`).empty();
            const siblings = <?= json_encode($siblings) ?>;
            let siblingSelectOptions = '';
            siblings.forEach(element => {
                siblingSelectOptions += `<option value="${element.id}">${element.name}</option>`;
            });

            $(`select[name=sibling]`).append(siblingSelectOptions);
        });

        $('#edit-profile_btn').on('click', function(){
            clearMainForm();
            $('#information-modal .modal-title').text('Edit Personal Information')

            formAction = 'update';

            $('input[name=last_name]').val( selectedData.student_information.last_name );
            $('input[name=first_name]').val( selectedData.student_information.first_name );
            $('input[name=chinese_name]').val( selectedData.student_information.chinese_name );
            $('input[name=hkid]').val( selectedData.student_information.hkid );
            $('input[name=phone]').val( selectedData.student_information.phone );
            $('input[name=email]').val( selectedData.email );
            $('input[name=dob]').val( selectedData.student_information.dob );
            $('select[name=gender]').val( selectedData.student_information.gender );
            $('input[name=address]').val( selectedData.student_information.address );
            $('select[name=school_id]').val( selectedData.student_information.school_id );
            $('input[name=grade_of_class]').val( selectedData.student_information.grade_of_class );
            $('input[name=hear_about_us]').val( selectedData.student_information.hear_about_us );
            $('select[name=referral_by]').val( selectedData.student_information.referral_by );
            $('select[name=student_level]').val( selectedData.student_information.level ? selectedData.student_information.level.id : "" );
            $('[name=remarks]').val( selectedData.student_information.remarks );
            $('#modal-avatar').attr('src', selectedData.image_path);

            // List Siblings
            siblingsData = selectedData.siblings.map((value) => {
                return {
                    "id": value.id,
                    "name": value.name,
                    "student_information": value.student_information,
                };
            });
            renderSiblingList();

            $('.remove-sibling').on('click', function(){
                const index = $(this).data('index');

                siblingsData.splice(index, 1);
                renderSiblingList();
            });


            // List Guardians
            guardiansData = selectedData.guardians.map((value) => {
                return {
                    'id': value.id,
                    'guardian_id': value.id,
                    'guardian_name': value.name,
                    'guardian_phone': value.pivot.phone,
                    'guardian_password': "",
                    'guardian_relationship': value.pivot.relationship,
                };
            });
            renderGuardianList();

            $('.remove-guardian').on('click', function(){
                const index = $(this).data('index');

                guardiansData.splice(index, 1);
                renderGuardianList();
            });

            console.log(selectedData);
            // List Emergency Contacts
            emergencyContactsData = selectedData.emergency_contacts.map((value) => {
                return {
                    'id': value.id,
                    'emergency_contact_name': value.emergency_contact_name,
                    'emergency_contact': value.emergency_contact,
                    'emergency_contact_relationship': value.emergency_contact_relationship,
                };
            });
            renderEmergencyContactList();

            $('.remove-emergency_contact').on('click', function(){
                const index = $(this).data('index');

                emergencyContactsData.splice(index, 1);
                renderEmergencyContactList();
            });

            $(`select[name=sibling] option[value="${selectedData.id}"]`).remove();
        });

        // Slection of Sibling
        $('[name=sibling]').on('change', function(){
            const siblings = <?= json_encode($siblings) ?>;
            const id = $(this).val();

            if( id ) {
                const sibling = siblings.find((value) => value.id == id);

                if (! siblingsData.find(value => value.id == id) ) {
                    siblingsData.push(sibling);
                    renderSiblingList();
                }

                $(this).val('').trigger('change');
            }
        });

        $('#information-modal').on('click', '.remove-sibling', function(){
            const index = $(this).data('index');

            siblingsData.splice(index, 1);
            renderSiblingList();
        });

        // Adding of Guardian
        $('#show-guardian_form').on('click', function(){
            $('.guardian-form_container').removeClass('d-none');
        });

        $('#cancel-add_guardian').on('click', function(){
            $('.guardian-form_container').addClass('d-none');

            $('.guardian-form_container input').removeClass('border border-danger');
            $('.guardian-form_container select').removeClass('border border-danger');

            if ( $('.guardian-form_container input').next().is('p') )
                $('.guardian-form_container input').next().remove();

            if ( $('.guardian-form_container select').next().is('p') )
                $('.guardian-form_container select').next().remove();
        });

        $('#save-guardian').on('click', function(){
            if( guardianType == "select" ) {
                const id = $('.guardian-form_container select[name="guardian_id"]').val();

                const guardians = <?= json_encode($guardians) ?>;
                const guardian = guardians.find((value) => value.id == id);

                const data = {
                    'id': "",
                    'guardian_id': id,
                    'guardian_name': guardian ? guardian.name : '',
                    'guardian_phone': guardian.guardian[0] ? guardian.guardian[0].phone : '',
                    'guardian_password': '',
                    'guardian_relationship': $('.guardian-form_container input[name="guardian_relationship"]').val(),
                };

                const formData = [
                    {
                        "name" : "guardian_id",
                        "value" : id
                    },
                    {
                        "name" : "guardian_relationship",
                        "value" : data.guardian_relationship
                    }
                ]

                const requiredFields = ['guardian_id', 'guardian_relationship'];

                if( processErrorValidation(formData, requiredFields) ) {
                    return;
                }

                const isGuardianExists = guardiansData.find(value => value.id == id);
                if(! isGuardianExists )
                    guardiansData.push(data);
            } else if ( guardianType == "manual" ) {
                const guardianName = $('.guardian-form_container input[name="guardian_name"]').val();
                const guardianPhone = $('.guardian-form_container input[name="guardian_phone"]').val();
                const guardianPassword = $('.guardian-form_container input[name="guardian_password"]').val();
                const guardianRelationship = $('.guardian-form_container input[name="guardian_relationship"]').val();

                const data = {
                    'id': "",
                    'guardian_id': null,
                    'guardian_name': guardianName,
                    'guardian_phone': guardianPhone,
                    'guardian_password': guardianPassword,
                    'guardian_relationship': guardianRelationship,
                };

                const formData = [
                    {
                        "name" : "guardian_name",
                        "value" : guardianName
                    },
                    {
                        "name" : "guardian_phone",
                        "value" : guardianPhone
                    },
                    {
                        "name" : "guardian_password",
                        "value" : guardianPassword
                    },
                    {
                        "name" : "guardian_relationship",
                        "value" : guardianRelationship
                    }
                ]

                const requiredFields = ['guardian_id', 'guardian_relationship'];

                if( processErrorValidation(formData, requiredFields) ) {
                    return;
                }

                guardiansData.push(data);
            }
            
            clearGuardianForm();
            renderGuardianList();

            
        });

        $('#guardian-container').on('click', '.remove-guardian', function(){
            const index = $(this).data('index');

            guardiansData.splice(index, 1);
            renderGuardianList();
        });

        var guardianType = "select";
        $('#information-modal').on('click', '#add-guardian_form', function(){
            guardianType = "manual";

            $('.new-guardian-form').removeClass('d-none');
            $('.existing-guardian-selection').addClass('d-none');
            
            $('.manual-btn_container').addClass('d-none');
            $('.selection-btn_container').removeClass('d-none');
        });
        
        $('#information-modal').on('click', '#selection-guardian_form', function(){
            guardianType = "select";
            
            $('.new-guardian-form').addClass('d-none');
            $('.existing-guardian-selection').removeClass('d-none');

            $('.manual-btn_container').removeClass('d-none');
            $('.selection-btn_container').addClass('d-none');
        });

        // Adding of Emergency Contact
        $('#show-ermergency-contact').on('click', function(){
            $('.emergency-contact-form_container').removeClass('d-none');
        });

        $('#cancel-emergency_contact').on('click', function(){
            $('.emergency-contact-form_container').addClass('d-none');

            $('.emergency-contact-form_container input').removeClass('border border-danger');

            if ( $('.emergency-contact-form_container input').next().is('p') )
                    $('.emergency-contact-form_container input').next().remove();
        });

        $('#save-emergency_contact').on('click', function(){
            const data = {
                'id': "",
                'emergency_contact_name': $('.emergency-contact-form_container input[name="emergency_contact_name"]').val(),
                'emergency_contact': $('.emergency-contact-form_container input[name="emergency_contact"]').val(),
                'emergency_contact_relationship': $('.emergency-contact-form_container input[name="emergency_contact_relationship"]').val(),
            };

            const formData = [
                {
                    "name" : "emergency_contact_name",
                    "value" : data.emergency_contact_name
                },
                {
                    "name" : "emergency_contact_relationship",
                    "value" : data.emergency_contact_relationship
                }
            ]

            const requiredFields = [ 'emergency_contact_name', 'emergency_contact_relationship' ];
            
            if( processErrorValidation(formData, requiredFields) )
				return;

            emergencyContactsData.push(data);

            clearEmergencyContactForm();
            renderEmergencyContactList();

            $('.remove-emergency_contact').on('click', function(){
                const index = $(this).data('index');

                emergencyContactsData.splice(index, 1);
                renderEmergencyContactList();
            });
        });

        // Delete Record
        $('#student-table').on('click', '.delete-btn', function(){
            const dataID = $(this).data('id');
 			const data = <?= json_encode($data) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            console.log(rowData)
            $('#delete-modal #label-delete-studen-name u').text(rowData.name);
        });

        $('#student-table').on('click', '.unarchive-btn', function(){
            const dataID = $(this).data('id');
 			const data = <?= json_encode($data) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;

            $('#label-unarchive-student-name u').text( rowData.name );
        });
        
        // Modal Form Submit
        $('#save-form_btn').on('click', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#modal-form').serializeArray();

            const requiredFields = [
                'last_name', 'first_name', 'hkid',
                'phone', 'email', 'dob', 'gender'
            ];
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

            let transformedData = {};

            const excludeFields = [
                'guardian_id', 'guardian_relationship', 'sibling',
                'emergency_contact', 'emergency_contact_name', 'emergency_contact_relationship'
            ];

			formData.forEach(function(item) {
                if (! excludeFields.includes( item.name ) )
                    transformedData[item.name] = item.value
			});

            transformedData['siblings'] = siblingsData.map((sibling) => {
                return { "id": sibling.id };
            })

            transformedData['guardians'] = guardiansData.map((guardian) => {
                return { 
                    "id": guardian.guardian_id,
                    "name": guardian.guardian_name,
                    "phone": guardian.guardian_phone,
                    "password": guardian.guardian_password,
                    "relationship": guardian.guardian_relationship,
                 };
            })

            transformedData['emergency_contacts'] = emergencyContactsData;
            transformedData['password'] = "temp_Password123";
            transformedData['password_confirmation'] = "temp_Password123";

 			if ( imageData ) {
                transformedData['avatar'] = imageData;
            }

            // console.log(transformedData);
            // $(this).attr('disabled', 'true');
            // return;
            if ( formAction == 'add' ) {
                await axios.post(`${getApiUrl()}/student/add`, transformedData, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + userToken
                        }
                    }).then(res => {
                        $('#information-modal #cancel-form_btn').click();

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
                
            if ( formAction == 'update' ) {
                transformedData['id'] = selectedData.id.toString();

                // return;
                await axios.post(`${getApiUrl()}/student/update`, transformedData, {
						headers: {
							'Content-Type': 'application/json',
							'Authorization': 'Bearer ' + userToken
						}
					}).then(res => {
                        $('#information-modal #cancel-form_btn').click();

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

            const id = selectedData.id;
            await axios.post(`${getApiUrl()}/student/archive`, { "id": id }, {
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

        $('#process-unarchive').on('click', async function(){
            $(this).attr('disabled', 'true');

            const id = selectedData.id;
            
            // get user token
			const userToken = await getUserToken();

            await axios.post(`${getApiUrl()}/student/unarchive`, { "id": id }, {
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

        // Siblings
        function renderSiblingList() {
            $('#selected-sibling-container').empty();

            siblingsData.forEach((data, index) => {
                $('#selected-sibling-container').append( siblingDataList( index, data ) );
            });
        }

        function siblingDataList( index, data ) {
            return `<div class="d-xxl-flex align-items-xxl-center gap-3 custom-badge_container border sibling-container-${index}">
                        <p>${data.name} / ${data.student_information.student_id} / ${data.student_information.level.name}</p>
                        <span class="remove-sibling text-dark cursor-pointer" data-index="${index}">
                            <x-svg-icon icon="times" />
                        </span>
                    </div>`;
        }

        // Guardians
        function renderGuardianList() {
            $('#guardian-container').empty();

            guardiansData.forEach((data, index) => {
                $('#guardian-container').append( guardianDataList( index, data ) );
            });
        }

        function guardianDataList( index, data ) {
            return `<div class="d-xxl-flex align-items-xxl-center gap-3 custom-badge_container border guardian-container-${index}">
                        <p>${ data.guardian_name } / ${ data.guardian_phone } / ${ data.guardian_relationship }</p>
                        <span class="remove-guardian text-dark cursor-pointer" data-index="${index}">
                            <x-svg-icon icon="times" />
                        </span>
                    </div>`;
        }

        // Emergency Contact
        function renderEmergencyContactList() {
            $('#emergency-contact-container').empty();

            emergencyContactsData.forEach((data, index) => {
                $('#emergency-contact-container').append( emergencyContactDataList( index, data ) );
            });
        }

        function emergencyContactDataList( index, data ) {
            return `<div class="d-xxl-flex align-items-xxl-center gap-3 custom-badge_container border contact-person-container-${index}">
                        <p>${data.emergency_contact_name} / ${data.emergency_contact} / ${data.emergency_contact_relationship}</p>
                        <span class="remove-emergency_contact text-dark cursor-pointer" data-index="${index}">
                            <x-svg-icon icon="times" />
                        </span>
                    </div>`;
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
                    else if ( item.name == 'phone' ) {
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

        // Rest Modal Forms
        function clearMainForm() {
            $('input').val('');
            $('select').val('');
            $('textarea').val('');
            $('#modal-avatar').attr('src', "{{ asset('themes/tailwind/images/profile.png') }}");
            $('#information-modal input[name=hkid]').val("{{ 'S'.rand(111111, 999999) }}");
            
            siblingsData = [];
            guardiansData = [];
            emergencyContactsData = [];
            errors = [];

            renderSiblingList();
            renderGuardianList();
            renderEmergencyContactList();
            renderErrors();

            guardianType = "select";
            
            $('.new-guardian-form').addClass('d-none');
            $('.existing-guardian-selection').removeClass('d-none');

            $('.manual-btn_container').removeClass('d-none');
            $('.selection-btn_container').addClass('d-none');

            $('#modal-form input').removeClass('border border-danger');
            $('#modal-form input').parent().removeClass('border border-danger');

            if( $('#modal-form input').next().is('p') )
                $('#modal-form input').next().remove();

            if( $('#modal-form input').parent().next().is('p') )
                $('#modal-form input').parent().next().remove();

            $('#modal-form select').removeClass('border border-danger');
            if( $('#modal-form select').next().is('p') )
                $('#modal-form select').next().remove();

            $('#modal-form textarea').removeClass('border border-danger');
            if( $('#modal-form textarea').next().is('p') )
                $('#modal-form textarea').next().remove();
        }

        function clearGuardianForm() {
            $('.guardian-form_container select[name="guardian_id"]').val("");
            $('.guardian-form_container input[name="guardian_relationship"]').val("");
            $('.guardian-form_container input[name="guardian_name"]').val("");
            $('.guardian-form_container input[name="guardian_phone"]').val("");
        }

        function clearEmergencyContactForm() {
            $('.emergency-contact-form_container input[name="emergency_contact_name"]').val("");
            $('.emergency-contact-form_container input[name="emergency_contact"]').val("");
            $('.emergency-contact-form_container input[name="emergency_contact_relationship"]').val("");
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

        initializeInputClearEvent();

        /** --------------------------
         * Enrollment
         *  --------------------------
         */
        var coursePackages = [];
        var classes = [];
        var selectedClasses = [];
        var tempSelectedClasses = [];
        var selectedLevelID = '';
        var selectedPackage = '';
        var selectedCourseType = '';

        $('#btn-enroll_student').on('click', function(){
            // Fill the Student Detail table
            $('#student-detail_container table tbody').empty();

            const studentDetail = `<tr>
                                <td>${selectedData.name}</td>
                                <td>${selectedData.student_information.gender}</td>
                                <td>${selectedData.student_information.level.name}</td>
                                <td>${selectedData.student_information.dob}</td>
                            </tr>`;

            $('#student-detail_container table tbody').append(studentDetail);

            // reset
            resetEnrollmentModal();
            selectedClasses = [];
            tempSelectedClasses = [];
            $('#main-form #course-details_container table tbody').empty();
            $('#main-form #course-details_container table tbody').append('<tr><td colspan="8" class="text-center">No Selected Course/Class</td></tr>');
            $('#main-form #course-details_container select[name=course]').val('');
            $('#main-form #course-details_container select[name=type_of_course]').val('');

            coursePackages = <?= json_encode($course_packages) ?>;
        });

        $('#select-course').on('click', function(){
            const requiredFields = ['course', 'type_of_course'];
            const selectedCourse = $('select[name=course]').val();

            const typeOfCourseValue = $('select[name=type_of_course]').val();
            const formData = [
                {
                    "name": "type_of_course",
                    "value": typeOfCourseValue,
                },
                {
                    "name": "course",
                    "value": selectedCourse,
                }
            ];

			if( processErrorValidation(formData, requiredFields) )
				return;

            const typeOfCourse = $('#main-form #course-details_container select[name=type_of_course]').val();
            selectedCourseType = typeOfCourse

            if ( typeOfCourse == 'full_term' ) {
                // $('#class-form').addClass('d-none');
                // $('#course-form').removeClass('d-none');

                // // update the width of the modal
                // $('#enrollment-modal .modal-dialog').removeClass('modal-lg');
                // $('#enrollment-modal .modal-dialog').addClass('modal-xl');

                // // show modal footer
                // $('#enrollment-modal .modal-footer').removeClass('d-none');

                // // change the modal header
                // $('#enrollment-modal #course-modal_header').removeClass('d-none');
                // $('#enrollment-modal #main-modal_header').addClass('d-none');

                // renderCoursesToTable();

                const coursePackage = Object.values(coursePackages).find(value => value.id == selectedCourse);
                selectedPackage = coursePackage
                selectedClasses = coursePackage.course.course_classes;
                tempSelectedClasses = selectedClasses.slice();

                renderSelectedData();
            }
                
            if ( typeOfCourse == 'flexible_course' ){
                $('#main-form').addClass('d-none');

                $('#course-form').addClass('d-none');
                $('#class-form').removeClass('d-none');

                // update the width of the modal
                // $('#enrollment-modal .modal-dialog').removeClass('modal-lg');
                // $('#enrollment-modal .modal-dialog').addClass('modal-xl');

                // show modal footer
                $('#enrollment-modal .modal-footer').removeClass('d-none');

                // change the modal header
                $('#enrollment-modal #course-modal_header').removeClass('d-none');
                $('#enrollment-modal #main-modal_header').addClass('d-none');

                const coursePackage = Object.values(coursePackages).find(value => value.id == selectedCourse);
                selectedPackage = coursePackage
                classes = coursePackage.course.course_classes;

                renderClassesToTable();
            }
        });

        $('#close-form_btn').on('click', function(){
            resetEnrollmentModal();
        });

        $('#add-form_btn').on('click', function(){
            $('#main-form').removeClass('d-none');
            $('#course-form').addClass('d-none');
            $('#class-form').addClass('d-none');
            $('#enrollment-modal .modal-footer').addClass('d-none');
            $('#enrollment-modal #course-modal_header').addClass('d-none');
            $('#enrollment-modal #main-modal_header').removeClass('d-none');
            // $('#enrollment-modal .modal-dialog').addClass('modal-lg');
            // $('#enrollment-modal .modal-dialog').removeClass('modal-xl');

            renderSelectedData();
        });

        $('#course-form .select-all').on('change', function(){
            const isChecked = $(this).prop('checked');
            
            if( isChecked )
                $('#course-form .course-checkbox').prop('checked', true);

            else
                $('#course-form .course-checkbox').prop('checked', false);

            $('#course-form .course-checkbox').change();
        });

        $('#class-form .select-all').on('change', function(){
            const isChecked = $(this).prop('checked');
            
            if( isChecked )
                $('#class-form .class-checkbox').prop('checked', true);
    
            else
                $('#class-form .class-checkbox').prop('checked', false);

            $('#class-form .class-checkbox').change();
        });

        $('#course-form select[name=level_filter]').on('change', function(){
            const value = $(this).val();
            
            selectedLevelID = value;

            renderCoursesToTable();
        });

        $('#class-form select[name=level_filter]').on('change', function(){
            const value = $(this).val();
            
            selectedLevelID = value;

            renderClassesToTable();
        });

        $('#main-form').on('click', '#pay-now_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

            if ( tempSelectedClasses.length <= 0 ) {
                toastTopEnd("Warning!", "Please select classes first", "warning");
                $(this).removeAttr('disabled');
                return;
            }

            const formData = {
                user_id: selectedData.id,
                package_id: selectedPackage.id,
                is_paid: 1,
                type_of_course: selectedCourseType,
                course_classes: tempSelectedClasses
            }

            
            await axios.post(`${getApiUrl()}/student/enroll-course`, formData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#enrollment-modal #cancel_btn').click();

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

        $('#main-form').on('click', '#send-invoice_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

            if ( tempSelectedClasses.length <= 0 ) {
                toastTopEnd("Warning!", "Please select classes first", "warning");
                $(this).removeAttr('disabled');
                return;
            }

            const formData = {
                user_id: selectedData.id,
                package_id: selectedPackage.id,
                is_paid: 1,
                type_of_course: selectedCourseType,
                course_classes: tempSelectedClasses
            }

            
            await axios.post(`${getApiUrl()}/student/enroll-course`, formData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#enrollment-modal #cancel_btn').click();

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

        function renderCoursesToTable() {
            $('#course-form table').DataTable().destroy();
            $('#course-form table tbody').empty();
           
            let filteredCoursePackages = Object.values(coursePackages).filter(function(value){
                return value.course.course_level == selectedLevelID;
            });

            if ( selectedLevelID == '' )
                filteredCoursePackages = coursePackages;
            
            let coursePackagesData = ``;
            
            filteredCoursePackages.forEach(coursePackage => {
                let coaches = '';

                coursePackage.course.coaches.forEach(coach => {
                    coaches += `<p>${coach.name ?? coach.full_name}</p>`;
                });

                let hasSelected = selectedClasses.find(value => value.course_id == coursePackage.course.id);

                coursePackagesData += `<tr>
                                    <td><input type="checkbox" class="course-checkbox" data-id="${coursePackage.course.id}" ${hasSelected ? 'checked' : ''}></td>
                                    <td>${coursePackage.course.course_abbreviation}</td>
                                    <td>${coursePackage.course.level?.name ?? ''}</td>
                                    <td>${coursePackage.course.venue.name}</td>
                                    <td>${coaches}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>${coursePackage.course.class_full_price}</td>
                                    <td>${coursePackage.course.course_type.name}</td>
                                </tr>`;
            });

            $('#course-form table tbody').append(coursePackagesData);

            const table = $('#course-form table').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "aaSorting": [],
                "orderMulti": true,
            });

            // Event listener for custom search input
            $('#course-form input[name=search_filter]').on('keyup', function() {
                var searchTerm = $(this).val();
                
                table.search(searchTerm).draw();
            });

            $('.course-checkbox').on('change', function(){
                const isChecked = $(this).prop('checked');
                const rowId = $(this).data('id');
                
                if ( isChecked ) {
                    // Check if selected is already on the array of data
                    const onSelectedClasses = tempSelectedClasses.find(value => value.course_id == rowId);

                    // Add to the array of data
                    const courseClasses = classes.filter(function(value){
                        return value.course_id == rowId;
                    });
                    
                    if ( courseClasses.length && !onSelectedClasses )
                        tempSelectedClasses.push(...courseClasses);
                } else {
                    // remove from the array of data
                    const classesByCourse = tempSelectedClasses.filter(function(value) {
                        return value.course_id == rowId;
                    });

                    classesByCourse.forEach(element => {
                        const selectedCourseIndex = tempSelectedClasses.findIndex(value => value.id == element.id);
                        
                        if ( selectedCourseIndex >= 0 )
                            tempSelectedClasses.splice(selectedCourseIndex, 1);
                    });

                    $("#course-form .select-all").prop('checked', false);
                }
            });
        }

        function renderClassesToTable() {
            $('#class-form table').DataTable().destroy();
            $('#class-form table tbody').empty();

            let filteredClasses = classes.filter(function(value){
                return value.course.course_level == selectedLevelID;
            });

            if ( selectedLevelID == '' )
                filteredClasses = classes;
            
            let classesData = ``;
            
            filteredClasses.forEach(value => {
                let coaches = '';

                value.course.coaches.forEach(coach => {
                    coaches += `<p>${coach.name ?? coach.full_name}</p>`;
                });

                let hasSelected = selectedClasses.find(selectedClass => selectedClass.id == value.id);

                classesData += `<tr>
                                    <td><input type="checkbox" class="class-checkbox" data-id="${value.id}" ${hasSelected ? 'checked' : ''}></td>
                                    <td>${value.course_class_code}</td>
                                    <td>${value.course.level?.name ?? ''}</td>
                                    <td>${value.course.venue.name}</td>
                                    <td>${coaches}</td>
                                    <td>${value.start_date + " - " + value.end_date}</td>
                                    <td>${value.start_time + " - " + value.end_time}</td>
                                    <td>${value.course.class_full_price}</td>
                                    <td>${value.course.course_type.name}</td>
                                </tr>`;
            });

            $('#class-form table tbody').append(classesData);

            const table = $('#class-form table').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "aaSorting": [],
                "orderMulti": true,
            });

            // Event listener for custom search input
            $('#class-form input[name=search_filter]').on('keyup', function() {
                var searchTerm = $(this).val();
                
                table.search(searchTerm).draw();
            });

            $('.class-checkbox').on('change', function(){
                const isChecked = $(this).prop('checked');
                const rowId = $(this).data('id');

                if ( isChecked ) {
                    // Add to the array of data
                    const selectedClass = classes.find((value) => {
                        return value.id == rowId;
                    });
                    
                    if ( selectedClass )
                        tempSelectedClasses.push(selectedClass);
                } else {
                    // remove from the array of data
                    const selectedClassIndex = tempSelectedClasses.findIndex(value => value.id == rowId);

                    if ( selectedClassIndex >= 0 )
                        tempSelectedClasses.splice(selectedClassIndex, 1);
                }

                console.log(tempSelectedClasses);
            });
        }

        function renderSelectedData() {
            $('#main-form #course-details_container table tbody').empty();

            let dataElement = '';

            tempSelectedClasses.forEach((value, key) => {
                let venueFacilities = '';

                value.course.venue.school_venue_facilities.forEach(value => {
                    venueFacilities += `<p>${value.name}</p>`;
                });

                dataElement += `<tr class="class-data-${value.id}">
                                    <td>${value.course_class_code}</td>
                                    <td>${value.start_date + " - " + value.end_date}</td>
                                    <td>${value.start_time + " - " + value.end_time}</td>
                                    <td>${value.course.venue.name ?? ''}</td>
                                    <td>${venueFacilities ?? ''}</td>
                                    <td>${value.remaining_seat + "/" + value.total_seat}</td>
                                    <td>${"$"+value.course.course_full_price}</td>
                                    <td class="d-flex justify-content-end" style="margin: 0 !important;">
                                        <span class="small-icon_btn p-1 cursor-pointer remove-selected_btn" data-id="${value.id}"><x-svg-icon icon="times" /></span>
                                    </td>
                                </tr>`;
            });

            $('#main-form #course-details_container table tbody').append(dataElement);

            $('.remove-selected_btn').on('click', function(){
                const ID = $(this).data('id');

                const index = tempSelectedClasses.findIndex(value => value.id == ID);

                tempSelectedClasses.splice(index, 1);

                $(`#main-form #course-details_container table tbody .class-data-${ID}`).remove();

                if( tempSelectedClasses.length <= 0 ) {
                    $('#main-form #course-details_container table tbody').append('<tr><td colspan="8" class="text-center">No Selected Course/Class</td></tr>');
                }

            });
        }

        function resetEnrollmentModal() {
            $('#main-form').removeClass('d-none');
            $('#course-form').addClass('d-none');
            $('#class-form').addClass('d-none');
            $('#enrollment-modal .modal-footer').addClass('d-none');
            $('#enrollment-modal #course-modal_header').addClass('d-none');
            $('#enrollment-modal #main-modal_header').removeClass('d-none');
            // $('#enrollment-modal .modal-dialog').addClass('modal-lg');
            // $('#enrollment-modal .modal-dialog').removeClass('modal-xl');
        }

        // Arrangement Option
        $('.arrangement-container').on('click', 'input[name=arrangement]', function(){
            const value = $(this).val();
            console.log(value);
            if( value == 'makeup_swap' ) {
                $('#makeup-detail_container').removeClass('d-none');
                $('#change-course_container').addClass('d-none');
            }

            if( value == 'change_course' ) {
                $('#makeup-detail_container').addClass('d-none');
                $('#change-course_container').removeClass('d-none');
            }
        });

        // MakeUp Classes
        var selectedCourse = {};
        var enrolledClasses = {};
        var availableClassList = {};
        var selectedClassID = "";
        $('.courses-records-container').on('click', '.enrolled-course_btn', function(){
            const id = $(this).data('id');

            resetModalForm();

            // Fill the details on the modal
            const allCourses = <?= json_encode($course_packages) ?>;
      
            const courseSelected = Object.values(allCourses).find((value) => value.course_id == id);

            selectedCourse = courseSelected;

            // Fill the course detail modal view
            $('#course-detail_container #course-detail_code').text(selectedCourse.course.course_abbreviation);
            $('#course-detail_container #course-detail_level').text(selectedCourse.course.level.name);
            $('#course-detail_container #course-detail_venue').text(selectedCourse.course.venue.name);
            $('#course-detail_container #course-detail_facility').text(selectedCourse.course.facility.name);
            $('#course-detail_container #course-detail_size').text(selectedCourse.course.course_size);
            
            $('#course-detail_container #course-detail_type').text(selectedCourse.course.course_type.name);
            $('#course-detail_container #course-detail_coaches').empty();
            let courseCoachesElement = '';
            selectedCourse.course.coaches.forEach(element => {
                courseCoachesElement += `<p>${element.name}</p>`;
            });
            $('#course-detail_container #course-detail_coaches').append(courseCoachesElement);

            const allClasses = <?= json_encode($classes) ?>;

            const filteredClasses = allClasses.filter((value) => {
                const enrolledStudents = value.enrolled_students.find(dataValue => dataValue.student_id == selectedData.id);

                return value.course_id == selectedCourse.course.id && enrolledStudents
            });

            enrolledClasses = filteredClasses;

            const availableClasses = allClasses.filter((value) => {
                const enrolledStudents = value.enrolled_students.find(dataValue => dataValue.student_id != selectedData.id);
                
                return value.course_id == selectedCourse.course.id && ( enrolledStudents || value.enrolled_students.length <= 0 )
            });
            availableClassList = availableClasses;

            // For table rows
            $('#class-detail_container table tbody').empty();
            let tableRows = '';
            filteredClasses.forEach(element => {
                tableRows += `<tr>
                                <td>${element.course_class_code}</td>
                                <td>${element.venue ?? "-"}</td>
                                <td>${element.facility ?? "-"}</td>
                                <td>${element.coach ?? "-"}</td>
                                <td>${element.start_date}</td>
                                <td>${element.start_time + " - " + element.end_time}</td>
                                <td>
                                    <span class="cursor-pointer makeup-class_btn" data-class_id="${element.id}">
                                        <i class="fa-solid fa-right-left"></i>
                                    </span>
                                </td>
                            </tr>`;
            });

            if( filteredClasses.length <= 0 )
                tableRows += `<tr>
                                <td colspan="7" class="text-center">No Enrolled Class found</td>
                            </tr>`;

            $('#class-detail_container table tbody').append(tableRows);
        })

        $('#class-detail_container').on('click', '.makeup-class_btn', function(){
            let classID = $(this).data('class_id');
            selectedClassID = classID

            $('#class-detail_container table tbody tr').removeAttr('style');
            $(this).closest('tr').attr('style', 'background: #e7e7e7;');

            // show the makeup/swap container
            $('#makeup-detail_container').removeClass('d-none');
            $('.arrangement-container').removeClass('d-none');

            $('#makeup-detail_container select[name=class_id]').empty();
            let availableClassOptions = '';
            availableClassOptions += `<option value="" hidden>Select Available Class</option>`;
            availableClassList.forEach(element => {
                availableClassOptions += `<option value="${element.id}">${element.course_class_code + " (" + element.start_date + " " + element.start_time + " - " + element.end_time + " )"}</option>`;
            });

            if( availableClassList.length <= 0 )
                availableClassOptions = `<option value="" hidden>No Available Class</option>`;

            $('#makeup-detail_container select[name=class_id]').append(availableClassOptions);

            // console.log(classID);
            // console.log(selectedData);
            // console.log(selectedCourse);
            // console.log(enrolledClasses);
            // console.log(availableClassList);
        });

        $('#makeup-detail_container').on('click', '#make-up-swap_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();
			
			// Prepare Data
			const formData = $('#makeup-detail_container #modal-form').serializeArray();

            const requiredFields = [
                'makeup_reason'
            ];
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

			let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

			let data = new FormData()
			data.append('user_id', selectedData.id)
            const studentClassID = selectedData.student_classes.find(value => value.student_id == selectedData.id && value.class_id == selectedClassID);
			data.append('student_class_id', studentClassID.id)
			data.append('class_id', transformedData['class_id'])
			data.append('reason', transformedData['makeup_reason'])
            data.append('attachment', $('#makeup-detail_container input[name=attachment]')[0].files[0], $('#makeup-detail_container input[name=attachment]')[0].files[0].name)

			// $(this).removeAttr('disabled');
			// console.log(data);
			// console.log(transformedData);
			// return;

			await axios.post(`${getApiUrl()}/request/create-make-up-class`, data, {
					headers: {
						'Authorization': 'Bearer ' + userToken,
					}
				}).then(res => {
					$('#course-view_modal').modal('hide');

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

        $('#change-course_container').on('click', '#change-course_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();
			
			// Prepare Data
			const formData = $('#change-course_container #modal-form').serializeArray();

            const requiredFields = [
                'makeup_reason'
            ];
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

			let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

			let data = new FormData()
			data.append('user_id', selectedData.id)
            
            const studentClass = selectedData.student_classes.find(value => value.student_id == selectedData.id && value.class_id == selectedClassID);
            console.log(selectedData);
            console.log(studentClass);
            const courseEnrollment = selectedCourse.enrollments.find(value => value.user_id = selectedData.id && value.package_id == studentClass.class.package_id);

            if( studentClass )
			    data.append('student_class_id', studentClass.id)

            if( courseEnrollment )
                data.append('course_enrollment_id', courseEnrollment.id)

            data.append('package_id', studentClass.class.package_id)
			data.append('reason', transformedData['reason'])
            // data.append('attachment', $('#change-course_container input[name=attachment]')[0].files[0], $('#change-course_container input[name=attachment]')[0].files[0].name)

			// $(this).removeAttr('disabled');
			// console.log(data);
			// console.log(transformedData);
			// return;

			await axios.post(`${getApiUrl()}/request/create-change-course`, data, {
					headers: {
						'Authorization': 'Bearer ' + userToken,
					}
				}).then(res => {
					$('#course-view_modal').modal('hide');

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

        $('#information-modal').on('click', '.profile-image-edit_btn', function(){
            $('#information-modal #avatar-field').click();
        })

        $("#information-modal").on('change', '#avatar-field', function() {
 			const input = $(this)[0].files[0];
 			var preview = $("#information-modal #modal-avatar");

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

        function resetModalForm() {
            // check back the radio button to makeup_swap
            $('input[value="change_course"]').prop('checked', false);
            $('input[value="makeup_swap"]').click();

            $('.arrangement-container').addClass('d-none');
            $('#makeup-detail_container').addClass('d-none');
            $('#change-course_container').addClass('d-none');

            // clear form field
            $('select[name=class_id]').val('');
            $('input[name=attachment]').val('');
            $('[name=makeup_reason]').val('');

            $('[name=reason]').val('');
        }

        $('.withdrawal-btn_container').on('click', '#withdrawal-btn', function(){
            $('#course-view_modal #cancel_btn').click();
            $('#course-withdrawal_modal').modal('show');
            
            $('#course-withdrawal_modal .modal-body_message span').text(selectedCourse.course.course_abbreviation);
        });

        $('#course-withdrawal_modal').on('click', '#save-form_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();
			
			// Prepare Data
			const formData = $('#course-withdrawal_modal #modal-form').serializeArray();

            const requiredFields = [
                'reason'
            ];
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

			let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            const courseEnrollment = selectedCourse.enrollments.find(value => value.user_id == selectedData.id);

			let data = new FormData()
			data.append('user_id', selectedData.id)
			data.append('reason', transformedData['reason'])

            if( courseEnrollment ) {
                data.append('package_id', courseEnrollment.package_id)
			    data.append('course_enrollment_id', courseEnrollment.id)
            }
			
            const attachmentData = $('#course-withdrawal_modal input[name=attachment]')[0].files[0];
            if( attachmentData )
			    data.append('attachment', attachmentData, attachmentData.name);
            
            // $(this).removeAttr('disabled');
			// console.log(data);
			// console.log(transformedData);
			// return;

            data.append('from', 'student')

			await axios.post(`${getApiUrl()}/request/create-course-withdrawal`, data, {
					headers: {
						'Authorization': 'Bearer ' + userToken,
					}
				}).then(res => {
					$('#course-withdrawal_modal #cancel_btn').click();

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

        /**
         * * Apply for Leave
         */
        $('.page-content-col2').on('click', '#btn-apply_for_leave', function(){
            clearLeavelFormFields();
        });

        $('#modal-apply_for_leave').on('change', 'select[name=reason]', function(){
            const value = $(this).val();

            if( value == 'Other' ) {
                $('#modal-apply_for_leave .other-leave').removeClass('d-none');
            } else {
                $('#modal-apply_for_leave .other-leave').addClass('d-none');
            }
        });

        $('#modal-apply_for_leave').on('click', '#save-form_btn', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();
			
			// Prepare Data
			const formData = $('#modal-apply_for_leave #modal-form').serializeArray();

            let requiredFields = [
                'class_id', 'reason'
            ];

            if( $('#modal-apply_for_leave select[name=reason]').val() == "Other" )
                requiredFields.push('other_reason');
            
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

			let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            // Update the reason value
            if( $('#modal-apply_for_leave select[name=reason]').val() == "Other" )
                transformedData['reason'] = $('#modal-apply_for_leave input[name=other_reason]').val()

            // get the attachment
            if( $('#modal-apply_for_leave input[name=attachment]')[0].files[0] )
                transformedData['attachment'] = $('#modal-apply_for_leave input[name=attachment]')[0].files[0];
                // transformedData.append('attachment', $('#modal-apply_for_leave input[name=attachment]')[0].files[0], $('#modal-apply_for_leave input[name=attachment]')[0].files[0].name)

            // attached selected student id
            transformedData['user_id'] = selectedData.id;

            // console.log(transformedData)
            // $(this).removeAttr('disabled');
            // return;

            await axios.post(`${getApiUrl()}/student/leave`, transformedData, {
					headers: {
						'Authorization': 'Bearer ' + userToken,
					}
				}).then(res => {
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

        function clearLeavelFormFields()
        {
            // clear field value
            $('#modal-apply_for_leave select').val('');
            $('#modal-apply_for_leave input').val('');
            $('#modal-apply_for_leave textarea').val('');

            // clear error fields
            $('#modal-apply_for_leave select').removeClass('border border-danger');
            $('#modal-apply_for_leave input').removeClass('border border-danger');

            $('#modal-apply_for_leave select').next('p.text-danger').remove();
            $('#modal-apply_for_leave input').next('p.text-danger').remove();
        }
    });
</script>
@endsection