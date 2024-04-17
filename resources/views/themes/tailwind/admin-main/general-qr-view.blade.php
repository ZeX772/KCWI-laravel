@extends('theme::layouts.app')

@section('content')
<div class="page-container">
    <div class="row mt-4">
        <!-- Student List | Left - Table Section -->
        <div class="col-xxl-12 page-content-col1 d-flex justify-content-center">
            <div class="card w-50 m-5">
                <div class="card-body">
                    <div id="qr-container" class="d-flex justify-content-center">
                        <!-- <x-svg-icon icon="qr" width="300" height="300" /> -->
                        <!-- {!! QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') !!}
                        <div>

                        </div> -->
                    </div>
                    <div id="qr-details_container" class="d-flex align-items-center justify-content-center mt-5">
                        <div class="w-100 p-3">
                            <div class="row mb-3 mt-2">
                                <div class="col-6">
                                    <div class="text-center">
                                        <h6 class="detail-content-heading">NAME</h6>
                                        <p id="detail-dob" class="detail-content-heading_value">{{ $venue_data['name'] }}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <h6 class="detail-content-heading">CONTACT PERSON</h6>
                                        <p id="detail-dob" class="detail-content-heading_value">{{ $venue_data['contact_person'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="text-center">
                                        <h6 class="detail-content-heading">Address</h6>
                                        <p id="detail-phone" class="detail-content-heading_value">{{ $venue_data['address'] }}</p>
                                    </div>
                                </div>
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
<script src="{{ asset('themes/' . $theme->folder . '/js/qrcode.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        var classData = <?= json_encode($venue_data) ?>;

        function generateQRCode(url) {
            $("#qr-container").empty();

            new QRCode(document.getElementById("qr-container"), url);
        }

        async function generateQR(){
            
            // get user token
			const userToken = getUserToken();

            transformedData = {
                id: classData.id
            };

            await axios.post(`${getApiUrl()}/class/generate-venue-qr`, transformedData, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + userToken
                        }
                    }).then(res => {
                        if ( res.data.success ) {
                            console.log(res.data.response);
                            generateQRCode(res.data.response);
                        } else {
                            console.log()
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
                    });
            
        }

        generateQR();

        setInterval(() => {
            generateQR();
         }, 30000);
    });
</script>
@endsection
