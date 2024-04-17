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
            border-radius: 36px;
            padding: 0px 20px 0px 20px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: flex-start;
            flex-shrink: 0;
            width: 710px;
            height: 128px;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow, 0px 4px 4px 0px rgba(35, 54, 86, 0.5));
            outline: none;
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

        .p26 {
            color: #171433;
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 26px;
            font-weight: 600;
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
            border-radius: 40.5px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
        }

        .p16b {
            color: var(--app-color-tone-primary, #171433);
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            font-weight: 600;

        }

        .p18b li {
            list-style-type: disc;
            /* Use disc for filled bullet point, or circle for hollow bullet point */
            margin-bottom: 10px;
            /* Add margin between list items */
        }

        .box:hover {
            background-color: #233656;
            /* Change background color on hover */
        }

        .box:hover .p22bold {
            color: #ffffff;
            /* Change text color to white on hover */
        }

        .p22bold {
            color: var(--app-color-tone-secondary-1, #233656);
            text-align: left;
            font-family: var(--app-text-styles-app-title-22-font-family,
                    "Barlow-SemiBold",
                    sans-serif);
            font-size: var(--app-text-styles-app-title-22-font-size, 22px);
            font-weight: var(--app-text-styles-app-title-22-font-weight, 600);
            position: relative;
        }
    </style>
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="background:#f2f1f9;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;min-height:100vh;">
                <a href="{{ route('wave.student1', $student_id) }}">
                    <button class type="button"
                        style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                        <i class="fas fa-chevron-left"></i></button></a>
                <div style="width: 100%;margin-bottom: 30px;">
                    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24b1"
                        style="margin-bottom: 60px;margin-top:-30px;height: 31px;text-align: center;"><strong>Payment Records</strong></p>
                    <div
                        class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center"style="outline:none;">
                        <div style="width: 50%;">

                            <a href="{{ route('wave.reservation') }}"style="text-decoration:none;color:black;">
                                <div class="box d-flex d-xxl-flex justify-content-start align-items-xxl-center button3 text-nowrap"
                                    type="button" style="margin-bottom: 10px;width: 100%;"id="option3">
                                    <img src="{{ asset('/themes/tailwind/images/clipboard-image-59.png') }}" style="width: 100px;"
                                        class="image" data-original-src="{{ asset('/themes/tailwind/images/clipboard-image-59.png') }}">
                                    <strong class="p22bold">Reservations</strong><span
                                        class="d-xxl-flex justify-content-xxl-end" style="width: 100%;text-align: right;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em"
                                            height="1em" fill="currentColor" class="d-xxl-flex">
                                            <path
                                                d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                            </path>
                                        </svg></span>
                                </div>
                            </a>
                            <a href="{{ route('wave.payment-history') }}"style="text-decoration:none;color:black;">
                                <div class="box d-flex d-xxl-flex justify-content-start align-items-xxl-center button3 text-nowrap"
                                    type="button" style="margin-bottom: 10px;width: 100%;" id="option4">
                                    <img src="{{ asset('/themes/tailwind/images/clipboard-image-59.png') }}" style="width: 100px;"
                                        class="image" data-original-src="{{ asset('/themes/tailwind/images/clipboard-image-59.png') }}">
                                    <strong class="p22bold">Payment History</strong><span
                                        class="d-xxl-flex justify-content-xxl-end" style="width: 100%;text-align: right;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em"
                                            height="1em" fill="currentColor" class="d-xxl-flex">
                                            <path
                                                d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                            </path>
                                        </svg></span>
                                </div>
                            </a>
                            <div style="margin-top: 50px;">
                                <p class="p22bold"><img src="{{ asset('/themes/tailwind/images/clipboard-image-55.png') }}"
                                        style="width: 37px;margin-right: 10px;"><strong>Note</strong></p>
                                <ul class="p18b" style="text-align: left;">
                                    <li>Payment can be settled by Cheque, Bank transfer or FPS. Choose the one that works
                                        the best for yourself.</li>
                                </ul>
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
    <script>
        // Function to handle hover effect for each box
        function handleHoverEffect(boxId, newImageSrc) {
            const box = document.getElementById(boxId);
            const image = box.querySelector('.image');
            const originalSrc = image.getAttribute('data-original-src');

            box.addEventListener('mouseover', function() {
                image.src = newImageSrc; // Change image when hovered
            });

            box.addEventListener('mouseout', function() {
                image.src = originalSrc; // Revert image when not hovered
            });
        }
        handleHoverEffect('option3', "{{ asset('/themes/tailwind/images/clipboard-image-58.png') }}");
        handleHoverEffect('option4', "{{ asset('/themes/tailwind/images/clipboard-image-58.png') }}");
    </script>
@endsection
