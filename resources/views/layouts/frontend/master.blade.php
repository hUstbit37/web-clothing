<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('meta_desc')">
    <meta name="keyword" content="@yield('meta_keyword')">
    <title>@yield('page_title')</title>

    <script src="{{ url('js/jquery.min3.5.1.js') }}"></script>
{{--    <script src="{{ url('js/all.min.js') }}"></script>--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/stylesheet.css') }}"/>
    <link rel="stylesheet" href="{{ url('css/jquery.fancybox.css') }}"/>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/mobile.css') }}">
{{--    <link rel='stylesheet' href='https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css'>--}}
{{--    <script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>--}}
{{--    <script>--}}
{{--        new WOW().init();--}}
{{--    </script>--}}
</head>
<body>

@include('frontend.parttions.header')

@yield('main_content')
<script src="{{ url('js/main.js') }}"></script>
@include('frontend.parttions.footer')
