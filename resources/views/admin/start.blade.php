<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Start</title>

          <!-- Fonts -->
          <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- boostrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- boostrap icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        
        <!-- Styles.CSS -->
         <style>
            
            .topnav {
            overflow: hidden;
            background-color: #FFFFF2;
            }

            .topnav a {
            float: left;
            
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            }

            .topnav a:hover {
            background-color: #ddd;
            color: black;
            }

            .topnav a.active {
            background-color: #04AA6D;
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
        </style>
        
      
    </head> 
    
    <body style="background-color:#FFFFF2;">
        
    <!--username and logout-->
        <div class="topnav">
                <i class="bi bi-person-circle" style="font-size: 2rem;"> {{$LoggedUserInfo['name']}}</i>
                <div class="topnav-right ">
                <a href="{{route('auth.logout')}}">Logout<i class="bi bi-arrow-right-short"></i></a>
                </div>
        </div> 
        
        <!--title of page-->
        <div>
            <h1>choose your favourite game...</h1>
        </div>
         
        <!--game image with link-->
        `<div class="row">
            <div class="column">
                <a href="{{url('/admin/spinwheel/spinwheel')}}">
                    <img src="{{ asset('storage/spinwheel.png') }}"  style="width:100%">
                </a>
            </div>
            <div class="column">
                <a href="{{url('/admin/dartgame/dartgame')}}">
                    <img src="{{ asset('storage/dartgame.png') }}"  style="width:100%">
                </a>
            </div>
            <div class="column">
                <a href="{{url('/admin/balloonshoot/balloonshoot')}}">
                    <img src="{{ asset('storage/balloonshoot.png') }}"  style="width:100%">
                </a>              
            </div>
            <div class="column">
                <a href="{{url('/admin/mountainclimb/mountainclimb')}}">
                    <img src="{{ asset('storage/mountainclimb.png') }}"  style="width:100%">
                </a>
            </div>
        </div>

<!-- boostrap js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>     
    
    </body>
</html>