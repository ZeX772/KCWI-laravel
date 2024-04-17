@extends('theme::layouts.customer-login')
@section('content')
<style>

</style>
    <input type="hidden" name="token" value="{{ session('registration_token') }}">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">OTP Resent</div>

                    <div class="card-body text-center">
                        <p>We have resent the OTP code to your email. Please kindly check your inbox, including the spam folder.</p>

                        <div class="logo-box">
                            <img src="{{ asset('themes/tailwind/images/HKSA-logo-1.png') }}" alt="Logo" class="logo-img">
                        </div>
                        <form action="{{ route('resend-otp') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Go back to Verify OTP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection