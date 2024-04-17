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

        .p22bold {
            box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);
            min-height: 70px;
            background-color: transparent;
            margin-top: 20px;
            border-radius: 130.5px;
            border: 3px solid var(--app-color-tone-secondary-150, rgba(35, 54, 86, 0.50));
            font-family: Barlow;
            font-size: 17px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            min-width: 100%;
            margin-left: -25px;
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

        .p22bold {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 22px;
            border: 3px solid rgba(170, 201, 228, 0.5);
            border-color: #AAC9E4;
            font-weight: 700;
            outline: none;
        }

        .p22bold::placeholder {
            color: #233656;
        }

        .box {
            background: #ffffff;
            border-radius: 24px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            justify-content: flex-start;
            align-self: stretch;
            flex-shrink: 0;
            /* height: 450px; */
            width: 650px;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .form-check-input:checked {
            background-color: #233656 !important;
            border-color: #171433 !important;
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
    </style>
@endsection

@section('content')


            
            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);min-height:100vh;">
                <div style="width: 100%;margin-bottom: 30px;">
                    <a href="{{ route('wave.account') }}">
                        <button class type="button"
                            style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                            <i class="fas fa-chevron-left"></i></button></a>
                    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                        style="margin-bottom: 0px;height: 31px;margin-top:-40px;"><strong>Payment Method</strong></p>
                </div>
                <form class="box" style="padding: 20px 0; margin: 0 auto;" id="form-container">
                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center select1"
                        style="margin-top: 20px;margin-bottom: 10px;width:615px;padding-left:50px;">
                        <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start"
                            style="width: 100%;">
                            <p class="p18b"
                                style="margin-bottom: -53px;opacity: 0.50;margin-right:10px;text-indent:10px;"><strong>Name
                                    of Card</strong></p>
                            <input id="cardNameInput" type="text" class="p22bold text" name="name" value="{{ $entry ? $entry->name : '' }}"
                                style="height: 50px;width: 100%;background: transparent;border-bottom-style: none;text-indent:30px; padding-top: 20px;text-align:left;"
                                placeholder="CHAN TAI MAN">
                        </div>
                    </div>
                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center select1"
                        style="margin-top: 20px;margin-bottom: 10px;width: 615px;padding-left:50px;">
                        <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start"
                            style="width: 100%;">
                            <p class="p18b" style="margin-bottom: -48px;opacity: 0.5;"><strong>Card Number</strong></p>
                            <input id="cardNumberInput"type="text" class="p22bold text" name="cardNumber" value="{{ $entry ? $entry->cardNumber : '' }}"
                                style="height: 50px;width: 100%;background: transparent;border-bottom-style: none;text-indent:23px; padding-top: 20px;text-align:left;"
                                placeholder="1234 1234 1234 1234">
                        </div>
                    </div>
                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center select1"
                            style="margin-top: 20px;margin-bottom: 10px;width:287.5px;margin-right: 50px;padding-left:50px;">
                            <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start"
                                style="width: 100%;">
                                <p class="p18b" style="margin-bottom: -48px;opacity: 0.5;"><strong>Exp. Date
                                        (MM/YY)</strong></p>
                                <input id="expDateInput" type="text" class="p22bold text" name="exp_date" value="{{ $entry ? ($entry->expiryMonth . '/' . $entry->expiryYear) : '' }}"
                                    style="height: 50px;width: 110%;background: transparent;border-bottom-style: none;margin-right:20px;text-indent: 20px; padding-top: 20px;text-align:left;"
                                    placeholder="01/25">
                            </div>
                        </div>
                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center select1"
                            style="margin-top: 20px;margin-bottom: 10px;width:237.5px;margin-left: 10px; margin-right: 20px;right:20%;">
                            <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start"
                                style="width: 100%;">
                                <p class="p18b" style="margin-bottom: -48px;opacity: 0.50;"><strong>CVV</strong></p>
                                <input id="cvvInput"type="text" class="p22bold text" name="cvv" value="{{ $entry ? $entry->cvv : '' }}"
                                    style="height: 50px;width: 110%;background: transparent;border-bottom-style: none;margin-right:-30px;text-indent: 20px; padding-top: 20px;color:#171433;text-align:left;"
                                    placeholder="789">
                            </div>
                        </div>
                    </div>

                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                        <div class="form-check" style="left:-70%;">
                            <input class="form-check-input" type="checkbox" id="formCheck-1" name="is_default" <?= $entry ? ($entry->is_default ? "checked" : "") : "" ?>>
                            <label
                                class="form-check-label p16normal3" for="formCheck-1" style="color: #171433!important;">Set
                                as default payment card</label>
                        </div>
                    </div>
                    <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                        <button id="confirmPaymentBtn" class="button1" type="button"
                            style="margin-top: 0px;left:-93%;width:290%;">Use Payment Method</button>
                    </div>
                </form>
            </div>
        </div>
        </div>

        </div>
        </div>

        </div>

    </body>
@endsection

@section('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#form-container').on('keydown', '#expDateInput', function(e){
                var inputValue = $(this).val();

                if ( !/^\d$/.test(e.key) && event.keyCode !== 8 ) {
                    event.preventDefault(); // Prevent non-numeric characters
                }

                if( inputValue.length >= 5 && event.keyCode !== 8 )
                    e.preventDefault();

                if( inputValue.length == 2 && event.keyCode != 8 ) { // Ensure minimum input length (MM/YY)
                    var monthYear = inputValue + '/';
                    $(this).val(monthYear);
                }
            });
            
            $('#form-container').on('click', '#confirmPaymentBtn', async function(){
                $(this).prop('disabled', true);

                const serializedForm = $('#form-container').serializeArray();

                let formData = {};
                let errorMessages = ""

                serializedForm.forEach(element => {
                    formData[element.name] = element.value;

                    if( element.value == "" )
                        errorMessages += (`<p>${element.name} ` + ' is required. </p>')
                });

                if( errorMessages !== "" ) {
                    toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);

                    $(this).removeAttr('disabled');
                    return;
                }

                formData['expiryMonth'] = formData['exp_date'].split('/')[0];
                formData['expiryYear'] = formData['exp_date'].split('/')[1];
                formData['cardNumber'] = formData['cardNumber'].replace(/\s/g, '');
                formData['is_default'] = $('#formCheck-1').is(':checked') ? 1 : 0;

                await axios.post(`${getApiUrl()}/customer/payment/token`, formData, {
                        headers: {
                            'Authorization': 'Bearer ' + getUserToken()
                        }
                    }).then(res => {
                        $(this).removeAttr('disabled');

                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");

                        } else {
                            toastInfo("Cant' Save", res.data.message, "warning");

                        }
                    }).catch(error => {
                        $(this).removeAttr('disabled');

                        if( error.response.status == 400 || error.response.status == 422 ) {
                            let errorMessages = "";
                            Object.keys(error.response.data.errors).forEach(key => {
                                error.response.data.errors[key].forEach(value => {
                                    errorMessages += (`<p>${key}: ` + value + '</p><br>')

                                    toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                                });
                            });
                        }

                        if( error.response.status == 404 ) {
                            toastTopEnd("Cant' Process", error.response.data.message, "warning");
                        }

                        if( error.response.status == 500 ) {
                            toastTopEnd("System Error", error.response.data.message, "error");
                        }

                        if( error.response.status == 401 ) {
                            alert("Your session expired!");
                            window.location = window.location;
                        }

                        console.error('Error fetching data:', error);
                    });
        
            });
        });
    </script>
@endsection
