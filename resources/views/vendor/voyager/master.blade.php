<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
$routeName = Route::currentRouteName();

?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    @if(isset($seo->title))
        <title>{{ $seo->title }}</title>
    @else
        <title>{{ setting('site.title', 'HKSA') . ' - ' . setting('site.description', 'Hong Kong Swimming Association') }}</title>
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
    <link href="{{ asset('themes/' . $theme->folder . '/css/admin-style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/user-dashboard-style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="{{ asset('themes/' . $theme->folder . '/css/Bootstrap-DataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/Bootstrap-Tags-Input-bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/css/Date-Picker-From-and-To.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/css/lightpick.min.css">

    <link href="{{ asset('themes/' . $theme->folder . '/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">
    @yield('style')

</head>
<body class="flex flex-col min-h-screen page-{{ $routeName }} @if(Request::is('/')){{ 'bg-white' }}@else{{ 'bg-gray-50' }}@endif">

    <main class="flex-grow overflow-x-hidden">
        @if( !auth()->guest() && substr(Route::getCurrentRoute()->getPrefix(),1) == getPrefixByRole(auth()->user()->role->name) )
        <section class="main-section-dashboard">
            @include('theme::partials.sidebar')
            <div class="main-content">
                @include('theme::partials.header')
                <div class="main-inside-content">
                    @yield('page_header')
                    <div id="voyager-notifications"></div>
                    @yield('content')
                </div>
            </div>
        </section>
        @else
        @yield('content')
        @endif
    </main>

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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.js"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/bs-init.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/lightpick.min.js"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/Bootstrap-DataTables-main.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/Bootstrap-Tags-Input-bootstrap-tagsinput-custom.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/Bootstrap-Tags-Input-bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/theme.js') }}"></script>
    <script src="{{ asset('themes/' . $theme->folder . '/js/app.js') }}"></script>

    <script type="text/javascript" src="{{ voyager_asset('js/app.js') }}"></script>

    @yield('script')
    <script>
        $(function(e) {
            $(document).on('click', '.file-upload-wrapper .file-upload-btn', function(e) {
                $(this).parents('.file-upload-wrapper:first').find('input[type="file"]').trigger('click'); 
            });
            $(document).on('change', '.file-upload-wrapper input[type="file"]', function(e) {
                $(this).parents('.file-upload-wrapper:first').find('.file-upload-desc').hide(); 
                if ($(this)[0].files.length) {
                    $(this).parents('.file-upload-wrapper:first').find('.file-upload-desc.with-value').text($(this)[0].files[0].name).show(); 
                }
                else {
                    $(this).parents('.file-upload-wrapper:first').find('.file-upload-desc.empty-state').show(); 

                }
            });
        });
    </script>
    @if(session('message'))
        <script>setTimeout(function(){ popToast("{{ session('message_type') }}", "{{ session('message') }}"); }, 10);</script>
    @endif
</body>
</html>
