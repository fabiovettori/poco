<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Poco - @yield('title')</title>

        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href=" {{ asset('css/app.css') }} ">
    </head>
    <body>
        <header class="guest">
            @include('guest.partials.header')
        </header>

        <main class="guest">
            @yield('content')
        </main>

        <footer class="guest">
            @include('guest.partials.footer')
        </footer>

        <script src=" {{ asset('js/app.js') }} " charset="utf-8"></script>
    </body>
</html>
