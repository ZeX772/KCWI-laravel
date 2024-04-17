 @extends('theme::layouts.app')


@section('content')
<div style="padding: 20px;background: #ffffff;box-shadow: 0px 0px 3px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
                    <div class="row g-0 d-xxl-flex justify-content-between">
                        <div class="col-auto">
                            <h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;font-weight: bold;">Coach Management</h1>
                        </div>
                    </div>
                               <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start" role="tablist" style="border-style: none; border-left-style: none;">
  <li class="nav-item" role="presentation" style="border-left-style: none;"><a class="nav-link" role="tab" href="http://127.0.0.1:8000/admin-main/coach" style="border-style: none; border-left-style: none; font-size: 14px; font-family: Poppins, sans-serif; font-weight: 600;">BASIC INFORMATION</a></li>
  <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" href="http://127.0.0.1:8000/admin-main/coach-history">TEACHING HISTORY</a></li>
  <li class="nav-item" role="presentation"><a class="nav-link" role="tab" href="http://127.0.0.1:8000/admin-main/coach-comment" style="border-style: none; border-left-style: none;">COACH COMMENT</a></li>
</ul>




                    <div class="row" style="margin-top: 15px;">
                        <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
                            <div class="tab-content" style="padding: 15px;">
                                <div class="d-xxl-flex flex-row align-items-xxl-end">
                                                   <form class="d-xl-flex align-items-xl-center ml-4" style="width: 100vh;">
        <button class="btn btn-primary" type="button" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px; width:50px; height: 45px; background-color: #e8e8e8; border-style: none;"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-20.png" style="width: 20px;"></button><input class="form-control" type="search" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px; background: #e8e8e8;margin-right: 20px; border-style: none; height: 45px; width: 50vh;" />
    </form>
                                    <div class="d-xxl-flex flex-column" style="margin-right: 10px;margin-left: 10px;"><label class="form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Start Date</label>
                                        <div class="input-group" style="height: 48px;margin-bottom: 0px;"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                    <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                                </svg></span><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;font-size: 14px;"></div>
                                    </div>
                                    <div style="margin-right: 10px;"><label class="form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">End Date</label>
                                        <div class="input-group" style="height: 48px;"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                    <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                                </svg></span><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;font-size: 14px;"></div>
                                    </div>
                                    <div class="d-xxl-flex" style="width: 253.4688px;"><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                            <option value="">Coach</option>
                                            <option value="">GSH</option>
                                        </select></div>
                                </div>
                                <div class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;margin-top: 20px;">
                                    <div class="table-responsive" style="height: auto;max-height: none;">
                                        <table class="table table-hover" id="example" style="width: 100%;">
                                            <thead>
                                                <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                                    <th class="text-center"><input type="checkbox"></th>
                                                    <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COURSE CODE</th>
                                                    <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">DATE</th>
                                                    <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">ATTENDANCE</th>
                                                    <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">STANDARD PAYSCALE</th>
                                                    <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">STATUS</th>
                                                    <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">PAYMENT DATE</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody style="height: auto;">
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">VSA-RS2-0001</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Present</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">$200</td>
                                                    <td style="color: #4CBC9A;font-family: Poppins, sans-serif;font-size: 12px;">Paid</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">31/7/2022</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">VSA-RS2-0001</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">13/7/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Present</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">$200</td>
                                                    <td style="color: #FF4550;font-family: Poppins, sans-serif;font-size: 12px;">Outstanding</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">-</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">VSA-RS2-0001</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Absent</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">$200</td>
                                                    <td style="color: #FF4550;font-family: Poppins, sans-serif;font-size: 12px;">Outstanding</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">-</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">VSA-RS2-0001</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">14/7/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Present</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">$200</td>
                                                    <td style="color: #4CBC9A;font-family: Poppins, sans-serif;font-size: 12px;">Paid</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">31/7/2022</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">VSA-RS2-0001</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">14/7/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Absent</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">$200</td>
                                                    <td style="color: #4CBC9A;font-family: Poppins, sans-serif;font-size: 12px;">Paid</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">31/7/2022</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">VSA-RS2-0001</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">21/7/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Absent</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">$200</td>
                                                    <td style="color: #4CBC9A;font-family: Poppins, sans-serif;font-size: 12px;">Paid</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">31/7/2022</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">VSA-RS2-0001</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Present</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">$200</td>
                                                    <td style="color: #4CBC9A;font-family: Poppins, sans-serif;font-size: 12px;">Paid</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">31/7/2022</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">VSA-RS2-0001</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">6/7/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Absent</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">$200</td>
                                                    <td style="color: #4CBC9A;font-family: Poppins, sans-serif;font-size: 12px;">Paid</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">31/7/2022</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">VSA-RS2-0001</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">27/7/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Present</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">$200</td>
                                                    <td style="color: #4CBC9A;font-family: Poppins, sans-serif;font-size: 12px;">Paid</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">31/7/2022</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">VSA-RS2-0001</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">21/7/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Present</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">$200</td>
                                                    <td style="color: #4CBC9A;font-family: Poppins, sans-serif;font-size: 12px;">Paid</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">31/7/2022</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">VSA-RS2-0001</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">21/7/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Present</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">$200</td>
                                                    <td style="color: #4CBC9A;font-family: Poppins, sans-serif;font-size: 12px;">Paid</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">31/7/2022</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">VSA-RS2-0001</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">27/7/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Present</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">$200</td>
                                                    <td style="color: #4CBC9A;font-family: Poppins, sans-serif;font-size: 12px;">Paid</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">31/7/2022</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-xxl-flex flex-column" style="border: 1px solid rgb(232,232,232);border-top-right-radius: 10px;border-bottom-right-radius: 11px;padding-top: 20px;">
                            <div>
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
                                        <li class="list-group-item d-xxl-flex flex-column align-items-xxl-center" style="border-style: none;padding: 0px;">
                                            <div class="container" style="padding: 0px;border-bottom: 1px solid #E8E8E8;">
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Status</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #4CBC9A;font-size: 14px;font-family: Poppins, sans-serif;">Published</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Course Code</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">VSA-RS1-0001</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Date</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">6/7/2022</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Attendance</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">Present</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Standard Pay Scale</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">$200</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Status</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">Paid</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Payment Date</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">31/7/2022</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Modified by</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">Admin</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Modified Date</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">1/2/2022 13:45</h1>
                                                    </div>
                                                </div>
                                            </div><button class="btn btn-primary" type="button" style="background: #4A5C7A;box-shadow: 0px 4px rgb(40,51,68);border-style: none;border-bottom-style: none;border-bottom-color: rgb(29,44,88);margin-top: 20px;font-family: Poppins, sans-serif;font-size: 15px;" data-bs-toggle="modal" data-bs-target="#modal-1">Generate Report</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                         <div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="col d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 20px;padding-top: 10px;padding-bottom: 0px;">
                        <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Personal Information</h4><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-43.png" style="width: 150px;margin-top: 20px;margin-right: 20px;">
                    </div>
                    <div class="modal-body">
                        <div class="col" style="width: 100%;">
                            <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                                <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Last Name</label><input class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;" value="Chan"></div>
                                </form>
                                <form class="form-inline" style="width: 100%;margin-left: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">First Name</label><input class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;" value="Coach"></div>
                                </form>
                            </div>
                            <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                                <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Chinese Name</label><input class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;" value="陳教練"></div>
                                </form>
                                <form class="form-inline" style="width: 100%;margin-left: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">App Password</label><input class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;" value="123456"></div>
                                </form>
                            </div>
                            <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                                <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">HKID</label><input class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;" value="K123456(7)"></div>
                                </form>
                                <form class="form-inline" style="width: 100%;margin-left: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Nationality</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                            <option value="">-</option>
                                            <option value="">-</option>
                                        </select></div>
                                </form>
                            </div>
                            <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                                <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Phone</label><input class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;" value="6999 9999"></div>
                                </form>
                                <form class="form-inline" style="width: 100%;margin-left: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Email</label><input class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;" value="coach.ng@gmail.com"></div>
                                </form>
                            </div>
                            <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                                <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Date of Birth</label>
                                        <div class="input-group mb-4"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                    <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                                </svg></span><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;"></div>
                                    </div>
                                </form>
                            </div>
                            <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 0px;">
                                <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Residential Address</label><input class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;" value="2108 Paul Y. Centre 51 Hung To Road Kowloon,Kwun Tong District,Hongkong"></div>
                                </form>
                            </div>
                            <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                                <form class="form-inline">
                                    <div class="form-group" style="margin-bottom: 20px;"><label class="form-label" style="color: #636363;font-size: 14px;">Response Course (Course Category)</label>
                                        <div class="d-xxl-flex justify-content-around align-items-xxl-center">
                                            <div class="col">
                                                <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                    <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">ASA</h1><input type="checkbox">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                    <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Club</h1><input type="checkbox">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                    <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Group</h1><input type="checkbox">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-xxl-flex justify-content-around align-items-xxl-center" style="margin-top: 10px;">
                                            <div class="col">
                                                <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                    <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Private</h1><input type="checkbox">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                    <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Run</h1><input type="checkbox">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                    <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Swim Team</h1><input type="checkbox">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                                <form class="form-inline">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Remark</label><textarea class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between" style="border-top-style: none;"><button class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button><button class="btn btn-primary" type="button" data-bs-dismiss="modal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button></div>
                </div>
            </div>
        </div>
                    </div>
                </div>
                    @endsection



                     @section('script')
