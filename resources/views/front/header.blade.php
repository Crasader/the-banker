<!doctype html>
<html class="fixed">
<head>
    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="Member dashboard" />
    <meta name="description" content="Member dashboard">
    <meta name="author" content="{{ env('SITE_URL') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicons/apple-touch-icon.png') }}/">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicons/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('assets/favicons/safari-pinned-tab.svg') }} color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <title>{{env('SITE_NAME')}} &bull; @yield('title')</title>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets_old/plugin/flagstrap/css/flags.css')}}" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme.css') }}" />
    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/skins/default.css') }}" />
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme-custom.css') }}">

    <!-- Vendor -->
    <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
    <script src="{{asset('assets_old/plugin/flagstrap/js/jquery.flagstrap.min.js')}}" type="text/javascript"></script>
    <!-- Head Libs -->
    <script src="{{ asset('assets/vendor/modernizr/modernizr.js') }}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('assets/javascripts/theme.js') }}"></script>
    <!-- Theme Custom -->
    <script src="{{ asset('assets/javascripts/theme.custom.js') }}"></script>
    <!-- Theme Initialization Files -->
    <script src="{{ asset('assets/javascripts/theme.init.js') }}"></script>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>