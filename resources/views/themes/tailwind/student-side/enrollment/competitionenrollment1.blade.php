@extends('theme::layouts.customer')

@section('style')
<style>
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

    .p32 {
        color: #171433;
        text-align: left;
        font-family: var(--heading-heading-2-font-family, "Poppins-Bold", sans-serif);
        font-size: var(--heading-heading-2-font-size, 32px);
        font-weight: var(--heading-heading-2-font-weight, 700);
        position: absolute;
        left: calc(50% - 50px);
        top: calc(50% - 24px);
    }

    .p18b {
        color: #000000;
        text-align: left;
        font-family: var(--app-text-styles-text-medium-1-font-family,
                "Poppins-Medium",
                sans-serif);
        font-size: var(--app-text-styles-text-medium-1-font-size, 18px);
        font-weight: var(--app-text-styles-text-medium-1-font-weight, 500);
        position: relative;
        align-self: stretch;
    }

    .text {
        color: var(--app-color-tone-secondary-1, #233656);
        text-align: left;
        font-family: "Barlow-SemiBold", sans-serif;
        font-size: 18px;
        font-weight: 600;
        position: relative;
    }

    .nav-link2 {
        color: grey;
        margin-left: 12px;
    }

    .nav-link2.active {
        border-bottom: 2px solid black;
        color: black;
    }

    /* Card Style */
    .full-competition_container {
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .full-competition_container .full-competition_category {
        font-size: 32px;
        font-weight: 700;
    }
</style>
@endsection

@section('content')
<div class="d-flex flex-column" id="content-wrapper" style="padding: 50px;padding-top: 50px;padding-bottom: 50px;padding-right: 50px;padding-left: 50px;background: var(--app-color-tone-bg-color, #F1F2F9); width: 100%;min-height:100vh;">
    <p class="d-xl-flex justify-content-xl-center align-items-xl-center p24bb" style="margin-bottom: 0px;height: 31px;">
        <strong>Competition Enrollment</strong>
    </p>
    <div style="margin-bottom: 30px; position: absolute;" onclick="window.location.href='{{ route('wave.enrollment') }}'">
        <button class="button2" type="button" style="position: relative; border: none; background-color: white; padding: 10px; border-radius: 10.3226px; box-shadow: 1px 1px 2px black; width: 40px; height: 40px;"><i class="fas fa-chevron-left"></i></button>
    </div>
    <div class="d-xl-flex d-xxl-flex justify-content-xl-center justify-content-xxl-center">
        <div style="width: 50%; padding-top: 30px;">
            <div class="progress beautiful progress-xs" style="height: 8px;border-top-left-radius: 50px;border-top-right-radius: 50px;border-bottom-right-radius: 50px;border-bottom-left-radius: 50px;margin-bottom: 50px;">
                <div class="progress-bar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%; background: var(--app-color-tone-testing, linear-gradient(180deg,rgba(127, 158, 211, 1) 0%, rgba(165, 208, 245, 1) 100%));">
                    <span class="visually-hidden">50%</span>
                </div>
            </div>
            <div style="margin-top: 50px;">
                <p class="p24b" style="text-align: center;">Competition</p>
                <p class="p16b" style="text-align: center;">Please select the competition (1/2)</p>
            </div>
            <div class="competition-container">
                <!-- Competition Types -->
                <ul class="nav nav-tabs competition-type" role="tablist" style="border-bottom-style: none;margin-bottom: 20px;">
                    @foreach($competition_types as $key => $competitionType)
                    <li class="nav-item text" role="presentation"><a class="nav-link2 {{ $key == 0 ? 'active' : '' }}" style="text-decoration: none;" role="tab" data-bs-toggle="tab" data-competition-type="{{ $competitionType['key'] }}" href="#tab-{{ $competitionType['key'] }}">{{ $competitionType['name'] }}</a></li>
                    @endforeach
                </ul>
                <!-- Competition Gender Selections -->
                <ul class="nav nav-tabs competition-gender" role="tablist" style="border-bottom-style: none;margin-bottom: 20px;">
                    <li class="nav-item text" role="presentation">
                        <a class="nav-link2 active" style="text-decoration: none;" role="tab" data-bs-toggle="tab" data-competition-gender="boys" href="#tab1-1">Boys</a>
                    </li>
                    <li class="nav-item text" role="presentation">
                        <a class="nav-link2" style="text-decoration: none;" role="tab" data-bs-toggle="tab" data-competition-gender="girls" href="#tab1-2">Girls</a>
                    </li>
                    <li class="nav-item text" role="presentation">
                        <a class="nav-link2" style="text-decoration: none;" role="tab" data-bs-toggle="tab" data-competition-gender="mixed" href="#tab1-3">Mixed</a>
                    </li>
                </ul>

                <div class="tab-content">

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
<script>
    $(document).ready(function() {
        initialCompetitions();

        $('.competition-container').on('click', '.nav-link2', function() {
            initialCompetitions()
        });

        // * Functions
        function initialCompetitions() {
            const competitionType = $('.competition-type .nav-link2.active').data('competition-type');
            const competitionGender = $('.competition-gender .nav-link2.active').data('competition-gender');

            renderCards(competitionType, competitionGender);
        }

        function renderCards(competitionType, competitionGender) {
            const competitions = <?= json_encode($competitions) ?>;
            
            $('.tab-content').empty();

            let hasCompetitions = false;
            let competitionRoute = "{{ route('wave.competitionenrollment3') }}";
            console.log(competitions);
            competitions.forEach((competition) => {
                if (competition.competition_type == competitionType && competition.competition_for_gender == competitionGender) {
                    if (competition.categories.length > 0) {
                        hasCompetitions = true;

                        competition.categories.forEach(category => {
                            $('.tab-content').append(`<div style="width: 100%; margin-bottom: 20px; text-align: center; background: #fff; border-radius: 10px; position: relative;">
                                    <a href="${competitionRoute}?id=${competition.id}&category=${category.id}" class="divcard" style="display: inline-block; padding: 15px; text-decoration: none; width: 100%; ${category.is_full ? 'opacity: 0.5; pointer-events: none;' : ''}">
                                        <input type="hidden" name="category_id" value="${category.id}">
                                        <img src="{{ asset('themes/tailwind/images/clipboard-image-87.png') }}"
                                            style="width: 100%;">
                                        <p class="p18b" style="margin-top: 10px; margin-bottom: 0px; text-align: center;">
                                            ${category.category.name} <br>
                                            (${category.start_date}, ${category.start_time} - ${category.end_time})
                                        </p>
                                    </a>
                                    <div class="full-competition_container ${category.is_full ? '' : 'd-none'}">
                                        <p class="full-competition_category">Fulled</p>
                                    </div>
                                </div>`);
                        });
                    }
                }
            });

            if (!hasCompetitions)
                $('.tab-content').append('<div style="padding: 13px;"><p>No competitions found</p></div>');
        }
    });
</script>
@endsection