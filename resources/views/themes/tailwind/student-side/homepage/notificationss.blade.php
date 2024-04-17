@extends('theme::layouts.customer')

@section('style')
<style>
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

    .p18b {
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 18px;
        font-weight: 600;
        position: relative;
    }

    .p165 {
        text-align: left;
        font-family: "Barlow-Medium", sans-serif;
        font-size: 16px;
        line-height: 17.99px;
        font-weight: 500;
        position: relative;
        align-self: stretch;
        margin-bottom: 0px;
    }

    .notification-frame {
        padding: 15px;
        height: 143px;
        padding-right: 20px;
        margin-bottom: 20px;
        border-radius: 34px;
        box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.5);
        position: relative;
        background: #ffffff;
    }

    .notification-frame:hover {
        background: linear-gradient(282deg, #7F9ED3 15.35%, #A5D0F5 86.77%);
        color: #FFFFFF;
        cursor: pointer;
    }

    .d-flex {
        display: flex;
        flex-grow: 1;
    }

</style>
@endsection

@section('content')
<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);position: relative; min-height: 100vh; width:100vw;">
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"><strong>News</strong></p>
    <div style="width: auto; margin-bottom: 30px; position: absolute;" onclick="goBack()"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></a></div>
    <div style="height: auto;margin-bottom: 20px;">
        <p class="p24b">Today</p>
        @unless(empty($news))
        @foreach ($news as $normalnews)
        @if ($normalnews['posting_time'] <= now() && \Carbon\Carbon::parse($normalnews['posting_time'])->isToday())
        <div onclick="window.location.href='{{ route('wave.new', ['id' => $normalnews['id']]) }}'" class="d-md-flex d-xl-flex flex-column justify-content-md-center divcard notification-frame option1">
            <div style="padding-right:5%">
                <p class="p165" style="margin-bottom: 0px;text-align: right">{{ $normalnews['posting_time'] }}</p>
            </div>
            <div class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                <div><img src="{{ asset('themes/tailwind/images/clipboard-image-15.png') }}" class="image" style="width: 70px; width=70; height=70; margin-bottom: 10px;"></div>
                <div style="margin-left: 10px;">
                    <p class="p18b" style="text-align: left;margin-bottom: 15px;">
                        <strong>{{ $normalnews['title'] }}</strong>
                    </p>
                    <p class="p165" style="text-align: left;margin-bottom: 10px;">
                        {!! substr($normalnews['content'], 0, 100) . (strlen($normalnews['content']) > 100 ? '...' : '') !!}
                    </p>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        @else
        <div class="alert alert-warning" role="alert">
            TODAY NEWS NOT FOUND
        </div>
        @endunless
    </div>
    <div style="height: 100%;">
        <p class="p24b">Earlier</p>
        @unless(empty($news))
        @foreach ($news as $normalnewsEarlier)
        @unless (\Carbon\Carbon::parse($normalnewsEarlier['posting_time'])->isToday())
        <div onclick="window.location.href='{{ route('wave.new', ['id' => $normalnewsEarlier['id']]) }}'" class="d-md-flex d-xl-flex flex-column justify-content-md-center divcard notification-frame option1">
            <div style="padding-right:3%">
                <p class="p165" style="margin-bottom: 0px;text-align: right;">
                    {{ $normalnewsEarlier['posting_time'] }}</p>
            </div>
            <div class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center">
                <div><img src="{{ asset('themes/tailwind/images/clipboard-image-15.png') }}" class="image" style="width: 70px; width=70; height=70; margin-bottom: 10px;"></div>
                <div style="margin-left: 10px;">
                    <p class="p18b" style="text-align: left;margin-bottom: 15px;">
                        <strong>{{ $normalnewsEarlier['title'] }}</strong>
                    </p>
                    <p class="p165" style="text-align: left;margin-bottom: 10px;">
                        {!! substr($normalnewsEarlier['content'], 0, 100) . (strlen($normalnewsEarlier['content']) > 100 ? '...' : '') !!}
                    </p>
                </div>
            </div>
        </div>
        @endunless
        @endforeach
        @else
        <div class="alert alert-warning" role="alert">
            EARLIER NEWS NOT FOUND
        </div>
        @endunless
    </div>

</div>

@endsection
@section('javascript')
<script>
    function handleHoverEffect(newImageSrc) {
        const boxes = document.querySelectorAll('.option1');
        boxes.forEach(function(box) {
            const image = box.querySelector('.image');
            const originalSrc = image.src;

            box.addEventListener('mouseover', function() {
                image.src = newImageSrc;
            });

            box.addEventListener('mouseout', function() {
                image.src = originalSrc;
            });
        });
    }

    // Call handleHoverEffect function for each box
    handleHoverEffect('{{ asset("themes/tailwind/images/notificationlogo.png") }}');
</script>
@endsection