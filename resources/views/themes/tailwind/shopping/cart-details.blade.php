@extends('theme::layouts.customer')

@section('style')
    <style>
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

        .shopping {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
            font-weight: 700;
            margin-right: -10%;
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

        .d-flex {
            display: flex;
            flex-grow: 1;
        }

        .p18poppins {
            color: #000000;
            text-align: left;
            font-family: var(--apptextstyles-h-5-heading-font-family,
                    "Poppins-Bold",
                    sans-serif);
            font-size: var(--apptextstyles-h-5-heading-font-size, 18px);
            font-weight: var(--apptextstyles-h-5-heading-font-weight, 700);
            position: relative;
            white-space: nowrap;
        }

        .p14b {
            color: #000000;
            text-align: left;
            font-family: var(--text-text-medium-2-font-family,
                    "Poppins-Medium",
                    sans-serif);
            font-size: var(--text-text-medium-2-font-size, 14px);
            font-weight: var(--text-text-medium-2-font-weight, 500);
            position: relative;
            align-self: stretch;
            white-space: nowrap;
        }
        .box1 {
            background: #ffffff;
            padding: 0px 50px 0px 150px;
            flex-direction: column;
            gap: 12px;
            justify-content: flex-start;
            width: 100%;
            border: 2px solid #dddddd; /* Add a solid border */
            border-radius: 10px; /* Add border radius for rounded corners */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .p16normal3 {
            color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
            text-align: left;
            font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
            font-size: var(--barlow-copy-2-font-size, 16px);
            font-weight: var(--barlow-copy-2-font-weight, 500);
            position: relative;
        }

        .p16b {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
            font-size: var(--barlow-copy-2-font-size, 16px);
            font-weight: var(--barlow-copy-2-font-weight, 500);
            position: relative;
            white-space: nowrap;
        }

        .location {
            color: var(--cm-scolor-accent, #4a5c7a);
            text-align: left;
            font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
            font-size: var(--barlow-copy-2-font-size, 16px);
            font-weight: var(--barlow-copy-2-font-weight, 500);
            position: relative;
            white-space: nowrap;
        }

        .p20b {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 24px;
            font-weight: 600;
            position: relative;
        }

        .pb {
            color: #000000;
            font-size: 18px;
            font-weight: 500;
            position: relative;
            white-space: nowrap;
        }

        .p18poppins {
            color: #000000;
            text-align: left;
            font-size: 24px;
            font-weight: 600;
            position: relative;
        }

        .button1 {
            background: #233656;
            border-radius: 33px;
            width: 118%;
            height: 70px;
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
            margin-left: 0px;
        }
   /* Hide the default checkbox tick */
.form-check-input[type="checkbox"]:checked {
    visibility: hidden;
}

/* Style the label to create a custom checkbox appearance */
.form-check-input[type="checkbox"] + .form-check-label:before {
    content: "×"; /* Unicode for multiplication sign (cross) */
    display: inline-block;
    width: 30px; /* Adjust width as needed */
    height: 30px; /* Adjust height as needed */
    line-height: 24px; /* Center content vertically */
    text-align: center; /* Center content horizontally */
    border: 2px solid #ccc; /* Set border width and color */
    border-radius: 8px; /* Optional: Add rounded corners */
    color: red; /* Set text color */
    font-size: 24px; /* Adjust size as needed */
    font-weight: bold; /* Optionally make it bold */
    transition: background-color 0.3s, color 0.3s; 
    
}
        .button-container {
    display: flex;
    justify-content: space-between;
}
@media (min-width:1440px){

    .p18poppins{
        font-size:16px;
    }
    .d-xxl-flex {
        margin-top:10px;
    }
}
@media (max-width:2560px)
{
    .button1{
        margin-left:-100px;
    }
    .preview{
        margin-left:30px;
    }
@media (max-width:1440px){
    .button1{
        margin-left:-50px;
    }
    .preview{
        margin-left:20px;
    }
}
@media (max-width:1024px){
    .img-fluid{
        height:140px;
        width:70px;
    }
    .p18poppins{
        font-size:18px;
    }
    .p14b{
        font-size:12px;
    }
    .red{
        margin-right:5px;
    }
    .button1{
        margin-left:-50px;
    }
    .preview{
        margin-left:20px;
    }
}
@media (max-width:768px){
    .img-fluid{
        height:55px;
        width:30px;
    }
    .p18poppins{
        font-size:14px;
    }
    .p14b{
        font-size:10px;
    }
    .red{
        margin-right:5px;
    }
    .button1{
        margin-left:-50px;
    }
    .preview{
        margin-left:20px;
    }
    .pb{
        font-size:12px;
    }
    .form-control{
        font-size:10px;
        height:20px;
        max-width:5px;
    }
    .box1{
        min-width:250px;
    }
}
}
    </style>
@endsection

@section('content')
            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);min-height:100vh;">
                <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                    <div style="display: flex; align-items: center;">
                        <a href="{{ route('wave.shopping') }}">
                            <button class type="button"
                                style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                                    class="fas fa-chevron-left"></i>
                            </button></a>
                    </div>
                    <p class="shopping d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                        style="margin-bottom: 0px;height: 31px;text-align: center;"><strong>Cart Details</strong></p>
                    <div><a href="{{ route('wave.my-order') }}"><button class="order" type="button"
                                style="width: auto;height: auto;padding: 15px;border-width: 1px;border-style: solid;font-weight: bold;margin-right: 20px;">My
                                Order</button></a>
                        <button class="order" type="button"
                            style="width: auto;height: auto;padding: 10px;font-weight: bold;border-width: 1px;border-style: none;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
                            <svg class="group" width="30" height="28" viewBox="0 0 30 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.04731 20.6114C8.97158 20.5319 8.91469 20.4349 8.88792 20.3277L6.38835 3.6878L6.38832 3.68779L8.88788 20.3277C8.91466 20.4349 8.97157 20.5319 9.04731 20.6114ZM1.10292 2.20328C0.510893 1.88808 0.870841 0.845592 1.60348 1.0454L7.10251 2.61656C7.17727 2.63524 7.24224 2.65882 7.29872 2.68857C7.24224 2.65881 7.17725 2.63523 7.10248 2.61654L1.60344 1.04538C0.87079 0.845569 0.510843 1.8881 1.10292 2.20328ZM28.2668 9.33443L8.8089 6.68425L8.23542 2.98848L8.22829 2.95997C8.17435 2.74423 8.07725 2.51822 7.88898 2.32995C7.70405 2.14503 7.48273 2.04806 7.27047 1.99356L1.78069 0.424999L1.77319 0.422954C1.40041 0.321286 1.03892 0.38538 0.749996 0.576361C0.475098 0.758073 0.298538 1.03168 0.216771 1.30969C0.135132 1.58726 0.134596 1.9157 0.274214 2.21901C0.421516 2.53901 0.702353 2.77933 1.07494 2.88143L1.07661 2.88188L5.81247 4.19741L8.25447 20.4542L8.26198 20.4842C8.4071 21.0647 8.95683 21.4728 9.53062 21.4728H24.5994C24.8982 21.4728 25.1667 21.3638 25.3684 21.2242C25.5617 21.0903 25.7584 20.8828 25.8514 20.6116L29.2742 11.0561C29.5569 10.3264 29.1135 9.47554 28.2763 9.33601L28.2668 9.33443ZM9.15789 9.30019L10.6549 18.9684H23.7181L26.3638 11.6465L9.15789 9.30019ZM10.102 19.6136H24.1709L27.2418 11.1151L27.2419 11.1151L24.171 19.6136H10.102L10.102 19.6136Z"
                                    fill="#171433" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.4167 24.1165C15.4167 22.403 14.0293 21.0156 12.3158 21.0156C10.6022 21.0156 9.21484 22.403 9.21484 24.1165C9.21484 25.8301 10.6022 27.2174 12.3158 27.2174C14.0293 27.2174 15.4167 25.8301 15.4167 24.1165ZM11.2745 24.1165C11.2745 23.5447 11.744 23.0753 12.3158 23.0753C12.8875 23.0753 13.357 23.5447 13.357 24.1165C13.357 24.6883 12.8875 25.1578 12.3158 25.1578C11.744 25.1578 11.2745 24.6883 11.2745 24.1165ZM15.0241 23.9433C15.0277 24.0006 15.0296 24.0583 15.0296 24.1165C15.0296 25.6163 13.8155 26.8303 12.3158 26.8303C10.8728 26.8303 9.69436 25.7065 9.60712 24.2857C9.69634 25.7046 10.874 26.8263 12.3155 26.8263C13.8152 26.8263 15.0293 25.6122 15.0293 24.1125C15.0293 24.0557 15.0276 23.9993 15.0241 23.9433ZM12.3158 22.6882C11.5302 22.6882 10.8874 23.331 10.8874 24.1165C10.8874 24.1459 10.8883 24.175 10.8901 24.2039C10.8882 24.1737 10.8872 24.1432 10.8872 24.1125C10.8872 23.3269 11.5299 22.6842 12.3155 22.6842C13.0717 22.6842 13.6956 23.2798 13.7412 24.0251C13.6936 23.2817 13.0706 22.6882 12.3158 22.6882Z"
                                    fill="#171433" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M25.0581 24.1165C25.0581 22.403 23.6708 21.0156 21.9572 21.0156C20.2303 21.0156 18.9277 22.4166 18.9277 24.1165C18.9277 25.8164 20.2303 27.2174 21.9572 27.2174C23.6708 27.2174 25.0581 25.8301 25.0581 24.1165ZM20.916 24.1165C20.916 23.5447 21.3854 23.0753 21.9572 23.0753C22.529 23.0753 22.9985 23.5447 22.9985 24.1165C22.9985 24.6883 22.529 25.1578 21.9572 25.1578C21.3854 25.1578 20.916 24.6883 20.916 24.1165ZM24.6656 23.9433C24.6692 24.0006 24.671 24.0583 24.671 24.1165C24.671 25.6163 23.457 26.8303 21.9572 26.8303C20.5182 26.8303 19.4079 25.7125 19.3204 24.2971C19.4097 25.7106 20.5193 26.8263 21.957 26.8263C23.4567 26.8263 24.6708 25.6122 24.6708 24.1125C24.6708 24.0557 24.669 23.9993 24.6656 23.9433ZM21.9572 22.6882C21.1716 22.6882 20.5289 23.331 20.5289 24.1165C20.5289 24.1459 20.5298 24.175 20.5316 24.2039C20.5296 24.1737 20.5287 24.1432 20.5287 24.1125C20.5287 23.3269 21.1714 22.6842 21.957 22.6842C22.7132 22.6842 23.3371 23.2798 23.3826 24.0251C23.3351 23.2817 22.7121 22.6882 21.9572 22.6882Z"
                                    fill="#171433" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center justify-content-xxl-center"
                    style="margin-bottom: 20px;margin-top: 50px;">
                    <div class="d-xxl-flex flex-column justify-content-xxl-center align-items-xxl-center cart-items_container" style="width: 70%;">
                        @foreach ($cartProducts as $cartProduct)
                        <div class="box1 d-md-flex d-xxl-flex flex-column align-items-md-end align-items-xxl-end divcard" style="padding: 20px; margin-bottom: 20px; height: auto; border-radius: 10px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkbox-{{ $cartProduct['order_item_id'] }}" style="width: 30px; height: 30px;display:none;" data-modal-id="{{ $cartProduct['order_item_id'] }}" onchange="toggleCheckbox(this);">
                                <label class="form-check-label rememberme" for="checkbox-{{ $cartProduct['order_item_id'] }}"></label>
                                <input type="hidden" name="order_id" value="{{ $cartProduct['order_item_id'] }}">
                            </div>
                            <div class="d-flex flex-md-row flex-xxl-row align-items-center justify-content-md-between justify-content-xxl-between" style="width: 100%;">
                                <a href="{{ route('wave.item', ['id' => $cartProduct['product_id']]) }}" style="text-decoration: none;color:black;">
                                <div class="d-flex justify-content-center justify-content-md-start justify-content-xxl-start">
                                    <img src="{{ $cartProduct['image_path'] }}" style="width: 160px; margin-right: 20px;" class="img-fluid">
                                    <div class="d-flex flex-column justify-content-start align-items-start" style="margin-top:-20px;">
                                        <p class="p18poppins" style="font-weight: bold;">
                                            {!! substr($cartProduct['product_name'], 0, 30) . (strlen($cartProduct['product_name']) > 30 ? '...' : '') !!}</p>
                                        <p class="p14b" style=""><strong>CN 2PB SHORTSWIM NAVY PLANET</strong></p>
                                        <p class="p14b"><strong>COLOUR: ROYAL BLUE</strong></p>
                                        <p class="p14b"><strong>SIZE: 150</strong></p>
                                        <p class="p14b"><strong>Unit Price: {{ $cartProduct['unit_price'] }}</strong></p>
                                    </div>
                                </div></a>
                                <div class="d-flex flex-column justify-content-center align-items-center mt-md-0 mt-3" style ="margin-bottom:-70px;">
                                    <p class="p14b red" style="color:#ff4d4d;left:20px;"><strong>Stock remaining: {{ $cartProduct['stock_remaining'] }}</strong></p>
                                    <p class="p14b mb-1" style="left:35px;"><strong>Qty:</strong></p>
                                    <input type="number" id="quantityInput-{{ $cartProduct['order_item_id'] }}" class="form-control item-quantity" data-order_id="{{ $cartProduct['order_id'] }}" data-order_item_id="{{ $cartProduct['order_item_id'] }}" data-product_id="{{ $cartProduct['product_id'] }}" data-unit_price="{{ $cartProduct['unit_price'] }}" data-remaining="{{ $cartProduct['stock_remaining'] }}" data-current_quantity="{{ $cartProduct['ordered_quantity'] }}" style="max-width: 100px;" value="{{ $cartProduct['ordered_quantity'] }}" min="1" max="{{ $cartProduct['product_quantity_remaining'] }}" step="1">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <div style="width: 100%;">
                            <p class="p20b"
                                style="text-align: left;font-family: Poppins, sans-serif;font-weight: bold;right:0%;">Order
                                Summary</p>
                        </div>
                        @php
                        // Initialize total amount variable
                        $totalAmount = 0;
                    @endphp
              <div class="box1 d-xxl-flex flex-column divcard" style="margin-bottom: 5px; height: auto; border-radius: 10px;">
                @foreach ($cartProducts as $cartProduct)
                <div class="row align-items-center">
                    @php
                    $totalAmount += $cartProduct['order_total_amount'];
                    @endphp
                    <div class="col-md-6 col-6"> <!-- Adjust column width -->
                        <p id="subtotal-{{$cartProduct['order_item_id']}}" class="pb bp" style="align-items: left;margin-left:-100px;">Subtotal ({{$cartProduct['ordered_quantity']}} item)</p>
                    </div>
                    <div class="col-md-6 col-6"> <!-- Align content to the right -->
                        <p class="pb">Total Price: <span id="totalPrice-{{ $cartProduct['order_item_id'] }}">HK${{ $cartProduct['ordered_quantity'] * $cartProduct['unit_price'] }}</span></p>
                    </div>
                </div>
                @endforeach
            
                <div class="row align-items-center" style="margin-bottom: -10px;">
                    <div class="col-md-6 col-6">
                        <p class="p18poppins bp" style ="margin-left:-100px;"><strong>Total</strong></p>
                    </div>
                    <div class="col-md-6 col-6 text-end"> 
                        <p class="p18poppins">HK$ <span id="price">{{ $totalAmount }}</span></p>
                    </div>
                </div>
            </div>
            
                    
                        <div style="width: 100%;text-align:right;">
                            <div class="d-md-flex d-xl-flex d-xxl-flex align-items-md-center align-items-xl-center align-items-xxl-center"
                                style="margin-top: 20px;margin-bottom: 10px;">
                                <img src="{{ asset('themes/tailwind/images/clipboard-image-64.png') }}"
                                    style="width: 32px;margin-left: px;margin-right:10px;margin-top:0px;">
                                <p class="d-xxl-flex p20b"
                                    style="margin-top: 0px;text-align: left;margin-bottom: 0px;margin-top:0px;">
                                    <strong>Invoice</strong>
                                </p>
                            </div><a href="{{ route('wave.invoice2') }}"style="text-decoration: none;"><button
                                    class="button1 preview" type="button"
                                    style="width: 174px;height: 50px;">Preview</button></a>
                        </div>
                        <div style="width: 85%;margin-top: 50px;margin-left:50px;">
                            <a href="{{ route('wave.online-payment') }}"class="button1" id="submitBtn"type="button" style="text-decoration:none;color:white;">Online Payment</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @foreach ($cartProducts as $cartProduct)
        <div class="modal fade modal2" role="dialog" tabindex="-1" id="modal-{{ $cartProduct['order_item_id'] }}"
             style="border-style: none;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content"style="background:none;border:none;">
                    <div class="modal-body d-xl-flex flex-column justify-content-evenly align-items-xl-center"
                         style="height: 509px;width: 70%; margin: 0 auto; padding: 0;border-radius: 70px;background: var(--app-color-tone-secondary-2, #AAC9E4)">
                        <img src="{{ asset('themes/tailwind/images/clipboard-image-61.png') }}" style="width: 217px;">
                        <p class="p20b" style="margin-bottom:120px;"><strong>Remove from cart</strong></p>
                        <form id="confirmationForm-{{ $cartProduct['order_item_id'] }}" action="{{ route('remove-cart') }}"
                        {{-- @dd($cartProduct['order_item_id']); --}}
                              method="POST">
                            @csrf
                            <input type="hidden" name="order_item_id" value="{{ $cartProduct['order_item_id'] }}">
                            {{-- @dd($cartProduct['order_item_id']); --}}
                            <div class="button-container" style="display: flex; justify-content: space-between;margin-top:-80px;">

                                    <button class="button1" style="width: 150px;margin-left:10px" type="submit">
                                        Yes
                                    </button>


                            <button class="button1" style="width: 150px;margin-left:10px" type="button"
                                    data-bs-dismiss="modal">No
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        
    </body>
@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
          function toggleCheckbox(checkbox) {
        if (checkbox.checked) {
            setTimeout(function() {
                checkbox.checked = false; // Uncheck the checkbox after a short delay
            }, 1000); // Adjust the delay time (in milliseconds) as needed
        }
    }
 document.addEventListener('DOMContentLoaded', function () {
        // Add event listener for checkbox change
        document.querySelectorAll('.form-check-input').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                var modalId = 'modal-' + this.getAttribute('data-modal-id'); // Get modal ID
                var modal = new bootstrap.Modal(document.getElementById(modalId));
                if (this.checked) {
                    modal.show(); 
                } else {
                    modal.hide(); 
                }
            });
        });
    });
    

