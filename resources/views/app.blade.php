<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>VeV</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <meta name="baseURL" content="{{ url('/') }}">
</head>
<link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset/css/style.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link rel="preload" href="{{asset('asset/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}"  as="font" type="font/woff2"
      crossorigin="anonymous">
<link rel="preload" href="{{asset('asset/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
      crossorigin="anonymous">

<link rel="preload" href="{{asset('asset/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
      crossorigin="anonymous">
<link rel="preload" href="{{asset('asset/fonts/wolmart87d5.ttf?png09e')}}" as="font" type="font/ttf" crossorigin="anonymous">
<!-- Vendor CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('asset/vendor/line-awesome/css/line-awesome.min.html')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset/vendor/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset/vendor/animate/animate.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>

<
<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-analytics.js"></script>

<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script>
<script>
    WebFontConfig = {
        google: { families: ['Poppins:400,500,600,700'] }
    };
    ( function ( d ) {
        var wf = d.createElement( 'script' ), s = d.scripts[0];
        wf.src = 'asset/js/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore( wf, s );
    } )( document );
</script>

<!-- Plugins CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('asset/vendor/owl-carousel/owl.carousel.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset/vendor/animate/animate.min.css')}}">
<link rel="stylesheet" type="text/css"  href="{{asset('asset/vendor/magnific-popup/magnific-popup.min.css')}}">

<body>
@yield('content')
</body>




<script src="{{asset('asset/js/main.min.js')}}"></script>
<script src="{{asset('asset/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('asset/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
<script src="{{asset('asset/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('asset/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<!-- Main JS -->
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

