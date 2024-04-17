@extends('theme::layouts.app')

@section('content')
<style>
    .export-button {
        background-color: #F5F5F5;
        border: 1px solid transparent;
        color: inherit;
        border-radius: 0.25em;
    }

    #student-attendance-table_wrapper .row {
        width: 100%;
    }

    .dropdown-container {
        width: 100%;
        position: absolute;
        padding-right: 1.5rem;
    }

    .dropdown-content {
        width: 100%;
        background-color: #FFFFFF;
        overflow: auto;
        border: 1px solid #ddd;
        z-index: 1;
        box-shadow: 0px 16px 50px 0px #58585833;
        border-radius: 8px;
    }

    .dropdown-content a,
    .dropdown-content p {
        color: #636363;
        font-size: 14px;
        font-weight: 400;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #F5F5F5;
    }
</style>
<div class="page-container">
    <x-page-content-heading 
        heading="Report" 
        withButton="false"
    />
    <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4 mt-4" role="tablist">
        <li class="nav-item" id="t1" role="presentation">
            <a class="nav-link active tablink" role="tab" data-bs-toggle="tab" href="#tab-1">Student Attendance Records</a>
        </li>
        <li class="nav-item" id="t2" role="presentation">
            <a class="nav-link tablink" role="tab" data-bs-toggle="tab" href="#tab-2">Course Enrollment Records</a>
        </li>
        <li class="nav-item" id="t3" role="presentation">
            <a class="nav-link tablink" role="tab" data-bs-toggle="tab" href="#tab-3">Competition Participation Records</a>
        </li>
        <li class="nav-item" id="t4" role="presentation">
            <a class="nav-link tablink" role="tab" data-bs-toggle="tab" href="#tab-4">Makeup Report</a>
        </li>
        <li class="nav-item" id="t5" role="presentation">
            <a class="nav-link tablink" role="tab" data-bs-toggle="tab" href="#tab-5">Coach working hour/salary report</a>
        </li>
        <li class="nav-item" id="t6" role="presentation">
            <a class="nav-link tablink" role="tab" data-bs-toggle="tab" href="#tab-6">Customs</a>
        </li>
    </ul>

    <div class="tab-content custom-datatable_container">
        <div id="tab-1" class="tab-pane active" role="tabpanel" style="min-height: 0px;height: auto;">
            <div class="row" style="margin-top: 15px;">
                <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding: 15px;">
                    <div class="row report-filter-tab">
                        <div class="col-auto mb-3">
                            <div class="form-group">
                                <label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Start Date</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                            <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control form-control" id="student-attendance-from" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto mb-3">
                            <div class="form-group">
                                <label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">End Date</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                            <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control form-control" id="student-attendance-to" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;">
                                </div>
                            </div>
                        </div>
                        <div class="col-10 position-relative">
                            <x-search-input inputType="text" inputName="report_search" inputID="report_search" hasDropdown="true" :dropdownItems="$dropdown_items" inputPlaceholder="Search (Course Code/ Class Code / Student)" />
                        </div>
                        <div class="col-2 d-flex align-items-end">
                            <x-primary-button type="button" id="filter-student-attendance-records" title="Filter" toggle="" target=""/>
                        </div>
                    </div>
                    <div class="row report-table-container d-none">
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary float-end w-auto export-button d-flex align-items-center mb-3" id="export-student-attendance-report">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                    <path d="M11 5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5V12.1578L16.2428 8.91501L17.657 10.3292L12.0001 15.9861L6.34326 10.3292L7.75748 8.91501L11 12.1575V5Z" fill="currentColor"></path>
                                    <path d="M4 14H6V18H18V14H20V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14Z" fill="currentColor"></path>
                                </svg>
                                Export
                            </button>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive" style="height: auto;max-height: none;">
                                <table class="table table-hover custom-datatable" id="student-attendance-table" style="width: 100%;">
                                    <thead>
                                        <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                            <th class="text-center"><input type="checkbox"></th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">#</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">NAME/ID</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">CLASS</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">DATE</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">TIME</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COACH</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody style="height: auto;"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3">
                    <div class="card" style="height: 100%">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;text-align: center;">Student Attendance Records</h1>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h1 class="fw-semibold" style="font-size: 15px;color: #3B3B3B;font-family: Poppins, sans-serif;">INFORMATION</h1>
                                </div>
                                <div class="col-12">
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
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">#</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-number" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Name</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-name" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Student ID</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-student-id" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Class</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-class" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Cost</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-cost" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Prerequisite</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-prerequisite" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Course Category</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-course-category" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
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
        </div>
        <div id="tab-2" class="tab-pane" role="tabpanel" style="min-height: 0px;height: auto;">
            <div class="row" style="margin-top: 15px;">
                <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;padding: 15px;">
                    <div class="row report-filter-tab">
                        <div class="col-auto">
                            <div class="form-group">
                                <label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Start Date</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                            <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control form-control" id="course-enrollments-from" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-group">
                                <label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">End Date</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                            <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control form-control" id="course-enrollments-to" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto d-flex align-items-end">
                            <x-primary-button type="button" id="filter-enrollment-records" title="Filter" toggle="" target=""/>
                        </div>
                    </div>
                    <div class="row report-table-container d-none">
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary float-end w-auto export-button d-flex align-items-center mb-3" id="export-course-enrollment-report">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                    <path d="M11 5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5V12.1578L16.2428 8.91501L17.657 10.3292L12.0001 15.9861L6.34326 10.3292L7.75748 8.91501L11 12.1575V5Z" fill="currentColor"></path>
                                    <path d="M4 14H6V18H18V14H20V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14Z" fill="currentColor"></path>
                                </svg>
                                Export
                            </button>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive" style="height: auto;max-height: none;">
                                <table class="table table-hover custom-datatable" id="enrollment-records-table" style="width: 100%;">
                                    <thead>
                                        <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                            <th class="text-center"><input type="checkbox"></th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">#</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">ENTRIES DATE & TIME</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">CATEGORY</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">NAME</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">PHONE</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody style="height: auto;"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3">
                    <div class="card" style="height: 100%">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;text-align: center;">Enrollment Records</h1>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h1 class="fw-semibold" style="font-size: 15px;color: #3B3B3B;font-family: Poppins, sans-serif;">INFORMATION</h1>
                                </div>
                                <div class="col-12">
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
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">#</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-number" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Name</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-name" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Student ID</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-student-id" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Cost</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-cost" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Course Category</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-course-category" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
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
        </div>
        <div id="tab-3" class="tab-pane" role="tabpanel" style="min-height: 0px;height: auto;">
            <div class="row" style="margin-top: 15px;">
                <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;padding: 15px;">
                    <div class="row report-filter-tab">
                        <div class="col-auto">
                            <div class="form-group">
                                <label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Start Date</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                            <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control form-control" id="competition-participation-from" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-group">
                                <label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">End Date</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                            <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control form-control" id="competition-participation-to" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto d-flex align-items-end">
                            <x-primary-button type="button" id="filter-competition-participation" title="Filter" toggle="" target=""/>
                        </div>
                    </div>
                    <div class="row report-table-container d-none">
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary float-end w-auto export-button d-flex align-items-center mb-3" id="export-competition-participation-report">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                    <path d="M11 5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5V12.1578L16.2428 8.91501L17.657 10.3292L12.0001 15.9861L6.34326 10.3292L7.75748 8.91501L11 12.1575V5Z" fill="currentColor"></path>
                                    <path d="M4 14H6V18H18V14H20V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14Z" fill="currentColor"></path>
                                </svg>
                                Export
                            </button>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive" style="height: auto;max-height: none;">
                                <table class="table table-hover custom-datatable" id="competition-participation-table" style="width: 100%;">
                                    <thead>
                                        <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                            <th class="text-center"><input type="checkbox"></th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">#</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">ENTRIES DATE & TIME</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">CATEGORY</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">NAME</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">PHONE</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody style="height: auto;"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3">
                    <div class="card" style="height: 100%">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;text-align: center;">Enrollment Records</h1>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h1 class="fw-semibold" style="font-size: 15px;color: #3B3B3B;font-family: Poppins, sans-serif;">INFORMATION</h1>
                                </div>
                                <div class="col-12">
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
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Competition</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-competition" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Name</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-name" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Student ID</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-student-id" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Competition Category</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-competition-category" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
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
        </div>
        <div id="tab-4" class="tab-pane" role="tabpanel" style="min-height: 0px;height: auto;">
            <div class="row" style="margin-top: 15px;">
                <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;padding: 15px;">
                    <div class="row report-filter-tab">
                        <div class="col-auto mb-3">
                            <div class="form-group">
                                <label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Start Date</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                            <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control form-control" id="makeup-classes-from" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto mb-3">
                            <div class="form-group">
                                <label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">End Date</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                            <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control form-control" id="makeup-classes-to" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;">
                                </div>
                            </div>
                        </div>
                        <div class="col-10 position-relative">
                            <x-search-input inputType="text" inputName="report_search" inputID="report_search" inputPlaceholder="Search (Course Code/ Class Code / Student)" />
                        </div>
                        <div class="col-2 d-flex align-items-end">
                            <x-primary-button type="button" id="filter-makeup-report" title="Filter" toggle="" target=""/>
                        </div>
                    </div>
                    <div class="row report-table-container d-none">
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary float-end w-auto export-button d-flex align-items-center mb-3" id="export-makeup-report">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                    <path d="M11 5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5V12.1578L16.2428 8.91501L17.657 10.3292L12.0001 15.9861L6.34326 10.3292L7.75748 8.91501L11 12.1575V5Z" fill="currentColor"></path>
                                    <path d="M4 14H6V18H18V14H20V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14Z" fill="currentColor"></path>
                                </svg>
                                Export
                            </button>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive" style="height: auto;max-height: none;">
                                <table class="table table-hover custom-datatable" id="makeup-report-table" style="width: 100%;">
                                    <thead>
                                        <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                            <th class="text-center"><input type="checkbox"></th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">CLASS CODE</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">DATE & TIME</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">NAME & ID</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COACH</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">MAKE UP CLASS CODE</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">MAKE UP DATE & TIME</th>
                                        </tr>
                                    </thead>
                                    <tbody style="height: auto;"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3">
                    <div class="card" style="height: 100%">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;text-align: center;">Makeup Report</h1>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h1 class="fw-semibold" style="font-size: 15px;color: #3B3B3B;font-family: Poppins, sans-serif;">INFORMATION</h1>
                                </div>
                                <div class="col-12">
             						<ul class="list-group" style="border-style: none;">
                                        <li class="list-group-item d-xxl-flex" style="border-style: none;padding: 0px;">
                                            <div class="container" style="padding: 0px;">
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Class</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-class" style="color: #4CBC9A;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Date & Time</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-date-time" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Name</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-name" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Student ID</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-student-id" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Coach</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-coach" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Coach Phone</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-coach-phone" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Makeup Date & Time</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-makeup-date-time" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
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
        </div>
        <div id="tab-5" class="tab-pane" role="tabpanel" style="min-height: 0px;height: auto;">
            <div class="row" style="margin-top: 15px;">
                <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;padding: 15px;">
                    <div class="row report-filter-tab">
                        <div class="col-auto mb-3">
                            <div class="form-group">
                                <label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Start Date</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                            <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control form-control" id="coach-attendance-from" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto mb-3">
                            <div class="form-group">
                                <label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">End Date</label>
                                <div class="input-group">
                                    <span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                            <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                        </svg>
                                    </span>
                                    <input class="form-control form-control" id="coach-attendance-to" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;">
                                </div>
                            </div>
                        </div>
                        <div class="col-10 position-relative">
                            <x-form-select
                                label="Coach" 
                                name="coach_id"
                                id="coach_id"
                                isRequired="false"
                            >
                                <option value="" hidden>Coach</option>
                                <option value="all">All</option>
                                @foreach($coaches as $coach)
                                <option value="{{ $coach['id'] }}">{{ $coach['name'] }}</option>
                                @endforeach
                            </x-form-select>
                        </div>
                        <div class="col-2 d-flex align-items-end">
                            <x-primary-button type="button" id="filter-coach-hours-salary-report" title="Filter" toggle="" target=""/>
                        </div>
                    </div>
                    <div class="row report-table-container d-none">
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary float-end w-auto export-button d-flex align-items-center mb-3" id="export-coach-working-hours-report">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                    <path d="M11 5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5V12.1578L16.2428 8.91501L17.657 10.3292L12.0001 15.9861L6.34326 10.3292L7.75748 8.91501L11 12.1575V5Z" fill="currentColor"></path>
                                    <path d="M4 14H6V18H18V14H20V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14Z" fill="currentColor"></path>
                                </svg>
                                Export
                            </button>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive" style="height: auto;max-height: none;">
                                <table class="table table-hover custom-datatable" id="coach-salary-report-table" style="width: 100%;">
                                    <thead>
                                        <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                            <th class="text-center"><input type="checkbox"></th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COACH</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">ASA</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">CLUB</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">GROUP</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">PRIVATE</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">RUN</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">SWIM TEAM</th>
                                            <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">GRAND TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody style="height: auto;"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3">
                    <div class="card" style="height: 100%">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;text-align: center;">Coach Working Hour/Salary Report</h1>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h1 class="fw-semibold" style="font-size: 15px;color: #3B3B3B;font-family: Poppins, sans-serif;">INFORMATION</h1>
                                </div>
                                <div class="col-12">
             						<ul class="list-group" style="border-style: none;">
                                        <li class="list-group-item d-xxl-flex" style="border-style: none;padding: 0px;">
                                            <div class="container" style="padding: 0px;">
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Coach</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-coach" style="color: #4CBC9A;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Coach Phone</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-coach-phone" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">ASA (hrs)</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-asa-hrs" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Club (hrs)</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-club-hrs" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Group (hrs)</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-group-hrs" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Private (hrs)</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-private-hrs" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Swim Team (hrs)</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-swim-team-hrs" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Grand Total (hrs)</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 id="detail-grand-total-hrs" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
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
        </div>
        <div id="tab-6" class="tab-pane" role="tabpanel" style="min-height: 0px;height: auto;">
            <div class="row" style="margin-top: 15px;">
                <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;padding: 15px;">
                    <div class="row report-filter-tab">
                        <div class="col-12 position-relative mb-3">
                            <x-search-input inputType="text" inputName="report_search" inputID="report_search" inputPlaceholder="Search..." />
                        </div>
                        <div class="col-xl-4 col-xxl-4" style="height: fit-content;">
                            <div class="card" style="box-shadow: 0px 2px 20px 0px rgba(59,59,59,0.31);">
                                <div class="card-body">
                                    <h4 class="card-title" style="color: #3B3B3B;font-size: 1.3vw;font-weight: 500;font-family: Poppins, sans-serif;">Parameter - Student</h4>
                                    <x-search-input inputType="text" inputName="student_parameter_search" inputID="student_parameter_search" inputPlaceholder="Search Parameter..." />
                                    <div class="mt-3">
                                        @foreach($custom_report_parameters['student'] as $parameter)
                                        <span class="d-inline-block cursor-pointer parameter" data-param="{{ $parameter }}" data-role="student" style="margin-right: 10px; margin-bottom: 10px; padding: 10px; box-shadow: 0px 0px 2px 2px #e5e5e5; border-radius: 5px;">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('themes/tailwind/images/clipboard-image-3.png') }}" style="width: 20px;" width="20" height="20">
                                                <h4 style="color: #7A7A7A;font-size: 13px;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">{{ $parameter }}</h4>
                                            </div>
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card" style="box-shadow: 0px 2px 20px 0px rgba(59,59,59,0.31);">
                                <div class="card-body">
                                    <h4 class="card-title" style="color: #3B3B3B;font-size: 1.3vw;font-weight: 500;font-family: Poppins, sans-serif;">Parameter - Class</h4>
                                    <x-search-input inputType="text" inputName="class_parameter_search" inputID="class_parameter_search" inputPlaceholder="Search Parameter..." />

                                    <div class="mt-3">
                                        @foreach($custom_report_parameters['class'] as $parameter)
                                        <span class="d-inline-block cursor-pointer parameter" data-param="{{ $parameter }}" data-role="class" style="margin-right: 10px; margin-bottom: 10px; padding: 10px; box-shadow: 0px 0px 2px 2px #e5e5e5; border-radius: 5px;">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('themes/tailwind/images/clipboard-image-3.png') }}" style="width: 20px;" width="20" height="20">
                                                <h4 style="color: #7A7A7A;font-size: 13px;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">{{ $parameter }}</h4>
                                            </div>
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card" style="margin-top: 30px;box-shadow: 0px 2px 20px 0px rgba(59,59,59,0.31);">
                                <div class="card-body">
                                    <h4 class="card-title" style="color: #3B3B3B;font-size: 1.3vw;font-weight: 500;font-family: Poppins, sans-serif;">Parameter - Attendance</h4>
                                    <x-search-input inputType="text" inputName="attendance_parameter_search" inputID="attendance_parameter_search" inputPlaceholder="Search Parameter..." />

                                    <div class="mt-3">
                                        @foreach($custom_report_parameters['attendance'] as $parameter)
                                        <span class="d-inline-block cursor-pointer parameter" data-param="{{ $parameter }}" data-role="attendance" style="margin-right: 10px; margin-bottom: 10px; padding: 10px; box-shadow: 0px 0px 2px 2px #e5e5e5; border-radius: 5px;">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('themes/tailwind/images/clipboard-image-3.png') }}" style="width: 20px;" width="20" height="20">
                                                <h4 style="color: #7A7A7A;font-size: 13px;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">{{ $parameter }}</h4>
                                            </div>
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card" style="height: fit-content;box-shadow: 0px 2px 20px 0px rgba(59,59,59,0.31);">
                                <div class="card-body">
                                    <h4 class="card-title" style="color: #3B3B3B;font-size: 1.3vw;font-weight: 500;font-family: Poppins, sans-serif;">Parameter - Financial</h4>
                                    <x-search-input inputType="text" inputName="financial_parameter_search" inputID="financial_parameter_search" inputPlaceholder="Search Parameter..." />

                                    <div class="mt-3">
                                        @foreach($custom_report_parameters['financial'] as $parameter)
                                        <span class="d-inline-block cursor-pointer parameter" data-param="{{ $parameter }}" data-role="financial" style="margin-right: 10px; margin-bottom: 10px; padding: 10px; box-shadow: 0px 0px 2px 2px #e5e5e5; border-radius: 5px;">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('themes/tailwind/images/clipboard-image-3.png') }}" style="width: 20px;" width="20" height="20">
                                                <h4 style="color: #7A7A7A;font-size: 13px;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">{{ $parameter }}</h4>
                                            </div>
                                        </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3">
                    <div class="card" style="height: 100%">
                        <div class="card-body">
                            <h4 class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center card-title" style="font-size: 1.5vw;">
                                Report Field
                                <!-- <button class="btn btn-primary w-auto" type="button" style="background: #F5F5F5;border-style: none;color: #3B3B3B;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none">
                                        <path d="M6.2253 4.81108C5.83477 4.42056 5.20161 4.42056 4.81108 4.81108C4.42056 5.20161 4.42056 5.83477 4.81108 6.2253L10.5858 12L4.81114 17.7747C4.42062 18.1652 4.42062 18.7984 4.81114 19.1889C5.20167 19.5794 5.83483 19.5794 6.22535 19.1889L12 13.4142L17.7747 19.1889C18.1652 19.5794 18.7984 19.5794 19.1889 19.1889C19.5794 18.7984 19.5794 18.1652 19.1889 17.7747L13.4142 12L19.189 6.2253C19.5795 5.83477 19.5795 5.20161 19.189 4.81108C18.7985 4.42056 18.1653 4.42056 17.7748 4.81108L12 10.5858L6.2253 4.81108Z" fill="currentColor"></path>
                                    </svg>
                                </button> -->
                            </h4>
                            <div class="d-xl-flex align-items-xl-center w-100 input-search">
                                <button class="btn btn-primary" type="button">
                                    <svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                    </svg>
                                </button>
                                <input class="form-control" id="report_name" name="report_name" type="text" placeholder="Report Name">
                            </div>
                            <x-form-input 
                                label="Report Start Date:" 
                                type="date" 
                                name="report_start_date"
                                id="report_start_date"
                                isRequired="false"
                            />
                            <x-form-input 
                                label="Report End Date:" 
                                type="date" 
                                name="report_end_date"
                                id="report_end_date"
                                isRequired="false"
                            />
                            <div class="card my-3" style="border: 0; border-radius: 0.25em;">
                                <div class="card-body selected-parameters" style="background: #F5F5F5;border-style: none;border-bottom-style: none; border-radius: 10px">
                                    
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
				                <button type="button" id="export-custom-report" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Export</button>
				                <a href="#" id="reset-all-filters" style="font-family: Poppins;font-size: 15px;font-weight: 400;line-height: 23px;letter-spacing: 0px;text-align: left;color: #4A5C7A;">Reset all Filters</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function() {
    var studentAttendance = $('#student-attendance-table').DataTable({
        "paging": true,
        "ordering": false,
        "info": true,
        "aaSorting": [],
        "orderMulti": true,
        "searching": false,
        "pageLength": 10,
        "lengthChange": false
    });

    var enrollmentRecords = $('#enrollment-records-table').DataTable({
        "paging": true,
        "ordering": false,
        "info": true,
        "aaSorting": [],
        "orderMulti": true,
        "searching": false,
        "pageLength": 10,
        "lengthChange": false
    });

    var participationRecords = $('#competition-participation-table').DataTable({
        "paging": true,
        "ordering": false,
        "info": true,
        "aaSorting": [],
        "orderMulti": true,
        "searching": false,
        "pageLength": 10,
        "lengthChange": false
    });

    var makeUpReport = $('#makeup-report-table').DataTable({
        "paging": true,
        "ordering": false,
        "info": true,
        "aaSorting": [],
        "orderMulti": true,
        "searching": false,
        "pageLength": 10,
        "lengthChange": false
    });

    var coachSalaryReport = $('#coach-salary-report-table').DataTable({
        "paging": true,
        "ordering": false,
        "info": true,
        "aaSorting": [],
        "orderMulti": true,
        "searching": false,
        "pageLength": 10,
        "lengthChange": false
    });

    const makeUpClasses = <?= json_encode($make_up_classes['make_up_classes']) ?>;
    const courseEnrollments = <?= json_encode($course_enrollments) ?>;
    const competitionEnrollments = <?= json_encode($competition_enrollments) ?>;
    const studentAttendances = <?= json_encode($student_attendances) ?>;
    const coachAttendances = <?= json_encode($coach_attendances) ?>;

    const parameters = <?= json_encode($custom_report_parameters) ?>;

    var selectedSearch = '';
    $('#tab-1 #myDropdown a').on('click', function() {
        selectedSearch = $(this).data('id');
        var val = $(this).text().trim();
        var split = val.split(' (');

        $('#tab-1 #report_search').val(split[0]);
    });

    $('#tab-1 #report_search').on('keyup', function() {
        selectedSearch = '';
    });

    $('#filter-student-attendance-records').on('click', function(e) {
        e.preventDefault();

        $(this).closest('.report-filter-tab').addClass('d-none');

        studentAttendance.destroy();
        $('#student-attendance-table tbody').empty();

        const fromDate = $('#student-attendance-from').val();
        const toDate = $('#student-attendance-to').val();

        const filteredAttendances = studentAttendances.filter(function(el) {
            var filterFrom = true;
            if(fromDate) {
                filterFrom = new Date(el.created_at).getTime() >= new Date(fromDate).getTime();
            }

            var filterTo = true;
            if(toDate) {
                filterTo = new Date(el.created_at).getTime() <= new Date(toDate).getTime();
            }

            var filterSearch = true;
            if(selectedSearch) {
                const type = selectedSearch.split('-')[0];
                const id = selectedSearch.split('-')[1];

                switch(type) {
                    case 'course' :
                        filterSearch = parseInt(el.class.course_id) === parseInt(id);
                    break;
                    case 'class' :
                        filterSearch = parseInt(el.class_id) === parseInt(id);
                    break;
                    case 'student' :
                        filterSearch = parseInt(el.user_id) === parseInt(id);
                    break;
                }
            }

            return filterFrom && filterTo && filterSearch;
        });

        let attendancesEl = '';
        filteredAttendances.forEach(function(attendance, index) {
            const classDate = new Date(attendance.class.start_date);
            const yyyy = classDate.getFullYear();
            let mm = classDate.getMonth() + 1;
            let dd = classDate.getDate();

            if (dd < 10) dd = '0' + dd;
            if (mm < 10) mm = '0' + mm;

            const formattedDate = mm + '/' + dd + '/' + yyyy;

            const coach = attendance.class.coach ? attendance.class.coach : attendance.class.course.coaches[0];

            attendancesEl += `<tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="${index}">
                <td class="text-center"><input type="checkbox" class="check" data-id="${attendance.id}"></td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${attendance.attendance_no}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">
                    <p>${attendance.user.name}</p>
                    <small>${attendance.user.student_information?.hkid??'-'}</small>
                </td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${attendance.class.course_class_code}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${formattedDate}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${attendance.class.start_time} - ${attendance.class.end_time}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">
                    <p>${coach?.name??'-'}</p>
                    <small>${coach?.coach_details.phone?? '-'}</small>
                </td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;" class="${attendance.status === 'Present' ? 'status-color_completed' : 'status-color_rejected'}">${attendance.status}</td>
            </tr>`;
        });

        $('#student-attendance-table tbody').append(attendancesEl);

        studentAttendance = $('#student-attendance-table').DataTable({
            "paging": true,
            "ordering": false,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "searching": false,
            "pageLength": 10,
            "lengthChange": false
        });
        $(this).closest('.report-filter-tab').next().removeClass('d-none');
    });

    $(document).on('click', '#student-attendance-table tbody tr', function() {
        const studentAttendanceId = $(this).find('.check').data('id');

        const attendance = studentAttendances.find((value) => parseInt(value.id) === parseInt(studentAttendanceId));

        $('#tab-1 #detail-status').empty();
        $('#tab-1 #detail-status').html(`<span class="${attendance.status === 'Present' ? 'status-color_completed' : 'status-color_rejected'}">${attendance.status}</span>`);
        $('#tab-1 #detail-number').html(attendance.attendance_no);
        $('#tab-1 #detail-name').html(attendance.user.name);
        $('#tab-1 #detail-student-id').html(attendance.user.student_information.hkid);
        $('#tab-1 #detail-class').html(attendance.class.course_class_code);
        $('#tab-1 #detail-cost').html(attendance.class.course.course_full_price);
        $('#tab-1 #detail-prerequisite').html('None');
        $('#tab-1 #detail-course-category').html(attendance.class.course.course_type.name);
    });

    $(document).on('click', '#export-student-attendance-report', async function(e) {
        e.preventDefault();

        const selectedAttendances = $('#student-attendance-table tbody tr .check:checked');

        let attendances = [];
        selectedAttendances.each(function() {
            attendances.push({id: $(this).data('id')});
        });

        if( attendances.length <= 0 ) {
            toastInfo("Warning", "Cannot process your request, please make sure there's a record selected", "warning");
            return;
        }

        const userToken = getUserToken();

        await axios.post(`${getApiUrl()}/reports/generate-student-attendance-excel`, attendances, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                const filePath = res.data.file_path;
                const a = document.createElement('a');
                a.href = filePath;
                a.download = res.data.filename;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);

                removeExcelFile(res.data.filename);

                $(this).removeAttr('disabled');
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

    $('#filter-enrollment-records').on('click', function(e) {
        e.preventDefault();

        $(this).closest('.report-filter-tab').addClass('d-none');

        enrollmentRecords.destroy();
        $('#enrollment-records-table tbody').empty();

        const fromDate = $('#course-enrollments-from').val();
        const toDate = $('#course-enrollments-to').val();

        const filteredEnrollments = courseEnrollments.filter(function(el) {
            var filterFrom = true;
            if(fromDate) {
                filterFrom = new Date(el.created_at).getTime() > new Date(fromDate).getTime();
            }

            var filterTo = true;
            if(toDate) {
                filterTo = new Date(el.created_at).getTime() < new Date(toDate).getTime();
            }

            return filterFrom && filterTo;
        });

        let enrollmentsEl = '';
        filteredEnrollments.forEach(function(enrollment, index) {
            const enrollmentDate = new Date(enrollment.created_at);
            const yyyy = enrollmentDate.getFullYear();
            let mm = enrollmentDate.getMonth() + 1;
            let dd = enrollmentDate.getDate();

            if (dd < 10) dd = '0' + dd;
            if (mm < 10) mm = '0' + mm;

            const formattedDate = dd + '/' + mm + '/' + yyyy;

            enrollmentsEl += `<tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="${index}">
                <td class="text-center"><input type="checkbox" class="check" data-id="${enrollment.id}"></td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${enrollment.enrollment_no}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">
                    <p>${formattedDate}</p>
                    <small>${enrollmentDate.toLocaleTimeString("en-US", { hour12:false, hour: "2-digit", minute: "2-digit" })}</small>
                </td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Enrollment Records (${enrollment.entries_form})</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${enrollment.user.name}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${enrollment.user.student_information.phone}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;" class="status-color_${enrollment.status}">${enrollment.status_label}</td>
            </tr>`;
        });

        $('#enrollment-records-table tbody').append(enrollmentsEl);

        enrollmentRecords = $('#enrollment-records-table').DataTable({
            "paging": true,
            "ordering": false,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "searching": false,
            "pageLength": 10,
            "lengthChange": false
        });
        $(this).closest('.report-filter-tab').next().removeClass('d-none');
    });

    $(document).on('click', '#enrollment-records-table tbody tr', function() {
        const enrollmentId = $(this).find('.check').data('id');

        const enrollment = courseEnrollments.find((value) => parseInt(value.id) === parseInt(enrollmentId));

        $('#tab-2 #detail-status').empty();
        $('#tab-2 #detail-status').html(`<span class="status-color_${enrollment.status}">${enrollment.status_label}</span>`);
        $('#tab-2 #detail-number').html(enrollment.enrollment_no);
        $('#tab-2 #detail-name').html(enrollment.user.name);
        $('#tab-2 #detail-student-id').html(enrollment.user.student_information.hkid);
        $('#tab-2 #detail-cost').html(enrollment.package.course.course_full_price);
        $('#tab-2 #detail-course-category').html(enrollment.package.course.course_type.name);
    });

    $(document).on('click', '#export-course-enrollment-report', async function(e) {
        e.preventDefault();

        const selectedEnrollments = $('#enrollment-records-table tbody tr .check:checked');

        let enrollments = [];
        selectedEnrollments.each(function() {
            enrollments.push({id: $(this).data('id')});
        });

        if( enrollments.length <= 0 ) {
            toastInfo("Warning", "Cannot process your request, please make sure there's a record selected", "warning");
            return;
        }

        const userToken = getUserToken();

        await axios.post(`${getApiUrl()}/reports/generate-course-enrollments-excel`, enrollments, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                const filePath = res.data.file_path;
                const a = document.createElement('a');
                a.href = filePath;
                a.download = res.data.filename;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);

                removeExcelFile(res.data.filename);

                $(this).removeAttr('disabled');
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

    $('#filter-competition-participation').on('click', function(e) {
        e.preventDefault();

        $(this).closest('.report-filter-tab').addClass('d-none');

        participationRecords.destroy();
        $('#competition-participation-table tbody').empty();

        const fromDate = $('#competition-participation-from').val();
        const toDate = $('#competition-participation-to').val();

        const filteredParticipations = competitionEnrollments.filter(function(el) {
            var filterFrom = true;
            if(fromDate) {
                filterFrom = new Date(el.created_at).getTime() > new Date(fromDate).getTime();
            }

            var filterTo = true;
            if(toDate) {
                filterTo = new Date(el.created_at).getTime() < new Date(toDate).getTime();
            }

            return filterFrom && filterTo;
        });

        let participationsEl = '';
        filteredParticipations.forEach(function(participation, index) {
            const participationDate = new Date(participation.created_at);
            const yyyy = participationDate.getFullYear();
            let mm = participationDate.getMonth() + 1;
            let dd = participationDate.getDate();

            if (dd < 10) dd = '0' + dd;
            if (mm < 10) mm = '0' + mm;

            const formattedDate = dd + '/' + mm + '/' + yyyy;

            participationsEl += `<tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="${index}">
                <td class="text-center"><input type="checkbox" class="check" data-id="${participation.id}"></td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${participation.competition.competition_code}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">
                    <p>${formattedDate}</p>
                    <small>${participationDate.toLocaleTimeString("en-US", { hour12:false, hour: "2-digit", minute: "2-digit" })}</small>
                </td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Enrollment Records (${participation.entries_form})</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${participation.user.name}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${participation.user.student_information.phone}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;" class="status-color_${participation.status}">${participation.status_label}</td>
            </tr>`;
        });

        $('#competition-participation-table tbody').append(participationsEl);

        participationRecords = $('#competition-participation-table').DataTable({
            "paging": true,
            "ordering": false,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "searching": false,
            "pageLength": 10,
            "lengthChange": false
        });
        $(this).closest('.report-filter-tab').next().removeClass('d-none');
    });

    $(document).on('click', '#competition-participation-table tbody tr', function() {
        const participationId = $(this).find('.check').data('id');

        const participation = competitionEnrollments.find((value) => parseInt(value.id) === parseInt(participationId));

        $('#tab-3 #detail-status').empty();
        $('#tab-3 #detail-status').html(`<span class="status-color_${participation.status}">${participation.status_label}</span>`);
        $('#tab-3 #detail-competition').html(participation.competition.competition_code);
        $('#tab-3 #detail-name').html(participation.user.name);
        $('#tab-3 #detail-student-id').html(participation.user.student_information.hkid);
        $('#tab-3 #detail-competition-category').html(participation.competition_category.category.name);
    });

    $(document).on('click', '#export-competition-participation-report', async function(e) {
        e.preventDefault();

        const selectedParticipations = $('#competition-participation-table tbody tr .check:checked');

        let enrollments = [];
        selectedParticipations.each(function() {
            enrollments.push({id: $(this).data('id')});
        });

        if( enrollments.length <= 0 ) {
            toastInfo("Warning", "Cannot process your request, please make sure there's a record selected", "warning");
            return;
        }

        const userToken = getUserToken();

        await axios.post(`${getApiUrl()}/reports/generate-competition-participations-excel`, enrollments, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                const filePath = res.data.file_path;
                const a = document.createElement('a');
                a.href = filePath;
                a.download = res.data.filename;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);

                removeExcelFile(res.data.filename);

                $(this).removeAttr('disabled');
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

    $('#filter-makeup-report').on('click', function(e) {
        e.preventDefault();

        $(this).closest('.report-filter-tab').addClass('d-none');

        makeUpReport.destroy();
        $('#makeup-report-table tbody').empty();

        const fromDate = $('#makeup-classes-from').val();
        const toDate = $('#makeup-classes-to').val();

        const filteredClasses = makeUpClasses.filter(function(el) {
            var filterFrom = true;
            if(fromDate) {
                filterFrom = new Date(el.created_at).getTime() > new Date(fromDate).getTime();
            }

            var filterTo = true;
            if(toDate) {
                filterTo = new Date(el.created_at).getTime() < new Date(toDate).getTime();
            }

            return filterFrom && filterTo;
        });
        let makeupEl = '';
        filteredClasses.forEach(function(makeup, index) {
            var coach = makeup.student_class.class.coach ? makeup.student_class.class.coach : makeup.student_class.class.course.coaches[0];
            makeupEl += `<tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="${index}">
                <td class="text-center"><input type="checkbox" class="check" data-id="${makeup.id}"></td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${makeup.student_class.class.course_class_code}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">
                    <p>${makeup.student_class.class.start_date}</p>
                    <small>${makeup.student_class.class.start_time}</small>
                </td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">
                    <p>${makeup.user.name}</p>
                    <small>${makeup.user.student_information.hkid}</small>
                </td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">
                    <p>${coach.name}</p>
                    <small>${coach.coach_details ? coach.coach_details.phone : '-'}</small>
                </td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${makeup.new_student_class ? makeup.new_student_class.class.course_class_code : '-'}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">
                    <p>${makeup.new_student_class ? makeup.new_student_class.class.start_date : '-'}</p>
                    <small>${makeup.new_student_class ? makeup.new_student_class.class.start_time : '-'}</small>
                </td>
            </tr>`;
        });

        $('#makeup-report-table tbody').append(makeupEl);

        makeUpReport = $('#makeup-report-table').DataTable({
            "paging": true,
            "ordering": false,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "searching": false,
            "pageLength": 10,
            "lengthChange": false
        });
        $(this).closest('.report-filter-tab').next().removeClass('d-none');
    });

    $(document).on('click', '#makeup-report-table tbody tr', function() {
        const makeUpId = $(this).find('.check').data('id');

        const makeup = makeUpClasses.find((value) => parseInt(value.id) === parseInt(makeUpId));
        const coach = makeup.student_class.class.coach ? makeup.student_class.class.coach : makeup.student_class.class.course.coaches[0];

        $('#tab-4 #detail-class').html(makeup.student_class.class.course_class_code);
        $('#tab-4 #detail-date-time').html(makeup.student_class.class.start_date+' '+makeup.student_class.class.start_time);
        $('#tab-4 #detail-name').html(makeup.user.name);
        $('#tab-4 #detail-student-id').html(makeup.user.student_information.hkid);
        $('#tab-4 #detail-coach').html(coach.name);
        $('#tab-4 #detail-coach-phone').html(coach.coach_details ? coach.coach_details.phone : '-');
        $('#tab-4 #detail-makeup-date-time').html(makeup.new_student_class ? makeup.new_student_class.class.start_date+' '+makeup.new_student_class.class.time : '-');
    });

    $(document).on('click', '#export-makeup-report', async function(e) {
        e.preventDefault();

        const selectedParticipations = $('#makeup-report-table tbody tr .check:checked');

        let enrollments = [];
        selectedParticipations.each(function() {
            enrollments.push({id: $(this).data('id')});
        });

        if( enrollments.length <= 0 ) {
            toastInfo("Warning", "Cannot process your request, please make sure there's a record selected", "warning");
            return;
        }

        const userToken = getUserToken();

        await axios.post(`${getApiUrl()}/reports/generate-makeup-reports-excel`, enrollments, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                const filePath = res.data.file_path;
                const a = document.createElement('a');
                a.href = filePath;
                a.download = res.data.filename;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);

                removeExcelFile(res.data.filename);

                $(this).removeAttr('disabled');
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

    $('#filter-coach-hours-salary-report').on('click', function(e) {
        e.preventDefault();

        $(this).closest('.report-filter-tab').addClass('d-none');

        coachSalaryReport.destroy();
        $('#coach-salary-report-table tbody').empty();

        const fromDate = $('#coach-attendance-from').val();
        const toDate = $('#coach-attendance-to').val();
        const coachId = $('#coach_id').val();

        const filteredAttendances = coachAttendances.filter(function(el) {
            var filterFrom = true;
            if(fromDate) {
                filterFrom = new Date(el.created_at).getTime() > new Date(fromDate).getTime();
            }

            var filterTo = true;
            if(toDate) {
                filterTo = new Date(el.created_at).getTime() < new Date(toDate).getTime();
            }

            var filterCoach = true;
            if(coachId && coachId !== 'all') {
                filterCoach = parseInt(coachId) === parseInt(el.coach_id);
            }

            return filterFrom && filterTo && filterCoach && el.status === 'Attended';
        });

        let attendanceItems = [];
        filteredAttendances.forEach(function(attendance, index) {
            const coach = attendance.coach;
            const courseClass = attendance.class;
            const course = courseClass.course;
            const type = course.course_type;
            const exists = attendanceItems.find(value => parseInt(value.coach_id) == parseInt(coach.id));

            const timeStart = Date.parse(courseClass.start_date + "T" + courseClass.start_time);
            const timeEnd = Date.parse(courseClass.start_date + "T" + courseClass.end_time);

            let hourDiff = (timeEnd - timeStart) / 1000 / 60 / 60;
            if (hourDiff < 0) {
                hourDiff += 24;
            }

            if(!exists) {
                attendanceItems.push({
                    coach_id: coach.id,
                    coach_name: coach.name,
                    coach_phone: coach.coach_details?.phone??'-',
                    asa: type.name === 'ASA' ? hourDiff.toFixed(2) : 0,
                    club: type.name === 'Club' ? hourDiff.toFixed(2) : 0,
                    group: type.name === 'Group' ? hourDiff.toFixed(2) : 0,
                    private: type.name === 'Private' ? hourDiff.toFixed(2) : 0,
                    run: type.name === 'Run' ? hourDiff.toFixed(2) : 0,
                    swim_team: type.name === 'Swim Team' ? hourDiff.toFixed(2) : 0,
                    grand_total: hourDiff.toFixed(2)
                });
            } else {
                var index = attendanceItems.indexOf(exists);

                attendanceItems[index].asa = type.name === 'ASA' ? parseFloat(parseFloat(attendanceItems[index].asa) + parseFloat(hourDiff.toFixed(2))).toFixed(2) : attendanceItems[index].asa;
                attendanceItems[index].club = type.name === 'Club' ? parseFloat(parseFloat(attendanceItems[index].club) + parseFloat(hourDiff.toFixed(2))).toFixed(2) : attendanceItems[index].club;
                attendanceItems[index].group = type.name === 'Group' ? parseFloat(parseFloat(attendanceItems[index].group) + parseFloat(hourDiff.toFixed(2))).toFixed(2) : attendanceItems[index].group;
                attendanceItems[index].private = type.name === 'Private' ? parseFloat(parseFloat(attendanceItems[index].private) + parseFloat(hourDiff.toFixed(2))).toFixed(2) : attendanceItems[index].private;
                attendanceItems[index].run = type.name === 'Run' ? parseFloat(parseFloat(attendanceItems[index].run) + parseFloat(hourDiff.toFixed(2))).toFixed(2) : attendanceItems[index].run;
                attendanceItems[index].swim_team = type.name === 'Swim Team' ? parseFloat(parseFloat(attendanceItems[index].swim_team) + parseFloat(hourDiff.toFixed(2))).toFixed(2) : attendanceItems[index].swim_team;
                attendanceItems[index].grand_total = parseFloat(parseFloat(attendanceItems[index].grand_total) + parseFloat(hourDiff.toFixed(2))).toFixed(2);
            }
        });

        let attendancesEl = '';
        attendanceItems.forEach(function(coachDetail, index) {
            attendancesEl = `<tr style="border-bottom: 2px solid #E8E8E8;" data-row_index="${index}">
                <td class="text-center"><input type="checkbox" class="check" data-id="${coachDetail.coach_id}"></td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">
                    <p>${coachDetail.coach_name}</p>
                    <small>${coachDetail.coach_phone}</small>
                </td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${coachDetail.asa}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${coachDetail.club}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${coachDetail.group}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${coachDetail.private}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${coachDetail.run}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${coachDetail.swim_team}</td>
                <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">${coachDetail.grand_total}</td>
            </tr>`;
        });

        $('#coach-salary-report-table tbody').append(attendancesEl);
        coachSalaryReport = $('#coach-salary-report-table').DataTable({
            "paging": true,
            "ordering": false,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "searching": false,
            "pageLength": 10,
            "lengthChange": false
        });
        $(this).closest('.report-filter-tab').next().removeClass('d-none');
    });

    $(document).on('click', '#coach-salary-report-table tbody tr', function() {
        $('#tab-5 #detail-coach').html($(this).find('td:nth-child(2)').find('p').text());
        $('#tab-5 #detail-coach-phone').html($(this).find('td:nth-child(2)').find('small').text());
        $('#tab-5 #detail-asa-hrs').html($(this).find('td:nth-child(3)').text());
        $('#tab-5 #detail-club-hrs').html($(this).find('td:nth-child(4)').text());
        $('#tab-5 #detail-group-hrs').html($(this).find('td:nth-child(6)').text());
        $('#tab-5 #detail-private-hrs').html($(this).find('td:nth-child(7)').text());
        $('#tab-5 #detail-swim-team-hrs').html($(this).find('td:nth-child(8)').text());
        $('#tab-5 #detail-grand-total-hrs').html($(this).find('td:nth-child(9)').text());
    });

    $(document).on('click', '#export-coach-working-hours-report', async function(e) {
        e.preventDefault();

        const selectedCoaches = $('#coach-salary-report-table tbody tr .check:checked');
        const fromDate = $('#coach-attendance-from').val();
        const toDate = $('#coach-attendance-to').val();

        let coaches = [];
        selectedCoaches.each(function() {
            coaches.push({id: $(this).data('id')});
        });

        if( coaches.length <= 0 ) {
            toastInfo("Warning", "Cannot process your request, please make sure there's a record selected", "warning");
            return;
        }

        const userToken = getUserToken();

        let transformedData = {};
        transformedData['coaches'] = coaches;
        transformedData['from_date'] = fromDate;
        transformedData['to_date'] = toDate;

        await axios.post(`${getApiUrl()}/reports/generate-coach-working-hours-excel`, transformedData, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                const filePath = res.data.file_path;
                const a = document.createElement('a');
                a.href = filePath;
                a.download = res.data.filename;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);

                removeExcelFile(res.data.filename);

                $(this).removeAttr('disabled');
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

    $('#student_parameter_search').on('change', function() {
        var searchTerm = $(this).val().trim().toLowerCase();

        let filteredParams = '';
        if(searchTerm !== '') {
            const filtered = parameters.student.filter((value) => value.toLowerCase().includes(searchTerm));

            filtered.forEach(function(value, index) {
                filteredParams += `<span class="d-inline-block cursor-pointer parameter" data-param="${value}" data-role="student" style="margin-right: 10px; margin-bottom: 10px; padding: 10px; box-shadow: 0px 0px 2px 2px #e5e5e5; border-radius: 5px;">
                    <div class="d-flex align-items-center">
                        <img src="${window.location.origin}/themes/tailwind/images/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                        <h4 style="color: #7A7A7A;font-size: 13px;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">${value}</h4>
                    </div>
                </span>`;
            });
        } else {
            parameters.student.forEach(function(value, index) {
                filteredParams += `<span class="d-inline-block cursor-pointer parameter" data-param="${value}" data-role="student" style="margin-right: 10px; margin-bottom: 10px; padding: 10px; box-shadow: 0px 0px 2px 2px #e5e5e5; border-radius: 5px;">
                    <div class="d-flex align-items-center">
                        <img src="${window.location.origin}/themes/tailwind/images/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                        <h4 style="color: #7A7A7A;font-size: 13px;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">${value}</h4>
                    </div>
                </span>`;
            });
        }

        $(this).parent().next().next().html(filteredParams);
    });

    $('#class_parameter_search').on('change', function() {
        var searchTerm = $(this).val().trim().toLowerCase();

        let filteredParams = '';
        if(searchTerm !== '') {
            const filtered = parameters.class.filter((value) => value.toLowerCase().includes(searchTerm));

            filtered.forEach(function(value, index) {
                filteredParams += `<span class="d-inline-block cursor-pointer parameter" data-param="${value}" data-role="class" style="margin-right: 10px; margin-bottom: 10px; padding: 10px; box-shadow: 0px 0px 2px 2px #e5e5e5; border-radius: 5px;">
                    <div class="d-flex align-items-center">
                        <img src="${window.location.origin}/themes/tailwind/images/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                        <h4 style="color: #7A7A7A;font-size: 13px;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">${value}</h4>
                    </div>
                </span>`;
            });
        } else {
            parameters.class.forEach(function(value, index) {
                filteredParams += `<span class="d-inline-block cursor-pointer parameter" data-param="${value}" data-role="class" style="margin-right: 10px; margin-bottom: 10px; padding: 10px; box-shadow: 0px 0px 2px 2px #e5e5e5; border-radius: 5px;">
                    <div class="d-flex align-items-center">
                        <img src="${window.location.origin}/themes/tailwind/images/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                        <h4 style="color: #7A7A7A;font-size: 13px;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">${value}</h4>
                    </div>
                </span>`;
            });
        }

        $(this).parent().next().next().html(filteredParams);
    });

    $('#attendance_parameter_search').on('change', function() {
        var searchTerm = $(this).val().trim().toLowerCase();

        let filteredParams = '';
        if(searchTerm !== '') {
            const filtered = parameters.attendance.filter((value) => value.toLowerCase().includes(searchTerm));

            filtered.forEach(function(value, index) {
                filteredParams += `<span class="d-inline-block cursor-pointer parameter" data-param="${value}" data-role="attendance" style="margin-right: 10px; margin-bottom: 10px; padding: 10px; box-shadow: 0px 0px 2px 2px #e5e5e5; border-radius: 5px;">
                    <div class="d-flex align-items-center">
                        <img src="${window.location.origin}/themes/tailwind/images/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                        <h4 style="color: #7A7A7A;font-size: 13px;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">${value}</h4>
                    </div>
                </span>`;
            });
        } else {
            parameters.attendance.forEach(function(value, index) {
                filteredParams += `<span class="d-inline-block cursor-pointer parameter" data-param="${value}" data-role="attendance" style="margin-right: 10px; margin-bottom: 10px; padding: 10px; box-shadow: 0px 0px 2px 2px #e5e5e5; border-radius: 5px;">
                    <div class="d-flex align-items-center">
                        <img src="${window.location.origin}/themes/tailwind/images/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                        <h4 style="color: #7A7A7A;font-size: 13px;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">${value}</h4>
                    </div>
                </span>`;
            });
        }

        $(this).parent().next().next().html(filteredParams);
    });

    $('#financial_parameter_search').on('change', function() {
        var searchTerm = $(this).val().trim().toLowerCase();

        let filteredParams = '';
        if(searchTerm !== '') {
            const filtered = parameters.financial.filter((value) => value.toLowerCase().includes(searchTerm));

            filtered.forEach(function(value, index) {
                filteredParams += `<span class="d-inline-block cursor-pointer parameter" data-param="${value}" data-role="financial" style="margin-right: 10px; margin-bottom: 10px; padding: 10px; box-shadow: 0px 0px 2px 2px #e5e5e5; border-radius: 5px;">
                    <div class="d-flex align-items-center">
                        <img src="${window.location.origin}/themes/tailwind/images/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                        <h4 style="color: #7A7A7A;font-size: 13px;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">${value}</h4>
                    </div>
                </span>`;
            });
        } else {
            parameters.financial.forEach(function(value, index) {
                filteredParams += `<span class="d-inline-block cursor-pointer parameter" data-param="${value}" data-role="financial" style="margin-right: 10px; margin-bottom: 10px; padding: 10px; box-shadow: 0px 0px 2px 2px #e5e5e5; border-radius: 5px;">
                    <div class="d-flex align-items-center">
                        <img src="${window.location.origin}/themes/tailwind/images/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                        <h4 style="color: #7A7A7A;font-size: 13px;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">${value}</h4>
                    </div>
                </span>`;
            });
        }

        $(this).parent().next().next().html(filteredParams);
    });

    $(document).on('click', 'span.parameter', function() {
        const value = $(this).data('param');
        const role = $(this).data('role');

        if($(`.selected-parameters span[data-name="${value}"][data-role="${role}"]`).length < 1) {
            $('.selected-parameters').append(`<span class="selected_param_filter" data-name="${value}" data-role="${role}" style="display: inline-block; padding: 10px; box-shadow: 0px 0px 2px 2px #e5e5e5; border-radius: 5px; margin-bottom: 10px; margin-right: 10px; background-color: white;">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="${window.location.origin}/themes/tailwind/images/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                        <h4 style="color: #7A7A7A;font-size: 13px;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">${value}</h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="w-auto remove-parameter" type="button" style="color: #3B3B3B; margin-left: 10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none">
                                <path d="M6.2253 4.81108C5.83477 4.42056 5.20161 4.42056 4.81108 4.81108C4.42056 5.20161 4.42056 5.83477 4.81108 6.2253L10.5858 12L4.81114 17.7747C4.42062 18.1652 4.42062 18.7984 4.81114 19.1889C5.20167 19.5794 5.83483 19.5794 6.22535 19.1889L12 13.4142L17.7747 19.1889C18.1652 19.5794 18.7984 19.5794 19.1889 19.1889C19.5794 18.7984 19.5794 18.1652 19.1889 17.7747L13.4142 12L19.189 6.2253C19.5795 5.83477 19.5795 5.20161 19.189 4.81108C18.7985 4.42056 18.1653 4.42056 17.7748 4.81108L12 10.5858L6.2253 4.81108Z" fill="currentColor"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </span>`);
        }
    });

    $(document).on('click', '.selected-parameters .remove-parameter', function() {
        $(this).closest('span').remove();
    });

    $('#reset-all-filters').on('click', function(e) {
        e.preventDefault();

        $('#report_name').val('');
        $('#report_start_date').val('');
        $('#report_end_date').val('');
        $('.selected-parameters').empty();
    });

    $('#export-custom-report').on('click', async function(e) {
        e.preventDefault();

        if( $('#report_name').val() === '' ) {
            toastInfo("Warning", "Cannot process your request, please enter a report name.", "warning");
            return;
        }

        if( $('#report_start_date').val() === '' ) {
            toastInfo("Warning", "Cannot process your request, please enter a start date.", "warning");
            return;
        }

        if( $('#report_end_date').val() === '' ) {
            toastInfo("Warning", "Cannot process your request, please enter a end date.", "warning");
            return;
        }

        if($('.selected-parameters span').length < 1) {
            toastInfo("Warning", "Cannot process your request, please select a parameter.", "warning");
            return;
        }

        let transformedData = {};
        transformedData['report_name'] = $('#report_name').val();
        transformedData['start_date'] = $('#report_start_date').val();
        transformedData['end_date'] = $('#report_end_date').val();

        let parameters = [];
        $('.selected-parameters span').each(function() {
            parameters.push($(this).data('role')+'-'+$(this).data('name').toLowerCase().replaceAll(' ', '_').trim());
        });

        transformedData['parameters'] = parameters;

        const userToken = getUserToken();

        await axios.post(`${getApiUrl()}/reports/export-custom-report`, transformedData, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                const filePath = res.data.file_path;
                const a = document.createElement('a');
                a.href = filePath;
                a.download = res.data.filename;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);

                removeExcelFile(res.data.filename);

                $(this).removeAttr('disabled');
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
});
</script>
@endsection