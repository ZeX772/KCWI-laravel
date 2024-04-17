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

        .p24bb {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
            font-weight: 700;
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
        }

        .box {
            left: -4%;
            width: 43%;
            background: #ffffff;
            border-radius: 72px;
            padding: 12px 12px 12px 12px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
            justify-content: flex-start;
            align-self: stretch;
            flex-shrink: 0;
            height: 120px;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .p48 {
            color: #ffffff;
            text-align: left;
            font-family: var(--app-text-styles-h1-heading-font-family,
                    "Poppins-Bold",
                    sans-serif);
            font-size: var(--app-text-styles-h1-heading-font-size, 48px);
            font-weight: var(--app-text-styles-h1-heading-font-weight, 700);
            position: relative;
        }

        .p18white {
            color: #ffffff;
            text-align: left;
            font-family: var(--text-text-medium-1-font-family,
                    "Poppins-Medium",
                    sans-serif);
            font-size: var(--text-text-medium-1-font-size, 18px);
            font-weight: var(--text-text-medium-1-font-weight, 500);
            position: relative;
        }

        .p36 {
            color: #ffffff;
            text-align: left;
            font-family: var(--app-text-styles-h3-heading-font-family,
                    "Poppins-Bold",
                    sans-serif);
            font-size: var(--app-text-styles-h3-heading-font-size, 36px);
            font-weight: var(--app-text-styles-h3-heading-font-weight, 700);
            position: relative;
        }

        .p22white {
            color: #ffffff;
            text-align: left;
            font-family: var(--text-text-medium-1-font-family,
                    "Poppins-Medium",
                    sans-serif);
            font-size: var(--text-text-medium-1-font-size, 22px);
            font-weight: var(--text-text-medium-1-font-weight, 500);
            position: relative;
        }

        .p22bold {
            color: #171433;
            text-align: left;
            font-family: var(--app-text-styles-app-title-22-font-family,
                    "Barlow-SemiBold",
                    sans-serif);
            font-size: var(--app-text-styles-app-title-22-font-size, 22px);
            font-weight: var(--app-text-styles-app-title-22-font-weight, 600);
            position: relative;
        }

        .frame-2608793 {
            padding: 0px 102px 0px 102px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
            justify-content: flex-start;
            flex-shrink: 0;
            height: auto;
            position: relative;
            overflow: visible;
        }
    </style>
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="background-image: linear-gradient(350deg, #AAC9E4 1.08%, #233656 73.2%);padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;min-height:100vh;">
                <a href="{{ route('wave.student1', $student_id) }}">
                    <button class type="button"
                        style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                        <i class="fas fa-chevron-left"></i></button>
                </a>
                <div>
                    <div class="divback"
                        style="position: fixed;transform: translate(555px) translateX(434%) translateY(531px);">
                    </div>
                    <div style="width: 100%;margin-bottom: 30px;" class="mt-5">
                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                            <div style="margin-right: 30px;">
                                <img src="{{ $entry['user']['image_path'] }}"
                                    style="width: 143px;padding: 15px;background: rgba(133,135,150,0.33);border-top-left-radius: 100px;border-top-right-radius: 100px;border-bottom-right-radius: 100px;border-bottom-left-radius: 100px;height: 143px;"
                                    width="200" height="201">
                            </div>
                            
                            <div>
                                <p class="p48" style="text-align: center;margin-bottom: 10px;">{{ $entry['user']['name'] }}</p>
                                <p class="p18white">{{ isset($entry['user']['student_information']['level']) && !empty($entry['user']['student_information']['level']) ?$entry['user']['student_information']['level']['name']:'' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="" style="width: 100%;margin-bottom: 30px;">
                        <div style="width: 1050px; margin-left: 174px;">
                            <p class="p36">My Current Level</p>
                            @foreach( $entry['previous'] as $previous )
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                                    <img src="../themes/tailwind/images/star.png" style="width: 100px;margin-right: 30px;">
                                    <div>
                                        <p class="p22white" style="margin-bottom: 5px;"><strong>{{ $previous['package']['course']['level']['name'] }}</strong></p>
                                        <p class="p18white" id="">Completion Date: {{ formatDate($previous['updated_at'], 'd M Y') }}</p>
                                    </div>
                                </div>
                            @endforeach

                            @foreach( $entry['upcomming'] as $key => $upcomming )
                                @if( $key == 0 )
                                    <a href="{{ route('wave.ripple', ['id' => $upcomming['user_id'], 'enrollmentID' => $upcomming['id']]) }}" style="text-decoration:none">
                                        <div class="box d-xxl-flex align-items-xxl-center" style="margin-bottom: 10px;">
                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center divcard"
                                                style="width: 486px;padding: 20px;border-top-left-radius: 100px;border-top-right-radius: 100px;border-bottom-right-radius: 100px;border-bottom-left-radius: 100px;margin-top:-20px;">
                                                <img src="../themes/tailwind/images/user.png"
                                                    style="width: 100px;margin-right: 30px;margin-left:37px;">
                                                <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center"
                                                    style="width: 100%;">
                                                    <p class=" p22bold" style="margin-bottom: 0px;">{{ $upcomming['package']['course']['level']['name'] }}</p> 
                                                    <svg
                                                        class="icn" width="13" height="20" viewBox="0 0 13 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        style="right:1%;margin-right:40px;">
                                                        <path
                                                            d="M12.0849 9.21844L3.18667 0.319678C2.98114 0.114947 2.70286 -8.48178e-07 2.41276 -8.7354e-07C2.12267 -8.98903e-07 1.84439 0.114947 1.63886 0.319678L0.983234 0.975343C0.778102 1.18067 0.662873 1.45905 0.662873 1.7493C0.662873 2.03954 0.778102 2.31792 0.983234 2.52325L8.4553 9.99577L0.974788 17.4768C0.770068 17.6823 0.655124 17.9606 0.655124 18.2507C0.655124 18.5408 0.770068 18.8191 0.974788 19.0247L1.63041 19.6803C1.83595 19.885 2.11421 20 2.4043 20C2.6944 20 2.97268 19.8851 3.17821 19.6803L12.0849 10.7714C12.2895 10.5648 12.4043 10.2857 12.4043 9.99493C12.4043 9.70412 12.2895 9.42507 12.0849 9.21844Z"
                                                            fill="#171433" />
                                                    </svg>
                                                </div>
                                            </div>
                                            @if( count($entry['upcomming']) > 1 )
                                                <svg class="frame-2608793" width="500" height="50" viewBox="0 0 245 26" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" style="top: -15px; left: -133px;">
                                                    <path d="M122.654 25.8867L139.975 6.47266H105.334L122.654 25.8867Z" fill="#c4c4c4" />
                                                </svg>
                                            @endif
                                        </div> 
                                    </a>
                                @else
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                        style="margin-bottom: 10px;margin-top:50px;"><img src="../themes/tailwind/images/blank.png"
                                            style="width: 100px;margin-right: 30px;">
                                        <div></div>
                                        <p class="p22white" style="margin-bottom: 5px;"><strong>{{ $upcomming['package']['course']['level']['name'] }}</strong></p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <svg class="slides" width="144" height="475" viewBox="0 0 144 475" fill="none"
                            xmlns="http://www.w3.org/2000/svg" style="position: fixed; bottom: 0;right:100px;">
                            <path opacity="0.2"
                                d="M144 72.7266C144 32.9621 111.765 0.726562 72 0.726562C32.2355 0.726562 0 32.9621 0 72.7266V502.727C0 542.491 32.2355 574.727 72 574.727C111.765 574.727 144 542.491 144 502.727V72.7266Z"
                                fill="white" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('javascript')
<script>
    
</script>
@endsection
