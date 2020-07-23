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

        <script src="{{ asset('https://code.jquery.com/jquery-3.5.1.min.js')}}"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        {{-- @yield('style') --}}
    </head>

    <body>
        <div id="app">
            <section class="px-8 py-4 mb-6">
                @if (Auth::check())
                <header class="container mx-auto">
                    <h1>
                        <span style="font-size: 2em; color: rgb(78, 114, 231);">
                            <i class="fas fa-feather"> Tweety</i>
                        </span>
                    </h1>
                </header>


                @endif

            </section>
            {{$slot}}
        </div>


        <script src="{{asset('https://unpkg.com/turbolinks')}}"></script>
        <script src="{{asset('js/textareaAutoResize.js')}}"></script>
        <script src="{{asset('js/focusElements.js')}}"></script>
        <script src="js/socialKeyEvents.js"></script>
        {{-- <script src="{{asset('js/retweet.js')}}"></script> --}}
    </body>

</html>