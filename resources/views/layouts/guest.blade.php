<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
       
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>{{ config('app.name', 'DHSN') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=2.2.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=2.2.0') }}">
    <link rel="stylesheet" href=" {{ asset('assets/trix/trix.css') }}">
</head>

<body class="nk-body bg-white npc-general pg-auth">

       @yield('content')


       <!-- JavaScript -->
       <script src=" {{ asset('assets/js/bundle.js?ver=2.4.0') }} "></script>
       <script src=" {{ asset('assets/js/scripts.js?ver=2.4.0') }}"></script>
       <script src=" {{ asset('assets/js/charts/chart-ecommerce.js?ver=2.4.0') }} "></script>
       <script src=" {{ asset('assets/trix/trix.js') }} "></script>
</body>

</html>

