@extends('theme::layouts.customer')

@section('style')
<style>
    .p24bb {
        color: var(--app-color-tone-primary, #171433);
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 24px;
    }

    .text {
        color: var(--app-color-tone-secondary-1, #233656);
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 18px;
        font-weight: 600;
    }

    .container {
        background: #ffffff;
        border-radius: 36px;
        padding: 0px 20px 0px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        height: 128px;
        position: relative;
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    }

    .container:hover {
        background: #233656;
        color: #FFFFFF;
    }

    .nav-link2 {
        color: grey;
    }

    .nav-link2.active {
        border-bottom: 2px solid;
        color: black;
    }

    .nav-link2 {
        color: grey;
    }

</style>
@endsection

@section('content')

<div class="d-flex flex-column" id="content-wrapper" style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 85vw;">
    <div style="margin-bottom: 30px; position: absolute;" onclick="window.location.href='{{ route('wave.home') }}'"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></div>
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 0px;height: 31px;"><strong>Enrollment</strong></p></br>
    <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
        <div style="width: 50%">
            <ul class="nav nav-tabs" role="tablist" style="border-bottom-style: none;margin-bottom: 20px;">
                <li class="nav-item" role="presentation">
                    <a class="nav-link2 active text" role="tab" data-bs-toggle="tab" href="#tab-1" style="text-decoration: none; background-color: transparent;">Class</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="tab-1">
                    <div style="margin-bottom: 20px;">
                        <div id="option1" class="d-flex d-xxl-flex justify-content-start align-items-xxl-center button3 text-nowrap container" type="button" style="margin-bottom: 10px;" onclick="window.location.href='{{ route('wave.fulltermenrollment') }}'">
                            <img src="{{ asset('/themes/tailwind/images/penlogo-enrollment.png') }}" style="width: 100px;" class="image" data-original-src="{{ asset('/themes/tailwind/images/penlogo-enrollment.png') }}"><strong>Muscle Building</strong><span class="d-xxl-flex justify-content-xxl-end" style="width: 100%;text-align: right;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" class="d-xxl-flex">
                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                    <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                    </path>
                                </svg></span>
                        </div>
                        <div id="option2" class="d-flex d-xxl-flex justify-content-start align-items-xxl-center button3 text-nowrap container" type="button" style="margin-bottom: 10px;" onclick="window.location.href='{{ route('wave.flexiblecourse') }}'">
                            <img src="{{ asset('/themes/tailwind/images/penlogo-enrollment.png') }}" style="width: 100px;" class="image" data-original-src="{{ asset('/themes/tailwind/images/penlogo-enrollment.png') }}"><strong>Rehab</strong><span class="d-xxl-flex justify-content-xxl-end" style="width: 100%;text-align: right;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" class="d-xxl-flex">
                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                    <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                    </path>
                                </svg></span>
                        </div>

                        {{-- Hide First For Private Course (Note: Maybe For Future Development) --}}
                        <div id="option3" class="d-flex d-xxl-flex justify-content-start align-items-xxl-center button3 text-nowrap container" type="button" style="margin-bottom: 10px;" onclick="window.location.href='{{ route('wave.privatecourse') }}'">
                            <img src="{{ asset('/themes/tailwind/images/penlogo-enrollment.png') }}" style="width: 100px;" class="image" data-original-src="{{ asset('/themes/tailwind/images/penlogo-enrollment.png') }}"><strong>Sport Performance</strong><span class="d-xxl-flex justify-content-xxl-end" style="width: 100%;text-align: right;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" class="d-xxl-flex">
                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                    <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                    </path>
                                </svg></span>
                        </div> 
                        
                        <div id="option4" class="d-flex d-xxl-flex justify-content-start align-items-xxl-center button3 text-nowrap container" type="button" style="margin-bottom: 10px;" onclick="window.location.href='{{ route('wave.changecourse') }}'">
                            <img src="{{ asset('/themes/tailwind/images/noteslogo-enrollment.png') }}" style="width: 100px;" class="image" data-original-src="{{ asset('/themes/tailwind/images/noteslogo-enrollment.png') }}"><strong>Change
                                Course</strong><span class="d-xxl-flex justify-content-xxl-end" style="width: 100%;text-align: right;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" class="d-xxl-flex">
                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                    <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                    </path>
                                </svg></span>
                        </div>
                        <div id="option5" class="d-flex d-xxl-flex justify-content-start align-items-xxl-center button3 text-nowrap container" type="button" style="margin-bottom: 10px;" onclick="window.location.href='{{ route('wave.cancelcourse') }}'">
                            <img src="{{ asset('/themes/tailwind/images/noteslogo-enrollment.png') }}" style="width: 100px;" class="image" data-original-src="{{ asset('/themes/tailwind/images/noteslogo-enrollment.png') }}"><strong>Cancel
                                Course</strong><span class="d-xxl-flex justify-content-xxl-end" style="width: 100%;text-align: right;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" class="d-xxl-flex">
                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                    <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                    </path>
                                </svg></span>
                        </div>
                        <div id="option6" class="d-flex d-xxl-flex justify-content-start align-items-xxl-center button3 text-nowrap container" type="button" style="margin-bottom: 10px;" onclick="window.location.href='{{ route('wave.history') }}'">
                            <img src="{{ asset('/themes/tailwind/images/clipboard-image-59.png') }}" style="width: 100px;" class="image" data-original-src="{{ asset('/themes/tailwind/images/clipboard-image-59.png') }}"><strong>Enrollment
                                History</strong><span class="d-xxl-flex justify-content-xxl-end" style="width: 100%;text-align: right;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" class="d-xxl-flex">
                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                    <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                    </path>
                                </svg></span>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
</body>
@endsection

@section('javascript')
<script>
    function handleHoverEffect(boxId, newImageSrc) {
        const box = document.getElementById(boxId);
        const image = box.querySelector('.image');
        const originalSrc = image.getAttribute('data-original-src');

        box.addEventListener('mouseover', function() {
            image.src = newImageSrc;
        });

        box.addEventListener('mouseout', function() {
            image.src = originalSrc;
        });
    }
    handleHoverEffect('option1', "{{ asset('/themes/tailwind/images/historylogo-blue1.png') }}");
    handleHoverEffect('option2', "{{ asset('/themes/tailwind/images/historylogo-blue1.png') }}");
    handleHoverEffect('option3', "{{ asset('/themes/tailwind/images/historylogo-blue1.png') }}");
    handleHoverEffect('option4', "{{ asset('/themes/tailwind/images/historylogo-blue.png') }}");
    handleHoverEffect('option5', "{{ asset('/themes/tailwind/images/historylogo-blue.png') }}");
    handleHoverEffect('option6', "{{ asset('/themes/tailwind/images/booklogo-enrollment.png') }}");
    handleHoverEffect('option7', "{{ asset('/themes/tailwind/images/historylogo-blue1.png') }}");
    handleHoverEffect('option8', "{{ asset('/themes/tailwind/images/historylogo-blue.png') }}");
    handleHoverEffect('option9', "{{ asset('/themes/tailwind/images/historylogo-blue.png') }}");

</script>
@endsection
