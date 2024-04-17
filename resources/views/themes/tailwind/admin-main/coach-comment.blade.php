
 @extends('theme::layouts.app')


@section('content')
<div style="padding: 20px;background: #ffffff;box-shadow: 0px 0px 3px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
                    <div class="row g-0 d-xxl-flex justify-content-between">
                        <div class="col-auto">
                            <h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;font-weight: bold;">Coach Management</h1>
                        </div>
                    </div>

                    <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start" role="tablist" style="border-style: none;border-left-style: none;">
                        <li class="nav-item" role="presentation" style="border-left-style: none;"><a class="nav-link nav-link" role="tab" href="http://127.0.0.1:8000/admin-main/coach" style="border-style: none;border-left-style: none;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 600;">BASIC INFORMATION</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" role="tab" href="http://127.0.0.1:8000/admin-main/coach-history" style="border-style: none;border-left-style: none;">TEACHING HISTORY</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" href="http://127.0.0.1:8000/admin-main/coach-comment" style="border-style: none;border-left-style: none;">COACH COMMENT</a></li>
                    </ul>

                    <div class="row" style="margin-top: 15px;">
                        <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
                            <div class="tab-content" style="padding: 15px;">
                                <div class="d-xxl-flex flex-row align-items-xxl-end">
                                                 <form class="d-xl-flex align-items-xl-center ml-4 w-100" style="width: 100vh;">
        <button class="btn btn-primary" type="button" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px; width:50px; height: 45px; background-color: #e8e8e8; border-style: none;"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-20.png" style="width: 20px;"></button><input class="form-control" type="search" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px; background: #e8e8e8;margin-right: 20px; border-style: none; height: 45px; width: 100vh;" />
    </form>
                                </div>
                                <div class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;margin-top: 20px;">
                                    <div class="table-responsive" style="height: auto;max-height: none;">
                                        <table class="table table-hover" id="example" style="width: 100%;">
                                            <thead>
                                                <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                                    <th class="text-center"><input type="checkbox"></th>
                                                    <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">LEVEL</th>
                                                    <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">CHARACTERISTICS</th>
                                                    <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">STUDENT</th>
                                                    <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">COMMENT DATE</th>
                                                    <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">TITLE</th>
                                                    <th style="color: #7A7A7A;font-size: 12px;line-height: 21px;letter-spacing: 0.02em;text-align: left;">STATUS</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody style="height: auto;">
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ripple Starter 1</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Build on water confidence</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ethan Ng<br>C100431</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">12/09/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Students’ engagement in the process of giving...</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Active</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ripple Starter 1</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Build on water confidence</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ethan Ng<br>C100431</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">12/09/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Students’ engagement in the process of giving...</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Active</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ripple Starter 1</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Build on water confidence</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ethan Ng<br>C100431</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">12/09/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Students’ engagement in the process of giving...</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Active</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ripple Starter 1</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Build on water confidence</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ethan Ng<br>C100431</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">12/09/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Students’ engagement in the process of giving...</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Active</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ripple Starter 1</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Build on water confidence</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ethan Ng<br>C100431</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">12/09/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Students’ engagement in the process of giving...</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Active</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ripple Starter 1</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Build on water confidence</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ethan Ng<br>C100431</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">12/09/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Students’ engagement in the process of giving...</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Active</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ripple Starter 1</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Build on water confidence</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ethan Ng<br>C100431</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">12/09/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Students’ engagement in the process of giving...</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Active</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ripple Starter 1</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Build on water confidence</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ethan Ng<br>C100431</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">12/09/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Students’ engagement in the process of giving...</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Active</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ripple Starter 1</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Build on water confidence</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ethan Ng<br>C100431</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">12/09/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Students’ engagement in the process of giving...</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Active</td>
                                                    <td><div class="col"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="margin-right: 20px;color: #3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewbox="0 0 24 24" fill="none" style="color: #3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></div></td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid #E8E8E8;">
                                                    <td class="text-center"><input type="checkbox"></td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ripple Starter 1</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Build on water confidence</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Ethan Ng<br>C100431</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">12/09/2022</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Students’ engagement in the process of giving...</td>
                                                    <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 12px;">Active</td>
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
                                        <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;text-align: center;">Coach Comment</h1>
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
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Level</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">Ripple Starter 1</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Characteristic</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">Build on water confidence</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Student</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">Ethan Ng / C100431</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Class Date</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">13/07/2022</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Class Time</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">10:00 - 11:00</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Comment Date</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">14/07/2022</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Comment Time</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">10:00</h1>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 10px;">
                                                    <div class="col-md-6">
                                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Status</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">Active</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>@endsection

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
        showModal2('Edit Data', rowData); // Pass the row data to the modal
    });

    function showModal2(title, rowData) {

        // Create a Bootstrap modal
        var modal2 = `
  
                    
             <div class="modal fade" role="dialog" tabindex="-1" id="myModal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-family: Poppins, sans-serif;font-size: 32px;color: #3B3B3B;">Coach Comment</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col d-xxl-flex align-items-xxl-center" style="margin-top: 10px;margin-bottom: 10px;"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-8.png" style="width: 20px;margin-right: 20px;">
                        <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;margin-bottom: 0px;">Coach Ng / 6999 9999</h1>
                    </div>
                    <div class="col d-xxl-flex align-items-xxl-center" style="margin-top: 10px;margin-bottom: 10px;"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-2.png" style="width: 20px;margin-right: 20px;">
                        <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;margin-bottom: 0px;">Ethan Ng / C100431</h1>
                    </div>
                    <div class="col d-xxl-flex align-items-xxl-center" style="margin-top: 10px;margin-bottom: 10px;"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-3.png" style="width: 20px;margin-right: 20px;">
                        <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;margin-bottom: 0px;">Ripple Starter 1 / Build on water confidence</h1>
                    </div>
                    <div class="col d-xxl-flex align-items-xxl-center" style="margin-top: 10px;margin-bottom: 10px;"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-1.png" style="width: 20px;margin-right: 20px;">
                        <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;margin-bottom: 0px;">Class: 13/07/2022 10:00 - 11:00</h1>
                    </div>
                    <div class="col d-xxl-flex align-items-xxl-center" style="margin-top: 10px;margin-bottom: 10px;"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-1.png" style="width: 20px;margin-right: 20px;">
                        <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;margin-bottom: 0px;">Comment: 16/07/2022 11:59</h1>
                    </div>
                    <div class="col d-xxl-flex align-items-xxl-center" style="margin-top: 10px;margin-bottom: 10px;"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-46.png" style="width: 16px;margin-right: 24px;">
                        <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 16px;font-family: Poppins, sans-serif;margin-bottom: 0px;">Students’ engagement in the process of giving and getting feedback is an indication of learning.</h1>
                    </div>
                    <div class="col d-xxl-flex align-items-xxl-start" style="margin-top: 10px;margin-bottom: 10px;"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-47.png" style="width: 20px;margin-right: 20px;" width="20" height="20">
                        <div>
                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;margin-bottom: 0px;">To assess how much effort students put into a review, use these analytics:</h1>
                            <ul>
                                <li style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;margin-bottom: 0px;"><span style="color: rgb(99, 99, 99);">Look at the completion rates in the review task report in Eli Review. This data helps instructors identify, for example, if the class a whole met the minimum expectation for the number of comments they gave.</span></li>
                                <li style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;margin-bottom: 0px;"><span style="color: rgb(99, 99, 99);">Look at the comments totals. Use Engagement tab in the review to see how many comments were exchanged and how helpful students’ comments have been. This data can also help instructors assess whether students are getting-and-giving proportionally.</span></li>
                                <li style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;margin-bottom: 0px;"><span style="color: rgb(99, 99, 99);">Check longitudinal trends. Use Roster or Analytics to get a sense of students’ engagement across multiple reviews. To see if students have a pattern of weak engagement, check the student’s course analytics.</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col d-xxl-flex flex-row align-items-xxl-center">
                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-bottom: 0px;margin-right: 5px;">Status:</h1>
                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-bottom: 0px;">Active</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

        `;

        // Append the modal HTML to the body
        $('body').append(modal2);

        // Show the modal
        $('#myModal2').modal('show');

        // Remove the modal from the DOM when closed
        $('#myModal2').on('hidden.bs.modal', function () {
            $(this).remove();
        });
    }
});
</script>@endsection