@extends('theme::layouts.customer')

@section('style')
    <style>
        .p28b {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 28px;
            font-size: 1.46vw;
            font-weight: 600;
            position: relative;
        }

        .p24bb {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 25px;
            font-weight: 700;
            position: relative;
            white-space: nowrap;
        }

        .p24b {
            color: #171433;
            text-align: left;
            font-family: var(--apptextstyles-h-4-heading-font-family,
                    "Poppins-Bold",
                    sans-serif);
            font-size: var(--apptextstyles-h-4-heading-font-size, 24px);
            font-weight: var(--apptextstyles-h-4-heading-font-weight, 700);
            position: relative;
        }

        .p16b {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 16px;
            font-size: 0.76vw;
            font-weight: 600;
            position: relative;
            margin-bottom: 5px;
        }

        .schedule-frame {
            background: var(--cm-scolor-white, #ffffff);
            border-radius: 20px;
            padding: 12px 23px 12px 23px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            flex-shrink: 0;
            max-width: 347px;
            max-height: 349px;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .p12green {
            background-color: #43F86B;
            border: 2px solid #43F86B;
            border-radius: 20px;
            padding: 0px 10px 0px 10px;
            box-shadow: 0 4px 8px rgba(35, 54, 86, 0.5);
            font-size: 0.625vw;
        }

        .p12 {
            color: #7168d3;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 12px;
            font-size: 0.625vw;
            font-weight: 600;
            -webkit-text-stroke: 1px var(--appcolortone-secondary-1, #233656);
        }

        .box-frame {
            display: flex;
            flex-direction: row;
            gap: 20px;
            align-items: flex-start;
            justify-content: flex-start;
            flex-shrink: 10;
            position: relative;
        }
    </style>
@endsection

@section('content')


            

            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 100vw;">
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                    style="margin-bottom: 20px;height: 31px; text-align: center;">My Schedule</p>
                <div style="width: 100%; margin-bottom: 30px; position: absolute;"><a href="{{ route('wave.home') }}"><button
                            class="button2" type="button"
                            style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                                class="fas fa-chevron-left"></i></button></a></div>
                <div class="d-md-flex d-xl-flex justify-content-md-center justify-content-xl-center"
                    style="margin-bottom: 20px;">
                    <div
                        style="fill: #FFF;filter: drop-shadow(0px 4px 4px rgba(35, 54, 86, 0.50));background-color: #ffffff;border-radius: 20px;width: 250px;">
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('wave.myschedules') }}'"
                            type="button"
                            style="width: 124px; border-color: white;border-style: none;background-color: white;color: #171433;border-radius: 20px;padding-left: 20px;padding-right: 20px;">Upcoming</button></a>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('wave.pastschedules') }}'"
                            type="button"
                            style="width: 126.5px; background-color: var(--app-color-tone-secondary-2, #AAC9E4);filter: drop-shadow(0px 4px 4px rgba(35, 54, 86, 0.50));border-radius: 20px;border-style: none; padding-left: 20px;padding-right: 20px;color: #171433;margin-left: -5px;">Past</button></a>
                    </div>
                </div>

                <div>
                    <div class="d-xl-flex justify-content-between align-items-xl-center">
                        <p class="p24b">November</p>
                    </div>
                    <div class="row row-cols-4">
                        <div class="col-6 col-sm-3" style="margin-bottom: 20px;">
                            <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                                <div
                                    class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center align-items-xxl-center">
                                    <p class="p28b" style="margin-bottom: 0px;"><strong>16/11/2022</strong></p>
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                        <p class="p12green" style="color: rgb(255,255,255);margin-bottom: 0px;">Present</p>
                                    </div>
                                    <div>
                                        <p class="p16b"><strong>Chris Chan</strong></p>
                                        <p class="p12"
                                            style="background: url(&quot;themes/tailwind/images/borderbox.png&quot;) center / contain no-repeat;text-align: center;">
                                            <strong>C100231</strong></p>
                                    </div>
                                </div>
                                <div class="d-xxl-flex align-items-xxl-center">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                    <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Class</td>
                                                    <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Level</td>
                                                    <td style="text-align: left;" class="p16b">VSA</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                            fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Facility</td>
                                                    <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
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
                        </div>
                        <div class="col-6 col-sm-3" style="margin-bottom: 20px;">
                            <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                                <div
                                    class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center align-items-xxl-center">
                                    <p class="p28b" style="margin-bottom: 0px;"><strong>16/11/2022</strong></p>
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                        <p class="p12green" style="color: rgb(255,255,255);margin-bottom: 0px;">Present
                                        </p>
                                    </div>
                                    <div>
                                        <p class="p16b"><strong>Chris Chan</strong></p>
                                        <p class="p12"
                                            style="background: url(&quot;themes/tailwind/images/borderbox.png&quot;) center / contain no-repeat;text-align: center;">
                                            <strong>C100231</strong></p>
                                    </div>
                                </div>
                                <div class="d-xxl-flex align-items-xxl-center">
                                    <div class="table-responsive" style="width: 100%;">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                    <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Class</td>
                                                    <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Level</td>
                                                    <td style="text-align: left;" class="p16b">VSA</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Facility</td>
                                                    <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
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
                        </div>
                        <div class="col-6 col-sm-3" style="margin-bottom: 20px;">
                            <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                                <div
                                    class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center align-items-xxl-center">
                                    <p class="p28b" style="margin-bottom: 0px;"><strong>16/11/2022</strong></p>
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                        <p class="p12green" style="color: rgb(255,255,255);margin-bottom: 0px;">Present
                                        </p>
                                    </div>
                                    <div>
                                        <p class="p16b"><strong>Chris Chan</strong></p>
                                        <p class="p12"
                                            style="background: url(&quot;themes/tailwind/images/borderbox.png&quot;) center / contain no-repeat;text-align: center;">
                                            <strong>C100231</strong></p>
                                    </div>
                                </div>
                                <div class="d-xxl-flex align-items-xxl-center">
                                    <div class="table-responsive" style="width: 100%;">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                    <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Class</td>
                                                    <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Level</td>
                                                    <td style="text-align: left;" class="p16b">VSA</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Facility</td>
                                                    <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
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
                        </div>
                        <div class="col-6 col-sm-3" style="margin-bottom: 20px;">
                            <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                                <div
                                    class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center align-items-xxl-center">
                                    <p class="p28b" style="margin-bottom: 0px;"><strong>16/11/2022</strong></p>
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                        <p class="p12green" style="color: rgb(255,255,255);margin-bottom: 0px;">Present
                                        </p>
                                    </div>
                                    <div>
                                        <p class="p16b"><strong>Chris Chan</strong></p>
                                        <p class="p12"
                                            style="background: url(&quot;themes/tailwind/images/borderbox.png&quot;) center / contain no-repeat;text-align: center;">
                                            <strong>C100231</strong></p>
                                    </div>
                                </div>
                                <div class="d-xxl-flex align-items-xxl-center">
                                    <div class="table-responsive" style="width: 100%;">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                    <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Class</td>
                                                    <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Level</td>
                                                    <td style="text-align: left;" class="p16b">VSA</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Facility</td>
                                                    <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
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
                        </div>
                        <div class="col-6 col-sm-3" style="margin-bottom: 20px;">
                            <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                                <div
                                    class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center align-items-xxl-center">
                                    <p class="p28b" style="margin-bottom: 0px;"><strong>16/11/2022</strong></p>
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                        <p class="p12green" style="color: rgb(255,255,255);margin-bottom: 0px;">Present
                                        </p>
                                    </div>
                                    <div>
                                        <p class="p16b"><strong>Chris Chan</strong></p>
                                        <p class="p12"
                                            style="background: url(&quot;themes/tailwind/images/borderbox.png&quot;) center / contain no-repeat;text-align: center;">
                                            <strong>C100231</strong></p>
                                    </div>
                                </div>
                                <div class="d-xxl-flex align-items-xxl-center">
                                    <div class="table-responsive" style="width: 100%;">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                    <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Class</td>
                                                    <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Level</td>
                                                    <td style="text-align: left;" class="p16b">VSA</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Facility</td>
                                                    <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
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
                        </div>
                        <div class="col-6 col-sm-3" style="margin-bottom: 20px;">
                            <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                                <div
                                    class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center align-items-xxl-center">
                                    <p class="p28b" style="margin-bottom: 0px;"><strong>16/11/2022</strong></p>
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                        <p class="p12green" style="color: rgb(255,255,255);margin-bottom: 0px;">Present
                                        </p>
                                    </div>
                                    <div>
                                        <p class="p16b"><strong>Chris Chan</strong></p>
                                        <p class="p12"
                                            style="background: url(&quot;themes/tailwind/images/borderbox.png&quot;) center / contain no-repeat;text-align: center;">
                                            <strong>C100231</strong></p>
                                    </div>
                                </div>
                                <div class="d-xxl-flex align-items-xxl-center">
                                    <div class="table-responsive" style="width: 100%;">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                    <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Class</td>
                                                    <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Level</td>
                                                    <td style="text-align: left;" class="p16b">VSA</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Facility</td>
                                                    <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
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
                        </div>
                        <div class="col-6 col-sm-3" style="margin-bottom: 20px;">
                            <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                                <div
                                    class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center align-items-xxl-center">
                                    <p class="p28b" style="margin-bottom: 0px;"><strong>16/11/2022</strong></p>
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                        <p class="p12green" style="color: rgb(255,255,255);margin-bottom: 0px;">Present
                                        </p>
                                    </div>
                                    <div>
                                        <p class="p16b"><strong>Chris Chan</strong></p>
                                        <p class="p12"
                                            style="background: url(&quot;themes/tailwind/images/borderbox.png&quot;) center / contain no-repeat;text-align: center;">
                                            <strong>C100231</strong></p>
                                    </div>
                                </div>
                                <div class="d-xxl-flex align-items-xxl-center">
                                    <div class="table-responsive" style="width: 100%;">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                    <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Class</td>
                                                    <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Level</td>
                                                    <td style="text-align: left;" class="p16b">VSA</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Facility</td>
                                                    <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
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
                        </div>
                        <div class="col-6 col-sm-3" style="margin-bottom: 20px;">
                            <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                                <div
                                    class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center align-items-xxl-center">
                                    <p class="p28b" style="margin-bottom: 0px;"><strong>16/11/2022</strong></p>
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                        <p class="p12green" style="color: rgb(255,255,255);margin-bottom: 0px;">Present
                                        </p>
                                    </div>
                                    <div>
                                        <p class="p16b"><strong>Chris Chan</strong></p>
                                        <p class="p12"
                                            style="background: url(&quot;themes/tailwind/images/borderbox.png&quot;) center / contain no-repeat;text-align: center;">
                                            <strong>C100231</strong></p>
                                    </div>
                                </div>
                                <div class="d-xxl-flex align-items-xxl-center">
                                    <div class="table-responsive" style="width: 100%;">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                    <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Class</td>
                                                    <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Level</td>
                                                    <td style="text-align: left;" class="p16b">VSA</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Facility</td>
                                                    <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
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
                        </div>
                        <div class="col-6 col-sm-3" style="margin-bottom: 20px;">
                            <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                                <div
                                    class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center align-items-xxl-center">
                                    <p class="p28b" style="margin-bottom: 0px;"><strong>16/11/2022</strong></p>
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                        <p class="p12green" style="color: rgb(255,255,255);margin-bottom: 0px;">Present
                                        </p>
                                    </div>
                                    <div>
                                        <p class="p16b"><strong>Chris Chan</strong></p>
                                        <p class="p12"
                                            style="background: url(&quot;themes/tailwind/images/borderbox.png&quot;) center / contain no-repeat;text-align: center;">
                                            <strong>C100231</strong></p>
                                    </div>
                                </div>
                                <div class="d-xxl-flex align-items-xxl-center">
                                    <div class="table-responsive" style="width: 100%;">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                    <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Class</td>
                                                    <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Level</td>
                                                    <td style="text-align: left;" class="p16b">VSA</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Facility</td>
                                                    <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
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
                        </div>
                        <div class="col-6 col-sm-3" style="margin-bottom: 20px;">
                            <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                                <div
                                    class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center align-items-xxl-center">
                                    <p class="p28b" style="margin-bottom: 0px;"><strong>16/11/2022</strong></p>
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                        <p class="p12green" style="color: rgb(255,255,255);margin-bottom: 0px;">Present
                                        </p>
                                    </div>
                                    <div>
                                        <p class="p16b"><strong>Chris Chan</strong></p>
                                        <p class="p12"
                                            style="background: url(&quot;themes/tailwind/images/borderbox.png&quot;) center / contain no-repeat;text-align: center;">
                                            <strong>C100231</strong></p>
                                    </div>
                                </div>
                                <div class="d-xxl-flex align-items-xxl-center">
                                    <div class="table-responsive" style="width: 100%;">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                    <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Class</td>
                                                    <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Level</td>
                                                    <td style="text-align: left;" class="p16b">VSA</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Facility</td>
                                                    <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
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
                        </div>
                        <div class="col-6 col-sm-3" style="margin-bottom: 20px;">
                            <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                                <div
                                    class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center align-items-xxl-center">
                                    <p class="p28b" style="margin-bottom: 0px;"><strong>16/11/2022</strong></p>
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                        <p class="p12green" style="color: rgb(255,255,255);margin-bottom: 0px;">Present
                                        </p>
                                    </div>
                                    <div>
                                        <p class="p16b"><strong>Chris Chan</strong></p>
                                        <p class="p12"
                                            style="background: url(&quot;themes/tailwind/images/borderbox.png&quot;) center / contain no-repeat;text-align: center;">
                                            <strong>C100231</strong></p>
                                    </div>
                                </div>
                                <div class="d-xxl-flex align-items-xxl-center">
                                    <div class="table-responsive" style="width: 100%;">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                    <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Class</td>
                                                    <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Level</td>
                                                    <td style="text-align: left;" class="p16b">VSA</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Facility</td>
                                                    <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill" style="width: 8px;color: #233656;">
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
                        </div>
                        <div class="col-6 col-sm-3" style="margin-bottom: 20px;">
                            <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                                <div
                                    class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center align-items-xxl-center">
                                    <p class="p28b" style="margin-bottom: 0px;"><strong>16/11/2022</strong></p>
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                        <p class="p12green" style="color: rgb(255,255,255);margin-bottom: 0px;">Present
                                        </p>
                                    </div>
                                    <div>
                                        <p class="p16b"><strong>Chris Chan</strong></p>
                                        <p class="p12"
                                            style="background: url(&quot;themes/tailwind/images/borderbox.png&quot;) center / contain no-repeat;text-align: center;">
                                            <strong>C100231</strong></p>
                                    </div>
                                </div>
                                <div class="d-xxl-flex align-items-xxl-center">
                                    <div class="table-responsive" style="width: 100%;">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill"
                                                            style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                    <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill"
                                                            style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Class</td>
                                                    <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill"
                                                            style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Level</td>
                                                    <td style="text-align: left;" class="p16b">VSA</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill"
                                                            style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Facility</td>
                                                    <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill"
                                                            style="width: 8px;color: #233656;">
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
                        </div>
                        <div class="col-6 col-sm-3" style="margin-bottom: 20px;">
                            <div class="d-xl-flex flex-column divcard schedule-frame" style="padding: 15px;">
                                <div
                                    class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center align-items-xxl-center">
                                    <p class="p28b" style="margin-bottom: 0px;"><strong>16/11/2022</strong></p>
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center green">
                                        <p class="p12green" style="color: rgb(255,255,255);margin-bottom: 0px;">Present
                                        </p>
                                    </div>
                                    <div>
                                        <p class="p16b"><strong>Chris Chan</strong></p>
                                        <p class="p12"
                                            style="background: url(&quot;themes/tailwind/images/borderbox.png&quot;) center / contain no-repeat;text-align: center;">
                                            <strong>C100231</strong></p>
                                    </div>
                                </div>
                                <div class="d-xxl-flex align-items-xxl-center">
                                    <div class="table-responsive" style="width: 100%;">
                                        <table class="table">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill"
                                                            style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Time</td>
                                                    <td style="text-align: left;" class="p16b">08:00 - 08:45</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill"
                                                            style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Class</td>
                                                    <td style="text-align: left;" class="p16b">Ripplet Starter 2</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill"
                                                            style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Level</td>
                                                    <td style="text-align: left;" class="p16b">VSA</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill"
                                                            style="width: 8px;color: #233656;">
                                                            <circle cx="8" cy="8" r="8"></circle>
                                                        </svg></td>
                                                    <td class="p16b" style="text-align: left;">Facility</td>
                                                    <td style="text-align: left;" class="p16b">VSA Main Pool</td>
                                                </tr>
                                                <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                    <td><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                            height="1em" fill="currentColor" viewBox="0 0 16 16"
                                                            class="bi bi-circle-fill"
                                                            style="width: 8px;color: #233656;">
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
