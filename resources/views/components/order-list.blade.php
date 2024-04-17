<div class="tab-content p-3 pt-4 card">
    
    <div class="row orders-filter-tab">
        <div class="col-10 position-relative">
            <x-search-input inputType="text" inputName="order_search" inputID="order_search" inputPlaceholder="Search..." />
        </div>
        <div class="col-2">
            <x-form-select
                label="" 
                name="action"
                id="{{ $tab }}-action_btn"
                isRequired="true"
            >
                <option value="" hidden>Actions</option>
                <option value="processing">Processing</option>
                <option value="shipped">Shipped</option>
            </x-form-select>
        </div>
    </div>
    <div class="table-responsive table-custom with-custom-search mt-4">
        <table class="table table-hover w-100" id="{{ $tab }}-order-table">
            <thead>
                <tr>
                    <th class="text-left"><input type="checkbox"></th>
                    <th class="text-left">ORDER NO.</th>
                    <th class="text-left">CUSTOMER</th>
                    <th class="text-left">DATE</th>
                    <th class="text-left">TOTAL</th>
                    <th class="text-left">PAYMENT</th>
                    <th class="text-left">STATUS</th>
                    <th class="text-center" style="width: 5px;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $key => $order)
                <tr data-id="{{ $order['id'] }}">
                    <td><input type="checkbox" name="checkbox" data-id="{{ $order['id'] }}"></td>
                    <td>{{ $order['order_ref'] }}</td>
                    <td>{{ $order['user']['name'] }}</td>
                    <td>{{ $order['order_date'] }}</td>
                    <td>{{ $order['total_amount'] }}</td>
                    <td>{{ $order['payment_method'] }}</td>
                    <td><span class="custom-badge bg-{{ $order['status'] == 'shipped' ? 'success' : ( $order['status'] == 'pending' ? 'warning text-dark' : ( $order['status'] == 'archived' ? 'danger' : 'info text-dark' ) ) }}">{{ ucfirst(($order['status'] == 'request_refund' ? 'Requested Refund' : $order['status'])) }}</span></td>
                    <td>
                        <div class="dropdown custom-dropdown d-block">
                            <span id="dropdownMenuButton1" class="cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false">
                                <x-svg-icon icon="ellipsis" width="1rem" height="1.3rem" />
                            </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item processing-btn" href="#" data-id="{{ $order['id'] }}">Processing</a></li>
                                <li><a class="dropdown-item shipped-btn" href="#" data-id="{{ $order['id'] }}">Shipped</a></li>
                                <li><a class="dropdown-item request-refund-btn" href="#" data-id="{{ $order['id'] }}">Request Refund</a></li>
                                <li class="pt-2 pb-2"><hr></li>
                                <li><a class="dropdown-item" href="{{ route('wave.user.admin-main.order-view', $order['id']) }}" >View</a></li>
                                @if( $order['status'] != 'archived' )
                                    <li><a class="dropdown-item delete-button" href="#" id="delete-btn" data-row_id="{{ $order['id'] }}" data-bs-toggle="modal" data-bs-target="#delete-modal">Archive</a></li>
                                @endif
                                @if( isSuperAdmin() && $order['status'] == 'archived' )
                                    <li><a class="dropdown-item unarchive-btn" href="#" data-row_id="{{ $order['id'] }}" data-bs-toggle="modal" data-bs-target="#unarchive-modal">Unarchive</a></li>
                                @endif
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    var allOrderTable = $('#all-order-table').DataTable();
    var pendingOrderTable = $('#pending-order-table').DataTable();
    var processingOrderTable = $('#processing-order-table').DataTable();
    var refundedOrderTable = $('#refunded-order-table').DataTable();

    // Event listener for custom search input
    $('input[name=order_search]').on('keyup', function() {
        var searchTerm = $(this).val();

        if( window.orders_tab == 'all' )
            allOrderTable.search(searchTerm).draw();
        if( window.orders_tab == 'pending' )
            pendingOrderTable.search(searchTerm).draw();
        if( window.orders_tab == 'processing' )
            processingOrderTable.search(searchTerm).draw();
        if( window.orders_tab == 'refunded' )
            refundedOrderTable.search(searchTerm).draw();
    });
</script>