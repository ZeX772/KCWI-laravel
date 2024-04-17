@extends('theme::layouts.customer')

@section('style')
    <style>
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

        .p24b {
            color: #171433;
            text-align: left;
            font-family: var(--apptextstyles-h-4-heading-font-family,
                    "Poppins-Bold",
                    sans-serif);
            font-size: var(--apptextstyles-h-4-heading-font-size, 24px);
            font-weight: var(--apptextstyles-h-4-heading-font-weight, 700);
            position: relative;
        }

        .p24bb {
            color: var(--appcolortone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 25px;
            font-weight: 700;
            position: relative;
            margin-bottom: 50px;
            height: 31px;
            white-space: nowrap;
        }

        .urgentnewbox {
            background: #ffffff;
            border-radius: 34px;
            flex: 1;
            height: 143px;
            position: relative;
            box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.5);
        }

        .p18b {
            color: var(--appcolortone-primary, #171433);
            text-align: left;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 18px;
            font-weight: 600;
            position: relative;
        }

        .p165 {
            color: var(--appcolortone-secondary-1, #233656);
            text-align: left;
            font-family: "Barlow-Medium", sans-serif;
            font-size: 16px;
            line-height: 17.99px;
            font-weight: 500;
            position: relative;
            align-self: stretch;
            margin-bottom: 0px;
        }

        .date {
            color: var(--appcolortone-black-80, rgba(0, 0, 0, 0.8));
            text-align: right;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 16px;
            font-weight: 600;
            opacity: 0.5;
            position: absolute;
            right: 2.73%;
            left: 89.23%;
            width: 8.04%;
            bottom: 55.24%;
            top: 18.18%;
            height: 26.57%;
        }

        .date2 {
            color: var(--appcolortone-secondary-1-50, rgba(35, 54, 86, 0.5));
            text-align: right;
            font-family: "Barlow-SemiBold", sans-serif;
            font-size: 16px;
            font-weight: 600;
            position: relative;
        }
    </style>
@endsection

@section('content')


            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
                style="background: #FFF;padding: 20px; height: 100vh;">
                <div class="container-fluid d-flex flex-column p-0"><a
                        class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                        href="#"><img src="{{ asset('themes/tailwind/images/HKSA-logo-1.png') }}"
                            style="width: 200px;height: 67px; margin-top: 60px;" width="191" height="16"></a>
                    <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
                        <li class="nav-item"><a class="nav-link1 active d-xl-flex align-items-xl-center"
                                href="{{ route('wave.loginwithoutclass') }}"
                                style="height: 56px;width: 250px; text-decoration: none;"><img
                                    src="{{ asset('themes/tailwind/images/home.png') }}"
                                    style="width: 20px;margin-right: 20px; filter: brightness(0) invert(1);"><span
                                    class="fw-normal p16normal3" style="color: #FFFFFF;">Home</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('wave.schedule') }}"
                                style="width: 250px;"><img src="{{ asset('themes/tailwind/images/student.png') }}"
                                    style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                    style="color: rgb(145, 155, 171);">Schedule</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="Home/2-Notification.html" style="width: 250px;"><img
                                    src="{{ asset('themes/tailwind/images/account.png') }}"
                                    style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                    style="color: rgb(145, 155, 171);">Account</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('wave.notificationdetails') }}"
                                style="width: 250px;"><img src="{{ asset('themes/tailwind/images/notification.png') }}"
                                    style="width: 20px;margin-right: 20px;"><span class="fw-normal p16normal3"
                                    style="color:  rgb(145, 155, 171);">Notification</span></a></li>
                    </ul>
                </div>
            </nav>

            <div class="d-flex flex-column" id="content-wrapper"
                style="padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);position: relative;">
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb">Urgent News</p>
                <div style="width: 100%; margin-bottom: 30px; position: absolute;" onclick="goBack()"><button
                        class="button2" type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></a></div>
                <div style="height: auto;margin-bottom: 50px;">
                    <p class="p24b">Urgent News</p>
                    <br />
                    <div class="d-md-flex d-xl-flex flex-column justify-content-md-center divcard urgentnewbox"
                        style="padding: 15px;padding-right: 20px;height: auto;">
                        <div
                            class="d-md-flex d-xl-flex d-xxl-flex justify-content-between align-items-md-start align-items-xl-start align-items-xxl-start">
                            <div class="d-md-flex d-xl-flex d-xxl-flex align-items-md-start align-items-xl-center">
                                <div><img src="{{ asset('themes/tailwind/images/newslogored.png') }}" style="width: 70px;"
                                        width="70" height="70"></div>
                                <div style="margin-left: 10px;">
                                    <p class="p18b" style="text-align: left;"><strong>Suspended Classes</strong></p>
                                    <p class="p165" style="text-align: left;margin-bottom: 0px;">All swimming classes will
                                        be suspended from 7 Jan until further notice. We shall keep you updated for the
                                        resumption of our swimming classes via emails and social media regularly.</p>
                                </div>
                            </div>
                            <div>
                                <p class="p16normal3 date">8:25 AM<br>6/1/2022</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="p24b">Past News</p>
                    <br />
                    <div class="accordion" role="tablist" id="accordion-5"
                        style="border-radius: 24px 24px 0px 0px;background: #FFF;box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);margin-bottom: 20px;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;width: 100%;">
                        <div class="accordion-item"
                            style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;">
                            <h2 class="accordion-header" role="tab"
                                style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;">
                                <button class="accordion-button d-xl-flex p18b" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-5 .item-1" aria-expanded="true"
                                    aria-controls="accordion-5 .item-1"
                                    style="background: rgb(253,254,255);color: #171433;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;"><strong>News
                                        Title</strong></button></h2>

                            <div class="accordion-collapse collapse show item-1" role="tabpanel"
                                data-bs-parent="#accordion-5"
                                style="border-top-style: solid;border-top-color: rgba(35, 54, 86, 0.50);">
                                <div class="accordion-body">
                                    <p class="mb-0 p165" style="text-align: left;">when an unknown printer took a galley of
                                        type and scrambled it to make a type specimen book. It has survived not only five
                                        centuries, but also the leap into electronic typesetting, remaining essentially
                                        unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                        containing Lorem Ipsum passages, and more recently.<br>Lorem Ipsum passages, and
                                        more recently</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion" role="tablist" id="accordion-4"
                        style="border-radius: 24px 24px 0px 0px;background: #FFF;box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);margin-bottom: 20px;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;width: 100%;">
                        <div class="accordion-item"
                            style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;">
                            <h2 class="accordion-header" role="tab"
                                style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;">
                                <button class="accordion-button d-xl-flex p18b" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-4 .item-1" aria-expanded="true"
                                    aria-controls="accordion-4 .item-1"
                                    style="background: rgb(253,254,255);color: #171433;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;"><strong>News
                                        Title</strong></button></h2>
                            <div class="accordion-collapse collapse show item-1" role="tabpanel"
                                data-bs-parent="#accordion-4"
                                style="border-top-style: solid;border-top-color: rgba(35, 54, 86, 0.50);">
                                <div class="accordion-body">
                                    <p class="mb-0 p165" style="text-align: left;">when an unknown printer took a galley
                                        of type and scrambled it to make a type specimen book. It has survived not only five
                                        centuries, but also the leap into electronic typesetting, remaining essentially
                                        unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                        containing Lorem Ipsum passages, and more recently.<br>Lorem Ipsum passages, and
                                        more recently</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion" role="tablist" id="accordion-3"
                        style="border-radius: 24px 24px 0px 0px;background: #FFF;box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);margin-bottom: 20px;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;width: 100%;">
                        <div class="accordion-item"
                            style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;">
                            <h2 class="accordion-header" role="tab"
                                style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;">
                                <button class="accordion-button d-xl-flex p18b" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-3 .item-1" aria-expanded="true"
                                    aria-controls="accordion-3 .item-1"
                                    style="background: rgb(253,254,255);color: #171433;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;"><strong>News
                                        Title</strong></button></h2>
                            <div class="accordion-collapse collapse show item-1" role="tabpanel"
                                data-bs-parent="#accordion-3"
                                style="border-top-style: solid;border-top-color: rgba(35, 54, 86, 0.50);">
                                <div class="accordion-body">
                                    <p class="mb-0 p165" style="text-align: left;">when an unknown printer took a galley
                                        of type and scrambled it to make a type specimen book. It has survived not only five
                                        centuries, but also the leap into electronic typesetting, remaining essentially
                                        unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                        containing Lorem Ipsum passages, and more recently.<br>Lorem Ipsum passages, and
                                        more recently</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion" role="tablist" id="accordion-2"
                        style="border-radius: 24px 24px 0px 0px;background: #FFF;box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);margin-bottom: 20px;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;width: 100%;">
                        <div class="accordion-item"
                            style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;">
                            <h2 class="accordion-header" role="tab"
                                style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;">
                                <button class="accordion-button d-xl-flex p18b" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-2 .item-1" aria-expanded="true"
                                    aria-controls="accordion-2 .item-1"
                                    style="background: rgb(253,254,255);color: #171433;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;"><strong>News
                                        Title</strong></button></h2>
                            <div class="accordion-collapse collapse show item-1" role="tabpanel"
                                data-bs-parent="#accordion-2"
                                style="border-top-style: solid;border-top-color: rgba(35, 54, 86, 0.50);">
                                <div class="accordion-body">
                                    <p class="mb-0 p165" style="text-align: left;">when an unknown printer took a galley
                                        of type and scrambled it to make a type specimen book. It has survived not only five
                                        centuries, but also the leap into electronic typesetting, remaining essentially
                                        unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                        containing Lorem Ipsum passages, and more recently.<br>Lorem Ipsum passages, and
                                        more recently</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion" role="tablist" id="accordion-1"
                        style="border-radius: 24px 24px 0px 0px;background: #FFF;box-shadow: 0px 4px 4px 0px rgba(35, 54, 86, 0.50);margin-bottom: 20px;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;width: 100%;">
                        <div class="accordion-item"
                            style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;">
                            <h2 class="accordion-header" role="tab"
                                style="border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;">
                                <button class="accordion-button d-xl-flex p18b" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion-1 .item-1" aria-expanded="true"
                                    aria-controls="accordion-1 .item-1"
                                    style="background: rgb(253,254,255);color: #171433;border-top-left-radius: 30px;border-top-right-radius: 30px;border-bottom-right-radius: 30px;border-bottom-left-radius: 30px;border-style: none;"><strong>News
                                        Title</strong></button></h2>
                            <div class="accordion-collapse collapse show item-1" role="tabpanel"
                                data-bs-parent="#accordion-1"
                                style="border-top-style: solid;border-top-color: rgba(35, 54, 86, 0.50);">
                                <div class="accordion-body">
                                    <p class="mb-0 p165" style="text-align: left;">when an unknown printer took a galley
                                        of type and scrambled it to make a type specimen book. It has survived not only five
                                        centuries, but also the leap into electronic typesetting, remaining essentially
                                        unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                        containing Lorem Ipsum passages, and more recently.<br>Lorem Ipsum passages, and
                                        more recently</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('javascript')
    <script></script>
@endsection
