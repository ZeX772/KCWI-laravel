@extends('theme::layouts.customer')

@section('style')
<style>
    .frame {
        background: #ffffff;
        border-radius: 30px;
        padding: 24px;
        display: flex;
        flex-direction: row;
        gap: 15px;
        align-items: center;
        justify-content: flex-start;
        align-self: stretch;
        flex-shrink: 0;
        position: relative;
        box-shadow: var(--app-dropshadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    }

    .p24bb {
        color: var(--appcolortone-primary, #171433);
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 24px;
        font-weight: 700;
    }

    .p22bold {
        color: var(--appcolortone-primary, #171433);
        padding: 30px 0px 10px 0px;
        text-align: left;
        font-family: var(--apptextstyles-app-title-22-font-family,
                "Barlow-SemiBold",
                sans-serif);
        font-size: var(--apptextstyles-app-title-22-font-size, 22px);
        font-weight: var(--apptextstyles-app-title-22-font-weight, 600);
        position: relative;
        align-self: stretch;
    }

    .p18b {
        color: var(--cm-scolor-accent, #4a5c7a);
        font-family: var(--text-text-medium-1-font-family,
                "Poppins-Medium",
                sans-serif);
        font-size: var(--text-text-medium-1-font-size, 18px);
        font-weight: var(--text-text-medium-1-font-weight, 500);
        position: relative;
    }

</style>
@endsection

@section('content')

<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);width: 100%;">
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 50px;height: 31px;text-align: center;">News</p>
    <div style="width: 10%; margin-bottom: 30px; position: absolute;" onclick="goBack()"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></a></div>
    <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center align-items-xxl-center">
        @unless (empty($news))
        <div style="width: auto%;">
            @foreach ($news as $articleNews)
            <div class="d-md-flex align-items-md-start divcard frame" style="padding: 15px;height: auto;margin-bottom: 20px;">
                <a href="{{ route('wave.lists', ['id' => $articleNews['id']]) }}" style="text-decoration: none;" >
                    <div>
                        <img src="{{ asset($articleNews['image_path']) }}" style="width: 160px;height:160px;border-top-left-radius: 20px;border-top-right-radius: 20px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;margin-right: 20px;">
                    </div>
                    <div>
                        <p class="p22bold" style="margin-bottom: 0px;">{{ $articleNews['title'] }}"</p>
                        <p class="p18b" style="text-align: left;">
                            <strong>{{ $articleNews['posting_time'] }}</strong></p>

                </a>
            </div>
        </div>
        @endforeach
        @else
        <div class="alert alert-warning" role="alert">
            No news available
        </div>
    @endunless
    </div>
</div>

@endsection

@section('javascript')
<script></script>
@endsection
