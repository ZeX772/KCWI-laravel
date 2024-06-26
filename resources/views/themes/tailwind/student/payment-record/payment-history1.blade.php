@extends('theme::layouts.customer')

@section('style')
    <style>
        .navbar {
            background: #FFF;
            padding: 20px;
            position: left;
            min-height: 0px;
            top: 0;
            left: 0;
            right: 0;
            box-shadow: 10px 0 10px -10px rgba(0, 0, 0, 0.25);
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

        .p24b1 {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
            font-weight: 700;
            margin-right: 0%;
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
        }

        .box {
            background: #ffffff;
            border-radius: 24px;
            padding: 15px 20px 15px 20px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: flex-start;
            flex-shrink: 0;
            width: 710px;
            height: auto;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow, 0px 4px 4px 0px rgba(35, 54, 86, 0.5));
            outline: none;
        }


        .button1 {
            background: #233656;
            color: white;
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 125%;
            align-items: center;
            justify-content: center;
            position: relative;
            font-size: 1.2em;
            padding: 24px 48px;
            border-radius: 40.5px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        }

        .p20b {
            color: var(--app-color-tone-primary, #171433);
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 20px;
            font-weight: 600;

        }

        .p13normal {
            color: #171433;
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 549;
            position: relative;
        }

        .p13 {
            color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            line-height: 18px;
            font-weight: 300;
            position: relative;
            font-weight: bold;
        }

        .text {
            color: var(--app-color-tone-white, #ffffff);
            text-align: center;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 400;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .process {
            background: var(--cms-color-body-light, rgba(122, 122, 122, 0.5));
            border-radius: 12px;
            padding: 4px 12px 4px 12px;
            height: auto;
        }
    </style>
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="background:#f2f1f9;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;min-height:100vh;">
                <a href="{{ route('wave.payment-history') }}">
                    <button class type="button"
                        style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                        <i class="fas fa-chevron-left"></i></button></a>
                <div style="width: 100%;margin-bottom: 30px;">
                    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24b1"
                        style="margin-bottom: 60px;margin-top:-30px;height: 31px;text-align: center;"><strong>Payment
                            History</strong></p>
                    <div
                        class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center"style="outline:none;">
                        <div class="position-relative">
                            <div class="d-xl-flex align-items-xl-center" style="margin-bottom: 20px;">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('/themes/tailwind/images/clipboard-image-55.png') }}" style="width: 16px;height: 16px;margin-right: 10px;">
                                    <p class="p20b" style="margin-bottom: 0px;"><strong>Course Details</strong></p>
                                </div>
                                <div class="process status-bg-color_{{ $entry['status'] }}">
                                    <p class="text"style="margin-bottom: 0px;"><strong>{{ $entry['status_label'] }}</strong></p>
                                </div>
                            </div>
                            @foreach( $entry['active_filtered_student_classes'] as $student_class )
                                <div class="box divcard mb-3" style="padding: 15px;padding-left: 30px;">
                                    <div class="d-xxl-flex flex-column align-items-xxl-start">
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                            style="margin-bottom: 10px;">
                                            <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Course Type: </p>
                                            <p class="p13normal" style="margin-bottom: 0px;">{{ $entry['type_label'] }}</p>
                                        </div>
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                            style="margin-bottom: 10px;">
                                            <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Course Code: </p>
                                            <p class="p13normal" style="margin-bottom: 0px;">{{ optional($student_class['class']['course'])['course_abbreviation'] }}</p>
                                        </div>
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                            style="margin-bottom: 10px;">
                                            <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Level: </p>
                                            <p class="p13normal" style="margin-bottom: 0px;">{{ optional($student_class['class']['course']['level'])['name'] }}</p>
                                        </div>
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                            style="margin-bottom: 10px;">
                                            <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Venue: </p>
                                            <p class="p13normal" style="margin-bottom: 0px;">{{ optional($student_class['class']['course']['venue'])['name'] }}</p>
                                        </div>
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                            style="margin-bottom: 10px;">
                                            <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Facility: </p>
                                            <p class="p13normal" style="margin-bottom: 0px;">{{ optional($student_class['class']['course']['facility'])['name'] }}</p>
                                        </div>
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                            style="margin-bottom: 10px;">
                                            <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Date: </p>
                                            <p class="p13normal" style="margin-bottom: 0px;">{{ optional($student_class['class'])['start_date'] }}</p>
                                        </div>
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                            <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Time: </p>
                                            <p class="p13normal" style="margin-bottom: 0px;">{{ optional($student_class['class'])['start_time'] }} - {{ optional($student_class['class'])['end_time'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-top: 20px;margin-bottom: 10px;"><img
                                    src="{{ asset('/themes/tailwind/images/clipboard-image-63.png') }}"
                                    style="width: 16px;margin-right: 10px;">
                                <p class="p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;">
                                    <strong>Student Details</strong></p>
                            </div>
                            <div class="divcard">
                                <div class="box d-xxl-flex flex-column align-items-xxl-start">
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Student Name: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ optional($entry['user'])['name'] }}</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Student ID: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ optional($entry['user']['student_information'])['hkid'] }}</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Phone: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ optional($entry['user']['student_information'])['phone'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-top: 20px;margin-bottom: 10px;"><img
                                    src="{{ asset('/themes/tailwind/images/clipboard-image-64.png') }}"
                                    style="width: 23px;margin-right: 10px;">
                                <p class="p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;">
                                    <strong>Payment Review</strong></p>
                            </div>
                            <div class="divcard">
                                <div class="box d-xxl-flex flex-column align-items-xxl-start">
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Total fee (RM):
                                        </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ $entry['payment'] ? optional($entry['payment'])['total_fee'] : $entry['total_fee'] }}</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Expiry Date (Pay
                                            before this date): </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">{{ $entry['payment'] ? optional($entry['payment'])['payment_date'] : "-" }}</p>
                                    </div>
                                    <div class="d-xxl-flex align-items-xxl-center"></div>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-top: 20px;margin-bottom: 10px;"><img
                                    src="{{ asset('/themes/tailwind/images/clipboard-image-55.png') }}"
                                    style="width: 16px;margin-right: 10px;">
                                <p class="d-xxl-flex p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;">
                                    <strong>Message</strong></p>
                            </div>
                            <div class="divcard">
                                <div class="box d-xxl-flex flex-column align-items-xxl-start">
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-start align-items-xxl-start"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;margin-top:6px;">
                                            Message: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">Lesson time will ONLY be granted
                                            for clients with confirmed payment (7 days prior to lesson). Admittance will not
                                            be granted without payment slip. Please note that seat will be withdrawn by the
                                            system automatically if payment has not been settled on or before the due
                                            date.<br><br>For new enrolled students, please send us the signed enrollment
                                            form with terms and conditions along with payment slip.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-top: 20px;margin-bottom: 10px;"><img
                                    src="{{ asset('/themes/tailwind/images/clipboard-image-64.png') }}"
                                    style="width: 32px;margin-right: 10px;">
                                <p class="d-xxl-flex p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;">
                                    <strong>Invoice</strong></p>
                            </div>
                            @if( $entry['invoice_item']['invoice']['pdf_url'] )
                                <a href="{{ route('wave.invoice1') }}"class="button1" type="button" style="width: 160px;height: 30px;border-radius:16px;text-decoration:none;color:white;">Preview</a>
                            @else
                                <p>No Invoice Created</p>
                            @endif
                        </div>
                    </div>
                </div>
    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
