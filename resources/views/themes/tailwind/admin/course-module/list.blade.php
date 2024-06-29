@extends('theme::layouts.app')

@section('style')
<style>
    #course_list td {
        color: #3B3B3B;
        font-family: Poppins, sans-serif;
        font-size: 12px;
    }

    #course_list th {
        white-space: nowrap;
        color: #7A7A7A;
        font-size: 12px;
        line-height: 21px;
        letter-spacing: 0.02em;
        text-align: left;
    }

    #course_list .dataTables_wrapper .dataTables_paginate {
        text-align: right !important;
    }
</style>
@endsection





@section('content')
<div>
    <div style="padding: 20px;background: #ffffff;box-shadow: 0px 0px 3px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;">
    <div class="row g-0 d-xxl-flex justify-content-between">
        <div class="col-auto">
            <h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;">Course Management</h1>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary text-nowrap d-flex align-items-center" type="button" style="background: #4A5C7A;box-shadow: 0px 4px rgb(40,51,68);border-style: none;border-bottom-style: none;border-bottom-color: rgb(29,44,88);" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="margin-right: 12px;">
                    <path d="M12 4C11.4477 4 11 4.44772 11 5V11H5C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13H11V19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19V13H19C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11H13V5C13 4.44772 12.5523 4 12 4Z" fill="currentColor"></path>
                </svg>Add Course
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
            <div class="col-xxl-9" style="background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;border: 1px solid rgb(232,232,232);padding-left: 0px;padding-right: 0px;">
                <div class="tab-content" style="padding: 15px;">
                    <div id="tab-1" class="tab-pane active bootstrap_datatables" role="tabpanel" style="min-height: 0px;height: auto;">
                        <div class="table-responsive" style="height: auto;max-height: none;">
                            <table class="table table-hover" id="course_list" style="width: 100%;">
                                <thead>
                                    <tr style="border-style: none;border-bottom: 2px solid #E8E8E8;">
                                        <th class="text-center"><input type="checkbox"></th>
                                        <th>COURSE CODE</th>
                                        <th>COURSE LEVEL</th>
                                        <th>CLASS SIZE</th>
                                        <th>VENUE</th>
                                        <th>FACILITY</th>
                                        <th>TOTAL FEE (RM)</th>
                                        <th>COACH(ES)</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody style="height: auto;">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
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
                                <li class="list-group-item d-xxl-flex" style="border-style: none;padding: 0px;">
                                    <div class="container" style="padding: 0px;">
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
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Course Level</h1>
                                            </div>
                                            <div class="col-md-6">
                                                <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">Ripplet Starter 2</h1>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-md-6">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Class Size</h1>
                                            </div>
                                            <div class="col-md-6">
                                                <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">8</h1>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-md-6">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Venue</h1>
                                            </div>
                                            <div class="col-md-6">
                                                <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">VSA</h1>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-md-6">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Facility</h1>
                                            </div>
                                            <div class="col-md-6">
                                                <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">VSA Main pool</h1>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-md-6">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Fee (RM)</h1>
                                            </div>
                                            <div class="col-md-6">
                                                <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">1860</h1>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-md-6">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Coach</h1>
                                            </div>
                                            <div class="col-md-6">
                                                <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">Coach Ng</h1>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-md-6">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Date</h1>
                                            </div>
                                            <div class="col-md-6">
                                                <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">4/2/2022, 11/2/2022, 18/2/2022, 25/2/2022</h1>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 10px;">
                                            <div class="col-md-6">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Remark</h1>
                                            </div>
                                            <div class="col-md-6">
                                                <h1 style="color: #7a7a7a;font-size: 14px;font-family: Poppins, sans-serif;">Remark...</h1>
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
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>













