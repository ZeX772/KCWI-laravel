@extends('theme::layouts.customer')

@section('style')
<style>
    .frame {
        background: #f1f2f9;
        border-radius: 83px;
        border-style: solid;
        border-color: var(--app-color-tone-secondary-1-50percent,
                rgba(35, 54, 86, 0.5));
        border-width: 3px;
        padding: 0px 40px 0px 40px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        width: 550px;
        height: 60px;
        position: relative;
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    }

    .p24bb {
        color: var(--app-color-tone-primary, #171433);
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 24px;
    }

    .p24b {
        color: #171433;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 24px;
        font-weight: 600;
    }

    .p16b {
        color: rgba(23, 20, 51, 0.7);
        font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
    }

    .text {
        color: var(--app-color-tone-primary-1, rgba(23, 20, 51, 0.7));
        text-align: left;
        font-family: var(--app-text-styles-app-title-22-font-family,
                "Barlow-SemiBold",
                sans-serif);
        font-size: var(--app-text-styles-app-title-22-font-size, 22px);
        font-weight: var(--app-text-styles-app-title-22-font-weight, 600);
        position: relative;
    }

    .next-button {
        background: var(--app-color-tone-secondary-1, #233656);
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        border-radius: 30px;
        flex-shrink: 0;
        color: #ffffff;
        text-align: left;
        font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
        top: calc(50% - 8.5px);
        padding: 10px 30px 10px 30px;
    }

    .icn {
        position: absolute;
        margin-left: 500px;
    }

    .pika-button:hover,
    .pika-row.pick-whole-week:hover .pika-button {
        color: #fff;
        background: var(--app-color-tone-secondary-1, #233656);
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        border-radius: 3px;
    }

</style>
@endsection

@section('content')
<div class="d-flex flex-column" id="content-wrapper" style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 100%;">
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 0px;height: 31px;"><strong>New Student</strong></p>
    <div style="margin-bottom: 30px; position: absolute;" onclick="window.location.href='{{ route('wave.home') }}'"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></div>
    <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
        <div style="width: 50%; padding-top: 30px;">
            <div class="progress beautiful progress-xs" style="height: 8px;border-top-left-radius: 50px;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-bottom-left-radius: 50px;">
                <div class="progress-bar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%; background: var(--app-color-tone-testing, linear-gradient(180deg,rgba(127, 158, 211, 1) 0%, rgba(165, 208, 245, 1) 100%));">
                    <span class="visually-hidden">20%</span></div>
            </div>
            <div style="margin-top: 50px;">
                <p class="p24b" style="text-align: center;">Personal Information</p>
                <p class="p16b" style="text-align: center;">Please fill in the details (1/5)</p>
            </div>
            <form action="{{ route('wave.newstudent') }}" method="post">
                @csrf
                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                    <input class="frame text" type="text" name="first_name" id="First_Name" placeholder="First Name" required>
                </div>
                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                    <input class="frame text" type="text" name="last_name" id="Last_Name" placeholder="Last Name" required>
                </div>
                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                    <input class="frame text" type="text" id="birth_date" name="dob" placeholder="Date Of Birth" required>
                    <svg class="icn" width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.7816 11.5556L19.6803 2.65737C19.8851 2.45184 20 2.17356 20 1.88346C20 1.59337 19.8851 1.31509 19.6803 1.10956L19.0247 0.453935C18.8193 0.248802 18.541 0.133574 18.2507 0.133574C17.9605 0.133574 17.6821 0.248802 17.4768 0.453935L10.0042 7.92601L2.52325 0.445491C2.3177 0.240771 2.03941 0.125827 1.7493 0.125827C1.45918 0.125827 1.18089 0.240771 0.975344 0.445491L0.319681 1.10112C0.114949 1.30665 -4.49794e-07 1.58491 -4.37114e-07 1.87501C-4.24433e-07 2.1651 0.114949 2.44338 0.319681 2.64891L9.22858 11.5556C9.43521 11.7602 9.71426 11.875 10.0051 11.875C10.2959 11.875 10.5749 11.7602 10.7816 11.5556Z" fill="#AAC9E4" />
                    </svg>
                </div>
                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                    <select class="frame text" name="gender" id="gender" style=" -webkit-appearance: none; -moz-appearance: none; appearance: none;" required>
                        <option value="" disabled selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <svg class="icn" width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.7816 11.5556L19.6803 2.65737C19.8851 2.45184 20 2.17356 20 1.88346C20 1.59337 19.8851 1.31509 19.6803 1.10956L19.0247 0.453935C18.8193 0.248802 18.541 0.133574 18.2507 0.133574C17.9605 0.133574 17.6821 0.248802 17.4768 0.453935L10.0042 7.92601L2.52325 0.445491C2.3177 0.240771 2.03941 0.125827 1.7493 0.125827C1.45918 0.125827 1.18089 0.240771 0.975344 0.445491L0.319681 1.10112C0.114949 1.30665 -4.49794e-07 1.58491 -4.37114e-07 1.87501C-4.24433e-07 2.1651 0.114949 2.44338 0.319681 2.64891L9.22858 11.5556C9.43521 11.7602 9.71426 11.875 10.0051 11.875C10.2959 11.875 10.5749 11.7602 10.7816 11.5556Z" fill="#AAC9E4" />
                    </svg>
                </div>

                <div class="d-xl-flex d-xxl-flex justify-content-xl-end justify-content-xxl-end align-items-xxl-center" style="margin-top: 50px;"><button class="button1 next-button" type="submit">Next<svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-left: 20px;">
                            <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                            </path>
                        </svg></button></div>
            </form>
        </div>
    </div>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
@endsection

@section('javascript')
<script>
   
    document.addEventListener('DOMContentLoaded', function() {
        const selectedDateInput = document.getElementById('birth_date');
        const datePickerContainer = document.querySelector('.datepicker-container');

        const picker = new Pikaday({
            field: selectedDateInput
            , format: 'DD/MM/YYYY'
            , yearRange: '1900:2024'
            , onSelect: function(date) {
                const selectedDateString = date.toLocaleDateString('en-GB', {
                    day: 'numeric'
                    , month: 'numeric'
                    , year: 'numeric'
                });
                selectedDateInput.value = selectedDateString;
            }
        , });
    });

</script>
@endsection
