<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BlitzWiZ Gym</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('themes/tailwind/css/style.css') }}">
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
    <link href="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday@1.8.0/css/pikaday.min.css">
    <link rel="stylesheet" href="{{ asset('css/I18NSwitch.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
       
    </style>
    @yield('style')
</head>
<body>
@yield('content')


<script src="{{ asset('js/I18NSwitch.js')}}"></script>
<script src="{{ asset('themes/tailwind/js/jquery.min.js') }}"></script>
<script src="{{ asset('themes/tailwind/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/tailwind/js/jquery.min.js') }}"></script>
<script type="text/javascript" rel="script" href="{{ URL::asset('/assets/js/File-Input---Beautiful-Input--Button-Approach-Jasny-Bootstrap-fileinput.js') }}"></script>
<script type="text/javascript" rel="script" href="{{ URL::asset('/assets/js/script.js') }}"></script>
<script type="text/javascript" rel="script" href="{{ URL::asset('/assets/js/Simple-Slider-swiper-bundle.min.js') }}"></script>
<script type="text/javascript" rel="script" href="{{ URL::asset('/assets/js/Simple-Slider.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bcryptjs/2.4.3/bcrypt.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pikaday@1.8.0/pikaday.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function goBack() {
        window.history.back();
    }

</script>
@yield('javascript')

</body>

</html>
