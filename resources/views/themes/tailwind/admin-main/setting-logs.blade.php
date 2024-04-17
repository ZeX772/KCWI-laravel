 @extends('theme::layouts.app')


@section('content')
<div style="height: 100vh;background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;padding: 20px;">
                    <h1 class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center titles" style="font-size: 2vw;font-family: Poppins, sans-serif;color: #3B3B3B;">Setting - Logs</h1>
                    <div class="card" style="margin-top: 30px;border-style: none;">
                        <div class="card-body" style="color: #3B3B3B;">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-12 col-xxl-12" style="border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding-top: 12px;padding-bottom: 12px;">
                                            <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" style="width: 100%;background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;">
                                                <div class="input-group" style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><button class="btn btn-primary py-0" type="button" style="background: #e8e8e8;border-style: none;border-top-left-radius: 8px;border-bottom-left-radius: 8px;"><img src="assets/img/clipboard-image-20.png" style="width: 20px;"></button><input class="form-control border-0 small" type="text" placeholder="Search..." style="background: #e8e8e8;border-top-right-radius: 8px;border-bottom-right-radius: 8px;height: 45px;font-family: Poppins, sans-serif;font-size: 14px;"><button class="btn btn-primary" type="button" style="background: #cdcdcd;border-style: none;margin-top: 5px;margin-bottom: 5px;margin-right: 5px;border-top-left-radius: 5.6px;border-bottom-left-radius: 5.6px;" data-bs-toggle="modal" data-bs-target="#modal-1"><img src="assets/img/clipboard-image-48.png"></button></div>
                                            </form>
                                            <div class="row d-xl-flex" style="margin-top: 20px;">
                                                <div class="col">
                                                    <div>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">DATE &amp; TIME</th>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">MODIFIED BY</th>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">ACTION</th>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;">DETAILS</th>
                                                                        <th style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 14px;font-weight: 700;"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="align-middle" style="height: 72px;">
                                                                        <td style="color: #3B3B3B;font-family: Poppins, sans-serif;font-size: 15px;">02/07/2022<h1 style="font-size: 13px;color: #7A7A7A;">10:15</h1>
                                                                        </td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Admin@admin.com</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Update Venue</td>
                                                                        <td style="font-family: Poppins, sans-serif;font-size: 14px;color: #3B3B3B;font-weight: 400;">Changed the Venue (VSA) address to 205 Po Shin Street, Wan Chai District, Hong Kong</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center">
                                                            <h1 style="font-family: Poppins, sans-serif;font-size: 14px;color: #7A7A7A;font-weight: 400;">Showing 1 - 10 of 2</h1>
                                                            <div><button class="btn btn-primary" type="button" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 48px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;margin-left: 5px;">1</button></div>
                                                        </div>
                                                    </div>
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
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;font-weight: 500;">Filter</p>
                        <div style="margin-right: 10px;"><label class="form-label" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Date</label>
                            <div class="input-group" style="height: 48px;"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                        <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                    </svg></span><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;font-family: Poppins, sans-serif;font-size: 14px;"></div>
                        </div>
                    </div>
                    <div class="modal-footer"><button class="btn btn-primary" type="button" style="background: #4A5C7A;border-style: none;font-family: Poppins, sans-serif;font-size: 15px;height: 48px;width: 100%;">Save</button></div>
                </div>
            </div>
        </div>


        @endsection