@extends('theme::layouts.login')

@section('content')
<section class="h-100" style="width: 100vw;">
    <div class="row h-100" id="verify-otp-container" style="margin-right: 0px;margin-left: 0px;width: 100vw;">
        <div class="col-md-6 d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center h-100" style="text-align: center;padding: 0px;width: 50vw;">
            <div style="width: 400px;"><img src="{{ asset('themes/tailwind/images/Logo.png') }}">
                <h1 style="font-size: 50px;font-weight: bold;color: #4A5C7A;margin-top: 50px;">Welcome to Admin Panel</h1>
            </div>
        </div>
        <div class="col-md-6 d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center h-100" style="border-left: 1px solid #AAC9E4;padding: 0px;width: 50vw;">
            <form action="{{ route('wave.user.admin-panel.check-otp') }}" method="POST">
                <input type="hidden" name="email" value="{{ isset($email) ? $email : '' }}">
                <div style="width: 400px;">
                    <div style="color: #636363;text-align: center;">
                        <center><img src="{{ asset('themes/tailwind/images/Lock.png') }}"></center>
                        <h1 style="color: #3B3B3B;font-size: 36px;">Verifying</h1>
                        <h1 style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">We’ve sent your verification code to your email.</h1>
                    </div>
                    <div style="margin-top: 30px;">
                        <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Enter code</h1>
                        <input type="text" name="otp" class="{{ $errors->has('otp') ? 'border border-danger' : '' }}" style="width: 100%;height: 48px;border-style: none;background: #F5F5F5;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;color: #3B3B3B;font-family: Poppins, sans-serif;padding-top: 1px;padding-left: 16px;">
                        @if ($errors->has('otp'))
                            <div class="mt-1 text-red-500">
                                {{ $errors->first('otp') }}
                            </div>
                        @endif
                        <h1 class="cursor-pointer resend-code-btn" style="font-size: 14px;font-family: Poppins, sans-serif;margin-top: 10px;"><span class="resend-code-text" style="color: #4A5C7A;">Resend Code</span> <span id="countdown"></span></h1>
                    </div>
                    <div class="d-xl-flex align-items-xl-center password-container " style="width: 100%;margin-top: 50px;">
                        <button type="submit" id="verify-btn" class="btn btn-primary d-xl-flex justify-content-xl-center align-items-xl-center" style="width: 100%;height: 48px;background: #4A5C7A;font-family: Poppins, sans-serif;box-shadow: 0px 7px #39455b;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;border-left-style: none;border-left-color: var(--bs-btn-disabled-color);">
                            <div class="spinner-border d-none" role="status" style="width: 17px; height: 17px; margin-right: 5px;">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Verify
                        </button>
                    </div>
                    <div class="text-center d-xl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center password-container" style="width: 100%;margin-top: 50px;text-align: center;"><a href="{{ route('wave.user.admin-panel.index') }}" style="color: #4A5C7A;font-size: 14px;font-family: Poppins, sans-serif;">Go back to Login</a></div>
                </div>
            </form>
            
        </div>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
    $(function() {
        var countdownSeconds = 120;
        var countdownStarted = false;
        var countdownExpiration = '<?= $countdown_expiration; ?>';

        /**
         * ---------------------------
         * EVENTS
         * ---------------------------
         */
        /** RESEND action
         * Request through API
         */
        $('#verify-otp-container').on('click', '.resend-code-btn', async function() {
            if (! countdownStarted ) {
                countdownStarted = true;

                // remove cursor pointer class and change the text color to #b0b3b7
                $(this).toggleClass('cursor-pointer');
                $('.resend-code-text').css('color', '#b0b3b7');

                // Request through API to resend the code
                const email = $('input[name=email]').val();

                await axios.post('/api/resend-otp', { email: email }, {
						headers: {
							'Content-Type': 'application/json',
						}
					}).then(response => {
						console.log(response)
                        
                        startCountdown();
					})
					.catch(error => {
                        countdownStarted = false;
						
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

						console.error('Error resending code :', error);
					});
            }
        });

        /** DISABLE BUTTON and SHOW PROGRESS WHEN FORM SUBMITED
         * Disabling button with loading spinner
         */
        $('#verify-otp-container').on('click', '#verify-btn', function() {
            setTimeout(() => {
                $(this).attr("disabled", true);
                $('.spinner-border').toggleClass('d-none');
            }, 200);
        });

        /**
         * ---------------------------
         * FUNCTIONS
         * ---------------------------
         */
        function startCountdown() {
            countdownStarted = true;

            countdownSeconds = countdownExpiration ? ( countdownExpiration - Math.floor(Date.now() / 1000) ) : countdownSeconds;

            // Start the countdown
            var countdownInterval = setInterval(function() {
                $('#countdown').text('in ' + countdownSeconds + ' seconds');
                countdownSeconds--;

                if (countdownSeconds < 0) {
                    clearInterval(countdownInterval);
                    $('#countdown').text('');
                    $(this).toggleClass('cursor-pointer');
                    $('.resend-code-text').css('color', '#4A5C7A');
                    countdownStarted = false;
                }
            }, 1000);
        }

        if ( countdownExpiration != '' )
            startCountdown();
    })
</script>
@endsection