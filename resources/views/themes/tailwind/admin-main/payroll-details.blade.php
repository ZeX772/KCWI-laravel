 @extends('theme::layouts.app')


@section('content')
<div style="padding: 20px;background: #ffffff;box-shadow: 0px 0px 3px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;height: 910px;">
                    <div class="row g-0 d-xxl-flex justify-content-between">
                        <div class="col-auto">
                            <h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;">Payroll</h1>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;width: 100%;">
                            <div class="tab-content" style="padding: 15px;">
                                <div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                                    <div class="col d-xxl-flex justify-content-between align-items-xxl-center" style="padding-top: 10px;padding-bottom: 10px;">
                                        <div class="d-xxl-flex align-items-xxl-center">
                                            <div class="d-xxl-flex align-items-xxl-center">
                                                <h1 class="text-nowrap fw-normal d-xxl-flex" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-right: 10px;">Start Date:</h1>
                                                <h1 class="text-nowrap fw-normal d-xxl-flex" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: bold;"><strong>1/2/2022 (Wed)</strong></h1>
                                            </div>
                                            <div class="d-xxl-flex align-items-xxl-center" style="margin-left: 20px;">
                                                <h1 class="text-nowrap fw-normal d-xxl-flex" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-right: 10px;">End Date:</h1>
                                                <h1 class="text-nowrap fw-normal d-xxl-flex" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-right: 10px;"><strong>28/2/2022 (Tue)</strong></h1>
                                            </div>
                                            <div class="d-xxl-flex align-items-xxl-center" style="margin-left: 20px;">
                                                <h1 class="text-nowrap fw-normal d-xxl-flex" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-right: 10px;">Coach:</h1>
                                                <h1 class="text-nowrap fw-normal d-xxl-flex" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-right: 10px;"><strong>All</strong></h1>
                                            </div>
                                        </div>
                                        <div class="flex"><button class="btn btn-primary" type="button" style="display: flex;
  align-items: center;
  justify-content: center; margin-right: 20px;height: 48px;background: #F5F5F5;border-style: none;border-bottom-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-download" style="margin-right: 10px;">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"></path>
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"></path>
                                                </svg>Export</button><button class="btn btn-primary" type="button" style="display: flex;
  align-items: center;
  justify-content: center;margin-right: 20px;height: 48px;background: #F5F5F5;border-style: none;border-bottom-style: none;color: #3B3B3B;font-size: 14px;"><i class="fa fa-refresh" style="width: 20px;height: 20px;margin-right: 10px;"></i>Refresh</button></div>
                                    </div>
                                    <div class="col">
                                        <div class="table-responsive d-xxl-flex">
                                            <table class="table">
                                                <thead>
                                                    <tr style="border-bottom: 1px solid #E8E8E8;">
                                                        <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">COACH NAME</th>
                                                        <th style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">PAYMENT METHOD</th>
                                                        <th style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">BANK</th>
                                                        <th style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">RATE OF PAY</th>
                                                        <th style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">ATTENDANCE</th>
                                                        <th style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">TOTAL SALARY</th>
                                                        <th style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">LAST UPDATED DATE &amp; TIME</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Coach Cheung</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Bank Transfer</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Standard Chartered Bank (Hong Kong)&nbsp;&nbsp;</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Monthly</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">24</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">16000</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">14/12/2022 14:46</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Coach Cheung</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Bank Transfer</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Standard Chartered Bank (Hong Kong)&nbsp;&nbsp;</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Monthly</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">24</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">16000</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">14/12/2022 14:46</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Coach Cheung</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Bank Transfer</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Standard Chartered Bank (Hong Kong)&nbsp;&nbsp;</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Monthly</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">24</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">16000</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">14/12/2022 14:46</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Coach Cheung</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Bank Transfer</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Standard Chartered Bank (Hong Kong)&nbsp;&nbsp;</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Monthly</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">24</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">16000</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">14/12/2022 14:46</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Coach Cheung</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Bank Transfer</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Standard Chartered Bank (Hong Kong)&nbsp;&nbsp;</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Monthly</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">24</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">16000</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">14/12/2022 14:46</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Coach Cheung</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Bank Transfer</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Standard Chartered Bank (Hong Kong)&nbsp;&nbsp;</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Monthly</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">24</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">16000</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">14/12/2022 14:46</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Coach Cheung</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Bank Transfer</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Standard Chartered Bank (Hong Kong)&nbsp;&nbsp;</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Monthly</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">24</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">16000</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">14/12/2022 14:46</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Coach Cheung</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Bank Transfer</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Standard Chartered Bank (Hong Kong)&nbsp;&nbsp;</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Monthly</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">24</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">16000</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">14/12/2022 14:46</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    @endsection