@extends('theme::layouts.app')

@section('content')
<div class="page-container product-container">
    <x-page-content-heading 
        heading="eCommerce - Products" 
        withButton="true"
        withIcon="true"
        icon="plus"
        toggle=""
        buttonModalTarget=""
        buttonType="button"
        buttonId="add-product_btn"
        buttonTitle=""
        withCustomDropdown="true"
    />
    <div class="row mt-4">
        <div class="col-xxl-12 main-tab-nav product-container">
            <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4" role="tablist">
                <li class="nav-item" role="presentation" style="border-left-style: none;">
                    <a class="nav-link {{ $tab == 'all' ? 'active' : '' }}" role="tab" data-bs-toggle="tab" href="#" data-url="{{ route('wave.user.admin-main.products', ['tab'=>'all', 'page'=>1]) }}">ALL</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $tab == 'available' ? 'active' : '' }}" role="tab" data-bs-toggle="tab" href="#" data-url="{{ route('wave.user.admin-main.products', ['tab'=>'available', 'page'=>1]) }}">AVAILABLE</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $tab == 'disabled' ? 'active' : '' }}" role="tab" data-bs-toggle="tab" href="#" data-url="{{ route('wave.user.admin-main.products', ['tab'=>'disabled', 'page'=>1]) }}">ARCHIVED</a>
                </li>
            </ul>
            <div class="tab-content pt-2">
                <div id="tab-1" class="tab-pane {{ $tab == 'all' ? 'active' : '' }}" role="tabpanel">
                    <x-product-list :productList="$list" :productCategories="$product_categories" :productTags="$product_tags" :tab="$tab" :allProducts="$all_products" container="all-product_container"/>
                </div>
                <div id="tab-2" class="tab-pane {{ $tab == 'available' ? 'active' : '' }}" role="tabpanel">
                    <x-product-list :productList="$available_products" :productCategories="$product_categories" :productTags="$product_tags" :tab="$tab" :allProducts="$all_products" container="available-product_container"/>
                </div>
                <div id="tab-3" class="tab-pane {{ $tab == 'disabled' ? 'active' : '' }} " role="tabpanel">
                    <x-product-list :productList="$archived_products" :productCategories="$product_categories" :productTags="$product_tags" :tab="$tab" :allProducts="$all_products" container="archived-product_container"/>
                </div>
            </div>
        </div>
    </div>
</div>

<x-add-product :productCategories="$product_categories" :tags="$product_tags" :tab="$tab"/>

