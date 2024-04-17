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
                                        <h6 class="detail-content-heading">CLASS NAME</h6>
                                        <p id="detail-dob" class="detail-content-heading_value">{{ $class_data['course_class_code'] }}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <h6 class="detail-content-heading">COURSE NAME</h6>
                                        <p id="detail-dob" class="detail-content-heading_value">{{ $class_data['course']['course_abbreviation'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="text-center">
                                        <h6 class="detail-content-heading">CLASS START DATE & TIME</h6>
                                        <p id="detail-phone" class="detail-content-heading_value">{{ $class_data['formated_start_date_time'] }}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <h6 class="detail-content-heading">CLASS END DATE & TIME</h6>
                                        <p id="detail-grade_of_class" class="detail-content-heading_value">{{ $class_data['formated_end_date_time'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="text-center">
                                        <h6 class="detail-content-heading">VENUE</h6>
                                        <p id="detail-phone" class="detail-content-heading_value">{{ $class_data['course']['venue_data']['name'] }}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <h6 class="detail-content-heading">FACILITY</h6>
                                        <p id="detail-grade_of_class" class="detail-content-heading_value">{{ $class_data['course']['facility']['name'] }}</p>
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
        var classData = <?= json_encode($class_data) ?>;

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

            await axios.post(`${getApiUrl()}/class/generate-class-qr`, transformedData, {
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + userToken
                        }
                    }).then(res => {
                        if ( res.data.success ) {
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

                        // Handle errors
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
