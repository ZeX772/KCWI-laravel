<div class="row pl-3">
    <!-- Table List -->
    <div class="col-9 page-content-col">
        <div class="tab-content p-3 pt-4">
            <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
            <div class="table-responsive table-custom with-custom-search mt-4">
                <table class="table table-hover w-100" id="course-enrollment-table">
                    <thead>
                        <tr>
                            <th class="text-left"><input type="checkbox"></th>
                            <th class="text-left">#</th>
                            <th class="text-left">ENTRIES DATE & TIME</th>
                            <th class="text-left">NAME</th>
                            <th class="text-left">INVOICE NO.</th>
                            <th class="text-left">PHONE</th>
                            <th class="text-left">STATUS</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courseEnrollements as $course_enrollement)
                        <tr data-id="{{ $course_enrollement['id'] }}">
                            <td><input type="checkbox"></td>
                            <td>{{ $course_enrollement['id'] }}</td>
                            <td>{{ formatDate($course_enrollement['created_at']) }}</td>
                            <td>{{ optional($course_enrollement['user'])['name'] }}</td>
                            <td>{{ $course_enrollement['invoice'] ?? '-' }}</td>
                            <td>{{ optional($course_enrollement['user']['student_information'] ?? '-')['phone']}}</td>
                            <td class="status-color_{{ $course_enrollement['status'] }}">{{ $course_enrollement['status_label'] }}</td>
                            <td>
                                <div>
                                    <button type="button" class="view-button" id="view-btn" data-row_id="{{ $course_enrollement['id'] }}" data-bs-toggle="modal" data-bs-target="#enrollment-record-modal">
                                        <x-svg-icon icon="view" width="20" height="20" />
                                    </button>
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
                        <h1 class="fw-semibold card-heading text-center">Requests</h1>
                    </div>
                </div>
                <div class="mb-3">
                    <h1 class="fw-semibold card-sub_heading">INFORMATION</h1>
                </div>
                <div class="col border-bottom">
                    <ul class="list-group border-none">
                        <li class="list-group-item d-xxl-flex p-0" style="border-style: none;">
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
                                        <h1 class="card-detail_title">#</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-id" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Date & Time</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-created_at" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Entries Form</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-entries_form" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Name</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-name" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Phone</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-phone" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Modified by</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-modified_by" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <h1 class="card-detail_title">Modified Date</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="detail-updated_at" class="card-detail_sub_title">-</h1>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col mt-4">
                    <div class="col-md-12 mb-3">
                        <h1 class="card-detail_title">Notes</h1>
                    </div>
                    <div class="col-md-12">
                        <h1 id="detail-updated_at" class="card-detail_sub_title">For the Reservation, please check the payment in “Accounting”.</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="enrollment-record-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Enrollment Records</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div>
                    <div class="accordion" id="course-detail_container">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Course Details
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body pl-0 pr-0">
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Enrollment type</dd>
                                        <dd class="col-sm-9" id="course-detail_type">Full Term Enrollment</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Course Code</dd>
                                        <dd class="col-sm-9" id="course-detail_code">VSA-RS2-0001</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Level</dd>
                                        <dd class="col-sm-9" id="course-detail_level">Ripple Starter 2</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Venue</dd>
                                        <dd class="col-sm-9" id="course-detail_venue">VSA</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Facility</dd>
                                        <dd class="col-sm-9" id="course-detail_facility">VSA Main Pool</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Date</dd>
                                        <dd class="col-sm-9" id="course-detail_dates">04/02, 11/02, 18/02, 25/02</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Time</dd>
                                        <dd class="col-sm-9" id="course-detail_time">08:00 - 08:45</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Coach</dd>
                                        <dd class="col-sm-9" id="course-detail_coachs">Coach Ng</dd>
                                    </dl>
                                    <dl class="row mb-2">
                                        <dd class="col-sm-3">Course Category</dd>
                                        <dd class="col-sm-9" id="course-detail_category">Group</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="accordion-without-dropdown_container">
                        <div>
                            <h2>Student Details</h2>
                            <div class="detail_body">
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Student Name</dd>
                                    <dd class="col-sm-9" id="student-detail_name">Ethan Ng</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Student ID</dd>
                                    <dd class="col-sm-9" id="student-detail_student_id">C100431</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Phone</dd>
                                    <dd class="col-sm-9" id="student-detail_phone">6999 9999</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div id="accordion-without-dropdown_container">
                        <div>
                            <h2>Payment</h2>
                            <div class="detail_body">
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Total fee (HK$)</dd>
                                    <dd class="col-sm-9" id="course-detail_fee">1,860</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Status</dd>
                                    <dd class="col-sm-9" id="course-payment_status">Pending</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Payment Method</dd>
                                    <dd class="col-sm-9" id="course-payment_method">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Date of Payment</dd>
                                    <dd class="col-sm-9" id="course-payment_date">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Attachment</dd>
                                    <dd class="col-sm-9" id="course-payment_attachment">-</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Remarks</dd>
                                    <dd class="col-sm-9" id="course-payment_remarks">-</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div id="accordion-without-dropdown_container">
                        <div>
                            <h2>Others</h2>
                            <div class="detail_body">
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">#</dd>
                                    <dd class="col-sm-9" id="course-enrollment-detail_id">00000010</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Status</dd>
                                    <dd class="col-sm-9" id="course-enrollment-detail_status">Processing</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Entries Date & Time</dd>
                                    <dd class="col-sm-9" id="course-enrollment-detail_created_at">12/4/2022 11:00</dd>
                                </dl>
                                <dl class="row mb-2">
                                    <dd class="col-sm-3">Entries Form</dd>
                                    <dd class="col-sm-9" id="course-enrollment-detail_entry_type">Website</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <form id="form-container">
                        <div class="container form-input-container mb-3">
                            <label class="form-label" style="color: #636363;font-size: 14px;">Following Action <span class="text-danger">*</span></label>
                            <div class="row radio-group">
                                <div class='col-4'>
                                    <label for="approved">
                                        <span>Approved</span>
                                        <input type="radio" name="status" value="approved" id="approved" checked>
                                    </label>
                                </div>
                                <div class='col-4'>
                                    <label for="waiting_list">
                                        <span>Wating List</span>
                                        <input type="radio" name="status" value="waiting_list" id="waiting_list">
                                    </label>
                                </div>
                                <div class='col-4'>
                                    <label for="reject">
                                        <span>Reject</span>
                                        <input type="radio" name="status" value="rejected" id="reject">
                                    </label>
                                </div>
                            </div>
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
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal" />
                <x-primary-button type="button" color="primary" id="process-submit" title="Submit" toggle="" target="" />
            </div>
        </div>
    </div>
