<div class="row mt-1">
    <div class="col-xxl-12">
        <div class="row p-2">
            <!-- Table List -->
            <div class="col-12 page-content-col">
                <div class="tab-content p-3 pt-4">
                    <h2 style="font-size: 24px; font-weight: 500;" class="mb-3">News</h2>
                    <div class="row news-custom-filter">
                        <div class="col-12 position-relative">
                            <x-search-input inputType="text" inputName="custom-table_search" inputID="" inputPlaceholder="Search..." />
                        </div>
                    </div>
                    <div class="table-responsive table-custom with-custom-search mt-4">
                        <table class="table table-hover w-100" id="news-table">
                            <thead>
                                <tr>
                                    <th class="text-left"><input type="checkbox" class="check-all"></th>
                                    <th class="text-left">PHOTO</th>
                                    <th class="text-left">TITLE</th>
                                    <th class="text-left">SCHEDULED DATE</th>
                                    <th class="text-left">IMMEDIATE PUBLISH</th>
                                    <th class="text-left">STATUS</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $newsArticles as $newsArticle )
                                    <tr>
                                        <td class="text-left"><input type="checkbox" class="single-checkbox" value="{{ $newsArticle['id'] }}"></td>
                                        <td class="text-left">
                                            <div style="width: 70px; height: 60px;">
                                                <img src="{{ $newsArticle['image_path'] }}" alt="" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
                                            </div>
                                        </td>
                                        <td class="text-left">{{ $newsArticle['title'] }}</td>
                                        <td class="text-left">{{ $newsArticle['posting_time'] ? formatDate($newsArticle['posting_time'], 'm/d/Y H:i A') : '-' }}</td>
                                        <td class="text-left">{{ $newsArticle['publish_immediately'] ? 'Yes' : 'No' }}</td>
                                        <td class="text-left {{ $newsArticle['status'] == 'archived' ? 'text-danger' : 'text-success' }}">{{ $newsArticle['status_label'] }}</td>
                                        <td class="text-center">
                                            <div class="table-acitions_container d-flex gap-2">
                                                <button type="button" class="edit-button" id="edit-btn" data-row_id="{{ $newsArticle['id'] }}" data-bs-toggle="modal" data-bs-target="#news-modal">
                                                    <x-svg-icon icon="edit" width="16" height="16" />
                                                </button> 
                                                @if( $newsArticle['status'] != 'archived' )
                                                    <button type="button" class="delete-button" id="delete-btn" data-row_id="{{ $newsArticle['id'] }}" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                                        <x-svg-icon icon="delete" width="16" height="14" />
                                                    </button>
                                                @endif
                                                @if( isSuperAdmin() && $newsArticle['status'] == 'archived' )
                                                    <div class="cursor-pointer unarchive-btn" data-row_id="{{ $newsArticle['id'] }}" data-bs-toggle="modal" data-bs-target="#unarchive-modal">
                                                        <i class="fa-solid fa-trash-arrow-up"></i>
                                                    </div>
                                                @endif
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
</div>
<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="news-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Add News</h4>
                <span class="small-icon_btn p-2 cursor-pointer cancel-btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div>
                    <form id="form-container">
                        <div class="d-flex justify-content-center mb-3">
                            <div style="width: 150px; height: 150px; position: relative;">
                                <img src="{{ asset('themes/tailwind/images/default.jpeg') }}" alt="" class="modal-image_preview" style="object-fit: cover; width: 100%; height: 100%; border-radius: 10px;">
                                <span class="cursor-pointer upload_btn"><x-svg-icon icon='edit' /></span>
                            </div>
                            <input type="file" name="attachment" id="attachment" class="d-none">
                        </div>
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-select
                                label="Status" 
                                name="status"
                                id="status"
                                isRequired="true"
                            >
                                <option value="" hidden>Choose Status</option>
                                <option value="published">Published</option>
                                <option value="archived">Archived</option>
                            </x-form-select>
                        </div>
                        <div class="container d-xxl-flex align-items-xxl-center form-input-container gap-4 mb-3">
                            <x-form-input 
                                label="Title" 
                                type="text" 
                                name="title"
                                id="title"
                                isRequired="true"
                            />
                        </div>
                        <div class="container" style="padding: 0px;color: #636363">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Content <span class="text-muted">(optional)</span></label>
                                    <textarea name="content" id="modal-news_content" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="container" style="padding: 0px;color: #636363;margin-top: 20px;">
							<div class="form-inline" style="width: 100%;">
								<div class="form-group">
									<label for="posting_time" class="form-label form-input-label">Schedule Notification to send</label>
									<div class="d-flex gap-1">
										<div class="col-6">
											<input name="posting_time" id="posting_time" tabindex="3" class="form-control form-input-date" type="datetime-local">
										</div>
									</div>
									<div class="col-12 d-flex align-items-center gap-1 mt-2">
										<input type="checkbox" name="publish_immediately" tabindex="4" id="send-immediately" checked>
										<label for="send-immediately">Publish Immediately</label>
									</div>
								</div>
							</div>
						</div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" color="primary" id="process-submit" title="Save" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body mb-4">
                <p class="heading mb-3">Delete Confirmation</p>
                <p class="sub-heading text-secondary">
                    Are you sure to delete this entry?
                </p>
            </div>
            <div class="modal-footer justify-content-between" style="border-top-style: none;">
                <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss="modal"/>
                <x-primary-button type="button" color="danger" id="process-archive" title="Continue" toggle="" target=""/>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Unarchive Confirmation -->
