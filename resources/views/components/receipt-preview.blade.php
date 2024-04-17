<div class="main-view mt-4">
    <div class='receipt-container w-50' style="padding: 15px; border: 1px solid #d5d5d5;">
        <div class='receipt-header'>
            <div class="row mt-2 mb-4 invoice-school_details">
                <div class="col-9 mb-4">
                    <img src="{{ $school['logo'] }}" alt="" style="width: 168px;">
                </div>
                <div class="col-3 d-flex justify-content-end">
                    <div class="text-right section-title">RECEIPT</div>
                </div>
                <div class="col-12">
                    <div>
                        <h5>{{ $school['name'] }}</h5>
                        <p>{{ $school['address'] . ", " . $school['city'] . ', ' . $school['country'] }}</p>
                        <p>{{ $school['email'] }}</p>
                        <p>{{ $school['school_website'] }}</p>
                        <p>{{ $school['contact_number'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class='receipt-details mb-5' style="min-height: 350px;">
            <!-- Loop this dl -->
            <dl class="row mb-2 mt-2">
                <dt class="col-sm-3">Transaction ID:</dt>
                <dd class="col-sm-9">{{ $entry['receipt_no'] }}</dd>

                <dt class="col-sm-3">Student Name:</dt>
                <dd class="col-sm-9">{{ $entry['user']['name'] }}</dd>

                <dt class="col-sm-3">Payment Method:</dt>
                <dd class="col-sm-9">{{ $entry['payment_method'] }}</dd>

                <dt class="col-sm-3">Date:</dt>
                <dd class="col-sm-9">{{ formatDate($entry['payment_date'], 'm/d/Y h:i A') }}</dd>

                <dt class="col-sm-3">Items:</dt>
                <dd class="col-sm-9">
                    <dl class="row">
                        @foreach( $entry['items'] as $item )
                            <dt class="col-sm-5">{{ $item['item_name'] }}:</dt>
                            <dd class="col-sm-7">${{ $item['item_price'] }}</dd>
                        @endforeach
                    </dl>
                </dd>

                <dt class="col-sm-3">Amount:</dt>
                <dd class="col-sm-9">${{ $entry['total_fee'] }}</dd>
            </dl>
            <hr>
        </div>
        <div class="receipt-total">
            <dl class="row mb-2 mt-2">
                <dt class="col-sm-3">Total Amount:</dt>
                <dd class="col-sm-9">${{ $entry['total_fee'] }}</dd>
            </dl>
        </div>
        <div class='receipt-footer mt-3'>
            <p class="mb-3">Thank you for your payment! For any inquiries or concerns, please contact us at:</p>
            <p>Email: support@example.com</p>
            <p>Phone: 1-800-555-1234</p>
        </div>
    </div>
</div>

<style>
    .table-header {
        font-size: 14px;
        font-weight: 700;
        color: #7A7A7A;
        padding-left: 0 !important;
    }

    .table-body-row {
        font-size: 14px;
        font-weight: 400;
        color: #3B3B3B;
        padding-left: 0 !important;
    }

    .section-title {
        font-size: 24px;
        font-weight: 500;
        color: #3B3B3B;
    }

    .table-row-img {
        width: 61px;
        height: 61px;
        border-radius: 15px;
        overflow: hidden;
        border: 1px solid #e7e1e1;
    }

    .table-row-img img {
        height: 100%;
        object-fit: cover;
    }

    .receipt-footer p {
        font-size: 13px;
    }
</style>