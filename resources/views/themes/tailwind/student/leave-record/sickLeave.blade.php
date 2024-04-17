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
    </style>
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="background:#f2f1f9;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;min-height:100vh;">
                <a href="{{ route('wave.leave-record', $student_id) }}">
                    <button class type="button"
                        style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                        <i class="fas fa-chevron-left"></i></button></a>
                <div style="width: 100%;margin-bottom: 30px;">
                    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24b1"
                        style="margin-bottom: 30px;margin-top:-30px;height: 31px;text-align: center;"><strong>Leave
                            Records</strong></p>
                </div>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center"
                    placeholder="">
                    <div style="width: 50%;">
                        <p class="p24bb">Class:</p>
                        <div class="box d-xl-flex flex-column divcard" style="padding: 15px;height:auto;">
                            <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center"
                                style="width: 100%;">
                                <p class="p28b" style="margin-bottom: 0px;padding-left:20px;margin-top:-20px;">{{ $entry['class']['start_date'] }}
                                </p>
                                <div>
                                    <p class="p16b" style="margin-bottom: 5px;">{{ $entry['student']['name'] }}</p>
                                    <p class="p12"
                                        style="background: url(&quot;../themes/tailwind/images/clipboard-image-11.png&quot;) center / contain no-repeat;text-align: center;">
                                        <strong>{{ $entry['student']['student_information']['hkid'] }}</strong></p>
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
                                                <td style="text-align: left;" class="p16b">{{ $entry['class']['start_time'] }} - {{ $entry['class']['end_time'] }}</td>
                                            </tr>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Class Level</td>
                                                <td style="text-align: left;" class="p16b">{{ $entry['class']['course']['level']['name'] }}</td>
                                            </tr>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Venue</td>
                                                <td style="text-align: left;" class="p16b">{{ $entry['class']['course']['venue']['name'] }}</td>
                                            </tr>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><span style="color: rgb(35, 54, 86);"> </span><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Facility</td>
                                                <td style="text-align: left;" class="p16b">{{ $entry['class']['course']['facility']['name'] }}</td>
                                            </tr>
                                            <tr style="border-bottom: 2px solid rgba(171,171,171,0.26);">
                                                <td><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewBox="0 0 16 16" class="bi bi-circle-fill"
                                                        style="width: 8px;color: #233656;margin-top:4px;">
                                                        <circle cx="8" cy="8" r="8"></circle>
                                                    </svg></td>
                                                <td class="p16b" style="text-align: left;">Class Code</td>
                                                <td style="text-align: left;" class="p16b">{{ $entry['class']['course_class_code'] }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <p class="p24bb" style="margin-top: 20px;">Reason for Leaving:</p>
                        <div class="box divcard">
                            <p class="p18b" style="padding: 10px;padding-left: 20px;text-align: left;">
                            <strong>{{ $entry['reason'] }}</strong>
                        </p>
                        </div>
                        <p class="p24bb" style="margin-top: 20px;">Specify:</p>
                        <div class="box divcard">
                            <p class="p18b" style="padding: 10px;padding-left: 20px;text-align: left;">
                                <strong>{{ $entry['remarks'] }}</strong>
                            </p>
                        </div>
                        <p class="p24bb" style="margin-top: 20px;">Attachment:</p>
                            @if( $entry['attachment'] )
                                <a href ="{{ route('wave.medical-cert', ['id' => $student_id, 'leaveID' => $leave_id]) }}" class="button1"
                            style="width: 160px;height: 30px;left:-1%;text-decoration:none;color:white;">Preview</a>
                            @else
                                <span>No Attachment</span>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
