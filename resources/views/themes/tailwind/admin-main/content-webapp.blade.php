 @extends('theme::layouts.app')


@section('content')
<div style="height: 100vh;background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;padding: 20px;">
                    <div class="d-xl-flex justify-content-between align-items-xl-center">
                        <h1 style="font-family: Poppins, sans-serif;font-size: 2vw;color: #3B3B3B;" class="titles">Content - Web/APP - Urgent News </h1><button class="btn btn-primary" id="updateButton" type="button" style="display: inline;color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 15vw;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;" data-bs-toggle="modal" data-bs-target="#modal-1">Update Urgent News</button>
                    </div>
                    <ul class="nav nav-tabs text-end d-xl-flex d-xxl-flex justify-content-xl-start justify-content-xxl-start" role="tablist" style="border-style: none;border-left-style: none;">
                        <li class="nav-item" id="t1" role="presentation" style="border-left-style: none;"><a class="nav-link active text-uppercase tablink" role="tab" data-bs-toggle="tab" href="#tab-1" style="font-size: 1.3vh;border-style: none;border-bottom-style: none;color: #7A7A7A;">Urgent News</a></li>
                        <li class="nav-item" id="t2" role="presentation"><a class="nav-link text-uppercase d-xl-flex tablink" role="tab" data-bs-toggle="tab" href="#tab-2" style="font-size: 1.3vh;border-style: none;border-bottom-style: none;color: #7A7A7A;line-height: 21.06px;">News</a></li>
                        <li class="nav-item" id="t3" role="presentation"><a class="nav-link text-uppercase tablink" role="tab" data-bs-toggle="tab" href="#tab-3" style="font-size: 1.3vh;border-style: none;border-bottom-style: none;color: #7A7A7A;">Level Information</a></li>
                        <li class="nav-item" id="t4" role="presentation"><a class="nav-link text-uppercase tablink" role="tab" data-bs-toggle="tab" href="#tab-4" style="font-size: 1.3vh;border-style: none;border-bottom-style: none;color: #7A7A7A;">Schedule</a></li>
                        <li class="nav-item" id="t5" role="presentation"><a class="nav-link text-uppercase tablink" role="tab" data-bs-toggle="tab" href="#tab-5" style="font-size: 1.3vh;border-style: none;border-bottom-style: none;color: #7A7A7A;">Policy</a></li>
                        <li class="nav-item" id="t-6" role="presentation"><a class="nav-link text-uppercase tablink" role="tab" data-bs-toggle="tab" href="#tab-6" style="font-size: 1.3vh;border-style: none;border-bottom-style: none;color: #7A7A7A;">Special Events</a></li>
                    </ul>
                    <div class="card" style="margin-top: 30px;">
                        <div class="card-body" style="color: #3B3B3B;">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="col">
                                        <div>
                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" data-bs-toggle="modal" data-bs-target="#modal-1">
                                                <h1 style="color: #3B3B3B;font-size: 24px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;">Urgent News</h1>
                                                <form class="form-inline">
                                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center form-group" style="margin-left: 47px;">
                                                        <h1 style="color: #3B3B3B;font-size: 16px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;">Status:</h1><select class="form-control" style="margin-left: 20px;color: #4CBC9A;width: 120px;height: 36px;background: #F5F5F5;border-style: none;">
                                                            <option value="">On</option>
                                                            <option value="">Off</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                            <div style="margin-top: 20px;">
                                                <h1 style="color: #303972;font-size: 20px;font-weight: 500;">Suspended Classes</h1>
                                                <h1 style="color: #303972;font-size: 14px;font-weight: 400;font-family: Poppins, sans-serif;">All swimming classes will be suspended from 7 Jan until further notice. We shall keep you updated for the resumption of our swimming classes via emails and social media regularly.</h1>
                                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                    <h1 style="color: #7A7A7A;font-size: 14px;font-weight: 400;font-family: Poppins, sans-serif;">Publish Date &amp; Time:</h1>
                                                    <h1 style="color: #303972;font-size: 14px;font-weight: 400;font-family: Poppins, sans-serif;margin-left: 12px;"><span style="color: rgba(0, 0, 0, 0.9);">06/01/2022 08:25</span></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div style="margin-top: 20px;">
                                            <div class="d-xxl-flex align-items-xxl-center">
                                                <h1 style="color: #3B3B3B;font-size: 24px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;">Past News</h1>
                                            </div>
                                            <div style="margin-top: 20px;">
                                                <h1 style="color: #303972;font-size: 20px;font-weight: 500;">News Title</h1>
                                                <h1 style="color: #303972;font-size: 14px;font-weight: 400;font-family: Poppins, sans-serif;">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently.<br><br>Lorem Ipsum passages, and more recently</h1>
                                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                    <h1 style="color: #7A7A7A;font-size: 14px;font-weight: 400;font-family: Poppins, sans-serif;">Publish Date &amp; Time:</h1>
                                                    <h1 style="color: #303972;font-size: 14px;font-weight: 400;font-family: Poppins, sans-serif;margin-left: 12px;"><span style="color: rgba(0, 0, 0, 0.9);">06/01/2022 08:25</span></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 20px;">
                                            <div class="d-xxl-flex align-items-xxl-center">
                                                <h1 style="color: #3B3B3B;font-size: 24px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;">Past News</h1>
                                            </div>
                                            <div style="margin-top: 20px;">
                                                <h1 style="color: #303972;font-size: 20px;font-weight: 500;">News Title</h1>
                                                <h1 style="color: #303972;font-size: 14px;font-weight: 400;font-family: Poppins, sans-serif;">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently.<br><br>Lorem Ipsum passages, and more recently</h1>
                                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                    <h1 style="color: #7A7A7A;font-size: 14px;font-weight: 400;font-family: Poppins, sans-serif;">Publish Date &amp; Time:</h1>
                                                    <h1 style="color: #303972;font-size: 14px;font-weight: 400;font-family: Poppins, sans-serif;margin-left: 12px;"><span style="color: rgba(0, 0, 0, 0.9);">06/01/2022 08:25</span></h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 20px;">
                                            <div class="d-xxl-flex align-items-xxl-center">
                                                <h1 style="color: #3B3B3B;font-size: 24px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;">Past News</h1>
                                            </div>
                                            <div style="margin-top: 20px;">
                                                <h1 style="color: #303972;font-size: 20px;font-weight: 500;">News Title</h1>
                                                <h1 style="color: #303972;font-size: 14px;font-weight: 400;font-family: Poppins, sans-serif;">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently.<br><br>Lorem Ipsum passages, and more recently</h1>
                                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                    <h1 style="color: #7A7A7A;font-size: 14px;font-weight: 400;font-family: Poppins, sans-serif;">Publish Date &amp; Time:</h1>
                                                    <h1 style="color: #303972;font-size: 14px;font-weight: 400;font-family: Poppins, sans-serif;margin-left: 12px;"><span style="color: rgba(0, 0, 0, 0.9);">06/01/2022 08:25</span></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane" role="tabpanel">
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">

                                        <form class="d-xl-flex align-items-xl-center ml-4 w-100" style="width: 100vh;">
        <button class="btn btn-primary" type="button" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px; width:50px; height: 45px; background-color: #e8e8e8; border-style: none;"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-20.png" style="width: 20px;"></button><input class="form-control" type="search" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px; background: #e8e8e8; border-style: none; height: 45px; width: 100vh;" placeholder="Search (Title / Category)" />
    </form>


                                        <button class="btn btn-primary d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center" type="button" style="width: 130px;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 14px;margin-left: 20px;">Actions<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-down" style="margin-left: 13px;">
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
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">PHOTO</th>
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">TITLE</th>
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">UPLOAD DATE</th>
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">UPLOAD TIME</th>
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">STATUS</th>
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-51.png" style="width: 50px;"></div>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Hong Kong swimming legend Alex Fong to lead...</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11:30</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-22">
                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                        </svg></div>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-51.png" style="width: 50px;"></div>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Hong Kong swimming legend Alex Fong to lead...</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11:30</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-22">
                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                        </svg></div>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-51.png" style="width: 50px;"></div>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Hong Kong swimming legend Alex Fong to lead...</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11:30</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-22">
                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                        </svg></div>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-51.png" style="width: 50px;"></div>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Hong Kong swimming legend Alex Fong to lead...</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11:30</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-22">
                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                        </svg></div>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-51.png" style="width: 50px;"></div>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Hong Kong swimming legend Alex Fong to lead...</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11:30</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-22">
                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                        </svg></div>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-51.png" style="width: 50px;"></div>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Hong Kong swimming legend Alex Fong to lead...</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11:30</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-22">
                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                        </svg></div>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-51.png" style="width: 50px;"></div>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Hong Kong swimming legend Alex Fong to lead...</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11:30</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-22">
                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                        </svg></div>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-51.png" style="width: 50px;"></div>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Hong Kong swimming legend Alex Fong to lead...</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">12/4/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">11:30</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                    <div class="d-xxl-flex justify-content-around align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-2">
                                                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-22">
                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                        </svg></div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center">
                                                    <h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">Showing 1 - 10 of 100</h1>
                                                    <div><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: #F5F5F5;border-style: none;border-color: #E8E8E8;margin-left: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-double-left" style="color: #7A7A7A;">
                                                                <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                                <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                            </svg></button><button class="btn btn-primary" type="button" style="color: #7A7A7A;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: #F5F5F5;border-style: none;border-color: #E8E8E8;margin-left: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-left">
                                                                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                            </svg></button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 5px;">1</button><button class="btn btn-primary" type="button" style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: rgba(74,92,122,0);border-style: none;border-color: #E8E8E8;margin-left: 5px;">2</button><button class="btn btn-primary" type="button" style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: rgba(74,92,122,0);border-style: none;border-color: #E8E8E8;margin-left: 5px;">3</button><button class="btn btn-primary" type="button" style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: rgba(74,92,122,0);border-style: none;border-color: #E8E8E8;margin-left: 5px;">...</button><button class="btn btn-primary" type="button" style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: rgba(74,92,122,0);border-style: none;border-color: #E8E8E8;margin-left: 5px;">5</button><button class="btn btn-primary" type="button" style="color: #7A7A7A;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: #F5F5F5;border-style: none;border-color: #E8E8E8;margin-left: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-right">
                                                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                                            </svg></button><button class="btn btn-primary" type="button" style="color: #7A7A7A;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: #F5F5F5;border-style: none;border-color: #E8E8E8;margin-left: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-double-right">
                                                                <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                                                <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                                            </svg></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-3" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-9 col-xxl-9">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h1 class="d-xxl-flex justify-content-xxl-end" style="text-align: right;"><button class="btn btn-primary d-xxl-flex justify-content-around align-items-xxl-center" type="button" style="width: 130px;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 14px;margin-left: 20px;">Actions<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-down">
                                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                                            </svg></button></h1>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th><input type="checkbox"></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">COURSE LEVEL</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">CLASS SIZE</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">AGE</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">COURSE CATEGORY</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">STATUS</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">18 months to 3 years and 11 months</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Group</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-3">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-221">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">18 months to 3 years and 11 months</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Group</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-3">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-221">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">18 months to 3 years and 11 months</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Group</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-3">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-221">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">18 months to 3 years and 11 months</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Group</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-3">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-221">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">18 months to 3 years and 11 months</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Group</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-3">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-221">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">18 months to 3 years and 11 months</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Group</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-3">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-221">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">18 months to 3 years and 11 months</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Group</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-3">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-221">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="container d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center">
                                                        <h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">Showing 1 - 10 of 10</h1><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;">1</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.4vw;color: #3B3B3B;font-weight: 500;text-align: center;">Course</h1>
                                            <div style="margin-top: 20px;">
                                                <h1 style="color: #3B3B3B;font-size: 1.1vw;font-family: Poppins, sans-serif;font-weight: 500;">INFORMATION</h1>
                                                <div>
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Status</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #4CBC9A;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Active</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Course Level</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Ripplet Starter 2</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Class Size </h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">8</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Age</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">18 months to 3 years and 11 months</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Prerequisite</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">None</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Characteristics</h1>
                                                            </div>
                                                            <div class="col">
                                                                <ul>
                                                                    <li style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Parent and child bonding</li>
                                                                    <li style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Repeat and practice child submersion and floatation towards the pool wall</li>
                                                                    <li style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Build on water confidence</li>
                                                                    <li style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Teach unaided swimming from 1-3 metres</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Course&nbsp;<br>Category</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Group</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Remark</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">-</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Modified by</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Admin</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
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
                                <div id="tab-4" class="tab-pane">
                                    <div class="row">
                                        <div class="col-xl-9 col-xxl-9">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div>
                                                        <form class="d-xl-flex align-items-xl-center ml-4 w-100" style="width: 100vh;">
        <button class="btn btn-primary" type="button" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px; width:50px; height: 45px; background-color: #e8e8e8; border-style: none;"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-20.png" style="width: 20px;"></button><input class="form-control" type="search" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px; background: #e8e8e8; border-style: none; height: 45px; width: 100vh;" placeholder="Search (Title / Category)" />
    </form>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th><input type="checkbox"></th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">COURSE CODE</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">COURSE LEVEL</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">CLASS SIZE</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">VENUE</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">TOTAL FEE (HK$)</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">COACH(ES)</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 1.2vh;font-weight: 700;">STATUS</th>
                                                                    <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS2-0001</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-4">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-222">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS2-0001</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-4">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-222">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS2-0001</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-4">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-222">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS2-0001</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-4">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-222">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS2-0001</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-4">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-222">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS2-0001</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-4">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-222">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="align-middle" style="height: 72px;">
                                                                    <td> <input type="checkbox"></td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA-RS2-0001</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Ripplet Starter 2</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">8</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #3B3B3B;font-weight: 400;">Coach Ng</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #4CBC9A;font-weight: 400;">Published</td>
                                                                    <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">
                                                                        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil" style="width: 20px;height: 20px;margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#modal-4">
                                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-trash" style="width: 20px;height: 20px;" data-bs-toggle="modal" data-bs-target="#modal-222">
                                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                                                            </svg></div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="container d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center">
                                                        <h1 style="font-family: Poppins, sans-serif;font-size: 1.2vh;color: #7A7A7A;font-weight: 400;">Showing 1 - 10 of 100</h1>
                                                        <div><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: #F5F5F5;border-style: none;border-color: #E8E8E8;margin-left: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-double-left" style="color: #7A7A7A;">
                                                                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                                </svg></button><button class="btn btn-primary" type="button" style="color: #7A7A7A;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: #F5F5F5;border-style: none;border-color: #E8E8E8;margin-left: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-left">
                                                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                                </svg></button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 5px;">1</button><button class="btn btn-primary" type="button" style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: rgba(74,92,122,0);border-style: none;border-color: #E8E8E8;margin-left: 5px;">2</button><button class="btn btn-primary" type="button" style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: rgba(74,92,122,0);border-style: none;border-color: #E8E8E8;margin-left: 5px;">3</button><button class="btn btn-primary" type="button" style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: rgba(74,92,122,0);border-style: none;border-color: #E8E8E8;margin-left: 5px;">...</button><button class="btn btn-primary" type="button" style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: rgba(74,92,122,0);border-style: none;border-color: #E8E8E8;margin-left: 5px;">5</button><button class="btn btn-primary" type="button" style="color: #7A7A7A;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: #F5F5F5;border-style: none;border-color: #E8E8E8;margin-left: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-right">
                                                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                                                </svg></button><button class="btn btn-primary" type="button" style="color: #7A7A7A;font-size: 15px;font-family: Poppins, sans-serif;width: 3vw;height: 3vw;background: #F5F5F5;border-style: none;border-color: #E8E8E8;margin-left: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-double-right">
                                                                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                                                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                                                </svg></button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h1 style="font-family: Poppins, sans-serif;font-size: 1.4vw;color: #3B3B3B;font-weight: 500;text-align: center;">Course</h1>
                                            <div style="margin-top: 20px;">
                                                <h1 style="color: #3B3B3B;font-size: 1.1vw;font-family: Poppins, sans-serif;font-weight: 500;">INFORMATION</h1>
                                                <div>
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Status</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #4CBC9A;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Published</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Course Level</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Ripplet Starter 2</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Class Size </h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">1:8</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Venue</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">VSA</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Fee (HK$)</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">1860</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Coach</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Coach Ng</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Date</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">4/2/2022, 11/2/2022, 18/2/2022, 25/2/2022</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Modified by</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Admin</h1>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-xxl-4">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Modified Date</h1>
                                                            </div>
                                                            <div class="col">
                                                                <h1 style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">1/2/2022 13:45</h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h1 style="color: #3B3B3B;font-size: 1.1vw;font-family: Poppins, sans-serif;font-weight: 500;">Setting</h1>
                                                    <div class="col">
                                                        <div class="row" style="padding-left: 34px;">
                                                            <div class="col">
                                                                <h1 class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="color: #636363;font-size: 0.8vw;font-weight: 400;font-family: Poppins, sans-serif;padding-top: 5px;padding-bottom: 5px;">Active/Hide<label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label></h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-5" class="tab-pane" role="tabpanel">
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Title</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Content</h1><textarea id="summernote-1" name="editordata"></textarea>
                                    </div>
                                    <div style="margin-top: 20px;"><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 5px 0px #273040;" data-bs-toggle="modal" data-bs-target="#modal-6">Save</button><button class="btn btn-light" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;margin-left: 20px;" data-bs-toggle="modal" data-bs-target="#modal-6">Cancel</button></div>
                                </div>
                                <div id="tab-6" class="tab-pane" role="tabpanel">
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Title</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Content</h1><textarea id="summernote" name="editordata"></textarea>
                                    </div>
                                    <div style="margin-top: 20px;"><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 5px 0px #273040;" data-bs-toggle="modal" data-bs-target="#modal-6">Save</button><button class="btn btn-light" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;margin-left: 20px;" data-bs-toggle="modal" data-bs-target="#modal-6">Cancel</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="border-style: none;">
                                <h4 class="modal-title" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;font-weight: 500;">Urgent News</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col">
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Title</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Content</h1><textarea id="summernote-2" name="editordata"></textarea>
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Schedule Notification to send</h1>
                                        <div class="input-group d-xxl-flex mb-4" style="width: 300px;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border: 2px none #4A5C7A;margin-bottom: 0px !important;"><input class="form-control" type="time" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"></div>
                                        <div class="form-check" style="margin-top: 10px;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Publish Immediately</label></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-xxl-flex justify-content-between align-items-xxl-center" style="border-top-style: none;"><button class="btn btn-light" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;" data-bs-toggle="modal" data-bs-target="#modal-1">Close</button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;box-shadow: 0px 5px 0px #273040;" data-bs-toggle="modal" data-bs-target="#modal-1">Save</button></div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-2">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="border-style: none;">
                                <h4 class="modal-title" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;font-weight: 500;">Add News</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col">
                                    <div style="text-align: center;"><img src="assets/img/clipboard-image-43.png" style="width: 120px;"><button class="btn btn-primary" type="button" style="background: #333333A3;position: absolute;transform: translateX(-85px) translateY(72px);border-style: none;border-bottom-style: none;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                            </svg></button></div>
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
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Title</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Content</h1><textarea id="summernote-3" name="editordata"></textarea>
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Schedule Notification to send</h1>
                                        <div class="input-group d-xxl-flex mb-4" style="width: 300px;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border: 2px none #4A5C7A;margin-bottom: 0px !important;"><input class="form-control" type="time" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"></div>
                                        <div class="form-check" style="margin-top: 10px;"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Publish Immediately</label></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-xxl-flex justify-content-between align-items-xxl-center" style="border-top-style: none;"><button class="btn btn-light" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;" data-bs-toggle="modal" data-bs-target="#modal-2">Close</button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;box-shadow: 0px 5px 0px #273040;" data-bs-toggle="modal" data-bs-target="#modal-2">Save</button></div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-3">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="border-style: none;">
                                <h4 class="modal-title" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;font-weight: 500;">Level Information</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col">
                                    <div style="padding: 0px 0px 0px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Name of Course Category</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Please select the Level</h1>
                                        <form class="form-inline">
                                            <div class="form-group"><select class="form-control" style="height: 48px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
    <option hidden>Select Level</option>
    <option value>Ripplet Starter 1</option>
    <option value>Ripplet Starter 2</option>
    <option value>Ripple Starter</option>
    <option value>Beginner 1</option>
    <option value>Beginner 2</option>
    <option value>Intermediate 1</option>
    <option value>Intermediate 2</option>
    <option value>Club Training</option>
    <option value>Adult (Non-Swimmer)</option>
    <option value>Others</option>
    
