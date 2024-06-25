@extends('theme::layouts.customer')

@section('style')
<style>
    .p48 {
        color: #ffffff;
        font-family: var(--apptextstyles-h-1-heading-font-family,
                "Poppins-Bold",
                sans-serif);
        font-size: var(--apptextstyles-h-1-heading-font-size, 48px);
        font-weight: var(--apptextstyles-h-1-heading-font-weight, 700);
    }

    .p18white {
        color: #ffffff;
        text-align: left;
        font-family: var(--apptextstyles-text-medium-1-font-family,
                "Poppins-Medium",
                sans-serif);
        font-size: var(--apptextstyles-text-medium-1-font-size, 18px);
        font-weight: var(--apptextstyles-text-medium-1-font-weight, 500);
        position: relative;
    }

    .p48black {
        color: #171433;
        font-family: var(--apptextstyles-h-1-heading-font-family,
                "Poppins-Bold",
                sans-serif);
        font-size: var(--apptextstyles-h-1-heading-font-size, 48px);
        font-weight: var(--apptextstyles-h-1-heading-font-weight, 700);
        position: relative;
    }

    .p18b {
        color: #171433;
        font-family: var(--text-text-medium-1-font-family,
                "Poppins-Medium",
                sans-serif);
        font-size: var(--text-text-medium-1-font-size, 18px);
        font-weight: var(--text-text-medium-1-font-weight, 500);
        opacity: 0.5;
        position: relative;
    }

    .p24b {
        color: var(--appcolortone-secondary-1, #233656);
        text-align: left;
        font-family: var(--apptextstyles-h-4-heading-font-family,
                "Poppins-Bold",
                sans-serif);
        font-size: var(--apptextstyles-h-4-heading-font-size, 24px);
        font-weight: var(--apptextstyles-h-4-heading-font-weight, 700);
        position: relative;
    }

    .bullet-list {
        list-style-type: disc;
        margin-left: 20px;
    }

    .button1 {
        position: relative;
        height: 60px;
        width: 343px;
        background-color: #233656;
        color: #ffffff;
        text-align: center;
        font-family: "Barlow-Medium", sans-serif;
        font-size: 18px;
        font-weight: 500;
        border: none;
        box-sizing: border-box;
        border-radius: 50px;
        filter: drop-shadow(0px 4px 4px rgba(35, 54, 86, 0.50));
    }

    .d-flex {
        display: flex;
        flex-grow: 1;
    }

    .student-card {
        background: #ffffff;
        border-radius: 50px;
        display: flex;
        flex-direction: row;
        gap: 8px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        width: auto;
        height: auto;
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    }

    .custom-modal-dialog {
        max-width: 50%;
        /* Adjust the width as per your requirement */
        margin: 1.75rem auto;
    }

    .modal-content {
        border-radius: 30px;
        /* Adjust the border radius as per your preference */
    }

    .modal-footer {
        display: flex;
        justify-content: center;
    }

    .modal-footer .btn {
        border-radius: 20px;
        /* Adjust the border radius as per your preference */
        width: 50%;
    }

    .cursor-pointer {
        cursor: pointer;
    }
    .no-padding {
    padding: 0;
    }

</style>
@endsection

@section('content')

<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;background: var(--app-color-tone-bg-color, #F1F2F9);">
    <div style="transform: translateZ(16px);background: #233656;"><img src="{{ isset($levels) && $levels['banner'] != '' ?$levels['banner']: 'https://kcwi-storage.b-cdn.net/kcwi/level-icon/default-level-icon.png'; }}" style="width: 100%; min-height: 65vh; border-bottom-right-radius: 100px;background: #233656;height: 283.391px; object-fit: cover; object-position: 80% 0%;"></div>
    <div style="width: auto;margin-right: 0px;margin-top: 100px;margin-left: 100px;position: absolute;" onclick="goBack()"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></a></div>
    <div style="transform: translateY(0px) translateZ(0px);position: static;background: #AAC9E4;">
        <div style="height: 150px;background: #233656;border-bottom-right-radius: 100px;padding-left: 12.5%;padding-right: 20px;">
            <p class="text-nowrap d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-center align-items-xl-center p48" style="padding-top: 20px;margin-bottom: 0px;">{{ $levels['name'] }}
                <span class="share-btn cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-share" style="margin-right: 50px;">
                        <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z">
                        </path>
                    </svg>
                </span>
            </p>
            <h1 class="p18white">{{ $levels['age'] }}</h1>
        </div>
    </div>
    <div class="d-md-flex d-lg-flex d-xl-flex d-xxl-flex align-items-md-center align-items-lg-center align-items-xl-center justify-content-xxl-center" style="height: 150px;background: #AAC9E4;border-bottom-right-radius: 100px;">
        <div class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center" style="width: 100%;padding-left: 12.5%">
            <div class="col d-xxl-flex flex-column justify-content-xxl-start align-items-xxl-start no-padding">
                <p class="p48black" style="margin: 0px;">{{ $levels['class_size'] ?? "1:1" }}</p>
                <p class="text-nowrap p18b">Class Size&nbsp;&nbsp;</p>
            </div>
            <div class="col d-xxl-flex flex-column justify-content-xxl-start align-items-xxl-start no-padding" style="margin-right: 70px;">
                <p class="text-nowrap p48black" style="margin: 0px;">{{ $levels['duration'] }}</p>
                <p class="p18b">Duration</p>
            </div>
            <div class="col d-xxl-flex flex-column justify-content-xxl-start align-items-xxl-start no-padding" style="margin-right: 70px;">
                <p class="p48black" style="margin: 0px;">${{ $levels['default_price'] }}</p>
                <p class="text-nowrap p18b"><strong>Cost&nbsp;&nbsp;(per session)</strong></p>
            </div>            
        </div>
    </div>
    <div class="d-md-flex d-xl-flex d-xxl-flex justify-content-md-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="margin-top: 50px;margin-bottom: 50px;">
        <div style="width: 75%;margin-bottom:3%">
            <!-- Characteristics Display -->
            <h4 class="p24b">Characteristics:</h4>

            <ul class="bullet-list" style="margin-left: 30px;">
                @foreach($characteristic as $characteristics)
                    <li class="p18b" style="text-align: left;">{{ $characteristics['characteristic_name'] }}</li>
                @endforeach
            </ul>

            <!-- Prerequisite Display -->
            @if( $levels['prerequisite'] )
                <h4 class="p24b">Prerequisite:</h4>

                <ul class="bullet-list" style="margin-left: 30px;">
                    <li class="p18b" style="text-align: left;">{{ $levels['prerequisite'] }}</li>
                </ul>
            @endif

            <p class="p18b" style="text-align: left;"><strong>{{ $levels['remarks'] }}</strong></p>
            <button type="button" style="width: 30%; margin-top: 20px;" class="button1 btn btn-primary book-btn">
                Book Now
            </button>
        </div>
    </div>
    {{-- @if(session()->get('userSession')[user]) --}}
    <div class="modal fade" id="select-modal" tabindex="-1" role="dialog" aria-labelledby="studentSelectionModalLabel" aria-hidden="true">
        <div class="custom-modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentSelectionModalLabel">Select a Student</h5>
                    <button type="button" class="close cancel-btn" data-bs-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
                <form id="radioForm" action="{{ route('wave.storeDataLevelLists') }}" method="post">
                    <div class="modal-body">
                        <ul>
                            @csrf
                            <input type="hidden" name="levelFullTerm" value="{{ $levels['id'] }}">
                            @if (!empty($students))
                            @foreach($students as $student)
                            <div style="margin-bottom: 20px;">
                                <label for="student_{{$loop->iteration}}" class="d-xl-flex d-xxl-flex justify-content-around align-items-xl-center align-items-xxl-center divcard student-card cursor-pointer" style="padding-right: 20px;padding-left: 20px;padding-top: 20px;padding-bottom: 20px; text-decoration: none; color: black;">
                                    <input type="radio" id="student_{{$loop->iteration}}" name="studentInfoFullTerm" value="{{ $student['name'] }}">
                                    <div class="avatar-circle_container">
                                        <img src="{{ $student['image_path'] }}" style="width: 101px;">
                                    </div>
                                    <div style="width: 215px;">
                                        <p class="p22bold" style="margin-bottom: 15px;">{{$student['name']}}</p>
                                        <p class="ripple-beginner" style="margin-top: 15px;">{{ $student['student_information']['level']['name'] ?? '-' }}</p>
                                    </div>
                                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                        <p class="p18b" style="border: 1px solid; border-radius: 15px; padding: 0 20px; margin: 0; width: 200px;">
                                            <strong style="display: flex; align-items: center; justify-content: center;">
                                                <input type="hidden" name="selectedStudentInfo" value="{{$student['id']}}">
                                                {{$student['student_information']['hkid']}}
                                            </strong>
                                        </p>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor">
                                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                        </svg>
                                    </div>
                                </label>
                            </div>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cancel-btn" data-dismiss="modal" style="background-color: #d3d3d3; border-style: none;">Close</button>
                        <button type="submit" class="btn btn-primary" id="selectStudentBtn" style="background-color: #233656;border-style: none;">Select</button>
                    </div>
                </form>
                @else
                <!-- Handle the case where levels are not available -->
                <p style="text-align: center;">No student available</p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cancel-btn" data-dismiss="modal" style="background-color: #d3d3d3; border-style: none;">Close</button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Modal for Sharing -->
<div class="modal fade" role="dialog" tabindex="-1" id="share-modal">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Share Now</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body mb-4 p-4">
                <div class="d-flex gap-3">
                    <span class="cursor-pointer share-icon" data-value="facebook" style="font-size: 50px;" id="facebook-share_btn">
                        <i class="fa-brands fa-facebook" style="color: #2095ee;"></i>
                    </span>
                    <span class="cursor-pointer share-icon" data-value="twitter" style="font-size: 50px;" id="twitter-share_btn">
                        <i class="fa-brands fa-square-twitter" style="color: #2095ee;"></i>
                    </span>
                    <span class="cursor-pointer share-icon" data-value="linkedin" style="font-size: 50px;" id="linkedin-share_btn">
                        <i class="fa-brands fa-linkedin" style="color: #2095ee;"></i>
                    </span>
                    <span class="cursor-pointer share-icon" data-value="whatsapp" style="font-size: 50px;" id="whatsapp-share_btn">
                        <i class="fa-brands fa-square-whatsapp" style="color: #26edb2;"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the form element
        const form = document.getElementById('radioForm');

        // Add event listener for form submission
        form.addEventListener("submit", function(event) {
            // Get all radio buttons with name "studentInfoFullTerm"
            const radioButtons = document.querySelectorAll('input[name="studentInfoFullTerm"]');

            // Variable to track if any radio button is checked
            let checked = false;

            // Loop through each radio button
            radioButtons.forEach(function(radioButton) {
                // If any radio button is checked, set checked to true
                if (radioButton.checked) {
                    checked = true;
                }
            });

            // If no radio button is checked, prevent form submission and display alert
            if (!checked) {
                event.preventDefault();
                alert("Please select a student to proceed.");
            }
        });

        $('#content-wrapper').on('click', '.share-btn', function(){
            // show share modal
            $('#share-modal').modal('show');
        });

        $('#content-wrapper').on('click', '.book-btn', function(){
            $('#select-modal').addClass('show'); // Try adding the class directly
            $('#select-modal').modal('show'); // Try adding the class directly
            $('#select-modal').css('display', 'block');
            $('#select-modal').attr('aria-modal', 'true'); // Hide the modal
            $('#select-modal').attr('aria-hidden', ''); // Hide the modal
            $('#page-top').addClass('modal-open');

            $('.modal-backdrop.fade.show').attr('id', 'divBack');
            $('#divBack').addClass('modal-backdrop fade show');
        });

        $('#content-wrapper').on('click', '.cancel-btn', function(){
            $('#select-modal').removeClass('show'); // Try adding the class directly
            $('#select-modal').attr('aria-modal', ''); // Hide the modal
            $('#select-modal').attr('aria-hidden', 'true'); // Hide the modal
            $('#select-modal').css('display', 'none');
            // Remove all elements with the class "modal-open"
            $('#page-top').removeClass('modal-open');
            
            // Remove inline styles from the body element
            $('body').removeAttr('style');
            // Find the element with the class "modal-backdrop fade show" and remove the class
            $('#divBack').removeClass('modal-backdrop fade show');

        });

        $('#content-wrapper').on('click', '.cancel-btn2', function(){
            console.log("Cancel button clicked"); // Debugging message to check if the button click event is triggered
            $('#select-modal').removeClass('show'); // Try adding the class directly
            $('#select-modal').attr('aria-modal', ''); // Hide the modal
            $('#select-modal').attr('aria-hidden', 'true'); // Hide the modal
            $('#select-modal').css('display', 'none');
            // Remove all elements with the class "modal-open"
            $('#page-top').removeClass('modal-open');
            
            // Remove inline styles from the body element
            $('body').removeAttr('style');
            // Find the element with the class "modal-backdrop fade show" and remove the class
            $('#divBack').removeClass('modal-backdrop fade show');

        });

        $('#share-modal').on('click', '.share-icon', function(){
            const value = $(this).data('value');

            const levels = <?= json_encode($levels) ?>;

            switch (value) {
                case "facebook":
                    window.open(`https://www.facebook.com/sharer.php?u=${window.location}`, "_blank");
                    break;
            
                case "twitter":
                    window.open(`https://twitter.com/intent/tweet?url=${window.location}&text=${levels.name}`, "_blank");
                    break;

                case "linkedin":
                    window.open(`https://www.linkedin.com/shareArticle?mini=true&url=${window.location}`, "_blank");
                    break;

                case "whatsapp":
                    window.open(`whatsapp://send?text=${levels.name}%20${window.location}`, "_blank");
                    break;
            }
        });
    });
</script>

@endsection
