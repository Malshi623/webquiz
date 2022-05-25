<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'QuizMaster') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito"; rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Styles.css -->
         <style>
            
		body {
            background-image: url('{{ asset('storage/back8.jpg') }}');
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;
            background-position: center;
        }

            .topnav {
            overflow: hidden;
            background-color: transparent;
            }

            .topnav a {
            float: left;
            
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 23px;
            }

            .topnav a:hover {
            background-color: #ddd;
            color: black;
            }

            .topnav a.active {
            background-color: #f7f9fb;
            color: white;
            }

            .topnav-right {
            float: right;
            }

            * {
            box-sizing: border-box;
            }

            .column {
            float: left;
            width: 25%;
            padding: 10px;
            }

            .row::after {
            content: "";
            clear: both;
            display: table;
            }
            
            h1{
                text-align: center;
                text-transform: uppercase;
                color: #4CAF50;
                font-size: 60px;
                padding: 30px;

            }

            img{
                border: 5px solid #555;
                border-radius: 25px;
            }

        </style>
</head>

<body body style="background-color:#f7f9fb;">
    <div id="app" class="main-img">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                         <!--username-->
                        <div class="topnav">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <!-- logout -->
                            <div class="topnav-right ">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <!--title of page-->
        <div>
            <h1>choose your favourite game...</h1>
        </div>
         
        <!-- game image with link -->
        `<div class="row">
            <div class="column">
                <a href="{{route('user.spinwheel')}}">
                    <img src="{{ asset('storage/spinwheel.png') }}"  style="width:100%">
                </a>
            </div>
            <div class="column">
                <a href="{{route('user.dartgame')}}">
                    <img src="{{ asset('storage/dartgame.png') }}"  style="width:100%">
                </a>
            </div>
            <div class="column">
                <a href="{{route('user.balloonshoot')}}">
                    <img src="{{ asset('storage/balloonshoot.png') }}"  style="width:100%">
                </a>              
            </div>
            <div class="column">
                <a href="{{route('user.mountainclimb')}}">
                    <img src="{{ asset('storage/mountainclimb.png') }}"  style="width:100%">
                </a>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
        
    </div>
    
<!-- boostrap js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>     
</body>
</html>