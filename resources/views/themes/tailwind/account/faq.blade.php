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

</style>
@endsection

@section('content')

<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);height:100vh;">
    <div style="width: 100%;margin-bottom: 30px;">
        <a href="{{route('wave.account')}}">
            <button class type="button" style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                <i class="fas fa-chevron-left"></i></button></a>
        <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 0px;height: 31px;"><strong>FAQ</strong></p>
    </div>
    <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center" style="">
        <div class="d-xxl-flex flex-column justify-content-xxl-center align-items-xxl-center" style="width: 50%; margin-left: 25%; margin-right: 25%;">
            <div style="width: 100%;">
                <div class="d-xl-flex d-xxl-flex align-items-xl-end align-items-xxl-end divcard" style="height: 138px;background: #233656;margin-bottom: 20px; border-radius: 25px;">
                    <div style="text-align: center;">
                        <img src="../themes/tailwind/images/clipboard-image-82.png" style="width: 50%; height: 50%;">
                    </div>
                    
                    <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start" style="text-align: left;margin-left: 5%;">
                        <p class="p30normal" style="color: rgb(255,255,255);margin-bottom: 0px;">FAQ</p>
                        <p class="p16white" style="color: rgb(255,255,255);opacity: 0.50;margin-bottom: 20%;"><strong>HOW MAY WE HELP YOU?</strong></p>
                    </div>
                </div>
                @unless (empty($responses))
                @foreach($responses as $response)
                @if (is_array($response) && count($response) > 0)
                <form action="Pos">
                    <a href="{{ route('wave.registration-faq', ['id' => $response['id']]) }}" style="text-decoration: none; color: inherit;">
                        <div class="box d-flex d-xxl-flex justify-content-start align-items-xxl-center button3 text-nowrap" type="button" style="margin-bottom: 10px; width: 100%;">
                            <div style="width: 100%;height:100%;">
                                <strong style="text-align: left;padding-left:5%">{{ $response['name'] }}</strong>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 -30 512 512" width="1em" height="1em" fill="currentColor" class="d-xxl-flex" style="margin-left: 90%;margin-top:-30px;">
                                <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                            </svg>

                        </div>
                    </a>
                </form>
                @endif
                @endforeach
                @else
                <div class="alert alert-warning" role="alert">
                    <p>NO FAQ FOUND</p>
                </div>
                @endunless

            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
@endsection
