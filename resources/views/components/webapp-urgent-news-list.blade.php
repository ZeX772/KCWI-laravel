<div class="row mt-1">
    <div class="col-xxl-12">
        <div class="row p-2">
            <!-- Table List -->
            <div class="col-12 page-content-col p-0">
                <div class="tab-content">
                    <div class="d-flex align-items-center gap-5 p-4">
                        <h2 style="font-size: 24px; font-weight: 500;">Urgent News</h2>
                        <div class="d-flex align-items-center gap-2" style="width: 140px;">
                            <span>Status</span>
                            <x-form-select
                                label="" 
                                name="urgent_news_status"
                                id="urgent_news_status"
                                isRequired="true"
                            >
                                <option value="1" <?= $school['urgent_news_status'] ? 'selected' : '' ?>>On</option>
                                <option value="0" <?= $school['urgent_news_status'] ? '' : 'selected' ?>>Off</option>
                            </x-form-select>
                        </div>
                    </div>
                    <div class="p-4 pt-0">
                        <?php
                            $hasActiveUrgentNews = [];
                        ?>
                        @foreach( $urgentNews as $news )
                            @if( $news['is_active'] )
                                <?php
                                    $hasActiveUrgentNews[] = $news;
                                ?>
                                <div class="mb-4 update-active-urgentnews_btn">
                                    <h3 class="urgent-news_title mb-3">{{ $news['title'] }}</h3>
                                    <p class="urgent-news_content">{!! $news['content'] !!}</p>
                                    <p class="urgent-news_datetime mt-2"><span>Publish Date & Time: </span><span class="time">{{ formatDate($news['posting_time'], 'm/d/y h:i:s') }}</span></p>
                                </div>
                            @endif
                        @endforeach

                        @if( count($hasActiveUrgentNews) <= 0 )
                            <div class="mb-4">
                                <p>No Active Urgent News <a href="#" data-bs-toggle="modal" data-bs-target="#urgent-news_modal" style="color: #4A5C7A; text-decoration: underline;">Add</a></p>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="p-4">
                        <h2 style="font-size: 24px; font-weight: 500;">Past News</h2>
                        <div class="past-news_container pt-4">
                            <?php
                                $hasPastUrgentNews = [];
                            ?>
                            @foreach( $urgentNews as $news )
                                @if(! $news['is_active'] )
                                    <?php
                                        $hasPastUrgentNews[] = $news;
                                    ?>
                                    <div class="mb-4">
                                        <h3 class="urgent-news_title mb-3">{{ $news['title'] }}</h3>
                                        <p class="urgent-news_content">{!! $news['content'] !!}</p>
                                        <p class="urgent-news_datetime mt-2"><span>Publish Date & Time: </span><span class="time">{{ formatDate($news['posting_time'], 'm/d/y h:i:s') }}</span></p>
                                    </div>
                                @endif
                            @endforeach

                            @if( count($hasPastUrgentNews) <= 0 )
                                <div class="mb-4">
                                    <p>No Urgent News, at this moment</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Update Information Modal -->
<div class="modal fade" role="dialog" tabindex="-1" id="urgent-news_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="col d-xxl-flex justify-content-between align-items-start p-4">
                <h4 class="modal-title" style="font-size: 32px;color: #3B3B3B;">Urgent News</h4>
                <span class="small-icon_btn p-2 cursor-pointer cancel-btn" data-bs-dismiss="modal"><x-svg-icon icon="times" /></span>
            </div>
            <div class="modal-body p-4 pt-0">
                <div>
                    <form id="form-container">
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
                                    <textarea name="content" id="modal-urgent-news_content" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
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

    .urgent-news_title {
        font-size: 20px;
        font-weight: 400px;
        line-height: 30px;
        color: #303972;
    }

    .urgent-news_content {
        font-size: 14px;
        font-weight: 400px;
        line-height: 21px;
        color: #303972;
    }

    .urgent-news_datetime {
        font-size: 14px;
        font-weight: 400px;
        line-height: 21px;
        color: #7A7A7A;
    }

    .urgent-news_datetime .time{
        color: #303972;
    }
</style>