<!--this is the add course function-->
<form action="{{route('cms.course-add')}}" method="post">
    <div class="modal fade" role="dialog" tabindex="-1" id="addCourseModal">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom-style: none;">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Add Course</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="col" style="width: 100%;">
                        <div class="container" style="padding: 0px;color: #636363;">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Course Level</label>
                                    <select required id="course_level" name="course_level" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                    {{$price=null;}}
                                    @foreach($levels as $level)
                                    {{ $price = $price==null ? $level->default_price : $price;}}
                                    <option value="{{$level->id}}" data-price="{{$level->default_price}}">{{$level->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Default Venue</label>
                                    <select required id="venue" name="venue" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                    @foreach($venues as $venue)
                                    <option value="{{$venue->id}}">{{$venue->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline" style="width: 100%;margin-left: 10px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Default Facility</label>
                                    <select required id="facility" name="facility" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Class Size (Maximum Number of Students)</label>
                                    <input required id="course_size" name="course_size" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;"></div>
                            </div>
                            <div class="form-inline" style="width: 100%;margin-left: 10px;">
                                <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Fee (RM) Per Class</label>
                                    <input value="{{$price}}" required id="class_full_price" name="class_full_price" class="form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
                                </div>
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Assign Coach</label>
                                    <select id="course_coaches" name="course_coaches[]" class="course-coaches form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" data-role="tagsinput" data-class="label-info">
                                    <!-- <option value="-1">- Select Coach -</option> -->
                                    @foreach($coaches as $coach)
                                    <option value="{{$coach['id']}}" data-name="{{$coach['name']}}">{{$coach['name']}}</option>
                                    @endforeach
                                    </select>
                                    <div id="tags-container"></div>
                                </div>
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;">
                            <div class="form-inline">
                                <div class="form-group" style="margin-bottom: 20px;"><label class="form-label" style="color: #636363;font-size: 14px;">Course Category</label>
                                        <?php $ctr=0; ?>
                                        @foreach($course_types as $course_type)
                                            @if($ctr==0)
                                            <div class="d-xxl-flex justify-content-around align-items-xxl-center mb-2">
                                            @endif
                                                <div class="col radio_col">
                                                    <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                        <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{$course_type->name}}</h1>
                                                        <input required id="course_data_{{$course_type->id}}" data-id="{{$course_type->id}}" name="course_type" value="{{$course_type->id}}" type="radio">
                                                    </div>
                                                </div>
                                            <?php $ctr++; ?>
                                            @if($ctr>2)
                                            </div>
                                            <?php $ctr=0; ?>
                                            @endif
                                        @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;">
                            <div class="form-inline">
                                <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Add Class</label>
                                    <div id="classContainer">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="d-xxl-flex justify-content-end align-items-xxl-center card-title" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Class
                                                    <svg class="removeClassBtn" class="justify-end" xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor">
                                                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                        <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                                                    </svg>
                                                </h4>
                                                <div class="d-xxl-flex align-items-xxl-center">
                                                    <div class="col" style="margin-right: 10px;">
                                                        <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                                            <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Date</label>
                                                                <div class="input-group mb-4"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                            <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                                                        </svg></span><input required name="course_class[0][class_date]" class="form-control" type="date" style="background: #F5F5F5;border-style: none;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="margin-right: 10px;margin-left: 10px;">
                                                        <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                                            <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Start time</label>
                                                                <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                            <path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
                                                                        </svg></span><input required name="course_class[0][class_start]" class="form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="margin-left: 10px;"><label class="form-label" style="color: #636363;font-size: 14px;">End time</label>
                                                        <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                    <path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
                                                                </svg></span><input required name="course_class[0][class_end]" class="form-control form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;"></div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col d-xxl-flex align-items-xxl-center">
                                                    <div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1" style="color: #3B3B3B;font-size: 14px;">Change Coach (only this class)</label></div>
                                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2" style="color: #3B3B3B;font-size: 14px;">Change Venue / Facility (only this class)</label></div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="container" style="margin-top: 10px; padding-left: 0px;">
                            <div class="row">
                                <div class="col-auto">
                                    <button id="addClassBtn" class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap" type="button" style="height: 30px; padding: 5px 12px; padding-top: 0px; padding-bottom: 0px; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255, 255, 255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.25); margin-right: 20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 8px;">
                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                                        </svg>
                                        Add Class
                                    </button>
                                    </div>
                                    <!-- <div class="col-auto">
                                    <button class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap" type="button" style="height: 30px; padding: 5px 12px; padding-top: 0px; padding-bottom: 0px; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255, 255, 255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.25);" data-bs-toggle="modal" data-bs-target="#modal-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 8px;">
                                        <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                                    </svg>
                                    Add Bulk Class
                                    </button>
                                </div> -->
                            </div>
                        </div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline">
                                <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Status</label>
                                    <select required id="course_status" name="course_status" class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                        <option value="Published">Published</option>
                                        <option value="Private">Private</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline">
                                <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Remark</label><textarea id="course_remark" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between" style="border-top-style: none;">
                    <button class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
                    <button class="btn btn-primary" type="submit" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>





















<!--this is the update course function-->
<form action="{{route('cms.course-update')}}" method="post">
    <div class="modal fade" role="dialog" tabindex="-1" id="updateCourseModal">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom-style: none;">
                    <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Update Course</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="col" style="width: 100%;">
                        <div class="container" style="padding: 0px;color: #636363;">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Course Level</label>
                                    <select required id="course_level_edit" name="course_level" class="course-level form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Default Venue</label>
                                    <select required name="venue" id="venue_edit" class="venue form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                    </select>
                                </div>
                            </div>
                            <div class="form-inline" style="width: 100%;margin-left: 10px;">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Default Facility</label>
                                    <select required name="facility" id="facility_edit" class="facility form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Class Size (Maximum Number of Students)</label>
                                    <input required name="course_size" id="course_size_edit" class="course-size form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;"></div>
                            </div>
                            <div class="form-inline" style="width: 100%;margin-left: 10px;">
                                <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Fee (RM) Per Class</label>
                                    <input required name="class_full_price" id="class_full_price_edit" class="class-full-price form-control" type="text" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;">
                                </div>
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Assign Coach</label>
                                    <select id="course_coaches_edit" name="course_coaches[]" class="course_coaches form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;" data-role="tagsinput" data-class="label-info">
                                    </select>
                                    <div id="tags-container_edit"></div>
                                </div>
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;">
                            <div class="form-inline">
                                <div class="form-group" style="margin-bottom: 20px;"><label class="form-label" style="color: #636363;font-size: 14px;">Course Category</label>
                                        <?php $ctr=0; ?>
                                        @foreach($course_types as $course_type)
                                            @if($ctr==0)
                                            <div class="d-xxl-flex justify-content-around align-items-xxl-center mb-2">
                                            @endif
                                                <div class="col">
                                                    <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding-right: 20px;padding-left: 20px;margin-right: 20px;margin-left: 20px;">
                                                        <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{$course_type->name}}</h1>
                                                        <input id="course_type_edit" required class="course_type" name="course_type" value="{{$course_type->id}}" type="radio">
                                                    </div>
                                                </div>
                                            <?php $ctr++; ?>
                                            @if($ctr>2)
                                            </div>
                                            <?php $ctr=0; ?>
                                            @endif
                                        @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;">
                            <div class="form-inline">
                                <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Add Class</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="d-xxl-flex justify-content-end align-items-xxl-center card-title" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Class #01
                                                <svg class="justify-end" xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor">
                                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                    <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                                                </svg>
                                            </h4>
                                            <div class="d-xxl-flex align-items-xxl-center">
                                                <div class="col" style="margin-right: 10px;">
                                                    <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                                        <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Date</label>
                                                            <div class="input-group mb-4"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                        <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                                                    </svg></span><input required name="course_class[0][class_date]" class="form-control" type="date" style="background: #F5F5F5;border-style: none;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col" style="margin-right: 10px;margin-left: 10px;">
                                                    <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                                        <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Start time</label>
                                                            <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                        <path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
                                                                    </svg></span><input required name="course_class[0][class_start]" class="form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col" style="margin-left: 10px;"><label class="form-label" style="color: #636363;font-size: 14px;">End time</label>
                                                    <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                                <path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
                                                            </svg></span><input required name="course_class[0][class_end]" class="form-control form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;"></div>
                                                </div>
                                            </div>
                                            <div class="col d-xxl-flex align-items-xxl-center">
                                                <div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1" style="color: #3B3B3B;font-size: 14px;">Change Coach (only this class)</label></div>
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2" style="color: #3B3B3B;font-size: 14px;">Change Venue / Facility (only this class)</label></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="container" style="margin-top: 10px; padding-left: 0px;">
                            <div class="row">
                                <div class="col-auto">
                                    <button class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap" type="button" style="height: 30px; padding: 5px 12px; padding-top: 0px; padding-bottom: 0px; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255, 255, 255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.25); margin-right: 20px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 8px;">
                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                                        </svg>
                                        Add Class
                                    </button>
                                    </div>
                                    <div class="col-auto">
                                    <button class="btn btn-primary fw-semibold d-flex align-items-center text-nowrap" type="button" style="height: 30px; padding: 5px 12px; padding-top: 0px; padding-bottom: 0px; color: #4A5C7A; font-size: 14px; font-family: Poppins, sans-serif; background: rgb(255, 255, 255); border-color: #E8E8E8; box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.25);" data-bs-toggle="modal" data-bs-target="#modal-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 8px;">
                                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                        <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
                                    </svg>
                                    Add Bulk Class
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline">
                                <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Status</label>
                                    <select required id="course_status_edit" name="course_status" class="course_status form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                        <option value="Published">Published</option>
                                        <option value="Private">Private</option>
                                    </select></div>
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline">
                                <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Remark</label><textarea id="course_remark_edit" name="course_remark" class="course_remark form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between" style="border-top-style: none;">
                    <button class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
                    <button class="btn btn-primary" type="submit" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>