</select></div>
                                        </form>
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Characteristics</h1>
                                        <div class="card">
                                            <div class="card-body"><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                                <div style="margin-top: 15px;"><button class="btn btn-light" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;" data-bs-toggle="modal" data-bs-target="#modal-1">Cancel</button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;box-shadow: 0px 5px 0px #273040;" data-bs-toggle="modal" data-bs-target="#modal-1">Add</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #4A5C7A;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg">
                                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                            </svg>Add Characteristics</h1>
                                        <div class="d-xl-flex justify-content-between align-items-xl-center" style="height: 48px;border-radius: 8px;border: 1px solid #E8E8E8;padding-left: 12px;padding-right: 12px;margin-bottom: 10px;">
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">Parent and child bonding</h1><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg">
                                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                                            </svg>
                                        </div>
                                        <div class="d-xl-flex justify-content-between align-items-xl-center" style="height: 48px;border-radius: 8px;border: 1px solid #E8E8E8;padding-left: 12px;padding-right: 12px;margin-bottom: 10px;">
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">Repeat and practice child submersion and floatation towards the pool wall</h1><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg">
                                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                                            </svg>
                                        </div>
                                        <div class="d-xl-flex justify-content-between align-items-xl-center" style="height: 48px;border-radius: 8px;border: 1px solid #E8E8E8;padding-left: 12px;padding-right: 12px;margin-bottom: 10px;">
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">Build on water confidence</h1><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg">
                                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                                            </svg>
                                        </div>
                                        <div class="d-xl-flex justify-content-between align-items-xl-center" style="height: 48px;border-radius: 8px;border: 1px solid #E8E8E8;padding-left: 12px;padding-right: 12px;margin-bottom: 10px;">
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">Teach unaided swimming from 1-3 metres</h1><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg">
                                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="d-xl-flex align-items-xl-center" style="padding-top: 10px;">
                                        <div class="col">
                                            <div style="padding: 0px 0px 0px;margin-right: 5px;">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Class Size</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div style="padding: 0px 0px 0px;margin-left: 5px;">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Age</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-xl-flex align-items-xl-center" style="padding-top: 10px;">
                                        <div class="col">
                                            <div style="padding: 0px 0px 0px;margin-right: 5px;">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Duration</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div style="padding: 0px 0px 0px;margin-left: 5px;">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Cost&nbsp;&nbsp;(per class)</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding: 0px 0px 0px;margin-top: 10px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Prerequisite</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                    </div>
                                    <div style="padding-top: 10px;">
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
                                </div>
                            </div>
                            <div class="modal-footer d-xxl-flex justify-content-between align-items-xxl-center" style="border-top-style: none;"><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100%;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 5px 0px #273040;" data-bs-toggle="modal" data-bs-target="#modal-3">Save</button></div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-4">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="border-style: none;">
                                <h4 class="modal-title" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;font-weight: 500;">Schedule</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col">
                                    <div style="padding: 0px 0px 0px;margin-top: 10px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Please select the Course</h1><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 150px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 5px 0px #273040;" data-bs-toggle="modal" data-bs-target="#modal-77">Select Course</button>
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <div class="d-xl-flex justify-content-between align-items-xl-center" style="height: 48px;border-radius: 8px;border: 1px solid #E8E8E8;padding-left: 12px;padding-right: 12px;margin-bottom: 10px;">
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">VSA-RS2-0001 / Ripplet Starter 2 / VSA </h1><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg">
                                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div style="padding: 0px 0px 0px;margin-right: 5px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Time-slot description</h1><input type="text" style="width: 50%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                    </div>
                                    <div style="padding-top: 10px;">
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
                                    <div class="d-xl-flex align-items-xl-center" style="padding-top: 20px;">
                                        <div class="col">
                                            <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Schedule Notification to send</h1>
                                            <div class="input-group d-xxl-flex mb-4" style="width: 300px;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border: 2px none #4A5C7A;margin-bottom: 0px !important;"><input class="form-control" type="time" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"></div>
                                        </div>
                                        <div class="col">
                                            <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Schedule Notification to send</h1>
                                            <div class="input-group d-xxl-flex mb-4" style="width: 300px;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border: 2px none #4A5C7A;margin-bottom: 0px !important;"><input class="form-control" type="time" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-check" style="margin-top: 10px;"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Publish Immediately</label></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-xxl-flex justify-content-between align-items-xxl-center" style="border-top-style: none;"><button class="btn btn-light" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;" data-bs-toggle="modal" data-bs-target="#modal-4">Close</button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;box-shadow: 0px 5px 0px #273040;" data-bs-toggle="modal" data-bs-target="#modal-4">Add</button></div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-77">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <ul class="nav nav-tabs text-end d-xl-flex d-xxl-flex justify-content-xl-start justify-content-xxl-start" role="tablist" style="border-style: none;border-left-style: none;">
                                    <li class="nav-item" id="t-1" role="presentation" style="border-left-style: none;"><a class="nav-link active tablink" role="tab" data-bs-toggle="tab" href="#tab-1" style="font-size: 14px;border-style: none;border-bottom-style: none;color: #7A7A7A;">COURSE</a></li>
                                </ul>
                                <h1 style="font-size: 2vw;" class="titles">Course</h1>
                                <div class="col-xl-12 col-xxl-12" style="border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding-top: 12px;padding-bottom: 12px;margin-top: 30px;padding-right: 12px;padding-left: 12px;">
                                    <div class="container d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="padding-right: 0px;padding-left: 0px;">
                                        <form class="d-xl-flex align-items-xl-center ml-4 w-100" style="width: 100vh;">
        <button class="btn btn-primary" type="button" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px; width:50px; height: 45px; background-color: #e8e8e8; border-style: none;"><img src="http://127.0.0.1:8000/themes/tailwind/images/clipboard-image-20.png" style="width: 20px;"></button><input class="form-control" type="search" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px; background: #e8e8e8; border-style: none; height: 45px; width: 100vh;" placeholder="Search (Title / Category)" />
    </form><button class="btn btn-primary d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center" type="button" style="width: 130px;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;background: #F5F5F5;border-style: none;color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 14px;margin-left: 20px;">Level<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-down" style="margin-left: 13px;">
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
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">COURE CODE<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                    </svg></th>
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">LEVEL<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                    </svg></th>
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">VENUE<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                    </svg></th>
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">COACH&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                    </svg></th>
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">DATE</th>
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">TIME<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                    </svg></th>
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">TOTAL FEE (HK$)<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                    </svg></th>
                                                                <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">COURSE CATEGORY<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-caret-down-fill" style="margin-left: 5px;">
                                                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                                                    </svg></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA-B1-0001</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Ripple Starter 1</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 15px;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 13px;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">04/02/2022 -<br>02/04/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">08:00 - 09:00</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Group</td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA-B1-0001</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Ripple Starter 1</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 15px;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 13px;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">04/02/2022 -<br>02/04/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">08:00 - 09:00</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Group</td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA-B1-0001</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Ripple Starter 1</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 15px;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 13px;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">04/02/2022 -<br>02/04/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">08:00 - 09:00</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Group</td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA-B1-0001</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Ripple Starter 1</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 15px;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 13px;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">04/02/2022 -<br>02/04/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">08:00 - 09:00</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Group</td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA-B1-0001</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Ripple Starter 1</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 15px;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 13px;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">04/02/2022 -<br>02/04/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">08:00 - 09:00</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Group</td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA-B1-0001</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Ripple Starter 1</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 15px;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 13px;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">04/02/2022 -<br>02/04/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">08:00 - 09:00</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Group</td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA-B1-0001</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Ripple Starter 1</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 15px;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 13px;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">04/02/2022 -<br>02/04/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">08:00 - 09:00</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Group</td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA-B1-0001</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Ripple Starter 1</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 15px;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 13px;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">04/02/2022 -<br>02/04/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">08:00 - 09:00</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Group</td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA-B1-0001</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Ripple Starter 1</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 15px;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 13px;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">04/02/2022 -<br>02/04/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">08:00 - 09:00</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Group</td>
                                                            </tr>
                                                            <tr class="align-middle" style="height: 72px;">
                                                                <td> <input type="checkbox"></td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA-B1-0001</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Ripple Starter 1</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">VSA</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 15px;color: #3B3B3B;font-weight: 400;">Coach Ng<h1 style="font-family: Poppins, sans-serif;font-size: 13px;color: #7A7A7A;font-weight: 400;">6999 9999</h1>
                                                                </td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">04/02/2022 -<br>02/04/2022</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">08:00 - 09:00</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">1860</td>
                                                                <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Group</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="container d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center">
                                                    <h1 style="font-family: Poppins, sans-serif;font-size: 14px;color: #7A7A7A;font-weight: 400;">Showing 1 - 10 of 100</h1>
                                                    <div><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: #F5F5F5;border-style: none;border-color: #E8E8E8;margin-left: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-double-left" style="color: #7A7A7A;">
                                                                <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                                <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                            </svg></button><button class="btn btn-primary" type="button" style="color: #7A7A7A;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: #F5F5F5;border-style: none;border-color: #E8E8E8;margin-left: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-left">
                                                                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                            </svg></button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 5px;">1</button><button class="btn btn-primary" type="button" style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: rgba(74,92,122,0);border-style: none;border-color: #E8E8E8;margin-left: 5px;">2</button><button class="btn btn-primary" type="button" style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: rgba(74,92,122,0);border-style: none;border-color: #E8E8E8;margin-left: 5px;">3</button><button class="btn btn-primary" type="button" style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: rgba(74,92,122,0);border-style: none;border-color: #E8E8E8;margin-left: 5px;">...</button><button class="btn btn-primary" type="button" style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: rgba(74,92,122,0);border-style: none;border-color: #E8E8E8;margin-left: 5px;">5</button><button class="btn btn-primary" type="button" style="color: #7A7A7A;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: #F5F5F5;border-style: none;border-color: #E8E8E8;margin-left: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-right">
                                                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                                            </svg></button><button class="btn btn-primary" type="button" style="color: #7A7A7A;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: #F5F5F5;border-style: none;border-color: #E8E8E8;margin-left: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-double-right">
                                                                <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                                                <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                                            </svg></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-xxl-flex justify-content-between align-items-xxl-center" style="border-top-style: none;"><button class="btn btn-light" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;" data-bs-toggle="modal" data-bs-target="#modal-77">Close</button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;box-shadow: 0px 5px 0px #273040;" data-bs-toggle="modal" data-bs-target="#modal-77">Add</button></div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-55">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="border-style: none;">
                                <h4 class="modal-title" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;font-weight: 500;">Add News</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col">
                                    <div class="d-xl-flex align-items-xl-center">
                                        <div class="col">
                                            <div style="padding: 0px 0px 0px;margin-right: 5px;">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Level</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div style="padding: 0px 0px 0px;margin-left: 5px;">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Level Short Form</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding: 0px 0px 0px;margin-top: 10px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Age</h1><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Characteristics</h1>
                                        <div class="card">
                                            <div class="card-body"><input type="text" style="width: 100%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;">
                                                <div style="margin-top: 15px;"><button class="btn btn-light" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;" data-bs-toggle="modal" data-bs-target="#modal-1">Cancel</button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 20px;box-shadow: 0px 5px 0px #273040;" data-bs-toggle="modal" data-bs-target="#modal-1">Add</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding-top: 20px;">
                                        <h1 style="color: #4A5C7A;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg">
                                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                            </svg>Add Characteristics</h1>
                                        <div class="d-xl-flex justify-content-between align-items-xl-center" style="height: 48px;border-radius: 8px;border: 1px solid #E8E8E8;padding-left: 12px;padding-right: 12px;margin-bottom: 10px;">
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">Parent and child bonding</h1><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg">
                                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                                            </svg>
                                        </div>
                                        <div class="d-xl-flex justify-content-between align-items-xl-center" style="height: 48px;border-radius: 8px;border: 1px solid #E8E8E8;padding-left: 12px;padding-right: 12px;margin-bottom: 10px;">
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">Repeat and practice child submersion and floatation towards the pool wall</h1><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg">
                                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                                            </svg>
                                        </div>
                                        <div class="d-xl-flex justify-content-between align-items-xl-center" style="height: 48px;border-radius: 8px;border: 1px solid #E8E8E8;padding-left: 12px;padding-right: 12px;margin-bottom: 10px;">
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">Build on water confidence</h1><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg">
                                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                                            </svg>
                                        </div>
                                        <div class="d-xl-flex justify-content-between align-items-xl-center" style="height: 48px;border-radius: 8px;border: 1px solid #E8E8E8;padding-left: 12px;padding-right: 12px;margin-bottom: 10px;">
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;">Teach unaided swimming from 1-3 metres</h1><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-x-lg">
                                                <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"></path>
                                                <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div style="padding: 0px 0px 0px;margin-top: 10px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Represent Color (Will show in the timetable)</h1>
                                        <div><img src="assets/img/clipboard-image-32.png" style="width: 24px;margin-right: 5px;"><img src="assets/img/clipboard-image-33.png" style="width: 24px;margin-right: 5px;"><img src="assets/img/clipboard-image-34.png" style="width: 24px;margin-right: 5px;"><img src="assets/img/clipboard-image-35.png" style="width: 24px;margin-right: 5px;"><img src="assets/img/clipboard-image-36.png" style="width: 24px;margin-right: 5px;"><img src="assets/img/clipboard-image-37.png" style="width: 24px;margin-right: 5px;"><img src="assets/img/clipboard-image-38.png" style="width: 24px;margin-right: 5px;" width="24" height="24"><img src="assets/img/clipboard-image-39.png" style="width: 24px;margin-right: 5px;"><img src="assets/img/clipboard-image-40.png" style="width: 24px;margin-right: 5px;"><img src="assets/img/clipboard-image-41.png" style="width: 24px;margin-right: 5px;"><img src="assets/img/clipboard-image-42.png" style="width: 24px;margin-right: 5px;"></div>
                                    </div>
                                    <div style="padding-top: 10px;">
                                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Remarks</h1><textarea style="width: 100%;height: 143px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-xxl-flex justify-content-between align-items-xxl-center" style="border-top-style: none;"><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100%;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 5px 0px #273040;" data-bs-toggle="modal" data-bs-target="#modal-1">Save</button></div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-22">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content"><div class="modal-header" style="border-bottom-style: none;">
    <h4 class="modal-title" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;font-weight: 500;">Delete News</h4>
