 @extends('theme::layouts.app')


@section('content')
<div style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;padding: 20px;">
                    <h1 class="titles" style="font-size: 2vw;">Report</h1>
                    <ul class="nav nav-tabs text-end d-xl-flex d-xxl-flex justify-content-xl-start justify-content-xxl-start" role="tablist" style="border-style: none;border-left-style: none;">
                        <li class="nav-item" id="t1" role="presentation" style="border-left-style: none;"><a class="nav-link active tablink" role="tab" data-bs-toggle="tab" href="#tab-1" style="font-size: 14px;border-style: none;border-bottom-style: none;color: #7A7A7A;">Student Attendance Records</a></li>
                        <li class="nav-item" id="t2" role="presentation"><a class="nav-link d-xl-flex tablink" role="tab" data-bs-toggle="tab" href="#tab-2" style="font-size: 14px;border-style: none;border-bottom-style: none;color: #7A7A7A;line-height: 21.06px;">Enrollment Records</a></li>
                        <li class="nav-item" id="t3" role="presentation"><a class="nav-link tablink" role="tab" data-bs-toggle="tab" href="#tab-3" style="font-size: 14px;border-style: none;border-bottom-style: none;color: #7A7A7A;">Makeup Report</a></li>
                        <li class="nav-item" id="t4" role="presentation"><a class="nav-link tablink" role="tab" data-bs-toggle="tab" href="#tab-4" style="font-size: 14px;border-style: none;border-bottom-style: none;color: #7A7A7A;">Coach working hour/salary report</a></li>
                        <li class="nav-item" id="t5" role="presentation"><a class="nav-link tablink" role="tab" data-bs-toggle="tab" href="#tab-5" style="font-size: 14px;border-style: none;border-bottom-style: none;color: #7A7A7A;">Customs</a></li>
                    </ul>
                    <div class="card" style="margin-top: 30px;">
                        <div class="card-body" style="color: #3B3B3B;">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active" role="tabpanel">
                                    <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                        <div class="form-group" style="width: 214px;"><label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Start Date</label>
                                            <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;"><path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path></svg></span><input class="form-control form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"></div>
                                        </div>
                                        <div class="form-group" style="width: 214px;margin-left: 50px;"><label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">End Date</label>
                                            <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;"><path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path></svg></span><input class="form-control form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"></div>
                                        </div>
                                    </div>
                                    <div class="d-xl-flex">
                                        <form class="form-inline" style="width: 50%;">
                                            <div class="d-xl-flex align-items-xl-center form-group">
                                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="background: #F5F5F5;padding-left: 10px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-search">
                                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                                                    </svg><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 16px;font-family: Poppins, sans-serif;" data-role="tagsinput" data-class="label-info">
                                                        <option value="">Search (Course Code/ Class Code / Student)</option>
                                                        <option value="">GHS-RPS2-0001 (Course: 4/02/2022, 11/02/2022, 18/02/2022, 25/02/2022)</option>
                                                        <option value="">GHS-RPS2-0001-01 (Class: 4/02/2022)</option>
                                                        <option value="">GHS-RPS2-0001-02 (Class: 11/02/2022)</option>
                                                        <option value="">GHS-RPS2-0001-03 (Class: 18/02/2022)</option>
                                                    </select></div>
                                            </div>
                                        </form><button class="btn btn-primary" id="filterButton" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;">Filter</button>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane" role="tabpanel">
                                    <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                        <div class="form-group" style="width: 214px;"><label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Start Date</label>
                                            <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;"><path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path></svg></span><input class="form-control form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;height: 48px;"></div>
                                        </div>
                                        <div class="form-group" style="width: 214px;margin-left: 50px;"><label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">End Date</label>
                                            <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;"><path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path></svg></span><input class="form-control form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;height: 48px;"></div>
                                        </div><button class="btn btn-primary" id="filterButton2" type="button" data-bs-dismiss="modal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;">Filter</button>
                                    </div>
                                </div>
                                <div id="tab-3" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-9 col-xxl-9">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h1 class="d-xxl-flex justify-content-xxl-end" style="text-align: right;"><button class="btn btn-primary d-xxl-flex justify-content-around align-items-xxl-center" type="button" style="width: 130px;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 14px;margin-left: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                                                <path d="M11 5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5V12.1578L16.2428 8.91501L17.657 10.3292L12.0001 15.9861L6.34326 10.3292L7.75748 8.91501L11 12.1575V5Z" fill="currentColor"></path>
                                                                <path d="M4 14H6V18H18V14H20V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14Z" fill="currentColor"></path>
                                                            </svg>Export<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-down">
                                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                                            </svg></button></h1>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th><input type="checkbox"></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">CLASS CODE<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">DATE &amp; TIME<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">NAME &amp; ID<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">COACH</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">MAKE UP CLASS CODE<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">MAKE UP DATE &amp; TIME<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0002-10</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0002-10</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0002-10</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0002-10</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0002-10</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0002-10</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0002-10</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0002-10</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS1-0002-10</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">07:30</h1>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="container d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center">
                                                        <h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">Showing 1 - 10 of 10</h1><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 1.2vh;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;">1</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.4vw;color: #3B3B3B;font-weight: 500;text-align: center;">Makeup Report</h1>
                                            <div style="margin-top: 20px;">
                                                <h1 style="color: #3B3B3B;font-size: 1.1vw;font-family: Poppins, sans-serif;font-weight: 500;">INFORMATION</h1>
                                                <div>
                                                    <div class="row" style="padding-left: 34px;">
                                                        <div class="col-xl-5 col-xxl-4">
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Class</h1>
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Date &amp; Time</h1>
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Name</h1>
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Student ID</h1>
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Coach</h1>
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Coach Phone</h1>
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Make Up Date &amp; Time</h1>
                                                        </div>
                                                        <div class="col">
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">VSA-RS1-0001-01</h1>
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">11/07/2022 07:30</h1>
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Ethan Ng</h1>
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">C100431</h1>
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Coach Ng</h1>
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">6999 9999</h1>
                                                            <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">12/07/2022 07:30</h1>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-4" class="tab-pane" role="tabpanel">
                                    <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                        <div class="form-group" style="width: 214px;"><label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Start Date</label>
                                            <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;"><path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path></svg></span><input class="form-control form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"></div>
                                        </div>
                                        <div class="form-group" style="width: 214px;margin-left: 50px;"><label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">End Date</label>
                                            <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;"><path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path></svg></span><input class="form-control form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"></div>
                                        </div>
                                    </div>
                                    <div class="d-xl-flex">
                                        <form class="form-inline" style="width: 50%;">
                                            <div class="form-group">
                                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="background: #F5F5F5;padding-left: 10px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-search">
                                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                                                    </svg><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 16px;font-family: Poppins, sans-serif;" data-role="tagsinput" data-class="label-info">
                                                        <option value="">Search (Course Code/ Class Code / Student)</option>
                                                        <option value="">GHS-RPS2-0001 (Course: 4/02/2022, 11/02/2022, 18/02/2022, 25/02/2022)</option>
                                                        <option value="">GHS-RPS2-0001-01 (Class: 4/02/2022)</option>
                                                        <option value="">GHS-RPS2-0001-02 (Class: 11/02/2022)</option>
                                                        <option value="">GHS-RPS2-0001-03 (Class: 18/02/2022)</option>
                                                    </select></div>
                                            </div>
                                        </form><button class="btn btn-primary" id="filterButton3" type="button" data-bs-dismiss="modal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;">Filter</button>
                                    </div>
                                </div>
                                <div id="tab-5" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-7 col-xxl-8">
                                            <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" style="width: 100vw;background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;">
                                                <div class="input-group" style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><button class="btn btn-primary py-0" type="button" style="background: #e8e8e8;border-style: none;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-20.png" style="width: 20px;"></button><input class="border-0 form-control form-control small" type="text" placeholder="Search..." style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;height: 45px;font-family: Poppins, sans-serif;font-size: 14px;"></div>
                                            </form>
                                            <div class="row d-xl-flex" style="margin-top: 20px;height: 100%;">
                                                <div class="col-xl-4 col-xxl-4" style="heig ht: 100%;">
                                                    <div class="card" style="height: 90%;box-shadow: 0px 2px 20px 0px rgba(59,59,59,0.31);">
                                                        <div class="card-body">
                                                            <h4 class="card-title" style="color: #3B3B3B;font-size: 1.3vw;font-weight: 500;font-family: Poppins, sans-serif;">Parameter - Student</h4>
                                                            <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" style="width: 100%;background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;margin-left: 0px !important;">
                                                                <div class="input-group" style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><button class="btn btn-primary py-0" type="button" style="background: #e8e8e8;border-style: none;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-20.png" style="width: 20px;"></button><input class="border-0 form-control form-control small" type="text" placeholder="Search..." style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;height: 45px;font-family: Poppins, sans-serif;font-size: 14px;"></div>
                                                            </form>
                                                            <div class="row" style="margin-top: 20px;">
                                                                <div class="col d-xl-flex d-xxl-flex flex-row align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Student Number</h4>
                                                                </div>
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Guardian’s Name</h4>
                                                                </div>
                                                            </div>                                     
                                                            <div class="row" style="margin-top: 20px;">
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">First Name</h4>
                                                                </div>
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Relationship</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-top: 20px;">
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Last Name</h4>
                                                                </div>
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Phone</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-top: 20px;">
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Chinese Name</h4>
                                                                </div>
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Email</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-top: 20px;">
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">DOB</h4>
                                                                </div>
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Guardian’s Name</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-top: 20px;">
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Address</h4>
                                                                </div>
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Relationship</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-top: 20px;">
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">School</h4>
                                                                </div>
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Phone</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-top: 20px;">
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Grade</h4>
                                                                </div>
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Email</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-top: 20px;">
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Enrollment Date</h4>
                                                                </div>
                                                                <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                    <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Remark</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="card" style="height: 46%;box-shadow: 0px 2px 20px 0px rgba(59,59,59,0.31);">
                                                        <div class="card-body">
                                                            <h4 class="card-title" style="color: #3B3B3B;font-size: 1.3vw;font-weight: 500;font-family: Poppins, sans-serif;">Parameter - Class</h4>
                                                            <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" style="width: 100%;background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;margin-left: 0px !important;">
                                                                <div class="input-group" style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><button class="btn btn-primary py-0" type="button" style="background: #e8e8e8;border-style: none;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-20.png" style="width: 20px;"></button><input class="border-0 form-control form-control small" type="text" placeholder="Search..." style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;height: 45px;font-family: Poppins, sans-serif;font-size: 14px;"></div>
                                                            </form>
                                                            <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Current Class</h4>
                                                            </div>
                                                            <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Venue</h4>
                                                            </div>
                                                            <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Time</h4>
                                                            </div>
                                                            <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Date</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card" style="height: 40%;margin-top: 30px;box-shadow: 0px 2px 20px 0px rgba(59,59,59,0.31);">
                                                        <div class="card-body">
                                                            <h4 class="card-title" style="color: #3B3B3B;font-size: 1.3vw;font-weight: 500;font-family: Poppins, sans-serif;">Parameter - Attendance</h4>
                                                            <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" style="width: 100%;background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;margin-left: 0px !important;">
                                                                <div class="input-group" style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><button class="btn btn-primary py-0" type="button" style="background: #e8e8e8;border-style: none;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-20.png" style="width: 20px;"></button><input class="border-0 form-control form-control small" type="text" placeholder="Search..." style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;height: 45px;font-family: Poppins, sans-serif;font-size: 14px;"></div>
                                                            </form>
                                                            <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Class Status</h4>
                                                            </div>
                                                            <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Date</h4>
                                                            </div>
                                                            <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Time</h4>
                                                            </div>
                                                            <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Remark</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 d-xxl-flex">
                                                    <div class="card" style="height: 90%;box-shadow: 0px 2px 20px 0px rgba(59,59,59,0.31);">
                                                        <div class="card-body">
                                                            <h4 class="card-title" style="color: #3B3B3B;font-size: 1.3vw;font-weight: 500;font-family: Poppins, sans-serif;">Parameter - Financial</h4>
                                                            <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" style="width: 100%;background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;margin-left: 0px !important;">
                                                                <div class="input-group" style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><button class="btn btn-primary py-0" type="button" style="background: #e8e8e8;border-style: none;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-20.png" style="width: 20px;"></button><input class="border-0 form-control form-control small" type="text" placeholder="Search..." style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;height: 45px;font-family: Poppins, sans-serif;font-size: 14px;"></div>
                                                            </form>
                                                            <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Invoice #</h4>
                                                            </div>
                                                            <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Date</h4>
                                                            </div>
                                                            <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Status</h4>
                                                            </div>
                                                            <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Total</h4>
                                                            </div>
                                                            <div class="col d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="height: 48px;padding-left: 16px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Outstanding</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-xl-flex d-xxl-flex flex-column align-items-xl-end justify-content-xxl-start align-items-xxl-end" style="padding-right: 0px;">
                                            <div class="card" style="box-shadow: 0px 2px 20px 0px rgba(59,59,59,0.31);background: rgba(255,255,255,0);border-style: none;">
                                                <div class="card-body" style="width: 306.344px;">
                                                    <h4 class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center card-title" style="font-size: 1.5vw;">Report Field<button class="btn btn-primary" type="button" style="background: #F5F5F5;border-style: none;color: #3B3B3B;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none"><path d="M6.2253 4.81108C5.83477 4.42056 5.20161 4.42056 4.81108 4.81108C4.42056 5.20161 4.42056 5.83477 4.81108 6.2253L10.5858 12L4.81114 17.7747C4.42062 18.1652 4.42062 18.7984 4.81114 19.1889C5.20167 19.5794 5.83483 19.5794 6.22535 19.1889L12 13.4142L17.7747 19.1889C18.1652 19.5794 18.7984 19.5794 19.1889 19.1889C19.5794 18.7984 19.5794 18.1652 19.1889 17.7747L13.4142 12L19.189 6.2253C19.5795 5.83477 19.5795 5.20161 19.189 4.81108C18.7985 4.42056 18.1653 4.42056 17.7748 4.81108L12 10.5858L6.2253 4.81108Z" fill="currentColor"></path></svg></button></h4>
                                                    <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" style="width: 100%;background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;margin-left: 0px !important;">
                                                        <div class="input-group" style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><button class="btn btn-primary py-0" type="button" style="background: #e8e8e8;border-style: none;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-20.png" style="width: 20px;"></button><input class="border-0 form-control form-control small" type="text" placeholder="Search..." style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;height: 45px;font-family: Poppins, sans-serif;font-size: 14px;"></div>
                                                    </form>
                                                    <div class="form-group" style="width: 214px;margin-top: 20px;"><label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Report Start Date:</label>
                                                        <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;"><path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path></svg></span><input class="form-control form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"></div>
                                                    </div>
                                                    <div class="form-group" style="width: 214px;"><label class="form-label form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Report End Date:</label>
                                                        <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewbox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;"><path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path></svg></span><input class="form-control form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"></div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body" style="background: #F5F5F5;border-style: none;border-bottom-style: none;">
                                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="background: #FFFFFF;height: 48px;padding: 0px;padding-left: 20px;margin-bottom: 10px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-3.png" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Student Number</h4>
                                                            </div>
                                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="background: #FFFFFF;height: 48px;padding: 0px;padding-left: 20px;margin-bottom: 10px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Last Name</h4>
                                                            </div>
                                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="background: #FFFFFF;height: 48px;padding: 0px;padding-left: 20px;margin-bottom: 10px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Current Class</h4>
                                                            </div>
                                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="background: #FFFFFF;height: 48px;padding: 0px;padding-left: 20px;margin-bottom: 10px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Venue</h4>
                                                            </div>
                                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="background: #FFFFFF;height: 48px;padding: 0px;padding-left: 20px;margin-bottom: 10px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Class Status</h4>
                                                            </div>
                                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="background: #FFFFFF;height: 48px;padding: 0px;padding-left: 20px;margin-bottom: 10px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Invoice #</h4>
                                                            </div>
                                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="background: #FFFFFF;height: 48px;padding: 0px;padding-left: 20px;margin-bottom: 10px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Total</h4>
                                                            </div>
                                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="background: #FFFFFF;height: 48px;padding: 0px;padding-left: 20px;margin-bottom: 10px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-3.png" style="width: 20px;" width="20" height="20">
                                                                <h4 style="color: #7A7A7A;font-size: 1vw;font-weight: 400;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-left: 10px;">Outstanding</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="container d-xl-flex d-xxl-flex justify-content-between align-items-xxl-center" style="margin-top: 20px;padding-right: 0px;padding-left: 0px;"><button class="btn btn-primary" type="button" style="background: #4A5C7A;box-shadow: 0px 4px rgb(40,51,68);border-style: none;border-bottom-style: none;border-bottom-color: rgb(29,44,88);height: 48px;width: 95px;font-family: Poppins, sans-serif;" data-bs-toggle="modal" data-bs-target="#modal-1">Export</button><a href="#" style="font-family: Poppins;font-size: 15px;font-weight: 400;line-height: 23px;letter-spacing: 0px;text-align: left;color: #4A5C7A;">Reset all Filters</a></div>
                                                </div>
                                            </div>
                                            <div class="d-xxl-flex"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-6" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-9 col-xxl-9">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h1 class="d-xxl-flex justify-content-xxl-end" style="text-align: right;"><button class="btn btn-primary d-xxl-flex justify-content-around align-items-xxl-center" type="button" style="width: 130px;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 14px;margin-left: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                                                <path d="M11 5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5V12.1578L16.2428 8.91501L17.657 10.3292L12.0001 15.9861L6.34326 10.3292L7.75748 8.91501L11 12.1575V5Z" fill="currentColor"></path>
                                                                <path d="M4 14H6V18H18V14H20V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14Z" fill="currentColor"></path>
                                                            </svg>Export<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-down">
                                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                                            </svg></button></h1>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th><input type="checkbox"></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">#</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">NAME/ID<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">CLASS<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">DATE <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">TIME</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">COACH<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">STATUS<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">00010</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">GHS-RPS2-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">04/02/2022</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">15:30 - 16:25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Present</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">00010</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">GHS-RPS2-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">04/02/2022</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">15:30 - 16:25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Present</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">00010</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">GHS-RPS2-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">04/02/2022</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">15:30 - 16:25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Present</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">00010</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">GHS-RPS2-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">04/02/2022</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">15:30 - 16:25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Present</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">00010</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">GHS-RPS2-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">04/02/2022</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">15:30 - 16:25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Present</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">00010</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">GHS-RPS2-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">04/02/2022</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">15:30 - 16:25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Present</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">00010</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">GHS-RPS2-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">04/02/2022</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">15:30 - 16:25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Present</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">00010</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">C100431</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">GHS-RPS2-0001-01</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">04/02/2022</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">15:30 - 16:25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Present</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="container d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center">
                                                        <h1 style="font-family: Poppins, sans-serif;font-size: 14px;color: #7A7A7A;font-weight: 400;">Showing 1 - 10 of 10</h1><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;">1</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.4vw;color: #3B3B3B;font-weight: 500;text-align: center;">Student Attendance Records</h1>
                                            <div style="margin-top: 20px;">
                                                <h1 style="color: #3B3B3B;font-size: 1.1vw;font-family: Poppins, sans-serif;font-weight: 500;">INFORMATION</h1>
                                                <div>
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Status</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #4CBC9A;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Present</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">#</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">00010</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Name</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Ethan Ng</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Student ID</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">C100431</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Class</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">GHS-RPS2-000101</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Cost</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">$2,160</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Prerequisite</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">None</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Course Category</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Group</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-8" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-9 col-xxl-9">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h1 class="d-xxl-flex justify-content-xxl-end" style="text-align: right;"><button class="btn btn-primary d-xxl-flex justify-content-around align-items-xxl-center" type="button" style="width: 130px;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 1.2vh;margin-left: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                                                <path d="M11 5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5V12.1578L16.2428 8.91501L17.657 10.3292L12.0001 15.9861L6.34326 10.3292L7.75748 8.91501L11 12.1575V5Z" fill="currentColor"></path>
                                                                <path d="M4 14H6V18H18V14H20V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14Z" fill="currentColor"></path>
                                                            </svg>Export<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-down">
                                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                                            </svg></button></h1>
                                                    <h1 class="d-xxl-flex justify-content-xxl-center" style="color: #7A7A7A;font-size: 1.2vh;font-family: Poppins, sans-serif;font-weight: 700;">Class ( Sum of Working hours)</h1>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th><input type="checkbox"></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">COACH</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">ASA<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">CLUB&nbsp; &nbsp; &nbsp; &nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">GROUP<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">PRIVATE<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">RUN<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">SWIM TEAM<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">GRAND TOTAL<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">25.50</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">25.50</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">25.50</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">25.50</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">25.50</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">25.50</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">25.50</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">25.50</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12.25</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">0</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">25.50</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="container d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center">
                                                        <h1 style="font-family: Poppins, sans-serif;font-size: 14px;color: #7A7A7A;font-weight: 400;">Showing 1 - 10 of 10</h1><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;">1</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.4vw;color: #3B3B3B;font-weight: 500;text-align: center;">Coach Working Hour/Salary Report</h1>
                                            <div style="margin-top: 20px;">
                                                <h1 style="color: #3B3B3B;font-size: 1.1vw;font-family: Poppins, sans-serif;font-weight: 500;">INFORMATION</h1>
                                                <div>
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Coach </h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Coach Ng</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Coach Phone</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">6999 9999</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">ASA (hrs)</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">12.25</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Club (hrs)</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">0</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Group (hrs)</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">12.25</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Private (hrs)</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">0</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Run (hrs)</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">0</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Swim Team (hrs)</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">0</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Grand Total (hrs)</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">25.50</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-7" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-9 col-xxl-9">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h1 class="d-xxl-flex justify-content-xxl-end" style="text-align: right;"><button class="btn btn-primary d-xxl-flex justify-content-around align-items-xxl-center" type="button" style="width: 130px;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 14px;margin-left: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                                                <path d="M11 5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5V12.1578L16.2428 8.91501L17.657 10.3292L12.0001 15.9861L6.34326 10.3292L7.75748 8.91501L11 12.1575V5Z" fill="currentColor"></path>
                                                                <path d="M4 14H6V18H18V14H20V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14Z" fill="currentColor"></path>
                                                            </svg>Export<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-down">
                                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                                            </svg></button></h1>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th><input type="checkbox"></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">#<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">ENTRIES DATE/TIME<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">CATEGORY<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">NAME</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">PHONE</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">STATUS<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                        </svg></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td class="text-start" style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center">
                                                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;margin-bottom: 0px;">00010</h1>
                                                                            <div style="width: 9px;height: 9px;color: #FF4547;background: #FF4550;border-bottom-style: none;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">17/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">10:15</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Enrollment Records (Website)</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Completed</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td class="text-start" style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center">
                                                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;margin-bottom: 0px;">00010</h1>
                                                                            <div style="width: 9px;height: 9px;color: #FF4547;background: #FF4550;border-bottom-style: none;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">17/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">10:15</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Enrollment Records (Website)</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Completed</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td class="text-start" style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center">
                                                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;margin-bottom: 0px;">00010</h1>
                                                                            <div style="width: 9px;height: 9px;color: #FF4547;background: #FF4550;border-bottom-style: none;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">17/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">10:15</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Enrollment Records (Website)</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Completed</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td class="text-start" style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center">
                                                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;margin-bottom: 0px;">00010</h1>
                                                                            <div style="width: 9px;height: 9px;color: #FF4547;background: #FF4550;border-bottom-style: none;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">17/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">10:15</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Enrollment Records (Website)</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Completed</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td class="text-start" style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center">
                                                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;margin-bottom: 0px;">00010</h1>
                                                                            <div style="width: 9px;height: 9px;color: #FF4547;background: #FF4550;border-bottom-style: none;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">17/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">10:15</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Enrollment Records (Website)</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Completed</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td class="text-start" style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center">
                                                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;margin-bottom: 0px;">00010</h1>
                                                                            <div style="width: 9px;height: 9px;color: #FF4547;background: #FF4550;border-bottom-style: none;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">17/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">10:15</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Enrollment Records (Website)</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Completed</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td class="text-start" style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center">
                                                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;margin-bottom: 0px;">00010</h1>
                                                                            <div style="width: 9px;height: 9px;color: #FF4547;background: #FF4550;border-bottom-style: none;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">17/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">10:15</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Enrollment Records (Website)</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Completed</td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td class="text-start" style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center">
                                                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;margin-bottom: 0px;">00010</h1>
                                                                            <div style="width: 9px;height: 9px;color: #FF4547;background: #FF4550;border-bottom-style: none;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">17/07/2022<h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">10:15</h1>
                                                                    </td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Enrollment Records (Website)</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ethan Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">6999 9999</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Completed</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="container d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center">
                                                        <h1 style="font-family: Poppins, sans-serif;font-size: 14px;color: #7A7A7A;font-weight: 400;">Showing 1 - 10 of 10</h1><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;">1</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.4vw;color: #3B3B3B;font-weight: 500;text-align: center;">Enrollment Records</h1>
                                            <div style="margin-top: 20px;">
                                                <h1 style="color: #3B3B3B;font-size: 1.1vw;font-family: Poppins, sans-serif;font-weight: 500;">INFORMATION</h1>
                                                <div>
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Status </h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #4CBC9A;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Present</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">#</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">00010</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Name</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Ethan Ng</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Student ID</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">C100431</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Class</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">GHS-RPS2-000101</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Cost</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">$2,160</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Prerequisite</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">None</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Course Category</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Group</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
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
    $("#filterButton").click(function() {
        $("#tab-6").addClass("active");
        $("#tab-1").removeClass("active");
    });
    $("#filterButton2").click(function() {
        $("#tab-7").addClass("active");
        $("#tab-2").removeClass("active");
    });
    $("#filterButton3").click(function() {
        $("#tab-8").addClass("active");
        $("#tab-4").removeClass("active");
    });

    $("#t1").click(function() {
        $("#tab-6").removeClass("active"); 
        $("#tab-7").removeClass("active"); 
        $("#tab-8").removeClass("active"); 
        $("#tab-1").addClass("active");
    });
    $("#t2").click(function() {
        $("#tab-6").removeClass("active"); 
        $("#tab-7").removeClass("active"); 
        $("#tab-8").removeClass("active"); 
        $("#tab-2").addClass("active");
    });
    $("#t3").click(function() {
        $("#tab-6").removeClass("active"); 
        $("#tab-8").removeClass("active"); 
        $("#tab-7").removeClass("active");   
    });
    $("#t4").click(function() {
        $("#tab-6").removeClass("active"); 
        $("#tab-8").removeClass("active");  
        $("#tab-7").removeClass("active");  
        $("#tab-4").addClass("active");
    });
    $("#t5").click(function() {
        $("#tab-6").removeClass("active");
        $("#tab-8").removeClass("active");    
        $("#tab-7").removeClass("active"); 
    });
});
  @endsection
    