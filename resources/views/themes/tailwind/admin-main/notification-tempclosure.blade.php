 @extends('theme::layouts.app')


@section('content')
<div style="height: 100vh;background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;padding: 20px;">
                    <h1 class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center titles" style="font-size: 2vw;font-family: Poppins, sans-serif;color: #3B3B3B;">Notification - Temporary Closure<button class="btn btn-primary text-nowrap" type="button" style="display: flex; color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 200px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;box-shadow: 0px 5px 0px #273040;" data-bs-toggle="modal" data-bs-target="#modal-1"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg" style="margin-right: 6px;">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                            </svg>Temporary Closure</button></h1>
                    <div class="card" style="margin-top: 30px;border-style: none;">
                        <div class="card-body" style="color: #3B3B3B;">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-9 col-xxl-9" style="border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding-top: 12px;padding-bottom: 12px;">
                                            <div class="container d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="padding-right: 0px;padding-left: 0px;">
                                                
                                <form class="d-xl-flex align-items-xl-center ml-4" style="width: 100vh;">
        <button class="btn btn-primary" type="button" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px; width:50px; height: 45px; background-color: #e8e8e8; border-style: none;"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-20.png" style="width: 20px;"></button><input class="form-control" type="search" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px; background: #e8e8e8;margin-right: 20px; border-style: none; height: 45px; width: 100vh;" />
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
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">TITLE</th>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">CATEGORY</th>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">START DATE</th>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">END DATE</th>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">STATUS</th>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="align-middle" style="height: 72px;">
                                                                        <td> <input type="checkbox"></td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/07/2022 Weather Arrangement</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Emegency notification</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">16/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #4CBC9A;font-weight: 400;">Active</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                            <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-1">
                                                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                                </svg></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="align-middle" style="height: 72px;">
                                                                        <td> <input type="checkbox"></td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/07/2022 Weather Arrangement</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Emegency notification</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">16/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #7A7A7A;font-weight: 400;">Draft</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                            <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-1">
                                                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                                </svg></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="align-middle" style="height: 72px;">
                                                                        <td> <input type="checkbox"></td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/07/2022 Weather Arrangement</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Emegency notification</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">16/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #4CBC9A;font-weight: 400;">Active</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                            <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-1">
                                                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                                </svg></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="align-middle" style="height: 72px;">
                                                                        <td> <input type="checkbox"></td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/07/2022 Weather Arrangement</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Emegency notification</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">16/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #4CBC9A;font-weight: 400;">Active</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                            <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-1">
                                                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                                </svg></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="align-middle" style="height: 72px;">
                                                                        <td> <input type="checkbox"></td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/07/2022 Weather Arrangement</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Emegency notification</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">16/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #4CBC9A;font-weight: 400;">Active</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                            <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-1">
                                                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                                </svg></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="align-middle" style="height: 72px;">
                                                                        <td> <input type="checkbox"></td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/07/2022 Weather Arrangement</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Emegency notification</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">16/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #4CBC9A;font-weight: 400;">Active</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                            <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-1">
                                                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                                </svg></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="align-middle" style="height: 72px;">
                                                                        <td> <input type="checkbox"></td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/07/2022 Weather Arrangement</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Emegency notification</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">16/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #4CBC9A;font-weight: 400;">Active</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                            <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-1">
                                                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                                </svg></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="align-middle" style="height: 72px;">
                                                                        <td> <input type="checkbox"></td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/07/2022 Weather Arrangement</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Emegency notification</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">16/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #4CBC9A;font-weight: 400;">Active</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                            <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-1">
                                                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                                </svg></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="align-middle" style="height: 72px;">
                                                                        <td> <input type="checkbox"></td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/07/2022 Weather Arrangement</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Emegency notification</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">16/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #4CBC9A;font-weight: 400;">Active</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                            <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-1">
                                                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                                </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                                </svg></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="align-middle" style="height: 72px;">
                                                                        <td> <input type="checkbox"></td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/07/2022 Weather Arrangement</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Emegency notification</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">16/4/2022</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #4CBC9A;font-weight: 400;">Active</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                            <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-1">
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
                                                <h1 style="color: #3B3B3B;font-size: 1.4vw;font-family: Poppins, sans-serif;font-weight: 500;margin-top: 20px;text-align: center;">Announcement</h1>
                                            </div>
                                            <div style="margin-top: 20px;">
                                                <h1 style="color: #3B3B3B;font-size: 1.1vw;font-family: Poppins, sans-serif;font-weight: 500;padding-left: 10px;">INFORMATION</h1>
                                                <div>
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Status</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #4CBC9A;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Sent out</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Title</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">12/07/2022 VSA Temporary Closure</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Category</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Emergency notification</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Start Date</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">12/4/2022</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4" style="margin-left: 50px;">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">End Date</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">16/4/2022</h1>
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
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="color: #3B3B3B;font-size: 24px;font-family: Poppins, sans-serif;font-weight: 500;">Notification - Temporary Closure</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col">
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Title</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Venue</h1><select class="form-control" id="notificationType" style="height: 48px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
    <option hidden>Select notification type</option>
    <option value="allStudents">All student</option>
    <option value="byCourse">By Course</option>
    <option value="byClass">By Class</option>
    <option value="individual">Individual</option>
