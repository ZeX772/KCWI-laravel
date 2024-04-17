 @extends('theme::layouts.app')


@section('content')

<div style="padding: 20px;background: #ffffff;box-shadow: 0px 0px 3px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
                    <div class="row g-0 d-xxl-flex justify-content-between">
                        <div class="col-auto">
                            <h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;font-weight: bold;">Coach Management</h1>
                        </div>
                    </div>

                    <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start" role="tablist" style="border-style: none;border-left-style: none;">
                        <li class="nav-item" role="presentation" style="border-left-style: none;"><a class="nav-link nav-link" role="tab"href="http://127.0.0.1:8000/admin-main/coach" style="border-style: none;border-left-style: none;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 600;">BASIC INFORMATION</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" role="tab"  href="http://127.0.0.1:8000/admin-main/coach-history" style="border-style: none;border-left-style: none;">TEACHING HISTORY</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" role="tab"  href="http://127.0.0.1:8000/admin-main/coach-comment" style="border-style: none;border-left-style: none;">COACH COMMENT</a></li>
                    </ul>

                    <div class="row" style="margin-top: 15px;">
                        <div class="col-xxl-12" style="background: #ffffff;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
                            <div class="tab-content" style="padding: 15px;">
                                <div class="d-xxl-flex flex-column align-items-xxl-start">
                                    <div class="col">
                                        <h1 style="color: #3B3B3B;font-size: 20px;font-family: Poppins, sans-serif;">Teaching History (1/7/2022 - 31/7/2022)</h1>
                                    </div>
                                    <div class="col d-xxl-flex justify-content-between align-items-xxl-center" style="width: 500px;">
                                        <div class="d-xxl-flex align-items-xxl-center">
                                            <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Total working class(es):</h1>
                                            <h1 class="fw-normal" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;margin-left: 10px;">6/8</h1>
                                        </div>
                                        <div class="d-xxl-flex align-items-xxl-center">
                                            <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Coach:&nbsp;</h1>
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;margin-left: 10px;">Coach Ng</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;margin-top: 20px;">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">COURSE CODE</th>
                                                    <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">DATE</th>
                                                    <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">ATTENDANCE</th>
                                                    <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">STANDARD PAY SCALE</th>
                                                    <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">STATUS</th>
                                                    <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">PAYMENT DATE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid #E8E8E8;height: 74px;">
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;text-decoration: underline;">VSA-RS1-0001</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Present</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">$200</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Paid</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">31/7/2022</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;height: 74px;">
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;text-decoration: underline;">VSA-RS1-0001</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Present</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">$200</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Paid</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">31/7/2022</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;height: 74px;">
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;text-decoration: underline;">VSA-RS1-0001</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Present</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">$200</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Paid</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">31/7/2022</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;height: 74px;">
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;text-decoration: underline;">VSA-RS1-0001</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Present</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">$200</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Paid</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">31/7/2022</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;height: 74px;">
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;text-decoration: underline;">VSA-RS1-0001</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Present</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">$200</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Paid</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">31/7/2022</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;height: 74px;">
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;text-decoration: underline;">VSA-RS1-0001</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Present</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">$200</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Paid</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">31/7/2022</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col" style="margin-top: 20px;margin-bottom: 20px;">
                            <div class="table-responsive" style="margin-top: 20px;width: 500px;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="color: rgb(0,0,0);font-size: 12px;font-family: Poppins, sans-serif;">Subject</th>
                                            <th style="color: rgb(0,0,0);font-size: 12px;font-family: Poppins, sans-serif;">Quantity</th>
                                            <th style="color: rgb(0,0,0);font-size: 12px;font-family: Poppins, sans-serif;">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="color: rgb(0,0,0);font-size: 12px;font-family: Poppins, sans-serif;">Group</td>
                                            <td style="color: rgb(0,0,0);font-size: 12px;font-family: Poppins, sans-serif;">4</td>
                                            <td style="color: rgb(0,0,0);font-size: 12px;font-family: Poppins, sans-serif;">$800</td>
                                        </tr>
                                        <tr>
                                            <td style="color: rgb(0,0,0);font-size: 12px;font-family: Poppins, sans-serif;height: 35px;"></td>
                                            <td style="color: rgb(0,0,0);font-size: 12px;font-family: Poppins, sans-serif;"></td>
                                            <td style="color: rgb(0,0,0);font-size: 12px;font-family: Poppins, sans-serif;"></td>
                                        </tr>
                                        <tr>
                                            <td style="color: rgb(0,0,0);font-size: 12px;font-family: Poppins, sans-serif;"></td>
                                            <td style="color: rgb(0,0,0);font-size: 12px;font-family: Poppins, sans-serif;font-weight: bold;">Total Amount</td>
                                            <td style="color: rgb(0,0,0);font-size: 12px;font-family: Poppins, sans-serif;">$800</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xxl-12" style="background: #ffffff;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
                            <div class="tab-content" style="padding: 15px;">
                                <div class="d-xxl-flex flex-column align-items-xxl-start">
                                    <div class="col">
                                        <h1 style="color: #3B3B3B;font-size: 20px;font-family: Poppins, sans-serif;">Teaching History (1/7/2022 - 31/7/2022)</h1>
                                    </div>
                                    <div class="col d-xxl-flex justify-content-between align-items-xxl-center" style="width: 500px;">
                                        <div class="d-xxl-flex align-items-xxl-center">
                                            <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Total working class(es):</h1>
                                            <h1 class="fw-normal" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;margin-left: 10px;">6/8</h1>
                                        </div>
                                        <div class="d-xxl-flex align-items-xxl-center">
                                            <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Coach:&nbsp;</h1>
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;margin-left: 10px;">Coach Ng</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;margin-top: 20px;">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">COURSE CODE</th>
                                                    <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">DATE</th>
                                                    <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">ATTENDANCE</th>
                                                    <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">STANDARD PAY SCALE</th>
                                                    <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">STATUS</th>
                                                    <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">PAYMENT DATE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid #E8E8E8;height: 74px;">
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;text-decoration: underline;">VSA-RS1-0001</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Present</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">$200</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Paid</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">31/7/2022</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;height: 74px;">
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;text-decoration: underline;">VSA-RS1-0001</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Present</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">$200</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Paid</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">31/7/2022</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;height: 74px;">
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;text-decoration: underline;">VSA-RS1-0001</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Present</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">$200</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Paid</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">31/7/2022</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;height: 74px;">
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;text-decoration: underline;">VSA-RS1-0001</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Present</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">$200</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Paid</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">31/7/2022</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;height: 74px;">
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;text-decoration: underline;">VSA-RS1-0001</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Present</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">$200</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Paid</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">31/7/2022</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;height: 74px;">
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;text-decoration: underline;">VSA-RS1-0001</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Present</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">$200</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">Paid</td>
                                                    <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;vertical-align: middle;">31/7/2022</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection