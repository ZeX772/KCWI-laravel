<div class="row pl-3 pr-3">
    <!-- Table List -->
    <div class="col-12 page-content-col {{ $container ?? '' }}">
        <div class="tab-content p-5 pt-4 pb-4">
            <div class="row available-product-tab custom-filter-tab">
                <div class="col-11 position-relative">
                    {{-- <x-search-input
                        inputType="text"
                        inputName="student_search"
                        inputID="staff-search"
                        inputPlaceholder="Search..."
                        hasDropdown="true"
                        :tab="$tab"
                        :allProducts="$allProducts"
                    /> --}}
                </div>
                <div class="col-1">
                    <!-- <x-form-select
                        label="" 
                        name="action"
                        id="action_btn"
                        isRequired="true"
                    >
                        <option value="" hidden>Actions</option>
                        <option value="bulk-delete">Bulk Archived</option>
                    </x-form-select> -->
                    <div class="dropdown custon-dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-popper-placement="bottom-end">
                            Actions
                        </button>
                        <ul class="dropdown-menu" data-popper-placement="bottom-end" style="position: absolute; left: -70px; top: 30px;">
                            <li>
                                <a href="" class="dropdown-item overflow-hidden" data-value="bulk-unarchive" style="text-overflow: ellipsis" data-id="">
                                    <span>
                                        <i class="fa-solid fa-trash-arrow-up"></i>
                                    </span>
                                    <span class="ms-2">Unarchive Items</span>
                                </a>
                            </li>
                            <li>
                                <hr>
                                <a href="" class="dropdown-item overflow-hidden text-danger" data-value="bulk-delete" style="text-overflow: ellipsis" data-id="">
                                    <span>
                                        <x-svg-icon icon="delete" />
                                    </span>
                                    <span class="ms-2">Archive Items</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="products-container pt-4">
                @if( count($productList['data']) > 0 )
                    <div class="product-grid">
                        @foreach($productList['data'] as $key => $list)
                            <x-product-card :data="$list" :tab="$tab" :container="$container"/>
                        @endforeach
                    </div>
                @else
                    <p>No Archived Products</p>
                @endif
            </div>
            <x-custom-pagination :productData="$productList" :tab="$tab" />
        </div>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade {{ $container ?? '' }}" role="dialog" tabindex="-1" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="heading text-danger">Archive Confirmation</p>
                <p class="sub-heading text-secondary">
                    Are you sure you want to archive this <span>3</span>
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" id="process-archive" title="Yes" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Unarchive Confirmation -->
<div class="modal fade {{ $container ?? '' }}" role="dialog" tabindex="-1" id="unarchive-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="heading text-warning mb-3" style="font-size: 20px;font-family: Poppins, sans-serif;">Unarchive Confirmation</p>
                <p class="sub-heading">
                    Are you sure you want to archive this <span>3</span>
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal" />
                <x-primary-button type="button" id="process-unarchive" title="Yes" toggle="" target="" />
            </div>
        </div>
    </div>
</div>

<style>
    .products-container .product-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 22px; /* Adjust the gap between items as needed */
    }

    .products-container .product-grid .product-card {
        /* Add styling for each product item */
        border: 1px solid #E8E8E8;
        text-align: center;
        border-radius: 8px;
    }

    .products-container .product-grid .product-card .product-body {
        max-height: 229px;
        overflow: hidden;
    }

    .products-container .product-grid .product-card .product-body img {
        object-fit: cover;
        width: 100%;
        height: auto;
    }

    .products-container .product-grid .product-card .product-footer p {
        font-size: 15px;
        font-weight: 400;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
        color: #233656;
    }

    .products-container .product-grid .product-card .product-footer span {
        font-size: 14px;
        font-weight: 400;
        line-height: 21px;
        letter-spacing: 0px;
        text-align: left;
        color: #7A7A7A;
    }

    /* Custom Pagination */
    .custom-pagination .pagination-info {
        display: flex;
        align-items: center;
    }
    .custom-pagination .pagination-buttons {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    /* Search Input */
    .dropdown-container {
        width: 100%;
        position: absolute;
        padding-right: 1.5rem;
    }

    .dropdown-content {
        width: 100%;
        background-color: #FFFFFF;
        overflow: auto;
        border: 1px solid #ddd;
        z-index: 1;
        box-shadow: 0px 16px 50px 0px #58585833;
        border-radius: 8px;
    }

    .dropdown-content a,
    .dropdown-content p {
        color: #636363;
        font-size: 14px;
        font-weight: 400;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #F5F5F5;
    }

    .product-info-modal .modal-body {
        min-height: 500px;
    }

    #modal-info-tab-1 h2,
    #modal-info-tab-2 h2,
    #modal-info-tab-3 h2,
    #modal-info-tab-4 h2 {
        font-size: 28px;
        font-weight: 500;
        padding: 20px 0;
    }

    #sortable { 
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 100%;
        display: flex;
        gap: 8px;
        flex-direction: column;
    }
    #sortable li { 
        padding: 1em;
        border-radius: 8px;
        background-color: #fff;
        display: grid;
        grid-template-columns: 5% 30% 30% 30% 5%;
        align-items: center;
    }
    #sortable li div {
        width: 74px;
        height: 74px;
        border-radius: 8px;
        border: 1px solid #c5c5c5;
        overflow: hidden; 
    }
    #sortable li div img {
        height: 100%;
        width: 150px;
        object-fit: cover;
    }

    .image-preview-list {
        width: 100%;
        display: grid;
        grid-template-columns: 9% 23% 30% 30% 5%;
    }

    .current-quantity p {
        position: absolute;
        font-size: 14px;
        right: 10px;
        top: 46px;
        font-weight: 900;
    }

    .quantity-btn {
        display: flex;
        gap: 15px;
        padding-top: 31px;
    }

    .quantity-btn div {
        border: 2px solid #f5f5f5;
        padding: 15px;
        border-radius: 8px;
    }