</select>
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Facility</h1><select class="form-control" id="notificationType" style="height: 48px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
    <option hidden>Select facility
    </option>
    <option value="allStudents">ALL</option>
    <option value="byCourse">VSA Main Pool</option>
    <option value="byClass">VSA Public Pool</option>
    <option value="individual">VSA Todlers Pool</option>
</select>
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Send Via</h1>
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                            <div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Via Email</label></div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Via App</label></div>
                                        </div>
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Category</h1><select class="form-control" style="height: 48px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
    <option hidden>Select category</option>
    <option value>Coach Absent</option>
    <option value>Student Abesnt</option>
    <option value>Class Cancel</option>
    <option value>Class Migration</option>
    <option value>Emergency</option>
    <option value>Customize</option>
</select>
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Content</h1><textarea style="width: 100%;height: 143px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;"></textarea>
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Schedule Notification to send</h1>
                                        <div class="input-group d-xxl-flex mb-4" style="width: 300px;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border: 2px none #4A5C7A;margin-bottom: 0px !important;"><input class="form-control" type="time" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"></div>
                                        <div class="form-check" style="margin-top: 10px;"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Publish Immediately</label></div>
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Remarks</h1><textarea style="width: 100%;height: 143px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;"></textarea>
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Status</h1>
                                        <form class="form-inline">
                                            <div class="form-group"><select class="form-control" style="height: 48px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
    <option hidden>Select Status</option>
    <option value>Active</option>
    <option value>Published</option>
    <option value>Unpublished</option>
</select></div>
                                        </form>
                                    </div>
                                    <div>
                                        <div style="width: 177px;height: 115px;padding: 20px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;text-align: center;margin-top: 10px;border: 1px dashed #4A5C7A;border-bottom-width: 1px;"><button class="btn btn-primary" type="button" style="width: 40px;height: 40px;background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg" style="color: #4A5C7A;">
                                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                                </svg></button>
                                            <h1 style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;margin-top: 10px;">Attachment</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-xxl-flex justify-content-between align-items-xxl-center" style="border-top-style: none;"><button class="btn btn-light" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;" data-bs-toggle="modal" data-bs-target="#modal-1">Close</button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;box-shadow: 0px 5px 0px #273040;" data-bs-toggle="modal" data-bs-target="#modal-1">Save</button></div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-2">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content"><div class="modal-header" style="border-bottom-style: none;">
    <h4 class="modal-title" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;font-weight: 500;">Delete Category</h4>
</div>
                            <div class="modal-body">
                                <div class="col">
                                    <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Are you sure to delete this video?</h1>
                                </div>
                            </div>
                            <div class="modal-footer d-xxl-flex justify-content-between align-items-xxl-center" style="border-top-style: none;"><button class="btn btn-light text-nowrap" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;" data-bs-toggle="modal" data-bs-target="#modal-2">No, thanks.</button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #FF4550;border-style: none;border-color: #E8E8E8;margin-left: 20px;" data-bs-toggle="modal" data-bs-target="#modal-2">Delete</button></div>
                        </div>
                    </div>
                </div>

    @endsection