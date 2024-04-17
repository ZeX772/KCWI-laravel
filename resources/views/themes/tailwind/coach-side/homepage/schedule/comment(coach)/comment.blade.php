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

    .p14 {
        color: rgba(23, 20, 51, 0.8);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 14px;
        font-weight: 600;
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

    .draftSave {
        background: #ffff;
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        border-radius: 30px;
        color: black;
        text-align: center;
        font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
        width: 20%;
        font-size: 20px;
        padding: 16px 5px;
        border: none;
        margin-left: 15px;
    }

    .send-button {
        background: var(--app-color-tone-secondary-1, #233656);
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        border-radius: 30px;
        color: #ffffff;
        font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
        width: 20%;
        font-size: 20px;
        padding: 16px 5px;
        border: none;
    }

    .textarea1 {
        border-style: none;
        padding: 30px 10px 30px 70px;
        inset: 0;
        border-radius: 20px;
        height: 80px;
        width: 100%;
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 10px 20px 0px rgba(35, 54, 86, 0.5));
    }

    .textarea2 {
        border-style: none;
        padding: 30px 10px 30px 70px;
        inset: 0;
        border-radius: 20px;
        height: 220px;
        width: 100%;
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 10px 20px 0px rgba(35, 54, 86, 0.5));
    }

    #sendout-modal .modal-content {
        border-radius: 50px;
        padding: 20px;
        padding: 30px;
    }
</style>
@endsection

@section('content')
<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);width: 100%;">
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 20px;height: 31px; text-align: center;">Comment</p>
    <div style="margin-bottom: 15px; position: relative;" onclick="window.location.href='{{ route('wave.pastcomment', $student['id']) }}'"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></div>

    <div style="margin-bottom: 20px; margin-top: 20px;">
        <div class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center divcard" style="width: 100%; padding-top: 20px;padding-bottom: 20px;">
            <div class="d-xl-flex d-xxl-flex gap-3 align-items-xl-center align-items-xxl-center divcard" style="width: 100%;">
                <div style="width: 143px; height: 143px; overflow: hidden; border-radius: 50%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                    <img src="{{ $student['image_path'] }}" style="width: 143px;padding: 15px;background: rgba(133,135,150,0.33);border-top-left-radius: 100px;border-top-right-radius: 100px;border-bottom-right-radius: 100px;border-bottom-left-radius: 100px;height: 143px;">
                </div>
                <div style="margin-right: 600px;">
                    <p class="p22bold" style="margin-bottom: 5px;">{{ optional($student)['name'] }}</p>
                    <p class="ID" style="">{{ optional($student['student_information'])['hkid'] ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>

    <form id="commentBox" action="/comment" method="post">
        @csrf
        <p class="p14">Create New Comment</p>
        <div style="margin-bottom: 20px;"><img src="{{ asset('themes/tailwind/images/clipboard-image-60.png') }}" style="width: 30px;position: absolute;transform: translateX(25px) translateY(20px);">
            <textarea class="textarea1" name="commentTitle" id="commentTitle" placeholder="Write your title here...">{{ optional($entry)['title'] }}</textarea>
        </div>
        <div style="margin-bottom: 20px;"><img src="{{ asset('themes/tailwind/images/clipboard-image-60.png') }}" style="width: 30px;position: absolute;transform: translateX(25px) translateY(20px);">
            <textarea class="textarea2" name="comment" id="comment" placeholder="Write your comment here...">{{ optional($entry)['comment'] }}</textarea>
        </div>
        <button class="send-button submit-btn" data-status="active" type="button">Send</button>
        <button class="draftSave submit-btn" data-status="draft" type="button">Save as draft</button>
    </form>

</div>

<!-- Modal for Send Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="sendout-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="display: flex; justify-content: flex-end;">
                <span class="close-btn cursor-pointer" data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark" style="font-size: 26px;"></i></span>
            </div>
            <div class="modal-body mb-2">
                <p class="modal-message" style="font-size: 26px; font-weight: 600; text-align: center;">Confirm to send out the comment to the Parent(s) / Student?</p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <button type="button" class="btn btn-primary submit-btn" style="width: 144px; border-radius: 50px; box-shadow: 0px 4px 4px 0px #23365680; background: #233656; border-color: #233656; font-size: 17px !important; font-weight: 500;">Confirm</button>
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
        var status = "active";

        $("#commentBox").on('click', '.submit-btn', function(){
            status = $(this).data('status');

            const title = $('[name=commentTitle]').val();
            const comment = $('[name=comment]').val();

            if(!title || !comment ) {
                toastTopEnd("Warning", "Please fill in the fields", "warning");

                $(this).removeAttr('disabled');
                return;
            }

            if( status == 'active' ) {
                $('#sendout-modal .modal-message').text("Confirm to send out the comment to the Parent(s) / Student?");
                $('#sendout-modal .submit-btn').text("Confirm");
            } else {
                $('#sendout-modal .modal-message').text("Your comment doesn't save. Are you sure to leave?");
                $('#sendout-modal .submit-btn').text("Leave");
            }

            $('#sendout-modal').modal('show');
        });

        $('#sendout-modal').on('click', '.submit-btn', async function(){
            $(this).prop('disabled', true);

            const title = $('[name=commentTitle]').val();
            const comment = $('[name=comment]').val();
    
            const systemStudentData = <?= json_encode($student) ?>;
            const systemAuthData = <?= json_encode($auth_user) ?>;

            let formData = {
                coach_id: systemAuthData.id,
                student_id: systemStudentData.id,
                title: title,
                comment: comment,
                status: status
            };

            const isUpdate = "{{ $is_update }}";

            if(! isUpdate ) {
                await axios.post(`${getApiUrl()}/coach/student-add-comment`, formData, {
                        headers: {
                            'Authorization': 'Bearer ' + getUserToken()
                        }
                    }).then(res => {
                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");

                            if( status == 'active' ) {
                                window.location = "{{ route('wave.pastcomment', $student['id']) }}";
                            }

                            if( status == 'draft' ) {
                                window.location = "{{ route('wave.draftcomment', $student['id']) }}";
                            }
                            
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
            }
                
            if( isUpdate ) {
                const systemEntry = <?= json_encode($entry) ?>;
                formData['comment_id'] = systemEntry.id;

                await axios.post(`${getApiUrl()}/coach/student-update-comment`, formData, {
                        headers: {
                            'Authorization': 'Bearer ' + getUserToken()
                        }
                    }).then(res => {
                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");

                            if( status == 'active' ) {
                                window.location = "{{ route('wave.pastcomment', $student['id']) }}";
                            }

                            if( status == 'draft' ) {
                                window.location = "{{ route('wave.draftcomment', $student['id']) }}";
                            }
                            
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
            }
        });
     });
</script>
@endsection