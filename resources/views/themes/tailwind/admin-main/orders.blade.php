@extends('theme::layouts.app')

@section('content')
<?php
    $drop_down_options = [
        [
            'value' => 'generate_pdf',
            'label' => 'Generate PDF',
        ],
        [
            'value' => 'generate_excel',
            'label' => 'Generate Excel',
        ]
    ];
?>
<div class="page-container">
    <x-page-content-heading 
        heading="Orders" 
        withButton="false"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#order-modal" 
        buttonType="button"
        buttonId="add-order_btn"
        buttonTitle=""
        withDropdownBtn="true"
        dropdownBtnName="order_detail_export"
        :dropdownOptions="$drop_down_options"
    />
    <div class="row mt-4">
        <div class="col-xxl-12 main-tab-nav">
            <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4 orders-tab" role="tablist">
                <li class="nav-item" role="presentation" style="border-left-style: none;">
                    <a class="nav-link active" data-tab="all" role="tab" data-bs-toggle="tab" href="#tab-1">ALL [{{ count($all ?? []) }}]</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-tab="shipped" data-bs-toggle="tab" href="#tab-2">SHIPPED/DONE [{{ count($shipped_orders ?? []) }}]</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-tab="pending" data-bs-toggle="tab" href="#tab-3">PENDING [{{ count($pending_orders ?? []) }}]</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-tab="processing" data-bs-toggle="tab" href="#tab-4">PROCESSING [{{ count($processing_orders ?? []) }}]</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-tab="refunded" data-bs-toggle="tab" href="#tab-5">REFUNDED [{{ count($refunded_orders ?? []) }}]</a>
                </li>
            </ul>
            <div class="tab-content pt-2">
                <div id="tab-1" class="tab-pane active" role="tabpanel">
                    <x-order-list :list="$all ?? []" tab="all"/>
                </div>
                <div id="tab-2" class="tab-pane " role="tabpanel">
                    <x-order-list :list="$shipped_orders ?? []" tab="pending"/>
                </div>
                <div id="tab-3" class="tab-pane " role="tabpanel">
                    <x-order-list :list="$pending_orders ?? []" tab="pending"/>
                </div>
                <div id="tab-4" class="tab-pane" role="tabpanel">
                    <x-order-list :list="$processing_orders ?? []" tab="processing"/>
                </div>
                <div id="tab-5" class="tab-pane" role="tabpanel">
                    <x-order-list :list="$refunded_orders ?? []"  tab="refunded"/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Update Order Modal -->
