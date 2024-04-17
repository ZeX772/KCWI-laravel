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

        .shopping {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
            font-weight: 700;
            margin-right: -10%;
        }

        .order {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
            background: #ffffff;
            border-radius: 8px;
            border-style: solid;
            border-color: var(--appcolortone-secondary-1, #233656);
            border-width: 1px;
            padding: 15px 16px 15px 16px;
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

        .container-fluid {
            display: flex;
            flex-direction: column;
        }

        .p16b {
            color: rgba(23, 20, 51, 0.7);
            text-align: center;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            font-weight: bold;
        }

        .box1 {
            background: #ffffff;
            padding: 0px 24px 0px 24px;
            min-height: 40px;
            flex-direction: column;
            gap: 12px;
            align-items: center;
            justify-content: flex-start;
            min-width: 110%;
            border-radius: 24px;
            margin-left: -30px;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .button1 {
            margin-top: -30px;
            min-height: 65px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex: 1;
            position: relative;
            font-size: 1.2em;
            padding: 24px 72px;
            border-radius: 33.5px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }

        .button1 {
            background: #233656;
            border-radius: 33px;
            width: 100%;
            height: 50px;
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
            margin-right: 10px;
        }

        .container-fluid {
            display: flex;
            flex-direction: column;

        }

        img {
            transition: opacity 0.3s ease;
            /* Add a smooth transition effect */
        }

        .p22bold {
            box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);
            min-height: 70px;
            background-color: transparent;
            margin-top: 20px;
            border-radius: 130.5px;
            border: 3px solid rgba(170, 201, 228, 0.5);
            border-color: #AAC9E4;
            font-family: Barlow;
            font-size: 17px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            min-width: 100%;
            margin-left: -25px;
            outline: none;
        }

        .text {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: var(--apptextstyles-app-title-22-font-family,
                    "Barlow-SemiBold",
                    sans-serif);
            font-size: var(--apptextstyles-app-title-22-font-size, 22px);
            font-weight: var(--apptextstyles-app-title-22-font-weight, 600);
            position: relative;
        }

        .text::placeholder {
            color: #171433;
        }

        .form-check-input:checked {
            background-color: #233656 !important;
            border-color: #171433 !important;
        }

        .button2 {
            background: #233656;
            border-radius: 29px;
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
            padding: 15px 90px;
        }

        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            color: var(--bs-modal-color);
            pointer-events: auto;
            background-color: transparent;
            /* Set background color to transparent */
            background-clip: padding-box;
            border: var(--bs-modal-border-width) solid var(--bs-modal-border-color);
            border-radius: var(--bs-modal-border-radius);
            outline: 0;
            border: none;
        }

        #other-payment-form_container {
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #other-payment-form_container div {
            width: 50%;
        }

        #other-payment-form_container div p {
            text-align: center;
        }

        .selected-payment_label {
            font-weight: 700;
        }

        /* Default modal style */
        #wechat-pay_modal .modal-content {
            background-color: #fff;
        }

        #qr-container {
            display: flex;
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <body id="page-top" style="height: 100vh; margin: 0;">
        <div id="wrapper" class="d-flex" style="min-height: 100vh;">
            

            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);height: 100vh;">
                <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                    <div style="display: flex; align-items: center;">
                        <div
                            class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                            <a href="{{ route('wave.shopping') }}">
                                <button class type="button"
                                    style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                                    <i class="fas fa-chevron-left"></i></button></a>
                        </div>
                    </div>

                    <p class="shopping d-xl-flex justify-content-xl-center align-items-xl-center "
                        style="margin-bottom: 0px;height: 31px;text-align: center;margin-left:-140px;">
                        <strong>Payment-Online Payment</strong></p>
                    <div>
                    </div>
                </div>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center" placeholder="" id="form-container">
                    <div style="width: 50%;">
                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                            style="margin-top: 20px;margin-bottom: 10px;">
                            <img src="{{ asset('themes/tailwind/images/clipboard-image-64.png') }}"
                                style="width: 22px;margin-right: 10px;" width="16" height="18">
                            <p class="p20b" style="margin-top: 0px;text-align: left;margin-bottom: 0px;"><strong>Payment
                                    Method</strong></p>
                        </div>
                        <div class="divcard" style="padding-top: 20px; height: 118px; padding-bottom: 20px;">
                            <div class="d-xl-flex d-xxl-flex justify-content-evenly align-items-xl-center align-items-xxl-center"
                                style="border-bottom: 2px solid rgba(133,135,150,0.49);">
                                <img src="{{ asset('/themes/tailwind/images/VISA-logo.png') }}" id="image1"
                                    style="width: 62px; margin-bottom: 10px; margin-left: 56px;">
                                <img src="{{ asset('/themes/tailwind/images/clipboard-image-66.png') }}" id="image2"
                                    style="width: 43px; margin-bottom: 10px; margin-left: 46px;">
                                <img src="{{ asset('/themes/tailwind/images/alipay_logo.png') }}" id="image3"
                                    style="width: 80px; margin-bottom: 10px; margin-left: 37px;">
                                <img src="{{ asset('/themes/tailwind/images/wechat_pay_logo.png') }}" id="image4"
                                    style="width: 145px; margin-bottom: 10px; ">
                            </div>
                            <div id="imageSelection"
                                class="d-xl-flex d-xxl-flex justify-content-evenly align-items-xl-center align-items-xxl-center"
                                style="margin-top: 10px;">
                                <div><input type="radio" name="imageSelection" style="width: 18px; height: 18px;"
                                        value="image1" onclick="changeImage(this)" data-value="token"></div>
                                <div><input type="radio" name="imageSelection" style="width: 18px; height: 18px;"
                                        value="image2" onclick="changeImage(this)" data-value="token"></div>
                                <div><input type="radio" name="imageSelection" style="width: 18px; height: 18px;"
                                        value="image3" onclick="changeImage(this)" data-value="alipay_hk"></div>
                                <div><input type="radio" name="imageSelection" style="width: 18px; height: 18px;"
                                        value="image4" onclick="changeImage(this)" data-value="wechatpay"></div>
                            </div>
                        </div>

                        <div id="card-form_container">
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center select1"
                                style="margin-top: 20px;margin-bottom: 10px;width: 100%;">
                                <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start"
                                    style="width: 100%;">
                                    <p class="p18b" style="margin-bottom: -48px;opacity: 0.50;margin-right:10px;"><strong>Name
                                            of Card</strong></p>
                                    <input id="cardNameInput" type="text" class="p22bold text"
                                        style="height: 50px;width: 100%;background: transparent;border-bottom-style: none;text-indent: 21px; padding-top: 20px;"
                                        placeholder="Please select the Class">
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center select1"
                                style="margin-top: 20px;margin-bottom: 10px;width: 100%;">
                                <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start"
                                    style="width: 100%;">
                                    <p class="p18b" style="margin-bottom: -48px;opacity: 0.5;"><strong>Card Number</strong>
                                    </p>
                                    <input id="cardNumberInput"type="text" class="p22bold text"
                                        style="height: 50px;width: 100%;background: transparent;border-bottom-style: none;text-indent: 21px; padding-top: 20px;"
                                        placeholder="1234 1234 1234 1234">
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center select1"
                                    style="margin-top: 20px;margin-bottom: 10px;width: 100%;margin-right: 50px;">
                                    <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start"
                                        style="width: 100%;">
                                        <p class="p18b" style="margin-bottom: -48px;opacity: 0.5;"><strong>Exp. Date
                                                (MM/YY)</strong></p>
                                        <input id="expDateInput" type="text" class="p22bold text"
                                            style="height: 50px;width: 110%;background: transparent;border-bottom-style: none;margin-right:20px;text-indent: 21px; padding-top: 20px;"
                                            placeholder="01/25">
                                    </div>
                                </div>
                                <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center select1"
                                    style="margin-top: 20px;margin-bottom: 10px;width: 100%;margin-left: 10px; margin-right: 20px;right:20%;">
                                    <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start"
                                        style="width: 100%;">
                                        <p class="p18b" style="margin-bottom: -48px;opacity: 0.50;"><strong>CVV</strong></p>
                                        <input id="cvvInput"type="text" class="p22bold text"
                                            style="height: 50px;width: 110%;background: transparent;border-bottom-style: none;margin-right:-30px;text-indent: 21px; padding-top: 20px;color:#171433;"
                                            placeholder="789">
                                    </div>
                                </div>
                            </div>

                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck-1"><label
                                        class="form-check-label p16normal3" for="formCheck-1" style="color: #171433;">Set as
                                        default payment card</label>
                                </div>
                            </div>
                        </div>

                        <div id="other-payment-form_container" class="d-none">
                            <div>
                                <p>After clicking "Confirm Payment", you will be redirected to <span class="selected-payment_label">Alipay HK</span> to complete your payment securely.</p>
                            </div>
                        </div>
                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                            <button id="confirmPaymentBtn" class="button1" type="button"
                                style="margin-top: 0px;left:-2%;">Confirm Payment</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade modal2" role="dialog" tabindex="-1" id="modal-1" style="border-style: none;">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body d-xl-flex flex-column justify-content-evenly align-items-xl-center"
                            style="height: 509px;width: 60%; margin: 0 auto; padding: 0;border-radius: 200px;background: var(--app-color-tone-secondary-2, #AAC9E4)">
                            <img src="{{ asset('themes/tailwind/images/clipboard-image-61.png') }}" style="width: 217px;">
                            <p class="p20b" style="text-align: center;"><strong>Thank you for your
                                    payment!</strong><br><br><strong>A receipt has been sent&nbsp;</strong><br><strong>in
                                    your "My Order"&nbsp;</strong><br><strong>to your records.</strong></p>
                            <button class="button2" style="top:-6%;" type="button" data-bs-dismiss="modal"
                                style="width: 68px;">Continue</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>

        </div>
    </body>