<script type="text/javascript">
    var mSortingString = [];
        var disableSortingColumn = 4;
        mSortingString.push({ "bSortable": false, "aTargets": [disableSortingColumn] });
$(function() {
    var table = $('#example').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "aaSorting": [],
        "orderMulti": true,
        "aoColumnDefs": mSortingString,
        "columnDefs": [
            {
                "targets": -1, // The last column
                "data": null,
                "defaultContent": '<button class="view-button"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" style="margin-right:20px;color:#3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg></button>'
            }
        ]
    });

    // Add event listeners for the buttons
    $('#example').on('click', '.view-button', function() {
        var rowData = table.row($(this).closest('tr')).data();
         redirectToAnotherPage(rowData); // Redirect to another page with row data
    });

    $('#example').on('click', '.edit-button', function() {
        var rowData = table.row($(this).closest('tr')).data();
        showModal2('Edit Data', rowData); // Pass the row data to the modal
    });

    $('#example').on('click', '.delete-button', function() {
        var rowData = table.row($(this).closest('tr')).data();
        showModal('Delete Data', rowData); // Pass the row data to the modal
    });


  function redirectToAnotherPage(rowData) {
        // Modify this line to specify the URL you want to redirect to
        var redirectUrl = 'http://127.0.0.1:8000/admin-main/coach-teaching-history'; // Change this to your desired URL
        
        // Add query parameters with row data if needed
        // For example, if you want to pass an ID from rowData, you can do something like this:
        // var id = rowData.id;
        // redirectUrl += '?id=' + id;

        // Redirect to the specified URL
        window.location.href = redirectUrl;
    }



});
</script>@endsection