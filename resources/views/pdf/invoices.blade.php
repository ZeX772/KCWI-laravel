<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoices</title>

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
    .invoice-items-table {
        border-collapse: collapse;
        border-spacing: 0;
        margin-top: 50px;
    }
    .invoice-items-table tbody tr td {
        border: 1px solid black;
    }
    </style>
</head>
<body>
    @foreach($invoices as $index => $invoice)
        <div class="{{ $index === array_key_last($invoices) ? 'page-break-avoid' : 'page-break' }}" style="width: 100%">
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
                                <td width="50%" class="text-end"><b>INVOICE #</b></td>
                                <td width="50%" class="text-end">{{ $invoice->invoice_number }}</td>
                            </tr>
                            <tr>
                                <td width="50%" class="text-end"><b>DATE</b></td>
                                <td width="50%" class="text-end">{{ date("m/d/Y", strtotime($invoice->date)) }}</td>
                            </tr>
                            <tr>
                                <td width="50%" class="text-end"><b>CUSTOMER NAME</b></td>
                                <td width="50%" class="text-end">{{ $invoice->user->name }}</td>
                            </tr>
                            <tr>
                                <td width="50%" class="text-end"><b>INVOICE STATUS</b></td>
                                <td width="50%" class="text-end">{{ ucfirst($invoice->status) }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="width: 100%" class="invoice-items-table">
                <thead>
                    <tr class="text-center">
                        <th>ITEM DESCRIPTION</th>
                        <th class="text-center">PRICE</th>
                        <th class="text-center">QUANTITY</th>
                        <th class="text-center">DISCOUNT</th>
                        <th class="text-end">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice->items as $item)
                        @php
                            $desc = '';
                            switch($invoice->type) {
                                case 'course enrollment' :
                                    $enrollment = \App\Models\CourseEnrollment::find($item->item_id);
                                    $course = $enrollment->package->course;
                                    $userClasses = $invoice->user->studentClasses;
                                    $classes = $userClasses->filter(function($studClass) use ($course) {
                                        return $studClass->class->course_id === $course->id;
                                    });
                                    $desc .= '<p style="margin: 0">'.$course->course_abbreviation.'</p>';

                                    $classTimes = '';
                                    foreach($classes as $studClass) {
                                        $classTimes .= date("d/m", strtotime($studClass->class->start_date)).', ';
                                    }
                                    $desc .= '<p style="margin: 0">('.substr($classTimes, 0, -2).')</p>';
                                    $desc .= '<p style="margin: 0">Venue: '.$course->venueData->name.'</p>';
                                    $desc .= '<p style="margin: 0">Total '.count($classes).' lesson(s)</p>';
                                break;
                                case 'competition enrollment' :
                                    $enrollment = \App\Models\CompetitionEnrollment::find($item->item_id);
                                    $compeCategory = $enrollment->competitionCategory;
                                    $competition = $compeCategory->competition;
                                    $category = $compeCategory->category;

                                    $desc .= '<p style="margin: 0">'.$competition->competition_code.' ('.$category->name.')</p>';
                                    $desc .= '<p style="margin: 0">'.date("m/d/Y", strtotime($category->start_date)).' - '.date("m/d/Y", strtotime($category->end_date)).'</p>';
                                    $desc .= '<p style="margin: 0">'.date("H:i", strtotime($category->start_time)).' - '.date("H:i", strtotime($category->end_time)).'</p>';
                                    $desc .= '<p style="margin: 0">Venue: '.$competition->schoolVenue->name.'</p>';
                                    $desc .= '<p style="margin: 0">Facility: '.$competition->schoolVenueFacility->name.'</p>';
                                break;
                            }
                        @endphp
                    <tr>
                        <td>{!! $desc !!}</td>
                        <td class="text-center">{{ $item->price }}</td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-center">{{ $item->discount }}</td>
                        <td class="text-end">{{ $item->total }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>Remarks:</td>
                        <td></td>
                        <td></td>
                        <td class="text-end"><b>TOTAL</b></td>
                        <td class="text-end">{{ $invoice->total_amount }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endforeach
</body>
</html>