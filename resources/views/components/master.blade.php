<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <script src="{{asset('https://kit.fontawesome.com/5ffbd0ba60.js')}}" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            <section class="px-8 py-4 mb-6">
                <header class="container mx-auto">
                    <h1>
                        <span style="font-size: 2em; color: rgb(78, 114, 231);">
                            <i class="fas fa-feather"> Tweety</i>
                        </span>
                    </h1>
                </header>
            </section>
            {{$slot}}


        </div>
    </body>

</html>