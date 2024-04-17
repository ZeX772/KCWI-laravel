@extends('theme::layouts.customer')

@section('style')
<style>
    .text {
        color: white;
        text-align: center;
    }

    .button1 {
        background: #AAC9E4;
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        color: #171433;
        text-align: center;
        font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
        top: calc(50% - 8.5px);
        border-radius: 30px;
        flex-shrink: 0;
        padding: 10px 20px 10px 20px;
        border-style: none;
        margin-top: 50px;
        width: 100%;
    }

</style>
@endsection

@section('content')


<div class="d-flex flex-column align-items-center justify-content-center" id="content-wrapper" style="padding: 50px;background: var(--app-color-tone-secondary-1, #233656); width: 100%; height: 100vh;">
    <div style="text-align: center;">
        <img src="{{ asset('themes/tailwind/images/swimminglogo.png') }}">
        <p class="text"><strong>You are ready to go!</strong></p>
        <p class="text">Thanks for taking your time to</br>create student account with us. </br>Let's start
            your Student Journey</br>and swimming.</p>
        <button class="button1" type="button" onclick="window.location.href='{{ route('wave.enrollment') }}'">Get Started!</button>
    </div>
</div>

@endsection

@section('javascript')
<script></script>
@endsection
