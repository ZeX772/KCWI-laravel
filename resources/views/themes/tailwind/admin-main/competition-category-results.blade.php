@extends('theme::layouts.app')

@section('content')
<style>
    .export-button {
        background-color: #F5F5F5;
        border: 1px solid transparent;
        color: inherit;
        border-radius: 0.25em;
    }
</style>
<div class="page-container">
    <x-page-content-heading 
        heading="Competition Category Result"
        headingSpan="{{ $data['competition']['competition_code'] }}"
        withButton="true"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#results-modal"
        buttonType="button"
        buttonId="key-in-result_btn"
        buttonTitle="Key In Result"
    />

    <div class="row mt-2 p-2">
        <div class="col-xxl-12 page-content-col">
            <div class="tab-content p-2">
                <div class="main-page_table_info">
                    <div class="d-flex align-items-center mb-4">
                        <h2 class="heading mr-2">{{ $data['competition']['competition_code'] }}, <span class="heading-span">{{ $data['category']['name'] ?? '' }}</span></h2>
                        <div class="d-glex d-flex align-items-center gap-4">
                            <span class="status-tag p-2">{{ ucfirst($data['status']) }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 d-flex flex-column gap-2">
                            <p class="detail-title">Date: <span class="detail-sub_title">{{ $data['start_date'] ? date("m/d/Y", strtotime($data['start_date'])) : '' }}{{ $data['end_date'] ? ' - '.date("m/d/Y", strtotime($data['end_date'])) : '' }}</span></p>
                            <p class="detail-title">Time: <span class="detail-sub_title">{{ $data['start_time'] ? date("h:i a", strtotime($data['start_time'])) : '' }}{{ $data['end_time'] ? ' - '.date("h:i a", strtotime($data['end_time'])) : '' }}</span></p>
                            <p class="detail-title">Participant Total: <span class="detail-sub_title">{{ count($participants) }}/{{ $data['competition']['competition_size'] }}</span></p>
                        </div>
                        <div class="col-4 d-flex flex-column gap-2">
                            <p class="detail-title">Venue: <span class="detail-sub_title">{{ $data['competition']['school_venue']['name'] ?? '-' }}</span></p>
                            <p class="detail-title">Facility: <span class="detail-sub_title">{{ $data['competition']['school_venue_facility']['name'] ?? '-' }}</span></p>
                            <p class="detail-title">Remark: <span class="detail-sub_title">{{ $data['remarks'] }}</span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary float-end w-auto export-button d-flex align-items-center" id="export-results">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                    <path d="M11 5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5V12.1578L16.2428 8.91501L17.657 10.3292L12.0001 15.9861L6.34326 10.3292L7.75748 8.91501L11 12.1575V5Z" fill="currentColor"></path>
                                    <path d="M4 14H6V18H18V14H20V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14Z" fill="currentColor"></path>
                                </svg>
                                Export
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-custom with-custom-search mt-4 border-top">
                    <table class="table table-hover w-100" id="results-table">
                        <thead>
                            <tr>
                                <th class="text-left">PARTICIPANTS</th>
                                <th class="text-center">GROUP NUM</th>
                                <th class="text-center">LINE</th>
                                <th class="text-center">TIME DURATION</th>
                                <th class="text-center">RANK</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($participants as $key => $participant)
                            <tr>
                                <td class="text-left">{{ $participant['users']['name'] }}</td>
                                <td class="text-center">{{ $participant['competition_group']['group_number'] }}</td>
                                <td class="text-center">{{ $participant['competition_group']['assign_line'] }}</td>
                                <td class="text-center">{{ $participant['result'] ? $participant['result']['time_duration'] : '' }}</td>
                                <td class="text-center">{{ $participant['result'] ? $participant['result']['rank'] : '' }}</td>
                                <td>
                                    <div class="table-acitions_container d-flex gap-2">
                                        <button type="button" class="edit-button" id="edit-btn" data-row_index="{{ $key }}" data-bs-toggle="modal" data-bs-target="#results-modal" style="margin-right: 5px;">
                                            <svg class="bi bi-pencil" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" style="color: #3B3B3B;">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                            </svg>
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
    </div>
</div>

<!-- RESULTS MODAL -->
<div class="modal fade" role="dialog" tabindex="-1" id="results-modal">
 	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
 		<div class="modal-content">
 			<div class="modal-header" style="border-bottom-style: none;">
 				<h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Results</h4>
                <span id="cancel-btn" class="small-icon_btn p-2 cursor-pointer" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
 			</div>
 			<div class="modal-body">
				<form id="modal-add-form">
					<div class="col" style="width: 100%;">
                        <div class="container" style="padding: 0px;color: #636363;">
							<div class="form-inline">
								<div class="form-group">
                                    <x-form-select
                                        label="Participant"
                                        name="competition_participant_id"
                                        id="competition_participant_id"
                                        isRequired="true"
                                        tabindex="5"
                                        class="form-control"
                                    >
                                    <option value="" selected hidden>Select a participant</option>
                                    @foreach($participants as $participant)
                                        <option value="{{ $participant['id'] }}">{{ $participant['users']['name'] }}</option>
                                    @endforeach
                                    </x-form-select>
								</div>
							</div>
						</div>

                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
                            <div class="form-inline" style="width: 100%;">
                                <div class="form-group position-relative">
                                    <label for="time_duration" class="form-label form-input-label">Time Duration <span class="text-danger">*</span></label>
                                    <input type="text" id="time_duration" name="time_duration" class="form-control form-input-text" placeholder="mm:ss.ms" value="00:00.00"/>
                                </div>
                            </div>
						</div>
					</div>
				</form>
 			</div>
 			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button type="button" id="cancel-btn"  class="btn btn-light fw-semibold"  data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button type="button" id="save-modal-data-btn" class="btn btn-primary" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Save</button>
			</div>
 		</div>
 	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
const participants = <?= json_encode($participants) ?>;
const timeDurationRegex = new RegExp("^[0-5][0-9]\:[0-5][0-9]\.[0-9]{1,2}$");
const competitionCategory = <?= json_encode($data) ?>;

var errors = [];

var table = $('#results-table').DataTable({
    "paging": true,
    "ordering": true,
    "info": true,
    "aaSorting": [],
    "orderMulti": true,
    "searching": false,
    "lengthChange": false,
    "columns": [
        {"orderable": true, "searchable": false},
        {"orderable": true, "searchable": false},
        {"orderable": true, "searchable": false},
        {"orderable": true, "searchable": false},
        {"orderable": true, "searchable": false},
        {"orderable": false, "searchable": false}
    ]
});

$(function() {
    $('#competition_participant_id').on('change', function() {
        const value = $(this).val();
        const selected = participants.find((el) => el.id === parseInt(value));

        if(selected.result) {
            $('#time_duration').val(selected.result.time_duration);
        }
    });

    $('#time_duration').on('keyup', function() {
        if($(this).val() === '') {
            $(this).val('00:00.00')
        } else {
            $(this).removeClass('border border-danger');

            if ( $(this).next().is('p') )
                $(this).next().remove();

            if ( $(this).parent().next().is('p') )
                $(this).parent().next().remove();

            if(!timeDurationRegex.test($(this).val())) {
                $(this).addClass('border border-danger');
                $(this).parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">Incorrect time duration format.</p>`);
            }
        }
    });

    $('#key-in-result_btn').on('click', function() {
        resetModalForm();
    });

    $('#results-table .edit-button').on('click', function() {
        resetModalForm();

        const rowIndex = $(this).data('row_index');
        const selectedParticipant = participants[rowIndex];

        $('#competition_participant_id').val(selectedParticipant.id).trigger('change');
    });

    $('#save-modal-data-btn').on('click', function() {
        $(this).attr('disabled', 'true');
        const formData = $('#modal-add-form').serializeArray();

        if( processErrorValidation(formData) ) {
            $(this).removeAttr('disabled');

            return;
        }

        let transformedData = {};

        formData.forEach(function(item) {
            transformedData[item.name] = item.value;
        });

        transformedData['competition_category_id'] = competitionCategory.id;

        processParticipantResult(transformedData);
    });

    function resetModalForm() {
        errors.forEach((element) => {
            const fieldSelector = $(`[name="${element.field_name}"]`);
            // Clear the errors first
            fieldSelector.removeClass('border border-danger');
            fieldSelector.removeClass('border border-danger');

            if ( fieldSelector.next().is('p') )
                fieldSelector.next().remove();

            if ( fieldSelector.parent().next().is('p') )
                fieldSelector.parent().next().remove();
        });

        errors = [];

        $('#results-modal input#time_duration').val("00:00.00");
        $('#results-modal select').val("");
    }

    function processErrorValidation(formData) {
        const requiredFields = ['competition_participant_id', 'time_duration'];

        errors.forEach((element) => {
            const fieldSelector = $(`[name="${element.field_name}"]`);
            // Clear the errors first
            fieldSelector.removeClass('border border-danger');
            fieldSelector.removeClass('border border-danger');

            if ( fieldSelector.next().is('p') )
                fieldSelector.next().remove();

            if ( fieldSelector.parent().next().is('p') )
                fieldSelector.parent().next().remove();
        });

        errors = [];

        formData.forEach(function(item) {
            console.log(item.value, item.name);
            if ( requiredFields.includes(item.name) ) {
                if( item.value == "" || item.name === 'time_duration' && item.value == "00:00.00"){
                    errors.push({
                        field_name: item.name,
                        message: formatString(item.name) + " is required."
                    });
                } else {
                    if(item.name === 'time_duration' && !timeDurationRegex.test(item.value)) {
                        errors.push({
                            field_name: item.name,
                            message: "Incorrect time duration format."
                        });
                    }
                }
            }
        });

        if ( errors.length > 0 ) {
            renderErrors();

            return true;
        }

        return false;
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

    function renderErrors() {
        if ( errors.length > 0 ) {
            errors.forEach((element) => {
                const fieldSelector = $(`[name="${element.field_name}"]`);
                // Clear the errors first
                fieldSelector.removeClass('border border-danger');
                fieldSelector.removeClass('border border-danger');

                if ( fieldSelector.next().is('p') )
                    fieldSelector.next().remove();

                if ( fieldSelector.parent().next().is('p') )
                    fieldSelector.parent().next().remove();

                fieldSelector.addClass('border border-danger');
                fieldSelector.parent().after(`<p class="text-danger" style="position: absolute; font-size: 12px;">${element.message}</p>`);
            });
        }
    }

    async function processParticipantResult(transformedData) {
        const userToken = getUserToken();

        // API Request to save participant result
        await axios.post(`${getApiUrl()}/competition/process-result`, transformedData, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            $('#save-modal-data-btn').removeAttr('disabled');
            $('#results-modal #cancel-btn').click();

            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                window.location = window.location
            } else {
                toastInfo("Cant' Save", res.data.message, "warning");
            }
        }).catch(error => {
            $('#save-modal-data-btn').removeAttr('disabled');

            if( error.response.status == 400 || error.response.status == 422 ) {
                let errorMessages = "";
                Object.keys(error.response.data.errors).forEach(key => {
                    error.response.data.errors[key].forEach(value => {
                        errorMessages += (`${key}: ` + value + '\n')

                        toastTopEnd("Cant' Process", errorMessages, "warning");
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
    }

    $(document).on('click', '#export-results', async function(e) {
        e.preventDefault();

        const userToken = getUserToken();

        await axios.get(`${getApiUrl()}/competition/export-competition-category-results/${competitionCategory.id}`, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

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
})
</script>
@endsection