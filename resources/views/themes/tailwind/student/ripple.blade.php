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
        left:0%;
        right:0%;
        box-shadow: 10px 0 10px -10px rgba(0, 0, 0, 0.25);
    }
  .container-fluid {
        display: flex;
        flex-direction: column;
    }
    .box {
  background: #ffffff;
  min-width:100%;
  border-radius: 36px;
  padding: 12px 12px 12px 12px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  align-items: flex-start;
  justify-content: flex-start;
  align-self: stretch;
  flex-shrink: 0;
  height: 110px;
  position: relative;
  box-shadow: var(
    --app-dropshadow-box-shadow,
    0px 4px 4px 0px rgba(35, 54, 86, 0.5)
  );
}
.p48 {
  color: #ffffff;
  text-align: left;
  font-family: var(
    --app-text-styles-h1-heading-font-family,
    "Poppins-Bold",
    sans-serif
  );
  font-size: var(--app-text-styles-h1-heading-font-size, 48px);
  font-weight: var(--app-text-styles-h1-heading-font-weight, 700);
  position: relative;
}
.p18white{
  color: #ffffff;
  text-align: left;
  font-family: var(
    --app-text-styles-text-medium-1-font-family,
    "Poppins-Medium",
    sans-serif
  );
  font-size: var(--app-text-styles-text-medium-1-font-size, 18px);
  font-weight: var(--app-text-styles-text-medium-1-font-weight, 500);
  position: relative;
}
.p48black{
  color: #171433;
  text-align: center;
  font-family: "Poppins-Bold", sans-serif;
  font-size: 48px;
  font-weight: 700;
  position: relative;
}
.p18b {
    color: #171433;
    text-align: center;
    font-family: "Poppins-Bold", sans-serif;
    font-size: 18px;
    font-weight: 700;
    opacity: 0.5;
    position: relative;
}
.button1 {
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: center;
    justify-content: center;
    flex: 1;
    position: relative;
    font-size: 1.2em; 
    padding: 24px 48px;
    border-radius: 33.5px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
    text-decoration: none !important;
}
.p24b {
    color: var(--app-color-tone-secondary-1, #171433);
    text-align: left;
    font-family: var(
        --app-text-styles-h4-heading-font-family,
        "Poppins-Bold",
        sans-serif
    );
    font-size: var(--app-text-styles-h4-heading-font-size, 24px);
    font-weight: var(--app-text-styles-h4-heading-font-weight, 700);
    position: relative;
}
.p22bold {
    color: var(--app-color-tone-secondary-1, #233656);
    text-align: left;
    font-family: "Barlow-Medium", sans-serif;
    font-size: 22px;
    font-weight: 500;
    position: relative;
}
.divcard {
    display: inline-flex; /* Use inline-flex so that it only takes the width of its content */
}
.long-empty-space::before,
.long-empty-space::after {
    content: '\00a0'; /* Unicode for non-breaking space */
    margin: 0 10px; /* Adjust the margin as needed */
}

.long-empty-space::before {
    /* Adjust the width of the space */
    display: inline-block;
}

.long-empty-space::after {
    flex-grow: 1; /* Allow the space to occupy remaining space */
    width: 20px;
}
.p18b {
  color: rgba(23, 20, 51, 0.7);
  text-align: left;
  font-family: var(
    --text-text-medium-1-font-family,
    "Poppins-Medium",
    sans-serif
  );
  font-size: var(--text-text-medium-1-font-size, 18px);
  font-weight: var(--text-text-medium-1-font-weight, 500);
  position: relative;
  align-self: stretch;
}

.box-container {
    background: #ffffff;
    box-shadow: var(--app-dropshadow-box-shadow, 0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    border-radius: 22px;
    overflow: hidden;
}

.box-container .box-heading {
    padding: 18px;
    box-shadow: var(--app-dropshadow-box-shadow, 0px 4px 4px 0px rgba(35, 54, 86, 0.5));
}

.box-container .box-content {
    padding: 22px;
}

.col-xxl-1.d-xxl-flex.flex-column.align-items-center::after {
    width: 2px;
    height: 150px;
    color: red;
    position: absolute;
    right: 0;
}

.divider {
    height: 40px;
    width: 1px;
    border: 1.5px solid;
    opacity: 0.2;
}
</style>
@endsection

@section('content')
<body id="page-top">
    <div id="wrapper" class="d-flex" style="min-height: 100vh;">
        
        <div class="d-flex flex-column" id="content-wrapper" style="padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;background: var(--app-color-tone-bg-color, #F1F2F9); position: relative;">
            <a href="{{ route('wave.my-level', $student_id) }}" style="position: absolute; top: 50px; left: 0; z-index: 999;">
                <button class type="button" style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;margin-top:-230px;margin-left:50px;">
                <i class="fas fa-chevron-left"></i></button>
            </a>
            <div style="transform: translateZ(16px);background: #233656;">
                <!-- Banner -->
                <img src="{{ asset('/themes/tailwind/images/schedule.png') }}" style="width: 100%;border-bottom-right-radius: 100px;background: #233656;height: 283.391px;"></div>
                <!-- Heading | Layer 1 -->
                <div style="transform: translateY(0px) translateZ(0px);position: static;background: #AAC9E4;z-index: 9;">
                    <div style="background: #233656;border-bottom-right-radius: 100px;box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);z-index: 99;">
                        <div style="width: 100%; padding: 20px 0;">
                            <p class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center p48 m-0" style="padding-left: 150px;padding-right: 200px;">
                                {{ $entry['current_course']['package']['course']['level']['name'] }} 
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-share"style = "margin-right:-120px;margin-top:30px;">
                                    <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"></path>
                                </svg> -->
                            </p>
                            <p class="p18white" style="padding-left: 150px;padding-right: 200px;margin-bottom:0px;">
                                @foreach($entry['current_course']['package']['course']['level']['level_characteristics'] as $characteristic)
                                    <strong>. {{ $characteristic['name'] }}</strong><br>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Heading | Layer 2 -->
                <div class="d-xxl-flex justify-content-xxl-center" style="height: 150px;background: #ffffff;">
                    <div class="d-xl-flex d-xxl-flex align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="width: 100%;background: #aac9e4;border-bottom-right-radius: 100px;box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);z-index: 1;">
                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="width: 100%;padding-left: 120px;">
                            <!-- <div class="col-xxl-1 d-xxl-flex flex-column align-items-center" style="width: 150px;">
                                <p class="p48black m-0">3</p>
                                <p class="p18b text-center"><strong>Practising</strong></p>
                            </div>

                            <div class="divider"></div> -->

                            <div class="col-xxl-2 d-xxl-flex flex-column align-items-center" style="width: 150px;">
                                <p class="p48black m-0">{{ $entry['current_course']['total_enrolled_class_achieved'] }}</p>
                                <p class="p18b text-center"><strong>Achieved</strong></p>
                            </div> 

                            <div class="divider"></div>

                            <div class="col-xxl-2 d-xxl-flex flex-column align-items-center" style="width: 150px;">
                                <p class="p48black m-0">{{ $entry['current_course']['total_enrolled_class_achieved'] }}/{{ $entry['current_course']['total_enrolled_class'] }}</p>
                                <p class="p18b text-center"><strong>Finished</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Heading | Layer 3 -->
                <div class="w-100" style="background: #ffffff;border-bottom-right-radius: 100px;box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50); padding: 32px 150px;">
                    <div class="d-flex justify-content-between w-100">
                        @if( count($entry['upcoming_courses']) > 0 )
                            <p class="p48black m-0">Next lesson on {{ formatDate(getCourseStartEndDate($entry['upcoming_courses'][0]['student_classes'])['start_date'], 'd M Y') }}</p>
                        @else
                            <p class="p48black m-0">No upcoming lesson</p>
                        @endif
                        <div>
                            <a href="{{ route('wave.my-schedule', $student_id) }}" class="button1" type="button" style="width: 225px;padding:20px;background:#233656;color:white;">Schedule</a>
                        </div>
                    </div>
                </div>
                <!-- Body | Coach Comments -->
                <div class="d-xl-flex d-xxl-flex" style="margin-top: 45px; padding-left: 150px;">
                    <div class="row" style="width: 100%;">
                        <div class="col-sm-6">
                            <div>
                                <p class="p24b">Coach Comments</p>
                            </div>
                            <div class="flex-column">
                                <p class="p22bold"><strong>The lastest Comments</strong></p>
                                @if( count($entry['coach_comments']) > 0 )
                                    @foreach( $entry['coach_comments'] as $coachComment )
                                        <div class="box-container mb-4">
                                            <div class="box-heading d-flex justify-content-between">
                                                <div class="d-flex gap-3">
                                                    <div class="avatar-circle_container" style="width: 50px; height: 50px;">
                                                        <img src="{{ $coachComment['coach']['image_path'] }}" style="width: 50px;">
                                                    </div>
                                                    <div>
                                                        <p class="p18b m-0" style="font-size: 18px; font-weight: 600; color: #233656; opacity: 1;">{{ $coachComment['coach']['name'] }}</p>
                                                        <p class="p13 m-0" style="font-size: 13px;font-weight: 500;color: #233656;opacity: 0.5;">{{ formatDate($coachComment['created_at'], 'd/m/y') }}</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button class="button" type="button" style="width: 40px; height: 40px; background: #FFFFFF; color: #AAC9E4; box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);border:none;border-radius: 20%;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor">
                                                            <path d="M447.1 0h-384c-35.25 0-64 28.75-64 63.1v287.1c0 35.25 28.75 63.1 64 63.1h96v83.98c0 9.836 11.02 15.55 19.12 9.7l124.9-93.68h144c35.25 0 64-28.75 64-63.1V63.1C511.1 28.75 483.2 0 447.1 0zM464 352c0 8.75-7.25 16-16 16h-160l-80 60v-60H64c-8.75 0-16-7.25-16-16V64c0-8.75 7.25-16 16-16h384c8.75 0 16 7.25 16 16V352z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="box-content">
                                                <p class="p22bold" style="font-size: 22px;font-weight: 600;color: #171433;opacity: 0.7;">{{ $coachComment['title'] }}</p>
                                                <p class="p18b" style="font-size: 18px;font-weight: 500;color: #171433;opacity: 0.7;">{{ $coachComment['comment'] }}</p>
                                            </div> 
                                        </div>
                                    @endforeach
                                @else
                                    <p>No coach comment</p>
                                @endif

                                <!-- <div class="box d-xxl-flex flex-column divcard" style="padding: 0px;height: auto;margin-bottom: 20px;">
                                    <div class="box d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="width: 100%; border-bottom-style: solid; border-bottom-color: rgba(35, 54, 86, 0.50); padding-right: 0px;border-bottom-right-radius: 0; border-bottom-left-radius: 0;">
                                        <div class="d-xl-flex d-xxl-flex align-items-xxl-center" style="padding: 20px;">
                                            <img src="../themes/tailwind/images/coach.png" style="width: 50px; border-radius: 50px;margin-left:-230px;">
                                            <div style="margin-left: 10px;">
                                                <p class="p18b" style="margin-bottom: 0px;">Coach Ivan Chan</p>
                                                <p class="p13" style="margin-bottom: 0px;">11/07/2022</p>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="button" type="button" style="width: 40px; height: 40px; background: #FFFFFF; color: #AAC9E4; box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);border:none;position: relative; top: -80px; right: -200px;border-radius: 20%;">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor">
                                                <path d="M447.1 0h-384c-35.25 0-64 28.75-64 63.1v287.1c0 35.25 28.75 63.1 64 63.1h96v83.98c0 9.836 11.02 15.55 19.12 9.7l124.9-93.68h144c35.25 0 64-28.75 64-63.1V63.1C511.1 28.75 483.2 0 447.1 0zM464 352c0 8.75-7.25 16-16 16h-160l-80 60v-60H64c-8.75 0-16-7.25-16-16V64c0-8.75 7.25-16 16-16h384c8.75 0 16 7.25 16 16V352z"></path>
                                            </svg></button>
                                        </div>
                                    </div>
                                    
                                    <div style="padding: 20px;">
                                        <p class="p22bold" style="color: rgba(23, 20, 51, 0.70);">Here is the comment title for the coach to fill in.</p>
                                        <p class="p18b" style="text-align: left;color: rgba(23, 20, 51, 0.70);"><strong>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently.</strong><br><strong>Lorem Ipsum passages, and more recently</strong></p>
                                    </div>
                                </div>
                            
                                <div class="box d-xxl-flex flex-column divcard" style="padding: 0px;height: auto;margin-bottom: 20px;">
                                    <div class="box d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="width: 100%; border-bottom-style: solid; border-bottom-color: rgba(35, 54, 86, 0.50); padding-right: 0px;border-bottom-right-radius: 0; border-bottom-left-radius: 0;">
                                        <div class="d-xl-flex d-xxl-flex align-items-xxl-center" style="padding: 20px;">
                                            <img src="../themes/tailwind/images/coach.png" style="width: 50px; border-radius: 50px;margin-left:-230px;">
                                            <div style="margin-left: 10px;">
                                                <p class="p18b" style="margin-bottom: 0px;">Coach Ivan Chan</p>
                                                <p class="p13" style="margin-bottom: 0px;">11/07/2022</p>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="button" type="button" style="width: 40px; height: 40px; background: #FFFFFF; color: #AAC9E4; box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);border:none;position: relative; top: -80px; right: -200px;border-radius: 20%;">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor">
                                                <path d="M447.1 0h-384c-35.25 0-64 28.75-64 63.1v287.1c0 35.25 28.75 63.1 64 63.1h96v83.98c0 9.836 11.02 15.55 19.12 9.7l124.9-93.68h144c35.25 0 64-28.75 64-63.1V63.1C511.1 28.75 483.2 0 447.1 0zM464 352c0 8.75-7.25 16-16 16h-160l-80 60v-60H64c-8.75 0-16-7.25-16-16V64c0-8.75 7.25-16 16-16h384c8.75 0 16 7.25 16 16V352z"></path>
                                            </svg></button>
                                        </div>
                                    </div>
                                    
                                    <div style="padding: 20px;">
                                        <p class="p22bold" style="color: rgba(23, 20, 51, 0.70);">Here is the comment title for the coach to fill in.</p>
                                        <p class="p18b" style="text-align: left;color: rgba(23, 20, 51, 0.70);"><strong>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently.</strong><br><strong>Lorem Ipsum passages, and more recently</strong></p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
      
        </div>
    </div>
</body>
@endsection

@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.divcard').each(function() {
        var textLength = $(this).find('.p22bold').text().length;
        if (textLength < 30) { // Adjust the threshold as needed
            $(this).find('img').css('margin-top', '35px');
            $(this).find('.p22bold').css('margin-left', '-90px');
        }
    });
});
</script>
@endsection