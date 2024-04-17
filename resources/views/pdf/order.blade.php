<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>

    <style>
    .page-break {
        page-break-after: always;
    }
    .page-break-avoid {
        page-break-after: avoid;
    }
    .text-center {
        text-align: center;
    }
    .text-end {
        text-align: right;
    }
    .border-bottom {
        border-bottom: 1px solid black;
    }
    .order-items-table {
        border-collapse: collapse;
        border-spacing: 0;
        margin-top: 50px;
    }
    .order-items-table tbody tr td {
        border: 1px solid black;
    }
    </style>
</head>
<body>
    @foreach($orders as $index => $order)
        <div class="{{ $index === array_key_last($orders) ? 'page-break-avoid' : 'page-break' }}" style="width: 100%">
            <table style="width: 100%">
                <tr>
                    <td width="50%">
                        <p style="margin: 0">Company Name</p>
                        <p style="margin: 0">123 Main Street</p>
                        <p style="margin: 0">City, State ZIP</p>
                        <p style="margin: 0">(123) 456-7890</p>
                        <p style="margin: 0">Email Address</p>
                    </td>
                    <td width="50%">
                        <table style="width: 100%">
                            <tr>
                                <td width="50%" class="text-center border-bottom"><b>ORDER #</b></td>
                                <td width="50%" class="text-center border-bottom"><b>DATE</b></td>
                            </tr>
                            <tr>
                                <td width="50%" class="text-center">{{ $order->order_ref }}</td>
                                <td width="50%" class="text-center">{{ date("m/d/Y", strtotime($order->order_date)) }}</td>
                            </tr>
                            <tr>
                                <td width="50%" class="text-center border-bottom"><b>CUSTOMER NAME</b></td>
                                <td width="50%" class="text-center border-bottom"><b>ORDER STATUS</b></td>
                            </tr>
                            <tr>
                                <td width="50%" class="text-center">{{ $order->user->name }}</td>
                                <td width="50%" class="text-center">{{ ucfirst($order->status) }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%">
                        <table style="width: 100%">
                            <tr>
                                <td width="50%" class="border-bottom"><b>BILL TO</b></td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <p style="margin: 0">Bill to name</p>
                                    <p style="margin: 0">123 Bill To Street</p>
                                    <p style="margin: 0">City, State ZIP</p>
                                    <p style="margin: 0">(123) 456-7890</p>
                                    <p style="margin: 0">Email Address</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 50%">
                        <table style="width: 100%">
                            <tr>
                                <td width="50%" class="border-bottom"><b>SHIP TO</b></td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <p style="margin: 0">Ship to name</p>
                                    <p style="margin: 0">123 Ship To Street</p>
                                    <p style="margin: 0">City, State ZIP</p>
                                    <p style="margin: 0">(123) 456-7890</p>
                                    <p style="margin: 0">Email Address</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="width: 100%" class="order-items-table">
                <thead>
                    <tr class="text-center">
                        <th>PRODUCT</th>
                        <th>QTY</th>
                        <th>RATE</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td class="text-center">{{ $product->pivot->quantity }}</td>
                        <td class="text-end">{{ $product->pivot->unit_price }}</td>
                        <td class="text-end">{{ $product->pivot->total_amount }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>Remarks:</td>
                        <td></td>
                        <td class="text-end"><b>TOTAL</b></td>
                        <td class="text-end">{{ $order->total_amount }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endforeach
</body>
</html>