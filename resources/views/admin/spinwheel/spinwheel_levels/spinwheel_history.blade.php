<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spin Wheel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- boostrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- boostrap icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        
        <!--W3 School CSS-->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!-- Styles.css -->
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

<body style="background-color:#FFFFF2;">

   <!--back and logout-->
   <div class="topnav">
   <a href="/admin/spinwheel/spinwheel"><i class="bi bi-arrow-left-short"></i> Back</a>
  <div class="topnav-right ">
   <a href="{{route('auth.logout')}}">Logout <i class="bi bi-arrow-right-short"></i></a>
  </div>
</div>

<!--boderbox of topic buttons-->
<div class="topics">

<!--title of page-->
<div>
    <h1>levels</h1>
</div>

<!--level buttons-->
<div>
<button class="button w3-brown w3-round-xxlarge w3-hover-khaki" onclick="document.location='{{url('/admin/balloonshoot/balloonshoot_biology_levels/balloonshoot_biology_level1')}}'">01</button>&emsp;&emsp;&emsp;
<button class="button w3-brown w3-round-xxlarge w3-hover-khaki" >02</button>&emsp;&emsp;&emsp;
<button class="button w3-brown w3-round-xxlarge w3-hover-khaki" >03</button>&emsp;&emsp;&emsp;
<button class="button w3-brown w3-round-xxlarge w3-hover-khaki" >04</button>&emsp;&emsp;&emsp;
<button class="button w3-brown w3-round-xxlarge w3-hover-khaki" >05</button>&emsp;&emsp;&emsp;
<br>
<br>
<button class="button w3-brown w3-round-xxlarge w3-hover-khaki" >06</button>&emsp;&emsp;&emsp;
<button class="button w3-brown w3-round-xxlarge w3-hover-khaki" >07</button>&emsp;&emsp;&emsp;
<button class="button w3-brown w3-round-xxlarge w3-hover-khaki" >08</button>&emsp;&emsp;&emsp;
<button class="button w3-brown w3-round-xxlarge w3-hover-khaki" >09</button>&emsp;&emsp;&emsp;
<button class="button w3-brown w3-round-xxlarge w3-hover-khaki" >10</button>&emsp;&emsp;&emsp;
<br>
</div>


<!-- boostrap js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>    
</body>
</html>