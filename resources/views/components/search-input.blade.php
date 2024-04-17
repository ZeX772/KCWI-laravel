<div class="d-xl-flex align-items-xl-center w-100 input-search">
    <button class="btn btn-primary" type="button">
        <img src="{{ asset('themes/tailwind/images/clipboard-image-20.png') }}">
    </button>
    <input class="form-control" id="{{ $inputID }}" name="{{ $inputName }}" type="{{ $inputType }}" placeholder="{{ $inputPlaceholder }}" />
</div>
@if( isset($hasDropdown) && isset($allProducts))
<div class="dropdown-container d-none">
    <div id="myDropdown" class="dropdown-content">
        @foreach($allProducts as $allProduct)
            <a href="{{ route('wave.user.admin-main.products', ['tab'=>$tab, 'page'=>1, 'search' => $allProduct['name']]) }}">{{ $allProduct['name'] }}</a>
        @endforeach
        <p class="d-none">No Result for "<span></span>"</p>
    </div>
</div>
@endif

@if(isset($hasDropdown) && isset($dropdownItems))
<div class="dropdown-container d-none">
    <div id="myDropdown" class="dropdown-content">
        @foreach($dropdownItems as $dropdownItem)
            <a href="#" data-id="{{ $dropdownItem['id'] }}">{{ $dropdownItem['name'] }}</a>
        @endforeach
        <p class="d-none">No Result for "<span></span>"</p>
    </div>
</div>
@endif

<script type="text/javascript">
    $(function() {
        var hasDropdown = "<?= isset($hasDropdown) ? ($hasDropdown ?? false) : false ?>";
        var dropdownItems = "<?= isset($dropdownItems) ? 'true' : 'false' ?>";
        
        if( hasDropdown !== "" && hasDropdown == "true") {
            // Add the focus event handler
            $('.input-search').on('focus', 'input', function() {
                $('.dropdown-container').toggleClass('d-none');
            });

            // Add the blur event handler
            $('.input-search').on('blur', 'input', function() {
                setTimeout(() => {
                    $('.dropdown-container').toggleClass('d-none');
                }, 300);
            });

            $('.input-search').on('keyup', 'input', function() {
                var input, filter, ul, li, a, i, hiddenItems = 0;
                input = $(this).val();
                filter = input.toUpperCase();
                div = document.getElementById("myDropdown");
                a = div.getElementsByTagName("a");

                console.log(dropdownItems);
                for (i = 0; i < a.length; i++) {
                    txtValue = a[i].textContent || a[i].innerText;

                    if(dropdownItems !== "" && dropdownItems == "true") {
                        txtValue = txtValue.split(' (')[0];
                    }

                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                    } else {
                        hiddenItems += 1
                        a[i].style.display = "none";
                    }
                }

                if( hiddenItems == a.length ) {
                    $('#myDropdown p').removeClass('d-none');
                    $('#myDropdown p').find('span').text(input);
                } else {
                    $('#myDropdown p').addClass('d-none');
                }
            });
        }

        $('.dropdown-content').on('click', '.result-item', function(){
            console.log('test');
        });
    });
</script>