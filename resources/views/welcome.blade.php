<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- boostrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Styles -->
         <style>
            body {
            background-image: url('{{ asset('storage/logoImage2.png') }}'),url('{{ asset('storage/back8.jpg') }}');
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: contain,cover;
            background-position: center;

            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
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
            background-color: #04AA6D;
            color: white;
            }

            .topnav-right {
            float: right;
            }

        </style>
    </head>
    
    <body style="background-color:#f7f9fb; ">

    <!--Login and Register-->
     <div class="topnav">
  <div class="topnav-right ">
   <a href="{{route('login')}}">Login</a>
   <a href="{{route('register')}}">Register</a>
  </div>
</div>

<!-- boostrap js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
     
    </body>
</html>