<script>
$(function() {
    var formAction = 'add';
    var selectedData = {};

    tinymce.init({
        selector: '#modal-urgent-news_content',
        height: 300,
        auto_focus: '#tinymce'
    });

    $('.page-container').on('click', '#update-urgent_news_btn', function(){
        formAction = 'add';

        clearModalFields();
    });

    $('.page-container').on('click', '.update-active-urgentnews_btn', function(){
        formAction = 'update';

        $('#urgent-news_modal').modal('show');

        loadActiveUrgentNews();
    });

    $('.urgent-news_tab').on('change', 'select[name=urgent_news_status]', async function(){
        const value = $(this).val();

        const userToken = getUserToken();

        let transformedData = {
            status: parseInt(value)
        };
        
        await axios.post(`${getApiUrl()}/school/update-news-status`, transformedData, {
                headers: {
                    'Authorization': 'Bearer ' + userToken,
                    'Content-Type': 'application/json',
                }
            }).then(res => {
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

    $('.urgent-news_tab #urgent-news_modal input[name=posting_time]').val(moment().format("YYYY-MM-DD HH:mm:ss"))

    $(".urgent-news_tab #urgent-news_modal").on('click', '#process-submit', async function() {
        $(this).attr('disabled', 'true');

        // get user token
        const userToken = getUserToken();

        var content = tinymce.get('modal-urgent-news_content').getContent();
        $('.urgent-news_tab #modal-urgent-news_content').val(content);

        // Prepare Data
        const formData = $('.urgent-news_tab #urgent-news_modal #form-container').serializeArray();

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

        const publishImmediately = $('.urgent-news_tab #urgent-news_modal input[name=publish_immediately]').is(':checked');
        transformedData.append('publish_immediately', publishImmediately ? 1 : 0);
        transformedData.append('category', 'urgent_news');
        transformedData.append('status', 'published');
        transformedData.append('content', content);
        
        if ( formAction == 'add' ) {
            await axios.post(`${getApiUrl()}/content/news/add`, transformedData, {
                headers: {
                    'Authorization': 'Bearer ' + userToken,
                    'content-type': 'multipart/form-data'
                }
            }).then(res => {
                $('.urgent-news_tab #urgent-news_modal .cancel-btn').click();

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

        if ( formAction == 'update' ) {
            transformedData.append('id', selectedData.id);

            await axios.post(`${getApiUrl()}/content/news/update`, transformedData, {
                headers: {
                    'Authorization': 'Bearer ' + userToken,
                    'content-type': 'multipart/form-data'
                }
            }).then(res => {
                $('.urgent-news_tab #urgent-news_modal .cancel-btn').click();

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
            renderErrors('urgent-news_modal');

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
        $('.urgent-news_tab #urgent-news_modal input[name=title]').val("");
        $('.urgent-news_tab #urgent-news_modal [name=content]').val("");
        $('.urgent-news_tab #urgent-news_modal input[name=posting_time]').val(moment().format("YYYY-MM-DD HH:mm:ss"));
        $('.urgent-news_tab #urgent-news_modal input[name=publish_immediately]').prop("checked", false);

        formAction = "add";
    }

    function loadActiveUrgentNews() {
        const urgentNews = <?= json_encode($urgentNews) ?>;
        const activeNews = urgentNews.find(value => value.is_active);

        let fieldSelector = $(`#urgent-news_modal input`);
        fieldSelector.removeClass('border border-danger');
        fieldSelector.parent().removeClass('border border-danger');

        if ( fieldSelector.next().is('p') )
            fieldSelector.next('p').remove();

        if ( fieldSelector.parent().next().is('p') )
            fieldSelector.parent().next('p').remove();

        if( activeNews ) {
            selectedData = activeNews;

            $('.urgent-news_tab #urgent-news_modal input[name=title]').val(activeNews.title);
            tinymce.get("modal-urgent-news_content").setContent(activeNews.content);
            $('.urgent-news_tab #urgent-news_modal input[name=posting_time]').val(moment(activeNews.posting_time).format("YYYY-MM-DD HH:mm:ss"));
            $('.urgent-news_tab #urgent-news_modal input[name=publish_immediately]').prop("checked", activeNews.publish_immediately);
        }
    }
});
</script>