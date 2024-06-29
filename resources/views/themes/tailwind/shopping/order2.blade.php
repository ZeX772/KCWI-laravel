@extends('theme::layouts.customer')

@section('style')
    <style>
        .shopping {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
            font-weight: 700;
            margin-right: -10%;
        }

        .order {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
            background: #ffffff;
            border-radius: 8px;
            border-style: solid;
            border-color: var(--appcolortone-secondary-1, #233656);
            border-width: 1px;
            padding: 15px 16px 15px 16px;
        }

        .d-flex {
            display: flex;
            flex-grow: 1;
        }

        .navbar {
            background: #FFF;
            padding: 20px;
            position: left;
            min-height: 0px;
            top: 0;
            left: 0%;
            right: 0%;
            box-shadow: 10px 0 10px -10px rgba(0, 0, 0, 0.25);
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
        }

        .p16b {
            color: #171433;
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 549;
            position: relative;
        }


        .box1 {
            background: #ffffff;
            padding: 0px 24px 0px 24px;
            flex-direction: column;
            gap: 12px;
            align-items: center;
            justify-content: flex-start;
            width: 130%;
            border-radius: 24px;
            margin-left: -80px;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .p16normal3 {
            color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            line-height: 18px;
            font-weight: 300;
            position: relative;
            font-weight: bold;
        }

        .p20b {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 20px;
            font-weight: 600;
        }

        .button1 {
            background: #233656;
            border-radius: 33px;
            width: 118%;
            height: 50px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #ffffff;
            text-align: left;
            font-family: "Poppins-Medium", sans-serif;
            font-size: 18px;
            font-weight: 500;
            position: relative;
            margin-left: -70px;
        }

        .p1b {
            color: #4a5c7a;
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 18px;
            font-weight: 500;
            position: relative;
        }
    </style>
@endsection

@section('content')



            

            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);height: 100%;">
                <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                    <div style="display: flex; align-items: center;">
                        <div
                            class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                            <a href="{{ route('wave.my-order') }}">
                                <button class type="button"
                                    style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                                    <i class="fas fa-chevron-left"></i></button></a>
                        </div>
                    </div>

                    <p class="shopping d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                        style="margin-bottom: 0px;height: 31px;text-align: center;margin-left:-140px;"><strong>My
                            Order</strong></p>
                    <div>
                    </div>
                </div>
                <div class="d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-md-center justify-content-lg-center"
                    style="margin-bottom: 20px;margin-top: 50px;">
                    <div style="width: 60%;">
                        <div>
                            <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;">
                                <img src="../themes/tailwind/images/clipboard-image-55.png"
                                    style="width: 16px;margin-right: 10px;margin-left:-60px;">
                                <p class="p20b" style="margin-bottom: 0px;"><strong>Shopping Details</strong></p>
                            </div>
                            <div class="box1 d-xl-flex divcard" style="padding: 15px;padding-left: 30px;min-height:100;">
                                <div></div>
                                <div class="d-xxl-flex flex-column justify-content-xxl-center">
                                    <div class="d-md-flex d-xxl-flex align-items-md-center align-items-xxl-center"
                                        style="margin-bottom: 5px;">
                                        <p class="p16normal3"
                                            style="font-weight: bold;margin-bottom: 0px;margin-right: 10px;left:-28%;">Type:
                                        </p>
                                        <p class="p16b" style="margin-bottom: 0px;color: #171433;left:-28%;">Swimming
                                            Competition Ticket </p>
                                    </div>
                                    <div class="d-md-flex d-xxl-flex align-items-md-center align-items-xxl-center"
                                        style="margin-bottom: 5px;">
                                        <p class="p16normal3"
                                            style="font-weight: bold;margin-bottom: 0px;margin-right: 10px;left:-28%;">Date:
                                        </p>
                                        <p class="p16b" style="margin-bottom: 0px;color: #171433;left:-28%;">15/7, Sat,
                                            09:00-17:00 </p>
                                    </div>
                                    <div class="d-md-flex d-xxl-flex align-items-md-center align-items-xxl-start"
                                        style="margin-bottom: 5px;">
                                        <p class="p16normal3"
                                            style="font-weight: bold;margin-bottom: 0px;margin-right: 10px;left:-28%;">
                                            Location: </p>
                                        <p class="text-start p16b" style="margin-bottom: -30px;color: #233656;left:-28%;">
                                            GOOD HOPE PRIMARY SCHOOL CUM KINDERGARTEN<br><span class="p1b">383 Jat’s
                                                Incline, Kowloon</span></label>
                                    </div>
                                    <div class="d-md-flex d-xxl-flex align-items-md-center align-items-xxl-center"
                                        style="margin-bottom: 5px;">
                                        <p class="p16normal3"
                                            style="font-weight: bold;margin-bottom: 0px;margin-right: 10px;left:-28%;margin-top:25px;">
                                            Quantity: </p>
                                        <p class="p16b"
                                            style="margin-bottom: 0px;color: #171433;left:-28%;margin-top:25px;">1 </p>
                                    </div>
                                    <div class="d-md-flex d-xxl-flex align-items-md-center align-items-xxl-center"
                                        style="margin-bottom: 5px;">
                                        <p class="p16normal3"
                                            style="font-weight: bold;margin-bottom: 0px;margin-right: 10px;left:-28%;margin-top:10px;">
                                            Order: </p>
                                        <p class="p16b"
                                            style="margin-bottom: 0px;color: #171433;left:-28%;margin-top:10px;">
                                            VSA-RS2-0001-01 </p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-top: 20px;margin-bottom: 10px;margin-left:-60px;">
                                <img src="../themes/tailwind/images/clipboard-image-63.png"
                                    style="width: 16px;margin-right: 10px;">
                                <p class="p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;">
                                    <strong>Student Details</strong></p>
                            </div>
                            <div style="padding: 15px;padding-left: 30px;" class="divcard">
                                <div
                                    class="box1 d-xxl-flex flex-column align-items-xxl-start"style="width:137%;margin-left:-100px; padding: 15px;">
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p16normal3" style="margin-right: 10px;margin-bottom: 0px;">Student Name:
                                        </p>
                                        <p class="p16b" style="margin-bottom: 0px;">Chris Chan</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p16normal3" style="margin-right: 10px;margin-bottom: 0px;">Student ID:
                                        </p>
                                        <p class="p16b" style="margin-bottom: 0px;">C100431</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                        <p class="p16normal3" style="margin-right: 10px;margin-bottom: 0px;">Phone: </p>
                                        <p class="p16b" style="margin-bottom: 0px;">6999 9999</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-top: 20px;margin-bottom: 10px;margin-left:-60px;">
                                <img src="../themes/tailwind/images/clipboard-image-64.png"
                                    style="width: 23px;margin-right: 10px;">
                                <p class="p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;">
                                    <strong>Payment Review</strong></p>
                            </div>
                            <div style="padding: 15px;padding-left: 30px;" class="divcard">
                                <div
                                    class="box1 d-xxl-flex flex-column align-items-xxl-start"style="width:137%;margin-left:-100px; padding: 15px;">
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                        <p class="p16normal3" style="margin-right: 10px;margin-bottom: 0px;">Total fee
                                            (RM): </p>
                                        <p class="p16b" style="margin-bottom: 0px;">1860</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-top: 20px;margin-bottom: 10px;margin-left:-60px;">
                                <img src="../themes/tailwind/images/clipboard-image-55.png"
                                    style="width: 16px;margin-right: 10px;">
                                <p class="d-xxl-flex p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;">
                                    <strong>Message</strong></p>
                            </div>
                            <div style="padding: 15px;padding-left: 30px;" class="divcard">
                                <div
                                    class="box1 d-xxl-flex flex-column align-items-xxl-start"style="width:137%;margin-left:-100px; padding: 15px;">
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-start align-items-xxl-start"
                                        style="margin-bottom: 10px;">
                                        <p class="p16normal3" style="margin-right: 10px;margin-top: 6px;">Message: </p>
                                        <p class="p16b" style="margin-bottom: 0px;margin-top:3px;">Lesson time will ONLY
                                            be granted for clients with confirmed payment (7 days prior to lesson).
                                            Admittance will not be granted without payment slip. Please note that seat will
                                            be withdrawn by the system automatically if payment has not been settled on or
                                            before the due date.<br><br>For new enrolled students, please send us the signed
                                            enrollment form with terms and conditions along with payment slip.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-top: 20px;margin-bottom: 10px;margin-left:-60px;">
                                <img src="../themes/tailwind/images/clipboard-image-64.png"
                                    style="width: 32px;margin-right: 10px;">
                                <p class="d-xxl-flex p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;">
                                    <strong>Invoice</strong></p>
                            </div><a href="{{ route('wave.invoice2') }}"class="button1" type="button"
                                style="width: 160px;border-radius:16px;text-decoration:none;color:white;">Preview</a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