</div>
                            <div class="modal-body">
                                <div class="col">
                                    <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Are you sure to delete this news?</h1>
                                </div>
                            </div>
                            <div class="modal-footer d-xxl-flex justify-content-between align-items-xxl-center" style="border-top-style: none;"><button class="btn btn-light text-nowrap" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;" data-bs-toggle="modal" data-bs-target="#modal-22">No, thanks.</button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #FF4550;border-style: none;border-color: #E8E8E8;margin-left: 20px;" data-bs-toggle="modal" data-bs-target="#modal-22">Delete</button></div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-221">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content"><div class="modal-header" style="border-bottom-style: none;">
    <h4 class="modal-title" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;font-weight: 500;">Delete Level Info</h4>
</div>
                            <div class="modal-body">
                                <div class="col">
                                    <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Are you sure to delete this level information?</h1>
                                </div>
                            </div>
                            <div class="modal-footer d-xxl-flex justify-content-between align-items-xxl-center" style="border-top-style: none;"><button class="btn btn-light text-nowrap" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;" data-bs-toggle="modal" data-bs-target="#modal-22">No, thanks.</button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #FF4550;border-style: none;border-color: #E8E8E8;margin-left: 20px;" data-bs-toggle="modal" data-bs-target="#modal-22">Delete</button></div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-222">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content"><div class="modal-header" style="border-bottom-style: none;">
    <h4 class="modal-title" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;font-weight: 500;">Delete Schedule</h4>
