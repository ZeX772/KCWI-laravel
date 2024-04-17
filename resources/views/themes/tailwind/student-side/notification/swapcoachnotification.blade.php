@extends('theme::layouts.customer')

@section('style')
    <style>
        .p24bb {
            color: var(--app-color-tone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
        }

        .frame {
            background: var(--cm-scolor-white, #ffffff);
            border-radius: 20px;
            padding: 20px 23px 20px 23px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
            justify-content: flex-start;
            align-self: stretch;
            flex-shrink: 0;
            position: relative;
        }

        .p20b {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 20px;
            line-height: 28px;
            font-weight: 600;
            opacity: 0.75;
            position: relative;
        }

        .p16b {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 16px;
            font-weight: 600;
            position: relative;
            right: 0%;
            left: 0%;
            width: 100%;
            bottom: 0%;
            top: 0%;
            height: 100%;
        }
    </style>
@endsection

@section('content')


            

            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 100%;">
                <div style="margin-bottom: 30px; position: absolute;"
                    onclick="window.location.href='{{ route('wave.notification') }}'"><button class="button2" type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></div>
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                    style="margin-bottom: 0px;height: 31px;"><strong>Notification</strong></p></br>
                <div style="margin-bottom: 20px;">
                    <p class="p20b" style="text-align: left;"><strong>To (Student):</strong></p>
                    <div class="divcard2 frame">
                        <p class="p16b" style="margin-bottom: 0px;">Chris Chan</p>
                    </div>
                </div>
                <div style="margin-bottom: 20px;">
                    <p class="p20b" style="text-align: left;"><strong>Attachment:</strong></p>
                    <div class="d-md-flex d-xl-flex align-items-md-center align-items-xl-center">
                        <div class="d-md-flex d-xl-flex justify-content-md-center align-items-md-center align-items-xl-center attachdiv frame"
                            style="width: auto; margin-right: 20px;"><img
                                src="{{ asset('/themes/tailwind/images/attachmentlogo.png') }}" style="width: 35px;">
                            <p class="p14b">Confirmation.pdf</p>
                        </div>
                        <div class="d-md-flex d-xl-flex justify-content-md-center align-items-md-center align-items-xl-center attachdiv frame"
                            style="width: auto; margin-right: 20px;"><img
                                src="{{ asset('/themes/tailwind/images/attachmentlogo.png') }}" style="width: 35px;">
                            <p class="p14b">Confirmation.pdf</p>
                        </div>
                        <div class="d-md-flex d-xl-flex justify-content-md-center align-items-md-center align-items-xl-center attachdiv frame"
                            style="width: auto; margin-right: 20px;"><img
                                src="{{ asset('/themes/tailwind/images/attachmentlogo.png') }}" style="width: 35px;">
                            <p class="p14b">Confirmation.pdf</p>
                        </div>
                    </div>
                </div>
                <div style="margin-bottom: 20px;">
                    <p class="p20b" style="text-align: left;"><strong>Content:</strong></p>
                    <div class="divcard2 frame">
                        <p class="p16b" style="margin-bottom: 0px;text-align: left;">Coach swap Natalie Wong to Steven
                            Yuen<br>For GHS 7/9/2021 12:00<br><br>If you have any questions, please contact 22956066,
                            Whatsapp 5507 5333 or email to knock@hkswimmingacademy.com.</p>
                    </div>
                </div>
                <div style="margin-bottom: 20px;">
                    <p class="p20b" style="text-align: left;"><strong>Received Schedule:</strong></p>
                    <div class="divcard2 frame">
                        <p class="text-start p16b" style="margin-bottom: 0px;">Date: 01/06/2023<br>Time: 08:25</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('javascript')
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap-fileinput.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/Simple-Slider-swiper-bundle.min.js"></script>
    <script src="../assets/js/Simple-Slider.js"></script>
@endsection
