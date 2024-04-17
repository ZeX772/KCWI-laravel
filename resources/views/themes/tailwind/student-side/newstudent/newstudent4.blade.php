@extends('theme::layouts.customer')

@section('style')
<style>
    .frame {
        background: #f1f2f9;
        border-radius: 83px;
        border-style: solid;
        border-color: var(--app-color-tone-secondary-1-50percent,
                rgba(35, 54, 86, 0.5));
        border-width: 3px;
        padding: 0px 40px 0px 40px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: flex-start;
        flex-shrink: 0;
        width: 550px;
        height: 60px;
        position: relative;
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
    }

    .p24bb {
        color: var(--app-color-tone-primary, #171433);
        text-align: center;
        font-family: "Barlow-Bold", sans-serif;
        font-size: 24px;
    }

    .p24b {
        color: #171433;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 24px;
        font-weight: 600;
    }

    .p16b {
        color: rgba(23, 20, 51, 0.7);
        font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
    }

    .text {
        color: var(--app-color-tone-primary-1, rgba(23, 20, 51, 0.7));
        text-align: left;
        font-family: var(--app-text-styles-app-title-22-font-family,
                "Barlow-SemiBold",
                sans-serif);
        font-size: var(--app-text-styles-app-title-22-font-size, 22px);
        font-weight: var(--app-text-styles-app-title-22-font-weight, 600);
        position: relative;
    }

    .next-button {
        background: var(--app-color-tone-secondary-1, #233656);
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        border-radius: 30px;
        flex-shrink: 0;
        color: #ffffff;
        text-align: left;
        font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
        top: calc(50% - 8.5px);
        padding: 10px 30px 10px 30px;
    }

    .previous-button {
        background: rgba(170, 201, 228, 0.50);
        box-shadow: var(--app-drop-shadow-box-shadow,
                0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        color: #171433;
        text-align: left;
        font-family: var(--barlow-copy-3-font-family, "Barlow-Medium", sans-serif);
        top: calc(50% - 8.5px);
        border-radius: 30px;
        flex-shrink: 0;
        padding: 10px 20px 10px 20px;
    }

    .icn {
        position: absolute;
        margin-left: 500px;
    }

    .icn2 {
        margin-right: 10px;
        margin-bottom: 5px;

    }

    .addButton {
        background: var(--app-color-tone-bg-color, #F1F2F9);
        color: var(--app-color-tone-secondary-1, #233656);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 14px;
        font-weight: 600;
        position: relative;
        border: none;
    }

</style>
@endsection

@section('content')

<div class="d-flex flex-column" id="content-wrapper" style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 100%;">
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 0px;height: 31px;"><strong>New Student</strong></p>
    <div style="margin-bottom: 30px; position: absolute;" onclick="window.location.href='{{ route('wave.home') }}'"><button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button></div>
    <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
        <div style="width: 50%; padding-top: 30px;">
            <div class="progress beautiful progress-xs" style="height: 8px;border-top-left-radius: 50px;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-bottom-left-radius: 50px;">
                <div class="progress-bar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; background: var(--app-color-tone-testing, linear-gradient(180deg,rgba(127, 158, 211, 1) 0%, rgba(165, 208, 245, 1) 100%));">
                    <span class="visually-hidden">80%</span></div>
            </div>
            <div style="margin-top: 50px;">
                <p class="p24b" style="text-align: center;">Emergency Contact</p>
                <p class="p16b" style="text-align: center;">Please fill in the details (4/5)</p>
                <p class="p16b" style="text-align: center;">Note: You already will be the first emergency contact.<br>You can add more below</p>
            </div>
            <form action="{{ route('wave.newstudent4') }}" method="post">
                @csrf

                <div id="additionalEmergencyContacts"></div>

                <button type="button" class="addButton" onclick="addEmergencyContact()"><svg class="icn2" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.75 6.72656H8.5C8.4337 6.72656 8.37011 6.70022 8.32322 6.65334C8.27634 6.60646 8.25 6.54287 8.25 6.47656V2.22656C8.25 1.89504 8.1183 1.5771 7.88388 1.34268C7.64946 1.10826 7.33152 0.976563 7 0.976562C6.66848 0.976563 6.35054 1.10826 6.11612 1.34268C5.8817 1.5771 5.75 1.89504 5.75 2.22656V6.47656C5.75 6.54287 5.72366 6.60646 5.67678 6.65334C5.62989 6.70022 5.5663 6.72656 5.5 6.72656H1.25C0.918479 6.72656 0.600537 6.85826 0.366117 7.09268C0.131696 7.3271 0 7.64504 0 7.97656C0 8.30808 0.131696 8.62603 0.366117 8.86045C0.600537 9.09487 0.918479 9.22656 1.25 9.22656H5.5C5.5663 9.22656 5.62989 9.2529 5.67678 9.29979C5.72366 9.34667 5.75 9.41026 5.75 9.47656V13.7266C5.75 14.0581 5.8817 14.376 6.11612 14.6104C6.35054 14.8449 6.66848 14.9766 7 14.9766C7.33152 14.9766 7.64946 14.8449 7.88388 14.6104C8.1183 14.376 8.25 14.0581 8.25 13.7266V9.47656C8.25 9.41026 8.27634 9.34667 8.32322 9.29979C8.37011 9.2529 8.4337 9.22656 8.5 9.22656H12.75C13.0815 9.22656 13.3995 9.09487 13.6339 8.86045C13.8683 8.62603 14 8.30808 14 7.97656C14 7.64504 13.8683 7.3271 13.6339 7.09268C13.3995 6.85826 13.0815 6.72656 12.75 6.72656Z" fill="#233656" />
                    </svg>Emergency Contact</button>

                    <button type="button" class="addButton" onclick="removeEmergencyContact()">- Emergency Contact</button>

                <div class="d-xl-flex d-xxl-flex justify-content-between align-items-xl-center align-items-xxl-center" style="margin-top: 50px;">
                    <div><button class="button1 previous-button" type="button" onclick="window.location.href='{{ route('wave.newstudent3') }}'"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-right: 20px;">
                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z">
                                </path>
                            </svg>Previous</button></div>
                    <div><button class="button1 next-button" type="submit">Next<svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor" style="margin-left: 20px;">
                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                </path>
                            </svg></button></div>
                </div>
            </form>
        </div>
    </div>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
</body>
@endsection

@section('javascript')
<script>
    function addEmergencyContact() {
        // Get the number of existing emergency contacts
        var existingContacts = document.querySelectorAll('.emergency-contact').length;

        // Increment the number
        var newContactNumber = existingContacts + 1;

        // Create a new div for the additional emergency contact
        var newEmergencyDiv = document.createElement('div');
        newEmergencyDiv.className = 'emergency-contact';
        newEmergencyDiv.setAttribute('data-contact-number', newContactNumber);

        // Update the text based on the new contact number
        var newHeaderText = document.createElement('div');
        newHeaderText.className = 'p16b';
        newHeaderText.style.marginBottom = '10px';
        newHeaderText.innerHTML = '<strong>Emergency Contacts(' + newContactNumber + ')</strong>';
        newEmergencyDiv.appendChild(newHeaderText);

        // Append the input fields to the new div
        newEmergencyDiv.innerHTML += `
          <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
              <input class="frame text" type="text" name="emergency_contact_name[${newContactNumber}]" placeholder="Contact Person" required>
          </div>
          <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
              <input class="frame text" type="text" name="emergency_contact[${newContactNumber}]" placeholder="Phone" required>
          </div>
          <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center" style="margin-bottom: 10px;">
            <select class="frame text" name="emergency_contact_relationship[${newContactNumber}]" style=" -webkit-appearance: none; -moz-appearance: none; appearance: none;" required>
                            <option value="" disabled selected>What is the relationship with this student?
                            </option>
                            <option value="parent">Parent</option>
                            <option value="legal_guardian">Legal Guardian</option>
                            <option value="caretaker">Caretaker</option>
                            <option value='sibling'>Sibling</option>
                            <option value='cousin'>Cousin</option>
                        </select>
          </div>
      `;

        // Append the new div to the container
        document.getElementById('additionalEmergencyContacts').appendChild(newEmergencyDiv);
    }

    function removeEmergencyContact() {
    // Get the number of existing emergency contacts
    var existingContacts = document.querySelectorAll('.emergency-contact').length;

    // Ensure there is at least one contact to remove
    if (existingContacts >= 1) {
        // Get the last contact number
        var lastContactNumber = existingContacts;

        // Find and remove the last emergency contact
        var lastEmergencyDiv = document.querySelector('.emergency-contact[data-contact-number="' + lastContactNumber + '"]');
        lastEmergencyDiv.parentNode.removeChild(lastEmergencyDiv);
    } 
}


</script>

<script>
    @if(session('add_new_contact'))
        @if(session('add_new_contact')['status'] === 'fail')
            @php
                $addMessage = session('add_new_contact')['message'];
            @endphp

            @if (is_array($addMessage))
                @foreach ($addMessage as $key => $value)
                    @if (is_array($value))
                        @foreach ($value as $message)
                            toastr.error("{{ $message }}", { "timeOut": 20000 }); // 10 seconds timeout
                        @endforeach
                    @else
                        toastr.error("{{ $value }}", { "timeOut": 20000 }); // 10 seconds timeout
                    @endif
                @endforeach
            @else
                toastr.error("{{ $addMessage }}", { "timeOut": 20000 }); // 10 seconds timeout
            @endif

            @php
                session()->forget('add_new_contact');
            @endphp
        @endif
    @endif


    @if(session('add_final_new_student'))
        @if(session('add_final_new_student')['status'] === 'fail')
            @php
                $addMessage = session('add_final_new_student')['message'];
            @endphp

            @if (is_array($addMessage))
                @foreach ($addMessage as $key => $value)
                    @if (is_array($value))
                        @foreach ($value as $message)
                            toastr.error("{{ $message }}", { "timeOut": 20000 }); // 10 seconds timeout
                        @endforeach
                    @else
                        toastr.error("{{ $value }}", { "timeOut": 20000 }); // 10 seconds timeout
                    @endif
                @endforeach
            @else
                toastr.error("{{ $addMessage }}", { "timeOut": 20000 }); // 10 seconds timeout
            @endif

            @php
                session()->forget('add_final_new_student');
            @endphp
        @endif
    @endif
</script>
@endsection
