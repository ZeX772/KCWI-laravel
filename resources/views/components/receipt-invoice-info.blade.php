<div class="main-view mt-4">
    <div class="invoice-info">
        <div class="w-100 mt-2">
            <table class="table" id="basic-info_table">
                <thead style="border-bottom: 1px solid #d5d5d5;">
                    <tr>
                    <th class="table-header">INVOICE NO.</th>
                    <!-- <th class="table-header">QUOTATION NO.</th> -->
                    <th class="table-header">STUDENT NAME</th>
                    <th class="table-header">EMAIL</th>
                    <th class="table-header">PHONE</th>
                    <th class="table-header">RESIDENTIAL ADDRESS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="table-body-row">{{ $entry['invoice'] ? $entry['invoice']['invoice_number'] : 'N/A' }}</th>
                        <!-- <td class="table-body-row">QTN-N-000030</td> -->
                        <td class="table-body-row">{{ $entry['invoice'] && $entry['invoice']['user'] ? $entry['invoice']['user']['name'] : 'N/A' }}</td>
                        <td class="table-body-row">{{ $entry['invoice'] && $entry['invoice']['user'] ? $entry['invoice']['user']['email'] : 'N/A' }}</td>
                        <td class="table-body-row">{{ $entry['invoice'] && $entry['invoice']['user'] && $entry['invoice']['user']['student_information'] ? $entry['invoice']['user']['student_information']['phone'] : 'N/A' }}</td>
                        <td class="table-body-row">{{ $entry['invoice'] && $entry['invoice']['user'] && $entry['invoice']['user']['student_information'] ? $entry['invoice']['user']['student_information']['address'] : 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="guardian-info mt-4">
        <h2 class="section-title mb-3">Guardian Information</h2>
        <table class="table" id="basic-info_table">
            <thead style="border-bottom: 1px solid #d5d5d5;">
                <tr>
                    <th class="table-header">NAME</th>
                    <th class="table-header">EMAIL</th>
                    <th class="table-header">PHONE NUMBER</th>
                </tr>
            </thead>
            <tbody>
                @if( $entry['invoice'] && $entry['invoice']['user'] && $entry['invoice']['user']['guardians'] )
                    @foreach($entry['invoice']['user']['guardians'] as $guardian)
                        <tr>
                            <td class="table-body-row">{{ $guardian['name'] }}</td>
                            <td class="table-body-row">{{ $guardian['email'] }}</td>
                            <td class="table-body-row">{{ $guardian['pivot']['phone'] }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="payment-info mt-4">
        <h2 class="section-title mb-3">Payment Record</h2>
        <table class="table" id="basic-info_table">
            <thead style="border-bottom: 1px solid #d5d5d5;">
                <tr>
                    <th class="table-header">RECEIPT NO.</th>
                    <th class="table-header">PAYMENT METHOD</th>
                    <th class="table-header">TOTAL FEES</th>
                    <th class="table-header">PAYMENT DATE</th>
                    <th class="table-header">ATTACHMENT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="table-body-row">{{ $entry['receipt_no'] }}</td>
                    <td class="table-body-row">{{ $entry['payment_method'] }}</td>
                    <td class="table-body-row">${{ $entry['total_fee'] }}</td>
                    <td class="table-body-row">{{ formatDate($entry['payment_date'], 'm/d/Y h:i A') }}</td>
                    <td class="table-body-row">
                        <div class="d-flex align-items-center gap-2">
                            <div class="table-row-img">
                                <img src="{{ $entry['image_path'] }}" alt="" style="width: 61px;">
                            </div>
                            <div class="d-flex gap-3 ">
                                <span style="color: #7A7A7A;" class="cursor-pointer download-img_btn" data-src="{{ $entry['image_path'] }}" data-filename="{{ $entry['attachment'] }}">
                                    <x-svg-icon icon="download" />
                                </span>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
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
</style>

<script>
    $(function() {
        // Event to dowload image from the table row
        $('.invoice-info_tab #basic-info_table').on('click', '.download-img_btn', function(){
            var imageUrl = $(this).data('src'); // Get the src attribute of the img element
            var filename = $(this).data('filename'); // Get the src attribute of the img element
            
            downloadImage(`${getAppUrl()}/admin-main/download-file?url=${imageUrl}`, filename);
        });

        async function downloadImage(imageSrc, filename) {
            const image = await fetch(imageSrc)
            const imageBlog = await image.blob()
            const imageURL = URL.createObjectURL(imageBlog)

            const link = document.createElement('a')
            link.href = imageURL
            link.download = filename
            document.body.appendChild(link)
            link.click()
            document.body.removeChild(link)
        }
    });
</script>