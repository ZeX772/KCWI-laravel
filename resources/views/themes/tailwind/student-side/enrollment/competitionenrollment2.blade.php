@extends('theme::layouts.customer')

@section('style')
    <style>
        .p24bb {
            color: var(--app-color-tone-primary, #171433);
            text-align: center;
            font-family: "Barlow-Bold", sans-serif;
            font-size: 24px;
        }

        .container {
            background: #ffffff;
            border-radius: 36px;
            height: auto;
            box-shadow: var(--app-drop-shadow-box-shadow,
                    0px 4px 4px 0px rgba(35, 54, 86, 0.5));
        }

        .button1 {
            border-radius: 30px;
            border-style: none;
            height: 50px;
            color: white;
            background: #FF4553;
            width: 313px;
        }
    </style>
@endsection

@section('content')


            

@foreach ($competitions as $competition)
            <div class="d-flex flex-column" id="content-wrapper"
                style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9);width: 100%;">
                <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb"
                    style="margin-bottom: 0px;height: 31px;"><strong>T&C for swimming competition</strong></p>
                <div style="margin-bottom: 30px; position: absolute;"
                    onclick="window.location.href='{{ route('wave.enrollment') }}'"><button class="button2" type="button"
                        style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i
                            class="fas fa-chevron-left"></i></button></div>

                <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
                    <div class="divcard container" style="width: 60%;padding: 30px; margin-top: 50px;">
                        <ol class="p14b">
                            <li>1.Eligibility: The competition is open to all swimmers who are 8 years of age or older at
                                the time of the competition.</li>
                            <li>2.Registration: Participants must register online or in-person before the competition.
                                Participants must provide their full name, date of birth, contact information, and any other
                                details required by the competition organizers. Participants must also pay the registration
                                fee to complete the registration process.</li>
                            <li>3.Rules and Regulations: Participants must follow all rules and regulations of the
                                competition, including but not limited to, the stroke style, start, finish, and turns. Any
                                violation of the rules will result in disqualification from the competition.</li>
                            <li>4.Safety: Participants must ensure their own safety during the competition. It is
                                recommended that participants have basic swimming skills and are able to swim in deep water.
                                The competition organizers will not be responsible for any injury or accident during the
                                competition.</li>
                            <li>5.Liability: The competition organizers will not be responsible for any loss or damage to
                                personal belongings during the competition. Participants are responsible for their own
                                belongings.</li>
                            <li>6.Disqualification: The competition organizers have the right to disqualify any participant
                                who violates the terms and conditions of the competition or engages in any unsportsmanlike
                                behavior.</li>
                            <li>7.Results: The results of the competition will be announced after the competition. The
                                competition organizers will not be responsible for any errors or omissions in the results.
                            </li>
                            <li>8.Awards: The winners of the competition will receive awards as determined by the
                                competition organizers. The awards cannot be exchanged or transferred.</li>
                            <li>9.Photography: By participating in the competition, participants grant permission to the
                                competition organizers to use their photographs, videos, and other images for promotional
                                purposes.</li>
                            <li>10.Changes: The competition organizers reserve the right to make changes to the terms and
                                conditions of the competition at any time without prior notice.</li>
                            <li>11.Jurisdiction: These terms and conditions shall be governed by and construed in accordance
                                with the laws of the jurisdiction in which the competition is held. Any dispute arising out
                                of or in connection with these terms and conditions shall be subject to the exclusive
                                jurisdiction of the courts of that jurisdiction.</li>
                        </ol>
                        <p class="p14b">By registering for the competition, participants agree to the above-mentioned
                            terms and conditions.</p>
                        <div class="d-xxl-flex justify-content-xxl-center"><button class="button1"id="agreeButton">I Agree</button>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#agreeButton').click(function(){
            window.location.href = "{{ route('wave.competitionenrollment2', ['id' => $competition['id']]) }}"
        });
    });
    </script>
@endsection
