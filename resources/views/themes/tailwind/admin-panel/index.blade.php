@extends('theme::layouts.login')

<?php
$logo = asset('themes/tailwind/images/Logo.png');

if ($data && $data['logo'] !== '') {
    $logo = $data['logo'] ?? $logo;
}
?>

@section('content')
    <section class="h-100" style="width: 100vw;" id="admin-login_page_container">
        <div class="row h-100" style="margin-right: 0px;margin-left: 0px;width: 100vw;">
            <div class="col-md-6 d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center h-100"
                style="text-align: center;padding: 0px;width: 50vw;">
                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 500px;"
                    class="gap-5">
                    <img src="{{ $logo }}" style="width: 300px;">
                    <h1 style="font-size: 72px; font-weight: 700;color: #4A5C7A;margin-top: 50px;">Welcome to Admin Panel
                    </h1>
                </div>
            </div>
            <div class="col-md-6 d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center h-100"
                style="border-left: 1px solid #AAC9E4;padding: 0px;width: 50vw;">
                <form action="{{ route('wave.user.admin-panel.login') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="from" value="admin">
                    <div style="width: 400px;">
                        <div style="color: #636363;">
                            <h1 style="color: #3B3B3B;font-weight: bold;font-size: 36px;">Login To Your Account</h1>
                        </div>
                        @if (session('invalid'))
                            <div class="alert alert-danger mt-3" role="alert">
                                {{ session('invalid') }}
                            </div>
                        @endif
                        <div style="margin-top: 30px;">
                            <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Email</h1>
                            <input type="text" value="{{ session('email') ? session('email') : '' }}" name="email"
                                id="email" class="{{ session('email_error') ? 'border border-danger' : '' }}"
                                style="width: 100%;height: 48px;border-style: none;background: #F5F5F5;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;color: #3B3B3B;font-family: Poppins, sans-serif;padding-left: 16px;">
                            @if (session('email_error'))
                                <div class="mt-1 text-red-500">
                                    {{ session('email_error') }}
                                </div>
                            @endif
                        </div>
                        <div style="margin-top: 30px;">
                            <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Password</h1>
                            <div class="password-container" style="width: 100%;">
                                <input type="password" id="password" name="password"
                                    class="form-control-lg {{ session('password') ? 'border border-danger' : '' }}"
                                    style="width: 100%;border-style: none;background: #F5F5F5;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;padding-left: 16px;">
                                <i class="fa-solid fa-eye" id="eye" style="color: #3B3B3B;"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-2 password-container" style="width: 100%;margin-top: 0px;">
                            <div class="col d-flex justify-content-start align-items-center" style="text-align: center;">
                                <input type="checkbox" name="remember_me" id="remember" style="color: #4A5C7A;">
                                <label for="remember" class="d-xl-flex mt-1"
                                    style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif; margin-left: 5px;">Remember
                                    Me</label>
                            </div>
                            <div class="col d-xl-flex justify-content-xl-end"><a
                                    href="{{ route('wave.user.admin-panel.forgot-password') }}"
                                    style="color: #4A5C7A;font-size: 14px;font-family: Poppins, sans-serif;">Forgot
                                    Password?</a></div>
                        </div>
                        <div class="d-xl-flex align-items-xl-center password-container"
                            style="width: 100%;margin-top: 50px;">
                            <button id="login-btn" class="btn btn-primary" type="submit"
                                style="width: 100%;height: 48px;background: #4A5C7A;font-family: Poppins, sans-serif;box-shadow: 0px 7px #39455b;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;border-left-style: none;border-left-color: var(--bs-btn-disabled-color);">
                                <div class="spinner-border d-none" role="status"
                                    style="width: 17px; height: 17px; margin-right: 5px;">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                Log In
                            </button>
                        </div>
                        <br>
                        <a href="{{ route('auth-login') }}"><span>Want to login as a customer?</span></a>
                    </div>
                </form>
                <?php
                session()->forget(['email_error', 'invalid', 'email', 'password']);
                ?>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
            /**
             * ---------------------------
             * EVENTS
             * ---------------------------
             */

            /** HIDE & SHOW PASSWORD
             * Eye icon event
             */
            $('#admin-login_page_container').on('click', '#eye', function() {
                $(this).toggleClass("fa-eye fa-eye-slash");

                const passwordInput = $('input[name=password]');

                var newType = (passwordInput.attr("type") === "password") ? "text" : "password";

                passwordInput.attr("type", newType);
            });

            /** DISABLE BUTTON and SHOW PROGRESS WHEN FORM SUBMITED
             * Disabling button with loading spinner
             */
            $('#admin-login_page_container').on('click', '#login-btn', function() {
                setTimeout(() => {
                    $(this).attr("disabled", true);
                    $('.spinner-border').toggleClass('d-none');
                }, 200);
            });
        });
    </script>
@endsection
