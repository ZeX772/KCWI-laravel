@extends('theme::layouts.customer')

@section('style')
<style>
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

    .p24bb {
        color: var(--appcolortone-primary, #171433);
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 25px;
        font-weight: 700;
        position: relative;
        white-space: nowrap;
    }

    .p22bold {
        color: var(--app-color-tone-primary, #171433);
        text-align: left;
        font-family: var(--app-text-styles-app-title-22-font-family,
                "Barlow-SemiBold",
                sans-serif);
        font-size: var(--app-text-styles-app-title-22-font-size, 22px);
        font-weight: var(--app-text-styles-app-title-22-font-weight, 600);
        position: relative;
    }

    .ID {
        color: var(--app-color-tone-secondary-1, #233656);
        font-family: var(--text-text-medium-1-font-family,
                "Poppins-Medium",
                sans-serif);
        font-size: var(--text-text-medium-1-font-size, 22px);
        font-weight: var(--text-text-medium-1-font-weight, 500);
        opacity: 0.5;
        position: relative;
        align-self: stretch;
    }

    .p14 {
        color: rgba(23, 20, 51, 0.8);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 14px;
        font-weight: 600;
        position: relative;
    }

    .button1 {
        background: #ffff;
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        border-radius: 10px;
        flex-shrink: 0;
        color: black;
        text-align: left;
        font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
        top: calc(50% - 8.5px);
        padding: 10px 30px 10px 30px;
        border: none;
    }

    .create-button {
        background: var(--app-color-tone-secondary-1, #233656);
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        border-radius: 10px;
        color: #ffffff;
        font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
        width: 22%;
        font-size: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .coach-name {
        font-size: 20px;
        font-weight: 600;
    }

    #submittedTitle {
        font-size: 16px;
        font-weight: 700;
        color: #171433;
        opacity: 0.7;
    }

    .comment-date {
        font-size: 12px;
        font-weight: 600;
        color: #233656;
    }

    #delete-modal .modal-content {
        border-radius: 50px;
        padding: 20px;
        padding: 30px;
    }
</style>
@endsection

@section('content')
<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);width: 100%;">
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 20px;height: 31px; text-align: center;">Comment</p>
    <div style="margin-bottom: 30px; position: absolute;" onclick="window.location.href='{{ route('wave.student-performance', $student['id']) }}'"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></div>

    <div style="margin-bottom: 20px; margin-top: 20px;">
        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center divcard" style="width: 100%; padding-top: 20px;padding-bottom: 20px;">
            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center divcard" style="width: 100%; justify-content: space-between !important;">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <div style="width: 143px; height: 143px; overflow: hidden; border-radius: 50%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                        <img src="{{ $student['image_path'] }}" style="width: 143px;padding: 15px;background: rgba(133,135,150,0.33);border-top-left-radius: 100px;border-top-right-radius: 100px;border-bottom-right-radius: 100px;border-bottom-left-radius: 100px;height: 143px;">
                    </div>
                    <div style="margin-right: 600px;">
                        <p class="p22bold" style="margin-bottom: 5px;">{{ $student['name'] }}</p>
                        <p class="ID" style="">{{ optional($student['student_information'])['hkid'] ?? "-" }}</p>
                    </div>
                </div>
                <button class="button1" type="submit" style="align-item: right;" onclick="window.location.href='{{ route('wave.draftcomment', $student['id']) }}'">
                    Draft<svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-left: 20px;">
                        <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <button class="create-button" type="button" onclick="window.location.href='{{ route('wave.comment') }}'">
        <strong>Create New Comment</strong>
    </button>
    <div class="p14" style="margin-top: 20px; border-bottom: 1px solid #d5d0d0;">
        Past Comment(s)
    </div>
    <div>
        <div id="class-item_container" style="display: flex; flex-direction: column; width: 50%;">
            @foreach( $entries as $entry )
                <div id="submittedComment" class="mt-3" style="border-bottom: 1px solid #d5d0d0;">
                    <div class="mb-3">
                        <div class="coach-name_conrtainer d-flex gap-2 mb-2">
                            <span class="mt-1"><img src="{{ asset('/themes/tailwind/images/clipboard-image-55.png') }}" alt="" style="width: 18px;"></span>
                            <div class="d-flex gap-3">
                                <div>
                                    <div class="coach-name">{{ optional($entry['coach'])['name'] }}</div>
                                    
                                </div>
                                <span class="cursor-pointer comment-remove-btn mt-1" data-comment_id="{{ $entry['id'] }}"><i class="fa-solid fa-trash-can" style="color: #a02a0d;"></i></span>
                            </div>
                        </div>
                        <p class="comment-date">{{ optional($entry)['date_posted'] }}</p>
                        <div id="submittedTitle" class="mb-2">{{ optional($entry)['title'] }}</div>
                        <div id="submittedCommentText">{{ optional($entry)['comment'] }}</div>
                    </div>
                </div>
            @endforeach
            @if( count($entries) <= 0 )
                <p class="mt-3">No available comment</p>
            @endif
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
</body>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        var commentID = null;

        $('#class-item_container').on('click', '.comment-remove-btn', function(){
            commentID = $(this).data('comment_id');

            $('#delete-modal').modal('show');
        });

        $('#delete-modal').on('click', '.submit-btn', async function(){
            $(this).prop('disabled', true);

            const formData = {
                comment_id: commentID
            };

            await axios.post(`${getApiUrl()}/coach/student-delete-comment`, formData, {
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