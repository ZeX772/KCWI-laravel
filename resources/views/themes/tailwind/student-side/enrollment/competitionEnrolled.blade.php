@extends('theme::layouts.customer')

@section('style')
<style>
 
.p24bb {
  color: var(--app-color-tone-primary, #171433);
  text-align: center;
  font-family: "Barlow-Bold", sans-serif;
  font-size: 24px;
}
.p13 {
  color: var(--app-color-tone-secondary-1-50percent, rgba(35, 54, 86, 0.5));
  text-align: left;
  font-family: "Barlow-Medium", sans-serif;
}
.frame {
  background: var(--app-color-tone-white, #ffffff);
  border-radius: 24px;
  padding: 12px 24px 12px 24px;
  display: flex;
  flex-direction: column;
  gap: 6px;
  align-items: flex-start;
  justify-content: flex-start;
  align-self: stretch;
  flex-shrink: 0;
  position: relative;
  box-shadow: var(
    --app-drop-shadow-box-shadow,
    0px 4px 4px 0px rgba(35, 54, 86, 0.5)
  );
}
.waiting {
  background: var(--app-color-tone-secondary-2, #aac9e4);
  border-radius: 30px;
  padding: 4px 12px 4px 12px;
  display: flex;
  flex-direction: row;
  gap: 10px;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  position: relative;
}
</style>
@endsection

@section('content')
<body id="page-top">
<div id="wrapper" class="d-flex" style="min-height: 100vh;">
    
        <div class="d-flex flex-column" id="content-wrapper" style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);width: 100%;">
            <div style="margin-bottom: 30px; position: absolute;" onclick="goBack()"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></div>
            <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 20px;height: 31px;"><strong>Enrollment History</strong></p></br>
            <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                <div style="width: 50%;">
                    <div>
                        <div class="d-xl-flex justify-content-between align-items-xl-center" style="margin-bottom: 20px;">
                            <div class="d-xl-flex align-items-xl-center"><img src="{{ asset('themes/tailwind/images/clipboard-image-55.png') }}" style="width: 16px;margin-right: 10px;">
                                <p class="p20b" style="margin-bottom: 0px;"><strong>Course Details</strong></p>
                            </div>
                            <div class="waiting" style="width: 150px;">
                                <p class="p12" style="margin-bottom: 0px;"><strong>Waiting List</strong></p>
                            </div>
                        </div>
                        <div class="d-xl-flex flex-column divcard frame" style="padding: 15px;padding-left: 30px;">
                            <div class="d-xxl-flex flex-column align-items-xxl-start">
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Enrollment Type: </p>
                                    <p class="p13normal" style="margin-bottom: 0px;">Full Term Enrollment</p>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Course Code: </p>
                                    <p class="p13normal" style="margin-bottom: 0px;">VSA-RS2-0001</p>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Level: </p>
                                    <p class="p13normal" style="margin-bottom: 0px;">Ripplet Starter 2</p>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Venue: </p>
                                    <p class="p13normal" style="margin-bottom: 0px;">VSA</p>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Facility: </p>
                                    <p class="p13normal" style="margin-bottom: 0px;">VSA Main Pool</p>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Date: </p>
                                    <p class="p13normal" style="margin-bottom: 0px;">04/02, 11/02, 18/02, 25/02</p>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Time: </p>
                                    <p class="p13normal" style="margin-bottom: 0px;">08:00 - 08:45</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-top: 20px;margin-bottom: 10px;"><img src="{{ asset('themes/tailwind/images/clipboard-image-63.png') }}" style="width: 16px;margin-right: 10px;">
                            <p class="p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;"><strong>Student Details</strong></p>
                        </div>
                        <div style="padding: 15px;padding-left: 30px;" class="divcard frame">
                            <div class="d-xxl-flex flex-column align-items-xxl-start">
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Student Name: </p>
                                    <p class="p13normal" style="margin-bottom: 0px;">Chris Chan</p>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Student ID: </p>
                                    <p class="p13normal" style="margin-bottom: 0px;">C100431</p>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Phone: </p>
                                    <p class="p13normal" style="margin-bottom: 0px;">6999 9999</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-top: 20px;margin-bottom: 10px;"><img src="{{ asset('themes/tailwind/images/clipboard-image-64.png') }}" style="width: 23px;margin-right: 10px;">
                            <p class="p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;"><strong>Payment Review</strong></p>
                        </div>
                        <div style="padding: 15px;padding-left: 30px;" class="divcard frame">
                            <div class="d-xxl-flex flex-column align-items-xxl-start">
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                    <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Total fee (RM): </p>
                                    <p class="p13normal" style="margin-bottom: 0px;">1860</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-top: 20px;margin-bottom: 10px;"><img src="{{ asset('themes/tailwind/images/clipboard-image-86.png') }}" style="width: 16px;margin-right: 10px;" width="23" height="18">
                            <p class="p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;"><strong>Remarks</strong></p>
                        </div>
                        <div style="padding: 15px;padding-left: 30px;" class="divcard frame">
                            <div class="d-xxl-flex flex-column align-items-xxl-start">
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                    <p class="p13normal" style="margin-bottom: 0px;">Once we are able to schedule our Swim Academy swimming classes, a member of our lovely team will get in touch with you to find the perfect swimming class for your child.&nbsp;<br><br>We can't wait to welcome you and your little ones to our classes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

@section('javascript')

@endsection