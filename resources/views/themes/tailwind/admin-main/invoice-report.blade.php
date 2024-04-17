@extends('theme::layouts.app')


@section('content')
<style>
    .export-button {
        background-color: #F5F5F5;
        border: 1px solid transparent;
        color: inherit;
        border-radius: 0.25em;
    }
</style>
<div class="page-container">
    <x-page-content-heading 
        heading="Invoice Report" 
        withButton="false"
        withIcon="false"
    />
    <div class="row" style="margin-top: 15px;">
        <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
            <div class="tab-content custom-datatable_container" style="padding: 15px;">
 				<div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                    <div class="row invoice-report-filter-tab mb-3">
                        <div class="col-10 position-relative">
                            <x-search-input inputType="text" inputName="report_search" inputID="report_search" inputPlaceholder="Search..." />
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-secondary float-end export-button d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px" viewBox="0 0 24 24" fill="none">
                                    <path d="M11 5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5V12.1578L16.2428 8.91501L17.657 10.3292L12.0001 15.9861L6.34326 10.3292L7.75748 8.91501L11 12.1575V5Z" fill="currentColor"></path>
                                    <path d="M4 14H6V18H18V14H20V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14Z" fill="currentColor"></path>
                                </svg>
                                Export
                            </button>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-9">
                            <h2 class="fw-semibold page-content-heading">Report -  Invoice Summary</h2>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <span class="input-group-text" style="background: #F5F5F5;border-style: none;">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-calendar" style="margin-right: 10px;">
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                        </svg>
                                    </span>
                                </span>
                                <input name="date" id="date" class="form-control datepicker form-input-date " type="date" value="" style="background: #F5F5F5;border-style: none; height: 48px;">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="height: auto;max-height: none;">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr style="background: rgba(185,185,185,0.31);">
                                    <th style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Invoice Number</th>
                                    <th style="font-family: Poppins, sans-serif;font-size: 1.2vh;">ID</th>
                                    <th style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Student Name</th>
                                    <th style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Class</th>
                                    <th style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Time</th>
                                    <th style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Date</th>
                                    <th style="font-family: Poppins, sans-serif;font-size: 1.2vh;">HKD</th>
                                    <th style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">211201475</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">C101003</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Ethan Ng</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">'Beginner 2</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">11:15-12:10</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">09-Jan-22</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">$270.00</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">12-105</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">211201475</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">C101003</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Ethan Ng</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">'Beginner 2</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">11:15-12:10</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">09-Jan-22</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">$270.00</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">12-105</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">211201475</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">C101003</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Ethan Ng</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">'Beginner 2</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">11:15-12:10</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">09-Jan-22</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">$270.00</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">12-105</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">211201475</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">C101003</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Ethan Ng</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">'Beginner 2</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">11:15-12:10</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">09-Jan-22</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">$270.00</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">12-105</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">211201475</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">C101003</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Ethan Ng</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">'Beginner 2</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">11:15-12:10</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">09-Jan-22</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">$270.00</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">12-105</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">211201475</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">C101003</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Ethan Ng</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">'Beginner 2</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">11:15-12:10</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">09-Jan-22</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">$270.00</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">12-105</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">211201475</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">C101003</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Ethan Ng</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">'Beginner 2</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">11:15-12:10</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">09-Jan-22</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">$270.00</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">12-105</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">211201475</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">C101003</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Ethan Ng</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">'Beginner 2</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">11:15-12:10</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">09-Jan-22</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">$270.00</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">12-105</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">211201475</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">C101003</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Ethan Ng</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">'Beginner 2</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">11:15-12:10</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">09-Jan-22</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">$270.00</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">12-105</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">211201475</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">C101003</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Ethan Ng</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">'Beginner 2</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">11:15-12:10</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">09-Jan-22</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">$270.00</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">12-105</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">211201475</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">C101003</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Ethan Ng</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">'Beginner 2</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">11:15-12:10</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">09-Jan-22</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">$270.00</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">12-105</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">211201475</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">C101003</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Ethan Ng</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">'Beginner 2</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">11:15-12:10</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">09-Jan-22</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">$270.00</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">12-105</td>
                                </tr>
                                <tr>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">211201475</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">C101003</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">Ethan Ng</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">'Beginner 2</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">11:15-12:10</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">09-Jan-22</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">$270.00</td>
                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;">12-105</td>
                                </tr>
                            </tbody>
                        </table>
 					</div>
                </div>
            </div>
        </div>
        <div class="col">
 			<div class="card">
 				<div class="card-body">
 					<div class="col">
                        <img src="{{ asset('themes/tailwind/images/clipboard-image-61.png') }}" class="m-auto">
                        <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;text-align: center;">Invoice Summary</h1>
 					</div>
 					<div class="col">
 						<h1 class="fw-semibold" style="font-size: 15px;color: #3B3B3B;font-family: Poppins, sans-serif;">INFORMATION</h1>
 					</div>
 					<div class="col">
 						<ul class="list-group" style="border-style: none;">
 							<li class="list-group-item d-xxl-flex" style="border-style: none;padding: 0px;">
 								<div class="container" style="padding: 0px;">
                                    <div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Type</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-status" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">Invoice Summary</h1>
 										</div>
 									</div>
                                    <div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Total</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-status" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">$1,890</h1>
 										</div>
 									</div>
                                    <div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Start</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-status" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">Sep 17, 2021</h1>
 										</div>
 									</div>
                                    <div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">End</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-status" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">Sep 10, 2021</h1>
 										</div>
 									</div>
                                    <div class="row" style="margin-bottom: 10px;">
 										<div class="col-md-6">
 											<h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Modified Date</h1>
 										</div>
 										<div class="col-md-6">
 											<h1 id="detail-status" style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">1/2/2022 13:45</h1>
 										</div>
 									</div>

                                    <hr>
                                    <h1 style="color: #3B3B3B;font-size: 1.1vw;font-family: Poppins, sans-serif;font-weight: 500;">FILTER</h1>
                                    <div class="row">
                                        <div class="col">
                                            <h1 class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">
                                                Class
                                                <label class="switch">
                                                    <input type="checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h1 class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">
                                                Time
                                                <label class="switch">
                                                    <input type="checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h1 class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">
                                                Bank
                                                <label class="switch">
                                                    <input type="checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                            </h1>
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
@endsection