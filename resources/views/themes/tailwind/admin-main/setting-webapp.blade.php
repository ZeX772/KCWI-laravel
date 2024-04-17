@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="Content - Web/APP - Urgent News" 
        withButton="true"
        withIcon="true"
        icon="plus"
        buttonModalTarget="#news-modal" 
        buttonType="button"
        buttonId="add-news_btn"
        buttonTitle="Add News"
        buttonHidden="true"
    />
    <div class="row mt-4">
        <div class="col-xxl-12">
            <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start custom-nav-tabs gap-4" role="tablist">
                <li class="nav-item" role="presentation" style="border-left-style: none;">
                    <a class="nav-link active" role="tab" data-tab="urgent-news" data-name="Urgent News" data-bs-toggle="tab" href="#tab-1">URGENT NEWS</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-tab="news" data-name="News" data-bs-toggle="tab" href="#tab-2">NEWS</a>
                </li>
                <!-- <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-tab="level-information" data-name="Level Information" data-bs-toggle="tab" href="#tab-3">LEVEL INFORMATION</a>
                </li> -->
                <!-- <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-tab="schedule" data-name="Schedule" data-bs-toggle="tab" href="#tab-4">SCHEDULE</a>
                </li> -->
                <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-tab="policy" data-name="Policy" data-bs-toggle="tab" href="#tab-5">POLICY</a>
                </li>
                <!-- <li class="nav-item" role="presentation">
                    <a class="nav-link" role="tab" data-tab="special-event" data-name="Special Events" data-bs-toggle="tab" href="#tab-6">SPECIAL EVENTS</a>
                </li> -->
            </ul>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane active urgent-news_tab" role="tabpanel">
                    <x-webapp-urgent-news-list :urgentNews="$urgent_news" :school="$school"/>
                </div>
                <div id="tab-2" class="tab-pane news_tab" role="tabpanel">
                    <x-webapp-news-list :newsArticles="$news_articles"/>
                </div>
                <div id="tab-3" class="tab-pane level-info_tab" role="tabpanel">
                    <x-level-information-list :levels="$levels" :levelInformations="$level_informations" />
                </div>
                <!-- <div id="tab-4" class="tab-pane" role="tabpanel">
                    <p>There's no content here yet</p>
                </div> -->
                <div id="tab-5" class="tab-pane pt-4" role="tabpanel">
                    <form id="policy-form">
                        <div class="form-input-container gap-4 mb-3">
                            <x-form-input 
                                label="Title" 
                                type="text" 
                                name="title"
                                id="title"
                                isRequired=true
                                value="{{ $privacy_policy['title'] ?? '' }}"
                            />
                        </div>
                        <div style="padding: 0px;color: #636363" class="mb-3">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Terms and Condition (English) <span class="text-danger">*</span></label>
                                    <textarea name="content" id="content" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0px;color: #636363" class="mb-3">
                            <div class="form-inline">
                                <div class="form-group">
                                    <label class="form-label" style="color: #636363;font-size: 14px;">Terms and Condition (Chinese)</label>
                                    <textarea name="chineese_content" id="chinese-content" class="form-control" placeholder="Remark..." style="background: #F5F5F5;border-style: none;height: 133px;color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="button-actions d-flex align-items-center gap-3">
                            <x-primary-button type="button" color="primary" id="save-btn" title="Save" toggle="" target=""/>
                            {{-- <x-secondary-button type="button" id="cancel-btn" title="Cancel" dismiss=""/> --}}
                        </div>
                    </form>
                </div>
                <!-- <div id="tab-6" class="tab-pane" role="tabpanel">
                    <p>There's no content here yet</p>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        var privacyPolicy = <?= json_encode($privacy_policy) ?>;
        // $(document).on('click','#cancel-btn',function(){
        //     $("#content").val(privacyPolicy.content);
        //     $("#chinese-content").val(privacyPolicy.chinese_content);
        // })
        console.log(privacyPolicy);

        tinymce.init({
            selector: '#content',
            height: 300,
            plugins: "lists",
            toolbar: "fontfamily fontsize forecolor h1 h2 h3 h4 h5 h6 hr | bold italic underline | bullist numlist | anchor | aligncenter alignjustify alignleft alignnone alignright",
            setup: function(editor) {
                // Set the initial value after TinyMCE has been initialized
                editor.on('init', function() {
                    editor.setContent(privacyPolicy && privacyPolicy.content!=null ? privacyPolicy.content : '');
                });
            },
        });

        tinymce.init({
            selector: '#chinese-content',
            height: 300,
            plugins: "lists",
            toolbar: "fontfamily fontsize forecolor h1 h2 h3 h4 h5 h6 hr | bold italic underline | bullist numlist | anchor | aligncenter alignjustify alignleft alignnone alignright",
            setup: function(editor) {
                // Set the initial value after TinyMCE has been initialized
                editor.on('init', function() {
                    editor.setContent(privacyPolicy && privacyPolicy.chinese_content!=null ? privacyPolicy.chinese_content : '');
                });
            },
        });

        $('#policy-form #save-btn').on('click', async function(){
            $(this).attr('disabled', 'true');

			// get user token
			const userToken = getUserToken();

			// Prepare Data
			const formData = $('#policy-form').serializeArray();

            const requiredFields = [];

			if( processErrorValidation(formData, requiredFields) ) {
				$(this).removeAttr('disabled');

				return;
			}

            let transformedData = {};

			formData.forEach(function(item) {
				transformedData[item.name] = item.value;
			});

            transformedData['content'] = tinymce.get('content').getContent();
            transformedData['chinese_content'] = tinymce.get('chinese-content').getContent();

            await axios.post(`${getApiUrl()}/privacy-policy/save`, transformedData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + userToken
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

                    console.error('Error fetching data:', error.response.data);
                });
        });

        $('#policy-form').on('click', '#cancel-btn', function(){
            tinymce.get("content").setContent("");
            tinymce.get("chinese-content").setContent("");
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

        $('.custom-nav-tabs').on('click', '.nav-link', function(){
            const tabName = $(this).data('name');
            const tabType = $(this).data('tab');

            $('.page-header .page-content-heading').text(`Content - Web/APP - ${tabName}`);

            $('.page-header .buttons-container').addClass('d-none');

            if( tabType == 'news' ) {
                $('.page-header .buttons-container').removeClass('d-none');
                $('.page-header .buttons-container button').attr('id', 'add-news_btn');
                $('.page-header .buttons-container button').attr('data-bs-target', '#news-modal');
                $('.page-header .buttons-container button div').empty();
                $('.page-header .buttons-container button div').append(`<span class="mr-2"><x-svg-icon icon="plus"  /></span> Add News`);
            }

            if( tabType == 'urgent-news' ) {
                $('.page-header .buttons-container').removeClass('d-none');
                $('.page-header .buttons-container button').attr('id', 'update-urgent_news_btn');
                $('.page-header .buttons-container button').attr('data-bs-target', '#urgent-news_modal');
                $('.page-header .buttons-container button div').empty();
                $('.page-header .buttons-container button div').append(`Update Urgent News`);
            }

            if( tabType == 'level-information' ) {
                $('.page-header .buttons-container').removeClass('d-none');
                $('.page-header .buttons-container button').attr('id', 'level-information_btn');
                $('.page-header .buttons-container button').attr('data-bs-target', '#level-info_modal');
                $('.page-header .buttons-container button div').empty();
                $('.page-header .buttons-container button div').append(`<span class="mr-2"><x-svg-icon icon="plus"  /></span> Add Course Info`);
            }
        })

        function initialLoadButton(){
            $('.page-header .buttons-container').removeClass('d-none');
            $('.page-header .buttons-container button').attr('id', 'update-urgent_news_btn');
            $('.page-header .buttons-container button').attr('data-bs-target', '#urgent-news_modal');
            $('.page-header .buttons-container button div').empty();
            $('.page-header .buttons-container button div').append(`Update Urgent News`);
        }

        initialLoadButton();
    });
</script>
@endsection
