<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ setting('site.favicon', '/wave/favicon.png') }}" type="image/x-icon">
    <title>{{ Voyager::setting("admin.title") }} Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('themes/' . $theme->folder . '/css/admin-style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/' . $theme->folder . '/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        /*! tailwindcss v2.0.4 | MIT License | https://tailwindcss.com *//*! modern-normalize v1.0.0 | MIT License | https://github.com/sindresorhus/modern-normalize */*,::after,::before{box-sizing:border-box}:root{-moz-tab-size:4;tab-size:4}html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}body{font-family:system-ui,-apple-system,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji'}button,input{font-family:inherit;font-size:100%;line-height:1.15;margin:0}button{text-transform:none}[type=button],[type=submit],button{-webkit-appearance:button}p{margin:0}button{background-color:transparent;background-image:none}button:focus{outline:1px dotted;outline:5px auto -webkit-focus-ring-color}ul{list-style:none;margin:0;padding:0}html{font-family:ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";line-height:1.5}body{font-family:inherit;line-height:inherit}*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}img{border-style:solid}input::placeholder{opacity:1;color:#9ca3af}button{cursor:pointer}a{color:inherit;text-decoration:inherit}button,input{padding:0;line-height:inherit;color:inherit}img{display:block;vertical-align:middle}img{max-width:100%;height:auto}.container{width:100%}@media (min-width:640px){.container{max-width:640px}}@media (min-width:768px){.container{max-width:768px}}@media (min-width:1024px){.container{max-width:1024px}}@media (min-width:1280px){.container{max-width:1280px}}@media (min-width:1536px){.container{max-width:1536px}}.space-x-5>:not([hidden])~:not([hidden]){--tw-space-x-reverse:0;margin-right:calc(1.25rem * var(--tw-space-x-reverse));margin-left:calc(1.25rem * calc(1 - var(--tw-space-x-reverse)))}.bg-white{--tw-bg-opacity:1;background-color:rgba(255,255,255,var(--tw-bg-opacity))}.bg-gray-50{--tw-bg-opacity:1;background-color:rgba(249,250,251,var(--tw-bg-opacity))}.bg-red-400{--tw-bg-opacity:1;background-color:rgba(248,113,113,var(--tw-bg-opacity))}.bg-blue-500{--tw-bg-opacity:1;background-color:rgba(59,130,246,var(--tw-bg-opacity))}.bg-blue-600{--tw-bg-opacity:1;background-color:rgba(37,99,235,var(--tw-bg-opacity))}.bg-gradient-to-r{background-image:linear-gradient(to right,var(--tw-gradient-stops))}.from-blue-500{--tw-gradient-from:#3b82f6;--tw-gradient-stops:var(--tw-gradient-from),var(--tw-gradient-to, rgba(59, 130, 246, 0))}.to-blue-600{--tw-gradient-to:#2563eb}.border-gray-300{--tw-border-opacity:1;border-color:rgba(209,213,219,var(--tw-border-opacity))}.border-blue-500{--tw-border-opacity:1;border-color:rgba(59,130,246,var(--tw-border-opacity))}.rounded-md{border-radius:.375rem}.rounded-xl{border-radius:.75rem}.border{border-width:1px}.block{display:block}.flex{display:flex}.flex-col{flex-direction:column}.items-center{align-items:center}.justify-start{justify-content:flex-start}.justify-center{justify-content:center}.font-normal{font-weight:400}.font-bold{font-weight:700}.h-24{height:6rem}.h-auto{height:auto}.h-full{height:100%}.text-xs{font-size:.75rem;line-height:1rem}.text-sm{font-size:.875rem;line-height:1.25rem}.my-10{margin-top:2.5rem;margin-bottom:2.5rem}.mx-auto{margin-left:auto;margin-right:auto}.mb-2{margin-bottom:.5rem}.mb-6{margin-bottom:1.5rem}.mt-7{margin-top:1.75rem}.max-w-md{max-width:28rem}.min-h-screen{min-height:100vh}.outline-none{outline:2px solid transparent;outline-offset:2px}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.p-8{padding:2rem}.py-2{padding-top:.5rem;padding-bottom:.5rem}.py-3{padding-top:.75rem;padding-bottom:.75rem}.px-3{padding-left:.75rem;padding-right:.75rem}.px-8{padding-left:2rem;padding-right:2rem}.placeholder-gray-300::placeholder{--tw-placeholder-opacity:1;color:rgba(209,213,219,var(--tw-placeholder-opacity))}*{--tw-shadow:0 0 #0000}.shadow-xl{--tw-shadow:0 20px 25px -5px rgba(0, 0, 0, 0.1),0 10px 10px -5px rgba(0, 0, 0, 0.04);box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}*{--tw-ring-inset:var(--tw-empty, );/*!*//*!*/--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgba(59, 130, 246, 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000}.ring{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow,0 0 #0000)}.ring-blue-500{--tw-ring-opacity:1;--tw-ring-color:rgba(59, 130, 246, var(--tw-ring-opacity))}.ring-opacity-50{--tw-ring-opacity:0.5}.text-center{text-align:center}.text-white{--tw-text-opacity:1;color:rgba(255,255,255,var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity:1;color:rgba(156,163,175,var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity:1;color:rgba(75,85,99,var(--tw-text-opacity))}.text-indigo-400{--tw-text-opacity:1;color:rgba(129,140,248,var(--tw-text-opacity))}.text-indigo-500{--tw-text-opacity:1;color:rgba(99,102,241,var(--tw-text-opacity))}.underline{text-decoration:underline}.w-10{width:2.5rem}.w-auto{width:auto}.w-full{width:100%}@keyframes spin{to{transform:rotate(360deg)}}@keyframes ping{100%,75%{transform:scale(2);opacity:0}}@keyframes pulse{50%{opacity:.5}}@keyframes bounce{0%,100%{transform:translateY(-25%);animation-timing-function:cubic-bezier(.8,0,1,1)}50%{transform:none;animation-timing-function:cubic-bezier(0,0,.2,1)}}
    </style>
</head>
<body class="w-full">

    <section class="h-100" style="width: 100vw;">
            <div class="row h-100" style="margin-right: 0px;margin-left: 0px;width: 100vw;">
                <div class="col-md-6 d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center h-100" style="text-align: center;padding: 0px;width: 50vw;">
                    <div style="width: 400px;"><img src="{{ asset('themes/tailwind/images/coach.png') }}">
                        <h1 style="font-size: 50px;font-weight: bold;color: #4A5C7A;margin-top: 50px;">Welcome to Admin Panel1</h1>
                    </div>
                </div>
                <div class="col-md-6 d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center h-100" style="border-left: 1px solid #AAC9E4;padding: 0px;width: 50vw;">
                    <form action="{{ route('voyager.login') }}" method="POST">
                        {{ csrf_field() }}
                        <div style="width: 400px;">
                            <div style="color: #636363;">
                                <h1 style="color: #3B3B3B;font-weight: bold;font-size: 36px;">Login To Your Account</h1>
                            </div>
                            <div style="margin-top: 30px;">
                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Email</h1>
                                <input type="text" value="{{ old('email') }}" name="email" id="email" style="width: 100%;height: 48px;border-style: none;background: #F5F5F5;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;color: #3B3B3B;font-family: Poppins, sans-serif;padding-top: 1px;padding-left: 16px;">
                            </div>
                            <div style="margin-top: 30px;">
                                <h1 style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;">Password</h1>
                                <div class="password-container" style="width: 100%;">
                                <input type="password" name="password" id="password" class="form-control-lg" style="width: 100%;border-style: none;background: #F5F5F5;height: 48px;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;padding-left: 16px;"><i class="fa-solid fa-eye" id="eye" style="color: #3B3B3B;"></i></div>
                            </div>
                            <div class="d-xl-flex align-items-xl-center password-container" style="width: 100%;margin-top: 0px;">
                                <div class="col d-xl-flex justify-content-xl-start" style="text-align: center;"><input type="checkbox" style="background: #4A5C7A; color: white; margin-top: 10px;">
                                    <h1 class="d-xl-flex" style="color: #636363;font-size: 14px;font-family: Poppins, sans-serif;margin-top: 10px;margin-left: 5px;">Remember Me</h1>
                                </div>
                                <div class="col d-xl-flex justify-content-xl-end"><a href="{{ route('wave.user.admin-panel.forgot-password') }}" style="color: #4A5C7A;font-size: 14px;font-family: Poppins, sans-serif;">Forgot Password?</a></div>
                            </div>
                            @if(!$errors->isEmpty())
                                <div class="p-6 px-8 text-white bg-red-400 rounded-xl">
                                    <ul class="list-unstyled">
                                        @foreach($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="d-xl-flex align-items-xl-center password-container" style="width: 100%;margin-top: 50px;"><button class="btn btn-primary" type="submit" style="width: 100%;height: 48px;background: #4A5C7A;font-family: Poppins, sans-serif;box-shadow: 0px 7px #39455b;border-top-left-radius: 8px;border-top-right-radius: 8px;border-bottom-right-radius: 8px;border-bottom-left-radius: 8px;border-style: none;border-left-style: none;border-left-color: var(--bs-btn-disabled-color);">Log In</button></div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.js"></script>
</body>
</html>
