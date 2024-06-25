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

        .nav-link1 {
            background: var(--appcolortone-secondary-1, #233656);
            border-radius: 8px;
            padding: 0px 18px 0px 18px;
            display: flex;
            flex-direction: row;
            gap: 16px;
            align-items: center;
            justify-content: flex-start;
            flex-shrink: 0;
            width: 252px;
            height: 56px;
            position: relative;
        }

        .nav-link {
            left: 7%;
            border-radius: 8px;
            padding: 0px 18px 0px 18px;
            display: flex;
            flex-direction: row;
            gap: 16px;
            align-items: center;
            justify-content: flex-start;
            flex-shrink: 0;
            width: 252px;
            height: 56px;
            position: relative;
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

        .p24bb {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
            font-weight: 500;
            font-style: normal;
        }

        .container-fluid {
            display: flex;
            flex-direction: column;
        }

        .box {
            background: #ffffff;
            border-radius: 24px;
            padding: 12px 12px 12px 12px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
            justify-content: flex-start;
            align-self: stretch;
            flex-shrink: 0;
            height: 104px;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .p22bold {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 22px;
            font-weight: 700;
        }

        .p18 {
            color: var(--cm-scolor-accent, #4a5c7a);
            text-align: left;
            font-family: var(--barlow-copy-2-font-family, "Barlow-Medium", sans-serif);
            font-size: var(--barlow-copy-2-font-size, 16px);
            font-weight: var(--barlow-copy-2-font-weight, 500);
            position: relative;
            white-space: nowrap;
        }

        .box {
            background: #ffffff;
            border-radius: 24px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
            justify-content: flex-start;
            align-self: stretch;
            flex-shrink: 0;
            height: 104px;
            position: relative;
            box-shadow: var(--app-dropshadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* Two columns */
            grid-template-rows: repeat(2, auto);
            /* Two rows */
            gap: 10px;
            /* Gap between grid items */
        }

        .button1 {
            background: #233656;
            border-radius: 100.5px;
            padding: 4px 10px 4px 10px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            height: 79.6px;
            color: #ffffff;
            text-align: left;
            font-family: "Poppins-Medium", sans-serif;
            font-size: 18px;
            font-weight: 500;
            position: relative;
        }

        .textField {
            box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);
            height: 79.6px;
            background-color: transparent;
            margin-top: 20px;
            border-radius: 100.5px;
            border: 3px solid var(--app-color-tone-secondary-150, rgba(35, 54, 86, 0.50));
            font-family: Barlow;
            font-size: 18px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            width: 175%;
            margin-left: -2px;
        }

        .textField1 {
            height: 79.6px;
            background-color: transparent;
            margin-top: 20px;
            font-family: Barlow;
            font-size: 18px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            width: 175%;
            margin-left: -2px;
        }

        .textField input:focus {
            outline: none;
            border-bottom: none;
        }

        .textField1::placeholder {
            color: #171433;
        }
    </style>
@endsection

@section('content')


            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
                style="background: #FFF;padding: 20px;min-height:100%; ">
                <div class="container-fluid d-flex flex-column p-0">
                    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                        href="#"><img src="{{ asset('themes/tailwind/images/kcwi-logo-1.png') }}"
                            style="width: 200px;height: 67px; margin-top: 60px;" width="191" height="16"></a>
                    <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
                        <li class="nav-item"><a class="nav-link d-xl-flex align-items-xl-center" href="Home/1-Homepage.html"
                                style="height: 56px;width: 250px;"><img src="{{ asset('themes/tailwind/images/home.png') }}"
                                    style="width: 20px;margin-right: 15px;"><span class="fw-normal p16normal3"
                                    style="color: rgb(145,155,171);">Home</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="Home/2-Notification.html" style="width: 250px;"><img
                                    src="{{ asset('themes/tailwind/images/student.png') }}"
                                    style="width: 20px;margin-right: 30px;"><span class="fw-normal p16normal3"
                                    style="color: rgb(145, 155, 171);">Schedule</span></a></li>
                        <li class="nav-item"><a class="nav-link1 active" href="Home/2-Notification.html"
                                style="width: 250px;margin-top:-10px; text-decoration: none;"><img
                                    src="{{ asset('themes/tailwind/images/account.png') }}"
                                    style="width: 20px;margin-right: 15px;filter: brightness(0) invert(1);"><span
                                    class="fw-normal p16normal3"style="color: #FFFFFF;">Account</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="Notification/1-Notification.html"
                                style="width: 250px;"><img src="{{ asset('themes/tailwind/images/notification.png') }}"
                                    style="width: 20px;margin-right: 30px;"><span class="fw-normal p16normal3"
                                    style="color:  rgb(145, 155, 171);">Notification</span></a></li>
                    </ul>
                </div>
            </nav>
            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);min-height:100vh;">
                <div style="width: 100%;margin-bottom: 30px;">
                    <a href="{{ route('coach-personal-information') }}">
                        <button class type="button"
                            style="position: relative;border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;">
                            <i class="fas fa-chevron-left"></i></button></a>
                    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                        style="margin-bottom: 0px;height: 31px;margin-top:-40px;"><strong>Personal Information</strong></p>
                </div>
                <div class="d-xl-flex d-xxl-flex justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center"
                    style="margin-top: 20px;">
                    <div style="width: 50%;">
                        <p class="p16normal" style="text-align: center;color:#7a7a7a;">Edit your personal information</p>
                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center textField"
                            style="margin-top: 20px;margin-bottom: 10px;width: 100%;height: auto;padding-top: 10px;padding-bottom: 10px;padding-right: 40px;padding-left: 40px;">
                            <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start"
                                style="width: 100%;">
                                <p class="p13normal" style="margin-bottom: 0px;opacity: 0.50;font-style:normal;">
                                    <strong>First Name</strong></p><input id="firstName"type="text" class="textField1"
                                    style="margin-top:0px;height:100%;width: 100%;background: transparent;border-style: none;border-bottom-style: none;font-size: 18px;padding-top: 5px;padding-right: 5px;padding-bottom: 5px;padding-left: 5px;"
                                    placeholder="Coach">
                            </div>
                        </div>
                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center textField"
                            style="margin-top: 20px;margin-bottom: 10px;width: 100%;height: auto;padding-top: 10px;padding-bottom: 10px;padding-right: 40px;padding-left: 40px;">
                            <div class="d-xl-flex d-xxl-flex flex-column align-items-xl-start justify-content-xxl-start align-items-xxl-start"
                                style="width: 100%;">
                                <p class="p13normal" style="margin-bottom: 0px;opacity: 0.50;font-style:normal;">
                                    <strong>Last Name</strong></p><input id="lastName" type="text" class="textField1"
                                    style="margin-top:0px;height: auto;width: 100%;background: transparent;border-style: none;border-bottom-style: none;font-size: 18px;padding-top: 5px;padding-right: 5px;padding-bottom: 5px;padding-left: 5px;"
                                    placeholder="Chan">
                            </div>
                        </div>
                        <div><input id="phoneNo"type="text" class="textField"
                                style="width: 100%;padding-left: 40px;margin-top:5px;outline:none;"
                                placeholder="Phone No."><input id="location"type="text" class="textField"
                                style="width: 100%;padding-left: 40px;outline:none;" placeholder="Location"><input
                                id="address" type="text" class="textField"
                                style="width: 100%;padding-left: 40px;outline:none;" placeholder="Address"></div>
                        <div class="d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center"><button
                                id="changeBtn"class="button1" type="button"
                                style="margin-top: 20px;width:585px;">Change</button></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#changeBtn').click(function() {
                var firstName = $('#firstName').val();
                var lastName = $('#lastName').val();
                var phoneNo = $('#phoneNo').val();
                var location = $('#location').val();
                var address = $('#address').val();

                var errors = [];
                if (!firstName) {
                    errors.push("Please enter your first name.");
                }
                if (!lastName) {
                    errors.push("Please enter your last name.");
                }
                if (!phoneNo) {
                    errors.push("Please enter your phone number.");
                }
                if (!location) {
                    errors.push("Please enter your location.");
                }
                if (!address) {
                    errors.push("Please enter your address.");
                }

                if (errors.length > 0) {
                    var errorMessage = "Please enter the following missing details:\n" + errors.join("\n");
                    alert(errorMessage);
                } else {
                    var data = {
                        firstName: firstName,
                        lastName: lastName,
                        phoneNo: phoneNo,
                        location: location,
                        address: address,
                    };

                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '/edit-personal-information',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        data: data,
                        success: function(response) {
                            console.log(response);
                            window.location.href = 'personal-information';
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endsection