<!--this is the archieve course function-->
<form action="{{route('cms.course-archieve')}}" method="post">
    <div class="modal fade" role="dialog" tabindex="-1" id="archieveModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p style="color: #FF4550;font-size: 20px;font-family: Poppins, sans-serif;">Are you sure to delete this item?</p>
                    <!-- <p style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;"><b style="text-decoration: underline;">Coach Ng</b> has a time clash with another class at this period.</p> -->
                    <input type="hidden" name="package_id_del" id="package_id_del" />
                </div>
                <div class="modal-footer justify-content-between" style="border-top-style: none;"><button class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button><button class="btn btn-primary" type="submit" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Confirm</button></div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" role="dialog" tabindex="-1" id="modal-2">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom-style: none;">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Add Bulk Class</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding-top: 0px;">
                <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 0px;">
                    <div class="form-inline" style="width: 100%;margin-right: 10px;">
                        <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Start Date</label>
                            <div class="input-group mb-4"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                        <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                    </svg></span><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;"></div>
                        </div>
                    </div>
                    <div class="form-inline" style="width: 100%;margin-left: 10px;">
                        <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">End Date</label>
                            <div class="input-group mb-4"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                        <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                    </svg></span><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;"></div>
                        </div>
                    </div>
                </div>
                <div class="container d-xxl-flex justify-content-between align-items-xxl-center" style="padding: 0px;color: #636363;margin-top: 0px;">
                    <div class="form-inline" style="width: 100%;margin-right: 10px;">
                        <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Repeat every</label><input class="form-control" type="number" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;"></div>
                    </div>
                    <div class="form-inline" style="width: 100%;margin-left: 10px;">
                        <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">End Date</label><select class="form-control" style="background: #F5F5F5;border-style: none;height: 48px;border-top-left-radius: 9px;border-top-right-radius: 9px;border-bottom-right-radius: 9px;border-bottom-left-radius: 9px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
                                <option value="">days</option>
                                <option value="">weeks</option>
                                <option value="">months</option>
                                <option value="">years</option>
                            </select></div>
                    </div>
                </div>
                <div class="container" style="padding: 0px;color: #636363;margin-top: 10px;">
                    <div class="form-inline">
                        <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Repeat on</label>
                            <div class="col d-xxl-flex justify-content-start align-items-xxl-center">
                                <div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Sun</label></div>
                                <div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Mon</label></div>
                                <div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Tue</label></div>
                                <div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Wed</label></div>
                                <div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Thu</label></div>
                                <div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Fri</label></div>
                                <div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Sat</label></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container" style="padding: 0px;color: #636363;margin-top: 10px;">
                    <div class="form-inline">
                        <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">End</label><label class="form-label" style="color: #636363;font-size: 14px;"></label>
                            <div class="col d-xxl-flex justify-content-start align-items-xxl-center">
                                <div class="d-xxl-flex align-items-xxl-end">
                                    <div class="col">
                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding: 0px;padding-right: 20px;padding-left: 20px;width: 214px;">
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Never</h1><input type="radio">
                                        </div>
                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding: 0px;padding-right: 20px;padding-left: 20px;width: 214px;margin-top: 10px;">
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">On</h1><input type="radio">
                                        </div>
                                        <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="background: #F5F5F5;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;height: 48px;padding: 0px;padding-right: 20px;padding-left: 20px;width: 214px;margin-top: 10px;">
                                            <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">After</h1><input type="radio">
                                        </div>
                                    </div>
                                    <div class="col" style="margin-left: 20px;"><input class="form-control" type="date" style="background: #F5F5F5;border-style: none;width: 214px;height: 48px;">
                                        <div class="d-xxl-flex align-items-xxl-center" style="margin-top: 10px;background: #F5F5F5;border-top-right-radius: 5.6px;border-bottom-right-radius: 5.6px;"><input class="form-control" type="number" style="color: #3B3B3B;font-size: 14px;font-family: Nunito, sans-serif;background: #F5F5F5;border-style: none;height: 48px;width: 79px;"><label class="form-label d-xxl-flex" style="color: #636363;font-size: 14px;margin-bottom: 0px;">occurrences</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;"><button class="btn btn-light" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button><button class="btn btn-primary" type="button" data-bs-dismiss="modal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Confirm</button></div>
        </div>
    </div>
