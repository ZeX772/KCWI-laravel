@extends('theme::layouts.customer')

@section('style')
<style>
    .p48black {
        color: #171433;
        font-family: "Poppins-Bold", sans-serif;
        font-size: 48px;
        font-weight: 700;
        position: absolute;
        font-size: 2.5vw;

    }

    .p18b {
        color: #171433;
        font-family: var(--text-text-medium-1-font-family,
                "Poppins-Medium",
                sans-serif);
        font-size: var(--text-text-medium-1-font-size, 18px);
        font-weight: var(--text-text-medium-1-font-weight, 500);
        font-size: 1vw;
    }

</style>
@endsection

@section('content')

<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;background: var(--app-color-tone-bg-color, #F1F2F9);width:100%;">
    <div style="transform: translateZ(16px);background: transparent;height:40%">
        <img src="{{ asset($newsList['image_path']) }}" style="width: 100%; height: 100%; display: block; background: #233656;">
    </div>
    <div class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="margin-top: 50px;">
        <div style="width: 75%;height:50%;">
            <p class="p48black" style="text-align: left;">{{ $newsList['title'] }}</p>
            <p class="p18b" style="text-align: left;margin-top: 10%;">
                <strong>{{ $newsList['posting_time'] }}</strong></p>
            <p class="p18b" style="text-align: left;margin-bottom: 15px;">
                <strong>{!! $newsList['content'] !!}</strong></p>
        </div>
    </div>
    <div style="width: 10%;margin-right: 0px;margin-top: 100px;margin-left: 100px;position: absolute;" onclick="goBack()"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></a></div>

</div>
</div>
</body>
@endsection

@section('javascript')
<script></script>
@endsection
