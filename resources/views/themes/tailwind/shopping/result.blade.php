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

    .container {
        background: #ffffff;
        border-radius: 36px;
        padding: 0px 20px 0px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        height: 180px;
        margin-bottom: 20px;
        position: relative;
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
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

    #wrapper {
        display: flex;
        flex-wrap: nowrap;
        /* Prevent flex items from wrapping */
        overflow-x: auto;
        /* Enable horizontal scrolling if necessary */
    }

    input[type="search"]::placeholder {
        padding-left: -40px;
    }

    .search {
        padding-left: 20px;
    }

    .category-button1.selected .category-button-text {
        color: #00008b;
        font-weight: 700;
    }

    @media(max-width:1920px) {
        .search {
            width: 1000px;
        }

        .product {
            width: 250px;
            margin-right: 800px !important;
        }
    }

    @media (max-width:1440px) {
        .search {
            width: 75vw;
        }
    }

    @media (max-width:1024px) {
        .search {
            width: 65vw;
        }

        .image {
            max-height: 90px;
            max-width: 90px;
        }

        .p14b {
            font-size: 16px;
        }

        .p18red {
            font-size: 18px;
        }

        .p40 {
            font-size: 36px;
        }

        .divcard {
            flex: 0 0 calc(33.333% - 10px);
            /* Adjust the width to fit three boxes per line */
            margin-right: 10px;
            /* Adjust margin between boxes */
            max-width: 200px;
        }
    }

    @media (max-width:768px) {
        .search {
            width: 52vw;
        }

        .image {
            max-height: 90px;
            max-width: 90px;
        }

        .p14b {
            font-size: 16px;
        }

        .p18red {
            font-size: 18px;
        }

        .p40 {
            font-size: 24px;
        }

        .row-cols-2>div {
            flex: 0 0 33.333%;
            /* Adjust width to fit 3 boxes per row */
            max-width: 33.333%;
            /* Adjust max-width to fit 3 boxes per row */
        }
    }

</style>
@endsection

