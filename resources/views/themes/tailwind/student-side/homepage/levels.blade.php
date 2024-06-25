@extends('theme::layouts.customer')

@section('style')
<style>
    .p24bb {
        color: var(--appcolortone-primary, #171433);
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 24px;
        font-weight: 700;
    }

    .p18b {
        color: var(--appcolortone-secondary-1, #233656);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 18px;
        font-weight: 600;
        position: relative;
        align-self: stretch;
    }

    .p12 {
        color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 12px;
        font-weight: 600;
        position: relative;
        width: 159px;
    }

</style>
@endsection

@section('content')




<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);">
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 50px;height: 31px;text-align: center;">Level</p>
    <div style="width: auto; margin-bottom: 30px; position: absolute;" onclick="goBack()"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></a></div>
    <div>
        @if(!empty($levels))
            <div class="row row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-4">
                @foreach($levels['response'] as $level)
                <a href="{{ route('wave.levellists', ['id' => $level['id']]) }}" style="text-decoration: none;margin-bottom:25px" class="col-6 col-sm-3">
                    <div class="banner-container" style="width: 100%; height: 80%; border-radius: 20px; overflow: hidden;">
                        <img src="{{ isset($level) && $level['banner'] != '' ?$level['banner']: 'https://kcwi-storage.b-cdn.net/kcwi/level-icon/default-level-icon.png'; }}" style="object-fit: cover; width: 100%; height: 100%;">
                    </div>
                    <p class="p18b" style="text-align: left;margin-bottom: 0px;width:100%">{{ $level['name'] }}</p>
                    <p class="p12" style="width:100%">{{ $level['age'] }}</p>
                </a>
                @endforeach
            </div>
        @else
            <p style="text-align: center;">No level available</p>
        @endif
    </div>
</div>
</div>
</body>
@endsection


@section('javascript')
<script></script>
@endsection
