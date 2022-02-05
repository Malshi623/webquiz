<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        

        <!-- Styles -->
         <style>
            body {
            background-image: url('{{ asset('storage/logoImage2.png') }}');
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;

            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            }
            .topnav {
            overflow: hidden;
            background-color: #FFFFFF;
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

            .button {
            background-color: #4CAF50; 
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            }
           .button2 {background-color: #008CBA;} 
        </style>
    </head>
    
    <body style="background-color:#FFFFFF;">
     <div class="topnav">
  <div class="topnav-right ">
    <button class="button"><a href="#search">Login</a></button>
    <button class="button button2"><a href="#about">Register</a></button>
  </div>
</div>


     
    </body>
</html>