</div>

<style>
    /* #course-enrollment-table_wrapper .row:nth-child(2) {
        min-height: calc(100vh - 50vh) !important;
        max-height: calc(100vh - 50vh) !important;
    } */

    /* .main-page_normal_card_info {
        min-height: calc(100vh - 32vh) !important;
        max-height: calc(100vh - 32vh) !important;
    } */

    .course-enrollment-tab .card {
        border: none;
        border-radius: 0;
        border-left: 1px solid #e8e8e8 !important;
    }

    #course-detail_container .accordion-item {
        display: contents;
    }

    #course-detail_container .accordion-button {
        border-radius: 0;
        background-color: transparent;
        padding-left: 0;
        padding-right: 0;
        padding-bottom: 10px;
        color: #4A5C7A;
        font-size: 20px;
        font-weight: 500;
    }

    #course-detail_container .accordion-button::after {
        background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='currentColor'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>");
    }

    #course-detail_container .accordion-body {
        padding: 20px 0 20px 0;
    }

    #accordion-without-dropdown_container h2 {
        padding: 10px 0 10px 0;
        color: #4A5C7A;
        font-size: 20px;
        font-weight: 500;
        border-bottom: 1px solid #e8e8e8;
    }

    #accordion-without-dropdown_container .detail_body {
        padding: 20px 0 20px 0;
    }

    #form-container {
        padding: 20px 0 20px 0;
        border-top: 1px solid #e8e8e8;
    }

    dd.col-sm-3 {
        font-size: 14px;
        font-weight: 400;
        line-height: 21px;
        color: #636363;
    }

    dd.col-sm-9 {
        font-size: 14px;
        font-weight: 400;
        line-height: 21px;
        color: #3B3B3B;
    }

    #form-container .radio-group label {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 13px 10px;
        border-radius: 8px;
        background-color: #F5F5F5;
        font-size: 14px;
        font-weight: 400;
    }
