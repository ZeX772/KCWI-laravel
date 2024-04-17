@extends('theme::layouts.customer')

@section('content')

<section class="h-100" style="width: 100vw;">
    <div class="row h-100" style="margin-right: 0px;margin-left: 0px;width: 100vw;">
        <div class="col-md-6 d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center h-100" style="text-align: center;padding: 0px;width: 50vw;">
            <div style="width: 400px;"><img src="/themes/tailwind/images/Logo.png">
                <h1 style="font-size: 50px;font-weight: bold;color: #4A5C7A;margin-top: 50px;">Welcome to Admin Panel</h1>
            </div>
        </div>
        <div class="col-md-6 d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center h-100" style="border-left: 1px solid #AAC9E4;padding: 0px;width: 50vw;">
            <form action="#" method="post">
                {{ csrf_field() }}
                <div style="width: 400px;">
                    <div style="color: #636363;text-align: center;"><img src="/themes/tailwind/images/Lock.png">
                        <h1 style="color: #3B3B3B;font-size: 36px;">Forgot Password</h1>
                        <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">Please enter your email address to reset your password.</h1>
                    </div>
                    <div style="margin-top: 30px;">
                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Email</h1><input name="email" id="email" required type="email" style="width: 100%;height: 48px;border-style: none;background: #F5F5F5;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;color: #3B3B3B;font-family: Poppins, sans-serif;padding-top: 1px;padding-left: 16px;">
                    </div>
                    @if (session('message'))
                        <div class="flex justify-center">
                            <div class="mt-1 text-red-500">
                                {{ session('message') }}
                            </div>
                        </div>
                    @endif
                    <div class="d-xl-flex align-items-xl-center password-container" style="width: 100%;margin-top: 50px;"><button type="submit" class="btn btn-primary" role="submit" style="width: 100%;height: 48px;background: #4A5C7A;font-family: Poppins, sans-serif;box-shadow: 0px 7px #39455b;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;border-left-style: none;border-left-color: var(--bs-btn-disabled-color);padding-top: 12px;">Forgot Password</button></div>
                    <div class="text-center d-xl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center password-container" style="width: 100%;margin-top: 50px;text-align: center;"><a href="{{ route('login') }}" style="color: #4A5C7A;font-size: 14px;font-family: Poppins, sans-serif;">Go back to Login</a></div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
