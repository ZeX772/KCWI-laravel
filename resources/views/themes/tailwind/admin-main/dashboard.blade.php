 @extends('theme::layouts.app')


 @section('content')
 <div class="main-contents dashboard-container">
    <div class="">
        <h1 class="fw-semibold mb-4" style="font-family: Poppins, sans-serif;font-size: 36px;color: #3B3B3B;">Dashboard</h1>
        <div class="card" style="background: rgb(255, 255, 255);">
            <div class="card-body d-xl-flex flex-row justify-content-xl-center align-items-xl-center">
                <div class="col" style="text-align: center;">
                    <h1 class="fw-semibold" style="font-family: Poppins, sans-serif;font-size: 24px;color: #3B3B3B;">Total</h1>
                </div>
                <div class="col-xl-2">
                    <div class="d-xl-flex justify-content-xl-center align-items-xl-center">
                        <div class="col-auto align-self-center"><img src="{{ asset('themes/tailwind/images/clipboard-image-22.png') }}" style="width: 48px;"></div>
                        <div class="col-auto d-xl-flex flex-column" style="margin-left: 12px;">
                            <h1 style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">Coachs</h1>
                            <h1 style="color: #3B3B3B;font-size: 25px;font-family: Poppins, sans-serif;font-weight: bold;">{{ optional($entries['total_counts'])['coaches'] }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="d-xl-flex justify-content-xl-center align-items-xl-center">
                        <div class="col-auto align-self-center"><img src="{{ asset('themes/tailwind/images/clipboard-image-23.png') }}" style="width: 48px;"></div>
                        <div class="col-auto d-xl-flex flex-column" style="margin-left: 12px;">
                            <h1 style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">Members</h1>
                            <h1 style="color: #3B3B3B;font-size: 25px;font-family: Poppins, sans-serif;font-weight: bold;">{{ optional($entries['total_counts'])['students'] }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2">
                    <div class="d-xl-flex justify-content-xl-center align-items-xl-center">
                        <div class="col-auto align-self-center"><img src="{{ asset('themes/tailwind/images/clipboard-image-25.png') }}" style="width: 48px;"></div>
                        <div class="col-auto d-xl-flex flex-column" style="margin-left: 12px;">
                            <h1 style="color: #7A7A7A;font-size: 14px;font-family: Poppins, sans-serif;">Courses</h1>
                            <h1 style="color: #3B3B3B;font-size: 25px;font-family: Poppins, sans-serif;font-weight: bold;">{{ optional($entries['total_counts'])['courses'] }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-xxl-flex align-items-xxl-start" style="margin-top: 20px;box-shadow: 0px 0px;">
            <div class="col-xxl-9">
                <div class="card" style="margin-right: 20px;background: transparent;">
                    <div class="card-body" style="width: 100%;">
                        <div class="row">
                            <div class="col">
                                <div></div>
                                <div>
                                    <div style="overflow: auto;height: 48.5938px; display: flex; justify-content: space-between; align-items: center;">
                                        <h3 class="fw-semibold tab-heading" style="float: left;color: #3B3B3B;font-family: Poppins, sans-serif;">Notice Board</h3>
                                        <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-end" role="tablist" style="border-style: none;border-left-style: none;">
                                            <li class="nav-item" role="presentation" style="border-left-style: none;">
                                                <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1" style="border-style: none;border-left-style: none;font-size: 14px;font-family: Poppins, sans-serif;font-weight: 600;">ALL [{{ $entries['total_count'] }}]</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2" style="border-style: none;border-left-style: none;">Enrollment [{{ count($entries['enrollments']) }}]</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-4" style="border-style: none;border-left-style: none;">Course [{{ count($entries['courses']) }}]</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-5" style="border-style: none;border-left-style: none;">Enquiry [{{ count($entries['enquiries']) }}]</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div id="tab-1" class="tab-pane active" role="tabpanel">
                                            <div class="table-responsive table mt-2 tabe" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                                <table class="table my-0 custom-datatable all-notice_board" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="fw-bold" style="font-size: 14px;color: #7A7A7A;">ACTIVITY</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">MEMBER</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">STATUS</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">DATE</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabe" class="tabe">
                                                        @foreach($entries['all'] as $entry)
                                                            @if( $entry['key'] == 'enrollments' )
                                                                @foreach($entry['items'] as $item)
                                                                    <tr>
                                                                        <td class="fw-normal" style="background: #F5F5F5;border-top-left-radius: 8px;border-bottom-left-radius: 8px;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;padding: 7px;padding-left: 7px;">{{ $entry['label'] }}</td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ optional($item['user'])['name'] }} <small class="text-muted">({{ optional($item['user'])['student_information'] ? optional($item['user']['student_information'])['hkid'] : '-' }})</small></td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ $item['status_label'] }}</td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ formatDate($item['created_at']) }}</td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;text-align: center;border-top-right-radius: 8px;border-bottom-right-radius: 8px;">
                                                                            <a href="{{ route('wave.user.admin-main.request') }}" style="color: #409FFF; text-decoration: underline; font-weight: 400; font-size: 15px;">View</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @elseif( $entry['key'] == 'make_ups' )
                                                                @foreach($entry['items'] as $item)
                                                                    <tr>
                                                                        <td class="fw-normal" style="background: #F5F5F5;border-top-left-radius: 8px;border-bottom-left-radius: 8px;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;padding: 7px;padding-left: 7px;">{{ $entry['label'] }}</td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ optional($item['user'])['name'] }} <small class="text-muted">({{ optional($item['user'])['student_information'] ? optional($item['user']['student_information'])['hkid'] : '-' }})</small></td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ $item['status_label'] }}</td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ formatDate($item['created_at']) }}</td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;text-align: center;border-top-right-radius: 8px;border-bottom-right-radius: 8px;">
                                                                            <a href="{{ route('wave.user.admin-main.request') }}" style="color: #409FFF; text-decoration: underline; font-weight: 400; font-size: 15px;">View</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @elseif( $entry['key'] == 'course' )
                                                                @foreach($entry['items'] as $item)
                                                                    <tr>
                                                                        <td class="fw-normal" style="background: #F5F5F5;border-top-left-radius: 8px;border-bottom-left-radius: 8px;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;padding: 7px;padding-left: 7px;">{{ $entry['label'] }}</td>
                                                                        @if( $item['user'] )
                                                                            <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ optional($item['user'])['name'] }} <small class="text-muted">({{ optional($item['user'])['student_information'] ? optional($item['user']['student_information'])['student_id'] : '-' }})</small></td>
                                                                        @else
                                                                            <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">-</td>
                                                                        @endif
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ $item['status_label'] }}</td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ formatDate($item['created_at']) }}</td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;text-align: center;border-top-right-radius: 8px;border-bottom-right-radius: 8px;">
                                                                            <a href="{{ route('wave.user.admin-main.request') }}" style="color: #409FFF; text-decoration: underline; font-weight: 400; font-size: 15px;">View</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @elseif( $entry['key'] == 'enquiry' )
                                                                @foreach($entry['items'] as $item)
                                                                    <tr>
                                                                        <td class="fw-normal" style="background: #F5F5F5;border-top-left-radius: 8px;border-bottom-left-radius: 8px;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;padding: 7px;padding-left: 7px;">{{ $entry['label'] }}</td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ optional($item['user'])['name'] }} <small class="text-muted">({{ optional($item['user'])['student_information'] ? optional($item['user']['student_information'])['student_id'] : '-' }})</small></td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ $item['status_label'] }}</td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ formatDate($item['created_at']) }}</td>
                                                                        <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;text-align: center;border-top-right-radius: 8px;border-bottom-right-radius: 8px;">
                                                                            <a href="{{ route('wave.user.admin-main.request') }}" style="color: #409FFF; text-decoration: underline; font-weight: 400; font-size: 15px;">View</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-pane" role="tabpanel">
                                            <div class="table-responsive table mt-2 tabe" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                                                <table class="table my-0 enrollment-table" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="fw-bold" style="font-size: 14px;color: #7A7A7A;">STUDENT</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">STATUS</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">INVOICE</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">DATE</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabe-1" class="tabe">
                                                        @foreach($entries['enrollments'] as $enrollment)
                                                            <tr>
                                                                <td class="fw-normal" style="background: #F5F5F5;border-top-left-radius: 8px;border-bottom-left-radius: 8px;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ optional($enrollment['user'])['name'] }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ $enrollment['status_label'] }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ $enrollment['invoice'] ?? '-' }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ formatDate($enrollment['created_at']) }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;text-align: center;border-top-right-radius: 8px;border-bottom-right-radius: 8px;">
                                                                    <a href="{{ route('wave.user.admin-main.request') }}" style="color: #409FFF; text-decoration: underline; font-weight: 400; font-size: 15px;">View</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="tab-3" class="tab-pane" role="tabpanel">
                                            <div id="dataTable-3" class="table-responsive table mt-2 tabe" role="grid" aria-describedby="dataTable_info">
                                                <table id="dataTable" class="table my-0 makeup-table">
                                                    <thead>
                                                        <tr>
                                                            <th class="fw-bold" style="font-size: 14px;color: #7A7A7A;">STUDENT</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">STATUS</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">REMARKS</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">DATE</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabe-2" class="tabe">
                                                        @foreach($entries['make_ups'] as $makeUp)
                                                            <tr>
                                                                <td class="fw-normal" style="background: #F5F5F5;border-top-left-radius: 8px;border-bottom-left-radius: 8px;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ optional($makeUp['user'])['name'] }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ $makeUp['status_label'] }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ $makeUp['remarks'] }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ formatDate($makeUp['created_at']) }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;text-align: center;border-top-right-radius: 8px;border-bottom-right-radius: 8px;">
                                                                    <a href="{{ route('wave.user.admin-main.request') }}" style="color: #409FFF; text-decoration: underline; font-weight: 400; font-size: 15px;">View</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="tab-4" class="tab-pane" role="tabpanel">
                                            <div class="table-responsive table mt-2 tabe" id="dataTable-4" role="grid" aria-describedby="dataTable_info">
                                                <table class="table my-0 course-table" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="fw-bold" style="font-size: 14px;color: #7A7A7A;">STUDENT</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">STATUS</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">REMARKS</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">DATE</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabe-3" class="tabe">
                                                        @foreach($entries['courses'] as $course)
                                                            <tr>
                                                                @if( $course['user'] )
                                                                    <td class="fw-normal" style="background: #F5F5F5;border-top-left-radius: 8px;border-bottom-left-radius: 8px;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ optional($course['user'])['name'] }}</td>
                                                                @else
                                                                    <td class="fw-normal" style="background: #F5F5F5;border-top-left-radius: 8px;border-bottom-left-radius: 8px;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">-</td>
                                                                @endif
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ $course['status_label'] }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ $course['remarks'] }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ formatDate($course['created_at']) }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;text-align: center;border-top-right-radius: 8px;border-bottom-right-radius: 8px;">
                                                                    <a href="{{ route('wave.user.admin-main.request') }}" style="color: #409FFF; text-decoration: underline; font-weight: 400; font-size: 15px;">View</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="tab-5" class="tab-pane" role="tabpanel">
                                            <div class="table-responsive table mt-2 tabe" id="dataTable-4" role="grid" aria-describedby="dataTable_info">
                                                <table class="table my-0 enquiry-table" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="fw-bold" style="font-size: 14px;color: #7A7A7A;">NAME</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">MESSAGE</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">COURSE</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">DATE</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;">STATUS</th>
                                                            <th style="font-size: 14px;color: #7A7A7A;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tabe-3" class="tabe">
                                                        @foreach($entries['enquiries'] as $enquiry)
                                                            <tr>
                                                                <td class="fw-normal" style="background: #F5F5F5;border-top-left-radius: 8px;border-bottom-left-radius: 8px;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ optional($enquiry['user'])['name'] }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ $enquiry['message'] }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ $enquiry['course'] ? optional($enquiry['course'])['course_abbreviation'] : '-' }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ formatDate($enquiry['created_at']) }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;">{{ $enquiry['status_label'] }}</td>
                                                                <td style="background: #F5F5F5;color: #3B3B3B;font-size: 15px;height: 72px;vertical-align: middle;text-align: center;border-top-right-radius: 8px;border-bottom-right-radius: 8px;">
                                                                    <a href="{{ route('wave.user.admin-main.request') }}" style="color: #409FFF; text-decoration: underline; font-weight: 400; font-size: 15px;">View</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="col">
                            <div>
                                <h1 class="fw-semibold" style="color: #3B3B3B;font-size: 28px;font-family: Poppins, sans-serif;">Transactions</h1>
                            </div>
                        </div>
                        <div class="col">
                            <ul class="list-group" style="border-style: none;">
                                @if( count($entries['transactions']) > 0 )
                                    @foreach( $entries['transactions'] as $transaction )
                                        <li class="list-group-item" style="border-style: none;">
                                            <div class="row" style="align-items: center;">
                                                <div class="col-auto" style="padding: 0px; width: 40px; height: 40px; overflow:hidden; border-radius: 5px; background: #4a5c7a33;">
                                                    <img src="{{ optional($transaction['user'])['image_path'] }}" style="width: 100%; object-fit:cover;">
                                                </div>
                                                <div class="col-auto" style="padding-right: 0px;">
                                                    <h1 style="font-size: 14px;color: #3B3B3B;">{{ optional($transaction['user'])['name'] }}</h1>
                                                    <h1 style="font-size: 12px;color: #7A7A7A;">{{ formatDate($transaction['date'], 'h:i A m/d/y') }}</h1>
                                                </div>
                                                <div class="col" style="text-align: right;">
                                                    @if(! $transaction['is_refund'] )
                                                        <h1 style="font-size: 14px;color: #3DCC79;">+${{ $transaction['total'] }}</h1>
                                                        <h1 style="font-size: 12px;color: #7A7A7A;">({{ ucfirst($transaction['type']) }}) Payment</h1>
                                                    @else
                                                        <h1 style="font-size: 14px;color: #FD7972;">-${{ $transaction['total'] }}</h1>
                                                        <h1 style="font-size: 12px;color: #7A7A7A;">Refund</h1>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li>
                                        <p>No transaction available</p>
                                    </li>
                                @endif
                                
                                <!-- <li class="list-group-item" style="border-style: none;">
                                    <div class="row">
                                        <div class="col-auto" style="padding: 0px;"><img src="{{ asset('themes/tailwind/images/clipboard-image-27.png') }}" style="width: 40px;"></div>
                                        <div class="col-auto" style="padding-right: 0px;">
                                            <h1 style="font-size: 14px;color: #3B3B3B;">Debra Wilson</h1>
                                            <h1 style="font-size: 12px;color: #7A7A7A;">09:45 AM&nbsp;—&nbsp;19/08/2022</h1>
                                        </div>
                                        <div class="col" style="text-align: right;">
                                            <h1 style="font-size: 14px;color: #FD7972;">-$850</h1>
                                            <h1 style="font-size: 12px;color: #7A7A7A;">Payment</h1>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item" style="border-style: none;">
                                    <div class="row">
                                        <div class="col-auto" style="padding: 0px;"><img src="{{ asset('themes/tailwind/images/clipboard-image-28.png') }}" style="width: 40px;"></div>
                                        <div class="col-auto" style="padding-right: 0px;">
                                            <h1 style="font-size: 14px;color: #3B3B3B;">Judith Black</h1>
                                            <h1 style="font-size: 12px;color: #7A7A7A;">10:15 AM&nbsp;—&nbsp;20/08/2022</h1>
                                        </div>
                                        <div class="col" style="text-align: right;">
                                            <h1 style="font-size: 14px;color: #3DCC79;">+$2.050</h1>
                                            <h1 style="font-size: 12px;color: #7A7A7A;">Payment</h1>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item" style="border-style: none;">
                                    <div class="row">
                                        <div class="col-auto" style="padding: 0px;"><img src="{{ asset('themes/tailwind/images/clipboard-image-29.png') }}" style="width: 40px;"></div>
                                        <div class="col-auto" style="padding-right: 0px;">
                                            <h1 style="font-size: 14px;color: #3B3B3B;">Philip Henry</h1>
                                            <h1 style="font-size: 12px;color: #7A7A7A;">10:50 AM&nbsp;—&nbsp;23/08/2022</h1>
                                        </div>
                                        <div class="col" style="text-align: right;">
                                            <h1 style="font-size: 14px;color: #3DCC79;">+$650</h1>
                                            <h1 style="font-size: 12px;color: #7A7A7A;">Payment</h1>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item" style="border-style: none;">
                                    <div class="row">
                                        <div class="col-auto" style="padding: 0px;"><img src="{{ asset('themes/tailwind/images/clipboard-image-30.png') }}" style="width: 40px;"></div>
                                        <div class="col-auto" style="padding-right: 0px;">
                                            <h1 style="font-size: 14px;color: #3B3B3B;">Mitchell Cooper</h1>
                                            <h1 style="font-size: 12px;color: #7A7A7A;">12:45 AM&nbsp;—&nbsp;25/08/2022</h1>
                                        </div>
                                        <div class="col" style="text-align: right;">
                                            <h1 style="font-size: 14px;color: #3DCC79;">+$900</h1>
                                            <h1 style="font-size: 12px;color: #7A7A7A;">Payment</h1>
                                        </div>
                                    </div>
                                </li> -->
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .nav-link.active {
        color: #409FFF !important;
    }

    .nav-link {
        color: #7A7A7A !important;
        font-weight: 600;
        font-size: 14px;
    }
</style>

@section('script')
<script>
    $(function() {
        var allNoticeBoard = $('.all-notice_board').DataTable({
			"paging": true,
			"ordering": true,
			"info": true,
			"aaSorting": [],
			"orderMulti": true,
		});

        var allNoticeBoard = $('.enrollment-table').DataTable({
			"paging": true,
			"ordering": true,
			"info": true,
			"aaSorting": [],
			"orderMulti": true,
		});

        var allNoticeBoard = $('.makeup-table').DataTable({
			"paging": true,
			"ordering": true,
			"info": true,
			"aaSorting": [],
			"orderMulti": true,
		});
        
        var allNoticeBoard = $('.enquiry-table').DataTable({
			"paging": true,
			"ordering": true,
			"info": true,
			"aaSorting": [],
			"orderMulti": true,
		});

        var allNoticeBoard = $('.course-table').DataTable({
			"paging": true,
			"ordering": true,
			"info": true,
			"aaSorting": [],
			"orderMulti": true,
		});
    })
</script>
@endsection