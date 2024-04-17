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
    }

    .p30normal {
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 24px;
        font-weight: 700;
        margin-right: -10%;
    }

    .p24bb {
        color: var(--appcolortone-primary, #171433);
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 24px;
        font-weight: 700;
        margin-right: %;
    }

    .container-fluid {
        display: flex;
        flex-direction: column;
    }

    .box {
        background: #ffffff;
        border-radius: 24px;
        padding: 18px 24px 18px 24px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
        justify-content: center;
        align-self: stretch;
        flex-shrink: 0;
        height: 64px;
        position: relative;
        box-shadow: var(--app-dropshadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    }

    .accordion-button {
        top: 10%;
        width: 200%;
    }

</style>
@endsection

@section('content')



<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);min-height:100vh;">
    <div style="width: 100%;margin-bottom: 30px;">
        <a href="{{ route('wave.faq') }}">
            <button class type="button" style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                <i class="fas fa-chevron-left"></i></button></a>
        <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 0px;height: 31px;"><strong>FAQ</strong></p>
    </div>
    <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
        <div class="d-xxl-flex flex-column justify-content-xxl-center align-items-xxl-center" style="width: 50%;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;">
            @unless (empty($faqList))
            @foreach ($faqList as $faq)
                <div class="accordion" role="tablist" id="accordion-{{ $loop->iteration }}" style="border-radius: 24px 24px 0px 0px;background: #FFF;box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);margin-bottom: 20px;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;">
                    <div>
                        <h2 class="accordion-header" role="tab" style="border-radius: 30px;">
                            <button class="accordion-button d-xl-flex p18b" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-{{ $loop->iteration }} .item-1" aria-expanded="true" aria-controls="accordion-{{ $loop->iteration }} .item-1" style="background: rgb(253,254,255);color: #171433;border-top-left-radius: 50px;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-bottom-left-radius: 50px;border-style: none;width:100%;">
                                <strong>{{ $loop->iteration }}. {!!$faq['question']!!}</strong>
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse show item-1" style="width:100%;" role="tabpanel" data-bs-parent="#accordion-{{ $loop->iteration }}" style="border-top-style: solid;border-top-color: rgba(35, 54, 86, 0.50);">
                            <div class="accordion-body" style="width:100%;">
                                <p class="mb-0 p165" style="text-align: left;">{!! $faq['answer'] !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning" role="alert">
                FAQ NOT FOUND
            </div>
        @endunless
        </div>
    </div>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
</body>
@endsection

@section('javascript')
@endsection
