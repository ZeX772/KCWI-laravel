@extends('theme::layouts.customer')

@section('style')
    <style>
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

        .p24bb {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 25px;
            font-weight: 700;
            position: relative;
            margin-bottom: 50px;
            height: 31px;
            white-space: nowrap;
        }

        .urgentnewbox {
            background: #ffffff;
            border-radius: 34px;
            flex: 1;
            height: 143px;
            position: relative;
            box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.5);
        }

        .p18b {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
        }

        .p165 {
            color: var(--appcolortone-secondary-1, #233656);
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            line-height: 17.99px;
            font-weight: 500;
            position: relative;
            align-self: stretch;
            margin-bottom: 0px;
        }

        .date {
            color: var(--appcolortone-black-80, rgba(0, 0, 0, 0.8));
            text-align: right;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 16px;
            font-weight: 600;
            opacity: 0.5;
            position: absolute;
            right: 2.73%;
            left: 89.23%;
            width: 8.04%;
            bottom: 55.24%;
            top: 18.18%;
            height: 26.57%;
        }

        .date2 {
            color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
            text-align: right;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 16px;
            font-weight: 600;
            position: relative;
        }
    </style>
@endsection

@section('content')


            

            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);position: relative; min-height: 100%; width: 100%;">
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb">Urgent News</p>
                <div style="width: auto; margin-bottom: 30px; position: absolute;" onclick="goBack()"><button class="button2"
                        type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></a></div>
                <div style="height: auto;margin-bottom: 50px;">
                    <p class="p24b">Urgent News</p>
                    <br />
                    @unless(empty($urgentNews))
                        @foreach ($urgentNews as $urgentnews)
                            @if ($urgentnews['is_active'] === 1 && $urgentnews['category'] === 'urgent_news' && $urgentnews['posting_time'] <= now())
                                <a href="{{ route('wave.urgentNewsDetails',  ['id' => $urgentnews['id']]) }}" class="d-md-flex d-xl-flex flex-column justify-content-md-center divcard urgentnewbox"
                                    style="padding: 15px;padding-right: 20px;height: auto; margin-bottom: 15px; text-decoration: none; color: black;">
                                    <div
                                        class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-start align-items-xl-start align-items-xxl-start">
                                        <div class="d-md-flex d-xl-flex d-xxl-flex align-items-md-start align-items-xl-center">
                                            <div><img src="{{ asset('themes/tailwind/images/newslogored.png') }}"
                                                    style="width: 70px;" width="70" height="70"></div>
                                            <div style="margin-left: 10px;">
                                                <p class="p18b" style="text-align: left;">
                                                    <strong>{{ $urgentnews['title'] }}</strong></p>
                                                <p class="p165" style="text-align: left;margin-bottom: 0px;">
                                                    {!! substr($urgentnews['content'], 0, 200) . (strlen($urgentnews['content']) > 100 ? '...' : '') !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="p16normal3 date">{{ \Carbon\Carbon::parse($urgentnews['posting_time'])->toDateString() }}</p>
                                        </div>
                                        
                                    </div>
                                </a>
                            @endif
                        @endforeach
                        @else
                        <div class="alert alert-warning" role="alert">
                            TODAY URGENT NEWS NOT FOUND
                        </div>
                        @endunless
                </div>
                <div>
                    <p class="p24b">Past News</p>
                    <br />
                    @unless (empty($urgentNews))
                    @foreach ($urgentNews as $urgentnews)
                    @unless ($urgentnews['is_active'] === 1)
                            <div class="accordion" role="tablist" id="accordion-{{ $loop->iteration }}"
                                style="border-radius: 24px 24px 0px 0px;background: #FFF;box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);margin-bottom: 20px;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;width: 100%;">
                                <h2 class="accordion-header" role="tab"
                                    style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;">
                                    <button class="accordion-button d-xl-flex p18b" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#accordion-{{ $loop->iteration }} .item-1" aria-expanded="true"
                                        aria-controls="accordion-{{ $loop->iteration }} .item-1"
                                        style="background: rgb(253,254,255);color: #171433;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;"><strong>{{ $urgentnews['title'] }}</strong></button>
                                </h2>

                                <div class="accordion-collapse collapse item-1" role="tabpanel"
                                    data-bs-parent="#accordion-{{ $loop->iteration }}"
                                    style="border-top-style: solid;border-top-color: rgba(35, 54, 86, 0.50);">
                                    <div class="accordion-body">
                                        <p class="mb-0 p165" style="text-align: left;">{!! $urgentnews['content'] !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endunless
                    @endforeach
                    @else
                    <div class="alert alert-warning" role="alert">
                        PAST NEWS NOT FOUND
                    </div>
                    @endunless
                </div>
            </div>
        </div>
    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
