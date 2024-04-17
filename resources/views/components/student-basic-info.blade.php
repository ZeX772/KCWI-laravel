<div>
    <div class="row pl-3">
        <div class="d-xxl-flex mt-4">
            <!-- Avatar and Name -->
            <div class="w-25 d-flex flex-column align-items-center">
                <h2 id="detail-full_name" class="detail-name text-center pt-2">{{ $entry['name'] }}</h2>
                <h2 id="detail-chinese_name" class="detail-name text-center pt-2 pb-3">{{ $entry['student_information']['chinese_name'] }}</h2>
                <div class="main-page_avatar-container">
                    <img id="main-page_avatar" src="{{ $entry['image_path'] }}" />
                </div>
                <p id="detail-student_id" class="badge bg-secondary p-2 mt-2">{{ $entry['student_information']['student_id'] }}</p>
                <p id="detail-level" class="mt-3">{{ $entry['student_information']['student_id'] }}</p>
            </div>
            <!-- Main Details -->
            <div class="w-100 p-3 mt-5">
                <div class="row mb-3">
                    <div class="col-4">
                        <div>
                            <h6 class="detail-content-heading">DATE OF BIRTH (AGE)</h6>
                            <p id="detail-dob" class="detail-content-heading_value">{{ $entry['student_information']['year_age'] }}</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>
                            <h6 class="detail-content-heading">GENDER</h6>
                            <p id="detail-gender" class="detail-content-heading_value">{{ $entry['student_information']['gender'] }}</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>
                            <h6 class="detail-content-heading">HKID</h6>
                            <p id="detail-hkid" class="detail-content-heading_value">{{ $entry['student_information']['hkid'] ?? "-" }}</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div>
                            <h6 class="detail-content-heading">RESIDENTIAL ADDRESS</h6>
                            <p id="detail-address" class="detail-content-heading_value">{{ $entry['student_information']['address'] ?? "-" }}</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>
                            <h6 class="detail-content-heading">SCHOOL</h6>
                            <p id="detail-school" class="detail-content-heading_value">{{ $entry['student_information']['school_id'] ?? "-" }}</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>
                            <h6 class="detail-content-heading">PHONE</h6>
                            <p id="detail-phone" class="detail-content-heading_value">{{ $entry['student_information']['phone'] ?? "-" }}</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div>
                            <h6 class="detail-content-heading">GRADE OF CLASS</h6>
                            <p id="detail-grade_of_class" class="detail-content-heading_value">{{ $entry['student_information']['grade_of_class'] ?? "-" }}</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>
                            <h6 class="detail-content-heading">EMAIL</h6>
                            <p id="detail-email" class="detail-content-heading_value">{{ $entry['email'] ?? "-" }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Additional Details -->
        <div>
            <div class="row mt-5">
                <div class="col-4">
                    <h5 class="detail-column-heading mb-2">SIBLING</h5>
                    <div id="detail-siblings_container" class="grid-repeat-col-2 gap-5">
                        @if( count($entry['siblings']) > 0 )
                            @foreach( $entry['siblings'] as $sibling )
                                <div>
                                    <h6 class="detail-content-heading_value">{{ $sibling['name'] }}</h6>
                                    <p class="detail-content-heading">{{ $sibling['student_information']['student_id'] }} / {{ $sibling['student_information']['level']['name'] }}</p>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">No Data</p>
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <h5 class="detail-column-heading mb-2">GUARDIAN</h5>
                    <div id="detail-guardians_container" class="grid-repeat-col-2 gap-5">
                        @if( count($entry['guardians']) > 0 )
                            @foreach( $entry['guardians'] as $guardian )
                                <div>
                                    <h6 class="detail-content-heading_value">{{ $guardian['name'] }}</h6>
                                    <p class="detail-content-heading">{{ $guardian['pivot']['relationship'] }} / {{ $guardian['pivot']['phone'] }}</p>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">No Data</p>
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <h5 class="detail-column-heading mb-2">EMERGENCY CONTACT</h5>
                    <div id="detail-emergency-contact_container" class="grid-repeat-col-4">
                        @if( count($entry['emergency_contacts']) > 0 )
                            @foreach( $entry['emergency_contacts'] as $emergencyContact )
                                <div>
                                    <h6 class="detail-content-heading_value">{{ $emergencyContact['emergency_contact_name'] }}</h6>
                                    <p class="detail-content-heading">{{ $emergencyContact['emergency_contact_relationship'] }} / {{ $emergencyContact['emergency_contact'] }}</p>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">No Data</p>
                        @endif
                    </div>
                </div>
            </div>
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