<!-- General QR Generator Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="wechat-pay_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between p-4">
                <h4 class="modal-title" style="font-size: 24px;color: #3B3B3B;">Payment Link</h4>
            </div>
            <div class="modal-body p-4 pt-0">
                <div>
                    <div>
                        
                        <div id="qr-container"></div>
                        <p class="text-center mt-4">Scan the QR Code to pay</p>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary custom-btn_primary cancel-payment" data-bs-dismiss="modal">Cancel</button>
                        <!-- <a href="#" class="btn btn-primary custom-btn_primary cancel-payment" data-bs-dismiss="modal">Cancel</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/qrcode.min.js') }}"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;

        // var pusher = new Pusher('10c23eba50a8b2da33be', {
        //     cluster: 'ap1',
        // });

        // var channel = pusher.subscribe('payment-request');
        // channel.bind('new-payment-request', function(data) {
            
        //     console.log("test:: ", data)
        //     alert('test');
        //     // alert(JSON.stringify(data))
        //     // app.messages.push(JSON.stringify(data)); //Data assignment
        // });

        var paymentMethod = "token";

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

        document.addEventListener("DOMContentLoaded", function() {
            // Get all the images
            var images = document.querySelectorAll('.divcard img');

            // Set opacity for each image
            images.forEach(function(image) {
                image.style.opacity = '0.4';
            });
        });

        function changeImage(input) {
            // Get the ID of the selected image
            var imageId = input.value;

            // Reset the opacity of all images
            var images = document.querySelectorAll('.divcard img');
            images.forEach(function(img) {
                img.style.opacity = '0.4'; // Faint by default
            });

            // Set the opacity of the selected image to 1 (fully colored)
            var selectedImage = document.getElementById(imageId);
            if (selectedImage) {
                selectedImage.style.opacity = '1';
            }
        }
        
        $(document).ready(function() {
            $('#imageSelection').on('click', 'input[name=imageSelection]', function(){
                paymentMethod = $(this).data('value');

                changeFormInput();
            });

            $('input[value=image1]').click();

            $('#confirmPaymentBtn').click(async function() {
                $(this).prop('disabled', true);

                // Get the values of the input fields
                var cardName = $('#cardNameInput').val();
                var cardNumber = $('#cardNumberInput').val();
                var expDate = $('#expDateInput').val();
                var cvv = $('#cvvInput').val();
                var imageSelection = $('input[name="imageSelection"]:checked').val();

                // Initialize error messages
                var errors = [];
                if (!imageSelection) {
                    errors.push("Please select a payment method.");
                }
                if (!cardName) {
                    errors.push("Please enter your card name.");
                }
                if (!cardNumber) {
                    errors.push("Please enter your card number.");
                }
                if (!expDate) {
                    errors.push("Please enter your card expiration date.");
                }
                if (!cvv) {
                    errors.push("Please enter your card CVV.");
                }

                
                // If there are errors, display them using alert dialogs
                if (errors.length > 0 && paymentMethod == 'token') {
                    var errorMessage = "Please fix the following errors:\n" + errors.join("\n");
                    alert(errorMessage);
                } else {
                    const systemData = <?= json_encode($entry) ?>;
                    let studentClassIDs = [];

                    systemData.filtered_student_classes.forEach(element => {
                        studentClassIDs.push(element.id);
                    });

                    var formData = {
                        course_enrollment_id: systemData.id,
                        payment_method: paymentMethod,
                        card_details: {
                            card_name: cardName,
                            card_number: cardNumber,
                            exp_month: expDate.split('/')[0],
                            exp_year: expDate.split('/')[1],
                            card_cvv: cvv
                        },
                        student_class_ids: studentClassIDs
                    };

                    await axios.post(`${getApiUrl()}/enrollment/pay`, formData, {
                            headers: {
                                'Authorization': 'Bearer ' + getUserToken()
                            }
                        }).then(res => {
                            $(this).removeAttr('disabled');

                            if ( res.data.success ) {
                                if( paymentMethod == 'wechatpay' ) {
                                    $('#wechat-pay_modal').modal('show');
                                    generateQRCode(res.data.data.data.redirectLink);
                                }

                                if( paymentMethod == 'alipay_hk' ) {
                                    window.location.href = res.data.data.data.redirectLink;
                                }

                                if( paymentMethod == 'token' ) {
                                    $('#modal-1').modal('show');
                                }
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
                }
            });

            $('#modal-1').on('hidden.bs.modal', function (e) {
                window.location = "{{ route('wave.enrollment') }}"
            });

            function changeFormInput(){
                switch (paymentMethod) {
                    case 'token':
                        $('#card-form_container').removeClass('d-none');
                        $('#other-payment-form_container').addClass('d-none');
                        break;
                    case 'alipay_hk':
                        $('#card-form_container').addClass('d-none');
                        $('#other-payment-form_container').removeClass('d-none');
                        $('#other-payment-form_container .selected-payment_label').text('Alipay');

                        break;
                    case 'wechatpay':
                        $('#card-form_container').addClass('d-none');
                        $('#other-payment-form_container').removeClass('d-none');
                        $('#other-payment-form_container .selected-payment_label').text('WeChat Pay');

                        break;
                }
            }
            
            function generateQRCode(url) {
                $("#qr-container").empty();

                new QRCode(document.getElementById("qr-container"), url);
            }
        });
    </script>
@endsection