@section('content')
<div class="d-flex flex-column" id="content-wrapper" style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);width:100%;">
    <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
        <div style="display: flex; align-items: center;">
            <a href="{{ route('wave.shopping') }}">
                <button class type="button" style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                    <i class="fas fa-chevron-left"></i></button></a>
        </div>

        <p class="shopping d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 0px;height: 31px;text-align: center;"><strong>{{ __('Shopping') }}</strong>
        </p>
        <div>
            <a href="{{ route('wave.my-order') }}" style="color: black;text-decoration:none;"><button class="order" type="button" style="width: auto;height: auto;padding: 15px;border-width: 1px;border-style: solid;font-weight: bold;margin-right: 20px;">My
                    Order</a></button>
            <a href="{{ route('wave.cart-details') }}" style="text-decoration: none; color: black;">
                <button class="order" type="button" style="width: auto;height: auto;padding: 10px;font-weight: bold;border-width: 1px;border-style: none;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
                    <svg class="group" width="30" height="28" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.04731 20.6114C8.97158 20.5319 8.91469 20.4349 8.88792 20.3277L6.38835 3.6878L6.38832 3.68779L8.88788 20.3277C8.91466 20.4349 8.97157 20.5319 9.04731 20.6114ZM1.10292 2.20328C0.510893 1.88808 0.870841 0.845592 1.60348 1.0454L7.10251 2.61656C7.17727 2.63524 7.24224 2.65882 7.29872 2.68857C7.24224 2.65881 7.17725 2.63523 7.10248 2.61654L1.60344 1.04538C0.87079 0.845569 0.510843 1.8881 1.10292 2.20328ZM28.2668 9.33443L8.8089 6.68425L8.23542 2.98848L8.22829 2.95997C8.17435 2.74423 8.07725 2.51822 7.88898 2.32995C7.70405 2.14503 7.48273 2.04806 7.27047 1.99356L1.78069 0.424999L1.77319 0.422954C1.40041 0.321286 1.03892 0.38538 0.749996 0.576361C0.475098 0.758073 0.298538 1.03168 0.216771 1.30969C0.135132 1.58726 0.134596 1.9157 0.274214 2.21901C0.421516 2.53901 0.702353 2.77933 1.07494 2.88143L1.07661 2.88188L5.81247 4.19741L8.25447 20.4542L8.26198 20.4842C8.4071 21.0647 8.95683 21.4728 9.53062 21.4728H24.5994C24.8982 21.4728 25.1667 21.3638 25.3684 21.2242C25.5617 21.0903 25.7584 20.8828 25.8514 20.6116L29.2742 11.0561C29.5569 10.3264 29.1135 9.47554 28.2763 9.33601L28.2668 9.33443ZM9.15789 9.30019L10.6549 18.9684H23.7181L26.3638 11.6465L9.15789 9.30019ZM10.102 19.6136H24.1709L27.2418 11.1151L27.2419 11.1151L24.171 19.6136H10.102L10.102 19.6136Z" fill="#171433" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4167 24.1165C15.4167 22.403 14.0293 21.0156 12.3158 21.0156C10.6022 21.0156 9.21484 22.403 9.21484 24.1165C9.21484 25.8301 10.6022 27.2174 12.3158 27.2174C14.0293 27.2174 15.4167 25.8301 15.4167 24.1165ZM11.2745 24.1165C11.2745 23.5447 11.744 23.0753 12.3158 23.0753C12.8875 23.0753 13.357 23.5447 13.357 24.1165C13.357 24.6883 12.8875 25.1578 12.3158 25.1578C11.744 25.1578 11.2745 24.6883 11.2745 24.1165ZM15.0241 23.9433C15.0277 24.0006 15.0296 24.0583 15.0296 24.1165C15.0296 25.6163 13.8155 26.8303 12.3158 26.8303C10.8728 26.8303 9.69436 25.7065 9.60712 24.2857C9.69634 25.7046 10.874 26.8263 12.3155 26.8263C13.8152 26.8263 15.0293 25.6122 15.0293 24.1125C15.0293 24.0557 15.0276 23.9993 15.0241 23.9433ZM12.3158 22.6882C11.5302 22.6882 10.8874 23.331 10.8874 24.1165C10.8874 24.1459 10.8883 24.175 10.8901 24.2039C10.8882 24.1737 10.8872 24.1432 10.8872 24.1125C10.8872 23.3269 11.5299 22.6842 12.3155 22.6842C13.0717 22.6842 13.6956 23.2798 13.7412 24.0251C13.6936 23.2817 13.0706 22.6882 12.3158 22.6882Z" fill="#171433" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M25.0581 24.1165C25.0581 22.403 23.6708 21.0156 21.9572 21.0156C20.2303 21.0156 18.9277 22.4166 18.9277 24.1165C18.9277 25.8164 20.2303 27.2174 21.9572 27.2174C23.6708 27.2174 25.0581 25.8301 25.0581 24.1165ZM20.916 24.1165C20.916 23.5447 21.3854 23.0753 21.9572 23.0753C22.529 23.0753 22.9985 23.5447 22.9985 24.1165C22.9985 24.6883 22.529 25.1578 21.9572 25.1578C21.3854 25.1578 20.916 24.6883 20.916 24.1165ZM24.6656 23.9433C24.6692 24.0006 24.671 24.0583 24.671 24.1165C24.671 25.6163 23.457 26.8303 21.9572 26.8303C20.5182 26.8303 19.4079 25.7125 19.3204 24.2971C19.4097 25.7106 20.5193 26.8263 21.957 26.8263C23.4567 26.8263 24.6708 25.6122 24.6708 24.1125C24.6708 24.0557 24.669 23.9993 24.6656 23.9433ZM21.9572 22.6882C21.1716 22.6882 20.5289 23.331 20.5289 24.1165C20.5289 24.1459 20.5298 24.175 20.5316 24.2039C20.5296 24.1737 20.5287 24.1432 20.5287 24.1125C20.5287 23.3269 21.1714 22.6842 21.957 22.6842C22.7132 22.6842 23.3371 23.2798 23.3826 24.0251C23.3351 23.2817 22.7121 22.6882 21.9572 22.6882Z" fill="#171433" />
                    </svg>
                </button></a>
        </div>
    </div>
    <div class="d-md-flex d-lg-flex d-xl-flex justify-content-between align-items-md-center align-items-lg-center align-items-xl-center" style="margin-bottom: 20px;margin-top: 20px;background: #ffffff;border-radius: 10px;">
        <form method="POST" action="{{ route('search-items') }}" style="display: flex; align-items: center;">
            @csrf
            <input class="search" id="keywordInput" type="search" name="keyword" style="border: none;height: 47px;border-radius: 10px 0 0 10px;" placeholder="Search..." value="{{ session('outline-keyword') }}">
            <button type="submit" style="border: none; background: none; cursor: pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-search" style="color: rgb(40,40,40);width: 20px;height: 20px;margin-right: 20px;">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                    </path>
                </svg>
            </button>
        </form>
    </div>

    
    <div class="d-flex justify-content-center align-items-center" style="margin-bottom: 20px;margin-top: 20px;">
        @foreach ($productCategories as $productCategory)
        <form id="confirmationForm-{{ $productCategory['id'] ?? ''}}" action="{{ route('search-items') }}" method="POST">
            @csrf
            <button class="category-button1" data-category-id="{{ $productCategory['id'] ?? ''}}" style="border:none;background-color:#F1F2F9;height:84px;width:80px;border-radius:40px;margin-right:10px;" type="submit" onclick="markSelected(this)">
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ $productCategory['product_category_image'] }}" style="width: 80px;">
                    <input type="hidden" name="product_category_id" value="{{ $productCategory['id'] ?? ''}}">
                    <p class="category-button-text p16normal mt-2">{{ $productCategory['name'] ?? ''}}</p>
                </div>
            </button>

        </form>
        @endforeach
    </div>

    @unless (empty($products))
    <div class="d-flex justify-content-center" style="margin-bottom: 20px; margin-top: 20px;">
        <div class="row">
            @php
            $productsCount = count($products);
            $emptyBoxCount = 4 - ($productsCount % 4);
            @endphp

            @foreach ($products as $product)
            <div class="col-6 col-sm-3 divcard">
                <a href="{{ route('wave.item', ['id' => $product['id']]) }}" style="text-decoration: none;color:black;">
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <div class="product align-items-center divcard container" style="padding: 10px;width: 250px;margin-right:0px;">
                        <img src="{{ isset($product) && $product['images'][0]['image_path'] != '' ?$product['images'][0]['image_path']: 'https://kcwi-storage.b-cdn.net/kcwi/product-images/default-product-icon.png'; }}" style="width: 117px;margin-right: 10px;" class="image">
                        <div>
                            <p class="p18red" style="margin-bottom: 0px;text-align: left;">
                                RM{{ $product['price'] }}</p>
                            <p class="p14b" style="margin-bottom: 0px;">
                                {!! substr($product['name'], 0, 16) . (strlen($product['name']) > 16 ? '...' : '') !!}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @for ($i = 0; $i < $emptyBoxCount; $i++) <div class="col-6 col-sm-3 divcard" style="visibility: hidden;">
        </div>
        @endfor
    </div>

</div>
@else
<div class="alert alert-warning" role="alert">
    SEARCH NOT FOUND
</div>
@endunless
</div>
@endsection

@section('javascript')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var outlineCategory = "{{ session('outline-categories') }}"; // Get the outline-categories session value

        // Check for selected button when the page loads
        if (outlineCategory) {
            var buttons = document.querySelectorAll('.category-button1[data-category-id="' + outlineCategory + '"]');
            if (buttons.length > 0) {
                buttons[0].classList.add('selected');
            }
        }

        // Add event listener to category buttons
        var categoryButtons = document.querySelectorAll('.category-button1');
        categoryButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                markSelected(button); // Call the markSelected function when a category button is clicked
            });
        });
    });

    function markSelected(button) {
        // Remove selected class from all buttons
        var buttons = document.querySelectorAll('.category-button1');
        buttons.forEach(function(btn) {
            btn.classList.remove('selected');
        });
        // Add selected class to the clicked button
        button.classList.add('selected');
        // Store selected category ID in localStorage
        var categoryId = button.getAttribute('data-category-id');
        localStorage.setItem('selectedCategoryId', categoryId);
    }

</script>
@endsection
