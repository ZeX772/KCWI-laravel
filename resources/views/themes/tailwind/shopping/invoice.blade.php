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
            color: rgba(23, 20, 51, 0.7);
            text-align: center;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            font-weight: bold;
        }

        .box1 {
            background: #ffffff;
            padding: 0px 24px 0px 24px;
            min-height: 40px;
            flex-direction: column;
            gap: 12px;
            align-items: center;
            justify-content: flex-start;
            min-width: 110%;
            border-radius: 24px;
            margin-left: -30px;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .button1 {
            margin-top: -30px;
            min-height: 65px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex: 1;
            position: relative;
            font-size: 1.2em;
            padding: 24px 72px;
            border-radius: 33.5px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
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
            /* margin-left:430px; */
        }

        .container-fluid {
            display: flex;
            flex-direction: column;

        }
    </style>
@endsection

@section('content')

    <body id="page-top" style="height: 100vh; margin: 0;">
        <div id="wrapper" class="d-flex" style="min-height: 100vh;">
            

            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);height: 100vh;">
                <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                    <div style="display: flex; align-items: center;">
                        <div
                            class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                            <a href="{{ url()->previous() }}">
                                <button class type="button"
                                    style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                                    <i class="fas fa-chevron-left"></i></button></a>
                        </div>
                    </div>

                    <p class="shopping d-xl-flex justify-content-xl-center align-items-xl-center "
                        style="margin-bottom: 0px;height: 31px;text-align: center;margin-left:-140px;">
                        <strong>Preview</strong></p>
                    <div>
                    </div>
                </div>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center"
                    style="min-height: 50vh; background: var(--app-color-tone-bg-color, #F1F2F9);">
                    <div style="width: 50%;min-height: 50vh;">
                        <img src="../themes/tailwind/images/clipboard-image-88.png"
                            style="width: 100%; max-height: 100%; height: auto;">
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="modal fade modal2" role="dialog" tabindex="-1" id="modal-1" style="border-style: none;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body d-xl-flex flex-column justify-content-evenly align-items-xl-center"
                        style="height: 509px;border-radius: 200px;background: var(--app-color-tone-secondary-2, #AAC9E4);border-style: none;">
                        <img src="{{ asset('themes/tailwind/images/clipboard-image-61.png') }}" style="width: 217px;">
                        <p class="p20b"><strong>Enrollment form was received. We will send you
                                a&nbsp;</strong><br><strong>confirmation.</strong></p><button class="button1" type="button"
                            data-bs-dismiss="modal" style="width: 188px;">Done</button>
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
