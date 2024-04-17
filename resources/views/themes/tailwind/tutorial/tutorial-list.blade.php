@extends('theme::layouts.customer')

@section('style')
    <style>
        .d-flex {
            display: flex;
            flex-grow: 1;
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
        style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);min-height:100vh;width:100%;">
        <div style="width: 100%;margin-bottom: 30px;">
            <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                style="margin-bottom: 0px;height: 31px;"><strong>Tutorial</strong></p>
        </div>
        @if (!empty($videos))
            @foreach ($videos as $video)
                <div class="d-xxl-flex flex-column" style="margin-bottom: 20px;">
                    <p class="p24b">{{ $video['level_name'] }}</p>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6">
                        @foreach ($video['videos'] as $videoDetail)
                            <div class="col" style="padding: 5px;">
                                <a href="{{ $videoDetail['video_url'] }}" target="_blank" rel="noopener noreferrer"
                                    style="text-decoration: none; color: inherit;">
                                    <div class="card rounded-3">
                                        <img src="{{ isset($videoDetail['image_path']) && $videoDetail['image_path'] != '' ? $videoDetail['image_path'] : 'https://rma-zone.b-cdn.net/hksa/tutorial-video-thumbnail/default-icon-tutorial.png' }}" class="card-img-top" alt="Video Thumbnail" style="height:150px;">

                                        <div class="card-body" style="height:120px;">
                                            <p class="card-title p18b">{!! substr($videoDetail['video_title'], 0, 40) . ' ...' !!}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning" role="alert">
                No videos available
            </div>
        @endif
    @endsection

    @section('javascript')
        <script></script>
    @endsection
