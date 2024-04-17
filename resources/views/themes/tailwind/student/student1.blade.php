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
        left: 0%;
        right: 0%;
        box-shadow: 10px 0 10px -10px rgba(0, 0, 0, 0.25);
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

    .box {
        background: #ffffff;
        border-radius: 24px;
        padding: 12px 12px 12px 12px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
        justify-content: flex-start;
        align-self: stretch;
        flex-shrink: 0;
        height: 104px;
        position: relative;
        box-shadow: var(--app-dropshadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    }

    .p22bold {
        color: var(--appcolortone-primary, #171433);
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 22px;
        font-weight: 700;
    }

    .p18 {
        color: var(--cm-scolor-accent, #4a5c7a);
        text-align: left;
        font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
        font-size: var(--barlow-copy-2-font-size, 16px);
        font-weight: var(--barlow-copy-2-font-weight, 500);
        position: relative;
        white-space: nowrap;
    }

    .box {
        background: #ffffff;
        border-radius: 24px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
        justify-content: flex-start;
        align-self: stretch;
        flex-shrink: 0;
        height: auto;
        position: relative;
        box-shadow: var(--app-dropshadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        /* Two columns */
        grid-template-rows: repeat(2, auto);
        /* Two rows */
        gap: 30px;
        /* Gap between grid items */
    }

    .button1 {
        background: #233656;
        border-radius: 29px;
        padding: 4px 10px 4px 10px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: #ffffff;
        text-align: left;
        font-family: "Poppins-Medium", sans-serif;
        font-size: 18px;
        font-weight: 500;
        position: relative;
    }

    .box:hover {
        background-color: #233656;
    }

    .box:hover .p22bold {
        color: #ffffff;
    }

    .background1 {
        z-index: 1;
    }

    .background2 {
        z-index: 2;
    }

</style>
@endsection


@section('content')
<div class="d-flex flex-column background1" id="content-wrapper" style="background:#f2f1f9;">
    <div class="background2" style="background-image: linear-gradient(180deg, rgba(35,53,101,1) 46%, rgba(170,201,228,1) 100%);height:auto;">
        <div style="width: 100%; margin-bottom: 30px;"></div>
        <a href="{{ route('wave.home') }}">
            <button class type="button" style="margin-left: 50px; margin-top: 20px; position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                <i class="fas fa-chevron-left"></i>
            </button>
        </a>
        <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center">
            <div class="user-details_container">
                <label for="pro-image-upload">
                    <img id="profile-image" src="{{ $entry['image_path'] ?? '' }}" style="width: 200px; padding: 15px; background: rgba(133,135,150,0.33); border-top-left-radius: 100px; border-top-right-radius: 100px; border-bottom-right-radius: 100px; border-bottom-left-radius: 100px;" width="200" height="201">
                </label>
                <form action="{{ route('wave.student-swap-photo', ['id' => $student_id]) }}" method="POST" enctype="multipart/form-data">
                    <input id="pro-image-upload" type="file" name="pro-image" style="display: none;" accept=".png, .jpg, .jpeg, .gif">
                    <div class="position-relative">
                        <button class="d d-xxl-flex justify-content-xxl-center align-items-xxl-center button1" type="submit" style="width: 43px; height: 43px; background: #171433; padding: 0px; position: relative; transform: translateX(139px) translateY(-57px);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-camera-fill">
                                <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                                <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </form>
                <p class="p22bold" style="text-align: center; margin-bottom: 10px;">{{ $entry['name'] ?? '-' }}</p>
                <p class="p18b" style="background: url(&quot;../themes/tailwind/images/clipboard-image-111.png&quot;) center / contain no-repeat; text-align: center; margin-bottom: 0px; padding: 15px;">
                    <strong>{{ $entry['student_information']['hkid'] ?? '-' }}</strong>
                </p>
                <p class="p18" style="opacity: 1.00; margin-left: 30px;">
                    <strong>{{ $entry['student_information']['level'] ? $entry['student_information']['level']['name'] : '-' }}</strong>
                </p>

            </div>
        </div>
    </div>

    <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="margin-top: 70px; margin-bottom: 70px;">
        <div class="grid-container">
            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center divcard box" onclick="window.location.href='{{ route('wave.my-level', ['id' => $student_id]) }}'" id="option1" style="padding: 10px; height: 150px;">
                <p class="p22bold" style="margin-right: 200px; margin-top: 15px;">
                    <img src="{{ asset('/themes/tailwind/images/student1.png') }}" style="width: 100px; margin-right: 10px;" class="image" data-original-src="{{ asset('/themes/tailwind/images/student1.png') }}">
                    <strong>My Level</strong>
                </p>
            </div>

            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center divcard box" onclick="window.location.href='{{ route('wave.my-schedule', ['studentID' => $student_id]) }}'" id="option2" style="padding: 10px; height: 150px;">
                <p class="p22bold" style="margin-right: 150px; margin-top: 15px;">
                    <img src="{{ asset('/themes/tailwind/images/student2.png') }}" style="width: 100px; margin-right: 10px;" class="image" data-original-src="{{ asset('/themes/tailwind/images/student2.png') }}">
                    <strong>My Schedule</strong>
                </p>
            </div>

            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center divcard box" onclick="window.location.href='{{ route('wave.leaveOrmakeup', $entry['id']) }}'" id="option3" style="padding: 10px; height: 150px;">
                <p class="p22bold" style="margin-right: 120px; margin-top: 15px;">
                    <img src="{{ asset('/themes/tailwind/images/leave1.png') }}" style="width: 100px; margin-right: 10px;" class="image" data-original-src="{{ asset('/themes/tailwind/images/leave1.png') }}">
                    <strong>Leave / Make Up</strong>
                </p>
            </div>

            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center divcard box" onclick="window.location.href='{{ route('wave.payment-record') }}'" id="option4" style="padding: 10px; height: 150px;">

                <p class="p22bold" style="margin-right: 100px; margin-top: 15px;">
                    <img src="{{ asset('/themes/tailwind/images/student4.png') }}" style="width: 100px; margin-right: 10px;" class="image" data-original-src="{{ asset('/themes/tailwind/images/student4.png') }}">
                    <strong>Payment Records</strong>
                </p>
            </div>

        </div>
    </div>

</div>
</div>
</body>
@endsection

@section('javascript')
<script>
    function handleHoverEffect(boxId, newImageSrc) {
        const box = document.getElementById(boxId);
        const image = box.querySelector('.image');
        const originalSrc = image.getAttribute('data-original-src');

        box.addEventListener('mouseover', function() {
            image.src = newImageSrc;
        });

        box.addEventListener('mouseout', function() {
            image.src = originalSrc;
        });
    }

    handleHoverEffect('option1', "{{ asset('/themes/tailwind/images/star1.png') }}");
    handleHoverEffect('option2', "{{ asset('/themes/tailwind/images/schedule1.png') }}");
    handleHoverEffect('option3', "{{ asset('/themes/tailwind/images/student3.png') }}");
    handleHoverEffect('option4', "{{ asset('/themes/tailwind/images/payment1.png') }}");

    $(document).ready(function() {
        // * Events
        $('.user-details_container').on('click', '.change-profile_pic', function() {
            $('input[name=profilePic]').click();
        });

        // Listen for change event on input with class 'profilePic'
        $('.user-details_container').on('change', 'input[name=profilePic]', async function(e) {
            // Get the selected file
            var file = e.target.files[0];

            // Create a FormData object and append the file to it
            var formData = new FormData();
            formData.append('pro_image', file);
            formData.append('user_id', "{{ $student_id }}") //Learned alert to show messages 

            await axios.post(`${getApiUrl()}/customer/student/update-profile-pic`, formData, {
                headers: {
                    'Authorization': 'Bearer ' + getUserToken()
                }
            }).then(res => {
                if (res.data.success) {
                    renderNewProfile(file)
                    toastTopEnd("Success", res.data.message, "success");
                } else {
                    toastInfo("Cant' Save", res.data.message, "warning");

                    $(this).removeAttr('disabled');
                }
            }).catch(error => {
                $(this).removeAttr('disabled');

                if (error.response.status == 400 || error.response.status == 422) {
                    let errorMessages = "";
                    Object.keys(error.response.data.errors).forEach(key => {
                        error.response.data.errors[key].forEach(value => {
                            errorMessages += (`<p>${key}: ` + value +
                                '</p><br>')

                            toastTopEnd("Cant' Process", errorMessages
                                , "warning", errorMessages, 5000);
                        });
                    });
                }

                if (error.response.status == 404) {
                    toastTopEnd("Cant' Process", error.response.data.message, "warning");
                }

                if (error.response.status == 500) {
                    toastTopEnd("System Error", error.response.data.message, "error");
                }

                if (error.response.status == 401) {
                    alert("Your session expired!");
                    window.location = window.location;
                }

                console.error('Error fetching data:', error);
            });

        });

        function renderNewProfile(file) {
            var preview = $(".user-details_container img");

            var reader = new FileReader();

            reader.onload = function(e) {
                preview.attr('src', e.target.result);
            };

            // Read the file as a data URL
            reader.readAsDataURL(file);
        }
    });

</script>

<script>
    $(document).ready(function() {
        // When the form is submitted
        $('form').submit(function(event) {
            // Check if no file is selected
            if ($('#pro-image-upload').get(0).files.length === 0) {
                // Display a Toastr error message indicating that no file is selected
                toastr.error('Please select a file before submitting.');
                // Prevent the form submission
                event.preventDefault();
            }
        });
    }); // Added missing closing tag for document ready function

</script>
<script>
    $(document).ready(function() {
        // When the file input changes
        $('#pro-image-upload').change(function() {

            // Check if a file is selected
            if ($(this).val()) {
                // Get the file name
                var fileName = $(this).val().split('\\').pop();

                // Check if the selected file is different from the original one
                if (fileName !== '{{ $entry['image_path'] }}') {
                    // Store the current image source
                    var originalSrc = $('#profile-image').attr('src');

                    // Replace the existing image with the uploaded file
                    var file = URL.createObjectURL(this.files[0]);
                    $('#profile-image').attr('src', file);

                    // After successfully uploading and updating the image, display Toastr message with file name
                    toastr.success('Uploaded file: ' + fileName + '<br>Save to Proceed');

                } else {
                    // Display a Toastr error message indicating that the selected image is the same as the original one
                    toastr.error('Please select a different image.');
                    // Reset the file input value to allow selecting a different file
                    $(this).val('');
                }
            } else {
                // If no file is selected, prevent the form submission and display an error message
                toastr.error('Please select a file before submitting.');
                return false; // Prevent form submission
            }
        });
    });

</script>

<script>
    $(document).ready(function() {


        // Check if 'uploadSuccess' is set in the session and not empty
        @if(session('uploadSuccess') && session('uploadSuccess') !== '')
        // Display the success message using Toastr
        toastr.success('{{ session('uploadSuccess') }}');

        // Clear the session variable 'uploadSuccess'
        @php
        session() -> forget('uploadSuccess');
        @endphp
        @endif
    });

</script>
@endsection