</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
    var selectedProduct = {};
    var newImagePosition = [];
    
    function dragStart(event) {
        event.dataTransfer.setData("text/plain", event.target.dataset.position);
    }

    function allowDrop(event) {
        event.preventDefault();
    }

    function drop(event) {
        event.preventDefault();
        const draggedPosition = event.dataTransfer.getData("text/plain");
        const droppedPosition = event.target.dataset.position;

        // Swap positions
        const draggedElement = document.querySelector(`[data-position="${draggedPosition}"]`);
        const droppedElement = document.querySelector(`[data-position="${droppedPosition}"]`);

        const parent = draggedElement.parentNode;

        const draggedIndex = Array.from(parent.children).indexOf(draggedElement);
        const droppedIndex = Array.from(parent.children).indexOf(droppedElement);

        parent.insertBefore(draggedElement, droppedElement);

        // Update data-position attributes
        draggedElement.dataset.position = droppedPosition;
        droppedElement.dataset.position = draggedPosition;
    }

    $('.product-grid').on('click', '.open-modal', function(){
        window.previewAction = "edit";

        const productId = $(this).data('id');

        const products = <?= json_encode($productList['data']) ?>;

        const product = products.find(value => value.id == productId);

        if( product ) {
            selectedProduct = product;

            // Product Information Form
            $('#information-form input[name=name]').val(product.name);
            $('#information-form [name=description]').val(product.description);
            $('#information-form select[name=product_category_id]').val(product.product_category_id);

            $("#information-form .tags-input .tag").remove()

            window.productTags = product.tags.map(function(tag){
                const tagElement = `<div class="tag">${tag.name} <span class="remove-tag pl-2" data-name="${tag.name}">x</span></div>`;
                $("#information-form .tags-input").prepend(tagElement);

                return {name: tag.name};
            });

            // Product Image Form
            window.selectedImages = product.images.sort((a, b) => a.position - b.position);
            $('#image-form #sortable').empty();
            // window.selectedImages.sort((a, b) => a.position - b.position);
            window.selectedImages.forEach(function(image, key){
                const element = `<li class="ui-state-default" data-id="${image.id}" data-data="0" data-index="${key+1}">
                    <i class="fa-solid fa-grip-vertical"></i> 
                    <div>
                        <img src="${image.image_path}" alt="">
                    </div>
                    <span class="position">${image.position}</span>
                    <input type="radio" name="is_cover" value="${image.id}" ${image.is_cover ? 'checked' : ''}>
                    <span class="remove-btn" data-index="${key+1}"><x-svg-icon icon="trash" /></span>
                </li>`;

                $('#image-form #sortable').append(element);
            });

            // Product Pricing Form
            $('#pricing-form input[name=price]').val(product.price);
            $('#pricing-form input[name=tax_included_price]').val(product.tax_included_price);
            $('#pricing-form input[name=tax_excluded_price]').val(product.tax_excluded_price);

            // Product Inventory Form
            $('#inventory-form input[name=quantity]').val(0);
            $('#inventory-form input[name=current_quantity]').val(product.quantity);
        }
    });

    // var selectedProductIDs = [];
    // $('.available-product-tab').on('change', '#action_btn', function(){
    //     const currentValue = $(this).val();

    //     if( currentValue != '' ) {

    //         if( currentValue == 'bulk-delete' ) {
    //             // get the selected products
    //             const productCheckboxes = $(".product-grid input[name=products_checkbox]");
    //             selectedProductIDs = [];
    //             productCheckboxes.each(function(){
    //                 if( $(this).is(':checked') )
    //                     selectedProductIDs.push({id: $(this).data('id') });
    //             });

    //             if( selectedProductIDs.length <= 0 ) {
    //                 toastInfo("Warning", "You must select atleast 1 Product.", "warning");
    //             } else {
    //                 $('#delete-modal').modal('show');
    //             }
    //         }
            
    //         $(this).val("");
    //     }
    // })

    var selectedProductIDs = [];
    $(".{{ $container ?? '' }} .custom-filter-tab").on('click', '.dropdown-item', async function(e){
        e.preventDefault();

        const currentValue = $(this).data('value');

        if( currentValue != '' ) {
            // get the selected products
            const productCheckboxes = $(".{{ $container ?? '' }} .product-grid input[name=products_checkbox]");
            selectedProductIDs = [];
            productCheckboxes.each(function(){
                if( $(this).is(':checked') )
                    selectedProductIDs.push({id: $(this).data('id') });
            });

            if( selectedProductIDs.length <= 0 ) {
                toastInfo("Warning", "You must select atleast 1 Product.", "warning");
                return;
            }

            if( currentValue == 'bulk-delete' ) {
                $(".{{ $container ?? '' }}#delete-modal .sub-heading span").text(selectedProductIDs.length + (selectedProductIDs.length > 1 ? ' Items?' : 'Item?'));
                $(".{{ $container ?? '' }}#delete-modal").modal('show');
            }

            if( currentValue == 'bulk-unarchive' ) {
                $(".{{ $container ?? '' }}#unarchive-modal .sub-heading span").text(selectedProductIDs.length + (selectedProductIDs.length > 1 ? ' Items?' : 'Item?'));
                $(".{{ $container ?? '' }}#unarchive-modal").modal('show');
            }
        }
    });

    $(".{{ $container ?? '' }}#delete-modal").on('click', '#process-archive', async function(){
        console.log('test')
        $(this).attr('disabled', 'true');

        // get user token
        const userToken = getUserToken();
        
        await axios.post(`${getApiUrl()}/product/bulk-archive`, selectedProductIDs, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            }).then(res => {
                $('#delete-modal #cancel-btn').click();

                if ( res.data.success ) {
                    toastTopEnd("Success", res.data.message, "success");

                    window.location = window.location
                } else {
                    toastInfo("Cant' Save", res.data.message, "warning");

                    $(this).removeAttr('disabled');
                }
            })
            .catch(error => {
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
                
                console.error('Error fetching data:', error.response.data);
            });
    });

    $(".{{ $container ?? '' }}#unarchive-modal").on('click', '#process-unarchive', async function(){
        $(this).attr('disabled', 'true');

        // get user token
        const userToken = getUserToken();
        
        await axios.post(`${getApiUrl()}/product/bulk-unarchive`, selectedProductIDs, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            }).then(res => {
                $('#unarchive-modal #cancel-btn').click();

                if ( res.data.success ) {
                    toastTopEnd("Success", res.data.message, "success");

                    window.location = window.location
                } else {
                    toastInfo("Cant' Save", res.data.message, "warning");

                    $(this).removeAttr('disabled');
                }
            })
            .catch(error => {
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
                
                console.error('Error fetching data:', error.response.data);
            });
    });

    // Error Validations
    function processErrorValidation(formData, requiredFields) {
        errors = [];

        formData.forEach(function(item) {
            if ( requiredFields.includes(item.name) ) {
                if( item.value == "" ){
                    errors.push({
                        field_name: item.name,
                        message: formatString(item.name) + " is required."
                    });
                }
            }
        });

        if( window.selectedImages.length <= 0 )
            errors.push({
                field_name: 'droparea',
                message: 'Must upload image atleast 1'
            });

        if ( errors.length > 0 ) {
            renderErrors();

            return true;
        }

        return false;
    }

    function renderErrors() {
        if ( errors.length > 0 ) {
            const hasParentFields = [];

            errors.forEach((element) => {
                const fieldSelector = $(`[name="${element.field_name}"]`);
                // Clear the errors first
                fieldSelector.removeClass('border border-danger');
                fieldSelector.parent().removeClass('border border-danger');

                if ( fieldSelector.next().is('p') )
                    fieldSelector.next().remove();

                if ( fieldSelector.parent().next().is('p') )
                    fieldSelector.parent().next().remove();

                if (! hasParentFields.includes(element.field_name) ) {
                    fieldSelector.addClass('border border-danger');
                    fieldSelector.after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
                } else {
                    fieldSelector.parent().addClass('border border-danger');
                    fieldSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
                }

                if( element.field_name == 'droparea' ) {
                    $('.add-product-container #product-form .drop-area').attr('style', 'border: 2px dashed #eb1e1e;');
                    $('.add-product-container #product-form .drop-area').after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
                }
            });
        }
    }

    function formatString(inputString) {
        // Split the string into words using underscores as separators
        let words = inputString.split('_');

        // Capitalize the first letter of each word
        let capitalizedWords = words.map(word => word.charAt(0).toUpperCase() + word.slice(1));

        // Join the words back together with a space between them
        let formattedString = capitalizedWords.join(' ');

        return formattedString;
    }

    function updateImagePositions() {
        const childrens = $("#sortable").children('.ui-state-default');

        let newPosition = [];
        let position = 1;
        childrens.each(function(){
            
            newPosition.push({
                id: $(this).data('id'),
                data: $(this).data('data'),
                is_cover: $(this).find('[name="is_cover"]').is(':checked') ? 1 : 0,
                position: position
            });

            position ++;
        });

        newImagePosition = newPosition;
        console.log(newImagePosition);
    }
</script>