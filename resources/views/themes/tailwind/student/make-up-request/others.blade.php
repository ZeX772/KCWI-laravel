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
            padding: 0px 20px 0px 20px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: flex-start;
            flex-shrink: 0;
            height: auto;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow, 0px 4px 4px 0px rgba(35, 54, 86, 0.5));
            outline: none;
            min-width: 600px;
        }

        .p24b {
            color: #171433;
            text-align: left;
            font-family: var(--app-text-styles-h4-heading-font-family,
                    "Poppins-Bold",
                    sans-serif);
            font-size: var(--app-text-styles-h4-heading-font-size, 24px);
            font-weight: var(--app-text-styles-h4-heading-font-weight, 700);
            position: relative;
        }

        .button1 {
            background: #233656;
            color: white;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            justify-content: center;
            position: relative;
            font-size: 1.2em;
            padding: 24px 48px;
            border-radius: 16px;
            box-shadow: var(--app-dropshadow-box-shadow, 0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .p16b {
            color: var(--app-color-tone-primary, #171433);
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            font-weight: 600;

        }

        .p28b {
            color: var(--app-color-tone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 28px;
            font-weight: 600;
            position: relative;
        }

        .p18b {
            color: var(--app-color-tone-primary, #171433);
            text-align: left;
            font-family: var(--barlow-copy-1-font-family, "Barlow-Medium", sans-serif);
            font-size: var(--barlow-copy-1-font-size, 18px);
            font-weight: var(--barlow-copy-1-font-weight, 500);
            position: relative;
            margin-top: 10px;
        }

        .p24bb {
            color: var(--app-color-tone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 24px;
            line-height: 28px;
            font-weight: 600;
            position: relative;
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
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: relative;
            max-width: 150px;
            height: auto;
            top: -5px;
        }

        .rejected {
            background: var(--app-color-tone-warning-color, #ff4d4d);
            border-radius: 12px;
            padding: 4px 12px 4px 12px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: relative;
            max-width: 150px;
            height: auto;
            top: -5px;
            padding-left: -20px;
            left: -20px;
        }

        .completed {
            background: var(--app-color-tone-green, #43f86b);
            border-radius: 12px;
            padding: 4px 12px 4px 12px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: relative;
            max-width: 150px;
            height: auto;
            top: -5px;
            padding-left: -20px;
            left: -20px;
        }
    </style>
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="background:#f2f1f9;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;min-height:100vh;">
                <a href="{{ route('wave.make-up/request') }}">
                    <button class type="button"
                        style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                        <i class="fas fa-chevron-left"></i></button></a>
                <div style="width: 100%;margin-bottom: 30px;">
                    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24b1"
                        style="margin-bottom: 30px;margin-top:-30px;height: 31px;text-align: center;"><strong>Make Up
                            Request</strong></p>
                </div>

                <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center"
                    placeholder="">
                    <div style="width: 50%;">
                        <div class="d-xl-flex justify-content-between align-items-xl-center" style="margin-bottom: 10px;">
                            <p class="p24bb" style="margin-bottom: 0px;">Make Up Request:</p>
                            <div class="rejected">
                                <p class="text"style="margin-bottom: 0px;"><strong>Rejected</strong></p>
                            </div>
                        </div>
                        <div class="box d-xl-flex flex-column divcard" style="padding: 15px;margin-bottom: 10px;">
                            <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center"
                                style="width: 100%;">
                                <p class="p28b" style="margin-bottom: 0px;padding-left:20px;margin-top:10px;">24/11/2022
                                </p>
                            </div>
                            <div class=" d-xxl-flex align-items-start">
                                <div class="table-responsive" style="width:auto;overflow-x:hidden;">
                                    <table class="table" style="margin-right:250px;">
                                        <tbody>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Time</td>
                                                <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                            </tr>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Class Level</td>
                                                <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                            </tr>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Venue</td>
                                                <td style="text-align: left;" class="p16b">VSA</td>
                                            </tr>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Facility</td>
                                                <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                            </tr>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Class Code</td>
                                                <td style="text-align: left;" class="p16b">VSA-RS2-0001-01</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="d-xl-flex justify-content-between align-items-xl-center" style="margin-bottom: 10px;">
                            <p class="p24bb" style="margin-bottom: 0px;">Remarks</p>
                        </div>
                        <div class="box d-xl-flex flex-column divcard" style="padding: 15px;margin-bottom: 10px;">
                            <p class="p16b" style="text-align:left;">As per conversation on 22 Nov, we will arrange a
                                make up class on 30 Nov. If you have any question, please contact 2295 6066 or whatsapp
                                55075333.</p>
                        </div>
                        <p class="p24bb">Apply for Leave:</p>
                        <div class="box d-xl-flex flex-column divcard" style="padding: 15px;height:auto;">
                            <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center"
                                style="width: 100%;">
                                <p class="p28b" style="margin-bottom: 0px;padding-left:20px;margin-top:-20px;">9/11/2022
                                </p>
                                <div>
                                    <p class="p16b" style="margin-bottom: 5px;">Chris Chan</p>
                                    <p class="p12"
                                        style="background: url('{{ asset('themes/tailwind/images/clipboard-image-111.png') }}') center / contain no-repeat;text-align: center;">
                                        <strong>C100231</strong></p>
                                </div>
                            </div>
                            <div class=" d-xxl-flex align-items-start">
                                <div class="table-responsive" style="width:auto;overflow-x:hidden;">
                                    <table class="table" style="margin-right:250px;">
                                        <tbody>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Time</td>
                                                <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                            </tr>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Class Level</td>
                                                <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                            </tr>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Venue</td>
                                                <td style="text-align: left;" class="p16b">VSA</td>
                                            </tr>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Facility</td>
                                                <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                            </tr>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Class Code</td>
                                                <td style="text-align: left;" class="p16b">VSA-RS2-0001-01</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <p class="p24bb" style="margin-top: 20px;">Reason for Leaving:</p>
                        <div class="box divcard">
                            <p class="p18b" style="padding: 10px;padding-left: 20px;text-align: left;"><strong>Sick
                                    Leave</strong></p>
                        </div>
                        <p class="p24bb" style="margin-top: 20px;">Specify:</p>
                        <div class="box divcard">
                            <p class="p18b" style="padding: 10px;padding-left: 20px;text-align: left;"><strong>take a
                                    leave of absence are to recover from a serious illness</strong></p>
                        </div>
                        <p class="p24bb" style="margin-top: 20px;">Attachment:</p>
                        <div class="button1" style="width: 160px;height: 30px;left:-1%;text-decoration:none;color:white;">
                            Preview</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
