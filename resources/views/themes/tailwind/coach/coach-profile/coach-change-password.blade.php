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

        .p24bb {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
            font-weight: 500;
            font-style: normal;
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
            border-radius: 100.5px;
            padding: 4px 10px 4px 10px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            height: 79.6px;
            color: #ffffff;
            text-align: left;
            font-family: "Poppins-Medium", sans-serif;
            font-size: 18px;
            font-weight: 500;
            position: relative;
        }

        .textField {
            box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);
            height: 79.6px;
            background-color: transparent;
            margin-top: 20px;
            border-radius: 100.5px;
            border: 3px solid var(--app-color-tone-secondary-150, rgba(35, 54, 86, 0.50));
            font-family: Barlow;
            font-size: 18px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            width: 175%;
            margin-left: -2px;
        }

        .textField1 {
            height: 79.6px;
            background-color: transparent;
            margin-top: 20px;
            font-family: Barlow;
            font-size: 18px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            width: 175%;
            margin-left: -2px;
        }

        .textField input:focus {
            outline: none;
            border-bottom: none;
        }

        .textField1::placeholder {
            color: #171433;
        }
    </style>
@endsection

@section('content')


            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
                style="background: #FFF;padding: 20px;min-height:100%; ">
                <div class="container-fluid d-flex flex-column p-0">
                    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                        href="#"><img src="{{ asset('themes/tailwind/images/HKSA-logo-1.png') }}"
                            style="width: 200px;height: 67px; margin-top: 60px;" width="191" height="16"></a>
                    <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
                        <li class="nav-item"><a class="nav-link d-xl-flex align-items-xl-center" href="Home/1-Homepage.html"
                                style="height: 56px;width: 250px;"><img src="{{ asset('themes/tailwind/images/home.png') }}"
                                    style="width: 20px;margin-right: 15px;"><span class="fw-normal p16normal3"
                                    style="color: rgb(145,155,171);">Home</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="Home/2-Notification.html" style="width: 250px;"><img
                                    src="{{ asset('themes/tailwind/images/student.png') }}"
                                    style="width: 20px;margin-right: 30px;"><span class="fw-normal p16normal3"
                                    style="color: rgb(145, 155, 171);">Schedule</span></a></li>
                        <li class="nav-item"><a class="nav-link1 active" href="Home/2-Notification.html"
                                style="width: 250px;margin-top:-10px; text-decoration: none;"><img
                                    src="{{ asset('themes/tailwind/images/account.png') }}"
                                    style="width: 20px;margin-right: 15px;filter: brightness(0) invert(1);"><span
                                    class="fw-normal p16normal3"style="color: #FFFFFF;">Account</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="Notification/1-Notification.html"
                                style="width: 250px;"><img src="{{ asset('themes/tailwind/images/notification.png') }}"
                                    style="width: 20px;margin-right: 30px;"><span class="fw-normal p16normal3"
                                    style="color:  rgb(145, 155, 171);">Notification</span></a></li>
                    </ul>
                </div>
            </nav>
            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);min-height:100vh;">
                <div style="width: 100%;margin-bottom: 30px;">
                    <a href="{{ route('coach-personal-information') }}">
                        <button class type="button"
                            style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                            <i class="fas fa-chevron-left"></i></button></a>
                    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                        style="margin-bottom: 0px;height: 31px;margin-top:-40px;"><strong>Change Password</strong></p>
                </div>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center"
                    style="margin-top: 20px;">
                    <div style="width: 50%;">
                        <p class="p16normal" style="text-align: center;color:#7a7a7a;">Enter new password</p>
                        <input id="password" class=" textField" type="password" name="password"
                            placeholder="Current Password" class="w-full form-input"
                            style="width:100%;outline:none;padding-left: 40px;margin-top:15px;">
                        <div id="togglePassword" class="frame-2608721 eye-icon" onclick="togglePassword()">
                            <svg class="eye-icn" width="23" height="18" viewBox="0 0 23 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                style="position: relative;margin-top:-50px;margin-left:520px;">
                                <path
                                    d="M11.5082 2.58984C5.86322 2.58984 0.832222 8.45785 0.620222 8.70785C0.550166 8.79057 0.511719 8.89545 0.511719 9.00385C0.511719 9.11224 0.550166 9.21713 0.620222 9.29985C1.98126 10.837 3.54255 12.1843 5.26222 13.3058L8.13422 10.4338C7.851 9.76242 7.77441 9.0218 7.91426 8.30663C8.05411 7.59145 8.40404 6.93423 8.91932 6.41895C9.4346 5.90366 10.0918 5.55374 10.807 5.41389C11.5222 5.27404 12.2628 5.35062 12.9342 5.63385L15.2952 3.27285C14.0818 2.82823 12.8005 2.59714 11.5082 2.58984Z"
                                    fill="#AAC9E4" />
                                <path
                                    d="M22.4197 8.74402C20.9946 6.82504 19.1765 5.23224 17.0867 4.07202L19.6187 1.54002C19.7046 1.45409 19.7529 1.33754 19.7529 1.21602C19.7529 1.0945 19.7046 0.977951 19.6187 0.892021C19.5327 0.806091 19.4162 0.757813 19.2947 0.757812C19.1731 0.757813 19.0566 0.806091 18.9707 0.892021L3.39267 16.47C3.30693 16.556 3.25879 16.6726 3.25879 16.794C3.25879 16.9155 3.30693 17.032 3.39267 17.118C3.43489 17.1608 3.48519 17.1947 3.54063 17.2179C3.59608 17.2411 3.65557 17.253 3.71567 17.253C3.83712 17.2529 3.95359 17.2047 4.03967 17.119L6.91267 14.246C8.33452 14.9805 9.90479 15.3819 11.5047 15.42C17.1497 15.42 22.1807 9.55202 22.3927 9.30202C22.4578 9.22486 22.4957 9.12843 22.5006 9.02759C22.5055 8.92675 22.477 8.8271 22.4197 8.74402ZM11.5047 12.67C10.6929 12.6665 9.9057 12.3912 9.26867 11.888L14.3877 6.76902C14.812 7.30793 15.0757 7.95564 15.1484 8.63772C15.2211 9.31979 15.0999 10.0085 14.7987 10.6248C14.4974 11.241 14.0284 11.7598 13.4456 12.1214C12.8627 12.483 12.1896 12.6728 11.5037 12.669L11.5047 12.67Z"
                                    fill="#AAC9E4" />
                            </svg>
                        </div>
                        <input id="new_password" class=" textField" type="password" name="new_password"
                            placeholder="New Password" class="w-full form-input"
                            style="width:100%;outline:none;padding-left: 40px;margin-top:15px;">
                        <div id="togglePassword" class="frame-2608721 eye-icon" onclick="toggleNewPassword()">
                            <svg class="eye-icn" width="23" height="18" viewBox="0 0 23 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                style="position: relative;margin-top:-50px;margin-left:520px;">
                                <path
                                    d="M11.5082 2.58984C5.86322 2.58984 0.832222 8.45785 0.620222 8.70785C0.550166 8.79057 0.511719 8.89545 0.511719 9.00385C0.511719 9.11224 0.550166 9.21713 0.620222 9.29985C1.98126 10.837 3.54255 12.1843 5.26222 13.3058L8.13422 10.4338C7.851 9.76242 7.77441 9.0218 7.91426 8.30663C8.05411 7.59145 8.40404 6.93423 8.91932 6.41895C9.4346 5.90366 10.0918 5.55374 10.807 5.41389C11.5222 5.27404 12.2628 5.35062 12.9342 5.63385L15.2952 3.27285C14.0818 2.82823 12.8005 2.59714 11.5082 2.58984Z"
                                    fill="#AAC9E4" />
                                <path
                                    d="M22.4197 8.74402C20.9946 6.82504 19.1765 5.23224 17.0867 4.07202L19.6187 1.54002C19.7046 1.45409 19.7529 1.33754 19.7529 1.21602C19.7529 1.0945 19.7046 0.977951 19.6187 0.892021C19.5327 0.806091 19.4162 0.757813 19.2947 0.757812C19.1731 0.757813 19.0566 0.806091 18.9707 0.892021L3.39267 16.47C3.30693 16.556 3.25879 16.6726 3.25879 16.794C3.25879 16.9155 3.30693 17.032 3.39267 17.118C3.43489 17.1608 3.48519 17.1947 3.54063 17.2179C3.59608 17.2411 3.65557 17.253 3.71567 17.253C3.83712 17.2529 3.95359 17.2047 4.03967 17.119L6.91267 14.246C8.33452 14.9805 9.90479 15.3819 11.5047 15.42C17.1497 15.42 22.1807 9.55202 22.3927 9.30202C22.4578 9.22486 22.4957 9.12843 22.5006 9.02759C22.5055 8.92675 22.477 8.8271 22.4197 8.74402ZM11.5047 12.67C10.6929 12.6665 9.9057 12.3912 9.26867 11.888L14.3877 6.76902C14.812 7.30793 15.0757 7.95564 15.1484 8.63772C15.2211 9.31979 15.0999 10.0085 14.7987 10.6248C14.4974 11.241 14.0284 11.7598 13.4456 12.1214C12.8627 12.483 12.1896 12.6728 11.5037 12.669L11.5047 12.67Z"
                                    fill="#AAC9E4" />
                            </svg>
                        </div>
                        <input id="password_confirmation" class=" textField" type="password" name="password_confirmation"
                            placeholder="Confirm password" required
                            class="w-full form-input"style="width:100%;outline:none;padding-left: 40px;margin-top:15px;">
                        <div id="togglePassword_confirmation" class="frame-2608721 eye-icon"
                            onclick="togglePasswordConfirmation()">
                            <svg class="eye-icn" width="23" height="18" viewBox="0 0 23 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg"style="position: relative;margin-top:-50px;margin-left:520px;">
                                <path
                                    d="M11.5082 2.58984C5.86322 2.58984 0.832222 8.45785 0.620222 8.70785C0.550166 8.79057 0.511719 8.89545 0.511719 9.00385C0.511719 9.11224 0.550166 9.21713 0.620222 9.29985C1.98126 10.837 3.54255 12.1843 5.26222 13.3058L8.13422 10.4338C7.851 9.76242 7.77441 9.0218 7.91426 8.30663C8.05411 7.59145 8.40404 6.93423 8.91932 6.41895C9.4346 5.90366 10.0918 5.55374 10.807 5.41389C11.5222 5.27404 12.2628 5.35062 12.9342 5.63385L15.2952 3.27285C14.0818 2.82823 12.8005 2.59714 11.5082 2.58984Z"
                                    fill="#AAC9E4" />
                                <path
                                    d="M22.4197 8.74402C20.9946 6.82504 19.1765 5.23224 17.0867 4.07202L19.6187 1.54002C19.7046 1.45409 19.7529 1.33754 19.7529 1.21602C19.7529 1.0945 19.7046 0.977951 19.6187 0.892021C19.5327 0.806091 19.4162 0.757813 19.2947 0.757812C19.1731 0.757813 19.0566 0.806091 18.9707 0.892021L3.39267 16.47C3.30693 16.556 3.25879 16.6726 3.25879 16.794C3.25879 16.9155 3.30693 17.032 3.39267 17.118C3.43489 17.1608 3.48519 17.1947 3.54063 17.2179C3.59608 17.2411 3.65557 17.253 3.71567 17.253C3.83712 17.2529 3.95359 17.2047 4.03967 17.119L6.91267 14.246C8.33452 14.9805 9.90479 15.3819 11.5047 15.42C17.1497 15.42 22.1807 9.55202 22.3927 9.30202C22.4578 9.22486 22.4957 9.12843 22.5006 9.02759C22.5055 8.92675 22.477 8.8271 22.4197 8.74402ZM11.5047 12.67C10.6929 12.6665 9.9057 12.3912 9.26867 11.888L14.3877 6.76902C14.812 7.30793 15.0757 7.95564 15.1484 8.63772C15.2211 9.31979 15.0999 10.0085 14.7987 10.6248C14.4974 11.241 14.0284 11.7598 13.4456 12.1214C12.8627 12.483 12.1896 12.6728 11.5037 12.669L11.5047 12.67Z"
                                    fill="#AAC9E4" />
                            </svg>
                        </div>
                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"><button
                                id="changeBtn"class="button1" type="button"
                                style="margin-top: 20px;width:595px;height:79.6px!important;">Change</button></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.querySelector('#password');

            if (passwordInput) { // Check if passwordInput exists
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }

                const textPasswordInput = document.querySelector('.password-wrapper .textField[type="text"].visible');
                if (textPasswordInput) { // Check if textPasswordInput exists
                    if (textPasswordInput.style.display === 'block') {
                        textPasswordInput.style.display = 'none';
                    } else {
                        textPasswordInput.style.display = 'block';
                    }
                }
            }
        }

        function toggleNewPassword() {
            const passwordInput = document.querySelector('#new_password');

            if (passwordInput) { // Check if passwordInput exists
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }

                const textPasswordInput = document.querySelector(
                    '.new-password-wrapper .textField[type="text"].visible-new');
                if (textPasswordInput) { // Check if textPasswordInput exists
                    if (textPasswordInput.style.display === 'block') {
                        textPasswordInput.style.display = 'none';
                    } else {
                        textPasswordInput.style.display = 'block';
                    }
                }
            }
        }

        function togglePasswordConfirmation() {
            const passwordInput = document.querySelector('#password_confirmation');

            if (passwordInput) { // Check if both elements exist
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
                const textPasswordInput = document.querySelector(
                    '.password-confirmation-wrapper .textField[type="text"].visible-confirmation');
                if (textPasswordInput) {
                    if (textPasswordInput.style.display === 'block') {
                        textPasswordInput.style.display = 'none';
                    } else {
                        textPasswordInput.style.display = 'block';
                    }
                }
            }
        }
        $(document).ready(function() {
            $('#changeBtn').click(function() {
                var password = $('#password').val();
                var newPassword = $('#new_password').val();
                var passwordConfirmation = $('#password_confirmation').val();

                var errors = [];
                if (!password) {
                    errors.push("Please enter your current password.");
                }
                if (!newPassword) {
                    errors.push("Please enter your new password.");
                }
                if (!passwordConfirmation) {
                    errors.push("Please enter your confirm password.");
                }

                if (errors.length > 0) {
                    var errorMessage = "Please enter the following missing details:\n" + errors.join("\n");
                    alert(errorMessage);
                } else {
                    var data = {
                        password: password,
                        newPassword: newPassword,
                        passwordConfirmation: passwordConfirmation,
                    };

                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '/change-password',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        data: data,
                        success: function(response) {
                            console.log(response);
                            window.location.href = 'coach-personal-information';
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
        // $(document).ready(function() {
        //     $('#changeBtn').click(function() {
        //         var password = CryptoJS.SHA256($('#password').val()).toString();
        //         var newPassword = CryptoJS.SHA256($('#new_password').val()).toString();
        //         var passwordConfirmation = CryptoJS.SHA256($('#password_confirmation').val()).toString();


        //         var errors = [];
        //         if (!password) {
        //             errors.push("Please enter your current password.");
        //         }
        //         if (!newPassword) {
        //             errors.push("Please enter your new password.");
        //         }
        //         if (!passwordConfirmation) {
        //             errors.push("Please enter your confirm password.");
        //         }

        //         if (errors.length > 0) {
        //             var errorMessage = "Please enter the following missing details:\n" + errors.join("\n");
        //             alert(errorMessage);
        //         } else {
        //             var data = {
        //                 password: password,
        //                 newPassword: newPassword,
        //                 passwordConfirmation: passwordConfirmation,
        //             };

        //             var csrfToken = $('meta[name="csrf-token"]').attr('content');
        //             $.ajax({
        //                 url: '/change-password',
        //                 method: 'POST',
        //                 headers: {
        //                     'X-CSRF-TOKEN': csrfToken
        //                 },
        //                 data: data,
        //                 success: function(response) {
        //                   console.log(response);
        //                   window.location.href = 'personal-information';
        //                 },
        //                 error: function(xhr, status, error) {
        //                     console.error(xhr.responseText);
        //                 }
        //             });
        //         }
        //     });
        // });
    </script>
@endsection
