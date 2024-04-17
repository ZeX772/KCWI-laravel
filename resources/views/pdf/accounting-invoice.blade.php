<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Accounting - Invoice</title>

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
    <div class="">
        <table style="width: 100%">
            <tr>
                <td width="50%">
                    <p style="margin: 0"><img src="{{ $school->logo }}" alt="" style="width: 150px"></p>
                    <p style="margin: 0">{{ $school->name }}</p>
                    <p style="margin: 0">{{ $school->address }}</p>
                    <p style="margin: 0">{{ $school->city . ", " . $school->state . ", " . $school->country }}</p>
                    <p style="margin: 0">{{ $school->contact_number }}</p>
                    <p style="margin: 0">{{ $school->email }}</p>
                    <p style="margin: 0">{{ $school->school_website }}</p>
                </td>
                <td width="50%">
                    <table style="width: 100%">
                        <tr>
                            <td width="50%" class="text-center border-bottom"><b>INVOICE #</b></td>
                            <td width="50%" class="text-center border-bottom"><b>PAYMENT DATE</b></td>
                        </tr>
                        <tr>
                            <td width="50%" class="text-center">{{ $enrollment->payment->invoice }}</td>
                            <td width="50%" class="text-center">{{ date("m/d/Y", strtotime($enrollment->payment->payment_date)) }}</td>
                        </tr>
                        <tr>
                            <td width="50%" class="text-center border-bottom"><b>STUDENT NAME</b></td>
                            <td width="50%" class="text-center border-bottom"><b>PAYMENT STATUS</b></td>
                        </tr>
                        <tr>
                            <td width="50%" class="text-center">{{ $enrollment->user->name }}</td>
                            <td width="50%" class="text-center">{{ $enrollment->payment->status_label }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table style="width: 100%" class="order-items-table">
            <thead>
                <tr class="text-center">
                    <th>PRODUCT</th>
                    <th>PRICE</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div>
                            <p style="padding: 0px;">{{ $enrollment->package->course->course_abbreviation }}</p>
                            <p style="padding: 0px;">{{ $enrollment->package->course->level->name }}</p>
                            <!-- <p style="padding: 0px;">(6, 8, 13, 15, 20, 22, 27, 29 Jul, 2021  10:00 - 11:00)</p> -->
                        </div>
                    </td>
                    <td>{{ $enrollment->package->course->class_full_price }}</td>
                    <td>{{ "$". $enrollment->payment->total_fee }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td class="text-end"><b>Subtotal</b></td>
                    <td class="text-end">{{ $enrollment->package->course->class_full_price }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-end"><b>Total</b></td>
                    <td class="text-end">{{ "$".$enrollment->payment->total_fee }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>