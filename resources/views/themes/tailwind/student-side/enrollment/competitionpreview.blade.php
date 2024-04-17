@extends('theme::layouts.customer')

@section('style')
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);width: 100%;">
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                    style="margin-bottom: 0px;height: 31px;"><strong>Preview</strong></p>
                <div style="margin-bottom: 30px; position: absolute;"
                    onclick="window.location.href='{{ route('wave.competitionenrollment3') }}'"><button class="button2"
                        type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></div>

                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                    <div style="width: 50%;"><img src="{{ asset('themes/tailwind/images/clipboard-image-88.png') }}"
                            style="width: 100%;height: 100%;"></div>
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
    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
