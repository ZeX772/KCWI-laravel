@extends('theme::layouts.customer')

@section('style')
<style>
    .enroll-frame {
        background: linear-gradient(0deg,
                rgba(127, 158, 211, 1) 0%,
                rgba(165, 208, 245, 1) 100%);
        border-radius: 59px;
        padding: 10px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        align-self: stretch;
        flex-shrink: 0;
        height: 58px;
        position: relative;
        border: none;
        /* Add this line to remove the button default border */
    }

    .enroll-now {
        color: var(--cm-scolor-white, #ffffff);
        font-family: var(--apptextstyles-h-4-heading-font-family,
                "Poppins-Bold",
                sans-serif);
        font-size: var(--apptextstyles-h-4-heading-font-size, 24px);
        font-weight: var(--apptextstyles-h-4-heading-font-weight, 700);
        position: relative;
    }

    .enroll-button {
        width: 100%;
        background: linear-gradient(0deg, #7F9ED3 -23.28%, #A5D0F5 100%);
        height: 58px;
        color: rgb(255, 255, 255);
        border-radius: 59px;
        border: none;
        cursor: pointer;
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

</style>
@endsection

@section('content')




<div class="d-flex flex-column" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);position: relative; height: auto; width: 100%;" id="content-wrapper" ;>
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 50px;height: 31px;text-align: center;"><strong>News</strong></p>
    <div style="width: auto; margin-bottom: 30px; position: absolute;" onclick="goBack()"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></div>
    <div style="margin-bottom: 20px;">
        <p class="p20b" style="text-align: left;"><strong>Category:</strong></p>
        <div class="divcard2 frame">
            @if($newsItem['enroll_type'] == 'competition')
            <p class="p16b" style="margin-bottom: 0px;">Competition</p>
            @else
            <p class="p16b" style="margin-bottom: 0px;">News</p>
            @endif
        </div>
    </div>
    <div style="margin-bottom: 20px;">
        <p class="p20b" style="text-align: left;"><strong>Title:</strong></p>
        <div class="divcard2 frame">
            <p class="p16b" style="margin-bottom: 0px;">{{ $newsItem['title'] }}</p>
        </div>
    </div>
    <div style="margin-bottom: 20px;">
        <p class="p20b" style="text-align: left;"><strong>Content:</strong></p>
        <div class="divcard2 frame">
            <p class="p16b" style="margin-bottom: 0px;text-align: left;">{!! $newsItem['content'] !!}</p>
            @if($newsItem['enroll_type'] == 'competition')
                <button class="enroll-frame enroll-button" type="button">
                    <a href="{{ route('wave.competition.details', ['id' => $newsItem['id']]) }}" class="enroll-now">Discover More</a>
                </button>
            @else
                 <!-- Button is hidden based on the category -->
            @endif
        </div>
    </div>
    
    <div style="margin-bottom: 20px;">
        <p class="p20b" style="text-align: left;"><strong>Received Schedule:</strong></p>
        <div class="divcard2 frame">
            <p class="text-start p16b" style="margin-bottom: 0px;">                
                Date: {{ \Carbon\Carbon::parse($newsItem['posting_time'])->toDateString() }}<br>
                Time: {{ \Carbon\Carbon::parse($newsItem['posting_time'])->toTimeString() }}
        </div>
    </div>
</div>
</div>
</body>
@endsection

@section('javascript')
<script></script>
@endsection
