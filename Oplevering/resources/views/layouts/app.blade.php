<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Govadis</title>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.4.0.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/flatpickr.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
</head>
<body>
        <div id='marquee' class="marquee"></div>
    <div id="app">
            
        <nav class="navbar navbar-expand-md navbar-light bg-light mb-4">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">Govadis</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                         
                        @if(Gate::check('admin_action') || Gate::check('organizer_action') || Gate::check('participant_action'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('events')}}">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('profile')}}">Profiel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('myevents')}}">MyEvents</a>
                            </li>
                        @endif  

                        @if(Gate::check('admin_action') || Gate::check('organizer_action'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('events.index')}}">Events beheren</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('categories.show')}}">Categorieen</a>
                            </li>
                        @endif
                        
                        
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('register')}}">Registreren</a>
                            </li>
                        @else
                        
                            @can("admin_action")
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('organizers.show')}}">Organisatoren</a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('logout')}}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">Uitloggen</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        {{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
            {{--<div class="container">--}}
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                    {{--{{ config('app.name', 'Laravel') }}--}}
                {{--</a>--}}
                {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
                    {{--<span class="navbar-toggler-icon"></span>--}}
                {{--</button>--}}

                {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
                    {{--<!-- Left Side Of Navbar -->--}}
                    {{--<ul class="navbar-nav mr-auto">--}}

                    {{--</ul>--}}

                    {{--<!-- Right Side Of Navbar -->--}}
                    {{--<ul class="navbar-nav ml-auto">--}}
                        {{--<!-- Authentication Links -->--}}
                        {{--@guest--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                            {{--</li>--}}
                            {{--@if (Route::has('register'))--}}
                                {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                        {{--@else--}}
                            {{--<li class="nav-item dropdown">--}}
                                {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            {{--</li>--}}
                        {{--@endguest--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}

        {{--<div class="container">--}}
            {{--@yield('content')--}}
        {{--</div>--}}

        <main role="main">

            @yield('content')

        </main>
    </div>
</body>
<script>
    // function mouseMove(e) {
    //     var x = e.clientX;
    //     var y = e.clientY;
    //     var coor = "Coordinates: (" + x + "," + y + ")";
    //     document.getElementById("coor").innerHTML = coor;
    //     var testCoor = coor;
    //     if (coor != TestCoor)
    //     alert("testVariable has changed!");
    // }

    var timeout;
    var activate = false;

    var isEnabled = false;
    setInterval(function(){
        console.log(activate)
        if(activate == true){
            if(isEnabled == true)
            {
                //nothing
            }
            else {
                isEnabled = true;
                document.getElementById("marquee").innerHTML = '<svg height="130" width="600" class="logo"><defs><linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" style="stop-color:rgb(119, 71, 163);stop-opacity:1" /><stop offset="99%" style="stop-color:rgb(0, 154, 0);stop-opacity:1" /></linearGradient></defs><ellipse cx="300" cy="70" rx="300" ry="55" fill="url(#grad1)" /><text fill="#ffffff" font-size="45" font-family="Verdana" x="50" y="86">Environment.Exit(1);</text>Sorry, your browser does not support inline SVG.</svg>';
            }
        }
        else{
            isEnabled = false;
            activate = false;
            document.getElementById("marquee").innerHTML = ""; 
        }
    }, 1000);

    document.onmousemove = function(){
        clearTimeout(timeout);
        activate = false;
        isEnabled = false;
        document.getElementById("marquee").innerHTML = "";
        timeout = setTimeout(function(){activate = true}, 60000);
    }
//<iframe src="{{route('nothingfishyhere')}}"style="position: fixed;top: 0px;bottom: 0px;right: 0px;width: 100%;border: none;margin: 0;padding: 0;overflow: hidden;z-index: 999999;height: 100%;"></iframe>
    // document.onkeypress=function(e){
    //     clearTimeout(timeout);
    //     activate = false;
    //     timeout = setTimeout(function(){activate = true}, 10000);
    // }
</script>
    <script>
            (function ($, window, undefined) {
        $.fn.marqueeify = function (options) {
            var settings = $.extend({
                horizontal: true,
                vertical: true,
                speed: 100, // In pixels per second
                container: $(this).parent(),
                bumpEdge: function () {}
            }, options);
            
            return this.each(function () {
                var containerWidth, containerHeight, elWidth, elHeight, move, getSizes,
                    $el = $(this);
    
                getSizes = function () {
                    containerWidth = settings.container.outerWidth();
                    containerHeight = settings.container.outerHeight();
                    elWidth = $el.outerWidth();
                    elHeight = $el.outerHeight();
                };
    
                move = {
                    right: function () {
                        $el.animate({left: (containerWidth - elWidth)}, {duration: ((containerWidth/settings.speed) * 1000), queue: false, easing: "linear", complete: function () {
                            settings.bumpEdge();
                            move.left();
                        }});
                    },
                    left: function () {
                        $el.animate({left: 0}, {duration: ((containerWidth/settings.speed) * 1000), queue: false, easing: "linear", complete: function () {
                            settings.bumpEdge();
                            move.right();
                        }});
                    },
                    down: function () {
                        $el.animate({top: (containerHeight - elHeight)}, {duration: ((containerHeight/settings.speed) * 1000), queue: false, easing: "linear", complete: function () {
                            settings.bumpEdge();
                            move.up();
                        }});
                    },
                    up: function () {
                        $el.animate({top: 0}, {duration: ((containerHeight/settings.speed) * 1000), queue: false, easing: "linear", complete: function () {
                            settings.bumpEdge();
                            move.down();
                        }});
                    }
                };
    
                getSizes();
    
                if (settings.horizontal) {
                    move.right();
                }
                if (settings.vertical) {
                    move.down();
                }
    
          // Make that shit responsive!
          $(window).resize( function() {
            getSizes();
          });
            });
        };
    })(jQuery, window);
    
    $(document).ready( function() {
    
        $('.marquee').marqueeify({
            speed: 300,
            bumpEdge: function () {
                var newColor = "hsl(" + Math.floor(Math.random()*360) + ", 100%, 50%)";
                $('.marquee .logo').css('fill', newColor);
            }
        });
    });
        </script>
        <style>
            html {
                height: 100%;
            }
            body {
                min-height: 100%;
                height: 100%;
                margin: 0;
                width: 100%;
                position: relative;
            }
            .marquee {
                z-index: 1000;
                display: block;
                left: 0;
                right: 62%;
                bottom: 82%;
                position: absolute;
                top: 0;
            }
            svg {
                display: block;
            }
        </style>
</html>