</div>
                            <div class="modal-body">
                                <div class="col">
                                    <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Are you sure to delete this schedule?</h1>
                                </div>
                            </div>
                            <div class="modal-footer d-xxl-flex justify-content-between align-items-xxl-center" style="border-top-style: none;"><button class="btn btn-light text-nowrap" type="button" style="color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: rgba(74,92,122,0);border: 2px solid #E8E8E8;" data-bs-toggle="modal" data-bs-target="#modal-22">No, thanks.</button><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 100px;height: 48px;background: #FF4550;border-style: none;border-color: #E8E8E8;margin-left: 20px;" data-bs-toggle="modal" data-bs-target="#modal-22">Delete</button></div>
                        </div>
                    </div>
                </div>
    @endsection



    @section('script')
<script type="text/javascript">
    document.querySelectorAll('.tablink').forEach(tab => {
    tab.addEventListener('click', function (e) {
        e.preventDefault();
        const tabId = this.getAttribute('href').replace('#', '');
        const tabText = this.textContent;
        const button = document.getElementById('updateButton');
        const h1 = document.querySelector('h1.titles');
        const contentMap = {
            'tab-1': 'Urgent News',
            'tab-2': 'News',
            'tab-3': 'Level Information',
            'tab-4': 'Schedule',
            'tab-5': 'Policy',
            'tab-6': 'Special Events',
        };
        const modalMap = {
            'tab-1': 'modal-1',
            'tab-2': 'modal-2',
            'tab-3': 'modal-3',
            'tab-4': 'modal-4',
            'tab-5': 'modal-5',
            'tab-6': 'modal-6',
        };


        // Update the button text and functionality
        
        button.setAttribute('data-bs-target', `#${modalMap[tabId]}`);

        // Update the H1 title
        h1.textContent = `Content - Web/APP - ${contentMap[tabId]}`;

        // Conditional to hide the button for tabs 5 and 6
        if (tabId === 'tab-5' || tabId === 'tab-6') {
            button.style.display = 'none';
        } else {
            button.style.display = 'inline';
        }

        if(tabId === 'tab-2' || tabId === 'tab-3' || tabId === 'tab-4'){
            button.innerHTML = `<i class="fas fa-plus"></i> Add ${tabText}`;
        }else{
            button.innerHTML = `Update ${tabText}`;
        }
    });
});

    
</script>
       @endsection