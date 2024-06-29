<div class="main-view mt-4">
    <div class='invoice-container w-75' style="padding: 15px; border: 1px solid #d5d5d5;">
        <div class='invoice-header'>
            <div class="row mt-2 mb-4 invoice-school_details">
                <div class="col-9 mb-4">
                    <img src="{{ $school['logo'] }}" alt="" style="width: 168px;">
                </div>
                <div class="col-3 d-flex justify-content-end">
                    <div class="text-right section-title">INVOICE</div>
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
        
        <div class='invoice-details'>
            <div class="row">
                <div class="col-7" style="display: flex; align-items: flex-end;">
                    <p style="font-size: 18px;">To: {{ $school['name'] }} - {{ $entry['invoice']['user']['name'] }} ({{ $entry['invoice']['user']['student_information']['student_id'] }})</p>
                </div>
                <div class="col-5">
                    <dl class="row">
                        <dt class="col-sm-5">Invoice No.:</dt>
                        <dd class="col-sm-7">{{ $entry['invoice']['invoice_number'] }}</dd>

                        <dt class="col-sm-5">Date:</dt>
                        <dd class="col-sm-7">{{ formatDate($entry['invoice']['created_at'], 'm/d/Y h:i A') }}</dd>
                    </dl>
                </div>
            </div>
            <table class="table">
                <thead style="border-bottom: 1px solid #d5d5d5; border-top: 1px solid #d5d5d5;">
                    <tr>
                    <th class="table-header">PRODUCT</th>
                    <th class="table-header">PRICE</th>
                    <th class="table-header">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @if( $entry['invoice']['type'] == 'class_enrollment' )
                        @foreach( $entry['invoice']['items'] as $item )
                            <tr>
                                <th class="table-body-row">
                                    <div>
                                        <p>{{ $item['course_enrollment_item']['package']['course']['course_abbreviation'] }}</p>
                                        <p>{{ $item['course_enrollment_item']['package']['course']['level']['name'] }}</p>
                                        @foreach( $item['course_enrollment_item']['course_classes'] as $courseClass )
                                            <p>{{ formatDate($courseClass['start_date'], 'm/d/Y') }} | {{ formatDate($courseClass['start_date'] . " " . $courseClass['start_time'], 'h:i A') }} - {{ formatDate($courseClass['start_date'] . " " . $courseClass['end_time'], 'h:i A') }}</p>
                                        @endforeach
                                    </div>
                                </th>
                                <td class="table-body-row">{{ $item['price'] }}</td>
                                <td class="table-body-row">${{ $item['total'] }}</td>
                            </tr>
                        @endforeach
                    @endif
                    @if( $entry['invoice']['type'] == 'competition_enrollment' )
                        @foreach( $entry['invoice']['items'] as $item )
                            <tr>
                                <th class="table-body-row">
                                    <div>
                                        <p>{{ $item['competition_enrollment_item']['competition']['competition_name'] }}</p>
                                        <p>{{ $item['competition_enrollment_item']['competition']['competition_code'] }}</p>
                                    </div>
                                </th>
                                <td class="table-body-row">{{ $item['price'] }}</td>
                                <td class="table-body-row">${{ $item['total'] }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="invoice-total" style="display: flex; justify-content: flex-end;">
            <div style="width: 250px;">
                <dl class="row mb-2 mt-2">
                    <dt class="col-sm-7">Total Amount:</dt>
                    <dd class="col-sm-5 text-right">${{ $entry['invoice']['total_amount'] }}</dd>
                </dl>
            </div>
        </div>
        <div class='invoice-footer mt-3'>
            <p class="mb-3">Thank you for your purchase! For any inquiries or concerns, please contact us at:</p>
            <p>Email: support@example.com</p>
            <p>Phone: 1-800-555-1234</p>

            <p class="mt-3">- Payment can be settled by Cash, Cheque, Bank Transfer, FPS or PayMe.</p>
            <p>- Enrollment is only confirmed onces fees are paid in full.</p>
            <p>&nbsp; (Hang Seng Bank, acc no.: 395-501786-001, acc name:  Swimming Academy Limited)</p>
            <p>- No refund or transfer of any fees shall be allowed under any circumstances.</p>
            <p>- No refund or credit will be applied for any unattended lessons.</p>
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

    .invoice-footer p {
        font-size: 13px;
    }
</style>