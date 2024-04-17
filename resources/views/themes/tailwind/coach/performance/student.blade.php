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

    .nav-link1 {
        background: var(--appcolortone-secondary-1, #233656);
        border-radius: 8px;
        padding: 0px 18px 0px 18px;
        display: flex;
        flex-direction: row;
        gap: 16px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        width: 252px;
        height: 56px;
        position: relative;
    }

    .nav-link {
        left: 7%;
        border-radius: 8px;
        padding: 0px 18px 0px 18px;
        display: flex;
        flex-direction: row;
        gap: 16px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        width: 252px;
        height: 56px;
        position: relative;
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

    .p24b1 {
        color: var(--appcolortone-primary, #171433);
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 24px;
        font-weight: 700;
        margin-right: 0%;
    }

    .container-fluid {
        display: flex;
        flex-direction: column;
    }

    .box {
        background: transparent;
        border-style: none !important;
        border-radius: 0px;
        padding: 0px 20px 0px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        height: auto;
        position: relative;
        outline: none !important;
    }

    .p18b1 {
        color: #171433;
        text-align: left;
        font-family: var(--app-text-styles-h4-heading-font-family,
                "Poppins-Bold",
                sans-serif);
        font-size: var(--app-text-styles-h4-heading-font-size, 18px);
        font-weight: var(--app-text-styles-h4-heading-font-weight, 700);
        position: relative;
    }

    .button1 {
        background: #233656;
        color: white;
        display: flex;
        /* flex-direction: column; */
        gap: 10px;
        border-radius: 12px;
        align-items: center;
        justify-content: center;
        position: relative;
        font-size: 1.2em;
        /* padding: 24px 48px; */
        box-shadow: var(--app-dropshadow-box-shadow, 0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        width: 150px;
        height: 47px;
    }

    .box3 {
        background: #ffffff;
        border-radius: 16px;
        padding: 0px 10px 0px 10px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        width: 600px !important;
        height: 128px;
        position: relative;
        box-shadow: var(--app-dropshadow-box-shadow, 0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        outline: none;
    }

    .p18b {
        color: #7a7a7a;
        text-align: left;
        font-family: var(--barlow-copy-1-font-family, "Barlow-Medium", sans-serif);
        font-size: var(--barlow-copy-1-font-size, 18px);
        font-weight: var(--barlow-copy-1-font-weight, 500);
        position: relative;
        margin-top: 10px;
    }

    .p24bb {
        color: var(--app-color-tone-primary, #171433);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 24px;
        line-height: 28px;
        font-weight: 600;
        position: relative;
        font-style: normal !important;
    }

    .box1 {
        min-height: 100px;
        min-width: 400px;
        max-width: 800px;
        background-color: transparent;
        border-radius: 5px;
        padding: 10px;
        overflow: hidden;
        /* overflow-wrap: break-word; */
        word-break: break-all;
        /* hyphens: auto; */
        margin-top: 10px;
        transform: translateY(-370px) !important;
        position: relative;
        left: 50%;
        margin-bottom: -20px;
    }

    .box1 .p18b1 {
        max-width: 620px;
    }

    .d-xxl-flex.align-items-start {
        display: flex;
        flex-direction: column;
        /* Stack items vertically */
    }

    .box2 {
        min-height: 100px;
        /* Set max-height as per your requirement */
        width: 1000%;
        background-color: transparent;
        /* Background color */
        border-bottom: 2px solid rgba(171, 171, 171, 0.26);
        border-radius: 5px;
        /* Border radius */
        padding: 10px;
        /* Padding */
        overflow: hidden;
        /* Hide overflow content */
        margin-top: 10px;
        transform: translateY(-370px) !important;
        position: relative;
        left: 50%;
        margin-bottom: -20px;
    }

    #titleBox {
        width: 300px;
        margin-top: 10px;
    }

    #commentBox {
        width: 300px;
        height: 100px;
        margin-top: 10px;
    }

    #submittedComment {
        margin-top: 20px;
    }

    #removeBtn {
        margin-top: 10px;
        width: 100px;
        height: 36px;
        font-size: 14px;
    }

    /* #sendBtn {
        float: left;
        margin-left: -40px;
    } */

    /* #cancelBtn {
        float: right;
        margin-right: 480px;
    } */

    input[type="text"] {
        font-family: "Barlow-SemiBold", sans-serif !important;
        font-size: 20px;
        font-weight: 600;
    }

    .icheck-wetasphalt>input:first-child:not(:checked):not(:disabled):hover+label::before,
    .icheck-wetasphalt>input:first-child:not(:checked):not(:disabled):hover+input[type="hidden"]+label::before {
        border-color: #34495e;
    }

    .icheck-wetasphalt>input:first-child:checked+label::before,
    .icheck-wetasphalt>input:first-child:checked+input[type="hidden"]+label::before {
        background-color: #34495e;
        border-color: #34495e;
    }

    .checkbox-wrapper-18 .round {
        position: relative;
    }

    .checkbox-wrapper-18 .round label {
        background-color: #fff;
        border: 1px solid #ccc;
        cursor: pointer;
        height: 28px;
        width: 28px;
        display: block;
    }

    .checkbox-wrapper-18 .round label::after {
        border: none !important;
        border-top: none;
        border-right: none;
        content: "";
        height: 6px;
        left: 0px;
        opacity: 0;
        position: absolute;
        top: 15px;
        transform: rotate(-90deg);
        width: 12px;
        color: white !important;
    }

    .checkbox-wrapper-18 .round input[type="checkbox"] {
        visibility: hidden;
        display: none;
        opacity: 0;
    }

    .checkbox-wrapper-18 .round input[type="checkbox"]:checked+label {
        background-color: #66bb6a;
        border-color: #66bb6a;
        background: url('../themes/tailwind/images/tick.png');
        background-size: 28px 28px;
    }


    .checkbox-wrapper-18 .round input[type="checkbox"]:checked+label::after {
        opacity: 1;
    }

    .checkbox-wrapper-17 .round {
        position: relative;
    }

    .checkbox-wrapper-17 .round label {
        background-color: #fff;
        border: 1px solid #ccc;
        cursor: pointer;
        height: 28px;
        width: 28px;
        display: block;
    }

    .checkbox-wrapper-17 .round label::after {
        border: none !important;
        border-top: none;
        border-right: none;
        content: "";
        height: 6px;
        left: 0px;
        opacity: 0;
        position: absolute;
        top: 15px;
        transform: rotate(-90deg);
        width: 12px;
        color: white !important;
    }

    .checkbox-wrapper-17 .round input[type="checkbox"] {
        visibility: hidden;
        display: none;
        opacity: 0;
    }

    .checkbox-wrapper-17 .round input[type="checkbox"]:checked+label {
        background-color: #ff4d4d;
        border-color: #ff4d4d;
        background: url('../themes/tailwind/images/cross.png');
        background-size: 28px 28px;
    }


    .checkbox-wrapper-17 .round input[type="checkbox"]:checked+label::after {
        opacity: 1;
    }

    .coach-name {
        font-size: 20px;
        font-weight: 600;
    }

    #submittedTitle {
        font-size: 16px;
        font-weight: 700;
    }

    #submittedCommentText {
        font-size: 14px;
        font-weight: 500;
        line-height: 24px;
    }

    .checkbox-wrapper-18 .round div {
        opacity: 0.4;
        cursor: pointer;
    }

    .selected {
        opacity: 1 !important;
        pointer-events: none;
    }

    .check-mark {
        border: 1px solid #63e6be;
        padding: 3px 12px; 
        border-radius: 10px; 
        background: #63e6be33;
    }

    .check-mark span i{
        color: #63E6BE; 
        font-size: 18px;
    }

    .check-mark.selected {
        border: 1px solid #179b72;
        background: #63e6be61;
    }

    .check-mark.selected span i {
        color: #179b72; 
    }

    .x-mark {
        border: 1px solid #ec695f;
        padding: 3px 12px; 
        border-radius: 10px; 
        background: #ec695f24;
    }

    .x-mark span i{
        color: #ec695f; 
        font-size: 18px;
    }

    .x-mark.selected {
        border: 1px solid #ec695f;
        background: #ec695f24;
    }

    .x-mark.selected span i {
        color: #ec695f; 
    }

    .event-disabled {
        pointer-events: none;
    }

    /* Modal Style */
    #delete-modal .modal-content {
        border-radius: 50px;
        padding: 20px;
        padding: 30px;
    }
