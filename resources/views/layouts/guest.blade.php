<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <title>{{ config('app.name', 'Laravel') }}</title>
       <!-- Fonts -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
       <!-- Styles -->
       <link rel="stylesheet" href=" {{ asset('assets/css/dashlite.css?ver=2.4.0') }}">
       <link id="skin-default" rel="stylesheet" href=" {{ asset('assets/css/theme.css?ver=2.4.0') }}">
       <link rel="stylesheet" href=" {{ asset('assets/trix/trix.css') }}">
</head>
<body>                  
       @yield('content')

       <script src=" {{ asset('assets/js/bundle.js?ver=2.4.0') }} "></script>
       <script src=" {{ asset('assets/js/scripts.js?ver=2.4.0') }}"></script>
       <script src=" {{ asset('assets/js/charts/chart-ecommerce.js?ver=2.4.0') }} "></script>
       <script src=" {{ asset('assets/trix/trix.js') }} "></script>
</body>
</html>

