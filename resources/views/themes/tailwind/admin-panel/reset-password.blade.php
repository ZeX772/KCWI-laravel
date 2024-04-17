@extends('theme::layouts.login')

@section('content')
<section class="h-100" style="width: 100vw;">
    <div class="row h-100" id="reset-password-container" style="margin-right: 0px;margin-left: 0px;width: 100vw;">
        <div class="col-md-6 d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center h-100" style="text-align: center;padding: 0px;width: 50vw;">
            <div style="width: 400px;"><img src="{{ asset('themes/tailwind/images/Logo.png') }}">
                <h1 style="font-size: 50px;font-weight: bold;color: #4A5C7A;margin-top: 50px;">Welcome to Admin Panel</h1>
            </div>
        </div>
        <div class="col-md-6 d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center h-100" style="border-left: 1px solid #AAC9E4;padding: 0px;width: 50vw;">
            <form action="{{ route('confirm-reset') }}" method="post">
                <div style="width: 400px;">
                    <div style="color: #636363;text-align: center;">
                        <center><img src="{{ asset('themes/tailwind/images/Lock.png') }}"></center>
                        <h1 style="color: #3B3B3B;font-size: 36px;">Reset Your Password</h1>
                    </div>
                    <div style="margin-top: 30px;">
                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Password</h1>
                        <div class="password-container" style="width: 100%;">
                            <input type="password" name="password" value="{{ old('password') }}" id="password" class="form-control-lg {{ $errors->has('password') ? 'border border-danger' : '' }}" style="width: 100%;border-style: none;background: #F5F5F5;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;padding-left: 16px;" required><i class="fa-solid fa-eye" id="eye" style="color: #3B3B3B;"></i>
                            @if ($errors->has('password'))
                            <div class="mt-1 text-red-500">
                                {{ $errors->first('password') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div style="margin-top: 30px; margin-bottom: 50px;">
                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Confirm Password</h1>
                        <div class="password-container" style="width: 100%;">
                            <input type="password" name="password1" value="{{ old('password1') }}" id="password-1" class="form-control-lg {{ $errors->has('password') ? 'border border-danger' : '' }}" style="width: 100%;border-style: none;background: #F5F5F5;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;padding-left: 16px;" required><i class="fa-solid fa-eye" id="eye-1" style="color: #3B3B3B;"></i>
                        </div>
                    </div>
                    <button class="btn btn-warning" id="reset-password-btn" type="submit" style="width: 100%;height: 48px;background: #4A5C7A;font-family: Poppins, sans-serif;box-shadow: 0px 7px #39455b;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;border-left-style: none;border-left-color: var(--bs-btn-disabled-color);color: rgb(255,255,255);">
                        <div class="spinner-border d-none" role="status" style="width: 17px; height: 17px; margin-right: 5px;">
                            <span class="sr-only">Loading...</span>
                        </div>
                        Reset Password
                    </button>
                    <div class="text-center d-xl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center password-container" style="width: 100%;margin-top: 50px;text-align: center;"><a href="{{ route('wave.user.admin-panel.index') }}" style="color: #4A5C7A;font-size: 14px;font-family: Poppins, sans-serif;">Go back to Login</a></div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(function() {
        const passwordInput = document.querySelector("#password");
        const eye = document.querySelector("#eye");

        eye.addEventListener("click", function() {
            this.classList.toggle("fa-eye-slash");
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
        });

        const passwordInput2 = document.querySelector("#password-1");
        const eye2 = document.querySelector("#eye-1");

        eye2.addEventListener("click", function() {
            this.classList.toggle("fa-eye-slash");
            const type2 = passwordInput2.getAttribute("type") === "password" ? "text" : "password";
            passwordInput2.setAttribute("type", type2);
        });

        /**
         * ---------------------------
         * EVENTS
         * ---------------------------
         */
        /** DISABLE BUTTON and SHOW PROGRESS WHEN FORM SUBMITED
         * Disabling button with loading spinner
         */
        $('#reset-password-container').on('click', '#reset-password-btn', function() {
            setTimeout(() => {
                $(this).attr("disabled", true);
                $('.spinner-border').toggleClass('d-none');
            }, 200);
        });
    });
</script>
@endsection