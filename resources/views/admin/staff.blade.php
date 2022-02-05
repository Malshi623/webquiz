<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
.container {
    left      : 75%;
    top       : 25%;
    position  : absolute;
    transform : translate(-50%, -50%);
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

</head>

<body>

<div class="container">
    <div class="row" style="margin-top:45px" >
        <div class="col-md-4 col-md-offset-4">
             <h2 id="content">Staff</h2><hr>
             
             <table class="table table-hover" style="margin-top:45px">
                 <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                 </thead>
                 <tbody>
                    <td>{{$LoggedUserInfo['name']}}</td>
                    <td>{{$LoggedUserInfo['email']}}</td>
                    <td><a href="{{route('auth.logout')}}">Logout</a></td>
                 </tbody>
             </table>

             <ul>
                 <li><a href="/admin/dashboard">Dashboard</a></li>
                 <li><a href="/admin/profile">Profile</a></li>
                 <li><a href="/admin/settings">Settings</a></li>
                 <li><a href="/admin/staff">Staff</a></li>
             </ul>
             
        </div>
    </div>
</div>

 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>