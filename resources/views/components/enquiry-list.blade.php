<div class="row pl-3">
    <!-- Table List -->
    <div class="col-9 page-content-col">
        <div class="tab-content p-3 pt-4">
            <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
            <div class="table-responsive table-custom with-custom-search mt-4">
                <table class="table table-hover w-100" id="enquiry-table">
                    <thead>
                        <tr>
                            <th class="text-left"><input type="checkbox"></th>
                            <th class="text-left">#</th>
                            <th class="text-left">ENTRIES DATE & TIME</th>
                            <th class="text-left">ENTRIES FROM</th>
                            <th class="text-left">NAME</th>
                            <th class="text-left">PHONE</th>
                            <th class="text-left">STATUS</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enquiriesData as $entry)
                            <tr data-id="{{ $entry['id'] }}">
                                <td><input type="checkbox"></td>
                                <td>{{ $entry['id'] }}</td>
                                <td><p>{{ formatDate($entry['created_at']) }} <br><small>{{ formatTime($entry['created_at']) }}</small></p></td>
                                <td>{{ $entry['entry_from'] }}</td>
                                <td>{{ optional($entry['user'])['name'] ?? '-' }}</td>
                                <td>{{ optional($entry['user']['student_information'])['phone'] }}</td>
                                <td class="status-color_{{ $entry['status'] }}">{{ $entry['status_label'] }}</td>
                                <td>
                                    <div>
                                        <button type="button" class="view-button" id="view-btn" data-row_id="{{ $entry['id'] }}" data-bs-toggle="modal" data-bs-target="#enquiry-modal">
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
                                        <h1 class="card-detail_title">Entries From</h1>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 id="info-entry_from" class="card-detail_sub_title">-</h1>
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
            </div>
        </div>
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="enquiry-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Enquiry Form</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div class="enquiry-details">
                    <div class="detail_body mb-3">
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Status</dd>
                            <dd class="col-sm-9" id="enquiry-status">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">#</dd>
                            <dd class="col-sm-9" id="enquiry-user_id">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Name</dd>
                            <dd class="col-sm-9" id="enquiry-user_name">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Phone</dd>
                            <dd class="col-sm-9" id="enquiry-user_phone">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Email</dd>
                            <dd class="col-sm-9" id="enquiry-user_email">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Selected Course</dd>
                            <dd class="col-sm-9" id="enquiry-user_course">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Message</dd>
                            <dd class="col-sm-9" id="enquiry-user_message">-</dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Entries Date & Time</dd>
                            <dd class="col-sm-9" id="enquiry-date_time"></dd>
                        </dl>
                        <dl class="row mb-2">
                            <dd class="col-sm-3">Entries From</dd>
                            <dd class="col-sm-9" id="enquiry-entries_from"></dd>
                        </dl>
                    </div>
                    <hr>
                    <h3 class="mb-3 mt-3">SETTING</h3>
                    <form id="modal-form">
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <div class="col-5">
                                <x-form-select
                                    label="Status" 
                                    name="status"
                                    id="status"
                                    isRequired="false"
                                >
                                    <option value="" hidden>Select Status</option>
                                    <option value="processing">Processing</option>
                                    <option value="completed">Completed</option>
                                </x-form-select>
                            </div>
                        </div>
                    </form>
                    <div class="container mt-3" style="padding: 0px;color: #636363">
                        <div class="form-inline">
                            <div class="form-group">
                                <label class="form-label" style="color: #636363;font-size: 14px;">Reply <span class="text-danger">*</span></label>
                                <textarea name="reply" class="form-control" id="reply-content" placeholder="Your reply here..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <div class="cancel-btn_container">
                    <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                </div>
                <div class="submit-btn_container">
                    <x-primary-button type="button" color="primary" id="process-submit" title="Submit" toggle="" target=""/>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* #enquiry-table_wrapper .row:nth-child(2) {
        min-height: calc(100vh - 50vh) !important;
        max-height: calc(100vh - 50vh) !important;
    }

    .main-page_normal_card_info {
        min-height: calc(100vh - 32vh) !important;
        max-height: calc(100vh - 32vh) !important;
    } */

    .enquiry-tab .card {
        border: none;
        border-radius: 0;
        border-left: 1px solid #e8e8e8 !important;
    }

    #class-detail_container .accordion-item {
        display: contents;
    }

    #class-detail_container .accordion-button {
        border-radius: 0;
        background-color: transparent;
        padding-left: 0;
        padding-right: 0;
        padding-bottom: 10px;
        color: #4A5C7A;
        font-size: 20px;
        font-weight: 500;
    }

    #class-detail_container .accordion-button::after {
        background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='currentColor'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>");
    }

    #class-detail_container .accordion-body{
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

    .disabled {
        background-color: #f5f5f5 !important;
        opacity: 50% !important;
    }
</style>

