@extends('theme::layouts.customer')

@section('style')
    <style>
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

        input[type="radio"] {
            width: 30px;
            height: 20px;
            margin-left: -20px;
        }

        input[type="radio"]:checked {
            /* Change the background color when the radio button is checked */
            accent-color: #233656;
            font-size: 24px;
        }

        .p1b {
            color: #233656
                /* Default color when not selected */
                text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 549;
            position: relative;
            align-self: stretch;
        }

        /* Change color when the radio button is checked */
        input[type="radio"]:checked~.divcard .box1 {
            color: var(--appcolortone-secondary-1, #233656);
        }

        .button1 {
            background: #233656;
            border-radius: 33px;
            width: 118%;
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
            /* margin-left:430px; */
        }

        .p2b {
            color: #4a5c7a;
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 18px;
            font-weight: 500;
            position: relative;
        }

        .button2 {
            height: 50px;
            min-width: 100%;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            border-bottom-left-radius: 30px;
            background: #233656;
            color: #FFF;
            text-align: center;
            font-family: Barlow;
            font-size: 18px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            border-style: none;
            box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);
            margin-left: -80px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
@endsection

@section('content')



            

            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);height: 100vh;">
                <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                    <div style="display: flex; align-items: center;">
                        <div
                            class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                            <a href="{{ route('wave.ticket2') }}">
                                <button class type="button"
                                    style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                                    <i class="fas fa-chevron-left"></i></button></a>
                        </div>
                    </div>

                    <p class="shopping d-xl-flex justify-content-xl-center align-items-xl-center "
                        style="margin-bottom: 0px;height: 31px;text-align: center;margin-left:-140px;">
                        <strong>Ticket</strong></p>
                    <div>
                    </div>
                </div>
                <div class="d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center justify-content-xxl-center"
                    style="margin-bottom: 20px;margin-top: 50px;">
                    <div style="width: 50%;">
                        <div class="progress beautiful progress-xs" style="height: 8px; border-radius: 50px;">
                            <div class="progress-bar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%; background-color: #AAC9E4;"><span class="visually-hidden">100%</span>
                            </div>
                        </div>
                        <div style="margin-top: 50px;">
                            <p class="shopping" style="text-align: center;margin-left:-30px;">Quantity</p>
                            <p class="p16b" style="text-align: center;margin-left:30px;">Please select the quantity (3/3)
                            </p>
                        </div>

                        <div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-bottom: 10px;">
                                <input type="radio" name="quantity" id="quantity1" value="1">
                                <div class="d-xxl-flex justify-content-xxl-start align-items-xxl-center divcard"
                                    style="margin-left: 30px;padding: 10px;padding-left: 30px;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;width: 90%;">
                                    <p class="box1 p1b" style="margin-bottom: 0px;padding-top: 5px;">1</p>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-bottom: 10px;">
                                <input type="radio" name="quantity" id="quantity2" value="2">
                                <div class="d-xxl-flex justify-content-xxl-start align-items-xxl-center divcard"
                                    style="margin-left: 30px;padding: 10px;padding-left: 30px;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;width: 90%;">
                                    <p class="box1 p1b" style="margin-bottom: 0px;padding-top: 5px;">2</p>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-bottom: 10px;">
                                <input type="radio" name="quantity" id="quantity3" value="3">
                                <div class="d-xxl-flex justify-content-xxl-start align-items-xxl-center divcard"
                                    style="margin-left: 30px;padding: 10px;padding-left: 30px;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;width: 90%;">
                                    <p class="box1 p1b" style="margin-bottom: 0px;padding-top: 5px;">3</p>
                                </div>
                            </div>
                            <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"
                                style="margin-bottom: 10px;">
                                <input type="radio" name="quantity" id="quantity4" value="4">
                                <div class="d-xxl-flex justify-content-xxl-start align-items-xxl-center divcard"
                                    style="margin-left: 30px;padding: 10px;padding-left: 30px;border-top-left-radius: 15px;border-top-right-radius: 15px;border-bottom-right-radius: 15px;border-bottom-left-radius: 15px;width: 90%;">
                                    <p class="box1 p1b" style="margin-bottom: 0px;padding-top: 5px;">4</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex d-lg-flex d-xl-flex d-xxl-flex align-items-md-center align-items-lg-center justify-content-xl-end justify-content-xxl-end align-items-xxl-center"
                            style="margin-top: 50px;">
                            <div class="col" style="margin-right: 30px;">
                                <button id="addToCartBtn" class="text-nowrap button1" type="button" data-bs-toggle="modal"
                                    data-bs-target="#modal-2">Add to Cart</button>
                            </div>
                            <div class="col text-nowrap" style="margin-left: 10px;">
                                <button id="buyNowBtn" class="button1" type="button"
                                    style="background: #AAC9E4;color: #171433;">Buy Now</button>
                            </div>

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
            // Handle click event on Add to Cart button
            $('#addToCartBtn').click(function() {
                // Get the value of the selected quantity
                var selectedQuantity = $("input[name='quantity']:checked").val();

                // Perform AJAX POST request
                $.ajax({
                    url: '/cart-details',
                    method: 'POST',
                    data: {
                        quantity: selectedQuantity // Include the selected quantity in the data
                    },
                    success: function(response) {
                        // Handle successful response here
                        // For example, redirect to a route
                        window.location.href = "{{ route('wave.cart-details') }}";
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });

            // Handle click event on Buy Now button
            $('#buyNowBtn').click(function() {
                // Get the value of the selected quantity
                var selectedQuantity = $("input[name='quantity']:checked").val();

                // Perform AJAX POST request
                $.ajax({
                    url: '/online-payment',
                    method: 'POST',
                    data: {
                        quantity: selectedQuantity // Include the selected quantity in the data
                    },
                    success: function(response) {
                        // Handle successful response here
                        // For example, redirect to a route
                        window.location.href = "{{ route('online-payment') }}";
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
