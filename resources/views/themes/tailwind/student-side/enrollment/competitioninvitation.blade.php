@extends('theme::layouts.customer')

@section('style')
    <style>
        .p24bb {
            color: var(--app-color-tone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
        }

        .p18b {
            padding-left: 160px;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 18px;
            font-weight: 500;
            position: relative;
        }

        .p16b {
            color: rgba(23, 20, 51, 0.7);
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            font-weight: 500;
            position: relative;
        }

        .p16normal2 {
            color: var(--app-color-tone-secondary-1-50percent, rgba(35, 54, 86, 0.5));
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 13px;
            line-height: 18px;
            font-weight: 500;
            position: relative;
        }

        .p13 {
            color: var(--app-color-tone-secondary-1-50percent, rgba(35, 54, 86, 0.5));
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 13px;
            line-height: 18px;
            font-weight: 500;
            position: relative;
        }

        .p13normal {
            color: var(--app-color-tone-primary, #171433);
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 13px;
            line-height: 18px;
            font-weight: 500;
            position: relative;
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
            box-shadow: var(--app-drop-shadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .button1 {
            background: var(--app-color-tone-secondary-1, #233656);
            box-shadow: var(--app-drop-shadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
            border-radius: 30px;
            flex-shrink: 0;
            color: #ffffff;
            text-align: center;
            font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
            top: calc(50% - 8.5px);
            padding: 10px 30px 10px 30px;
            width: 100%;
        }
    </style>
@endsection

@section('content')


            

            <div class="d-flex flex-column" id="content-wrapper"
                style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 100%;">
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                    style="margin-bottom: 0px;height: 31px;"><strong>Competition Enrollment</strong></p>
                <div style="margin-bottom: 30px; position: absolute;"
                    onclick="window.location.href='{{ route('wave.enrollment') }}'"><button class="button2" type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></div>

                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                    <div style="width: 50%;">
                        <div style="margin-top: 50px;">
                            <p class="p16b" style="text-align: left;">Chris Chan joined a competition and he invited you
                                to join !</p>
                        </div>
                        <div>
                            <div class="d-xl-flex flex-column divcard frame" style="padding: 15px;padding-left: 30px;">
                                <div class="d-xxl-flex flex-column align-items-xxl-start">
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Enrollment type:
                                        </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">Competition Enrollment</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Name: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">Chris Chan</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Age Group: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">14-15 years old</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-start align-items-xxl-start"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Categories: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">Mixed 4x100m Freestyle
                                            Relay&nbsp;<br>(09:00-10:00)</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Venue: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">VSA Main Pool</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Date: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">04/02, 11/02, 18/02, 25/02</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                        <p class="p13" style="margin-right: 10px;margin-bottom: 0px;">Time: </p>
                                        <p class="p13normal" style="margin-bottom: 0px;">08:00 - 08:45</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start align-items-xxl-start">
                                <p class="p16normal2" style="margin-bottom: 5px;margin-top: 50px;">If you haven’t been kcwi
                                    student before,</p>
                                <p class="d-xxl-flex p16b"
                                    style="text-decoration: underline; font-size: 13px; color: #171433;">fill in the
                                    enrollment form and register now!</p>
                            </div>
                        </div>
                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center"
                            style="margin-top: 30px;"><button class="button1" type="button"
                                style="width: 100%;padding-left: 20px;padding-right: 20px;" data-bs-toggle="modal"
                                data-bs-target="#modal-1">Accept Chris’s Invitation</button></div>
                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center justify-content-xxl-center align-items-xxl-center"
                            style="margin-top: 30px;border-bottom-width: 1px;border-bottom-style: solid;">
                            <a href="{{ route('wave.enrollment') }}" class="p18b"
                                style="cursor: pointer; margin-bottom: 5px; text-decoration: none; color: black;">Not Accept
                                Chris’s Invitation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal2" role="dialog" tabindex="-1" id="modal-1"
            style="border-style: none; padding-bottom: 500px;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-style: none;">
                    <div class="modal-body d-xl-flex flex-column justify-content-evenly align-items-xl-center"
                        style="margin-left: 150px; width: 270px;position: absolute; height: 500px;border-radius: 200px;background: var(--app-color-tone-secondary-2, #AAC9E4);border-style: none;">
                        <img src="{{ asset('themes/tailwind/images/clipboard-image-61.png') }}" style="width: 217px;">
                        <p class="p20b" style="text-align: center;"><strong>Enrollment form was received. We will send you
                                a&nbsp;</strong><br><strong>confirmation.</strong></p><button class="button1" type="button"
                            data-bs-dismiss="modal" style="width: 188px;">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