<div class="modal fade" role="dialog" tabindex="-1" id="unarchive-modal">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="text-warning" style="font-size: 20px;font-family: Poppins, sans-serif;">Unarchive Confirmation</p>
				<p style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">
                    Are you sure you want to unarchive entry?
				</p>
			</div>
			<div class="modal-footer justify-content-between" style="border-top-style: none;">
				<button id="cancel-btn" class="btn btn-light fw-semibold" type="button" data-bs-dismiss="modal" style="border-style: solid;border-color: #E8E8E8;color: #636363;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: rgb(255,255,255);">Cancel</button>
				<button id="process-unarchive" class="btn btn-primary" type="button" data-bs-dismiss="myModal" style="color: #ffffff;font-size: 15px;font-family: Poppins, sans-serif;width: 102px;height: 48px;background: #4A5C7A;border-style: none;border-color: #E8E8E8;box-shadow: 0px 4px #171c25;">Yes</button>
			</div>
		</div>
	</div>
</div>

<style>
    .upload_btn {
        width: 30px;
        height: 30px;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        bottom: 10px;
        left: 40%;
        background: #00000038;
        border-radius: 5px;
    }
</style>

<script>
$(function() {
    var formAction = 'add';
    var selectedData = {};

    var mainTable = $('.news_tab #news-table').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "aaSorting": [],
        "orderMulti": true,
        "aoColumnDefs": mSortingString,
        "columnDefs": [{
                targets: [0,1,6],
                orderable: false
        }]
    });

    $('.news_tab .news-custom-filter').on('keyup', 'input[name=custom-table_search]', function() {
        var searchTerm = $(this).val();

        mainTable.search(searchTerm).draw();
    });

    tinymce.init({
        selector: '#modal-news_content',
        height: 300,
        auto_focus: '#tinymce'
    });

    $('.page-container').on('click', '#add-news_btn', function(){
        formAction = 'add';

        clearModalFields();
    });

    $('.news_tab #news-table tbody').on('click', '.edit-button', function(){
        const rowID = $(this).data('row_id');
        formAction = "edit";

        const data = <?= json_encode($newsArticles) ?>;
        const rowData = data.find(value => value.id == rowID);

        selectedData = rowData;

        // Populate the field on the modal
        $('.news_tab #news-modal select[name=status]').val(rowData.status);
        $('.news_tab #news-modal input[name=title]').val(rowData.title);
        tinymce.get("modal-news_content").setContent(rowData.content);
        // tinymce.activeEditor.setContent(rowData.content);
        $('.news_tab #news-modal input[name=posting_time]').val(rowData.posting_time ? moment(rowData.posting_time).format("YYYY-MM-DD HH:mm:ss") : moment().format("YYYY-MM-DD HH:mm:ss"));
        $('.news_tab #news-modal input[name=publish_immediately]').prop("checked", rowData.publish_immediately ? true : false);
        $('.news_tab #news-modal .modal-image_preview').attr("src", rowData.image_path);
    });

    $('.news_tab #news-modal input[name=posting_time]').val(moment().format("YYYY-MM-DD HH:mm:ss"))

    $('.news_tab #news-modal').on('click', '.upload_btn', function(){
        $('.news_tab #news-modal input[name=attachment]').click();
    });

    $(".news_tab #news-modal").on('change', 'input[name=attachment]', function() {
        const input = $(this)[0].files[0];
        var preview = $(".news_tab #news-modal .modal-image_preview");

        var reader = new FileReader();

        reader.onload = function(e) {
            preview.attr('src', e.target.result);

            const content = e.target.result.split(',')[1]; // Extract base64-encoded content

            imageData = {
                name: input.name,
                type: input.type,
                size: input.size,
                content: content
            };
        };

        // Read the file as a data URL
        reader.readAsDataURL(input);
    });

    $(".news_tab #news-modal").on('click', '#process-submit', async function() {
        $(this).attr('disabled', 'true');

        // get user token
        const userToken = getUserToken();

        var content = tinymce.get('modal-news_content').getContent();
        $('.news_tab #modal-news_content').val(content);

        // Prepare Data
        const formData = $('.news_tab #news-modal #form-container').serializeArray();

        let transformedData = new FormData()

        formData.forEach(function(item) {
            transformedData.append(item.name, item.value)
        });

        const requiredFields = [
            'status', 'title'
        ];

        if( processErrorValidation(formData, requiredFields) ) {
            $(this).removeAttr('disabled');

            return;
        }

        const attachment = document.getElementById('attachment').files[0];
        
        if ( attachment )
            transformedData.append('attachment', attachment);

        const publishImmediately = $('.news_tab #news-modal input[name=publish_immediately]').is(':checked');
        transformedData.append('publish_immediately', publishImmediately ? 1 : 0);
        transformedData.append('category', 'normal_news');
        transformedData.append('content', content);
        
        // $(this).removeAttr('disabled');
        // return;
        if( formAction == 'add' )
            await axios.post(`${getApiUrl()}/content/news/add`, transformedData, {
                    headers: {
                        'Authorization': 'Bearer ' + userToken,
                        'content-type': 'multipart/form-data'
                    }
                }).then(res => {
                    $('.news_tab #news-modal .cancel-btn').click();

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
        if( formAction == 'edit' ) {
            transformedData.append('id', selectedData.id)

            await axios.post(`${getApiUrl()}/content/news/update`, transformedData, {
                    headers: {
                        'Authorization': 'Bearer ' + userToken,
                        'content-type': 'multipart/form-data'
                    }
                }).then(res => {
                    $('.news_tab #news-modal .cancel-btn').click();

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
        }
    });

    $('.news_tab #news-table tbody').on('click', '.delete-button', function(){
        const rowID = $(this).data('row_id');

        const data = <?= json_encode($newsArticles) ?>;
        const rowData = data.find(value => value.id == rowID);

        selectedData = rowData;

        console.log(selectedData)
    });

    $('.news_tab #news-table tbody').on('click', '.unarchive-btn', function(){
        const rowID = $(this).data('row_id');

        const data = <?= json_encode($newsArticles) ?>;
        const rowData = data.find(value => value.id == rowID);

        selectedData = rowData;
    });

    $('.news_tab #delete-modal').on('click', '#process-archive', async function(){
        $(this).attr('disabled', 'true');

        const userToken = getUserToken();

        let transformedData = {
            id: selectedData.id
        };

        await axios.post(`${getApiUrl()}/content/news/archive`, transformedData,{
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            $('#delete-modal #cancel-btn').click();

            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                window.location = window.location
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

    $('.news_tab #unarchive-modal').on('click', '#process-unarchive', async function(){
        $(this).attr('disabled', 'true');

        const userToken = getUserToken();

        let transformedData = {
            id: selectedData.id
        };

        await axios.post(`${getApiUrl()}/content/news/unarchive`, transformedData,{
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + userToken
            }
        }).then(res => {
            $('#unarchive-modal #cancel-btn').click();

            if ( res.data.success ) {
                toastTopEnd("Success", res.data.message, "success");

                window.location = window.location
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

    // Error Validations
    function processErrorValidation(formData, requiredFields) {
        errors = [];
        let startTime = '';
        let endTime = '';

        formData.forEach(function(item) {
            if ( requiredFields.includes(item.name) ) {
                if( item.value == "" ){
                    errors.push({
                        field_name: item.name,
                        message: formatString(item.name) + " is required."
                    });
                }

                if( item.name == 'start_time' )
                    startTime = item.value;

                if( item.name == 'end_time' )
                    endTime = item.value;
            }
        });

        if ( endTime < startTime )
            errors.push({
                field_name: 'end_time',
                message: "Cannot be less than to Start Time."
            });

        if ( startTime > endTime )
            errors.push({
                field_name: 'start_time',
                message: "Cannot be greater than to End Time."
            });
        
        if ( errors.length > 0 ) {
            renderErrors('news-modal');

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

    function renderErrors(modal) {
        if ( errors.length > 0 ) {
            const hasParentFields = ['date'];

            errors.forEach((element) => {
                const fieldSelector = $(`#${modal} [name="${element.field_name}"]`);
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

    function clearModalFields(){
        $('.news_tab #news-modal select[name=status]').val("");
        $('.news_tab #news-modal input[name=title]').val("");
        $('.news_tab #news-modal [name=content]').val("");
        $('.news_tab #news-modal input[name=posting_time]').val(moment().format("YYYY-MM-DD HH:mm:ss"));
        $('.news_tab #news-modal input[name=publish_immediately]').prop("checked", false);
        $('.news_tab #news-modal .modal-image_preview').attr("src", "{{ asset('themes/tailwind/images/default.jpeg') }}");

        formAction = "add";
    }
});
</script>