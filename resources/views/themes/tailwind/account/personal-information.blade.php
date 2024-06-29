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
        max-width: 110%;
        position: relative;
        box-shadow: var(--app-dropshadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    }
    .box1 {
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
        max-width: 110%;
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
        gap: 10px;
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

    .textField {
        box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);
        height: 70px;
        background-color: transparent;
        margin-top: 20px;
        border-radius: 100.5px;
        border: 3px solid var(--app-color-tone-secondary-150, rgba(35, 54, 86, 0.50));
        font-family: Barlow;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        min-width: 25vw;
    }

    .p14b1 {
        color: #7a7a7a !important;
    }

    /* CSS for image transparency */
    .profile-img-wrapper:hover img {
        opacity: 0.75;
        /* Adjust the opacity value as desired */
    }

    .profile-img-wrapper {
        position: relative;
    }

    .profile-img-wrapper img {
        width: 200px;
        height: 200px;
    }

    .button1 {
        width: 43px;
        height: 43px;
        background: #171433;
        padding: 0;
        position: absolute;
        bottom: -20px;
        /* Adjust this value as needed */
        right: 0px;
        /* Adjust this value as needed */
        border-radius: 50%;
        border: none;
        cursor: pointer;
        transform: translateX(-120px);
        left: 55%;
        transform: translateY(-40px);
    }

    .p22bold {
        text-align: center;
        margin-bottom: 10px;
    }
@media (max-width:1024px){
    .p18b
    {
        font-size:14px;
        white-space:nowrap;
    }
  
    .edit
    {
        margin-top:-15px;
        transform:translateX(-60px);
        margin-left:-20px;
    }
    .icon{
        transform:translateX(-30px);
    }
    .account{
        padding-left:70px;
    }
    .p12{
        width:1em;
        height:1em;
    }
    .change{
        margin-right:60px;
        margin-top:-10px;
    }
    .icon1
    {
        transform:translateY(10px);
    }
    .button1{
        margin-left:10px;
    }
@media(min-width:768px) and (max-width: 991.98px){
   .icon{
    margin-bottom:5px;
   }
    .account{
         margin-left:60px;
    }
    .edit{
       transform:translateY(20px);
       transform:translateX(-35px);

    }
    .change{
       margin-left:-40px;
    }
    .background{
        min-width:80vw;
        min-height:100vh;
    }
    .box{
        transform:translateX(-40px);
        margin-left:-40px;
        padding-left:0;
    }
    .special {
        transform:translateY(-580px);
        left:90%;
    }
    .textField{
        max-width:25vw;
        margin-left:10px;
    }
    .p18b{
        font-size:12px;
    }
    .p12{
        font-size:12px;
    }
    .account{
        padding-left:60px;
    }
    .icon{
        font-size:16px;
    }
}
}
</style>
@endsection

