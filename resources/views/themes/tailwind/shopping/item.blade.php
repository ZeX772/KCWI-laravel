@extends('theme::layouts.customer')

@section('style')
<style>
    .p16normal3 {
        font-family: "NotoSansHk-Bold", sans-serif;
        font-size: 16px;
        font-weight: 700;
    }

    .p40 {
        color: #ffffff;
        text-align: left;
        font-family: "Poppins-Medium", sans-serif;
        font-size: 40px;
        font-weight: 500;
        position: relative;
    }

    .button1 {
        background: #233656;
        border-radius: 29px;
        padding: 4px 10px 4px 10px;
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

    .frame {
        display: flex;
        flex-direction: column;
        gap: 25px;
        align-items: flex-start;
        justify-content: flex-start;
        position: absolute;
        left: 1149.5px;
        top: 150px;
    }

    .rectangle,
    .rectangle * {
        box-sizing: border-box;
    }

    .rectangle {
        background: rgba(0, 0, 0, 0.2);
        height: 436.16px;
        position: relative;
        backdrop-filter: blur(2.5px);
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

    .divcard {
        border-right: 1px solid #ddd;
    }

    .divcard:last-child {
        border-right: none;
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

    .p36red {
        color: #ff4d4d;
        text-align: left;
        font-family: var(--apptextstyles-h-3-heading-font-family,
                "Poppins-Bold",
                sans-serif);
        font-size: var(--apptextstyles-h-3-heading-font-size, 36px);
        font-weight: var(--apptextstyles-h-3-heading-font-weight, 700);
        position: relative;
    }

    .p37red {
        color: #ff4d4d;
        text-align: left;
        font-family: var(--apptextstyles-h-3-heading-font-family,
                "Poppins-Bold",
                sans-serif);
        font-size: var(--apptextstyles-h-3-heading-font-size, 24px);
        font-weight: var(--apptextstyles-h-3-heading-font-weight, 700);
        position: relative;
    }

    .p24b {
        color: #000000;
        text-align: left;
        font-family: var(--apptextstyles-h-4-heading-font-family,
                "Poppins-Bold",
                sans-serif);
        font-size: var(--apptextstyles-h-4-heading-font-size, 24px);
        font-weight: var(--apptextstyles-h-4-heading-font-weight, 700);
        position: relative;
        width: 342px;
    }

    .colour {
        color: var(--appcolortone-secondary-1, #233656);
        text-align: center;
        font-family: var(--apptextstyles-text-semi-bold-1-font-family,
                "Poppins-SemiBold",
                sans-serif);
        font-size: var(--apptextstyles-text-semi-bold-1-font-size, 18px);
        font-weight: var(--apptextstyles-text-semi-bold-1-font-weight, 600);
        position: relative;
        margin-top: 20px;
    }

    .btn4-check {
        position: absolute;
        clip: rect(0, 0, 0, 0);
        pointer-events: none;
    }

    .form-label.btn4 {
        cursor: pointer;
        margin-right: 10px;
    }


    .btn4-check:checked+.form-label.btn4 {
        border: 4px solid #333;
    }

    .notselected {
        color: var(--appcolortone-primary, #171433);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 18px;
        font-weight: 600;
        position: relative;
    }

    .border {
        background: #ffffff;
        border-radius: 8px;
        border-style: solid;
        border-color: var(--appcolortone-secondary-1, #233656);
        border-width: 1px;
        padding: 10px 16px 10px 16px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 60px;
        position: relative;
    }

    .btn5-check {
        position: absolute;
        clip: rect(0, 0, 0, 0);
        pointer-events: none;
    }


    .form-label.btn5 {
        cursor: pointer;
    }

    .btn5-check:checked+.form-label.btn5 {
        background: var(--appcolortone-secondary-1, #233656);
        border-radius: 8px;
        padding: 10px 16px 10px 16px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
        justify-content: center;
        flex-shrink: 0;
        width: 60px;
        position: relative;
        color: white;
        height: auto;
    }

    .form-label.btn6 {
        background: var(--appcolortone-secondary-1, #FFFFFF);
        border-radius: 8px;
        padding: 10px 16px 10px 16px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
        justify-content: center;
        flex-shrink: 0;
        width: 400px;
        position: relative;
        color: #233656;
        height: auto;
        cursor: pointer;
    }

    .btn6-check:checked+.form-label.btn6 {
        background: var(--appcolortone-secondary-1, #233656);
        border-radius: 8px;
        padding: 10px 16px 10px 16px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
        justify-content: center;
        flex-shrink: 0;
        width: 400px;
        position: relative;
        color: white;
        height: auto;
    }

    .btn6-check {
        position: absolute;
        clip: rect(0, 0, 0, 0);
        pointer-events: none;
    }

    .btn6-check:checked+.form-label .product2 {

        color: white;
        font-weight: bold;
    }

    .form-label.btn5 {
        margin-right: 10px;
    }

    .quantity {
        color: var(--appcolortone-primary, #171433);
        text-align: left;
        font-family: var(--text-text-medium-2-font-family,
                "Poppins-Medium",
                sans-serif);
        font-size: var(--text-text-medium-2-font-size, 14px);
        font-weight: var(--text-text-medium-2-font-weight, 500);
        position: relative;
    }

    .product {
        background: #ffffff;
        border-radius: 8px;
        border-style: solid;
        border-color: var(--appcolortone-primary, #171433);
        border-width: 1px;
        padding: 10px 16px;
        display: flex;
        flex-direction: row;
        gap: 14px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        position: relative;
        height: 80px;
        color: var(--appcolortone-secondary-1, #233656);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 14px;
        font-weight: 600;
        align-self: stretch;
        white-space: nowrap;
        vertical-align: top;
    }

    .product2 {
        color: var(--cm-scolor-accent, #4a5c7a);
        text-align: left;
        font-family: "Barlow-Medium", sans-serif;
        font-size: 14px;
        font-weight: 500;
        position: relative;
        word-wrap: break-word;
    }

    .btn-group .form-label {
        display: inline-block;
        white-space: normal;
        position: relative;
        /* Add this line */
        padding: 10px;
        /* Add padding to maintain space around the box */
        border: 1px solid #ced4da;
        /* Add a border to maintain the box appearance */
    }

    .button1 {
        display: flex;
        flex-direction: column;
        gap: 10px;
        height: 7`0px;
        align-items: center;
        justify-content: center;
        flex: 1;
        position: relative;
        font-size: 1.2em;
        padding: 24px 72px;
        border-radius: 33.5px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        padding-right: -20px;
        margin-left: -40px;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #171433;
        background-color: transparent;
        border: none;
        border-bottom: 2px solid #171433;
        text-align: center;
        font-family: 'Barlow', sans-serif;
        font-size: 16px;
        font-weight: 500;
        line-height: normal;
        transition: border-bottom-color 0.1s ease;
    }

    .p18poppins {
        color: var(--appcolortone-secondary-1, #233656);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 18px;
        font-weight: 600;
        position: relative;
    }

    .p14b {
        color: var(--appcolortone-secondary-1, #233656);
        text-align: left;
        margin-top: 10px;
        position: relative;
        padding-left: 20px;
        font-family: var(--text-text-regular-2-font-family,
                "Poppins-Regular",
                sans-serif);
    }

    .p14b::before {
        content: '\2022';/ color: #171433;
        font-size: 15px;
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        margin-right: 8px;
    }

    .p15b {
        color: var(--appcolortone-secondary-1, #233656);
        text-align: left;
        margin-top: 10px;
        position: relative;
        padding-left: 20px;
        font-weight: bold;
        font-family: var(--text-text-regular-2-font-family,
                "Poppins-Regular",
                sans-serif);
    }

    .p16b {
        color: var(--appcolortone-secondary-1, #000000);
        text-align: left;
        margin-top: 10px;
        position: relative;
        padding-left: 20px;
        font-weight: bold;
        font-family: var(--text-text-regular-2-font-family,
                "Poppins-Regular",
                sans-serif);
    }

    .nav-tabs .nav-item .nav-link1 {
        color: #171433;
        /* Dark font color when not active */
        background-color: #ffffff;
        /* White background when not active */
        font-family: 'Poppins-Medium', sans-serif;
        font-size: 16px;
        font-weight: bold;
        border: 1px solid #171433;
        width: auto;
    }

    .nav-tabs .nav-item .nav-link1.active {
        color: #ffffff;
        /* White font color when active */
        background: var(--appcolortone-secondary-1, #233656);
        border: 2px solid #171433;
        /* Dark border bottom when active */
        text-align: left;
        font-family: 'Poppins-Medium', sans-serif;
        font-size: 16px;
        font-weight: 500;
        position: relative;
        line-height: normal;
        transition: border-bottom-color 0.3s ease;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #000;
        /* Add a black border with a width of 1 pixel */
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

    .d-flex {
        display: flex;
        flex-grow: 1;
    }

    .container1 {
        background: #ffffff;
        border-radius: 10px;
        padding: 10px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        height: auto;
        width: 105%;
        margin-top: 20px;
        position: relative;
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    }

    @media(max-width:1024px) {
        #content-wrapper {
            width: 100%;
        }
    }

    .item-frame {
        background: #ffffff;
        border-radius: 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        position: relative;
        box-shadow: var(--app-dropshadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        max-width: 240px;
        /* Adjust the max-width as needed */
        margin: 0 auto;
    }


    .dropdown-menu {
        border-radius: 30px;
        /* Adjust the value to change the border radius */
    }

    .dropdown-toggle {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        border-radius: 30px;
    }

    .dropdown-item {
        white-space: normal;
    }

    /* Venue selection styles */
    .venues-container {
        width: 80%;
    }

    .venues-item-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .venues-item {
        padding: 15px;
        border: 1px solid #171433;
        border-radius: 15px;
        cursor: pointer;
    }

    .venues-item.active {
        background: #233656;
    }

    .venue-item_name {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 2px;
        color: #233656;
    }

    .venues-item.active .venue-item_name,
    .venues-item.active .venue-item_address {
        color: #ffffff;
    }

    .venue-item_address {
        font-size: 14px;
        font-weight: 500;
        margin: 0;
        color: #4A5C7A;
    }
</style>
@endsection

@section('content')
<div class="d-flex flex-column" id="content-wrapper"
    style="padding-top: 50px;padding-bottom: 50px;padding-right: 100px;padding-left: 50px;min-width:100vh;background: var(--app-color-tone-bg-color, #F1F2F9);">
    <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
        <div style="display: flex; align-items: center;">
            <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                <a href="{{ route('wave.shopping') }}">
                    <button class type="button"
                        style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                        <i class="fas fa-chevron-left"></i></button></a>
            </div>
        </div>

        <p class="shopping d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
            style="margin-bottom: 0px;height: 31px;text-align: center;"><strong>{{ __('Shopping') }}</strong>
        </p>
        <div><a href="{{ route('wave.my-order') }}"><button class="order" type="button"
                    style="width: auto;height: auto;padding: 15px;border-width: 1px;border-style: solid;font-weight: bold;margin-right: 20px;">My
                    Order</button></a>
            <a href="{{ route('wave.cart-details') }}"><button class="order" type="button"
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
                </button></a>
        </div>
    </div>
    <form method="POST" action="{{ route('add-cart') }}">
        @csrf
        <div class="d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center justify-content-xxl-center"
            style="margin-bottom: 20px;margin-top: 50px;">
            <div class="container product-item_container">
                <div class="row row-cols-sm-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 row-cols-xxl-2">
                    <div class="col">
                        <div class="carousel slide carousel-dark" data-bs-ride="false" id="carousel-1">
                            <div class="carousel-inner" style="border-radius: 20px;">

                                @foreach ($productImages as $index => $productImage)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img class="w-100 d-block w-100" src="{{ $productImage['image_path'] }}"
                                        alt="Slide Image">
                                </div>
                                @endforeach
                            </div>

                            <div>
                                <a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev">
                                    <span aria-hidden="true"></span>
                                    <span class="visually-hidden">{{ __('Previous') }}</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next">
                                    <span aria-hidden="true"></span>
                                    <span class="visually-hidden">{{ __('Next') }}</span>
                                </a>
                            </div>

                            <ol class="carousel-indicators">
                                @foreach ($productImages as $index => $productImage)
                                <li data-bs-target="#carousel-1" data-bs-slide-to="{{ $index }}"
                                    class="{{ $index === 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                        </div>
                    </div>

                    <div class="col">
                        <p class="p36red">HK${{ $shoppingProduct['price'] }}</p>
                        <p class="p24b">{{ $shoppingProduct['name'] }}</p>
                        <div>
                            <p class="text-start colour" style="margin-bottom: 5px;">Colour</p>
                            <div class="btn-group" role="group">
                                <input type="radio" id="btnradio1" class="btn4-check" name="btnradio" autocomplete="off"
                                    value="yellow">
                                <label class="form-label form-label btn4 btn4-outline-primary" for="btnradio1"
                                    style="background: url('{{ asset('themes/tailwind/images/clipboard-image-97.png') }}') center / cover no-repeat, rgb(78, 115, 223);width: 60px;height: 60px;border-radius: 10px;"></label>
                                <input type="radio" id="btnradio2" class="btn4-check" name="btnradio" autocomplete="off"
                                    value="grey">
                                <label class="form-label form-label btn4 btn4-outline-primary" for="btnradio2"
                                    style="background: url('{{ asset('themes/tailwind/images/clipboard-image-98.png') }}') center / cover no-repeat, rgb(78, 115, 223);width: 60px;height: 60px; border-radius: 10px;"></label>
                            </div>
                        </div>
                        <div style="margin-top: 10px;">
                            <div class="d-xxl-flex justify-content-between align-items-xxl-center">
                                <p class="text-start colour" style="margin-bottom: 5px;">Quantity</p>
                            </div>

                            <select id="quantity"
                                style="height: 42px; width: 80px; text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; font-family: var(--text-text-medium-2-font-family, 'Poppins-Medium', sans-serif); color: var(--appcolortone-primary, #171433); padding-right: 10px;text-indent: 25px;"
                                name="quantity">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <p class="text-start colour" style="left:20%;margin-top:-35px;">Stock: {{
                                $shoppingProduct['stock_remaining'] }}</p>
                        </div>

                        <div class="dropdown">
                            <p class="text-start colour" style="margin-bottom: 5px;">Choose where to take your product
                            </p>
                            <div class="venues-container">
                                <div class="venues-item-container">
                                    @foreach ($schoolVenues as $index => $schoolVenue)
                                    <div class="venues-item {{ $index == 0 ? 'active' : '' }}"
                                        data-venue_id="{{ $schoolVenue['id'] }}">
                                        <p class="venue-item_name">{{ $schoolVenue['name'] }}</p>
                                        <p class="venue-item_address">{{ $schoolVenue['address'] }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 10px;">
                            <div class="row">

                                <div class="col">
                                    <button id="openModalButton" type="button" class="button1" style="height: 60px;"
                                        data-product_id="{{ $shoppingProduct['id'] }}">Add to Cart</button>
                                </div>
                                <div class="col">
    </form>
    <button id="buyNowButton" class="button1" type="button" style="background: #AAC9E4;color: #171433; height: 60px;"
        data-product_id="{{ $shoppingProduct['id'] }}">Buy Now</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Bottom Details -->
<div
    class="d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center justify-content-xxl-center divcard container1">
    <div class="d-xxl-flex flex-column justify-content-xxl-start align-items-xxl-center"
        style="width: 100%;height: auto;">
        <div class="d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-md-center justify-content-lg-center justify-content-xl-center justify-content-xxl-center"
            style="width: 100%;padding-bottom: 15px;border-bottom-width: 1px;border-bottom-style: solid;">
            <div style="width: 300px;">
                <ul class="nav nav-tabs nav-fill" role="tablist" style="border-style: solid;">
                    <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab"
                            href="#tab-1" style="background: transparent;">Description</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab"
                            href="#tab-2" style="font-family: Barlow, sans-serif;">Specs</a></li>
                </ul>
            </div>
        </div>

        <div class="tab-content" style="width: 100%;">
            <div id="tab-1" class="tab-pane active" role="tabpanel" style="height: 100%;">
                <p class="p18poppins" style="text-align: left;margin-bottom: 10px;">Description</p>
                <p class="p14b">{{ $shoppingProduct['description'] }}</p>
                <p class="p18poppins" style="text-align: left;margin-top: 10px;">Specifications</p>
                <ul>
                    <li class="p14b">Loose fit</li>
                    <li class="p14b">Ribbed crewneck</li>
                    <li class="p14b">53% cotton, 47% recycled polyester interlock</li>
                    <li class="p14b">Soft feel</li>
                    <li class="p14b">Product colour：BLACK</li>
                    <li class="p14b">Product code: IB7310</li>
                </ul>
                <p class="p18poppins" style="text-align: left;margin-top: 15px;">Frequently bought
                    together</p>
                <div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5" style="margin-top:30px;">
                    <div
                        class="col d-xxl-flex flex-column justify-content-xxl-center align-items-xxl-center item-frame">
                        <img src="{{ asset('themes/tailwind/images/clipboard-image-99.png') }}" style="width: 141px;">
                        <div style="width: 100%;">
                            <p class="p37red" style="text-align:center;margin-bottom: 5px;">HK$ 188</p>
                            <p class="p15b" style="text-align:center;">CN 2PB SHORTSWIM<br>NAVY PLANET
                            </p>
                        </div>
                    </div>
                    <div
                        class="col d-xxl-flex flex-column justify-content-xxl-center align-items-xxl-center item-frame">
                        <img src="{{ asset('themes/tailwind/images/clipboard-image-99.png') }}" style="width: 141px;">
                        <div style="width: 100%;">
                            <p class="p37red" style="text-align:center;margin-bottom: 5px;">HK$ 188</p>
                            <p class="p15b" style="text-align:center;">CN 2PB SHORTSWIM<br>NAVY PLANET
                            </p>
                        </div>
                    </div>
                    <div
                        class="col d-xxl-flex flex-column justify-content-xxl-center align-items-xxl-center item-frame">
                        <img src="{{ asset('themes/tailwind/images/clipboard-image-99.png') }}" style="width: 141px;">
                        <div style="width: 100%;">
                            <p class="p37red" style="text-align:center;margin-bottom: 5px;">HK$ 188</p>
                            <p class="p15b" style="text-align:center;">CN 2PB SHORTSWIM<br>NAVY PLANET
                            </p>
                        </div>
                    </div>
                    <div
                        class="col d-xxl-flex flex-column justify-content-xxl-center align-items-xxl-center item-frame">
                        <img src="{{ asset('themes/tailwind/images/clipboard-image-99.png') }}" style="width: 141px;">
                        <div style="width: 100%;">
                            <p class="p37red" style="text-align:center;margin-bottom: 5px;">HK$ 188</p>
                            <p class="p15b" style="text-align:center;">CN 2PB SHORTSWIM<br>NAVY PLANET
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-2" class="tab-pane" style="width: 100%;padding: 35px;" role="tabpanel">
                <div class="modal-content">
                    <div class="modal-body d-xxl-flex justify-content-xxl-center">
                        <div class="d-xxl-flex flex-column justify-content-xxl-start align-items-xxl-center"
                            style="width: 100%;height: auto;">
                            <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="width: 100%;">
                                <div>
                                    <ul class="nav nav-tabs nav-fill" role="tablist" style="border-style: none;">
                                        <li class="nav-item" role="presentation"><a class="nav-link1 active" role="tab"
                                                data-bs-toggle="tab" href="#tab1">Wetsuit Bottoms</a>
                                        </li>
                                        <li class="nav-item" role="presentation"><a class="nav-link1" role="tab"
                                                data-bs-toggle="tab" href="#tab2"
                                                style="font-family: Barlow, sans-serif;"><strong>Wetsuit
                                                    Tops</strong></a></li>
                                    </ul>
                                </div>
                                <div>
                                    <ul class="nav nav-tabs nav-fill" role="tablist2" style="border-style: none;">
                                        <li class="nav-item" role="presentation"><a class="nav-link1 active" role="tab"
                                                data-bs-toggle="tab" href="#tab3">CM</a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link1" role="tab"
                                                data-bs-toggle="tab" href="#tab4"
                                                style="font-family: Barlow, sans-serif;">IN</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content" style="width: 100%;padding: 15px;">
                                <div id="tab1" class="tab-pane active" role="tabpanel" style="height: 100%;">
                                    <div class="table-responsive" style="text-align: center;margin-top: 10px;">
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr style="background: #F5F5F5;">
                                                    <th class="p16b" style="font-weight: bold;background: #B0B0B0;">Size
                                                    </th>
                                                    <th class="p16b" style="font-weight: bold;background: #B0B0B0;">
                                                        Bottoms Length</th>
                                                    <th class="p16b" style="font-weight: bold;background: #B0B0B0;">Hip
                                                        Size</th>
                                                    <th class="p16b" style="font-weight: bold;background: #B0B0B0;">
                                                        Waist Size</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="p16b" style="font-weight: bold;background: #F5F5F5;">110
                                                    </td>
                                                    <td class="p16b">23</td>
                                                    <td class="p16b">62</td>
                                                    <td class="p16b">54-75</td>
                                                </tr>
                                                <tr>
                                                    <td class="p16b" style="font-weight: bold;background: #F5F5F5;">120
                                                    </td>
                                                    <td class="p16b">23.8</td>
                                                    <td class="p16b">65</td>
                                                    <td class="p16b">57-78</td>
                                                </tr>
                                                <tr>
                                                    <td class="p16b" style="font-weight: bold;background: #F5F5F5;">130
                                                    </td>
                                                    <td class="p16b">24.6</td>
                                                    <td class="p16b">68</td>
                                                    <td class="p16b">60-81</td>
                                                </tr>
                                                <tr>
                                                    <td class="p16b" style="font-weight: bold;background: #F5F5F5;">140
                                                    </td>
                                                    <td class="p16b">26.1</td>
                                                    <td class="p16b">74</td>
                                                    <td class="p16b">66-87</td>
                                                </tr>
                                                <tr>
                                                    <td class="p16b" style="font-weight: bold;background: #F5F5F5;">150
                                                    </td>
                                                    <td class="p16b">28.3</td>
                                                    <td class="p16b">78</td>
                                                    <td class="p16b">70-93</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tab2" class="tab-pane" role="tabpanel">
                                    <div class="table-responsive" style="text-align: center;margin-top: 10px;">
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr style="background: #F5F5F5;">
                                                    <th class="p16b" style="font-weight: bold;background: #B0B0B0;">Size
                                                    </th>
                                                    <th class="p16b" style="font-weight: bold;background: #B0B0B0;">
                                                        Bottoms Length</th>
                                                    <th class="p16b" style="font-weight: bold;background: #B0B0B0;">Hip
                                                        Size</th>
                                                    <th class="p16b" style="font-weight: bold;background: #B0B0B0;">
                                                        Waist Size</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="p16b" style="font-weight: bold;background: #F5F5F5;">110
                                                    </td>
                                                    <td class="p16b">9.1</td>
                                                    <td class="p16b">24.4</td>
                                                    <td class="p16b">21.3-29.5</td>
                                                </tr>
                                                <tr>
                                                    <td class="p16b" style="font-weight: bold;background: #F5F5F5;">120
                                                    </td>
                                                    <td class="p16b">9.4</td>
                                                    <td class="p16b">25.6</td>
                                                    <td class="p16b">22.4-30.7</td>
                                                </tr>
                                                <tr>
                                                    <td class="p16b" style="font-weight: bold;background: #F5F5F5;">130
                                                    </td>
                                                    <td class="p16b">9.7</td>
                                                    <td class="p16b">26.8</td>
                                                    <td class="p16b">23.6-31.9</td>
                                                </tr>
                                                <tr>
                                                    <td class="p16b" style="font-weight: bold;background: #F5F5F5;">140
                                                    </td>
                                                    <td class="p16b">10.3</td>
                                                    <td class="p16b">29.1</td>
                                                    <td class="p16b">26-34.3</td>
                                                </tr>
                                                <tr>
                                                    <td class="p16b" style="font-weight: bold;background: #F5F5F5;">150
                                                    </td>
                                                    <td class="p16b">13.6</td>
                                                    <td class="p16b">33.5</td>
                                                    <td class="p16b">29-38.4</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tab3" class="tab-pane" role="tabpanel"></div>
                                <div id="tab4" class="tab-pane" role="tabpanel"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade modal2" role="dialog" tabindex="-1" id="modal-2" style="border-style: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body d-xl-flex flex-column justify-content-evenly align-items-xl-center"
                style="height: 509px;width: 60%; margin: 0 auto; padding: 0;border-radius: 200px;background: var(--app-color-tone-secondary-2, #AAC9E4)">
                <img src="{{ asset('themes/tailwind/images/clipboard-image-61.png') }}" style="width: 217px;">
                <p class="p20b" style="margin-bottom:120px;"><strong>Added to Cart !</strong></p>
                <button class="button2" style="top:-12%;" type="button" data-bs-dismiss="modal"
                    style="width: 68px;">Done</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</body>
@endsection

@section('javascript')
<script>
    // JavaScript to handle selection and display
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', event => {
            const selectedVenue = event.target.textContent.trim();
            document.getElementById('dropdownMenuButton').textContent = selectedVenue;
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
            //* Events Functions
            var userData = null;
            var hasError = false;
            var addToCartResponseData = {};

            initializeEvents();

            function initializeEvents()
            {
                userData = <?= json_encode($user) ?>;

                $('.product-item_container').on('click', '#openModalButton', async function(){
                    $(this).prop('disabled', true);

                    const productID = $(this).data('product_id');
                    const quantity = $('.product-item_container select[name=quantity]').val();
                    const venue = $('.product-item_container .venues-item-container .venues-item.active').data('venue_id');

                    const formData = {
                        user_id: userData.id,
                        product_id: productID,
                        quantity: parseInt(quantity),
                        venue_id: venue,
                    };
                    console.log("FormData:", formData);
                    await addToCart(this, formData, 'add-to-cart')

                    hasError = false;
                    addToCartResponseData = {};
                });

                $('.product-item_container').on('click', '#buyNowButton', async function(){
                    $(this).prop('disabled', true);

                    const productID = $(this).data('product_id');
                    const quantity = $('.product-item_container select[name=quantity]').val();
                    const venue = $('.product-item_container .venues-item-container .venues-item.active').data('venue_id');

                    const formData = {
                        user_id: userData.id,
                        product_id: productID,
                        quantity: parseInt(quantity),
                        venue_id: venue,
                    };

                    await addToCart(this, formData, 'buy-now')

                    if(! hasError ) {
                        buyNowRedirection(addToCartResponseData)
                    }

                    // after adding to cart, redirect to online payment
                    hasError = false;
                    addToCartResponseData = {};
                });

                $('.product-item_container .venues-item-container').on('click', '.venues-item', function(){
                    $('.venues-item').removeClass('active');

                    $(this).addClass('active');
                });
            }
            
            async function addToCart(input, formData, type){
                await axios.post(`${getApiUrl()}/cart-details/add`, formData, {
                            headers: {
                                'Authorization': 'Bearer ' + getUserToken()
                            }
                        }).then(res => {
                            $(input).removeAttr('disabled');

                            if ( res.data.success ) {
                                if( type == 'add-to-cart' )
                                    $('#modal-2').modal('show');

                                addToCartResponseData = res.data;
                            } else {
                                toastInfo("Cant' add to cart", res.data.message, "warning");
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

            function buyNowRedirection(responseData)
            {
                window.location.href = '/online-payment';
                // $.ajax({
                //     url: url,
                //     method: 'POST',
                //     data: responseData,
                //     success: function(response) {
                //         window.location.href = '/online-payment';
                //     },
                //     error: function(xhr, status, error) {
                //         console.error(xhr.responseText);
                //     }
                // });
            }
        });

        //  document.getElementById('openModalButton').addEventListener('click', function() {
        //     $('#modal-2').modal('show'); // jQuery code to show the modal
        // });
        // $(document).ready(function() {
        //     function gatherData() {
        //         var btnradio1 = $('#btnradio1').prop('checked') ? $('#btnradio1').val() : '';
        //         var btnradio2 = $('#btnradio2').prop('checked') ? $('#btnradio2').val() : '';
        //         var btnradio3 = $('#btnradio3').prop('checked') ? $('#btnradio3').val() : '';
        //         var btnradio4 = $('#btnradio4').prop('checked') ? $('#btnradio4').val() : '';
        //         var btnradio5 = $('#btnradio5').prop('checked') ? $('#btnradio5').val() : '';
        //         var btnradio6 = $('#btnradio6').prop('checked') ? $('#btnradio6').val() : '';
        //         var btnradio7 = $('#btnradio7').prop('checked') ? $('#btnradio7').val() : '';
        //         var btnradio8 = $('#btnradio8').prop('checked') ? $('#btnradio8').val() : '';
        //         var btnradio9 = $('#btnradio9').prop('checked') ? $('#btnradio9').val() : '';
        //         var quantity = $('#quantity').val();
        //         var errorMessages = [];

        //         if (!((btnradio1 || btnradio2) && (btnradio3 || btnradio4 || btnradio5 || btnradio6 || btnradio7) &&
        //                 (btnradio8 || btnradio9) && quantity)) {
        //             if (!(btnradio1 || btnradio2)) {
        //                 errorMessages.push('Please select one option for color');
        //             }
        //             if (!(btnradio3 || btnradio4 || btnradio5 || btnradio6 || btnradio7)) {
        //                 errorMessages.push('Please select one option for size');
        //             }
        //             if (!(btnradio8 || btnradio9)) {
        //                 errorMessages.push('Please select one option for address');
        //             }
        //             if (!quantity) {
        //                 errorMessages.push('Please select a quantity');
        //             }
        //         }

        //         return {
        //             data: {
        //                 btnradio1: btnradio1,
        //                 btnradio2: btnradio2,
        //                 btnradio3: btnradio3,
        //                 btnradio4: btnradio4,
        //                 btnradio5: btnradio5,
        //                 btnradio6: btnradio6,
        //                 btnradio7: btnradio7,
        //                 btnradio8: btnradio8,
        //                 btnradio9: btnradio9,
        //                 quantity: quantity,
        //             },
        //             errorMessages: errorMessages
        //         };
        //     }

        //     function sendAjaxRequest(url, data, buttonType) {
        //         if (data.errorMessages.length === 0) {
        //             $.ajax({
        //                 url: url,
        //                 method: 'POST',
        //                 data: data.data,
        //                 success: function(response) {
        //                     console.log(response);
        //                     if (buttonType === 'buyNowButton') {
        //                         window.location.href = '/online-payment';
        //                     } else if (buttonType === 'openModalButton') {
        //                         $('#modal-2 .modal-body').html(`
        //                 <img src="{{ asset('themes/tailwind/images/clipboard-image-61.png') }}" style="width: 217px;">
        //                 <p class="p20b" style= "margin-bottom:120px;"><strong>Added to Cart !</strong></p>
        //                 <button class="button2" style="top:-6%;" type="button" data-bs-dismiss="modal" style="width: 68px;">Continue</button>
        //             `);
        //                         // Show the modal
        //                         $('#modal-2').modal('show');
        //                     }
        //                 },
        //                 error: function(xhr, status, error) {
        //                     console.error(xhr.responseText);
        //                 }
        //             });
        //         } else {
        //             // Display error messages
        //             alert(data.errorMessages.join('\n'));
        //         }
        //     }


        //     $('#openModalButton').click(function() {
        //         var data = gatherData();
        //         sendAjaxRequest('/cart-details', data, 'openModalButton');
        //     });

        //     // Button click event for "Buy Now"
        //     $('#buyNowButton').click(function() {
        //         var data = gatherData();
        //         sendAjaxRequest('/online-payment', data, 'buyNowButton');
        //     });
        // });
</script>
@endsection