<script type="text/javascript">
    $(function() {
        var enquiryTable = $('.enquiry-tab table').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "aaSorting": [],
            "orderMulti": true,
            "columnDefs": [
                {
                    targets: [0,3,5,7],
                    orderable: false
                }
            ]
        });

        tinymce.init({
            selector: '#reply-content',
            height: 300,
            auto_focus: '#tinymce'
            // other configuration options...
        });

        // Event listener for custom search input
        $('.enquiry-tab').on('keyup', 'input[name=custom-table_search]', function() {
            var searchTerm = $(this).val();

            enquiryTable.search(searchTerm).draw();
        });

        var selectedData = {};

        $('.enquiry-tab #enquiry-table tbody').on('click', 'tr', function() {
			const dataID = $(this).data('id');
            
 			const data = <?= json_encode($enquiriesData) ?>;
			const rowData = data.find(value => value.id == dataID);

            selectedData = rowData;
            $('.enquiry-tab #info-status').empty(); 
            $('.enquiry-tab #info-status').append(`<span class="status-color_${rowData.status}">${rowData.status_label}</span>`);
            $('.enquiry-tab #info-id').text( rowData.id );
            $('.enquiry-tab #info-created_at').text( rowData.created_at );
            $('.enquiry-tab #info-entry_from').text( rowData.entry_from );
            $('.enquiry-tab #info-name').text( rowData.user.name );
            $('.enquiry-tab #info-phone').text( rowData.user.student_information.phone );

            $('.enquiry-tab #detail-modified_by').text( rowData.log ? rowData.log.user.name : '-' );
            $('.enquiry-tab #detail-updated_at').text( rowData.log ? moment(rowData.log.created_at).format('MM/DD/YYYY h:mm A') : '-' );
 		});

        $('.enquiry-tab #enquiry-table').on('click', '.view-button', function() {
            const rowID = $(this).data('row_id');
            const entriesData = <?= json_encode($enquiriesData) ?>;
            const enquiry = entriesData.find(value => value.id == rowID);

            selectedData = enquiry;

            // OTHER DETAILS
            $('.enquiry-tab #enquiry-status').empty();
            $('.enquiry-tab #enquiry-status').append(`<span class="status-color_${enquiry.status}">${enquiry.status_label}</span>`);
            $('.enquiry-tab #enquiry-user_id').text(enquiry.user.student_information.student_id);
            $('.enquiry-tab #enquiry-user_name').text(enquiry.user.name);
            $('.enquiry-tab #enquiry-user_phone').text(enquiry.user.student_information.phone);
            $('.enquiry-tab #enquiry-user_email').text(enquiry.user.email);
            $('.enquiry-tab #enquiry-user_course').text(enquiry.course ? enquiry.course.course_abbreviation : '-');
            $('.enquiry-tab #enquiry-user_message').text(enquiry.message);
            $('.enquiry-tab #enquiry-date_time').text(moment(enquiry.created_at).format('YYYY-MM-DD h:mm A'));
            
            $('.enquiry-tab #enquiry-entries_from').text(enquiry.entry_from);

            $('#enquiry-modal select[name=status]').val(enquiry.status).trigger('change');
            tinymce.get("reply-content").setContent(enquiry.reply);
        });

        $('#enquiry-modal').on('click', '#process-submit', async function(){
            $(this).attr('disabled', 'true');

            // get user token
            const userToken = getUserToken();

            // Prepare Data
            const formData = $('#enquiry-modal #modal-form').serializeArray();

            let requiredFields = ['status', 'reply'];

            if( processErrorValidation(formData, requiredFields) ) {
                $(this).removeAttr('disabled');

                return;
            }

            let transformedData = {};

            formData.forEach(function(item) {
                transformedData[item.name] = item.value;
            });

            const formStatus = $('#enquiry-modal #modal-form select[name=status]').val();

            var replyContent = tinymce.get('reply-content').getContent();
            transformedData['id'] = selectedData.id;
            transformedData['status'] = formStatus;
            transformedData['reply'] = replyContent;

            // $(this).removeAttr('disabled');
            // console.log(transformedData);
            // console.log(selectedData);
            // return;
            await axios.post(`${getApiUrl()}/request/enquiry-response`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
                    }
                }).then(res => {
                    $('#enquiry-modal #cancel-btn').click();

                    if ( res.data.success ) {
                        toastTopEnd("Success", res.data.message, "success");

                        window.location = window.location
                    } else {
                        toastInfo("Cant' Save", res.data.message, "warning");

                        $(this).removeAttr('disabled');
                    }
                })
                .catch(error => {
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

        // Error Validations
        function processErrorValidation(formData, requiredFields) {
			errors = [];

			formData.forEach(function(item) {
				if ( requiredFields.includes(item.name) ) {
					if( item.value == "" ){
						errors.push({
							field_name: item.name,
							message: formatString(item.name) + " is required."
						});
					}
				}
			});

			if ( errors.length > 0 ) {
				renderErrors();

				return true;
			}

			return false;
		}

		function renderErrors() {
			if ( errors.length > 0 ) {
                const hasParentFields = ['class_date', 'start_date'];

				errors.forEach((element) => {
                    const fieldSelector = $(`[name="${element.field_name}"]`);
                    // Clear the errors first
                    fieldSelector.removeClass('border border-danger');
                    fieldSelector.parent().removeClass('border border-danger');

                    if ( fieldSelector.next().is('p') )
                        fieldSelector.next().remove();

                    if ( fieldSelector.parent().next().is('p') )
                        fieldSelector.parent().next().remove();

                    if (! hasParentFields.includes(element.field_name) ) {
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