</div>
@endsection




















































<!--this is the script of the website-->

@section('script')
<script>
    $(document).ready(function() {
        var a = 0;

        $('#tags-container').tagsinput();
        $('#tags-container_edit').tagsinput();

        setTimeout(function() {
            $('.bootstrap-tagsinput input').attr('readonly', true);
        }, 1000);

        var table = $('#course_list').DataTable({
            "ajax": "{{ route('cms.course-list') }}",
            "paging": true,
            "ordering": false,
            "info": true,
            "lengthChange": false,
            "searching": false,
            "columns": [
                {
                    "data": "course_id",
                    "render": function (data, type, row) {
                        return '<input type="checkbox">';
                    }
                },
                {"data": "course_code"},
                {"data": "course_level"},
                {"data": "class_size"},
                {"data": "venue"},
                {"data": "facility"},
                {"data": "total_fee"},
                {"data": "coaches"},
                {"data": "status"},
                {
                    "data": "package_id",
                    "render": function (data, type, row) {
                        return `<div class="flex justify-center items-center"><a href="/cms/course/class/${data}" class="view-button"><svg class="bi bi-eye" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" style="margin-right:20px;color:#3B3B3B;"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path></svg></a>
                               <button data-bs-toggle="modal" data-package-id="${data}" data-bs-target="#updateCourseModal" class="edit-button"><svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" style="margin-right:20px;color:#3B3B3B;"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path></svg></button>
                               <button data-bs-toggle="modal" data-package-id="${data}" data-bs-target="#archieveModal" class="delete-button"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color:#3B3B3B;"><path fill-rule="evenodd" d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z" fill="currentColor"></path><path d="M9 9H11V17H9V9Z" fill="currentColor"></path><path d="M13 9H15V17H13V9Z" fill="currentColor"></path></svg></button></div>`;
                    }
                }
            ]
        });

        var course_level = $('#course_level');
        var course_level_edit = $('#course_level_edit');

        // $.ajax({
        //     url: "{{route('cms.level-list')}}",
        //     method: 'GET',
        //     dataType: 'json', // Change this to match your response format (e.g., 'json', 'html', 'xml', etc.)
        //     success: function(data) {
        //         let levels = data.data;
        //         // course_level.append('<option value="-1" data-price="0.00">- Select Level -</option>');
        //         $.each(levels, function(index, item) {
        //             course_level.append('<option value="' + item.id + '" data-price="' + item.default_price + '">' + item.name + '</option>');
        //             course_level_edit.append('<option value="' + item.id + '" data-price="' + item.default_price + '">' + item.name + '</option>');
        //         });

        //         course_level.val(-1);
        //         course_level_edit.val(-1);
        //     },
        //     error: function(error) {
        //         console.error('Error fetching levels:', error);
        //     }
        // });

        course_level.on('change', function() {
            $('#class_full_price').val($('#course_level option:selected').data('price'));
        });

        course_level_edit.on('change', function() {
            $('#class_full_price_edit').val($('#course_level_edit option:selected').data('price'));
        });

        var venue = $('#venue');
        var venue_edit = $('#venue_edit');

        // $.ajax({
        //     url: "{{route('cms.venue-list')}}",
        //     method: 'GET',
        //     dataType: 'json', // Change this to match your response format (e.g., 'json', 'html', 'xml', etc.)
        //     success: function(data) {
        //         let venues = data.data;
        //         // venue.append('<option value="-1">- Select Venue -</option>');
        //         $.each(venues, function(index, item) {
        //             venue.append('<option value="' + item.id + '">' + item.name + '</option>');
        //             venue_edit.append('<option value="' + item.id + '">' + item.name + '</option>');
        //         });

        //         venue.val(-1);
        //         venue_edit.val(-1);
        //     },
        //     error: function(error) {
        //         console.error('Error fetching venues:', error);
        //     }
        // });

        venue.on('change', function() {
            var facility = $('#facility');
            facility.html('');
            $.ajax({
                url: "{{route('cms.venue-facility-list')}}",
                method: 'POST',
                data: {
                    'venue_id': $('#venue option:selected').val()
                },
                dataType: 'json', // Change this to match your response format (e.g., 'json', 'html', 'xml', etc.)
                success: function(data) {
                    let facilities = data.data;
                    // facility.append('<option value="-1">- Select Facility -</option>');
                    $.each(facilities, function(index, item) {
                        facility.append('<option value="' + item.id + '">' + item.name + '</option>');
                    });

                    $(facility).val(1).change();
                },
                error: function(error) {
                    console.error('Error fetching facilities:', error);
                }
            });
        });

        $(venue).val(1).change();

        // venue_edit.on('change', function() {
        //     var facility = $('#facility_edit');
        //     facility.html('');
        //     $.ajax({
        //         url: "{{route('cms.venue-facility-list')}}",
        //         method: 'POST',
        //         data: {
        //             'venue_id': $('#venue option:selected').val()
        //         },
        //         dataType: 'json', // Change this to match your response format (e.g., 'json', 'html', 'xml', etc.)
        //         success: function(data) {
        //             let facilities = data.data;
        //             // facility.append('<option value="-1">- Select Facility -</option>');
        //             $.each(facilities, function(index, item) {
        //                 facility.append('<option value="' + item.id + '">' + item.name + '</option>');
        //             });

        //             facility.val(-1);
        //         },
        //         error: function(error) {
        //             console.error('Error fetching facilities:', error);
        //         }
        //     });
        // });

        // $(venue).val(1).change();

        var course_coaches = $('#course_coaches');
        var course_coaches_edit = $('#course_coaches_edit');

        // $.ajax({
        //     url: "{{route('cms.coach-list')}}",
        //     method: 'GET',
        //     dataType: 'json', // Change this to match your response format (e.g., 'json', 'html', 'xml', etc.)
        //     success: function(data) {
        //         let coaches = data.data;
        //         // course_coaches.append('<option value="-1">- Select Coach -</option>');
        //         $.each(coaches, function(index, item) {
        //             course_coaches.append('<option value="' + item.id + '" data-name="' + item.name + '">' + item.name + '</option>');
        //             course_coaches_edit.append('<option value="' + item.id + '" data-name="' + item.name + '">' + item.name + '</option>');
        //         });

        //         course_coaches.val(-1);
        //         course_coaches_edit.val(-1);
        //     },
        //     error: function(error) {
        //         console.error('Error fetching coach:', error);
        //     }
        // });

        course_coaches.on('change', function() {
            var selectedOption = $(this).find('option:selected');

            // Check if the option is not already in the tags input
            if (!$('#tags-container').tagsinput('items').includes(selectedOption.data('name'))) {
              // Add the selected option to the tags input
              $('#tags-container').tagsinput('add', selectedOption.data('name'));
            }
        });

        course_coaches_edit.on('change', function() {
            var selectedOption = $(this).find('option:selected');

            // Check if the option is not already in the tags input
            if (!$('#tags-container_edit').tagsinput('items').includes(selectedOption.data('name'))) {
              // Add the selected option to the tags input
              $('#tags-containe_editr').tagsinput('add', selectedOption.data('name'));
            }
        });

        $('.radio_col').on('click', function() {
            const parentDiv = event.target.closest('.radio_col');
            const radioInput = parentDiv.querySelector('input[type="radio"]');

            handleRadioClick($(radioInput).data('id'));
        });

        function handleRadioClick(setId) {
            // Find the clicked parent div and its associated radio input
            const parentDiv = event.target.closest('.radio_col');
            const radioInput = parentDiv.querySelector('input[type="radio"]');

            // Uncheck all radio buttons in the same set
            const setRadios = document.querySelectorAll(`input[id="course_type_${setId}"`);
            setRadios.forEach((radio) => {
                radio.checked = false;
            });

            // Check the clicked radio input
            radioInput.checked = true;
        }

        $('#addClassBtn').click(function () {
            a++;

            var htmlToAdd = `
                <div class="card">
                    <div class="card-body">
                        <h4 class="d-xxl-flex justify-content-end align-items-xxl-center card-title" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Class
                            <svg class="removeClassBtn" class="justify-end" xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor">
                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                            </svg>
                        </h4>
                        <div class="d-xxl-flex align-items-xxl-center">
                            <div class="col" style="margin-right: 10px;">
                                <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Date</label>
                                        <div class="input-group mb-4"><span class="input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                    <path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"></path>
                                                </svg></span><input required name="course_class[${a}][class_date]" class="form-control" type="date" style="background: #F5F5F5;border-style: none;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col" style="margin-right: 10px;margin-left: 10px;">
                                <div class="form-inline" style="width: 100%;margin-right: 10px;">
                                    <div class="form-group"><label class="form-label" style="color: #636363;font-size: 14px;">Start time</label>
                                        <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                    <path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
                                                </svg></span><input required name="course_class[${a}][class_start]" class="form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col" style="margin-left: 10px;"><label class="form-label" style="color: #636363;font-size: 14px;">End time</label>
                                <div class="input-group mb-4"><span class="input-group-text input-group-text" style="background: #F5F5F5;border-style: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" style="color: #3B3B3B;">
                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"></path>
                                        </svg></span><input required name="course_class[${a}][class_end]" class="form-control form-control" type="time" style="color: #3B3B3B;background: #F5F5F5;border-style: none;"></div>
                            </div>
                        </div>
                        <!--<div class="col d-xxl-flex align-items-xxl-center">
                            <div class="form-check" style="margin-right: 20px;"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1" style="color: #3B3B3B;font-size: 14px;">Change Coach (only this class)</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2" style="color: #3B3B3B;font-size: 14px;">Change Venue / Facility (only this class)</label></div>
                        </div>-->
                    </div>
                </div>
            `;
            $('#classContainer').append(htmlToAdd);
        });

        // Add a click event handler for the "Remove" buttons
        $('#classContainer').on('click', '.removeClassBtn', function () {
            $(this).closest('.card').remove();
        });

        $('#course_list').on('click', '.edit-button', function () {
            // Make an Ajax request to fetch data
            var btn = this;
            $.ajax({
              url: "{{route('cms.course-get-package')}}", // Replace with your data retrieval endpoint
              method: "POST",
              data: {
                'package_id': $(btn).data('package-id')
              },
              success: function (mydata) {
                    let data = mydata.data;
                    // Populate the modal fields with the received data
                    console.log(data);
                    $('#course_level_edit').val(data.course.course_level);
                    $('#venue_edit').val(data.venue.id);

                    var facility = $('#facility_edit');
                    facility.html('');
                    $.ajax({
                        url: "{{route('cms.venue-facility-list')}}",
                        method: 'POST',
                        data: {
                            'venue_id': $('#venue option:selected').val()
                        },
                        dataType: 'json', // Change this to match your response format (e.g., 'json', 'html', 'xml', etc.)
                        success: function(data) {
                            let facilities = data.data;
                            // facility.append('<option value="-1">- Select Facility -</option>');
                            $.each(facilities, function(index, item) {
                                facility.append('<option value="' + item.id + '">' + item.name + '</option>');
                            });

                            facility.val(-1);
                        },
                        error: function(error) {
                            console.error('Error fetching facilities:', error);
                        }
                    });

                    $('#facility_edit').val(data.facility.id);
                    $('#course_size_edit').val(data.course.course_size);
                    $('#class_full_price_edit').val(data.course.course_full_price);
                    // Open the modal
                    //$("#myModal").modal("show");
              },
              error: function (error) {
                console.error("Ajax request failed:", error);
              },
            });
        });

        $('#course_list').on('click', '.delete-button', function () {
            $('#package_id_del').val($(this).data('package-id'));
        });

    });
    
</script>
@endsection