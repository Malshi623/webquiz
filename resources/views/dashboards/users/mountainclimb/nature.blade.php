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

     <!--W3 School CSS-->
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <!-- Styles.css -->
         <style>


            .topnav {
            overflow: hidden;
            background-color: #f7f9fb;
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

            .btn-bot{
            position:absolute; 
            margin-left:-50px;
            left:50%;
            width:100px;
            bottom:10px;
            }

            h1{
                text-align: center;
                text-transform: uppercase;
                color: #800000;
                font-size: 60px;
                padding-top:10px;
                padding-bottom: 30px;

            }

            .topics{
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                padding: 25px;
               
            }

            .button {
            border: none;
            color: black;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 50%;
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
        <!--boderbox of topic buttons-->
<div class="topics">

<!--title of page-->
<div>
    <h1>levels</h1>
</div>

<!--level buttons-->
<div>
<button class="button w3-green w3-round-xxlarge w3-hover-light-green" onclick="document.location='{{route('user.mountainclimb_biology_level1')}}'">01</button>&emsp;&emsp;&emsp;
<button class="button w3-green w3-round-xxlarge w3-hover-light-green" >02</button>&emsp;&emsp;&emsp;
<button class="button w3-green w3-round-xxlarge w3-hover-light-green" >03</button>&emsp;&emsp;&emsp;
<button class="button w3-green w3-round-xxlarge w3-hover-light-green" >04</button>&emsp;&emsp;&emsp;
<button class="button w3-green w3-round-xxlarge w3-hover-light-green" >05</button>&emsp;&emsp;&emsp;
<br>
<br>
<button class="button w3-green w3-round-xxlarge w3-hover-light-green" >06</button>&emsp;&emsp;&emsp;
<button class="button w3-green w3-round-xxlarge w3-hover-light-green" >07</button>&emsp;&emsp;&emsp;
<button class="button w3-green w3-round-xxlarge w3-hover-light-green" >08</button>&emsp;&emsp;&emsp;
<button class="button w3-green w3-round-xxlarge w3-hover-light-green" >09</button>&emsp;&emsp;&emsp;
<button class="button w3-green w3-round-xxlarge w3-hover-light-green" >10</button>&emsp;&emsp;&emsp;
<br>
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