
 @extends('theme::layouts.app')


@section('content')


<div style="height: 100vh;background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;padding: 20px;">
                    <h1 class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center titles" style="font-size: 2vw;font-family: Poppins, sans-serif;color: #3B3B3B;">Setting - Holiday List<button class="btn btn-primary text-nowrap" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 150px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;box-shadow: 0px 5px 0px #273040;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg" style="margin-right: 6px;">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                            </svg>Add Category</button></h1>
                    <div class="card" style="margin-top: 30px;border-style: none;">
                        <div class="card-body" style="color: #3B3B3B;">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-9 col-xxl-9" style="border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding-top: 12px;padding-bottom: 12px;">
                                            <div class="container d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="padding-right: 0px;padding-left: 0px;">
                                                <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" style="width: 100vw;background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;margin-bottom: 0px !important;">
                                                    <div class="input-group" style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><button class="btn btn-primary py-0" type="button" style="background: #e8e8e8;border-style: none;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-20.png" style="width: 20px;"></button><input class="form-control border-0 small" type="text" placeholder="Search..." style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;height: 45px;font-family: Poppins, sans-serif;font-size: 14px;"></div>
                                                </form><button class="btn btn-primary d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center" type="button" style="width: 130px;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 14px;margin-left: 20px;">Actions<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-down" style="margin-left: 13px;">
                                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                                    </svg></button>
                                            </div>
                                            <div class="row d-xl-flex" style="margin-top: 20px;height: 100%;">
                                                <div class="col">
                                                    <div>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th><input type="checkbox"></th>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">SUBJECT</th>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">CREATE DATE</th>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">DATE</th>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">SCHOOL CLOSURE</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="align-middle" style="height: 72px;">
                                                                        <td> <input type="checkbox"></td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Boxing Day</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">26/12/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">No</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                            <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-1">
                                                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                                </svg></div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="container d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center">
                                                            <h1 style="font-family: Poppins, sans-serif;font-size: 14px;color: #7A7A7A;font-weight: 400;">Showing 1 - 10 of 2</h1>
                                                            <div><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 5px;">1</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 d-xl-flex d-xxl-flex flex-column" style="padding-right: 0px;padding-left: 0px;">
                                            <div class="d-xxl-flex flex-column justify-content-xxl-center align-items-xxl-center">
                                                <h1 style="color: #3B3B3B;font-size: 1.4vw;font-family: Poppins, sans-serif;font-weight: 500;margin-top: 20px;text-align: center;">Holiday List</h1>
                                            </div>
                                            <div style="margin-top: 20px;">
                                                <h1 style="color: #3B3B3B;font-size: 1.1vw;font-family: Poppins, sans-serif;font-weight: 500;padding-left: 10px;">INFORMATION</h1>
                                                <div>
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Subject</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Boxing Day</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Date</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">12/4/2022</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Create Date</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">12/4/2022</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Modified by</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Admin</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Modified Date</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">1/2/2022 13:45</h1>
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