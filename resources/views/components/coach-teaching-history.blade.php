<div>
    <div class="row pl-3 main-list">
        <!-- Table List -->
        <div class="col-9 page-content-col">
            <div class="p-3 pt-1">
                <div class="row teaching-history-custom-filter">
                    <div class="col-5 position-relative d-flex align-items-end">
                        <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
                    </div>
                    <div class="col-7">
                        <div class="d-flex gap-3">
                            <x-form-input 
                                label="Start Date" 
                                type="date" 
                                name="start_date"
                                id="start_date"
                                isRequired="false"
                            />
                            <x-form-input 
                                label="End Date" 
                                type="date" 
                                name="end_date"
                                id="end_date"
                                isRequired="false"
                            />
                            <div class="d-flex align-items-end" style="width: 450px">
                                <x-form-select label="" name="action" id="bulk_action_btn" isRequired="true">
                                    <option value="" hidden>Coach</option>
                                    @foreach( $coaches as $coach )
                                        <option value="{{ $coach['id'] }}" <?= $entry['id'] == $coach['id'] ? 'selected' : '' ?>>{{ $coach['name'] }}</option>
                                    @endforeach
                                </x-form-select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-custom with-custom-search mt-4">
                    <table class="table table-hover w-100" id="coach-teaching-history_table">
                        <thead>
                            <tr>
                                <!-- <th class="text-left"><input type="checkbox" class="check-all"></th> -->
                                <th class="text-left">COURSE CODE</th>
                                <th class="text-left">DATE</th>
                                <th class="text-left">ATTENDANCE</th>
                                <th class="text-left">STANDARD PAY SCALE</th>
                                <th class="text-left">STATUS</th>
                                <th class="text-left">PAYMENT DATE</th>
                                <th class="text-center" style="width: 50px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachingHistory as $data)
                                <tr data-id="{{ $data['id'] }}">
                                    <!-- <td class="text-left"><input type="checkbox" class="check-all"></td> -->
                                    <td class="text-left">{{ $data['course']['course_abbreviation'] }}</td>
                                    <td class="text-left">{{ formatDate($data['start_date'], 'd/m/Y') }}</td>
                                    <td class="text-left">{{ $data['attendance'] ? $data['attendance']['status'] : '-' }}</td>
                                    <td class="text-left">{{ $data['course']['course_full_price'] }}</td>
                                    <td class="text-left">{{ $data['payroll_class'] ? ucfirst(optional($data['payroll_class']['payroll'])['formatted_status']) : '-' }}</td>
                                    <td class="text-left">{{ $data['payroll_class'] ? formatDate(optional($data['payroll_class']['payroll'])['pay_date'], 'd/m/Y') : '-' }}</td>
                                    <td class="text-center">
                                        <div>
                                            <a href="" class="d-flex align-items-center justify-content-center cursor-pointer view-btn" data-id="{{ $data['id'] }}" style="margin: 0 !important; height: 20px;">
                                                <x-svg-icon icon="view" width="20" height="20" />
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Table Information -->
        <div class="col-3">
            <div class="card">
                <div class="card-body main-page_normal_card_info">
                    <div class="col mb-4">
                        <div>
                            <h1 class="fw-semibold card-heading text-center">Course</h1>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h1 class="fw-semibold card-sub_heading">INFORMATION</h1>
                    </div>
                    <div class="col">
                        <ul class="list-group border-none">
                            <li class="list-group-item d-xxl-flex p-0 border-bottom" style="border-style: none;">
                                <div class="container p-0">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Status</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-status" class="card-detail_sub_title text-success">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Course Code</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-course_code" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Date</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-date" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Attendance</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-attendance" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Standard Pay Scale</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-pay_scale" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Status</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-payment_status" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Payment Date</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-payment_date" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Modified by</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-modified_by" class="card-detail_modified_by">-</h1>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <h1 class="card-detail_title">Modified Date</h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h1 id="info-updated_at" class="card-detail_sub_title">-</h1>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex justify-content-center mt-3">
                                <x-primary-button type="button" id="generate-report_btn" title="Generate Report" toggle="" target=""/>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pl-3 content-list d-none">
        <!-- Table List -->
        <div class="col-12 page-content-col">
            <div class="p-3 pt-4">
                <div class="row placed-vide-custom-filter">
                    <div class="d-flex justify-content-between">
                        <h5 style="font-size: 20px; font-weight: 500;" class="filtered-history_date">Teaching History (<span class="filter-start_date">1/7/2022</span> - <span class="filter-end_date">31/7/2022</span>)</h5>
                        <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                    </div>
                    
                    <div class="col-6 mt-3">
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size: 14px; font-weight: 500;">Total working class(es): <span style="font-size: 14px; font-weight: 300;">6/8</span></p>
                            </div>
                            <div class="col-6">
                                <p style="font-size: 14px; font-weight: 500;">Coach: <span style="font-size: 14px; font-weight: 300;">Coach NG</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-custom with-custom-search mt-4">
                    <table class="table table-hover w-100" id="coach-teaching-history_content">
                        <thead>
                            <tr>
                                <th class="text-left">COURSE CODE</th>
                                <th class="text-left">DATE</th>
                                <th class="text-left">ATTENDANCE</th>
                                <th class="text-left">STANDARD PAY SCALE</th>
                                <th class="text-left">STATUS</th>
                                <th class="text-left">PAYMENT DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">VSA-RS1-0001</td>
                                <td class="text-left">6/7/2022</td>
                                <td class="text-left">Present</td>
                                <td class="text-left">$200</td>
                                <td class="text-left">Paid</td>
                                <td class="text-left">31/7/2022</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        var customTable = $('#coach-teaching-history_table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "aoColumnDefs": mSortingString,
            "columnDefs": [{
                    targets: [6],
                    orderable: false
            }]
        });

        $('.teaching-history_tab').on('click', '.view-btn', function(e){
            e.preventDefault();

            const id = $(this).data('id');
            const rowData = <?= json_encode($teachingHistory) ?>;
            const selectedData = rowData.find(value => value.id == id);
            
            $('#info-status').text(selectedData.course.course_status);
            $('#info-course_code').text(selectedData.course.course_abbreviation);
            $('#info-date').text(moment(selectedData.start_date).format('DD/MM/YYYY'));
            $('#info-attendance').text(selectedData.attendance ? selectedData.attendance.status : '-');
            $('#info-pay_scale').text(selectedData.course.course_full_price);
            $('#info-payment_status').text(selectedData.payroll_class ? selectedData.payroll_class.payroll.formatted_status : '-');
            $('#info-payment_date').text(selectedData.payroll_class ? moment(selectedData.payroll_class.payroll.pay_date).format('DD/MM/YYYY') : '-');

            $('#info-modified_by').text(selectedData.log ? (selectedData.log.user ? selectedData.log.user.name : '-') : '-');
            $('#info-updated_at').text(selectedData.log ? selectedData.log.updated_at : '-');
        });

        $('.content-list').on('click', '#cancel-btn', function(){
            $('.teaching-history_tab .main-list').removeClass('d-none');
            $('.teaching-history_tab .content-list').addClass('d-none');

            $('.teaching-history-custom-filter input[name=start_date]').val("");
            $('.teaching-history-custom-filter input[name=end_date]').val("");
        });

        $('.teaching-history-custom-filter').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            customTable.search(searchTerm).draw();
        });

        $('.teaching-history-custom-filter').on('change', 'input[name=start_date]', function() {
            const startDateValue = $(this).val();
            const endDateValue = $('.teaching-history-custom-filter input[name=end_date]').val();

            if( startDateValue != "" && endDateValue != "" ) {
                $('.teaching-history_tab .main-list').addClass('d-none');
                $('.teaching-history_tab .content-list').removeClass('d-none');

                $('.filtered-history_date .filter-start_date').text(moment(startDateValue).format('DD/MM/YYYY'));
                $('.filtered-history_date .filter-end_date').text(moment(endDateValue).format('DD/MM/YYYY'));

                filterTeachingHistoryContent();
            }
        })

        $('.teaching-history-custom-filter').on('change', 'input[name=end_date]', function() {
            const endDateValue = $(this).val();
            const startDateValue = $('.teaching-history-custom-filter input[name=start_date]').val();

            if( startDateValue != "" && endDateValue != "" ) {
                $('.teaching-history_tab .main-list').addClass('d-none');
                $('.teaching-history_tab .content-list').removeClass('d-none');

                $('.filtered-history_date .filter-start_date').text(startDateValue);
                $('.filtered-history_date .filter-end_date').text(endDateValue);

                filterTeachingHistoryContent();
            }
        });

        $('.teaching-history-custom-filter').on('change', 'select[name=action]', function() {
            const id = $(this).val();
            console.log(id)
            window.location = window.location.origin + `/admin-main/coach/${id}/show`
        });

        function filterTeachingHistoryContent()
        {
            const rowData = <?= json_encode($teachingHistory) ?>;

            // Define the start date and end date of the range using Moment.js
            const startDateValue = $('.teaching-history-custom-filter input[name=start_date]').val();
            const endDateValue = $('.teaching-history-custom-filter input[name=end_date]').val();
            const startDate = moment(startDateValue);
            const endDate = moment(endDateValue);

            // Filter the array based on the date range
            const filteredPayments = rowData.filter(payment => {
                console.log("payment:: ", payment);
                // if( payment.payroll_class ) {
                    // const paymentDate = moment(payment.payroll_class.payroll.pay_date);
                    const paymentDate = moment(payment.start_date);
                    console.log("paymentDate:: ", paymentDate);
                    console.log("startDate:: ", startDate);
                    console.log("endDate:: ", endDate);
                    return paymentDate.isBetween(startDate, endDate, null, '[]'); // '[]' includes startDate and endDate
                // }

                // return false;
            });

            $('#coach-teaching-history_content tbody').empty();
            let teachingHistoryContentData = '';
            filteredPayments.forEach(element => {
                teachingHistoryContentData += `<tr>
                                <td class="text-left">${element.course.course_abbreviation}</td>
                                <td class="text-left">${moment(element.start_date).format('DD/MM/YYYY')}</td>
                                <td class="text-left">${element.attendance ? element.attendance.status : '-'}</td>
                                <td class="text-left">${"$"+element.course.course_full_price}</td>
                                <td class="text-left">${element.payroll_class ? element.payroll_class.payroll.formatted_status : '-'}</td>
                                <td class="text-left">${element.payroll_class ? moment(element.payroll_class.payroll.pay_date).format('DD/MM/YYYY') : '-'}</td>
                            </tr>`;
            });
            $('#coach-teaching-history_content tbody').append(teachingHistoryContentData);
        }

        // Generate report
        $('.main-page_normal_card_info').on('click', '#generate-report_btn', async function(){
            const userToken = getUserToken();

            $(this).prop('disabled', true);
            // Get the current URL
            const url = window.location.pathname;

            // Split the URL by slashes
            const segments = url.split('/');

            // Access the desired segment (index 2)
            const coachId = parseInt(segments.slice(-2, -1)[0]);

            let coaches = [];
            coaches.push({id: coachId});

            let transformedData = {};
            transformedData['coaches'] = [{id: coachId}];
            transformedData['from_date'] = "";
            transformedData['to_date'] = "";

            await axios.post(`${getApiUrl()}/reports/generate-coach-working-hours-excel`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    if ( res.data.success ) {
                        toastTopEnd("Success", "Report generated for this coach", "success");

                        const filePath = res.data.file_path;
                        const a = document.createElement('a');
                        a.href = filePath;
                        a.download = res.data.filename;
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);

                        removeExcelFile(res.data.filename);

                        $(this).removeAttr('disabled');
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");

                        $(this).removeAttr('disabled');
                    }
                }).catch(error => {
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