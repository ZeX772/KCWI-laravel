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
        width: 100%;
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
        width: 100%;
        margin-left: -2px;
    }

    .textField input:focus {
        outline: none;
        border-bottom: none;
    }

    .textField1::placeholder {
        color: #171433;
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
<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);min-height:100vh;width:100%">
    <form method="POST" action="{{ route('wave.edit-personal-information') }}">
        @csrf
        <div style="width: 100%;margin-bottom: 30px;">
            <a href="{{ route('wave.personal-information', ['id' => $user_id]) }}">
                <button class type="button" style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                    <i class="fas fa-chevron-left"></i></button></a>
            <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 0px;height: 31px;margin-top:-40px;"><strong>Personal Information</strong>
            </p>
        </div>
        <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="margin-top: 20px;">
            <div style="width: 50%;">
                <p class="p16normal" style="text-align: center;color:#7a7a7a;">Edit your personal information
                </p>
                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center textField" style="margin-top: 20px;margin-bottom: 10px;width:  100%;height: auto;padding-top: 10px;padding-bottom: 10px;padding-right: 40px;padding-left: 40px;">
                    <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start" style="width: 100%;">
                        <p class="p13normal" style="margin-bottom: 0px;opacity: 0.50;font-style:normal;">
                            <strong>First Name</strong></p>
                        <input id="firstName" type="text" name="first_name" class="textField1" style="margin-top:0px;height:100%;width: 100%;background: transparent;border-style: none;border-bottom-style: none;font-size: 18px;padding-top: 5px;padding-right: 5px;padding-bottom: 5px;padding-left: 5px;" value="{{ isset($response['first_name'])?$response['first_name']:''; }}">
                    </div>
                    @if ($errors->has('first_name'))
                    <div class="mt-1 text-red-500">
                        {{ $errors->first('first_name') }}
                    </div>
                    @endif
                </div>


                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center textField" style="margin-top: 20px;margin-bottom: 10px;width:  100%;height: auto;padding-top: 10px;padding-bottom: 10px;padding-right: 40px;padding-left: 40px;">
                    <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start" style="width: 100%;">
                        <p class="p13normal" style="margin-bottom: 0px;opacity: 0.50;font-style:normal;">
                            <strong>Last Name</strong></p>
                        <input id="firstName" type="text" name="last_name" class="textField1" style="margin-top:0px;height:100%;width: 100%;background: transparent;border-style: none;border-bottom-style: none;font-size: 18px;padding-top: 5px;padding-right: 5px;padding-bottom: 5px;padding-left: 5px;" value="{{ isset($response['last_name'])?$response['last_name']:''; }}">
                    </div>
                    @if ($errors->has('last_name'))
                    <div class="mt-1 text-red-500">
                        {{ $errors->first('last_name') }}
                    </div>
                    @endif
                </div>

                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center textField" style="margin-top: 20px;margin-bottom: 10px;width: 100%;height: auto;padding-top: 10px;padding-bottom: 10px;padding-right: 40px;padding-left: 40px;">
                    <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start" style="width: 100%;">
                        <p class="p13normal" style="margin-bottom: 0px;opacity: 0.50;font-style:normal;">
                            <strong>E-mail</strong></p>
                        <input name="email" id="email" type="text" class="textField1" style="margin-top:0px;height: auto;width: 100%;background: transparent;border-style: none;border-bottom-style: none;font-size: 18px;padding-top: 5px;padding-right: 5px;padding-bottom: 5px;padding-left: 5px;" value="{{ isset($response['email'])?$response['email']:''; }}">
                    </div>
                    @if ($errors->has('email'))
                    <div class="mt-1 text-red-500">
                        {{ $errors->first('email') }}
                    </div>
                    @endif

                </div>

                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center textField" style="margin-top: 20px;margin-bottom: 10px;width: 100%;height: auto;padding-top: 10px;padding-bottom: 10px;padding-right: 40px;padding-left: 40px;">
                    <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start" style="width: 100%;">
                        <p class="p13normal" style="margin-bottom: 0px;opacity: 0.50;font-style:normal;">
                            <strong>HKID</strong></p>
                        <input name="hkid" id="hkid" type="text" class="textField1" style="margin-top:0px;height: auto;width: 100%;background: transparent;border-style: none;border-bottom-style: none;font-size: 18px;padding-top: 5px;padding-right: 5px;padding-bottom: 5px;padding-left: 5px;" value="{{ $response['hkid'] }}">
                    </div>
                </div>
                @if(session('userSession')['role_id'] != 2)
                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center textField" style="margin-top: 20px;margin-bottom: 10px;width:  100%;height: auto;padding-top: 10px;padding-bottom: 10px;padding-right: 40px;padding-left: 40px;">
                    <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start" style="width: 100%;">
                        <p class="p13normal" style="margin-bottom: 0px;opacity: 0.50;font-style:normal;">
                            <strong>Gender</strong>
                        </p>
                        <select class="textField1" name="gender" id="gender" style="margin-top:0px;height: auto;width: 100%;background: transparent;border-style: none;border-bottom-style: none;font-size: 18px;padding-top: 5px;padding-right: 5px;padding-bottom: 5px;padding-left: 5px; -webkit-appearance: none; -moz-appearance: none; appearance: none;" required>
                            <option value="" disabled {{ !$response['gender'] ? 'selected' : '' }}>Gender</option>
                            <option value="male" {{ $response['gender'] == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $response['gender'] == 'female' ? 'selected' : '' }}>Female</option>
                        </select>

                    </div>
                </div>
                @endif

                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center textField" style="margin-top: 20px;margin-bottom: 10px;width:  100%;height: auto;padding-top: 10px;padding-bottom: 10px;padding-right: 40px;padding-left: 40px;">
                    <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start" style="width: 100%;">
                        <p class="p13normal" style="margin-bottom: 0px;opacity: 0.50;font-style:normal;">
                            <strong>Date Of Birth</strong></p>
                        <input class="textField1" type="date" id="dob" name="dob" placeholder="Date Of Birth" style="margin-top:0px;height: auto;width: 100%;background: transparent;border-style: none;border-bottom-style: none;font-size: 18px;padding-top: 5px;padding-right: 5px;padding-bottom: 5px;padding-left: 5px; -webkit-appearance: none; -moz-appearance: none; appearance: none;" max="{{ date('Y-m-d') }}" value="{{ $response['dob'] }}">
                    </div>
                </div>

                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center textField" style="margin-top: 20px;margin-bottom: 10px;width: 100%;height: auto;padding-top: 10px;padding-bottom: 10px;padding-right: 40px;padding-left: 40px;">
                    <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start" style="width: 100%;">
                        <p class="p13normal" style="margin-bottom: 0px;opacity: 0.50;font-style:normal;">
                            <strong>Address</strong></p>
                        <input name="address" id="address" type="text" class="textField1" style="margin-top:0px;height: auto;width: 100%;background: transparent;border-style: none;border-bottom-style: none;font-size: 18px;padding-top: 5px;padding-right: 5px;padding-bottom: 5px;padding-left: 5px;" value="{{ isset($response['address'])?$response['address']:''; }}">
                    </div>
                </div>

                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                    <button id="changeBtn" class="button1" type="submit" style="margin-top: 20px;width:100%;">Change</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
@if(session('edit_status'))
        @if(session('edit_status')['status'] === 'fail')
            @php
                $changeMessage = session('edit_status')['message'];
            @endphp

            @if (is_array($changeMessage))
                @foreach ($changeMessage as $key => $value)
                    @if (is_array($value))
                        @foreach ($value as $message)
                            toastr.error("{{ $message }}", { "timeOut": 12000 }); // 10 seconds timeout
                        @endforeach
                    @else
                        toastr.error("{{ $value }}", { "timeOut": 12000 }); // 10 seconds timeout
                    @endif
                @endforeach
            @else
                toastr.error("{{ $changeMessage }}", { "timeOut": 12000 }); // 10 seconds timeout
            @endif

        @elseif(session('edit_status')['status'] === 'pass')
            @php
            $changeMessage = session('edit_status')['message'];
            @endphp
            toastr.success("{{ $changeMessage }}", { "timeOut": 12000 });
        @endif
        @php
            session()->forget('edit_status');
         @endphp
    @endif

</script>
@endsection