function calculateTotalAmount() {
    var totalAmount = 0;
    var totalPriceElements = document.querySelectorAll('[id^="totalPrice-"]');
    totalPriceElements.forEach(function(element) {
        totalAmount += parseFloat(element.textContent.replace('HK$', ''));
    });
    return totalAmount;
}
        $(document).ready(function() {
            var debounceTimeout;
            var lastInputQuantity = 0;

            $('.cart-items_container').on('change', '.item-quantity', async function(){
                const productID = $(this).data('product_id');
                const orderID = $(this).data('order_id');
                const orderItemID = $(this).data('order_item_id');
                const unitPrice = $(this).data('unit_price');
                const remaining = $(this).data('remaining');
                const currentQuantity = $(this).data('current_quantity');
                const quantity = $(this).val();
                
                if( lastInputQuantity <= 0 )
                    lastInputQuantity = quantity;

                const formData = {
                    order_id: orderID,
                    order_item_id: orderItemID,
                    product_id: productID,
                    quantity: quantity,

                    unitPrice: unitPrice,
                    orderItemID: orderItemID,
                    remaining: remaining,
                    currentQuantity: currentQuantity
                };

                // Clear any existing debounce timeout
                clearTimeout(debounceTimeout);
                
                // Set a new debounce timeout
                debounceTimeout = setTimeout(() => {
                    processUpdateQuantity(this, formData);
                }, 1500); // 300 milliseconds debounce delay
            });

            async function processUpdateQuantity(input, formData)
            {
                await axios.post(`${getApiUrl()}/cart-item/update-quantity`, formData, {
                            headers: {
                                'Authorization': 'Bearer ' + getUserToken()
                            }
                        }).then(res => {
                            if ( res.data.success ) {
                                updateTotalPriceAndSubtotal(input, formData.unitPrice, formData.orderItemID, formData.remaining );
                                lastInputQuantity = formData.quantity
                            } else {
                                $(input).val(lastInputQuantity);
                                updateTotalPriceAndSubtotal(input, formData.unitPrice, formData.orderItemID, formData.remaining );
                            }
                        }).catch(error => {
                            $(input).removeAttr('disabled');

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

            function updateTotalPriceAndSubtotal(input, unitPrice, orderItemId, maxQuantity) {
                var quantity = parseInt(input.value);
                if (quantity > maxQuantity) {
                    input.value = maxQuantity;
                    quantity = maxQuantity;
                }
                
                var totalPriceElement = document.getElementById('totalPrice-' + orderItemId);
                var subtotalElement = document.getElementById('subtotal-' + orderItemId);
                var totalAmountElement = document.getElementById('totalAmount');

                var totalPrice = quantity * unitPrice;
                var subtotal = quantity + " item";

                totalPriceElement.textContent = 'HK$' + totalPrice.toFixed(2);
                subtotalElement.textContent = 'Subtotal (' + subtotal + ')';

                // Calculate and update the total amount
                var totalAmount = calculateTotalAmount();
                totalAmountElement.textContent = 'HK$' + totalAmount.toFixed(2);
            }

            $('#submitBtn').click(function() {
                // Get the price value
                var price = $('#price').text().trim();

                // Check if the price value is null or empty
                if (!price) {
                    alert('Price is missing. Please make sure to include a price.');
                    return; // Exit the function if the price is missing
                }

                // Create a data object to send via AJAX
                var data = {
                    price: price
                    // Add other data properties here if needed
                };

                // Perform AJAX POST request
                $.ajax({
                    url: '/cart-details', // Replace with your endpoint URL
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        // Handle successful response here
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });
        })
    </script>
@endsection