</style>

<script type="text/javascript">
    $(function() {
        var courseEnrollmentTable = $('.course-enrollment-tab table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "columnDefs": [{
                targets: [0, 5, 7],
                orderable: false
            }]
        });

        // Event listener for custom search input
        $('.course-enrollment-tab').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            courseEnrollmentTable.search(searchTerm).draw();
        });

        var selectedData = {};

        $('#course-enrollment-table tbody').on('click', 'tr', function() {
            const dataID = $(this).data('id');

            const data = <?= json_encode($courseEnrollements) ?>;
            const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;

            $('#info-status').empty();
            $('#info-status').append(`<span class="status-color_${rowData.status}">${rowData.status_label}</span>`);
            $('#info-id').text(rowData.id);
            $('#info-created_at').text(rowData.created_at);
            $('#info-entries_form').text(rowData.entries_form ?? 'Website');
            $('#info-name').text(rowData.user.name);
            $('#info-phone').text(rowData.user.student_information.phone);

            $('#detail-modified_by').text(rowData.log ? rowData.log.user.name : '-');
            $('#detail-updated_at').text(rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-');
        });

        $('#course-enrollment-table').on('click', '.view-button', function() {
            const rowID = $(this).data('row_id');
            const courseEnrollments = <?= json_encode($courseEnrollements) ?>;
            const courseEnrollment = courseEnrollments.find(value => value.id == rowID);

            selectedData = courseEnrollment;
            console.log(courseEnrollment);

            // COURSE DETAILS
            $('#course-detail_type').text(courseEnrollment.type_label);
            $('#course-detail_code').text(courseEnrollment.package.course.course_abbreviation);
            $('#course-detail_level').text(courseEnrollment.package.course.level.name);
            $('#course-detail_venue').text(courseEnrollment.package.school_venue.name);
            $('#course-detail_facility').text(courseEnrollment.package.school_venue_facility.name);

            let courseDates = "";
            let courseTime = "";
            courseEnrollment.all_filtered_student_classes.forEach(element => {
                courseDates += `<p><b>${element.class.course_class_code}:</b><br/> ${element.class.start_date}</p>`;
                courseTime += `<p><b>${element.class.course_class_code}:</b><br/> ${element.class.start_time} - ${element.class.end_time ?? '?'}</p>`;
            });
            $('#course-detail_dates').empty();
            $('#course-detail_time').empty();
            $('#course-detail_dates').append(`<div>${courseDates}</div>`);
            $('#course-detail_time').append(`<div>${courseTime}</div>`);

            $('#course-detail_coachs').empty();
            let coaches = '';
            courseEnrollment.package.course.coaches.forEach(element => {
                coaches += `<p>${element.name}</p>`;
            });
            $('#course-detail_coachs').append(coaches);
            $('#course-detail_category').text(courseEnrollment.package.course.course_type.name);

            // STUDENT DETAILS
            $('#student-detail_name').text(courseEnrollment.user.name);
            $('#student-detail_student_id').text(courseEnrollment.user.student_information.student_id);
            $('#student-detail_phone').text(courseEnrollment.user.student_information.phone);

            // PAYMENT DETAILS
            $('#course-detail_fee').text(courseEnrollment.package.course.class_full_price);
            if( courseEnrollment.payment ){
                $('#course-payment_status').text(ucfirst(courseEnrollment.payment.status));
                $('#course-payment_method').text(courseEnrollment.payment.payment_method == 'token' ? 'Card' : courseEnrollment.payment.payment_method);
                $('#course-payment_date').text(courseEnrollment.payment.payment_date);
                $('#course-payment_attachment').text(courseEnrollment.payment.attachment ? '-' : '-');
                $('#course-payment_remarks').text(courseEnrollment.payment.remarks ? courseEnrollment.payment.remarks : '-');
            }

            // OTHER DETAILS
            $('#course-enrollment-detail_id').text(courseEnrollment.invoice ?? '-');
            $('#course-enrollment-detail_status').empty();
            $('#course-enrollment-detail_status').append(`<span class="status-color_${courseEnrollment.status}">${courseEnrollment.status_label}</span>`);
            $('#course-enrollment-detail_created_at').text(courseEnrollment.created_at);
            $('#course-enrollment-detail_entry_type').text(courseEnrollment.entries_form ?? 'Website');

            $('#enrollment-record-modal [name=remarks]').val(courseEnrollment.remarks);

        })

        $('#enrollment-record-modal').on('click', '#process-submit', async function() {
            $(this).attr('disabled', 'true');

            // get user token
            const userToken = getUserToken();

            // Prepare Data
            const formData = $('#enrollment-record-modal #form-container').serializeArray();

            const requiredFields = ['remarks'];

            if (processErrorValidation(formData, requiredFields)) {
                $(this).removeAttr('disabled');

                return;
            }

            let transformedData = {};

            formData.forEach(function(item) {
                transformedData[item.name] = item.value;
            });

            transformedData['id'] = selectedData.id;

            await axios.post(`${getApiUrl()}/request/course-enrollment-response`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#enrollment-record-modal #cancel-btn').click();

                    if (res.data.success) {
                        toastTopEnd("Success", res.data.message, "success");

                        window.location = window.location
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");

                        $(this).removeAttr('disabled');
                    }
                })
                .catch(error => {
                    $(this).removeAttr('disabled');

                    if (error.response.status == 400 || error.response.status == 422) {
                        let errorMessages = "";
                        Object.keys(error.response.data.errors).forEach(key => {
                            error.response.data.errors[key].forEach(value => {
                                errorMessages += (`<p>${key}: ` + value + '</p><br>')

                                toastTopEnd("Cant' Process", errorMessages, "warning", errorMessages, 5000);
                            });
                        });
                    }

                    if (error.response.status == 404) {
                        toastTopEnd("Cant' Process", error.response.data.message, "warning");
                    }

                    if (error.response.status == 500) {
                        toastTopEnd("System Error", error.response.data.message, "error");
                    }

                    if (error.response.status == 401) {
                        alert("Your session expired!");
                        window.location = window.location;
                    }

                    console.error('Error fetching data:', error);
                });
        });

        // Error Validations
        function processErrorValidation(formData, requiredFields) {
            errors = [];

            formData.forEach(function(item) {
                if (requiredFields.includes(item.name)) {
                    if (item.value == "") {
                        errors.push({
                            field_name: item.name,
                            message: formatString(item.name) + " is required."
                        });
                    }
                }
            });

            if (errors.length > 0) {
                renderErrors();

                return true;
            }

            return false;
        }

        function renderErrors() {
            if (errors.length > 0) {
                const hasParentFields = ['start_date'];

                errors.forEach((element) => {
                    const fieldSelector = $(`[name="${element.field_name}"]`);
                    // Clear the errors first
                    fieldSelector.removeClass('border border-danger');
                    fieldSelector.parent().removeClass('border border-danger');

                    if (fieldSelector.next().is('p'))
                        fieldSelector.next().remove();

                    if (fieldSelector.parent().next().is('p'))
                        fieldSelector.parent().next().remove();

                    if (!hasParentFields.includes(element.field_name)) {
                        fieldSelector.addClass('border border-danger');
                        fieldSelector.after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
                    } else {
                        fieldSelector.parent().addClass('border border-danger');
                        fieldSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
                    }
                });
            }
        }

        function formatString(inputString) {
            // Split the string into words using underscores as separators
            let words = inputString.split('_');

            // Capitalize the first letter of each word
            let capitalizedWords = words.map(word => word.charAt(0).toUpperCase() + word.slice(1));

            // Join the words back together with a space between them
            let formattedString = capitalizedWords.join(' ');

            return formattedString;
        }
    });
</script>