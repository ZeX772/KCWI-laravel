<div class="add-product-container d-none">
    <div class="add-product-card">
        <div class="product-card-title">
            <h2>Add Product</h2>
        </div>
        <div class="product-card-body">
            <form id="product-form">
                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                    <x-form-input 
                        label="Product Name" 
                        type="text" 
                        name="name"
                        placeholder="Protein Powder"
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
                        @foreach( $productCategories as $category )
                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </x-form-select>
                </div>
                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                    <x-form-input 
                        label="Quantity" 
                        type="number" 
                        name="quantity"
                        placeholder="10"
                        id="quantity"
                        isRequired=true
                    />
                </div>
                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-5">
                    <x-form-input 
                        label="Price" 
                        type="number" 
                        name="price"
                        placeholder="1.00"
                        id="price"
                        isRequired=true
                    />
                    <x-form-input 
                        label="Discount" 
                        type="number" 
                        name="discount_percentage"
                        value="0"
                        placeholder="0.05"
                        id="discount_percentage"
                        isRequired=false
                    />
                </div>
                <div class="container form-input-container mb-3">
                    <x-custom-image-upload />
                </div>
                
                <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                    <x-tag-input-field
                        label="Tags"
                        name="tags"
                        :productTags="$tags"
                    />
                </div>
                <div class="container mb-3" style="padding: 0px;color: #636363">
                    <div class="form-inline">
                        <div class="form-group">
                            <label class="form-label" style="color: #636363;font-size: 14px;">Specification </span></label>
                            <textarea name="specification" class="form-control" placeholder="Specification..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <div class="product-card-footer d-flex gap-4 mt-3" style="border-top-style: none;">
                <x-primary-button type="button" color="primary" id="{{$tab}}-save-btn" title="Save" toggle="" target=""/>
                <x-secondary-button type="button" id="cancel-btn" title="Cancel"/>
            </div>
        </div>
    </div>
</div>

<style>
    .add-product-container {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: #00000047;
        display: flex;
        justify-content: flex-end;
    }

    .add-product-card {
        position: relative;
        width: 400px;
        height: 100%;
        z-index: 99999;
        padding: 3.5rem 1rem !important;
        background: #fff;
        overflow-y: auto;
    }

    .product-card-title h2 {
        font-size: 28px;
        font-weight: 500;
        letter-spacing: 0em;
    }
</style>

<script type="text/javascript">
    var tabAction = "<?= $tab ?>";
    // Initialize autocomplete tag input field
    autocomplete(document.getElementById("product-form").querySelector("#myInput"), tags, '#product-form');

    $(".add-product-container").on('click', '#cancel-btn', function(){
        $(".add-product-container").addClass('d-none');
    });

    $('.add-product-container').on('click', `#${tabAction}-save-btn`, async function(){
        $(this).attr('disabled', 'true');
        console.log('test');
        // get user token
        const userToken = getUserToken();

        // Prepare Data
        const formData = $('#product-form').serializeArray();

        const requiredFields = [
            'name', 'description', 'product_category_id',
            'quantity', 'price'
        ];

        if( processErrorValidation(formData, requiredFields) ) {
            $(this).removeAttr('disabled');

            return;
        }

        let transformedData = {};

        const excludeFields = ['tags'];
        formData.forEach(function(item) {
            if (! excludeFields.includes( item.name ) )
                transformedData[item.name] = item.value;
        });

        transformedData['product_images'] = window.selectedImages;
        transformedData['product_tags'] = window.productTags;
        transformedData['product_category_id'] = Number(transformedData['product_category_id']);
        transformedData['price'] = parseFloat(transformedData['price']).toFixed(2);
        transformedData['discount_percentage'] = parseFloat(transformedData['discount_percentage']).toFixed(2);

async function uploadToBunnyCDN(file) {
    const storageZoneName = BUNNYCDN_STORAGE_ZONE;
    const accessKey = BUNNYCDN_API_KEY;
    const targetPath = `${TARGET_FOLDER}${file.name}`;
    const url = `https://storage.bunnycdn.com/${storageZoneName}/${targetPath}`;

    const response = await fetch(url, {
        method: 'PUT',
        headers: {
            'AccessKey': accessKey,
            'Content-Type': 'application/octet-stream',
        },
        body: file
    });

    if (response.ok) {
        const cdnUrl = `${BUNNYCDN_URL}/${targetPath}`;
        return cdnUrl;
    } else {
        throw new Error('Failed to upload image to BunnyCDN');
    }
}

async function uploadImages() {
    const imageFiles = window.selectedImages; // Assuming this is a FileList or an array of File objects
    const uploadedImageUrls = [];

    for (const file of imageFiles) {
        try {
            const cdnUrl = await uploadToBunnyCDN(file);
            uploadedImageUrls.push(cdnUrl);
        } catch (error) {
            console.error('Error uploading file:', file.name, error);
        }
    }

    return uploadedImageUrls;
}

(async () => {
    try {
        const uploadedUrls = await uploadImages();
        transformedData['product_images'] = uploadedUrls;
        // Continue with the rest of your code to handle transformedData
    } catch (error) {
        console.error('Error uploading images:', error);
    }
})();

        await axios.post(`${getApiUrl()}/product/add`, transformedData, {
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

        if( selectedImages.length <= 0 )
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
</script>