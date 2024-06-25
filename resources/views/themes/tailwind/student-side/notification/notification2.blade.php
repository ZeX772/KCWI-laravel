@extends('theme::layouts.customer')

@section('style')
<style>
    .p24bb {
        color: var(--app-color-tone-primary, #171433);
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 24px;
    }

    .p20b {
        color: var(--appcolortone-primary, #171433);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 20px;
        line-height: 28px;
        font-weight: 600;
        opacity: 0.75;
        position: relative;
    }

    .p16b {
        color: var(--appcolortone-primary, #171433);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 16px;
        font-weight: 600;
        position: relative;
        right: 0%;
        left: 0%;
        width: 100%;
        bottom: 0%;
        top: 0%;
        height: 100%;
    }

    .frame {
        background: var(--cm-scolor-white, #ffffff);
        border-radius: 20px;
        padding: 20px 23px 20px 23px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
        justify-content: flex-start;
        align-self: stretch;
        flex-shrink: 0;
        position: relative;
    }
@media (max-width:768px){
    .video{
        height:300px;
    }
}
</style>
@endsection

@section('content')

<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);width: 100%;min-height:100vh;">
    <div style="margin-bottom: 30px; position: absolute;" onclick="window.location.href='{{ route('wave.notification') }}'"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></div>
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 0px;height: 31px;"><strong>Notification</strong></p></br>
    <div style="margin-bottom: 20px;">
        <p class="p20b" style="text-align: left;"><strong>Category:</strong></p>
        <div class="divcard2 frame">
            <p class="p16b" style="margin-bottom: 0px;">{{ $notificationsDetails['template_name'] ?? '-'}}</p>
        </div>
    </div>
    <div style="margin-bottom: 20px;">
        <p class="p20b" style="text-align: left;"><strong>Title:</strong></p>
        <div class="divcard2 frame">
            <p class="p16b" style="margin-bottom: 0px;">{{ $notificationsDetails['title'] ?? '-'}}</p>
        </div>
    </div>
    <div style="margin-bottom: 20px;">
        <p class="p20b" style="text-align: left;"><strong>Content:</strong></p>
        <div class="divcard2 frame">
            <p class="p16b" style="margin-bottom: 0px;text-align: left;">{!! $notificationsDetails['content'] !!}</p>
        </div>
    </div>
    @if ($notificationsDetails['attachment'] === null)
    @else
    <div style="margin-bottom: 20px;">
        <p class="p20b" style="text-align: left;"><strong>Attachment:</strong></p>
        <div class="d-md-flex d-xl-flex align-items-md-center align-items-xl-center">
            <div class="d-md-flex d-xl-flex justify-content-md-center align-items-md-center align-items-xl-center attachdiv frame" style="width: auto; margin-right: 20px;">
                <a href="{{ $notificationsDetails['attachment'] }}" target="_blank">
                    <img src="{{ asset('/themes/tailwind/images/attachmentlogo.png') }}" style="width: 35px;margin-left:35px;">
                    @php
                    $attachmentName = str_replace('https://kcwi-storage.b-cdn.net/kcwi/notification-attachment/', '', $notificationsDetails['attachment']);
                    @endphp
                    <p class="p14b" style="margin-top:20px;">{{ substr( $attachmentName, 0, 15) . '...'}}</p>
                </a>
            </div>
        </div>
    </div>
    @endif
    @if ($notificationsDetails['video_link'] === null)
    @else
    @php
    // Assuming $notificationsDetails['video_link'] contains the YouTube URL
    $videoUrl = $notificationsDetails['video_link'];

    // Regular expression pattern to match the YouTube video ID
    $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

    // Match the video ID using the pattern
    preg_match($pattern, $videoUrl, $matches);

    // Extract the video ID from the matched pattern
    $videoId = isset($matches[1]) ? $matches[1] : null;

    // Construct the embedded URL for the YouTube video
    $embeddedUrl = "https://www.youtube.com/embed/" . $videoId;
    @endphp

    <div style="margin-bottom: 20px;">
        <p class="p20b" style="text-align: left;"><strong>Video:</strong></p>
        <div class="divcard2 frame">
            <a href="{{ $notificationsDetails['video_link'] }}" target="_blank" rel="noopener noreferrer" class="p16b" style="margin-bottom: 0px; text-align: left;"> </a>
            <iframe class="video"width="100%" height="500px" src="{{ $embeddedUrl }}">
            </iframe>
        </div>
    </div>
    @endif

    <div style="margin-top: 20px;">
        <p class="p20b" style="text-align: left;"><strong>Received Schedule:</strong></p>
        <div class="divcard2 frame">
            <p class="text-start p16b" style="margin-bottom: 0px;">
                Date: {{ \Carbon\Carbon::parse($notificationsDetails['datetime_to_send'])->toDateString() }}<br>
                Time: {{ \Carbon\Carbon::parse($notificationsDetails['datetime_to_send'])->toTimeString() }}
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script></script>
@endsection