<!-- Add/Update Information Modal -->
<div class="modal fade product-info-modal" role="dialog" tabindex="-1" id="product-info-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body p-4">
                <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4" role="tablist">
                    <li class="nav-item" role="presentation" style="border-left-style: none;">
                        <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#modal-info-tab-1">INFORMATION</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-bs-toggle="tab" href="#modal-info-tab-2">IMAGES</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-bs-toggle="tab" href="#modal-info-tab-3">PRICING</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-bs-toggle="tab" href="#modal-info-tab-4">INVENTORY</a>
                    </li>
                </ul>
                <div class="tab-content pt-2">
                    <div id="modal-info-tab-1" class="tab-pane active course-enrollment-tab" role="tabpanel">
                        <h2>Information</h2>
                        <form id="information-form">
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <x-form-input 
                                    label="Product Name" 
                                    type="text" 
                                    name="name"
                                    placeholder=""
                                    id="name"
                                    isRequired="true"
                                />
                            </div>
                            <div class="container mb-3" style="padding: 0px;color: #636363">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label class="form-label" style="color: #636363;font-size: 14px;">Description <span class="text-danger">*</span></label>
                                        <textarea name="description" class="form-control" placeholder="Description..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <x-form-select
                                    label="Categories" 
                                    name="product_category_id"
                                    id="product_category_id"
                                    isRequired="true"
                                >
                                    <option value="" hidden>Select Category</option>
                                    @foreach($product_categories as $category)
                                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                    @endforeach
                                </x-form-select>
                            </div>
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <x-tag-input-field
                                    label="Tags"
                                    name="tags"
                                />
                            </div>

                            <div class="container mb-3" style="padding: 0px;color: #636363">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label class="form-label" style="color: #636363;font-size: 14px;">Specification </label>
                                        <textarea name="specification" class="form-control" placeholder="Specification..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="mt-4 d-flex gap-3">
                            <x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target=""/>
                            <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                        </div>
                    </div>
                    <div id="modal-info-tab-2" class="tab-pane" role="tabpanel">
                        <h2>Images</h2>
                        <form id="image-form">
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <x-custom-image-upload />
                            </div>
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <div class="image-preview-list">
                                    <span></span>
                                    <span>Image</span>
                                    <span>Position</span>
                                    <span>Cover</span>
                                    <span></span>
                                </div>
                            </div>
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <ul id="sortable"></ul>
                            </div>
                        </form>
                        <div class="mt-4 d-flex gap-3">
                            <x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target=""/>
                            <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                        </div>
                    </div>
                    <div id="modal-info-tab-3" class="tab-pane" role="tabpanel">
                        <h2>Pricing</h2>
                        <form id="pricing-form">
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <x-form-input 
                                    label="Unit Price" 
                                    type="number" 
                                    name="price"
                                    placeholder="0.00"
                                    id="price"
                                    isRequired="true"
                                />
                                <x-form-input 
                                    label="Per" 
                                    type="number" 
                                    name="per"
                                    placeholder="0"
                                    id="per"
                                    isRequired="false"
                                />
                            </div>
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <x-form-input 
                                    label="Tax Included Price" 
                                    type="number" 
                                    name="tax_included_price"
                                    placeholder="0.00"
                                    id="tax_included_price"
                                    isRequired="true"
                                />
                            </div>
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <x-form-input 
                                    label="Tax Excluded Price" 
                                    type="number" 
                                    name="tax_excluded_price"
                                    placeholder="0.00"
                                    id="tax_excluded_price"
                                    isRequired="true"
                                />
                            </div>
                        </form>
                        <div class="mt-4 d-flex gap-3">
                            <x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target=""/>
                            <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                        </div>
                    </div>
                    <div id="modal-info-tab-4" class="tab-pane" role="tabpanel">
                        <h2>Inventory</h2>
                        <form id="inventory-form">
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <div class="col-4 position-relative current-quantity">
                                    <x-form-input 
                                        label="Current Quantity" 
                                        type="number" 
                                        name="current_quantity"
                                        placeholder="0"
                                        id="current_quantity"
                                        isRequired="false"
                                        disabled="true"
                                    />
                                    <p for="">ITEMS</p>
                                </div>
                            </div>
                            <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                                <div class="col-6">
                                    <x-form-input 
                                        label="Quantity" 
                                        type="number" 
                                        name="quantity"
                                        placeholder="0"
                                        id="quantity"
                                        isRequired="true"
                                    />
                                </div>
                                <div class="col-3 quantity-btn">
                                    <div class="increase-quantity-btn" data-type="plus"><x-svg-icon icon="plus" /></div>
                                    <div class="deduct-quantity-btn" data-type="minus"><x-svg-icon icon="minus" /></div>
                                </div>
                                
                            </div>
                        </form>
                        <div class="mt-4 d-flex gap-3">
                            <x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target=""/>
                            <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    /* Basic styling for the tags input */
    .tags-input {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        min-height: 40px;
        width: 100%;
        background-color: #f5f5f5;
    }

    /* Styling for each tag */
    .tag {
        background-color: #E8E8E8;
        border: 1px solid #E8E8E8;
        color: #3B3B3B;
        padding: 6px 10px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        margin-right: 8px;
    }

    /* Remove button inside each tag */
    .tag .remove {
        margin-left: 8px;
        cursor: pointer;
    }

    /* Input field styling */
    .tag-input {
        flex-grow: 1;
        border: none;
        outline: none;
        padding: 6px;
        margin: 0;
        --tw-ring-shadow: none !important;
        background-color: #f5f5f5;
    }

    /* Basic styling for Drag and Drop Image */
    .drop-area {
        border: 2px dashed #ccc;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        background-color: #f5f5f5;
        border-radius: 8px;
    }

    .drop-area i {
        font-size: 30px;
    }

    .image-preview {
        display: flex;
        flex-wrap: wrap;
        margin-top: 20px;
        gap: 15px;
    }

    .preview-container {
        position: relative;
        width: 100px;
        height: 100px;
        border: 1px solid #f5f5f5;
        overflow: hidden;
        border-radius: 8px;
    }

    .preview-container img {
        object-fit: cover;
        height: 100%;
    }

    .remove-image {
        position: absolute;
        top: 34%;
        right: 34%;
        cursor: pointer;
        background-color: #fff;
        font-weight: bold;
        padding: 9px 9px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .autocomplete-items {
        position: absolute;
        bottom: 55px;
        left: 0;
        width: 100%;
        background: #fff;
        padding: 16px;
        border: 1px solid #f5f5f5;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    .autocomplete-items div {
        cursor: pointer;
    }

    .active-quantity-btn {
        background-color: #D5D4D4 !important;
    }
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection

@section('script')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript">
    $(function() {
        var newImagePosition = [];
        var tagList = <?= json_encode($product_tags ?? []) ?>;
        var tags = tagList.map(function(value){
            return value.name;
        })

        var quantityButtonsType = "";

        $( "#sortable" ).sortable({
            update: function( event, ui ) {
                updateImagePositions();
            },
            axis: "y"
        });

        // Initialize autocomplete tag input field
        autocomplete(document.getElementById("information-form").querySelector("#myInput"), tags, '#information-form');
        
        $('#add-product_btn').on('click', function(){
            $(".add-product-container").removeClass('d-none');

            window.previewAction = "add";
            window.selectedImages = [];
            window.productTags = [];

            $('.add-product-container #product-form input').removeClass('border border-danger');
            $('.add-product-container #product-form textarea').removeClass('border border-danger');
            $('.add-product-container #product-form select').removeClass('border border-danger');
            $('.add-product-container #product-form .drop-area').removeAttr('style');

            if($('.add-product-container #product-form input').next().is('p'))
                $('.add-product-container #product-form input').next('p').remove();

            if($('.add-product-container #product-form textarea').next().is('p'))
                $('.add-product-container #product-form textarea').next('p').remove();

            if($('.add-product-container #product-form select').next().is('p'))
                $('.add-product-container #product-form select').next('p').remove();

            if($('.add-product-container #product-form .drop-area').next().is('p'))
                $('.add-product-container #product-form .drop-area').next('p').remove();
        });

        window.productTags = [];

        $('.tags-input').on('keydown', '.tag-input', function(event){
            if (event.key === 'Enter' || event.key === ',') {
                event.preventDefault();

                const tagInput = $(this);
                const tagsContainer = $(this).parent();
                const tagText = tagInput.val().trim();

                if (tagText !== '' && !window.productTags.includes(tagText)) {
                    const tagElement = `<div class="tag">${tagText} <span class="remove-tag pl-2" data-name="${tagText}">x</span></div>`;
                    $(this).parent().prepend(tagElement);

                    window.productTags.push({
                        name: tagText
                    });

                    // Clear the input
                    tagInput.val('');
                }
            }
        });

        $('.tags-input').on('click', '.remove-tag', function(){
            const tagName = $(this).data('name');

            const tagIndex = window.productTags.findIndex(value => value.name == tagName);
            window.productTags.splice(tagIndex, 1);
            
            $(this).closest('.tag').remove();
        });

        // For Image Upload
        // Script for Drag and Drop Image
        var dropArea = $('.drop-area');
        var fileInput = $('.file-input');
        var imagePreview = $('.image-preview');
         window.selectedImages = [];

        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.on(eventName, preventDefaults);
            $(document).on(eventName, preventDefaults);
        });

        // Highlight drop area when dragging over
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.on(eventName, highlight);
        });

        // Unhighlight drop area when dragging leaves
        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.on(eventName, unhighlight);
        });

        $(".browse_image").on('click', function(){
            $(this).parent().next().click();
            // $('.file-input').click();
        });

        // Handle dropped files
        dropArea.on('drop', function (e) {
            var dt = e.originalEvent.dataTransfer;
            var files = dt.files;

            handleFiles(files);
        });

        // Listen for file input changes
        fileInput.on('change', function () {
            var files = this.files;
            handleFiles(files);

            // Clear the file input
            $(this).val('');
        });

        // Function to prevent default drag behaviors
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // Function to highlight drop area
        function highlight() {
            dropArea.addClass('highlight');
        }

        // Function to unhighlight drop area
        function unhighlight() {
            dropArea.removeClass('highlight');
        }

        // Function to handle selected files
        function handleFiles(files) {
            var fileList = Array.from(files);

            fileList.forEach(previewImage);
        }

        // Function to preview image
        function previewImage(file) {
            if (file.type.startsWith('image/')) {
                var reader = new FileReader();

                if(window.previewAction == 'add') {
                    reader.onload = function (e) {
                        var previewContainer = $('<div class="preview-container"></div>');
                        var removeButton = $(`<span class="remove-image" data-name="${file.name}"><i class="fa-solid fa-trash"></i></span>`);

                        var img = new Image();
                        img.src = e.target.result;

                        // removeButton.click(function () {
                        //     removeImage(file.name);
                        //     previewContainer.remove();
                        // });

                        previewContainer.append(img);
                        previewContainer.append(removeButton);

                        imagePreview.append(previewContainer);

                        // Store the selected image data
                        window.selectedImages.push({
                            name: file.name,
                            type: file.type,
                            data: e.target.result.split(',')[1] // Base64-encoded data
                        });
                    };

                    reader.readAsDataURL(file);
                }

                if(window.previewAction == 'edit') {
                    reader.onload = function (e) {
                        const element = `<li class="ui-state-default" data-id="0" data-data="${e.target.result.split(',')[1]}" data-index="${window.selectedImages.length+1}">
                            <i class="fa-solid fa-grip-vertical"></i> 
                            <div>
                                <img src="${e.target.result}" alt="">
                            </div>
                            <span class="position">${window.selectedImages.length + 1}</span>
                            <input type="radio" name="is_cover" value="1"}>
                            <span class="remove-btn" data-index="${window.selectedImages.length+1}"><x-svg-icon icon="trash" /></span>
                        </li>`;

                        $('#image-form #sortable').append(element);

                        // Store the selected image data
                        window.selectedImages.push({
                            name: file.name,
                            type: file.type,
                            data: e.target.result.split(',')[1] // Base64-encoded data
                        });
                    };

                    reader.readAsDataURL(file);
                }
            }
        }

        $('.image-upload-container').on('click', '.remove-image', function(){
            const fileName = $(this).data('name');

            window.selectedImages = window.selectedImages.filter(function (img) {
                return img.name !== fileName;
            });

            $(this).parent().remove();
        });

        $('#image-form #sortable').on('click', '.remove-btn', function(){
            const imageDataIndex = $(this).data('index');

            window.selectedImages.splice(imageDataIndex-1, 1);

            $(`#image-form #sortable [data-index="${imageDataIndex}"]`).remove();
        })

        // For changing the tab
        $('.main-tab-nav .nav-tabs').on('click', '.nav-link', function(){
            const url = $(this).data('url');

            window.location.href = url;
        });

        $('#modal-info-tab-1').on('click', '#save-form_btn', async function(){
            $(this).attr('disabled', 'true');

            // get user token
            const userToken = getUserToken();

            // Prepare Data
            const formData = $('#information-form').serializeArray();

            const requiredFields = [
                'name', 'description', 'product_category_id'
            ];

            if( processErrorValidation(formData, requiredFields) ) {
                $(this).removeAttr('disabled');

                return;
            }

            updateImagePositions();

            let transformedData = {};

            const excludeFields = ['tags'];
            formData.forEach(function(item) {
                if (! excludeFields.includes( item.name ) )
                    transformedData[item.name] = item.value;
            });
            
            selectedProduct.name = transformedData['name'];
            selectedProduct.description = transformedData['description'];
            selectedProduct.specification = transformedData['specification'];
            selectedProduct.product_category_id = transformedData['product_category_id'];
            selectedProduct.product_images = window.selectedImages;
            selectedProduct.product_tags = window.productTags;
            selectedProduct.new_image_positions = newImagePosition;

            await axios.post(`${getApiUrl()}/product/update`, selectedProduct, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
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

        $('#modal-info-tab-2').on('click', '#save-form_btn', async function(){
            $(this).attr('disabled', 'true');

            // get user token
            const userToken = getUserToken();

            // Prepare Data
            const formData = $('#image-form').serializeArray();

            const requiredFields = [];

            if( processErrorValidation(formData, requiredFields) ) {
                $(this).removeAttr('disabled');

                return;
            }

            updateImagePositions();
            
            selectedProduct.product_images = window.selectedImages;
            selectedProduct.new_image_positions = newImagePosition;
            selectedProduct.product_tags = window.productTags;

            await axios.post(`${getApiUrl()}/product/update`, selectedProduct, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
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

        $('#modal-info-tab-3').on('click', '#save-form_btn', async function(){
            $(this).attr('disabled', 'true');

            // get user token
            const userToken = getUserToken();

            // Prepare Data
            const formData = $('#pricing-form').serializeArray();

            const requiredFields = [
                'price', 'tax_included_price', 'tax_excluded_price'
            ];

            if( processErrorValidation(formData, requiredFields) ) {
                $(this).removeAttr('disabled');

                return;
            }

            updateImagePositions();

            let transformedData = {};

            const excludeFields = ['tags'];
            formData.forEach(function(item) {
                if (! excludeFields.includes( item.name ) )
                    transformedData[item.name] = item.value;
            });

            selectedProduct.price = parseFloat(transformedData['price']).toFixed(2);
            selectedProduct.tax_included_price = transformedData['tax_included_price'];
            selectedProduct.tax_excluded_price = transformedData['tax_excluded_price'];
            selectedProduct.product_images = window.selectedImages;
            selectedProduct.product_tags = window.productTags;
            selectedProduct.new_image_positions = newImagePosition;
            
            await axios.post(`${getApiUrl()}/product/update`, selectedProduct, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
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

        $('#modal-info-tab-4').on('click', '#save-form_btn', async function(){
            $(this).attr('disabled', 'true');

            // get user token
            const userToken = getUserToken();

            // Prepare Data
            const formData = $('#inventory-form').serializeArray();

            const requiredFields = ['quantity'];

            if( processErrorValidation(formData, requiredFields) ) {
                $(this).removeAttr('disabled');

                return;
            }

            updateImagePositions();

            let transformedData = {};

            const excludeFields = ['current_quantity'];
            formData.forEach(function(item) {
                if (! excludeFields.includes( item.name ) )
                    transformedData[item.name] = item.value;
            });

            let newQuantity = selectedProduct.quantity;
            if( quantityButtonsType == 'minus' && transformedData['quantity'] != 0 )
                newQuantity = parseInt(selectedProduct.quantity) - parseInt(transformedData['quantity']);

            if( quantityButtonsType == 'plus' && transformedData['quantity'] != 0 )
                newQuantity = parseInt(selectedProduct.quantity) + parseInt(transformedData['quantity']);

            selectedProduct.quantity = newQuantity;
            selectedProduct.product_images = window.selectedImages;
            selectedProduct.product_tags = window.productTags;
            selectedProduct.new_image_positions = newImagePosition;
            
            await axios.post(`${getApiUrl()}/product/update`, selectedProduct, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
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

        $('#inventory-form').on('click', '.increase-quantity-btn', function(){
            const inventoryActionType = $(this).data('type');

            quantityButtonsType = inventoryActionType;

            $('#inventory-form .deduct-quantity-btn').removeClass('active-quantity-btn');
            $('#inventory-form .increase-quantity-btn').addClass('active-quantity-btn');
        });

        $('#inventory-form').on('click', '.deduct-quantity-btn', function(){
            const inventoryActionType = $(this).data('type');

            quantityButtonsType = inventoryActionType;

            $('#inventory-form .deduct-quantity-btn').addClass('active-quantity-btn');
            $('#inventory-form .increase-quantity-btn').removeClass('active-quantity-btn');
        });

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

        var selectedProductIDs = [];
        $(".page-header .dropdown-menu").on('click', '.dropdown-item', async function(e){
            e.preventDefault();

            const userToken = getUserToken();

            const value = $(this).data("value");
            
            if(! window.product_selected_from ) {
                toastInfo("Warning", "You must select atleast 1 Product.", "warning");
                return;
            }

            const productCheckboxes = $(`.${window.product_selected_from} .product-grid input[name=products_checkbox]`);
            selectedProductIDs = [];
            productCheckboxes.each(function(){
                if( $(this).is(':checked') )
                    selectedProductIDs.push({id: $(this).data('id') });
            });

            await axios.post(`${getApiUrl()}/product/generate-excel`, selectedProductIDs, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        const filePath = res.data.file_path;
                        const a = document.createElement('a');
                        a.href = filePath;
                        a.download = res.data.filename;
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);

                        removeExcelFile(res.data.filename);

                        $(this).removeAttr('disabled');
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

                    console.error('Error fetching data:', error);
                });
        });

        async function removeExcelFile(filename)
        {
            const userToken = getUserToken();

            await axios.delete(`${getApiUrl()}/product/remove-excel/${filename}`, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + userToken
                }
            })
        }
    });
</script>
@endsection