@section('content')
<div class="d-flex flex-column" id="content-wrapper" style="background-image: linear-gradient(180deg, rgba(35,53,101,1) 46%, rgba(170,201,228,1) 100%);height:75vh; width: 100%">

    <button class type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;margin:50px;">
        <a href="{{ route('wave.account') }}" style="color:black">
            <i class="fas fa-chevron-left" style="transform:translateY(-2px);"></i>
        </a>
    </button>

    <div style="width: 100%; margin-bottom: 30px;"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl">
                <div class="profile-img-wrapper text-center" style="">
                    <label for="pro-image-upload">
                        <img id="profile-image" src="{{ (isset($response['image_path']) && $response['image_path'] != null)?asset($response['image_path']):'' }}" style="padding: 15px; background: rgba(133,135,150,0.33); border-radius: 50%;" width="200" height="200" alt="Profile Image">
                    </label>
                    <form action="{{ route('wave.image')}}" method="POST" enctype="multipart/form-data">
                        <input id="pro-image-upload" type="file" name="pro-image" style="display: none;" accept=".png, .jpg, .jpeg, .gif">
                        <div class="position-relative">
                            <button class="button1" type="submit">
                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                                    <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <p class="p22bold">{{ optional($response)['name'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="background" style="background: #f1f2f9; min-height:120vh; margin-top:13px;">
        <div class="container" style="margin-top:30px;">
            <div style="width: 100%;">
                <div class="row">
                    <div class="col-sm-6 col-md-8 col-lg-6" style="margin-bottom: 10px;">
                        <div class="box divcard" style="padding-bottom: 30px;">
                            <div class="box1 d-xl-flex d-xxl-flex justify-content-between align-items-center divcard" style="height: 60px;border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;padding: 20px;">
                                <div style="display: flex; justify-content: space-between; width: 100%;">
                                    <p class="fw-semibold p18b" style="margin-bottom: 0px;position: relative;">
                                        <strong>Personal Information</strong>
                                    </p>
                                    <a href="{{ route('wave.edit-personal-information') }}" style="text-decoration:none;color:#171333;">
                                        <div class="edit d-flex align-items-center gap-2" style="">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="p12 icon" style="">
                                                <path d="M421.7 220.3L188.5 453.4L154.6 419.5L158.1 416H112C103.2 416 96 408.8 96 400V353.9L92.51 357.4C87.78 362.2 84.31 368 82.42 374.4L59.44 452.6L137.6 429.6C143.1 427.7 149.8 424.2 154.6 419.5L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3zM492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75z">
                                                </path>
                                            </svg>
                                            <p class="p12 m-0" style="">
                                                <strong>Edit</strong>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center" style="width: 100%;">
                                <div style="width: auto;">
                                    <div class="textField d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="padding: 20px;">
                                        <p class="p14b1" style="margin-bottom: 0px;">Name</p>
                                        <p class="p14b" style="margin-bottom: 0px;">{{ isset($response['name'])?$response['name']:''; }}</p>
                                    </div>
                                    <div class="textField d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="padding: 20px;">
                                        <p class="p14b1" style="margin-bottom: 0px;">Email</p>
                                        <p class="p14b" style="margin-bottom: 0px;">{{ isset($response['email'])?$response['email']:''; }}</p>
                                    </div>
                                    <div class="textField d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="padding: 20px;">
                                        <p class="p14b1" style="margin-bottom: 0px;">hkid</p>
                                        <p class="p14b" style="margin-bottom: 0px;">{{ isset($response['hkid'])?$response['hkid']:''; }}</p>
                                    </div>
                                    @if(session('userSession')['role_id'] != 2)
                                    <div class="textField d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="padding: 20px;">
                                        <p class="p14b1" style="margin-bottom: 0px;">Gender</p>
                                        <p class="p14b" style="margin-bottom: 0px;">{{ isset($response['gender']) ? $response['gender'] : '' }}</p>
                                    </div>
                                    @endif
                                    <div class="textField d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="padding: 20px;">
                                        <p class="p14b1" style="margin-bottom: 0px;">Date Of Birth</p>
                                        <p class="p14b" style="margin-bottom: 0px;">{{ isset($response['dob'])?$response['dob']:''; }}</p>
                                    </div>
                                    <div class="textField d-xl-flex d-xxl-flex justify-content-between align-items-xl-start align-items-xxl-start" style="padding: 20px; min-width: auto; min-height: 28vh; border-radius: 36px;">
                                        <p class="p14b1" style="margin-bottom: 0px;margin-right:10px;">Address</p>
                                        <p class="p14b" style="margin-bottom: 0px;">{{ isset($response['address'])?$response['address']:''; }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box special divcard" style="padding-bottom: 30px;">
                            <div class="box1 d-xl-flex d-xxl-flex justify-content-between align-items-center divcard" style="height: 60px;border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;padding: 20px;">
                                <div style="display: flex; justify-content: space-between; width: 100%;">
                                    <p class="fw-semibold p18b" style="margin-bottom: 0px;position: relative;">
                                        <strong>Account Info</strong>
                                    </p>
                                    <a href="{{ route('wave.change-password') }}" style="text-decoration:none;color:#171333;">
                                        <div class="edit d-flex align-items-center gap-2" style="">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="p12 icon" style="">
                                                <path d="M421.7 220.3L188.5 453.4L154.6 419.5L158.1 416H112C103.2 416 96 408.8 96 400V353.9L92.51 357.4C87.78 362.2 84.31 368 82.42 374.4L59.44 452.6L137.6 429.6C143.1 427.7 149.8 424.2 154.6 419.5L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3zM492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75z">
                                                </path>
                                            </svg>
                                            <p class="p12 m-0" style="">
                                                <strong>Change Password</strong>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex flex-column" style="width: 100%; padding: 0 25px;">
                                <div class="textField" style="padding: 20px;min-width:auto; display: flex; justify-content: space-between;">
                                    <p class="p14b1" style="margin-bottom: 0px;">Phone No.</p>
                                    <p class="p14b" style="margin-bottom: 0px;">{{isset($response['phone'])? $response['phone']:''; }}</p>
                                </div>
                                <div class="textField" style="padding: 20px; display: flex; justify-content: space-between;">
                                    <p class="p14b1" style="margin-bottom: 0px;">Password</p>
                                    <p class="p14b" style="margin-bottom: 0px;">******</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                if (fileName !== '{{ $response["image_path"] }}') {
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
