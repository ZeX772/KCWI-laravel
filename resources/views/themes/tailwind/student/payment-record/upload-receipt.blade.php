@extends('theme::layouts.customer')

@section('style')
    <style>
        .navbar {
            background: #FFF;
            padding: 20px;
            position: left;
            min-height: 0px;
            top: 0;
            left: 0;
            right: 0;
            box-shadow: 10px 0 10px -10px rgba(0, 0, 0, 0.25);
        }

        .shopping {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
            font-weight: 700;
            margin-right: 35%;
        }

        .order {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
            background: #ffffff;
            border-radius: 8px;
            border-style: solid;
            border-color: var(--appcolortone-secondary-1, #233656);
            border-width: 1px;
            padding: 15px 16px 15px 16px;
        }

        .d-flex {
            display: flex;
            flex-grow: 1;
        }

        .navbar {
            background: #FFF;
            padding: 20px;
            position: left;
            min-height: 0px;
            top: 0;
            left: 0%;
            right: 0%;
            box-shadow: 10px 0 10px -10px rgba(0, 0, 0, 0.25);
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
        }

        .p16b {
            color: rgba(23, 20, 51, 0.7);
            text-align: center;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            font-weight: bold;
        }

        .box1 {
            background: #ffffff;
            padding: 0px 24px 0px 24px;
            min-height: 40px;
            flex-direction: column;
            gap: 12px;
            align-items: center;
            justify-content: flex-start;
            min-width: 110%;
            border-radius: 24px;
            margin-left: -30px;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .button1 {
            margin-top: -30px;
            min-height: 65px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex: 1;
            position: relative;
            font-size: 1.2em;
            padding: 24px 72px;
            border-radius: 33.5px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }

        .button1 {
            background: #233656;
            border-radius: 33px;
            width: 118%;
            height: 10px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #ffffff;
            text-align: left;
            font-family: "Poppins-Medium", sans-serif;
            font-size: 18px;
            font-weight: 500;
            position: relative;
            /* margin-left:430px; */
        }

        .container-fluid {
            display: flex;
            flex-direction: column;

        }

        .input-group-text {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding: 0.375rem 0.75rem;
            margin-bottom: 0;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            text-align: center;
            white-space: nowrap;
            background-color: #fff !important;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            border-radius: 16px !important;
        }

        .btn-img_remove {
            position: absolute;
            right: 8px;
            top: 8px;
            font-size: 24px;
        }
    </style>
@endsection

@section('content')

    <body id="page-top" style="height: 100vh; margin: 0;">
        <div id="wrapper" class="d-flex" style="min-height: 100vh;">
            

            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);height: 100vh;">
                <div class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                    <div style="display: flex; align-items: center;">
                        <div
                            class="d-md-flex d-xxl-flex justify-content-between align-items-md-center align-items-xxl-center">
                            <a href="{{ url()->previous() }}">
                                <button class type="button"
                                    style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                                    <i class="fas fa-chevron-left"></i></button></a>
                        </div>
                    </div>
                    <p class="shopping d-xl-flex justify-content-xl-center align-items-xl-center "
                        style="margin-bottom: 0px;height: 31px;text-align: center;margin-left:px;"><strong>Payment - Upload
                            Receipt</strong></p>
                </div>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center"
                    placeholder="">
                    <div style="width: 50%;" class="form-container">
                        <div class="d-xl-flex justify-content-between align-items-xl-center"
                            style="margin-bottom: 20px;margin-top:30px;">
                            <div class="d-xl-flex align-items-xl-center"><img
                                    src="../themes/tailwind/images/clipboard-image-55.png"
                                    style="width: 16px;margin-right: 10px;">
                                <p class="p20b" style="margin-bottom: 0px;"><strong>Upload Receipt</strong></p>
                            </div>
                        </div>
                        <div class="d-xl-flex flex-column divcard" style="padding: 15px;padding-left: 30px;">
                            <div class="d-xxl-flex flex-column align-items-xxl-start">
                                <div class="file-upload_container w-100">
                                    <div class="input-group d-xl-flex flex-column align-items-xl-center fileinput fileinput-new"
                                        data-provides="fileinput">
                                        <label for="fileInput"
                                            class="input-group-text input-group-addon btn btn-default btn-file"
                                            style="cursor: pointer;">
                                            <img src="../themes/tailwind/images/clipboard-image-69.png" style="width: 100px;">
                                        </label>
                                        <input type="file" id="fileInput" name="attachment" style="display: none;">
                                    </div>
                                </div>
                                <div id="filePreview" class="w-100 input-group-text input-group-addon position-relative d-none">
                                    <div class="w-100 d-flex justify-content-center p-5">
                                        <img src="" alt="">
                                        <div class="btn-img_remove cursor-pointer">
                                            <i class="fa-regular fa-circle-xmark"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div><button id="submitBtn"class="button1" type="submit"
                                    style="width: 100%;height: 60px;margin-top: 50px;">Submit</button></div>
                        </div>
                    </div>
                </div>
                <div class="modal fade modal2" role="dialog" tabindex="-1" id="modal-1" style="border-style: none;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-body d-xl-flex flex-column justify-content-evenly align-items-xl-center"
                            style="position: absolute; height: 500px;border-radius: 200px;background: var(--app-color-tone-secondary-2, #AAC9E4);border-style: none;width:60%;right:15%;">
                            <img src="{{ asset('themes/tailwind/images/clipboard-image-61.png') }}"
                                style="width: 217px; margin-bottom: 20px;">
                            <p class="p20b"><strong>Thank you for your payment!</strong><br><br><strong>We will send you
                                    the receipt once the payment is confirmed.</strong></p>
                            <button class="button1" type="button" data-bs-dismiss="modal"
                                style="width: 188px;max-height:65px;">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
    </body>
@endsection

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     $('#fileInput').change(function() {
        //         var fileName = $(this).val();
        //         if (fileName) {
        //             console.log('File selected: ' + fileName);
        //             // You can perform further actions here
        //         } else {
        //             console.log('No file selected');
        //         }
        //     });
        // });

        // function showSuccessModal() {
        //     $('#modal-1').modal('show');
        // }
        $(document).ready(function() {
            // Listen for changes in the file input
            $('#fileInput').change(function() {
                const input = $(this)[0].files[0];
                var preview = $("#filePreview img");

                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.attr('src', e.target.result);

                    $('.file-upload_container').addClass('d-none');
                    $('#filePreview').removeClass('d-none');
                };

                // Read the file as a data URL
                reader.readAsDataURL(input);
            });

            $('#filePreview').on('click', '.btn-img_remove', function(){
                $('#fileInput').val('');

                $('#filePreview').addClass('d-none');
                $('.file-upload_container').removeClass('d-none');
            });

            $('.form-container').on('click', '#submitBtn', async function(){
                var file = $('#fileInput')[0].files[0]; // Get the selected file

                var formData = new FormData();
                formData.append('attachment', file);
                formData.append('course_enrollment_id', "{{ $enrollment_id }}");

                // get user token
			    const userToken = getUserToken();

                await axios.post(`${getApiUrl()}/customer/reservation/upload-receipt`, formData, {
                        headers: {
                            'Authorization': 'Bearer ' + userToken
                        }
                    }).then(res => {
                        if ( res.data.success ) {
                            $('#modal-1').modal('show');
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

            $('#modal-1').on('hidden.bs.modal', function (e) {
                window.location = "{{ route('wave.reservation') }}"
            });

            // Event listener for form submission
            // $('#submitBtn').click(function() {
            //     var formData = new FormData();
            //     var file = $('#fileInput')[0].files[0]; // Get the selected file

            //     // Add the file to the FormData object
            //     formData.append('attachment', file);

            //     // Perform AJAX POST request to upload the file
            //     $.ajax({
            //         url: '/customer/reservation/upload-receipt',
            //         method: 'POST',
            //         data: formData,
            //         contentType: false,
            //         processData: false,
            //         success: function(response) {
            //             // Handle successful response here
            //             console.log(response);

            //             // Show the file preview after successful upload
            //             var reader = new FileReader(); // Create a FileReader object

            //             // Define what happens when the FileReader finishes loading
            //             reader.onload = function(event) {
            //                 var fileContent = event.target.result; // Get the file content
            //                 // Display the file content in the preview container
            //                 $('#filePreview').html('<p>File Preview:</p><pre>' +
            //                     fileContent + '</pre>');
            //             };

            //             // Read the uploaded file as text
            //             reader.readAsText(file);
            //         },
            //         error: function(xhr, status, error) {
            //             // Handle error
            //             console.error(xhr.responseText);
            //         }
            //     });
            // });
        });
    </script>
@endsection
