@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <x-page-content-heading 
        heading="QR Scanner" 
        buttonModalTarget="#general-qr-modal" 
        buttonType="button"
        buttonId="general-qr_btn"
        buttonTitle="GENERAL QR"
    />
    <div class="row mt-4">
        <div class="col-xxl-12 page-content-col1 d-flex justify-content-center">
            <div class="card w-50 m-5">
                <div class="card-body">
                    <div id="reader"></div>
                    <div class="d-flex justify-content-center mt-3">
                        <div class="w-50">
                            <div class="container d-xxl-flex align-items-xxl-center flex-column form-input-container gap-4 mb-3">
                                <x-form-select
                                    label="" 
                                    name="venue"
                                    id="venue"
                                    isRequired="false"
                                >
                                    <option value="" hidden>Select Location</option>
                                    @foreach($venues as $venue)
                                        <option value="{{ $venue['id'] }}">{{ $venue['name'] }}</option>
                                    @endforeach
                                </x-form-select>

                                <x-primary-button type="button" id="start-scanner_btn" title="START SCANNER" toggle="" target=""/>
                                <x-primary-button type="button" id="stop-scanner_btn" customClass="d-none" title="STOP SCANNER" toggle="" target=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        var html5QrCode = new Html5Qrcode("reader");
        var selectedLocation = '';
        var config = { fps: 20, qrbox: { width: 250, height: 250 } };
        var scannedComplete = false;

        $('#start-scanner_btn').on('click', function(){
            
            // Validate if there's a selected venue
            const venue = $('select[name=venue]').val();
            if( venue == '' ) {
                $('select[name=venue]').addClass('border border-danger');
                $('select[name=venue]').after('<p class="text-danger" style="font-size: 12px;">Please select location first.</p>');
                return;
            }

            $(this).attr('disabled', true);

            selectedLocation = venue;

            html5QrCode.start({ facingMode: "user" }, config, qrCodeSuccessCallback).then(()=>{
                $(this).removeAttr('disabled');

                $(this).parent().addClass('d-none');
                $('#stop-scanner_btn').removeClass('d-none');
                $('#stop-scanner_btn').parent().removeClass('d-none');
            }).catch((err)=>{
                console.log(err);
                
                $(this).removeAttr('disabled');
            });
        });

        $('#stop-scanner_btn').on('click', function(){
            $(this).parent().addClass('d-none');
            $('#start-scanner_btn').parent().removeClass('d-none');

            html5QrCode.stop().then((ignore) => {
                // QR Code scanning is stopped.
            }).catch((err) => {
                // Stop failed, handle it.
            });
        });

        $('select[name=venue]').on('change', function(){
            $(this).removeClass('border border-danger');

            if( $(this).next().is('p') )
                $(this).next().remove();
        });

        async function qrCodeSuccessCallback(decodedText, decodedResult) {
            /* handle success */
            if(! $('body').hasClass('swal2-container') && ! scannedComplete) {
                scannedComplete = true;
                // get user token
			    const userToken = getUserToken();

                const transformedData = {
                    user_id: decodedText,
                    venue_id: selectedLocation
                };

                await axios.post(`${getApiUrl()}/class/scan-qr`, transformedData, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + userToken
                        }
                    }).then(res => {
                        if ( res.data.success ) {
                            toastTopEnd("Success", res.data.message, "success");
                        } else {
                            toastInfo("Oops!", res.data.message, "warning");
                        }
                    })
                    .catch(error => {
                        
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
                        // scannedComplete = false;
                    });

                setTimeout(() => {
                    scannedComplete = false;
                }, 5000);
            }
        };
    });
</script>
@endsection
