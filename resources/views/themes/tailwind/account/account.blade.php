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
        height: 104px;
        position: relative;
        min-width:200px;
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

    .box:hover {
        background-color: #233656;
    }


    .box:hover .svg-icon,
    .box:hover .p22bold {
        color: #ffffff;
        fill: white;
    }
@media (max-width:1024px){
    .name{
        margin-left:80px;
    }
    .profile{
        margin-left:330px;
        margin-bottom:20px;
    }
   .padding{
    padding-left:25px;
   }
    .image{
       transform:translateX(40px);
    }
    .box
    {
        margin-left:200px;
        max-height:200px;
    }
}
@media (max-width:768px){
    .profile{
        transform:translateX(-140px);
    }
    .image{
        height:70px;
        width:70px;
        padding-right:30px;
    }
    .p22bold{
        font-size:10px;
    }
    .box{
        min-width:170px;
        max-height:200px;
        transform:translateX(-80px);
    }
    .padding{
    padding-left:6px;
   }
   .name{
        font-size:14px;
        margin-right:10px;
    }
}
</style>
@endsection

@section('content')



<div class="d-flex flex-column" id="content-wrapper" style="background-image: linear-gradient(180deg, rgba(35,53,101,1) 46%, rgba(170,201,228,1) 100%);min-height:75vh; width: 100%">

    <button class type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;margin:50px">
        <a href="{{ route('wave.home') }}" style="color:black">
            <i class="fas fa-chevron-left"></i>
        </a>
    </button>

    <div style="width: 100%; margin-bottom: 30px;"></div>
    <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center">
        <div>
            <img class="profile" src="{{ isset($response) && $response['image_path'] != '' ?$response['image_path']: 'https://rma-zone.b-cdn.net/hksa/profile-image/user-profile-icon.png'; }}" style="width: 200px; padding: 15px; background: rgba(133,135,150,0.33); border-top-left-radius: 100px; border-top-right-radius: 100px; border-bottom-right-radius: 100px; border-bottom-left-radius: 100px;" width="200" height="201">

            <p class="p22bold name" style="text-align: center; margin-bottom: 10px;">{{ isset($response['name']) && $response['name'] != '' ?$response['name']:''; }}</p>
        </div>
    </div>
    <div style="background: #f1f2f9; min-height:100%; width:100%;margin-top:13px; ">
        <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="margin-top: 0px;">

            <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="margin-top: 40px;margin-bottom: 40px;">
                <div style="width: 90%;">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <a href="{{ route('wave.personal-information', ['id' => $user_id]) }}" style="text-decoration: none;">
                                <div class="box" id="option1">
                                    <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard" style="padding: 10px;padding-right: 20px;padding-left: 20px;">
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                            <img src="{{ asset('/themes/tailwind/images/clipboard-image-79.png') }}" style="width: 100px;margin-right: 20px;margin-top:-15px;margin-left:-20px;" class="image" data-original-src="../themes/tailwind/images/clipboard-image-79.png">
                                            <p class="p22bold" style="margin-bottom: 25px;">
                                                <strong>Personal Information</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 mb-4">
                            <a href="{{ route('wave.notification') }}" style="text-decoration:none;">
                                <div class="box" id="option2">
                                    <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard" style="padding: 10px;padding-right: 20px;padding-left: 20px;">
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                            <img src="{{ asset('/themes/tailwind/images/clipboard-image-78.png') }}" style="width: 100px;margin-right: 20px;margin-top:-17px;margin-left:-20px;" class="image" data-original-src="../themes/tailwind/images/clipboard-image-78.png">
                                            <p class="p22bold" style="margin-bottom: 25px;">
                                                <strong>Notification</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @if( session('role') != 'coach' )
                            <div class="col-6 mb-4">
                                <a href="{{ route('wave.faq') }}" style="text-decoration:none;color:#171433;">
                                    <div class="box" id="option3">
                                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard" style="padding: 10px;padding-right: 20px;padding-left: 20px;">
                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                <img src="{{ asset('/themes/tailwind/images/clipboard-image-75.png') }}" style="width: 100px;margin-right: 20px;margin-top:-15px;margin-left:-20px;" class="image" data-original-src="../themes/tailwind/images/clipboard-image-75.png">
                                                <p class="p22bold padding" style="margin-bottom: 25px;">
                                                    <strong>FAQ</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        {{-- <div class="col-6 mb-4">
                            <a href="{{ route('wave.payment-method') }}" style="text-decoration:none;color:#171433;">
                                <div class="box" id="option4">
                                    <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard" style="padding: 10px;padding-right: 20px;padding-left: 20px;">
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                            <img src="{{ asset('/themes/tailwind/images/clipboard-image-76.png') }}" style="width: 100px;margin-right: 20px;margin-top:-15px;margin-left:-20px;" class="image" data-original-src="../themes/tailwind/images/clipboard-image-75.png">
                                            <p class="p22bold" style="margin-bottom: 25px;">
                                                <strong>Payment Method</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> --}}
                        @if( session('role') != 'coach' )
                            <div class="col-6 mb-4">
                                <a href="{{ route('wave.privacy-policy') }}" style="text-decoration:none;color:#171433;">
                                    <div class="box" id="option5">
                                        <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard" style="padding: 10px;padding-right: 20px;padding-left: 20px;">
                                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                                <img src="{{ asset('/themes/tailwind/images/clipboard-image-80.png') }}" style="width: 100px;margin-right: 20px;margin-top:-15px;margin-left:-20px;" class="image" data-original-src="../themes/tailwind/images/clipboard-image-80.png">
                                                <p class="p22bold" style="margin-bottom: 25px;">
                                                    <strong>Privacy Policy</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        <div class="col-6 mb-4">
                            <a href="{{ route('logout') }}" style="text-decoration:none;color:#171433;">
                                <div class="box" id="option6">
                                    <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center divcard" style="padding: 10px;padding-right: 20px;padding-left: 20px;">
                                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                            <img src="{{ asset('/themes/tailwind/images/clipboard-image-77.png') }}" style="width: 100px;margin-right: 20px;margin-top:-15px;margin-left:-20px;" class="image" data-original-src="../themes/tailwind/images/clipboard-image-77.png">
                                            <p class="p22bold padding" style="margin-bottom: 25px;">
                                                <strong>Logout</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
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
    handleHoverEffect('option1', '../themes/tailwind/images/personal_information_blue.png');
    handleHoverEffect('option2', '../themes/tailwind/images/notification_blue.png');
    handleHoverEffect('option3', '../themes/tailwind/images/add_guardian_blue.png');
    handleHoverEffect('option4', '../themes/tailwind/images/faq_blue.png');
    handleHoverEffect('option5', '../themes/tailwind/images/privacy_policy_blue.png');
    handleHoverEffect('option6', '../themes/tailwind/images/payment_blue.png');
    handleHoverEffect('option7', '../themes/tailwind/images/logout_blue.png');

</script>

</html>
