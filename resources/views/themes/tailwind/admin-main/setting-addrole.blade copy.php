 @extends('theme::layouts.app')


@section('content')

<div style="height: 100vh;background: #ffffff;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;padding: 20px;">
                    <h1 class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center titles" style="font-size: 2vw;font-family: Poppins, sans-serif;color: #3B3B3B;">Setting - Role</h1>
                    <div class="card" style="margin-top: 30px;border-style: none;">
                        <div class="card-body" style="color: #3B3B3B;">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xl-10 col-xxl-9" style="border: 1px solid #E8E8E8;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding-top: 12px;padding-bottom: 12px;">
                                            <div style="padding-top: 20px;">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Role</h1>
                                                <form class="form-inline">
                                                    <div class="form-group"><input class="form-control" type="text" style="width: 80%;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;"></div>
                                                </form>
                                            </div>
                                            <div style="padding-top: 20px;">
                                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;">Title</h1><select class="form-control" style="height: 48px;width: 80%;background: #F5F5F5;border-style: none;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">
    <option hidden>Select Status</option>
    <option value>Active</option>
    <option value>Published</option>
    <option value>Unpublished</option>
</select>
                                            </div>
                                            <div style="padding: 0px 0px 0px;margin-top: 30px;"><input type="text" style="width: 90%;height: 40px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;background: #F5F5F5;color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;padding-left: 10px;" disabled="" readonly="" value="Role Setting">
                                                <div class="col d-xl-flex align-items-xl-center" style="margin-top: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                                                    <h1 style="color: #000000;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;margin-left: 10px;">All</h1>
                                                </div>
                                            </div>
                                            <div class="d-xl-flex align-items-xl-start" style="margin-top: 20px;">
                                                <div class="col" style="padding-left: 20px;">
                                                    <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                                                        <h1 style="color: #000000;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;margin-left: 10px;">Timetable</h1>
                                                    </div>
                                                    <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                                                        <h1 style="color: #000000;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;margin-left: 10px;">Student</h1>
                                                    </div>
                                                    <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                                                        <h1 style="color: #000000;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;margin-left: 10px;">Course</h1>
                                                    </div>
                                                    <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                                                        <h1 style="color: #000000;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;margin-left: 10px;">Level</h1>
                                                    </div>
                                                    <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                                                        <h1 style="color: #000000;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;margin-left: 10px;">Venue</h1>
                                                    </div>
                                                    <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                                                        <h1 style="color: #000000;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;margin-left: 10px;">Coach</h1>
                                                    </div>
                                                    <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                                                        <h1 style="color: #000000;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;margin-left: 10px;">Request</h1>
                                                    </div>
                                                    <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                                                        <h1 style="color: #000000;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;margin-left: 10px;">Accounting</h1>
                                                    </div>
                                                    <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                                                        <h1 style="color: #000000;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;margin-left: 10px;">Report</h1>
                                                    </div>
                                                    <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                                                        <h1 style="color: #000000;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;margin-left: 10px;">Content</h1>
                                                    </div>
                                                    <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                                                        <h1 style="color: #000000;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 500;margin-bottom: 0px;margin-left: 10px;">Setting</h1>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;">View Timetable</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-11"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-11">View Student Record</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-10"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-10">View Course</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-9">View Level</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-8">View Venue</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-7">View Coach Record</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-6">View User Requests</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-5">View Accounting</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-4">Export Report</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-3">View Content</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-2">Role Setting</label></div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-12"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-12">Edit Timetable</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-13"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-13">Edit Student Record</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-14"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-14">Edit Course</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-15"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-15">Edit Level</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-16"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-16">Edit Venue</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-17"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-17">Edit Coach Record</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-18"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-18">Edit User Requests</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;margin-top: 110px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-21"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-21">Edit Content</label></div>
                                                    </div>
                                                    <div style="margin-bottom: 20px;">
                                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-22"><label class="form-check-label" style="color: #303972;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 400;margin-bottom: 0px;margin-left: 10px;" for="formCheck-22">Edit School Holiday</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-top: 20px;padding-left: 20px;"><button class="btn btn-primary" type="button" data-bs-dismiss="modal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;margin-right: 50px;">Save</button><button class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);margin-right: 20px;">Cancel</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    @endsection