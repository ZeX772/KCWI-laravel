@extends('theme::layouts.app')

@section('content')
<?php
    $dropDownOptions = [
        [
            'value' => 'generate_pdf',
            'label' => 'Generate PDF'
        ]
    ];
?>

<div class="page-container">
    <x-page-content-heading 
        heading="Orders" 
        headingSpan="#790844"
        withButton="false"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#order-modal" 
        buttonType="button"
        buttonId="add-order_btn"
        buttonTitle=""
        secondBtnRoute="{{ route('wave.user.admin-main.orders') }}"
        secondButtonId="back-orders_btn"
        withIconSecondBtn="true"
        secondBtnIcon="caret-left"
        secondBtnTitle="Back to Orders"
        withDropdownBtn="true"
        dropdownBtnName="order_detail_export"
        :dropdownOptions="$dropDownOptions"
    />
    <div class="row mt-4">
        <div class="col-xxl-12 main-tab-nav">
            <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4" role="tablist">
                <li class="nav-item" role="presentation" style="border-left-style: none;">
                    <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">ORDER DETAILS</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2">PRODUCTS</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-3">INVOICE</a>
                </li>
            </ul>
            <div class="tab-content pt-2">
                <div id="tab-1" class="tab-pane active" role="tabpanel">
                    <table class="table modal-table mt-5 mb-5">
                        <thead class="border-bottom">
                            <tr>
                                <th scope="col">CUSTOMER</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">PHONE</th>
                                <th scope="col">LOCATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <span><img src="" alt=""></span>
                                        <span>{{ $order['user']['name'] }}</span>
                                    </div>
                                </td>
                                <td>{{ $order['user']['email'] }}</td>
                                <td>{{ $order['user']['student_information'] ? $order['user']['student_information']['phone'] : '-' }}</td>
                                <td>{{ $order['user']['student_information'] ? $order['user']['student_information']['address'] : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <form>
                        <div class="d-xxl-flex form-input-container gap-4 mb-3">
                            <div class="w-100">
                                <x-form-select
                                    label="Payment method" 
                                    name="payment_method"
                                    id="payment_method"
                                    isRequired="true"
                                >
                                    <option value="" hidden>Select Credit card</option>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="paypal">PayPal</option>
                                </x-form-select>
                                <p class="mt-2"><b>Transaction ID:</b> {{ $order['transaction_id'] ?? '-' }}</p>
                                <p class="mt-1"><b>Amount:</b> ${{ $order['total_amount'] }}</p>
                            </div>
                            <div class="w-100">
                                <x-form-select
                                    label="Shipping method" 
                                    name="shipping_method"
                                    id="shipping_method"
                                    isRequired="true"
                                >
                                    <option value="" hidden>Select Shipping Method</option>
                                    <option value="carrier">Carrier</option>
                                </x-form-select>
                                <p class="mt-2"><b>Tracking Code:</b> {{ $order['tracking_code'] ?? '-' }}</p>
                                <p class="mt-1"><b>Date:</b> {{ $order['order_date'] }}</p>
                            </div>
                            <x-form-select
                                label="Fulfilment status" 
                                name="fulfilment_status"
                                id="fulfilment_status"
                                isRequired="true"
                            >
                                <option value="" hidden>Select Fulfilment status</option>
                                <option value="delivered">Delivered</option>
                                <option value="shipped">Shipped</option>
                                <option value="processing">Processing</option>
                            </x-form-select>
                            <x-form-select
                                label="Payment Status" 
                                name="payment_status"
                                id="payment_status"
                                isRequired="true"
                            >
                                <option value="" hidden>Select Payment status</option>
                                <option value="shipped">Shipped</option>
                                <option value="paid">Paid</option>
                                <option value="processing">Processing</option>
                                <option value="pending">Pending</option>
                            </x-form-select>
                        </div>
                    </form>
                    <div class="card p-4 mt-5 order-details-container_addresses">
                        <h2>Billing Address</h2>
                        <dl class="row mt-3">
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">First name:</span>
                                    <span class="label-subtitle">{{ $order['billing_address'] ? $order['billing_address']['first_name'] : '-' }}</span>
                                </p>
                            </dd>
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">State/Region:</span>
                                    <span class="label-subtitle">{{ $order['billing_address'] ? $order['billing_address']['state'] : '-' }}</span>
                                </p>
                            </dd>
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">Phone:</span>
                                    <span class="label-subtitle">{{ $order['billing_address'] ? $order['billing_address']['phone'] : '-' }}</span>
                                </p>
                            </dd>

                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">Last name:</span>
                                    <span class="label-subtitle">{{ $order['billing_address'] ? $order['billing_address']['last_name'] : '-' }}</span>
                                </p>
                            </dd>
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">City:</span>
                                    <span class="label-subtitle">{{ $order['billing_address'] ? $order['billing_address']['city'] : '-' }}</span>
                                </p>
                            </dd>
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">Email:</span>
                                    <span class="label-subtitle">{{ $order['billing_address'] ? $order['billing_address']['email'] : '-' }}</span>
                                </p>
                            </dd>

                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">Address:</span>
                                    <span class="label-subtitle">{{ $order['billing_address'] ? $order['billing_address']['address'] : '-' }}</span>
                                </p>
                            </dd>
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">Country:</span>
                                    <span class="label-subtitle">{{ $order['billing_address'] ? $order['billing_address']['country'] : '-' }}</span>
                                </p>
                            </dd>
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">Postcode:</span>
                                    <span class="label-subtitle">{{ $order['billing_address'] ? $order['billing_address']['postcode'] : '-' }}</span>
                                </p>
                            </dd>
                        </dl>
                    </div>
                    <div class="card p-4 mt-3 order-details-container_addresses">
                        <h2>Shipping Address</h2>
                        <dl class="row mt-3">
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">First name:</span>
                                    <span class="label-subtitle">{{ $order['shipping_address'] ? $order['shipping_address']['first_name'] : '-' }}</span>
                                </p>
                            </dd>
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">State/Region:</span>
                                    <span class="label-subtitle">{{ $order['shipping_address'] ? $order['shipping_address']['state'] : '-' }}</span>
                                </p>
                            </dd>
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">Phone:</span>
                                    <span class="label-subtitle">{{ $order['shipping_address'] ? $order['shipping_address']['phone'] : '-' }}</span>
                                </p>
                            </dd>

                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">Last name:</span>
                                    <span class="label-subtitle">{{ $order['shipping_address'] ? $order['shipping_address']['last_name'] : '-' }}</span>
                                </p>
                            </dd>
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">City:</span>
                                    <span class="label-subtitle">{{ $order['shipping_address'] ? $order['shipping_address']['city'] : '-' }}</span>
                                </p>
                            </dd>
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">Email:</span>
                                    <span class="label-subtitle">{{ $order['shipping_address'] ? $order['shipping_address']['email'] : '-' }}</span>
                                </p>
                            </dd>

                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">Address:</span>
                                    <span class="label-subtitle">{{ $order['shipping_address'] ? $order['shipping_address']['address'] : '-' }}</span>
                                </p>
                            </dd>
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">Country:</span>
                                    <span class="label-subtitle">{{ $order['shipping_address'] ? $order['shipping_address']['country'] : '-' }}</span>
                                </p>
                            </dd>
                            <dd class="col-sm-4">
                                <p>
                                    <span class="label-title">Postcode:</span>
                                    <span class="label-subtitle">{{ $order['shipping_address'] ? $order['shipping_address']['postcode'] : '-' }}</span>
                                </p>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane " role="tabpanel">
                    <div class="table-responsive data-table table-custom with-custom-search mt-4">
                        <table class="table table-hover w-100" id="products-table">
                            <thead>
                                <tr>
                                    <th class="text-left">PRODUCT</th>
                                    <th class="text-left">PRICE</th>
                                    <th class="text-left">QUANTITY</th>
                                    <th class="text-left">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $order['products'] as $product )
                                    <tr>
                                        <td>{{ $product['name'] }}</td>
                                        <td>${{ $product['price'] }}</td>
                                        <td>{{ $product['pivot']['quantity'] }}</td>
                                        <td>${{ $product['pivot']['total_amount'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="tab-3" class="tab-pane" role="tabpanel">
                    <div class="d-flex invoice-container mt-4">
                        <div class="invoice-image">
                            <p>Invoice</p>
                            <p>{{ $order['order_ref'] }}</p>
                        </div>
                        <div class="w-100">
                            <div>
                                <p class="text-right normal-text">{{ formatDate(now()) }}</p>
                            </div>
                            <div class="mt-4">
                                <p class="heading">{{ $school['name'] }}</p>
                                <p class="normal-text">{{ $school['address'] }}</p>
                                <p class="normal-text">{{ $school['contact_number'] }}</p>
                                <p class="normal-text">{{ $school['email'] }}</p>
                                <p class="normal-text">{{ $school['school_website'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-products-container">
                        <table class="table modal-table mt-5">
                            <thead class="border-bottom">
                                <tr>
                                    <th scope="col">PRODUCT</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col" class="text-center">QUANTITY</th>
                                    <th scope="col" class="text-right">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $order['products'] as $product )
                                    <tr>
                                        <td>{{ $product['name'] }}</td>
                                        <td>${{ $product['price'] }}</td>
                                        <td class="text-center">{{ $product['pivot']['quantity'] }}</td>
                                        <td class="text-right">${{ $product['pivot']['total_amount'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            <div class="invoice-total-container">
                                <dl class="row w-50 mb-3">
                                    <dd class="col-sm-9"><p class="text-right normal-text">SUBTOTAL</dd>
                                    <dd class="col-sm-3"><p class="text-right normal-text">${{ $order['total_amount'] }}</dd>
                                </dl>
                                <dl class="row w-50 mb-3">
                                    <dd class="col-sm-9"><p class="text-right normal-text">TAX({{ $school['tax'] }}%)</dd>
                                    <dd class="col-sm-3"><p class="text-right normal-text">${{ $order['tax_total'] }}</dd>
                                </dl>
                                <dl class="row w-50 mb-3">
                                    <dd class="col-sm-9"><p class="text-right normal-text">DISCOUNT</dd>
                                    <dd class="col-sm-3"><p class="text-right normal-text">-${{ $order['discount_total'] }}</dd>
                                </dl>
                                <dl class="row w-50 mb-3">
                                    <dd class="col-sm-9"><p class="text-right heading">TOTAL</dd>
                                    <dd class="col-sm-3"><p class="text-right heading">${{ $order['grand_total'] }}</dd>
                                </dl>
                            </div>
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
    .invoice-container {
        width: 70%;
        gap: 15px;
    }
    
    .invoice-image {
        width: 150px;
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #FB7D5B;
        color: #fff;
    }

    .invoice-products-container {
        width: 70%;
    }

    .invoice-total-container {
        display: flex;
        flex-direction: column;
        align-content: flex-end;
        align-items: flex-end;
    }

    .invoice-total-container dl {
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
    }

    .invoice-container .normal-text,
    .invoice-total-container .normal-text {
        font-size: 14px;
        font-weight: 400;
        color: #7A7A7A;
    }

    .invoice-container .heading,
    .invoice-total-container .heading {
        font-size: 14px;
        font-weight: 500;
        color: #3B3B3B;
    }

    .order-details-container_addresses h2 {
        font-size: 20px; 
        font-weight: 800;
        color: #3B3B3B;
    }

    .order-details-container_addresses .label-title {
        font-size: 14px;
        font-weight: 900;
        color: #3B3B3B;
    }

    .order-details-container_addresses .label-subtitle {
        font-size: 14px;
        font-weight: 400;
        color: #636363;
    }
</style>
@endsection

@section('script')
<script type="text/javascript">
    var errors = [];
    var selectedData = {};
    var formAction = '';
    var defaultPageTitle = ' Competition';

    $(function() {
        var order = <?= json_encode($order) ?>;
        $('select[name=payment_method]').val(order.payment_method).trigger('change');
        $('select[name=shipping_method]').val(order.shipping_method).trigger('change');
        $('select[name=fulfilment_status]').val(order.status).trigger('change');
        $('select[name=payment_status]').val(order.payment_status).trigger('change');

        $('select[name=order_detail_export]').on('change', async function(){
            const value = $(this).val();

            // get user token
			const userToken = await getUserToken();
            
            const orderIDs = [
                {
                    id: order.id
                }
            ];

            await axios.post(`${getApiUrl()}/order/bulk-generate-pdf`, orderIDs, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    
                    if ( res.data.success ) {
                        console.log(res.data);
                        toastTopEnd("Success", res.data.message, "success");

                        // Assuming response is your JSON response
                        var base64String = res.data.file;

                        // Create a Blob from the base64 string
                        var blob = b64toBlob(base64String, 'application/pdf');

                        // Create a temporary URL for the blob
                        var url = window.URL.createObjectURL(blob);

                        // Create a link and trigger the download
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = res.data.filename;
                        document.body.appendChild(a);
                        a.click();

                        // Clean up: remove the temporary URL and the created link
                        window.URL.revokeObjectURL(url);
                        document.body.removeChild(a);
                    } else {
                        toastInfo("Cant' Process", res.data.message, "warning");

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

            $(this).val("");
        });
    });
</script>
@endsection