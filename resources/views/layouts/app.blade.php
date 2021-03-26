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
       @livewireStyles
</head>
<body>
        <div class="nk-app-root">
              <!-- main @s -->
              <div class="nk-main ">
                     <!-- sidebar @s -->
                     <x-partials.side-nav />
                     <!-- sidebar @e -->
                     <!-- wrap @s -->
                     <div class="nk-wrap ">
                            <!-- main header @s -->
                            <x-partials.nav />
                            <!-- main header @e -->
                            <!-- content @s -->
                            @yield('content')
                            <!-- footer @s -->
                            <x-partials.footer />
                            <!-- footer @e -->
                     </div>
                     <!-- wrap @e -->
              </div>
              <!-- main @e -->
        </div>

       
       <script src=" {{ asset('assets/js/bundle.js?ver=2.4.0') }} "></script>
       <script src=" {{ asset('assets/js/scripts.js?ver=2.4.0') }}"></script>
       <script src=" {{ asset('assets/js/charts/chart-ecommerce.js?ver=2.4.0') }} "></script>
       @livewireScripts
</body>
</html>

