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

    .previous-button {
        background: rgba(170, 201, 228, 0.50);
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        color: #171433;
        text-align: left;
        font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
        top: calc(50% - 8.5px);
        border-radius: 30px;
        flex-shrink: 0;
        padding: 10px 20px 10px 20px;
    }


    .eye-icon {
        position: absolute;
        left: 90%;
        cursor: pointer;
    }

        /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
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
                <div class="progress-bar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%; background: var(--app-color-tone-testing, linear-gradient(180deg,rgba(127, 158, 211, 1) 0%, rgba(165, 208, 245, 1) 100%));">
                    <span class="visually-hidden">40%</span></div>
            </div>
            <div style="margin-top: 50px;">
                <p class="p24b" style="text-align: center;">Personal Information</p>
                <p class="p16b" style="text-align: center;">Please fill in the details (2/5)</p>
            </div>
            <form action="{{ route('wave.newstudent2') }}" method="post">
                @csrf
                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                    <input class="frame text" type="text" name="hkid" id="HKID" placeholder="HKID ie.S955583" value="" required>
                </div>

                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                    <input class="frame text" type="text" name="email" id="email" placeholder="Email" required>
                </div>

                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center frame" style="margin-bottom: 10px; display: flex; flex-direction: row;">
                    <input class="text" type="password" name="password" id="password" placeholder="Password" style="border: none; background: var(--app-color-tone-bg-color, #F1F2F9); outline: none;" required>
                    <div id="togglePassword" class="eye-icon" onclick="togglePassword()">
                        <svg class="eye-icn" width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right:300px;">
                            <path d="M11.5082 2.58984C5.86322 2.58984 0.832222 8.45785 0.620222 8.70785C0.550166 8.79057 0.511719 8.89545 0.511719 9.00385C0.511719 9.11224 0.550166 9.21713 0.620222 9.29985C1.98126 10.837 3.54255 12.1843 5.26222 13.3058L8.13422 10.4338C7.851 9.76242 7.77441 9.0218 7.91426 8.30663C8.05411 7.59145 8.40404 6.93423 8.91932 6.41895C9.4346 5.90366 10.0918 5.55374 10.807 5.41389C11.5222 5.27404 12.2628 5.35062 12.9342 5.63385L15.2952 3.27285C14.0818 2.82823 12.8005 2.59714 11.5082 2.58984Z" fill="#AAC9E4" />
                            <path d="M22.4197 8.74402C20.9946 6.82504 19.1765 5.23224 17.0867 4.07202L19.6187 1.54002C19.7046 1.45409 19.7529 1.33754 19.7529 1.21602C19.7529 1.0945 19.7046 0.977951 19.6187 0.892021C19.5327 0.806091 19.4162 0.757813 19.2947 0.757812C19.1731 0.757813 19.0566 0.806091 18.9707 0.892021L3.39267 16.47C3.30693 16.556 3.25879 16.6726 3.25879 16.794C3.25879 16.9155 3.30693 17.032 3.39267 17.118C3.43489 17.1608 3.48519 17.1947 3.54063 17.2179C3.59608 17.2411 3.65557 17.253 3.71567 17.253C3.83712 17.2529 3.95359 17.2047 4.03967 17.119L6.91267 14.246C8.33452 14.9805 9.90479 15.3819 11.5047 15.42C17.1497 15.42 22.1807 9.55202 22.3927 9.30202C22.4578 9.22486 22.4957 9.12843 22.5006 9.02759C22.5055 8.92675 22.477 8.8271 22.4197 8.74402ZM11.5047 12.67C10.6929 12.6665 9.9057 12.3912 9.26867 11.888L14.3877 6.76902C14.812 7.30793 15.0757 7.95564 15.1484 8.63772C15.2211 9.31979 15.0999 10.0085 14.7987 10.6248C14.4974 11.241 14.0284 11.7598 13.4456 12.1214C12.8627 12.483 12.1896 12.6728 11.5037 12.669L11.5047 12.67Z" fill="#AAC9E4" />
                        </svg>
                    </div>
                </div>
                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center frame" style="margin-bottom: 10px; display: flex; flex-direction: row;">
                    <input class="text" type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation" style="border: none; background: var(--app-color-tone-bg-color, #F1F2F9); outline: none;" required>
                    <div id="togglePassword_confirmation" class="eye-icon" onclick="togglePasswordConfirmation()">
                        <svg class="eye-icn" width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right:300px;">
                            <path d="M11.5082 2.58984C5.86322 2.58984 0.832222 8.45785 0.620222 8.70785C0.550166 8.79057 0.511719 8.89545 0.511719 9.00385C0.511719 9.11224 0.550166 9.21713 0.620222 9.29985C1.98126 10.837 3.54255 12.1843 5.26222 13.3058L8.13422 10.4338C7.851 9.76242 7.77441 9.0218 7.91426 8.30663C8.05411 7.59145 8.40404 6.93423 8.91932 6.41895C9.4346 5.90366 10.0918 5.55374 10.807 5.41389C11.5222 5.27404 12.2628 5.35062 12.9342 5.63385L15.2952 3.27285C14.0818 2.82823 12.8005 2.59714 11.5082 2.58984Z" fill="#AAC9E4" />
                            <path d="M22.4197 8.74402C20.9946 6.82504 19.1765 5.23224 17.0867 4.07202L19.6187 1.54002C19.7046 1.45409 19.7529 1.33754 19.7529 1.21602C19.7529 1.0945 19.7046 0.977951 19.6187 0.892021C19.5327 0.806091 19.4162 0.757813 19.2947 0.757812C19.1731 0.757813 19.0566 0.806091 18.9707 0.892021L3.39267 16.47C3.30693 16.556 3.25879 16.6726 3.25879 16.794C3.25879 16.9155 3.30693 17.032 3.39267 17.118C3.43489 17.1608 3.48519 17.1947 3.54063 17.2179C3.59608 17.2411 3.65557 17.253 3.71567 17.253C3.83712 17.2529 3.95359 17.2047 4.03967 17.119L6.91267 14.246C8.33452 14.9805 9.90479 15.3819 11.5047 15.42C17.1497 15.42 22.1807 9.55202 22.3927 9.30202C22.4578 9.22486 22.4957 9.12843 22.5006 9.02759C22.5055 8.92675 22.477 8.8271 22.4197 8.74402ZM11.5047 12.67C10.6929 12.6665 9.9057 12.3912 9.26867 11.888L14.3877 6.76902C14.812 7.30793 15.0757 7.95564 15.1484 8.63772C15.2211 9.31979 15.0999 10.0085 14.7987 10.6248C14.4974 11.241 14.0284 11.7598 13.4456 12.1214C12.8627 12.483 12.1896 12.6728 11.5037 12.669L11.5047 12.67Z" fill="#AAC9E4" />
                        </svg>
                    </div>
                </div>
                
                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                    <input class="frame text" type="text" name="address" id="address" placeholder="Address" required>
                </div>
                {{-- <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
                    <input class="frame text" type="text" name="phone" id="phone" placeholder="Phone" required>
                </div> --}}




                <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="margin-top: 50px;">
                    <div><button class="button1 previous-button" type="button" onclick="window.location.href='{{ route('wave.newstudent') }}'"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 20px;">
                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z">
                                </path>
                            </svg>Previous</button></div>
                    <div><button class="button1 next-button" type="submit">Next<svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-left: 20px;">
                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                </path>
                            </svg></button></div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</body>
@endsection

@section('javascript')
<script>
    function togglePassword() {
        const passwordInput = document.querySelector('#password');


        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }

        const textPasswordInput = document.querySelector('.password-wrapper .textField[type="text"].visible');
        if (textPasswordInput.style.display === 'block') {
            textPasswordInput.style.display = 'none';
        } else {
            textPasswordInput.style.display = 'block';
        }
    }

    function togglePasswordConfirmation() {
        const passwordInput = document.querySelector('#password_confirmation');
        const textPasswordInput = document.querySelector('.password-confirmation-wrapper .textField[type="text"].visible-confirmation');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }

        if (textPasswordInput.style.display === 'block') {
            textPasswordInput.style.display = 'none';
        } else {
            textPasswordInput.style.display = 'block';
        }
    }

</script>

<script>
    @if(session('add_new_student'))
        @if(session('add_new_student')['status'] === 'fail')
            @php
                $addMessage = session('add_new_student')['message'];
            @endphp

            @if (is_array($addMessage))
                @foreach ($addMessage as $key => $value)
                    @if (is_array($value))
                        @foreach ($value as $message)
                            toastr.error("{{ $message }}", { "timeOut": 20000 }); // 10 seconds timeout
                        @endforeach
                    @else
                        toastr.error("{{ $value }}", { "timeOut": 20000 }); // 10 seconds timeout
                    @endif
                @endforeach
            @else
                toastr.error("{{ $addMessage }}", { "timeOut": 20000 }); // 10 seconds timeout
            @endif

            @php
                session()->forget('add_new_student');
            @endphp
        @endif
    @endif
</script>

@endsection
