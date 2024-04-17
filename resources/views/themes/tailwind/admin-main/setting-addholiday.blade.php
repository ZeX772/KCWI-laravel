 @extends('theme::layouts.app')


@section('content')

<div style="height: 100vh;background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;padding: 20px;">
                    <h1 class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center titles" style="font-size: 2vw;font-family: Poppins, sans-serif;color: #3B3B3B;">Setting - Holiday List</h1>
                    <div class="card" style="width: 70%;">
                        <div class="card-body">
                            <div class="d-xl-flex flex-column align-items-xl-start form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Subject</label><input type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;width: 100%;"></div>
                            <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Date</label>
                                <div class="input-group mb-4"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                        </svg></span><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;"></div>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;">School Closure</label></div>
                            </div>
                            <div style="margin-top: 20px;padding-left: 20px;"><button class="btn btn-primary" type="button" data-bs-dismiss="modal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;margin-right: 50px;">Save</button><button class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);margin-right: 20px;">Cancel</button></div>
                        </div>
                    </div>
                </div>
    @endsection