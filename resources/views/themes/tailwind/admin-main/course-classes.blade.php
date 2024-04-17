@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Classes" 
        withButton="true"
        withIcon="true"
        icon="qr"
        buttonModalTarget="#general-qr-modal" 
        buttonType="button"
        buttonId="general-qr_btn"
        buttonTitle="GENERAL QR"
    />
    <div class="row mt-4">
        <!-- Course Class List | Left - Table Section -->
        <div class="col-xxl-12 page-content-col1">
            <div class="tab-content custom-datatable_container p-3 pt-4">
                <div class="table-responsive table-custom data-table">
                    <table class="table table-hover custom-datatable w-100" id="student-table">
                        <thead>
                            <tr>
                                <th class="text-left"><input type="checkbox" /></th>
                                <th class="text-left"></th>
                                <th class="text-left"></th>
                                <th class="text-left">NAME</th>
                                <th class="text-left">COURSE</th>
                                <th class="text-left">DATE</th>
                                <th class="text-left">TIME</th>
                                <th class="text-left">VENUE</th>
                                <th class="text-center">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($class_list as $key => $value)
                                <tr>
                                    <td><input type="checkbox" /></td>
                                    <td>
                                        <a href="{{ route('wave.user.admin-main.classes-view', $value['id']) }}" class="d-flex align-items-center justify-content-center cursor-pointer" style="margin: 0 !important; height: 20px;">
                                            <x-svg-icon icon="view" width="20" height="20" />
                                        </a>
                                    </td>
                                    <td>
                                        <span 
                                            class="d-flex align-items-center justify-content-center cursor-pointer show-qr-modal_btn" 
                                            style="margin: 0 !important; height: 20px;"
                                            data-id="{{ $value['id'] }}"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#generate-qr-modal"
                                        >
                                            <x-svg-icon icon="qr" width="16" height="16" />
                                        </span>
                                    </td>
                                    <td>{{ $value['course_class_code'] }}</td>
                                    <td>{{ $value['course']['course_abbreviation'] }}</td>
                                    <td>{{ $value['start_date'] }}</td>
                                    <td>{{ $value['start_time'] . ' - ' . $value['end_time'] }}</td>
                                    <td>{{ $value['course']['venueData']['name'] ?? '' }}</td>
                                    <td class="text-center text-success">Active</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Coach View Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="generate-qr-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">GENERATE QR?</h4>
                <span class="cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div>
                    <div class="w-100 p-3">
                        <div class="row mb-3 mt-2">
                            <div class="col-6">
                                <div>
                                    <h6 class="detail-content-heading">CLASS NAME</h6>
                                    <p id="detail-class_code" class="detail-content-heading_value">0407 - Class #1</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <h6 class="detail-content-heading">COURSE NAME</h6>
                                    <p id="detail-course_name" class="detail-content-heading_value">20230407 Course Test</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div>
                                    <h6 class="detail-content-heading">CLASS START DATE & TIME</h6>
                                    <p id="detail-class_start_datetime" class="detail-content-heading_value">2023-12-01, 08:00 AM</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <h6 class="detail-content-heading">CLASS END DATE & TIME</h6>
                                    <p id="detail-class_end_datetime" class="detail-content-heading_value">2023-12-10, 08:00 PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div>
                                    <h6 class="detail-content-heading">VENUE</h6>
                                    <p id="detail-venue" class="detail-content-heading_value">Victoria Shanghai Academy</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <h6 class="detail-content-heading">FACILITY</h6>
                                    <p id="detail-facility" class="detail-content-heading_value">GHS Main Pool</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('wave.user.admin-main.qr-view', 1) }}" class="btn btn-primary custom-btn_primary generate-qr_btn">GENERATE QR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- General QR Generator Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="general-qr-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">GENERAL QR GENERATION</h4>
                <span class="cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <form id="modal-form">
                    <div class="w-100">
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-select
                                label="LOCATION (VENUE)" 
                                name="venue"
                                id="venue"
                                isRequired="true"
                            >
                                <option value="" hidden>Select Location</option>
                                @foreach($venues as $venue)
                                    <option value="{{ $venue['id'] }}">{{ $venue['name'] }}</option>
                                @endforeach
                            </x-form-select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="#" class="btn btn-primary custom-btn_primary general-generate_btn" disabled>GENERATE QR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        $('.show-qr-modal_btn').on('click', function(){
            const id = $(this).data('id');

            const classLists = <?= json_encode($class_list) ?>;

            const classData = classLists.find(value => value.id == id);

            const route = "<?= url('admin-main/qr-view'); ?>/" + id;

            $('#generate-qr-modal #detail-class_code').text(classData.course_class_code);
            $('#generate-qr-modal #detail-course_name').text(classData.course.course_abbreviation);
            $('#generate-qr-modal #detail-class_start_datetime').text(classData.formated_start_date_time);
            $('#generate-qr-modal #detail-class_end_datetime').text(classData.formated_end_date_time);
            $('#generate-qr-modal #detail-venue').text(classData.course.venue.name);
            $('#generate-qr-modal #detail-facility').text(classData.course.facility.name);
            $('#generate-qr-modal .generate-qr_btn').attr('href', route);
        })

        $('#general-qr-modal select[name=venue]').on('change', function(){
            const value = $(this).val();

            const route = "<?= url('admin-main/general-qr-view'); ?>/" + value;
            
            $('#general-qr-modal .general-generate_btn').removeAttr('disabled');
            $('#general-qr-modal .general-generate_btn').attr('href', route);
        });

        $('#general-qr-modal .general-generate_btn').on('click', function(){
            const formData = $('#general-qr-modal #modal-form').serializeArray();
            console.log(formData);
            const requiredFields = ['venue'];
			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}
        });

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
                const hasParentFields = [];

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
@endsection
