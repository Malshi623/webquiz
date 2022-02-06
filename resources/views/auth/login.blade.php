<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
.container {
    left      : 75%;
    top       : 35%;
    position  : absolute;
    transform : translate(-50%, -50%);
}
</style>
</head>
<body>
 <div class="container">
     <div class="row" style="margin-top:45px" >
         <div class="col-md-4 col-md-offset-4">
         <h2 id="content">Login</h2><hr>
         <br>

             <form action="{{route('auth.check')}}" method="post">

             @if(Session::get('fail'))
             <div class="alert alert-danger">
             {{Session::get('fail')}}
             </div>
             @endif

             @csrf

                  <div class="form-group" >
                      <label for="email">Email</label>
                      <input type="text" class="form-control" name="email" placeholder="Enter email" value="{{old('email')}}">
                      <span class="text-danger">@error('email'){{$message}} @enderror</span>
                  </div>
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Enter password">
                      <span class="text-danger">@error('password'){{$message}} @enderror</span>
                  </div>
                  <br>
                  <div class="form-group">
                      <button type="submit" class="btn btn-block btn-primary">Login</button>
                  </div>
                  <br>
                  <a href="{{route('auth.register')}}">I don't have an account, Create new</a>
             </form>
         </div>
     </div>
 </div> 

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>