</style>
@endsection

@section('content')

<div id="wrapper" class="d-flex" style="min-height: 100vh;">
    <div class="d-flex flex-column" id="content-wrapper" style="background:#f2f1f9;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;min-height:100vh;">
        <a href="{{ route('wave.coach-attendance', $coach_attendance['course_class']['id']) }}" style="position: absolute; z-index: 999;">
            <button class type="button" style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                <i class="fas fa-chevron-left"></i>
            </button>
        </a>
        <div class="d-flex">
            <div class="col-3">
                <div class="d-flex" style="flex-direction: column;">
                    <div class="mb-3" style="display: flex; justify-content: center;">
                        <div style="width: 143px; height: 143px; padding: 15px; background: rgba(133,135,150,0.33); border-radius: 100px;">
                            <img src="{{ $entry['student']['image_path'] }}" style="object-fit: cover; width: 100%; height: auto; border-radius: 100%;" width="200" height="201">
                        </div>
                    </div>
                    <div>
                        <p class="p24bb" style="text-align: center;">{{ optional($entry['student'])['name'] }}</p>
                        <p class="p18b" style="text-align: center;">{{ optional($entry['student']['student_information'])['hkid'] }}</p>
                    </div>
                    <div style="display: flex; justify-content: center;">
                        <button class="button1" id="commentBtn" type="submit" style="text-decoration:none;color:white; left: 0; width: 150px;" onclick="window.location.href='{{ route('wave.pastcomment', $entry['student']['id']) }}'">
                            Comment
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" style="color: white;font-size:14px;">
                                <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="class-list_container">
                    <p class="p24b1" style="height: 31px;text-align: center;">Performance</p>
                    <div class="" style="width: 100%;">
                        <p class="p24bb" style="margin-bottom: 0px;opacity:0.8;font-size:18px;">Student Performance</p>
                        <div class="d-flex gap-3">
                            <p class="p24bb" style="font-size:18px;">Course: <span class="p24bb">{{ optional($coach_attendance['course_class']['course'])['course_name'] }}</span></p>
                            <p class="p24bb" style="font-size:18px;">
                                Class: <span class="p24bb">{{ optional($coach_attendance['course_class'])['course_class_code'] }}</span>
                                <span class="p24bb" style="opacity:0.8;font-size:18px;">({{ optional($coach_attendance['course_class'])['start_date'] }} {{ optional($coach_attendance['course_class'])['start_time'] }} - {{ optional($coach_attendance['course_class'])['end_time'] }})</span>
                            </p>
                        </div>
                    </div>
                    @foreach( $entry['characteristics'] as $characteristic )
                        <div id="class-item_container" style="display: flex; justify-content: space-between; border-bottom: 1px solid #d5d0d0; border-top: 1px solid #d5d0d0;">
                            <div>
                                <div class="p18b1 mt-3">15m Backstroke kick</div>
                                <form id="commentForm" class="comment-form-{{ $characteristic['id'] }}">
                                    <div class="radio icheck-wetasphalt {{ count($characteristic['coach_comments']) <= 0 ? '' : 'event-disabled' }}">
                                        <input type="radio" name="commentType" value="positive" id="positiveRadio{{ $characteristic['id'] }}" data-id="{{ $characteristic['id'] }}" <?= count($characteristic['coach_comments']) <= 0 ? '' : 'checked' ?>>
                                        <label for="positiveRadio{{ $characteristic['id'] }}" style="color: #7a7a7a; font-weight:600;">
                                            Comment </label>
                                    </div>
                                    <div class="form-comment_container form-comment-{{ $characteristic['id'] }} d-none">
                                        <div>
                                            <input class="box3" type="text" name="title" id="titleBox" placeholder="Title" style="padding-left: 70px!important;font-size: 18px;height:50px;">
                                            <img src="{{ asset('/themes/tailwind/images/clipboard-image-60.png') }}" id="titleImage" style="width: 40px;height:35px; position: absolute; transform: translateX(20px) translateY(-43px);">
                                        </div>
                                        <div class="commentContainer position-relative mb-3">
                                            <img src="{{ asset('/themes/tailwind/images/clipboard-image-60.png') }}" id="commentImage" style="width: 40px; height: 35px; position: absolute; top: 10px; left: 15px; z-index: 1;">
                                            <textarea class="box3" name="comment" id="commentBox" placeholder="Write your comment here..." style="min-height:128px;padding-left: 70px!important; font-size: 18px;padding-top:10px;"></textarea>
                                        </div>
                                        <div style="display: flex; gap: 15px;" class="mb-3">
                                            <button type="button" class="button1 send-btn" id="sendBtn" data-characteristic_id="{{ $characteristic['id'] }}">Send</button>
                                            <button class="button1 cancel-btn" type="button" id="cancelBtn" style="background-color:#aac9e4;" data-id="{{ $characteristic['id'] }}">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                                <div id="submittedComment" class="mb-3 {{ count($characteristic['coach_comments']) > 0 ? '' : 'd-none' }}">
                                    @foreach($characteristic['coach_comments'] as $coachComment)
                                        <div class="mb-3">
                                            <div class="coach-name_conrtainer d-flex align-items-center gap-2 mb-2">
                                                <span><img src="{{ asset('/themes/tailwind/images/clipboard-image-55.png') }}" alt="" style="width: 20px;"></span>
                                                <div class="d-flex gap-3 align-items-center">
                                                    <div class="coach-name">{{ optional($coachComment['coach'])['name'] }}</div>
                                                    <span class="cursor-pointer comment-remove-btn" data-comment_id="{{ $coachComment['id'] }}"><i class="fa-solid fa-trash-can" style="color: #a02a0d;"></i></span>
                                                </div>
                                            </div>
                                            <div id="submittedTitle">{{ optional($coachComment)['title'] }}</div>
                                            <div id="submittedCommentText">{{ optional($coachComment)['comment'] }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="checkbox-wrapper-18 mt-3 checkbox-container-{{$characteristic['id']}}" style="display: flex; gap: 10px;">
                                <div class="round">
                                    <div style="" class="check-mark checkbox-{{$characteristic['id']}} {{ $characteristic['student_characteristic'] ? ($characteristic['student_characteristic']['is_achieved'] == 1 ? 'selected' : '') : '' }}" data-value="1" data-characteristic_id="{{ $characteristic['id'] }}">
                                        <span><i class="fa-solid fa-circle-check" style=""></i></span>
                                    </div>
                                </div>
                                <div class="round">
                                    <div style="" class="x-mark checkbox-{{$characteristic['id']}} {{ $characteristic['student_characteristic'] ? ($characteristic['student_characteristic']['is_achieved'] == 1 ? '' : 'selected') : 'selected' }}" data-value="0" data-characteristic_id="{{ $characteristic['id'] }}">
                                        <span><i class="fa-solid fa-circle-xmark" style=""></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="display: flex; justify-content: flex-end;">
                <span class="close-btn cursor-pointer" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark" style="font-size: 26px;"></i></span>
            </div>
            <div class="modal-body mb-2">
                <p style="font-size: 26px; font-weight: 600; text-align: center;">Are you sure to delete the comment?</p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <button type="button" class="btn btn-danger submit-btn" style="width: 144px; border-radius: 50px; box-shadow: 0px 4px 4px 0px #23365680; font-size: 17px !important; font-weight: 500;">Delete</button>
                <button type="button" class="btn btn-light cancel-btn" data-bs-dismiss="modal" style="width: 144px; border-radius: 50px; box-shadow: 0px 4px 4px 0px #23365680; background: #AAc9e4; border-color: #AAc9e4; font-size: 17px !important; font-weight: 500;">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.class-list_container').on('click', 'input[name=commentType]', function(){
            const id = $(this).data('id');

            if( $(this).is(':checked') )
                $(`.form-comment-${id}`).removeClass('d-none');
        });

        // Cancel comment event
        $('.class-list_container').on('click', '.cancel-btn', function(){
            const id = $(this).data('id');

            $(`.form-comment-${id}`).addClass('d-none');
            $(`input[name=commentType][data-id=${id}]`).prop('checked', false);
        });
        
        // Handle the achieved and not achieved event
        $('.class-list_container .round').on('click', 'div', async function(){
            const isAchieved = $(this).data('value');
            const characteristicID = $(this).data('characteristic_id');

            const systemStudentData = <?= json_encode($entry['student']) ?>;
            const systemCourseClassData = <?= json_encode($coach_attendance['course_class']) ?>;

            const formData = {
                user_id: systemStudentData.id,
                course_id: systemCourseClassData.course.id,
                class_id: systemCourseClassData.id,
                course_level_id: systemCourseClassData.course.course_level,
                characteristic_id: characteristicID,
                is_achieved: isAchieved
            };

            await axios.post(`${getApiUrl()}/coach/student-performance-class-completion`, formData, {
                    headers: {
                        'Authorization': 'Bearer ' + getUserToken()
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        toastInfo("Success", "Student status successfully updated", "success");

                        $(`.checkbox-${characteristicID}`).removeClass('selected');
                        $(this).addClass('selected');
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");
                    }
                }).catch(error => {
                    if( error.response.status == 400 || error.response.status == 422 ) {
                        let errorMessages = "";
                        Object.keys(error.response.data.errors).forEach(key => {
                            error.response.data.errors[key].forEach(value => {
                                errorMessages += (`<p>${key}: ` + value + '</p><br>')

                                toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                            });
                        });
                    }

                    if( error.response.status == 404 ) {
                        toastTopEnd("Cant' Process", error.response.data.message, "warning");
                    }

                    if( error.response.status == 500 ) {
                        toastTopEnd("System Error", error.response.data.message, "error");
                    }

                    if( error.response.status == 401 ) {
                        alert("Your session expired!");
                        window.location = window.location;
                    }

                    console.error('Error fetching data:', error);
                });
        });

        // Handle comment events
        $('.class-list_container').on('click', '.send-btn', async function(){
            $(this).prop('disabled', true);

            const characteristicID = $(this).data('characteristic_id');

            // fetch the details
            const title = $(`.comment-form-${characteristicID} input[name=title]`).val();
            const comment = $(`.comment-form-${characteristicID} [name=comment]`).val();

            if(!title || !comment ) {
                toastTopEnd("Warning", "Please fill in the fields", "warning");

                $(this).removeAttr('disabled');
                return;
            }
                

            const systemStudentData = <?= json_encode($entry['student']) ?>;
            const systemCourseClassData = <?= json_encode($coach_attendance['course_class']) ?>;
            const systemAuthUserData = <?= json_encode($auth_user) ?>;

            const formData = {
                coach_id: systemAuthUserData.id,
                student_id: systemStudentData.id,
                level_id: systemCourseClassData.course.course_level,
                characteristics_id: characteristicID,
                course_id: systemCourseClassData.course.id,
                class_id: systemCourseClassData.id,
                title: title,
                comment: comment,
            }

            await axios.post(`${getApiUrl()}/coach/student-performance-comment`, formData, {
                    headers: {
                        'Authorization': 'Bearer ' + getUserToken()
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        window.location = window.location;
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");
                    }
                }).catch(error => {
                    if( error.response.status == 400 || error.response.status == 422 ) {
                        let errorMessages = "";
                        Object.keys(error.response.data.errors).forEach(key => {
                            error.response.data.errors[key].forEach(value => {
                                errorMessages += (`<p>${key}: ` + value + '</p><br>')

                                toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                            });
                        });
                    }

                    if( error.response.status == 404 ) {
                        toastTopEnd("Cant' Process", error.response.data.message, "warning");
                    }

                    if( error.response.status == 500 ) {
                        toastTopEnd("System Error", error.response.data.message, "error");
                    }

                    if( error.response.status == 401 ) {
                        alert("Your session expired!");
                        window.location = window.location;
                    }

                    console.error('Error fetching data:', error);
                });
        });

        var commentID = null;
        $('.class-list_container').on('click', '.comment-remove-btn', function(){
            commentID = $(this).data('comment_id');
            console.log(commentID);

            $('#delete-modal').modal('show');
        });
        
        $('#delete-modal').on('click', '.submit-btn', async function(){
            $(this).prop('disabled', true);

            const formData = {
                coach_comment_id: commentID
            };

            await axios.post(`${getApiUrl()}/coach/student-performance-comment-delete`, formData, {
                    headers: {
                        'Authorization': 'Bearer ' + getUserToken()
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");
                        $('#delete-modal .close-btn').click();
                        window.location = window.location;
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");

                        $(this).removeAttr('disabled');
                    }
                }).catch(error => {
                    if( error.response.status == 400 || error.response.status == 422 ) {
                        let errorMessages = "";
                        Object.keys(error.response.data.errors).forEach(key => {
                            error.response.data.errors[key].forEach(value => {
                                errorMessages += (`<p>${key}: ` + value + '</p><br>')

                                toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                            });
                        });
                    }

                    if( error.response.status == 404 ) {
                        toastTopEnd("Cant' Process", error.response.data.message, "warning");
                    }

                    if( error.response.status == 500 ) {
                        toastTopEnd("System Error", error.response.data.message, "error");
                    }

                    if( error.response.status == 401 ) {
                        alert("Your session expired!");
                        window.location = window.location;
                    }

                    console.error('Error fetching data:', error);
                });
        });
    });
</script>
@endsection