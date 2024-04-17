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
                <a href="{{ route('wave.sick-leave', ['id' => $student_id, 'leaveID' => $leave_id]) }}">
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
                        <img src="{{ $entry['image_path'] }}" style="width: 100%;">
                        </div>
                </div>
    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
