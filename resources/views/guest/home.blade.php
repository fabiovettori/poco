<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Poco</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href=" {{ asset('css/app.css') }} ">
    </head>
    <body>
        <header>
            @include('guest.partials.header')
        </header>

        <main>
            @yield('guest.content')
        </main>

        <footer>
            @include('guest.partials.footer')
        </footer>

        <script src=" {{ asset('js/app.js') }} " charset="utf-8"></script>
    </body>
</html>
