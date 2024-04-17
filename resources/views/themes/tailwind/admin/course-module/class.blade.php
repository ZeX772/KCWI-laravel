@extends('theme::layouts.app')


@section('content')
 <div class="main-contents">
                   <div class="row g-0 d-xxl-flex justify-content-between">
                        <div class="col-auto d-xxl-flex align-items-xxl-center">
                            <h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;">Course Management</h1>
                            <h1 style="color: #7A7A7A;font-size: 36px;font-family: Poppins, sans-serif;margin-left: 20px;">#{{ $course_package->course->course_name }}</h1>
                        </div>
                        <div class="col-auto">
    <button class="btn btn-primary text-nowrap d-flex align-items-center" type="button" style="background: #4A5C7A;box-shadow: 0px 4px rgb(40,51,68);border-style: none;border-bottom-style: none;border-bottom-color: rgb(29,44,88);" data-bs-toggle="modal" data-bs-target="#modal-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="margin-right: 12px;">
            <path d="M12 4C11.4477 4 11 4.44772 11 5V11H5C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13H11V19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19V13H19C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11H13V5C13 4.44772 12.5523 4 12 4Z" fill="currentColor"></path>
        </svg>
        Add Class
    </button>
</div>

                    </div>
                    <div class="row d-xxl-flex" style="text-align: left;">
                        <div class="col d-xxl-flex justify-content-xxl-start" style="border-bottom: 1px solid #E8E8E8;">
                            <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-end" role="tablist" style="border-style: none;border-left-style: none;">
                                <li class="nav-item" role="presentation" style="border-left-style: none;"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1" style="border-style: none;border-left-style: none;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 600;color: #7A7A7A;">ALL</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;width: 100%;">
                            <div class="tab-content" style="padding: 15px;">
                                <div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                                    @foreach($classes as $class)
                                    <div class="col d-xxl-flex justify-content-between align-items-xxl-center" style="padding-top: 10px;padding-bottom: 10px;">
                                        <div class="d-xxl-flex align-items-xxl-center">
                                            <h1 class="fw-normal text-nowrap d-xxl-flex" style="color: #3B3B3B;font-size: 20px;font-family: Poppins, sans-serif;">{{ $class->class_name }}</h1><button class="btn btn-primary" type="button" style="padding: 0px;padding-right: 5px;padding-left: 5px;background: rgb(255,255,255);color: #3B3B3B;border-style: none;border-bottom-style: none;box-shadow: 1px 1px 4px 1px;margin-left: 15px;" data-bs-toggle="modal" data-bs-target="#modal-1"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                                </svg></button><button class="btn btn-primary" type="button" style="padding: 0px;padding-right: 12px;padding-left: 12px;background: rgb(255,255,255);color: #4CBC9A;box-shadow: 0px 3px 0px 0px #E8E8E8;margin-left: 50px;padding-top: 6px;padding-bottom: 6px;border-style: solid;border-color: #E8E8E8;">Active</button>
                                        </div>
                                        <div> <i class="fas fa-chevron-down"></i></div>
                                    </div>
                                    <div class="col d-xxl-flex justify-content-between align-items-xxl-center">
                                        <div>
                                            <div class="col d-xxl-flex align-items-xxl-center">
                                                <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: bold;">Date:</h1>
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-left: 10px;">{{ $class->class_date }}</h1>
                                            </div>
                                            <div class="col d-xxl-flex align-items-xxl-center">
                                                <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: bold;">Time:</h1>
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-left: 10px;">{{ $class->class_start }} - {{ $class->class_end }}</h1>
                                            </div>
                                            <div class="col d-xxl-flex align-items-xxl-center">
                                                <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: bold;">Student Total:</h1>
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-left: 10px;">8/8</h1>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col d-xxl-flex align-items-xxl-center">
                                                <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: bold;">Venue:</h1>
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-left: 10px;">{{ $course_package->schoolVenue->name }}</h1>
                                            </div>
                                            <div class="col d-xxl-flex align-items-xxl-center">
                                                <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: bold;">Facility:</h1>
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-left: 10px;">{{ $course_package->schoolVenueFacility->name }}</h1>
                                            </div>
                                            <div class="col d-xxl-flex align-items-xxl-center">
                                                <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: bold;">Level:</h1>
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-left: 10px;">{{ $course_package->course->level->name }}</h1>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col d-xxl-flex align-items-xxl-start">
                                                <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: bold;">Coach:</h1>
                                                <div>
                                                    @foreach($coaches as $coach)
                                                    <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-left: 10px;">Coach {{ $coach->coachDetail->name }} (Present)</h1>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col d-xxl-flex align-items-xxl-center">
                                                <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;font-weight: bold;">Remark:</h1>
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-left: 10px;">{{ $course_package->course->course_remark }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="table-responsive d-xxl-flex">
                                            <table class="table">
                                                <thead>
                                                    <tr style="border-bottom: 1px solid #E8E8E8;">
                                                        <th class="fw-semibold" style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">STUDENT</th>
                                                        <th style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">STUDENT ID</th>
                                                        <th style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">PHONE</th>
                                                        <th style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">EMAIL</th>
                                                        <th style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">GENDER</th>
                                                        <th style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">DATE OF BIRTH (AGE)</th>
                                                        <th style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">ATTENDANCE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;text-decoration: underline;">Jacob Ng</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">C100431</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">6999 9999</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">example@mail.com</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Female</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">12/4/2016 (6yo)</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Present</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;text-decoration: underline;">Chris Wong</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">C100432</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">6999 9999</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">example@mail.com</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Male</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">12/4/2016 (6yo)</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Present</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;text-decoration: underline;">Ali Pai</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">C100433</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">6999 9999</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">example@mail.com</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Male</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">12/4/2016 (6yo)</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Present</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;text-decoration: underline;">Peter Kam</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">C100434</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">6999 9999</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">example@mail.com</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Male</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">12/4/2016 (6yo)</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Present</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;text-decoration: underline;">William Lau</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">C100435</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">6999 9999</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">example@mail.com</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Female</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">12/4/2016 (6yo)</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Present</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;text-decoration: underline;">Marco Lam</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">C100462</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">6999 9999</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">example@mail.com</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Male</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">12/4/2016 (6yo)</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Present</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;text-decoration: underline;">Sally Yeung</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">C100423</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">6999 9999</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">example@mail.com</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Female</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">12/4/2016 (6yo)</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Present</td>
                                                    </tr>
                                                    <tr style="height: 74px;border-bottom: 1px solid #E8E8E8;">
                                                        <td class="text-start align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;text-decoration: underline;">David Cheung</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">C100423</td>
                                                        <td class="align-middle" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">6999 9999</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">example@mail.com</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Male</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">12/4/2016 (6yo)</td>
                                                        <td style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" class="align-middle">Present</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="border-bottom-style: none;">
                                                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Edit Class</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col" style="width: 100%;">
                                                    <div class="container" style="padding: 0px;color: #636363;">
                                                        <div class="d-xxl-flex align-items-xxl-center">
                                                            <div class="col" style="margin-right: 10px;">
                                                                <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Date</label>
                                                                        <div class="input-group mb-4"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                                    <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                                                                </svg></span><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;height: 48px;"></div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col" style="margin-right: 10px;margin-left: 10px;">
                                                                <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Start time</label>
                                                                        <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                                    <path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
                                                                                </svg></span><input class="form-control form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;font-size: 14px;font-family: Poppins, sans-serif;height: 48px;"></div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col" style="margin-left: 10px;"><label class="form-label" style="color: #636363;font-size: 14px;">End time</label>
                                                                <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                            <path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
                                                                        </svg></span><input class="form-control form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;font-size: 14px;font-family: Poppins, sans-serif;height: 48px;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;">
                                                        <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                                            <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Venue</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                                                    <option value="">VSA</option>
                                                                    <option value="">GSH</option>
                                                                </select></div>
                                                        </form>
                                                        <form class="form-inline" style="width: 100%;margin-left: 10px;">
                                                            <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Facility</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                                                    <option value="">VSA Main pool</option>
                                                                    <option value="">VSA Public Pool</option>
                                                                    <option value="">VSA Teaching pool </option>
                                                                    <option value="">VSA Toddlers' pool </option>
                                                                </select></div>
                                                        </form>
                                                    </div>
                                                    <div class="container" style="padding: 0px;color: #636363;">
                                                        <form class="form-inline">
                                                            <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Assign Coach</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" data-role="tagsinput" data-class="label-info">
                                                                    <option value="">Coach Ng</option>
                                                                    <option value="">Coach Chan</option>
                                                                    <option value="">Coach Lee</option>
                                                                    <option value="">Coach Cheung</option>
                                                                    <option value="">Coach Wong</option>
                                                                    <option value="">Coach Ho</option>
                                                                    <option value="">Intermediate 2</option>
                                                                    <option value="">Coach Leung</option>
                                                                    <option value="">Coach Law</option>
                                                                </select><input class="form-control" type="text" data-role="tagsinput" data-class="label-info" style="border-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;border-left-style: none;"></div>
                                                        </form>
                                                    </div>
                                                    <div class="container" style="padding: 0px;color: #636363;">
                                                        <form class="form-inline">
                                                            <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Students</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" data-role="tagsinput" data-class="label-info">
                                                                    <option value="">Brother Ng / C100432 / B2</option>
                                                                    <option value="">Brother Chan / C100432 / B2</option>
                                                                    <option value="">Brother Lee / C100432 / B2</option>
                                                                    <option value="">Brother Cheung / C100432 / B2</option>
                                                                    <option value="">Brother Wong / C100432 / B2</option>
                                                                    <option value="">Brother Ho / C100432 / B2</option>
                                                                    <option value="">Brother Leung / C100432 / B2</option>
                                                                    <option value="">Brother Law / C100432 / B2</option>
                                                                </select><input class="form-control" type="text" data-role="tagsinput" data-class="label-info" style="border-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;border-left-style: none;"></div>
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
                                <div class="modal fade" role="dialog" tabindex="-1" id="modal-2">
                                    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="border-bottom-style: none;">
                                                <h4 class="modal-title fw-semibold" style="font-size: 18px;color: #3B3B3B;font-family: Poppins, sans-serif;">Add Class</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col" style="width: 100%;">
                                                    <div class="container" style="padding: 0px;color: #636363;">
                                                        <div class="col">
                                                            <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                                                <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Date</label>
                                                                    <div class="input-group mb-4"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                                <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                                                            </svg></span><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;height: 48px;"></div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="d-xxl-flex align-items-xxl-center">
                                                            <div class="col" style="margin-right: 10px;">
                                                                <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Start time</label>
                                                                        <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                                    <path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
                                                                                </svg></span><input class="form-control form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;font-size: 14px;font-family: Poppins, sans-serif;height: 48px;"></div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col" style="margin-left: 10px;"><label class="form-label" style="color: #636363;font-size: 14px;">End time</label>
                                                                <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                            <path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
                                                                        </svg></span><input class="form-control form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;font-size: 14px;font-family: Poppins, sans-serif;height: 48px;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="container" style="padding: 0px;color: #636363;">
                                                        <form class="form-inline">
                                                            <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Assign Coach</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" data-role="tagsinput" data-class="label-info">
                                                                    <option value="">Coach Ng</option>
                                                                    <option value="">Coach Chan</option>
                                                                    <option value="">Coach Lee</option>
                                                                    <option value="">Coach Cheung</option>
                                                                    <option value="">Coach Wong</option>
                                                                    <option value="">Coach Ho</option>
                                                                    <option value="">Intermediate 2</option>
                                                                    <option value="">Coach Leung</option>
                                                                    <option value="">Coach Law</option>
                                                                </select><input class="form-control" type="text" data-role="tagsinput" data-class="label-info" style="border-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;border-left-style: none;"></div>
                                                        </form>
                                                    </div>
                                                    <div class="container d-xxl-flex flex-column justify-content-between" style="padding: 0px;color: #636363;">
                                                        <form class="form-inline" style="width: 100%;margin-right: 10px;">
                                                            <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Venue</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                                                    <option value="">VSA</option>
                                                                    <option value="">GSH</option>
                                                                </select></div>
                                                        </form>
                                                        <form class="form-inline" style="width: 100%;">
                                                            <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Facility</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                                                    <option value="">VSA Main pool</option>
                                                                    <option value="">VSA Public Pool</option>
                                                                    <option value="">VSA Teaching pool </option>
                                                                    <option value="">VSA Toddlers' pool </option>
                                                                </select></div>
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
                    </div>
                </div>
    @endsection