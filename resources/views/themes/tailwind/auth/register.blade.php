@extends('theme::layouts.customer-login')

@section('style')
<style>
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

    .font-medium {
        font-size: 18px;
    }

    .bg {
        border-radius: 33.5px;
        border-style: solid;
        border-color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
        border-width: 3px;
        position: absolute;
        right: 0%;
        left: -4%;
        width: 110%;
        bottom: 0%;
        top: 0%;
        height: 105%;
    }

    .enter-your-details-to-create-account,
    .enter-your-details-to-create-account * {
        box-sizing: border-box;
    }

    .enter-your-details-to-create-account {
        color: var(--appcolortone-primary-1, rgba(23, 20, 51, 0.7));
        text-align: center;
        font-family: "Barlow-Medium", sans-serif;
        font-size: 16px;
        font-weight: 500;
        position: relative;
        width: 261.19px;
        height: 27px;
        margin: auto;
    }

    .create-new-account,
    .create-new-account * {
        box-sizing: border-box;
    }

    .create-new-account {
        color: var(--appcolortone-primary, #171433);
        text-align: center;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 30px;
        font-weight: 600;
        position: relative;
    }

    .textField {
        box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);
        height: 60px;
        margin-top: 20px;
        border-radius: 130.5px;
        border: 3px solid var(--app-color-tone-secondary-150, rgba(35, 54, 86, 0.50));
        font-family: Barlow;
        font-size: 17px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        width: 100%;
        margin-left: 0px;

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

</style>
@endsection

@section('content')
<body class="d-md-flex justify-content-md-center align-items-md-center" style="background: #F1F2F9;">
    <div class="d-md-flex justify-content-md-center align-items-md-center centered">
        <form method="POST" action="{{ route('register') }}" class="text-center d-md-flex d-lg-flex d-xl-flex flex-column justify-content-md-center align-items-md-center align-items-lg-center justify-content-xl-center align-items-xl-center" style="width: 400px;height: 520px;">
            @csrf
            <div class="flex flex-col justify-center pb-10 sm:pb-20 sm:px-6 lg:px-8">
                <div class="create-new-account">Create New Account</div>
                <div class="enter-your-details-to-create-account">
                    Enter Your details to create account
                </div>

                <div class="mt-3 rounded-md ">
                    <select class=" textField" name="type" id="type" style=" -webkit-appearance: none; -moz-appearance: none; appearance: none;margin-top:0px;padding-left:10px;margin-bottom:-20px;" required onchange="togglePhoneNumberInput()">
                        <option value="" disabled selected>Please select the user type</option>
                        <option value="student">Student</option>
                        <option value="guardian">Guardian</option>
                    </select>
                    <svg class="icn" width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform:translateX(160px);margin-top:-50px!important;">
                        <path d="M10.7816 11.5556L19.6803 2.65737C19.8851 2.45184 20 2.17356 20 1.88346C20 1.59337 19.8851 1.31509 19.6803 1.10956L19.0247 0.453935C18.8193 0.248802 18.541 0.133574 18.2507 0.133574C17.9605 0.133574 17.6821 0.248802 17.4768 0.453935L10.0042 7.92601L2.52325 0.445491C2.3177 0.240771 2.03941 0.125827 1.7493 0.125827C1.45918 0.125827 1.18089 0.240771 0.975344 0.445491L0.319681 1.10112C0.114949 1.30665 -4.49794e-07 1.58491 -4.37114e-07 1.87501C-4.24433e-07 2.1651 0.114949 2.44338 0.319681 2.64891L9.22858 11.5556C9.43521 11.7602 9.71426 11.875 10.0051 11.875C10.2959 11.875 10.5749 11.7602 10.7816 11.5556Z" fill="#AAC9E4" />
                    </svg>
                </div>
                
                <div class="mt-6">
                    <div class="mt-3 rounded-md ">
                        <input class="form-control textField" type="text" name="first_name" placeholder="First name" class="w-full form-input" required>
                    </div>
                    @if ($errors->has('first_name'))
                    <div class="mt-1 text-red-500">
                        {{ $errors->first('first_name') }}
                    </div>
                    @endif
                </div>

                @if(setting('auth.username_in_registration') && setting('auth.username_in_registration') == 'yes')
                <div class="mt-6">
                    <div class="mt-3 rounded-md">
                        <input class="form-control textField" type="text" name="last_name" placeholder="Last Name" value="{{ old('username') }}" class="w-full form-input" required>
                    </div>
                    @if ($errors->has('last_name'))
                    <div class="mt-1 text-red-500">
                        {{ $errors->first('last_name') }}
                    </div>
                    @endif
                </div>
                @endif

                <div class="mt-6">
                    <div class="mt-3 rounded-md ">
                        <input class="form-control textField" type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="w-full form-input" required>
                    </div>
                    @if ($errors->has('email'))
                    <div class="mt-1 text-red-500">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>

                <div class="mt-3 rounded-md" id="phone-number-input" style="display: none;">
                    <!-- Phone number input field will be added dynamically here based on the selected option -->
                </div>

                <div class="mt-6">
                    <div class="mt-3 rounded-md  password-wrapper">
                        <input id="password" class="form-control textField" type="password" name="password" placeholder="Password" class="w-full form-input" required>
                        <div id="togglePassword" class="frame-2608721 eye-icon" onclick="togglePassword()">
                            <svg class="eye-icn" width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right:30px;">
                                <path d="M11.5082 2.58984C5.86322 2.58984 0.832222 8.45785 0.620222 8.70785C0.550166 8.79057 0.511719 8.89545 0.511719 9.00385C0.511719 9.11224 0.550166 9.21713 0.620222 9.29985C1.98126 10.837 3.54255 12.1843 5.26222 13.3058L8.13422 10.4338C7.851 9.76242 7.77441 9.0218 7.91426 8.30663C8.05411 7.59145 8.40404 6.93423 8.91932 6.41895C9.4346 5.90366 10.0918 5.55374 10.807 5.41389C11.5222 5.27404 12.2628 5.35062 12.9342 5.63385L15.2952 3.27285C14.0818 2.82823 12.8005 2.59714 11.5082 2.58984Z" fill="#AAC9E4" />
                                <path d="M22.4197 8.74402C20.9946 6.82504 19.1765 5.23224 17.0867 4.07202L19.6187 1.54002C19.7046 1.45409 19.7529 1.33754 19.7529 1.21602C19.7529 1.0945 19.7046 0.977951 19.6187 0.892021C19.5327 0.806091 19.4162 0.757813 19.2947 0.757812C19.1731 0.757813 19.0566 0.806091 18.9707 0.892021L3.39267 16.47C3.30693 16.556 3.25879 16.6726 3.25879 16.794C3.25879 16.9155 3.30693 17.032 3.39267 17.118C3.43489 17.1608 3.48519 17.1947 3.54063 17.2179C3.59608 17.2411 3.65557 17.253 3.71567 17.253C3.83712 17.2529 3.95359 17.2047 4.03967 17.119L6.91267 14.246C8.33452 14.9805 9.90479 15.3819 11.5047 15.42C17.1497 15.42 22.1807 9.55202 22.3927 9.30202C22.4578 9.22486 22.4957 9.12843 22.5006 9.02759C22.5055 8.92675 22.477 8.8271 22.4197 8.74402ZM11.5047 12.67C10.6929 12.6665 9.9057 12.3912 9.26867 11.888L14.3877 6.76902C14.812 7.30793 15.0757 7.95564 15.1484 8.63772C15.2211 9.31979 15.0999 10.0085 14.7987 10.6248C14.4974 11.241 14.0284 11.7598 13.4456 12.1214C12.8627 12.483 12.1896 12.6728 11.5037 12.669L11.5047 12.67Z" fill="#AAC9E4" />
                            </svg>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                    <div class="mt-1 text-red-500">
                        {{ $errors->first('password') }}
                    </div>
                    @endif
                </div>

                <div class="mt-6">
                    <div class="mt-3 rounded-md  password-wrapper ">
                        <input id="password_confirmation" class="form-control textField" type="password" name="password_confirmation" placeholder="Confirm password" class="w-full form-input" required>
                        <div id="togglePassword_confirmation" class="frame-2608721 eye-icon" onclick="togglePasswordConfirmation()">
                            <svg class="eye-icn" width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right:30px;">
                                <path d="M11.5082 2.58984C5.86322 2.58984 0.832222 8.45785 0.620222 8.70785C0.550166 8.79057 0.511719 8.89545 0.511719 9.00385C0.511719 9.11224 0.550166 9.21713 0.620222 9.29985C1.98126 10.837 3.54255 12.1843 5.26222 13.3058L8.13422 10.4338C7.851 9.76242 7.77441 9.0218 7.91426 8.30663C8.05411 7.59145 8.40404 6.93423 8.91932 6.41895C9.4346 5.90366 10.0918 5.55374 10.807 5.41389C11.5222 5.27404 12.2628 5.35062 12.9342 5.63385L15.2952 3.27285C14.0818 2.82823 12.8005 2.59714 11.5082 2.58984Z" fill="#AAC9E4" />
                                <path d="M22.4197 8.74402C20.9946 6.82504 19.1765 5.23224 17.0867 4.07202L19.6187 1.54002C19.7046 1.45409 19.7529 1.33754 19.7529 1.21602C19.7529 1.0945 19.7046 0.977951 19.6187 0.892021C19.5327 0.806091 19.4162 0.757813 19.2947 0.757812C19.1731 0.757813 19.0566 0.806091 18.9707 0.892021L3.39267 16.47C3.30693 16.556 3.25879 16.6726 3.25879 16.794C3.25879 16.9155 3.30693 17.032 3.39267 17.118C3.43489 17.1608 3.48519 17.1947 3.54063 17.2179C3.59608 17.2411 3.65557 17.253 3.71567 17.253C3.83712 17.2529 3.95359 17.2047 4.03967 17.119L6.91267 14.246C8.33452 14.9805 9.90479 15.3819 11.5047 15.42C17.1497 15.42 22.1807 9.55202 22.3927 9.30202C22.4578 9.22486 22.4957 9.12843 22.5006 9.02759C22.5055 8.92675 22.477 8.8271 22.4197 8.74402ZM11.5047 12.67C10.6929 12.6665 9.9057 12.3912 9.26867 11.888L14.3877 6.76902C14.812 7.30793 15.0757 7.95564 15.1484 8.63772C15.2211 9.31979 15.0999 10.0085 14.7987 10.6248C14.4974 11.241 14.0284 11.7598 13.4456 12.1214C12.8627 12.483 12.1896 12.6728 11.5037 12.669L11.5047 12.67Z" fill="#AAC9E4" />
                            </svg>
                        </div>
                    </div>
                    @if ($errors->has('password_confirmation'))
                    <div class="mt-1 text-red-500">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                    @endif
                </div>

                <div class="mt-3 rounded-md ">
                    <div class="flex flex-col items-center justify-center text-sm leading-5" style="margin-bottom:-20px;margin-top:30px;">
                        <span class="block w-full mt-8 rounded-md">
                            <button class="button1" type="submit" style="border: none;height:60px;width:372px;">
                                Sign Up
                            </button>
                        </span>
                    </div>
                </div>

                
        </form>
        <div class="mt-4" style="margin-top:-50px;">
            <a href="{{ route('request.auth-login') }}" class="mt-12 font-medium transition duration-150 ease-in-out text-wave-600 hover:text-wave-500 focus:outline-none focus:underline">
                Already have an account? Login here
            </a>
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
        @if(session('auth_register'))
            @if(session('auth_register')['status'] === 'fail')
                @php
                    $changePasswordMessage = session('auth_register')['message'];
                    
                @endphp
    
                @if (is_array($changePasswordMessage))
                
                    @foreach ($changePasswordMessage as $key => $value)
                    
                        @if (is_array($value))
                        
                            @foreach ($value as $message)
                                toastr.error("{{ $message }}", { "timeOut": 12000 }); // 10 seconds timeout
                            @endforeach
                        @else
                            toastr.error("{{ $value }}", { "timeOut": 12000 }); // 10 seconds timeout
                        @endif
                    @endforeach
                @else
                    toastr.error("{{ $changePasswordMessage }}", { "timeOut": 12000 }); // 10 seconds timeout
                @endif
    
                @php
                    session()->forget('auth_register');
                @endphp
            @endif
        @endif
    </script>

    <script>
        function togglePhoneNumberInput() {
        var userType = document.getElementById('type').value;
        var phoneNumberInput = document.getElementById('phone-number-input');

        if (userType === 'guardian') {
            phoneNumberInput.innerHTML = `
                <div class="mt-3 rounded-md">
                    <input class="form-control textField" type="number" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" class="w-full form-input" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                </div>
            `;
            phoneNumberInput.style.display = 'block';
        } else {
            phoneNumberInput.innerHTML = ''; // Clear the HTML if the option is not "Guardian"
            phoneNumberInput.style.display = 'none';
        }
    }
    </script>
@endsection
