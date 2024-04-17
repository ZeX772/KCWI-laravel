<div>
    <div class="row pl-3">
        <div class="col d-xxl-flex flex-column" style="border: 1px solid rgb(232,232,232);border-top-right-radius: 10px;border-bottom-right-radius: 11px;padding-top: 20px;">
            <div class="d-xxl-flex">
                <div class="w-25 d-flex flex-column align-items-center pt-4">
                    <div class="main-page_avatar-container">
                        <img id="main-page_avatar" src="{{ $entry['image_path'] ? $entry['image_path'] : asset('themes/tailwind/images/profile.png') }}">
                    </div>
                    <h1 id="detail-full_name" style="font-size: 18px;font-family: Poppins, sans-serif;color: #3B3B3B;text-align: center;padding-top: 10px;">-</h1>
                </div>
                <div class="w-100 p-3">
                    <div class="col d-xxl-flex justify-content-between align-items-xxl-center mb-4">
                        <h1 class="fw-semibold text-nowrap" style="font-size: 15px;font-family: Poppins, sans-serif;color: #3B3B3B;text-align: center;">Personal Information</h1>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <div>
                                <h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">USER NAME</h1>
                                <h1 id="detail-username" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{ $entry['username'] }}</h1>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">DATE OF BIRTH</h1>
                                <h1 id="detail-dob" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{ $entry['coach_details']['dob'] }}</h1>
                            </div>
                        </div>
                        <!-- <div class="col">
                            <div>
                                <h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">GENDER</h1>
                                <h1 id="detail-gender" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                            </div>
                        </div> -->
                        <div class="col-4">
                            <div>
                                <h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">HKID</h1>
                                <h1 id="detail-hkid" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{ $entry['coach_details']['hkid'] }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <div>
                                <h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">RESIDENTIAL ADDRESS</h1>
                                <h1 id="detail-address" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{ $entry['coach_details']['address'] }}</h1>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">RESPONSE COURSE</h1>
                                <h1 id="detail-response_course" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">-</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <div>
                                <h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">EMAIL</h1>
                                <h1 id="detail-email" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{ $entry['email'] }}</h1>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">PHONE</h1>
                                <h1 id="detail-phone" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{ $entry['coach_details']['phone'] }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <h1 style="color: #7A7A7A;font-size: 12px;font-family: Poppins, sans-serif;">REMARKS</h1>
                                <h1 id="detail-remarks" style="color: #3B3B3B;font-size: 14px;font-family: Poppins, sans-serif;">{{ $entry['coach_details']['remarks'] }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-xxl-flex">
                <div class="w-100 p-3">
                    <div class="row mb-3">
                        <div class="col-4">
                            <div>
                                <h5 class="additional-details_title">BANK ACC(S)</h5>
                                <div class="bank-accounts_container">
                                    @foreach( $entry['coach_bank_details'] as $coachBankDetail )
                                        <div class="mb-2">
                                            <p class="additional-items_title fw-bold">{{ $coachBankDetail['bank']['bank_name'] }}</p>
                                            <p class="additional-items_subtitle">{{ $coachBankDetail['bank_account_name'] }}</p>
                                            <p class="additional-items_subtitle">{{ $coachBankDetail['bank_account'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <h5 class="additional-details_title">PAY RATE(S)</h5>
                                <div class="pay-rates_container">
                                    <div>
                                        <p class="additional-items_title ">All Courses</p>
                                        <p class="additional-items_subtitle">({{ $entry['coach_details']['payment_type'] }})</p>
                                        <p class="additional-items_subtitle">${{ $entry['coach_details']['monthly_rate'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <h5 class="additional-details_title">NOT AVAILABLE</h5>
                                <div class="availabilities_container">
                                    @foreach( $entry['coach_availability'] as $coachAvailability )
                                        <?php
                                            $value = $coachAvailability['availability_type'] != 'custom_date'
                                                ? ($coachAvailability['availability_start'] ?? "") . " - " . ($coachAvailability['availability_end'] ?? "")
                                                : ($coachAvailability['from_date'] ?? "") . " " . ($coachAvailability['from_time'] ?? "") . " - " . ($coachAvailability['to_date'] ?? "") . " " . ($coachAvailability['to_time'] ?? "");
                                        ?>

                                        <div class="mb-2">
                                            <p class="additional-items_title ">{{ $coachAvailability['availability_type'] == 'custom_date' ? "Custom Date" : ucfirst($coachAvailability['availability_type']) }}</p>
                                            <p class="additional-items_subtitle">{{ $value }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="mt-5">
                <ul class="nav nav-tabs d-xxl-flex justify-content-xxl-start gap-4" role="tablist" style="border-style: none; border-left-style: none; border-bottom: 2px solid #F5F5F5;">
                    <li class="nav-item" role="presentation" style="border-left-style: none;">
                        <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1" style="border-style: none; border-left-style: none; font-size: 14px; font-family: Poppins, sans-serif; font-weight: 600; padding: 0 0 6px 0;">BASIC INFORMATION</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" href="{{ route('wave.user.admin-main.coach-history') }}" style="border-style: none; border-left-style: none; padding: 0 0 6px 0; font-size: 14px; font-weight: 400;">TEACHING HISTORY</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" href="{{ route('wave.user.admin-main.coach-comment') }}" style="border-style: none; border-left-style: none; padding: 0 0 6px 0; font-size: 14px; font-weight: 400;">COACH COMMENT</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active" role="tabpanel">
                        <div class="col" style="margin-top: 20px; ">
                            <h1 class="text-nowrap mb-2" style="display: flex; align-items: center;color: #3B3B3B;font-size: 20px;font-family: Poppins, sans-serif;">
                                Coach Contact
                                <span class="ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg">
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                    </svg>
                                </span>
                            </h1>
                            <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="height: 40px;background: #F5F5F5;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding: 7px 20px 7px 20px; display: grid !important; grid-template-columns: 0.7fr 1fr 60px;">
                                <h1 style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;">Coach Contact.pdf</h1>
                                <h1 style="display: flex; align-items: center;color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-calendar" style="margin-right: 10px;">
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                        </svg>
                                    </span>
                                    20/11/2021
                                </h1>
                                <h1 style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif; display: flex; justify-content: flex-end;">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                                        </svg>
                                    </span>
                                </h1>
                            </div>
                        </div>
                        <div class="col" style="margin-top: 20px;">
                            <h1 class="text-nowrap mb-2" style="display: flex; align-items: center;color: #3B3B3B;font-size: 20px;font-family: Poppins, sans-serif;">
                                Other Attachment (e.g. Certificate)
                                <span class="ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg">
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                    </svg>
                                </span>
                            </h1>
                            <div class="d-xxl-flex justify-content-between align-items-xxl-center" style="height: 40px;background: #F5F5F5;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;padding: 7px 20px 7px 20px; display: grid !important; grid-template-columns: 0.7fr 1fr 60px;">
                                <h1 style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;opacity: 0.50;">No File</h1>
                                <h1 class="text-nowrap" style="display: flex; align-items: center;color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif;opacity: 0.50;">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-calendar" style="margin-right: 10px;">
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                        </svg>
                                    </span>
                                    --/--/--
                                </h1>
                                <h1 style="color: #3B3B3B;font-size: 15px;font-family: Poppins, sans-serif; display: flex; justify-content: flex-end;">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-eye" style="opacity: 0.50;">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                                        </svg>
                                    </span>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<style>
	.additional-details_title {
		color: #4A5C7A;
		font-weight: 700;
		font-size: 15px;
	}
	
	.additional-items_title {
		font-size: 14px;
		font-weight: 600;
	}

	.additional-items_subtitle {
		font-size: 14px;
	}
</style>

<script>
    $(function() {
    });
</script>