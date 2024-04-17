<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

$routeName = Route::currentRouteName();
?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <!-- @if(isset($seo->title))
    <title>{{ $seo->title }}</title>
    @else
    <title>{{ setting('site.title', 'HKSA') . ' - ' . setting('site.description', 'Hong Kong Swimming Association') }}</title>
    @endif -->

    @if( null !== session('school') )
        <title><?= session('school')['name'] != "" ? session('school')['name'] : 'Hong Kong Swimming Academy' ?></title>
    @else
        <title>HKSA | Hong Kong Swimming Academy</title>
    @endif

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- † -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('/') }}">

    <link rel="icon" href="{{ setting('site.favicon', '/themes/tailwind/images/Logo.png') }}" type="image/x-icon">

    {{-- Social Share Open Graph Meta Tags --}}
    @if(isset($seo->title) && isset($seo->description) && isset($seo->image))
    <meta property="og:title" content="{{ $seo->title }}">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:image" content="{{ $seo->image }}">
    <meta property="og:type" content="@if(isset($seo->type)){{ $seo->type }}@else{{ 'article' }}@endif">
    <meta property="og:description" content="{{ $seo->description }}">
    <meta property="og:site_name" content="{{ setting('site.title') }}">

    <meta itemprop="name" content="{{ $seo->title }}">
    <meta itemprop="description" content="{{ $seo->description }}">
    <meta itemprop="image" content="{{ $seo->image }}">

    @if(isset($seo->image_w) && isset($seo->image_h))
    <meta property="og:image:width" content="{{ $seo->image_w }}">
    <meta property="og:image:height" content="{{ $seo->image_h }}">
    @endif
    @endif

    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">

    @if(isset($seo->description))
    <meta name="description" content="{{ $seo->description }}">
    @endif

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/css/lightpick.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link href="{{ asset('themes/' . $theme->folder . '/css/admin-style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/Toggle-Switch.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/Toggle-Switch-toggle-switch.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/Bootstrap-DataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/Bootstrap-Tags-Input-bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/Date-Picker-From-and-To.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/Ludens---WYSIWYG-Summernote-Editor.css') }}" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('themes/' . $theme->folder . '/css/user-dashboard-style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/custom/global-variables.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/custom/admin-custom-style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/custom/buttons-style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/custom/forms-style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/custom/labels-style.css') }}" rel="stylesheet">
    
    <!-- SCRIPTS CHANGES FROM CUSTOMER VIEW -->
    <!-- <link rel="stylesheet" href="{{ asset('themes/tailwind/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/tailwind/css/vars.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('themes/tailwind/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/tailwind/css/global.css') }}">
    <link media="all" type="text/css" rel="stylesheets" href="{{ URL::asset('/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link media="all" type="text/css" rel="stylesheets" href="{{ URL::asset('/assets/css/swiper-icons.css') }}">
    <link media="all" type="text/css" rel="stylesheets" href="{{ URL::asset('/assets/css/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap-file-input.css') }}">
    <link media="all" type="text/css" rel="stylesheets" href="{{ URL::asset('/assets/css/progress-bars-progress.css') }}">
    <link media="all" type="text/css" rel="stylesheets" href="{{ URL::asset('/assets/css/Simple-Slider.css') }}">
    <link media="all" type="text/css" rel="stylesheets" href="{{ URL::asset('/assets/css/untitled.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday@1.8.0/css/pikaday.min.css">
    <link rel="stylesheet" href="{{ asset('css/I18NSwitch.css')}}"> -->

    @yield('style')
    {{-- normally jquery or similar cdn stuff we add here in the header, because whole project needs it to run --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/bs-init.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/lightpick.min.js"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/Bootstrap-DataTables-main.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/Bootstrap-Tags-Input-bootstrap-tagsinput-custom.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/Bootstrap-Tags-Input-bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/theme.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/custom/toast.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/Ludens---WYSIWYG-Summernote-Editor-main.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/app.js') }}" defer></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/custom/events.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/custom/functions.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.full.min.js" integrity="sha512-rNNKEb5WQbxA4pLtGV9W746iT7tZlpjC6duViljPlPQhOOPz6Vu3nae8G9A36/W8WT+BWhso9vgETSfSP604vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/xtqeb1qg9j8zq3drzz8wnbyafsewuksfmt7xnw9jgfdwr966/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/wknxkzwugyamne4ywkclhhh2qsptesc8w2in8bas9yq3i5i1/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- <script src="https://cdn.tiny.cloud/1/wknxkzwugyamne4ywkclhhh2qsptesc8w2in8bas9yq3i5i1/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> -->

</head>

<body class="flex flex-col min-h-screen page-{{ $routeName }} @if(Request::is('/')){{ 'bg-white' }}@else{{ 'bg-gray-50' }}@endif">
    <main class="flex-grow overflow-x-hidden">
        <section class="main-section-dashboard">
            {{-- Content for main menu pages --}}
            @include('theme::partials.sidebar')
            <div class="main-content">
                @include('theme::partials.dashboard-navigation')
                <div class="main-inside-content">
                    @yield('content')
                </div>
            </div>
        </section>
    </main>

    @if(config('wave.dev_bar'))
        @include('theme::partials.dev_bar')
    @endif

    <!-- Full Screen Loader -->
    <div id="fullscreenLoader" class="fixed inset-0 top-0 left-0 z-50 flex flex-col items-center justify-center hidden w-full h-full bg-gray-900 opacity-50">
        <svg class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <p id="fullscreenLoaderMessage" class="mt-4 text-sm font-medium text-white uppercase"></p>
    </div>
    <!-- End Full Loader -->


    @include('theme::partials.toast')
    @waveCheckout

    @yield('script')
    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        var mSortingString = [];
        var disableSortingColumn = 4;
        
        mSortingString.push({
            "bSortable": false,
            "aTargets": [disableSortingColumn]
        });
        
        $(function(e) {
            $(document).on('click', '.file-upload-wrapper .file-upload-btn', function(e) {
                $(this).parents('.file-upload-wrapper:first').find('input[type="file"]').trigger('click');
            });
            
            $(document).on('change', '.file-upload-wrapper input[type="file"]', function(e) {
                $(this).parents('.file-upload-wrapper:first').find('.file-upload-desc').hide();
                if ($(this)[0].files.length) {
                    $(this).parents('.file-upload-wrapper:first').find('.file-upload-desc.with-value').text($(this)[0].files[0].name).show();
                } else {
                    $(this).parents('.file-upload-wrapper:first').find('.file-upload-desc.empty-state').show();

                }
            });

            window.table = $('.data-table table').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "aaSorting": [],
                "orderMulti": true,
                "aoColumnDefs": mSortingString,
                "columnDefs": [{

                }]
            });

            $('.main-content').on('input', '.phone-input', function() {
                $(this).val($(this).val().replace(/[^0-9+ ]/g, ''));
            });

            $('.main-content').on('input', '.amount-input', function() {
                // Remove non-numeric characters
                $(this).val($(this).val().replace(/[^\d.]/g, ''));
            });

            $('.main-content').on('input', '.only-number', function() {
                // Remove non-numeric characters
                $(this).val($(this).val().replace(/\D/g, ''));
            });
        });

        function getUserToken() {
            const response = "<?= session('api_token') ?>";

            return response;
        }

        function getApiUrl() {
            const response = '<?= config('services.api_url') ?>';

            return response;
        }

        function getAppUrl() {
            const response = '<?= config('services.app_url') ?>';

            return response;
        }
    </script>
    
    @if(session('message'))
    <script>
        setTimeout(function() {
            popToast("{{ session('message_type') }}", "{{ session('message') }}");
        }, 10);
    </script>
    @endif
</body>

</html>