<!-- <div class="modal fade" role="dialog" tabindex="-1" id="order-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Add Order</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4">
                <form id="modal-form">
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="User" 
                            name="user_id"
                            id="user_id"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Customer</option>
                            @foreach($users as $key => $user)
                                <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                            @endforeach
                        </x-form-select>
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Order Date" 
                            type="date" 
                            name="order_date"
                            id="order_date"
                            isRequired=false
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Competition Size (Maximum Number of Student)" 
                            type="text" 
                            name="competition_size"
                            id="competition_size"
                            isRequired=false
                        />
                        <x-form-input 
                            label="Fee (HK$) Per Competition" 
                            type="text" 
                            name="enrollment_price"
                            id="enrollment_price"
                            isRequired=false
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-input 
                            label="Date" 
                            type="date" 
                            name="start_date"
                            id="start_date"
                            isRequired=false
                        />
                        <x-form-input 
                            label="Start Time" 
                            type="time" 
                            name="start_time"
                            id="start_time"
                            isRequired=false
                        />
                        <x-form-input 
                            label="End Time" 
                            type="time" 
                            name="end_time"
                            id="end_time"
                            isRequired=false
                        />
                    </div>
                    <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                        <x-form-select
                            label="Status" 
                            name="status"
                            id="status"
                            isRequired="true"
                        >
                            <option value="" hidden>Select Status</option>
                            <option value="published">Published</option>
                            <option value="private">Private</option>
                        </x-form-select>
                    </div>
                    <div class="container" style="padding: 0px;color: #636363">
                        <div class="form-inline">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Remarks <span class="text-danger">*</span></label>
                                <textarea name="remarks" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-4">
                    <x-primary-button type="button" id="save-form_btn" title="Save" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mb-4">
                <p class="heading mb-3">Are you sure to archive this order?</p>
                <p class="sub-heading text-secondary">
                    <span id="competition-code"></span>, <span id="competition-category"></span>
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" color="danger" id="process-archive" title="Continue" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Unarchive Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="unarchive-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="heading text-warning mb-3" style="font-size: 20px;font-family: Poppins, sans-serif;">Are you sure you want to unarchive this order<b id="label-unarchive-name"><u></u></b>?</p>
                <p class="sub-heading">
                    Unarchiving this order, would be able again.
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" id="process-unarchive" title="Yes" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    var errors = [];
    var selectedData = {};
    var formAction = '';
    var defaultPageTitle = ' Competition';
    window.orders_tab = 'all';

    $(function() {
        $('.orders-tab').on('click', '.nav-link', function(){
            console.log($(this).data('tab'));
            window.orders_tab = $(this).data('tab');
        });

        $(`.orders-filter-tab`).on('change', 'select[name=action]', async function(){
            const userToken = getUserToken();
            
            const action = $(this).val();

            const allCheckbox = $(`#${window.orders_tab}-order-table tbody tr input[name=checkbox]`)

            let selectedOrders = [];
            allCheckbox.each(function(){
                const isChecked = $(this).is(':checked');
                if( isChecked )
                    selectedOrders.push({id: $(this).data('id')});
            });

            if( selectedOrders.length <= 0 ) {
                toastInfo("Warning", "Cannot process your request, please select atleast 1 order", "warning");
                $(this).val("");
                return;
            }

            let routeAction = "";
            if( action == "" ) {
                toastInfo("Warning", "Oops! there was an error processing your request. Please try again later!", "warning");
                $(this).val("");
                return;
            }

            if( action == "processing" )
                routeAction = "bulk-orders-processing";

            if( action == "shipped" )
                routeAction = "bulk-orders-shipped";

            await axios.post(`${getApiUrl()}/order/${routeAction}`, selectedOrders, {
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

                    console.error('Error fetching data:', error);
                });

            $(this).val("");
        });

        $('select[name=order_detail_export]').on('change', async function(){
            const value = $(this).val();

            // get user token
			const userToken = await getUserToken();

            const allCheckbox = $(`#${window.orders_tab}-order-table tbody tr input[name=checkbox]`)

            let selectedOrders = [];
            allCheckbox.each(function(){
                const isChecked = $(this).is(':checked');
                if( isChecked )
                    selectedOrders.push({id: $(this).data('id')});
            });

            if( selectedOrders.length <= 0 ) {
                toastInfo("Warning", "Cannot process your request, please select atleast 1 order", "warning");
                $(this).val("");
                return;
            }

            if( value == 'generate_pdf' )
                await axios.post(`${getApiUrl()}/order/bulk-generate-pdf`, selectedOrders, {
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
            if( value == "generate_excel" )
                await axios.post(`${getApiUrl()}/order/bulk-generate-excel`, selectedOrders, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + userToken
                        }
                    }).then(res => {
                        if ( res.data.success ) {
                            console.log(res.data);
                            toastTopEnd("Success", res.data.message, "success");

                            const filePath = res.data.file_path;
                            const a = document.createElement('a');
                            a.href = filePath;
                            a.download = res.data.filename;
                            document.body.appendChild(a);
                            a.click();
                            document.body.removeChild(a);
                        } else {
                            toastInfo("Cant' Process", res.data.message, "warning");

                            $(this).removeAttr('disabled');
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error.response);
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

        $('.custom-dropdown').on('click', '.processing-btn', async function(e){
            e.preventDefault();

            const id = $(this).data('id');

            const userToken = getUserToken();

            let selectedOrders = [
                { id: id }
            ];

            await axios.post(`${getApiUrl()}/order/bulk-orders-processing`, selectedOrders, {
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

                    console.error('Error fetching data:', error);
                });
        });

        $('.custom-dropdown').on('click', '.shipped-btn', async function(e){
            e.preventDefault();

            const id = $(this).data('id');

            const userToken = getUserToken();

            let selectedOrders = [
                { id: id }
            ];

            await axios.post(`${getApiUrl()}/order/bulk-orders-shipped`, selectedOrders, {
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

                    console.error('Error fetching data:', error);
                });
        });

        $('.custom-dropdown').on('click', '.request-refund-btn', async function(e){
            e.preventDefault();

            const id = $(this).data('id');

            const userToken = getUserToken();

            let selectedOrders = [
                { id: id }
            ];

            await axios.post(`${getApiUrl()}/order/bulk-request-refund`, selectedOrders, {
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

                    console.error('Error fetching data:', error);
                });
        });

        $('.custom-dropdown').on('click', '.delete-button', function(){
            selectedData = {
                id: $(this).data('row_id')
            }
        });

        $('.custom-dropdown').on('click', '.unarchive-button', function(){
            selectedData = {
                id: $(this).data('row_id')
            }
        });

        $('#delete-modal').on('click', '#process-archive', async function(){
            const userToken = getUserToken();

            let selectedOrders = [
                selectedData
            ];

            await axios.post(`${getApiUrl()}/order/bulk-archive`, selectedOrders, {
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

                    console.error('Error fetching data:', error);
                });
        });

        $('#unarchive-modal').on('click', '#process-unarchive', async function(){
            const userToken = getUserToken();

            let selectedOrders = [
                selectedData
            ];

            await axios.post(`${getApiUrl()}/order/bulk-unarchive`, selectedOrders, {
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

                    console.error('Error fetching data:', error);
                });
        });
    });
</script>
@endsection