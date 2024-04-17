@extends('theme::layouts.customer-login')

@section('content')
<style>
    .sign-up {
        margin-left: -5px;
    }

    .password-wrapper {
        position: relative;
    }

    .eye-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }



    .password-wrapper .form-control.textField[type="password"] {
        display: block;
    }

    .password-wrapper .form-control.textField[type="text"].visible {
        display: none;
    }

    .bg {
        border-radius: 33.5px;
        border-style: solid;
        border-color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
        border-width: 3px;
        position: absolute;
        right: 0%;
        left: 0%;
        width: 100%;
        bottom: 0%;
        top: 0%;
        height: 100%;
        margin-left: -5px;
    }


    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #171433;
        background-color: transparent;
        border: none;
        border-bottom: 2px solid #171433;
        text-align: center;
        font-family: 'Barlow', sans-serif;
        font-size: 16px;
        font-weight: 500;
        line-height: normal;
        transition: border-bottom-color 0.3s ease;/
    }

    .rememberme {
        color: #233656;
        /* color: rgba(0, 0, 0, 0.90); */
        text-align: center;
        font-family: Barlow;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .p16b {
        color: #233656;
        text-align: center;
        font-family: Barlow;
        font-size: 16px;
        font-style: normal;
        font-weight: bold;
        line-height: normal;
    }

    .textField {
        box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);
        height: 70px;
        background-color: transparent;
        margin-top: 20px;
        border-radius: 130.5px;
        border: 3px solid var(--app-color-tone-secondary-150, rgba(35, 54, 86, 0.50));
        font-family: Barlow;
        font-size: 17px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        width: 110%;
        margin-left: -15px;
    }

    .button1 {
        background: #233656;
        border-radius: 130.5px;
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

    .form-check-input:checked {
        background-color: #233656;
        /* Change this to the desired color */
        border-color: #233656;
        /* Change this to the desired color */
    }

</style>

<body class="d-md-flex justify-content-md-center align-items-md-center" style="background: #F1F2F9;">
    <div class="d-md-flex justify-content-md-center align-items-md-center centered">
        <form method="POST" action="{{ route('request.auth-login') }}" class="text-center d-md-flex d-lg-flex d-xl-flex flex-column justify-content-md-center align-items-md-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="width: 400px;height: 520px;">
            @csrf
            <input type="hidden" name="from" value="customer">
            <div><img src="{{ asset('themes/tailwind/images/HKSA-logo-1.png') }}" style="width: 271px;margin-bottom: 50px;" width="271" height="91"></div>
            <div class="d-xl-flex" style="margin-top: 10px;height: 100%;">
                <div style="width: 300px;height: 100%;">
                    <ul class="nav nav-tabs nav-fill" role="tablist" style="border-style: solid;">
                        <li class="nav-item " role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1" style="background: transparent;">Main Account</a>
                        </li>
                        {{-- <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2" style="font-family: Barlow, sans-serif;">Guardian Account</a></li> --}}
                    </ul>

                    <div class="tab-content" style="height: 80%;">
                        <div class="tab-pane active" role="tabpanel" id="tab-1" style="height: 100%;">
                            <div>

                                <div style="height: auto;">
                                    <input class="form-control textField" type="text" name="email" placeholder="Email Address / Phone Number" value="{{ old('email') }}" />

                                    <div class="password-wrapper">
                                        <input id="password" class="form-control textField" type="password" name="password" placeholder="Password">
                                        {{-- This is my session error --}}
                                        <p class="text-red-500 text-xs mt-1">{{ session('login-error') }}</p>
                                        <div id="togglePassword" class="frame-2608721 eye-icon" onclick="togglePassword()">
                                            <svg class="eye-icn" width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.5082 2.58984C5.86322 2.58984 0.832222 8.45785 0.620222 8.70785C0.550166 8.79057 0.511719 8.89545 0.511719 9.00385C0.511719 9.11224 0.550166 9.21713 0.620222 9.29985C1.98126 10.837 3.54255 12.1843 5.26222 13.3058L8.13422 10.4338C7.851 9.76242 7.77441 9.0218 7.91426 8.30663C8.05411 7.59145 8.40404 6.93423 8.91932 6.41895C9.4346 5.90366 10.0918 5.55374 10.807 5.41389C11.5222 5.27404 12.2628 5.35062 12.9342 5.63385L15.2952 3.27285C14.0818 2.82823 12.8005 2.59714 11.5082 2.58984Z" fill="#AAC9E4" />
                                                <path d="M22.4197 8.74402C20.9946 6.82504 19.1765 5.23224 17.0867 4.07202L19.6187 1.54002C19.7046 1.45409 19.7529 1.33754 19.7529 1.21602C19.7529 1.0945 19.7046 0.977951 19.6187 0.892021C19.5327 0.806091 19.4162 0.757813 19.2947 0.757812C19.1731 0.757813 19.0566 0.806091 18.9707 0.892021L3.39267 16.47C3.30693 16.556 3.25879 16.6726 3.25879 16.794C3.25879 16.9155 3.30693 17.032 3.39267 17.118C3.43489 17.1608 3.48519 17.1947 3.54063 17.2179C3.59608 17.2411 3.65557 17.253 3.71567 17.253C3.83712 17.2529 3.95359 17.2047 4.03967 17.119L6.91267 14.246C8.33452 14.9805 9.90479 15.3819 11.5047 15.42C17.1497 15.42 22.1807 9.55202 22.3927 9.30202C22.4578 9.22486 22.4957 9.12843 22.5006 9.02759C22.5055 8.92675 22.477 8.8271 22.4197 8.74402ZM11.5047 12.67C10.6929 12.6665 9.9057 12.3912 9.26867 11.888L14.3877 6.76902C14.812 7.30793 15.0757 7.95564 15.1484 8.63772C15.2211 9.31979 15.0999 10.0085 14.7987 10.6248C14.4974 11.241 14.0284 11.7598 13.4456 12.1214C12.8627 12.483 12.1896 12.6728 11.5037 12.669L11.5047 12.67Z" fill="#AAC9E4" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>


                                <div class="d-xl-flex justify-content-between align-items-xl-center" style="margin-top: 10px;width: 100%;">
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1" name="remember_me">
                                        <label class="form-check-label rememberme" for="formCheck-1">Remember Me</label>
                                    </div>
                                    <p class="p16b" style="margin-top:10px;"><a href="{{ route('customer.forgot-password') }}" style="color:#233656!important;">Forgot Password</a></p>
                                </div>
                                <button class="button1" style="border: none; margin-left: -15px;margin-top: 10px;height:70px;width:330px;" type="submit">
                                    Sign In
                                </button>


                            </div>
                            <div class="d-xl-flex justify-content-xl-center align-items-xl-center" style="height: auto;margin-top: 30px;">
                                <div class="don-t-have-an-account-sign-up">
                                    <span>
                                        <span class="don-t-have-an-account-sign-up-span">
                                            Don’t have an Account?
                                        </span>
                                        <a href="{{ route('register') }}" class="don-t-have-an-account-sign-up-span2">Sign Up</a>
                                    </span>
                                    <br>
                                    <span>
                                        <span class="don-t-have-an-account-sign-up-span">
                                            Logging in as admin?
                                        </span>
                                        <a href="{{ route('wave.user.admin-panel.index') }}" class="don-t-have-an-account-sign-up-span2">CMS</a>
                                    </span>
                                </div>

                            </div>
                        </div>
        </form>
        {{-- <div class="tab-pane" role="tabpanel" id="tab-2">
            <div>
                <form method="POST" action="{{ route('auth-login1') }}">
                    @csrf
                    <input type="hidden" name="from" value="guardian">
                    <div style="height: auto;"><input class="form-control textField" type="text" name="phone" placeholder="Phone Number">
                        <div class="password-wrapper">
                            <input id="password-tab2" class="form-control textField" type="password" name="password" placeholder="Password">
                            <div id="togglePassword-tab2" class="frame-2608721 eye-icon" onclick="togglePassword1('tab2')">
                                <svg class="eye-icn" width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.5082 2.58984C5.86322 2.58984 0.832222 8.45785 0.620222 8.70785C0.550166 8.79057 0.511719 8.89545 0.511719 9.00385C0.511719 9.11224 0.550166 9.21713 0.620222 9.29985C1.98126 10.837 3.54255 12.1843 5.26222 13.3058L8.13422 10.4338C7.851 9.76242 7.77441 9.0218 7.91426 8.30663C8.05411 7.59145 8.40404 6.93423 8.91932 6.41895C9.4346 5.90366 10.0918 5.55374 10.807 5.41389C11.5222 5.27404 12.2628 5.35062 12.9342 5.63385L15.2952 3.27285C14.0818 2.82823 12.8005 2.59714 11.5082 2.58984Z" fill="#AAC9E4" />
                                    <path d="M22.4197 8.74402C20.9946 6.82504 19.1765 5.23224 17.0867 4.07202L19.6187 1.54002C19.7046 1.45409 19.7529 1.33754 19.7529 1.21602C19.7529 1.0945 19.7046 0.977951 19.6187 0.892021C19.5327 0.806091 19.4162 0.757813 19.2947 0.757812C19.1731 0.757813 19.0566 0.806091 18.9707 0.892021L3.39267 16.47C3.30693 16.556 3.25879 16.6726 3.25879 16.794C3.25879 16.9155 3.30693 17.032 3.39267 17.118C3.43489 17.1608 3.48519 17.1947 3.54063 17.2179C3.59608 17.2411 3.65557 17.253 3.71567 17.253C3.83712 17.2529 3.95359 17.2047 4.03967 17.119L6.91267 14.246C8.33452 14.9805 9.90479 15.3819 11.5047 15.42C17.1497 15.42 22.1807 9.55202 22.3927 9.30202C22.4578 9.22486 22.4957 9.12843 22.5006 9.02759C22.5055 8.92675 22.477 8.8271 22.4197 8.74402ZM11.5047 12.67C10.6929 12.6665 9.9057 12.3912 9.26867 11.888L14.3877 6.76902C14.812 7.30793 15.0757 7.95564 15.1484 8.63772C15.2211 9.31979 15.0999 10.0085 14.7987 10.6248C14.4974 11.241 14.0284 11.7598 13.4456 12.1214C12.8627 12.483 12.1896 12.6728 11.5037 12.669L11.5047 12.67Z" fill="#AAC9E4" />
                                </svg>
                            </div>
                        </div>
                        <div class="d-xl-flex justify-content-between align-items-xl-center" style="margin-top: 10px;width: 100%;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label rememberme" for="remember">Remember Me</label>
                            </div>

                            <p class="p16b" style="margin-top:10px;"><a href="{{ route('customer.forgot-password') }}" style="color:#233656!important;">Forgot Password</a></p>
                        </div>

                        <button class="button1" style="border: none; margin-left: -15px;margin-top: 10px;height:70px;width:330px;" type="submit">
                            Sign In
                        </button>

                    </div>
                    <div class="d-xl-flex justify-content-xl-center align-items-xl-center" style="height: auto;margin-top: 30px;">
                        <div class="don-t-have-an-account-sign-up">
                            <span>
                                <span class="don-t-have-an-account-sign-up-span">
                                    Don’t have an Account?
                                </span>
                                <a href="{{ route('register') }}" class="don-t-have-an-account-sign-up-span2">Sign
                                    Up</a>
                            </span>
                            <br>
                            <span>
                                <span class="don-t-have-an-account-sign-up-span">
                                    Logging in as admin?
                                </span>
                                <a href="{{ route('wave.user.admin-panel.index') }}" class="don-t-have-an-account-sign-up-span2">CMS</a>
                            </span>

                        </div>

                    </div>
                </form>
            </div>
        </div> --}}
    </div>
    </div>

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

        function togglePassword1() {
            const passwordInput = document.querySelector('#password-tab2');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }

            const textPasswordInput = document.querySelector(
                '#togglePassword-tab2 + .password-wrapper .textField[type="text"].visible-tab2');

            if (textPasswordInput.style.display === 'block') {
                textPasswordInput.style.display = 'none';
            } else {
                textPasswordInput.style.display = 'block';
            }
        }

    </script>

    <script>
        $(document).ready(function() {
            // Check if 'auth_error' is set in the session and not empty
            @if(session('auth_error') && session('auth_error') !== '')
            // Display the error message using Toastr
            toastr.error('{{ session('auth_error') }}', '', {
                    positionClass: 'toast-top-center' // Position the toastr to center bottom
                });

            // Clear the session variable 'auth_error'
            @php
            session() -> forget('auth_error');
            @endphp
            @endif
        });

        $(document).ready(function() {
            // Check if 'auth_error' is set in the session and not empty
            @if(session('account_created') && session('account_created') !== '')
            // Display the error message using Toastr
            toastr.success('{{ session('account_created') }}', '', {
                    positionClass: 'toast-top-center' // Position the toastr to center bottom
                });

            // Clear the session variable 'auth_error'
            @php
            session() -> forget('account_created');
            @endphp
            @endif
        });
    </script>
    @endsection
</body>

