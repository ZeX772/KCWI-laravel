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
    </style>
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);min-height:100vh;">
                <div style="width: 100%;margin-bottom: 30px;">
                    <a href="{{ route('wave.account') }}">
                        <button class type="button"
                            style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                            <i class="fas fa-chevron-left"></i></button></a>
                    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                        style="margin-bottom: 0px;height: 31px;"><strong>Privacy Policy</strong></p>
                </div>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                    <div class="d-xxl-flex flex-column justify-content-xxl-center align-items-xxl-center"
                        style="width: 50%;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;">
                        @unless (empty($policy))
                        @foreach ($policy as $Policy)
                            <div class="accordion" role="tablist" id="accordion-{{ $Policy['id'] }}"
                                style="border-radius: 24px 24px 0px 0px;background: #FFF;box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);margin-bottom: 20px;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;width: 100%;">
                                <div>
                                    <h2 class="accordion-header" role="tab"
                                        style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;">
                                        <button class="accordion-button d-xl-flex p18b" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#accordion-{{ $Policy['id'] }} .item-1" aria-expanded="true"
                                            aria-controls="accordion-{{ $Policy['id'] }} .item-1"
                                            style="background: rgb(253,254,255);color: #171433;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;"><strong>{{ $Policy['title'] }}</strong></button>
                                    </h2>
                                    <div class="accordion-collapse collapse show item-1" role="tabpanel"
                                        data-bs-parent="#accordion-1"
                                        style="border-top-style: solid;border-top-color: rgba(35, 54, 86, 0.50);">
                                        <div class="accordion-body">
                                            <p class="mb-0 p165" style="text-align: left;">{!! $Policy['content'] !!} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <div class="alert alert-warning" role="alert">
                            PRIVACY & POLICY NOT FOUND
                        </div>
                    @endunless
                    
                    </div>
                </div>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
        </div>
    </body>
@endsection

@section('javascript')
@endsection
